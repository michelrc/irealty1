<script>
    $(".detail-trigger").on("click", function (e) {
            e.preventDefault();
            $(this).siblings(".details").stop(true, true).slideToggle(300);
        });
</script>
<?php foreach($recent_properties as $property):?>
    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6 small-padding">
        <div class="property-wrapper">
            <?php if(isset($property['image'])):?>
                <img src="<?php echo $property['image']?>" alt="<?php echo $property['image_alt']?>" class="image-responsive">
            <?php else:?>
                <img src="/static/imgs/recent-img-01.jpg" class="image-responsive">
            <?php endif?>

        <div class="detail-info" > <a href="" role="button" class="pull-right detail-trigger"><i
                    class="fa fa-tag fa-inverse"></i></a><span
                class="price">USD<strong>$<?php echo $property['price']?></strong></span>

            <div class="details" style="display: none">
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
<input value="<?php echo $count_recent_properties?>" hidden="hidden" id="recent_count_properties">