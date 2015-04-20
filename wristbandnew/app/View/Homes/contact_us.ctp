<?php  echo $this->Html->script(array('jquery.min', 'jquery.validate1.13.1.min'));?>
<script>
    $.validator.addMethod("name_required", function(value, element) {
        return value != "";
    }, "Please select the name.");
     $.validator.addMethod("phone_required", function(value, element) {
        return value != "";
    }, "Please enter the mobile number.");
    $.validator.addMethod("email_required", function(value, element) {
        return value != "";
    }, "Please enter the email.");
      $.validator.addMethod("valid_mail", function (value, element) {
        return /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/i.test(value);
    }, "Please enter a valid email address.");
    $.validator.addMethod("msg_required", function(value, element) {
        return value != "";
    }, "Please enter the message.");
    $(document).ready(function() {
        $("#add_contact").validate();
    });
</script>
<div class="row">
	<?php echo $this->element('front/leftpanel'); ?>
	<div class="col-lg-9 col-md-9 col-sm-9">

		<div class="right_content">

			<h1>CONTACT US</h1>

			<div class="content_order">
				<p>
					We Want to Hear From You. Wristband24/7.Com is here to assist you in anyway we can. If you have questions about our products or services, don't hesitate to give us a call.
				</p>
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 contact_wraper">

					<h1>Feel Free to Contact Us</h1>
                     <?php echo $this->Mysession->flash(); ?>
				 <?php echo $this->Form->create('Contact', array('id' => 'add_contact', 'type' => 'file'));?>
					  <div class="form-group">
                          <?php echo $this->Form->input('name', array('placeholder'=>"Name",'type' => 'text','label' => false, 'required' => false, 'class' => 'form-control name_required'));?>
					  </div>
					  <div class="form-group">
                          <?php echo $this->Form->input('mobile', array('placeholder'=>"Phone",'type' => 'text','label' => false, 'required' => false, 'class' => 'form-control phone_required'));?>
					  </div>
					  <div class="form-group">
                          <?php echo $this->Form->input('email', array('placeholder'=>"Email",'type' => 'text','label' => false, 'required' => false, 'class' => 'form-control valid_mail email_required'));?>
					  </div>
                    <?php echo $this->Form->input('message', array('rows'=>"3",'placeholder'=>"Message",'type' => 'textarea','label' => false, 'required' => false, 'class' => 'form-control msg_required'));?>
                        <br/>
                        <br/>
                      <?php echo $this->Form->submit('submit_btn.png'); ?>
					<?php echo $this->Form->end();?>
				</div>
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="rightcontent">
						<h1>CUSTOMER SERVICES</h1>
						<div class="service">
							<p>Hours of Operations</p>
							<p>
								Monday - Friday 9AM-6PM CST
								Closed Saturday &amp; Sunday
							</p>
							<p>
								Call us:
								<br>

								(972) 200-0211
							</p>
							<p>
								<span>Sales</span>
							</p>
							<p>
								Hours of Operations
							</p>
							<p>
								Monday - Friday 9AM-6PM CST
								<br>
								Saturday 9AM-6PM CST
								<br>
								Sunday 9AM-6PM CST
							</p>
	<p>
								Toll Free:
								<br>
								1 (855) 352-BRAND (27263)
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>