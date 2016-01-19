<?php

/** @var $this LanguageController|FHasWidgetsBehavior */
/** @var $form TbActiveForm */
/** @var $model Language */

$this->menu = array(
    array('htmlOptions' => array('title' => Yii::t('admin', 'Manage categories'), 'class' => 'btn-large tip-bottom'), 'url' => array('admin'), 'icon' => 'th-list',),
);
?>

<div class="span12">
    <?php $this->beginWidget('bootstrap.widgets.TbBox', array(
        'title' => Yii::t('admin', 'Create new Category'),
        //'htmlOptions'=>array('class'=>'widget-plain')
        'htmlOptions' => array('class' => 'nopadding')
    ))?>
    <?php $this->renderPartial('_form', array('model' => $model)); ?>
    <?php $this->endWidget() ?>
</div>
