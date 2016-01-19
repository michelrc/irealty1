<?php

Yii::import('i18n.models._base.BaseI18nSource');

class I18nSource extends BaseI18nSource
{
    /**
     * @param string $className
     * @return I18nSource
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
     * Es llamado para saber si se muestra o no la administracion de este modelo
     * usar en conjunto con los permisos
     * @return boolean
     */
    public function hasAdmin()
    {
        return false;
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
    public $adminNames = array('I18nSources', 'i18nsource', 'i18nsources', 'Source'); // admin interface, singular, plural
    public $downloadExcel = false; // Download Excel
    public $downloadMsCsv = false; // Download MS CSV
    public $downloadCsv = false; // Download CSV

    public function categoryChoices()
    {
        return I18nCategory::choices();
    }


    /**
     * Config for attribute widgets (ycm module)
     *
     * @return array
     */
    public function attributeWidgets()
    {
        return array(
            array('category', 'chosen'),
            array('message', 'textArea'),
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
                array(
                    'class' => 'ext.yExt.YRelatedColumn',
                    'relation' => 'category0',
                ),
                'message',
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
                array(
                    'name' => 'category',
                    'type' => 'raw',
                    'value' => CHtml::link($this->category0, ycm()->url_view($this->category0)),
                ),
                'message',
            ),
        );
    }


}