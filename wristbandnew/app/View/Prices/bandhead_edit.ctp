<script>
      function get_products(cat_id) {
        $.ajax({
            url: '<?php echo $this->Html->url(array('controller' => 'Prices','action' => 'get_cat_product','bandhead'=>false)); ?>',
            type: "POST",
            data: {'cat_id': cat_id},
            success: function (resp) {
                $(product_id).html(resp);
                get_sizes(cat_id);
                get_styles(cat_id);
            }
        });
    }
      function get_sizes(cat_id) {
        $.ajax({
            url: '<?php echo $this->Html->url(array('controller' => 'Prices','action' => 'get_cat_sizes','bandhead'=>false)); ?>',
            type: "POST",
            data: {'cat_id': cat_id},
            success: function (resp) {
                $(size_id).html(resp);
            }
        });
    }
      function get_styles(cat_id) {
        $.ajax({
            url: '<?php echo $this->Html->url(array('controller' => 'Prices','action' => 'get_cat_styles','bandhead'=>false)); ?>',
            type: "POST",
            data: {'cat_id': cat_id},
            success: function (resp) {
                $(style_id).html(resp);
            }
        });
    }

     $.validator.addMethod("price_required", function(value, element) {
        return value != "";
    }, "Please enter price.");
       $.validator.addMethod("valid_price", function(value, element) {
        return /^[0-9.0-9]+$/.test(value);
    }, "Please enter a valid price.");
    $.validator.addMethod("category_required", function(value, element) {
        return value != "";
    }, "Please select the category name.");
    $.validator.addMethod("product_required", function(value, element) {
        return value != "";
    }, "Please select the product name.");
     $.validator.addMethod("size_required", function(value, element) {
        return value != "";
    }, "Please select the size name.");
     $.validator.addMethod("style_required", function(value, element) {
        return value != "";
    }, "Please select the style name.");

    $(document).ready(function() {
        $("#add_product_style").validate();
    });
</script>
<div class="container-fluid cn">
    <div class="row rt ">
        <?php echo $this->element('dashboard/navigation');?>
        <div class="col-sm-8 col-md-9 col-lg-10 col-xs-12">
            <div class="row rr">
            <div class="col-md-12 rr ">
                <div class="ps">
                    <h3 style="padding-left: 10px;padding-top: 10px;"> Edit Product Price</h3>
                </div>
            </div>
            <div class="col-md-12">
                <div class="content-forms content-box">
                    <?php echo $this->Form->create('Price', array('id' => 'add_product_style', 'type' => 'file'));?>
                    <div class="content-forms-field">
                        <label>Product Category<span class="require_field">*</span></label>

                        <div class="input select required">
                            <?php 
                            echo $data['ProductCategory']['name'];
                            echo $this->Form->input('product_category_id', array('type' => 'hidden', "value"=>$data["Price"]["product_category_id"]));?>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="content-forms content-box">
                        <?php echo $this->Form->create('Price', array('id' => 'add_product_style', 'type' => 'file'));?>
                        <div class="content-forms-field">
                            <label>Product<span class="require_field">*</span></label>

                            <div class="input select required">
                                <?php 
                                echo $data['Product']['name'];
                                echo $this->Form->input('product_id', array('type' => 'hidden', "value"=>$data["Price"]["product_id"]));?>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="content-forms-field">
                            <label>Product Size<span class="require_field">*</span></label>

                            <div class="input select required">
                                <?php 
                                echo $data['ProductSize']['name'];
                                echo $this->Form->input('product_size_id', array('type' => 'hidden', "value"=>$data["Price"]["product_size_id"]));?>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="content-forms-field">
                            <label>Product Style<span class="require_field">*</span></label>

                            <div class="input select required">
                                <?php 
                                echo $data['ProductStyle']['name'];
                                echo $this->Form->input('product_style_id', array('type' => 'hidden', "value"=>$data["Price"]["product_style_id"]));?>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <?php
                        
                        foreach ($result as $key => $qty) {
                            ?>
                            <div class="content-forms-field">
                                <label>Quantity Price <?php echo ": " . $qty['Price']['qty']; ?><span class="require_field">*</span></label>

                                <div class="input">
                                     <?php echo $this->Form->input('', array('name' => "data[MultiplePrice][$key][qty]",'type' => 'hidden', 'label' => false,'value'=>$result[$key]["Price"]["qty"]));?>
                                     <?php echo $this->Form->input('', array('name' => "data[MultiplePrice][$key][id]",'type' => 'hidden', 'label' => false,'value'=>$result[$key]["Price"]["id"]));?>
                                    <?php echo $this->Form->input('', array('name' => "data[MultiplePrice][$key][price]",'id'=>'price'.$key, 'type' => 'text', 'label' => false, 'required' => false, 'class' => 'price_required valid_price', 'maxlength' => 10,'value'=>$result[$key]["Price"]["price"]));?>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="content-forms-field">
                                <label> Free Quantity </label>

                                <div class="input">
                                    <?php echo $this->Form->input('', array('name' => "data[MultiplePrice][$key][free_qty]", 'type' => 'text', 'label' => false, 'required' => false, 'class' => 'free_required', 'maxlength' => 8,'value'=>$result[$key]["Price"]["free_qty"]));?>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <?php } ?>
                        <div class="content-forms-field">
                            <label> </label>
                            <input class="btn md" style="width:130px; background-color: #3fb8e5;" type="submit"
                                   value="Submit"></div>
                        <div class="clearfix"></div>
                    </div>
                    <?php echo $this->Form->end();?>
                </div>
            </div>
        </div>
        </div>
        </div>
    </div>
    <div class="clearfix"></div>
