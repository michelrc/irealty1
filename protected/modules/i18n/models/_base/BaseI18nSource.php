<?php

/**
 * This is the model base class for the table "i18n_source".
 * It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "I18nSource".
 * This code was improve iReevo Team
 * Columns in table "i18n_source" available as properties of the model,
 * followed by relations of table "i18n_source" available as properties of the model.
 *
 * @property integer $id
 * @property string $category
 * @property string $message
 *
 * @property I18nLanguage[] $i18nLanguages
 * @property I18nCategory $categoryItem
 */
abstract class BaseI18nSource extends GxActiveRecord
{
// many to many relationship
    public $I18nLanguage;
    public $I18nCategory;

    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return 'i18n_source';
    }

    public static function label($n = 1)
    {
        return self::model()->t_model('I18nSource|I18nSources', $n);
    }

    public static function representingColumn()
    {
        return 'category';
    }

    public function rules()
    {
        return array(
            array('category', 'length', 'max' => 255),
            array('message', 'safe'),
            array('category, message', 'default', 'setOnEmpty' => true, 'value' => null),
            array('id, category, message', 'safe', 'on' => 'search'),
            array('I18nLanguage, I18nCategory', 'safe'),
        );
    }

    public function relations()
    {
        return array(
            'i18nLanguages' => array(self::MANY_MANY, 'I18nLanguage', 'i18n_message(id, language)'),
            'categoryItem' => array(self::BELONGS_TO, 'I18nCategory', 'category'),
            'translation' => array(self::HAS_ONE, 'I18nMessage', 'id', 'scopes' => array('local')),
            'translations' => array(self::HAS_MANY, 'I18nMessage', 'id')
        );
    }

    public function pivotModels()
    {
        return array(
            'i18nLanguages' => 'I18nMessage',
        );
    }

    public function attributeLabels()
    {
        return array(
            'id' => Yii::t('i18n','ID'),
            'category' => Yii::t('i18n','Category'),
            'message' => Yii::t('i18n','Message'),
        );
    }

    public function search()
    {
        $criteria = new CDbCriteria;

        $criteria->with = array('translation');
        $criteria->compare('id', $this->id);
        $criteria->compare('message', $this->message, true);
        $criteria->compare('category', $this->category);
//        $criteria->compare('translation.translation', $this->text, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }
}