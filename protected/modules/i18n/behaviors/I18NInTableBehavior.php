<?php
/**
 * @author: Yusnel Rojas Garcia <yrojass@gmail.com>
 * @team : Red Labz
 * @date: 9/23/12
 */
Yii::import('i18n.behaviors.I18NAbstractBehavior');
/**
 * @property CActiveRecord $owner
 */
class I18NInTableBehavior extends I18NAbstractBehavior
{
    public $fieldTemplate = '{field}_{lang}';

    public function _attr($attribute, $langID = null)
    {
        if (null === $langID) {
            $langID = $this->activeLanguage;
        }
        return strtr($this->fieldTemplate, array('{field}' => $attribute, '{lang}' => $langID));
    }

    public function beforeSet($event)
    {
        $name = $event->params['name'];
        $value = $event->params['value'];
        if (in_array($name, $this->attributes)) {
            if (is_array($value)) {
                $values = array_intersect_key($value, Language::getLanguageCodes());
                foreach ($values as $lang => $locValue) {
                    $this->owner->{$this->_attr($name, $lang)} = $locValue;
                }
            } else {
                $this->owner->{$this->_attr($name)} = $value;
            }
            $event->cancel = true;
        }
    }

    public function beforeGet($event)
    {
        if (in_array($name = $event->params['name'], $this->attributes)) {
            $event->result = $this->owner->{$this->_attr($name)};
        }
    }

    public function getWrappedInstance($langID)
    {

    }


    //region Schema Modifications
    public function uninstallTranslationSchema()
    {
        $schema = $this->owner->getTableSchema();
        try {
            foreach ($this->attributes as $column) {
                $count = 0;
                foreach (array_reverse(Language::getLanguageCodes()) as $langID) {
                    $count++;
                    if (!in_array($column, $schema->columnNames) && $count == 1) {
                        Yii::app()->db->createCommand(
                            Yii::app()->db->getSchema()->renameColumn($this->owner->tableName(), $this->_attr($column, $langID), $column)
                        )->execute();
                    } else {
                        $count++;
                        try {
                            Yii::app()->db->createCommand(
                                Yii::app()->db->getSchema()->dropColumn($this->owner->tableName(), $this->_attr($column, $langID))
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
        $schema = $this->owner->getTableSchema();
        foreach ($this->attributes as $column) {
            $count = 0;
            if (!in_array($column, $schema->columnNames) && $count == 1) {
                Yii::app()->db->createCommand(
                    Yii::app()->db->getSchema()->renameColumn($this->owner->tableName(), $this->_attr($column, $langID), $column)
                )->execute();
            } else {
                try {
                    Yii::app()->db->createCommand(
                        Yii::app()->db->getSchema()->dropColumn($this->owner->tableName(), $this->_attr($column, $langID))
                    )->execute();
                } catch (Exception $e) {
                    echo $e->getMessage();
                }
            }
        }
    }

    public function addLangTranslationSchema($langID)
    {
        $schema = $this->owner->getTableSchema();

        foreach ($this->attributes as $column) {
            $update = array();

            $columnSchema = $schema->getColumn($column);

            if ($columnSchema) {
                $columnType = $columnSchema->dbType;

                if (!$columnSchema->allowNull) {
                    $columnType .= ' NOT NULL ';
                }

                if ($columnSchema->defaultValue) {
                    $columnType .= " DEFAULT '" . $columnSchema->defaultValue . "'";
                }

                $columnType .= " AFTER `$column`";

                $colName = $this->_attr($column, $langID);
                if (in_array($colName, $schema->columnNames)) continue;

                $update[] = "$colName=$column";


                try {
                    Yii::app()->db->createCommand()->addColumn($this->owner->tableName(), $colName, $columnType);
                    Yii::app()->db->createCommand()->update($this->owner->tableName(), array($colName => new CDbExpression($column)));
                } catch (Exception $e) {
                    print $e;
                }
            }

        }
    }

    public function installTranslationSchema($removeColumns = false)
    {
        $schema = $this->owner->getTableSchema();

        foreach ($this->attributes as $column) {
            $update = array();

            $columnSchema = $schema->getColumn($column);

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
                        Yii::app()->db->createCommand()->addColumn($this->owner->tableName(), $colName, $columnType);
                        Yii::app()->db->createCommand()->update($this->owner->tableName(), array($colName => new CDbExpression($column)));
                    } catch (Exception $e) {
                        print $e;
                    }
                }

                if ($removeColumns) {
                    Yii::app()->db->createCommand()->dropColumn($this->owner->tableName(), $column);
                }
            }

        }
    }
    //endregion
}
