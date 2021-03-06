
<?php
/**
 * The following code was generated automatically using GiixCrudCode
 * This generator was improve by iReevo Team
 */
 ?>

<?php $form = $this->beginWidget('application.extensions.bootstrap.widgets.TbActiveForm', array(
    'id' => 'rent-list-page-top-image-form',
    'enableClientValidation'=>true,

));
?>                      <?php echo $form->fileFieldGroup($model, 'recipeImg1',array(
                                        'wrapperHtmlOptions' => array(
                                            'class' => 'col-sm-5',
                                        ),
                                        'append' => CHtml::image($model->_top_image->getFileUrl('normal'), '', array('width' => '100px')),
                                        'hint' => t('The image dimensions are').' 1263x422px'
                                    )); 
 $form->textFieldGroup($model, 'top_image',
            				            array(
                                            'wrapperHtmlOptions' => array(
                                                'class' => 'col-sm-5',
                                            ),// 'hint' => t('Please, insert top_image'),
                                            'append' => 'Text',
                                        )
                                    ); ?>
            

<div class='form-actions'>
    <?php if(!isset($_GET['blank'])):?>
        <a href='<?php echo app()->request->urlReferrer;?>' class='btn btn-default'><span class='glyphicon glyphicon-arrow-left'></span><?php echo t('Back');?></a>
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
    <?php $this->endWidget(); ?>
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
        <?php $this->endWidget(); ?>
    <?php endif?>
    <?php if(isset($model->id)){
       // echo CHtml::link(t(TbHtml::icon('glyphicon glyphicon-remove'). 'Remove item'),array('delete','id'=>$model->id),array('class'=>'btn btn-danger'));
    }?></div>