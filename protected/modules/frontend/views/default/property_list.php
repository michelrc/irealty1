<div class="page-banner property-list-banner"

    <?php if (isset($banner_image)): ?>
     style='background: url("<?php echo $banner_image ?>") no-repeat scroll center center / cover rgba(0, 0, 0, 0);';
<?php endif ?>

>
<!--img(src="/static/imgs/property-list-banner.jpg").image-responsive.hidden-xs-->
<!--img(src="/static/imgs/property-list-banner-mobile.jpg").img-responsive.visible-xs-block-->
<div class="banner-text">
    <?php if (isset($banner_title)):
        echo $banner_title;
    else:?>
        The finest <strong>Punta Cana</strong> properties at <strong>your disposal</strong>
    <?php endif ?>
</div>
<div class="search-strip" id="title_section">
    <div class="container">
        <h2 class="pull-left">
            <?php if (isset($page_title)):
                echo $page_title;
            else:?>
                Houses <strong>to buy</strong>
            <?php endif ?>
        </h2>
    </div>
</div>
</div>

<?php if($category == 'buy'):?>
<form action="<?php echo $this->createUrl('/frontend/default/buy_list') . '#title_section' ?>" id="filter_form"
<?php elseif($category == 'rent'):?>
<form action="<?php echo $this->createUrl('/frontend/default/rent_list') . '#title_section' ?>" id="filter_form"
<?php endif?>
      method="get">
    <div class="gray-strip">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="section-title filter-section">
                        <div class="row">
                            <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12 col-lg-push-2 col-md-push-2 col-sm-push-2">
                                <span class="pull-left filter-label">
                                    <?php echo Yii::t('labels', 'Filter by') ?>:
                                </span>
                                <ul class="list-inline pull-left">
                                    <li>
                                        <select class="form-control" name="province" onchange="trigger_form_filter_properties_list()">
                                            <option value="-1" selected><?php echo Yii::t('Property', 'Location') ?></option>
                                            <?php foreach ($locations as $location): ?>
                                                <option value="<?php echo $location['id'] ?>"
                                                        selected><?php echo $location['name'] ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </li>
                                    <li>
                                        <select name="rooms" class="form-control"
                                                onchange="trigger_form_filter_properties_list()">
                                            <option value="-1"> <?php echo Yii::t('Property', 'Rooms') ?></option>
                                            <?php for ($i = 1; $i <= 5; $i++): ?>
                                                <option
                                                    value="<?php echo $i ?>" <?php if ($rooms_selected == $i) echo 'selected' ?> > <?php echo $i ?> </option>
                                            <?php endfor ?>
                                        </select>
                                    </li>
                                    <li>
                                        <select name="bathrooms" class="form-control" onchange="trigger_form_filter_properties_list()">
                                            <option value="-1"> <?php echo Yii::t('Property', 'Baths') ?></option>
                                            <?php for ($i = 1; $i <= 10; $i++): ?>
                                                <option
                                                    value="<?php echo $i ?>" <?php if ($bathrooms_selected == $i) echo 'selected' ?> > <?php echo $i ?> </option>
                                            <?php endfor ?>
                                        </select>
                                    </li>
                                    <li>
                                        <select name="price" class="form-control" onchange="trigger_form_filter_properties_list()">
                                            <option value="-1"> <?php echo Yii::t('Property', 'Price') ?></option>
                                            <?php foreach ($price_range as $price): ?>
                                                <option
                                                    value="<?php echo $price['id'] ?>" <?php if ($price_range_selected == $price['id']) echo 'selected' ?> > <?php echo $price['value'] ?> </option>
                                            <?php endforeach ?>
                                        </select>
                                    </li>
                                    <li>
                                        <select name="condition" class="form-control"
                                                onchange="trigger_form_filter_properties_list()">
                                            <option value="-1"> <?php echo Yii::t('Property', 'Condition') ?> </option>
                                            <?php foreach ($conditions as $condition): ?>
                                                <option
                                                    value="<?php echo $condition['id'] ?>" <?php if ($condition_selected == $condition['id']) echo 'selected' ?> > <?php echo $condition['condition_title'] ?> </option>
                                            <?php endforeach ?>
                                        </select>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-7 col-lg-pull-9 col-md-pull-9 col-sm-pull-9">
                                <span class="pull-left"><?php echo Yii::t('labels', 'Order by') ?>:</span>
                                <select class="form-control" name="order" onchange="trigger_form_filter_properties_list()">
                                    <option value="-1" selected><?php echo Yii::t('Property', 'Order by')?></option>
                                    <option value="lower_price" ><?php echo Yii::t('Property', 'Lower price')?></option>
                                    <option value="high_price" ><?php echo Yii::t('Property', 'Higher price')?></option>
                                </select>
                            </div>
                            <div class="col-lg-1 col-md-1 col-sm-2 col-xs-5 text-center">
                                <a href="javascript:trigger_form_filter_properties_list()" class="rounded-btn big-rounded filter-search">
                                    <?php echo Yii::t('Property', 'Search')?>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="light-gray-bg property-list-page">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div data-toggle="buttons" class="category-filters btn-group pull-left">
                        <label for="all" class="btn <?php if($type_selected == "-1") echo 'active';?> hover-transition">
                            <input type="radio" name="options_type" onchange="trigger_form_filter_properties_list()" value="-1" <?php if($type_selected == "-1") echo 'checked';?> id="all">
                            <?php echo Yii::t('labels', 'All')?>
                        </label>
                        <?php foreach($property_types as $type):?>
                        <label for="house" class="<?php if($type_selected == $type['id']) echo 'active';?> btn hover-transition">
                            <input type="radio" name="options_type" onchange="trigger_form_filter_properties_list()" value="<?php echo $type['id']?>"  <?php if($type_selected == $type['id']) echo 'checked';?> ><?php echo $type['type']?>
                        </label>
                        <?php endforeach?>
                    </div>
                </div>
            </div>
