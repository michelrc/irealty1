<?php

Yii::import('i18n.models._base.BaseI18nCategory');

class I18nCategory extends BaseI18nCategory
{
    /**
     * @param string $className
     * @return I18nCategory
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public static function choices()
    {
        return GxHtml::listDataEx(self::model()->findAllAttributes(null, true));
    }

    public static function get_or_create($category, $message)
    {
        $model = self::model()->findByAttributes(array('category' => $category, 'message' => $message));
        if (!$model) {
            $model = new self();
            $model->category = $category;
            $model->message = $message;
            $model->save();
        }
        return $model;
    }

    public function getTranslatedPercent()
    {
        $languageCount = Language::model()->count();
        $expectedCount = $languageCount * I18nSource::model()->countByAttributes(array('category' => $this->category));
        $currentCount = I18nMessage::model()->with('source')->count(array(
            'condition' => 'NOT ISNULL(translation) AND source.category = :category',
            'params' => array(
                ':category' => $this->category
            )
        ));

        $percent = 0;
        if ($expectedCount > 0) {
            $percent = round(($currentCount / $expectedCount) * 100, 2);
        }
        return $percent;
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
    public $adminNames = array('I18nCategories', 'i18ncategory', 'i18ncategories', 'Category'); // admin interface, singular, plural
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
            array('category', 'textField'),
            array('description', 'textArea'),
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
                'description',
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
                'description',
            ),
        );
    }


}