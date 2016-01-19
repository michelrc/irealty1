
<?php
/**
 * The following code was generated automatically using GiixCrudCode
 * This generator was improve by iReevo Team
 */
 ?>

<?php

$this->title = $model->adminNames[3];
$this->breadcrumbs = array(
    $model->adminNames[3],Yii::t('sideMenu', 'List properties'));

?>

<?php $this->widget('application.extensions.bootstrap.widgets.TbGridView', array(
	'id' => 'property-grid',
	'dataProvider' => $model->search(),
	'filter' => $model,
	'columns' => array(
		
                        array(
                                'class' => 'application.extensions.bootstrap.widgets.TbImageColumn',
                                'header' => t('Banner image'),
                                'imagePathExpression' => '$data->_banner_image->getFileUrl("normal")',
                                'imageOptions'=>array('width'=>'100px')
                            )
                    ,
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
				'name'=>'category',
				'value'=>'GxHtml::valueEx($data->category0)',
                'sortable' => false,
				'filter'=>GxHtml::listDataEx(PropertyCategory::model()->findAll()),
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
		array('name'=> 'price',
                  'sortable' => false)
                  ,
		/*
		array(
				'name'=>'condition',
				'value'=>'GxHtml::valueEx($data->condition0)',
				'filter'=>GxHtml::listDataEx(PropertyCondition::model()->findAllAttributes(null, true)),
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
				'name'=>'province',
				'value'=>'GxHtml::valueEx($data->province0)',
				'filter'=>GxHtml::listDataEx(Province::model()->findAllAttributes(null, true)),
				),
		array('name'=> 'area',
                  'sortable' => false)
                  ,
		array(
                    'class' => 'application.extensions.bootstrap.widgets.TbEditableColumn',
                    'name' => 'rooms',
                    'filter' => array(1=>1,2=>2,3=>3,4=>4,5=>5),
					'sortable' => false,
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
                    'filter' => array(1=>1,2=>2,3=>3,4=>4,5=>5,6=>6,7=>7,8=>8,9=>9,10=>10),
					'sortable' => false,
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
				'name'=>'agent',
				'value'=>'GxHtml::valueEx($data->agent0)',
				'filter'=>GxHtml::listDataEx(Agent::model()->findAllAttributes(null, true)),
				),
		array(
				'name'=>'type',
				'value'=>'GxHtml::valueEx($data->type0)',
				'filter'=>GxHtml::listDataEx(PropertyType::model()->findAllAttributes(null, true)),
				),
		array(
				    'class' => 'application.extensions.bootstrap.widgets.TbEditableColumn',
					'name' => 'exalted',
					'value' => '($data->exalted == 0) ? Yii::t(\'app\', \'No\') : Yii::t(\'app\', \'Yes\')',
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
		array('name'=> 'map_longitude',
                  'sortable' => false)
                  ,
		array('name'=> 'map_latitude',
                  'sortable' => false)
                  ,
		array(
				'name'=>'seo_url_id',
				'value'=>'GxHtml::valueEx($data->seo)',
				'filter'=>GxHtml::listDataEx(SeoUrl::model()->findAllAttributes(null, true)),
				),
		array(
				    'class' => 'application.extensions.bootstrap.widgets.TbEditableColumn',
					'name' => 'number_contact',
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
		*/
		array(
            'class'=>'application.extensions.bootstrap.widgets.TbButtonColumn',
            'afterDelete'=> 'function(link,success,data){ if(success) $(document).attr("location", $(document).attr("location")); }',
            'template' => '{view} {update} {delete} {gallery} {amenitie}',
            'buttons'=>array(
                    'delete'=>array('visible'=>(user()->isAdmin) ? 'true':'false'),
                    'gallery' => array(
                                    'url' => 'array("/theme/propertyGallery/createBox", "pid"=>$data->primaryKey)',
                                    'icon' => 'glyphicon glyphicon-picture',
                                    'label' => Yii::t('Label_theme', 'Add Gallery'),
                                    'options' => array("data-fancybox-type"=>"iframe", 'class' => 'various'),
                                ),
                    'amenitie' => array(
                                    'url' => 'array("/theme/propertyAmenitie/createBox", "pid"=>$data->primaryKey)',
                                    'options' => array("data-fancybox-type"=>"iframe", 'class' => 'various'),
                                    'icon' => 'glyphicon glyphicon-gift',
                                    'label' => Yii::t('Label_theme', 'Add amenity'),
                                ),
            )
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

