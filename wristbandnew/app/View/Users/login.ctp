<?php  echo $this->Html->script(array('jquery.min', 'jquery.validate1.13.1.min'));?>
<script>
    $.validator.addMethod("pass_required", function(value, element) {
        return value != "";
    }, "Please enter the password.");

    $.validator.addMethod("email_required", function(value, element) {
        return value != "";
    }, "Please enter the email.");
      $.validator.addMethod("valid_mail", function (value, element) {
        return /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/i.test(value);
    }, "Please enter a valid email address.");

    $(document).ready(function() {
        $("#user_login").validate();
    });
</script>
<div class="row">
	<?php echo $this->element('front/leftpanel'); ?>
	<div class="col-lg-9 col-md-9 col-sm-9">

		<div class="right_content">

			<h1>LOGIN</h1>

			<div class="content_order">
				<p>
					We Want to Hear From You. Wristband24/7.Com is here to assist you in anyway we can. If you have questions about our products or services, don't hesitate to give us a call.
				</p>
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 contact_wraper">

					<h1>Login</h1>
                     <?php echo $this->Mysession->flash(); ?>
				 <?php echo $this->Form->create('User', array('id' => 'user_login', 'type' => 'file'));?>


					  <div class="form-group">
                          <?php echo $this->Form->input('email', array('placeholder'=>"Email",'type' => 'text','label' => false, 'required' => false, 'class' => 'form-control valid_mail email_required'));?>
					  </div>
                        <div class="form-group">
                          <?php echo $this->Form->input('password', array('placeholder'=>"Password",'type' => 'password','label' => false, 'required' => false, 'class' => 'form-control pass_required'));?>
					  </div>
                      <?php echo $this->Form->submit('submit_btn.png'); ?>
					<?php echo $this->Form->end();?>
				</div>

			</div>
		</div>
	</div>
</div>