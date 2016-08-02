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
                $criteria = new CDbCriteria();
                $criteria->condition = 'isDefault = :isDefault';
                $criteria->params = array(':isDefault' => 1);
                $criteria2 = new CDbCriteria();
                $criteria2->condition = 'enable = :enable';
                $criteria2->params = array(':enable' => 1);

                $enable_languages = Language::model()->find($criteria2);
                $language = Language::model()->find($criteria);

                if (count($enable_languages) == 0) {
                    unset($_SESSION['language']);
                    $_SESSION['language'] = Yii::app()->params['language'];
                }
                if ($language) {
                    unset($_SESSION['language']);
                    if ($language->name == 'Español') {
                        $_SESSION['language'] = 'es';
                        var_dump($_SESSION['language']);
                    }
                    if ($language->name == 'English') {
                        $_SESSION['language'] = 'en';
                        var_dump($_SESSION['language']);
                    }
                } else {
                    $_SESSION['language'] = 'es';
                }
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
            
            $editableSaver->update();
            $criteria = new CDbCriteria();
            $criteria->condition = 'isDefault = :isDefault';
            $criteria->params = array(':isDefault' => 1);

            $criteria2 = new CDbCriteria();
            $criteria2->condition = 'enable = :enable';
            $criteria2->params = array(':enable' => 1);

            $enable_languages = Language::model()->count($criteria2);
            $language = Language::model()->find($criteria);

            if ($enable_languages == 0) {
                unset($_SESSION['language']);
                $_SESSION['language'] = Yii::app()->params['language'];
            }

            if ($language) {
                unset($_SESSION['language']);
                if ($language->name == 'Español') {
                    $_SESSION['language'] = 'es';
                    var_dump($_SESSION['language']);
                }
                if ($language->name == 'English') {
                    $_SESSION['language'] = 'en';
                    var_dump($_SESSION['language']);
                }
            } else {
                $_SESSION['language'] = 'es';
            }
            app()->end();
        }
    }

}