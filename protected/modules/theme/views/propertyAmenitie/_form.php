
<?php
/**
 * The following code was generated automatically using GiixCrudCode
 * This generator was improve by iReevo Team
 */
 ?>

<?php $form = $this->beginWidget('application.extensions.bootstrap.widgets.TbActiveForm', array(
    'id' => 'property-amenitie-form',
    'enableClientValidation'=>true,

));
?>

<?php
$property_criteria = new CDbCriteria();
if(isset($_GET['pid']))
{
    $property_criteria->compare('id', $_GET['pid']);
}

?>

<?php echo $form->dropDownListGroup($model,'property_id',
                           array(
                               'wrapperHtmlOptions' => array(
                                   'class' => 'col-sm-5',
                               ),
                               'widgetOptions' => array(
                                   'data' => GxHtml::listDataEx(Property::model()->findAll($property_criteria)),
                                  // 'htmlOptions' => array('multiple' => true),
                               ),
                               // 'hint' => t('Please, select property_id'),
                                'prepend' => 'Select'
                           )
                       ); ?>

<?php echo $form->dropDownListGroup($model,'amenitie_id',
                            array(
                                'wrapperHtmlOptions' => array(
                                    'class' => 'col-sm-5',
                                ),
                                'widgetOptions' => array(
                                    'data' => GxHtml::listDataEx(Amenitie::model()->findAll()),
                                   // 'htmlOptions' => array('multiple' => true),
                                ),
                                // 'hint' => t('Please, select amenitie_id'),
                                 'prepend' => 'Select'
                            )
                        ); ?>

                                  <?php echo $form->checkBoxGroup($model, 'relevant'); ?>
            

<div class='form-actions'>   <a href='<?php echo app()->request->urlReferrer;?>' class='btn btn-default'><span class='glyphicon glyphicon-arrow-left'></span><?php echo t('Back');?></a>   <?php $this->widget(
        'application.extensions.bootstrap.widgets.TbButton',
        array(
            'buttonType' => 'submit',
            'context' => 'primary',
            'icon'=> 'glyphicon glyphicon-saved',
            'label' => t('Save item')
        )
    ); ?>
    <?php $this->widget(
        'application.extensions.bootstrap.widgets.TbButton',
        array(
            'buttonType' => 'reset',
            'context' => 'warning',
            'icon'=> 'glyphicon glyphicon-remove',
            'label' => t('Reset form')
        )
    ); ?>
    <?php $this->endWidget(); ?>
    <?php if(isset($model->id)){
       // echo CHtml::link(t(TbHtml::icon('glyphicon glyphicon-remove'). 'Remove item'),array('delete','id'=>$model->id),array('class'=>'btn btn-danger'));
    }?></div>