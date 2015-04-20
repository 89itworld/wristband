<div class="row">
<?php echo $this->element('front/leftpanel'); ?>
<div class="col-lg-9 col-md-9 col-sm-9">

<div class="right_content">

    <h1><?php echo  ucwords($prod_price['ProductCategory']['name']);  ?> Price </h1>

<div class="price_wraper centered">
<?php foreach ($prod_price["Product"] as $price){ ?>
    <h1>Custom <?php echo  ucwords($price['name']);  ?></h1>
     <?php if (!empty($price["Price"])) {  ?>
				<div class="pricelist">
					<ul>
						<li class="title">
                            <span>Quantity</span>
                            <span>Free</span>
                            <span>Price</span>
                            <span>Sale Price</span>
                        </li>
    <?php
    $i = 0;
    foreach ($price["Price"] as $qty_price) {
        if ($qty_price["price"] != 0) {
            $i = $i + 1;
            if ($i % 2 == 0) {
                echo'<li class="first_list">';
            } else {
                echo'<li class="second_list">';
            }  ?>
            <span><?php echo $qty_price["qty"]; ?></span>
            <span class="span2"><?php if ($qty_price["free_qty"] == 0) {
                echo"NA";
            } else {
                echo$qty_price["free_qty"];
            } ?></span>
            <span style="text-decoration: line-through;">$ <?php echo round($qty_price["price"]*100/58,2); ?></span>
            <span class="span2">$ <?php echo $qty_price["price"]; ?></span>
            </li>

            <?php
        if($qty_price["qty"] == "100000+"){
                $min_price=$qty_price["price"];
            }
        } } ?>
					</ul>

				</div>
        <?php }?>
				<div class="col-md-12 col-sm-12 col-xs-12 col-my-12 right_product">
                    <div class="col-lg-6">
                        <?php echo $this->Html->image('ProductIcon/' . $price['image'], array('class' => "img-responsive center-block")); ?>
                    </div>
                    <div class="col-lg-4 centered">
                        <p class="product-name"><?php echo  ucwords($price['name']);  ?></p>

                        <div class="as_low centered">
                            <p>as low as <span> $<?php echo $min_price; ?></span> ea.</p>
                            <a href="#">
                                <span class="product_btn ">CUSTOMIZE NOW</span>
                            </a>
                        </div>
                    </div>
                </div>

        <?php } ?>


			</div>
		</div>
	</div>
</div>