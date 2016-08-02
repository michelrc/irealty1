<?php


$this->breadcrumbs = array(
    Yii::t("SeoUrlRule", $model->adminNames[3]) => array('admin'),
    Yii::t('admin',
        'Edit ',
        array('{name}' => Yii::t("SeoUrlRule", $model->adminNames[1]))
    ),
);

$this->title = Yii::t('admin',
    'Edit {name}',
    array('{name}' => Yii::t("SeoUrlRule", $model->adminNames[3]))
);

$this->renderPartial('_form', array(
    'model' => $model));

