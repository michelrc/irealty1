<?php

class SeoModule extends CWebModule
{
    public $tableSeoModel = 'seo_model';
    public $tableSeoModelMeta = 'seo_model_meta';
    public $translate;

    public function getName()
    {
        return 'SEO Generic';
    }

    /**
     * @return bool weather or not the seo urls must be translated
     */
    public function getTranslatable()
    {
        if ($this->translate !== null) {
            return $this->translate;
        } else {
            return count(Language::getLanguageCodes()) > 1;
        }
    }

    public function init()
    {
        // this method is called when the module is being created
        // you may place code here to customize the module or the application

        $this->attachBehavior('ycm', array(
            'class' => 'application.components.ModuleBehavior'
        ));

        // import the module-level models and components
        $this->setImport(array(
            'seo.models.*',
            'seo.components.*',
        ));
    }

    public function beforeControllerAction($controller, $action)
    {
        if (parent::beforeControllerAction($controller, $action)) {
            // this method is called before any module controller action is performed
            // you may place customized code here
            return true;
        } else
            return false;
    }

    public function getAdminMenus()
    {
        parent::getAdminMenus();

        $menu = array(
            array(
                'url' => '#',
                'icon' => 'tags',
                'label' => Yii::t('sideMenu', 'Seo'),
                'visible' => user()->isAdmin,
                'items' => array(
//                    array(
//                        'icon' => 'star',
//                        'label' => Yii::t('sideMenu', 'Seo Model'),
//                        'url' => array('/seo/model/admin'),
//                        'active' => Yii::app()->controller->module->id == 'seo' && Yii::app()->controller->id == 'model',
//                    ),
                    array(
                        'icon' => 'link',
                        'label' => Yii::t('sideMenu', 'Url Rules'),
                        'url' => array('/seo/url/admin'),
                        'visible' => user()->isAdmin,
                        'active' => Yii::app()->controller->module->id == 'seo' && Yii::app()->controller->id == 'url',
                    ),
                ),
            ),

        );
        return $menu;
    }
}
