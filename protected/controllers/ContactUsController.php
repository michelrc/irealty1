

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


		$this->performAjaxValidation($model, 'contact-us-form');

		if (isset($_POST['ContactUs'])) {
			$model->setAttributes($_POST['ContactUs']);

			if ($model->save()) {
				if (Yii::app()->getRequest()->getIsAjaxRequest())
					Yii::app()->end();
				else{
                    Yii::app()->user->setFlash('success',t('El elemento se ha salvado satisfactoriamente.'));
                    $this->redirect(array('admin'));
                }
			}
            else {
                Yii::app()->user->setFlash('error',t('Lo sentimos ha ocurrido un error al salvar el elemento.'));
            }
		}

		$this->render('create', array( 'model' => $model));
	}

	public function actionUpdate($id) {
		$model = $this->loadModel($id, 'ContactUs');


		$this->performAjaxValidation($model, 'contact-us-form');

		if (isset($_POST['ContactUs'])) {
			$model->setAttributes($_POST['ContactUs']);

			if ($model->save()) {
                Yii::app()->user->setFlash('success',t('Los cambios han sido almacenados satisfactoriamente.'));
                $this->redirect(array('admin'));
			}
            else {
            Yii::app()->user->setFlash('error',t('Lo sentimos ha ocurrido un error al salvar el elemento.'));
            }
		}

		$this->render('update', array(
				'model' => $model,
				));
	}

public function actionDelete($id)
{
    if(isset($id)){
         if($this->loadModel($id,"ContactUs")->delete()){
            Yii::app()->user->setFlash('success',t('El elemento fue eliminado satisfactoriamente.'));
            $this->redirect(array('admin'));
        }
        else{
            Yii::app()->user->setFlash('error',t('Error, lo sentimos, existe un error nativo de la base de datos al eleminar el elemento '.$id.', para resolver este problema consulte al administrador de su base de datos.'));
        }
    }
    else {
        Yii::app()->user->setFlash('error',t('Error, el elemento '.$id.' no se encuentra definido.'));
    }
}

	public function actionAdmin() {
		$model = new ContactUs('search');
		//$model->unsetAttributes();

		if (isset($_GET['ContactUs']))
			$model->setAttributes($_GET['ContactUs']);

		$this->render('admin', array(
			'model' => $model,
		));
	}

}