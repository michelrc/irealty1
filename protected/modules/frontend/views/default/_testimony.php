<?php
/* @var $testimony Array */
?>
<div class="testimony">
    <div class="portrait">
        <img src="<?php echo $t['photo']?>" alt="<?php echo $t['photo_alt']?>" class="img-responsive">
    </div>
    <div class="name"><?php echo $t['author_name']?>
        <?php if(isset($t['company_name']) and $t['company_name'] != ''):?>, <strong><?php echo $t['company_name']?></strong>
        <?php endif?>
    </div>
    <p class="testimony-text">
        <?php echo $t['text']?>
    </p>
</div>