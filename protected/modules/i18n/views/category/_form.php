<?php
/**
 * The following code was generated automatically using GiixCrudCode
 * This generator was improve by iReevo Team
 */
?>

<?php $form = $this->beginWidget('application.extensions.bootstrap.widgets.TbActiveForm', array(
    'id' => 'i18n-category-form',
    'enableClientValidation' => true,

));
?>
<?php echo $form->textFieldGroup($model, 'category', array(
        'maxlength' => 255,
        'wrapperHtmlOptions' => array(
            'class' => 'col-sm-5',
        ),
        'hint' => t('Please, insert category'),
        'append' => 'Text'
    )
); ?>
<?php echo $form->textFieldGroup($model, 'description',
    array(
        'wrapperHtmlOptions' => array(
            'class' => 'col-sm-5',
        ),
        'hint' => t('Please, insert description'),
        'append' => 'Text'
    )
); ?>
<div class='form-actions'><a href='<?php echo app()->request->urlReferrer; ?>' class='btn btn-default'><span
            class='glyphicon glyphicon-arrow-left'></span><?php echo t('Back'); ?></a>   <?php $this->widget(
        'application.extensions.bootstrap.widgets.TbButton',
        array(
            'buttonType' => 'submit',
            'context' => 'primary',
            'icon' => 'glyphicon glyphicon-saved',
            'label' => t('Save item')
        )
    ); ?>
    <?php $this->widget(
        'application.extensions.bootstrap.widgets.TbButton',
        array(
            'buttonType' => 'reset',
            'context' => 'warning',
            'icon' => 'glyphicon glyphicon-remove',
            'label' => t('Reset form')
        )
    ); ?>
    <?php $this->endWidget(); ?>
    <?php
    /*
    if(isset($model->id)){
        echo CHtml::link(t(TbHtml::icon('glyphicon glyphicon-remove'). 'Remove item'),array('delete','id'=>$model->id),array('class'=>'btn btn-danger'));
    }*/
    ?></div>