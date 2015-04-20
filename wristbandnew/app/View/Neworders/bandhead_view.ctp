<div class="container-fluid cn">
    <div class="row rt ">
        <?php echo $this->element('dashboard/navigation');?>
        <div class="col-sm-8 col-lg-10 col-md-9">
            <?php echo $this->Mysession->flash(); ?>
            <div class="row rr cl">
                <div class="col-md-12 rr ">
                    <div class="ps">
                        <h3 style="padding-left: 10px;padding-top: 10px;"> View Order</h3></div>
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
                                    <td class="table-title">Order Date</td>
                                    <td>  <?php
                                        echo  isset($record['Order']['ord_date']) ? $record['Order']['ord_date'] : '';
                                        ?></td>
                                     <td class="table-title">Order Time</td>
                                    <td>  <?php
                                        echo  isset($record['Order']['ord_time']) ? $record['Order']['ord_time'] : '';
                                        ?></td>
                                </tr>
                                <tr>
                                    <td class="table-title">Client IP</td>
                                    <td>  <?php
                                        echo  isset($record['Order']['client_ip']) ? $record['Order']['client_ip'] : '';
                                        ?></td>
                                     <td class="table-title">User Name</td>
                                    <td>  <?php
                                        echo  isset($record['Order']['user_id']) ? $record['User']['first_name'].' '.$record['User']['last_name'] : '';
                                        ?></td>
                                </tr>
                                <tr>
                                    <td class="table-title">Session ID</td>
                                    <td>  <?php
                                        echo  isset($record['Order']['session_id']) ? $record['Order']['session_id'] : '';
                                        ?></td>
                                     <td class="table-title">Front Message</td>
                                    <td>  <?php
                                        echo  isset($record['Order']['front_msg']) ? $record['Order']['front_msg'] : '';
                                        ?></td>
                                </tr>
                                <tr>
                                    <td class="table-title">Front Message Price</td>
                                    <td>  <?php
                                        echo  isset($record['Order']['front_msg_price']) ? $record['Order']['front_msg_price'] : '';
                                        ?></td>
                                     <td class="table-title">Back Message</td>
                                    <td>  <?php
                                        echo  isset($record['Order']['back_msg']) ? $record['Order']['back_msg'] : '';
                                        ?></td>
                                </tr>
                                <tr>
                                    <td class="table-title">Back Message Price</td>
                                    <td>  <?php
                                        echo  isset($record['Order']['back_msg_price']) ? $record['Order']['back_msg_price'] : '';
                                        ?></td>
                                     <td class="table-title">Intr Message</td>
                                    <td>  <?php
                                        echo  isset($record['Order']['intr_msg']) ? $record['Order']['intr_msg'] : '';
                                        ?></td>
                                </tr>
                                <tr>
                                    <td class="table-title">Intr Message Price</td>
                                    <td>  <?php
                                        echo  isset($record['Order']['intr_msg_price']) ? $record['Order']['intr_msg_price'] : '';
                                        ?></td>
                                     <td class="table-title">Bandsize</td>
                                    <td>  <?php
                                        echo  isset($record['Order']['bandsize']) ? $record['Order']['bandsize'] : '';
                                        ?></td>
                                </tr>
                                <tr>
                                    <td class="table-title">Front Start Clip</td>
                                    <td>  <?php
                                        echo  isset($record['Order']['front_start_clip']) ? $record['Order']['front_start_clip'] : '';
                                        ?></td>
                                     <td class="table-title">Front End Clip</td>
                                    <td>  <?php
                                        echo  isset($record['Order']['front_end_clip']) ? $record['Order']['front_end_clip'] : '';
                                        ?></td>
                                </tr>
                                <tr>
                                    <td class="table-title">Back Start Clip</td>
                                    <td>  <?php
                                        echo  isset($record['Order']['back_start_clip']) ? $record['Order']['back_start_clip'] : '';
                                        ?></td>
                                     <td class="table-title">Back End Clip</td>
                                    <td>  <?php
                                        echo  isset($record['Order']['back_end_clip']) ? $record['Order']['back_end_clip'] : '';
                                        ?></td>
                                </tr>
                                <tr>
                                    <td class="table-title">Intr Start Clip</td>
                                    <td>  <?php
                                        echo  isset($record['Order']['intr_start_clip']) ? $record['Order']['intr_start_clip'] : '';
                                        ?></td>
                                     <td class="table-title">Intr End Clip</td>
                                    <td>  <?php
                                        echo  isset($record['Order']['intr_end_clip']) ? $record['Order']['intr_end_clip'] : '';
                                        ?></td>
                                </tr>
                                <tr>
                                    <td class="table-title">Clipart Per Price</td>
                                    <td>  <?php
                                        echo  isset($record['Order']['clipart_per_price']) ? $record['Order']['clipart_per_price'] : '';
                                        ?></td>
                                     <td class="table-title">Keychain</td>
                                    <td>  <?php
                                        echo  isset($record['Order']['keychain']) ? $record['Order']['keychain'] : '';
                                        ?></td>
                                </tr>
                                <tr>
                                    <td class="table-title">Keychain Price</td>
                                    <td>  <?php
                                        echo  isset($record['Order']['keychain_price']) ? $record['Order']['keychain_price'] : '';
                                        ?></td>
                                     <td class="table-title">Individually Bagged</td>
                                    <td>  <?php
                                        echo  isset($record['Order']['individually_bagged']) ? $record['Order']['individually_bagged'] : '';
                                        ?></td>
                                </tr>
                                <tr>
                                    <td class="table-title">Individually Bagged Price</td>
                                    <td>  <?php
                                        echo  isset($record['Order']['individually_bagged_price']) ? $record['Order']['individually_bagged_price'] : '';
                                        ?></td>
                                    <td class="table-title">Made</td>
                                    <td>  <?php
                                        echo  isset($record['Order']['made']) ? $record['Order']['made'] : '';
                                        ?></td>
                                </tr>
                                <tr>
                                    <td class="table-title">Individually Bagged Price</td>
                                    <td>  <?php
                                        echo  isset($record['Order']['individually_bagged_price']) ? $record['Order']['individually_bagged_price'] : '';
                                        ?></td>
                                    <td class="table-title">Made</td>
                                    <td>  <?php
                                        echo  isset($record['Order']['made']) ? $record['Order']['made'] : '';
                                        ?></td>
                                </tr>
                                <tr>
                                    <td class="table-title">Made Price</td>
                                    <td>  <?php
                                        echo  isset($record['Order']['made_price']) ? $record['Order']['made_price'] : '';
                                        ?></td>
                                    <td class="table-title">Production Time</td>
                                    <td>  <?php
                                        echo  isset($record['Order']['production_time']) ? $record['Order']['production_time'] : '';
                                        ?></td>
                                </tr>
                                <tr>
                                    <td class="table-title">Production Time Price</td>
                                    <td>  <?php
                                        echo  isset($record['Order']['production_time_price']) ? $record['Order']['production_time_price'] : '';
                                        ?></td>
                                    <td class="table-title">Shipping Time</td>
                                    <td>  <?php
                                        echo  isset($record['Order']['shipping_time']) ? $record['Order']['shipping_time'] : '';
                                        ?></td>
                                </tr>
                                <tr>
                                    <td class="table-title">Shipping Time Price</td>
                                    <td>  <?php
                                        echo  isset($record['Order']['shipping_time_price']) ? $record['Order']['shipping_time_price'] : '';
                                        ?></td>
                                    <td class="table-title">Total Quantity</td>
                                    <td>  <?php
                                        echo  isset($record['Order']['total_qty']) ? $record['Order']['total_qty'] : '';
                                        ?></td>
                                </tr>
                                <tr>
                                    <td class="table-title">Per Price</td>
                                    <td>  <?php
                                        echo  isset($record['Order']['per_price']) ? $record['Order']['per_price'] : '';
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