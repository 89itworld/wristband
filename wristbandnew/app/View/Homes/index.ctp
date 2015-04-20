<div class="row">
<?php echo $this->element('front/leftpanel'); ?>
<div class="col-lg-9 col-md-9 col-sm-9">
 <?php foreach($prod_result["Product"] as $key=>$result){?>
<div class="col-md-4 col-sm-4 col-xs-6 col-my-12 right_product">

    <a href="#">

        <div class="image-holder">
             <?php echo $this->Html->image('ProductIcon/'.$result["image"],array('alt'=>"", 'class'=>"img-responsive center-block")); ?>
            <p>
              <?php echo $result["name"];  ?>
            </p>
            <br>
            <div class="as_low centered">
                <p>
                    as low as <span>$ <?php echo $result["Price"][0]["price"];  ?></span> ea.
                </p>

                <span><?php echo $this->Html->link("CUSTOMIZE NOW",array('controller'=>'orders','action'=>'custom_wristbands/'.$key),array('class'=>"product_btn"));?></span>

            </div>

        </div>
    </a>
     <?php echo $this->Html->image('bottom_shadow.png',array('alt'=>"", 'class'=>"center-block")); ?>
</div>
     <?php } ?>
</div>

</div>