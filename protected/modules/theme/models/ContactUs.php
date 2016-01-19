
<?php

Yii::import('theme.models._base.BaseContactUs');

class ContactUs extends BaseContactUs
{
    /**
    * @param string $className
    * @return ContactUs    */
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
        $this->adminNames[3] = Yii::t('sideMenu', 'Contact Us page');
    }




    /**
    * Admin variables (ycm module)
    */
    public $adminNames=array('ContactUses','contactus','contactuses','Contact Us page'); // admin interface, singular, plural
    public $downloadExcel=false; // Download Excel
    public $downloadMsCsv=false; // Download MS CSV
    public $downloadCsv=false; // Download CSV


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
                    array('title', 'textField'),
                    array('description', 'wysiwyg'),
                    array('place_holder_name', 'textField'),
                    array('place_holder_phone', 'textField'),
                    array('place_holder_email', 'textField'),
                    array('place_holder_subject', 'textField'),
                    array('place_holder_message', 'textField'),
                    array('agents_title', 'textField'),
                    array('address_title', 'textField'),
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
				'title',
				'description',
				'place_holder_name',
				'place_holder_phone',
				'place_holder_email',
				/*
				'place_holder_subject',
				'place_holder_message',
				'agents_title',
				'address_title',
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
				'title',
				'description',
				'place_holder_name',
				'place_holder_phone',
				'place_holder_email',
				/*
				'place_holder_subject',
				'place_holder_message',
				'agents_title',
				'address_title',
			*/
            ),
        );
}



}