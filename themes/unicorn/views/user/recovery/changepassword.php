<?php
$model = $form;
$form = $this->beginWidget('application.extensions.bootstrap.widgets.TbActiveForm', array(
    'id' => 'loginform',
    'type' => 'vertical',
));?>
<p><?php echo UserModule::t("Change Password"); ?></p>

<?php echo $form->passwordFieldGroup(
    $model,
    'password',

    array(
        'groupOptions' => array('style' => 'padding: 0 20px 0 20px'),
        'wrapperHtmlOptions' => array(
            'class' => 'col-xs-12 col-sm-6 col-md-8',
        ),
        'prepend' => '<i class="glyphicon glyphicon-lock"></i>'
    )
);
?>
<?php echo $form->passwordFieldGroup(
    $model,
    'verifyPassword',
    array(
        'groupOptions' => array('style' => 'padding: 0 20px 0 20px'),
        'wrapperHtmlOptions' => array(
            'class' => 'col-xs-12 .col-sm-6 .col-md-8',
        ),
        'prepend' => '<i class="glyphicon glyphicon-lock"></i>'
    )
);
?>
<div class="form-actions">
        <span class="pull-right">
            <?php echo CHtml::submitButton(UserModule::t("Save"), array('class' => 'btn btn-inverse'));?>
        </span>
</div>
<?php $this->endWidget(); ?>