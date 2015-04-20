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
                get_items(cat_id);
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
    
    function get_items(cat_id) {
        
        $.ajax({
            url: '<?php echo $this->Html->url(array('controller' => 'Prices','action' => 'get_fill_items','bandhead'=>false)); ?>',
            type: "POST",
            data: {'cat_id': cat_id},
            success: function (resp) {
                $(fill).html(resp);
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
        <div class="col-sm-8 col-lg-10 col-md-9 col-xs-12">
        	<div class="row cm rr">
            <div class="col-md-12 rr ">
                <div class="ps">
                    <h3 style="padding-left: 10px;padding-top: 10px;"> Add Product Price
                    <ul class="list-inline pull-right">
                            		<li><?php echo $this->Html->link('<i class="fa fa-list"></i> List Products Price',array('controller'=>'Prices','action'=>'index', 'bandhead' => true),array('escape'=>false)); ?></li>
                            	</ul>	
                    </h3>
                </div>
            </div>
            <div class="col-md-12">
                <div class="content-forms content-box">
                    <?php echo $this->Form->create('Price', array('id' => 'add_product_style', 'type' => 'file'));?>
                    <div class="content-forms-field">
                        <label>Product Category<span class="require_field">*</span></label>

                        <div class="input select required">
                            <?php echo $this->Form->input('product_category_id', array('type' => 'select', 'options' => $product_cat_list, 'empty' => '--Select Category--', 'label' => false, 'required' => false, 'class' => 'category_required', 'onchange' => 'get_products(this.value)'));?>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="content-forms content-box">
                        <?php echo $this->Form->create('Price', array('id' => 'add_product_style', 'type' => 'file'));?>
                        <div class="content-forms-field">
                            <label>Product<span class="require_field">*</span></label>

                            <div class="input select required">
                                <?php echo $this->Form->input('product_id', array('type' => 'select', 'options' => "","id"=>"product_id", 'empty' => '--Select Product--', 'label' => false, 'required' => false, 'class' => 'product_required'));?>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="content-forms-field">
                            <label>Product Size<span class="require_field">*</span></label>

                            <div class="input select required">
                                <?php echo $this->Form->input('product_size_id', array('type' => 'select',"id"=>"size_id", 'options' => "", 'empty' => '--Select Product Size--', 'label' => false, 'required' => false, 'class' => 'size_required'));?>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="content-forms-field">
                            <label>Product Style<span class="require_field">*</span></label>

                            <div class="input select required">
                                <?php echo $this->Form->input('product_style_id', array('type' => 'select',"id"=>"style_id", 'options' => "", 'empty' => '--Select Product Style--', 'label' => false, 'required' => false, 'class' => 'style_required'));?>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                            
                        <div id="fill">
                            
                        </div>    
                            
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
    <div class="clearfix"></div>
