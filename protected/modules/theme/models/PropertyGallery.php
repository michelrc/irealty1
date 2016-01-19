
<?php

Yii::import('theme.models._base.BasePropertyGallery');

class PropertyGallery extends BasePropertyGallery
{
    /**
    * @param string $className
    * @return PropertyGallery    */
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


    public  function beforeSave()
    {
        parent::beforeSave();
        if($this->main)
        {
            try{
                $a = PropertyGallery::model()->updateAll(array("main" => 0),'property = :property', array(':property' => $this->property));
            }
            catch(Exception $e)
            {
//                ddump($e);
            }
        }
        return true;

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
    public $adminNames=array('PropertyGalleries','propertygallery','propertygalleries','Properties'); // admin interface, singular, plural
    public $downloadExcel=false; // Download Excel
    public $downloadMsCsv=false; // Download MS CSV
    public $downloadCsv=false; // Download CSV

    public function propertyChoices(){
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
                    array('image', 'textField'),
                    array('property', 'chosen'),
                    array('main', 'boolean'),
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
				'image',
				array(
                    'class' => 'ext.yExt.YRelatedColumn',
					'relation'=>'property0',
				),
				array(
                	'class' => 'ext.yExt.YBooleanColumn',
					'name' => 'main',
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
                				'image',
				array(
                    'name'=>'property',
                    'type'=>'raw',
                    'value'=>CHtml::link($this->property0, ycm()->url_view($this->property0)),
				),
				'main:boolean',
            ),
        );
}



}