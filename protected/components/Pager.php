<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Mariela y Yorty
 * Date: 10/10/13
 * Time: 22:03
 * To change this template use File | Settings | File Templates.
 */

Yii::import('application.extensions.bootstrap.widgets.TbPager');
class Pager extends TbPager{
    public $nextPageLabel='<i class="icon-angle-right"></i>';
    public $prevPageLabel='<i class="icon-angle-left"></i>';
    public $firstPageLabel='<i class="icon-double-angle-left"></i>';
    public $lastPageLabel='<i class="icon-double-angle-right"></i>';
    public $displayFirstAndLast = true;
}