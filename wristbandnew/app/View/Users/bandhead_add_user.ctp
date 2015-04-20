<script>
     $.validator.addMethod("country_required", function(value, element) {
        return value != "";
    }, "Please select the country name.");
    $.validator.addMethod("name_required", function(value, element) {
        return value != "";
    }, "Please enter the User name.");
    $.validator.addMethod("email_required", function(value, element) {
        return value != "";
    }, "Please enter the Email.");
     $.validator.addMethod("valid_code", function(value, element) {
        return /^[0-9]+$/.test(value);
    }, "Please enter a valid number.");
    $.validator.addMethod("mobile_required", function(value, element) {
        return /^[0-9]+$/.test(value);
    }, "Please enter a valid phone number.");
    $.validator.addMethod("zip_required", function(value, element) {
        return /^[0-9]+$/.test(value);
    }, "Please enter a valid zipcode.");
    $.validator.addMethod("usertype_required", function(value, element) {
        return value != "";
    }, "Please enter a User type.");
    $(document).ready(function() {
        $("#UseradminAddUserForm").validate();
    });
</script>
<div class="container-fluid cn" >
            <div class="row rt ">
                <?php echo $this->element('dashboard/navigation');?>
                <div class="col-sm-8 col-lg-10 col-md-9 col-xs-12">
                    <div class="row rr cl">
                        <div class="col-md-12 rr" >
                            <div class="ps">
                            <h3 style="padding-left: 10px;padding-top: 10px;"> Add User <ul class="list-inline pull-right">
						<li><?php echo $this->Html->link('<i class="fa fa-tags"></i> List Users',array('controller'=>'Users','action'=>'dashboard'), array('escape' =>false)); ?></li>
						</ul></h3></div>
                        </div>
                        
                    <div class="col-md-12">
                        <div class="content-forms content-box">
                        
                            <?php echo $this->Form->create('User', array('url'=>array('controller'=>'Users','action'=>'addUser','admin'=>true)),array('id' => 'add_User'));?>
                            
                            <div class="content-forms-field">
                                <label>First Name<span class="require_field">*</span></label>
        
                                <div class="input select required">
                                    <?php echo $this->Form->input('first_name', array('type' => 'text', 'label' => false, 'required' => false, 'class' => 'name_required form-control', 'maxlength' => 200,'placeholder'=>"First Name"));?>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            
                            <div class="content-forms-field">
                                <label>E-mail<span class="require_field">*</span></label>
        
                                <div class="input select required">
                                    <?php echo $this->Form->input('email', array('type' => 'email', 'label' => false, 'required' => false, 'class' => 'email_required form-control', 'maxlength' => 30,'placeholder'=>"E-mail"));?>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            
                            <div class="content-forms-field">
                                <label>Mobile<span class="require_field">*</span></label>
        
                                <div class="input select required">
                                    <?php echo $this->Form->input('mobile', array('type' => 'text', 'label' => false, 'required' => false, 'class' => 'mobile_required form-control', 'maxlength' => 30,'placeholder'=>"Mobile Number"));?>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            
                            <div class="content-forms-field">
                                <label>User type<span class="require_field">*</span></label>
        
                                <div class="input select required">
                                    <?php
                                     echo $this->Form->input('user_type', array("options"=>$usertypes,"empty"=>"----- Select User Type -----",'type' => 'select', 'label' => false, 'required' => false, 'class' => 'usertype_required form-control'));
                                    ?>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            
                            <div class="content-forms-field">
                                <label>Country<span class="require_field">*</span></label>
        
                                <div class="input select required">
                                    <?php
                                     echo $this->Form->input('country', array("options"=>$countries,"empty"=>"----- Select Country -----",'type' => 'select', 'label' => false, 'required' => false, 'class' => 'country_required form-control cl'));
                                    ?>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            
                            <div class="content-forms-field">
                                <label>Zipcode<span class="require_field">*</span></label>
        
                                <div class="input select required">
                                    <?php echo $this->Form->input('zipcode', array('type' => 'text', 'label' => false, 'required' => false, 'class' => 'zip_required form-control', 'maxlength' => 15,'placeholder'=>"Zip"));?>
                                </div>
                                <div class="clearfix"></div>
                            </div>

                            <div class="content-forms-field">
                                <label>Address<span class="require_field">*</span></label>
        
                                <div class="input select required">
                                    <?php echo $this->Form->input('address', array('type' => 'textarea', 'label' => false, 'required' => false, 'class' => 'form-control input63', 'rows' => 5));?>
                                </div>
                                <div class="clearfix"></div>
                            </div>


                        <div class="col-md-12" style="text-align: center;">
                        <input class="btn md pull-right" style="background-color: #3fb8e5;" type="submit" value="Submit"></div>
                        
                        <?php echo $this->Form->end();?>
                            </div>
                        </div>  
                    </div>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>