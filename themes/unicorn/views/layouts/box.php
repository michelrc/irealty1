<?php
$this->beginContent('//layouts/main');
$atras = app()->request->urlReferrer?array(
    array(
        'icon' => 'arrow-left',
        'label'=>t('Atras'),
        'url'=>app()->request->urlReferrer,
    ),
):array();
/*$this->beginWidget('ext.unicorn.widgets.IRBox', array(
    'title' => $this->title,
    'headerIcon' => $this->icon,
    'headerButtons' => CMap::mergeArray($atras,$this->menu)
));*/
echo $content;
//$this->endWidget();
$this->endContent();