<script>
    $.validator.addMethod("pass_required", function(value, element) {
        return value != "";
    }, "Please enter the password.");
    $.validator.addMethod("newpass_required", function(value, element) {
        return value != "";
    }, "Please enter the new password.");
    $.validator.addMethod("confirmpass_required", function(value, element) {
        return value != "";
    }, "Please enter the confirm password.");
    $.validator.addMethod("match_pass", function(value, element) {
        var newpass = $("#UserNewPass").val();
        return value == newpass;
    }, "Password and confirm password does not match.");

    $(document).ready(function() {
        $("#admin_change_password").validate();
    });
</script>
<div class="container-fluid cn">
    <div class="row rt ">
        <?php echo $this->element('dashboard/navigation');?>
        <div class="col-sm-8 col-lg-10 col-md-9 col-xs-12">
            <?php echo $this->Mysession->flash();?>
            <div class="row rr cm">
                <div class="col-md-12 rr ">
                    <div class="ps">
                        <h3 style="padding-left: 10px;padding-top: 10px;"> Change Password
                        </h3>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="content-forms content-box">
                        <?php echo $this->Form->create('User', array('id' => 'admin_change_password'));?>
                        <div class="content-forms-field">
                            <label>Password<span class="require_field">*</span></label>

                            <div class="input select required">
                                <?php echo $this->Form->input('password', array('type' => 'password', 'class' => 'pass_required', 'label' => false, 'autocomplete' => 'off', 'required' => false, 'minlength' => 6, 'maxlength' => 15));?>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="content-forms-field">
                            <label>New Password<span class="require_field">*</span></label>

                            <div class="input select required">
                                <?php echo $this->Form->input('new_pass', array('class' => 'newpass_required', 'label' => false, 'type' => 'password', 'autocomplete' => 'off', 'required' => false, 'minlength' => 6, 'maxlength' => 15));?>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="content-forms-field">
                            <label>Confirm password<span class="require_field">*</span></label>

                            <div class="input select required">
                                <?php echo $this->Form->input('confirm_pass', array('class' => 'confirmpass_required match_pass', 'label' => false, 'type' => 'password', 'autocomplete' => 'off', 'required' => false, 'minlength' => 6, 'maxlength' => 15));?>
                            </div>
                            <div class="clearfix"></div>
                        </div>

                        <div class="content-forms-field">
                            <label> </label>
                            <input class="btn md" style="width:130px; background-color: #3fb8e5;" type="submit"
                                   value="Update"></div>
                        <div class="clearfix"></div>
                    </div>
                    <?php echo $this->Form->end();?>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="clearfix"></div>
