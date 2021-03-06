<?php

/**
 * This is the model base class for the table "i18n_category".
 * It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "I18nCategory".
 * This code was improve iReevo Team
 * Columns in table "i18n_category" available as properties of the model,
 * followed by relations of table "i18n_category" available as properties of the model.
 *
 * @property string $category
 * @property string $description
 *
 * @property I18nSource[] $sources
 */
abstract class BaseI18nCategory extends GxActiveRecord
{
// many to many relationship
    public $sources;

    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return 'i18n_category';
    }

    public static function label($n = 1)
    {
        return self::model()->t_model('I18nCategory|I18nCategories', $n);
    }

    public static function representingColumn()
    {
        return 'category';
    }

    public function rules()
    {
        return array(
            array('category', 'required'),
            array('category', 'length', 'max' => 255),
            array('description', 'safe'),
            array('description', 'default', 'setOnEmpty' => true, 'value' => null),
            array('category, description', 'safe', 'on' => 'search'),
            array('I18nSource', 'safe'),
        );
    }

    public function relations()
    {
        return array(
            'sources' => array(self::HAS_MANY, 'I18nSource', 'category'),
            'sourcesCount' => array(self::STAT, 'I18nSource', 'category'),
        );
    }

    public function pivotModels()
    {
        return array();
    }

    public function attributeLabels()
    {
        return array(
            'category' => Yii::t('i18n','Category'),
            'description' => Yii::t('i18n','Description'),
        );
    }

    public function search()
    {
        $criteria = new CDbCriteria;

        $criteria->compare('category', $this->category, true);
        $criteria->compare('description', $this->description, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }
}