<style>
    
    .table-title{ line-height: 30px !important; }
    
    tr > td { line-height: 30px !important; }
    
</style>

<div class="container-fluid cn">
    <div class="row rt ">
        <?php echo $this->element('dashboard/navigation');?>
        <div class="col-sm-8 col-lg-10 col-md-9">
            <?php echo $this->Mysession->flash(); ?>
            <div class="row rr cl">
                <div class="col-md-12 rr ">
                    <div class="ps">
                        <h3 style="padding-left: 10px;padding-top: 10px;"> View Product Color</h3></div>
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
                                        echo  ucwords(isset($price_data['ProductCategory']['name']) ? $price_data['ProductCategory']['name'] : '');
                                        ?></td>
                                     <td class="table-title">Product Name</td>
                                    <td>  <?php
                                        echo  ucwords(isset($price_data['Product']['name']) ? $price_data['Product']['name'] : '');
                                        ?></td>
                                </tr>
                                <tr>
                                    <td class="table-title">Product Size</td>
                                    <td>  <?php
                                        echo  ucwords(isset($price_data['ProductSize']['name']) ? $price_data['ProductSize']['name'] : '');
                                        ?></td>
                                     <td class="table-title">Product Style</td>
                                    <td>  <?php
                                        echo  ucwords(isset($price_data['ProductStyle']['name']) ? $price_data['ProductStyle']['name'] : '');
                                        ?></td>
                                </tr>
                                <?php 

                                    if (strpos($price_data['ProductColor']['hex_value'], ',') !== false) {
                                
                                        $colors = explode(',', $price_data['ProductColor']['hex_value']);
                                    } else {
                                            
                                        $colors[0] = $price_data['ProductColor']['hex_value'];
                                    }
                                    
                                    //pr($colors); die;
                                    
                                    echo "<tr>";
                                    
                                        foreach ($colors as $key => $color) {
                                                
                                                if($key % 2 == 0){
                                                    
                                                    echo "<tr/><tr>";
                                                }
                                                
                                                echo "<td class='table-title'>Color</td>
                                                <td>
                                                    <div style='border:1px solid black; background: none repeat scroll 0 0 $color; float:left; height:20px; margin-right:10px; margin-top:5px; width:35px;'></div> 
                                                        $color
                                                </td>";
                                    
                                        } ?>
                                    <tr/>
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