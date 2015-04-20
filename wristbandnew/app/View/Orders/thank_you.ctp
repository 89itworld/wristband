<?php  echo $this->Html->css(array('front/colorbox'), array('media' => 'screen'));  
    
    pr($order_details);
    
    if (!empty($ship_bill_details['ShipBillAddress']['ship_state'])) {
        
        $shipState = $ship_bill_details['ShipBillAddress']['ship_state']; 
    } else {
        
        $shipState = $ship_bill_details['ShipBillAddress']['ship_state2'];
    }
    
    if (!empty($ship_bill_details['ShipBillAddress']['bill_state'])) {
        
        $billState = $ship_bill_details['ShipBillAddress']['bill_state']; 
    } else {
        
        $billState = $ship_bill_details['ShipBillAddress']['bill_state2'];
    }
    
?>
<div class="page checkout">
    <h1 class="text-center alert alert-info">Order Confirmation</h1>
    <p class="text-center lead margin-bootom-10">
        Your order # <span class="text-success chgFont"><strong><?php echo $order_details['OrderDummyDetail']['order_id'] ?></strong></span> has been placed.
    </p>
    <p class="text-center lead">
        Your order total: <strong>$<?php echo $order_details['OrderDummyDetail']['price'] ?></strong>
    </p><br />
    <div class="col-xs-12 col-sm-12 padding  table-responsive">
        <table class="table order-confirm table-bordered">
            <thead>
                <tr>
                    <th class="text-info h4">Billing Address</th>
                    <th class="text-info h4">Shipping Address</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td> <?php echo $ship_bill_details['ShipBillAddress']['ship_first_name'].' '.$ship_bill_details['ShipBillAddress']['ship_last_name'] ?>
                    <br>
                    <?php echo $ship_bill_details['ShipBillAddress']['ship_address'] ?>
                    <br>
                    <?php echo $ship_bill_details['ShipBillAddress']['ship_suite'] ?>
                    <br>
                    <?php echo $ship_bill_details['ShipBillAddress']['ship_city'].', '.$shipState.' '.$ship_bill_details['ShipBillAddress']['ship_zipcode'].' - '.$ship_bill_details['ShipBillAddress']['ship_country'] ?>
                    <br>
                    <b>Phone:-</b> <?php echo $ship_bill_details['ShipBillAddress']['ship_phone'] ?>
                    <br>
                    <b>Email:-</b> <?php echo $ship_bill_details['ShipBillAddress']['ship_emailaddress'] ?>
                    <br>
                    </td>
                    <td> <?php echo $ship_bill_details['ShipBillAddress']['bill_first_name'].' '.$ship_bill_details['ShipBillAddress']['bill_last_name'] ?>
                    <br>
                    <?php echo $ship_bill_details['ShipBillAddress']['bill_address'] ?>
                    <br>
                    <?php echo $ship_bill_details['ShipBillAddress']['bill_suite'] ?>
                    <br>
                    <?php echo $ship_bill_details['ShipBillAddress']['bill_city'].', '.$billState.' '.$ship_bill_details['ShipBillAddress']['bill_zipcode'].' - '.$ship_bill_details['ShipBillAddress']['bill_country'] ?>
                    <br>
                    <b>Phone:-</b> <?php echo $ship_bill_details['ShipBillAddress']['bill_phone'] ?>
                    <br>
                    <b>Email:-</b> <?php echo $ship_bill_details['ShipBillAddress']['bill_emailaddress'] ?>
                    <br>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="col-xs-12 col-sm-12 padding table-responsive">
        <table class="table order-confirm table-bordered mycart">
            <tbody>
                <tr>
                    <th width="100"></th>
                    <th width="300" class="panel-primary">Product Details</th>
                    <th width="80" class="text-center">Qty</th>
                    <th width="50" class="text-right">Sub Total</th>
                </tr>
                <tr>
                    <td>
                        <?php echo $this->Html->image('ProductIcon/'.$order_details['OrderDummyDetail']['category_img'],array('alt'=>"", 'class'=>"img-responsive center-block", 'width' => '100%')); ?>
                    </td>
                    <td><h4><?php echo ucfirst($order_details['OrderDummyDetail']['category']).' '.ucfirst($order_details['OrderDummyDetail']['product']).' » '.ucfirst($order_details['OrderDummyDetail']['style']) ?></h4>
                    <p>
                        Band Size - <span>&nbsp; <?php echo $order_details['OrderDummyDetail']['size'] ?> </span>
                    </p>
                    <p>
                        Size - <span>&nbsp;Youth(7)</span>
                    </p>
                    <p>
                        Band Color - <span>&nbsp; <?php echo $order_details['OrderDummyDetail']['color'] ?></span>
                    </p>
                    <p>
                        Band Style - <span>&nbsp;<?php echo $order_details['OrderDummyDetail']['style'].'('.$order_details['OrderDummyDetail']['qty'].')' ?> </span>
                    </p>
                    <p>
                        Font Name - <span>&nbsp; <?php echo $order_details['OrderDummyDetail']['font_name'] ?></span>
                    </p>
                    <p>
                        Message Style - <span>&nbsp; <?php echo $order_details['OrderDummyDetail']['msg_style'] ?></span>
                    </p>
                    <p>
                        Individual wrapper: - <span>&nbsp; <?php echo $order_details['OrderDummyDetail']['wrapper'] ?></span>
                    </p>
                    <p>
                        Keychain: - <span>&nbsp; <?php echo $order_details['OrderDummyDetail']['keychain'] ?></span>
                    </p>
                    <p>
                        Production time - <span>&nbsp; <?php echo $order_details['OrderDummyDetail']['production_time'] ?></span>
                    </p>
                    <p>
                        Shipping time - <span>&nbsp; <?php echo $order_details['OrderDummyDetail']['shipping_time'] ?></span>
                    </p>
                    <p>
                        Digital proof - <span>&nbsp; <?php echo $order_details['OrderDummyDetail']['proof'] ?> </span>
                    </p>
                    <p>
                        Delivery Date - <span>&nbsp; <?php echo $order_details['OrderDummyDetail']['delivery_date'] ?></span>
                    </p></td>
                    <td class="text-center"><?php echo $order_details['OrderDummyDetail']['qty'] ?> </td>
                    <td class="text-right">$ <?php echo $order_details['OrderDummyDetail']['price'] ?></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<?php echo $this->Html->script(array('front/global', 'front/colorbox-min'));  ?>