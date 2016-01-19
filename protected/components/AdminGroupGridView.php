<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Mariela y Yorty
 * Date: 10/10/13
 * Time: 22:12
 * To change this template use File | Settings | File Templates.
 */

Yii::import('application.extensions.bootstrap.widgets.TbGroupGridView');
class AdminGroupGridView extends TbGroupGridView {
    public $itemsCssClass = 'table table-bordered table-striped table-hover';
    public $selectableRows = 2;
    public $summaryText = '<strong>{start} - {end}</strong> de <strong>{count}</strong>';
    public $template = '{items} {pager}';
    public $pagerCssClass = 'pagination alternate pull-right';
    public $pager=array(
        'class'=>'Pager',
    );
    public $enableHistory=true;
    public $ajaxUpdate=true;

    /**
     * Widget initialization
     */
    public function init()
    {
        TbGridView::init();
        /**
         * setup extra row options
         */
        if (isset($this->extraRowHtmlOptions['class']) && !empty($this->extraRowCssClass)) {
            $this->extraRowHtmlOptions['class'] .= ' ' . $this->extraRowCssClass;
        } else {
            $this->extraRowHtmlOptions['class'] = $this->extraRowCssClass;
        }
    }

    /**
     * Creates column objects and initializes them.
     */
    protected function initColumns()
    {
        if($this->columns===array())
        {
            if($this->dataProvider instanceof CActiveDataProvider)
                $this->columns=$this->dataProvider->model->attributeNames();
            elseif($this->dataProvider instanceof IDataProvider)
            {
                // use the keys of the first row of data as the default columns
                $data=$this->dataProvider->getData();
                if(isset($data[0]) && is_array($data[0]))
                    $this->columns=array_keys($data[0]);
            }
        }
        $id=$this->getId();
        foreach($this->columns as $i=>$column)
        {
            if(is_string($column))
                $column=$this->createDataColumn($column);
            else
            {
                if(!isset($column['class']))
                    $column['class']='AdminDataColumn';
                $column=Yii::createComponent($column, $this);
            }
            if(!$column->visible)
            {
                unset($this->columns[$i]);
                continue;
            }
            if($column->id===null)
                $column->id=$id.'_c'.$i;
            $this->columns[$i]=$column;
        }

        foreach($this->columns as $column)
            $column->init();
    }

    /**
     * Creates a column based on a shortcut column specification string.
     * @param mixed $text the column specification string
     * @return \TbDataColumn|\CDataColumn the column instance
     * @throws CException if the column format is incorrect
     */
    protected function createDataColumn($text)
    {
        if (!preg_match('/^([\w\.]+)(:(\w*))?(:(.*))?$/', $text, $matches))
            throw new CException(Yii::t('zii', 'The column must be specified in the format of "Name:Type:Label", where "Type" and "Label" are optional.'));

        $column = new AdminDataColumn($this);
        $column->name = $matches[1];

        if (isset($matches[3]) && $matches[3] !== '')
            $column->type = $matches[3];

        if (isset($matches[5]))
            $column->header = $matches[5];

        return $column;
    }

}