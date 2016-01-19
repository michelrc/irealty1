
<?php
/**
 * The following code was generated automatically using GiixCrudCode
 * This generator was improve by iReevo Team
 */
 ?>
<?php $index = $model->isNewRecord ? ("newamenitie" . str_replace('.','',str_replace(' ', '' ,microtime()))) : $model->primaryKey ?>

<tr id="<?php echo $index?>"  class="ProductGall <?php echo $model->hasErrors() ? 'error' : '' ?>">
    <td>
<?php

echo $form->dropDownListGroup($model,"[$index]amenitie_id",
                            array(
                                'wrapperHtmlOptions' => array(
                                    'class' => 'col-sm-5',
                                ),
                                'widgetOptions' => array(
                                    'data' => GxHtml::listDataEx(Amenitie::model()->findAll()),
                                   // 'htmlOptions' => array('multiple' => true),
                                ),
                                // 'hint' => t('Please, select amenitie_id'),
                                 'prepend' => 'Select'
                            )
                        ); ?>

    </td>
    <td>
  <?php echo $form->checkBoxGroup($model, "[$index]relevant"); ?>
    </td>
    <td width="100">
            <?php
                echo CHtml::link(
                    CHtml::tag('i', array('class' => 'glyphicon glyphicon-remove', 'title' => Yii::t('admin', 'Remove')), ''),
                    'javascript:void(0)',
                    array(
                        'class' => 'del-meta',
                        'onclick' => 'js:$(this).parents("tr").remove();'
                    ));

            ?>
        </td>
</tr>