<?php

Yii::import('frankenstein.controllers.FController');
class SourceController extends FController
{
    public $defaultAction = 'index';

    public function behaviors()
    {
        return array(
            'widgets' => array(
                'class' => 'frankenstein.behaviors.controllers.FHasWidgetsBehavior',
            )
        );
    }


    public function accessRules()
    {
        return array(
            array('allow', 'roles' => array('Translator')),
            array('deny', 'users' => array('*'))
        );
    }


    public function actionIndex()
    {
        $model = new I18nSource('search');
        $data = Yii::app()->request->getParam('I18nSource');
        $category = Yii::app()->request->getParam('category');
        if (!empty($category)) {
            $model->category = $category;
        }
        if (!empty($data)) {
            $model->setAttributes($data);
        }
        $this->setupReturnUrl();
        $this->render('admin', array('model' => $model));
    }

    public function actionTranslate()
    {
        $id = Yii::app()->request->getParam('source');
        $model = $this->loadModel($id, 'I18nSource');

        $request = Yii::app()->getRequest();
        $translations = $request->getPost('translation', array());
        if (!empty($translations)) {

            foreach ($translations as $language => $translation) {
                $translationModel = I18nMessage::model()->findByPk(array('id' => $id, 'language' => $language));
                if (null === $translationModel) {
                    $translationModel = new I18nMessage();
                    $translationModel->setAttributes(array('id' => $id, 'language' => $language), false);
                }
                $translationModel->translation = $translation;
                $translationModel->save();
            }
            $this->notifyUser('success', Yii::t('app', 'Translations were saved.'));
            $this->redirectBack();
        }

        $this->render('translate', array('model' => $model));
    }
}

