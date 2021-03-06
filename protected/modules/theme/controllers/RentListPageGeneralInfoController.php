

<?php
/**
 * The following code was generated automatically using GiixCrudCode
 * This generator was improve by iReevo Team
 */
 ?>

<?php

class RentListPageGeneralInfoController extends GxController {

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
        $model = $this->loadModel($id, 'RentListPageGeneralInfo');
        $this->render('view', array(
			'model' => $model,
		));
	}

	public function actionCreate() {
		$model = new RentListPageGeneralInfo;
        $model_filters = new RentListPageFilterConfig('search');
        $model_top_images = new RentListPageTopImage('search');


		$this->performAjaxValidation($model, 'rent-list-page-general-info-form');

        if($model->count() >= 1)
        {
            $model = $model::model()->find();
            $this->redirect(array("update?id=$model->id"));
        }




		if (isset($_POST['RentListPageGeneralInfo'])) {
			$model->setAttributes($_POST['RentListPageGeneralInfo']);

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

		$this->render('create', array(
            'model' => $model,
            'model_filters' => $model_filters,
            'model_top_images' => $model_top_images,
        ));
	}

	public function actionUpdate($id) {
		$model = $this->loadModel($id, 'RentListPageGeneralInfo');
        $model_filters = new RentListPageFilterConfig('search');
        $model_top_images = new RentListPageTopImage('search');


		$this->performAjaxValidation($model, 'rent-list-page-general-info-form');

		if (isset($_POST['RentListPageGeneralInfo'])) {
			$model->setAttributes($_POST['RentListPageGeneralInfo']);

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
				'model_filters' => $model_filters,
				'model_top_images' => $model_top_images,
				));
	}

public function actionDelete($id)
{
    if(isset($id)){
         if($this->loadModel($id,"RentListPageGeneralInfo")->delete()){
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
		$model = new RentListPageGeneralInfo('search');
		//$model->unsetAttributes();

        if($model->count() >= 1)
        {
            $model = $model::model()->find();
            $this->redirect(array("update?id=$model->id"));
        }

		if (isset($_GET['RentListPageGeneralInfo']))
			$model->setAttributes($_GET['RentListPageGeneralInfo']);

		$this->render('admin', array(
			'model' => $model,
		));
	}

}