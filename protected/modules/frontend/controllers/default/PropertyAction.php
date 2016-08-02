<?php

/**
 * Created by PhpStorm.
 * User: ramdy
 * Date: 15/08/14
 * Time: 14:35
 */
class PropertyAction extends CAction
{
    public function run()
    {
        $controller = $this->getController();
        $currency = FrontendModule::getCurrency();

        if($_GET['id'])
        {
            $property_id = $_GET['id'];
            $property = Property::model()->findByPk($property_id);
            $property_default_image = PropertyDefaultImage::model()->find();
            if(isset($property))
            {
                if(isset($property->_banner_image) and $property->_banner_image->getFileUrl('normal')) {
                    $banner_image = $property->_banner_image->getFileUrl('normal');
                }
                elseif(isset($property_default_image->_image) and $property_default_image->_image->getFileUrl('normal'))
                {
                    $banner_image = $property_default_image->_image->getFileUrl('normal');
                }
                $banner_title = $property->banner_title;


                $category = PropertyCategory::model()->findByPk($property->category);

                if($category->slug == 'buy')
                {
                    $list_page = BuyListPageGeneralInfo::model()->find();
                    $controller->is_rent = false;
                }
                else{
                    $list_page = RentListPageGeneralInfo::model()->find();
                    $controller->is_rent = true;
                }
                if(isset($list_page))
                {
                    $page_title = $list_page->page_title;
                }


                $category_name = $category->category_name;
                $type = PropertyType::model()->findByPk($property->type);
                $type_name = $type->type;
                $amenities = $property->propertyAmenities;
                $amenities_data = array(1 => array(), 2 => array(), 3 => array());
                $count = 1;
                foreach($amenities as $key => $amenitie){
//                    if($count == 1)
                    $amenities_data[$count][] = array('id' => $amenitie->id, 'title' => $amenitie->amenitie->title, 'relevant' => $amenitie->relevant);

                    if($count == 3)
                        $count = 0;
                    $count +=1;
                }

                
                $property_name = $property->name;
                $address = $property->address;
                $province = $property->	province0->name;
                $price = $property->price;
                $best_tips = $property->best_tips;
                $area = $property->area;
                $description = $property->description;
                $rooms = $property->rooms;
                $bathrooms = $property->bathroom;
                $longitude = $property->map_longitude;
                $latitude = $property->map_latitude;

                if(isset($property->youtube_video) and $property->youtube_video != '')
                {
                    $url = parse_url($property->youtube_video);
                    if($url['host'] == 'www.youtube.com' and $url['path'] == '/watch')
                    {
                        list($param, $code) = explode('=', $url['query']);
                        $youtube_video = 'http://www.youtube.com/embed/'.$code;
                    }
                }

                $agent = $property->agent0;
                $agent_name = $agent->name;
                if(isset($agent->_photo)) {
                    $agent_photo = $agent->_photo->getFileUrl('normal');
                }

                $agent_contact_phone1 = $agent->contact_phone1;

//                ddump($agent_contact_phone1);


                //------------datos galleria-------------------------

                $gallery = $property->propertyGalleries;
                $gallery_data = array();

                foreach ($gallery as $g) {
                    $temp = array();
                    $temp['id'] = $g->id;
                    $temp['image'] = $g->_image->getFileUrl('normal');
                    $temp['image_alt'] = $g->image;
                    $gallery_data[] = $temp;
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
                $leading_properties = $controller->get_most_popular_properties($category->slug, $property_id);
                //---- find obteniendo las propiedades lideres--------


            }
            else{
                throw new CHttpException('Page not found', 404);
            }
        }
        else{
            throw new CHttpException('Page not found', 404);
        }

        return $controller->render('property',
            array(
                'banner_image' => $banner_image,
                'banner_title' => $banner_title,
                'page_title' => $page_title,
                'name' => $property_name,
                'province' => $province,
                'price' => $price,
                'type' => $type_name,
                'area' => $area,
                'best_tips' => $best_tips,
                'address' => $address,
                'bathrooms' => $bathrooms,
                'rooms' => $rooms,
                'description' => $description,
                'amenities_data' => array_slice($amenities_data,0,3),
                'gallery' => $gallery_data,
                'category_name' => $category_name,
                'category_slug' => $category->slug,
                'longitude' => $longitude,
                'latitude' => $latitude,
                'youtube_video' => $youtube_video,


                'agent_name' => $agent_name,
                'agent_phone' => $agent_contact_phone1,
                'agent_photo' => $agent_photo,

                'popular_property_title' => $popular_property_title,
                'popular_property_background' => $popular_property_background,
                'most_popular_properties' => $leading_properties,
                'newsletter_placeholder' =>$newsletter_placeholder,
                 'currency' => $currency


            )
        );

    }
}