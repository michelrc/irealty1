<?php
//require_once 'Zend/Http/Client.php';

/**
 * This is the shortcut to DIRECTORY_SEPARATOR
 */
defined('DS') or define('DS',DIRECTORY_SEPARATOR);
defined('VOID_LINK') or define('VOID_LINK','javascript:void(0);');

function grid_link($selector, $gridId, $id){
    $script = <<<SCRIPT
            $(document).ready(function() {
                $('{$selector}').live('click', function(e) {
                    var link    = $(this).attr('href');
                    $.ajax({
                        cache: false,
                        dataType: 'json',
                        type: 'get',
                        url: link,
                        success: function(data) {
                            \$.fn.yiiGridView.update('$gridId');
                        }

                    });
                    return false;
                });

            });
SCRIPT;

    Yii::app()->clientScript->registerScript(__CLASS__ . "#{$id}", $script, CClientScript::POS_END);
}

/**
 * @return IrseoModule
 */
function seo(){
    return mod('irseo');
}


/**
 * @return IrtextModule
 */
function text(){
    return mod('irtext');
}


function adminMenus(){
    $modules = app()->getModules();
    $menus = array();
    foreach($modules as $module=>$config){
        /** @var $module CModule */
        $menus = CMap::mergeArray($menus, ycm()->moduleMenu($module));
    }
    return $menus;
}

function nl2p($text){
    $lines = explode("\n", $text);
    return implode('', array_map(function($item){
        return "<p>$item</p>";
    }, $lines));
}

function lookupYesNo()
{
    return array(1=>Yii::t("core", "Yes"), 0=>Yii::t("core", "No"));
}

function firstOf(){
    $args = func_get_args();
    foreach($args as $arg){
        if($arg != null)
            return $arg;
    }
}

function error_tooltip($model, $attr){
    return CMap::mergeArray(array(
        'placeholder' => $model->getAttributeLabel($attr),
    ), $model->hasErrors($attr)?array(
        'rel' => 'tooltip',
        'title' => $model->getError($attr)
    ):array());
}

function ycm_url($name){
    return ycm()->url_list($name);
}

function ycm_active($name){
    return ycm()->admin_active($name);
}

/**
 * @return YcmModule
 */
function ycm(){
    return mod('ycm');
}

/**
 * @return AuthModule
 */
function auth(){
    return mod('auth');
}


/**
 * This is the shortcut to Yii::app()
 * @return CApplication
 */
function app()
{
    return Yii::app();
}
 
/**
 * This is the shortcut to Yii::app()->clientScript
 * @return CClientScript
 */
function cs()
{
    // You could also call the client script instance via Yii::app()->clientScript
    // But this is faster
    return Yii::app()->getClientScript();
}

/**
 * @return CCache
 */
function cache($force=true){
    return Yii::app()->cache?Yii::app()->cache:new CDummyCache();
}
 
/**
 * This is the shortcut to Yii::app()->user.
 * @return AuthWebUser
 */
function user() 
{
    return Yii::app()->getUser();
}

/**
 * Check user access to dtermined resources
 */
function access(){
	$pars = func_get_args();
	return call_user_func_array(array(user(), 'checkAccess'), $pars);
}


/**
 * This is the shortcut to Yii::app()->createUrl()
 */
function url($route,$params=array(),$ampersand='&')
{
    return Yii::app()->createUrl($route,$params,$ampersand);
}

function nurl($url){
    return CHtml::normalizeUrl($url);
}
 
/**
 * This is the shortcut to CHtml::encode
 */
function h($text)
{
    return htmlspecialchars($text,ENT_QUOTES,Yii::app()->charset);
}
 
/**
 * This is the shortcut to CHtml::link()
 */
function l($text, $url = '#', $htmlOptions = array()) 
{
    return CHtml::link($text, $url, $htmlOptions);
}


/**
 * This is the shortcut to Yii::t() with default category = 'stay'
 */
function t($message, $category = TextCategories::LABEL, $params = array(), $source = null, $language = null)
{
    return Yii::t($category, $message, $params, $source, $language);
}
 
/**
 * This is the shortcut to Yii::app()->request->baseUrl
 * If the parameter is given, it will be returned and prefixed with the app baseUrl.
 */
