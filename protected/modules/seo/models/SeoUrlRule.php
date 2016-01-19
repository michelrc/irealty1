<?php

Yii::import('seo.models._base.BaseSeoUrlRule');

/**
 */
class SeoUrlRule extends BaseSeoUrlRule
{
    public $adminNames = array('Url Rule', 'urlrule', 'urlrules', 'Url Rules'); // admin interface, singular, plural
    public $isModelRule;

    /**
     * @param string $className
     * @return UrlRule
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function afterSave()
    {
        app()->cache->delete(CUrlManager::CACHE_KEY);
        parent::afterSave();
    }

    public function getCleanUrl()
    {
        if ($this->url == '/')
            return '/';

        return $this->url;
    }

    public function __toString()
    {
        return "{$this->path}";
    }

    public function getParams()
    {
        return eval($this->str_params);
    }

    public function toArray()
    {
        if (null == $this->modelClassName) {
            $attributes = $this->attributes;
            unset($attributes['id']);
            unset($attributes['str_params']);
            $attributes[0] = $this->route;
            $attributes['params'] = $this->params;
            $attributes['pattern'] = $this->seoUrl;
        } else {
            $attributes = array(
                'class' => 'application.modules.seo.components.ModelSEOUrlRule',
                'primaryKeyParam' => $this->primaryKeyParam ? $this->primaryKeyParam : 'id',
                'routeMap' => array(
                    $this->modelClassName => $this->route,
                )
            );

        }
        return $attributes;
    }

    public function defaultScope()
    {
        return array(
            'order' => 't.order',
        );
    }
}