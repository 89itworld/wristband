<script>

    $.validator.addMethod("category_required", function(value, element) {
        return value != "";
    }, "Please select the category name.");
    
    $.validator.addMethod("day_required", function(value, element) {
        return value != "";
    }, "Please select day.");
    
    $.validator.addMethod("price_required", function(value, element) {
        return value != "";
    }, "Please enter the price.");

    $.validator.addMethod("qty_required", function(value, element) {
        return value != "";
    }, "Please enter the quantity.");
    
    $(document).ready(function() {
        $("#edit_shipping_price").validate();
    });
</script>
<div class="container-fluid cn">
    <div class="row rt ">
        <?php echo $this->element('dashboard/navigation');?>
        <div class="col-sm-8 col-lg-10 col-md-9 col-xs-12">
            <div class="row cm rr">
              <?php echo $this->Mysession->flash(); ?>
            <div class="col-md-12 rr ">
                <div class="ps">
                    <h3 style="padding-left: 10px;padding-top: 10px;"> Edit Shipping Price</h3>
                </div>
            </div>
            <div class="col-md-12">
                <div class="content-forms content-box">
                    <?php echo $this->Form->create('ShipTimePrice', array('id' => 'edit_shipping_price', 'type' => 'file'));?>
                    <?php echo $this->Form->input('id', array('type' => 'hidden', 'label' => false));?>
                    
                    <div class="content-forms-field">
                        <label>Category Name<span class="require_field">*</span></label>

                        <div class="input select required">
                            <?php echo $this->Form->input('product_category_id', array('type' => 'select','options'=>$product_cat_list,'empty'=>'--Select Category--', 'label' => false, 'required' => false, 'class' => 'category_required'));?>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="content-forms-field">
                        <label>Day<span class="require_field">*</span></label>

                        <div class="input select required">
                            <?php echo $this->Form->input('meta_day_id', array('type' => 'select', 'options' => $day_list, 'empty' => '--Select Day--', 'label' => false, 'required' => false, 'class' => 'day_required' ));?>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    
                    <div class="content-forms-field">
                        <label>Price<span class="require_field">*</span></label>

                        <div class="input select required">
                            <?php echo $this->Form->input('price', array('type' => 'text', 'label' => false, 'required' => false, 'class' => 'price_required', 'maxlength' => 200, 'placeholder' => "Price"));?>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    
                    <div class="content-forms-field">
                        <label>Quantity<span class="require_field">*</span></label>

                        <div class="input select required">
                            <?php echo $this->Form->input('qty', array('type' => 'text', 'label' => false, 'required' => false, 'class' => 'qty_required', 'maxlength' => 200, 'placeholder' => "Quantity"));?>
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
