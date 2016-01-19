<?php

class AddProductGallRowAction extends CAction
{
    public function run()
    {
        Yii::import('bootstrap.widgets.TbActiveForm');
        $form = new TbActiveForm();
        $form->showErrors = false;
        $form->type = 'inline';
        $data = new PropertyGallery();
        return $this->controller->renderPartial('theme.views.property._galleryForm', array('form' => $form, 'data' => $data));
    }
} 