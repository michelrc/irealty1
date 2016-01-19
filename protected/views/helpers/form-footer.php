<p>
    <?php
    $controls = array();
    $controls[] = $this->widget('application.extensions.bootstrap.widgets.TbLabel', array(
//        'type' => 'important', // 'success', 'warning', 'important', 'info' or 'inverse'
        'label' => t('Important !!'),
    ), true);
    $controls[] = t('<small>Fields with <span class="required">*</span> are required.</small>');
    echo  TbHtml::controlsRow($controls);
    ?>
</p>
