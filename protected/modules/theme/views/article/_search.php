
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
        <?php echo $form->textFieldGroup($model, 'title', array(
                'maxlength' => 255,
                'wrapperHtmlOptions' => array(
                                    'class' => 'col-sm-5',
                                ),
                                
                               // 'hint' => t('Please, insert title'),
                                'append' => 'Text'
                                )
                      ); ?>
        <?php echo $form->textFieldGroup($model, 'author', array(
                'maxlength' => 255,
                'wrapperHtmlOptions' => array(
                                    'class' => 'col-sm-5',
                                ),
                                
                               // 'hint' => t('Please, insert author'),
                                'append' => 'Text'
                                )
                      ); ?>
        <?php echo $form->datePickerGroup(
                $model,
                'date',
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
        <?php echo $form->textAreaGroup($model,'large_description',
                array(
                    'wrapperHtmlOptions' => array(
                        'class' => 'col-sm-12',
                        ),
                    
                    )
                ); ?>
        <?php echo $form->textAreaGroup($model,'short_description',
                array(
                    'wrapperHtmlOptions' => array(
                        'class' => 'col-sm-12',
                        ),
                    
                    )
                ); ?>
        <?php echo $form->fileFieldGroup($model, 'recipeImg1',array(
                                        'wrapperHtmlOptions' => array(
                                            'class' => 'col-sm-5',
                                        ),
                                        'append' => CHtml::image($model->_large_image->getFileUrl('normal'), '', array('width' => '100px')),
                                        'hint' => t('The image dimensions are 1099x516px')
                                    )); 
 echo  $form->textFieldGroup($model, 'large_image',
            				            array(
                                            'wrapperHtmlOptions' => array(
                                                'class' => 'col-sm-5',
                                            ),// 'hint' => t('Please, insert large_image'),
                                            'append' => 'Text',
                                        )
                                    ); ?>
        <?php echo $form->fileFieldGroup($model, 'recipeImg2',array(
                                        'wrapperHtmlOptions' => array(
                                            'class' => 'col-sm-5',
                                        ),
                                        'append' => CHtml::image($model->_thumb_image->getFileUrl('normal'), '', array('width' => '100px')),
                                        'hint' => t('The image dimensions are 240x150px')
                                    )); 
 echo  $form->textFieldGroup($model, 'thumb_image',
            				            array(
                                            'wrapperHtmlOptions' => array(
                                                'class' => 'col-sm-5',
                                            ),// 'hint' => t('Please, insert thumb_image'),
                                            'append' => 'Text',
                                        )
                                    ); ?>
        <?php echo $form->urlFieldGroup($model,'youtube_video',
                        array(
                            'wrapperHtmlOptions' => array(
                                'class' => 'col-sm-5',
                            ),//'hint' => t('Please, insert youtube_video'),
                            'append' => 'http://'
                        )
                    ); ?>
        <?php echo $form->dropDownListGroup($model, 'category', GxHtml::listDataEx(ArticleCategory::model()->findAllAttributes(null, true)), array('prompt' => t('All'))); ?>
        <?php echo $form->dropDownListGroup($model, 'seo_url_id', GxHtml::listDataEx(SeoUrl::model()->findAllAttributes(null, true)), array('prompt' => t('All'))); ?>

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
