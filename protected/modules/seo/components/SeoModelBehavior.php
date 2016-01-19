<?php

/**
 * Class SeoModelBehavior
 */
class SeoModelBehavior extends CActiveRecordBehavior
{
    static $_column_checked = array();
    public $behaviorName = 'seo';
    public $seo_model_attr = null;
    public $autoCreate = null;
    public $model = null;
    protected $_seoModel = null;
    /**
     * @var SeoModelMetaManager
     */
    protected $_seoMetaManager;

    public function getSeoUrl($lang = null)
    {

        /** @var SeoModel $model */
        $model = $this->getSeoModel(false);

        if ($model) {
            return $model->getSeoUrl();
        }
        return false;
    }

    /**
     * get the SeoModel instance for the model
     * @param bool $create create instance if not exists
     * @return CActiveRecord
     */
    public function getSeoModel($create = true)
    {
        if (!$this->_seoModel) {
            if (!$this->owner->isNewRecord) {
                $this->_seoModel = SeoModel::model()->findByAttributes(array(
                    $this->seo_model_attr => $this->owner->primaryKey
                ));
            }

            if (!$this->_seoModel && $create) {
                $this->_seoModel = new SeoModel();
            }
        }
        return $this->_seoModel;
    }

    public function seoFormWidget($form)
    {
        Yii::app()->controller->widget('application.modules.seo.widgets.SeoModelFormWidget.SeoModelFormWidget', array(
            'form' => $form,
            'model' => $this->owner,
        ));
    }

    public function seoViewWidget()
    {
        Yii::app()->controller->widget('application.modules.seo.widgets.SeoModelViewWidget.SeoModelViewWidget', array(
            'model' => $this->owner,
        ));
    }

    /**
     * @param CActiveRecord $owner
     */
    public function attach($owner)
    {
        parent::attach($owner);

        if (null === $this->model) {
            $this->model = str_replace('Base', '', get_class($this->owner));
        }

        if ($this->autoCreate === null) {
            $this->autoCreate = YII_DEBUG;
        }

        if ($this->seo_model_attr === null) {
            $this->seo_model_attr = "{$owner->tableName()}_id";
        }

        if (!isset(self::$_column_checked[$this->model]) && $this->autoCreate) {
            $this->checkColumn();
        }

    }

    private function checkColumn()
    {
        SeoModel::model()->refreshMetaData();

        $column = SeoModel::model()->getMetaData()->tableSchema->getColumn($this->seo_model_attr);

        if (!$column && !is_array($this->owner->tableSchema->primaryKey)) {
            $pk = $this->owner->tableSchema->getColumn($this->owner->tableSchema->primaryKey);

            $type = "{$pk->dbType} NULL DEFAULT NULL";

            $seo_table_name = mod('seo')->tableSeoModel;

            $schema = $this->owner->dbConnection->getSchema();

            $cmd = $schema->addColumn($seo_table_name, $this->seo_model_attr, $type);
            $this->owner->dbConnection->createCommand($cmd)->execute();

            $cmd = $schema->addForeignKey("{$seo_table_name}_" . $this->seo_model_attr . 'fk', $seo_table_name, $this->seo_model_attr, $this->owner->tableName(), $pk->name, 'CASCADE', 'CASCADE');
            $this->owner->dbConnection->createCommand($cmd)->execute();

            $cmd = $schema->createIndex("{$seo_table_name}_" . $this->seo_model_attr . 'idx', $seo_table_name, $this->seo_model_attr);
            $this->owner->dbConnection->createCommand($cmd)->execute();

        }
        self::$_column_checked[$this->model] = true;
    }

    public function beforeValidate($event)
    {
        $this->_seoModel = $this->getSeoModel();
        $this->_seoMetaManager = $this->getMetaManager();

        if (Yii::app()->request->isPostRequest && isset($_POST[get_class($this->_seoModel)])) {

            $this->_seoModel->attributes = $_POST[get_class($this->_seoModel)];

            $this->_seoModel->modelClassName = $this->model;

            if (isset($_POST[$this->_seoMetaManager->class])) {
                $this->_seoMetaManager->manage($_POST[$this->_seoMetaManager->class]);
            } else {
                $this->_seoMetaManager->manage(array());
            }

            if (!$this->_seoModel->validate() || !$this->_seoMetaManager->validate($this->_seoModel)) {
                $this->owner->addError('seo', Yii::t('app', 'Correct Seo Errors'));
            }
        }
    }

    public function getMetaManager()
    {
        if (!$this->_seoMetaManager) {
            $this->_seoMetaManager = SeoModelMetaManager::load($this->getSeoModel());
        }
        return $this->_seoMetaManager;
    }

    public function afterSave($event)
    {

        $model = $this->getSeoModel();
        $model->{$this->seo_model_attr} = $this->owner->primaryKey;
        $model->save();
        $this->_seoMetaManager->save($model);

        parent::afterSave($event);
    }

    protected function afterFinds($event)
    {
        if (($model = $this->getSeoModel()) && (!$model->isNewRecord)) {
            $this->owner->addRelatedRecord('seoModel', $model, false);
        } else {
            $this->owner->addRelatedRecord('seoModel', null, false);
        }
        parent::afterFind($event);
    }

}