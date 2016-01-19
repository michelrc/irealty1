
<?php
/**
 * The following code was generated automatically using GiixCrudCode
 * This generator was improve by iReevo Team
 */
 ?>

<?php $form = $this->beginWidget('application.extensions.bootstrap.widgets.TbActiveForm', array(
    'id' => 'home-page-banner-form',
    'enableClientValidation'=>true,

));
?>

<div class="tabbable inline">
    <ul id="myProductTab" class="nav nav-tabs tab-bricky">
        <li class="active">
            <a href="#homepage_panel_tab1" data-toggle="tab">
                <?php echo Yii::t('BACKEND_LABELS', 'Información General')?>
            </a>
        </li>
        <li>
            <a href="#homepage_panel_tab2" data-toggle="tab">
                <?php echo Yii::t('BACKEND_LABELS', 'Banner Image')?>
            </a>
        </li>
        <li>
            <a href="#homepage_panel_tab3" data-toggle="tab">
                <?php echo Yii::t('BACKEND_LABELS', 'Why shop Icons')?>
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane in active" id="homepage_panel_tab1">
            <div class="widget-box">
                <div class="widget-title">
                    <span class="icon">
                        <i class="fa fa-file"></i>
                    </span>
                    <h5><?php echo Yii::t('BACKEND_LABELS', 'Sección Propiedades Destacadas')?></h5>
                </div>
                <div class="widget-content nopadding">
                    <?php $this->beginWidget('i18n.extensions.widgets.LanguageWidget', array(
                        'model' => $model_leading_properties,
                        'attribute' => 'title' )); ?>
                        <?php echo $form->textFieldGroup($model_leading_properties, 'title', array(
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
                </div>
            </div>
            <div class="widget-box">
                <div class="widget-title">
                    <span class="icon">
                        <i class="fa fa-file"></i>
                    </span>
                    <h5><?php echo Yii::t('BACKEND_LABELS', 'Sección Propiedades Recientes')?></h5>
                </div>
                <div class="widget-content nopadding">
                    <?php $this->beginWidget('i18n.extensions.widgets.LanguageWidget', array(
                        'model' => $model_recent_properties,
                        'attribute' => 'title' )); ?>
                        <?php echo $form->textFieldGroup($model_recent_properties, 'title', array(
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
                        'model' => $model_recent_properties,
                        'attribute' => 'view_more' )); ?>
                        <?php echo $form->textFieldGroup($model_recent_properties, 'view_more', array(
                        'maxlength' => 250,
                        'wrapperHtmlOptions' => array(
                                            'class' => 'col-sm-5',
                                        ),
                                        'widgetOptions' => array(
                            'htmlOptions' => array('value' => '{value}', 'name' => '{name}'),
                        ),
                                       // 'hint' => t('Please, insert view_more'),
                                        'append' => 'Text'
                                        )
                              ); ?>
                    <?php $this->endWidget(); ?>
                </div>
            </div>
            <div class="widget-box">
                <div class="widget-title">
                    <span class="icon">
                        <i class="fa fa-file"></i>
                    </span>
                    <h5><?php echo Yii::t('BACKEND_LABELS', 'Sección ¿Por qué comprar?')?></h5>
                </div>
                <div class="widget-content nopadding">
                    <?php $this->beginWidget('i18n.extensions.widgets.LanguageWidget', array(
                        'model' => $model_why_shop,
                        'attribute' => 'title' )); ?>
                        <?php echo $form->textFieldGroup($model_why_shop, 'title', array(
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
                        'model' => $model_why_shop,
                        'attribute' => 'subtitle' )); ?>
                        <?php echo $form->textAreaGroup($model_why_shop,'subtitle',
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
                </div>
            </div>
            <div class="widget-box">
                <div class="widget-title">
                    <span class="icon">
                        <i class="fa fa-file"></i>
                    </span>
                    <h5><?php echo Yii::t('BACKEND_LABELS', 'Sección Testimonios')?></h5>
                </div>
                <div class="widget-content nopadding">
                    <?php $this->beginWidget('i18n.extensions.widgets.LanguageWidget', array(
                        'model' => $model_testimonies,
                        'attribute' => 'title' )); ?>
                        <?php echo $form->textFieldGroup($model_testimonies, 'title', array(
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
                </div>
            </div>
            <div class="widget-box">
                <div class="widget-title">
                    <span class="icon">
                        <i class="fa fa-file"></i>
                    </span>
                    <h5><?php echo Yii::t('BACKEND_LABELS', 'Sección Contáctenos')?></h5>
                </div>
                <div class="widget-content nopadding">
                    <?php echo $form->fileFieldGroup($model_contact_us, 'recipeImg1',array(
                            'wrapperHtmlOptions' => array(
                                'class' => 'col-sm-5',
                            ),
                            'append' => CHtml::image($model_contact_us->_image->getFileUrl('normal'), '', array('width' => '100px')),
                            'hint' => t('The image dimensions are').' 1263x268px'
                        ));
                     echo  $form->textFieldGroup($model_contact_us, 'image',
                            array(
                                'wrapperHtmlOptions' => array(
                                    'class' => 'col-sm-5',
                                ),// 'hint' => t('Please, insert image'),
                                'append' => 'Text',
                            )
                        ); ?>
                </div>
            </div>


        </div>
        <div class="tab-pane" id="homepage_panel_tab2">

            <?php $this->renderPartial('_admin', array('model' => $model))?>
        </div>
        <div class="tab-pane" id="homepage_panel_tab3">

            <?php $this->renderPartial('_whyShopIconsAdmin', array('model_why_shop_icons' => $model_why_shop_icons))?>
        </div>
</div>


<div class='form-actions'>   <a href='<?php echo app()->request->urlReferrer;?>' class='btn btn-default'>
        <span class='glyphicon glyphicon-arrow-left'></span><?php echo t('Back');?></a>
    <?php $this->widget(
        'application.extensions.bootstrap.widgets.TbButton',
        array(
            'buttonType' => 'submit',
            'context' => 'primary',
            'icon'=> 'glyphicon glyphicon-saved',
            'label' => t('Save item')
        )
    ); ?>
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
    <?php if(isset($model->id)){
       // echo CHtml::link(t(TbHtml::icon('glyphicon glyphicon-remove'). 'Remove item'),array('delete','id'=>$model->id),array('class'=>'btn btn-danger'));
    }?></div>

