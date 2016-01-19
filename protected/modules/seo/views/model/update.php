<?php


$this->breadcrumbs = array(
    $model->adminNames[3] => array('admin'),
    Yii::t('admin',
        'Edit ',
        array('{name}' => $model->adminNames[1])
    ),
);

$this->title = Yii::t('admin',
    'Edit {name}',
    array('{name}' => $model->adminNames[3])
);

$this->renderPartial('_form', array(
    'model' => $model));

