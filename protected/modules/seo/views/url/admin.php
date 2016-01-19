<?php
/**
 * The following code was generated automatically using GiixCrudCode
 * This generator was improve by iReevo Team
 */
?>

<?php

$this->title = $model->adminNames[3];
$this->breadcrumbs = array(
    $model->adminNames[3]);

?>

<?php $this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'seo-url-rule-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        array(
            'class' => 'bootstrap.widgets.TbEditableColumn',
            'name' => 'route',
            'sortable' => true,
            'editable' => array(
                'type' => 'text',
                'apply' => true,
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
            'class' => 'bootstrap.widgets.TbEditableColumn',
            'name' => 'caseSensitive',
            'value' => '($data->caseSensitive == 0) ? Yii::t("admin", "No") : Yii::t("admin", "Yes")',
            'filter' => array('0' => Yii::t('admin', 'No'), '1' => Yii::t('admin', 'Yes')),
            'sortable' => true,
            'editable' => array(
                'type' => 'select',
                'apply' => true,
                'url' => array('updateAttribute', 'model' => get_class($model)),
                'source' => array('0' => Yii::t('admin', 'No'), '1' => Yii::t('admin', 'Yes')),
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
            'class' => 'bootstrap.widgets.TbEditableColumn',
            'name' => 'modelClassName',
            'sortable' => false,
            'editable' => array(
                'type' => 'text',
                'apply' => false,
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
            'class' => 'bootstrap.widgets.TbEditableColumn',
            'name' => 'urlSuffix',
            'sortable' => true,
            'editable' => array(
                'type' => 'text',
                'apply' => true,
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
            'buttons' => array('delete' => array('visible' => (user()->isAdmin) ? 'true' : 'false')),
            'htmlOptions' => array('class' => 'action-column'),
            'headerHtmlOptions' => array('class' => 'action-column'),
            'footerHtmlOptions' => array('class' => 'action-column'),
            'deleteConfirmation' => Yii::t('admin', 'Are you sure want to delete this item'),
            'header' => Yii::t('admin', 'Actions'),
        ),
    ),
)); ?>

<div class="form-actions">


    <?php if (user()->isAdmin): ?>

        <?php echo CHtml::link(Yii::t('admin', TbHtml::icon('glyphicon glyphicon-plus') . 'Add item'), array('create'), array('class' => 'btn btn-default')); ?>
    <?php endif ?>
</div>
<div id="success" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <p><?php echo Yii::t('admin', 'The data was save with success'); ?></p>
            </div>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

