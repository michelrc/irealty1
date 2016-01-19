<div class="blue-bg"></div>
<div class="light-gray-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 news-item expanded">
                <header class="news-header">
                    <div class="date-badge">
                        <div class="rounded-wrapper blue"><span class="month text-uppercase"><?php echo $date_month?></span><span
                                class="day"><?php echo $date_day?></span>
                        </div>
                    </div>
                    <div class="news-title">
                        <h2><?php echo $title?></h2>
                        <span class="small"><?php echo Yii::t('Home', 'Posted by')?> <?php echo $author?></span>
                    </div>
                </header>
                <div class="related-image">
                    <?php if(isset($youtube_video)):?>
                    <div id="videoWrapper">
                        <iframe src="<?php echo $youtube_video?>"  height="100%" width="100%"></iframe>
                    </div>
                    <?php elseif(isset($image)):?>
                       <img src="<?php echo $image?>"  alt="<?php echo $image_alt?>" class="image-responsive">
                   <?php else:?>
                        <img src="/static/imgs/news-img-01.jpg" class="image-responsive">
                    <?php endif?>
                </div>
                <div class="related-description">
                    <p><?php echo $description;?></p>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="contact-section"


    <?php if(isset($home_contact_us_image)):?>
     style = 'background: url("<?php echo $home_contact_us_image?>") no-repeat scroll center center / cover rgba(0, 0, 0, 0);'
    <?php endif?>

    >
    <a href="<?php echo $this->createUrl('/frontend/default/contact_us')?>" class="contact-btn text-center">
        <span class="hover-transition">
            <?php if(isset($this->common_data['contact_us'])):
                echo $this->common_data['contact_us'];
            else:?>
                Contact Us
            <?php endif?>

        </span>
    </a>
</div>