<div class="light-gray-bg error-page">
  <h2 class="error-text text-center">
      <?php echo Yii::t('labels', "Your search didn't gave any result,<br> please search again or go back") ?>
  </h2>
  <p class="text-center colored-text"><?php echo Yii::t('labels', 'Error: Page not found!') ?></p>
  <div class="buttons text-center">
    <ul class="list-inline">
      <li><a href="/" class="btn btn-primary btn-lg text-uppercase hover-transition"><?php echo Yii::t('labels', 'home page') ?></a>
      </li>
      <li>
          <a href="<?php if (Yii::app()->request->getUrlReferrer() != ""): echo Yii::app()->request->getUrlReferrer();
          else: echo '/'; endif ?>" class="btn btn-default btn-lg text-uppercase hover-transition">
              <?php echo Yii::t('labels', 'go back') ?>
          </a>
      </li>
    </ul>
  </div>
</div>
