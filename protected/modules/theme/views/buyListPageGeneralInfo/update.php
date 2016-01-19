

<?php


$this->breadcrumbs = array(
    $model->adminNames[3] , Yii::t('sideMenu', 'Info')  => array('admin'),
    Yii::t('YcmModule.ycm',
        'Edit ',
        array('{name}'=>mod('ycm')->getSingularName($model))
    ),
);

$this->title = Yii::t('YcmModule.ycm',
    'Edit {name}',
    array('{name}'=> Yii::t('sideMenu',"Info"))
);

$this->renderPartial('_form', array(
		'model' => $model,
		'model_filters' => $model_filters,
		'model_top_images' => $model_top_images,
));
?>

