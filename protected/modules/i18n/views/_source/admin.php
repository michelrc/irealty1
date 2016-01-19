<?php
/**
 * @author: Yusnel Rojas Garcia <yrojass@gmail.com>
 * @date: 11/8/12
 * @time: 2:05 PM
 */


/** @var $this LanguageController|FHasWidgetsBehavior */
/** @var $model I18nCategory */
/** @var $module I18nModule */

$this->breadcrumbs = array(
    array('label' => Language::label(), 'url' => array('//i18n'), 'icon' => 'globe'),
    array('label' => Yii::t('admin', 'Translations'), 'icon' => 'exchange', 'visible' => empty($model->category)),
    array('label' => Yii::t('admin', 'Translations'), 'url' => array('index'), 'icon' => 'exchange', 'visible' => !empty($model->category)),
    array('label' => Yii::t('admin', 'Category: @category', array('@category' => $model->category)), 'icon' => 'exchange', 'visible' => !empty($model->category)),
);


?>

<div class="row-fluid">
    <div class="span12">
        <?php $this->beginWidget('bootstrap.widgets.TbBox', array(
            'title' => Yii::t('admin', 'Categories'),
            //'htmlOptions'=>array('class'=>'widget-plain')
            'htmlOptions' => array('class' => 'nopadding')
        ))?>

        <?php $this->widget(
            'bootstrap.widgets.TbExtendedGridView',
            array(
                'id' => 'source-grid',
                'dataProvider' => $model->search(),
                'filter' => $model,
                'columns' => array(
                    'category' => array(
                        'name' => 'category',
                        'filter' => GxHtml::listDataEx(I18nCategory::model()->findAll())
                    ),
                    'message',
                    'text' => array(
                        'name' => 'text',
                        'value' => '$data->translation?$data->translation->translation:null'
                    ),
                    'actions' => array(
                        'header' => Yii::t('app', 'Actions'),
                        'class' => 'bootstrap.widgets.TbButtonColumn',
                        'template' => '{translate}',
                        'buttons' => array(
                            'translate' => array(
                                'url' => 'array("translate", "source"=>$data->getPrimaryKey())',
                                'label' => Yii::t('app', 'Translate'),
                                'icon' => 'icon-globe'
                            )
                        )
                    )
                )
            )
        ); ?>
        <?php $this->endWidget() ?>
    </div>
</div>


