<div class="container-fluid cn">
    <div class="row rt ">
        <?php echo $this->element('dashboard/navigation');?>
        <div class="col-sm-8 col-lg-10 col-md-9">
            <?php echo $this->Mysession->flash(); ?>
            <div class="row rr cl">
                <div class="col-md-12 rr ">
                    <div class="ps">
                        <h3 style="padding-left: 10px;padding-top: 10px;"> View Product Style</h3></div>
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
                                        echo  ucwords(isset($product_style_data['ProductCategory']['name']) ? $product_style_data['ProductCategory']['name'] : '');
                                        ?></td>
                                </tr>
                                <tr>
                                    <td class="table-title">Product Name</td>
                                    <td>  <?php
                                        echo  ucwords(isset($product_style_data['Product']['name']) ? $product_style_data['Product']['name'] : '');
                                        ?></td>
                                </tr>
                                <tr>
                                    <td class="table-title">Name</td>
                                    <td>  <?php
                                        echo  ucwords(isset($product_style_data['ProductStyle']['name']) ? $product_style_data['ProductStyle']['name'] : '');
                                        ?></td>
                                </tr>
                                <?php if (!empty($product_style_data['ProductStyle']['type'])) { ?>
                                <tr>
                                    <td class="table-title">Type</td>
                                    <td> <?php
                                        echo ucwords(isset($product_style_data['ProductStyle']['type']) ? $product_style_data['ProductStyle']['type'] : '');
                                        ?></td>
                                </tr>
                                    <?php } ?>
                                <tr>
                                    <td class="table-title">Image</td>
                                    <td> <?php echo $this->Html->image('ProductStyleIcon/' . $product_style_data['ProductStyle']['image'], array()); ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="table-title">Status</td>
                                    <td> <?php  if ($product_style_data['ProductStyle']['status'] == 1) {
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