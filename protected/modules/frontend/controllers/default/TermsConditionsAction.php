<?php

/**
 * Created by PhpStorm.
 * User: ramdy
 * Date: 15/08/14
 * Time: 14:35
 */
class TermsConditionsAction extends CAction
{
    public function run()
    {
        $controller = $this->getController();
        $controller->layout = '/layout/main1';

        $terms_conditions = TermsConditionPage::model()->find();

        if(isset($terms_conditions))
        {
            $title = $terms_conditions->title;
            $description = $terms_conditions->description;
        }

        return $controller->render('terms_conditions',
            array(
                'title' => $title,
                'description' => $description,


            )
        );

    }
}