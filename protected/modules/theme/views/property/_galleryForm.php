<?php $index = $data->isNewRecord ? ("newgall" . str_replace('.','',str_replace(' ', '' ,microtime()))) : $data->primaryKey ?>

<tr id="<?php echo $index?>"  class="ProductGall <?php echo $data->hasErrors() ? 'error' : '' ?>">
    <td>
        <?php echo $form->fileFieldGroup($data, "[$index]recipeImg1",array(
            'wrapperHtmlOptions' => array(
                'class' => 'col-sm-5',
            ),
            'append' => CHtml::image($data->_image->getFileUrl('normal'), '', array('width' => '100px')),
            'hint' => t('The image dimensions are').' 728x486px',
            'widgetOptions' => array(
                'htmlOptions' => array('placeholder' => 'Imagen'),
            ),
        ));
        ?>
        <?php echo t('The image dimensions are').' 728x486px'?>
    </td>
    <td>
        <?php echo $form->textFieldGroup($data, "[$index]image",
            array(
                'wrapperHtmlOptions' => array(
                    'class' => 'col-sm-5',
                ),//'hint' =>Yii::t('admin','Please, insert ').' Image alt',
                'append' => 'text',
                'widgetOptions' => array(
                    'htmlOptions' => array('placeholder' => 'Imagen Alt'),
                ),
            )

        ); ?>

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

