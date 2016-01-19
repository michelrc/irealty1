<?php

class ImportForm extends CFormModel
{
    public $empty;
    public $override;
    public $translator = 'Yii::t';


    public function rules()
    {
        return array(
            array('translator', 'required'),
            array('empty, override', 'boolean'),
            array('empty', 'default', 'value' => false),
            array('override', 'default', 'value' => true),
        );
    }


    public function attributeLabels()
    {
        return array(
            'override' => Yii::t('app', 'Override existing translations'),
            'empty' => Yii::t('app', 'Empty all translations'),
            'translator' => Yii::t('app', 'Translator'),
        );
    }

}
