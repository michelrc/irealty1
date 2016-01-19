


<?php $form = $this->beginWidget('application.extensions.bootstrap.widgets.TbActiveForm', array(
    'id' => 'loginform',
    'type' => 'inline',
    'htmlOptions' => array('class' => 'well'),
    'action' => array('/user/login/login'),
));?>
    <p><?php echo t("Enter username and password to continue."); ?></p>

<?php echo $form->textFieldGroup(
                    $model,
                    'username',
                    array(
                        'wrapperHtmlOptions' => array(
                            'class' => 'col-xs-12 .col-sm-6 .col-md-8',
                        ),
                        'prepend' => '<i class="glyphicon glyphicon-user"></i>'
                    )
            );
?>


<?php echo $form->passwordFieldGroup(
    $model,
    'password',
    array(
        'wrapperHtmlOptions' => array(
            'class' => 'col-xs-12 .col-sm-6 .col-md-8',
        ),
        'prepend' => '<i class="glyphicon glyphicon-lock"></i>'
    )
);
?>
    <div class="form-actions clearfix">
        <span class="pull-left">
            <?php
                echo CHtml::link(UserModule::t("Lost Password?"),'#', array(
                    'class' => 'flip-link to-register blue',
                    'id' => 'to-recover',
                ));
            ?>
        </span>
        <span class="pull-right">
            <?php echo CHtml::submitButton(UserModule::t("Login"), array('class' => 'btn btn-inverse'));?>
        </span>
    </div>
<?php $this->endWidget(); ?>


<?php $form = $this->beginWidget('application.extensions.bootstrap.widgets.TbActiveForm', array(
    'id' => 'recoverform',
    'type' => 'inline',
    'htmlOptions' => array('class' => 'well'),
    'action' => array('/user/recovery/recovery'),
));
if(app()->controller->route == 'user/recovery/recovery' && $modelRecovery && $modelRecovery->hasErrors())
    echo '<script>window.location.hash = "#to-recover";</script>';

$modelRecovery = $modelRecovery?$modelRecovery:new UserRecoveryForm;

?>
    <p><?php echo t("Enter your e-mail address below and we will send you instructions how to recover a password."); ?></p>


<?php echo $form->textFieldGroup(
    $modelRecovery,
    'login_or_email',
    array(
        'wrapperHtmlOptions' => array(
            'class' => 'col-xs-12 .col-sm-6 .col-md-8',
        ),
        'prepend' => '<i class="glyphicon glyphicon-envelope"></i>'
    )
);
?>

    <div class="form-actions clearfix">
        <span class="pull-left"><a href="#" class="grey flip-link to-login" id="to-login">&lt; <?php echo t("Back to login"); ?></a></span>
        <span class="pull-right"><?php echo CHtml::submitButton(UserModule::t("Restore"), array('class' => 'btn btn-inverse'));?></span>
    </div>
<?php $this->endWidget(); ?>
