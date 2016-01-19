<?php

Yii::import('i18n.models._base.BaseLanguage');

class Language extends BaseLanguage
{

    protected static $_enabledLangs = null;
    protected static $_default = null;
    protected $__newLang = false;

    public $isEnabled = null;
    public $isDefault = null;

    /**
     * @param string $className
     * @return Language
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public static function choices()
    {
        return GxHtml::listDataEx(self::model()->findAllAttributes(null, true));
    }

    public function enabled()
    {
        $this->getDbCriteria(true)->mergeWith(array(
            'condition' => 'enable=1'
        ));
        return $this;
    }

    /**
     * @static
     * @return Language[] list of all available languages
     */
    public static function getLanguages()
    {
        if (null === self::$_enabledLangs) {
            self::$_enabledLangs = self::model()->enabled()->findAll();
        }
        return self::$_enabledLangs;
    }

    public static function getLanguageCodes()
    {
        return CHtml::listData(self::getLanguages(), 'id', 'id');
    }

    public static function getTotalTranslatedPercent()
    {
        $sourceCount = I18nSource::model()->count();
        $expectedCount = $sourceCount * self::model()->count();
        $currentCount = I18nMessage::model()->count(array(
            'condition' => 'NOT ISNULL(translation)'
        ));

        $percent = 0;
        if ($expectedCount > 0) {
            $percent = round(($currentCount / $expectedCount) * 100, 2);
        }
        return $percent;
    }

    public function getTranslatedPercent()
    {
        $sourceCount = I18nSource::model()->count();
        $currentCount = I18nMessage::model()->countByAttributes(array('language' => $this->getPrimaryKey()), 'not isnull(translation)');

        $percent = 0;
        if ($sourceCount > 0) {
            $percent = round(($currentCount / $sourceCount) * 100, 2);
        }
        return $percent;
    }

    public static function getDefault()
    {
        if (null === self::$_default) {
            self::$_default = self::model()->findByAttributes(
                array(
                    'isDefault' => 1
                )
            );
        }
        return self::$_default;
    }

    public function getTranslatedPercentBar($options1 = array(), $options2 = array())
    {
        return FUtil::progressBar($this->getTranslatedPercent(), $options1, $options2);
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

    public function init()
    {
        $this->id = rand_uniqid();
    }

    /* Debe crear el metodo que aparece debajo para cada relacion
    public function afterSave(){
        parent::afterSave();
        if (!$this->isNewRecord) {

            CupOfferCupCity::model()->deleteAll('cup_offer_id='.$this->id);
        }

        if(is_array($this->city)) {
            foreach($this->city as $city_id) {
                $offerCity = new CupOfferCupCity();
                $offerCity->cup_city_id = $city_id;
                $offerCity->cup_offer_id = $this->id;
                $offerCity->save(false);
            }
        }
        return true;
    }

    public function afterFind() {
        parent::afterFind();
        if (!$this->isNewRecord) {
            $this->city = array_map(function($cupcity){return $cupcity->id;}, $this->cities);
        }
    }
    */

    /**
     * Admin variables (ycm module)
     */
    public $adminNames = array('Languages', 'language', 'languages', 'Language'); // admin interface, singular, plural
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
            array('id', 'textField'),
            array('name', 'textField'),
            array('enable', 'spinner'),
            array('isDefault', 'spinner'),
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
                'name',
                'enable',
                'isDefault',
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
                'name',
                'enable',
                'isDefault',
            ),
        );
    }


}