<?php

Yii::import('application.extensions.bootstrap.widgets.TbDataColumn');

class AdminDataColumn extends TbDataColumn{
    protected function renderHeaderCellContent()
    {
        if ($this->grid->enableSorting && $this->sortable && $this->name !== null) {
            $sort = $this->grid->dataProvider->getSort();
            $label = isset($this->header) ? $this->header : $sort->resolveLabel($this->name);

            if ($sort->resolveAttribute($this->name) !== false) {
                $label .= ' <i class="icon-chevron"></i>';
            }

            echo $sort->link($this->name, $label);
        } else {
            if ($this->name !== null && $this->header === null) {
                if ($this->grid->dataProvider instanceof CActiveDataProvider) {
                    echo CHtml::encode($this->grid->dataProvider->model->getAttributeLabel($this->name));
                } else {
                    echo CHtml::encode($this->name);
                }
            } else {
                parent::renderHeaderCellContent();
            }
        }
    }
}