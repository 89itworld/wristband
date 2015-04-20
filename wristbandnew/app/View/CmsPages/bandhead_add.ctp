<?php echo $this->Html->script(array('tinymce/tinymce.min')); ?>
<script>

    tinymce.init({
        selector: "textarea",
        plugins:["code"]
     });

    $.validator.addMethod("title_required", function(value, element) {
        return value != "";
    }, "Please provide page title.");
     
    $.validator.addMethod("slug_required", function(value, element) {
        return value != "";
    }, "Please enter the slug.");
    
    $.validator.addMethod("desc_req", function(value, element) {
        return value != "";
    }, "Please provide description.");
    
    $(document).ready(function() {
        $("#add_page").validate();
    });

</script>
<div class="container-fluid cn">
    <div class="row rt ">
        <?php echo $this->element('dashboard/navigation');?>
        <div class="col-sm-8 col-lg-10 col-md-9 col-xs-12">
        	<div class="row cm rr">
            <div class="col-md-12 rr ">
                <div class="ps">
                    <h3 style="padding-left: 10px;padding-top: 10px;"> Add Page
                    	<ul class="list-inline pull-right">
                            	<li><?php echo $this->Html->link('<i class="fa fa-list"></i> List Pages',array('controller'=>'CmsPages','action'=>'index', 'bandhead' => true),array('escape'=>false)); ?></li>
                            </ul>	
                    </h3>
                </div>
            </div>
            <div class="col-md-12">
                <div class="content-forms content-box">
                    <?php echo $this->Form->create('CmsPage', array('id' => 'add_page', 'type' => 'file'));?>
                     <div class="content-forms-field">
                        <label>Title<span class="require_field">*</span></label>

                        <div class="input select required">
                            <?php echo $this->Form->input('title', array('type' => 'text', 'label' => false, 'required' => false, 'class' => 'title_required', 'placeholder' => "Title"));?>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="content-forms-field">
                        <label>Slug<span class="require_field">*</span></label>

                        <div class="input select required">
                            <?php echo $this->Form->input('slug', array('type' => 'text', 'label' => false, 'required' => false, 'class' => 'slug_required', 'maxlength' => 200, 'placeholder' => "Slug"));?>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="content-forms-field">
                        <label>Keyword</label>

                        <div class="input select required">
                            <?php echo $this->Form->input('keyword', array('type' => 'text', 'label' => false, 'required' => false, 'maxlength' => 30, 'placeholder' => "Keyword"));?>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="content-forms-field edit100">
                        <label>Description<span class="require_field">*</span></label>
                        <br />
                        <div class="input select required">
                            <?php echo $this->Form->input('description', array('type' => 'textarea', 'label' => false, 'required' => false, 'class' => 'form-control input63 desc_req', 'rows' => 5));?>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="content-forms-field">
                        <input class="btn md pull-left" style="width:130px; background-color: #3fb8e5;" type="submit"
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
