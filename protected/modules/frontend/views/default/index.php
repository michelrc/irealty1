<div class="main-banner-section">
    <div id="main-carousel">
        <?php foreach($banner_slide as $banner):?>
        <div class="carousel-item">
            <img src="<?php echo $banner['image']?>" alt="<?php echo $banner['image_alt']?>" class="image-responsive">
        </div>
        <?php endforeach?>
    </div>
    <input id="searcher_buy_url" hidden="hidden" value="<?php echo $this->createUrl('/frontend/default/buy_list')?>">
    <input id="searcher_rent_url" hidden="hidden" value="<?php echo $this->createUrl('/frontend/default/rent_list')?>">
    <form id="searcher_form" action="<?php echo $this->createUrl('/frontend/default/buy_list')?>" method="get">

    <div class="home-search-input hidden-xs">
        <div class="filter-buttons">
            <span class="span-text">
                <?php if(isset($searcher_title)):
                    echo $searcher_title;
                else:?>
                    The <strong>house</strong> of <strong>your dreams</strong>
                <?php endif?>

            </span>

            <div data-toggle="buttons" class="btns btn-group">
                <label for="to-buy" class="btn active hover-transition">
                    <input type="radio" value="buy" name="cat" onchange="change_url_searcher_form('buy')" checked id="buy">
                    <?php if(isset($searcher_buy)):
                        echo $searcher_buy;
                    else:?>
                        to Buy
                    <?php endif?>
                </label>
                <label for="to-rent" class="btn hover-transition">
                    <input type="radio" name="cat" id="rent" value="rent" onchange="change_url_searcher_form('rent')">
                    <?php if(isset($searcher_rent)):
                            echo $searcher_rent;
                        else:?>
                            to Rent
                        <?php endif?>
                </label>

                <div class="input-group">
                    <input id="searcher_input" name="q"  type="text" placeholder="<?php if(isset($searcher_placeholder)): echo $searcher_placeholder;else:?>Search by address, city, zip code<?php endif?>"
                           class="form-control input-lg"><span class="input-group-btn">
            <button type="submit" class="btn btn-primary btn-lg hover-transition"><i class="fa fa-search"></i>
            </button></span>
                </div>
            </div>

        </div>
    </div>
    </form>
