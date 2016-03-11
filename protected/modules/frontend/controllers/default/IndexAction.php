<?php

/**
 * Created by PhpStorm.
 * User: ramdy
 * Date: 15/08/14
 * Time: 14:35
 */
class IndexAction extends CAction
{
    public function run()
    {
        $controller = $this->getController();
        $controller->layout = '/layout/main1';
        $home_banner_query = HomePageBanner::model()->findAll();
        $searcher = HomePageSearcher::model()->find();
        $home_leading_properties = HomePageLeadingProperty::model()->find();
        $home_recent_properties = HomePageRecentsProperties::model()->find();
        $home_why_shop = HomePageWhyShop::model()->find();
        $home_why_shop_icons = HomePageWhyShopIcons::model()->findAll();


        //---- obteniendo las propiedades lideres--------
        $leading_properties = $controller->get_most_popular_properties();
        //---- find obteniendo las propiedades lideres--------

        //---- obteniendo las propiedades recientes--------

        $recent_properties_criteria = new CDbCriteria();
        $recent_properties_criteria->order = 'created desc';
        $recent_properties_criteria->join = 'inner join `property_category` on `t`.`category` = `property_category`.id';
        $recent_properties_criteria->compare('`property_category`.`slug`',"buy");
        $show_more_properties = Property::model()->count($recent_properties_criteria);

        $recent_properties_criteria->limit = 6;

//        ddump($recent_properties_criteria);

        $recent_properties_all = Property::model()->findAll($recent_properties_criteria);

        $recent_properties = $controller->get_array_properties($recent_properties_all);

//        $recent_properties = array_chunk($recent_properties, 3);
        //---- fin obteniendo las propiedades recientes--------

        $home_banner_all = array();

        foreach($home_banner_query as $banner)
        {
            $temp = array();
            if(isset($banner->_image) and $banner->_image->getFileUrl('normal') != null)
            {
                $temp['image'] = $banner->_image->getFileUrl('normal');
                $temp['image_alt'] = $banner->image;
                $home_banner_all[] = $temp;
            }

        }

        if(isset($searcher))
        {
            $searcher_title = $searcher->title;
            $searcher_buy = $searcher->tab_1_text;
            $searcher_rent = $searcher->tab_2_text;
            $searcher_placeholder = $searcher->place_holder_text;

        }

        if(isset($home_leading_properties))
        {
            $leading_property_title = $home_leading_properties->title;
        }

        if(isset($home_recent_properties))
        {
            $recent_property_title = $home_recent_properties->title;
            $recent_property_view_more = $home_recent_properties->view_more;
        }

        $newsletter = NewsletterSection::model()->find();
        if(isset($newsletter))
        {
            $newsletter_placeholder = $newsletter->place_holder;
        }

        if(isset($home_why_shop))
        {
            $why_shop_title = $home_why_shop->title;
            $why_shop_subtitle = $home_why_shop->subtitle;

        }
        $why_shop_icons = array();
        foreach($home_why_shop_icons as $wicons)
        {
            $temp = array();
            $temp['id'] = $wicons->id;
            $temp['title'] = $wicons->title;
            $temp['subtitle'] = $wicons->subtitle;
            if(isset($wicons->_icon_image))
            {
                $temp['icon_image'] = $wicons->_icon_image->getFileUrl('normal');
                $temp['icon_image_alt'] = $wicons->icon_image;
            }
            $why_shop_icons[] = $temp;

        }

        $testimonials_criteria = new CDbCriteria();
        $testimonials_criteria->condition = 'active=1';
        $testimonials_criteria->order = 'created desc';
        $testimonials_all = Testimonials::model()->findAll($testimonials_criteria);
        $testimonials = array();
        foreach($testimonials_all as $t)
        {
            $temp  = array();
            $temp['id'] = $t->id;
            $temp['text'] = $t->text;
            $temp['author_name'] = $t->author_name;
            $temp['company_name'] = $t->company_name;
            if(isset($t->_photo))
            {
                $temp['photo'] = $t->_photo->getFileUrl('normal');
                $temp['photo_alt'] = $t->photo;
            }
            $testimonials[] = $temp;


        }
        $home_testimonials = HomePageTestimonials::model()->find();

        if(isset($home_testimonials))
        {
            $home_testimonials_title = $home_testimonials->title;
        }

        #------section contact us---------------------------

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

        $blog_criteria = new CDbCriteria();
        $blog_criteria->order = 'date desc';
        $blog_criteria->limit = 3;
        $blogs_all = Article::model()->findAll($blog_criteria);

        $blogs = array();

        foreach($blogs_all as $b)
        {
            $date = explode('-', $b->date);
            if(count($date) == 3) {
                $day = $date[2];
                $month = $date[1];
            }
            $blogs[] = array('id' => $b->id,
                                'title' => $b->title,
                                'summary' => $b->short_description,
                                'author' => $b->author,
                                'date_day' => 	$day,
                                'date_month' => $controller->get_short_month($month));
        }

        //----obteniendo tipos de residencias---------

        $property_types = $controller->get_properties_type();
        $type_selected = 'all';

        //----fin obteniendo tipos de residencias---------


        $category_buy = PropertyCategory::model()->find('slug = :slug', array(':slug' => 'buy'));
        $category_rent = PropertyCategory::model()->find('slug = :slug', array(':slug' => 'rent'));

        return $controller->render('index',
            array(
                'category_buy' => $category_buy,
                'category_rent' => $category_rent,

                'banner_slide' => $home_banner_all,
                'searcher_title' => $searcher_title,
                'searcher_buy' => $searcher_buy,
                'searcher_rent' => $searcher_rent,
                'searcher_placeholder' => $searcher_placeholder,

                'leading_property_title' => $leading_property_title,
                'leading_properties' => $leading_properties,

                'recent_property_title' => $recent_property_title,
                'recent_property_view_more' => $recent_property_view_more,
                'show_more_properties' => $show_more_properties,

                'recent_properties' => $recent_properties,
                'newsletter_placeholder' => $newsletter_placeholder,

                'why_shop_title' => $why_shop_title,
                'why_shop_subtitle' => $why_shop_subtitle,

                'why_shop_icons' => $why_shop_icons,

                'property_types' => $property_types,
                'type_selected' => $type_selected,

                'testimonials_title' => $home_testimonials_title,
                'testimonials' => $testimonials,

                'contact_us_title' => $home_contact_us_title,
                'contact_us_description' => $home_contact_us_description,
                'contact_us_image' => $home_contact_us_image,

                'blogs' => $blogs,



            )
        );

    }
}