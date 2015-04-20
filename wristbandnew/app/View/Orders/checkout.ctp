<?php   echo $this->Html->css(array('front/colorbox'), array('media' => 'screen'));     ?>

<div class="checkout">
    
        <div class="row login-form">
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-default">
                        <div class="row">
                            <div class="col-lg-12">
                                <img src="../img/logo-type.png" alt="logo" class="img-responsive center-block" />
                            </div>
                        </div>
                        <div class="panel-heading"> <strong class="">Login</strong>
                        </div>
                        <div class="panel-body">
                            <form class="form-horizontal" role="form">
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-3 control-label">Email</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" id="inputEmail3" placeholder="Email" required="" type="email">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputPassword3" class="col-sm-3 control-label">Password</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" id="inputPassword3" placeholder="Password" required="" type="password">
                                        <a href="#"><p>Forget Password ?</p></a>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-offset-3 col-sm-9">
                                        <div class="checkbox">
                                            <label class="">
                                                <input class="" type="checkbox">Remember me</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group last">
                                    <div class="col-sm-offset-3 col-sm-9">
                                        <button type="submit" class="btn btn-success btn-sm">Sign in</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="panel-footer"></div>
                    </div>
                </div>
            </div>

    
<form action="" method="post" class="ChkFrm row">

        <div class="col-lg-12 padding">
        <div class="col-xs-12 col-sm-6">
            <div class="box">
                <h2>Shipping Address</h2>
                <p>
                    <span>Company Name</span>
                    <span><?php echo $this->Form->input('ship_company_name', array('type' => 'text', 'class' => 'input', 'div' => false, 'label' => false, 'name' => 'ship_company_name' )); ?></span>
                </p>
                    <p><span>First Name<b class="mandatory">*</b></span><span>
                        <?php echo $this->Form->input('ship_first_name', array('type' => 'text', 'class' => 'input required', 'div' => false, 'label' => false, 'name' => 'ship_first_name' )); ?>
                        </span></p>
                    <p><span>Last Name<b class="mandatory">*</b></span><span>
                        <?php echo $this->Form->input('ship_last_name', array('type' => 'text', 'class' => 'input required', 'div' => false, 'label' => false, 'name' => 'ship_last_name' )); ?>
                        </span></p>
                    <p><span>Address<b class="mandatory">*</b></span><span>
                        <?php echo $this->Form->input('ship_address', array('type' => 'text', 'class' => 'input required', 'div' => false, 'label' => false, 'id' => 'ship_address', 'name' => 'ship_address' )); ?>
                        <em>We do not ship to PO Boxes.</em></span></p>
                    <p><span>Suite or Apt#</span><span>
                        <?php echo $this->Form->input('ship_suite', array('type' => 'text', 'class' => 'input', 'div' => false, 'label' => false, 'name' => 'ship_suite' )); ?>
                        </span></p>
                    <p><span>City<b class="mandatory">*</b></span><span>
                        <?php echo $this->Form->input('ship_city', array('type' => 'text', 'class' => 'input', 'div' => false, 'label' => false, 'name' => 'ship_city' )); ?>
                        </span></p>
                    <p><span>State/Province/Region<b class="mandatory">*</b></span>
                            <span id="shipState2" style="display:none;">
                                <?php echo $this->Form->input('ship_state2', array('type' => 'text', 'class' => 'input required', 'div' => false, 'label' => false, 'name' => 'ship_state2' )); ?>
                            </span>
                    <span id="shipState1">
                        <?php echo $this->Form->input('ship_state', array('options' => $shipRegions, 'empty' => '-Select-', 'class' => 'input required', 'label' => false, 'div' => false, 'name' => 'ship_state')); ?>
                    </span>
                    </p>
                    <p><span>Zip Code<b class="mandatory">*</b></span><span>
                        <?php echo $this->Form->input('ship_zipcode', array('type' => 'text', 'class' => 'input required', 'div' => false, 'label' => false, 'name' => 'ship_zipcode' )); ?>
                        </span></p>
                    <p><span>Country<b class="mandatory">*</b></span><span>
                    
                    <?php echo $this->Form->input('ship_country', array('options' => $shipCountries, 'default' => 'US', 'class' => 'input required', 'label' => false, 'div' => false, 'escape' => false, 'name' => 'ship_country')); ?>
                    
                    </span></p>
                    <p><span>Phone<b class="mandatory">*</b></span><span>
                        <?php echo $this->Form->input('ship_phone', array('type' => 'text', 'class' => 'input required number', 'div' => false, 'label' => false, 'name' => 'ship_phone' )); ?>
                        </span></p>
                    <p><span>Fax Number</span><span>
                        <?php echo $this->Form->input('ship_faxnumber', array('type' => 'text', 'class' => 'input', 'div' => false, 'label' => false, 'name' => 'ship_faxnumber' )); ?>
                        </span></p>
                    <p><span>Email Address<b class="mandatory">*</b></span><span>
                        <?php echo $this->Form->input('ship_emailaddress', array('type' => 'text', 'class' => 'input required email', 'div' => false, 'label' => false, 'name' => 'ship_emailaddress' )); ?>
                        </span></p>
                    <p class="text-danger texasP" style="display:none;"><small>8.25% tax will be charged if the Shipping Address state would be "Texas".
                       <br> Tax Exemption
                       <?php echo $this->Form->input('taxexempt', array('type' => 'checkbox', 'div' => false, 'label' => false, 'id' => 'taxexempt', 'value' => 1, 'name' => 'taxexempt')); ?>
                       Tax Exemption Number 
                       <?php echo $this->Form->input('taxnumber', array('type' => 'text', 'div' => false, 'label' => false, 'maxlength' => 11, 'style' => 'width:100px', 'onBlur' => "isNumberCheck()", 'name' => 'taxnumber' )); ?>
                       
                       <br><span class="text-success" id="nCost">Old Cost: $<?php echo $total ?> + $<?php echo $tax = round($total*0.0825, 2) ?>(8.25% taxes) = Total Cost: $<?php echo round($total+$tax, 2) ?> </span>
                       <span id="oCost" class="text-success" style="display:none;">Total Cost: $<?php echo $total ?></span>
                    </small></p>
                    <p class="text-danger interS" style="display:none;">
                       <small> There will be an additional <span class="text-success">$ <?php echo $shipping ?></span> for international shipping.