</div>
<div class="container">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <a href="" class="section-anchor"><i class="fa fa-angle-down fa-2x"></i></a>

            <div class="section-title">
                <h2>
                    <?php if(isset($leading_property_title)):
                        echo $leading_property_title;
                    else:?>
                        The finest <strong>Punta Cana</strong> properties at <strong>your disposal</strong>
                    <?php endif?>
                </h2>
            </div>
            <div class="properties-carousel"><i class="arrows arrow-left fa fa-angle-left fa-inverse"></i><i
                    class="arrows arrow-right fa fa-angle-right fa-inverse"></i>

                <?php foreach($leading_properties as $property):?>
                <div class="property-item">
                    <?php if(isset($property['image'])):?>
                        <img src="<?php echo $property['image']?>" alt="<?php echo $property['image_alt']?>" class="image-responsive">
                    <?php else:?>
                        <img src="/static/imgs/properties-img-03.jpg" class="image-responsive">
                    <?php endif?>

                    <div class="detail-info">
                        <a href="" role="button" class="pull-right detail-trigger">
                            <i class="fa fa-tag fa-inverse"></i></a><span
                            class="price">USD<strong>$<?php echo $property['price']?></strong></span>

                        <div class="details">
                            <ul class="list-unstyled">
                                <li><i class="fa fa-map-marker"></i><span class="detail-title">
                                        <?php echo Yii::t('Property', 'Place')?>
                                    </span>

                                    <p><?php echo $property['address']?></p>
                                </li>
                                <li><i class="fa fa-arrows"></i><span
                                        class="detail-title"><?php echo Yii::t('Property', 'Area')?></span><span><?php echo $property['area']?> m<sup>2</sup></span>
                                </li>
                                <li><i class="fa fa-moon-o"></i><span class="detail-title"><?php echo Yii::t('Property', 'Rooms')?></span><span
                                        class="count"><?php echo $property['rooms']?></span>
                                </li>
                                <li><i class="fa fa-tint"></i><span class="detail-title"><?php echo Yii::t('Property', 'Baths')?></span><span
                                        class="count"><?php echo $property['bathroom']?></span>
                                </li>
                            </ul>
                            <a href="<?php echo $this->createUrl('/frontend/default/property', array('id' => $property['id']))?>" class="text-right rounded-btn">
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
<div class="recent-section">
    <div class="gray-strip">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="section-title">
                        <h2 class="white pull-left">
                            <?php if(isset($recent_property_title)):
                                echo $recent_property_title;
                            else:?>
                            Our recents <strong>properties</strong>
                            <?php endif?>
                        </h2>

                        <div data-toggle="buttons" class="blue-filters btn-group pull-right">
                            <label for="buy" class="btn active">
                                <input type="radio" name="options_category" value="buy" onchange="filter_properties()" checked id="buy">
                                <?php if(isset($category_buy->category_name)):
                                    echo $category_buy->category_name;
                                else:?>
                                    Buy
                                <?php endif?>
                            </label>
                            <label for="rent" class="btn">
                                <input type="radio" name="options_category" value="rent" onchange="filter_properties()" id="rent">
                                <?php if(isset($category_rent->category_name)):
                                    echo $category_rent->category_name;
                                else:?>
                                    Rent
                                <?php endif?>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                <div data-toggle="buttons" class="category-filters btn-group pull-left">
                    <label for="all" class="btn <?php if($type_selected == 'all'):?>active<?php endif?> hover-transition">
                        <input type="radio" value="all" name="options_type" onchange="filter_properties()" checked id="all"><?php echo Yii::t('labels', 'All')?>
                    </label>
                    <?php foreach($property_types as $type):?>
                    <label for="house" class="btn hover-transition">
                        <input type="radio" name="options_type" onchange="filter_properties()" value="<?php echo $type['id']?>" id=""> <?php echo $type['type']?>
                    </label>
                    <?php endforeach?>
                </div>
            </div>
        </div>
        <div class="row">
            <div id="recent_properties_container">
                <?php foreach($recent_properties as $property):?>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6 small-padding">
                    <div class="property-wrapper">
                        <?php if(isset($property['image'])):?>
                            <img src="<?php echo $property['image']?>" alt="<?php echo $property['image_alt']?>" class="image-responsive">
                        <?php else:?>
                            <img src="/static/imgs/recent-img-01.jpg" class="image-responsive">
                        <?php endif?>

                    <div class="detail-info"><a href="" role="button" class="pull-right detail-trigger"><i
                                class="fa fa-tag fa-inverse"></i></a><span
                            class="price">USD<strong>$<?php echo $property['price']?></strong></span>

                        <div class="details">
                            <ul class="list-unstyled">
                                <li><i class="fa fa-map-marker"></i><span class="detail-title">
                                        <?php echo Yii::t('Property', 'Place')?>
                                    </span>

                                    <p><?php echo $property['address']?></p>
                                </li>
                                <li><i class="fa fa-arrows"></i><span
                                        class="detail-title"><?php echo Yii::t('Property', 'Area')?></span>
                                    <span><?php echo $property['area']?> m<sup>2</sup></span>
                                </li>
                                <li><i class="fa fa-moon-o"></i><span class="detail-title">
                                        <?php echo Yii::t('Property', 'Rooms')?></span>
                                    <span class="count"><?php echo $property['rooms']?></span>
                                </li>
                                <li><i class="fa fa-tint"></i><span class="detail-title">
                                        <?php echo Yii::t('Property', 'Baths')?>
                                    </span><span class="count"><?php echo $property['bathroom']?></span>
                                </li>
                            </ul>
                            <a href="<?php echo $this->createUrl('/frontend/default/property', array('id' => $property['id']))?>" class="text-right rounded-btn">
                                <?php echo Yii::t('Property', 'View')?><br><strong><?php echo Yii::t('Property', 'Details')?></strong>
                            </a>
                        </div>
                    </div>
                </div>
                </div>
                <?php endforeach?>
            </div>
        </div>
        <div class="row notify-section">
            <div class="col-lg-5 col-md-5 col-sm-6">
                <div id="newsletter_message" class="alert1 alert-success" hidden="hidden"></div>
                <div class="input-group">
                    <input title="<?php echo t('The email is not valid')?>" id="newsletter_input" type="text" placeholder="<?php if(isset($newsletter_placeholder)):echo $newsletter_placeholder;else:?>Get noticed of new properties added<?php endif?>"
                           class="form-control input-lg"><span class="input-group-btn">
            <button onclick="add_subscribers()" class="btn btn-primary btn-lg hover-transition"><i class="fa fa-angle-double-right fa-inverse"></i>
            </button></span>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-2"></div>
            <div class="col-lg-3 col-md-3 col-sm-4 text-right">
                <?php if($show_more_properties > 6):?>
                    <a href="<?php echo $this->createUrl('/frontend/default/buy_list')?>" class="view-more" id="buy_view_more">
                        <?php if(isset($recent_property_view_more)):
                            echo $recent_property_view_more;
                        else:?>
                            View more properties
                        <?php endif?>
                    </a>
                    <a href="<?php echo $this->createUrl('/frontend/default/rent_list')?>" hidden="hidden" class="view-more" id="rent_view_more">
                        <?php if(isset($recent_property_view_more)):
                            echo $recent_property_view_more;
                        else:?>
                            View more properties
                        <?php endif?>
                    </a>
                <?php endif?>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row equalize white-blue-section">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="section-title">
                <h2 class="text-center">
                    <?php if(isset($why_shop_title)):
                        echo $why_shop_title;
                    else:?>
                    Why shop a <strong>home</strong> on <strong>PuntaCana</strong>?
                    <?php endif?>
                </h2>

                <p class="text-center">
                    <?php if(isset($why_shop_subtitle)):
                       echo $why_shop_subtitle;
                    else:?>
                    Buying a home is a big deal. We can help you figure out how much money
                    you have to work with and bring clarity to your mortgage process.
                    <?php endif?>
                </p>
            </div>
            <?php foreach($why_shop_icons as $wshop_icons):?>
            <div class="promo-item text-center">
                <div class="icon-wrapper">
                    <img src="<?php echo $wshop_icons['icon_image']?>" alt="<?php echo $wshop_icons['icon_image_alt']?>"/>
