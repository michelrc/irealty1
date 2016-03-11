<?php
/**
 * The following code was generated automatically using GiixCrudCode
 * This generator was improve by iReevo Team
 */
?>

<?php

$this->title = $model->adminNames[3];
$this->breadcrumbs = array(
    $model->adminNames[3], Yii::t('sideMenu', 'Testimonials list'));

?>

<?php $this->widget('application.extensions.bootstrap.widgets.TbGridView', array(
    'id' => 'testimonials-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(

        array(
            'class' => 'application.extensions.bootstrap.widgets.TbImageColumn',
            'header' => t('Photo'),
            'imagePathExpression' => '$data->_photo->getFileUrl("normal")',
            'imageOptions' => array('width' => '100px')
        )
    ,
        array(
            'class' => 'application.extensions.bootstrap.widgets.TbEditableColumn',
            'name' => 'text',
            'sortable' => false,
            'editable' => array(
                'type' => 'textarea',
                'url' => array('/ycm/model/updateAttribute', 'model' => get_class($model)),
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
            'name' => 'author_name',
            'sortable' => false,
            'editable' => array(
                'type' => 'text',
                'url' => array('/ycm/model/updateAttribute', 'model' => get_class($model)),
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
            'name' => 'company_name',
            'sortable' => false,
            'editable' => array(
                'type' => 'text',
                'url' => array('/ycm/model/updateAttribute', 'model' => get_class($model)),
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
            'name'=>'active',
            'value'=>'$data->getStatus($data->active)',
            'sortable' => false,
            'filter'=> $model->statusFilter()
        ),
        array(
            'class' => 'application.extensions.bootstrap.widgets.TbButtonColumn',
            'afterDelete' => 'function(link,success,data){ if(success) $(document).attr("location", $(document).attr("location")); }',
            'buttons' => array('delete' => array('visible' => (user()->isAdmin) ? 'true' : 'false'))
        ),
    ),
)); ?>

<div class="form-actions">


    <?php if (user()->isAdmin): ?>

        <?php echo CHtml::link(TbHtml::icon('glyphicon glyphicon-plus') . t('Add item'), array('create'), array('class' => 'btn btn-default')); ?>
    <?php endif ?>
</div>
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

