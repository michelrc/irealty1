<?php
/**
 * The following code was generated automatically using GiixCrudCode
 * This generator was improve by iReevo Team
 */
?>

<?php $form = $this->beginWidget('application.extensions.bootstrap.widgets.TbActiveForm', array(
    'id' => 'contact-us-form',
    'enableClientValidation' => true,

));

?>


<div class="tabbable inline">
    <ul id="myContactTab" class="nav nav-tabs tab-bricky">
        <li class="active">
            <a href="#contactpage_panel_tab1" data-toggle="tab">
                <?php echo Yii::t('BACKEND_LABELS', 'Información General') ?>
            </a>
        </li>
        <li>
            <a href="#contactpage_panel_tab2" data-toggle="tab">
                <?php echo Yii::t('BACKEND_LABELS', 'Contact reason') ?>
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane in active" id="contactpage_panel_tab1">
            <?php $this->renderPartial('_formCustom', array('form' => $form, 'model' => $model)) ?>
        </div>
        <div class="tab-pane" id="contactpage_panel_tab2">
            <?php $this->renderPartial('_adminReason', array('form' => $form, 'model' => $model_reason)) ?>
        </div>
    </div>
</div>


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