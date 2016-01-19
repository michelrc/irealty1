<?php
$this->menu = array(
    array('htmlOptions' => array('title' => Yii::t('admin', 'Translations'), 'class' => 'btn-large tip-bottom'), 'url' => array('index'), 'icon' => 'th-list',),
);


$form = $this->beginWidget('application.extensions.bootstrap.widgets.TbActiveForm',
    array(
        'id' => 'translation-form',
    )
);
?>


<div class="row-fluid">
    <div class="span12">
        <?php $this->beginWidget('application.extensions.bootstrap.widgets.TbBox', array(
            'title' => Yii::t('app', "Source: "),
        ))?>
        <pre><?php echo CHtml::encode($model->message) ?></pre>
        <?php $this->endWidget() ?>

    </div>
</div>
<div class="row-fluid">
    <div class="span12">
        <?php $this->beginWidget('application.extensions.bootstrap.widgets.TbBox', array(
            'title' => Yii::t('app', "Translations: "),
            'headerIcon' => 'globe'
        ))?>

        <?php
        $this->beginWidget('MessageWidget', array(
            'model' => $model,
            'attribute' => 'translation'
        ));
        ?>

        <?php echo CHtml::textArea('translation[{lang}]', '{value}', array('rows' => 10, 'cols' => 100, 'class' => 'span7')) ?>

        <?php $this->endWidget(); ?>


        <?php $this->endWidget() ?>
    </div>

    <div class='form-actions'><a href='<?php echo app()->request->urlReferrer; ?>' class='btn btn-default'><span
                class='glyphicon glyphicon-arrow-left'></span><?php echo t('Back'); ?></a>   <?php $this->widget(
            'application.extensions.bootstrap.widgets.TbButton',
            array(
                'buttonType' => 'submit',
                'context' => 'primary',
                'icon' => 'glyphicon glyphicon-saved',
                'label' => t('Save item')
            )
        ); ?>
        <?php $this->widget(
            'application.extensions.bootstrap.widgets.TbButton',
            array(
                'buttonType' => 'reset',
                'context' => 'warning',
                'icon' => 'glyphicon glyphicon-remove',
                'label' => t('Reset form')
            )
        ); ?>
    </div>

</div>

<?php $this->endWidget() ?>







