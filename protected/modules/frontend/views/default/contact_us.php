<div class="page-banner">
    <img src="<?php echo $banner_image?>" src="<?php echo $banner_image_alt?>" class="image-responsive hidden-xs">
    <img src="<?php echo $banner_image_mobile?>" src="<?php echo $banner_image_alt?>" class="image-responsive visible-xs-block">
</div>
<div class="gray-strip">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="section-title page-title" id="section_title">
                    <h2 class="white pull-left">
                        <strong>
                            <?php if(isset($title)):
                                echo $title;
                            else:?>
                                Contact us
                            <?php endif?>
                        </strong>
                    </h2>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="light-gray-bg contact-page">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="/"><?php echo $this->common_data['home']; ?></a>
                    </li>
                    <li class="active"><?php echo $this->common_data['contact_us']; ?></li>
                </ol>
                <p class="text-justify"><?php echo $description?>
                </p>
            </div>
        </div>
        <div class="row equalize contact-page">
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 contact-form">
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
                <form role="form" method="post" action="/sendemail" id="contact_form">
                    <div class="form-group form-group-lg">
                        <select class="form-control" name="reason">
                            <?php foreach($contact_reason as $key => $reason):?>
                                <?php if(isset($_GET['q'])):?>
                                    <option value="<?php echo $reason['id']?>" <?php if($reason['selected']):?>selected<?php endif?> ><?php echo $reason['title']?></option>
                                <?php else:?>
                                    <option value="<?php echo $reason['id']?>" <?php if($key == 0):?>selected<?php endif?> ><?php echo $reason['title']?></option>
                                <?php endif?>
                            <?php endforeach?>
                        </select>
                    </div>
                    <div class="form-group form-group-lg">
                        <input type="text" name="name" placeholder="<?php echo $place_holder_name?>" required class="form-control input-lg">
                    </div>
                    <div class="form-group form-group-lg">
                        <input type="tel" name="phone" placeholder="<?php echo $place_holder_phone?>" class="form-control input-lg">
                    </div>
                    <div class="form-group form-group-lg">
                        <input type="email" pattern="[\w-\.]{1,}@([\w-]{2,}\.)*([\w-]{2,}\.)[\w-]{2,4}" name="email" placeholder="<?php echo $place_holder_email?>" required class="form-control input-lg">
                    </div>
                    <div class="form-group form-group-lg">
                        <input type="text" name="subject" placeholder="<?php echo $place_holder_subject?>" required
                               class="form-control input-lg">
                    </div>
                    <div class="form-group form-group-lg">
                        <textarea name="message" placeholder="<?php echo $place_holder_message?>" rows="6"required
                                                                    class="form-control message-box">

                                                                    </textarea>
                    </div>
                    <div class="form-group text-center">
                        <button type="submit" role="button" class="rounded-btn big-rounded hover-transition">
                            <?php echo Yii::t('Property', 'Contact<br><strong>Now</strong>')?>

                        </button>
                    </div>
                </form>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 contact-info">
                <div class="subtitle">
                    <h3>
                        <?php if(isset($agents_title)):
                            echo $agents_title;
                        else:?>
                            Our <strong>best broker</strong>
                        <?php endif?>

                    </h3>
                </div>
                <div class="brokers">
                    <?php foreach($agents as $agent):?>
                    <div class="profile text-center">
                        <img src="<?php echo $agent['photo']?>"  alt="<?php echo $agent['photo_alt']?>" class="img-thumbnail img-circle image-responsive">
                        <h4 class="name"><?php echo $agent['name']?></h4>
                        <a href="tel:<?php echo $agent['contact_phone1']?>"><?php echo $agent['contact_phone1']?></a>
                    </div>
                    <?php endforeach?>
                </div>
                <div class="subtitle">
                    <h3>
                        <?php if(isset($agents_title)):
                            echo $address_title;
                        else:?>
                            Our <strong>offices location</strong>
                        <?php endif?>

                    </h3>
                </div>
                <ul class="list-unstyled locations">
                    <li>
                        <div class="location-item">
                            <div class="icon"><i class="fa fa-map-marker fa-3x"></i>
                            </div>
                            <div class="location-content">
                                <p>
                                    <?php if(isset($this->common_data['postal_address'])):
                                        echo $this->common_data['postal_address'];
                                    else:?>
                                        Av. Alemania No. 5 Bavaro, 23000 Republica Dominicana
                                    <?php endif?>

                                </p>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="location-item">
                            <div class="icon"><i class="fa fa-envelope fa-3x"></i>
                            </div>
                            <div class="location-content">
                                <a href="mailto:<?php echo $this->common_data['email']?>"><?php echo $this->common_data['email']?></a>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="location-item">
                            <div class="icon"><i class="fa fa-phone fa-3x"></i>
                            </div>
                            <div class="location-content">
                                <a href="tel:<?php echo $this->common_data['main_phone']?>">
                                    <?php echo $this->common_data['main_phone']?></a>
                            </div>
                        </div>
                    </li>
                    <?php if($this->common_data['second_phone'] != null and $this->common_data['second_phone'] != ''):?>
                    <li>
                        <div class="location-item">
                            <div class="icon">
