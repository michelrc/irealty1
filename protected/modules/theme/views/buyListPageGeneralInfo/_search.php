
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
        <?php echo $form->textFieldGroup($model, 'banner_title', array(
                'maxlength' => 255,
                'wrapperHtmlOptions' => array(
                                    'class' => 'col-sm-5',
                                ),
                                
                               // 'hint' => t('Please, insert banner_title'),
                                'append' => 'Text'
                                )
                      ); ?>
        <?php echo $form->textFieldGroup($model, 'page_title', array(
                'maxlength' => 255,
                'wrapperHtmlOptions' => array(
                                    'class' => 'col-sm-5',
                                ),
                                
                               // 'hint' => t('Please, insert page_title'),
                                'append' => 'Text'
                                )
                      ); ?>
        <?php echo $form->numberFieldGroup($model,'amount_products_per_page',
                            array(
                                'wrapperHtmlOptions' => array(
                                    'class' => 'col-sm-5',
                                ),
                              //  'hint' => t('Please, insert amount_products_per_page'),
                                'append' => '#'
                            )
                        ); ?>
        <?php echo $form->fileFieldGroup($model, 'recipeImg1',array(
                                        'wrapperHtmlOptions' => array(
                                            'class' => 'col-sm-5',
                                        ),
                                        'append' => CHtml::image($model->_bottom_image->getFileUrl('normal'), '', array('width' => '100px')),
                                        'hint' => t('The image dimensions are').' 1600x298px'
                                    )); 
 $form->textFieldGroup($model, 'bottom_image',
            				            array(
                                            'wrapperHtmlOptions' => array(
                                                'class' => 'col-sm-5',
                                            ),// 'hint' => t('Please, insert bottom_image'),
                                            'append' => 'Text',
                                        )
                                    ); ?>
        <?php echo $form->textFieldGroup($model, 'popular_properties_tittle', array(
                'maxlength' => 255,
                'wrapperHtmlOptions' => array(
                                    'class' => 'col-sm-5',
                                ),
                                
                               // 'hint' => t('Please, insert popular_properties_tittle'),
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
