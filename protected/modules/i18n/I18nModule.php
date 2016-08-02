<?php


class I18nModule extends CWebModule
{

    public function init()
    {

        /** @var $user VimenpackWebUser */
        $user = Yii::app()->user;

        $this->attachBehavior('module', array(
            'class' => 'application.components.ModuleBehavior'
        ));


        /*if ($user->checkAccess('Is Operator')){
            Yii::app()->errorHandler->errorAction = '//' . $this->id . '/' . $this->defaultController . '/error';
        }*/

        // this method is called when the module is being created
        // you may place code here to customize the module or the application

        // import the module-level models and components
        $this->setImport(array(
            'i18n.models.*',
            'i18n.components.*',
            'i18n.components.adapters.*',
            'i18n.extensions.widgets.*',
        ));
    }

    /*
        public static function getNavigation(){
            return array('label' => Yii::t('admin', 'Language'), 'icon' => 'globe', "url" => array('//i18n'), 'count'=>Language::model()->count(),  'items'=>array(
                array('label' => Language::label(2), 'url' => array('//i18n/language/admin'), 'icon'=>'flag', 'active'=>strpos(Yii::app()->controller->route, 'i18n/language')!==false),
                array('label' => Yii::t('admin', 'Translations'), 'url' => array('//i18n/source/index'), 'icon'=>'exchange', 'active'=>strpos(Yii::app()->controller->route, 'i18n/source')!==false),
                array('label' => Yii::t('admin', 'Categories'), 'url' => array('//i18n/category/admin'), 'icon'=>'tags', 'active'=>strpos(Yii::app()->controller->route, 'i18n/category')!==false),
            ));
        }*/

    public function getAdminMenus()
    {

        parent::getAdminMenus();

        $menu = array(
            array(
                'url' => '#',
                'icon' => 'globe',
                'label' => 'Traducciones',
                'visible' =>user()->isAdmin,
                'items' => array(
//                    array(
//                        'icon' => 'info-sign',
//                        'label' => Yii::t('sideMenu', 'Idiomas'),
//                        'url' => array('/i18n/language/admin'),
//                        'active' => Yii::app()->controller->module->id == 'i18n' && Yii::app()->controller->id == 'language',
//                    ),
                    array(
                        'icon' => 'globe',
                        'label' => Yii::t('sideMenu', 'Traducciones'),
                        'url' => array('/i18n/source/admin'),
                         'visible' => user()->isAdmin,
                        'active' => Yii::app()->controller->module->id === 'i18n' && Yii::app()->controller->id === 'source',
                    ),
//                    array(
//                        'icon' => 'list-alt',
//                        'label' => Yii::t('sideMenu', 'Categorías'),
//                        'url' => array('/i18n/category/admin'),
//                        'active' => Yii::app()->controller->module->id == 'i18n' && Yii::app()->controller->id == 'category',
//                    ),

                ),
            ),


        );
        return $menu;
    }
}
