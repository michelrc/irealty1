<?php

class TopButtons extends CWidget{
//    percent;
//    internalLabel;
//    externalLabel;

    public $items;

    public function run(){
        echo '<div class="pull-left"><div class="btn-toolbar"> <div class="btn-group">';
        foreach($this->items as $btn){
            echo CHtml::link(TbHtml::icon($btn['icon']).' '.$btn['label'], $btn['url'], array(
                'data-original-title' => $btn['help'],
                'rel' => 'tooltip',
                'class' => 'button button-basic button-icon'
            ));
        }
        echo '</div></div></div>';
    }
}