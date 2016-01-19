<?php
/* @var $blog Array */
?>

<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 blog-item col-bordered">
    <header class="header">
        <div class="item-image">
            <img src="<?php echo $blog['image']?>" alt="<?php echo $blog['image_alt']?>" class="custom-responsive">
        </div>
        <div class="item-title">
            <div class="wrapper">
                <div class="date-badge text-center">
                    <div class="day"><?php echo $blog['date_day']?></div>
                    <div class="month"><?php echo $blog['date_month']?></div>
                    <div class="year"><?php echo $blog['date_year']?></div>
                </div>
                <div class="header-title">
                    <h4><a href="" class="hvr-underline-from-center"><?php echo $blog['title']?></a></h4>
                    <p class="small"><?php echo Yii::t('Home', 'Posted by')?> <a href="" class="hvr-underline-from-center"><?php echo $blog['author']?></a></p>
                </div>
            </div>
        </div>
    </header>
    <div class="item-content">
        <p>
            <?php echo $blog['description']?>
        </p>
    </div>
    <div class="text-right">
        <a href="<?php echo $this->createUrl('/frontend/default/blog', array('id'=>$blog['id']))?>" class="btn btn-success site-btn large-btn hover-transition">
            <?php echo Yii::t('labels', 'Read <strong>More</strong>')?>
        </a>
    </div>
</div>