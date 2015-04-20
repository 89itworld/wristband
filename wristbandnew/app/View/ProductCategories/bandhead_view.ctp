<div class="container-fluid cn">
    <div class="row rt ">
        <?php echo $this->element('dashboard/navigation');?>
        <div class="col-sm-8 col-lg-10 col-md-9">
            <div class="row rr">
            <?php echo $this->Mysession->flash(); ?>
            <div class="row rr cl">
                <div class="col-md-12 rr ">
                    <div class="ps">
                        <h3 style="padding-left: 10px;padding-top: 10px;"> View Product Category</h3></div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="clearfix"></div>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <tbody>
                                <tr>
                                    <td class="table-title">Name</td>
                                    <td>  <?php
                                        echo  ucwords(isset($cat_data['ProductCategory']['name'])?$cat_data['ProductCategory']['name']:'');
                                     ?></td>
                                </tr>
                                <tr>
                                    <td class="table-title">Slug</td>
                                    <td> <?php
                                        echo isset($cat_data['ProductCategory']['slug'])?$cat_data['ProductCategory']['slug']:'';
                                    ?></td>
                                </tr>
                                <tr>
                                    <td class="table-title">Icon</td>
                                    <td> <?php echo $this->Html->image('ProductCategoryIcon/' . $cat_data['ProductCategory']['image'], array('style' => 'width:25px;height:25px;')); ?>
                          </td>
                                </tr>
                                  <?php if(!empty($cat_data['ProductCategory']['description'])) { ?>
                                   <tr>
                                    <td class="table-title">Details</td>
                                    <td> <?php
                                        echo isset($cat_data['ProductCategory']['description']) ? $cat_data['ProductCategory']['description'] : '';
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
</div>
<div class="clearfix"></div>