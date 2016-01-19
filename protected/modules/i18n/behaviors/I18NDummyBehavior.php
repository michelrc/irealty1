<?php
/**
 * @author: Yusnel Rojas Garcia <yrojass@gmail.com>
 * @team : Red Labz
 * @date: 9/23/12
 */
Yii::import('i18n.behaviors.I18NAbstractBehavior');
class I18NDummyBehavior extends I18NAbstractBehavior
{

    public function _attr($attribute, $langID = null)
    {
        return $attribute;
    }

    public function beforeSet($event)
    {
        $name = $event->params['name'];
        $value = $event->params['value'];
        if (in_array($name, $this->attributes)) {
            if (is_array($value)) {
                $values = array_intersect_key($value, Language::getLanguageCodes());
                if (isset($values[$this->activeLanguage])) {
                    $this->owner->{$name} = $values[$this->activeLanguage];
                }
                $event->cancel = true;
            }
        }
    }
}
