

<?php





$this->breadcrumbs = array(
    $model->adminNames[3] ,Yii::t('sideMenu', 'Popular property section')  => array('admin'),
	t('Add'),
);

$this->title = Yii::t('YcmModule.ycm',
    'Create {name}',
    array('{name}'=>t("Popular property section"))
);

$this->renderPartial('_form', array(
    'model' => $model,
    'buttons' => 'create'));

