<div class="container-fluid cn">
    <div class="row rt ">
        <?php echo $this->element('dashboard/navigation');?>
        <div class="col-sm-8 col-lg-10 col-md-9">
            <?php echo $this->Mysession->flash(); ?>
            <div class="row rr cl">
                <div class="col-md-12 rr ">
                    <div class="ps">
                        <h3 style="padding-left: 10px;padding-top: 10px;"> View Product</h3></div>
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
                                        echo  ucwords(isset($product_data['ProductCategory']['name']) ? $product_data['ProductCategory']['name'] : '');
                                        ?></td>
                                </tr>
                                <tr>
                                    <td class="table-title">Name</td>
                                    <td>  <?php
                                        echo  ucwords(isset($product_data['Product']['name']) ? $product_data['Product']['name'] : '');
                                        ?></td>
                                </tr>
                                <tr>
                                    <td class="table-title">Slug</td>
                                    <td> <?php
                                        echo isset($product_data['Product']['slug']) ? $product_data['Product']['slug'] : '';
                                        ?></td>
                                </tr>
                                <tr>
                                    <td class="table-title">Reference</td>
                                    <td> <?php
                                        echo isset($product_data['Product']['ref']) ? $product_data['Product']['ref'] : '';
                                        ?></td>
                                </tr>
                                  <?php if(!empty($product_data['Product']['description'])) { ?>
                                   <tr>
                                    <td class="table-title">Details</td>
                                    <td> <?php
                                        echo isset($product_data['Product']['description']) ? $product_data['Product']['description'] : '';
                                        ?></td>
                                </tr>
    <?php } ?>
                                <tr>
                                    <td class="table-title">Icon</td>
                                    <td> <?php echo $this->Html->image('ProductIcon/' . $product_data['Product']['image'], array()); ?>
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