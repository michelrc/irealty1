
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
                                        'append' => CHtml::image($model->_company_logo->getFileUrl('normal'), '', array('width' => '100px')),
                                        'hint' => t('The image dimensions are').' 142x64px'
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
        <?php echo $form->urlFieldGroup($model,'web_address',
                        array(
                            'wrapperHtmlOptions' => array(
                                'class' => 'col-sm-5',
                            ),//'hint' => t('Please, insert web_address'),
                            'append' => 'http://'
                        )
                    ); ?>
        <?php echo $form->textFieldGroup($model,'map_longitude',
			array(
				'wrapperHtmlOptions' => array(
					'class' => 'col-sm-5',
				),
				'widgetOptions' => array(
                    'htmlOptions' => array('class' => 'currency'),
                ),
				// 'hint' => t('Please, insert map_longitude'),
				'append' => '.00'
			)
		); ?>
        <?php echo $form->textFieldGroup($model,'map_latitude',
			array(
				'wrapperHtmlOptions' => array(
					'class' => 'col-sm-5',
				),
				'widgetOptions' => array(
                    'htmlOptions' => array('class' => 'currency'),
                ),
				// 'hint' => t('Please, insert map_latitude'),
				'append' => '.00'
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
