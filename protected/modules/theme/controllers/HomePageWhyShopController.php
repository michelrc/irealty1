

<?php
/**
 * The following code was generated automatically using GiixCrudCode
 * This generator was improve by iReevo Team
 */
 ?>

<?php

class HomePageWhyShopController extends GxController {

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
//	            'users'=>user()->getPermissionbyRoles(array('Level-1','Level-2','Level-3')),
                    'users' => array('@'),
	        ),
			array('allow', 
				'actions'=>array('minicreate', 'create', 'update', 'admin', 'delete'),
//				'users'=>mod('user')->getAdmins(),
                                 'users' => array('@'),
				),
			array('deny', 
				'users'=>array('*'),
				),
			);
}

	public function actionView($id) {
        $model = $this->loadModel($id, 'HomePageWhyShop');
        $this->render('view', array(
			'model' => $model,
		));
	}

	public function actionCreate() {
		$model = new HomePageWhyShop;


		$this->performAjaxValidation($model, 'home-page-why-shop-form');

         if($model->count() >= 1)
$this->redirect(array('admin'));




		if (isset($_POST['HomePageWhyShop'])) {
			$model->setAttributes($_POST['HomePageWhyShop']);

			if ($model->save()) {
				if (Yii::app()->getRequest()->getIsAjaxRequest())
					Yii::app()->end();
				else{
                    Yii::app()->user->setFlash('success',t('Success, item was saved.'));
                    $this->redirect(array('admin'));
                }
			}
            else {
                Yii::app()->user->setFlash('error',t('Error, had been an error saving item.'));
            }
		}

		$this->render('create', array( 'model' => $model));
	}

	public function actionUpdate($id) {
		$model = $this->loadModel($id, 'HomePageWhyShop');


		$this->performAjaxValidation($model, 'home-page-why-shop-form');

		if (isset($_POST['HomePageWhyShop'])) {
			$model->setAttributes($_POST['HomePageWhyShop']);

			if ($model->save()) {
                Yii::app()->user->setFlash('success',t('Success, the changes were saved.'));
                $this->redirect(array('admin'));
			}
            else {
            Yii::app()->user->setFlash('error',t('Error, had been an error savind the item.'));
            }
		}

		$this->render('update', array(
				'model' => $model,
				));
	}

public function actionDelete($id)
{
    if(isset($id)){
         if($this->loadModel($id,"HomePageWhyShop")->delete()){
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
		$model = new HomePageWhyShop('search');
		//$model->unsetAttributes();

		if (isset($_GET['HomePageWhyShop']))
			$model->setAttributes($_GET['HomePageWhyShop']);

		$this->render('admin', array(
			'model' => $model,
		));
	}

}