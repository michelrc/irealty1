

<?php





$this->breadcrumbs = array(
    $model->adminNames[3] ,Yii::t('sideMenu', 'Navigation menu')  => array('admin'),
	t('Add'),
);

$this->title = Yii::t('YcmModule.ycm',
    'Create {name}',
    array('{name}'=>t("Navigation menu"))
);

$this->renderPartial('_form', array(
    'model' => $model,
    'buttons' => 'create'));

