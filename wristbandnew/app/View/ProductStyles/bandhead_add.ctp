<script>

    function get_products(cat_id) {
        $.ajax({
            url: '<?php echo $this->Html->url(array('controller' => 'ProductColors','action' => 'get_cat_product','bandhead'=>false)); ?>',
            type: "POST",
            data: {'cat_id': cat_id},
            success: function (resp) {
                $(product_id).html(resp);
            }
        });
    }

    $.validator.addMethod("category_required", function(value, element) {
        return value != "";
    }, "Please select the category name.");
     $.validator.addMethod("name_required", function(value, element) {
        return value != "";
    }, "Please enter the product style name.");
     $.validator.addMethod("image_required", function(value, element) {
        return value != "";
    }, "Please select a image for icon.");
    $.validator.addMethod("product_required", function(value, element) {
        return value != "";
    }, "Please select a product.");
    
    $(document).ready(function() {
        $("#add_product_style").validate();
    });
</script>
<div class="container-fluid cn">
    <div class="row rt ">
        <?php echo $this->element('dashboard/navigation');?>
        <div class="col-sm-8 col-lg-10 col-md-9 col-xs-12">
        	<div class="row rr cm">
            <div class="col-md-12 rr ">
                <div class="ps">
                    <h3 style="padding-left: 10px;padding-top: 10px;"> Add Product Style
                    <ul class="list-inline pull-right">
                            		<li><?php echo $this->Html->link('<i class="fa fa-list"></i> List Product Styles',array('controller'=>'ProductStyles','action'=>'index', 'bandhead' => true),array('escape'=> false)); ?></li>
                            	</ul>		
                    </h3>
                </div>
            </div>
            <div class="col-md-12">
                <div class="content-forms content-box">
                    <?php echo $this->Form->create('ProductStyle', array('id' => 'add_product_style', 'type' => 'file'));?>
                     <div class="content-forms-field">
                        <label>Product Category<span class="require_field">*</span></label>

                        <div class="input select required">
                            <?php echo $this->Form->input('product_category_id', array('type' => 'select','options'=>$product_cat_list,'empty'=>'--Select Category--', 'label' => false, 'required' => false, 'class' => 'category_required', 'onchange' => 'get_products(this.value)'));?>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="content-forms-field">
                        <label>Product<span class="require_field">*</span></label>
                        <div class="input select required">
                            <?php echo $this->Form->input('product_id', array('type' => 'select', 'options' => "","id"=>"product_id", 'empty' => '--Select Product--', 'label' => false, 'required' => false, 'class' => 'product_required'));?>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="content-forms-field">
                        <label>Name<span class="require_field">*</span></label>

                        <div class="input select required">
                            <?php echo $this->Form->input('name', array('type' => 'text', 'label' => false, 'required' => false, 'class' => 'name_required', 'maxlength' => 200, 'placeholder' => "Name"));?>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                  <div class="content-forms-field">
                        <label>Type</label>

                        <div class="input select required">
                            <?php echo $this->Form->input('type', array('type' => 'text', 'label' => false, 'class' => 'type_required', 'required' => false));?>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                      <div class="content-forms-field">
                        <label>Image<span class="require_field">*</span></label>

                        <div class="input select required">
                            <?php echo $this->Form->input('image', array('type' => 'file', 'id' => "file_upload", 'div' => false, 'required' => false, 'label' => false, 'class' => 'image_required', 'maxlength' => 100)); ?>
                              <p class="error-message"style="font-size: 12px;">(Max file size 1 MB.)</p>
                              <p style="color:red;">( Only gif, jpg, jpeg, png, pjpeg, x-png, x-tiff images are allowed. )</p>
                        </div>
                        <div class="clearfix"></div>
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
