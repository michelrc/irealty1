

<?php





$this->breadcrumbs = array(
    $model->adminNames[3] ,Yii::t('sideMenu', 'Why shop? Icons Section')  => array('admin'),
	t('Add'),
);

$this->title = Yii::t('YcmModule.ycm',
    'Create {name}',
    array('{name}'=>Yii::t('sideMenu', "Why shop? Icons Section"))
);

$this->renderPartial('_form', array(
    'model' => $model,
    'buttons' => 'create'));

