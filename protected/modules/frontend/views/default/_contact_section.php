<div class="contact-section">
    <div class="container">
        <div class="row equalize">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <h3 class="text-right contact-header"><?php echo $this->common_data['contact_us']; ?></h3>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="contact-info">
                    <div class="info">
                        <div class="icon-box text-center"><img src="<?php echo Yii::app()->baseUrl ?>/static/imgs/white-marker.png" class="img-responsive"></div>
                        <div class="info-box">
                            <p class="address">
                                <?php if(isset($this->common_data['postal_address'])):?>
                                    <?php echo $this->common_data['postal_address'];?>
                                <?php else:?>
                                    Av. Alemania No. 5 Bavaro, 23000,
                                    Republica Dominicana
                                <?php endif?>

                            </p>
                        </div>
                    </div>
                    <div class="info">
                        <div class="icon-box text-center"><img src="<?php echo Yii::app()->baseUrl ?>/static/imgs/white-cell.png" class="img-responsive"></div>
                        <div class="info-box">
                            <a href="tel:<?php echo (isset($this->common_data['main_phone']) ? $this->common_data['main_phone'] : "809-757-6884") ?>"
                                        class="hvr-underline-from-center phone"><?php echo Yii::t('labels', 'CALL US')?>
                                <strong>
                                    <?php if(isset($this->common_data['main_phone'])):?>
                                        <?php echo $this->common_data['main_phone'];?>
                                    <?php else:?>
                                        809-757-6884
                                    <?php endif?>
                                </strong>
                            </a>
                        </div>
                    </div>
                    <div class="info">
                        <div class="icon-box text-center"><img src="<?php echo Yii::app()->baseUrl ?>/static/imgs/white-envelop.png" class="img-responsive"></div>
                        <div class="info-box">
                            <a href="mailto:<?php if(isset($this->common_data['email'])):echo $this->common_data['email'];else:?>sales@puntacanahome.com<?php endif?>" class="hvr-underline-from-center text-uppercase email">
                                <?php if(isset($this->common_data['email'])):
                                    echo $this->common_data['email'];
                                else:?>
                                    sales@irealty.com
                                <?php endif?>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>