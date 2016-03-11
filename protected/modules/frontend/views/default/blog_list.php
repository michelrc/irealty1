<div class="blue-bg"></div>
<div class="gray-strip">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="section-title page-title">
                    <h2 class="white pull-left">
                        <strong>
                            <?php echo Yii::t('Blog', 'Blog')?>
                        </strong>
                    </h2>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="light-gray-bg">
    <div class="container">
        <div class="row">
            <?php foreach($blog_list as $blog):?>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 blog-item">
                <div class="related-image" >
                    <?php if(isset($blog['youtube_video'])):?>
<!--                        <div id="videoWrapper">-->
                        <iframe src="<?php echo $blog['youtube_video']?>"  height="100%" width="100%"></iframe>
<!--                        </div>-->
                    <?php else:?>
                        <img src="<?php echo $blog['image']?>" alt="<?php echo $blog['image_alt']?>" class="image-responsive">
                    <?php endif?>
<!--                    <img src="/static/imgs/blog-img-01.jpg" class="image-responsive">-->
                </div>
                <div class="item-content">
                    <div class="rounded-wrapper blue"><span class="month text-uppercase"><?php echo $blog['date_month']?></span><span
                            class="day"><?php echo $blog['date_day']?></span>
                    </div>
                    <a href="<?php echo $this->createUrl('/frontend/default/blog', array('id'=>$blog['id']))?>" class="hover-transition item-title">
                        <h1><?php echo $blog['title']?></h1></a>
                    <span class="small"><?php echo Yii::t('Home', 'Posted by')?> <?php echo $blog['author']?></span>

                    <div class="item-short-text">
                        <p class="text-justify">
                            <?php echo $blog['description']?>
                        </p>
                    </div>
                    <a href="<?php echo $this->createUrl('/frontend/default/blog', array('id' => $blog['id']))?>" class="read-more pull-right">
                        <?php echo Yii::t('labels', 'read more')?>...
                    </a>
                </div>
            </div>
            <?php endforeach?>
        </div>
        <div class="row notify-section">
            <div class="col-lg-5 col-md-5 col-sm-6 col-xs-12">
                <div id="newsletter_message" class="alert1 alert-success" hidden="hidden"></div>
                <div class="input-group">
                    <input type="text" title="<?php echo Yii::app()->getLanguage() == 'en' ? t('The email is not valid'):t('Correo incorrecto') ?>" type="text" id="newsletter_input" placeholder="<?php if(isset($newsletter_placeholder)):echo $newsletter_placeholder;else:?>Get noticed of new properties added<?php endif?>"
                           class="form-control input-lg"><span class="input-group-btn">
            <button onclick="add_subscribers()" class="btn btn-primary btn-lg hover-transition"><i class="fa fa-angle-double-right fa-inverse"></i>
            </button></span>
                </div>
            </div>
            <div class="col-lg-2 col-md-1 hidden-sm hidden-xs"></div>
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