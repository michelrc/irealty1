<?php
/**
 * Created by PhpStorm.
 * User: ernesto
 * Date: 25/09/15
 * Time: 10:57
 */ ?>

<?php echo $form->fileFieldGroup($model, 'recipeImg1',array(
                                        'wrapperHtmlOptions' => array(
                                            'class' => 'col-sm-5',
                                        ),
                                        'append' => CHtml::image($model->_banner_image->getFileUrl('normal'), '', array('width' => '100px')),
                                        'hint' => t('The image dimensions are').' 1263x289px'
                                    ));
                        echo $form->fileFieldGroup($model, 'recipeImg2',array(
                                        'wrapperHtmlOptions' => array(
                                            'class' => 'col-sm-5',
                                        ),
                                        'append' => CHtml::image($model->_banner_image_mobile->getFileUrl('normal'), '', array('width' => '100px')),
                                        'hint' => t('The image dimensions are').' 450x289px'
                                    ));
 echo  $form->textFieldGroup($model, 'banner_image',
            				            array(
                                            'wrapperHtmlOptions' => array(
                                                'class' => 'col-sm-5',
                                            ),// 'hint' => t('Please, insert banner_image'),
                                            'append' => 'Text',
                                        )
                                    ); ?>
                                  <?php $this->beginWidget('i18n.extensions.widgets.LanguageWidget', array(
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
                'attribute' => 'description' )); ?>
                <?php echo $form->textAreaGroup($model,'description',
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
                                  <?php $this->beginWidget('i18n.extensions.widgets.LanguageWidget', array(
                'model' => $model,
                'attribute' => 'place_holder_name' )); ?>
                <?php echo $form->textFieldGroup($model, 'place_holder_name', array(
                'maxlength' => 250,
                'wrapperHtmlOptions' => array(
                                    'class' => 'col-sm-5',
                                ),
                                'widgetOptions' => array(
                    'htmlOptions' => array('value' => '{value}', 'name' => '{name}'),
                ),
                               // 'hint' => t('Please, insert place_holder_name'),
                                'append' => 'Text'
                                )
                      ); ?>

                <?php $this->endWidget(); ?>
                                  <?php $this->beginWidget('i18n.extensions.widgets.LanguageWidget', array(
                'model' => $model,
                'attribute' => 'place_holder_phone' )); ?>
                <?php echo $form->textFieldGroup($model, 'place_holder_phone', array(
                'maxlength' => 250,
                'wrapperHtmlOptions' => array(
                                    'class' => 'col-sm-5',
                                ),
                                'widgetOptions' => array(
                    'htmlOptions' => array('value' => '{value}', 'name' => '{name}'),
                ),
                               // 'hint' => t('Please, insert place_holder_phone'),
                                'append' => 'Text'
                                )
                      ); ?>

                <?php $this->endWidget(); ?>
                                  <?php $this->beginWidget('i18n.extensions.widgets.LanguageWidget', array(
                'model' => $model,
                'attribute' => 'place_holder_email' )); ?>
                <?php echo $form->textFieldGroup($model, 'place_holder_email', array(
                'maxlength' => 250,
                'wrapperHtmlOptions' => array(
                                    'class' => 'col-sm-5',
                                ),
                                'widgetOptions' => array(
                    'htmlOptions' => array('value' => '{value}', 'name' => '{name}'),
                ),
                               // 'hint' => t('Please, insert place_holder_email'),
                                'append' => 'Text'
                                )
                      ); ?>

                <?php $this->endWidget(); ?>
                                  <?php $this->beginWidget('i18n.extensions.widgets.LanguageWidget', array(
                'model' => $model,
                'attribute' => 'place_holder_subject' )); ?>
                <?php echo $form->textFieldGroup($model, 'place_holder_subject', array(
                'maxlength' => 250,
                'wrapperHtmlOptions' => array(
                                    'class' => 'col-sm-5',
                                ),
                                'widgetOptions' => array(
                    'htmlOptions' => array('value' => '{value}', 'name' => '{name}'),
                ),
                               // 'hint' => t('Please, insert place_holder_subject'),
                                'append' => 'Text'
                                )
                      ); ?>

                <?php $this->endWidget(); ?>
                                  <?php $this->beginWidget('i18n.extensions.widgets.LanguageWidget', array(
                'model' => $model,
                'attribute' => 'place_holder_message' )); ?>
                <?php echo $form->textFieldGroup($model, 'place_holder_message', array(
                'maxlength' => 250,
                'wrapperHtmlOptions' => array(
                                    'class' => 'col-sm-5',
                                ),
                                'widgetOptions' => array(
                    'htmlOptions' => array('value' => '{value}', 'name' => '{name}'),
                ),
                               // 'hint' => t('Please, insert place_holder_message'),
                                'append' => 'Text'
                                )
                      ); ?>

                <?php $this->endWidget(); ?>
                                  <?php $this->beginWidget('i18n.extensions.widgets.LanguageWidget', array(
                'model' => $model,
                'attribute' => 'agents_title' )); ?>
                <?php echo $form->textFieldGroup($model, 'agents_title', array(
                'maxlength' => 255,
                'wrapperHtmlOptions' => array(
                                    'class' => 'col-sm-5',
                                ),
                                'widgetOptions' => array(
                    'htmlOptions' => array('value' => '{value}', 'name' => '{name}'),
                ),
                               // 'hint' => t('Please, insert agents_title'),
                                'append' => 'Text'
                                )
                      ); ?>

                <?php $this->endWidget(); ?>
                                  <?php $this->beginWidget('i18n.extensions.widgets.LanguageWidget', array(
                'model' => $model,
                'attribute' => 'address_title' )); ?>
                <?php echo $form->textFieldGroup($model, 'address_title', array(
                'maxlength' => 255,
                'wrapperHtmlOptions' => array(
                                    'class' => 'col-sm-5',
                                ),
                                'widgetOptions' => array(
                    'htmlOptions' => array('value' => '{value}', 'name' => '{name}'),
                ),
                               // 'hint' => t('Please, insert address_title'),
                                'append' => 'Text'
                                )
                      ); ?>

                <?php $this->endWidget(); ?>