

<?php
/**
 * The following code was generated automatically using GiixCrudCode
 * This generator was improve by iReevo Team
 */
 ?>

<?php

class TermsConditionPageController extends GxController {

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
        $model = $this->loadModel($id, 'TermsConditionPage');
        $this->render('view', array(
			'model' => $model,
		));
	}

	public function actionCreate() {
		$model = new TermsConditionPage;


		$this->performAjaxValidation($model, 'terms-condition-page-form');
        
        if($model->count() >= 1)
        {
            $model = $model::model()->find();
            $this->redirect(array("update?id=$model->id"));
        }




		if (isset($_POST['TermsConditionPage'])) {
			$model->setAttributes($_POST['TermsConditionPage']);

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

		$this->render('create', array( 'model' => $model));
	}

	public function actionUpdate($id) {
		$model = $this->loadModel($id, 'TermsConditionPage');


		$this->performAjaxValidation($model, 'terms-condition-page-form');

		if (isset($_POST['TermsConditionPage'])) {
			$model->setAttributes($_POST['TermsConditionPage']);

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
				));
	}

public function actionDelete($id)
{
    if(isset($id)){
         if($this->loadModel($id,"TermsConditionPage")->delete()){
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
		$model = new TermsConditionPage('search');
		//$model->unsetAttributes();

        if($model->count() >= 1)
        {
            $model = $model::model()->find();
            $this->redirect(array("update?id=$model->id"));
        }

		if (isset($_GET['TermsConditionPage']))
			$model->setAttributes($_GET['TermsConditionPage']);

		$this->render('admin', array(
			'model' => $model,
		));
	}

}