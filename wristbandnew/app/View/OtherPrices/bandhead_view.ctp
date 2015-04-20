<div class="container-fluid cn">
    <div class="row rt ">
        <?php echo $this->element('dashboard/navigation');?>
        <div class="col-sm-8 col-lg-10 col-md-9">
            <?php echo $this->Mysession->flash(); ?>
            <div class="row rr cl">
                <div class="col-md-12 rr ">
                    <div class="ps">
                        <h3 style="padding-left: 10px;padding-top: 10px;"> View Product Price</h3></div>
                </div>
                
                <div class="row">
                    <div class="col-lg-12">
                        <div class="clearfix"></div>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <tbody>
                                <tr>
                                    <td class="table-title">Category Name</td>
                                    <td>  <?php
                                        echo  ucwords(isset($price_data[0]['ProductCategory']['name']) ? $price_data[0]['ProductCategory']['name'] : '');
                                        ?></td>
                                     <td class="table-title">Product Name</td>
                                    <td>  <?php
                                        echo  ucwords(isset($price_data[0]['Product']['name']) ? $price_data[0]['Product']['name'] : '');
                                        ?></td>
                                </tr>
                                <tr>
                                    <td class="table-title">Product Size</td>
                                    <td>  <?php
                                        echo  ucwords(isset($price_data[0]['ProductSize']['name']) ? $price_data[0]['ProductSize']['name'] : '');
                                        ?></td>
                                     <td class="table-title">Product Style</td>
                                    <td>  <?php
                                        echo  ucwords(isset($price_data[0]['ProductStyle']['name']) ? $price_data[0]['ProductStyle']['name'] : '');
                                        ?></td>
                                </tr>
                                <?php foreach ($price_data as $record) { ?>
                                <tr>
                                    <td class="table-title">Quantity Price: <?php echo $record["QuantityPrice"]["name"]; ?></td>
                                    <td>  <?php
                                        echo  isset($record['OtherPrice']['price']) ? $record['OtherPrice']['price'] : '';
                                        ?></td>
                                     <td class="table-title">Quantity Free: <?php echo $record["OtherPrice"]["qty"]; ?></td>
                                    <td>  <?php
                                        echo  isset($record['OtherPrice']['free_qty']) ? $record['OtherPrice']['free_qty'] : '';
                                        ?></td>
                                </tr>
                                    <?php } ?>
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