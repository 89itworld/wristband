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
        $("#edit_product_category").validate();
    });
</script>
<div class="container-fluid cn">
    <div class="row rt ">
        <?php echo $this->element('dashboard/navigation');?>
        <div class="col-sm-8 col-lg-10 col-md-9 div-border col-xs-12">
            <div class="row rr">
              <?php echo $this->Mysession->flash(); ?>
            <div class="col-md-12 rr ">
                <div class="ps">
                    <h3 style="padding-left: 10px;padding-top: 10px;"> Edit Category</h3>
                </div>
            </div>
            <div class="col-md-12">
                <div class="content-forms content-box">
                    <?php echo $this->Form->create('ProductCategory', array('id' => 'edit_product_category', 'type' => 'file'));?>
                    <?php echo $this->Form->input('id', array('type' => 'hidden', 'label' => false));?>
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
                        <label class="inner_label">Current Icon</label>

                        <div class="input select required">
                            <?php echo $this->Html->image('ProductCategoryIcon/' . $this->request->data['ProductCategory']['image'], array('style' => 'width:25px;height:25px;')); ?>
                            <?php echo $this->Form->input('old_image', array('type' => 'hidden', 'div' => false, 'label' => false, 'value' => $this->request->data['ProductCategory']['image'])); ?>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="content-forms-field">
                        <label>Change Icon</label>

                        <div class="input select required">
                            <?php echo $this->Form->input('image', array('type' => 'file', 'id' => "file_upload", 'div' => false, 'required' => false, 'label' => false, 'class' => '', 'maxlength' => 100)); ?>
                            <p class="error-message"style="font-size: 12px;">(Max file size 300kb.)</p>
                            <p style="color:red;">( Only gif, jpg, jpeg, png, pjpeg, x-png, x-tiff images are allowed.
                                )</p>
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
