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
//    $base_url = Yii::app()->request->baseUrl;

    /**
     * StyleSHeets
     */
    $cs->registerCssFile($themePath .'/css/redactor.css');
//    $cs->registerCssFile($themePath .'/css/jquery-ui.theme.css');
    $cs->registerCssFile($themePath . '/css/bootstrap.css');
    $cs->registerCssFile($themePath . '/css/bootstrap-theme.css');
    $cs->registerCssFile($themePath . '/css/jquery.fancybox.css');
    $cs->registerCssFile($themePath . '/css/jquery.fancybox-buttons.css');
    $cs->registerCssFile($themePath . '/css/datepicker.css');

    /**
     * JavaScripts
     */
    $cs->registerCoreScript('jquery', CClientScript::POS_END);
    $cs->registerCoreScript('jquery.ui', CClientScript::POS_END);
   // $cs->registerScriptFile($themePath . '/js/bootstrap.min.js', CClientScript::POS_END);
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



<!--    --><?php //$this->widget('application.modules.irseo.widgets.IRSeo'); ?>
    <?php
    cs()->registerCssFile(thu('css/bootstrap.min.css'));
    cs()->registerCssFile(thu('css/font-awesome.css'));
    cs()->registerCssFile(thu('css/fullcalendar.css'));
    cs()->registerCssFile(thu('css/jquery.jscrollpane.css'));
    cs()->registerCssFile(thu('css/unicorn.css'));

//    $cs->registerCssFile($base_url . '/static/stylesheets/screen.css');


    ?>

    <!--[if lt IE 9]>
    <script type="text/javascript" src="<?php echo thu('js/respond.min.js'); ?>"></script>
    <![endif]-->
<script>
    function closeFlash(){

        setTimeout(function(){
            $(".alert").alert('close');
        }, 2000);
    }

</script>
</head>
<body data-color="grey" class="flat" onload="closeFlash()">
<div id="wrapper">

    <div id="header">

        <h1>

