<?php   if (!isset($data) || empty($data)) {    ?>
    
    <div class="bg-danger"><h3> Cart is Empty! </h3></div>  
    <br />
    <div class="row">
        <div class="col-xs-6 col-sm-6 col-md-9  cart-btns">
            <?php echo $this->Html->link('Continue Shopping', array('controller' => 'Homes') , array('class' => "btn btn-success")); ?>
            <br>
        </div>
    </div>
<?php   } else {
    
    //pr($data);
    
?>
<div class="page my-cart clearfix">
	<div class="row">
		<h2></h2>
		<div class="col-xs-12 col-sm-12  table-responsive">
			<table class="table table-bordered mycart">
				<tbody>
					<tr>
						<th width="95">Action</th>
						<th width="172" style="min-width:150px"></th>
						<th class="panel-primary">Product Details</th>
						<th width="140" class="text-center">Qty</th>
						<th width="90" class="text-right">Sub Total</th>
					</tr>
					<tr>
						<td><span ref="0" class="glyphicon glyphicon-trash action"></span><span refp="wristband" ref="0" class="glyphicon glyphicon-pencil action"></span></td>
						<td> <?php echo $this->Html->image('ProductIcon/'.$data['styleImg'],array('alt'=>"", 'class'=>"img-responsive center-block")); ?></td>
						<td><h4><?php echo $data['style'].' '.ucfirst($data['Product']).' » '.ucfirst($data['type']) ?> </h4>
						<p>
							Band Size - <span>&nbsp; <?php echo $data['band_size'] ?> </span>
						</p>
						<p>
							Size - <span>&nbsp;<?php echo $data['size'] ?></span>
						</p>
						<p>
							Band Color - <span>&nbsp; <?php echo $data['bandcolor'] ?></span>
						</p>
						<p>
							Band Style - <span>&nbsp;<?php echo $data['type'].'('.$data['qty'].')' ?> </span>
						</p>
						<p>
							Font Name - <span>&nbsp; <?php echo $data['fontname'] ?></span>
						</p>
						<p>
							Message Style - <span>&nbsp; <?php echo $data['messageStyle'] ?></span>
						</p>
						
						<?php 
                                
                              if (!empty($data['frontmsg'])) {
                                  
                                  echo "<p>Font message - <span>&nbsp; ".$data['frontmsg']."</span></p>";
                              }
                          
                              if (!empty($data['backmsg'])) {
                                  
                                  echo "<p>Back message - <span>&nbsp; ".$data['backmsg']."</span></p>";
                              }

						      
						      if (!empty($data['fsLogo'])) {
						          
                                  if (!empty($data['UploadedFile']['fs']['name'])) {
                                      
                                      $clipDir = 'cliparts/uploads/';
                                  } else {
                                      
                                      $clipDir = 'cliparts/';
                                  }
                                  
                                  echo '<p>Front start clipart - <span>&nbsp; <a class="colorbox" target="_blank" href="'.$this->webroot.'img/'.$clipDir.$data["fsLogo"].'">'. $this->Html->image($clipDir.$data["fsLogo"],array("alt"=>"", "class"=>"clipart","style"=>"width:8%;height:8%;")).' Badge</a></span></p>';
						      }
						      
                              if (!empty($data['feLogo'])) {
                                      
                                  if (!empty($data['UploadedFile']['fe']['name'])) {
                                      
                                      $clipDir = 'cliparts/uploads/';
                                  } else {
                                      
                                      $clipDir = 'cliparts/';
                                  }                                      
                                  
                                  echo '<p>Front end clipart - <span>&nbsp; <a class="colorbox" target="_blank" href="'.$this->webroot.'img/'.$clipDir.$data["feLogo"].'">'. $this->Html->image($clipDir.$data["feLogo"],array("alt"=>"", "class"=>"clipart","style"=>"width:8%;height:8%;")).' Badge</a></span></p>';
                              }
                              
                              if (!empty($data['bsLogo'])) {
                                  
                                  if (!empty($data['UploadedFile']['bs']['name'])) {
                                      
                                      $clipDir = 'cliparts/uploads/';
                                  } else {
                                      
                                      $clipDir = 'cliparts/';
                                  }
                                  
                                  echo '<p>Back start clipart - <span>&nbsp; <a class="colorbox" target="_blank" href="'.$this->webroot.'img/'.$clipDir.$data["bsLogo"].'">'. $this->Html->image($clipDir.$data["bsLogo"],array("alt"=>"", "class"=>"clipart","style"=>"width:8%;height:8%;")).' Badge</a></span></p>';
                              }
                              
                              if (!empty($data['beLogo'])) {
                                  
                                  if (!empty($data['UploadedFile']['be']['name'])) {
                                      
                                      $clipDir = 'cliparts/uploads/';
                                  } else {
                                      
                                      $clipDir = 'cliparts/';
                                  }
                                  
                                  echo '<p>Back end clipart - <span>&nbsp; <a class="colorbox" target="_blank" href="'.$this->webroot.'img/'.$clipDir.$data["beLogo"].'">'. $this->Html->image($clipDir.$data["beLogo"],array("alt"=>"", "class"=>"clipart","style"=>"width:8%;height:8%;")).' Badge</a></span></p>';
                              }
                              
						?>
						
						<p>
							Individual wrapper: - <span>&nbsp; <?php echo $data["wrapper"] ?></span>
						</p>
						<p>
							Keychain: - <span>&nbsp; <?php echo $data["keychain"] ?></span>
						</p>
						<p>
							Production time - <span>&nbsp; <?php echo $data["production"] ?></span>
						</p>
						<p>
							Shipping time - <span>&nbsp; <?php echo $data["shipping"] ?></span>
						</p>
						<p>
							Digital proof - <span>&nbsp; <?php echo $data["proof"] ?> </span>
						</p>
						<p>
							Delivery Date - <span>&nbsp; <?php echo $data["deliveryDate"] ?></span>
						</p>
						
						<?php 
						  
						      if (!empty($data['comments'])) {
						          
                                  echo "<p>Comments - <span>&nbsp; ".$data['comments']."</span></p>";
						      }

                        ?>
						</td>
						
						<td class="text-center"><?php echo $data["qty"] ?> </td>
						<td class="text-right">$ <?php echo $data["price"] ?></td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>

	<div style="display:none;" class="alert alert-danger" id="myAlert">

		<span>Error ! Change few things.</span>
	</div>
	<div class="row">

		<div class="col-xs-6 col-sm-6 col-md-8">
			<p class="lead couponLay">
				Coupon Code:
				<input type="text" class="coupon">
				<a class="btn btn-success aplyCoupon" href="javascript:;">Apply</a>
			</p>
		</div>

		<div class="col-xs-6 col-sm-6 col-md-4 ">
			<table class="table table-striped">
				<tbody>
					<tr>
						<td class="h4">Sub Total:</td>
						<td class="h4 text-right">$ <?php echo $data["price"] ?></td>
					</tr>
					<tr class="text-danger">
						<td class="h4">Discount:</td>
						<td class="h4 text-right">- $0.00</td>
					</tr>
					<tr>
						<td class="grand-text">Grand Total:</td>
						<td class="grand-text text-right">$ <?php echo $data["price"] ?></td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>

	<div class="row">
		<div class="col-xs-6 col-sm-6 col-md-9  cart-btns">
		    <?php echo $this->Html->link('Continue Shopping', array('controller' => 'Homes') , array('class' => "btn btn-success")); ?>
			<!-- <a class="btn btn-success" href="order.php">Continue Shopping</a> -->
			<br>
		</div>
		<div class="col-xs-6 col-sm-6 centered col-md-3 cart-btns">
			<!-- <a class="btn btn-success" href="#">Continue As Order</a> -->
			<?php echo $this->Html->link('Continue As Order', array('controller' => 'orders', 'action' => 'checkout') , array('class' => "btn btn-success")); ?>
			<p class="text-center">
				<br>
				OR
			</p>
			<p class="text-center">
				<a class="text-danger" href="javascript:void(0);"><span class="glyphicon glyphicon-envelope"></span> Email this Quote</a>
			</p>

		</div>
	</div>

</div>

<script type="text/javascript">

var fullDate = new Date();

var S_YEAR = fullDate.getFullYear(),S_MONTH = fullDate.getMonth(),S_DAY = fullDate.getDate(),S_HOURS = fullDate.getHours(),S_MINUTES = fullDate.getMinutes(),S_SECONDS=fullDate.getSeconds();

var SEO_KEYWORD = '';
var SALE_USER = false;
//var HTTP_SERVER = 'http://www.wristbandtoday.com/';
var COUNTRY_CODE = 'US';
var CURRENCY = '$';
var TEXT_COLOR = 'color';
var LY_CUSTOM_FEE = 80;
var LY_COLOR_CHANGE = 35;
var subpage = 'cart';

</script>

<?php } echo $this->Html->script(array('front/global', 'front/colorbox-min', 'front/cart'));  ?>