<?php $index = $data->isNewRecord ? ("n" . microtime()) : $data->primaryKey ?>
<tr class="metaRow <?php echo $data->hasErrors() ? 'error' : '' ?>">
    <td>
        <?php $this->widget('bootstrap.widgets.TbEditableField', array(
            'model' => $data,
            'attribute' => 'name',
            'value' => $data->name,
            'type' => 'text',
            'apply' => true,
            'url' => array('updateAttribute', 'model' => get_class($data)),
            'placement' => 'top',
            'inputclass' => 'span3',
            'success' => "js: function(response, newValue) {
                    if (!response.success)
                        $('#success').modal('toggle');
                        setTimeout(function(){
                            $('#success').modal('toggle');
                        }, 2000);
                }",
        )) ?>
    </td>
    <td><?php $this->widget('bootstrap.widgets.TbEditableField', array(
            'model' => $data,
            'attribute' => 'content',
            'value' => $data->content,
            'type' => 'textarea',
            'apply' => true,
            'url' => array('updateAttribute', 'model' => get_class($data)),
            'placement' => 'top',
            'inputclass' => 'span3',
            'success' => "js: function(response, newValue) {
                    if (!response.success)
                        $('#success').modal('toggle');
                        setTimeout(function(){
                            $('#success').modal('toggle');
                        }, 2000);
                }",
        )) ?></td>
</tr>