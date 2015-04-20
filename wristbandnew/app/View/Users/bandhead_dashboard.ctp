<script>
    function welcome_msg() {
        $(".welcome").remove();
    }
    setInterval(welcome_msg, 5000);
</script>
   
<div class="container-fluid">
    <div class="row rt dashboard-tile">
       <?php echo $this->element('dashboard/navigation'); ?>
        <div class="col-sm-8 col-md-9 col-lg-10">
            <?php $usertype=$this->Session->read('Auth.Admin.user_type');  ?>
            <div class="rr cm " style="background: #EEEEEE;">
                <div class="col-md-12 rr" >
                    <div class="ps">
                        <h3 style="padding-left: 10px;padding-top: 10px;"><i class="fa fa-dashboard"></i> Dashboard </h3>
                    </div>
                </div>
                <div class="row">
	            	<div class="col-md-12">
	            		<div class="col-md-3">
	            		    
	            		    <?php
	            		    
	            		         echo $this->Html->link('<div class="green-tile">
                                    <div class="clearfix"></div>
                                    <div class="green-circle wave in">
                                        <i class="fa fa-group fa-3x"></i>
                                    </div>
                                    <div class="green-title-text">
                                        <h4> MANAGE USERS </h4>
                                    </div>
                                </div>', array('controller' => 'Users', 'action' => 'users', 'bandhead' => true), array('escape' => false)); 
	            		    
	            		    ?>
	            		    
	            		</div>
	            		<div class="col-md-3">
	            		    
	            		    <?php
                            
                                 echo $this->Html->link('<div class="red-tile">
                                    <div class="clearfix"></div>
                                    <div class="red-circle wave in">
                                        <i class="fa fa-line-chart fa-3x"></i>
                                    </div>
                                    <div class="green-title-text">
                                        <h4> MANAGE PRODUCT CATEGORY </h4>
                                    </div>
                                </div>', array('controller' => 'ProductCategories', 'action' => 'index', 'bandhead' => true), array('escape' => false)); 
                            
                            ?>
	            		    
	            		</div>
	            		<div class="col-md-3">
	            			<?php
	            		    
	            		         echo $this->Html->link('<div class="blue-tile">
		            				<div class="clearfix"></div>
		            				<div class="blue-circle wave in">
		            					<i class="fa fa-pie-chart fa-3x"></i>
		            				</div>
		            				<div class="green-title-text">
		            					<h4> MANAGE PRODUCTS </h4>
		            				</div>
		            			</div>', array('controller' => 'Products', 'action' => '', 'bandhead' => true), array('escape' => false)); 
	            		    
	            		    ?>
	            		</div>
	            		<div class="col-md-3">
	            			<?php
	            		    
	            		         echo $this->Html->link('<div class="yellow-tile">
		            				<div class="clearfix"></div>
		            				<div class="yellow-circle wave in">
		            					<i class="fa fa-cube fa-3x"></i>
		            				</div>
		            				<div class="green-title-text">
		            					<h4> MANAGE PRODUCTS SIZES </h4>
		            				</div>
		            			</div>', array('controller' => 'ProductSizes', 'action' => '', 'bandhead' => true), array('escape' => false)); 
	            		    
	            		    ?>
	            		</div>
	            	</div>
	            </div>
	            <div class="row">
	            	<div class="col-md-12">
	            		<div class="col-md-3">
	            			<?php
	            		    
	            		         echo $this->Html->link('<div class="blue-tile">
		            				<div class="clearfix"></div>
		            				<div class="blue-circle wave in">
		            					<i class="fa fa-cubes fa-3x"></i>
		            				</div>
		            				<div class="green-title-text">
		            					<h4> MANAGE PRODUCTS STYLES </h4>
		            				</div>
		            			</div>', array('controller' => 'ProductStyles', 'action' => '', 'bandhead' => true), array('escape' => false)); 
	            		    
	            		    ?>
	            		</div>
	            		<div class="col-md-3">
	            			<?php
	            		    
	            		         echo $this->Html->link('<div class="yellow-tile">
		            				<div class="clearfix"></div>
		            				<div class="yellow-circle wave in">
		            					<i class="fa fa-money fa-3x"></i>
		            				</div>
		            				<div class="green-title-text">
		            					<h4> MANAGE PRODUCTS PRICE </h4>
		            				</div>
		            			</div>', array('controller' => 'Prices', 'action' => '', 'bandhead' => true), array('escape' => false)); 
	            		    
	            		    ?>
	            		</div>
	            		<div class="col-md-3">
	            			<?php
	            		    
	            		         echo $this->Html->link('<div class="green-tile">
		            				<div class="clearfix"></div>
		            				<div class="green-circle wave in">
		            					<i class="fa fa-paint-brush fa-3x"></i>
		            				</div>
		            				<div class="green-title-text">
		            					<h4> MANAGE COLORS </h4>
		            				</div>
		            			</div>', array('controller' => 'Colors', 'action' => '', 'bandhead' => true), array('escape' => false)); 
	            		    
	            		    ?>
	            		</div>
	            		<div class="col-md-3">
	            			<?php
	            		    
	            		         echo $this->Html->link('<div class="red-tile">
		            				<div class="clearfix"></div>
		            				<div class="red-circle wave in">
		            					<i class="fa fa-puzzle-piece fa-3x"></i>
		            				</div>
		            				<div class="green-title-text">
		            					<h4> MANAGE CLIPARTS </h4>
		            				</div>
		            			</div>', array('controller' => 'Cliparts', 'action' => '', 'bandhead' => true), array('escape' => false)); 
	            		    
	            		    ?>
	            		</div>
	            	</div>
	            </div>
	            <div class="row">
	            	<div class="col-md-12">
	            		<div class="col-md-3">
	            			<?php
	            		    
	            		         echo $this->Html->link('<div class="red-tile">
		            				<div class="clearfix"></div>
		            				<div class="red-circle wave in">
		            					<i class="fa fa-shopping-cart fa-3x"></i>
		            				</div>
		            				<div class="green-title-text">
		            					<h4> MANAGE QUANTITY </h4>
		            				</div>
		            			</div>', array('controller' => 'QuantityPrices', 'action' => '', 'bandhead' => true), array('escape' => false)); 
	            		    
	            		    ?>
	            		</div>
	            		<div class="col-md-3">
	            			<?php
	            		    
	            		         echo $this->Html->link('<div class="green-tile">
		            				<div class="clearfix"></div>
		            				<div class="green-circle wave in">
		            					<i class="fa fa-book fa-3x"></i>
		            				</div>
		            				<div class="green-title-text">
		            					<h4> MANAGE PAGES </h4>
		            				</div>
		            			</div>', array('controller' => 'CmsPages', 'action' => '', 'bandhead' => true), array('escape' => false)); 
	            		    
	            		    ?>
	            		</div>
	            		<div class="col-md-3">
	            			<?php
	            		    
	            		         echo $this->Html->link('<div class="blue-tile">
		            				<div class="clearfix"></div>
		            				<div class="blue-circle wave in">
		            					<i class="fa fa-file-text fa-3x"></i>
		            				</div>
		            				<div class="green-title-text">
		            					<h4> MANAGE TEMPLATE </h4>
		            				</div>
		            			</div>', array('controller' => 'EmailTemplates', 'action' => '', 'bandhead' => true), array('escape' => false)); 
	            		    
	            		    ?>
	            		</div>
	            		<div class="col-md-3">
	            			<?php
	            		    
	            		         echo $this->Html->link('<div class="yellow-tile">
		            				<div class="clearfix"></div>
		            				<div class="yellow-circle wave in">
		            					<i class="fa fa-plane fa-3x"></i>
		            				</div>
		            				<div class="green-title-text">
		            					<h4> MANAGE SHIPING PRICES </h4>
		            				</div>
		            			</div>', array('controller' => 'ShippingPrices', 'action' => '', 'bandhead' => true), array('escape' => false)); 
	            		    
	            		    ?>
	            		</div>
	            	</div>
	            </div>
	            <div class="row">
	            	<div class="col-md-12">
	            		<div class="col-md-3">
	            			<?php
	            		    
	            		         echo $this->Html->link('<div class="green-tile">
		            				<div class="clearfix"></div>
		            				<div class="green-circle wave in">
		            					<i class="fa fa-picture-o fa-3x"></i>
		            				</div>
		            				<div class="green-title-text">
		            					<h4> MANAGE BANNERS </h4>
		            				</div>
		            			</div>', array('controller' => 'Banners', 'action' => '', 'bandhead' => true), array('escape' => false)); 
	            		    
	            		    ?>
	            		</div>
	            		<div class="col-md-3">
	            			<?php
	            		    
	            		         echo $this->Html->link('<div class="red-tile">
		            				<div class="clearfix"></div>
		            				<div class="red-circle wave in">
		            					<i class="fa fa-truck fa-3x"></i>
		            				</div>
		            				<div class="green-title-text">
		            					<h4> MANAGE ORDERS </h4>
		            				</div>
		            			</div>', array('controller' => 'Orders', 'action' => '', 'bandhead' => true), array('escape' => false)); 
	            		    
	            		    ?>
	            		</div>
	            		<div class="col-md-3">
	            			<?php
	            		    
	            		         echo $this->Html->link('<div class="blue-tile">
		            				<div class="clearfix"></div>
		            				<div class="blue-circle wave in">
		            					<i class="fa fa-support fa-3x"></i>
		            				</div>
		            				<div class="green-title-text">
		            					<h4> MANAGE OPTIONS </h4>
		            				</div>
		            			</div>', array('controller' => 'Options', 'action' => '', 'bandhead' => true), array('escape' => false)); 
	            		    
	            		    ?>
	            		</div>
	            		<div class="col-md-3">
	            			<?php
	            		    
	            		         echo $this->Html->link('<div class="yellow-tile">
		            				<div class="clearfix"></div>
		            				<div class="yellow-circle wave in">
		            					<i class="fa fa-adn fa-3x"></i>
		            				</div>
		            				<div class="green-title-text">
		            					<h4> MANAGE FONTS </h4>
		            				</div>
		            			</div>', array('controller' => 'Fonts', 'action' => '', 'bandhead' => true), array('escape' => false)); 
	            		    
	            		    ?>
	            		</div>
	            	</div>
	            </div>
	            <div class="row">
	            	<div class="col-md-12">
	            		<div class="col-md-3">
	            			<?php
	            		    
	            		         echo $this->Html->link('<div class="blue-tile">
		            				<div class="clearfix"></div>
		            				<div class="blue-circle wave in">
		            					<i class="fa fa-film fa-3x"></i>
		            				</div>
		            				<div class="green-title-text">
		            					<h4> MANAGE GALLERY </h4>
		            				</div>
		            			</div>', array('controller' => 'Galleries', 'action' => '', 'bandhead' => true), array('escape' => false)); 
	            		    
	            		    ?>
	            		</div>
	            		<div class="col-md-3">
	            			<?php
	            		    
	            		         echo $this->Html->link('<div class="yellow-tile">
		            				<div class="clearfix"></div>
		            				<div class="yellow-circle wave in">
		            					<i class="fa fa-eyedropper fa-3x"></i>
		            				</div>
		            				<div class="green-title-text">
		            					<h4> MANAGE PRODUCT COLORS </h4>
		            				</div>
		            			</div>', array('controller' => 'ProductColors', 'action' => '', 'bandhead' => true), array('escape' => false)); 
	            		    
	            		    ?>
	            		</div>
	            	</div>
	            </div>
            </div>
        </div>
    </div>
</div>