</form>
<div class="row">
    <?php foreach($properties as $property):?>
    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6 small-padding">
        <div class="property-wrapper">
            <?php if(isset($property['image'])):?>
                <img src="<?php echo $property['image']?>" alt="<?php echo $property['image_alt']?>" class="image-responsive">
            <?php else:?>
                <img src="/static/imgs/recent-img-01.jpg" class="image-responsive">
            <?php endif?>

            <div class="detail-info">
                <a href="" role="button" class="pull-right detail-trigger">
                    <i class="fa fa-tag fa-inverse"></i></a><span class="price"><?php echo $currency['alphabetical_code']?><strong><?php echo $currency['symbol']?><?php echo $property['price']?></strong></span>
                <div class="details">
                    <ul class="list-unstyled">
                        <li><i class="fa fa-map-marker"></i><span class="detail-title"><?php echo Yii::t('Property', 'Place')?></span>

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
    </div>
    <?php endforeach?>
</div>
<div class="row notify-section">
    <div class="col-lg-5 col-md-5 col-sm-6 col-xs-12">
        <div id="newsletter_message" class="alert1 alert-success" hidden="hidden"></div>
        <div class="input-group">
            <input type="text" title="<?php echo t('The email is not valid')?>" id="newsletter_input" placeholder="<?php if(isset($newsletter_placeholder)):echo $newsletter_placeholder;else:?>Get noticed of new properties added<?php endif?>"
                   class="form-control input-lg">
            <span class="input-group-btn">
                <button type="button" onclick="add_subscribers()" class="btn btn-primary btn-lg hover-transition"><i class="fa fa-angle-double-right fa-inverse"></i>
                </button>
            </span>
        </div>
    </div>
    <div class="col-lg-2 col-md-1 hidden-xs col-xs-12"></div>
    <div class="col-lg-5 col-md-6 col-sm-6 col-xs-12">
        <?php $this->widget('TbPager', array(
            'pages' => $pages,
    //                'containerTag' => 'div class="col-lg-7 col-md-7 col-sm-5 col-xs-12 col-lg-push-5 col-md-push-5 col-sm-push-7 text-center"',
            'htmlOptions' => array('class' => 'pagination pagination-lg pull-right'),
            'selectedPageCssClass' => 'active',
            'nextPageLabel' => '<i class="fa fa-angle-double-right"></i>',
            'prevPageLabel' => '<i class="fa fa-angle-double-left"></i>'
        )) ?>
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

                <?php foreach($most_popular_properties as $property):?>
                <div class="property-item">

                    <?php if(isset($property['image'])):?>
                        <img src="<?php echo $property['image']?>" alt="<?php echo $property['image_alt']?>" class="image-responsive">
                    <?php else:?>
                        <img src="/static/imgs/recent-img-01.jpg" class="image-responsive">
                    <?php endif?>

                    <div class="detail-info">
                        <a href="" role="button" class="pull-right detail-trigger">
                            <i class="fa fa-tag fa-inverse"></i></a><span class="price"><?php echo $currency['alphabetical_code']?><strong><?php echo $currency['symbol']?><?php echo $property['price']?></strong></span>
                        <div class="details">
                            <ul class="list-unstyled">
                                <li><i class="fa fa-map-marker"></i><span class="detail-title"><?php echo Yii::t('Property', 'Place')?></span>

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
<div class="auxiliar-shadow"></div>

<style>
    .list-inline.pull-left > li{
        min-width: 152.55px;
    }
</style>