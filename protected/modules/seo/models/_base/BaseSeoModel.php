<?php

/**
 * This is the model base class for the table "seo_model".
 * It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "SeoModel".
 * This code was improve iReevo Team
 * Columns in table "seo_model" available as properties of the model,
 * followed by relations of table "seo_model" available as properties of the model.
 *
 * @property integer $id
 * @property string $url
 * @property string $title
 * @property string $description
 * @property string $keywords
 * @property string $modelClassName
 *
 * @property SeoModelMeta[] $seoModelMetas
 * @property ImageARBehavior $imageAR
 */
abstract class BaseSeoModel extends I18NInTableAdapter
{
// many to many relationship
    public $SeoModelMeta;

    public static function label($n = 1)
    {
        return self::model()->t_model('SeoModel|SeoModels', $n);
    }

    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public static function representingColumn()
    {
        return 'title';
    }

    public function tableName()
    {
        return 'seo_model';
    }

    public function cleanUpUrl()
    {
        $urls = $this->getI18nAttributeValues('url');

        $instance = $this->getRelatedInstance();

        if ($instance && !$instance instanceof SeoUrlRule) {
            $params = $this->getInstanceReplacementAttributes($instance);
        } else {
            $params = array();
        }

        foreach ($urls as $k => $v) {
            if($v != '/')
                $urls[$k] = strtr(str_replace(' ', '-', trim(trim($v), '/')), $params);
        }

        $this->url = $urls;
    }

    public function getRelatedInstance()
    {
        $model = CActiveRecord::model($this->modelClassName);
        /** @var SeoModelBehavior $seo_bh */
        $seo_bh = $model->asa('seo');
        return $model->findByPk($this->{$seo_bh->seo_model_attr});
    }

    /**
     * @param $instance GxActiveRecord
     * @param $value
     * @return array
     */
    public function getInstanceReplacementAttributes($instance)
    {
        if ($instance) {
            $values = $instance->getAttributes();
            $attrs = array();
            foreach ($values as $k => $v) {
                $attrs['{' . $k . '}'] = $v;
            }
            $attrs['{slug}'] = self::slug($instance->{$instance->representingColumn() ? $instance->representingColumn() : $instance});
            return $attrs;
        } else {
            return array();
        }
    }

    public static function slug($str, $replace = array(), $delimiter = '-')
    {
        if (!empty($replace)) {
            $str = str_replace((array)$replace, ' ', $str);
        }

        $clean = iconv('UTF-8', 'ASCII//TRANSLIT', $str);
        $clean = preg_replace("/[^a-zA-Z0-9\/_|+ -]/", '', $clean);
        $clean = strtolower(trim($clean, '-'));
        $clean = preg_replace("/[\/_|+ -]+/", $delimiter, $clean);

        return $clean;
    }

    public function beforeValidate()
    {
        $urlRule = SeoUrlRule::model()->findByAttributes(array(
            'modelClassName' => $this->modelClassName
        ));

        if ($urlRule && ($parentSeo = $urlRule->getSeoModel(false))) {
            /*foreach($this->getAttributes(array('')) as $k=>$value){
                if (!$value && $parentSeo->$k){
                    $this->$k = $parentSeo->$k;
                }
            }*/

            foreach ($this->i18nAttributes() as $attr) {
                $values = $this->getI18nAttributeValues($attr);

                foreach ($values as $lang => $value) {
                    if (!$value) {
                        $this->{self::_attr($attr, $lang)} = $parentSeo->{self::_attr($attr, $lang)};
                    }
                }

            }
        }

        return parent::beforeValidate();
    }

    public function i18nAttributes()
    {
        return array('title', 'description', 'keywords', 'url');
    }

    public function rules()
    {
        return array(
            array('url, title', 'i18n.validators.I18NValidator', 'validate' => 'required'),
//            array('url, title, modelClassName', 'required'),
            array('url', 'cleanUpUrl'),
            array('url', 'i18n.validators.I18NValidator', 'validate' => 'unique'),
            
            array('url, title, keywords, modelClassName', 'length', 'max' => 255),
            array('description', 'safe'),
            array('url, title, description, keywords', 'default', 'setOnEmpty' => true, 'value' => null),
            array('id, url, title, description, keywords, modelClassName', 'safe', 'on' => 'search'),
        );
    }

    public function relations()
    {
        return array(
            'meta' => array(self::HAS_MANY, 'SeoModelMeta', 'seo_model_id'),
        );
    }

    public function pivotModels()
    {
        return array();
    }

    public function attributeLabels()
    {
        return array(
            'id' => Yii::t('SeoModel', 'id'),
            'url' => Yii::t('SeoModel', 'url'),
            'title' => Yii::t('SeoModel', 'title'),
            'description' => Yii::t('SeoModel', 'description'),
            'keywords' => Yii::t('SeoModel', 'keywords'),
            'modelClassName' => Yii::t('SeoModel', 'modelClassName'),
        );
    }

    public function search()
    {
        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('url_es', $this->url, true);
        $criteria->compare('url_en', $this->url, true);
        $criteria->compare('title_es', $this->title, true);
        $criteria->compare('title_en', $this->title, true);
        $criteria->compare('description_es', $this->description, true);
        $criteria->compare('description_en', $this->description, true);
        $criteria->compare('keywords_es', $this->keywords, true);
        $criteria->compare('keywords_en', $this->keywords, true);
        $criteria->compare('modelClassName', $this->modelClassName, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }
}