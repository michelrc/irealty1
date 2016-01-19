<?php
/**
 * @author: Yunier Rojas Garcia <yunier.rojas@gmail.com>
 * @date: 11/8/12
 * @time: 12:56 PM
 */

/** @var $data Language */
?>
<div style="padding: 3px">
    <span><?php echo $data->name ?></span>
    <?php
    $percent = $data->getTranslatedPercent();
    $types = array('danger', 'warning', 'info', 'success');
    $index = (int)floor($percent / 25);

    if ($index >= count($types)) {
        $index = 3;
    }


    Yii::app()->controller->widget(
        'bootstrap.widgets.TbProgress',
        array(
            'type' => $types[$index],
            'percent' => $percent,
        )
    )
    ?>
</div>
