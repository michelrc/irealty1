<?php
/**
 * The following code was generated automatically using GiixCrudCode
 * This generator was improve by iReevo Team
 */
?>

<?php

class ModelController extends GxController
{

    public function filters()
    {
        return array(
            'accessControl',
        );
    }

    public function accessRules()
    {
        return array(
            array('allow',
                'actions' => array('index', 'view', 'updateAttribute'),
                'users' => array('@'),
            ),
            /*array('allow',
	            'actions'=>array('index', 'view','update','admin'),
	            'users'=>user()->getPermissionbyRoles(array('Level-1','Level-2','Level-3')),
	        ),*/
            array('allow',
                'actions' => array('minicreate', 'create', 'update', 'admin', 'delete'),
                'users' => mod('user')->getAdmins(),
            ),
            array('deny',
                'users' => array('*'),
            ),
        );
    }

    public function actionView($id)
    {
        $model = $this->loadModel($id, 'SeoModel');
        $this->render('view', array(
            'model' => $model,
        ));
    }

    public function actionCreate()
    {
        $model = new SeoModel;


        $this->performAjaxValidation($model, 'seo-model-form');

        if (isset($_POST['SeoModel'])) {
            $model->setAttributes($_POST['SeoModel']);
            if ($model->save()) {
                if (Yii::app()->getRequest()->getIsAjaxRequest())
                    Yii::app()->end();
                else {
                    Yii::app()->user->setFlash('success', Yii::t('admin', 'Success, item was saved.'));
                    if (Yii::app()->request->getParam('id')) {
                        if (Yii::app()->request->getParam('action') == 'create')
                            $this->redirect(array('/backend/' . Yii::app()->request->getParam('controller') . '/' . Yii::app()->request->getParam('action')));
                        else
                            $this->redirect(array('/backend/' . Yii::app()->request->getParam('controller') . '/' . Yii::app()->request->getParam('action'), 'id' => Yii::app()->request->getParam('id')));
                    } else
                        $this->redirect(array('admin'));
                }
            } else {
                Yii::app()->user->setFlash('error', Yii::t('admin', 'Error, had been an error saving item.'));
            }
        }

        $this->render('create', array('model' => $model));
    }

    public function actionUpdate($id)
    {
        $model = $this->loadModel($id, 'SeoModel');

        $this->performAjaxValidation($model, 'seo-model-form');

        if (isset($_POST['SeoModel'])) {
            $model->setAttributes($_POST['SeoModel']);
            if ($model->save()) {
                Yii::app()->user->setFlash('success', Yii::t('admin', 'Success, the changes were saved.'));
                $this->redirect(array('admin'));
            } else {
                Yii::app()->user->setFlash('error', Yii::t('admin', 'Error, had been an error saving the item.'));
            }
        }
        $this->render('update', array(
            'model' => $model,
        ));
    }

    public function actionDelete($id)
    {
        if (isset($id)) {
            if ($this->loadModel($id, "SeoModel")->delete()) {
                Yii::app()->user->setFlash('success', Yii::t('admin', 'Success, the item was deleted.'));
                $this->redirect(array('admin'));
            } else {
                Yii::app()->user->setFlash('error', Yii::t('admin', 'Error, exist a native error to delete the item: ' . $id . ', to resolve this problem, please contact with the database administrator.'));
            }
        } else {
            Yii::app()->user->setFlash('error', Yii::t('admin', 'Error, the item ' . $id . ' is not defined.'));
        }
    }

    public function actionAdmin()
    {
        $model = new SeoModel('search');
        $model->unsetAttributes();

        if (isset($_GET['SeoModel']))
            $model->setAttributes($_GET['SeoModel']);

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    public function actionUpdateAttribute($model)
    {
        if (app()->request->isAjaxRequest && app()->request->isPostRequest) {
            Yii::import("bootstrap.widgets.TbEditableSaver");
            $editableSaver = new TbEditableSaver($model);
            $editableSaver->update();
            app()->end();
        }
    }

}