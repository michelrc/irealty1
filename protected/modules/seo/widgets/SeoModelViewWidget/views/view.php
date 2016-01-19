<div class="panel-group" id="seo_accordion">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#seo_accordion" href="#seo">
                    <?php echo Yii::t('app', 'Seo Options') ?>
                </a>
            </h4>
        </div>
        <div id="seo" class="panel-collapse collapse">
            <div class="panel-body">
                <?php $this->widget('application.extensions.bootstrap.widgets.TbEditableDetailView', array(
                    'data' => $model,
                    'id' => 'seo-view-table',
                    'attributes' => array(
                        array(
                            'class' => 'bootstrap.widgets.TbEditableColumn',
                            'name' => 'url',
                            'value' => $model->url,
                            'sortable' => false,
                            'editable' => array(
                                'type' => 'text',
                                'apply' => false,
                                'url' => array('updateAttribute', 'model' => get_class($model)),
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
                            'class' => 'bootstrap.widgets.TbEditableColumn',
                            'name' => 'title',
                            'value' => $model->title,
                            'sortable' => false,
                            'editable' => array(
                                'type' => 'text',
                                'apply' => false,
                                'url' => array('updateAttribute', 'model' => get_class($model)),
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
                            'class' => 'bootstrap.widgets.TbEditableColumn',
                            'name' => 'keywords',
                            'value' => $model->keywords,
                            'sortable' => false,
                            'editable' => array(
                                'type' => 'text',
                                'apply' => false,
                                'url' => array('updateAttribute', 'model' => get_class($model)),
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
                            'class' => 'bootstrap.widgets.TbEditableColumn',
                            'name' => 'description',
                            'value' => $model->description,
                            'sortable' => false,
                            'editable' => array(
                                'type' => 'text',
                                'apply' => false,
                                'url' => array('updateAttribute', 'model' => get_class($model)),
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
                    )
                )); ?>

                <?php $items = $manager->getItems() ?>

                <?php if ($items): ?>
                    <br>
                    <br>

                    <div class="row">
                        <div class="col-md-offset-1 col-md-10">
                            <?php $label = CActiveRecord::model($manager->class) ?>
                            <table id="metaTable" class="offset1 table table-bordered table-stripped"
                                   style="width: 800px;">
                                <thead>
                                <tr>
                                    <th><?php echo $label->getAttributeLabel('name') ?></th>
                                    <th><?php echo $label->getAttributeLabel('content') ?></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $form->type = 'inline';
                                foreach ($manager->getItems() as $id => $data) {
                                    $this->render('_metaRow', array('form' => $form, 'id' => $id, 'data' => $data));
                                }
                                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                <?php endif ?>
            </div>
        </div>
    </div>
</div>