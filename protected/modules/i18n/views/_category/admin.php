<?php
/**
 * @author: Yunier Rojas Garcia <yunier.rojas@gmail.com>
 * @date: 11/8/12
 * @time: 2:05 PM
 */

Yii::import('frankenstein.utils.FUtil');

/** @var $this Controller */
/** @var $model I18nCategory */
/** @var $module I18nModule */

$this->breadcrumbs = array(
    array('label' => Language::label(2), 'url' => array('//i18n'), 'icon' => 'globe'),
    array('label' => I18nCategory::label(2), 'icon' => 'tags'),
);

$this->menu = array(
    array('htmlOptions' => array('title' => Yii::t('admin', 'Create new category'), 'class' => 'btn-large tip-bottom'), 'url' => array('create'), 'icon' => 'file'),
);

?>
<div class="row-fluid">
    <div class="span12">
        <?php $this->beginWidget('bootstrap.widgets.TbBox', array(
            'title' => Yii::t('admin', 'Categories'),
            //'htmlOptions'=>array('class'=>'widget-plain')
            'htmlOptions' => array('class' => 'nopadding')
        ))?>

        <?php
        $this->widget(
            'bootstrap.widgets.TbExtendedGridView',
            array(
                'id' => 'category-grid',
                'dataProvider' => $model->search(),
                'filter' => $model,
                'columns' => array(
                    'category',
                    'description' => array(
                        'name' => 'description',
                        'type' => 'snap',
                    ),
                    'percent' => array(
                        'header' => Yii::t('app', 'Translated Percent'),
                        'value' => '$data->getTranslatedPercent()',
                        'type' => 'progress',
                        'filter' => Yii::app()->format->formatProgress(Language::getTotalTranslatedPercent()),
                    ),
                    'actions' => array(
                        'header' => Yii::t('app', 'Actions'),
                        'class' => 'bootstrap.widgets.TbButtonColumn',
                        'template' => '{translate}{update}{delete}',
                        'buttons' => array(
                            'translate' => array(
                                'url' => 'Yii::app()->controller->module->relativeUrl("source", array("category"=>$data->category))',
                                'label' => Yii::t('app', 'Translate'),
                                'icon' => 'icon-globe'
                            )
                        )
                    )
                )
            )
        );
        ?>

        <?php $this->endWidget() ?>
    </div>

</div>