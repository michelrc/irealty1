

<?php





$this->breadcrumbs = array(
    $model->adminNames[3] ,Yii::t('sideMenu', 'Filter config')  => array('admin'),
	t('Add'),
);

$this->title = Yii::t('YcmModule.ycm',
    'Create {name}',
    array('{name}'=>t("Filter config"))
);

$this->renderPartial('_form', array(
    'model' => $model,
    'buttons' => 'create'));

