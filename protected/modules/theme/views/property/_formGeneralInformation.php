<?php $this->beginWidget('i18n.extensions.widgets.LanguageWidget', array(
    'model' => $model,
    'attribute' => 'name')); ?>
<?php echo $form->textFieldGroup($model, 'name', array(
        'maxlength' => 255,
        'wrapperHtmlOptions' => array(
            'class' => 'col-sm-5',
        ),
        'widgetOptions' => array(
            'htmlOptions' => array('value' => '{value}', 'name' => '{name}'),
        ),
        // 'hint' => t('Please, insert name'),
        'append' => 'Text'
    )
); ?>

<?php $this->endWidget(); ?>

<?php echo $form->fileFieldGroup($model, 'recipeImg2', array(
    'wrapperHtmlOptions' => array(
        'class' => 'col-sm-5',
    ),
    'append' => CHtml::image($model->_listing_image->getFileUrl('normal'), '', array('width' => '100px')),
    'hint' => t('The image dimensions are') . ' 379x275px'
));
$form->textFieldGroup($model, 'listing_image',
    array(
        'wrapperHtmlOptions' => array(
            'class' => 'col-sm-5',
        ),// 'hint' => t('Please, insert banner_image'),
        'append' => 'Text',
    )
); ?>

<?php echo $form->dropDownListGroup($model, 'category',
    array(
        'wrapperHtmlOptions' => array(
            'class' => 'col-sm-5',
        ),
        'widgetOptions' => array(
            'data' => GxHtml::listDataEx(PropertyCategory::model()->findAll()),
            // 'htmlOptions' => array('multiple' => true),
        ),
        // 'hint' => t('Please, select category'),
        'prepend' => 'Select',
        //                                 //'append' => CHtml::link(t('Add new'), '/theme/propertyCategory/create', array('class' => 'various', 'data-fancybox-type' => 'iframe'))
        //'append' => '<a href="/theme/propertyCategory/create">'.t("Add new"). '</a>'
    )
); ?>
<?php $this->beginWidget('i18n.extensions.widgets.LanguageWidget', array(
    'model' => $model,
    'attribute' => 'description')); ?>