<!--            <a href="#">-->
<!--                --><?php
//                $entity=NavegationMenuCompany::model()->findAll();
//                if(isset($entity[0])){
//                    if($entity[0]->_company_logo->getFileUrl('logo_admin')!='') {
//                        echo CHtml::link(CHtml::image($entity[0]->_company_logo->getFileUrl('logo_admin'),''),'/');
//                    }
//                    else {
//                        echo app()->name;
//                    }
//                }
//                else {
//                    echo app()->name;
//                }?>
<!--            </a>-->
        </h1>
        <a id="menu-trigger" href="#"><i class="fa fa-bars"></i></a>
    </div>

    <div id="user-nav">
        <?php if(!user()->isGuest){?>
        <ul class="btn-group">

           <li class="btn btn-inverse dropdown" id="menu-perfil"><a href="/user/profile/profile" data-toggle="dropdown" data-target="#menu-perfil" class="dropdown-toggle"><i class="fa fa-user"></i> <span class="text"><?php echo t('Profile');?></span> <b class="caret"></b></a>
                <ul class="dropdown-menu messages-menu">

                    <li class="message-item">
                        <a href="/user/profile/profile"><div class="message-content"><i class="fa fa-user"></i><span class="title"><?php echo t('Profile');?></span></div></a>
                    </li>
                    <li class="message-item">
                        <a href="/user/profile/edit"><div class="message-content"><i class="fa fa-edit"></i><span class="title"><?php echo t('Edit');?></span></div></a>
                    </li>
                    <li class="message-item">
                        <a href="/user/profile/changePassword"><div class="message-content"><i class="fa fa-wrench"></i><span class="title"><?php echo t('Change password');?></span></div></a>
                    </li>



                </ul>

            </li>
            <?php }?>

            <?php if(user()->isAdmin){ ?>

            <li class="btn btn-inverse dropdown" id="menu-administration"><a href="#" data-toggle="dropdown" data-target="#menu-administration" class="dropdown-toggle"><i class="fa fa-briefcase"></i> <span class="text"><?php echo t('Administration');?></span> <b class="caret"></b></a>
                <ul class="dropdown-menu messages-menu">

<!--                    <li class="message-item">-->
<!--                        <a href="/entity/systemCompany/admin"><div class="message-content"><i class="fa fa-flag"></i><span class="title">--><?php //echo t('Enterprise');?><!--</span></div></a>-->
<!--                    </li>-->
                    <li class="message-item">
                        <a href="/theme/generalTrackingCodes/admin"><div class="message-content"><i class="fa fa-user"></i><span class="title"><?php echo t('General tracking code');?></span></div></a>
                    </li>
                    <li class="message-item">
                        <a href="/user/admin/admin"><div class="message-content"><i class="fa fa-user"></i><span class="title"><?php echo t('Users');?></span></div></a>
                    </li>
                    <!--<li class="message-item">
                        <a href="/irtext/default/admin"><div class="message-content"><i class="fa fa-edit"></i><span class="title"><?php /*echo t('Texts');*/?></span></div></a>
                    </li>-->
                    <!--<li class="message-item">
                        <a href="/user/login/oauthadmin"><div class="message-content"><i class="fa fa-wrench"></i><span class="title"><?php /*echo t('Hybrid auth');*/?></span></div></a>
                    </li>-->
                </ul>
            </li>

<!--            <li class="btn btn-inverse dropdown" id="menu-permisos"><a href="#" data-toggle="dropdown" data-target="#menu-permisos" class="dropdown-toggle"><i class="fa fa-lock"></i> <span class="text">--><?php //echo t('Permissions');?><!--</span> <b class="caret"></b></a>-->
<!--                <ul class="dropdown-menu messages-menu">-->
<!---->
<!--                    <li class="message-item">-->
<!--                        <a href="/auth/assignment/index"><div class="message-content"><i class="fa fa-plus"></i><span class="title">--><?php //echo t('Assigns');?><!--</span></div></a>-->
<!--                    </li>-->
<!--                    <li class="message-item">-->
<!--                        <a href="/auth/role/index"><div class="message-content"><i class="fa fa-group"></i><span class="title">--><?php //echo t('Roles');?><!--</span></div></a>-->
<!--                    </li>-->
<!--                   <!-- <li class="message-item">-->
<!--                        <a href="/auth/task/index"><div class="message-content"><i class="fa fa-tasks"></i><span class="title">--><?php ///*echo t('Tasks');*/?><!--</span></div></a>-->
<!--                    </li>-->
<!--                    <li class="message-item">-->
<!--                        <a href="/auth/operation/index"><div class="message-content"><i class="fa fa-cog"></i><span class="title">--><?php ///*echo t('Operations');*/?><!--</span></div></a>-->
<!--                    </li>-->
<!--                </ul>-->
<!--            </li>-->

            <!--<li class="btn btn-inverse dropdown" id="menu-seo"><a href="#" data-toggle="dropdown" data-target="#menu-seo" class="dropdown-toggle"><i class="fa fa-bookmark"></i> <span class="text"><?php /*echo t('Seo');*/?></span> <b class="caret"></b></a>
                <ul class="dropdown-menu messages-menu">

                    <li class="message-item">
                        <a href="/irseo/default/admin"><div class="message-content"><i class="fa fa-android"></i><span class="title"><?php /*echo t('Seo');*/?></span></div></a>
                    </li>
                    <li class="message-item">
                        <a href="/ycm/model/list?name=SeoUrl"><div class="message-content"><i class="fa fa-book"></i><span class="title"><?php /*echo t('Seo Url');*/?></span></div></a>
                    </li>
                    <li class="message-item">
                        <a href="/ycm/model/list?name=UrlRule"><div class="message-content"><i class="fa fa-building-o"></i><span class="title"><?php /*echo t('URLs');*/?></span></div></a>
                    </li>

                </ul>
            </li>-->
            <?php }?>


            <?php if(user()->getIsGuest()):?>
            <li class="btn btn-inverse"><a title="" href="/user/login"><i class="fa fa-share"></i> <span class="text"><?php echo t('Login');?></span></a></li>
            <?php else:?>
                <li class="btn btn-inverse"><a title="" href="/user/logout"><i class="fa fa-share"></i> <span class="text"><?php echo t('Logout');?></span></a></li>
            <?php endif?>
        </ul>
    </div>



    <div id="sidebar">
        <a href="#" class="visible-phone"><i class="icon-home"></i></a>
        <?php $this->widget('ext.unicorn.widgets.IRSideMenu', array(
            'items' => Menus::sideMenu(),
        ))?>

    </div>

    <div id="content">
        <div id="content-header" class="mini">
            <h1>
                <?php echo $this->title;?>
            </h1>
            <div class="flash" style="clear: both; display: block;" >
                <?php
                $this->widget('application.extensions.bootstrap.widgets.TbAlert', array(
                    'fade' => true,
                    'closeText' => '&times;', // false equals no close link
                    'events' => array('onclick'=>'js: function() {
                    console.log("Ireevo");
                }'),
                    'htmlOptions' => array('class'=>'flash'),
                    'userComponentId' => 'user',
                    'alerts' => array( // configurations per alert type
                        // success, info, warning, error or danger
                        'success' => array('closeText' => '&times;','events'=>array('closeinfo')),
                        'info' => array('closeText' => '&times;'), // you don't need to specify full config
                        'warning' => array('closeText' => '&times;'),
                        'error' => array('closeText' => '&times;!!')
                    ),
                ));
                ?>
            </div>
            <?php /*$this->widget('ext.unicorn.widgets.IRContentButtons', array(
                'items' => Menus::contentButtons(),
            ))*/ ?>
        </div>

            <?php if(isset($this->breadcrumbs)):?>
                <?php $this->widget('ext.unicorn.widgets.IRBreadcrumb', array(
                'htmlOptions'=>array('id' => 'breadcrumb'),
                'links'=>$this->breadcrumbs,
            )); ?><!-- breadcrumbs -->
            <?php endif?>


        <div class="container-fluid">

            <div class="row">
                <div class="col-xs-12">
                    <?php
                    echo $content; ?>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div id="footer" class="col-xs-12">
            <?php
            $company=CompanyInfo::model()->findAll();
            if(isset($company[0]->company_name)){
                echo t('Powered by').' '. $company[0]->company_name;
            }
            else{
                echo t('Powered by IReevo');
            }
            ?>
        </div>
    </div>
