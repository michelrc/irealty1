<?php
/* @var $blog Array */
?>

<div class="divider-line"></div>
<div class="content-light-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 gallery-section most-popular-section">
                <h2 class="text-center section-title">
                    <?php if (isset($popular_property_title)):
                        echo $popular_property_title;
                    else:?>
                        <strong>Most Recent</strong> Properties
                    <?php endif ?>
                </h2>

                <div class="property-gallery">
                    <?php $inverted = true; ?>
                    <?php $count = 0; ?>
                    <?php foreach ($most_popular_properties as $property): ?>
                        <?php if ($count == 4) : ?>
                            <?php break; ?>
                        <?php elseif ($count % 2 == 0) : ?>
                            <div class="wrapper">
                            <?php $this->renderPartial('_property', array('property' => $property, 'inverted' => $inverted)); ?>
                        <?php
                        else : ?>
                            <?php $this->renderPartial('_property', array('property' => $property, 'inverted' => $inverted)); ?>
                            </div>
                        <?php endif; ?>
                        <?php $inverted = !$inverted; ?>
                        <?php $count++; ?>
                    <?php endforeach ?>
                </div>
            </div>
        </div>
    </div>
</div>