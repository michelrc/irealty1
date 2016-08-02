<?php

class SeoPageWidget extends CWidget
{
    public function run()
    {
        $lang = Yii::app()->language;
        $pathInfo = Yii::app()->request->pathInfo;

        if (preg_match('/((?P<lang>\w{2})\/)?(?P<pathInfo>.*)/', $pathInfo, $matches)) {
            $pathInfo = $matches['pathInfo'];
            if (isset($matches['lang']) && $matches['lang'] && in_array($matches['lang'], array_keys(Language::choices()))) {
                $lang = $matches['lang'];
            }
        }
        /** @var SeoModel $seo */
        if($pathInfo == $lang || $pathInfo == '')
            $pathInfo = '/';
        $seo = SeoModel::model()->findByAttributes(array(I18NInTableAdapter::_attr('url', $lang) => $pathInfo));

        if (!$seo) {
            $model = SeoUrlRule::model()->findByAttributes(array('route' => $pathInfo));
            if ($model) {
                $seo = $model->getSeoModel(false);
            }
        }

        /** @var SeoModelBehavior $model */
        if ($seo) {
            $instance = $seo->getRelatedInstance();
            $replacementMap = $seo->getInstanceReplacementAttributes($instance);

            if ($seo->title) {
                echo "<title>" . strtr($seo->title, $replacementMap) . "</title>";
            }

            if ($seo->description) {
                cs()->registerMetaTag(strtr($seo->description, $replacementMap), 'description');
            }

            if ($seo->keywords) {
                cs()->registerMetaTag(strtr($seo->keywords, $replacementMap), 'keywords');
            }

            /** @var SeoModelMeta $meta */
            foreach ($seo->meta as $meta) {
                cs()->registerMetaTag(strtr($meta->content, $replacementMap), $meta->name);
            }
        }
    }
} 