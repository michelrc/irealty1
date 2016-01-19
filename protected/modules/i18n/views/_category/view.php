<?php
/**
 * @author: Yunier Rojas Garcia <yunier.rojas@gmail.com>
 * @date: 11/8/12
 * @time: 3:56 PM
 */

/** @var $module I18nModule */
/** @var $this LanguageController|FHasWidgetsBehavior */
/** @var $model I18nCategory */

$this->menu = array(
    array('htmlOptions' => array('title' => Yii::t('admin', 'Create new category'), 'class' => 'btn-large tip-bottom'), 'url' => array('create'), 'icon' => 'file',),
    array('htmlOptions' => array('title' => Yii::t('admin', 'Update this category'), 'class' => 'btn-large tip-bottom'), 'url' => array('update', 'id' => $model->primaryKey), 'icon' => 'pencil',),

    array(
        'htmlOptions' => array(
            'title' => Yii::t('admin', 'Delete this category'),
            'class' => 'btn-large tip-bottom',
            'submit' => array('delete', 'id' => $model->getPrimaryKey()),
            'confirm' => Yii::t('app', 'Do you really want to delete this category?')
        ),
        'url' => '#',
        'icon' => 'trash', 'buttonType' => 'ajaxLink'
    ),
    array('htmlOptions' => array('title' => Yii::t('admin', 'Manage categories'), 'class' => 'btn-large tip-bottom'), 'url' => array('admin'), 'icon' => 'th-list',),
);

$this->breadcrumbs = array(
    array('label' => Yii::t('admin', 'Language'), 'icon' => 'globe', 'url' => array('//i18n')),
    array('label' => I18nCategory::label(2), 'icon' => 'tags', 'url' => array('//i18n/category')),
    GxHtml::valueEx($model),
);


?>
<div class="row-fluid">
    <div class="span12">
        <?php $this->beginWidget('bootstrap.widgets.TbBox', array(
            'title' => false,
        ))?>
        <?php
        $this->widget(
            'bootstrap.widgets.TbDetailView',
            array(
                'data' => $model,
                'attributes' => array(
                    'category',
                    'description',
                    'percent' => array(
                        'label' => Yii::t('app', 'Percent'),
                        'value' => $model->getTranslatedPercent(),
                        'type' => 'progress'
                    )
                )
            )
        );
        ?>
        <?php $this->endWidget() ?>
    </div>
</div>