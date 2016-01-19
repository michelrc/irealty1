
<?php
/**
 * The following code was generated automatically using GiixCrudCode
 * This generator was improve by iReevo Team
 */
 ?>

<?php $form = $this->beginWidget('application.extensions.bootstrap.widgets.TbActiveForm', array(
    'id' => 'home-page-why-shop-form',
    'enableClientValidation'=>true,

));
?>                      <?php $this->beginWidget('i18n.extensions.widgets.LanguageWidget', array(
                'model' => $model,
                'attribute' => 'title' )); ?>
                <?php echo $form->textFieldGroup($model, 'title', array(
                'maxlength' => 250,
                'wrapperHtmlOptions' => array(
                                    'class' => 'col-sm-5',
                                ),
                                'widgetOptions' => array(
                    'htmlOptions' => array('value' => '{value}', 'name' => '{name}'),
                ),
                               // 'hint' => t('Please, insert title'),
                                'append' => 'Text'
                                )
                      ); ?>

                <?php $this->endWidget(); ?>
                                  <?php $this->beginWidget('i18n.extensions.widgets.LanguageWidget', array(
                'model' => $model,
                'attribute' => 'subtitle' )); ?>
                <?php echo $form->textAreaGroup($model,'subtitle',
                array(
                    'wrapperHtmlOptions' => array(
                        'class' => 'col-sm-12',
                        ),
                    'widgetOptions' => array(
                    'htmlOptions' => array('rows' => 4, 'value' => '{value}', 'name' => '{name}', 'class' => 'redactor'),
                ),
                    )
                ); ?>

                <?php $this->endWidget(); ?>
            

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