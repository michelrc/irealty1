
<?php
/**
 * The following code was generated automatically using GiixCrudCode
 * This generator was improve by iReevo Team
 */
 ?>

<?php
$this->breadcrumbs = array(
        $model->adminNames[3] ,Yii::t('sideMenu', 'List properties')   => array('admin'),
    t('View'),
);


$this->title = Yii::t('YcmModule.ycm',
    'View {name}',
    array('{name}'=>t("List properties"))
);

?>

<?php $this->widget('application.extensions.bootstrap.widgets.TbEditableDetailView', array(
	'data' => $model,
    'id'=>'view-table',
	'attributes' => array(

                    array(
                            'label' => t('Banner image'),
                            'type' => 'raw',
                            'value' => CHtml::image($model->_banner_image->getFileUrl('normal'), '', array('width'=> '100px')),
                        )
                ,
array(
				    'class' => 'application.extensions.bootstrap.widgets.TbEditableColumn',
					'name' => 'banner_title',
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
					'name' => 'name',
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
			'label' =>  $model->getAttributeLabel('category'),
			'type' => 'raw',
			'value' => $model->category0 !== null ? CHtml::link(CHtml::encode(GxHtml::valueEx($model->category0)), array('propertyCategory/view', 'id' => GxActiveRecord::extractPkValue($model->category0, true)),array('class'=> 'btn btn-primary btn-small')) : null,
			),
array(
				    'class' => 'application.extensions.bootstrap.widgets.TbEditableColumn',
					'name' => 'description',
					'sortable' => false,
					'editable' => array(
                            'type'=>'textarea',
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
                    'name' => 'price',
                    'editable' => array(
                            'type'=>'number',
                            'placement' => 'right',
                            'inputclass' => 'span3 currency',
                            'url' => array('/ycm/model/updateAttribute', 'model' => get_class($model)),
                            'success' => "js: function(response, newValue) {
                    if (!response.success)
                        $('#success').modal('toggle');
                        setTimeout(function(){
                            $('#success').modal('toggle');
                        }, 2000);
                }"
                        )
                    ),
array(
			'label' =>  $model->getAttributeLabel('condition'),
			'type' => 'raw',
			'value' => $model->condition0 !== null ? CHtml::link(CHtml::encode(GxHtml::valueEx($model->condition0)), array('propertyCondition/view', 'id' => GxActiveRecord::extractPkValue($model->condition0, true)),array('class'=> 'btn btn-primary btn-small')) : null,
			),
array(
				    'class' => 'application.extensions.bootstrap.widgets.TbEditableColumn',
					'name' => 'address',
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
			'label' =>  $model->getAttributeLabel('province'),
			'type' => 'raw',
			'value' => $model->province0 !== null ? CHtml::link(CHtml::encode(GxHtml::valueEx($model->province0)), array('province/view', 'id' => GxActiveRecord::extractPkValue($model->province0, true)),array('class'=> 'btn btn-primary btn-small')) : null,
			),
array(
                    'class' => 'application.extensions.bootstrap.widgets.TbEditableColumn',
                    'name' => 'area',
                    'editable' => array(
                            'type'=>'number',
                            'placement' => 'right',
                            'inputclass' => 'span3 currency',
                            'url' => array('/ycm/model/updateAttribute', 'model' => get_class($model)),
                            'success' => "js: function(response, newValue) {
                    if (!response.success)
                        $('#success').modal('toggle');
                        setTimeout(function(){
                            $('#success').modal('toggle');
                        }, 2000);
                }"
                        )
                    ),
array(
                'class' => 'application.extensions.bootstrap.widgets.TbEditableColumn',
                'name' => 'rooms',
                'editable' => array(
                    'type'=>'select',
                    'placement' => 'right',
                    'inputclass' => 'span3',
                    'url' => array('/ycm/model/updateAttribute', 'model' => get_class($model)),
                    'source' => array(1=>1,2=>2,3=>3,4=>4,5=>5),
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
                'name' => 'bathroom',
                'editable' => array(
                    'type'=>'select',
                    'placement' => 'right',
                    'inputclass' => 'span3',
                    'url' => array('/ycm/model/updateAttribute', 'model' => get_class($model)),
                    'source' => array(1=>1,2=>2,3=>3,4=>4,5=>5,6=>6,7=>7,8=>8,9=>9,10=>10),
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
					'name' => 'best_tips',
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
			'label' =>  $model->getAttributeLabel('agent'),
			'type' => 'raw',
			'value' => $model->agent0 !== null ? CHtml::link(CHtml::encode(GxHtml::valueEx($model->agent0)), array('agent/view', 'id' => GxActiveRecord::extractPkValue($model->agent0, true)),array('class'=> 'btn btn-primary btn-small')) : null,
			),
array(
			'label' =>  $model->getAttributeLabel('type'),
			'type' => 'raw',
			'value' => $model->type0 !== null ? CHtml::link(CHtml::encode(GxHtml::valueEx($model->type0)), array('propertyType/view', 'id' => GxActiveRecord::extractPkValue($model->type0, true)),array('class'=> 'btn btn-primary btn-small')) : null,
			),
array(
				    'class' => 'application.extensions.bootstrap.widgets.TbEditableColumn',
					'name' => 'exalted',
					'editable' => array(
                            'type'=>'select',
                            'url' => array('/ycm/model/updateAttribute', 'model' => get_class($model)),
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
					'name' => 'youtube_video',
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
                    'name' => 'map_longitude',
                    'editable' => array(
                            'type'=>'number',
                            'placement' => 'right',
                            'inputclass' => 'span3 currency',
                            'url' => array('/ycm/model/updateAttribute', 'model' => get_class($model)),
                            'success' => "js: function(response, newValue) {
                    if (!response.success)
                        $('#success').modal('toggle');
                        setTimeout(function(){
                            $('#success').modal('toggle');
                        }, 2000);
                }"
                        )
                    ),
array(
                    'class' => 'application.extensions.bootstrap.widgets.TbEditableColumn',
                    'name' => 'map_latitude',
                    'editable' => array(
                            'type'=>'number',
                            'placement' => 'right',
                            'inputclass' => 'span3 currency',
                            'url' => array('/ycm/model/updateAttribute', 'model' => get_class($model)),
                            'success' => "js: function(response, newValue) {
                    if (!response.success)
                        $('#success').modal('toggle');
                        setTimeout(function(){
                            $('#success').modal('toggle');
                        }, 2000);
                }"
                        )
                    ),

	),
)); ?>
<?php $model->seoViewWidget(); ?>

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