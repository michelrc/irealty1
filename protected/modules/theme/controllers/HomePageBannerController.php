<?php
/**
 * The following code was generated automatically using GiixCrudCode
 * This generator was improve by iReevo Team
 */
?>

<?php

class HomePageBannerController extends GxController
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
                'actions' => array('index', 'view', 'createItem', 'createWhySHopIconsItem'),
                'users' => array('@'),
            ),
            array('allow',
                'actions' => array('index', 'view', 'update', 'admin', 'createItem', 'createWhySHopIconsItem'),
                'users' => user()->getPermissionbyRoles(array('Level-1', 'Level-2', 'Level-3')),
            ),
            array('allow',
                'actions' => array('minicreate', 'create', 'update', 'admin', 'delete', 'createItem', 'createWhySHopIconsItem'),
                'users' => mod('user')->getAdmins(),
            ),
            array('deny',
                'users' => array('*'),
            ),
        );
    }

    public function actionView($id)
    {
        $model = $this->loadModel($id, 'HomePageBanner');
        $this->render('view', array(
            'model' => $model,
        ));
    }

    public function actionCreateItem()
    {
        $this->layout = '//layouts/box_without_menu';
        $model = new HomePageBanner;

        if (isset($_POST['HomePageBanner'])) {
            $model->setAttributes($_POST['HomePageBanner']);

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
        $this->render('_create', array('model' => $model));
    }

    public function actionCreateWhySHopIconsItem()
    {
        $this->layout = '//layouts/box_without_menu';
        $model = new HomePageWhyShopIcons;

        if ($model->count() >= 3)
            $this->redirect(array('admin'));

        if (isset($_POST['HomePageWhyShopIcons'])) {
            $model->setAttributes($_POST['HomePageWhyShopIcons']);

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
        $this->render('_createWhyShopIcons', array('model' => $model));
    }

    public function actionCreate()
    {
//        ddump($_FILES);
        $model = new HomePageBanner('search');
        $model_why_shop_icons = new HomePageWhyShopIcons('search');

        $model_contact_us = HomePageContactUs::model()->find();
        $model_leading_properties = HomePageLeadingProperty::model()->find();
        $model_recent_properties = HomePageRecentsProperties::model()->find();
        $model_why_shop = HomePageWhyShop::model()->find();
        $model_testimonies = HomePageTestimonials::model()->find();


        $this->performAjaxValidation($model, 'home-page-banner-form');


        if (isset($_POST['HomePageContactUs']) && isset($_POST['HomePageLeadingProperty'])
            && isset($_POST['HomePageRecentsProperties']) && isset($_POST['HomePageWhyShop']) && isset($_POST['HomePageTestimonials'])
        ) {
//			$model->setAttributes($_POST['HomePageBanner']);
            $model_leading_properties->setAttributes($_POST['HomePageLeadingProperty']);
            $model_recent_properties->setAttributes($_POST['HomePageRecentsProperties']);
            $model_why_shop->setAttributes($_POST['HomePageWhyShop']);
            $model_testimonies->setAttributes($_POST['HomePageTestimonials']);
            $model_contact_us->setAttributes($_POST['HomePageContactUs']);

            if ($model_leading_properties->validate() && $model_recent_properties->validate()
                && $model_why_shop->validate() && $model_testimonies->validate() && $model_contact_us->validate()
            ) {
                $model->save();
                $model_leading_properties->save();
                $model_recent_properties->save();
                $model_why_shop->save();
                $model_testimonies->save();
                $model_contact_us->save();

                if (Yii::app()->getRequest()->getIsAjaxRequest())
                    Yii::app()->end();
                else {
                    Yii::app()->user->setFlash('success', t('Success, item was saved.'));
                    $this->redirect(array('create'));
                }
            } else {
                Yii::app()->user->setFlash('error', t('Error, had been an error saving item.'));
            }
        }

        $this->render('create', array('model' => $model,
            'model_leading_properties' => $model_leading_properties,
            'model_recent_properties' => $model_recent_properties,
            'model_why_shop' => $model_why_shop,
            'model_why_shop_icons' => $model_why_shop_icons,
            'model_testimonies' => $model_testimonies,
            'model_contact_us' => $model_contact_us));
    }

    public function actionUpdate($id)
    {
        $model = $this->loadModel($id, 'HomePageBanner');
        $model_why_shop_icons = new HomePageWhyShopIcons('search');

        $model_contact_us = HomePageContactUs::model()->find();
        $model_leading_properties = HomePageLeadingProperty::model()->find();
        $model_recent_properties = HomePageRecentsProperties::model()->find();
        $model_why_shop = HomePageWhyShop::model()->find();
        $model_testimonies = HomePageTestimonials::model()->find();


        $this->performAjaxValidation($model, 'home-page-banner-form');

        $this->performAjaxValidation($model, 'home-page-banner-form');


        if (isset($_POST['HomePageContactUs']) && isset($_POST['HomePageLeadingProperty'])
            && isset($_POST['HomePageRecentsProperties']) && isset($_POST['HomePageWhyShop']) && isset($_POST['HomePageTestimonials'])
        ) {
//			$model->setAttributes($_POST['HomePageBanner']);
            $model_leading_properties->setAttributes($_POST['HomePageLeadingProperty']);
            $model_recent_properties->setAttributes($_POST['HomePageRecentsProperties']);
            $model_why_shop->setAttributes($_POST['HomePageWhyShop']);
            $model_testimonies->setAttributes($_POST['HomePageTestimonials']);
            $model_contact_us->setAttributes($_POST['HomePageContactUs']);

            if ($model_leading_properties->validate() && $model_recent_properties->validate()
                && $model_why_shop->validate() && $model_testimonies->validate() && $model_contact_us->validate()
            ) {
                $model->save();
                $model_leading_properties->save();
                $model_recent_properties->save();
                $model_why_shop->save();
                $model_testimonies->save();
                $model_contact_us->save();

                if (Yii::app()->getRequest()->getIsAjaxRequest())
                    Yii::app()->end();
                else {
                    Yii::app()->user->setFlash('success', t('Success, item was saved.'));
                    $this->redirect(array('create'));
                }
            } else {
                Yii::app()->user->setFlash('error', t('Error, had been an error saving item.'));
            }
        }

        $this->render('update', array(
            'model' => $model,
            'model_contact_us' => $model_contact_us,
            'model_leading_properties' => $model_leading_properties,
            'model_recent_properties' => $model_recent_properties,
            'model_why_shop' => $model_why_shop,
            'model_why_shop_icons' => $model_why_shop_icons,
            'model_testimonies' => $model_testimonies,
        ));
    }

    public function actionDelete($id)
    {
        if (isset($id)) {
            if ($this->loadModel($id, "HomePageBanner")->delete()) {
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
        $model = new HomePageBanner('search');
        //$model->unsetAttributes();

        if (isset($_GET['HomePageBanner']))
            $model->setAttributes($_GET['HomePageBanner']);

        $this->render('admin', array(
            'model' => $model,
        ));
    }

}
