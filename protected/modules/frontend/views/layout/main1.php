<?php $base_url = Yii::app()->request->baseUrl; ?>
<?php $cs = Yii::app()->clientScript; ?>
<?php $action_id = Yii::app()->controller->action->id; ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php $this->widget('application.modules.seo.widgets.SeoPageWidget'); ?>
    <?php echo $this->common_data['general_tracking'] ?>


    <?php
    Yii::app()->clientScript->scriptMap = array(
        'bootstrap.min.css' => false,
        'font-awesome.min.css' => false,
        'bootstrap-yii.css' => false,
        'jquery-ui-bootstrap.css' => false,

        'jquery.min.js' => false,
//        'jquery.js' => true,
        'bootstrap-noconflict.js' => false,
        'bootbox.min.js' => false,
        'notify.min.js' => false,
        'bootstrap.min.js' => false,
    );  // OJO

    $base_url = Yii::app()->request->baseUrl;
    $cs = Yii::app()->clientScript;
    ?>


        <?php $cs->registerCssFile($base_url . '/static/css/jquery-ui.css'); ?>
    <?php $cs->registerCssFile($base_url . '/static/css/animate.min.css'); ?>
    <?php $cs->registerCssFile($base_url . '/static/css/bootstrap-3.3.1.min.css'); ?>
    <?php $cs->registerCssFile($base_url . '/static/css/font-awesome1.min.css'); ?>
    <?php $cs->registerCssFile($base_url . '/static/slick/slick.css'); ?>
    <?php $cs->registerCssFile($base_url . '/static/css/styles.css'); ?>
    <?php $cs->registerCssFile($base_url . '/static/css/styles-custom.css'); ?>
    <?php $cs->registerCssFile($base_url . '/static/css/style_iframe.css'); ?>
<!--    --><?php //$cs->registerCssFile($base_url . '/static/css/jquery.share.css'); ?>
    <!--[if lte IE 9]>
    <script src="/static/js/html5shiv.js"></script> <![endif]-->
    <!--[if lte IE 8]>
    <script src="/static/js/respond.min.js"></script> <![endif]-->
    <!--[if IE]>
    <link rel="stylesheet" href="/static/css/ie.css"> <![endif]-->


</head>
<body>
<?php
$action_id = Yii::app()->controller->action->id;

if ($action_id == 'property' and $this->is_rent) {
    $action_id = 'rent_list';
}
if ($action_id == 'property' and $this->is_rent == false) {
    $action_id = 'buy_list';
}
//ddump($action_id);
?>

