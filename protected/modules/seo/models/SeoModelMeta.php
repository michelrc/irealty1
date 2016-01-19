<?php

Yii::import('seo.models._base.BaseSeoModelMeta');

class SeoModelMeta extends BaseSeoModelMeta
{
    /**
     * @param string $className
     * @return SeoModelMeta
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

}