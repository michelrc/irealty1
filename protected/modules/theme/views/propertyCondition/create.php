

<?php





$this->breadcrumbs = array(
    $model->adminNames[3] ,Yii::t('sideMenu', 'Property condition')  => array('admin'),
	t('Add'),
);

$this->title = Yii::t('YcmModule.ycm',
    'Create Property condition',
    array('{name}'=>$model->adminNames[3])
);

$this->renderPartial('_form', array(
    'model' => $model,
    'buttons' => 'create'));

