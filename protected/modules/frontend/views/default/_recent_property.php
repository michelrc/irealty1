<?php
/* @var $property Array */
?>

<div class="recent-item">
    <div class="img-wrapper"><img src="<?php echo $property['image']?>" class="custom-responsive"></div>
    <div class="info-wrapper">
        <div class="name">
            <a href="<?php echo $this->createUrl('/frontend/default/property', array('id' => $property['id']))?>" class="hvr-underline-from-center"><?php echo $property['name']?></a>
        </div>
        <div class="short-description">
            <p><?php echo substr($property['description'], 0, 100); ?>...</p>
        </div>
        <ul class="feature-list list-inline">
            <li class="price"><i class="fa fa-tag"></i>USD <strong>$<?php echo $property['price']?></strong></li>
            <li class="bath"><i class="fa fa-moon-o"></i><?php echo $property['rooms']?></li>
            <li class="rooms"><i class="fa fa-tint"></i><?php echo $property['bathroom']?></li>
        </ul>
    </div>
</div>