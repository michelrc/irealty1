

<?php





$this->breadcrumbs = array(
    $model->adminNames[3] ,Yii::t('sideMenu', 'Banner Image')  => array('admin'),
	t('Add'),
);

$this->title = Yii::t('YcmModule.ycm',
    'Create {name}',
    array('{name}'=> Yii::t('sideMenu', 'Banner Image'))
);

$this->renderPartial('_form', array(
    'model' => $model,
    'model_contact_us' => $model_contact_us,
    'model_leading_properties' => $model_leading_properties,
    'model_recent_properties' => $model_recent_properties,
    'model_why_shop' => $model_why_shop,
    'model_why_shop_icons' => $model_why_shop_icons,
    'model_testimonies' => $model_testimonies,
    'buttons' => 'create'));

