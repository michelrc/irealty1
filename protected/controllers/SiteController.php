<?php

class SiteController extends Controller
{
    /*public function beforeAction($action){
        app()->theme = 'v-1.0';
        return parent::beforeAction($action);
    }*/
	
	
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
        $_SESSION['language'] = 'es';
        if(user()->isGuest)
        {
            $this->redirect('/user/login');
        }
        $entity = CompanyInfo::model()->findAll();

        //app()->theme = 'v-1.0';
        
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
        if(!isset($entity))
        {
            $entity = array('company_name'=>'Company name');
        }
        if (!app()->request->isAjaxRequest) {
            $this->render('index',array('entity'=>$entity));
        }else{
            $this->renderPartial('index',array('entity'=>$entity));
        }
	}

	/**irtext/default/admin
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
                //use 'contact' view from views/mail
                $mail = new YiiMailer('contact', array('message' => nl2br($model->body), 'name' => $model->name, 'description' => t('Formulario de contacto')));

                //set properties
                $mail->setFrom($model->email, $model->name);
                $mail->setSubject(t('Contacto'));
                $mail->setTo(param('adminEmail'));
                //send
                if ($mail->send()) {
                    Yii::app()->user->setFlash('success',t('Gracias por contactarnos. Le responderemos lo más rápido posible.'));
                } else {
                    Yii::app()->user->setFlash('error',t('Error enviando el correo: ').$mail->getError());
                }

                $this->redirect(array('/site/index'));
			}
		}
		$this->render('contact',array('model'=>$model));
	}
}