

<?php


$this->breadcrumbs = array(
    $model->adminNames[3]  => array('admin'),
    Yii::t('YcmModule.ycm',
        'Edit ',
        array('{name}'=>mod('ycm')->getSingularName($model))
    ),
);

$this->title = Yii::t('YcmModule.ycm',
    'Edit {name}',
    array('{name}'=>$model->adminNames[3])
);

$this->renderPartial('_form', array(
		'model' => $model));

