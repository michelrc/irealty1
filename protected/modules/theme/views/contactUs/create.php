

<?php





$this->breadcrumbs = array(
    $model->adminNames[3] ,Yii::t('sideMenu', 'Info')  => array('admin'),
	t('Add'),
);

$this->title = Yii::t('YcmModule.ycm',
    'Create {name}',
    array('{name}'=>t("Info"))
);

$this->renderPartial('_form', array(
    'model' => $model,
    'model_reason' => $model_reason,
    'buttons' => 'create'));

