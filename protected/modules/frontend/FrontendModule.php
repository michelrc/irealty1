<?php

class FrontendModule extends CWebModule
{
    public function getName(){
        return 'Frontend';
    }

	public function init()
	{
		// this method is called when the module is being created
		// you may place code here to customize the module or the application

        $this->attachBehavior('ycm', array(
            'class' => 'ycm.behaviors.YModuleBehavior'
        ));

		// import the module-level models and components
		$this->setImport(array(
			'frontend.models.*',
			'frontend.components.*',
		));
//        Yii::app()->theme =  'site';
//        $this->layout = 'main';
	}


	public function beforeControllerAction($controller, $action)
	{
		if(parent::beforeControllerAction($controller, $action))
		{
			// this method is called before any module controller action is performed
			// you may place customized code here
            Yii::app()->theme = 'site';
            $this->layout='main';

            return true;
		}
		else
			return false;
	}

    /**
     * Send mail method
     */
    public static function sendMail($email,$subject,$message) {
        $adminEmail = Yii::app()->params['adminEmail'];
        $mail = new YiiMailer('user', array('message' => $message));

        //set properties
        $mail->setFrom($adminEmail, app()->name);
        $mail->setSubject($subject);
        $mail->setTo($email);
        //send
        $mail->send();

    }
    static function getCurrency()
    {
        $currency_data = array();
        $currency = Currency::model()->find('active=:active', array(':active' => 1));
        $currency_data['symbol'] = $currency->symbol;
        $currency_data['alphabetical_code'] = $currency->alphabetical_code;

        return $currency_data;
    }
}
