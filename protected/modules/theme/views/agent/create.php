<?php


$this->breadcrumbs = array(
    $model->adminNames[3], Yii::t('sideMenu', 'Agent') => array('admin'),
    t('Add'),
);

$this->title = Yii::t('YcmModule.ycm',
    'Create {name}',
    array('{name}' => t("Agent"))
);

$this->renderPartial('_form', array(
        'model' => $model,
        'buttons' => 'create',
        'best_agent_amount' => $best_agent_amount)
);

