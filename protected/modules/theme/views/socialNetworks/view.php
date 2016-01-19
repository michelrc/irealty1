
<?php
/**
 * The following code was generated automatically using GiixCrudCode
 * This generator was improve by iReevo Team
 */
 ?>

<?php
$this->breadcrumbs = array(
        $model->adminNames[3] ,Yii::t('sideMenu', 'Social networks')   => array('admin'),
    t('View'),
);


$this->title = Yii::t('YcmModule.ycm',
    'View Social networks',
    array('{name}'=>$model->adminNames[3])
);

?>

<?php $this->widget('application.extensions.bootstrap.widgets.TbEditableDetailView', array(
	'data' => $model,
    'id'=>'view-table',
	'attributes' => array(
array(
				    'class' => 'application.extensions.bootstrap.widgets.TbEditableColumn',
					'name' => 'facebook_link',
					'sortable' => false,
					'editable' => array(
                            'type'=>'text',
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
					'name' => 'twitter_link',
					'sortable' => false,
					'editable' => array(
                            'type'=>'text',
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
					'name' => 'google_plus_link',
					'sortable' => false,
					'editable' => array(
                            'type'=>'text',
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
					'name' => 'instagram_link',
					'sortable' => false,
					'editable' => array(
                            'type'=>'text',
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
	),
)); ?>

<div class="form-actions" style="text-align: right">
    <a href='<?php echo app()->request->urlReferrer;?>' class='btn btn-default'><span class='glyphicon glyphicon-arrow-left'></span><?php echo t('Back');?></a><?php // echo CHtml::link(TbHtml::icon('glyphicon glyphicon-briefcase'). t('Manage item'),array('admin'),array('class'=>'btn btn-default'));?><?php echo CHtml::link(TbHtml::icon('glyphicon glyphicon-saved'). t('Update item'),array('update','id'=>$model->id),array('class'=>'btn btn-primary'));?><?php if(user()->isAdmin):?>
<?php echo CHtml::link(TbHtml::icon('glyphicon glyphicon-remove'). t('Remove item'),array('delete','id'=>$model->id),array('class'=>'btn btn-danger delete'));?><?php endif?></div>

<div id="success"  class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <p><?php echo t('Data was saved with success');?></p>
            </div>

        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>

<script type="application/javascript">
    $(".delete").each(function(){
        $(this).removeClass("delete");
        $(this).addClass("delete_confirm");
    })
    jQuery(document).on('click','a.delete_confirm',function() {
    if(!confirm("<?php echo t('Are you sure you want to delete this item?') ?>")) return false;
        return true;
    })
</script>