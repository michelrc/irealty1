<?php
/**
 * The following code was generated automatically using GiixCrudCode
 * This generator was improve by iReevo Team
 */
?>

<?php $form = $this->beginWidget('application.extensions.bootstrap.widgets.TbActiveForm', array(
    'id' => 'testimonials-form',
    'enableClientValidation' => true,

));
?>                      <?php echo $form->fileFieldGroup($model, 'recipeImg1', array(
    'wrapperHtmlOptions' => array(
        'class' => 'col-sm-5',
    ),
    'append' => CHtml::image($model->_photo->getFileUrl('normal'), '', array('width' => '100px')),
    'hint' => t('The image dimensions are') . ' 135x135px'
));
echo $form->textFieldGroup($model, 'photo',
    array(
        'wrapperHtmlOptions' => array(
            'class' => 'col-sm-5',
        ),// 'hint' => t('Please, insert photo'),
        'append' => 'Text',
    )
); ?>
<?php $this->beginWidget('i18n.extensions.widgets.LanguageWidget', array(
    'model' => $model,
    'attribute' => 'text')); ?>
<?php echo $form->textAreaGroup($model, 'text',
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
<?php echo $form->textFieldGroup($model, 'author_name', array(
        'maxlength' => 250,
        'wrapperHtmlOptions' => array(
            'class' => 'col-sm-5',
        ),

        // 'hint' => t('Please, insert author_name'),
        'append' => 'Text'
    )
); ?>
<?php echo $form->textFieldGroup($model, 'company_name', array(
        'maxlength' => 250,
        'wrapperHtmlOptions' => array(
            'class' => 'col-sm-5',
        ),

        // 'hint' => t('Please, insert company_name'),
        'append' => 'Text'
    )
); ?>

<?php echo $form->checkBoxGroup($model, 'active', array(
        'wrapperHtmlOptions' => array(
            'class' => 'col-sm-5',
        ),
    )
); ?>


<div class='form-actions'><a href='<?php echo app()->request->urlReferrer; ?>' class='btn btn-default'><span
            class='glyphicon glyphicon-arrow-left'></span><?php echo t('Back'); ?></a> <?php $this->widget(
        'application.extensions.bootstrap.widgets.TbButton',
        array(
            'buttonType' => 'submit',
            'context' => 'primary',
            'icon' => 'glyphicon glyphicon-saved',
            'label' => t('Save item')
        )
    ); ?>
    <?php
    if ($this->action->id != 'update') {
        $this->widget(
            'application.extensions.bootstrap.widgets.TbButton',
            array(
                'buttonType' => 'reset',
                'context' => 'warning',
                'icon' => 'glyphicon glyphicon-remove',
                'label' => t('Reset form')
            )
        );
    } ?>
    <?php $this->endWidget(); ?>
    <?php if (isset($model->id)) {
        // echo CHtml::link(t(TbHtml::icon('glyphicon glyphicon-remove'). 'Remove item'),array('delete','id'=>$model->id),array('class'=>'btn btn-danger'));
    } ?></div>