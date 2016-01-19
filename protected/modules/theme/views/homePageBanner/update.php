

<?php


$this->breadcrumbs = array(
    $model->adminNames[3] , Yii::t('sideMenu', 'Banner Image')  => array('admin'),
    Yii::t('YcmModule.ycm',
        'Edit '
    ),
);

$this->title = Yii::t('YcmModule.ycm',
    'Edit {name}',
    array('{name}'=>Yii::t('sideMenu', 'Banner Image'))
);

$this->renderPartial('_form', array(
		'model' => $model));

