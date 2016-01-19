<?php
/**
 * The following code was generated automatically using GiixCrudCode
 * This generator was improve by iReevo Team
 */
?>

<?php /** @var TbActiveForm $form */
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'seo-url-rule-form',
    'enableClientValidation' => true,

));
?>

<?php echo $form->textFieldGroup($model, 'route', array(
        'maxlength' => 1023,
        'wrapperHtmlOptions' => array(
            'class' => 'col-sm-5',
        ),

        'hint' => Yii::t('SeoUrlRule', 'The controller/action pair'),
        'append' => Yii::t('admin', 'Text')
    )
); ?>

<?php echo $form->checkboxGroup($model, 'isModelRule', array(
        'hint' => Yii::t('SeoUrlRule', 'Whether is a model route or a static route.'),
    )
); ?>

<div class="model-display">
    <?php echo $form->textFieldGroup($model, 'modelClassName',
        array(
            'wrapperHtmlOptions' => array(
                'class' => 'col-sm-5',
            ),
            'hint' => Yii::t('SeoUrlRule', 'Model Class Name to match rules against. Must be a seo aware model.'),
            'append' => Yii::t('admin', 'Model')
        )
    ); ?>

    <?php echo $form->textFieldGroup($model, 'primaryKeyParam',
        array(
            'wrapperHtmlOptions' => array(
                'class' => 'col-sm-5',
            ),
            'hint' => Yii::t('SeoUrlRule', 'Primary key param used to construct the model url.'),
            'append' => Yii::t('admin', 'Pk Name')
        )
    ); ?>
</div>

<?php echo $form->checkBoxGroup($model, 'caseSensitive'); ?>

<?php /*echo $form->textAreaGroup($model, 'str_params',
    array(
        'wrapperHtmlOptions' => array(
            'class' => 'col-sm-5',
        ),
        'hint' => Yii::t('SeoUrlRule', 'List of parameters (name=>regular expression)'),
        'append' => Yii::t('admin', 'Text')
    )
); */?><!--

<?php /*echo $form->textFieldGroup($model, 'urlSuffix', array(
        'maxlength' => 255,
        'wrapperHtmlOptions' => array(
            'class' => 'col-sm-5',
        ),

        'hint' => Yii::t('SeoUrlRule', 'The URL suffix used for this rule. For example, ".html" can be used so that the URL looks like pointing to a static HTML page'),
        'append' => Yii::t('admin', 'Text')
    )
); */?>

<?php /*echo $form->textFieldGroup($model, 'defaultParams',
    array(
        'wrapperHtmlOptions' => array(
            'class' => 'col-sm-5',
        ),
        'hint' => Yii::t('SeoUrlRule', 'The default GET parameters (name=>value) that this rule provides. When this rule is used to parse the incoming request, the values declared in this property will be injected into $_GET'),
        'append' => Yii::t('admin', 'Text')
    )
); */?>

<?php /*echo $form->checkBoxGroup($model, 'matchValue',
    array(
        'hint' => Yii::t('SeoUrlRule', 'Whether the GET parameter values should match the corresponding sub-patterns in the rule when creating a URL. Defaults to null, meaning using the value of {@link CUrlManager::matchValue}. When this property is false, it means a rule will be used for creating a URL if its route and parameter names match the given ones. If this property is set true, then the given parameter values must also match the corresponding parameter sub-patterns. Note that setting this property to true will degrade performance.'),
    )); */?>

<?php /*echo $form->dropDownListGroup($model, 'verb', array(
        'wrapperHtmlOptions' => array(
            'class' => 'col-sm-5',
        ),
        'widgetOptions' => array(
            'data' => array('' => '', 'GET' => 'GET', 'POST' => 'POST', 'PUT' => 'PUT', 'DELETE' => 'DELETE', 'PATCH' => 'PATCH'),
        ),
        'hint' => Yii::t('SeoUrlRule', 'The HTTP verb (e.g. GET, POST, DELETE) that this rule should match. If this property is not set, the rule can match any verb. Note that this property is only used when parsing a request. It is ignored for URL creation.'),
        'append' => Yii::t('admin', 'Select')
    )
); */?>

<?php /*echo $form->checkBoxGroup($model, 'parsingOnly',
    array(
        'hint' => Yii::t('SeoUrlRule', 'Whether this rule is only used for request parsing. Defaults to false, meaning the rule is used for both URL parsing and creation.'),
    )); */?>

<?php /*echo $form->textAreaGroup($model, 'references',
    array(
        'wrapperHtmlOptions' => array(
            'class' => 'col-sm-5',
        ),
        'hint' => Yii::t('SeoUrlRule', 'The mapping from route param name to token name (e.g. _r1=><1>)'),
        'append' => Yii::t('admin', 'Text')
    )
); */?>
<?php /*echo $form->textFieldGroup($model, 'routePattern', array(
        'maxlength' => 1023,
        'wrapperHtmlOptions' => array(
            'class' => 'col-sm-5',
        ),

        'hint' => Yii::t('SeoUrlRule', 'The pattern used to match route'),
        'append' => Yii::t('admin', 'Text')
    )
); */?>
<?php /*echo $form->textFieldGroup($model, 'template', array(
        'maxlength' => 1023,
        'wrapperHtmlOptions' => array(
            'class' => 'col-sm-5',
        ),

        'hint' => Yii::t('SeoUrlRule', 'Template used to construct a URL'),
        'append' => Yii::t('admin', 'Text')
    )
); */?>
<?php /*echo $form->checkBoxGroup($model, 'append',
    array(
        'hint' => Yii::t('SeoUrlRule', 'Whether the URL allows additional parameters at the end of the path info.'),
    )); */?>

<?php /*echo $form->checkBoxGroup($model, 'hasHostInfo',
    array(
        'hint' => Yii::t('SeoUrlRule', 'Whether host info should be considered for this rule.'),
    )); */?>

--><?php /*echo $form->textFieldGroup($model, 'order',
    array(
        'wrapperHtmlOptions' => array(
            'class' => 'col-sm-5',
        ),
        'hint' => Yii::t('admin', 'Please, insert ') . ' order',
        'append' => Yii::t('admin', 'Text')
    )
); */?>

<?php $model->seoFormWidget($form); ?>

<div class='form-actions'><a href='<?php echo app()->request->urlReferrer; ?>' class='btn btn-default'><span
            class='glyphicon glyphicon-arrow-left'></span><?php echo Yii::t('admin', 'Back'); ?>
    </a>   <?php $this->widget(
        'application.extensions.bootstrap.widgets.TbButton',
        array(
            'buttonType' => 'submit',
            'context' => 'primary',
            'icon' => 'glyphicon glyphicon-saved',
            'label' => Yii::t('admin', 'Save item')
        )
    ); ?>
    <?php
    if (Yii::app()->controller->action->id != 'update') {
        $this->widget(
            'application.extensions.bootstrap.widgets.TbButton',
            array(
                'buttonType' => 'reset',
                'context' => 'warning',
                'icon' => 'glyphicon glyphicon-remove',
                'label' => Yii::t('admin', 'Reset form')
            )
        );
    } ?>
    <?php $this->endWidget(); ?>

    <?php if (isset($model->id)) {
        // echo CHtml::link(Yii::t('admin',TbHtml::icon('glyphicon glyphicon-remove'). 'Remove item'),array('delete','id'=>$model->id),array('class'=>'btn btn-danger'));
    }?></div>