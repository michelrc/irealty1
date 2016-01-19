<?php
/* @var $property Array */
/* @var $inverted boolean */
?>

<div class="property<?php if($inverted) echo ' property-inverted'?>">
    <?php if ($inverted) : ?>
        <div class="image bg-image">
            <div class="left-arrow"></div><img src="<?php echo $property['image']?>" class="custom-responsive to-bg">
        </div>
    <?php endif; ?>
    <div class="details">
        <div class="name">
            <a href="<?php echo $this->createUrl('/frontend/default/property', array('id' => $property['id']))?>" class="hvr-underline-from-center">
                <?php echo $property['name']?> <i class="fa fa-external-link"></i>
            </a>
        </div>
        <div class="short-description">
<!--            <p>--><?php //echo $property['description']?><!--</p>-->
            <p><?php echo substr($property['description'], 0, 90); ?>...</p>
        </div>
        <ul class="feature-list list-inline">
            <li class="price"><i class="fa fa-tag"></i>USD <strong>$<?php echo $property['price']?></strong></li>
            <li class="bath"><i class="fa fa-moon-o"></i><?php echo $property['rooms']?></li>
            <li class="rooms"><i class="fa fa-tint"></i><?php echo $property['bathroom']?></li>
        </ul>
    </div>
    <?php if (!$inverted) : ?>
        <div class="image bg-image">
            <div class="right-arrow"></div><img src="<?php echo $property['image']?>" class="custom-responsive to-bg">
        </div>
    <?php endif; ?>
</div>