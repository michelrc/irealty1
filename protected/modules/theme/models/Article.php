
<?php

Yii::import('theme.models._base.BaseArticle');

class Article extends BaseArticle
{
    /**
    * @param string $className
    * @return Article    */
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
        $this->adminNames[3] = Yii::t('sideMenu', 'Article');
    }

    public function afterDelete()
    {
        parent::afterDelete();

        $criteria = new CDbCriteria();
        $criteria->addCondition('`modelClassName` = "Article"');
        $criteria->addCondition('`article_id` = "'.$this->id.'"');
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
    public $adminNames=array('Articles','article','articles','Article'); // admin interface, singular, plural
    public $downloadExcel=false; // Download Excel
    public $downloadMsCsv=false; // Download MS CSV
    public $downloadCsv=false; // Download CSV

    public function categoryChoices(){
        return ArticleCategory::choices();
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
                    array('title', 'textField'),
                    array('author', 'textField'),
                    array('date', 'date'),
                    array('large_description', 'wysiwyg'),
                    array('short_description', 'wysiwyg'),
                    array('large_image', 'textField'),
                    array('thumb_image', 'textField'),
                    array('youtube_video', 'textField'),
                    array('category', 'chosen'),
                    array('seo_url_id', 'chosen'),
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
				'title',
				'author',
				'date',
				'large_description',
				'short_description',
				'large_image',
				/*
				'thumb_image',
				'youtube_video',
				array(
                    'class' => 'ext.yExt.YRelatedColumn',
					'relation'=>'category0',
				),
				array(
                    'class' => 'ext.yExt.YRelatedColumn',
					'relation'=>'seoUrl',
				),
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
                				'title',
				'author',
				'date',
				'large_description',
				'short_description',
				'large_image',
				/*
				'thumb_image',
				'youtube_video',
				array(
                    'name'=>'category',
                    'type'=>'raw',
                    'value'=>CHtml::link($this->category0, ycm()->url_view($this->category0)),
				),
				array(
                    'name'=>'seo_url_id',
                    'type'=>'raw',
                    'value'=>CHtml::link($this->seoUrl, ycm()->url_view($this->seoUrl)),
				),
			*/
            ),
        );
}



}