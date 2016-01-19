<?php

// This is the configuration for yiic console application.
// Any writable CConsoleApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
    'name'=>'Progol',
    'language'=>'es',

    'aliases' => array(
        'i18n' => 'application.modules.i18n',
        'theme' => 'application.modules.theme',
    ),
    'import'=>array(
        'application.models.*',
        'application.components.*',

        'application.modules.theme.models.*',
        'application.modules.theme.models._base*',
        'application.modules.theme.controllers.*',

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
        'ext.unicorn.components.*',
        'ext.quickdlgs.*',
        'ext.bootstrap.helpers.TbHtml',
        'ext.application.extensions.bootstrap.widgets.TbForm',
        'ext.bootstrap.components.*',
        'ext.giix-components.*',
    ),

	// preloading 'log' component
	'preload'=>array('log'),

	// application components
	'components'=>array(
        'messagesPhp'=>array(
            'class'=>'CPhpMessageSource',
        ),
        'messages'=>array(
            'class'=>'CDbMessageSource',
            'onMissingTranslation' => array('MissingMessages', 'load')
        ),
        'format'=>array(
            'class'=>'application.extensions.timeago.TimeagoFormatter',
        ),
        'image'=>array(
            'class'=>'application.extensions.image.CImageComponent',
            // GD or ImageMagick
            'driver'=>'GD',
        ),
        // uncomment the following to enable URLs in path-format
        'urlManager'=>array(
            'showScriptName' => false,
            'urlFormat'=>'path',
            'rules'=>require(__DIR__.DS.'routes.php'),
        ),
        'db'=>require(__DIR__.DS.'db.php'),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
			),
		),
	),
    'modules'=>array(
        'frontend',
        'theme',
        'i18n',
        'progol',
        'irtext' => array(
            'languages' => array(
                'es' => 'Español',
            )
        ),
        'seo',
        'ycm'=>array(
            'username'=>'admin',
            'password'=>'admin',
            'registerModels'=>array(
            ),
            'uploadCreate'=>true, // create upload folder automatically
            'redactorUpload'=>true, // enable Redactor image upload
        ),

    ),
    'params'=>require(__DIR__.DS.'params.php'),
);