<input id="searcher_buy_url" hidden="hidden" value="<?php echo $this->createUrl('/frontend/default/buy_list')?>">
<input id="searcher_rent_url" hidden="hidden" value="<?php echo $this->createUrl('/frontend/default/rent_list')?>">
<form id="searcher_form" action="<?php echo $this->createUrl('/frontend/default/buy_list') ?>" method="get">

    <div class="search-input">
        <div data-toggle="buttons" class="text-left">
            <label class="btn active">
                <input type="radio" name="cat" value="buy" onchange="change_url_searcher_form('buy')" checked id="buy">
                <?php if (isset($searcher_buy)):
                    echo $searcher_buy;
                else:?>
                    to Buy
                <?php endif ?>
                <div class="white-arrow-up"></div>
            </label>
            <label class="btn">
                <input type="radio" name="cat" id="rent" value="rent" onchange="change_url_searcher_form('rent')">
                <?php if (isset($searcher_rent)):
                    echo $searcher_rent;
                else:?>
                    to Rent
                <?php endif ?>
                <div class="white-arrow-up"></div>
            </label>
        </div>
        <div class="input-group has-success">
            <input id="searcher_input" name="q" type="text"
                   placeholder="<?php if (isset($searcher_placeholder)): echo $searcher_placeholder;
                   else: ?>Search by address, city, zip code<?php endif ?>" class="form-control input-lg">
            <!--                <input type="text" placeholder="Search by address, city, zip code" class="form-control input-lg">-->
                <span class="input-group-btn">
                <button type="submit" class="btn btn-default btn-lg hover-transition"><i class="fa fa-search"></i>
                </button></span>
        </div>
    </div>
</form>