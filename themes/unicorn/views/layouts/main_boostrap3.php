<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />


    <!-- Use the .htaccess and remove these lines to avoid edge case issues. More info: h5bp.com/b/378 -->

    <?php
    $cs        = Yii::app()->clientScript;
    $themePath = Yii::app()->theme->baseUrl;

    /**
     * StyleSHeets
     */
    $cs->registerCssFile($themePath . '/css/bootstrap.css');
    $cs->registerCssFile($themePath . '/css/bootstrap-theme.css');

    /**
     * JavaScripts
     */
    $cs->registerCoreScript('jquery', CClientScript::POS_END);
    $cs->registerCoreScript('jquery.ui', CClientScript::POS_END);
    $cs->registerScriptFile($themePath . '/js/bootstrap.min.js', CClientScript::POS_END);
    $cs->registerScript('tooltip', "$('[data-toggle=\"tooltip\"]').tooltip();$('[data-toggle=\"popover\"]').tooltip()", CClientScript::POS_READY);
    ?>
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="<?php
echo Yii::app()->theme->baseUrl . '/js/html5shiv.js';
?>"></script>
    <script src="<?php
echo Yii::app()->theme->baseUrl . '/js/respond.min.js';
?>"></script>
    <![endif]-->



    <?php $this->widget('application.modules.irseo.widgets.IRSeo'); ?>
    <?php
    cs()->registerCssFile(thu('css/bootstrap.min.css'));
    cs()->registerCssFile(thu('css/font-awesome.css'));
    cs()->registerCssFile(thu('css/fullcalendar.css'));
    cs()->registerCssFile(thu('css/jquery.jscrollpane.css'));
    cs()->registerCssFile(thu('css/unicorn.css'));


    ?>

    <!--[if lt IE 9]>
    <script type="text/javascript" src="<?php echo thu('js/respond.min.js'); ?>"></script>
    <![endif]-->

