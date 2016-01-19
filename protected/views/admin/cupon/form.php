<?php
/* @var $this ModelController */
/* @var $title string */
/* @var $model GxActiveRecord */
/* @var $form TbActiveForm */

$this->pageTitle=$title;
$this->title=$title;

$attributes=array();
foreach ($model->attributeLabels() as $attribute=>$label) {
	if (isset($model->tableSchema->columns[$attribute]) && $model->tableSchema->columns[$attribute]->isPrimaryKey===true) {
		continue;
	}
	$attributes[]=$attribute;
}
$attributes=array_filter(array_unique(array_map('trim',$attributes)));
$params = Yii::app()->controller->actionParams;
$route = Yii::app()->controller->route;

$form=$this->beginWidget('application.extensions.bootstrap.widgets.TbActiveForm',array(
    'id'=>get_class($model).'-id-form',
    'enableClientValidation'=>false,
    'clientOptions'=>array(
        'validateOnSubmit'=>false,
    ),
    'type'=>'horizontal',
    'inlineErrors'=>false,
    'htmlOptions'=>array('enctype'=>'multipart/form-data', 'class' => 'form-bordered'),
));

echo $form->errorSummary($model);

$this->printHiddenAttributes($model, $next);

foreach ($attributes as $attribute) {
    ycm()->createWidget($form,$model,$attribute);
}

echo '<div class="form-actions">';
$buttons=CMap::mergeArray(array(
    array(
        'buttonType'=>'submit',
        'type'=>'primary',
        'label'=>Yii::t('YcmModule.ycm','Save'),
        'htmlOptions'=>array('name'=>'_save')
    ),
), $model->can_create()?array(
    array(
        'buttonType'=>'submit',
        'label'=>Yii::t('YcmModule.ycm','Save and add another'),
        'htmlOptions'=>array('name'=>'_addanother')
    ),
    array(
        'buttonType'=>'submit',
        'label'=>Yii::t('YcmModule.ycm','Save and continue editing'),
        'htmlOptions'=>array('name'=>'_continue')
    ),
):array(
    array(
        'buttonType'=>'submit',
        'label'=>Yii::t('YcmModule.ycm','Save and continue editing'),
        'htmlOptions'=>array('name'=>'_continue')
    ),
));
if (!$model->isNewRecord && $model->can_delete()) {
    array_push($buttons,array(
        'buttonType'=>'link',
        'type'=>'danger',
        'url'=>'#',
        'label'=>Yii::t('YcmModule.ycm','Delete'),
        'htmlOptions'=>array(
            'submit'=>array(
                'model/delete',
                'name'=>get_class($model),
                'pk'=>$model->primaryKey,
            ),
            'confirm'=>Yii::t('YcmModule.ycm','Are you sure you want to delete this item?'),
        )
    ));
}
$this->widget('application.extensions.bootstrap.widgets.TbButtonGroup',array(
    'type'=>'',
    'buttons'=>$buttons,
));
echo '</div>';
$this->endWidget();

