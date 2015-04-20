<script>
    
    $.validator.addMethod("name_required", function(value, element) {
        return value != "";
    }, "Please provide a name.");
    
	$.validator.addMethod("image_required", function(value, element) {
        return value != "";
    }, "Please select a image for gallery.");

    $(document).ready(function() {
        $("#GalleryBandheadAddForm").validate();
    });
</script>


<div class="container-fluid cn" >
            <div class="row rt ">
                <?php echo $this->element('dashboard/navigation');?>
		        <div class="col-sm-8 col-lg-10 col-md-9 col-xs-12">
		        	<div class="row cm rr">
		            <div class="col-md-12 rr ">
		                <div class="ps">
		                    <h3 style="padding-left: 10px;padding-top: 10px;"> Add Gallery Image
		                    <ul class="list-inline pull-right">
                            		<li><?php echo $this->Html->link('<i class="fa fa-list"></i> List Gallery Images',array('controller'=>'Galleries','action'=>'index', 'bandhead' => true),array('escape'=>false)); ?></li>
                            	</ul>	
		                    </h3>
		                </div>
		            </div>
		            <div class="col-md-12">
		                <div class="content-forms content-box">
		                    <?php 
                        		echo $this->Form->create('Gallery', array('type' => 'file', 'url'=>array('controller'=>'Galleries','action'=>'add', 'bandhead'=>true)));	?>

		                    <div class="content-forms-field">
		                        <label>Name<span class="require_field">*</span></label>
		
		                        <div class="input select required">
		                            <?php echo $this->Form->input('name', array('type' => 'text', 'label' => false, 'required' => false, 'class' => 'name_required', 'maxlength' => 200, 'placeholder' => "Name", 'class' => 'name_required'));?>
		                        </div>
		                        <div class="clearfix"></div>
		                    </div>

		                    <div class="content-forms-field">
		                        <label>Image<span class="require_field">*</span></label>
		                        <label style="color:red; clear: both;">( Only gif, jpg, jpeg, png, pjpeg, x-png, x-tiff images are allowed. )</label>
		
		                        <div class="input select required">
		                            <span style="font-size: 12px; color: red;">(Max file size 1MB.)</span>
		                            <?php echo $this->Form->input('image', array('type' => 'file', 'id' => "file_upload", 'div' => false, 'required' => false, 'label' => false, 'class' => 'image_required', 'maxlength' => 100)); ?>
		                        </div>
		                        <div class="clearfix"></div>
		                    </div>

		                    <div class="content-forms-field">
		                        <label> </label>
		                        <input class="btn md" style="width:130px; background-color: #3fb8e5;" type="submit"
		                               value="Submit">
                           </div>
		                   <div class="clearfix"></div>
		                </div>
		                <?php echo $this->Form->end();?>
		            </div>
		        </div>
		        </div>
            </div>
        </div>
        <div class="clearfix"></div>
