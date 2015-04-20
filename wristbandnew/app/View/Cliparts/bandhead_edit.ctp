<script>

    $(document).ready(function() {
        $("#ClipartBandheadEditForm").validate();
    });
    
</script>

<div class="container-fluid cn" >
            <div class="row rt ">
                <?php echo $this->element('dashboard/navigation');?>
		        <div class="col-sm-8 col-lg-10 col-md-9 col-xs-12">
		            <div class="row rr">
		            <div class="col-md-12 rr ">
		                <div class="ps">
		                    <h3 style="padding-left: 10px;padding-top: 10px;"> Edit Clipart</h3>
		                </div>
		            </div>
		            <div class="col-md-12">
		                <div class="content-forms content-box">
		                    <?php echo $this->Mysession->flash(); ?>                
							<?php echo $this->Form->create('Clipart', array('type' => 'file'));?>       
							<?php echo $this->Form->input('id',array('type'=>'hidden','label'=>false));?>

		                    <div class="content-forms-field">
		                        <label>Name<span class="require_field">*</span></label>
		
		                        <div class="input select required">
		                            <?php echo $this->Form->input('name', array('type' => 'text', 'label' => false, 'required' => false, 'class' => 'name_required', 'maxlength' => 200, 'placeholder' => "Name"));?>
		                        </div>
		                        <div class="clearfix"></div>
		                    </div>

		                    <div class="content-forms-field">
                        <label class="inner_label">Current Clipart</label>

                        <div class="input select required">
	                            <?php echo $this->Html->image('cliparts/' . $this->request->data['Clipart']['image'], array('style' => 'width:50px;height:50px;')); ?>
	                            <?php echo $this->Form->input('old_image', array('type' => 'hidden', 'div' => false, 'label' => false, 'value' => $this->request->data['Clipart']['image'])); ?>
	                        </div>
	                        <div class="clearfix"></div>
	                    </div>
	                    <div class="content-forms-field">
	                        <label>Change Clipart</label>
	                        <label style="color:red; clear: both;">( Only gif, jpg, jpeg, png, pjpeg, x-png, x-tiff images are allowed.
	                                )</label>
	
	                        <div class="input select required">
	                            <span style="font-size: 12px; color: red;">(Max file size 300kb.)</span>
	                            <?php echo $this->Form->input('image', array('type' => 'file', 'id' => "file_upload", 'div' => false, 'required' => false, 'label' => false, 'class' => '', 'maxlength' => 100)); ?>
	                            
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
		                <?php echo $this->Form->end(); ?>
		            </div>
		        </div>
		        </div>
            </div>
        </div>
        <div class="clearfix"></div>