<header class="header">
    <div class="header-contact-info">
        <ul class="list-inline navbar-social-icons visible-xs-inline-block">
            <?php if(isset($this->common_data['facebook_link']) and $this->common_data['facebook_link'] != ''):?>
            <li><a href="<?php echo $this->common_data['facebook_link']?>"><span class="fa-stack fa-lg facebook"><i class="fa fa-circle-thin fa-stack-2x"></i><i
                            class="fa fa-facebook fa-stack-1x"></i></span></a>
            </li>
            <?php endif?>
            <?php if(isset($this->common_data['twitter_link']) and $this->common_data['twitter_link'] != ''):?>
            <li><a href="<?php echo $this->common_data['twitter_link']?>"><span class="fa-stack fa-lg google-plus"><i class="fa fa-circle-thin fa-stack-2x"></i><i
                            class="fa fa-google-plus fa-stack-1x"></i></span></a>
            </li>
            <?php endif?>
            <?php if(isset($this->common_data['google_plus_link']) and $this->common_data['google_plus_link'] != ''):?>

            <li><a href="<?php echo $this->common_data['google_plus_link']?>"><span class="fa-stack fa-lg twitter"><i class="fa fa-circle-thin fa-stack-2x"></i><i
                            class="fa fa-twitter fa-stack-1x"></i></span></a>
            </li>
            <?php endif?>
            <?php if(isset($this->common_data['instagram_link']) and $this->common_data['instagram_link'] != ''):?>
            <li><a href="<?php echo $this->common_data['instagram_link']?>"><span class="fa-stack fa-lg instagram"><i class="fa fa-circle-thin fa-stack-2x"></i><i
                            class="fa fa-instagram fa-stack-1x"></i></span></a>
            </li>
            <?php endif?>
        </ul>
        <div class="page-language pull-right">
            <?php if($_SESSION['language'] == 'es'):?>
                <a href="/changelang/en">English</a>
            <?php else:?>
                <a href="/changelang/es">Español</a>
            <?php endif?>

        </div>
        <div class="pull-right hidden-xs"><a href="mailto:<?php if(isset($this->common_data['email'])):echo $this->common_data['email'];else:?>sales@puntacanahome.com<?php endif?>" class="contact-email">
                <?php if(isset($this->common_data['email'])):
                    echo $this->common_data['email'];
                else:?>
                    sales@irealty.com
                <?php endif?>
            </a>
        </div>
        <div class="contact-phone pull-right hidden-xs"><span class="text-uppercase">
                <?php echo Yii::t('labels', 'CALL US')?>
            </span>
            <a href="tel:<?php echo $this->common_data['main_phone'];?>">
                <?php if(isset($this->common_data['main_phone'])):?>
                   <?php echo $this->common_data['main_phone'];?>
               <?php else:?>
                    809-757-6884
               <?php endif?>
            </a>
        </div>
    </div>
    <nav role="navigation" class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" data-toggle="collapse" data-target="#main-nav" class="navbar-toggle"><span
                        class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span
                        class="icon-bar"></span><span class="icon-bar"></span>
                </button>
                <a href="/" class="navbar-brand">
                <?php if(isset($this->common_data['logo']) and $this->common_data['logo'] != '' ):?>
                    <img src="<?php echo $this->common_data['logo']?>" alt="<?php echo $this->common_data['logo_alt']?>" class="img-responsive">
                <?php else:?>
                    <img src="/static/imgs/logo.png" class="img-responsive">
                <?php endif?>
                </a>
            </div>
            <ul id="header-search" class="nav navbar-nav pull-right visible-xs-inline-block">
                <input id="searcher_buy_url" hidden="hidden" value="<?php echo $this->createUrl('/frontend/default/buy_list')?>">
                <input id="searcher_rent_url" hidden="hidden" value="<?php echo $this->createUrl('/frontend/default/rent_list')?>">
                <form id="searcher_form" action="<?php echo $this->createUrl('/frontend/default/buy_list')?>" method="get">

                <li>
                    <a href="" id="search-trigger" class="hover-transition">
                        <span class="hidden-xs">
                            Search</span>
                        <i class="fa fa-search-plus pull-right"></i></a>

                    <div id="search-input">
                        <div class="input-group">
                            <input id="searcher_input_mobile" name="q"  type="text" placeholder="<?php if(isset($this->common_data['searcher_placeholder'])): echo $this->common_data['searcher_placeholder'];else:?>Search by address, city, zip code<?php endif?>"
                                   class="form-control form">
                            <span class="input-group-btn">
                        <button type="submit" class="btn btn-default"><?php echo Yii::t('Searcher_Frontend', 'GO')?>!</button>
                            </span>
                        </div>
                        <div data-toggle="buttons" class="filters btn-group">
                            <label for="to-buy" class="btn active hover-transition">
                                <input type="radio" value="buy" name="cat" onchange="change_url_searcher_form('buy')" checked id="buy">
                                <?php if(isset($this->common_data['searcher_buy'])):
                                    echo $this->common_data['searcher_buy'];
                                else:?>
                                    to Buy
                                <?php endif?>
                            </label>
                            <label for="to-rent" class="btn hover-transition">
                                <input type="radio" name="cat" id="rent" value="rent" onchange="change_url_searcher_form('rent')">
                                <?php if(isset($this->common_data['searcher_rent'])):
                                    echo $this->common_data['searcher_rent'];
                                else:?>
                                    to Rent
                                <?php endif?>
                            </label>
                        </div>
                    </div>
                </li>
                </form>
            </ul>
            <ul class="list-inline navbar-social-icons pull-right hidden-xs">
                <?php if(isset($this->common_data['facebook_link']) and $this->common_data['facebook_link'] != ''):?>
                <li><a href="<?php echo $this->common_data['facebook_link']?>"><span class="fa-stack fa-lg facebook"><i class="fa fa-circle-thin fa-stack-2x"></i><i
                                class="fa fa-facebook fa-stack-1x"></i></span></a>
                </li>
                <?php endif?>
                <?php if(isset($this->common_data['twitter_link']) and $this->common_data['twitter_link'] != ''):?>
                <li><a href="<?php echo $this->common_data['twitter_link']?>"><span class="fa-stack fa-lg google-plus"><i class="fa fa-circle-thin fa-stack-2x"></i><i
                                class="fa fa-google-plus fa-stack-1x"></i></span></a>
                </li>
                <?php endif?>
                <?php if(isset($this->common_data['google_plus_link']) and $this->common_data['google_plus_link'] != ''):?>

                <li><a href="<?php echo $this->common_data['google_plus_link']?>"><span class="fa-stack fa-lg twitter"><i class="fa fa-circle-thin fa-stack-2x"></i><i
                                class="fa fa-twitter fa-stack-1x"></i></span></a>
                </li>
                <?php endif?>
                <?php if(isset($this->common_data['instagram_link']) and $this->common_data['instagram_link'] != ''):?>
                <li><a href="<?php echo $this->common_data['instagram_link']?>"><span class="fa-stack fa-lg instagram"><i class="fa fa-circle-thin fa-stack-2x"></i><i
                                class="fa fa-instagram fa-stack-1x"></i></span></a>
                </li>
                <?php endif?>
            </ul>
            <div id="main-nav" class="navbar-collapse collapse pull-right">
                <ul class="nav navbar-nav">
                    <li class="<?php if($action_id == 'index') echo 'active'?>"><a href="/" class="hover-transition">
                            <?php if(isset($this->common_data['home'])):
                                echo $this->common_data['home'];
                            else:?>
                            Home
                            <?php endif?>
                        </a>
                    </li>
                    <li class="<?php if($action_id == 'buy_list') echo 'active'?>"><a href="<?php echo $this->createUrl('/frontend/default/buy_list')?>" class="hover-transition">
                        <?php if(isset($this->common_data['buy'])):
                            echo $this->common_data['buy'];
                        else:?>
                            Buy
                        <?php endif?>
                        </a>
                    </li>
                    <li class="<?php if($action_id == 'rent_list') echo 'active'?>"><a href="<?php echo $this->createUrl('/frontend/default/rent_list')?>" class="hover-transition">
                            <?php if(isset($this->common_data['rent'])):
                                echo $this->common_data['rent'];
                            else:?>
                                Rent
                            <?php endif?>
                        </a>
                    </li>
                    <li class="<?php if($action_id == 'terms_conditions') echo 'active'?>"><a href="<?php echo $this->createUrl('/frontend/default/terms_conditions')?>" class="hover-transition visible-xs-block">
                            <?php if(isset($this->common_data['footer_terms_conditions'])):
                                echo $this->common_data['footer_terms_conditions'];
                            else:?>
                                Terms and Conditions
                            <?php endif?>
                        </a>
                    </li>
                    <li class="<?php if($action_id == 'blog_list' or $action_id == 'blog') echo 'active'?>">
                        <a href="<?php echo $this->createUrl('/frontend/default/blog_list')?>" class="hover-transition">
                            <?php if(isset($this->common_data['footer_blog'])):
                                echo $this->common_data['footer_blog'];
                            else:?>
                                Blog
                            <?php endif?>

                        </a>
                    </li>
                    <li class="<?php if($action_id == 'contact_us') echo 'active'?>"><a href="<?php echo $this->createUrl('/frontend/default/contact_us', array('q' => 'publish'))?>" class="hover-transition visible-xs-block">
                            <?php if(isset($this->common_data['footer_publish_properties'])):
                                echo $this->common_data['footer_publish_properties'];
                            else:?>
                                Publish your properties
                            <?php endif?>
                        </a>
                    </li>
                    <li class="<?php if($action_id == 'contact_us') echo 'active'?>"><a href="<?php echo $this->createUrl('/frontend/default/contact_us')?>" class="hover-transition">
                            <?php if(isset($this->common_data['contact_us'])):
                                echo $this->common_data['contact_us'];
                            else:?>
                            Contact Us
                            <?php endif?>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>

