<?php
$this->title = Yii::t('YcmModule.ycm',
    'Create {name}',
    array('{name}'=> Yii::t('sideMenu', 'Banner Image'))
);

?>

<?php $form = $this->beginWidget('application.extensions.bootstrap.widgets.TbActiveForm', array(
    'id' => 'home-page-banner-form',
    'enableClientValidation'=>true,

));
?>

<?php echo $form->fileFieldGroup($model, 'recipeImg1',array(
           'wrapperHtmlOptions' => array(
               'class' => 'col-sm-5',
           ),
           'append' => CHtml::image($model->_image->getFileUrl('normal'), '', array('width' => '100px')),
           'hint' => t('The image dimensions are').' 1263x644px'
       ));
    echo  $form->textFieldGroup($model, 'image',
       array(
           'wrapperHtmlOptions' => array(
               'class' => 'col-sm-5',
           ),// 'hint' => t('Please, insert image'),
           'append' => 'Text',
       )
   ); ?>
    <div class='form-actions'>
        <?php $this->widget(
            'application.extensions.bootstrap.widgets.TbButton',
            array(
                'buttonType' => 'submit',
                'context' => 'primary',
                'icon'=> 'glyphicon glyphicon-saved',
                'label' => t('Save item')
            )
        ); ?>
    </div>
<?php $this->endWidget(); ?>

