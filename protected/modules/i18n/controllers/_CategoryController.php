<?php

Yii::import('frankenstein.controllers.FController');
class CategoryController extends FController
{
    public $defaultAction = 'admin';
    public $layout = '//layouts/column1';


    public function behaviors()
    {
        return array(
            'widgets' => array(
                'class' => 'frankenstein.behaviors.controllers.FHasWidgetsBehavior',
            ),
        );
    }

    public function accessRules()
    {
        return array(
            array('allow', 'roles' => array('Translator')),
            array('deny', 'users' => array('*'))
        );
    }

    public function actionAdmin()
    {
        $model = new I18nCategory('search');
        $model->setAttributes(Yii::app()->request->getParam('I18nCategory'));
        $this->render('admin', array('model' => $model));
    }

    public function actionCreate()
    {
        $model = new I18nCategory();
        $data = Yii::app()->request->getParam('I18nCategory');
        if (!empty($data)) {
            $model->setAttributes($data);

            $this->performAjaxValidation($model, 'category-form');

            if ($model->save()) {
                $this->notifyUser('success', Yii::t('app', 'The category was successfully created.'));
                $this->redirect(array($this->defaultAction));
            }
        }
        $this->render('create', array('model' => $model));
    }

    public function actionUpdate()
    {
        $model = $this->loadModel(Yii::app()->request->getParam('id'), 'I18nCategory');
        $data = Yii::app()->request->getParam('I18nCategory');
        if (!empty($data)) {
            $model->setAttributes($data);

            $this->performAjaxValidation($model, 'category-form');

            if ($model->save()) {
                $this->notifyUser('success', Yii::t('app', 'The category was successfully created.'));
                $this->redirect(array($this->defaultAction));
            }
        }
        $this->render('update', array('model' => $model));
    }

    public function actionView()
    {
        $model = $this->loadModel(Yii::app()->request->getParam('id'), 'I18nCategory');
        $this->render('view', array('model' => $model));
    }

    public function actionDelete()
    {
        /** @var $model I18nCategory */
        $model = $this->loadModel(Yii::app()->request->getParam('id'), 'I18nCategory');
        $model->delete();
        $this->notifyUser('success', Yii::t('app', 'The category was successfully delete.'));
        $this->notifyUser('warning', Yii::t('app', 'Some categories will automatically reappear.'));
        $this->redirect(array($this->defaultAction));
    }
}
