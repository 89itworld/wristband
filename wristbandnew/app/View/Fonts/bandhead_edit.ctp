<script>

     $.validator.addMethod("name_required", function(value, element) {
        return value != "";
    }, "Please enter the font style name.");
     $.validator.addMethod("image_required", function(value, element) {
        return value != "";
    }, "Please select a image for font.");
    $(document).ready(function() {
        $("#font_style_edit").validate();
    });
</script>
<style>
	.clearBoth{
		clear:both;
	}
</style>
<div class="container-fluid cn">
    <div class="row rt ">
        <?php echo $this->element('dashboard/navigation');?>
        <div class="col-sm-8 col-lg-10 col-md-9 col-xs-12">
        	<div class="row rr cm">
            <div class="col-md-12 rr ">
                <div class="ps">
                    <h3 style="padding-left: 10px;padding-top: 10px;"> Edit Font Style
                    <ul class="list-inline pull-right">
                            		<li><?php echo $this->Html->link('<i class="fa fa-list"></i> List Font Styles',array('controller'=>'Fonts','action'=>'index', 'bandhead' => true),array('escape'=> false)); ?></li>
                            	</ul>		
                    </h3>
                </div>
            </div>
            <div class="col-md-12">
                <div class="content-forms content-box">
                    <?php echo $this->Form->create('Font', array('id' => 'font_style_edit', 'type' => 'file'));?>
                     <div class="content-forms-field">
                        <label>Font Name<span class="require_field">*</span></label>

                        <div class="input select required">
                            <?php echo $this->Form->input('name', array('type' => 'text', 'label' => false, 'required' => false, 'class' => 'name_required', 'maxlength' => 200, 'placeholder' => "Name"));?>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="content-forms-field">
                        <label>Font Image<span class="require_field">*</span></label>

                        <div class="input select required">
                            <?php echo $this->Form->input('image', array('type' => 'file', 'id' => "file_upload", 'div' => false, 'required' => false, 'label' => false, 'class' => 'image_required', 'maxlength' => 100)); ?>
                              <div class=clearBoth></div>
                              <p class="error-message"style="font-size: 12px;">(Max file size 1 MB.)</p>
                              <p style="color:red;margin: 0 0 0 6em;">( Only gif, jpg, jpeg, png, pjpeg, x-png, x-tiff images are allowed. )</p>
                              <div>
                              	<label> </label>
                              	<?php echo $this->Html->image('fonts/'. $img, array('style' =>'padding-top: 10px;')); ?>
                              	<!--<span class='glyphicon glyphicon-remove-circle'></span>-->
                              	<?php //echo $this->Html->link('<span class="glyphicon glyphicon-remove-circle"></span>',array('controller'=>'Fonts','action'=>'remove', 'bandhead' => true),array('escape' => false)); ?>
                              </div>
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
