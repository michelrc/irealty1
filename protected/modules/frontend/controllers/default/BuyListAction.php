<?php

/**
 * Created by PhpStorm.
 * User: ramdy
 * Date: 15/08/14
 * Time: 14:35
 */
class BuyListAction extends CAction
{
    public function run()
    {
        $controller = $this->getController();

        $page_banner = BuyListPageTopImage::model()->findAll();

        $rand_number = rand(0, sizeof($page_banner) - 1);


        if(sizeof($page_banner) > 0)
        {
            if(isset($page_banner[$rand_number]->_top_image))
            {
                $banner_image = $page_banner[$rand_number]->_top_image->getFileUrl('normal');
                $banner_image_alt = $page_banner[$rand_number]->top_image;
            }
        }
        $page_general_info = BuyListPageGeneralInfo::model()->find();

        if(isset($page_general_info))
        {

            $banner_title = $page_general_info->banner_title;
            $page_title = $page_general_info->page_title;
            $cant_products = $page_general_info->amount_products_per_page;

            if(isset($page_general_info->_bottom_image)){
                $bottom_image = $page_general_info->_bottom_image->getFileUrl('normal');
            }
            $bottom_image_alt = $page_general_info->bottom_image;
            $popular_property_title = $page_general_info->popular_properties_tittle;

        }


        $newsletter = NewsletterSection::model()->find();
        if(isset($newsletter))
        {
            $newsletter_placeholder = $newsletter->place_holder;
        }

        $filter_criteria = new CDbCriteria();
        $filter_criteria->order = 'first_price asc';
        $price_range = BuyListPageFilterConfig::model()->findAll($filter_criteria);

        $all_price_range = array();
        foreach($price_range as $price)
        {
            $all_price_range[] = array('id' => $price->id, 'value' => $price->first_price.' - '. $price->last_price);
        }

        $criteria = new CDbCriteria();
        $criteria->join = ' inner join property_category on property_category.id = t.category INNER JOIN `province` ON `province`.`id` = `t`.`province`';
        $criteria->compare('property_category.slug', 'buy');

        if(isset($_GET['q']))
        {
            $q = $_GET['q'];

            $q = explode(' | ', $q);
            if(count($q) > 1)
            {
                $temp_criteria = new CDbCriteria();

                $q_property_name = $q[0];
                $q_property_address = $q[1];
                $temp_criteria->addSearchCondition('`t`.`name_es`', $q_property_name, true, 'OR');
                $temp_criteria->addSearchCondition('`t`.`name_en`', $q_property_name, true, 'OR');
                $criteria_province = new CDbCriteria();
                $criteria_province->addSearchCondition('`province`.`name_es`', $q_property_address,true, 'OR');
                $criteria_province->addSearchCondition('`province`.`name_en`', $q_property_address,true, 'OR');

                $temp_criteria->mergeWith($criteria_province, 'AND');


            }
            else{
                $temp_criteria = new CDbCriteria();
                $temp_criteria->addSearchCondition('`t`.`name_es`', $q[0], true, 'OR');
                $temp_criteria->addSearchCondition('`t`.`name_en`', $q[0], true, 'OR');
                $criteria_province = new CDbCriteria();
                $criteria_province->addSearchCondition('`province`.`name_es`', $q[0],true, 'OR');
                $criteria_province->addSearchCondition('`province`.`name_en`', $q[0],true, 'OR');
                $temp_criteria->mergeWith($criteria_province, 'OR');

            }
            if(isset($temp_criteria))
                $criteria->mergeWith($temp_criteria);
        }
//        ddump($criteria);

        $type = '-1';
        if(isset($_GET['options_type']))
        {
            $type = $_GET['options_type'];

        }
        if(isset($_GET['rooms'])){
            $rooms = $_GET['rooms'];
        }
        if(isset($_GET['bathrooms'])){
            $bathrooms = $_GET['bathrooms'];
        }
        if(isset($_GET['price'])){
            $price_range_id = $_GET['price'];
        }
        if(isset($_GET['condition'])){
            $condition_selected = $_GET['condition'];
        }

        if(isset($_GET['order']))
        {
            $order = $_GET['order'];
        }

        if(isset($type) and $type != '-1')
        {
            $criteria->compare('type', $type, false);
        }
        if(isset($rooms) and $rooms != "-1")
        {
            $criteria->compare('rooms', $rooms, false);
        }
        if(isset($bathrooms) and $bathrooms != "-1")
        {
            $criteria->compare('bathroom', $bathrooms, false);
        }
        if(isset($price_range_id) and $price_range_id != '-1')
        {
            $price_range_selected = BuyListPageFilterConfig::model()->findByPk($price_range_id);
            if(isset($price_range_selected))
            {
                $first_price = str_replace(',', '', $price_range_selected->first_price);
                $last_price = str_replace(',', '', $price_range_selected->last_price);
                $criteria->addBetweenCondition('price', floatval($first_price), floatval($last_price));
            }
        }
        if(isset($condition_selected) and $condition_selected != '-1')
        {
                $criteria->compare('`condition`', $condition_selected);
        }
        if(isset($order) and $order != '-1')
        {
            if($order == 'lower_price')
            {
                $criteria->order = 'price asc';
            }
            else{
                $criteria->order = 'price desc';
            }

        }
//        ddump($criteria);

        $count_properties = count(Property::model()->findAll($criteria));
        $pages = new CPagination($count_properties);
        $pages->pageSize = $page_general_info->amount_products_per_page;
        $pages->applyLimit($criteria);

        $properties_query = Property::model()->findAll($criteria);

        $properties = $controller->get_array_properties($properties_query);
        $locations = Province::model()->findAll();

        $all_locations = array();
        foreach($locations as $location)
        {
            $all_locations[] = array('id' => $location->id, 'name' => $location->name);
        }
        $property_types = $controller->get_properties_type();

        $conditions_query = PropertyCondition::model()->findAll();

        $conditions = array();

        foreach($conditions_query as $condition)
        {
            $conditions[] = array('id' => $condition->id, "condition_title" => $condition->condition_title);
        }

//        ddump($properties);

        //---- obteniendo las propiedades lideres--------
        $leading_properties = $controller->get_most_popular_properties('buy');
        //---- find obteniendo las propiedades lideres--------

        return $controller->render('property_list',
            array(
                    'category' => 'buy',
                    'banner_image' => $banner_image,
                    'banner_image_alt' => $banner_image_alt,
                    'banner_title' => $banner_title,
                    'page_title' => $page_title,

                    'popular_property_title' => $popular_property_title,
                    'popular_property_background' => $bottom_image,


                    'cant_products' => $cant_products,
                    'bottom_image' => $bottom_image,
                    'bottom_image_alt' => $bottom_image_alt,

                    'newsletter_placeholder' =>$newsletter_placeholder,

                    'locations' => $all_locations,
                    'price_range' => $all_price_range,
                    'property_types' => $property_types,

                    'properties' => $properties,//array_chunk($properties,3),
                    'pages' => $pages,

                //------options selected--------------------------------------
                    'price_range_selected' => $price_range_id,
                    'rooms_selected' => $rooms,
                    'bathrooms_selected' => $bathrooms,
                    'condition_selected' => $condition_selected,
                    'type_selected' => $type,

                    'most_popular_properties' => $leading_properties,
                    'conditions' => $conditions,


            )
        );

    }
}