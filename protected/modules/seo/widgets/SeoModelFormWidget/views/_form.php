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
                <?php $this->beginWidget('i18n.extensions.widgets.LanguageWidget', array(
                    'model' => $model,
                    'attribute' => 'url')); ?>
                <?php echo $form->textFieldGroup($model, 'url',
                    array(
                        'wrapperHtmlOptions' => array(
                            'class' => 'col-sm-12',
                        ),
                        'widgetOptions' => array(
                            'htmlOptions' => array('value' => '{value}', 'name' => '{name}'),
                        ),
                        //'hint' => Yii::t('Hint', 'Please, insert seo url'),
                        'prepend' => 'SEO',
                        'append' => 'URL'
                    )
                ); ?>
                <?php $this->endWidget(); ?>

                <?php $this->beginWidget('i18n.extensions.widgets.LanguageWidget', array(
                    'model' => $model,
                    'attribute' => 'title')); ?>
                <?php echo $form->textFieldGroup($model, 'title',
                    array(
                        'wrapperHtmlOptions' => array(
                            'class' => 'col-sm-12',
                        ),
                        'widgetOptions' => array(
                            'htmlOptions' => array('value' => '{value}', 'name' => '{name}'),
                        ),
                        //'hint' => Yii::t('Hint', 'Please, insert Seo Title'),
                        'prepend' => 'SEO',
                        'append' => 'Text'
                    )
                ); ?>
                <?php $this->endWidget(); ?>


                <?php $this->beginWidget('i18n.extensions.widgets.LanguageWidget', array(
                    'model' => $model,
                    'attribute' => 'keywords')); ?>
                <?php echo $form->textFieldGroup($model, 'keywords',
                    array(
                        'wrapperHtmlOptions' => array(
                            'class' => 'col-sm-12',
                        ),
                        'widgetOptions' => array(
                            'htmlOptions' => array('value' => '{value}', 'name' => '{name}'),
                        ),
                        //'hint' => Yii::t('Hint', 'Please, insert Seo Keywords'),
                        'prepend' => 'SEO',
                        'append' => 'Text'
                    )
                ); ?>
                <?php $this->endWidget(); ?>

                <?php $this->beginWidget('i18n.extensions.widgets.LanguageWidget', array(
                    'model' => $model,
                    'attribute' => 'description')); ?>
                <?php echo $form->textAreaGroup(
                    $model,
                    'description',
                    array(
                        'wrapperHtmlOptions' => array(
                            'class' => 'col-sm-12',
                        ),
                        'widgetOptions' => array(
                            'htmlOptions' => array('rows' => 4, 'value' => '{value}', 'name' => '{name}', 'class' => 'redactor'),
                        ),
                    )
                ); ?>
                <?php $this->endWidget(); ?>

                <br>
                <br>

                <div class="row">
                    <div class="col-md-offset-1 col-md-10">
                        <?php $label = CActiveRecord::model($manager->class) ?>
                        <table id="metaTable" class="offset1 table table-bordered table-stripped" style="width: 800px;">
                            <thead>
                            <tr>
                                <th><?php echo $label->getAttributeLabel('name') ?></th>
                                <th><?php echo $label->getAttributeLabel('content') ?></th>
                                <th>
                                    <?php echo CHtml::ajaxLink(
                                        CHtml::tag('i', array('class' => 'glyphicon glyphicon-plus', 'title' => Yii::t('transfer', 'Add meta line')), ''),
                                        array('//seo/default/newMetaRow'),
                                        array('type' => 'POST', 'success' => 'function(data){ $("#metaTable").append(data); $("select").select2(); $("#metaTable .error").tooltip(); }')
                                    );
                                    ?>
                                </th>
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
            </div>
        </div>
    </div>
</div>