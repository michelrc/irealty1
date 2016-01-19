<?php
/**
 * @author: Yunier Rojas Garcia <yunier.rojas@gmail.com>
 * @date: 11/8/12
 * @time: 12:31 PM
 */

/** @var $this FController|FHasWidgetsBehavior */
/** @var $module I18nModule */
$module = $this->module;
$pageSize = 6;

$this->pageHeading = Yii::t('admin', 'Language Overview');


$this->menu = array(
    array('htmlOptions' => array('title' => Yii::t('admin', 'Import messages'), 'class' => 'btn-large tip-bottom'), 'url' => $module->relativeUrl('default/import'), 'icon' => 'upload',),
    array('htmlOptions' => array('title' => Yii::t('app', 'Manage categories'), 'class' => 'btn-large tip-bottom'), 'url' => $module->relativeUrl('category'), 'icon' => 'tags',),
    array('htmlOptions' => array('title' => Yii::t('app', 'Manage languages'), 'class' => 'btn-large tip-bottom'), 'url' => $module->relativeUrl('language'), 'icon' => 'flag',),
    array('htmlOptions' => array('title' => Yii::t('app', 'Manage translations'), 'class' => 'btn-large tip-bottom'), 'url' => $module->relativeUrl('source'), 'icon' => 'exchange',),
);
?>

<?php $this->widget('backend.widgets.axwidgets.AxBreadcrumbs', array(
    'homeItem' => array('label' => Yii::t('admin', 'Home'), 'icon' => 'home', 'tooltip' => Yii::t('admin', 'Go to Dashboard'), 'url' => $this->createUrl('demo/page', array('view' => 'index'))),
    'links' => array(
        array('label' => $this->getPageHeading(), 'icon' => 'globe')
    )
))?>

<div class="row-fluid">

    <div class="span6">
        <?php $this->beginWidget('bootstrap.widgets.TbBox', array(
            'title' => Yii::t('app', 'Languages'),
            'htmlOptions' => array('class' => 'nopadding')
        ))?>

        <?php
        $this->widget(
            'bootstrap.widgets.TbListView',
            array(
                'id' => 'language-list',
                'dataProvider' => new CActiveDataProvider('Language', array(
                        'pagination' => array(
                            'pageSize' => $pageSize,
                        ),
                    )),
                'itemView' => '_language',
            )
        );

        echo CHtml::link(Yii::t('app', 'Manage'), $module->relativeUrl('language'), array('class' => 'btn btn-inverse'));

        $this->endWidget();
        ?>
    </div>
    <!--/span-->
    <div class="span6">

        <?php $this->beginWidget('bootstrap.widgets.TbBox', array(
            'title' => Yii::t('app', 'Categories'),
            'htmlOptions' => array('class' => 'nopadding')
        ))?>

        <?php
        $this->widget(
            'bootstrap.widgets.TbListView',
            array(
                'id' => 'category-list',
                'dataProvider' => new CActiveDataProvider('I18nCategory', array(
                        'pagination' => array(
                            'pageSize' => $pageSize,
                        ),
                    )),
                'itemView' => '_category',
            )
        );
        ?>
        <?php

        echo CHtml::link(Yii::t('app', 'Manage'), $module->relativeUrl('category'), array('class' => 'btn btn-inverse'))
        ?>
        <?php $this->endWidget() ?>
    </div>

</div>