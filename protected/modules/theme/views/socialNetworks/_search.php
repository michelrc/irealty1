
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
        <?php echo $form->urlFieldGroup($model,'facebook_link',
                        array(
                            'wrapperHtmlOptions' => array(
                                'class' => 'col-sm-5',
                            ),//'hint' => t('Please, insert facebook_link'),
                            'append' => 'http://'
                        )
                    ); ?>
        <?php echo $form->urlFieldGroup($model,'twitter_link',
                        array(
                            'wrapperHtmlOptions' => array(
                                'class' => 'col-sm-5',
                            ),//'hint' => t('Please, insert twitter_link'),
                            'append' => 'http://'
                        )
                    ); ?>
        <?php echo $form->urlFieldGroup($model,'google_plus_link',
                        array(
                            'wrapperHtmlOptions' => array(
                                'class' => 'col-sm-5',
                            ),//'hint' => t('Please, insert google_plus_link'),
                            'append' => 'http://'
                        )
                    ); ?>
        <?php echo $form->urlFieldGroup($model,'instagram_link',
                        array(
                            'wrapperHtmlOptions' => array(
                                'class' => 'col-sm-5',
                            ),//'hint' => t('Please, insert instagram_link'),
                            'append' => 'http://'
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
