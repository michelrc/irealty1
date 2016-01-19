<?php
/**
 * User: one
 * Date: 1/12/12
 * Time: 11:43 PM
 */
abstract class I18NMultiTableAdapter extends I18NAdapterAbstract
{
    protected $_saveCurrentTranslation = false;
    protected $_saveAllTranslations = false;

    protected $_translations = array();
    protected $__attributes;

    public static function _attr($attribute, $langID = null)
    {
        return 'i18n.' . $attribute;
    }

    /**
     * @abstract
     * @return array
     */
    //abstract public function i18nAttributes();

    public function defaultScope()
    {
        $foreignPk = $this->currentTranslation()->getMetaData()->tableSchema->primaryKey;
        $loc_table = $this->tableName() . '_' . app()->language;
        $pk = $this->getTableSchema()->primaryKey;
        return array(
            'join' => "LEFT JOIN `$loc_table` i18n ON ($pk = i18n.$foreignPk)"
        );
    }


    /**
     * @return I18NMultiTableTranslation
     */
    public function currentTranslation()
    {
        return $this->getLang(Yii::app()->language);
    }

    public function getTranslationModel($langID)
    {
        return I18NMultiTableTranslation::get($this, $langID);
    }


    public function translationRules()
    {
        return array();
    }

    /*public function defaultScope(){

        return array(
            'join'=>'INNER JOIN room_options_en tr ON (t.id = tr.option_id)',
        );
    }*/


    /**
     * @param  string $langID the language id for retrieve
     * @return GxActiveRecord
     */
    public function getLang($langID, $reload = false)
    {
        if (!isset($this->_translations[$langID]) || $reload) {
            $this->_translations[$langID] = I18NMultiTableTranslation::get($this, $langID);
        }
        return $this->_translations[$langID];
    }

    public function getTranslationAttributes()
    {
        if (null === $this->__attributes) {
            $this->__attributes = I18NMultiTableTranslation::get($this)->attributeNames();
        }
        return $this->__attributes;
    }

    /**
     * PHP getter magic method.
     * This method is overridden so that AR attributes can be accessed like properties.
     * @param string $name property name
     * @return mixed property value
     * @see getAttribute
     */
    public function __get($name)
    {
        if (in_array($name, $this->getTranslationAttributes())) {
            return $this->currentTranslation()->{$name};
        }
        return parent::__get($name);
    }

    /**
     * PHP setter magic method.
     * This method is overridden so that AR attributes can be accessed like properties.
     * @param string $name property name
     * @param mixed $value property value
     */
    public function __set($name, $value)
    {
        if (in_array($name, $this->getTranslationAttributes())) {
            if (is_array($value)) {
                $values = array_intersect_key($value, Language::getLanguageCodes());
                if (count($values) > 0) {
                    $this->_saveAllTranslations = true;
                }
                foreach ($values as $lang => $locValue) {
                    $this->getLang($lang)->{$name} = $locValue;
                }
                return $this;
            } else {
                $this->_saveCurrentTranslation = true;
                $this->currentTranslation()->{$name} = $value;
                return $this;
            }
        }
        parent::__set($name, $value);
    }


    /**
     * Saves the current record.
     *
     * The record is inserted as a row into the database table if its {@link isNewRecord}
     * property is true (usually the case when the record is created using the 'new'
     * operator). Otherwise, it will be used to update the corresponding row in the table
     * (usually the case if the record is obtained using one of those 'find' methods.)
     *
     * Validation will be performed before saving the record. If the validation fails,
     * the record will not be saved. You can call {@link getErrors()} to retrieve the
     * validation errors.
     *
     * If the record is saved via insertion, its {@link isNewRecord} property will be
     * set false, and its {@link scenario} property will be set to be 'update'.
     * And if its primary key is auto-incremental and is not set before insertion,
     * the primary key will be populated with the automatically generated key value.
     *
     * @param boolean $runValidation whether to perform validation before saving the record.
     * If the validation fails, the record will not be saved to database.
     * @param array $attributes list of attributes that need to be saved. Defaults to null,
     * meaning all attributes that are loaded from DB will be saved.
     * @return boolean whether the saving succeeds
     */
    public function save($runValidation = true, $attributes = null)
    {
        if (!$runValidation || $this->validate($attributes)) {
            $conn = $this->getDbConnection();
            $trans = $conn->getCurrentTransaction() ? null : $conn->beginTransaction(); //do nothing if there is an active transaction
            $return = ($this->getIsNewRecord() ? $this->insert($attributes) : $this->update($attributes)) && $this->_saveLanguages($runValidation, $attributes);

            if ($trans) {
                if ($return) {
                    $trans->commit();
                } else {
                    $trans->rollback();
                }
            }
            return $return;
        } else
            return false;
    }