</div>
<?php
//cs()->registerScriptFile(thu('js/jquery.gritter.js'), CClientScript::POS_END);
//cs()->registerScriptFile(thu('js/excanvas.min.js'), CClientScript::POS_END);
//cs()->registerScriptFile(thu('js/jquery-ui.custom.js'), CClientScript::POS_END);
//cs()->registerScriptFile(thu('js/bootstrap.min.js'), CClientScript::POS_END);
//cs()->registerScriptFile(thu('js/jquery.flot.min.js'), CClientScript::POS_END);
//cs()->registerScriptFile(thu('js/jquery.flot.resize.min.js'), CClientScript::POS_END);
//cs()->registerScriptFile(thu('js/jquery.sparkline.min.js'), CClientScript::POS_END);
//cs()->registerScriptFile(thu('js/jquery.nicescroll.min.js'), CClientScript::POS_END);
//cs()->registerScriptFile(thu('js/fullcalendar.min.js'), CClientScript::POS_END);

cs()->registerScriptFile(thu('js/unicorn.js'), CClientScript::POS_END);
cs()->registerScriptFile(thu('js/jquery-ui.custom.js'), CClientScript::POS_END);
cs()->registerScriptFile(thu('js/excanvas.min.js'), CClientScript::POS_END);
cs()->registerScriptFile(thu('js/jquery.flot.min.js'), CClientScript::POS_END);
cs()->registerScriptFile(thu('js/jquery.flot.resize.min.js'), CClientScript::POS_END);
cs()->registerScriptFile(thu('js/jquery.nicescroll.min.js'), CClientScript::POS_END);
cs()->registerScriptFile(thu('js/jquery.maskMoney.js'), CClientScript::POS_END);
//cs()->registerScriptFile(thu('js/admin_custom.js'), CClientScript::POS_END);
cs()->registerScriptFile(thu('js/redactor.min.js'), CClientScript::POS_END);
cs()->registerScriptFile(thu('js/redactor.js'), CClientScript::POS_END);
cs()->registerScriptFile(thu('js/jquery.fancybox.js'), CClientScript::POS_END);
cs()->registerScriptFile(thu('js/jquery.fancybox-buttons.js'), CClientScript::POS_END);
cs()->registerScriptFile(thu('js/mycustom.js'), CClientScript::POS_END);

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
