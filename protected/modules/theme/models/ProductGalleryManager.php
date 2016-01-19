<?php

Yii::import('ext.components.TabularInputManagerEx');

class ProductGalleryManager extends TabularInputManagerEx
{
    public $class = 'PropertyGallery';

    public $model;
    public $dependantAttr = 'property';

    /**
     * @static
     * @param $model
     * @return TourDateManager
     */
   
    public static function load($model, $__CLASS__=__CLASS__)
    {
        $instance = new self();
        $instance->model = $model;
        $instance->fetchItems();
        return $instance;
    }
}
