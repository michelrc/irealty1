<?php

/** @var $this LanguageController|FHasWidgetsBehavior */
/** @var $form TbActiveForm */
/** @var $model Language */
/** @var $module I18nModule */

$this->menu = array(
    array('htmlOptions' => array('title' => Yii::t('admin', 'Create new category'), 'class' => 'btn-large tip-bottom'), 'url' => array('create'), 'icon' => 'file',),
    array('htmlOptions' => array('title' => Yii::t('admin', 'View this category'), 'class' => 'btn-large tip-bottom'), 'url' => array('view', 'id' => $model->primaryKey), 'icon' => 'eye-open',),
    array(
        'htmlOptions' => array(
            'title' => Yii::t('admin', 'Delete this category'),
            'class' => 'btn-large tip-bottom',
            'submit' => array('delete', 'id' => $model->getPrimaryKey()),
            'confirm' => Yii::t('app', 'Do you really want to delete this category?')
        ),
        'url' => '#',
        'icon' => 'trash', 'buttonType' => 'ajaxLink'
    ),
    array('htmlOptions' => array('title' => Yii::t('admin', 'Manage categories'), 'class' => 'btn-large tip-bottom'), 'url' => array('admin'), 'icon' => 'th-list',),
);

$this->breadcrumbs = array(
    array('label' => Yii::t('admin', 'Language'), 'icon' => 'globe', 'url' => array('//i18n')),
    array('label' => I18nCategory::label(2), 'icon' => 'tags', 'url' => array('//i18n/category')),
    array('label' => GxHtml::valueEx($model), 'icon' => 'eye', 'url' => array('view', 'id' => $model->primaryKey)),
    Yii::t('admin', 'Update')
);

?>

<div class="row-fluid">
    <div class="span12">
        <?php $this->beginWidget('bootstrap.widgets.TbBox', array(
            'title' => Yii::t('admin', 'Update Category'),
            //'htmlOptions'=>array('class'=>'widget-plain')
            'htmlOptions' => array('class' => 'nopadding')
        ))?>
        <?php $this->renderPartial('_form', array('model' => $model)); ?>
        <?php $this->endWidget() ?>
    </div>
</div>
