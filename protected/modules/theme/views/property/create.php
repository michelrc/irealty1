

<?php





$this->breadcrumbs = array(
    $model->adminNames[3] ,Yii::t('sideMenu', 'List properties')  => array('admin'),
	t('Add'),
);

$this->title = Yii::t('YcmModule.ycm',
    'Create {name}',
    array('{name}'=>t("List properties"))
);

$this->renderPartial('_form', array(
    'model' => $model,
    'gallery_model' => $gallery_model,
    'buttons' => 'create',
    'criteria' => $criteria));

