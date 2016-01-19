
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
                                        'hint' => t('The image dimensions are').' 1600x298px'
                                    )); 
 $form->textFieldGroup($model, 'banner_image',
            				            array(
                                            'wrapperHtmlOptions' => array(
                                                'class' => 'col-sm-5',
                                            ),// 'hint' => t('Please, insert banner_image'),
                                            'append' => 'Text',
                                        )
                                    ); ?>
        <?php echo $form->textFieldGroup($model, 'banner_title', array(
                'maxlength' => 255,
                'wrapperHtmlOptions' => array(
                                    'class' => 'col-sm-5',
                                ),
                                
                               // 'hint' => t('Please, insert banner_title'),
                                'append' => 'Text'
                                )
                      ); ?>
        <?php echo $form->textFieldGroup($model, 'name', array(
                'maxlength' => 255,
                'wrapperHtmlOptions' => array(
                                    'class' => 'col-sm-5',
                                ),
                                
                               // 'hint' => t('Please, insert name'),
                                'append' => 'Text'
                                )
                      ); ?>
        <?php echo $form->dropDownListGroup($model, 'category', GxHtml::listDataEx(PropertyCategory::model()->findAllAttributes(null, true)), array('prompt' => t('All'))); ?>
        <?php echo $form->textAreaGroup($model,'description',
                array(
                    'wrapperHtmlOptions' => array(
                        'class' => 'col-sm-12',
                        ),
                    
                    )
                ); ?>
        <?php echo $form->textFieldGroup($model,'price',
			array(
				'wrapperHtmlOptions' => array(
					'class' => 'col-sm-5',
				),
				'widgetOptions' => array(
                    'htmlOptions' => array('class' => 'currency'),
                ),
				// 'hint' => t('Please, insert price'),
				'append' => '.00'
			)
		); ?>
        <?php echo $form->dropDownListGroup($model, 'condition', GxHtml::listDataEx(PropertyCondition::model()->findAllAttributes(null, true)), array('prompt' => t('All'))); ?>
        <?php echo $form->textFieldGroup($model, 'address', array(
                'maxlength' => 255,
                'wrapperHtmlOptions' => array(
                                    'class' => 'col-sm-5',
                                ),
                                
                               // 'hint' => t('Please, insert address'),
                                'append' => 'Text'
                                )
                      ); ?>
        <?php echo $form->dropDownListGroup($model, 'province', GxHtml::listDataEx(Province::model()->findAllAttributes(null, true)), array('prompt' => t('All'))); ?>
        <?php echo $form->textFieldGroup($model,'area',
			array(
				'wrapperHtmlOptions' => array(
					'class' => 'col-sm-5',
				),
				'widgetOptions' => array(
                    'htmlOptions' => array('class' => 'currency'),
                ),
				// 'hint' => t('Please, insert area'),
				'append' => '.00'
			)
		); ?>
        <?php echo $form->dropDownListGroup($model,'rooms',
                            array(
                                'wrapperHtmlOptions' => array(
                                    'class' => 'col-sm-5',
                                ),
                                'widgetOptions' => array(
                                    'data' => array(1=>1,2=>2,3=>3,4=>4,5=>5),
                                   // 'htmlOptions' => array('multiple' => true),
                                ),
                                // 'hint' => t('Please, select rooms'),
                                 'prepend' => 'Select'
                            )
                        ); ?>
        <?php echo $form->dropDownListGroup($model,'bathroom',
                            array(
                                'wrapperHtmlOptions' => array(
                                    'class' => 'col-sm-5',
                                ),
                                'widgetOptions' => array(
                                    'data' => array(1=>1,2=>2,3=>3,4=>4,5=>5,6=>6,7=>7,8=>8,9=>9,10=>10),
                                   // 'htmlOptions' => array('multiple' => true),
                                ),
                                // 'hint' => t('Please, select bathroom'),
                                 'prepend' => 'Select'
                            )
                        ); ?>
        <?php echo $form->textFieldGroup($model, 'best_tips', array(
                'maxlength' => 255,
                'wrapperHtmlOptions' => array(
                                    'class' => 'col-sm-5',
                                ),
                                
                               // 'hint' => t('Please, insert best_tips'),
                                'append' => 'Text'
                                )
                      ); ?>
        <?php echo $form->dropDownListGroup($model, 'agent', GxHtml::listDataEx(Agent::model()->findAllAttributes(null, true)), array('prompt' => t('All'))); ?>
        <?php echo $form->dropDownListGroup($model, 'type', GxHtml::listDataEx(PropertyType::model()->findAllAttributes(null, true)), array('prompt' => t('All'))); ?>
        <?php echo $form->dropDownListGroup($model, 'exalted', array('0' => t('No'), '1' => t('Yes')), array('prompt' => t('All'))); ?>
        <?php echo $form->urlFieldGroup($model,'youtube_video',
                        array(
                            'wrapperHtmlOptions' => array(
                                'class' => 'col-sm-5',
                            ),//'hint' => t('Please, insert youtube_video'),
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
        <?php echo $form->datePickerGroup(
                $model,
                'created',
                array(
                    'widgetOptions' => array(
                        'options' => array(
                            'language' => 'es',
                            'dateFormat' => 'yy-mm-dd',
                        ),
                    ),
                    'wrapperHtmlOptions' => array(
                        'class' => 'col-sm-5',
                    ),
                    //'hint' => t('Click, para seleccionar una fecha'),
                    'prepend' => '<i class="glyphicon glyphicon-calendar"></i>'
                )
            ); ?>
        <?php echo $form->dropDownListGroup($model, 'seo_url_id', GxHtml::listDataEx(SeoUrl::model()->findAllAttributes(null, true)), array('prompt' => t('All'))); ?>
        <?php echo $form->textFieldGroup($model, 'number_contact',
				            array(
                                'wrapperHtmlOptions' => array(
                                    'class' => 'col-sm-5',
                                ),
                                
                            //  'hint' => t('Please, insert number_contact'),
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
