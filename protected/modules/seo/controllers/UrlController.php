<?php

class UrlController extends GxController
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
        $model = $this->loadModel($id, 'SeoUrlRule');
        $this->render('view', array(
            'model' => $model,
        ));
    }

    public function actionCreate()
    {
        $model = new SeoUrlRule;


        $this->performAjaxValidation($model, 'seo-url-rule-form');

        if (isset($_POST['SeoUrlRule'])) {
            $model->setAttributes($_POST['SeoUrlRule']);
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
        $model = $this->loadModel($id, 'SeoUrlRule');

        $this->performAjaxValidation($model, 'seo-url-rule-form');

        if (isset($_POST['SeoUrlRule'])) {
            $model->setAttributes($_POST['SeoUrlRule']);
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
            if ($this->loadModel($id, "SeoUrlRule")->delete()) {
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
        $model = new SeoUrlRule('search');
        $model->unsetAttributes();

        if (isset($_GET['SeoUrlRule']))
            $model->setAttributes($_GET['SeoUrlRule']);

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