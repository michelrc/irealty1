

<?php





$this->breadcrumbs = array(
    $model->adminNames[3] ,Yii::t('sideMenu', 'Property category')  => array('admin'),
	t('Add'),
);

$this->title = Yii::t('YcmModule.ycm',
    'Create {name}',
    array('{name}'=>t("Property category"))
);

$this->renderPartial('_form', array(
    'model' => $model,
    'buttons' => 'create'));

