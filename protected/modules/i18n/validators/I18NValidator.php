<?php
/**
 * @author: Yusnel Rojas Garcia <yrojass@gmail.com>
 * @team : Red Labz
 * @date: 9/2/12
 */
class I18NValidator extends CValidator
{
    protected $_params = array();

    public $validate;

    /**
     * Validates a single attribute.
     * This method should be overridden by child classes.
     * @param CModel $object the data object being validated
     * @param string $attribute the name of the attribute to be validated.
     */
    protected function validateAttribute($object, $attribute)
    {
        if ($object instanceof I18NAdapterAbstract) {
            $this->_params['message'] = $this->message;
            $this->_params['skipOnError'] = $this->skipOnError;
            $this->_params['on'] = $this->on;
            $this->_params['except'] = $this->except;
            $this->_params['safe'] = $this->safe;
            $this->_params['enableClientValidation'] = $this->enableClientValidation;
            $this->_params['attributes'] = $this->attributes;

            if ($object instanceof I18NDummyAdapter) {
                $validator = CValidator::createValidator($this->validate, $object, $this->attributes);
                $validator->validateAttribute($object, $attribute);
            } else {
                if ($object->hasErrors($attribute)) return; //prevent duplicate error
                $validator = CValidator::createValidator($this->validate, $object, $this->attributes, $this->_params);
                $errors = array();
                foreach (Language::getLanguageCodes() as $lang) {
                    $validator->validateAttribute($object, $object->_attr($attribute, $lang));
                    $errors = CMap::mergeArray($errors, $object->getErrors($object->_attr($attribute, $lang)));
                    $object->clearErrors($object->_attr($attribute, $lang));
                }
                $object->addErrors(array($attribute => $errors));
            }
        } else {
            Yii::log(Yii::t('object {class} is not of type I18NAdapterAbstract', array('{class}' => get_class($object))), CLogger::LEVEL_WARNING);
        }
    }

    public function __set($name, $value)
    {
        $this->_params[$name] = $value;
    }
}
