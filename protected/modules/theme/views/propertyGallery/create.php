

<?php





$this->breadcrumbs = array(
    $model->adminNames[3] ,Yii::t('sideMenu', 'Property gallery')  => array('admin'),
	t('Add'),
);

$this->title = Yii::t('YcmModule.ycm',
    'Create Property gallery',
    array('{name}'=>$model->adminNames[3])
);

$this->renderPartial('_form', array(
    'model' => $model, 'property_id' => $property_id,
    'buttons' => 'create'));