    /**
     * Returns all column attribute values.
     * Note, related objects are not returned.
     * @param mixed $names names of attributes whose value needs to be returned.
     * If this is true (default), then all attribute values will be returned, including
     * those that are not loaded from DB (null will be returned for those attributes).
     * If this is null, all attributes except those that are not loaded from DB will be returned.
     * @return array attribute values indexed by attribute names.
     */
    public function getAttributes($names = true)
    {
        $r = $this->currentTranslation();

        $attributeNames = $r->attributeNames();
        if (is_array($names)) {
            $attributeNames = array_intersect($attributeNames, $names);
        }

        $attributes = $r->getAttributes($attributeNames);

        return array_merge(parent::getAttributes($names), $attributes);
    }

    protected function _saveLanguages($runValidation = true, $attributes = null)
    {
        $ok = true;

        if ($this->_saveAllTranslations) {
            $foreignPk = $this->currentTranslation()->getMetaData()->tableSchema->primaryKey;
            foreach (Language::getLanguageCodes() as $lang) {
                $l = $this->getLang($lang);
                try {
                    $ok &= $l->save($runValidation, $attributes);
                } catch (CDbException $e) {
                    $ok = false;
                }
            }
        } elseif ($this->_saveCurrentTranslation) {
            $ok &= $this->currentTranslation()->save();
        }

        return $ok;
    }

    public function attributeNames()
    {
        return array_merge(parent::attributeNames(), $this->currentTranslation()->attributeNames());
    }

    public function getSafeAttributeNames()
    {
        return array_merge(parent::getSafeAttributeNames(), $this->currentTranslation()->attributeNames());
    }

    public function tranlationTableName($langID)
    {
        return "{$this->tableName()}_$langID";
    }


    public function uninstallTranslationSchema()
    {
        $tables = app()->db->createCommand('SHOW TABLES')->queryColumn();
        foreach (Language::getLanguageCodes() as $lang) {
            $tableName = $this->tranlationTableName($lang);

            if (in_array($tableName, $tables)) {
                app()->db->createCommand(
                    Yii::app()->db->getSchema()->dropTable($tableName)
                )->execute();
            }
        }
    }

    public function installTranslationSchema($removeColumns = false)
    {
        $tables = app()->db->createCommand('SHOW TABLES')->queryColumn();

        $schema = $this->getTableSchema();
        $primary = $schema->getColumn($schema->primaryKey);

        $foreignType = $primary->dbType . ' PRIMARY KEY ';


        foreach (Language::getLanguageCodes() as $lang) {
            $tableName = $this->tranlationTableName($lang);
            if (!in_array($tableName, $tables)) {
                app()->db->createCommand()->createTable($tableName, array(
                    'parent_id' => $foreignType
                ));

                app()->db->createCommand(app()->db->getSchema()->addForeignKey('FK' . $tableName, $tableName, 'parent_id', $this->tableName(), $schema->primaryKey, 'CASCADE', 'CASCADE'))->execute();
            }

            foreach ($this->i18nAttributes() as $column) {
                $columnSchema = $schema->getColumn($column);
                $columnType = $columnSchema->dbType;

                if (!$columnSchema->allowNull) {
                    $columnType .= ' NOT NULL ';
                }

                if ($columnSchema->defaultValue) {
                    $columnType .= " DEFAULT '" . $columnSchema->defaultValue . "'";
                }

                try {
                    app()->db->createCommand()->addColumn($tableName, $column, $columnType);
                } catch (Exception $e) {
                }

                try {
                    if ($columnSchema->isForeignKey) {
                        list($fTable, $fKey) = $schema->foreignKeys[$column];
                        app()->db->getSchema()->addForeignKey($column, $tableName, $column, $fTable, $fKey);
                    }
                } catch (Exception $e) {
                }


            }
        }

        if ($removeColumns) {
            foreach ($this->i18nAttributes() as $column) {
                Yii::app()->db->createCommand()->dropColumn($this->tableName(), $column);
            }
        }
    }
}

