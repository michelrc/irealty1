

<?php





$this->breadcrumbs = array(
    $model->adminNames[3] ,Yii::t('sideMenu', 'Newsletter section')  => array('admin'),
	t('Add'),
);

$this->title = Yii::t('YcmModule.ycm',
    'Create {name}',
    array('{name}'=>t("Newsletter section"))
);

$this->renderPartial('_form', array(
    'model' => $model,
    'buttons' => 'create'));

