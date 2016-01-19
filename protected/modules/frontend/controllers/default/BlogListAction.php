<?php

/**
 * Created by PhpStorm.
 * User: ramdy
 * Date: 15/08/14
 * Time: 14:35
 */
class BlogListAction extends CAction
{
    public function run()
    {
        $controller = $this->getController();
        $controller->layout = '/layout/main1';

        $count_blogs = Article::model()->count();
        $pager = new CPagination($count_blogs);

        $criteria = new CDbCriteria();
        $criteria->order = 'date desc';
        $pager->pageSize = 4;
        $pager->applyLimit($criteria);

        $blog_list_query = Article::model()->findAll($criteria);
        $blog_list = array();

        foreach($blog_list_query as $blog)
        {
            $date = explode('-', $blog->date);
            if(count($date) == 3) {
                $day =  $date[2];
                $month = $controller->get_short_month($date[1]);
            }
            $temp = array();
            $temp['id'] = $blog->id;
            $temp['title'] = $blog->title;
            $temp['description'] = $blog->short_description;
            $temp['author'] = $blog->author;
            $temp['date'] = $blog->date;
            $temp['date_day'] = $day;
            $temp['date_month'] = $month;
            if(isset($blog->youtube_video) and $blog->youtube_video != '')
            {
                $url = parse_url($blog->youtube_video);
                if($url['host'] == 'www.youtube.com' and $url['path'] == '/watch')
                {
                    list($param, $code) = explode('=', $url['query']);
                    $youtube_video = 'http://www.youtube.com/embed/'.$code;
                    $temp['youtube_video'] = $youtube_video;
                }
            }

            if(isset($blog->_thumb_image))
            {
                $temp['image'] = $blog->_thumb_image->getFileUrl('normal');
                $temp['image_alt'] = $blog->thumb_image;
            }

            $blog_list[] = $temp;

        }

        $controller->get_short_month(1);

        $newsletter = NewsletterSection::model()->find();
        if(isset($newsletter))
        {
            $newsletter_placeholder = $newsletter->place_holder;
        }

        return $controller->render('blog_list',
            array(
                'blog_list' => $blog_list,
                'newsletter_placeholder' => $newsletter_placeholder,
                'pages' => $pager


            )
        );

    }
}