class I18NMultiTableTranslation extends GxActiveRecord
{
    /**
     * @var GxActiveRecord The base model
     */
    protected $__model = null;
    protected $__lang = null;
    protected $__rulesMethodName = 'translationRules';

    private $_pk; // old primary key value

    protected $_item = null;


    private static $_models = array(); // class name => model
    private $_md; // meta data

    public function __construct($model, $languaje = null, $scenario = null)
    {
        if (null === $model) {
            throw new Exception("You must provide a model instance to be translated");
        }
        $this->__model = $model;
        $this->__lang = $languaje ? $languaje : Yii::app()->language;

        parent::__construct($scenario);
    }

    public function getLanguage()
    {
        return $this->__lang;
    }

    public function getRelationLabel($relationName, $n = null, $useRelationLabel = true)
    {
        return $this->__model->getRelationLabel($relationName, $n) . ' (' . $this->getLanguage() . ')';
    }

    public function rules()
    {
        if ($this->__model && method_exists($this->__model, 'translationRules')) {
            return $this->__model->{$this->__rulesMethodName}();
        }
        return array();
    }

    /**
     * Returns the meta-data for this AR
     * @return CActiveRecordMetaData the meta for this AR class.
     */
    public function getMetaData()
    {
        if ($this->_md !== null)
            return $this->_md;
        else {
            $this->_md = self::model($this->__model, $this->__lang)->_md;
            return $this->_md;
        }
    }

    public function init()
    {
        if ($pk = $this->__model->getPrimaryKey()) {
            $this->setPrimaryKey($pk);
        } else {
            ddump($this->__model->attributes);
        }
    }

    public function beforeValidate()
    {
        if ($pk = $this->__model->getPrimaryKey()) {
            $this->setPrimaryKey($pk);
        }
        return parent::beforeValidate();
    }

    /**
     * Get or create a translation if it doesn't exists
     * @param CActiveRecord $model
     * @param string $language
     * @return GxActiveRecord
     */
    public static function get($model, $language = null)
    {
        $translationModel = self::model($model, $language);
        if (null !== ($translation = $translationModel->findByPk($model->getPrimaryKey()))) {
            return $translation;
        } else {
            return $translationModel;
        }
    }

    protected function _getRealItem()
    {
        if (null === $this->_item) {
            $this->_item = $this->model($this->__model, $this->__lang)->findByPk($this->__model->getPrimaryKey());
        }
        return $this->_item;
    }

    /**
     * Returns if the current record is new.
     * @return boolean whether the record is new and should be inserted when calling {@link save}.
     * This property is automatically set in constructor and {@link populateRecord}.
     * Defaults to false, but it will be set to true if the instance is created using
     * the new operator.
     */
    public function getIsNewRecord()
    {
        return !$this->_getRealItem();
    }

    public function tableName()
    {
        return $this->__model->tableName() . '_' . $this->__lang;
    }

    public static function label($n = 1)
    {
        return Yii::t('app', 'Translation|Translations', $n);
    }

    protected function instantiate($attributes)
    {
        $class = get_class($this);
        $model = new $class($this->__model, $this->__lang);
        return $model;
    }


    /**
     * Returns the static model of the specified AR class.
     * The model returned is a static instance of the AR class.
     * It is provided for invoking class-level methods (something similar to static class methods.)
     *
     * EVERY derived AR class must override this method as follows,
     * <pre>
     * public static function model($className=__CLASS__)
     * {
     *     return parent::model($className);
     * }
     * </pre>
     *
     * @param string $className active record class name.
     * @return CActiveRecord active record model instance.
     */
    public static function model($baseModel, $language = null)
    {
        $language = $language ? $language : Yii::app()->language;
        $className = get_class($baseModel) . strtoupper($language);

        $model = self::$_models[$className] = new self($baseModel, $language);
        $model->_md = new CActiveRecordMetaData($model);
        $model->attachBehaviors($model->behaviors());
        return $model;
    }

    public function getSafeAttributeNames()
    {
        return $this->attributeNames();
    }

    public function attributeNames()
    {
        $all = array_flip(parent::attributeNames());
        $PkName = $this->getMetaData()->tableSchema->primaryKey;
        unset($all[$PkName]);
        return array_keys($all);
    }

