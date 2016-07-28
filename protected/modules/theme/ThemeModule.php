<?php

class ThemeModule extends CWebModule
{
    public function getName()
    {
        return 'Theme';
    }

    public function init()
    {
        // this method is called when the module is being created
        // you may place code here to customize the module or the application

        $this->attachBehavior('ycm', array(
            'class' => 'ycm.behaviors.YModuleBehavior'
        ));

        // import the module-level models and components
        $this->setImport(array(
            'theme.models.*',
            'theme.components.*',
        ));
    }

    public function getAdminMenus()

    {
        parent::getAdminMenus();
        $menu = array(
            array(
                'url' => '#',
                'icon' => 'info-sign',
                'label' => Yii::t('sideMenu', 'General config'),
                'visible' => user()->isAdmin,
                'items' => array(
                    array(
                        'icon' => 'info-sign',
                        'label' => Yii::t('sideMenu', 'Company info'),
                        'url' => array('/theme/companyInfo/admin'),
                        'active' => Yii::app()->controller->module->id == 'theme' && Yii::app()->controller->id == 'companyInfo',
                        'visible' => user()->isAdmin,
                    ),
                    array(
                        'icon' => 'info-sign',
                        'label' => Yii::t('sideMenu', 'Province'),
                        'url' => array('/theme/province/admin'),
                        'active' => Yii::app()->controller->module->id == 'theme' && Yii::app()->controller->id == 'province',
                        'visible' => user()->isAdmin,
                    ),
                    array(
                        'icon' => 'info-sign',
                        'label' => Yii::t('sideMenu', 'Newsletter section'),
                        'url' => array('/theme/newsletterSection/admin'),
                        'active' => Yii::app()->controller->module->id == 'theme' && Yii::app()->controller->id == 'newsletterSection',
                        'visible' => user()->isAdmin,
                    ),
                    array(
                        'icon' => 'info-sign',
                        'label' => Yii::t('sideMenu', 'Subscribers list'),
                        'url' => array('/theme/newsletter/admin'),
                        'active' => Yii::app()->controller->module->id == 'theme' && Yii::app()->controller->id == 'newsletter',
                        'visible' => user()->isAdmin,
                    ),
                    array(
                        'icon' => 'info-sign',
                        'label' => Yii::t('sideMenu', 'Social networks'),
                        'url' => array('/theme/socialNetworks/admin'),
                        'active' => Yii::app()->controller->module->id == 'theme' && Yii::app()->controller->id == 'socialNetworks',
                        'visible' => user()->isAdmin,
                    ),
                    array(
                        'icon' => 'info-sign',
                        'label' => Yii::t('sideMenu', 'Searcher'),
                        'url' => array('/theme/homePageSearcher/admin'),
                        'active' => Yii::app()->controller->module->id == 'theme' && Yii::app()->controller->id == 'homePageSearcher',
                        'visible' => user()->isAdmin,
                    ),
                    array(
                        'icon' => 'info-sign',
                        'label' => Yii::t('sideMenu', 'Property default image'),
                        'url' => array('/theme/propertyDefaultImage/admin'),
                        'active' => Yii::app()->controller->module->id == 'theme' && Yii::app()->controller->id == 'propertyDefaultImage',
                        'visible' => user()->isAdmin,
                    ),
                )),
            array(
                'url' => '#',
                'icon' => 'info-sign',
                'label' => Yii::t('sideMenu', 'Información General'),
                'visible' => user()->isAdmin,
                'items' => array(
                    array(
                        'icon' => 'info-sign',
                        'label' => Yii::t('sideMenu', 'Header'),
                        'url' => array('/theme/navigationMenu/admin'),
                        'active' => Yii::app()->controller->module->id == 'theme' && Yii::app()->controller->id == 'navigationMenu',
                        'visible' => user()->isAdmin,
                    ),
                    array(
                        'icon' => 'info-sign',
                        'label' => Yii::t('sideMenu', 'Footer'),
                        'url' => array('/theme/footerNavigationMenu/admin'),
                        'active' => Yii::app()->controller->module->id == 'theme' && Yii::app()->controller->id == 'footerNavigationMenu',
                        'visible' => user()->isAdmin,
                    )
                )),
            array(
               'url' => '#',
               'icon' => 'info-sign',
               'label' => Yii::t('sideMenu', 'Páginas del Sitio'),
               'visible' => user()->isAdmin,
               'items' => array(
                   array(
                       'icon' => 'info-sign',
                       'label' => Yii::t('sideMenu', 'Home'),
                       'url' => array('/theme/homePageBanner/create'),
                       'active' => Yii::app()->controller->module->id == 'theme' && Yii::app()->controller->id == 'homePageBanner',
                       'visible' => user()->isAdmin,
                   ),
                   array(
                       'icon' => 'info-sign',
                       'label' => Yii::t('sideMenu', 'Contact Us'),
                       'url' => array('/theme/contactUs/admin'),
                       'active' => Yii::app()->controller->module->id == 'theme' && Yii::app()->controller->id == 'contactUs',
                       'visible' => user()->isAdmin,
                   ),
                   array(
                       'icon' => 'info-sign',
                       'label' => Yii::t('sideMenu', 'About us'),
                       'url' => array('/theme/aboutUsPage/admin'),
                       'active' => Yii::app()->controller->module->id == 'theme' && Yii::app()->controller->id == 'aboutUsPage',
                       'visible' => user()->isAdmin,
                   ),
                   array(
                       'icon' => 'info-sign',
                       'label' => Yii::t('sideMenu', 'Terms & Conditions'),
                       'url' => array('/theme/termsConditionPage/admin'),
                       'active' => Yii::app()->controller->module->id == 'theme' && Yii::app()->controller->id == 'termsConditionPage',
                       'visible' => user()->isAdmin,
                   ),
//                   array(
//                       'icon' => 'info-sign',
//                       'label' => Yii::t('sideMenu', 'Propiedades en renta'),
//                       'url' => array('/theme/rentListPageGeneralInfo/admin'),
//                       'active' => Yii::app()->controller->module->id == 'theme' && Yii::app()->controller->id == 'rentListPageGeneralInfo',
//                       'visible' => user()->isAdmin,
//                   ),
//                   array(
//                       'icon' => 'info-sign',
//                       'label' => Yii::t('sideMenu', 'Propiedades en venta'),
//                       'url' => array('/theme/buyListPageGeneralInfo/admin'),
//                       'active' => Yii::app()->controller->module->id == 'theme' && Yii::app()->controller->id == 'buyListPageGeneralInfo',
//                       'visible' => user()->isAdmin,
//                   ),

               )),

            array(
                'url' => '#',
                'icon' => 'info-sign',
                'label' => Yii::t('sideMenu', 'Propiedades'),
                'visible' => user()->isAdmin,
                'items' => array(
                    array(
                        'icon' => 'info-sign',
                        'label' => Yii::t('sideMenu', 'Página propiedades en renta'),
                        'url' => array('/theme/rentListPageGeneralInfo/admin'),
                        'active' => Yii::app()->controller->module->id == 'theme' && Yii::app()->controller->id == 'rentListPageGeneralInfo',
                        'visible' => user()->isAdmin,
                    ),
                    array(
                        'icon' => 'info-sign',
                        'label' => Yii::t('sideMenu', 'Página propiedades en venta'),
                        'url' => array('/theme/buyListPageGeneralInfo/admin'),
                        'active' => Yii::app()->controller->module->id == 'theme' && Yii::app()->controller->id == 'buyListPageGeneralInfo',
                        'visible' => user()->isAdmin,
                    ),
                    array(
                        'icon' => 'info-sign',
                        'label' => Yii::t('sideMenu', 'Property category'),
                        'url' => array('/theme/propertyCategory/admin'),
                        'active' => Yii::app()->controller->module->id == 'theme' && Yii::app()->controller->id == 'propertyCategory',
                        'visible' => user()->isAdmin,
                    ),
                    array(
                        'icon' => 'info-sign',
                        'label' => Yii::t('sideMenu', 'Property condition'),
                        'url' => array('/theme/propertyCondition/admin'),
                        'active' => Yii::app()->controller->module->id == 'theme' && Yii::app()->controller->id == 'propertyCondition',
                        'visible' => user()->isAdmin,
                    ),
                    array(
                        'icon' => 'info-sign',
                        'label' => Yii::t('sideMenu', 'Property type'),
                        'url' => array('/theme/propertyType/admin'),
                        'active' => Yii::app()->controller->module->id == 'theme' && Yii::app()->controller->id == 'propertyType',
                        'visible' => user()->isAdmin,
                    ),
                    array(
                        'icon' => 'info-sign',
                        'label' => Yii::t('sideMenu', 'Properties'),
                        'url' => array('/theme/property/admin'),
                        'active' => Yii::app()->controller->module->id == 'theme' && Yii::app()->controller->id == 'property',
                        'visible' => user()->isAdmin,
                    ),
                )),
            array(
                'url' => '#',
                'icon' => 'info-sign',
                'label' => Yii::t('sideMenu', 'Contents'),
                'visible' => user()->isAdmin,
                'items' => array(
                    array(
                        'icon' => 'info-sign',
                        'label' => Yii::t('sideMenu', 'Article category'),
                        'url' => array('/theme/articleCategory/admin'),
                        'active' => Yii::app()->controller->module->id == 'theme' && Yii::app()->controller->id == 'articleCategory',
                        'visible' => user()->isAdmin,
                    ),
                    array(
                        'icon' => 'info-sign',
                        'label' => Yii::t('sideMenu', 'Article'),
                        'url' => array('/theme/article/admin'),
                        'active' => Yii::app()->controller->module->id == 'theme' && Yii::app()->controller->id == 'article',
                        'visible' => user()->isAdmin,
                    ),
                    array(
                        'icon' => 'info-sign',
                        'label' => Yii::t('sideMenu', 'Testimonials'),
                        'url' => array('/theme/testimonials/admin'),
                        'active' => Yii::app()->controller->module->id == 'theme' && Yii::app()->controller->id == 'testimonials',
                        'visible' => user()->isAdmin,
                    ),
//                    array(
//                        'icon' => 'info-sign',
//                        'label' => Yii::t('sideMenu', 'Property category'),
//                        'url' => array('/theme/propertyCategory/admin'),
//                        'active' => Yii::app()->controller->module->id == 'theme' && Yii::app()->controller->id == 'propertyCategory',
//                        'visible' => user()->isAdmin,
//                    ),
//                    array(
//                        'icon' => 'info-sign',
//                        'label' => Yii::t('sideMenu', 'Property condition'),
//                        'url' => array('/theme/propertyCondition/admin'),
//                        'active' => Yii::app()->controller->module->id == 'theme' && Yii::app()->controller->id == 'propertyCondition',
//                        'visible' => user()->isAdmin,
//                    ),
//                    array(
//                        'icon' => 'info-sign',
//                        'label' => Yii::t('sideMenu', 'Properties'),
//                        'url' => array('/theme/property/admin'),
//                        'active' => Yii::app()->controller->module->id == 'theme' && Yii::app()->controller->id == 'property',
//                        'visible' => user()->isAdmin,
//                    ),
                    array(
                        'icon' => 'info-sign',
                        'label' => Yii::t('sideMenu', 'Agents'),
                        'url' => array('/theme/agent/admin'),
                        'active' => Yii::app()->controller->module->id == 'theme' && Yii::app()->controller->id == 'agent',
                        'visible' => user()->isAdmin,
                    ),
                    array(
                        'icon' => 'info-sign',
                        'label' => Yii::t('sideMenu', 'Amenities'),
                        'url' => array('/theme/amenitie/admin'),
                        'active' => Yii::app()->controller->module->id == 'theme' && Yii::app()->controller->id == 'amenitie',
                        'visible' => user()->isAdmin,
                    ),
//                    array(
//                        'icon' => 'info-sign',
//                        'label' => Yii::t('sideMenu', 'Property type'),
//                        'url' => array('/theme/propertyType/admin'),
//                        'active' => Yii::app()->controller->module->id == 'theme' && Yii::app()->controller->id == 'propertyType',
//                        'visible' => user()->isAdmin,
//                    ),
                )),

        );
        return $menu;
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
}
