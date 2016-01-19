<?php
    /* @var $news Array */
?>

<div class="news-item">
    <div class="news-header">
        <div class="date-badge text-center">
            <div class="day"><?php echo $news['date_day']?></div>
            <div class="month"><?php echo $news['date_month']?></div>
            <div class="year"><?php echo $news['date_year']?></div>
        </div>
        <div class="header-title">
            <h4><a href="<?php echo $this->createUrl('/frontend/default/blog', array('id' => $news['id']))?>" class="hvr-underline-from-center"><?php echo $news['title']?></a></h4>

            <p class="small"><?php echo Yii::t('Home', 'Posted by')?> <a href="" class="hvr-underline-from-center"><?php echo $news['author']?></a></p>
        </div>
    </div>
    <div class="news-content">
        <p><?php echo $news['summary']?></p>
        <div class="text-right">
            <a href="<?php echo $this->createUrl('/frontend/default/blog', array('id' => $news['id']))?>" class="hvr-underline-from-center read-more">
                <?php echo Yii::t('labels', 'Read more')?>...
            </a>
        </div>
    </div>
</div>