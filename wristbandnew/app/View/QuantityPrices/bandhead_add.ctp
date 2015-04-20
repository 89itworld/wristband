<script>

    $.validator.addMethod("category_required", function(value, element) {
        return value != "";
    }, "Please select the category name.");
    $.validator.addMethod("quantity_required", function(value, element) {
        return value != "";
    }, "Please provide the quantity name.");
    

    $(document).ready(function() {
        $("#add_quantity").validate();
    });
    
    var myId = 1;
    
    function add (argument) {
        
        //var myId = ($('#add-options .content-forms-field').length);
        
        //var getId = ($('#add-options .content-forms-field').id);
        
        var inputHtml = '<div class="content-forms-field" id = quant'+myId+'><label>Quantity Name<span class="require_field">*</span></label><div class="input select required input-group input63"><input "type" = "text" class = "quantity_required width-100" name = "data[QuantityPrice][name][]"><span class="input-group-btn"><button onclick="minus('+myId+')" class="btn btn-default font-13" type="button"><span class="glyphicon glyphicon-minus"></span></button></span></div><div class="clearfix"></div></div>';

        $('#add-options').append(inputHtml);
        
        myId++; 
    }
    
    
    function minus (id) {
        
        //console.log(id);
        $('#quant'+id).remove();
    }
    
    
</script>
<div class="container-fluid cn">
    <div class="row rt ">
        <?php echo $this->element('dashboard/navigation');?>
        <div class="col-sm-8 col-lg-10 col-md-9 col-xs-12">
            <div class="row cm rr">
            <div class="col-md-12 rr ">
                <div class="ps">
                    <h3 style="padding-left: 10px;padding-top: 10px;"> Add Quantity
                    <ul class="list-inline pull-right">
                            		<li><?php echo $this->Html->link('<i class="fa fa-list"></i> List Quantity',array('controller'=>'QuantityPrices','action'=>'index', 'bandhead' => true),array('escape'=>false)); ?></li>
                            	</ul>	
                    </h3>
                </div>
            </div>
            <div class="col-md-12">
                <div class="content-forms content-box">
                    <?php echo $this->Form->create('QuantityPrice', array('id' => 'add_quantity'));?>
                        
                        
                        <div class="content-forms-field">
                            <label>Product Category<span class="require_field">*</span></label>
    
                            <div class="input select required">
                                <?php echo $this->Form->input('product_category_id', array('type' => 'select', 'options' => $product_cat_list, 'empty' => '--Select Category--', 'label' => false, 'required' => false, 'class' => 'category_required' ));?>
                            </div>
                            <div class="clearfix"></div>
                        </div>
    
                        <div class="content-forms-field">
                            
                                <label>Quantity Name<span class="require_field">*</span></label>
                                
                                <div class="input-group input63">
                                    
                                    <?php echo $this->Form->input('name', array('type' => 'text', "id"=>"name", 'label' => false, 'required' => false, 'div' => false, 'class' => 'quantity_required width-100', 'name'=>'data[QuantityPrice][name][]'));?>
                                    
                                  <span class="input-group-btn">
                                    <?php echo $this->Form->button('<span class="glyphicon glyphicon-plus"></span>', array('type' => 'button', 'class' => 'btn btn-default font-13', 'onclick' => 'add()')); ?>
                                  </span>
                                                                  
                                </div>
                                
                                <div class="clearfix"></div>
                        </div>
                        <div class="clearfix"></div>
                        <div id="add-options">
                        
                        </div>
                        <div class="clearfix"></div>                    
                        <div class="content-forms-field">
                            <label> </label>
                            <input class="btn md" style="width:130px; background-color: #3fb8e5;" type="submit"
                                   value="Submit">
                        </div>
                        <div class="clearfix"></div>
                    
                    <?php echo $this->Form->end();?>
                </div>
            </div>
        </div>
        </div>
    </div>
    </div>
    <div class="clearfix"></div>
