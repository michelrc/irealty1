
<?php
/**
 * The following code was generated automatically using GiixCrudCode
 * This generator was improve by iReevo Team
 */
 ?>

<?php

$this->widget('application.extensions.bootstrap.widgets.TbGridView', array(
	'id' => 'rent-list-page-top-image-grid',
	'dataProvider' => $model->search(),
	//'filter' => $model,
	'columns' => array(
		
                        array(
                                'class' => 'application.extensions.bootstrap.widgets.TbImageColumn',
                                'header' => t('Top image'),
                                'imagePathExpression' => '$data->_top_image->getFileUrl("normal")',
                                'imageOptions'=>array('width'=>'100px')
                            )
                    ,
		array(
            'class'=>'application.extensions.bootstrap.widgets.TbButtonColumn',
//            'afterDelete'=> 'function(link,success,data){ if(success) $(document).attr("location", $(document).attr("location")); }',
            'buttons'=>array(
                        'update' => array('url' => 'array("/theme/rentListPageTopImage/update", "id"=>$data->primaryKey, "blank" => 1)',
                                  'options' => array('class' => 'various', 'data-fancybox-type' => 'iframe', 'grid' => 'rent-list-page-top-image-grid')),
                        'delete'=>array('visible'=>(user()->isAdmin) ? 'true':'false',
                        'url' => 'array("/theme/rentListPageTopImage/delete", "id"=>$data->primaryKey)'
                            ),
                        'view' => array('visible' => 'false')
                )
		),
	),
)); ?>

<div class="form-actions">


<?php if(user()->isAdmin):?>

    <?php echo CHtml::link(TbHtml::icon('glyphicon glyphicon-plus'). t('Add item'),array('/theme/rentListPageTopImage/create?blank=1'),array('class'=>'btn btn-default various', 'data-fancybox-type' => 'iframe', 'grid' => 'rent-list-page-top-image-grid'));?>
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

