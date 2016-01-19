<?php
/**
 * The following code was generated automatically using GiixCrudCode
 * This generator was improve by iReevo Team
 */
?>

<?php

class CategoryController extends GxController
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
                'actions' => array('index', 'view'),
                'users' => array('@'),
            ),
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
        $model = $this->loadModel($id, 'I18nCategory');
        $this->render('view', array(
            'model' => $model,
        ));
    }

    public function actionCreate()
    {
        $model = new I18nCategory;


        $this->performAjaxValidation($model, 'i18n-category-form');

        if (isset($_POST['I18nCategory'])) {
            $model->setAttributes($_POST['I18nCategory']);

            if ($model->save()) {
                if (Yii::app()->getRequest()->getIsAjaxRequest())
                    Yii::app()->end();
                else {
                    Yii::app()->user->setFlash('success', t('Success, item was saved.'));
                    $this->redirect(array('admin'));
                }
            } else {
                Yii::app()->user->setFlash('error', t('Error, had been an error saving item.'));
            }
        }

        $this->render('create', array('model' => $model));
    }

    public function actionUpdate($id)
    {
        $model = $this->loadModel($id, 'I18nCategory');


        $this->performAjaxValidation($model, 'i18n-category-form');

        if (isset($_POST['I18nCategory'])) {
            $model->setAttributes($_POST['I18nCategory']);

            if ($model->save()) {
                Yii::app()->user->setFlash('success', t('Success, the changes were saved.'));
                $this->redirect(array('admin'));
            } else {
                Yii::app()->user->setFlash('error', t('Error, had been an error savind the item.'));
            }
        }

        $this->render('update', array(
            'model' => $model,
        ));
    }

    public function actionDelete($id)
    {
        if (isset($id)) {
            if ($this->loadModel($id, "I18nCategory")->delete()) {
                Yii::app()->user->setFlash('success', t('Success, the item was deleted.'));
                $this->redirect(array('admin'));
            } else {
                Yii::app()->user->setFlash('error', t('Error, exist a native error to delete the item: ' . $id . ', to resolve this problem, please contact with the database administrator.'));
            }
        } else {
            Yii::app()->user->setFlash('error', t('Error, the item ' . $id . ' is not defined.'));
        }
    }

    public function actionAdmin()
    {
        $model = new I18nCategory('search');
        //$model->unsetAttributes();

        if (isset($_GET['I18nCategory']))
            $model->setAttributes($_GET['I18nCategory']);

        $this->render('admin', array(
            'model' => $model,
        ));
    }
}