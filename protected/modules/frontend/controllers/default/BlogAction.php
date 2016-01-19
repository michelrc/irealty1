<?php

/**
 * Created by PhpStorm.
 * User: ramdy
 * Date: 15/08/14
 * Time: 14:35
 */
class BlogAction extends CAction
{
    public function run()
    {
        $controller = $this->getController();
        $controller->layout = '/layout/main1';

        if(isset($_GET['id']))
        {
            $article = Article::model()->findByPk($_GET['id']);

            if(isset($article))
            {
                $title = $article->title;
                $author = $article->author;
                $date = $article->date;
                $date = explode('-', $date);
                if(count($date) == 3) {
                    $day =  $date[2];
                    $month = $controller->get_short_month($date[1]);
                }
                $description = $article->large_description;

                if(isset($article->_large_image))
                {
                    $image = $article->_large_image->getFileUrl('normal');
                    $image_alt = $article->large_image;
                }

                if(isset($article->youtube_video) and $article->youtube_video != '')
                {
                    $url = parse_url($article->youtube_video);
                    if($url['host'] == 'www.youtube.com' and $url['path'] == '/watch')
                    {
                        list($param, $code) = explode('=', $url['query']);
                        $youtube_video = 'http://www.youtube.com/embed/'.$code;
                    }
                }

                $home_contact_us = HomePageContactUs::model()->find();

                if(isset($home_contact_us))
                {
                    $home_contact_us_title = $home_contact_us->image_title;
                    $home_contact_us_description = $home_contact_us->image_description;
                    if(isset($home_contact_us->_image))
                    {
                        $home_contact_us_image = $home_contact_us->_image->getFileUrl('normal');
                    }
                }

                $related_articles_criteria = new CDbCriteria();
                $related_articles_criteria->compare('category', $article->category);
                $related_articles_criteria->addCondition("id != '".$article->id."'");
                $related_articles_criteria->limit = 3;

                $related_articles_query = Article::model()->findAll($related_articles_criteria);

                $related_articles = array();
                foreach($related_articles_query as $related)
                {
                    $related_articles[] = array('id' => $related->id, 'title' => $related->title);
                }

            }
            else
            {
                throw new CHttpException('Page not found', 404);
            }

        }
        else{
            throw new CHttpException('Page not found', 404);
        }


        return $controller->render('blog',
            array(
                'title' => $title,
                'author' => $author,
                'date' => $date,
                'date_day' => $day,
                'date_month' => $month,
                'description' => $description,
                'youtube_video' => $youtube_video,
                'image' => $image,
                'image_alt' => $image_alt,

                'home_contact_us_title' => $home_contact_us_title,
                'home_contact_us_description' => $home_contact_us_description,
                'home_contact_us_image' => $home_contact_us_image,

                'related_articles' => $related_articles,

            )
        );

    }
}