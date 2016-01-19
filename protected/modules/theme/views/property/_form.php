
<?php
/**
 * The following code was generated automatically using GiixCrudCode
 * This generator was improve by iReevo Team
 */
 ?>

<?php $form = $this->beginWidget('application.extensions.bootstrap.widgets.TbActiveForm', array(
    'id' => 'property-form',
    'enableClientValidation'=>true,

));
?>

<div class="tabbable inline">
    <ul id="myProductTab" class="nav nav-tabs tab-bricky">
        <li class="active">
            <a href="#product_panel_tab1" data-toggle="tab">
                <?php echo Yii::t('BACKEND_LABELS', 'Details page')?>
            </a>
        </li>
        <li>
            <a href="#product_panel_tab2" data-toggle="tab">
                <?php echo Yii::t('BACKEND_LABELS', 'Información General')?>
            </a>
        </li>
        <li>
            <a href="#product_panel_tab3" data-toggle="tab">
                <?php echo Yii::t('BACKEND_LABELS', 'Gallery')?>
            </a>
        </li>
        <li>
            <a href="#product_panel_tab4" data-toggle="tab">
                <?php echo Yii::t('BACKEND_LABELS', 'Amenities')?>
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane in active" id="product_panel_tab1">
            <div class="widget-box">
                <?php $this->renderPartial('_formDetailsPage', array('form' => $form, 'model' => $model))?>
            </div>
        </div>
        <div class="tab-pane" id="product_panel_tab2">
            <div class="widget-box">
                <?php $this->renderPartial('_formGeneralInformation', array('form' => $form, 'model' => $model))?>
            </div>
        </div>
        <div class="tab-pane" id="product_panel_tab3">
            <div class="widget-box">
<!--                --><?php //$tlabel = CActiveRecord::model($gallery_model->class) ?>
                <table id="productGallTable" class="offset1 table table-bordered table-stripped" style="width: 800px;">
                    <thead>
                    <tr>
                        <th><?php echo PropertyGallery::model()->getAttributeLabel('recipeImg1')?></th>
                        <th><?php echo PropertyGallery::model()->getAttributeLabel('image')?></th>
                        <th>
                            <?php echo CHtml::ajaxLink(
                                CHtml::tag( 'i', array('class' => 'glyphicon glyphicon-plus', 'title' => Yii::t('transfer', 'Add new image')),''),
                                array('//theme/default/addProductGallRow'),
                                                            array('type' => 'POST', 'success' => 'function(data){ $("#productGallTable tbody").append(data);add_gall(); $("#metaTable .error").tooltip(); }')
                            );
                            ?>
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    //                    ddump($gallery_model);
                    $form->type = 'inline';
                    foreach ($gallery_model->getItems() as $id => $data):
                        $this->renderPartial('_galleryForm', array('form' => $form, 'id' => $id, 'data' => $data));
                    endforeach
                    ?>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="tab-pane in active" id="product_panel_tab4">
                    <div class="widget-box">
                        <table id="productAmenitieTable" class="offset1 table table-bordered table-stripped" style="width: 800px;">
                            <thead>
                            <tr>
                                <th><?php echo PropertyAmenitie::model()->getAttributeLabel('amenitie_id')?></th>
                                <th><?php echo PropertyAmenitie::model()->getAttributeLabel('relevant')?></th>
                                <th>
                                    <?php echo CHtml::ajaxLink(
                                        CHtml::tag( 'i', array('class' => 'glyphicon glyphicon-plus', 'title' => Yii::t('transfer', 'Add new image')),''),
                                        array('//theme/default/addProductAmenitieRow'),
                                                                    array('type' => 'POST', 'success' => 'function(data){ $("#productAmenitieTable tbody").append(data); $("#metaTable .error").tooltip(); }')
                                    );
                                    ?>
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $form->type = 'inline';
                                foreach($model->propertyAmenities as $data):
                                    $this->renderPartial('_formAmenities', array('form' => $form, 'model' => $data));
                                endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>
    </div>
</div>


    <?php $model->seoFormWidget($form); ?>




<div class='form-actions'>   <a href='<?php echo app()->request->urlReferrer;?>' class='btn btn-default'><span class='glyphicon glyphicon-arrow-left'></span><?php echo t('Back');?></a>   <?php $this->widget(
        'application.extensions.bootstrap.widgets.TbButton',
        array(
            'buttonType' => 'submit',
            'context' => 'primary',
            'icon'=> 'glyphicon glyphicon-saved',
            'label' => t('Save item')
        )
    ); ?>
    <?php $this->widget(
        'application.extensions.bootstrap.widgets.TbButton',
        array(
            'buttonType' => 'reset',
            'context' => 'warning',
            'icon'=> 'glyphicon glyphicon-remove',
            'label' => t('Reset form')
        )
    ); ?>
    <?php $this->endWidget(); ?>
    <?php if(isset($model->id)){
       // echo CHtml::link(t(TbHtml::icon('glyphicon glyphicon-remove'). 'Remove item'),array('delete','id'=>$model->id),array('class'=>'btn btn-danger'));
    }?></div>
