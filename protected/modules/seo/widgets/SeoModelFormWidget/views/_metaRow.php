<?php $index = $data->isNewRecord ? ("n" . microtime()) : $data->primaryKey ?>
<tr class="metaRow <?php echo $data->hasErrors() ? 'error' : '' ?>">
    <td><?php echo $form->textFieldGroup($data, "[$index]name", array(
                'maxlength' => 255,
                'wrapperHtmlOptions' => array(
                    'class' => 'col-sm-5',
                ),
                'widgetOptions' => array(
                    'htmlOptions' => array('placeholder' => 'Name'),
                ),
            )
        ); ?></td>
    <td><?php echo $form->textFieldGroup($data, "[$index]content", array(
                'maxlength' => 255,
                'wrapperHtmlOptions' => array(
                    'class' => 'col-sm-5',
                ),
                'widgetOptions' => array(
                    'htmlOptions' => array('placeholder' => 'Content'),
                ),
            )
        ); ?></td>
    <td>
        <?php echo CHtml::link(
            CHtml::tag('i', array('class' => 'glyphicon glyphicon-remove', 'title' => Yii::t('admin', 'Remove')), ''),
            'javascript:void(0)',
            array(
                'class' => 'del-meta',
                'onclick' => 'js:$(this).parents("tr").remove();'
            ));?>
    </td>
</tr>