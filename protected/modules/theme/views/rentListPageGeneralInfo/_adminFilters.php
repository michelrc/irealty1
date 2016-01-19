
<?php
/**
 * The following code was generated automatically using GiixCrudCode
 * This generator was improve by iReevo Team
 */
 ?>

<?php $this->widget('application.extensions.bootstrap.widgets.TbGridView', array(
	'id' => 'rent-list-page-filter-config-grid',
	'dataProvider' => $model->search(),
	//'filter' => $model,
	'columns' => array(
		array('name'=> 'first_price',
                  'sortable' => false)
                  ,
		array('name'=> 'last_price',
                  'sortable' => false)
                  ,
		array(
            'class'=>'application.extensions.bootstrap.widgets.TbButtonColumn',
//            'afterDelete'=> 'function(link,success,data){ if(success) $(document).attr("location", $(document).attr("location")); }',
            'buttons'=>array(
                'update' => array('url' => 'array("/theme/rentListPageFilterConfig/update", "id"=>$data->primaryKey, "blank" => 1)',
                                  'options' => array('class' => 'various', 'data-fancybox-type' => 'iframe', 'grid' => 'rent-list-page-filter-config-grid')),
                'delete'=>array('visible'=>(user()->isAdmin) ? 'true':'false',
                                'url' => 'array("/theme/rentListPageFilterConfig/delete", "id"=>$data->primaryKey)'
                            ),
                'view' => array('visible' => 'false')
            )
		),
	),
)); ?>

<div class="form-actions">



<?php if(user()->isAdmin):?>

    <?php echo CHtml::link(TbHtml::icon('glyphicon glyphicon-plus'). t('Add item'),array('/theme/rentListPageFilterConfig/create?blank=1'),array('class'=>'btn btn-default various', 'data-fancybox-type' => 'iframe', 'grid' => 'rent-list-page-filter-config-grid'));?>
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

