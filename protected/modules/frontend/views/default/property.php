<div class="page-banner property-banner"
    <?php if (isset($banner_image)): ?>
     style='background: url("<?php echo $banner_image ?>") no-repeat scroll center center / cover rgba(0, 0, 0, 0);';
<?php endif ?>

>
<div class="banner-text">
    <?php if (isset($banner_title)):
        echo $banner_title;
    else:?>
        The finest <strong>Punta Cana</strong> properties at <strong>your disposal</strong>
    <?php endif ?>
</div>
<div class="search-strip">
    <div class="container">
        <h2 class="pull-left">

            <?php if (isset($page_title)): ?>
                <?php echo $page_title;?>
            <?php elseif ($category_slug == 'buy'): ?>
                <?php echo Yii::t('Property', 'Houses <strong>to buy</strong>')?>
            <?php else:?>
                <?php echo Yii::t('Property', 'Houses <strong>to rent</strong>')?>
            <?php endif?>
        </h2>
    </div>
</div>
</div>
<div class="gray-strip">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="section-title page-title">
                    <h2 class="white pull-left">
                        <?php echo $name ?>
                    </h2>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="light-gray-bg property-page">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="/"><?php echo $this->common_data['home']; ?></a>
                    </li>
                    <li>
                        <?php if ($category_slug == 'buy'): ?>
                            <a href="<?php echo $this->createUrl('/frontend/default/buy_list') ?>">
                                <?php echo $page_title;?>
                            </a>
                        <?php else: ?>
                            <a href="<?php echo $this->createUrl('/frontend/default/rent_list') ?>">
                                <?php echo $page_title;?>
                            </a>
                        <?php endif ?>
                    </li>
                    <li class="active"><?php echo $name?></li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-8 gallery-stuff">
                <div id="iframe_container" hidden="hidden">
                        <iframe src="<?php echo $youtube_video?>" height="100%" width="100%"></iframe>
                </div>
                <div id="property-gallery">
                    <div id="main-image">
                        <?php foreach ($gallery as $g): ?>
                            <div class="gallery-item">
                                <img src="<?php echo $g['image'] ?>" alt="<?php echo $g['image_alt'] ?>"
                                     class="image-responsive">

                                <div class="details-info hidden-sm hidden-xs">
                                    <ul class="list-inline">
                                        <li><i class="fa fa-map-marker fa-inverse pull-right"></i>
                                            <span>
                                                <strong> <?php echo $province?></strong>
                                            </span>
                                        </li>
                                        <li>
                                            <i class="fa fa-moon-o fa-inverse pull-right"></i><span><strong><?php echo $rooms ?></strong></span>
                                        </li>
                                        <li>
                                            <i class="fa fa-tint fa-inverse pull-right"></i><span><strong><?php echo $bathrooms?></strong></span>
                                        </li>
                                        <li><i class="fa fa-tag fa-inverse pull-right"></i><span
                                                class="text-uppercase">usd&nbsp;<strong>$<?php echo $price ?></strong></span>
                                        </li>
                                        <li>
                                            <i class="fa fa-arrows fa-inverse pull-right"></i><span><strong><?php echo $area ?>
                                                    &nbsp;</strong>m<sup>2</sup></span>
                                        </li>
                                    </ul>
                                </div>
                                <div class="detail-info visible-xs-block"><a href="" role="button"
                                                                             class="pull-right detail-trigger"><i
                                            class="fa fa-tag fa-inverse"></i></a><span
                                        class="price">USD<strong>$<?php echo $price ?></strong></span>

                                    <div class="details">
                                        <ul class="list-unstyled">
                                            <li><i class="fa fa-moon-o"></i><span
                                                    class="detail-title"><?php echo Yii::t('Property', 'Rooms') ?></span><span
                                                    class="count"><?php echo $rooms ?></span>
                                            </li>
                                            <li><i class="fa fa-tint"></i><span
                                                    class="detail-title"><?php echo Yii::t('Property', 'Baths') ?></span><span
                                                    class="count"><?php echo $bathrooms ?></span>
                                            </li>
                                            <li><i class="fa fa-arrows"></i><span
                                                    class="detail-title"><?php echo Yii::t('Property', 'Area') ?></span><span><?php echo $area ?>
                                                    m<sup>2</sup></span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach ?>
                    </div>
                    <div id="nav-images">
                        <i id="nav-left" class="fa fa-angle-left fa-inverse arrows"></i>
                        <i id="nav-right"
                            class="fa fa-angle-right fa-inverse arrows"></i>
                        <?php foreach ($gallery as $g): ?>
                            <div class="nav-item">
                                <img src="<?php echo $g['image'] ?>" alt="<?php echo $g['image_alt'] ?>" class="image-responsive">
                            </div>
                        <?php endforeach ?>
                    </div>
                </div>
                <?php if(count($amenities_data) > 0):?>
                <div class="property-description">
                    <h4 class="subtitle">

                        <?php echo Yii::t('Property', 'General description') ?></h4>

                    <p><?php echo $description ?></p>
                    <h4 class="subtitle"><?php echo Yii::t('Property', 'General amenities') ?></h4>

                    <div class="amenities text-center">
                        <?php foreach ($amenities_data as $amenities_arr): ?>
                            <ul class="amenities-list">
                                <?php foreach ($amenities_arr as $amenitie): ?>
                                    <li class="<?php if ($amenitie['relevant']) echo 'marked'; ?> "><?php echo $amenitie['title'] ?></li>
                                <?php endforeach ?>
                            </ul>
                        <?php endforeach ?>
                    </div>
                </div>
                <?php endif?>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 side-content">
                <div class="property-details">
                    <h3 class="title"><?php echo Yii::t('Property', 'Property <strong>Details</strong>') ?></h3>
                    <h5 class="subtitle"><?php echo Yii::t('Property', 'Place') ?></h5>

                    <p><?php echo $address ?></p>
                    <!--<h5 class="subtitle">Contract Type</h5>

                    <p>Option Sell</p>-->
                    <h5 class="subtitle"><?php echo Yii::t('Property', 'Property Type') ?></h5>

                    <p><?php echo $type ?></p>

                    <?php if ($best_tips != null and $best_tips != ''): ?>
                        <h5 class="subtitle"><?php echo Yii::t('Property', 'Best Tip') ?></h5>

                        <p><?php echo $best_tips ?></p>
                    <?php endif ?>
                </div>
                <input value="<?php echo $latitude ?>" hidden="hidden" id="latitude">
                <input value="<?php echo $longitude ?>" hidden="hidden" id="longitude">

                <div class="side-map" id="map_contact" style="float: left; width: 390px; min-height: 243px"></div>
