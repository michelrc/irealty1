<?php

Yii::import('ext.components.TabularInputManagerEx');

class SeoModelMetaManager extends TabularInputManagerEx
{
    public $class = 'SeoModelMeta';

    public $model;
    public $dependantAttr = 'seo_model_id';

    /**
     * @static
     * @param $model
     * @return SeoModelMetaManager
     */
    public static function load($model, $__CLASS__=__CLASS__)
    {
        $instance = new self();
        $instance->model = $model;
        $instance->fetchItems();
        return $instance;
    }
}