<?php
/**
 * @author: Yusnel Rojas Garcia <yrojass@gmail.com>
 * @team : Red Labz
 * @date: 9/23/12
 */

/**
 * @property CActiveRecord $owner
 * @property string $activeLanguage the active language of the model
 */
abstract class I18NAbstractBehavior extends CModelBehavior
{
    public $attributes = array();

    protected $_language;

    public function getActiveLanguage()
    {
        if (null !== $this->_language) {
            return $this->_language;
        }
        return Yii::app()->language;
    }

    public function setActiveLanguage($value)
    {
        if (in_array($value, Language::getLanguageCodes()))
            $this->_language = $value;
    }

    /**
     * Declares events and the corresponding event handler methods.
     * The default implementation returns 'onAfterConstruct', 'onBeforeValidate' and 'onAfterValidate' events and handlers.
     * If you override this method, make sure you merge the parent result to the return value.
     * @return array events (array keys) and the corresponding event handler methods (array values).
     * @see CBehavior::events
     */
    public function events()
    {
        return array(
            /*'onAfterConstruct'=>'afterConstruct',
            'onBeforeValidate'=>'beforeValidate',
            'onAfterValidate'=>'afterValidate',*/
            'onBeforeSet' => 'beforeSet',
            'onBeforeGet' => 'beforeGet',
        );
    }

    /**
     * Responds to {@link CModel::onBeforeValidate} event.
     * Overrides this method if you want to handle the corresponding event of the {@link owner}.
     * You may set {@link CModelEvent::isValid} to be false to quit the validation process.
     * @param CModelEvent $event event parameter
     */
    public function beforeValidate($event)
    {
    }

    /**
     * Responds to {@link CModel::onAfterValidate} event.
     * Overrides this method if you want to handle the corresponding event of the {@link owner}.
     * @param CEvent $event event parameter
     */
    public function afterValidate($event)
    {
    }

    /**
     * @param $event FResultEvent
     */
    public function beforeSet($event)
    {
        return true;
    }

    /**
     * @param $event FResultEvent
     */
    public function beforeGet($event)
    {

    }

    abstract public function _attr($attribute, $langID = null);
}