function bu($url=null) 
{
	static $baseUrl;
    if ($baseUrl===null)
        $baseUrl=Yii::app()->getRequest()->getBaseUrl();
    return $url===null ? $baseUrl : $baseUrl.'/'.ltrim($url,'/');
}

function thu($url=null)
{
    static $baseUrl;
    if ($baseUrl===null)
        $baseUrl=Yii::app()->theme->baseUrl;
    return $url===null ? $baseUrl : $baseUrl.'/'.ltrim($url,'/');
}


/**
	 * Retrieves the named application module.
	 * The module has to be declared in {@link modules}. A new instance will be created
	 * when calling this method with the given ID for the first time.
	 * @param string $id application module ID (case-sensitive)
	 * @return CModule the module instance, null if the module is disabled or does not exist.
	 */
function mod($id=null){
	return Yii::app()->getModule($id);
}
 
/**
 * Returns the named application parameter.
 * This is the shortcut to Yii::app()->params[$name].
 */
function param($name) 
{
    return Yii::app()->params[$name];
}

/**
 * Return the representation of the data
 * @param mixed $target
 */
function dump($target)
{
  return CVarDumper::dump($target, 10, true) ;
}

/**
 * Return the representation of the data
 * @param mixed $target
 */
function ddump($target, $deep=10)
{
  die(CVarDumper::dump($target, $deep, true)) ;
}

/**
 * @param $text
 * @param null $length
 * @return string
 */
function textLimit($text, $length=null){
    if (null == $length){
        $length = param('defaultGridTextLimit');
    }
    if (strlen($text) > $length){
        $text = substr($text, 0, $length) . '...';
    }
    return $text;
}


/**
 * Retorna un script listo para poner en un onclick de un link
 * para que este se habra en otra ventana
 * @param $url
 * @return string
 */
function escript($url){
    /** @var $cs CClientScript */
    $cs = Yii::app()->clientScript;
    $js = <<<JS
window.External = {} || window.External;
window.External.open = function(url){
    window.open(url, "_newtab");
    return false;
}
JS;

    $cs->registerScript('external-url', $js);
    return "return window.External.open('$url');";
}

/**
 * Retorna un link que se habre en otra ventana
 * @param $label
 * @param $url
 * @param array $options
 * @return string
 */
function el($label, $url, $options=array()){
    $options['onClick'] = escript($url);
    $options['rel'] = 'external';
    return CHtml::link($label, $url, $options);
}


/**
 * @param string $url
 * @return Zend_Http_Client
 */
/*
 * function http_client($url){
    return new Zend_Http_Client($url, param('zend.proxy'));
}
*/

/*
 * returna uid
 */
function rand_guid(){
    if (function_exists('com_create_guid')){
        return com_create_guid();
    }else{
        mt_srand((double)microtime()*10000);//optional for php 4.2.0 and up.
        $charid = strtoupper(md5(uniqid(rand(), true)));
        $hyphen = chr(45);// "-"
        $uuid = chr(123)// "{"
            .substr($charid, 0, 8).$hyphen
            .substr($charid, 8, 4).$hyphen
            .substr($charid,12, 4).$hyphen
            .substr($charid,16, 4).$hyphen
            .substr($charid,20,12)
            .chr(125);// "}"
        return $uuid;
    }
}

/*
 * retorna un uid
 */
 function rand_uniqid() {
    return sprintf('%04x%04x-%04x-%03x4-%04x-%04x%04x%04x',
        mt_rand(0, 65535), mt_rand(0, 65535), // 32 bits for "time_low"
        mt_rand(0, 65535), // 16 bits for "time_mid"
        mt_rand(0, 4095),  // 12 bits before the 0100 of (version) 4 for "time_hi_and_version"
        bindec(substr_replace(sprintf('%016b', mt_rand(0, 65535)), '01', 6, 2)),
        mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535) // 48 bits for "node"
    );
}
/*
 * retorna un pasword aleatorio por defecto tiene 6 caracteres
 */
function randomPassword($length=6){
    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPRQSTUVWXYZ0123456789";
    $code = "";
    $clen = strlen($chars) - 1;  //a variable with the fixed length of chars correct for the fence post issue
    while (strlen($code) < $length) {
        $code .= $chars[mt_rand(0,$clen)];  //mt_rand's range is inclusive - this is why we need 0 to n-1
    }
    return $code;
}