<?php

class DefaultController extends Controller
{
    public function actions()
    {
        return array(
            'newMetaRow' => 'seo.widgets.SeoModelFormWidget.SeoWidgetAddMetaRowAction'
        );
    }
}