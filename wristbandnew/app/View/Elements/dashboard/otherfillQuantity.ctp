<?php
   
   if (!empty($item_list)) {
   
     foreach ($item_list as $key => $qty) {
        ?>
        <div class="content-forms-field">
            <label>Quantity Price <?php echo ": " . $qty; ?><span class="require_field">*</span></label>
    
            <div class="input">
                 <?php echo $this->Form->input('', array('name' => "data[MultiplePrice][$key][qty]",'type' => 'hidden', 'label' => false,'value'=>$key));?>
                <?php //echo $this->Form->input('', array('name' => "data[MultiplePrice][$key][price]",'id'=>'price'.$key, 'type' => 'text', 'label' => false, 'required' => false, 'class' => 'price_required valid_price', 'maxlength' => 10));?>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="content-forms-field">
            <div class="input">
                <label> Front Message Extra </label>
                <?php echo $this->Form->input('', array('name' => "data[MultiplePrice][$key][front_msg_extra]", 'type' => 'text', 'label' => false, 'required' => false, 'class' => 'free_required', 'maxlength' => 8));?>
                <label> Internal Message </label>
                <?php echo $this->Form->input('', array('name' => "data[MultiplePrice][$key][internal_msg]", 'type' => 'text', 'label' => false, 'required' => false, 'class' => 'free_required', 'maxlength' => 8));?>
                <label> Internal Message Extra </label>
                <?php echo $this->Form->input('', array('name' => "data[MultiplePrice][$key][internal_msg_extra]", 'type' => 'text', 'label' => false, 'required' => false, 'class' => 'free_required', 'maxlength' => 8));?>
                <label> Back Message </label>
                <?php echo $this->Form->input('', array('name' => "data[MultiplePrice][$key][back_msg]", 'type' => 'text', 'label' => false, 'required' => false, 'class' => 'free_required', 'maxlength' => 8));?>
                <label> Back Message Extra </label>
                <?php echo $this->Form->input('', array('name' => "data[MultiplePrice][$key][back_msg_extra]", 'type' => 'text', 'label' => false, 'required' => false, 'class' => 'free_required', 'maxlength' => 8));?>
                <label> Logo </label>
                <?php echo $this->Form->input('', array('name' => "data[MultiplePrice][$key][logo]", 'type' => 'text', 'label' => false, 'required' => false, 'class' => 'free_required', 'maxlength' => 8));?>
                <label> Key Chain </label>
                <?php echo $this->Form->input('', array('name' => "data[MultiplePrice][$key][keychain]", 'type' => 'text', 'label' => false, 'required' => false, 'class' => 'free_required', 'maxlength' => 8));?>
                <label> Wrapper </label>
                <?php echo $this->Form->input('', array('name' => "data[MultiplePrice][$key][wrapper]", 'type' => 'text', 'label' => false, 'required' => false, 'class' => 'free_required', 'maxlength' => 8));?>
                <label> Thickness 2mm </label>
                <?php echo $this->Form->input('', array('name' => "data[MultiplePrice][$key][thickness_2mm]", 'type' => 'text', 'label' => false, 'required' => false, 'class' => 'free_required', 'maxlength' => 8));?>
                <br/>
            </div>
            <div class="clearfix"></div>
        </div>
        <?php } 
        
    } else { ?>
        
        <label style="color: red;"> There are no fields in this Category </label>
        <div class="clearfix"></div>
        
    <?php } ?>