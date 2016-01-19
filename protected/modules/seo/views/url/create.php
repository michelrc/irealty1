<?php





$this->breadcrumbs = array(
    $model->adminNames[3] => array('admin'),
    Yii::t('admin', 'Add'),
);

$this->title = Yii::t('admin',
    'Create {name}',
    array('{name}' => $model->adminNames[3])
);

$this->renderPartial('_form', array(
    'model' => $model,
    'buttons' => 'create'));

