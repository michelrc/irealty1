<input id="searcher_buy_url" hidden="hidden" value="<?php echo $this->createUrl('/frontend/default/buy_list')?>">
<input id="searcher_rent_url" hidden="hidden" value="<?php echo $this->createUrl('/frontend/default/rent_list')?>">
<form id="searcher_form" action="<?php echo $this->createUrl('/frontend/default/buy_list') ?>" method="get">

    <div class="mobile-search-section visible-xs">
        <div class="filter-buttons">
            <div data-toggle="buttons" class="btn-group">
                <label class="btn active text-uppercase">
                    <input type="radio" name="cat" value="buy" onchange="change_url_searcher_form('buy')" checked id="buy">
                    <?php if (isset($searcher_buy)):
                        echo $searcher_buy;
                    else:?>
                        Buy
                    <?php endif ?>
                </label>
                <label class="btn text-uppercase">
                    <input type="radio" name="cat" id="rent" value="rent" onchange="change_url_searcher_form('rent')">
                    <?php if (isset($searcher_rent)):
                        echo $searcher_rent;
                    else:?>
                        Rent
                    <?php endif ?>
                </label>
            </div>
        </div>
        <div class="mobile-search-input recent-properties-search">
            <div class="input-group has-success">
                <input  id="searcher_input_mobile" name="q" type="text" placeholder="<?php if (isset($searcher_placeholder)): echo $searcher_placeholder;
                                   else: ?>Search by address, city, zip code<?php endif ?>" class="form-control"><span
                    class="input-group-btn">
            <button type="submit" class="btn btn-default"><i class="fa fa-search"></i>
            </button></span>
            </div>
        </div>
    </div>
</form>