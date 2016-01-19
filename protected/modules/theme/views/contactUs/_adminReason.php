
<?php
/**
 * The following code was generated automatically using GiixCrudCode
 * This generator was improve by iReevo Team
 */
 ?>


<?php $this->widget('application.extensions.bootstrap.widgets.TbGridView', array(
	'id' => 'contact-us-reason-grid',
	'dataProvider' => $model->search(),
	//'filter' => $model,
	'columns' => array(
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
					'name' => 'priority',
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
            'class'=>'application.extensions.bootstrap.widgets.TbButtonColumn',
//            'afterDelete'=> 'function(link,success,data){ if(success) $(document).attr("location", $(document).attr("location")); }',
            'buttons'=>array(
                'view'=>array('visible'=>'false'),
                'update' => array('visible'=>(user()->isAdmin) ? 'true':'false',
                                    'url' =>  'array("/theme/contactUsReason/update", "id"=>$data->primaryKey, "blank"=>1)',
                                    'options' => array('class' => 'various', 'data-fancybox-type' => 'iframe', 'grid' => 'home-page-why-shop-icons-grid'),
                        ),
                'delete'=>array('visible'=>(user()->isAdmin) ? 'true':'false',
                            'url' => 'array("/theme/contactUsReason/delete", "id"=>$data->primaryKey)',
                    )
            )
        ),
	),
)); ?>

<div class="form-actions">



<?php if(user()->isAdmin):?>

    <?php echo CHtml::link(TbHtml::icon('glyphicon glyphicon-plus'). t('Add item'),array('/theme/contactUsReason/create?blank=1'),array('class'=>'btn btn-default various', 'data-fancybox-type' => 'iframe', 'grid' => 'contact-us-reason-grid'));?>
<?php endif?>
</div>
<div id="success"  class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <p><?php echo t('The data was save with success');?></p>
            </div>

        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>

