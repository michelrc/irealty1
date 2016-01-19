<?php
/**
 * The following code was generated automatically using GiixCrudCode
 * This generator was improve by iReevo Team
 */
?>

<?php

$this->title = $model->adminNames[3];
$this->breadcrumbs = array(
    $model->adminNames[3],
);

?>

<?php $this->widget('application.extensions.bootstrap.widgets.TbGridView', array(
    'id' => 'language-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        array(
            'class' => 'application.extensions.bootstrap.widgets.TbEditableColumn',
            'name' => 'name',
            'sortable' => true,
            'editable' => array(
                'type' => 'text',
                'url' => array('updateAttribute', 'model' => get_class($model)),
                'placement' => 'right',
                'inputclass' => 'span3',
                'success' => "js: function(response, newValue) {
                    if (!response.success)
                        $('#success').modal('toggle');
                        setTimeout(function(){
                            $('#success').modal('toggle');
                        }, 2000);
                }",
            )
        ),
        array(
            'class' => 'application.extensions.bootstrap.widgets.TbEditableColumn',
            'name' => 'enable',
            'value' => '($data->enable == 0) ? Yii::t(\'app\', \'No\') : Yii::t(\'app\', \'Yes\')',
            'filter' => array('0' => t('No'), '1' => t('Yes')),
            'sortable' => true,
            'editable' => array(
                'type' => 'select',
                'url' => array('updateAttribute', 'model' => get_class($model)),
                'source' => array('0' => t('No'), '1' => t('Yes')),
                'success' => "js: function(response, newValue) {
                    if (!response.success)
                        $('#success').modal('toggle');
                        setTimeout(function(){
                            $('#success').modal('toggle');
                        }, 2000);
                }",
            )
        ),
        array(
            'class' => 'application.extensions.bootstrap.widgets.TbEditableColumn',
            'name' => 'isDefault',
            'value' => '($data->isDefault == 0) ? Yii::t(\'app\', \'No\') : Yii::t(\'app\', \'Yes\')',
            'filter' => array('0' => t('No'), '1' => t('Yes')),
            'sortable' => true,
            'editable' => array(
                'type' => 'select',
                'url' => array('updateAttribute', 'model' => get_class($model)),
                'source' => array('0' => t('No'), '1' => t('Yes')),
                'success' => "js: function(response, newValue) {
                    if (!response.success)
                        $('#success').modal('toggle');
                        setTimeout(function(){
                            $('#success').modal('toggle');
                        }, 2000);
                }",
            )
        ),
        array(
            'class' => 'application.extensions.bootstrap.widgets.TbButtonColumn',
        ),
    ),
)); ?>

<div class="form-actions">
    <?php echo CHtml::link(t(TbHtml::icon('glyphicon glyphicon-plus') . 'Add item'), array('create'), array('class' => 'btn btn-default')); ?></div>

<div id="success" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <p><?php echo t('The data was save with success'); ?></p>
            </div>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>