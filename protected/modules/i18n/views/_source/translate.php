<?php
/** @var $this SourceController */
/** @var $form TbActiveForm|FFormExtraFields */
/** @var $model I18nSource */

/** @var $this LanguageController|FHasWidgetsBehavior */
/** @var $model I18nCategory */

$this->menu = array(
    array('htmlOptions' => array('title' => Yii::t('admin', 'Translations'), 'class' => 'btn-large tip-bottom'), 'url' => array('index'), 'icon' => 'th-list',),
);


$this->breadcrumbs = array(
    array('label' => Language::label(), 'url' => array('//i18n'), 'icon' => 'globe'),
    array('label' => Yii::t('admin', 'Translations'), 'icon' => 'exchange'),
    Yii::t('admin', 'Translate')
);

$form = $this->beginWidget('bootstrap.widgets.TbActiveForm',
    array(
        'id' => 'translation-form',
    )
);

$form->attachBehaviors(array(
    'extra' => array(
        'class' => 'frankenstein.behaviors.widgets.forms.FFormExtraFields'
    ),
));
?>




<div class="row-fluid">
    <div class="span12">
        <?php $this->beginWidget('bootstrap.widgets.TbBox', array(
            'title' => Yii::t('app', "Source: "),
        ))?>
        <pre><?php echo CHtml::encode($model->message) ?></pre>
        <?php $this->endWidget() ?>

    </div>
</div>
<div class="row-fluid">
    <div class="span12">
        <?php $this->beginWidget('bootstrap.widgets.TbBox', array(
            'title' => Yii::t('app', "Translations: "),
            'headerIcon' => 'globe'
        ))?>
        <?php
        $this->beginWidget('MessageWidget', array(
            'model' => $model,
            'attribute' => 'translation'
        ));
        ?>
        <!--            --><?php //echo CHtml::textArea('translation[{lang}]', '{value}', array('rows'=>10, 'cols'=>100, 'class'=>'span7')) ?>
        <?php $this->widget('ext.redactor.RedactorLoc', array(
            'name' => '{name}',
            'value' => '{value}',
            'lang' => Yii::app()->language,
            'toolbar' => 'translate',
            'editorOptions' => array(
                'fullscreen' => true,
            ),
            'htmlOptions' => array(
                'class' => 'redactorTranslation',
            ),
            'selectorClass' => 'redactorTranslation'
        )); ?>

        <?php $this->endWidget(); ?>


        <?php $this->endWidget() ?>
    </div>

    <?php
    $this->widget('frankenstein.widgets.FFormButtonsWidget', array(
        'actionVarName' => 'action',
        'buttons' => array(
            'save' => array(
                'label' => Yii::t('app', 'Save'),
                'htmlOptions' => array(
                    'class' => 'btn btn-primary'
                )
            )
        ),
        'cancelUrl' => $this->getBackUrl()
    ));
    ?>
</div>

<?php $this->endWidget() ?>







