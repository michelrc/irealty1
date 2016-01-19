<?php

/**
 * Created by PhpStorm.
 * User: ramdy
 * Date: 15/08/14
 * Time: 14:35
 */
class AboutUsAction extends CAction
{
    public function run()
    {
        $controller = $this->getController();
        $controller->layout = '/layout/main1';

        $about_us_page = AboutUsPage::model()->find();

        if(isset($about_us_page))
        {
            $title = $about_us_page->title;
            $description = $about_us_page->description;
        }

        return $controller->render('about_us',
            array(
                'title' => $title,
                'description' => $description,


            )
        );

    }
}