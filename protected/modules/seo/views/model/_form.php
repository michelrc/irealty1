<?php
/**
 * The following code was generated automatically using GiixCrudCode
 * This generator was improve by iReevo Team
 */
?>

<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'seo-model-form',
    'enableClientValidation' => true,

));
?>                      <?php $this->beginWidget('i18n.extensions.widgets.LanguageWidget', array(
    'model' => $model,
    'attribute' => 'url')); ?>
<?php echo $form->textFieldGroup($model, 'url', array(
        'maxlength' => 255,
        'wrapperHtmlOptions' => array(
            'class' => 'col-sm-5',
        ),

        'hint' => Yii::t('admin', 'Please, insert ') . ' url',
        'append' => Yii::t('admin', 'Text')
    )
); ?>

<?php $this->endWidget(); ?>
<?php $this->beginWidget('i18n.extensions.widgets.LanguageWidget', array(
    'model' => $model,
    'attribute' => 'title')); ?>
<?php echo $form->textFieldGroup($model, 'title', array(
        'maxlength' => 255,
        'wrapperHtmlOptions' => array(
            'class' => 'col-sm-5',
        ),

        'hint' => Yii::t('admin', 'Please, insert ') . ' title',
        'append' => Yii::t('admin', 'Text')
    )
); ?>

<?php $this->endWidget(); ?>
<?php $this->beginWidget('i18n.extensions.widgets.LanguageWidget', array(
       'model' => $model,
       'attribute' => 'description')); ?>
   <?php echo $form->textAreaGroup(
       $model,
       'description',
       array(
           'wrapperHtmlOptions' => array(
               'class' => 'col-sm-12',
           ),
           'widgetOptions' => array(
               'htmlOptions' => array('rows' => 4, 'value' => '{value}', 'name' => '{name}', 'class' => 'redactor'),
           ),
       )
   ); ?>
   <?php $this->endWidget(); ?>

<?php $this->beginWidget('i18n.extensions.widgets.LanguageWidget', array(
    'model' => $model,
    'attribute' => 'keywords')); ?>
<?php echo $form->textFieldGroup($model, 'keywords', array(
        'maxlength' => 255,
        'wrapperHtmlOptions' => array(
            'class' => 'col-sm-5',
        ),

        'hint' => Yii::t('admin', 'Please, insert ') . ' keywords',
        'append' => Yii::t('admin', 'Text')
    )
); ?>

<?php $this->endWidget(); ?>




<div class='form-actions'><a href='<?php echo app()->request->urlReferrer; ?>' class='btn btn-default'><span
            class='glyphicon glyphicon-arrow-left'></span><?php echo Yii::t('admin', 'Back'); ?>
    </a>   <?php $this->widget(
        'application.extensions.bootstrap.widgets.TbButton',
        array(
            'buttonType' => 'submit',
            'context' => 'primary',
            'icon' => 'glyphicon glyphicon-saved',
            'label' => Yii::t('admin', 'Save item')
        )
    ); ?>
    <?php
    if (Yii::app()->controller->action->id != 'update') {
        $this->widget(
            'application.extensions.bootstrap.widgets.TbButton',
            array(
                'buttonType' => 'reset',
                'context' => 'warning',
                'icon' => 'glyphicon glyphicon-remove',
                'label' => Yii::t('admin', 'Reset form')
            )
        );
    } ?>
    <?php $this->endWidget(); ?>

    <?php if (isset($model->id)) {
        // echo CHtml::link(Yii::t('admin',TbHtml::icon('glyphicon glyphicon-remove'). 'Remove item'),array('delete','id'=>$model->id),array('class'=>'btn btn-danger'));
    }?></div>