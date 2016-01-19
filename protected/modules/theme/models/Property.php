
<?php

Yii::import('theme.models._base.BaseProperty');

class Property extends BaseProperty
{
    /**
    * @param string $className
    * @return Property    */
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

    public function beforeSave()
    {
        if(parent::beforeSave())
        {
            if($this->isNewRecord)
            {
                $this->created = date('Y-m-d G:i:s');
                                return true;
            }
            else
            {
                                return true;
            }
        }
        else{
            return false;
        }

    }

    public function afterDelete()
    {
        parent::afterDelete();

        $criteria = new CDbCriteria();
        $criteria->addCondition('`modelClassName` = "Property"');
        $criteria->addCondition('`property_id` = "'.$this->id.'"');
        $seo_model = SeoModel::model()->find($criteria);
        $seo_model->delete();
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
    public $adminNames=array('Properties','property','properties','Properties'); // admin interface, singular, plural
    public $downloadExcel=false; // Download Excel
    public $downloadMsCsv=false; // Download MS CSV
    public $downloadCsv=false; // Download CSV

    public function categoryChoices(){
        return PropertyCategory::choices();
    }

    public function conditionChoices(){
        return PropertyCondition::choices();
    }

    public function provinceChoices(){
        return Province::choices();
    }

    public function agentChoices(){
        return Agent::choices();
    }

    public function typeChoices(){
        return PropertyType::choices();
    }

    public function seo_url_idChoices(){
        return SeoUrl::choices();
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
                    array('banner_image', 'textField'),
                    array('banner_title', 'textField'),
                    array('name', 'textField'),
                    array('category', 'chosen'),
                    array('description', 'wysiwyg'),
                    array('price', 'currency'),
                    array('condition', 'chosen'),
                    array('address', 'textField'),
                    array('province', 'chosen'),
                    array('area', 'currency'),
                    array('rooms', 'spinner'),
                    array('bathroom', 'spinner'),
                    array('best_tips', 'textField'),
                    array('agent', 'chosen'),
                    array('type', 'chosen'),
                    array('exalted', 'boolean'),
                    array('youtube_video', 'textField'),
                    array('map_longitude', 'currency'),
                    array('map_latitude', 'currency'),
                    array('created', 'date'),
                    array('seo_url_id', 'chosen'),
                    array('number_contact', 'spinner'),
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
				'banner_image',
				'banner_title',
				'name',
				array(
                    'class' => 'ext.yExt.YRelatedColumn',
					'relation'=>'category0',
				),
				'description',
				'price',
				/*
				array(
                    'class' => 'ext.yExt.YRelatedColumn',
					'relation'=>'condition0',
				),
				'address',
				array(
                    'class' => 'ext.yExt.YRelatedColumn',
					'relation'=>'province0',
				),
				'area',
				'rooms',
				'bathroom',
				'best_tips',
				array(
                    'class' => 'ext.yExt.YRelatedColumn',
					'relation'=>'agent0',
				),
				array(
                    'class' => 'ext.yExt.YRelatedColumn',
					'relation'=>'type0',
				),
				array(
                	'class' => 'ext.yExt.YBooleanColumn',
					'name' => 'exalted',
				),
				'youtube_video',
				'map_longitude',
				'map_latitude',
				'created',
				array(
                    'class' => 'ext.yExt.YRelatedColumn',
					'relation'=>'seoUrl',
				),
				'number_contact',
			*/
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
                				'banner_image',
				'banner_title',
				'name',
				array(
                    'name'=>'category',
                    'type'=>'raw',
                    'value'=>CHtml::link($this->category0, ycm()->url_view($this->category0)),
				),
				'description',
				'price',
				/*
				array(
                    'name'=>'condition',
                    'type'=>'raw',
                    'value'=>CHtml::link($this->condition0, ycm()->url_view($this->condition0)),
				),
				'address',
				array(
                    'name'=>'province',
                    'type'=>'raw',
                    'value'=>CHtml::link($this->province0, ycm()->url_view($this->province0)),
				),
				'area',
				'rooms',
				'bathroom',
				'best_tips',
				array(
                    'name'=>'agent',
                    'type'=>'raw',
                    'value'=>CHtml::link($this->agent0, ycm()->url_view($this->agent0)),
				),
				array(
                    'name'=>'type',
                    'type'=>'raw',
                    'value'=>CHtml::link($this->type0, ycm()->url_view($this->type0)),
				),
				'exalted:boolean',
				'youtube_video',
				'map_longitude',
				'map_latitude',
				'created',
				array(
                    'name'=>'seo_url_id',
                    'type'=>'raw',
                    'value'=>CHtml::link($this->seoUrl, ycm()->url_view($this->seoUrl)),
				),
				'number_contact',
			*/
            ),
        );
}

    public function deleteGallery(){
        $criteria = new CDbCriteria();
        $criteria->compare('property', $this->id);
        PropertyGallery::model()->deleteAll($criteria);
        return true;
    }



}