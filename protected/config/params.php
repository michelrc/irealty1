<?php
return array(
    // this is used in contact page
    'adminEmail'=>'webmaster@admin.com',

    'seo.defaultKeywords' => '',
    'seo.defaultDescription' => '',

    'flash.icons' => array(
        'success' => 'thumbs-up',
        'info' => 'info-sign',
        'error' => 'ban-circle',
    ),
    'currency.defaults' => array(
        'symbol'=> '$',
        'showSymbol'=> false,
        'symbolStay'=> false,
        'thousands'=> ',',
        'decimal'=> '.',
        'precision'=> 2,
        'defaultZero'=> true,
        'allowZero'=> true,
        'allowNegative'=> false,
    ),

    'timezones'=> require(dirname(__FILE__) . DS .'timezones.php'),


    'ycm.list.defaultGrid' => 'application.extensions.bootstrap.widgets.TbGridView',
    'ycm.model.defaultIcon' => 'star',
);