<?php
/* @var $this SiteController */
$this->breadcrumbs=array(
    t('home'),
);
if(isset($entity[0]))
{
    $this->widget(
        'application.extensions.bootstrap.widgets.TbJumbotron',
        array(
            'heading' => t('Welcome to ').$entity[0]->company_name.t(' Backend'),
        )
    );
}
else{

    $this->widget(
        'application.extensions.bootstrap.widgets.TbJumbotron',
        array(
            'heading' => t('Welcome to our Backend'),
        )
    );
}

//$seriedata_date_service1 = $this->getTotalperDay('service_1', 1);
//$seriedata_date_service2 = $this->getTotalperDay('service_2', 2);
//$seriedata_date_service3 = $this->getTotalperDay('service_3', 3);
//$seriedata_date_service4 = $this->getTotalperDay('service_4', 4);
//$seriedata_date_service5 = $this->getTotalperDay('all_services', 5);
//$date=$this->getSimpleArray($seriedata_date_service1,'date');
//
//$seriedata_ip_service1 = $this->getTotalperIp('service_1', 1);
//$ip_address=$this->getSimpleArray($seriedata_ip_service1,'ip_address');
//
//$total_date=$this->array2Int($this->getSimpleArray($seriedata_date_service1,'total'));
//$total_ip=$this->array2Int($this->getSimpleArray($seriedata_ip_service1,'total'));

?>




<!---->
<!--<div class="row">-->
<!--    <div class="col-xs-12">-->
<!--        <div class="widget-box" style="height: 480px">-->
<!--            <div class="widget-title">-->
<!--                <span class="icon"><i class="fa fa-signal"></i></span>-->
<!--                <h5>--><?php //echo t('Total of Visit');?><!--</h5>-->
<!---->
<!--            </div>-->
<!--            <div class="widget-content">-->
<!--                <div class="row">-->
<!---->
<!--                    <div class="col-xs-12 col-sm-12">-->
<!---->
<!--                        <div class="chart">-->
<!--                            --><?php
//                            $this->widget(
//                                'application.extensions.bootstrap.widgets.TbHighCharts',
//                                array(
//                                    'options' => array(
//                                        'title' => array(
//                                            'text' => '',
//                                            'x' => -20, //center
//
//                                        ),
//
//
//                                        'exporting' => array(
//                                            'enabled' => true,
//                                        ),
//                                        'series' => array(
//                                            array(
//                                                'type'=> 'pie',
//                                                'name' => t('Visits'),
//                                                'data' => array(
//                                                    array('Unique Visit to Service 1',(int) $this->getUniqueVisit('service_1', 1)),
//                                                    array('Not Unique Visit Service 1',(int)$this->getNonUniqueVisit('service_1', 1)),
//
//                                                    array('Unique Visit to Service 2',(int) $this->getUniqueVisit('service_2', 2)),
//                                                    array('Not Unique Visit Service 2',(int)$this->getNonUniqueVisit('service_2', 2)),
//
//                                                    array('Unique Visit to Service 3',(int) $this->getUniqueVisit('service_3', 3)),
//                                                    array('Not Unique Visit Service 3',(int)$this->getNonUniqueVisit('service_3', 3)),
//
//                                                    array('Unique Visit to Service 4',(int) $this->getUniqueVisit('service_4', 4)),
//                                                    array('Not Unique Visit Service 4',(int)$this->getNonUniqueVisit('service_4', 4)),
//
//                                                    array('Unique Visit to All Service',(int) $this->getUniqueVisit('all_services', 5)),
//                                                    array('Not Unique Visit All Service',(int)$this->getNonUniqueVisit('all_services', 5)),
//
//                                                ),
//
//                                            ),
//                                        )
//                                    ),
//                                    //'htmlOptions' => array('style'=> 'width: 300px; height: 300px'),
//                                )
//
//                            );
//
//
//
//                            ?>
<!---->
<!--                        </div>-->
<!---->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->
<!---->
<!--<div class="row">-->
<!--    <div class="col-xs-12">-->
<!--        <div class="widget-box" style="height: 480px">-->
<!--            <div class="widget-title">-->
<!--                <span class="icon"><i class="fa fa-signal"></i></span>-->
<!--                <h5>--><?php //echo t('Visit per Day');?><!--</h5>-->
<!---->
<!--            </div>-->
<!--            <div class="widget-content">-->
<!--                <div class="row">-->
<!---->
<!--                    <div class="col-xs-12 col-sm-12">-->
<!---->
<!--                        <div class="chart">-->
<!---->
<!--                            --><?php
//
//                            $this->widget(
//                                'application.extensions.bootstrap.widgets.TbHighCharts',
//                                array(
//                                    'options' => array(
//                                        'title' => array(
//                                            'text' => '',
//                                            'x' => -20 //center
//                                        ),
//                                        'exporting' => array(
//                                            'enabled' => true,
//                                        ),
//
//                                        'xAxis' => array(
//                                            'categories' => $date
//                                        ),
//                                        'yAxis' => array(
//                                            'title' => array(
//                                                'text' =>  t('Total'),
//                                            ),
//
//                                        ),
//                                        'legend' => array(
//                                            'layout' => 'vertical',
//                                            'align' => 'right',
//                                            'verticalAlign' => 'middle',
//                                            'borderWidth' => 1
//                                        ),
//                                        'series' => array(
//
//                                            array(
//                                                'name' => t('Visit to all services'),
//                                                'data' => $total_date
//                                            ),
//                                        )
//                                    )
//                                )
//                            );
//                            ?>
<!---->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->