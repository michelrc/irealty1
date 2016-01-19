

<?php





$this->breadcrumbs = array(
    $model->adminNames[3] ,Yii::t('sideMenu', 'Amenity')  => array('admin'),
	t('Add'),
);

$this->title = Yii::t('YcmModule.ycm',
    'Create Amenity',
    array('{name}'=>$model->adminNames[3])
);

$this->renderPartial('_form', array(
    'model' => $model,
    'buttons' => 'create'));

