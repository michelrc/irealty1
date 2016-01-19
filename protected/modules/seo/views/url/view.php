<?php
/**
 * The following code was generated automatically using GiixCrudCode
 * This generator was improve by iReevo Team
 */
?>

<?php
$this->breadcrumbs = array(
    $model->adminNames[3] => array('admin'),
    Yii::t('admin', 'View'),
);


$this->title = Yii::t('admin',
    'View {name}',
    array('{name}' => $model->adminNames[3])
);

?>

<?php $this->widget('application.extensions.bootstrap.widgets.TbEditableDetailView', array(
    'data' => $model,
    'id' => 'view-table',
    'attributes' => array(
        array(
            'class' => 'bootstrap.widgets.TbEditableColumn',
            'name' => 'route',
            'sortable' => false,
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
            'sortable' => false,
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
        /*array(
            'class' => 'bootstrap.widgets.TbEditableColumn',
            'name' => 'str_params',
            'sortable' => false,
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
        ),*/
        /*array(
            'class' => 'bootstrap.widgets.TbEditableColumn',
            'name' => 'urlSuffix',
            'sortable' => false,
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
        ),*/
        /*array(
            'class' => 'bootstrap.widgets.TbEditableColumn',
            'name' => 'defaultParams',
            'sortable' => false,
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
        ),*/
        /*array(
            'class' => 'bootstrap.widgets.TbEditableColumn',
            'name' => 'matchValue',
            'sortable' => false,
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
        ),*/
       /* array(
            'class' => 'bootstrap.widgets.TbEditableColumn',
            'name' => 'verb',
            'sortable' => false,
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
        ),*/
        /*array(
            'class' => 'bootstrap.widgets.TbEditableColumn',
            'name' => 'parsingOnly',
            'sortable' => false,
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
        ),*/
        /*array(
            'class' => 'bootstrap.widgets.TbEditableColumn',
            'name' => 'references',
            'sortable' => false,
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
            'name' => 'routePattern',
            'sortable' => false,
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
            'name' => 'template',
            'sortable' => false,
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
            'name' => 'append',
            'sortable' => false,
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
            'name' => 'hasHostInfo',
            'sortable' => false,
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
        ),*/
        /*array(
            'class' => 'bootstrap.widgets.TbEditableColumn',
            'name' => 'order',
            'sortable' => false,
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
        ),*/
    ),
)); ?>

<?php $model->seoViewWidget(); ?>

    <div class="form-actions" style="text-align: right">
        <a href='<?php echo app()->request->urlReferrer ?>' class='btn btn-default'><span
                class='glyphicon glyphicon-arrow-left'></span><?php echo Yii::t('admin', 'Back'); ?>
        </a><?php // echo CHtml::link(Yii::t('admin',TbHtml::icon('glyphicon glyphicon-briefcase'). 'Manage item'),array('admin'),array('class'=>'btn btn-default'));?><?php echo CHtml::link(Yii::t('admin', TbHtml::icon('glyphicon glyphicon-saved') . 'Update item'), array('update', 'id' => $model->id), array('class' => 'btn btn-primary')); ?><?php if (user()->isAdmin): ?>
            <?php echo CHtml::link(Yii::t('admin', TbHtml::icon('glyphicon glyphicon-remove') . 'Remove item'), array('delete', 'id' => $model->id), array('class' => 'btn btn-danger delete')); ?><?php endif ?>
    </div>

    <div id="success" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <p><?php echo Yii::t('admin', 'Data was saved with success') ?></p>
                </div>

            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
<?php
$text = Yii::t('admin', 'Are you sure you want to delete this item?');
$js = <<< JS
    $('.delete').on('click',function(){
        if(confirm("$text"))
            return true;
        else
            return false;
        })
JS;
cs()->registerScript('delete_confirm', $js, CClientScript::POS_READY);
?>