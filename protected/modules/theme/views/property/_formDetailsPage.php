<?php echo $form->fileFieldGroup($model, 'recipeImg1',array(
                                        'wrapperHtmlOptions' => array(
                                            'class' => 'col-sm-5',
                                        ),
                                        'append' => CHtml::image($model->_banner_image->getFileUrl('normal'), '', array('width' => '100px')),
                                        'hint' => t('The image dimensions are').' 1263x298px'
                                    ));
 $form->textFieldGroup($model, 'banner_image',
                                        array(
                                            'wrapperHtmlOptions' => array(
                                                'class' => 'col-sm-5',
                                            ),// 'hint' => t('Please, insert banner_image'),
                                            'append' => 'Text',
                                        )
                                    ); ?>
                                  <?php $this->beginWidget('i18n.extensions.widgets.LanguageWidget', array(
                'model' => $model,
                'attribute' => 'banner_title' )); ?>
                <?php echo $form->textFieldGroup($model, 'banner_title', array(
                'maxlength' => 255,
                'wrapperHtmlOptions' => array(
                                    'class' => 'col-sm-5',
                                ),
                                'widgetOptions' => array(
                    'htmlOptions' => array('value' => '{value}', 'name' => '{name}'),
                ),
                               // 'hint' => t('Please, insert banner_title'),
                                'append' => 'Text'
                                )
                      ); ?>
                <?php $this->endWidget(); ?>