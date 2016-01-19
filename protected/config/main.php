<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
ob_start('My_OB');
function My_OB($str, $flags){
    //remove UTF-8 BOM
    $str = preg_replace("/\xef\xbb\xbf/","",$str);
    return $str;
}

return array(
    'defaultController'=>'frontend',
    'homeUrl' => '/frontend/default/index',
	'basePath'=>__DIR__.DS.'..',
	'name'=>'IRealty.com',

    'theme' => 'unicorn',
    'language'=>'es',

	// preloading 'log' component
    'preload'=>array('log', 'bootstrap', 'languageSwitcher'),

    'aliases' => array(
            'i18n' => 'application.modules.i18n',
            'bootstrap' => 'application.extensions.bootstrap',
        ),


	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
        'ext.YiiMailer.YiiMailer',


       //back button widget
        'application.extensions.data.EBackButtonWidget',

        //module to rating management
//        'application.modules.PcStarRank.*',
//        'application.modules.PcStarRank.models.*',
//        'application.modules.PcStarRank.controllers.*',
//        'application.modules.PcStarRank.components.*',
//        'application.modules.PcStarRank.extensions.PcStarRankWidget.*',


        'application.modules.theme.models.*',
        'application.modules.theme.validators.*',
//        'application.modules.entity.models.*',
       // 'application.modules.theme.components.*',

        'application.modules.irtext.IrtextModule',
        'application.modules.irtext.models.*',
        'application.modules.irtext.components.*',

        'application.modules.seo.models.*',
        'application.modules.seo.components.*',

        'application.modules.i18n.models.*',
        'application.modules.i18n.components.*',

        'application.modules.ycm.models.*',
        'application.modules.ycm.components.*',

        'application.modules.user.models.*',
        'application.modules.user.components.*',
        'application.modules.user.UserModule',
        'application.modules.ycm.YcmModule',
        'application.modules.auth.AuthModule',
        'ext.unicorn.components.*',
        'ext.quickdlgs.*',
        'ext.bootstrap.helpers.TbHtml',
        'ext.bootstrap.widgets.TbForm',
        'ext.bootstrap.widgets.*',
        'ext.bootstrap.components.*',
        'ext.giix-components.*',
	),

	'modules'=>array(
        'frontend',
        'theme',
        'i18n',
//        'entity',
        'irtext' => array(
            'languages' => array(
                'es' => 'Español',
                'en' =>  'English',
            )
        ),


        'seo',
        'ycm'=>array(
            'uploadCreate'=>true, // create upload folder automatically
            'redactorUpload'=>true, // enable Redactor image upload
        ),

        'auth' => array(
            'strictMode' => true, // when enabled authorization items cannot be assigned children of the same type.
            'userClass' => 'User', // the name of the user model class.
            'userIdColumn' => 'id', // the name of the user id column.
            'userNameColumn' => 'email', // the name of the user name column.
            'defaultLayout' => '//layouts/main', // the layout used by the module.
            'viewDir' => null, // the path to view files to use with this module.
        ),

        'user' => array(
            'activeAfterRegister' => true,
            'sendActivationMail'  => true,
           // 'sendActivationMail'  => true,
            'loginUrl' => array('/user/login'),
            'profileUrl' => array('/user/profile/profile'),
            'captcha' => array('registration'=>true),
        ),
		// uncomment the following to enable the Gii tool
		'gii'=>array(
            'class' => 'system.gii.GiiModule',
            'password'=>'admin',
            // If removed, Gii defaults to localhost only. Edit carefully to taste.
            'ipFilters'=>array('127.0.0.1','::1'),
            'generatorPaths' => array(
                'ext.giix-core', // giix generators
                'bootstrap.gii',
            ),
        ),
	),

	// application components
	'components'=>array(
        'authManager' => array(
            'class'=>'auth.components.CachedDbAuthManager',
            'cachingDuration'=>3600,
            'itemTable' => 'authitem',
            'itemChildTable' => 'authitemchild',
            'assignmentTable' => 'authassignment',
            'behaviors' => array(
                'auth' => array(
                    'class' => 'auth.components.AuthBehavior',
                ),
            ),
        ),
        'languageSwitcher'=>array(
                    'class'=>'application.modules.frontend.components.LanguageSwitchComponent'
                ),

        'messagesPhp'=>array(
            'class'=>'CPhpMessageSource',
            'forceTranslation'=>true,
        ),
        'messages' => array(
            'class' => 'CDbMessageSource',
            'forceTranslation' => true,
            'sourceMessageTable' => 'i18n_source',
            'translatedMessageTable' => 'i18n_message',
            'onMissingTranslation' => array('I18NMissingMessages', 'load'),
        ),
        'format'=>array(
            'class'=>'application.extensions.timeago.TimeagoFormatter',
        ),
        'image'=>array(
            'class'=>'application.extensions.image.CImageComponent',
            // GD or ImageMagick
            'driver'=>'GD',
        ),
        'widgetFactory'=>array(
            'widgets'=>array(
                'IRBox' => array(
                    'htmlContentOptions' => array(
                        'class' => 'nopadding',
                    ),
                    'headerIcon' => 'list',

                ),
                'TbDatePicker'=>array(
                    'options' => array(
                        'format' => 'yyyy-mm-dd',
                    ),

                ),
                'TbGridView'=>array(
                    'itemsCssClass' => 'table table-nomargin table-bordered table-pagination',
                    'selectableRows'=>2,
                    'nullDisplay'=> '<i class="icon-question-sign"></i>',

                ),
                'TbDetailView'=>array(
                    'type' => 'bordered striped condensed hover',
                    'nullDisplay'=> '<i class="icon-question-sign"></i>',
                ),
                'CGridColumn'=>array(

                    'nullDisplay'=> '<i class="icon-question-sign"></i>',
                ),
                'TbEditableColumn'=>array(
                    'editable'=>array(
                        'emptytext'=> '<i class="icon-question-sign"></i>',
                    )
                ),
                'grid-view' =>array(
                    'nullDisplay'=> '<i class="icon-question-sign"></i>',
                ),
                'TbActiveForm'=>array(
                    'enableClientValidation'=>false,
                    'clientOptions'=>array(
                        'validateOnSubmit'=>false,
                    ),
                    'type'=>'horizontal',
                        'htmlOptions' => array(
                        'enctype'=>'multipart/form-data',
                        'class' => 'form-bordered'
                    )
                ),

            ),
        ),
        'bootstrap'=>array(
            //'class' => 'Bootstrap',
            'class'=> 'ext.bootstrap.components.Booster',
            'fontAwesomeCss' => true,
            'responsiveCss' => true,
            'tooltipSelector' => '.tip',
        ),

        'cache' => extension_loaded('apc') ?
            array(
                'class' => 'CApcCache',
            ) :
            array(
                'class' => 'CDbCache',
                'connectionID' => 'db',
                'autoCreateCacheTable' => true,
                'cacheTableName' => 'cache',
            ),

        'contentCache' => array(
            'class' => 'CDbCache',
            'connectionID' => 'db',
            'autoCreateCacheTable' => true,
            'cacheTableName' => 'cache',
        ),

        'user' => array(
            'class' => 'auth.components.AuthWebUser',
            'admins' => array('admin'), // users with full access
            'allowAutoLogin'=>true,
            'loginUrl' => array('/user/login'),
        ),

		// uncomment the following to enable URLs in path-format
        'urlManager' => array(
            'class' => 'seo.components.SeoUrlManager',
        ),
		'db'=>require(__DIR__.DS.'db.php'),
        'errorHandler'=>array(
            'errorAction' => 'frontend/default/error'
        ),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
				// uncomment the following to show log messages on web pages
				/*
				array(
					'class'=>'CWebLogRoute',
				),
				*/
			),
		),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>require(__DIR__.DS.'params.php'),
);
