

<?php


$this->breadcrumbs = array(
    $model->adminNames[3] , Yii::t('sideMenu', 'Popular property section')  => array('admin'),
    Yii::t('YcmModule.ycm',
        'Edit ',
        array('{name}'=>mod('ycm')->getSingularName($model))
    ),
);

$this->title = Yii::t('YcmModule.ycm',
    'Edit {name}',
    array('{name}'=> t("Popular property section"))
);

$this->renderPartial('_form', array(
		'model' => $model));

