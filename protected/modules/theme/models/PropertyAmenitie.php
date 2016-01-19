
<?php

Yii::import('theme.models._base.BasePropertyAmenitie');

class PropertyAmenitie extends BasePropertyAmenitie
{
    /**
    * @param string $className
    * @return PropertyAmenitie    */
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

    public static function choices(){
        return GxHtml::listDataEx(self::model()->findAllAttributes(null, true));
    }

    public function elementos($attr_id, $attr){
        $v = $this->$attr_id;
        unset($this->$attr_id);
        $c = $this->search()->criteria;
        //$c->select = $attr_id;
        $all = self::model()->findAll($c);
        $this->$attr_id = $v;

        $r = array();
        foreach($all as $p){
            $r[$p->$attr_id] = $p->$attr;
        }
        return $r;
    }


    /**
    * Es llamado para saber si se muestra o no la administracion de este modelo
    * usar en conjunto con los permisos
    * @return boolean
    */
    public function hasAdmin(){
        return false;
    }


    public function init(){
        $this->id = rand_uniqid();
        $this->adminNames[3] = Yii::t('sideMenu', 'Properties');
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
    public $adminNames=array('PropertyAmenities','propertyamenitie','propertyamenities','Properties'); // admin interface, singular, plural
    public $downloadExcel=false; // Download Excel
    public $downloadMsCsv=false; // Download MS CSV
    public $downloadCsv=false; // Download CSV

    public function amenitie_idChoices(){
        return Amenitie::choices();
    }

    public function property_idChoices(){
        return Property::choices();
    }


    /**
    * Config for attribute widgets (ycm module)
    *
    * @return array
    */
    public function attributeWidgets()
    {
        return array(
                array('id', 'textField'),
                    array('amenitie_id', 'chosen'),
                    array('property_id', 'chosen'),
                    array('relevant', 'boolean'),
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
            'columns'=>array(
				array(
                    'class' => 'ext.yExt.YRelatedColumn',
					'relation'=>'amenitie',
				),
				array(
                    'class' => 'ext.yExt.YRelatedColumn',
					'relation'=>'property',
				),
				array(
                	'class' => 'ext.yExt.YBooleanColumn',
					'name' => 'relevant',
				),
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
            'attributes'=>array(
                				array(
                    'name'=>'amenitie_id',
                    'type'=>'raw',
                    'value'=>CHtml::link($this->amenitie, ycm()->url_view($this->amenitie)),
				),
				array(
                    'name'=>'property_id',
                    'type'=>'raw',
                    'value'=>CHtml::link($this->property, ycm()->url_view($this->property)),
				),
				'relevant:boolean',
            ),
        );
}



}