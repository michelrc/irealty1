<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

    <link rel="stylesheet" href="<?php echo thu('css/normalize.css');?>">
    <!-- Use the .htaccess and remove these lines to avoid edge case issues. More info: h5bp.com/b/378 -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">


    <?php $this->widget('application.modules.irseo.widgets.IRSeo'); ?>
    <?php
    cs()->registerCssFile(thu('css/unicorn.main.css'));
    cs()->registerCssFile(thu('css/unicorn.grey.css'));
    cs()->registerCssFile(thu('css/jquery.gritter.css'));


    ?>

    <script src="<?php echo thu('js/modernizr-2.6.2.js'); ?>"></script>
</head>
<body>




<div id="header">
    <h1><a href="#"><?php echo app()->name; ?></a></h1>
</div>

<div id="user-nav" class="navbar navbar-inverse">
    <?php $this->widget('ext.unicorn.widgets.IRUserMenu', array(
        'items' => Menus::userMenu(),
    )) ?>
</div>

<div id="sidebar">
    <a href="#" class="visible-phone"><i class="icon-home"></i> Menu</a>
    <?php $this->widget('ext.unicorn.widgets.IRSideMenu', array(
        'items' => Menus::sideMenu(),
    ))?>

</div>

<div id="content">
    <div id="content-header">
        <h1>
            <?php echo $this->title;?>
        </h1>
        <?php $this->widget('ext.unicorn.widgets.IRContentButtons', array(
            'items' => Menus::contentButtons(),
        )) ?>
    </div>
    <?php if(isset($this->breadcrumbs)):?>
        <?php $this->widget('ext.unicorn.widgets.IRBreadcrumb', array(
            'htmlOptions'=>array('id' => 'breadcrumb'),
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
    <?php endif?>
    <!--div id="breadcrumb">
        <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a>
        <a href="#">Sample Pages</a>
        <a href="#" class="current">Invoice</a>
    </div-->
    <div class="container-fluid">

        <div class="row-fluid">
            <div class="span12">

                <?php
                echo $content; ?>
            </div>
        </div>
        <div class="row-fluid">
            <div id="footer" class="span12">
                <p>Powered by <?php echo el('iReevo', "http://www.ireevo.com/")?>.</p>
            </div>
        </div>
    </div>
</div>

<?php
cs()->registerScriptFile(thu('js/jquery.gritter.js'), CClientScript::POS_END);
cs()->registerScriptFile(thu('js/unicorn.js'), CClientScript::POS_END);
//cs()->registerScriptFile(thu('js/jquery.ias.js'), CClientScript::POS_END);

?>
<?php
$flashes = user()->flashes;
foreach($flashes as $key => $message){
    $icons = param('flash.icons');
    $icon = $icons[$key];
    cs()->registerScript('gritter_flash', <<<JS
    $.gritter.add({
        text:	'<i class="icon-$icon"></i> $message',
        sticky: false
    });
JS
        , CClientScript::POS_READY);

}
?>
</body>
</html>
