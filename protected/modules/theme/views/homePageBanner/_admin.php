
<?php
/**
 * The following code was generated automatically using GiixCrudCode
 * This generator was improve by iReevo Team
 */
 ?>

<?php $this->widget('application.extensions.bootstrap.widgets.TbGridView', array(
	'id' => 'home-page-banner-grid',
	'dataProvider' => $model->search(),
	//'filter' => $model,
	'columns' => array(
		
                        array(
                                'class' => 'application.extensions.bootstrap.widgets.TbImageColumn',
                                'header' => t('Banner image'),
                                'imagePathExpression' => '$data->_image->getFileUrl("normal")',
                                'imageOptions'=>array('width'=>'100px')
                            )
                    ,
		array(
            'class'=>'application.extensions.bootstrap.widgets.TbButtonColumn',
            //'afterDelete'=> 'function(link,success,data){ if(success) $(document).attr("location", $(document).attr("location")); }',
            'buttons'=>array(
                    'delete'=>array('visible'=>(user()->isAdmin) ? 'true':'false'),
                    'view' =>array('visible' => 'false'),
                    'update' =>array('visible' => 'false')
            )
		),
	),
)); ?>

<div class="form-actions">


<?php if(user()->isAdmin):?>
    <?php echo CHtml::link(TbHtml::icon('glyphicon glyphicon-plus'). t('Add item'), array('createItem'), array('class' => 'btn btn-default various', 'grid' => 'home-page-banner-grid', 'data-fancybox-type' => 'iframe'))?>
<!--    --><?php //echo CHtml::link(TbHtml::icon('glyphicon glyphicon-plus'). t('Add item'),array('create'),array('class'=>'btn btn-default'));?>
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
