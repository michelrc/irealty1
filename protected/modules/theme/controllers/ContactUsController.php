

<?php
/**
 * The following code was generated automatically using GiixCrudCode
 * This generator was improve by iReevo Team
 */
 ?>

<?php

class ContactUsController extends GxController {

public function filters() {
	return array(
			'accessControl', 
			);
}

public function accessRules() {
	return array(
			array('allow', 
				'actions'=>array('index', 'view'),
				'users'=>array('@'),
				),
            array('allow',
	            'actions'=>array('index', 'view','update','admin'),
	            'users'=>user()->getPermissionbyRoles(array('Level-1','Level-2','Level-3')),
	        ),
			array('allow', 
				'actions'=>array('minicreate', 'create', 'update', 'admin', 'delete'),
				'users'=>mod('user')->getAdmins(),
				),
			array('deny', 
				'users'=>array('*'),
				),
			);
}

	public function actionView($id) {
        $model = $this->loadModel($id, 'ContactUs');
        $this->render('view', array(
			'model' => $model,
		));
	}

	public function actionCreate() {
		$model = new ContactUs;
        $model_reason = new ContactUsReason('search');


		$this->performAjaxValidation($model, 'contact-us-form');

        if($model->count() >= 1)
        {
            $model = $model::model()->find();
            $this->redirect(array("update?id=$model->id"));
        }




		if (isset($_POST['ContactUs'])) {
			$model->setAttributes($_POST['ContactUs']);

			if ($model->save()) {
				if (Yii::app()->getRequest()->getIsAjaxRequest())
					Yii::app()->end();
				else{
                    Yii::app()->user->setFlash('success',t('Success, item was saved.'));
                    $this->redirect(array("update?id=$model->id"));
                }
			}
            else {
                Yii::app()->user->setFlash('error',t('Error, had been an error saving item.'));
            }
		}

		$this->render('create', array( 'model' => $model, 'model_reason' => $model_reason));
	}

	public function actionUpdate($id) {

		$model = $this->loadModel($id, 'ContactUs');
        $model_reason = new ContactUsReason('search');


		$this->performAjaxValidation($model, 'contact-us-form');

		if (isset($_POST['ContactUs'])) {
			$model->setAttributes($_POST['ContactUs']);

			if ($model->save()) {
                Yii::app()->user->setFlash('success',t('Success, the changes were saved.'));
                $this->redirect(array("update?id=$model->id"));
			}
            else {
            Yii::app()->user->setFlash('error',t('Error, had been an error savind the item.'));
            }
		}

		$this->render('update', array(
				'model' => $model,
                'model_reason' => $model_reason
				));
	}

public function actionDelete($id)
{
    if(isset($id)){
         if($this->loadModel($id,"ContactUs")->delete()){
            Yii::app()->user->setFlash('success',t('Success, the item was deleted.'));
            $this->redirect(array('admin'));
        }
        else{
            Yii::app()->user->setFlash('error',t('Error, exist a native error to delete the item: '.$id.', to resolve this problem, please contact with the database administrator.'));
        }
    }
    else {
        Yii::app()->user->setFlash('error',t('Error, the item '.$id.' is not defined.'));
    }
}

	public function actionAdmin() {
		$model = new ContactUs('search');
		//$model->unsetAttributes();

        if($model->count() >= 1)
        {
            $model = $model::model()->find();
            $this->redirect(array("update?id=$model->id"));
        }

		if (isset($_GET['ContactUs']))
			$model->setAttributes($_GET['ContactUs']);

		$this->render('admin', array(
			'model' => $model,
		));
	}

}