<?php
/**
 * User: one
 * Date: 1/12/12
 * Time: 11:43 PM
 */
class I18NDummyAdapter extends I18NAdapterAbstract
{

    public function __construct($scenario = 'insert')
    {
        parent::__construct($scenario);
    }

    public static function _attr($attribute, $langID = null)
    {
        return $attribute;
    }

    function rules()
    {
        return CMap::mergeArray($this->i18nRules(), parent::rules());
    }

    /**
     * @param $langID
     * @return I18NDummyAdapter
     */
    public function getTranslationModel($langID)
    {
        $model = new DummyTranslation('insert', $this);
        $model->setLang($langID);
        return $model;
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
                return $this->currentTranslation()->{$name} = $value[Yii::app()->language];
            } else {
                return parent::__set($name, $value);
            }
        }
        return parent::__set($name, $value);
    }

    public function __get($name)
    {
        return parent::__get($name);
    }

    public function installTranslationSchema($removeColumns = false)
    {
    }

    public function uninstallTranslationSchema()
    {
    }

    /**
     * Get attributes to be translated
     * @return array The attributes in the model to be translated
     */
    public function i18nAttributes()
    {
        // TODO: Implement i18nAttributes() method.
    }

    public function addLangTranslationSchema($langID)
    {
        // TODO: Implement addLangTranslationSchema() method.
    }

    public function removeLangTranslationSchema($langID)
    {
        // TODO: Implement removeLangTranslationSchema() method.
    }
}

class DummyTranslation extends CModel
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
        return $this->__model->{$name};
    }

    public function __set($name, $value)
    {
        $this->__model->{$name} = $value;
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