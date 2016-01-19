<?php

class AddProductAmenitieRowAction extends CAction
{
    public function run()
    {
        Yii::import('bootstrap.widgets.TbActiveForm');
        $form = new TbActiveForm();
        $form->showErrors = false;
        $form->type = 'inline';
        $data = new PropertyAmenitie();
        return $this->controller->renderPartial('theme.views.property._formAmenities', array('form' => $form, 'model' => $data));
    }
} 