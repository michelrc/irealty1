
<?php
/**
 * The following code was generated automatically using GiixCrudCode
 * This generator was improve by iReevo Team
 */
 ?>

<?php

$this->title = $model->adminNames[3];
$this->breadcrumbs = array(
    $model->adminNames[3],Yii::t('sideMenu', 'Property/Amenities'));

?>

<?php $this->widget('application.extensions.bootstrap.widgets.TbGridView', array(
	'id' => 'property-amenitie-grid',
	'dataProvider' => $model->search(),
	'filter' => $model,
	'columns' => array(
		array(
				'name'=>'amenitie_id',
				'value'=>'GxHtml::valueEx($data->amenitie)',
				'filter'=>GxHtml::listDataEx(Amenitie::model()->findAll()),
				),
		array(
				'name'=>'property_id',
				'value'=>'GxHtml::valueEx($data->property)',
				'filter'=>GxHtml::listDataEx(Property::model()->findAll()),
				),
		array(
				    'class' => 'application.extensions.bootstrap.widgets.TbEditableColumn',
					'name' => 'relevant',
					'value' => '($data->relevant == 0) ? Yii::t(\'app\', \'No\') : Yii::t(\'app\', \'Yes\')',
					'filter' => array('0' => t('No'), '1' => t('Yes')),
					'sortable' => false,
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
            'class'=>'application.extensions.bootstrap.widgets.TbButtonColumn',
            'afterDelete'=> 'function(link,success,data){ if(success) $(document).attr("location", $(document).attr("location")); }',
            'buttons'=>array('delete'=>array('visible'=>(user()->isAdmin) ? 'true':'false'))
		),
	),
)); ?>

<div class="form-actions">




<?php if(user()->isAdmin):?>

    <?php echo CHtml::link(TbHtml::icon('glyphicon glyphicon-plus'). t('Add item'),array('create'),array('class'=>'btn btn-default'));?>
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

<script>
    $(document).ready(function () {
        parent.jQuery.fancybox.close();
    });
</script>
