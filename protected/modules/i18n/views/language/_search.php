<?php
/**
 * The following code was generated automatically using GiixCrudCode
 * This generator was improve by iReevo Team
 */
?>
<?php $form = $this->beginWidget('application.extensions.bootstrap.widgets.TbActiveForm', array(
    'action' => Yii::app()->createUrl($this->route),
    'method' => 'get',
)); ?>

<?php echo $form->textFieldGroup($model, 'id', array(
        'maxlength' => 10,
        'wrapperHtmlOptions' => array(
            'class' => 'col-sm-5',
        ),
        'hint' => t('Please, insert id'),
        'append' => 'Text'
    )
); ?>
<?php echo $form->textFieldGroup($model, 'name', array(
        'maxlength' => 100,
        'wrapperHtmlOptions' => array(
            'class' => 'col-sm-5',
        ),
        'hint' => t('Please, insert name'),
        'append' => 'Text'
    )
); ?>
<?php echo $form->textFieldGroup($model, 'enable',
    array(
        'wrapperHtmlOptions' => array(
            'class' => 'col-sm-5',
        ),
        'hint' => t('Please, insert enable'),
        'append' => 'Text'
    )
); ?>
<?php echo $form->textFieldGroup($model, 'isDefault',
    array(
        'wrapperHtmlOptions' => array(
            'class' => 'col-sm-5',
        ),
        'hint' => t('Please, insert isDefault'),
        'append' => 'Text'
    )
); ?>

<div class="form-actions">
    <?php $this->widget('application.extensions.bootstrap.widgets.TbButton',
        array(
            'buttonType' => 'submit',
            'context' => 'success',
            'icon' => 'glyphicon glyphicon-saved',
            'label' => t('Buscar ' . mod('ycm')->getPluralName($model))
        ));
    ?></div>

<?php $this->endWidget(); ?>
