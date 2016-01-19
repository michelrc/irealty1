

<?php





$this->breadcrumbs = array(
    $model->adminNames[3] ,Yii::t('sideMenu', 'Social networks')  => array('admin'),
	t('Add'),
);

$this->title = Yii::t('YcmModule.ycm',
    'Create Social networks',
    array('{name}'=>$model->adminNames[3])
);

$this->renderPartial('_form', array(
    'model' => $model,
    'buttons' => 'create'));

