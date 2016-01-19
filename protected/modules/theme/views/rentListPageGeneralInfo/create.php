

<?php





$this->breadcrumbs = array(
    $model->adminNames[3] ,Yii::t('sideMenu', 'Info')  => array('admin'),
	t('Add'),
);

$this->title = Yii::t('YcmModule.ycm',
    'Create {name}',
    array('{name}'=>Yii::t('sideMenu',"Info"))
);

$this->renderPartial('_form', array(
    'model' => $model,
    'model_filters' => $model_filters,
    'model_top_images' => $model_top_images,
    'buttons' => 'create'));

