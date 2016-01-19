

<?php





$this->breadcrumbs = array(
    $model->adminNames[3] ,Yii::t('sideMenu', 'Property/Amenity')  => array('admin'),
	t('Add'),
);

$this->title = Yii::t('YcmModule.ycm',
    'Create {name}',
    array('{name}'=>Yii::t('sideMenu', 'Property/Amenity'))
);

$this->renderPartial('_form', array(
    'model' => $model,
    'buttons' => 'create'));