<!--                <div class="side-map">-->
<!--                    <img  src="/static/imgs/side-map.jpg" class="image-responsive">-->
<!--                </div>-->
                <div class="fancy-buttons">
                    <?php if($youtube_video):?>
                    <a href="javascript:show_video()" id="li_video_button" role="button"
                       class="btn btn-primary btn-lg btn-block hover-transition">
                        <i class="fa fa-play-circle fa-2x"></i>
                        <?php echo Yii::t('Property', 'view property video') ?>
                    </a>
                    <a style="display: none" href="javascript:show_gallery()" id="li_gallery_button" role="button"
                       class="btn btn-primary btn-lg btn-block hover-transition">
                        <i class="fa fa-play-circle fa-2x"></i>
                        <?php echo Yii::t('Property','view property gallery')?>
                    </a>
                    <?php endif?>
                    <a
                        <?php if (isset($category_slug) and $category_slug == 'buy'): ?>
                            href="<?php echo $this->createUrl('/frontend/default/buy_list', array('rooms' => $rooms, 'bathrooms' => $bathrooms)) ?>"
                        <?php else: ?>
                            href="<?php echo $this->createUrl('/frontend/default/rent_list', array('rooms' => $rooms, 'bathrooms' => $bathrooms)) ?>"
                        <?php endif ?>

                        role="button" class="btn btn-primary btn-lg btn-block hover-transition">
                        <i class="fa fa-home fa-2x"></i>

                        <?php echo Yii::t('Property', 'similar property') ?>
                    </a>
                </div>
                <div class="side-form">
                    <div class="alert1 alert-success" id="property_contact_message" hidden="hidden"></div>
                    <form role="form" method="post" action="/sendemail" id="form_request_property">
                        <div class="gray-bg">
                            <h4>
                                <?php echo Yii::t('Property','Contact Property Broker')?>
<!--                                Contact <strong>Property Broker</strong>-->
                            </h4>

                            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <input type="text" name="property_id" value="<?php echo $_GET['id']?>" hidden="hidden">
                                <input type="text" id="name" name="name" placeholder="<?php echo Yii::t('Contactus', 'Name *')?>" required="required" class="form-control">
                            </div>
                            <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <input type="tel" id="phone" name="phone" placeholder="<?php echo Yii::t('Contactus', 'Phone')?>" class="form-control">
                            </div>
                            <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <input type="email" id="email" pattern="[\w-\.]{1,}@([\w-]{2,}\.)*([\w-]{2,}\.)[\w-]{2,4}" name="email" placeholder="<?php echo Yii::t('Contactus', 'Email *')?>" required="required" class="form-control">
                            </div>
                            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <textarea rows="5" id="message" name="message" placeholder="<?php echo Yii::t('Contactus', 'Message *')?>"  required="required" class="form-control"></textarea>
                            </div>
                            <div class="broker-name text-center">
                                <h5><?php echo $agent_name?></h5>
                                <a href="tel:<?php echo $agent_phone?>" class="hover-transition">
                                    <?php echo $agent_phone?>
                                </a>
                            </div>
                            <div class="broker-image hidden-md hidden-sm hidden-xs">
                                <img src="<?php echo $agent_photo?>" class="image-responsive img-circle">
                            </div>
                        </div>
                        <div class="form-group text-center">
                            <button type="submit" role="button" class="rounded-btn big-rounded hover-transition">
                                <?php echo Yii::t('Property','Contact <strong>now</strong>')?>
<!--                                Contact<br><strong>Now</strong>-->
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="row notify-section">
            <div class="col-lg-1 col-md-1 hidden-sm hidden-xs"></div>
            <div class="col-lg-6 col-md-6 col-sm-7 col-xs-12">
                <div id="newsletter_message" class="alert1 alert-success" hidden="hidden"></div>
                <div class="input-group">
                    <input type="text"
                           title="<?php echo Yii::t('Property','The email is not valid')?>"
                           id="newsletter_input"
                           placeholder="<?php if(isset($newsletter_placeholder)):echo $newsletter_placeholder;else:?>Get noticed of new properties added<?php endif?>"
                           class="form-control input-lg"><span
                        class="input-group-btn">
            <button onclick="add_subscribers()" class="btn btn-primary btn-lg hover-transition"><i class="fa fa-angle-double-right fa-inverse"></i>
            </button></span>
                </div>
            </div>
            <div class="col-lg-5 col-md-5 col-sm-5 hidden-xs"></div>
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