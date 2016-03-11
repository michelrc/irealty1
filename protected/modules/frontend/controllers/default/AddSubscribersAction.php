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
            if (!isset($exists)) {

                $newsletter = new Newsletter();
                $newsletter->subscriber = $email;
                $newsletter->save();
                if (Yii::app()->getLanguage() == 'en') {
                    $response = array('success' => 1, 'message' => Yii::t('message', 'You have successfully subscribed.'));
                }
                if (Yii::app()->getLanguage() == 'es') {
                    $response = array('success' => 1, 'message' => Yii::t('message', 'Subcripci&oacute;n &eaciute;xitosa.'));
                }
            } else {
                if (Yii::app()->getLanguage() == 'en') {
                    $response = array('success' => 1, 'message' => Yii::t('message', 'You are already subscribed'));
                }
                if (Yii::app()->getLanguage() == 'es') {
                    $response = array('success' => 1, 'message' => Yii::t('message', 'Su email ya fu&eacute; subscrito'));
                }
            }
            $json = json_encode($response);
            return $controller->renderText($json);
        } catch (Exception $e) {
            $response = array('success' => 0, 'message' => Yii::t('message', 'Something is wrong'));
            $json = json_encode($response);
            return $controller->renderText($json);
        }

    }
}