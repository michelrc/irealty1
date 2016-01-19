<?php
$this->title = Yii::t('YcmModule.ycm',
    'Create {name}',
    array('{name}'=> Yii::t('sideMenu', "Why shop? Section"))
);

?>
<?php $form = $this->beginWidget('application.extensions.bootstrap.widgets.TbActiveForm', array(
    'id' => 'home-page-why-shop-icons-form',
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
                    'linebreaks' => true,
                ),
                    )
                ); ?>

                <?php $this->endWidget(); ?>
                                  <?php echo $form->fileFieldGroup($model, 'recipeImg1',array(
                                        'wrapperHtmlOptions' => array(
                                            'class' => 'col-sm-5',
                                        ),
                                        'append' => CHtml::image($model->_icon_image->getFileUrl('normal'), '', array('width' => '100px')),
                                        'hint' => t('The image dimensions are'). ' 80x80px'
                                    )); 
 echo  $form->textFieldGroup($model, 'icon_image',
            				            array(
                                            'wrapperHtmlOptions' => array(
                                                'class' => 'col-sm-5',
                                            ),// 'hint' => t('Please, insert icon_image'),
                                            'append' => 'Text',
                                        )
                                    ); ?>
            

<div class='form-actions'>
    <?php $this->widget(
        'application.extensions.bootstrap.widgets.TbButton',
        array(
            'buttonType' => 'submit',
            'context' => 'primary',
            'icon'=> 'glyphicon glyphicon-saved',
            'label' => t('Save item')
        )
    ); ?>
    <?php $this->endWidget(); ?>