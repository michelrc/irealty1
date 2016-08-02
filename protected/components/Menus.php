<?php
/**
 * Class Menus
 * Esta clase se encarga de implementar un método por cada menú que tenga la administración
 */
class Menus {

    public static function userMenu(){
        return array(
            array(
                'icon' => 'user',
                'label' => user()->isGuest?'':UserModule::user()->getFullName(),
                'url' => array('/user/profile/profile'),
                'visible' => !user()->isGuest,
            ),
            array(
                'icon' => 'signout',
                'label' => t('Salir'),
                'url' => array('/user/logout'),
                'visible' => !user()->isGuest,
            ),
            array(
                'icon' => 'signin',
                'label' => t('Login'),
                'url' => array('/user/login/login'),
                'visible' => user()->isGuest,
            ),
        );
    }

    public static function contentButtons(){
        return array(
           /* array(
                'url' => array('/user/admin/admin'),
                'icon' => 'group',
                'title' => t('Administrar Usuarios'),
                'visible' => user()->checkAccess('User.list'),
            ),
            array(
                'url' => array('/irtext/default/admin'),
                'icon' => 'globe',
                'title' => t('Administrar Textos'),
                'visible' => user()->checkAccess('IRSourceMessage.list'),
                'label' => '5',
                'labelType' => 'important',
            ),*/
        /*    array(
                'url' => array('/irseo/default/admin'),
                'icon' => 'leaf',
                'title' => t('Administrar SEO'),
                'visible' => user()->checkAccess('SeoUrl.list'),
                /*'label' => '5',
                'labelType' => 'important',
            ),*/
        /*    array(
                'url' => array('/frontend/default/index'),
                'icon' => 'home',
                'title' => t('FrontEnd'),
                'visible' => user()->checkAccess('User.list'),
            ),*/
        );
    }

    public static function sideMenu(){

        $menu = CMap::mergeArray(
            array(
                array('label'=>t('Home'), 'icon'=>'home',
                    'url'=>array('/site/index'),
                ),
            ),
            adminMenus()
        );



        return CMap::mergeArray($menu, array(
            array(
                'url' => '#',
                'icon' => 'briefcase',
                'label' => t('Administration'),
//                'visible' => UserModule::user()->id,
                'visible' => user()->checkAccess('User Management'),
                'items' => array(
                    array(
                        'icon' => 'flag',
                        'label' => t('Language'),
                        'url' => array('/i18n/language/admin'),
                        'visible' => user()->isAdmin,
                        'active' => Yii::app()->controller->module->id === 'entity',
                    ),
                    array(
                        'icon' => 'flag',
                        'label' => t('Currency'),
                        'url' => array('/theme/currency/admin'),
                        'visible' => user()->isAdmin,
                        'active' => Yii::app()->controller->module->id === 'entity',
                    ),
                    array(
                        'icon' => 'flag',
                        'label' => t('General tracking code'),
                        'url' => array('/theme/generalTrackingCodes/admin'),
                        'visible' => user()->isAdmin,
                        'active' => Yii::app()->controller->module->id === 'theme' && Yii::app()->controller->id === 'generalTrackingCodes',
                    ),
                    array(
                        'icon' => 'user',
                        'label' => t('Users'),
                        'url' => array('/user/admin/admin'),
                        'visible' => user()->checkAccess('User Management'),
                        'active' => Yii::app()->controller->module->id === 'user' && Yii::app()->controller->id === 'admin',
                    ),
                    array(
                        'icon' => 'flag',
                        'label' => t('Operations'),
                        'url' => array('/auth/operation'),
                        'visible' => user()->isAdmin,
                        'active' => Yii::app()->controller->module->id === 'user' && Yii::app()->controller->id === 'admin',
                    ),
                    array(
                        'icon' => 'flag',
                        'label' => t('Assignment'),
                        'url' => array('/auth/assignment/index'),
                        'visible' => user()->isAdmin,
                        'active' => Yii::app()->controller->module->id === 'user' && Yii::app()->controller->id === 'admin',
                    ),
                    /*array(
                        'icon' => 'globe',
                        'label' => t('Textos'),
                        'url' => array('/irtext/default/admin'),
                        'active' => Yii::app()->controller->module->id === 'irtext' && Yii::app()->controller->id === 'default',
                        'visible' => user()->isAdmin,
                    ),*/
                   /* array(
                        'icon' => 'user',
                        'label' => t('Autenticación Hibrida'),
                        'url' => array('/user/login/oauthadmin'),
                        'active' => Yii::app()->controller->module->id === 'user' && Yii::app()->controller->id === 'admin',
                    ),*/
                ),
            ),
            array(
                'url' => '#',
                'icon' => 'user',
                'label' => user()->isGuest?t('User'):UserModule::user()->getFullName(),
                'visible' => !user()->isGuest,
                'items' => array(
                    array(
                        'icon' => 'user',
                        'label' => t('Profile'),
                        'url' => array('/user/profile/profile'),
                        'visible' => !user()->isGuest,
                    ),
                    array(
                        'icon' => 'pencil',
                        'label' => t('Edit'),
                        'url' => array('/user/profile/edit'),
                        'visible' => !user()->isGuest,
                    ),
                    array(
                        'icon' => 'ok',
                        'label' => t('Change password'),
                        'url' => array('/user/profile/changePassword'),
                        'visible' => !user()->isGuest,
                    ),
                    array(
                        'icon' => 'signout',
                        'label' => t('Salir'),
                        'url' => array('/user/logout'),
                        'visible' => !user()->isGuest,
                    ),
                    array(
                        'icon' => 'signin',
                        'label' => t('Login'),
                        'url' => array('/user/login/login'),
                        'visible' => user()->isGuest,
                    ),
                    array(
                        'icon' => 'ok',
                        'label' => UserModule::t('Registration'),
                        'url' => array('/user/registration/registration'),
                        'visible' => user()->isGuest,
                    ),
                    array(
                        'icon' => 'ok',
                        'label' => UserModule::t('Lost Password?'),
                        'url' => array('/user/recovery/recovery'),
                        'visible' => user()->isGuest,
                    ),
                ),
            ),
        ));
    }
}