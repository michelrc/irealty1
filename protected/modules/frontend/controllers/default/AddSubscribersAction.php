<?php
/**
 * Created by PhpStorm.
 * User: ernesto
 * Date: 17/02/15
 * Time: 10:47
 */

class AddSubscribersAction extends CAction
{
    public function run()
    {
        $controller = $this->getController();
        $controller->layout = null;
        try {
            $email = $_GET['email'];

            $exists = Newsletter::model()->find('subscriber = :subscriber', array(":subscriber" => $email));
            if(!isset($exists)) {

                $newsletter = new Newsletter();
                $newsletter->subscriber = $email;
                $newsletter->save();
                $response = array('success' => 1, 'message' => Yii::t('message', 'You have successfully subscribed.'));
            }else{
                $response = array('success' => 1, 'message' => Yii::t('message', 'You are already subscribed'));
            }


            $json = json_encode($response);
            return $controller->renderText($json);
        }catch (Exception $e)
        {
            ddump($e);
            $response = array('success' => 0, 'message' => Yii::t('message', 'Something is wrong'));
            $json = json_encode($response);
            return $controller->renderText($json);
        }

    }
}