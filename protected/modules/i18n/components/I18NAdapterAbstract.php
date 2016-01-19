<?php
/**
 * User: one
 * Date: 1/12/12
 * Time: 11:44 PM
 */
//abstract class I18NAdapterAbstract extends GxActiveRecord
abstract class I18NAdapterAbstract extends GxActiveRecord
{

    public $_modelLanguage = null;
    protected $_translations = array();

    /**
     * @return I18NTranslationAbstract
     */
    public function currentTranslation()
    {
        return $this->getLang(Yii::app()->language);
    }


    /**
     * @param  string $langID the language id for retrieve
     * @return GxActiveRecord
     */
    public function getLang($langID, $reload = false)
    {
        if (!isset($this->_translations[$langID]) || $reload) {
            $this->_translations[$langID] = $this->getTranslationModel($langID);
        }
        return $this->_translations[$langID];
    }


    public function setLang($langID)
    {
        $this->_modelLanguage = $langID;
    }

    /**
     * implement these models in user model
     */

    /**
     * @abstract
     * Get attributes to be translated
     * @return array The attributes in the model to be translated
     */
    public abstract function i18nAttributes();

    public function i18nAttributeNames()
    {

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
    public function getAttributes($names=true)
    {
        $attributes = parent::getAttributes($names);
        foreach($this->i18nAttributes() as $attr){
            $attributes[$attr] = $this->{$attr};
        }
        return $attributes;
    }

    /**
     * Apply rules to validate translation
     * @return array
     */
    public function i18nRules()
    {
        return array();
    }

    abstract public function getTranslationModel($langID);

    public abstract function installTranslationSchema($removeColumns = false);

    public abstract function addLangTranslationSchema($langID);

    public abstract function removeLangTranslationSchema($langID);

    public abstract function uninstallTranslationSchema();

}
