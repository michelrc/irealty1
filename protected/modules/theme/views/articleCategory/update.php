

<?php


$this->breadcrumbs = array(
    $model->adminNames[3] , Yii::t('sideMenu', 'Article category')  => array('admin'),
    Yii::t('YcmModule.ycm',
        'Edit ',
        array('{name}'=>mod('ycm')->getSingularName($model))
    ),
);

$this->title = Yii::t('YcmModule.ycm',
    'Edit {name}',
    array('{name}'=> t("Article category"))
);

$this->renderPartial('_form', array(
		'model' => $model));

