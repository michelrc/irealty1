<?php

Yii::import('i18n.models._base.BaseI18nMessage');

class I18nMessage extends BaseI18nMessage
{
    /**
     * @param string $className
     * @return I18nMessage
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public static function choices()
    {
        return GxHtml::listDataEx(self::model()->findAllAttributes(null, true));
    }

    /**
     * @param IRSourceMessage $source
     * @param string $l
     */
    public static function get_or_create($source, $l)
    {
        $model = self::model()->findByAttributes(array('id' => $source->id, 'language' => $l));
        if (!$model) {
            $model = new self();
            $model->id = $source->id;
            $model->language = $l;


            $sourcePhp = ($source->category === 'yii' || $source->category === 'zii') ? 'coreMessages' : 'messagesPhp';

            $message = $source->message;
            if (($sourcePhp = app()->getComponent($sourcePhp)) !== null)
                $message = $sourcePhp->translate($source->category, $message, $l);

            $model->translation = $message;
            $model->save();
        }
        return $model;
    }

    /**
     * Es llamado para saber si se muestra o no la administracion de este modelo
     * usar en conjunto con los permisos
     * @return boolean
     */
    public function hasAdmin()
    {
        return false;
    }


    /**
     * Admin variables (ycm module)
     */
    public $adminNames = array('I18nMessages', 'i18nmessage', 'i18nmessages', 'Message'); // admin interface, singular, plural
    public $downloadExcel = false; // Download Excel
    public $downloadMsCsv = false; // Download MS CSV
    public $downloadCsv = false; // Download CSV


    /**
     * Config for attribute widgets (ycm module)
     *
     * @return array
     */
    public function attributeWidgets()
    {
        return array(
            array('id', 'chosen'),
            array('language', 'chosen'),
            array('translation', 'textArea'),
        );
    }


    /**
     * Config for TbGridView class (ycm module)
     *
     * @return array
     */
    public function adminSearch()
    {
        return array(
            'columns' => array(
                'translation',
            ),
        );
    }


    /**
     * Config for TbDetailView class (ycm module)
     *
     * @return array
     */
    public function details()
    {
        return array(
            'attributes' => array(
                'translation',
            ),
        );
    }


}