<?php
echo $content;

?>


<footer class="footer">
    <div class="site-url text-center">
        <a href="javascript:" class="hover-transition text-uppercase">
            <?php if(isset($this->common_data['web_address'])):
               echo $this->common_data['web_address'];
           else:?>
               www.irealty.com
           <?php endif?>
        </a>
    </div>
    <div class="footer-menu text-center hidden-xs">
        <ul class="nav navbar-nav">
            <li class="<?php if($action_id == 'index'):?>active<?php endif?>"><a href="/" class="hover-transition">
                    <?php if(isset($this->common_data['footer_home'])):
                        echo $this->common_data['footer_home'];
                    else:?>
                        Home
                    <?php endif?>
                </a>
            </li>
            <li class="<?php if($action_id == 'about_us'):?>active<?php endif?>"><a href="<?php echo $this->createUrl('/frontend/default/about_us')?>" class="hover-transition">
                    <?php if(isset($this->common_data['footer_about_us'])):
                        echo $this->common_data['footer_about_us'];
                    else:?>
                        About Us
                    <?php endif?>
                </a>
            </li>
            <li class="<?php if($action_id == 'terms_conditions'):?>active<?php endif?>">
                <a href="<?php echo $this->createUrl('/frontend/default/terms_conditions')?>" class="hover-transition">
                    <?php if(isset($this->common_data['footer_terms_conditions'])):
                        echo $this->common_data['footer_terms_conditions'];
                    else:?>
                        Terms and Conditions
                    <?php endif?>
                </a>
            </li>
            <li class="<?php if($action_id == 'blog_list' or $action_id == 'blog'):?>active<?php endif?>">
                <a href="<?php echo $this->createUrl('/frontend/default/blog_list')?>" class="hover-transition">
                    <?php if(isset($this->common_data['footer_blog'])):
                        echo $this->common_data['footer_blog'];
                    else:?>
                        Blog
                    <?php endif?>

                </a>
            </li>
            <li class="<?php if($action_id == 'contact_us'):?>active<?php endif?>"><a href="<?php echo $this->createUrl('/frontend/default/contact_us', array('q' => 'publish'))?>" class="hover-transition">
                    <?php if(isset($this->common_data['footer_publish_properties'])):
                        echo $this->common_data['footer_publish_properties'];
                    else:?>
                        Publish your properties
                    <?php endif?>
                </a>
            </li>
        </ul>
    </div>
    <div class="footer-sections">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    <div class="footer-logo text-center">
                        <a href="/">
                            <?php if(isset($this->common_data['logo']) and $this->common_data['logo'] != '' ):?>
                                <img src="<?php echo $this->common_data['logo']?>" alt="<?php echo $this->common_data['logo_alt']?>" class="img-responsive">
                            <?php else:?>
                                <img src="/static/imgs/logo-temp.png" class="img-responsive">
                            <?php endif?>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    <div class="site-info">
                        <p class="address text-center">
                            <?php if(isset($this->common_data['postal_address'])):
                                echo $this->common_data['postal_address'];
                            else:?>
                            Av. Alemania No. 5 Bavaro, 23000, Republica Dominicana
                            <?php endif?>
                        </p>

                        <p class="copyright text-center">&copy;2015 <a href="">IRealty</a>.
                            <?php echo Yii::t('Frontend_labels', 'All Rights Reserved.')?></p>

                        <p class="powered text-center">Powered by <a href="http://ireevo.com">iReevo.com</a></p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    <div class="site-contact text-center">
                        <ul class="list-inline navbar-social-icons">
                            <?php if(isset($this->common_data['facebook_link'])):?>
                            <li><a href="<?php echo $this->common_data['facebook_link']?>"><span class="fa-stack fa-lg facebook"><i
                                            class="fa fa-circle-thin fa-stack-2x"></i><i
                                            class="fa fa-facebook fa-stack-1x"></i></span></a>
                            </li>
                            <?php endif?>
                            <?php if(isset($this->common_data['google_plus_link'])):?>

                            <li><a href="<?php echo $this->common_data['google_plus_link']?>"><span class="fa-stack fa-lg google-plus"><i
                                            class="fa fa-circle-thin fa-stack-2x"></i><i
                                            class="fa fa-google-plus fa-stack-1x"></i></span></a>
                            </li>
                            <?php endif?>
                            <?php if(isset($this->common_data['twitter_link'])):?>
                            <li><a href="<?php echo $this->common_data['twitter_link']?>"><span class="fa-stack fa-lg twitter"><i
                                            class="fa fa-circle-thin fa-stack-2x"></i><i
                                            class="fa fa-twitter fa-stack-1x"></i></span></a>
                            </li>
                            <?php endif?>
                            <?php if(isset($this->common_data['instagram_link'])):?>
                            <li><a href="<?php echo $this->common_data['instagram_link']?>"><span class="fa-stack fa-lg instagram"><i
                                            class="fa fa-circle-thin fa-stack-2x"></i><i
                                            class="fa fa-instagram fa-stack-1x"></i></span></a>
                            </li>
                            <?php endif?>
                        </ul>
                        <div class="phone"><a href="tel:<?php if(isset($this->common_data['main_phone'])):echo $this->common_data['main_phone'];else:?>8097576884<?php endif?>">
                                <?php if(isset($this->common_data['main_phone'])):
                                    echo $this->common_data['main_phone'];
                                else:?>
                                +809 757 6884
                                <?php endif?></a>
                        </div>
                        <div class="email">
                            <a href="mailto:<?php if(isset($this->common_data['email'])):echo $this->common_data['email'];else:?>sales@irealty.com<?php endif?>">
                                <?php if(isset($this->common_data['email'])):
                                    echo $this->common_data['email'];
                                else:?>
                                    sales@irealty.com
                                <?php endif?>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>


