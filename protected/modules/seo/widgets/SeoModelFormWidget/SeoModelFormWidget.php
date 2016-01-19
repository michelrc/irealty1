<?php

class SeoModelFormWidget extends CWidget
{
    public $model;
    public $form;

    public function run()
    {
        /** @var SeoModelBehavior $seo_bh */
        $seo_bh = $this->model->asa('seo');

        $model = $seo_bh->getSeoModel();
        $manager = $seo_bh->getMetaManager();

        $this->render('_form', array(
            'form' => $this->form,
            'model' => $model,
            'manager' => $manager,
        ));
    }
} 