<?php echo $form->textAreaGroup($model, 'description',
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
<?php echo $form->textFieldGroup($model, 'price',
    array(
        'wrapperHtmlOptions' => array(
            'class' => 'col-sm-5',
        ),
        'widgetOptions' => array(
            'htmlOptions' => array('class' => 'currency'),
        ),
        // 'hint' => t('Please, insert price'),
        'append' => '.00'
    )
); ?>
<?php echo $form->dropDownListGroup($model, 'condition',
    array(
        'wrapperHtmlOptions' => array(
            'class' => 'col-sm-5',
        ),
        'widgetOptions' => array(
            'data' => GxHtml::listDataEx(PropertyCondition::model()->findAll()),
            // 'htmlOptions' => array('multiple' => true),
        ),
        // 'hint' => t('Please, select condition'),
        'prepend' => 'Select',
        'append' => CHtml::link(t('Add new'), '/theme/propertyCondition/create?blank=1', array('combo_id' => 'Property_condition', 'model' => 'PropertyCondition', 'class' => 'various-combox', 'data-fancybox-type' => 'iframe'))
        //'append' => '<a href="/theme/propertyCondition/create">'.t("Add new"). '</a>'
    )
); ?>
<?php $this->beginWidget('i18n.extensions.widgets.LanguageWidget', array(
    'model' => $model,
    'attribute' => 'address')); ?>
<?php echo $form->textFieldGroup($model, 'address', array(
        'maxlength' => 255,
        'wrapperHtmlOptions' => array(
            'class' => 'col-sm-5',
        ),
        'widgetOptions' => array(
            'htmlOptions' => array('value' => '{value}', 'name' => '{name}'),
        ),
        // 'hint' => t('Please, insert address'),
        'append' => 'Text'
    )
); ?>

<?php $this->endWidget(); ?>
<?php echo $form->dropDownListGroup($model, 'province',
    array(
        'wrapperHtmlOptions' => array(
            'class' => 'col-sm-5',
        ),
        'widgetOptions' => array(
            'data' => GxHtml::listDataEx(Province::model()->findAll()),
            // 'htmlOptions' => array('multiple' => true),
        ),
        // 'hint' => t('Please, select province'),
        'prepend' => 'Select',
        //'append' => CHtml::link(t('Add new'), '/theme/province/create', array('combo_id' => 'Property_province', 'model' => 'Province', 'class' => 'various', 'data-fancybox-type' => 'iframe'))
        //'append' => '<a href="/theme/province/create">'.t("Add new"). '</a>'
    )
); ?>
<?php echo $form->textFieldGroup($model, 'area',
    array(
        'wrapperHtmlOptions' => array(
            'class' => 'col-sm-5',
        ),
        'widgetOptions' => array(
            'htmlOptions' => array('class' => 'currency'),
        ),
        // 'hint' => t('Please, insert area'),
        'append' => '.00'
    )
); ?>
<?php echo $form->dropDownListGroup($model, 'rooms',
    array(
        'wrapperHtmlOptions' => array(
            'class' => 'col-sm-5',
        ),
        'widgetOptions' => array(
            'data' => array(1 => 1, 2 => 2, 3 => 3, 4 => 4, 5 => 5),
            // 'htmlOptions' => array('multiple' => true),
        ),
        // 'hint' => t('Please, select rooms'),
        'prepend' => 'Select'
    )
); ?>
<?php echo $form->dropDownListGroup($model, 'bathroom',
    array(
        'wrapperHtmlOptions' => array(
            'class' => 'col-sm-5',
        ),
        'widgetOptions' => array(
            'data' => array(1 => 1, 2 => 2, 3 => 3, 4 => 4, 5 => 5, 6 => 6, 7 => 7, 8 => 8, 9 => 9, 10 => 10),
            // 'htmlOptions' => array('multiple' => true),
        ),
        // 'hint' => t('Please, select bathroom'),
        'prepend' => 'Select'
    )
); ?>
<?php $this->beginWidget('i18n.extensions.widgets.LanguageWidget', array(
    'model' => $model,
    'attribute' => 'best_tips')); ?>
<?php echo $form->textFieldGroup($model, 'best_tips', array(
        'maxlength' => 255,
        'wrapperHtmlOptions' => array(
            'class' => 'col-sm-5',
        ),
        'widgetOptions' => array(
            'htmlOptions' => array('value' => '{value}', 'name' => '{name}'),
        ),
        // 'hint' => t('Please, insert best_tips'),
        'append' => 'Text'
    )
); ?>
<?php $this->endWidget(); ?>
<?php echo $form->dropDownListGroup($model, 'agent',
    array(
        'wrapperHtmlOptions' => array(
            'class' => 'col-sm-5',
        ),
        'widgetOptions' => array(
            'data' => GxHtml::listDataEx(Agent::model()->findAll($criteria)),
            // 'htmlOptions' => array('multiple' => true),
        ),
        // 'hint' => t('Please, select agent'),
        'prepend' => 'Select',
        'append' => CHtml::link(t('Add new'), '/theme/agent/create?blank=1', array('combo_id' => 'Property_agent', 'model' => 'Agent', 'class' => 'various-combox', 'data-fancybox-type' => 'iframe'))
        //'append' => '<a href="/theme/agent/create">'.t("Add new"). '</a>'
    )
); ?>
<?php echo $form->dropDownListGroup($model, 'type',
    array(
        'wrapperHtmlOptions' => array(
            'class' => 'col-sm-5',
        ),
        'widgetOptions' => array(
            'data' => GxHtml::listDataEx(PropertyType::model()->findAll()),
            // 'htmlOptions' => array('multiple' => true),
        ),
        // 'hint' => t('Please, select type'),
        'prepend' => 'Select',
        'append' => CHtml::link(t('Add new'), '/theme/propertyType/create?blank=1', array('combo_id' => 'Property_type', 'model' => 'PropertyType', 'class' => 'various-combox', 'data-fancybox-type' => 'iframe'))
        //'append' => '<a href="/theme/propertyType/create">'.t("Add new"). '</a>'
    )
); ?>
<?php echo $form->checkBoxGroup($model, 'exalted'); ?>
<?php echo $form->urlFieldGroup($model, 'youtube_video',
    array(
        'wrapperHtmlOptions' => array(
            'class' => 'col-sm-5',
        ),//'hint' => t('Please, insert youtube_video'),
        'append' => 'http://'
    )
); ?>
<?php echo $form->textFieldGroup($model, 'map_longitude',
    array(
        'wrapperHtmlOptions' => array(
            'class' => 'col-sm-5',
        ),
        'widgetOptions' => array(//                    'htmlOptions' => array('class' => 'currency'),
        ),
        // 'hint' => t('Please, insert map_longitude'),
        'append' => '.00'
    )
); ?>
<?php echo $form->textFieldGroup($model, 'map_latitude',
    array(
        'wrapperHtmlOptions' => array(
            'class' => 'col-sm-5',
        ),
        'widgetOptions' => array(//                    'htmlOptions' => array('class' => 'currency'),
        ),
        // 'hint' => t('Please, insert map_latitude'),
        'append' => '.00'
    )
); ?>