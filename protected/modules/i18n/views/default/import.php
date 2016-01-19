<?php
/**
 * @author: Yunier Rojas Garcia <yunier.rojas@gmail.com>
 * @date: 11/11/12
 * @time: 1:15 PM
 */

/** @var $this LanguageController|FHasWidgetsBehavior */
/** @var $fmodel ImportForm */
/** @var $model Language */
/** @var $module I18nModule */

$module = $this->module;

$this->addMenu(array(
    $this->addMenuHeader(Yii::t('app', 'Actions')),
    array('label' => Yii::t('app', 'Management'), 'url' => array('index')),
));


/** @var $form TbActiveForm|FFormExtraFields */

$form = $this->beginWidget('bootstrap.widgets.TbActiveForm',
    array(
        'id' => 'import-form',
    )
);

$form->attachBehaviors(array(
    'extra' => array(
        'class' => 'frankenstein.behaviors.widgets.forms.FFormExtraFields'
    ),
));

?>
<p class="help-block">
    <?php echo Yii::t('frankenstein', 'The fields with {sign} are required.', array('{sign}' => '<span class="required">*</span>')) ?>
</p>
<br>
<?php //echo $form->errorSummary($instance); ?>

<?php

echo $form->textFieldRow($fmodel, 'translator');
echo $form->checkBoxRow($fmodel, 'empty');
echo $form->checkBoxRow($fmodel, 'override');

?>


<?php
$this->widget('frankenstein.widgets.FFormButtonsWidget', array(
    'actionVarName' => 'action',
    'buttons' => array(
        'save' => array(
            'label' => Yii::t('app', 'Import'),
            'htmlOptions' => array(
                'class' => 'btn btn-primary'
            )
        )
    ),
    'cancelUrl' => $this->getBackUrl()
));
?>

<?php
$this->endWidget();
?>
