

<?php
/**
 * The following code was generated automatically using GiixCrudCode
 * This generator was improve by iReevo Team
 */
 ?>

<?php

class NewsletterController extends GxController {

public function filters() {
	return array(
			'accessControl', 
			);
}

public function accessRules() {
	return array(
			array('allow', 
				'actions'=>array('index', 'view', 'csvfile'),
				'users'=>array('@'),
				),
            array('allow',
	            'actions'=>array('index', 'view','update','admin', 'csvfile'),
//	            'users'=>user()->getPermissionbyRoles(array('Level-1','Level-2','Level-3')),
                     'users' => array('@'),
	        ),
			array('allow', 
				'actions'=>array('minicreate', 'create', 'update', 'admin', 'delete', 'csvfile'),
//				'users'=>mod('user')->getAdmins(),
                                 'users' => array('@'),
				),
			array('deny', 
				'users'=>array('*'),
				),
			);
}

	public function actionView($id) {
        $model = $this->loadModel($id, 'Newsletter');
        $this->render('view', array(
			'model' => $model,
		));
	}

	public function actionCreate() {
		$model = new Newsletter;


		$this->performAjaxValidation($model, 'newsletter-form');

        




		if (isset($_POST['Newsletter'])) {
			$model->setAttributes($_POST['Newsletter']);

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
		$model = $this->loadModel($id, 'Newsletter');


		$this->performAjaxValidation($model, 'newsletter-form');

		if (isset($_POST['Newsletter'])) {
			$model->setAttributes($_POST['Newsletter']);

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
         if($this->loadModel($id,"Newsletter")->delete()){
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


		$model = new Newsletter('search');
		//$model->unsetAttributes();

		if (isset($_GET['Newsletter']))
			$model->setAttributes($_GET['Newsletter']);

		$this->render('admin', array(
			'model' => $model,
		));
	}

    public function actionCsvfile()
    {
        Yii::import('application.components.ECSVExport');

        $newsletter = Newsletter::model()->findAll();
        $temp = array();
        foreach($newsletter as $nl)
        {
            $temp[] = array('email' => $nl->subscriber);
        }


        $csv = new ECSVExport($temp,true,false,',');

        $content = $csv->toCSV();
        $filename = 'uploads/newsletter.csv';
        $csv->toCSV($filename);

        Yii::app()->getRequest()->sendFile($filename, $content, "text/csv", false);

    }

}