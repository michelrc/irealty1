<?php

class LanguageSwitchComponent extends CComponent {
    public function init(){
        Yii::app()->setLanguage(Yii::app()->session->get('language', 'en'));
    }
} 