<div class="container-fluid cn">
    <div class="row rt ">
        <?php echo $this->element('dashboard/navigation');?>
        <div class="col-sm-8 col-lg-10 col-md-9">
            <div class="row rr cl">
                <div class="col-md-12 rr ">
                    <div class="ps">
                        <h3 style="padding-left: 10px;padding-top: 10px;"> View Product Category</h3></div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <tbody>
                                <tr>
                                    <td class="table-title">Category Name</td>
                                    <td>  <?php
                                        echo  ucwords(isset($ship_price_data['ProductCategory']['name'])?$ship_price_data['ProductCategory']['name']:'');
                                     ?></td>
                                </tr>
                                <tr>
                                    <td class="table-title">Day</td>
                                    <td> <?php
                                        echo isset($ship_price_data['MetaDay']['name'])?$ship_price_data['MetaDay']['name']:'';
                                    ?></td>
                                </tr>
                                <tr>
                                    <td class="table-title">Price</td>
                                    <td> <?php
                                        echo isset($ship_price_data['ShipTimePrice']['price'])?$ship_price_data['ShipTimePrice']['price']:'';
                                    ?></td>
                                </tr>
                                <tr>
                                    <td class="table-title">Quantity</td>
                                    <td> <?php
                                        echo isset($ship_price_data['ShipTimePrice']['qty'])?$ship_price_data['ShipTimePrice']['qty']:'';
                                    ?></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<div class="clearfix"></div>