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
    'id' => 'i18n-source-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(

        array(
            'class' => 'application.extensions.bootstrap.widgets.TbEditableColumn',
            'name' => 'category',
            'filter' => GxHtml::listDataEx(I18nCategory::model()->findAllAttributes(null, true)),
            'sortable' => true,
            'editable' => array(
                'type' => 'select',
                'url' => array('updateAttribute', 'model' => get_class($model)),
                'source' => GxHtml::listDataEx(I18nCategory::model()->findAllAttributes(null, true)),
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
            'name' => 'message',
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
            'class' => 'application.extensions.bootstrap.widgets.TbButtonColumn',
            'template' => '{translate} {view} {update} {delete}',
            'buttons' => array(
                'translate' => array(
                    'url' => 'array("translate", "id"=>$data->primaryKey)',
                    'icon' => 'glyphicon glyphicon-globe',
                    'label' => 'Translate'
                )
            )
        ),
    ),
)); ?>

<div class="form-actions">
    <?php echo CHtml::link(TbHtml::icon('glyphicon glyphicon-plus'). Yii::t('labels', 'Add item'), array('create'), array('class' => 'btn btn-default')); ?></div>

<div id="success" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <p><?php echo Yii::t('messages','The data was save with success'); ?></p>
            </div>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>