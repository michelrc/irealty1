<?php

Yii::import('seo.models._base.BaseSeoModel');

setlocale(LC_ALL, 'en_US.UTF8');

class SeoModel extends BaseSeoModel
{
    /**
     * Admin variables (ycm module)
     */
    public $adminNames = array('SeoModels', 'seomodel', 'seomodels', 'SeoModel');
    public $downloadExcel = false;
    public $downloadMsCsv = false;
    public $downloadCsv = false; // admin interface, singular, plural

    /**
     * @param string $className
     * @return SeoModel
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    } // Download Excel

    /**
     * Es llamado para saber si se muestra o no la administracion de este modelo
     * usar en conjunto con los permisos
     * @return boolean
     */
    public function hasAdmin()
    {
        return false;
    } // Download MS CSV

    public function getSeoUrl($lang = null)
    {
        $lang = $lang ? $lang : Yii::app()->language;
        $defaultLanguage = Yii::app()->sourceLanguage;
        $defaultCode = explode('_', $defaultLanguage);
        $defaultCode = $defaultCode[0];

        $instance = $this->getRelatedInstance();
        $params = $this->getInstanceReplacementAttributes($instance);

        $model_lang = $this->getTranslationModel($lang);

        $url = strtr($model_lang->url, $params);

        if (Yii::app()->getModule('seo')->translatable) {
            return $url ? "$lang/$url" : false;
        } else {
            return $url ? $url : false;
        }
    } // Download CSV

    /**
     * Config for attribute widgets (ycm module)
     *
     * @return array
     */
    public function attributeWidgets()
    {
        return array(
            array('url', 'textField'),
            array('title', 'textField'),
            array('description', 'textField'),
            array('keywords', 'textField'),
            array('modelClassName', 'textField'),
        );
    }


    /**
     * Config for TbGridView class (ycm module)
     *
     * @return array
     */
    public function adminSearch()
    {
        return array(
            'columns' => array(
                'url',
                'title',
                'description',
                'keywords',
                'modelClassName',
            ),
        );
    }


    /**
     * Config for TbDetailView class (ycm module)
     *
     * @return array
     */
    public function details()
    {
        return array(
            'attributes' => array(
                'url',
                'title',
                'description',
                'keywords',
                'modelClassName',
            ),
        );
    }


}