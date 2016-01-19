<?php
/* @var $this SiteController */
/* @var $model ContactForm */
/* @var $form TbActiveForm */

    $this->title=t('Contact Us');
//$this->description=t('If you have business inquiries or other questions,
 //           please fill out the following form to contact us. Thank you.');

    $this->breadcrumbs=array(
        t('Contact'),
    );
?>

<?php $form = $this->beginWidget('application.extensions.bootstrap.widgets.TbActiveForm', array(
    'id'=>'contact-form',
    'enableClientValidation'=>true,
    'clientOptions'=>array(
        'validateOnSubmit'=>true,
    ),
    'type'=>'horizontal',
)); ?>


	<?php echo $form->errorSummary($model); ?>

    <?php echo $form->textFieldRow($model,'name'); ?>
    <?php echo $form->textFieldRow($model,'email'); ?>
    <?php echo $form->textFieldRow($model,'subject',array('class'=>'input-large')); ?>
    <?php echo $form->textAreaRow($model,'body',array('class'=>'span5', 'rows'=>5)); ?>

    <?php $this->renderFormFooter(); ?>

<div class="form-actions">
    <?php $this->widget('application.extensions.bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'primary', 'label'=>'Submit')); ?>
    <?php $this->widget('application.extensions.bootstrap.widgets.TbButton', array('buttonType'=>'reset', 'label'=>'Reset')); ?>
</div>

<?php $this->endWidget(); ?>