<!--                    <i class="fa fa-dollar fa-2x fa-inverse"></i>-->
                </div>
                <h3 class="title"><?php echo $wshop_icons['title']?></h3>

                <p class="promo-text">
                    <?php echo $wshop_icons['subtitle']?>
                </p>
            </div>
            <?php endforeach?>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 news">
            <?php foreach($blogs as $b):?>
            <div class="news-item">
                <header class="news-header">
                    <div class="date-badge">
                        <div class="rounded-wrapper"><span class="month text-uppercase"><?php echo $b['date_month']?></span><span
                                class="day"><?php echo $b['date_day']?></span>
                        </div>
                    </div>
                    <div class="news-title">
                        <a href="<?php echo $this->createUrl('/frontend/default/blog', array('id' => $b['id']))?>" class="hover-transition">
                            <h2><?php echo $b['title']?></h2></a>
                        <span class="small"><?php echo Yii::t('Home', 'Posted by')?> <?php echo $b['author']?></span>
                    </div>
                </header>
                <div class="news-short-text">
                    <p class="text-justify">
                        <?php echo $b['summary']?>
                    </p>
                </div>
                <a href="<?php echo $this->createUrl('/frontend/default/blog', array('id' => $b['id']))?>" class="read-more pull-right">
                    <?php echo Yii::t('labels', 'read more')?>...
                </a>
            </div>
            <?php endforeach?>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <h2 class="text-center testimonials-title">
                <?php if(isset($testimonials_title)):
                   echo $testimonials_title;
                else:?>
                   Testimonials
                <?php endif?>

            </h2>

            <div id="testimonials">
                <i id="tLeft" class="fa fa-angle-left arrows"></i>
                <i id="tRight" class="fa fa-angle-right arrows"></i>
                <?php foreach($testimonials as $t):?>
                <div class="testimony">
                    <p class="text-justify">

                        <?php echo $t['text']?>
                    </p>
                </div>
                <?php endforeach?>

            </div>
            <div id="testimonials-nav">
                <?php foreach($testimonials as $key => $t):?>
                <div class="nav-item <?php if($key == 0):?>active<?php endif?>">
                    <div class="marker"><img src="/static/imgs/arrow-down.png">
                    </div>
                    <div class="nav-image">
                        <?php if(isset($t['photo'])):?>
                            <img src="<?php echo $t['photo']?>" alt="<?php echo $t['photo_alt']?>" class="image-responsive">
                        <?php else:?>
                            <img src="/static/imgs/testimonial-img-01.png" class="image-responsive">
                        <?php endif?>

                    </div>
                    <div class="nav-caption text-center">
                        <h4><?php echo $t['author_name']?><span class="small"><?php echo $t['company_name']?></span>
                        </h4>
                    </div>
                </div>
                <?php endforeach?>
            </div>
        </div>
    </div>
</div>
<div class="contact-section"
    <?php if(isset($contact_us_image)):?>
     style = 'background: url("<?php echo $contact_us_image?>") no-repeat scroll center center / cover rgba(0, 0, 0, 0);'
    <?php endif?>

    >
    <a href="<?php echo $this->createUrl('/frontend/default/contact_us')?>" class="contact-btn text-center">
        <span class="hover-transition">
            <?php if(isset($this->common_data['contact_us'])):
                echo $this->common_data['contact_us'];
            else:?>
                contact us
            <?php endif?>
        </span>
    </a>
</div>