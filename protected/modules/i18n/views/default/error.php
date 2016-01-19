<?php

/** @var $this FController */
$this->beginWidget('bootstrap.widgets.TbHeroUnit', array(
    'heading' => t('Error {code}', array('{code}' => $code))
));
echo CHtml::tag('p', array(), $message);

$this->endWidget();
