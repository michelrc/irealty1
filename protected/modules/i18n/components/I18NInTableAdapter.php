<?php
/**
 * User: one
 * Date: 1/12/12
 * Time: 11:43 PM
 */
abstract class I18NInTableAdapter extends I18NAdapterAbstract
{
    public static function _attr($attribute, $langID = null)
    {
        if (null === $langID) {
            $langID = Yii::app()->getLanguage();
        }
        return $attribute . '_' . $langID;
    }

    /**
     * @param $langID
     * @return I18NDummyAdapter
     */
    public function getTranslationModel($langID)
    {
        $model = new I18NInTableTranslation('insert', $this);
        $model->setLang($langID);
        return $model;
    }

    public function getI18nAttributeValues($attribute){
        $values = array();
        foreach(Language::getLanguageCodes() as $code){
            $values[$code] = $this->{self::_attr($attribute, $code)};
        }
        return $values;
    }

    /**
     * PHP setter magic method.
     * This method is overridden so that AR attributes can be accessed like properties.
     * @param string $name property name
     * @param mixed $value property value
     */
    public function __set($name, $value)
    {
        if (in_array($name, $this->i18nAttributes())) {
            if (is_array($value)) {
                $values = array_intersect_key($value, Language::getLanguageCodes());
                foreach ($values as $lang => $locValue) {
                    $this->getLang($lang)->{$name} = $locValue;
                }
            } else {
//                parent::__set(self::_attr($name), $value);
                $this->currentTranslation()->{$name} = $value;
            }
        }else{
            parent::__set($name, $value);
        }
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
        if (in_array($name, $this->i18nAttributes())) {
            return $this->currentTranslation()->{$name};
        }
        return parent::__get($name);
    }



    public function uninstallTranslationSchema()
    {
        $schema = $this->getTableSchema();
        try {
            foreach ($this->i18nAttributes() as $column) {
                $count = 0;
                foreach (array_reverse(Language::getLanguageCodes()) as $langID) {
                    $count++;
                    if (!in_array($column, $schema->columnNames) && $count == 1) {
                        Yii::app()->db->createCommand(
                            Yii::app()->db->getSchema()->renameColumn($this->tableName(), $this->_attr($column, $langID), $column)
                        )->execute();
                    } else {
                        $count++;
                        try {
                            Yii::app()->db->createCommand(
                                Yii::app()->db->getSchema()->dropColumn($this->tableName(), $this->_attr($column, $langID))
                            )->execute();
                        } catch (Exception $e) {
                            return false;
                        }
                    }
                }
            }
        } catch (Exception $e) {
            return false;
        }
    }

    public function removeLangTranslationSchema($langID)
    {
        $schema = $this->getTableSchema();
        foreach ($this->i18nAttributes() as $column) {
            $count = 0;
            if (!in_array($column, $schema->columnNames) && $count == 1) {
                Yii::app()->db->createCommand(
                    Yii::app()->db->getSchema()->renameColumn($this->tableName(), $this->_attr($column, $langID), $column)
                )->execute();
            } else {
                try {
                    Yii::app()->db->createCommand(
                        Yii::app()->db->getSchema()->dropColumn($this->tableName(), $this->_attr($column, $langID))
                    )->execute();
                } catch (Exception $e) {
                    echo $e->getMessage();
                }
            }
        }
    }

    public function addLangTranslationSchema($langID)
    {
        $schema = $this->getTableSchema();

        foreach ($this->i18nAttributes() as $column) {

            $colName = $this->_attr($column, $langID);
            if (in_array($colName, $schema->columnNames)) continue; //column already in table

            $update = array();

            $after = $column;
            $columnSchema = $schema->getColumn($column);
            if (!$columnSchema) { //in case source column has been deleted
                $after = self::_attr($column);
                $columnSchema = $schema->getColumn($after);
            }

            if ($columnSchema) {
                $columnType = $columnSchema->dbType;

                if (!$columnSchema->allowNull) {
                    $columnType .= ' NOT NULL ';
                }

                if ($columnSchema->defaultValue) {
                    $columnType .= " DEFAULT '" . $columnSchema->defaultValue . "'";
                }

                $columnType .= " AFTER `$after`";

                //$colName = $this->_attr($column, $langID);
                //if (in_array($colName, $schema->columnNames)) continue;

                $update[] = "$colName=$column";


                try {
                    Yii::app()->db->createCommand()->addColumn($this->tableName(), $colName, $columnType);
                    Yii::app()->db->createCommand()->update($this->tableName(), array($colName => new CDbExpression($column)));
                } catch (Exception $e) {
                    print $e;
                }
            }

        }
    }

    public function installTranslationSchema($removeColumns = false)
    {
        $schema = $this->getTableSchema();
        $i18nAttributes = $this->i18nAttributes();

        foreach ($i18nAttributes as $column) {
            $update = array();

            $columnSchema = $schema->getColumn($column);

            if (!$columnSchema) { //in case source column has been deleted
                $columnSchema = $schema->getColumn(self::_attr($column));
            }

            if ($columnSchema) {
                $columnType = $columnSchema->dbType;

                if (!$columnSchema->allowNull) {
                    $columnType .= ' NOT NULL ';
                }

                if ($columnSchema->defaultValue) {
                    $columnType .= " DEFAULT '" . $columnSchema->defaultValue . "'";
                }

                $columnType .= " AFTER `$column`";

                foreach (array_reverse(Language::getLanguageCodes()) as $langID) {
                    $colName = $this->_attr($column, $langID);
                    if (in_array($colName, $schema->columnNames)) continue;

                    $update[] = "$colName=$column";


                    try {
                        Yii::app()->db->createCommand()->addColumn($this->tableName(), $colName, $columnType);
                        Yii::app()->db->createCommand()->update($this->tableName(), array($colName => new CDbExpression($column)));
                    } catch (Exception $e) {
                        print $e;
                    }
                }

                if ($removeColumns) {
                    Yii::app()->db->createCommand()->dropColumn($this->tableName(), $column);
                }
            }

        }
    }
}

class I18NInTableTranslation extends CModel
{
    public $__lang;

    /**
     * @var I18NDummyAdapter
     */
    public $__model;

    public function __construct($scenario = 'insert', $model = null)
    {
        $this->__model = $model;
        if ($model == null) {
            return;
        }
    }

    public function setLang($lang)
    {
        $this->__lang = $lang;
    }

    //do not save dummy translations
    public function save($runValidation = true, $attributes = null)
    {
        return true;
    }

    public function __get($name)
    {
        return $this->__model->{$name . '_' . $this->__lang};
    }

    public function __set($name, $value)
    {
        $this->__model->{$name . '_' . $this->__lang} = $value;
    }

    /**
     * Returns the list of attribute names of the model.
     * @return array list of attribute names.
     */
    public function attributeNames()
    {
        return $this->__model->i18nAttributes();
    }
}