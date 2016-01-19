<?php
/**
 * The following code was generated automatically using GiixCrudCode
 * This generator was improve by iReevo Team
 */
?>

<?php

class LanguageController extends GxController
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
                'actions' => array('minicreate', 'create', 'update', 'admin', 'delete', 'updateAttribute'),
                'users' => mod('user')->getAdmins(),
            ),
            array('deny',
                'users' => array('*'),
            ),
        );
    }

    public function actionView($id)
    {
        $model = $this->loadModel($id, 'Language');
        $this->render('view', array(
            'model' => $model,
        ));
    }

    public function actionCreate()
    {
        $model = new Language;


        $this->performAjaxValidation($model, 'language-form');

        if (isset($_POST['Language'])) {
            $model->setAttributes($_POST['Language']);
            $relatedData = array(
                'sources' => $_POST['Language']['sources'] === '' ? null : $_POST['Language']['sources'],
            );

            if ($model->saveWithRelated($relatedData)) {
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
        $model = $this->loadModel($id, 'Language');


        $this->performAjaxValidation($model, 'language-form');

        if (isset($_POST['Language'])) {
            $model->setAttributes($_POST['Language']);
            $relatedData = array(
                'sources' => $_POST['Language']['sources'] === '' ? null : $_POST['Language']['sources'],
            );

            if ($model->saveWithRelated($relatedData)) {
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
            if ($this->loadModel($id, "Language")->delete()) {
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
        $model = new Language('search');
        //$model->unsetAttributes();

        if (isset($_GET['Language']))
            $model->setAttributes($_GET['Language']);

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    public function actionUpdateAttribute($model)
    {
        if (app()->request->isAjaxRequest && app()->request->isPostRequest) {
            Yii::import("bootstrap.widgets.TbEditableSaver");
            $editableSaver = new TbEditableSaver($model);
            ddump($model);
            $editableSaver->update();
            app()->end();
        }
    }

}