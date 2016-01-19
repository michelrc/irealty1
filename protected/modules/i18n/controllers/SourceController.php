<?php
/**
 * The following code was generated automatically using GiixCrudCode
 * This generator was improve by iReevo Team
 */
?>

<?php

class SourceController extends GxController
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
                'actions' => array('minicreate', 'create', 'update', 'translate', 'admin', 'delete', 'updateAttribute'),
                'users' => mod('user')->getAdmins(),
            ),
            array('deny',
                'users' => array('*'),
            ),
        );
    }

    public function actionView($id)
    {
        $model = $this->loadModel($id, 'I18nSource');
        $this->render('view', array(
            'model' => $model,
        ));
    }

    public function actionTranslate($id)
    {
        $model = $this->loadModel($id, 'I18nSource');

        if (Yii::app()->request->isPostRequest) {
            $translations = Yii::app()->request->getPost('translation');

            foreach ($translations as $lang => $trans) {
                $message = I18nMessage::model()->findByPk(array('id' => $id, 'language' => $lang));
                if (null == $message) {
                    $message = new I18nMessage();
                    $message->setAttributes(array('id' => $id, 'language' => $lang));
                }

                $message->translation = $trans;
                $message->save();
            }

            Yii::app()->user->setFlash('success', t('Success, item was saved.'));
            $this->redirect(array('admin'));
        }

        $this->render('translate', array(
            'model' => $model,
        ));
    }

    public function actionCreate()
    {
        $model = new I18nSource;


        $this->performAjaxValidation($model, 'i18n-source-form');

        if (isset($_POST['I18nSource'])) {
            $model->setAttributes($_POST['I18nSource']);
            $relatedData = array(
                'i18nLanguages' => $_POST['I18nSource']['i18nLanguages'] === '' ? null : $_POST['I18nSource']['i18nLanguages'],
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
        $model = $this->loadModel($id, 'I18nSource');


        $this->performAjaxValidation($model, 'i18n-source-form');

        if (isset($_POST['I18nSource'])) {
            $model->setAttributes($_POST['I18nSource']);
            $relatedData = array(
                'i18nLanguages' => $_POST['I18nSource']['i18nLanguages'] === '' ? null : $_POST['I18nSource']['i18nLanguages'],
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
            if ($this->loadModel($id, "I18nSource")->delete()) {
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
        $model = new I18nSource('search');
        //$model->unsetAttributes();

        if (isset($_GET['I18nSource']))
            $model->setAttributes($_GET['I18nSource']);

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