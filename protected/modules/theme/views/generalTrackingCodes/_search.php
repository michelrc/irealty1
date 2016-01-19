
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
        <?php echo $form->textAreaGroup($model,'source_code',
                          array(
                              'widgetOptions' => array(
                                      'editorOptions' =>array(
                                          'class' => 'span4',
                                          'rows' => 10,
                                          'options' => array('plugins' => array('clips', 'fontfamily','fullscreen'), 'lang'=>app()->getLanguage())
                                      )
                                  )
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
