<?php
/**
 * The following code was generated automatically using GiixCrudCode
 * This generator was improve by iReevo Team
 */
?>

<?php $form = $this->beginWidget('application.extensions.bootstrap.widgets.TbActiveForm', array(
    'id' => 'article-form',
    'enableClientValidation' => true,

));
?>                      <?php $this->beginWidget('i18n.extensions.widgets.LanguageWidget', array(
    'model' => $model,
    'attribute' => 'title')); ?>
<?php echo $form->textFieldGroup($model, 'title', array(
        'maxlength' => 255,
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
<?php echo $form->textFieldGroup($model, 'author', array(
        'maxlength' => 255,
        'wrapperHtmlOptions' => array(
            'class' => 'col-sm-5',
        ),

        // 'hint' => t('Please, insert author'),
        'append' => 'Text'
    )
); ?>
<?php echo $form->datePickerGroup(
    $model,
    'date',
    array(
        'widgetOptions' => array(
            'options' => array(
                'language' => 'es',
                'dateFormat' => 'yy-mm-dd',
            ),
        ),
        'wrapperHtmlOptions' => array(
            'class' => 'col-sm-5',
        ),
        //'hint' => t('Click, para seleccionar una fecha'),
        'prepend' => '<i class="glyphicon glyphicon-calendar"></i>'
    )
); ?>
<?php $this->beginWidget('i18n.extensions.widgets.LanguageWidget', array(
    'model' => $model,
    'attribute' => 'large_description')); ?>
<?php echo $form->textAreaGroup($model, 'large_description',
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
    'attribute' => 'short_description')); ?>
<?php echo $form->textAreaGroup($model, 'short_description',
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
<?php echo $form->fileFieldGroup($model, 'recipeImg1', array(
    'wrapperHtmlOptions' => array(
        'class' => 'col-sm-5',
    ),
    'append' => CHtml::image($model->_large_image->getFileUrl('normal'), '', array('width' => '100px')),
    'hint' => t('The image dimensions are') . ' 1036x575px'
));
echo $form->textFieldGroup($model, 'large_image',
    array(
        'wrapperHtmlOptions' => array(
            'class' => 'col-sm-5',
        ),// 'hint' => t('Please, insert large_image'),
        'append' => 'Text',
    )
); ?>
<?php echo $form->fileFieldGroup($model, 'recipeImg2', array(
    'wrapperHtmlOptions' => array(
        'class' => 'col-sm-5',
    ),
    'append' => CHtml::image($model->_thumb_image->getFileUrl('normal'), '', array('width' => '100px')),
    'hint' => t('The image dimensions are') . ' 381x272px'
));
echo $form->textFieldGroup($model, 'thumb_image',
    array(
        'wrapperHtmlOptions' => array(
            'class' => 'col-sm-5',
        ),// 'hint' => t('Please, insert thumb_image'),
        'append' => 'Text',
    )
); ?>
<?php echo $form->urlFieldGroup($model, 'youtube_video',
    array(
        'wrapperHtmlOptions' => array(
            'class' => 'col-sm-5',
        ),//'hint' => t('Please, insert youtube_video'),
        'append' => 'http://'
    )
); ?>
<?php echo $form->dropDownListGroup($model, 'category',
    array(
        'wrapperHtmlOptions' => array(
            'class' => 'col-sm-5',
        ),
        'widgetOptions' => array(
            'data' => GxHtml::listDataEx(ArticleCategory::model()->findAll()),
            // 'htmlOptions' => array('multiple' => true),
        ),
        // 'hint' => t('Please, select category'),
        'prepend' => 'Select',
        'append' => CHtml::link(t('Add new'), '/theme/articleCategory/create', array('combo_id' => 'Article_category', 'model' => 'ArticleCategory', 'class' => 'various', 'data-fancybox-type' => 'iframe'))
        //'append' => '<a href="/theme/articleCategory/create">'.t("Add new"). '</a>'
    )
); ?>

<?php $model->seoFormWidget($form); ?>


<div class='form-actions'><a href='<?php echo app()->request->urlReferrer; ?>' class='btn btn-default'><span
            class='glyphicon glyphicon-arrow-left'></span><?php echo t('Back'); ?></a> <?php $this->widget(
        'application.extensions.bootstrap.widgets.TbButton',
        array(
            'buttonType' => 'submit',
            'context' => 'primary',
            'icon' => 'glyphicon glyphicon-saved',
            'label' => t('Save item')
        )
    ); ?>
    <?php
    if ($this->action->id != 'update') {
        $this->widget(
            'application.extensions.bootstrap.widgets.TbButton',
            array(
                'buttonType' => 'reset',
                'context' => 'warning',
                'icon' => 'glyphicon glyphicon-remove',
                'label' => t('Reset form')
            )
        );
    } ?>
    <?php $this->endWidget(); ?>
    <?php if (isset($model->id)) {
        // echo CHtml::link(t(TbHtml::icon('glyphicon glyphicon-remove'). 'Remove item'),array('delete','id'=>$model->id),array('class'=>'btn btn-danger'));
    } ?></div>