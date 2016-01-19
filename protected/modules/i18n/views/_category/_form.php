<?php
/**
 * @author: Yunier Rojas Garcia <yunier.rojas@gmail.com>
 * @date: 11/7/12
 * @time: 6:00 PM
 */

/** @var $this SystemController */
/** @var $form TbActiveForm|FFormExtraFields */
/** @var $model I18nCategory */

$form = $this->beginWidget('bootstrap.widgets.TbActiveForm',
    array(
        'id' => 'category-form',
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

echo $form->textFieldRow($model, 'category');
echo $form->textAreaRow($model, 'description');

?>


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

<?php
$this->endWidget();
?>