<!--                                <i class="fa fa-phone fa-3x"></i>-->
                            </div>
                            <div class="location-content">
                                <a href="tel:<?php echo $this->common_data['second_phone']?>">
                                    <?php echo $this->common_data['second_phone']?></a>
                            </div>
                        </div>
                    </li>
                    <?php endif?>
                </ul>
                <ul class="list-inline pull-left contact-socials">
                    <?php if(isset($this->common_data['facebook_link'])):?>
                    <li><a href="<?php echo $this->common_data['facebook_link']?>"><i class="fa fa-facebook"></i></a>
                    </li>
                    <?php endif;
                    if(isset($this->common_data['google_plus_link'])):?>
                    <li><a href="<?php echo $this->common_data['google_plus_link']?>"><i class="fa fa-google-plus"></i></a>
                    </li>
                    <?php endif;
                    if(isset($this->common_data['twitter_link'])):?>
                    <li><a href="<?php echo $this->common_data['twitter_link']?>"><i class="fa fa-twitter"></i></a>
                    </li>
                    <?php endif;
                    if(isset($this->common_data['instagram_link'])):?>
                    <li><a href="<?php echo $this->common_data['instagram_link']?>"><i class="fa fa-instagram"></i></a>
                    </li>
                    <?php endif?>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><a href="" class="section-anchor"><i
                    class="fa fa-angle-down fa-2x"></i></a>

            <div class="section-title">
                <h2>
                    <?php if(isset($popular_property_title)):
                        echo $popular_property_title;
                    else:?>
                        Most popular <strong>Properties</strong>
                    <?php endif?>
                </h2>
            </div>
            <div class="properties-carousel"><i class="arrows arrow-left fa fa-angle-left fa-inverse"></i><i
                    class="arrows arrow-right fa fa-angle-right fa-inverse"></i>

                <?php foreach($most_popular_properties as $popular_property):?>

                <div class="property-item">
                    <?php if(isset($popular_property['image'])):?>
                        <img src="<?php echo $popular_property['image']?>" alt="<?php echo $popular_property['image_alt']?>" class="image-responsive">
                    <?php else:?>
                        <img src="/static/imgs/recent-img-01.jpg" class="image-responsive">
                    <?php endif?>

                    <div class="detail-info">
                        <a href="" role="button" class="pull-right detail-trigger">
                            <i class="fa fa-tag fa-inverse"></i></a><span class="price">USD<strong>$<?php echo $popular_property['price']?></strong></span>
                        <div class="details">
                            <ul class="list-unstyled">
                                <li><i class="fa fa-map-marker"></i><span class="detail-title"><?php echo Yii::t('Property', 'Place')?></span>

                                    <p><?php echo $popular_property['address']?></p>
                                </li>
                                <li><i class="fa fa-arrows"></i><span
                                        class="detail-title"><?php echo Yii::t('Property', 'Area')?></span><span><?php echo $popular_property['area']?> m<sup>2</sup></span>
                                </li>
                                <li><i class="fa fa-moon-o"></i><span class="detail-title"><?php echo Yii::t('Property', 'Rooms')?></span><span
                                        class="count"><?php echo $popular_property['rooms']?></span>
                                </li>
                                <li><i class="fa fa-tint"></i><span class="detail-title"><?php echo Yii::t('Property', 'Baths')?></span><span
                                        class="count"><?php echo $popular_property['bathroom']?></span>
                                </li>
                            </ul>
                            <a href="<?php echo $this->createUrl('/frontend/default/property', array('id' => $popular_property['id']))?>" class="text-right rounded-btn">
                                <?php echo Yii::t('Property', 'View')?><br><strong><?php echo Yii::t('Property', 'Details')?></strong>
                            </a>
                        </div>
                    </div>
                </div>
                <?php endforeach?>
                </div>
        </div>
    </div>
</div>
<div class="auxiliar-shadow"></div>