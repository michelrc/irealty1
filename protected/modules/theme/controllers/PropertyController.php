<?php
/**
 * The following code was generated automatically using GiixCrudCode
 * This generator was improve by iReevo Team
 */
?>

<?php

class PropertyController extends GxController
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
                'actions' => array('index', 'view', 'update', 'admin', 'updateCombo'),
//                'users' => user()->getPermissionbyRoles(array('Level-1', 'Level-2', 'Level-3')),
                  'users' => array('@'),
            ),
            array('allow',
                'actions' => array('minicreate', 'create', 'update', 'admin', 'delete', 'updateCombo'),
//                'users' => mod('user')->getAdmins(),
                  'users' => array('@'),
            ),
            array('deny',
                'users' => array('*'),
            ),
        );
    }

    public function actionView($id)
    {
        $model = $this->loadModel($id, 'Property');
        $this->render('view', array(
            'model' => $model,
        ));
    }

    public function actionCreate()
    {
        $model = new Property;
        $gallery_model = ProductGalleryManager::load($model);

        $this->performAjaxValidation($model, 'property-form');
        $criteria = new CDbCriteria();
        $criteria->order = 'create_time desc';

        if (isset($_POST['Property'])) {
            $model->setAttributes($_POST['Property']);

            $p_amenities = $_POST['PropertyAmenitie'];

            $model->propertyAmenities = array();

            $del_amenities_criteria = new CDbCriteria();
            is_array($p_amenities) ? $p_amenities : $p_amenities = array();
            $del_amenities_criteria->addNotInCondition('id', array_keys($p_amenities));
            $del_amenities_criteria->compare('property_id', $model->id);
            PropertyAmenitie::model()->deleteAll($del_amenities_criteria);
            $amenitie_saved = true;

            $arr_temp = array();
            foreach ($p_amenities as $key => $p_amenity) {
                if (substr_count($key, 'newamenitie')) {
                    $temp_p_a = new PropertyAmenitie();
                    $temp_p_a->setAttributes($p_amenity);

                } else {
                    $temp_p_a = PropertyAmenitie::model()->findByPk($key);
                    $temp_p_a->setAttributes($p_amenity);
                }

                $temp_p_a->property_id = $model->id;
                if (!$temp_p_a->validate()) {
                    $amenitie_saved = false;
                }

                $arr_temp[] = $temp_p_a;
            }
            $model->propertyAmenities = $arr_temp;

            if ($amenitie_saved && $model->save()) {
                $galls = $_POST['PropertyGallery'];
                $gall_upload_dir = Yii::getPathOfAlias('webroot') . DIRECTORY_SEPARATOR . 'images/PropertyGallery/';

                $del_gall_criteria = new CDbCriteria();
                is_array($galls) ? $galls : $galls = array();
                $del_gall_criteria->addNotInCondition('id', array_keys($galls));
                $del_gall_criteria->compare('property', $model->id);

                PropertyGallery::model()->deleteAll($del_gall_criteria);

                Yii::import('application.extensions.image.Image');
                foreach ($galls as $key => $gall) {
                    if (substr_count($key, 'newgall')) {
                        $temp_gall = new PropertyGallery;
                        $temp_gall->setAttributes($gall);
                        $temp_gall->property = $model->id;
                        $temp_gall->save();
                        $temp_extension = explode('.', $_FILES['PropertyGallery']["name"][$key]['recipeImg1']);
                        $img_path = $gall_upload_dir . 'img1_' . $temp_gall->id . '_normal.' . $temp_extension[1];

                        move_uploaded_file($_FILES['PropertyGallery']["tmp_name"][$key]['recipeImg1'], $img_path);

                        $image = new Image($img_path, array('driver' => 'GD', 'params' => array()));
                        $image->resize(728, 486, Image::NONE);
                        $image->save();
                    } else {
                        $gall_obj = PropertyGallery::model()->findByPk($key);
                        $gall_obj->setAttributes($gall);
                        $gall_obj->save();

                        if ($_FILES['PropertyGallery']["tmp_name"][$key]['recipeImg1']) {

                            $temp_extension = explode('.', $_FILES['PropertyGallery']["name"][$key]['recipeImg1']);
                            $img_path = $gall_upload_dir . 'img1_' . $gall_obj->id . '_normal.' . $temp_extension[1];

                            if (file_exists($gall_obj->_image->getFileFullName()))
                                unlink($gall_obj->_image->getFileFullName());

                            move_uploaded_file($_FILES['PropertyGallery']["tmp_name"][$key]['recipeImg1'], $img_path);

                            $image = new Image($img_path, array('driver' => 'GD', 'params' => array()));
                            $image->resize(728, 486, Image::NONE);
                            $image->save();
                        }
                    }
                }


                foreach ($model->propertyAmenities as $a) {
                    $a->save();
                }

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

        $this->render('create', array('model' => $model, 'gallery_model' => $gallery_model,
            'criteria' => $criteria));
    }

    public function actionUpdate($id)
    {
        $model = $this->loadModel($id, 'Property');

        $this->performAjaxValidation($model, 'property-form');

//        ddump($_POST['PropertyGallery']);

        if (isset($_POST['Property'])) {
            $model->attributes = $_POST['Property'];
            $p_amenities = $_POST['PropertyAmenitie'];

            $model->propertyAmenities = array();

            $del_amenities_criteria = new CDbCriteria();
            is_array($p_amenities) ? $p_amenities : $p_amenities = array();
            $del_amenities_criteria->addNotInCondition('id', array_keys($p_amenities));
            $del_amenities_criteria->compare('property_id', $model->id);
            PropertyAmenitie::model()->deleteAll($del_amenities_criteria);
            $amenitie_saved = true;

            $arr_temp = array();
            foreach ($p_amenities as $key => $p_amenity) {
                if (substr_count($key, 'newamenitie')) {
                    $temp_p_a = new PropertyAmenitie();
                    $temp_p_a->setAttributes($p_amenity);

                } else {
                    $temp_p_a = PropertyAmenitie::model()->findByPk($key);
                    $temp_p_a->setAttributes($p_amenity);
                }

                $temp_p_a->property_id = $model->id;
                if (!$temp_p_a->validate()) {
                    $amenitie_saved = false;
                }

                $arr_temp[] = $temp_p_a;
            }
            $model->propertyAmenities = $arr_temp;

            if ($amenitie_saved && $model->save()) {
                $galls = $_POST['PropertyGallery'];
                $gall_upload_dir = Yii::getPathOfAlias('webroot') . DIRECTORY_SEPARATOR . 'images/PropertyGallery/';

                $del_gall_criteria = new CDbCriteria();
                is_array($galls) ? $galls : $galls = array();
                $del_gall_criteria->addNotInCondition('id', array_keys($galls));
                $del_gall_criteria->compare('property', $model->id);

                PropertyGallery::model()->deleteAll($del_gall_criteria);

                Yii::import('application.extensions.image.Image');
                foreach ($galls as $key => $gall) {
                    if (substr_count($key, 'newgall')) {
                        $temp_gall = new PropertyGallery;
                        $temp_gall->setAttributes($gall);
                        $temp_gall->property = $model->id;
                        $temp_gall->save();
                        $temp_extension = explode('.', $_FILES['PropertyGallery']["name"][$key]['recipeImg1']);
                        $img_path = $gall_upload_dir . 'img1_' . $temp_gall->id . '_normal.' . $temp_extension[1];

                        move_uploaded_file($_FILES['PropertyGallery']["tmp_name"][$key]['recipeImg1'], $img_path);

                        $image = new Image($img_path, array('driver' => 'GD', 'params' => array()));
                        $image->resize(728, 486, Image::NONE);
                        $image->save();
                    } else {
                        $gall_obj = PropertyGallery::model()->findByPk($key);
                        $gall_obj->setAttributes($gall);
                        $gall_obj->save();

                        if ($_FILES['PropertyGallery']["tmp_name"][$key]['recipeImg1']) {

                            $temp_extension = explode('.', $_FILES['PropertyGallery']["name"][$key]['recipeImg1']);
                            $img_path = $gall_upload_dir . 'img1_' . $gall_obj->id . '_normal.' . $temp_extension[1];

                            if (file_exists($gall_obj->_image->getFileFullName()))
                                unlink($gall_obj->_image->getFileFullName());

                            move_uploaded_file($_FILES['PropertyGallery']["tmp_name"][$key]['recipeImg1'], $img_path);

                            $image = new Image($img_path, array('driver' => 'GD', 'params' => array()));
                            $image->resize(728, 486, Image::NONE);
                            $image->save();
                        }
                    }
                }
                foreach ($model->propertyAmenities as $a) {
                    $a->save();
                }

                Yii::app()->user->setFlash('success', t('Success, the changes were saved.'));
                $this->redirect(array('admin'));
            } else {
                Yii::app()->user->setFlash('error', t('Error, had been an error savind the item.'));
            }

        }

        $gallery_model = ProductGalleryManager::load($model);

        $this->render('update', array(
            'model' => $model,
            'gallery_model' => $gallery_model
        ));
    }

    public function actionDelete($id)
    {
        if (isset($id)) {
            if ($this->loadModel($id, "Property")->delete()) {
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
        $model = new Property('search');
        //$model->unsetAttributes();

        if (isset($_GET['Property']))
            $model->setAttributes($_GET['Property']);

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    public function actionUpdateCombo()
    {
        $t = $_POST['model'];
        $model = GxActiveRecord::model($t);
        if ($t = 'Agent') {
            $criteria = new CDbCriteria();
            $criteria->order = 'create_time desc';
            foreach ($model->findAll($criteria) as $item) {
                echo "<option value='" . $item->id . "'>" . $item->__toString() . "</option>";
            }
        } else {
            foreach ($model->findAll() as $item) {
                echo "<option value='" . $item->id . "'>" . $item->__toString() . "</option>";
            }
        }
    }


}