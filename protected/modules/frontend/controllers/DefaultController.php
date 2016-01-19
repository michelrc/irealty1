<?php

class DefaultController extends Controller
{
    public $common_data;
    public $is_rent;

    public function init()
    {
        $this->common_data = $this->getVariablesArray();
        $this->is_rent = false;

    }
    private function getVariablesArray()
    {

        $navigationMenu = NavigationMenu::model()->find();
        $company = CompanyInfo::model()->find();
        $social_networks = SocialNetworks::model()->find();
//
        if(isset($navigationMenu))
        {
            $home = $navigationMenu->home;
            $buy = $navigationMenu->buy;
            $rent = $navigationMenu->rent;
            $contact_us = $navigationMenu->contact_us;

        }
        if(isset($company))
        {
            $logo = null;
            if(isset($company->_company_logo))
            {
                $logo = $company->_company_logo->getFileUrl('normal');
            }
                $logo_alt = $company->company_logo;
                $company_name = $company->company_name;
                $main_phone = $company->main_phone;
                $second_phone = $company->second_phone;
                $email = $company->email;
                $postal_address = $company->postal_address;
                $web_address = $company->web_address;
            $longitude = $company->map_longitude;
            $latitude = $company->map_latitude;


        }
//

        if(isset($social_networks))
        {
            $facebook_link = $social_networks->facebook_link;
            $twitter_link = $social_networks->twitter_link;
            $google_plus_link = $social_networks->google_plus_link;
            $instagram_link = $social_networks->instagram_link;

        }

        $footer_navitation_menu = FooterNavigationMenu::model()->find();
        if(isset($footer_navitation_menu))
        {
            $footer_home = $footer_navitation_menu->home;
            $footer_about_us = $footer_navitation_menu->about_us;
            $footer_terms_conditions = $footer_navitation_menu->terms_conditions;
            $footer_blog = $footer_navitation_menu->blog;
            $footer_publish_properties = $footer_navitation_menu->publish_properties;
        }

        $searcher = HomePageSearcher::model()->find();

        if(isset($searcher))
        {
            $searcher_title = $searcher->title;
            $searcher_buy = $searcher->tab_1_text;
            $searcher_rent = $searcher->tab_2_text;
            $searcher_placeholder = $searcher->place_holder_text;

        }

        $general_tracking = GeneralTrackingCodes::model()->find();
        if(isset($general_tracking))
        {
            $general_tracking_code = $general_tracking->source_code;
        }

        return array(
            'home' => $home,
            'buy' => $buy,
            'rent' => $rent,
            'contact_us' => $contact_us,

            'footer_home' => $footer_home,
            'footer_about_us' => $footer_about_us,
            'footer_terms_conditions' => $footer_terms_conditions,
            'footer_blog' => $footer_blog,
            'footer_publish_properties' => $footer_publish_properties,
//
            'logo' => $logo,
            'logo_alt' => $logo_alt,
            'company_name' => $company_name,
            'main_phone' => $main_phone,
            'second_phone' => $second_phone,
            'email' => $email,
            'postal_address' => $postal_address,
            'web_address' => $web_address,
//
            'facebook_link' => $facebook_link,
            'twitter_link' => $twitter_link,
            'google_plus_link' => $google_plus_link,
            'instagram_link' => $instagram_link,

            'latitude' => $latitude,
            'longitude' => $longitude,

            'searcher_title' => $searcher_title,
            'searcher_buy' => $searcher_buy,
            'searcher_rent' => $searcher_rent,
            'searcher_placeholder' => $searcher_placeholder,

            'general_tracking' => $general_tracking_code

        );
    }