<script src="/static/js/jquery-2.1.1.min.js"></script>

<script src="/static/js/jquery-ui.min.js"></script>
<script src="/static/js/animate-plus.js"></script>
<script src="/static/js/bootstrap.min.js"></script>
<script src="/static/js/jquery.maskedinput.min.js"></script>
<script src="/static/slick/slick.min.js"></script>
<script src="/static/js/html5shiv.js"></script>
<!--<script src="/static/js/jquery.autocomplete.js"></script>-->
<script src="/static/js/jquery-validations.js"></script>
<script src="/static/js/jquery-validate.bootstrap-tooltip.js"></script>
<script src="/static/js/jquery.share.js"></script>
<script src="/static/js/site-scripts.js"></script>

<script src="/static/js/custom.js"></script>


<script>
    $("#form_request_property").validate({});
    $("#contact_form").validate({});

    jQuery.extend(jQuery.validator.messages,
        {
            required: '<?php echo Yii::t('messages', 'This field is required.')?>',
            email: '<?php echo Yii::t('labels', 'The email is not valid')?>'
        }
    );

</script>

<script src="https://maps.googleapis.com/maps/api/js"></script>
<script src="/static/js/contact.js"></script>

<style>
    .alert1 {
        border: 1px solid transparent;
        border-radius: 4px 4px 4px 4px;
        margin-bottom: 20px;
        padding: 15px;
    }
    #ui-id-1 > li{
        z-index: 3;
    }


</style>


</body>
</html>