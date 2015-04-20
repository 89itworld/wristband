<script>

    $.validator.addMethod("category_required", function(value, element) {
        return value != "";
    }, "Please select the category name.");
    $.validator.addMethod("quantity_required", function(value, element) {
        return value != "";
    }, "Please select the quantity name.");
     

    $(document).ready(function() {
        $("#edit_quantity").validate();
    });
    
    var myId = 1;
    
    function add (argument) {
        
        //var myId = ($('#add-options .content-forms-field').length);
        
        //var getId = ($('#add-options .content-forms-field').id);
        
        var inputHtml = '<div class="content-forms-field" id = quant'+myId+'><label>Quantity Name<span class="require_field">*</span></label><div class="input select required input-group input63"><input "type" = "text" class = "quantity_required width-100" name = "data[QuantityPrice][name][]"><span class="input-group-btn"><button onclick="minus('+myId+')" class="btn btn-default font-13" type="button"><span class="glyphicon glyphicon-minus"></span></button></span></div><div class="clearfix"></div></div>';

        $('#add-options').append(inputHtml);
        
        myId++; 
    }
    
    
    function minus (id, delId = null) {
        
        //console.log(delId); return false;
        
        if (delId != null) {
            
            var status = confirm("Are you sure to delete this name ?");
            
            if (status) {
                        
                $.ajax({
                   
                   type:"POST",
                   url:'<?php echo $this->Html->url(array('controller' => 'QuantityPrices','action' => 'delete','bandhead'=>true)); ?>',
                   data:{'id':delId},
                   success: function(result){
                       
                       if (result == 1) {
                           
                           $('#quant'+id).remove();
                           alert('Record deleted successfully.');
                       } else {
                           
                           alert('Unable to delete the record.');
                       }
                   },
                   error: function(error){
                       
                       console.log(error);
                   }
                    
                });
            } else {
                
                return false;
            }
            
        } else {
            
            $('#quant'+id).remove();
        }
        
    }
    
</script>
<div class="container-fluid cn">
    <div class="row rt ">
        <?php echo $this->element('dashboard/navigation');?>
        <div class="col-sm-8 col-lg-10 col-md-9 col-xs-12">
            <div class="row cm rr">
            <div class="col-md-12 rr ">
                <div class="ps">
                    <h3 style="padding-left: 10px;padding-top: 10px;"> Edit Quantity</h3>
                </div>
            </div>
            <div class="col-md-12">
                <div class="content-forms content-box">
                    <?php echo $this->Form->create('QuantityPrice', array('id' => 'edit_quantity'));?>
                    <div class="content-forms-field">
                        <label>Product Category<span class="require_field">*</span></label>
                        <div class="input select required">
                            <?php
                            echo $result[0]["ProductCategory"]["name"];
                            echo $this->Form->input('product_category_id', array('type' => 'hidden', "value" => $result[0]["QuantityPrice"]["product_category_id"])); ?>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                       
                    
                    
                    <?php
                        
                        foreach ($result as $key => $value) {
                                //pr($key);
                                
                                echo '<div class="content-forms-field" id = "quant'.$key.'11" >
                                    <label>Quantity Name<span class="require_field">*</span></label>
            
                                    <div class="input-group input63">';
                                        echo $this->Form->input("id", array("type" => "hidden", "value" => $value["QuantityPrice"]["id"], "name" => "data[QuantityPrice][id][]"));
                                        echo $this->Form->input("name", array("type" => "text", "id"=>"quantity_id", "label" => false, "required" => false, "class" => "quantity_required width-100", "value"=>$value["QuantityPrice"]["name"], "name" => "data[QuantityPrice][name][]"));
                                    if ($key == 0) {
                                        
                                        echo '<span class="input-group-btn">';
                                        echo $this->Form->button('<span class="glyphicon glyphicon-plus"></span>', array('type' => 'button', 'class' => 'btn btn-default font-13', 'onclick' => 'add()'));
                                        echo '</span>';
                                    } else {
                                        
                                        echo '<span class="input-group-btn">';
                                        echo $this->Form->button('<span class="glyphicon glyphicon-minus"></span>', array('type' => 'button', 'class' => 'btn btn-default font-13', 'onclick' => 'minus('.$key.'11,'.$value["QuantityPrice"]["id"].')'));
                                        echo '</span>';
                                    }
                                    
                                    echo '</div>
                                    <div class="clearfix"></div>
                                </div>';
                            
                        }
                            
                    
                    ?>
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