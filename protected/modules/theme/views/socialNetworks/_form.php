<?php
/**
 * The following code was generated automatically using GiixCrudCode
 * This generator was improve by iReevo Team
 */
?>

<?php $form = $this->beginWidget('application.extensions.bootstrap.widgets.TbActiveForm', array(
    'id' => 'social-networks-form',
    'enableClientValidation' => true,

));
?>                      <?php echo $form->urlFieldGroup($model, 'facebook_link',
    array(
        'wrapperHtmlOptions' => array(
            'class' => 'col-sm-5',
        ),//'hint' => t('Please, insert facebook_link'),
        'append' => 'http://'
    )
); ?>
<?php echo $form->urlFieldGroup($model, 'twitter_link',
    array(
        'wrapperHtmlOptions' => array(
            'class' => 'col-sm-5',
        ),//'hint' => t('Please, insert twitter_link'),
        'append' => 'http://'
    )
); ?>
<?php echo $form->urlFieldGroup($model, 'google_plus_link',
    array(
        'wrapperHtmlOptions' => array(
            'class' => 'col-sm-5',
        ),//'hint' => t('Please, insert google_plus_link'),
        'append' => 'http://'
    )
); ?>
<?php echo $form->urlFieldGroup($model, 'instagram_link',
    array(
        'wrapperHtmlOptions' => array(
            'class' => 'col-sm-5',
        ),//'hint' => t('Please, insert instagram_link'),
        'append' => 'http://'
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