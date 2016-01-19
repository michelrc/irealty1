
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
        <?php echo $form->fileFieldGroup($model, 'recipeImg1',array(
                                        'wrapperHtmlOptions' => array(
                                            'class' => 'col-sm-5',
                                        ),
                                        'append' => CHtml::image($model->_banner_image->getFileUrl('normal'), '', array('width' => '100px')),
                                        'hint' => t('The image dimensions are').' 1600x300px'
                                    )); 
 echo  $form->textFieldGroup($model, 'banner_image',
            				            array(
                                            'wrapperHtmlOptions' => array(
                                                'class' => 'col-sm-5',
                                            ),// 'hint' => t('Please, insert banner_image'),
                                            'append' => 'Text',
                                        )
                                    ); ?>
        <?php echo $form->textFieldGroup($model, 'title', array(
                'maxlength' => 250,
                'wrapperHtmlOptions' => array(
                                    'class' => 'col-sm-5',
                                ),
                                
                               // 'hint' => t('Please, insert title'),
                                'append' => 'Text'
                                )
                      ); ?>
        <?php echo $form->textAreaGroup($model,'description',
                array(
                    'wrapperHtmlOptions' => array(
                        'class' => 'col-sm-12',
                        ),
                    
                    )
                ); ?>
        <?php echo $form->textFieldGroup($model, 'place_holder_name', array(
                'maxlength' => 250,
                'wrapperHtmlOptions' => array(
                                    'class' => 'col-sm-5',
                                ),
                                
                               // 'hint' => t('Please, insert place_holder_name'),
                                'append' => 'Text'
                                )
                      ); ?>
        <?php echo $form->textFieldGroup($model, 'place_holder_phone', array(
                'maxlength' => 250,
                'wrapperHtmlOptions' => array(
                                    'class' => 'col-sm-5',
                                ),
                                
                               // 'hint' => t('Please, insert place_holder_phone'),
                                'append' => 'Text'
                                )
                      ); ?>
        <?php echo $form->textFieldGroup($model, 'place_holder_email', array(
                'maxlength' => 250,
                'wrapperHtmlOptions' => array(
                                    'class' => 'col-sm-5',
                                ),
                                
                               // 'hint' => t('Please, insert place_holder_email'),
                                'append' => 'Text'
                                )
                      ); ?>
        <?php echo $form->textFieldGroup($model, 'place_holder_subject', array(
                'maxlength' => 250,
                'wrapperHtmlOptions' => array(
                                    'class' => 'col-sm-5',
                                ),
                                
                               // 'hint' => t('Please, insert place_holder_subject'),
                                'append' => 'Text'
                                )
                      ); ?>
        <?php echo $form->textFieldGroup($model, 'place_holder_message', array(
                'maxlength' => 250,
                'wrapperHtmlOptions' => array(
                                    'class' => 'col-sm-5',
                                ),
                                
                               // 'hint' => t('Please, insert place_holder_message'),
                                'append' => 'Text'
                                )
                      ); ?>
        <?php echo $form->textFieldGroup($model, 'agents_title', array(
                'maxlength' => 255,
                'wrapperHtmlOptions' => array(
                                    'class' => 'col-sm-5',
                                ),
                                
                               // 'hint' => t('Please, insert agents_title'),
                                'append' => 'Text'
                                )
                      ); ?>
        <?php echo $form->textFieldGroup($model, 'address_title', array(
                'maxlength' => 255,
                'wrapperHtmlOptions' => array(
                                    'class' => 'col-sm-5',
                                ),
                                
                               // 'hint' => t('Please, insert address_title'),
                                'append' => 'Text'
                                )
                      ); ?>

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
