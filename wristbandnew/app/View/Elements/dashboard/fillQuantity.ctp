<?php
   
   if (!empty($item_list)) {
   
     foreach ($item_list as $key => $qty) {
        ?>
        <div class="content-forms-field">
            <label>Quantity Price <?php echo ": " . $qty; ?><span class="require_field">*</span></label>
    
            <div class="input">
                 <?php echo $this->Form->input('', array('name' => "data[MultiplePrice][$key][qty]",'type' => 'hidden', 'label' => false,'value'=>$qty));?>
                <?php echo $this->Form->input('', array('name' => "data[MultiplePrice][$key][price]",'id'=>'price'.$key, 'type' => 'text', 'label' => false, 'required' => false, 'class' => 'price_required valid_price', 'maxlength' => 10));?>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="content-forms-field">
            <label> Free Quantity </label>
    
            <div class="input">
                <?php echo $this->Form->input('', array('name' => "data[MultiplePrice][$key][free_qty]", 'type' => 'text', 'label' => false, 'required' => false, 'class' => 'free_required', 'maxlength' => 8));?>
            </div>
            <div class="clearfix"></div>
        </div>
        <?php } 
        
    } else { ?>
        
        <label style="color: red;"> There are no fields in this Category </label>
        <div class="clearfix"></div>
        
    <?php } ?>