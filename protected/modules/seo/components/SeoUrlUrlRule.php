<?php
Yii::import('application.modules.seo.components.ModelSEOUrlRule');

class SeoUrlUrlRule extends ModelSEOUrlRule
{

    /**
     * Creates a URL based on this rule.
     * @param CUrlManager $manager the manager
     * @param string $route the route
     * @param array $params list of parameters (name=>value) associated with the route
     * @param string $ampersand the token separating name-value pairs in the URL.
     * @return mixed the constructed URL. False if this rule does not apply.
     */
    public function createUrl($manager, $route, $params, $ampersand)
    {
        $rule = SeoUrlRule::model()->findByAttributes(array('route' => $route));
        if ($route == 'backend/tax/admin') ddump($route);
        /** @var SeoModel $seo */
        if ($rule && ($seo = $rule->getSeoModel(false))) {
            return $seo->getSeoUrl();
        }

        return false;
    }

    /**
     * Parses a URL based on this rule.
     * @param CUrlManager $manager the URL manager
     * @param CHttpRequest $request the request object
     * @param string $pathInfo path info part of the URL (URL suffix is already removed based on {@link CUrlManager::urlSuffix})
     * @param string $rawPathInfo path info that contains the potential URL suffix
     * @return mixed the route that consists of the controller ID and action ID. False if this rule does not apply.
     */
    public function parseUrl($manager, $request, $pathInfo, $rawPathInfo)
    {
        $lang = Yii::app()->language;

        if (preg_match('/((?P<lang>\w{2})\/)?(?P<pathInfo>.*)/', $pathInfo, $matches)) {
            $pathInfo = $matches['pathInfo'];
            if (isset($matches['lang']) && $matches['lang'] && in_array($matches['lang'], array_keys(Language::choices()))) {
                $lang = $matches['lang'];
            }
        }
        /** @var SeoModel $seo */
        $seo = SeoModel::model()->findByAttributes(array(I18NInTableAdapter::_attr('url', $lang) => $pathInfo));
        if ($seo && $seo->modelClassName) {
            $modelClass = CActiveRecord::model($seo->modelClassName);
            /** @var $seoBh SeoModelBehavior */
            $seoBh = $modelClass->asa('seo');

            $_GET['id'] = $seo->{$seoBh->seo_model_attr};
            $_GET['language'] = $lang;
            return $this->routeMap[$seo->modelClassName];
        }
        return false;
    }
}
