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
        'maxlength' => 11,
        'wrapperHtmlOptions' => array(
            'class' => 'col-sm-5',
        ),

        'hint' => Yii::t('admin', 'Please, insert ') . ' id',
        'append' => Yii::t('admin', 'Text')
    )
); ?>
<?php echo $form->textFieldGroup($model, 'route', array(
        'maxlength' => 1023,
        'wrapperHtmlOptions' => array(
            'class' => 'col-sm-5',
        ),

        'hint' => Yii::t('admin', 'Please, insert ') . ' route',
        'append' => Yii::t('admin', 'Text')
    )
); ?>
<?php echo $form->dropDownListGroup($model, 'caseSensitive', array('0' => Yii::t('admin', 'No'), '1' => Yii::t('admin', 'Yes')), array('prompt' => Yii::t('admin', 'All'))); ?>
<?php echo $form->textFieldGroup($model, 'str_params',
    array(
        'wrapperHtmlOptions' => array(
            'class' => 'col-sm-5',
        ),
        'hint' => Yii::t('admin', 'Please, insert ') . ' str_params',
        'append' => Yii::t('admin', 'Text')
    )
); ?>
<?php echo $form->textFieldGroup($model, 'urlSuffix', array(
        'maxlength' => 255,
        'wrapperHtmlOptions' => array(
            'class' => 'col-sm-5',
        ),

        'hint' => Yii::t('admin', 'Please, insert ') . ' urlSuffix',
        'append' => Yii::t('admin', 'Text')
    )
); ?>
<?php echo $form->textFieldGroup($model, 'defaultParams',
    array(
        'wrapperHtmlOptions' => array(
            'class' => 'col-sm-5',
        ),
        'hint' => Yii::t('admin', 'Please, insert ') . ' defaultParams',
        'append' => Yii::t('admin', 'Text')
    )
); ?>
<?php echo $form->dropDownListGroup($model, 'matchValue', array('0' => Yii::t('admin', 'No'), '1' => Yii::t('admin', 'Yes')), array('prompt' => Yii::t('admin', 'All'))); ?>
<?php echo $form->textFieldGroup($model, 'verb', array(
        'maxlength' => 255,
        'wrapperHtmlOptions' => array(
            'class' => 'col-sm-5',
        ),

        'hint' => Yii::t('admin', 'Please, insert ') . ' verb',
        'append' => Yii::t('admin', 'Text')
    )
); ?>
<?php echo $form->dropDownListGroup($model, 'parsingOnly', array('0' => Yii::t('admin', 'No'), '1' => Yii::t('admin', 'Yes')), array('prompt' => Yii::t('admin', 'All'))); ?>
<?php echo $form->textFieldGroup($model, 'references',
    array(
        'wrapperHtmlOptions' => array(
            'class' => 'col-sm-5',
        ),
        'hint' => Yii::t('admin', 'Please, insert ') . ' references',
        'append' => Yii::t('admin', 'Text')
    )
); ?>
<?php echo $form->textFieldGroup($model, 'routePattern', array(
        'maxlength' => 1023,
        'wrapperHtmlOptions' => array(
            'class' => 'col-sm-5',
        ),

        'hint' => Yii::t('admin', 'Please, insert ') . ' routePattern',
        'append' => Yii::t('admin', 'Text')
    )
); ?>
<?php echo $form->textFieldGroup($model, 'template', array(
        'maxlength' => 1023,
        'wrapperHtmlOptions' => array(
            'class' => 'col-sm-5',
        ),

        'hint' => Yii::t('admin', 'Please, insert ') . ' template',
        'append' => Yii::t('admin', 'Text')
    )
); ?>
<?php echo $form->dropDownListGroup($model, 'append', array('0' => Yii::t('admin', 'No'), '1' => Yii::t('admin', 'Yes')), array('prompt' => Yii::t('admin', 'All'))); ?>
<?php echo $form->dropDownListGroup($model, 'hasHostInfo', array('0' => Yii::t('admin', 'No'), '1' => Yii::t('admin', 'Yes')), array('prompt' => Yii::t('admin', 'All'))); ?>
<?php echo $form->textFieldGroup($model, 'order',
    array(
        'wrapperHtmlOptions' => array(
            'class' => 'col-sm-5',
        ),
        'hint' => Yii::t('admin', 'Please, insert ') . ' order',
        'append' => Yii::t('admin', 'Text')
    )
); ?>

<div class="form-actions">
    <?php $this->widget('application.extensions.bootstrap.widgets.TbButton',
        array(
            'buttonType' => 'submit',
            'context' => 'success',
            'icon' => 'glyphicon glyphicon-saved',
            'label' => Yii::t('admin', 'Buscar ' . $model->adminNames[2])
        ));
    ?></div>

<?php $this->endWidget(); ?>
