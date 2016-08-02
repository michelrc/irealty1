<?php

/**
 * Created by PhpStorm.
 * User: ramdy
 * Date: 15/08/14
 * Time: 14:35
 */
class HomeFilterPropertyAction extends CAction
{
    public function run()
    {
        $controller = $this->getController();
        $currency = FrontendModule::getCurrency();

        $type_id = $_POST['type'];
        $category = $_POST['category'];

        $criteria = new CDbCriteria();
        $criteria->order = '`t`.`created`';
        $criteria->join = 'inner join `property_category` on `t`.`category` = `property_category`.`id`';
        $criteria->addCondition("`property_category`.`slug` = '".$category."'");
//        $criteria->compare('`property_category`.`slug`',$category, false,'AND');

        if($type_id != 'all')
        {
//            $criteria->join = $criteria->join.' inner join `property_type` on `t`.`type` = `property_type`.id';
            $criteria->addCondition("`t`.`type` = '".$type_id."'");
//            $criteria->compare('`property_type`.`id`', $type_id, false, 'AND');
        }

//        $criteria->limit = 6;

        $recent_properties_all = Property::model()->findAll($criteria);

//        ddump($criteria);

        $recent_properties = array();
        foreach($recent_properties_all as $key => $rp)
        {
            if($key < 6)
            {
                $temp = array();
                $temp['id'] = $rp->id;
                $temp['name'] = $rp->name;
                $temp['address'] = $rp->address;
                $temp['price'] = $rp->price;
                $temp['area'] = $rp->area;
                $temp['rooms'] = $rp->rooms;
                $temp['bathroom'] = $rp->bathroom;
                $gallery = $rp->propertyGalleries;

                if(isset($rp->_listing_image))
               {
                   $temp['image'] = $rp->_listing_image->getFileUrl('normal');
                   $temp['image_alt'] = $rp->listing_image;

               }
               else {
                   $gallery = PropertyGallery::model()->find("`main` = 1 and `property` = '" . $rp->id . "'");
                   if (isset($gallery->_image)) {
                       $temp['image'] = $gallery->_image->getFileUrl('normal');
                       $temp['image_alt'] = $gallery->image;
                   } else {

                       foreach ($gallery as $g) {
                           if (isset($g->_image)) {
                               $temp['image'] = $g->_image->getFileUrl('normal');
                               $temp['image_alt'] = $g->image;
                               break;
                           }
                       }

                   }
               }
                $recent_properties[$rp->id] = $temp;
            }
            else{
                break;
            }
        }
//        $recent_properties = array_chunk($recent_properties, 3);
        //---- fin obteniendo las propiedades recientes--------


        return $controller->renderPartial('home_filter_property',
            array(
                'recent_properties' => $recent_properties,
                'count_recent_properties' =>sizeof($recent_properties_all),
                 'currency' => $currency
            )
        );

    }
}