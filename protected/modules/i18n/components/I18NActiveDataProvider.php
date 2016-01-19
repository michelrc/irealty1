<?php
/**
 * Created by JetBrains PhpStorm.
 * User: deimos
 * Date: 12/2/11
 * Time: 6:06 PM
 * To change this template use File | Settings | File Templates.
 */

class I18NActiveDataProvider extends CActiveDataProvider
{

    public $_initialized = false;

    public function init()
    {

        $model = $this->model;

        if ($model instanceof I18NMultiTableAdapter) {
            /**
             * CDbCriteria
             */
            $criteria = $this->getCriteria();

            foreach ($model->i18nAttributes() as $attr) {
                $criteria->compare("i18n.$attr", $model->$attr, true);
            }

            $r = array('*');
            foreach ($model->i18nAttributes() as $attr) {
                $r[$attr] = array(
                    'asc' => "i18n.$attr",
                    'desc' => "i18n.$attr DESC",
                    'label' => $model->getAttributeLabel($attr),
                    'default' => 'desc',
                );
            }
            $sort = $this->getSort();
            $sort->attributes = $r;
        } elseif ($model instanceof I18NInTableAdapter) {
            /**
             * CDbCriteria
             */
            $criteria = $this->getCriteria();

            /*foreach ($model->i18nAttributes() as $attr){
                $criteria->compare("t.$attr", $model->$attr, true);
            }*/

            $r = array();
            foreach ($model->i18nAttributes() as $attr) {
                $attrName = $model->_attr($attr);
                $r[$attr] = array(
                    'asc' => "$attrName ASC",
                    'desc' => "$attrName DESC",
                    'label' => $model->getAttributeLabel($attr),
                    'default' => 'asc',
                );
            }
            $r[] = '*';
            $sort = $this->getSort();
            $sort->attributes = $r;
        }

    }

    public function fetchData()
    {
        if (!$this->_initialized) {
            $this->init();
            $this->_initialized = true;
        }
        return parent::fetchData();
    }
}