    /**
     * Inserts a row into the table based on this active record attributes.
     * If the table's primary key is auto-incremental and is null before insertion,
     * it will be populated with the actual value after insertion.
     * Note, validation is not performed in this method. You may call {@link validate} to perform the validation.
     * After the record is inserted to DB successfully, its {@link isNewRecord} property will be set false,
     * and its {@link scenario} property will be set to be 'update'.
     * @param array $attributes list of attributes that need to be saved. Defaults to null,
     * meaning all attributes that are loaded from DB will be saved.
     * @return boolean whether the attributes are valid and the record is inserted successfully.
     * @throws CException if the record is not new
     */
    public function insert($attributes = null)
    {
        if (!$this->getIsNewRecord())
            throw new CDbException(Yii::t('yii', 'The active record cannot be inserted to database because it is not new.'));
        if ($this->beforeSave()) {

            Yii::trace(get_class($this) . '.insert()', 'system.db.ar.CActiveRecord');
            $builder = $this->getCommandBuilder();
            $table = $this->getMetaData()->tableSchema;
            $primaryKey = $table->primaryKey;
            $this->$primaryKey = $this->__model->getPrimaryKey();
            //$command=$builder->createInsertCommand($table,$this->getAttributes($attributes)+array($table->primaryKey=>$this->__model->getPrimaryKey()));
            $command = $builder->createInsertCommand($table, $this->getAttributes($attributes));

            if ($command->execute()) {
                $primaryKey = $table->primaryKey;
                if ($table->sequenceName !== null) {
                    if (is_string($primaryKey) && $this->$primaryKey === null)
                        $this->$primaryKey = $builder->getLastInsertID($table);
                    else if (is_array($primaryKey)) {
                        foreach ($primaryKey as $pk) {
                            if ($this->$pk === null) {
                                $this->$pk = $builder->getLastInsertID($table);
                                break;
                            }
                        }
                    }
                }
                $this->_pk = $this->getPrimaryKey();
                $this->afterSave();
                $this->setIsNewRecord(false);
                $this->setScenario('update');
                return true;
            }
        }
        return false;
    }


    /**
     * Updates the row represented by this active record.
     * All loaded attributes will be saved to the database.
     * Note, validation is not performed in this method. You may call {@link validate} to perform the validation.
     * @param array $attributes list of attributes that need to be saved. Defaults to null,
     * meaning all attributes that are loaded from DB will be saved.
     * @return boolean whether the update is successful
     * @throws CException if the record is new
     */
    public function update($attributes = null)
    {
        if ($this->getIsNewRecord())
            throw new CDbException(Yii::t('yii', 'The active record cannot be updated because it is new.'));

        if ($this->beforeSave()) {
            Yii::trace(get_class($this) . '.update()', 'system.db.ar.CActiveRecord');
            if ($this->_pk === null)
                $this->_pk = $this->getPrimaryKey();

            $this->updateByPk($this->getOldPrimaryKey(), $this->getAttributes($attributes));
            $this->_pk = $this->getPrimaryKey();
            $this->afterSave();
            return true;
        } else
            return false;
    }

    /**
     * Saves the current record.
     *
     * The record is inserted as a row into the database table if its {@link isNewRecord}
     * property is true (usually the case when the record is created using the 'new'
     * operator). Otherwise, it will be used to update the corresponding row in the table
     * (usually the case if the record is obtained using one of those 'find' methods.)
     *
     * Validation will be performed before saving the record. If the validation fails,
     * the record will not be saved. You can call {@link getErrors()} to retrieve the
     * validation errors.
     *
     * If the record is saved via insertion, its {@link isNewRecord} property will be
     * set false, and its {@link scenario} property will be set to be 'update'.
     * And if its primary key is auto-incremental and is not set before insertion,
     * the primary key will be populated with the automatically generated key value.
     *
     * @param boolean $runValidation whether to perform validation before saving the record.
     * If the validation fails, the record will not be saved to database.
     * @param array $attributes list of attributes that need to be saved. Defaults to null,
     * meaning all attributes that are loaded from DB will be saved.
     * @return boolean whether the saving succeeds
     */
    public function save($runValidation = true, $attributes = null)
    {
        if (!$runValidation || $this->validate($attributes))
            if ($this->getIsNewRecord()) {
                return $this->insert($attributes);
            } else {
                return $this->update($attributes);
            }
        else {
            return false;
        }
    }
}