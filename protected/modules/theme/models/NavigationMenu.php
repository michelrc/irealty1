
<?php

Yii::import('theme.models._base.BaseNavigationMenu');

class NavigationMenu extends BaseNavigationMenu
{
    /**
    * @param string $className
    * @return NavigationMenu    */
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
        $this->adminNames[3] = Yii::t('sideMenu', 'Header');
    }




    /**
    * Admin variables (ycm module)
    */
    public $adminNames=array('NavigationMenus','navigationmenu','navigationmenus','Header'); // admin interface, singular, plural
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
                    array('home', 'textField'),
                    array('buy', 'textField'),
                    array('rent', 'textField'),
                    array('contact_us', 'textField'),
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
				'home',
				'buy',
				'rent',
				'contact_us',
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
                				'home',
				'buy',
				'rent',
				'contact_us',
            ),
        );
}



}