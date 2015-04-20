<div class="container-fluid cn">
    <div class="row rt ">
        <?php echo $this->element('dashboard/navigation');?>
        <div class="col-sm-8 col-lg-10 col-md-9">
            <?php echo $this->Mysession->flash(); ?>
            <div class="row rr cl">
                <div class="col-md-12 rr ">
                    <div class="ps">
                        <h3 style="padding-left: 10px;padding-top: 10px;"> View Product Size</h3></div>
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
                                        echo  ucwords(isset($product_size_data['ProductCategory']['name']) ? $product_size_data['ProductCategory']['name'] : '');
                                        ?></td>
                                </tr>
                                <tr>
                                    <td class="table-title">Product Name</td>
                                    <td>  <?php
                                        echo  ucwords(isset($product_size_data['Product']['name']) ? $product_size_data['Product']['name'] : '');
                                        ?></td>
                                </tr>
                                <tr>
                                    <td class="table-title">Name</td>
                                    <td>  <?php
                                        echo  ucwords(isset($product_size_data['ProductSize']['name']) ? $product_size_data['ProductSize']['name'] : '');
                                        ?></td>
                                </tr>
                                <?php if (!empty($product_style_data['ProductSize']['type'])) { ?>
                                <tr>
                                    <td class="table-title">Type</td>
                                    <td> <?php
                                        echo ucwords(isset($product_style_data['ProductSize']['type']) ? $product_style_data['ProductSize']['type'] : '');
                                        ?></td>
                                </tr>
                                    <?php } ?>
                                <tr>
                                    <td class="table-title">Image</td>
                                    <td> <?php echo $this->Html->image('ProductSizeIcon/' . $product_size_data['ProductSize']['image'], array()); ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="table-title">Reference</td>
                                    <td> <?php
                                        echo ucwords(isset($product_size_data['ProductSize']['ref']) ? $product_size_data['ProductSize']['ref'] : '');
                                        ?></td>
                                </tr>
                                <tr>
                                    <td class="table-title">Status</td>
                                    <td> <?php  if ($product_size_data['ProductSize']['status'] == 1) {
                                        echo 'Activate';
                                    } else {
                                        echo "Deactive";
                                    }?>
                                    </td>
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