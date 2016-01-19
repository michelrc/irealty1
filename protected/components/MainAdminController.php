<?php

class MainAdminController extends Controller
{
    public $defaultAction='admin';
    /**
     * @var string the default layout for the controller view. Defaults to '//layouts/column1',
     * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
     */
    public $layout='//layouts/box';

    public $boxIcon='hand-right';
    public $boxTitle=null;
    public $boxButtons=array();

    public function renderFormFooter(){
        $this->renderPartial('//helpers/form-footer');
    }

    public function setFlash( $key, $value, $defaultValue = null )
    {
        Yii::app()->user->setFlash( $key, $value, $defaultValue );
    }





}