<?php
    echo $this->Html->css(array('spectrum'));
    echo $this->Html->script(array('spectrum'));
?>
<script>  

var selectOpt;

$(document).ready(function() {
    
    $("#add_product_color").validate();

});


    function get_products(cat_id) {
        $.ajax({
            url: '<?php echo $this->Html->url(array('controller' => 'ProductColors','action' => 'get_cat_product','bandhead'=>false)); ?>',
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
            url: '<?php echo $this->Html->url(array('controller' => 'ProductColors','action' => 'get_cat_sizes','bandhead'=>false)); ?>',
            type: "POST",
            data: {'cat_id': cat_id},
            success: function (resp) {
                $(size_id).html(resp);
            }
        });
    }
    function get_styles(cat_id) {
        $.ajax({
            url: '<?php echo $this->Html->url(array('controller' => 'ProductColors','action' => 'get_cat_styles','bandhead'=>false)); ?>',
            type: "POST",
            data: {'cat_id': cat_id},
            success: function (resp) {
                $(style_id).html(resp);
            }
        });
    }
    
    function spect(){
        
        $(".full").spectrum({
            color: "#ECC",
            showInput: true,
            className: "full-spectrum",
            showInitial: true,
            showPalette: true,
            showSelectionPalette: true,
            maxPaletteSize: 10,
            preferredFormat: "hex",
            localStorageKey: "spectrum.demo",
            show: function () {

                selectOpt = $(".sp-active").parent().closest('div').find('.setMe');

            },
            palette: [
                ["rgb(0, 0, 0)", "rgb(67, 67, 67)", "rgb(102, 102, 102)",
                "rgb(204, 204, 204)", "rgb(217, 217, 217)","rgb(255, 255, 255)"],
                ["rgb(152, 0, 0)", "rgb(255, 0, 0)", "rgb(255, 153, 0)", "rgb(255, 255, 0)", "rgb(0, 255, 0)",
                "rgb(0, 255, 255)", "rgb(74, 134, 232)", "rgb(0, 0, 255)", "rgb(153, 0, 255)", "rgb(255, 0, 255)"], 
                ["rgb(230, 184, 175)", "rgb(244, 204, 204)", "rgb(252, 229, 205)", "rgb(255, 242, 204)", "rgb(217, 234, 211)", 
                "rgb(208, 224, 227)", "rgb(201, 218, 248)", "rgb(207, 226, 243)", "rgb(217, 210, 233)", "rgb(234, 209, 220)", 
                "rgb(221, 126, 107)", "rgb(234, 153, 153)", "rgb(249, 203, 156)", "rgb(255, 229, 153)", "rgb(182, 215, 168)", 
                "rgb(162, 196, 201)", "rgb(164, 194, 244)", "rgb(159, 197, 232)", "rgb(180, 167, 214)", "rgb(213, 166, 189)", 
                "rgb(204, 65, 37)", "rgb(224, 102, 102)", "rgb(246, 178, 107)", "rgb(255, 217, 102)", "rgb(147, 196, 125)", 
                "rgb(118, 165, 175)", "rgb(109, 158, 235)", "rgb(111, 168, 220)", "rgb(142, 124, 195)", "rgb(194, 123, 160)",
                "rgb(166, 28, 0)", "rgb(204, 0, 0)", "rgb(230, 145, 56)", "rgb(241, 194, 50)", "rgb(106, 168, 79)",
                "rgb(69, 129, 142)", "rgb(60, 120, 216)", "rgb(61, 133, 198)", "rgb(103, 78, 167)", "rgb(166, 77, 121)",
                "rgb(91, 15, 0)", "rgb(102, 0, 0)", "rgb(120, 63, 4)", "rgb(127, 96, 0)", "rgb(39, 78, 19)", 
                "rgb(12, 52, 61)", "rgb(28, 69, 135)", "rgb(7, 55, 99)", "rgb(32, 18, 77)", "rgb(76, 17, 48)"]
            ]
        });
        
        $(".sp-choose").on( "click", function(){
            
            var currVal = $(this).parent().closest('div').parent().closest('div').find(".sp-input").val();

            selectOpt.val(currVal);
        });
        
    }
    
    function setVal(sel){
        
        var selVal = $(sel).find('option:selected').text().toLowerCase();
        
        var inp = '<?php echo $this->Form->input('ProductColor.hex_value.', array('type' => 'text', 'label' => false, 'required' => false, 'minlength' => 2, 'maxlength' => 10, 'placeholder'=>'Hex Code', 'class' => 'setMe', 'id' => '' )) ?>';
        
        $( "div" ).remove( ".added" );
        
        if ( selVal == 'solid' ) {
            
            $( "<div class='content-forms-field added'><label>Hex Code <span class='require_field'>* <input class='full' /></span></label><div class='input select required'>"+inp+"</div><div class='clearfix'></div></div>" ).insertAfter( ".me" );
            
            
        } else if( selVal == 'segmented' ) {
            
            for (var i=0; i < 6; i++) {
                
                $( "<div class='content-forms-field added'><label>Hex Code<span class='require_field'>* <input class='full' /></span></label><div class='input select required'>"+inp+"</div><div class='clearfix'></div></div>" ).insertAfter( ".me" );
            }
            
        } else if( selVal == 'swirl' ) {
            
            for (var i=0; i < 3; i++) {
                
                $( "<div class='content-forms-field added'><label>Hex Code<span class='require_field'>* <input class='full' /></span></label><div class='input select required'>"+inp+"</div><div class='clearfix'></div></div>" ).insertAfter( ".me" );
            }
        }
        
        spect();

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
    $.validator.addMethod("name_required", function(value, element) {
        return value != "";
    }, "Please select the color name.");
    $.validator.addMethod("image_required", function(value, element) {
        return value != "";
    }, "Please provide an image.");
    

</script>
<div class="container-fluid cn">
    <div class="row rt ">
        <?php echo $this->element('dashboard/navigation');?>
        <div class="col-sm-8 col-lg-10 col-md-9 col-xs-12">
        	<div class="row cm rr">
            <div class="col-md-12 rr ">
                <div class="ps">
                    <h3 style="padding-left: 10px;padding-top: 10px;"> Add Product Color
                    <ul class="list-inline pull-right">
                            		<li><?php echo $this->Html->link('<i class="fa fa-list"></i> List Product Colors',array('controller'=>'ProductColors','action'=>'index', 'bandhead' => true),array('escape'=>false)); ?></li>
                            	</ul>	
                    </h3>
                </div>
            </div>
            <div class="col-md-12">
                <div class="content-forms content-box">
                    <?php echo $this->Form->create('ProductColor', array('id' => 'add_product_color', 'type' => 'file'));?>
                    <div class="content-forms content-box">
                        <div class="content-forms-field">
                            <label>Product Category<span class="require_field">*</span></label>
    
                            <div class="input select required">
                                <?php echo $this->Form->input('product_category_id', array('type' => 'select', 'options' => $product_cat_list, 'empty' => '--Select Category--', 'label' => false, 'required' => false, 'class' => 'category_required', 'onchange' => 'get_products(this.value)'));?>
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
                            <label>Product Size<span class="require_field">*</span></label>

                            <div class="input select required">
                                <?php echo $this->Form->input('product_size_id', array('type' => 'select',"id"=>"size_id", 'options' => "", 'empty' => '--Select Product Size--', 'label' => false, 'required' => false, 'class' => 'size_required'));?>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="content-forms-field">
                            <label>Product Style<span class="require_field">*</span></label>

                            <div class="input select required">
                                <?php echo $this->Form->input('product_style_id', array('type' => 'select',"id"=>"style_id", 'options' => "", 'empty' => '--Select Product Style--', 'label' => false, 'required' => false, 'class' => 'style_required', 'onchange' => 'setVal(this)'));?>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        
                        <div class="content-forms-field">
                            <label>Name<span class="require_field">*</span></label>

                            <div class="input select required">
                                <?php echo $this->Form->input('name', array('type' => 'text', "id"=>"cname", 'label' => false, 'required' => false, 'class' => 'name_required'));?>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        
                        <div class="content-forms-field me">
                            <label>Image<span class="require_field">*</span></label>
    
                            <div class="input select required">
                                <?php echo $this->Form->input('image', array('type' => 'file', 'id' => "file_upload", 'div' => false, 'required' => false, 'label' => false, 'class' => 'image_required', 'maxlength' => 100)); ?>
                                <p class="error-message"style="font-size: 12px;">(Max file size 300kb.)</p>
                                  <p style="color:red;">( Only gif, jpg, jpeg, png, pjpeg, x-png, x-tiff images are allowed. )</p>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        
                          <div class="clearfix"></div>  
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