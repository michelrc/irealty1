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
<?php echo $form->textFieldGroup($model, 'url', array(
        'maxlength' => 255,
        'wrapperHtmlOptions' => array(
            'class' => 'col-sm-5',
        ),

        'hint' => Yii::t('admin', 'Please, insert ') . ' url',
        'append' => Yii::t('admin', 'Text')
    )
); ?>
<?php echo $form->textFieldGroup($model, 'title', array(
        'maxlength' => 255,
        'wrapperHtmlOptions' => array(
            'class' => 'col-sm-5',
        ),

        'hint' => Yii::t('admin', 'Please, insert ') . ' title',
        'append' => Yii::t('admin', 'Text')
    )
); ?>
<?php echo $form->textFieldGroup($model, 'description',
    array(
        'wrapperHtmlOptions' => array(
            'class' => 'col-sm-5',
        ),
        'hint' => Yii::t('admin', 'Please, insert ') . ' description',
        'append' => Yii::t('admin', 'Text')
    )
); ?>
<?php echo $form->textFieldGroup($model, 'keywords', array(
        'maxlength' => 255,
        'wrapperHtmlOptions' => array(
            'class' => 'col-sm-5',
        ),

        'hint' => Yii::t('admin', 'Please, insert ') . ' keywords',
        'append' => Yii::t('admin', 'Text')
    )
); ?>
<?php echo $form->textFieldGroup($model, 'modelClassName', array(
        'maxlength' => 255,
        'wrapperHtmlOptions' => array(
            'class' => 'col-sm-5',
        ),

        'hint' => Yii::t('admin', 'Please, insert ') . ' modelClassName',
        'append' => Yii::t('admin', 'Text')
    )
); ?>
<?php echo $form->dropDownListGroup($model, 'seo_url_rule_id', GxHtml::listDataEx(::model()->findAll()), array('prompt' => Yii::t('admin', 'All'))); ?>
<?php echo $form->dropDownListGroup($model, 'products_id', GxHtml::listDataEx(::model()->findAll()), array('prompt' => Yii::t('admin', 'All'))); ?>
<?php echo $form->dropDownListGroup($model, 'product_variations_id', GxHtml::listDataEx(::model()->findAll()), array('prompt' => Yii::t('admin', 'All'))); ?>

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
