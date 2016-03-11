<?php
/**
 * The following code was generated automatically using GiixCrudCode
 * This generator was improve by iReevo Team
 */
?>

<?php $form = $this->beginWidget('application.extensions.bootstrap.widgets.TbActiveForm', array(
    'id' => 'agent-form',
    'enableClientValidation' => true,

));
?>                      <?php echo $form->textFieldGroup($model, 'name', array(
        'maxlength' => 255,
        'wrapperHtmlOptions' => array(
            'class' => 'col-sm-5',
        ),

        // 'hint' => t('Please, insert name'),
        'append' => 'Text'
    )
); ?>
<?php echo $form->fileFieldGroup($model, 'recipeImg1', array(
    'wrapperHtmlOptions' => array(
        'class' => 'col-sm-5',
    ),
    'append' => CHtml::image($model->_photo->getFileUrl('normal'), '', array('width' => '100px')),
    'hint' => t('The image dimensions are') . ' 118x118px'
));
echo $form->textFieldGroup($model, 'photo',
    array(
        'wrapperHtmlOptions' => array(
            'class' => 'col-sm-5',
        ),// 'hint' => t('Please, insert photo'),
        'append' => 'Text',
    )
); ?>
<?php echo $form->emailFieldGroup($model, 'email',
    array(
        'wrapperHtmlOptions' => array(
            'class' => 'col-sm-5',
        ),
        //'hint' => t('Please, insert email'),
        'append' => '@'
    )
); ?>
<?php echo $form->textFieldGroup($model, 'contact_phone1', array(
        'maxlength' => 255,
        'wrapperHtmlOptions' => array(
            'class' => 'col-sm-5',
        ),

        // 'hint' => t('Please, insert contact_phone1'),
        'append' => 'Text'
    )
); ?>
<?php echo $form->textFieldGroup($model, 'contact_phone2', array(
        'maxlength' => 255,
        'wrapperHtmlOptions' => array(
            'class' => 'col-sm-5',
        ),

        // 'hint' => t('Please, insert contact_phone2'),
        'append' => 'Text'
    )
); ?>
<?php echo $form->checkBoxGroup($model, 'active'); ?>

<?php if ($best_agent_amount < 2): ?>
    <?php echo $form->checkBoxGroup($model, 'best_agent'); ?>
<?php endif ?>

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
    }
    ?>
    <?php $this->endWidget(); ?>
    <?php if (isset($model->id)) {
        // echo CHtml::link(t(TbHtml::icon('glyphicon glyphicon-remove'). 'Remove item'),array('delete','id'=>$model->id),array('class'=>'btn btn-danger'));
    } ?></div>