
<?php
/**
 * The following code was generated automatically using GiixCrudCode
 * This generator was improve by iReevo Team
 */
 ?>

<?php
$this->breadcrumbs = array(
        $model->adminNames[3] ,Yii::t('sideMenu', 'Article list')   => array('admin'),
    t('View'),
);


$this->title = Yii::t('YcmModule.ycm',
    'View {name}',
    array('{name}'=>t("Article"))
);

?>

<?php $this->widget('application.extensions.bootstrap.widgets.TbEditableDetailView', array(
	'data' => $model,
    'id'=>'view-table',
	'attributes' => array(
array(
				    'class' => 'application.extensions.bootstrap.widgets.TbEditableColumn',
					'name' => 'title',
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
					'name' => 'author',
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
					'name' => 'date',
					'sortable' => false,
					'editable' => array(
                            'type'=>'date',
                            'url' => array('/ycm/model/updateAttribute', 'model' => get_class($model)),
                            'placement' => 'right',
                             'success' => "js: function(response, newValue) {
                    if (!response.success)
                        $('#success').modal('toggle');
                        setTimeout(function(){
                            $('#success').modal('toggle');
                        }, 2000);
                }",
                            'format' => 'yyyy-mm-dd',
                            'viewformat' => 'mm/dd/yyyy',
                            'options' => array(
                                'datepicker' => array(
                                    'language' => 'en'
                                ),
                        )
					)),
array(
				    'class' => 'application.extensions.bootstrap.widgets.TbEditableColumn',
					'name' => 'large_description',
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
					'name' => 'short_description',
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
                            'label' => t('Large Image'),
                            'type' => 'raw',
                            'value' => CHtml::image($model->_large_image->getFileUrl('normal'), '', array('width'=> '100px')),
                        )
                ,

                    array(
                            'label' => t('Thumbnail image'),
                            'type' => 'raw',
                            'value' => CHtml::image($model->_thumb_image->getFileUrl('normal'), '', array('width'=> '100px')),
                        )
                ,
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
			'label' =>  $model->getAttributeLabel('category'),
			'type' => 'raw',
			'value' => $model->category0 !== null ? CHtml::link(CHtml::encode(GxHtml::valueEx($model->category0)), array('articleCategory/view', 'id' => GxActiveRecord::extractPkValue($model->category0, true)),array('class'=> 'btn btn-primary btn-small')) : null,
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