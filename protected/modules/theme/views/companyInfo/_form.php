
<?php
/**
 * The following code was generated automatically using GiixCrudCode
 * This generator was improve by iReevo Team
 */
 ?>

<?php $form = $this->beginWidget('application.extensions.bootstrap.widgets.TbActiveForm', array(
    'id' => 'company-info-form',
    'enableClientValidation'=>true,

));
?>                      <?php echo $form->fileFieldGroup($model, 'recipeImg1',array(
                                        'wrapperHtmlOptions' => array(
                                            'class' => 'col-sm-5',
                                        ),
                                        'append' => CHtml::image($model->_company_logo->getFileUrl('normal'), '', array('width' => '100px')),
                                        'hint' => t('The image dimensions are').' 127x39px'
                                    )); 
 echo  $form->textFieldGroup($model, 'company_logo',
            				            array(
                                            'wrapperHtmlOptions' => array(
                                                'class' => 'col-sm-5',
                                            ),// 'hint' => t('Please, insert company_logo'),
                                            'append' => 'Text',
                                        )
                                    ); ?>
                                  <?php echo $form->textFieldGroup($model, 'company_name', array(
                'maxlength' => 255,
                'wrapperHtmlOptions' => array(
                                    'class' => 'col-sm-5',
                                ),
                                
                               // 'hint' => t('Please, insert company_name'),
                                'append' => 'Text'
                                )
                      ); ?>
                                  <?php echo $form->textFieldGroup($model, 'main_phone', array(
                'maxlength' => 255,
                'wrapperHtmlOptions' => array(
                                    'class' => 'col-sm-5',
                                ),
                                
                               // 'hint' => t('Please, insert main_phone'),
                                'append' => 'Text'
                                )
                      ); ?>
                                  <?php echo $form->textFieldGroup($model, 'second_phone', array(
                'maxlength' => 255,
                'wrapperHtmlOptions' => array(
                                    'class' => 'col-sm-5',
                                ),
                                
                               // 'hint' => t('Please, insert second_phone'),
                                'append' => 'Text'
                                )
                      ); ?>
                                  <?php echo $form->emailFieldGroup($model,'email',
                        array(
                            'wrapperHtmlOptions' => array(
                                'class' => 'col-sm-5',
                            ),
                            //'hint' => t('Please, insert email'),
                            'append' => '@'
                        )
                    ); ?>
                                  <?php echo $form->textAreaGroup($model,'postal_address',
                          array(
                              'widgetOptions' => array(
                                      'editorOptions' =>array(
                                          'class' => 'span4',
                                          'rows' => 10,
                                          'options' => array('plugins' => array('clips', 'fontfamily','fullscreen'), 'lang'=>app()->getLanguage()),
                                      )
                                  )
                              )
                          ); ?>
                                  <?php echo $form->textFieldGroup($model,'web_address',
                        array(
                            'wrapperHtmlOptions' => array(
                                'class' => 'col-sm-5',
                            ),//'hint' => t('Please, insert web_address'),
                            'append' => 'URL'
                        )
                    ); ?>
                                  <?php echo $form->textFieldGroup($model,'map_longitude',
			array(
				'wrapperHtmlOptions' => array(
					'class' => 'col-sm-5',
				),
				'widgetOptions' => array(
                   // 'htmlOptions' => array('class' => 'currency'),
                ),
				// 'hint' => t('Please, insert map_longitude'),
				'append' => '#'
			)
		); ?>
                                  <?php echo $form->textFieldGroup($model,'map_latitude',
			array(
				'wrapperHtmlOptions' => array(
					'class' => 'col-sm-5',
				),
				'widgetOptions' => array(
                 //   'htmlOptions' => array('class' => 'currency'),
                ),
				// 'hint' => t('Please, insert map_latitude'),
				'append' => '#'
			)
		); ?>
            

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