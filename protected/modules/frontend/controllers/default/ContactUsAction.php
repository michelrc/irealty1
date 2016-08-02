<?php

/**
 * Created by PhpStorm.
 * User: ramdy
 * Date: 15/08/14
 * Time: 14:35
 */
class ContactUsAction extends CAction
{
    public function run()
    {
        $controller = $this->getController();

        $contact_us = ContactUs::model()->find();



        if(isset($contact_us))
        {
            if(isset($contact_us->_banner_image))
            {
                $banner_image = $contact_us->_banner_image->getFileUrl('normal');
                $banner_image_alt = $contact_us->banner_image;
            }
            if(isset($contact_us->_banner_image_mobile))
            {
                $banner_image_mobile = $contact_us->_banner_image_mobile->getFileUrl('normal');
            }
            $title = $contact_us->title;
            $description = $contact_us->description;
            $place_holder_name = $contact_us->place_holder_name;
            $place_holder_phone = $contact_us->place_holder_phone;
            $place_holder_email = $contact_us->place_holder_email;
            $place_holder_subject = $contact_us->place_holder_subject;
            $place_holder_message = $contact_us->place_holder_message;
            $agents_title = $contact_us->agents_title;
            $address_title = $contact_us->address_title;
        }
        $contact_us_reason_criteria = new CDbCriteria();
        $contact_us_reason_criteria->order = 'priority asc';
        $contact_us_reason_query = ContactUsReason::model()->findAll($contact_us_reason_criteria);

        $contact_us_reason = array();

        $sale_property_reason_id = 'eb3725ea-048a-1a44-2959-fcecf60be64b';
        foreach($contact_us_reason_query as $reason)
        {
            $selected = null;
            if(!isset($_GET['q']) )
                $selected = null;
            elseif($sale_property_reason_id == $reason->id)
                $selected = true;
            else
                $selected = false;

            $contact_us_reason[] = array('id' => $reason->id, 'title' => $reason->title, 'selected' => $selected);
        }
        $agents_criteria = new CDbCriteria();
        $agents_criteria->limit = 3;
        $agents_query = Agent::model()->findAll($agents_criteria);

        $agents_all  =array();

        foreach($agents_query as $a)
        {
            $temp = array();
            $temp['id'] = $a->id;
            $temp['name'] = $a->name;
            $temp['contact_phone1'] = $a->contact_phone1;

            if(isset($a->_photo))
            {
                $temp['photo'] = $a->_photo->getFileUrl('normal');

            }
            $temp['photo_alt'] = $a->photo;

            $agents_all[] = $temp;
        }

        //--------------most popular properties data
        $popular_section = PopularSection::model()->find();
        if(isset($popular_section))
        {
            $popular_property_title = $popular_section->title;
            if(isset($popular_section->_image))
            {
                $popular_property_background = $popular_section->_image->getFileUrl('normal');
            }
        }
        $newsletter = NewsletterSection::model()->find();
        if(isset($newsletter))
        {
            $newsletter_placeholder = $newsletter->place_holder;
        }


        //---- obteniendo las propiedades lideres--------
        $leading_properties = $controller->get_most_popular_properties();
        //---- find obteniendo las propiedades lideres--------


        return $controller->render('contact_us',
            array(

                'banner_image' => $banner_image,
                'banner_image_mobile' => $banner_image_mobile,
                'banner_image_alt' => $banner_image_alt,
                'title' => $title,
                'description' => $description,
                'place_holder_name' => $place_holder_name,
                'place_holder_phone' => $place_holder_phone,
                'place_holder_email' => $place_holder_email,
                'place_holder_subject' => $place_holder_subject,
                'place_holder_message' => $place_holder_message,
                'agents_title' => $agents_title,
                'address_title' => $address_title,

                'contact_reason' => $contact_us_reason,
                'agents' => $agents_all,

                'popular_property_title' => $popular_property_title,
                'popular_property_background' => $popular_property_background,
                'most_popular_properties' => $leading_properties,



            )
        );

    }
}