Please confirm. Order will be delivered on <?php echo $deliveryDate ?> </small><br/>
                
                 <input type="radio" value="1" id="confirm1" name="confirmShipping" checked="checked"> Yes &nbsp;&nbsp;
                 <input type="radio" value="0" id="confirm2" name="confirmShipping"> No
                </p>
                    <p class="cart-btns"><a class="btn-blue" href="javascript:void(0);">Copy to Billing Address</a></p>
            </div>
        </div>

        <div class="col-xs-12 col-sm-6">
            <div class="box">
                <h2>Billing Address</h2>
                <p><span>Company Name</span><span>
                    <?php echo $this->Form->input('bill_company_name', array('type' => 'text', 'class' => 'input', 'div' => false, 'label' => false, 'name' => 'bill_company_name' )); ?>
                    </span></p>
               <p><span>First Name<b class="mandatory">*</b></span><span>
                   <?php echo $this->Form->input('bill_first_name', array('type' => 'text', 'class' => 'input required', 'div' => false, 'label' => false, 'name' => 'bill_first_name' )); ?>
                   </span></p>
                    <p><span>Last Name<b class="mandatory">*</b></span><span>
                        <?php echo $this->Form->input('bill_last_name', array('type' => 'text', 'class' => 'input required', 'div' => false, 'label' => false, 'name' => 'bill_last_name' )); ?>
                        </span></p>
                    <p><span>Address<b class="mandatory">*</b></span><span>
                        <?php echo $this->Form->input('bill_address', array('type' => 'text', 'class' => 'input required', 'div' => false, 'label' => false, 'id' => 'bill_address', 'name' => 'bill_address' )); ?>
                        <em>We do not ship to PO Boxes.</em></span></p>
                    <p><span>Suite or Apt#</span><span>
                        <?php echo $this->Form->input('bill_suite', array('type' => 'text', 'class' => 'input', 'div' => false, 'label' => false, 'name' => 'bill_suite' )); ?>
                        </span></p>
                    <p><span>City<b class="mandatory">*</b></span><span >
                        <?php echo $this->Form->input('bill_city', array('type' => 'text', 'class' => 'input required', 'div' => false, 'label' => false, 'name' => 'bill_city' )); ?>
                        </span></p>
                    
                    <p>
                        <span>State/Province/Region<b class="mandatory">*</b></span><span id="billState2" style="display:none;">
                            <?php echo $this->Form->input('bill_state2', array('type' => 'text', 'class' => 'input required', 'div' => false, 'label' => false, 'name' => 'bill_state2' )); ?>
                        </span>
                    
                        <span id="billState1">
                            <?php echo $this->Form->input('bill_state', array('options' => $shipRegions, 'empty' => '-Select-', 'class' => 'input required', 'label' => false, 'div' => false, 'name' => 'bill_state')); ?>
                        </span>
                    </p>
                    <p><span>Zip Code<b class="mandatory">*</b></span><span>
                        <?php echo $this->Form->input('bill_zipcode', array('type' => 'text', 'class' => 'input required', 'div' => false, 'label' => false, 'name' => 'bill_zipcode' )); ?>
                        </span></p>
                    <p><span>Country<b class="mandatory">*</b></span><span>
                    <?php echo $this->Form->input('bill_country', array('options' => $shipCountries, 'default' => 'US', 'class' => 'input required', 'label' => false, 'div' => false, 'escape' => false, 'name' => 'bill_country')); ?>                
                    
                    </span></p>
                    <p><span>Phone<b class="mandatory">*</b></span><span>
                        <?php echo $this->Form->input('bill_phone', array('type' => 'text', 'class' => 'input required number', 'div' => false, 'label' => false, 'name' => 'bill_phone' )); ?>
                        </span></p>
                    <p><span>Fax Number</span><span>
                        <?php echo $this->Form->input('bill_faxnumber', array('type' => 'text', 'class' => 'input', 'div' => false, 'label' => false, 'name' => 'bill_faxnumber' )); ?>
                        </span></p>
                    <p><span>Email Address<b class="mandatory">*</b></span><span>
                        <?php echo $this->Form->input('bill_emailaddress', array('type' => 'text', 'class' => 'input required email', 'div' => false, 'label' => false, 'name' => 'bill_emailaddress' )); ?>
                        </span></p>
            </div>
        </div>
		</div>


        <div class="accepted col-xs-12  col-sm-8 col-sm-push-2">
            <?php echo $this->Form->input('chkterms', array('type' => 'checkbox', 'div' => false, 'label' => false, 'class' => 'required', 'checked' => 'checked' )); ?>
            I have read and accept all of the <a class="colorbox" href="terms">terms and conditions.</a>
            <div class="method">
                <div class="ffRadioWrapper on Payment">
                    <div class="ffRadio" style="position: absolute;"></div>
                    <label for="rcc">

                        <input type="radio" name="paymentMethod" id="rcc" value="cc" checked="checked" class="required" />Credit Card</label>
                 </div>
                <div class="ffRadioWrapper Payment">
                    <div class="ffRadio" style="position: absolute;"></div>
                    <label for="rpp">
                        <input type="radio" name="paymentMethod" id="rpp" value="pp" class="required" />PayPal</label>
                 </div>
                <div class="ffRadioWrapper Payment">
                    <div class="ffRadio" style="position: absolute;"></div>
                    <label for="rpo">
                        <input type="radio" name="paymentMethod" id="rpo" value="po" class="required" />Cheque/PO</label>
                 </div>
                
            </div>
            <div class="col-sm-8 col-sm-push-2 clearfix ccform">
                <p><span class="align-left">Card Holder Name<b class="mandatory">*</b></span><span>
                    <?php echo $this->Form->input('card_name', array('type' => 'text', 'class' => 'required input', 'div' => false, 'label' => false, 'autocomplete' => 'off', 'name' => 'card_name' )); ?>
                    </span></p>
            <p id="class_cc_num"><span class="align-left">Card Number<b class="mandatory">*</b></span><span>
                <?php echo $this->Form->input('card_number', array('type' => 'text', 'class' => 'required creditcard number input', 'div' => false, 'label' => false, 'autocomplete' => 'off', 'name' => 'card_number', 'id' => "CCNumber" )); ?>
                </span><span class="type"></span></p>
           <!-- <p><span class="align-left">Card Expiration Date<b class="mandatory">*</b></span></p>-->
            <p><span class="align-left">Card Expiration Date<b class="mandatory">*</b></span></p>
            <div style="clear:both"></div>
            <div class="row">
                <div class="col-sm-6">
                    
                        <?php
                        
                            $months = array('01' => '01', '02' => '02', '03' => '03', '04' => '04', '05' => '05', '06' => '06', '07' => '07', '08' => '08', '09' => '09', '10' => '10', '11' => '11', '12' => '12' );
                                 
                            echo $this->Form->input('card_month', array('options' => $months, 'empty' => 'MM', 'class' => 'required', 'style' => 'width:100%;', 'label' => false, 'div' => false, 'name' => 'card_month'));

                        ?>

                </div>
                <div class="col-sm-6 pv-top">
                    
                        <?php
                            
                            $start = substr(date('Y'), 2);
                            
                            $end = $start + 10;
                            
                            for ($i = $start; $i <= $end; $i++) { 
                                
                                $years[$i] = '20'.$i;
                            }
                            
                            echo $this->Form->input('card_year', array('options' => $years, 'empty' => 'YYYY', 'class' => 'required', 'style' => 'width:100%;', 'label' => false, 'div' => false, 'name' => 'card_year'));

                        ?>
 
                </div>
            </div>

            <p><span class="align-leftx">Card Verification Value (CVV)<b class="mandatory">*</b></span></p>
            <p><span>
                <?php echo $this->Form->input('card_cvv', array('type' => 'text', 'class' => 'required', 'div' => false, 'label' => false, 'id' => 'CSC', 'maxlength' => 4, 'autocomplete' => 'off', 'style' => 'width: 80px;', 'name' => 'card_cvv' )); ?>
   
                </span>&nbsp;&nbsp;&nbsp;&nbsp;<a class="colorbox" href="<?php echo $this->webroot ?>img/ncvv.png"><small><nobr>CVV?</nobr></small></a></p>
            </div>
            
            <div class="col-sm-8 col-sm-push-2 poform" style="display:none">
                <p class="text-justify h4">Please note that your order will not go in production until payment is received and the delivery date may be delayed 1-2 days if you are paying by cheque.</p>
            </div>
            

            <div class="clearfix">
                <button class="btn-green" type="submit" name="btnCheckout" value="" />Submit</button>
                <div class="checkLoad clear" style="display:none"><img src="<?php echo $this->webroot ?>img/wload.gif" /></div>
            </div>
        </div>
        </form>
    </div>
    
<script type="text/javascript">

var fullDate = new Date();

var S_YEAR = fullDate.getFullYear(),S_MONTH = fullDate.getMonth(),S_DAY = fullDate.getDate(),S_HOURS = fullDate.getHours(),S_MINUTES = fullDate.getMinutes(),S_SECONDS=fullDate.getSeconds();

var SEO_KEYWORD = '';
var SALE_USER = false;
//var HTTP_SERVER = 'http://103.230.150.50/';
var COUNTRY_CODE = 'US';
var CURRENCY = '$';
var TEXT_COLOR = 'color';
var LY_CUSTOM_FEE = 80;
var LY_COLOR_CHANGE = 35;
var subpage = 'checkout';
</script>
 
<script type="text/javascript" src="//maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&libraries=places"></script>

<?php echo $this->Html->script(array('front/global', 'front/colorbox-min', 'front/validate', 'front/checkout/address', 'front/checkout'));  ?>