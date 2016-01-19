
<?php
/**
 * The following code was generated automatically using GiixCrudCode
 * This generator was improve by iReevo Team
 */
 ?>

<?php $form = $this->beginWidget('application.extensions.bootstrap.widgets.TbActiveForm', array(
    'id' => 'buy-list-page-filter-config-form',
    'enableClientValidation'=>true,

));
?>                      <?php echo $form->textFieldGroup($model,'first_price',
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
            

<div class='form-actions'>
    <?php if(!isset($_GET['blank'])):?>
    <a href='<?php echo app()->request->urlReferrer;?>' class='btn btn-default'><span class='glyphicon glyphicon-arrow-left'></span>
        <?php echo t('Back');?></a>
    <?php endif?>
    <?php $this->widget(
        'application.extensions.bootstrap.widgets.TbButton',
        array(
            'buttonType' => 'submit',
            'context' => 'primary',
            'icon'=> 'glyphicon glyphicon-saved',
            'label' => t('Save item')
        )
    ); ?>
    <?php if(!isset($_GET['blank'])):?>
    <?php $this->widget(
        'application.extensions.bootstrap.widgets.TbButton',
        array(
            'buttonType' => 'reset',
            'context' => 'warning',
            'icon'=> 'glyphicon glyphicon-remove',
            'label' => t('Reset form')
        )
    ); ?>
    <?php endif?>
    <?php $this->endWidget(); ?>
    <?php if(isset($model->id)){
       // echo CHtml::link(t(TbHtml::icon('glyphicon glyphicon-remove'). 'Remove item'),array('delete','id'=>$model->id),array('class'=>'btn btn-danger'));
    }?></div>