    public function get_searcher_data()
    {
        $searcher = HomePageSearcher::model()->find();

        if(isset($searcher))
        {
            $searcher_title = $searcher->title;
            $searcher_buy = $searcher->tab_1_text;
            $searcher_rent = $searcher->tab_2_text;
            $searcher_placeholder = $searcher->place_holder_text;

        }
        return array(
            'searcher_title' => $searcher_title,
            'searcher_buy' => $searcher_buy,
            'searcher_rent' => $searcher_rent,
            'searcher_placeholder' => $searcher_placeholder,
        );
    }
    public function get_properties_type()
    {
        $property_types_all = PropertyType::model()->findAll();
        $property_types = array();
        foreach($property_types_all as $ptype)
        {
            $temp = array();
            $temp['id'] = $ptype->id;
            $temp['type'] = $ptype->type;

            $property_types[] = $temp;
        }
        return $property_types;
    }

    public function get_array_properties($properties_query_set){
        $properties = array();
        foreach($properties_query_set as $rp)
        {
            $temp = array();
            $temp['id'] = $rp->id;
            $temp['name'] = $rp->name;
            $temp['address'] = $rp->address;
            $temp['price'] = $rp->price;
            $temp['area'] = $rp->area;
            $temp['rooms'] = $rp->rooms;
            $temp['bathroom'] = $rp->bathroom;

            if(isset($rp->_listing_image) && $rp->_listing_image->getFileUrl('normal') != null)
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
                    $gallery = $rp->propertyGalleries;
                    foreach ($gallery as $g) {
                        if (isset($g->_image)) {
                            $temp['image'] = $g->_image->getFileUrl('normal');
                            $temp['image_alt'] = $g->image;
                            break;
                        }
                    }
                }
            }
            $properties[$rp->id] = $temp;
        }
        return $properties;
    }

    public function get_most_popular_properties($category_slug = null, $exclude_property_id = null)
    {
        $leading_properties_criteria_exalted = new CDbCriteria();
        $leading_properties_criteria_exalted->compare('exalted',1,false,'AND');
        $leading_properties_criteria_exalted->limit = 9;

        if(isset($exclude_property_id))
        {
            $leading_properties_criteria_exalted->addCondition("`id` <> '".$exclude_property_id."'");
        }

        if($category_slug != null)
        {
            $category_criteria = new CDbCriteria();
            $category_criteria->compare('slug', $category_slug);
            $category = PropertyCategory::model()->find($category_criteria);

            $leading_properties_criteria_exalted->compare('category', $category->id);
        }

        $leading_properties_exalted = Property::model()->findAll($leading_properties_criteria_exalted);


        $leading_properties_criteria = new CDbCriteria();
        $leading_properties_criteria_exalted->compare('exalted',0,false,'AND');
        $leading_properties_criteria->order = 'number_contact desc';
        $leading_properties_criteria->limit = 9 - sizeof($leading_properties_exalted);

        if($category_slug != null)
        {
            $leading_properties_criteria->compare('category', $category->id);
        }

        if(isset($exclude_property_id))
        {
            $leading_properties_criteria->addCondition("`id` <> '".$exclude_property_id."'");
        }
        $leading_properties_number_contact = Property::model()->findAll($leading_properties_criteria);

        $leading_properties_all = array_merge($leading_properties_number_contact,$leading_properties_exalted);

        $leading_properties = array();
        foreach($leading_properties_all as $lp)
        {
            $temp = array();
            $temp['id'] = $lp->id;
            $temp['name'] = $lp->name;
            $temp['address'] = $lp->address;
            $temp['price'] = $lp->price;
            $temp['area'] = $lp->area;
            $temp['rooms'] = $lp->rooms;
            $temp['bathroom'] = $lp->bathroom;

            if(isset($lp->_listing_image) && $lp->_listing_image->getFileUrl('normal') != null)
            {
                $temp['image'] = $lp->_listing_image->getFileUrl('normal');
                $temp['image_alt'] = $lp->listing_image;

            }
            else {

                $gallery = PropertyGallery::model()->find("`main` = 1 and `property` = '" . $lp->id . "'");
                if (isset($gallery->_image)) {
                    $temp['image'] = $gallery->_image->getFileUrl('normal');
                    $temp['image_alt'] = $gallery->image;
                } else
                    foreach ($lp->propertyGalleries as $g) {
                        if (isset($g->_image)) {
                            $temp['image'] = $g->_image->getFileUrl('normal');
                            $temp['image_alt'] = $g->image;
                            break;
                        }
                    }
            }
            $leading_properties[$lp->id] = $temp;
        }

        return $leading_properties;
    }


    public function actions()
    {
        $this->layout = '/layout/main1';
        $actions_path = 'application.modules.frontend.controllers.default';
        return array(
            'index' => $actions_path.'.IndexAction',
            'home_filter_property' => $actions_path.'.HomeFilterPropertyAction',
            'property' => $actions_path.'.PropertyAction',

            'add_subscribers' => $actions_path.'.AddSubscribersAction',


            'buy_list' => $actions_path.'.BuyListAction',
            'rent_list' => $actions_path.'.RentListAction',
            'blog' => $actions_path.'.BlogAction',
            'blog_list' => $actions_path.'.BlogListAction',
//            'aboutus' => $actions_path.'.AboutUsAction',
            'contact_us' => $actions_path.'.ContactUsAction',
            'about_us' => $actions_path.'.AboutUsAction',
            'terms_conditions' => $actions_path.'.TermsConditionsAction',
            'changelang' => 'application.modules.seo.components.LanguageSwitcherAction',
        );
    }

    public function actionError()
    {
        $this->layout = '/layout/main1';
        if($error=Yii::app()->errorHandler->error)
        {
            $url = 'frontend/default/error';
//            $urlRule = UrlRule::model()->find('route=:route', array(':route'=>$url));
            $title = t('Error page');
            if(isset($urlRule))
            {
                $title = $urlRule->seo->title;
            }
            $this->setPageTitle($title);
            if(Yii::app()->request->isAjaxRequest)
                echo $error['message'];
            else
            {
                $logo = "";
                $email = "";
                $phone = "";
                $company = CompanyInfo::model()->find();
                if(isset($company))
                {
                    if(isset($company->_company_logo))
                    {
                        $logo = $company->_company_logo->getFileUrl('normal');
                    }
                    $phone = $company->main_phone;
                    $second_phone = $company->second_phone;
                    $email = $company->email;
                }
                $this->render('error', array(
                    'email' => $email,
                    'phone' => $phone,
                    'second_phone' => $second_phone,
                    'logo' => $logo,

                ));
            }
        }
    }


    public function actionSendemail()
    {
        $company_info = CompanyInfo::model()->find();
        $to_email = 'sales@puntacanahome.com';
        $company_name = Yii::app()->name;
        if(isset($company_info)) {
            $to_email = $company_info->email;
            $company_name = $company_info->company_name;

        }


        if(app()->request->isAjaxRequest == false && app()->request->isPostRequest)
        {
            if (isset($_POST['email'])) {
                $name = $_POST['name'];
                $email = $_POST['email'];

                $subject = $company_name;
                $message = $_POST['message'];
                $phone = $_POST['phone'];
                $reason = $_POST['reason'];
                $message = $message.'<br> '.'Nombre: '. $name.
                            '<br> '. 'Teléfono: '. $phone;

                $criteria = new CDbCriteria();
                $criteria->compare('id', $reason);
                $reason_query = ContactUsReason::model()->find($criteria);
                $message .= '<br> Motivo del contacto: '.$reason_query->title;

                $this->sendMail($name, $email, $to_email, $subject, $message);
                $url = $this->createUrl('/frontend/default/contact_us');
                return $this->redirect($url."#section_title");
            }
            else
            {
                $url = $this->createUrl('/frontend/default/contact_us');
                return $this->redirect($url.'#section_title');
            }
            $this->layout = 'main';
        }
        elseif(Yii::app()->request->isAjaxRequest)
        {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];

            $subject = $company_name;
            $message = $_POST['message'];

            $property_id = $_POST['property_id'];
            $property = Property::model()->findByPk($property_id);


//            $message .= 'Razon de contacto: '.
            $message .= '<br>Id de la Propiedad: '.$property_id.
                        '<br>Nombre de la Propiedad: '. $property->name_es.
                        '<br>Categoría de la Propiedad: '. $property->category0->category_name_es.
                        '<br>Teléfono: '.$phone;


            $is_send = $this->sendMail($name, $email, $to_email, $subject, $message);

            if($is_send) {
                $data = array('success' => true, 'code' => 1, 'message' => app()->user->getFlash('success'));
            }
            else
                $data = array('success'=>false, 'code'=>1, 'message' => app()->user->getFlash('error'));
            $json = json_encode($data);
            return $this->renderText($json);

        }

    }

    public function sendMail($from_name,$from_email, $to_email, $subject,$message) {

        $mail = new YiiMailer('contact', array('message' => nl2br($message), 'name' => $from_email, 'description' => 'Contacto'));


        //set properties
        $mail->setFrom($from_email, $from_name);
        $mail->setSubject($subject);
        $mail->setTo($to_email);
        //send
//            $mail->send();
        if ($mail->send()) {

            Yii::app()->user->setFlash('success',t('Thanks you for contact us. We answer you as soon as possible.'));
            return true;
        } else {
            Yii::app()->user->setFlash('error',t('Error sending email: ').$mail->getError());
            return false;
        }

    }

    public function actionSearcherProperty(){

        $searcher_text = $_GET['q'];
        $filter_category = $_GET['category'];

        $category = PropertyCategory::model()->find('slug = :slug', array(':slug' => $filter_category));

        $criteria = new CDbCriteria();

        $criteria->addSearchCondition('`t`.`name_en`',$searcher_text, true,'or');
        $criteria->addSearchCondition('`t`.`address_en`',$searcher_text, true,'or');

        $criteria_temp = new CDbCriteria();

        $criteria_temp->addSearchCondition('`t`.`name_es`',$searcher_text, true,'or');
        $criteria_temp->addSearchCondition('`t`.`address_es`',$searcher_text, true,'or');

        $criteria->mergeWith($criteria_temp, 'OR');


        $criteria->join = 'inner join `province` on `t`.`province` = `province`.`id`';
        $criteria_province = new CDbCriteria();
        $criteria_province->addSearchCondition('`province`.`name_es`', $searcher_text,true, 'OR');
        $criteria_province->addSearchCondition('`province`.`name_en`', $searcher_text,true, 'OR');

        $criteria->mergeWith($criteria_province, 'OR');

        if(isset($category))
        {
            $criteria->addCondition('category = "'. $category->id.'"', 'AND');
        }

        $properties = Property::model()->findAll($criteria);

        $return_data = array();

        foreach($properties as $property)
        {
            $return_data[] = $property->name . ' | '.$property->province0->name;
        }

        $json = json_encode($return_data);

        if(count($return_data) == 0)
        {
            $json = json_encode(array(Yii::t('messages', 'No results found')));
            return $this->renderText($json);
        }

        return $this->renderText($json);


    }

    public function get_short_month($month_number)
    {
        $month_es = array(1 => 'Ene', 2 => 'Feb', 3 => 'Mar', 4 => 'Abr', 5 => 'May', 6 => 'Jun', 7 => 'Jul', 8 => 'Ago', 9 => 'Sep', 10 => 'Oct', 11 => 'Nov', 12 => 'Dec');
        $month_en = array(1 => 'Jan', 2 => 'Feb', 3 => 'Mar', 4 => 'Apr', 5 => 'May', 6 => 'Jun', 7 => 'Jul', 8 => 'Ago', 9 => 'Sep', 10 => 'Oct', 11 => 'Nov', 12 => 'Dec');
        $month_number = intval($month_number);
        if($_SESSION['language'] == 'es')
        {
            return $month_es[$month_number];
        }
        else{
            return $month_en[$month_number];
        }

    }

}
























