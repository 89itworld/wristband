<div class="container-fluid cn" >
            <div class="row rt ">
                <?php echo $this->element('dashboard/navigation');?>
                <div class="col-sm-8 col-lg-10 col-md-9">
                    <?php echo $this->Mysession->flash(); ?>
                    <div class="row rr cl">
                        <div class="col-md-12 rr " >
                            <div class="ps">
                            <h3 style="padding-left: 10px;padding-top: 10px;"> View Color</h3></div>
                        </div>
                        
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <tbody>
                                        <tr>
                                            <td class="table-title">Name</td>
                                            <td>  <?php
                                                echo isset($color_data['Color']['name'])?$color_data['Color']['name']:'';
                                             ?></td>
                                        </tr>
                                        <tr>
                                            <td class="table-title">Code</td>
                                            <td><div style="border:1px solid black; background: none repeat scroll 0 0 <?php echo $color_data['Color']['hex_value'];?>; float:left; height:25px; margin-right:10px; width:35px;"></div> <?php echo isset($record['ProductColor']['color_hex']) ? $record['ProductColor']['color_hex'] : '';?></div> <?php
                                                echo isset($color_data['Color']['hex_value'])?$color_data['Color']['hex_value']:'';
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