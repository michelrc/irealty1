
<?php
/**
 * The following code was generated automatically using GiixCrudCode
 * This generator was improve by iReevo Team
 */
 ?>

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
                                  <?php $this->beginWidget('i18n.extensions.widgets.LanguageWidget', array(
                'model' => $model,
                'attribute' => 'page_title' )); ?>
                <?php echo $form->textFieldGroup($model, 'page_title', array(
                'maxlength' => 255,
                'wrapperHtmlOptions' => array(
                                    'class' => 'col-sm-5',
                                ),
                                'widgetOptions' => array(
                    'htmlOptions' => array('value' => '{value}', 'name' => '{name}'),
                ),
                               // 'hint' => t('Please, insert page_title'),
                                'append' => 'Text'
                                )
                      ); ?>

                <?php $this->endWidget(); ?>
                                  <?php echo $form->numberFieldGroup($model,'amount_products_per_page',
                            array(
                                'wrapperHtmlOptions' => array(
                                    'class' => 'col-sm-5',
                                ),
                              //  'hint' => t('Please, insert amount_products_per_page'),
                                'append' => '#'
                            )
                        ); ?>
                                  <?php /*echo $form->fileFieldGroup($model, 'recipeImg1',array(
                                        'wrapperHtmlOptions' => array(
                                            'class' => 'col-sm-5',
                                        ),
                                        'append' => CHtml::image($model->_bottom_image->getFileUrl('normal'), '', array('width' => '100px')),
                                        'hint' => t('The image dimensions are').' 1600x390px'
                                    ));
 $form->textFieldGroup($model, 'bottom_image',
            				            array(
                                            'wrapperHtmlOptions' => array(
                                                'class' => 'col-sm-5',
                                            ),// 'hint' => t('Please, insert bottom_image'),
                                            'append' => 'Text',
                                        )
                                    ); */?>
                                  <?php $this->beginWidget('i18n.extensions.widgets.LanguageWidget', array(
                'model' => $model,
                'attribute' => 'popular_properties_tittle' )); ?>
                <?php echo $form->textFieldGroup($model, 'popular_properties_tittle', array(
                'maxlength' => 255,
                'wrapperHtmlOptions' => array(
                                    'class' => 'col-sm-5',
                                ),
                                'widgetOptions' => array(
                    'htmlOptions' => array('value' => '{value}', 'name' => '{name}'),
                ),
                               // 'hint' => t('Please, insert popular_properties_tittle'),
                                'append' => 'Text'
                                )
                      ); ?>

                <?php $this->endWidget(); ?>
