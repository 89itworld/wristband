<div class="container-fluid cn">
    <div class="row rt ">
        <?php echo $this->element('dashboard/navigation');?>
        <div class="col-sm-8 col-lg-10 col-md-9">
            <?php echo $this->Mysession->flash(); ?>
            <div class="row rr cl">
                <div class="col-md-12 rr ">
                    <div class="ps">
                        <h3 style="padding-left: 10px;padding-top: 10px;"> View Quantity</h3></div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <tbody>
                                <tr>
                                    <td class="table-title">Category Name</td>
                                    <td>  <?php
                                        echo  ucwords(isset($result[0]['ProductCategory']['name']) ? $result[0]['ProductCategory']['name'] : '');
                                        ?></td>
                                        

                                </tr>
                                
                                    <?php 
                                        
                                        foreach ($result as $key => $value) {
                                            
                                            echo '<tr><td class="table-title">Quantity Name</td>
                                    <td>';
                                        echo  ucwords(isset($value["QuantityPrice"]["name"]) ? $value["QuantityPrice"]["name"] : "");
                                        
                                    echo '</td></tr>';
                                        }
                                        
                                    ?>
                                
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