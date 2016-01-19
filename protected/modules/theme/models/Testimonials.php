
<?php

Yii::import('theme.models._base.BaseTestimonials');

class Testimonials extends BaseTestimonials
{
    /**
    * @param string $className
    * @return Testimonials    */
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
        $this->adminNames[3] = Yii::t('sideMenu', 'Testimonials');
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



    /**
    * Admin variables (ycm module)
    */
    public $adminNames=array('Testimonials','testimonials','testimonials','Testimonials'); // admin interface, singular, plural
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
                    array('photo', 'textField'),
                    array('text', 'wysiwyg'),
                    array('text_en', 'textField'),
                    array('text_es', 'textField'),
                    array('author_name', 'textField'),
                    array('company_name', 'textField'),
                    array('created', 'date'),
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
				'photo',
				'text',
				'text_en',
				'text_es',
				'author_name',
				'company_name',
				/*
				'created',
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
                				'photo',
				'text',
				'text_en',
				'text_es',
				'author_name',
				'company_name',
				/*
				'created',
			*/
            ),
        );
}



}