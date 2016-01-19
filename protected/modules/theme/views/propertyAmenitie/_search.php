
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
                'maxlength' => 50,
                'wrapperHtmlOptions' => array(
                                    'class' => 'col-sm-5',
                                ),
                                
                               // 'hint' => t('Please, insert id'),
                                'append' => 'Text'
                                )
                      ); ?>
        <?php echo $form->dropDownListGroup($model, 'amenitie_id', GxHtml::listDataEx(Amenitie::model()->findAllAttributes(null, true)), array('prompt' => t('All'))); ?>
        <?php echo $form->dropDownListGroup($model, 'property_id', GxHtml::listDataEx(Property::model()->findAllAttributes(null, true)), array('prompt' => t('All'))); ?>
        <?php echo $form->dropDownListGroup($model, 'relevant', array('0' => t('No'), '1' => t('Yes')), array('prompt' => t('All'))); ?>

<div class="form-actions">
    		<?php $this->widget('application.extensions.bootstrap.widgets.TbButton',
    array(
            'buttonType' => 'submit',
            'context' => 'success',
            'icon'=> 'glyphicon glyphicon-saved',
            'label' => t('Buscar '.mod('ycm')->getPluralName($model))
        ));
 ?></div>

<?php $this->endWidget(); ?>