</head>
<body data-color="grey" class="flat">
<div id="wrapper">

    <div id="header">
        <h1><a href="#"><?php echo app()->name; ?></a></h1>
        <a id="menu-trigger" href="#"><i class="fa fa-bars"></i></a>

    </div>



    <div id="user-nav">
        <?php if(!user()->isGuest){?>
        <ul class="btn-group">

           <li class="btn btn-inverse dropdown" id="menu-perfil"><a href="/user/profile/profile" data-toggle="dropdown" data-target="#menu-perfil" class="dropdown-toggle"><i class="fa fa-user"></i> <span class="text">Perfil</span> <b class="caret"></b></a>
                <ul class="dropdown-menu messages-menu">

                    <li class="message-item">
                        <a href="/user/profile/profile"><div class="message-content"><i class="fa fa-user"></i><span class="title">Profile</span></div></a>
                    </li>
                    <li class="message-item">
                        <a href="/user/profile/edit"><div class="message-content"><i class="fa fa-edit"></i><span class="title">Editar</span></div></a>
                    </li>
                    <li class="message-item">
                        <a href="/user/profile/changePassword"><div class="message-content"><i class="fa fa-wrench"></i><span class="title">Cambiar Contraseña</span></div></a>
                    </li>



                </ul>

            </li>
            <?php }?>

            <?php if(user()->isAdmin){ ?>

            <li class="btn btn-inverse dropdown" id="menu-administration"><a href="#" data-toggle="dropdown" data-target="#menu-administration" class="dropdown-toggle"><i class="fa fa-briefcase"></i> <span class="text">Administración</span> <b class="caret"></b></a>
                <ul class="dropdown-menu messages-menu">

                    <li class="message-item">
                        <a href="/user/admin/admin"><div class="message-content"><i class="fa fa-user"></i><span class="title">Usuarios</span></div></a>
                    </li>
                    <li class="message-item">
                        <a href="/irtext/default/admin"><div class="message-content"><i class="fa fa-edit"></i><span class="title">Textos</span></div></a>
                    </li>
                    <li class="message-item">
                        <a href="/user/login/oauthadmin"><div class="message-content"><i class="fa fa-wrench"></i><span class="title">Autenticación Hibrida</span></div></a>
                    </li>
                </ul>
            </li>

            <li class="btn btn-inverse dropdown" id="menu-permisos"><a href="#" data-toggle="dropdown" data-target="#menu-permisos" class="dropdown-toggle"><i class="fa fa-lock"></i> <span class="text">Permisos</span> <b class="caret"></b></a>
                <ul class="dropdown-menu messages-menu">

                    <li class="message-item">
                        <a href="/auth/assignment/index"><div class="message-content"><i class="fa fa-plus"></i><span class="title">Asignaciones</span></div></a>
                    </li>
                    <li class="message-item">
                        <a href="/auth/role/index"><div class="message-content"><i class="fa fa-group"></i><span class="title">Roles</span></div></a>
                    </li>
                    <li class="message-item">
                        <a href="/auth/task/index"><div class="message-content"><i class="fa fa-tasks"></i><span class="title">Tareas</span></div></a>
                    </li>
                    <li class="message-item">
                        <a href="/auth/operation/index"><div class="message-content"><i class="fa fa-cog"></i><span class="title">Operaciones</span></div></a>
                    </li>
                </ul>
            </li>

            <li class="btn btn-inverse dropdown" id="menu-seo"><a href="#" data-toggle="dropdown" data-target="#menu-seo" class="dropdown-toggle"><i class="fa fa-bookmark"></i> <span class="text">SEO</span> <b class="caret"></b></a>
                <ul class="dropdown-menu messages-menu">

                    <li class="message-item">
                        <a href="/irseo/default/admin"><div class="message-content"><i class="fa fa-android"></i><span class="title">SEO</span></div></a>
                    </li>
                    <li class="message-item">
                        <a href="/ycm/model/list?name=SeoUrl"><div class="message-content"><i class="fa fa-book"></i><span class="title">SEO URL</span></div></a>
                    </li>
                    <li class="message-item">
                        <a href="/ycm/model/list?name=UrlRule"><div class="message-content"><i class="fa fa-building-o"></i><span class="title">URLs</span></div></a>
                    </li>

                </ul>
            </li>
            <?php }?>



            <li class="btn btn-inverse"><a title="" href="/user/logout"><i class="fa fa-share"></i> <span class="text">Logout</span></a></li>
        </ul>
    </div>

    <div id="switcher">
        <div id="switcher-inner">
            <h3>Theme Options</h3>
            <h4>Colors</h4>
            <p id="color-style">
                <a data-color="orange" title="Orange" class="button-square orange-switcher" href="#"></a>
                <a data-color="turquoise" title="Turquoise" class="button-square turquoise-switcher" href="#"></a>
                <a data-color="blue" title="Blue" class="button-square blue-switcher" href="#"></a>
                <a data-color="green" title="Green" class="button-square green-switcher" href="#"></a>
                <a data-color="red" title="Red" class="button-square red-switcher" href="#"></a>
                <a data-color="purple" title="Purple" class="button-square purple-switcher" href="#"></a>
                <a href="#" data-color="grey" title="Grey" class="button-square grey-switcher"></a>
            </p>

            <h4>Background Patterns</h4>
            <h5>for boxed version</h5>
            <p id="pattern-switch">
                <a data-pattern="pattern1" style="background-image:url('assets/img/patterns/pattern1.png');" class="button-square" href="#"></a>
                <a data-pattern="pattern2" style="background-image:url('assets/img/patterns/pattern2.png');" class="button-square" href="#"></a>
                <a data-pattern="pattern3" style="background-image:url('assets/img/patterns/pattern3.png');" class="button-square" href="#"></a>
                <a data-pattern="pattern4" style="background-image:url('assets/img/patterns/pattern4.png');" class="button-square" href="#"></a>
                <a data-pattern="pattern5" style="background-image:url('assets/img/patterns/pattern5.png');" class="button-square" href="#"></a>
                <a data-pattern="pattern6" style="background-image:url('assets/img/patterns/pattern6.png');" class="button-square" href="#"></a>
                <a data-pattern="pattern7" style="background-image:url('assets/img/patterns/pattern7.png');" class="button-square" href="#"></a>
                <a data-pattern="pattern8" style="background-image:url('assets/img/patterns/pattern8.png');" class="button-square" href="#"></a>
            </p>
            <h4 class="visible-lg">Layout Type</h4>
            <p id="layout-type">
                <a data-option="flat" class="button" href="#">Flat</a>
                <a data-option="old" class="button" href="#">Old</a>
            </p>
        </div>
        <div id="switcher-button">
            <i class="fa fa-cogs"></i>
        </div>
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
</div>
<?php
//cs()->registerScriptFile(thu('js/jquery.gritter.js'), CClientScript::POS_END);
cs()->registerScriptFile(thu('js/excanvas.min.js'), CClientScript::POS_END);
cs()->registerScriptFile(thu('js/jquery-ui.custom.js'), CClientScript::POS_END);
//cs()->registerScriptFile(thu('js/bootstrap.min.js'), CClientScript::POS_END);
cs()->registerScriptFile(thu('js/jquery.flot.min.js'), CClientScript::POS_END);
cs()->registerScriptFile(thu('js/jquery.flot.resize.min.js'), CClientScript::POS_END);
cs()->registerScriptFile(thu('js/jquery.sparkline.min.js'), CClientScript::POS_END);
cs()->registerScriptFile(thu('js/jquery.nicescroll.min.js'), CClientScript::POS_END);
cs()->registerScriptFile(thu('js/fullcalendar.min.js'), CClientScript::POS_END);

cs()->registerScriptFile(thu('js/unicorn.js'), CClientScript::POS_END);
cs()->registerScriptFile(thu('js/unicorn.dashboard.js'), CClientScript::POS_END);
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
