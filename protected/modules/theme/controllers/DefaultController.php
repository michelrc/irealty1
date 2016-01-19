<?php

class DefaultController extends Controller
{
    public function actions()
    {
        return array(
            'addProductGallRow' => 'theme.controllers.actions.AddProductGallRowAction',
            'addProductAmenitieRow' => 'theme.controllers.actions.AddProductAmenitieRowAction',
        );
    }
}