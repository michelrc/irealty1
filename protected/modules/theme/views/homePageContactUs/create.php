

<?php





$this->breadcrumbs = array(
    $model->adminNames[3] ,Yii::t('sideMenu', 'Contact us section')  => array('admin'),
	t('Add'),
);

$this->title = Yii::t('YcmModule.ycm',
    'Create {name}',
    array('{name}'=> Yii::t('sideMenu', 'Contact us section'))
);

$this->renderPartial('_form', array(
    'model' => $model,
    'buttons' => 'create'));

