<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController
{
    public $allMenu = false;



    public function beforeAction($action) {
        $this->attachBehavior('unicorn',array(
            'class'=>'ext.unicorn.components.IRControllerBehavior',
            'title'=>app()->name,
        ));
        return parent::beforeAction($action);
    }

	/**
	 * @var string the default layout for the controller view. Defaults to '//layouts/column1',
	 * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
	 */
	public $layout='//layouts/box';

    public function profileEditFields($profile)
    {
        $profileFields = $profile->getFields();
        if ($profileFields) {
            foreach ($profileFields as $field) {

                echo CHtml::openTag('div', array('class' => 'control-group'));
                echo TbHtml::activeLabelEx($profile, $field->varname, array(
                    'class' => 'control-label'
                ));
                $controls = array();
                if ($field->widgetEdit($profile)) {
                    $controls[] = $field->widgetEdit($profile);
                } elseif ($field->range) {
                    $controls[] = TbHtml::activeDropDownList($profile, $field->varname, Profile::range($field->range));
                } elseif ($field->field_type == "TEXT") {
                    $controls[] = TbHtml::activeTextArea($profile, $field->varname, array('rows' => 6, 'cols' => 50));
                } else {
                    $controls[] = TbHtml::activeTextField($profile, $field->varname, array('size' => 60, 'maxlength' => (($field->field_size) ? $field->field_size : 255)));
                }
                $controls[] = TbHtml::error($profile, $field->varname);
                echo TbHtml::controls($controls);
                echo CHtml::closeTag('div');


            }
        }
    }

    public $menu=array();
}