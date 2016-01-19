<?php

class SeoModelViewWidget extends CWidget
{
    public $model;

    public function run()
    {
        /** @var SeoModelBehavior $seo_bh */
        $seo_bh = $this->model->asa('seo');

        $model = $seo_bh->getSeoModel();
        $manager = $seo_bh->getMetaManager();

        $this->render('view', array(
            'model' => $model,
            'manager' => $manager,
        ));
    }
} 