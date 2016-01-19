
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
        <?php echo $form->textFieldGroup($model,'first_price',
			array(
				'wrapperHtmlOptions' => array(
					'class' => 'col-sm-5',
				),
				'widgetOptions' => array(
                    'htmlOptions' => array('class' => 'currency'),
                ),
				// 'hint' => t('Please, insert first_price'),
				'append' => '.00'
			)
		); ?>
        <?php echo $form->textFieldGroup($model,'last_price',
			array(
				'wrapperHtmlOptions' => array(
					'class' => 'col-sm-5',
				),
				'widgetOptions' => array(
                    'htmlOptions' => array('class' => 'currency'),
                ),
				// 'hint' => t('Please, insert last_price'),
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
