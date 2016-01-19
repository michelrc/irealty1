
<?php
/**
 * The following code was generated automatically using GiixCrudCode
 * This generator was improve by iReevo Team
 */
 ?>

<?php

$this->title = $model->adminNames[3];
$this->breadcrumbs = array(
    $model->adminNames[3],Yii::t('sideMenu', 'Property default image'));

?>

<?php $this->widget('application.extensions.bootstrap.widgets.TbGridView', array(
	'id' => 'property-default-image-grid',
	'dataProvider' => $model->search(),
	//'filter' => $model,
	'columns' => array(
		
                        array(
                                'class' => 'application.extensions.bootstrap.widgets.TbImageColumn',
                                'header' => t('Image'),
                                'imagePathExpression' => '$data->_image->getFileUrl("normal")',
                                'imageOptions'=>array('width'=>'100px')
                            )
                    ,
		array(
            'class'=>'application.extensions.bootstrap.widgets.TbButtonColumn',
            'afterDelete'=> 'function(link,success,data){ if(success) $(document).attr("location", $(document).attr("location")); }',
            'buttons'=>array('delete'=>array('visible'=>(user()->isAdmin) ? 'true':'false'))
		),
	),
)); ?>

<div class="form-actions">
<?php if($model->count() < 1): ?>
    <p><?php echo t('Up to')?> 1 <?php echo t('row(s)')?>.</p>
<?php if(user()->isAdmin):?>

    <?php echo CHtml::link(TbHtml::icon('glyphicon glyphicon-plus'). t('Add item'),array('create'),array('class'=>'btn btn-default'));?>
<?php endif?>
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

