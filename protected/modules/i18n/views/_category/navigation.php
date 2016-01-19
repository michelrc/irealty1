<?php

$category = isset($category) ? $category : $instance;

if ($category) {
    $this->widget('frankenstein.widgets.FSubNavMenu', array(
        'items' => array(
            array('label' => I18nCategory::label(), 'url' => array('//admin/i18n/category/view', 'id' => $category->getPrimaryKey()), 'icon' => 'home', 'active' => $this->getId() === 'view'),
            array('label' => I18nSource::label(2), 'url' => array('//admin/i18n/category/sources', 'id' => $category->getPrimaryKey()), 'icon' => 'comment', 'active' => $this->getId() === 'sources'),
        )
    ));
}


echo $content;
