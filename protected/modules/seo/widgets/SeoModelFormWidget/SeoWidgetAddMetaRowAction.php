<?php

class SeoWidgetAddMetaRowAction extends CAction
{
    public function run()
    {
        Yii::import('bootstrap.widgets.TbActiveForm');
        $form = new TbActiveForm();
        $form->showErrors = false;
        $form->type = 'inline';
        $data = new SeoModelMeta();
        return $this->controller->renderPartial('seo.widgets.SeoModelFormWidget.views._metaRow', array('form' => $form, 'data' => $data));
    }
} 