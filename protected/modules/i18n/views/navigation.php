<?php
$this->widget('frankenstein.widgets.FSubNavMenu', array(
    'items' => array(

        array('label' => Language::label(2), 'url' => array('//admin/i18n/language'), 'active' => $this->getId() == 'language'),

        array('label' => I18nSource::label(2), 'url' => array('//admin/i18n/source'), 'active' => $this->getId() == 'source'),

        array('label' => I18nCategory::label(2), 'url' => array('//admin/i18n/category'), 'active' => $this->getId() == 'category'),

    )
));


echo $content;