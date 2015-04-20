<script>
    $.validator.addMethod("name_required", function(value, element) {
        return value != "";
    }, "Please enter the category name.");
    $.validator.addMethod("slug_required", function(value, element) {
        return value != "";
    }, "Please enter the slug.");

    $.validator.addMethod("image_required", function(value, element) {
        return value != "";
    }, "Please select a image for icon.");
    $(document).ready(function() {
        $("#add_product_category").validate();
    });
</script>
<div class="container-fluid cn">
    <div class="row rt ">
        <?php echo $this->element('dashboard/navigation');?>
        <div class="col-sm-8 col-lg-10 col-md-9 col-xs-12">
        	<div class="row rr cm">
            <div class="col-md-12 rr">
                <div class="ps">
                    <h3 style="padding-left: 10px;padding-top: 10px;"> Add Category
                    <ul class="list-inline pull-right">
                            	<li><?php echo $this->Html->link('<i class="fa fa-list"></i>
                            	 List Product Categories',array('controller'=>'ProductCategories','action'=>'index', 'bandhead' => true),array('escape'=>false)); ?></li>
                            </ul>	
                    </h3>
                </div>
            </div>
            <div class="col-md-12">
                <div class="content-forms content-box">
                    <?php echo $this->Form->create('ProductCategory', array('id' => 'add_product_category', 'type' => 'file'));?>

                    <div class="content-forms-field">
                        <label>Name<span class="require_field">*</span></label>

                        <div class="input select required">
                            <?php echo $this->Form->input('name', array('type' => 'text', 'label' => false, 'required' => false, 'class' => 'name_required', 'maxlength' => 200, 'placeholder' => "Name"));?>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="content-forms-field">
                        <label>Slug<span class="require_field">*</span></label>

                        <div class="input select required">
                            <?php echo $this->Form->input('slug', array('type' => 'text', 'label' => false, 'required' => false, 'class' => 'slug_required', 'maxlength' => 30, 'placeholder' => "Slug"));?>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="content-forms-field">
                        <label>Icon<span class="require_field">*</span></label>
						<label style="color:red; clear: both;">( Only gif, jpg, jpeg, png, pjpeg, x-png, x-tiff images are allowed. )</label>
                        <div class="input select required">
                            <span style="font-size: 12px; color: red;">(Max file size 300kb.)</span>
                            <?php echo $this->Form->input('image', array('type' => 'file', 'id' => "file_upload", 'div' => false, 'required' => false, 'label' => false, 'class' => 'image_required', 'maxlength' => 100)); ?>
                              
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="content-forms-field">
                        <label>Detail</label>

                        <div class="input select required">
                            <?php echo $this->Form->input('description', array('type' => 'textarea', 'label' => false, 'required' => false, 'class' => '', 'rows' => 5));?>
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
