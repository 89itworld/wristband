<script>
    
    $.validator.addMethod("name_required", function(value, element) {
        return value != "";
    }, "Please enter the name.");

    $.validator.addMethod("value_required", function(value, element) {
        return value != "";
    }, "Please enter the value.");

    $(document).ready(function() {
        $("#add_SubTab").validate();
    });
</script>
<div class="container-fluid cn">
    <div class="row rt ">
        <?php echo $this->element('dashboard/navigation');?>
        <div class="col-sm-8 col-lg-10 col-md-9 col-xs-12">
        	<div class="row rr cm">
            <div class="col-md-12 rr">
                <div class="ps">
                    <h3 style="padding-left: 10px;padding-top: 10px;"> Add Sub Tab
                    <ul class="list-inline pull-right">
                            	<li><?php echo $this->Html->link('<i class="fa fa-list"></i>
                            	 List Sub Tabs',array('controller'=>'SubTabs','action'=>'index', 'bandhead' => true),array('escape'=>false)); ?></li>
                            </ul>	
                    </h3>
                </div>
            </div>
            <div class="col-md-12">
                <div class="content-forms content-box">
                    <?php echo $this->Form->create('SubTab', array('id' => 'add_SubTab', 'type' => 'file'));?>
                    
                   <div class="content-forms-field">
                        <label>Parent Tab<span class="require_field">*</span></label>

                        <div class="input select required">
                            <?php echo $this->Form->input('tab_id', array('options'=>$options, 'label' => false, 'required' => false, 'class' => 'name_required', 'maxlength' => 200, 'placeholder' => "Name"));?>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="content-forms-field">
                        <label>Name<span class="require_field">*</span></label>

                        <div class="input select required">
                            <?php echo $this->Form->input('name', array('type' => 'text', 'label' => false, 'required' => false, 'class' => 'name_required', 'maxlength' => 200, 'placeholder' => "Name"));?>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    
                    <div class="content-forms-field">
                        <label>Slug</label>

                        <div class="input select required">
                            <?php echo $this->Form->input('slug', array('type' => 'text', 'label' => false, 'required' => false, 'class' => 'slug_required', 'maxlength' => 200));?>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="content-forms-field">
                        <label>Controller</label>

                        <div class="input select required">
                            <?php echo $this->Form->input('controller', array('type' => 'text', 'label' => false, 'required' => false, 'class' => 'cnt_required', 'maxlength' => 200));?>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="content-forms-field">
                        <label>Action</label>

                        <div class="input select required">
                            <?php echo $this->Form->input('action', array('type' => 'text', 'label' => false, 'required' => false, 'class' => 'action_required', 'maxlength' => 200));?>
                        </div>
                        <div class="clearfix"></div>
                    </div>

                    <div class="content-forms-field">
                        <label>Title</label>

                        <div class="input select required">
                            <?php echo $this->Form->input('title', array('type' => 'text', 'label' => false, 'required' => false, 'class' => 'title_required', 'maxlength' => 200));?>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="content-forms-field">
                        <label>Description</label>

                        <div class="input select required">
                            <?php echo $this->Form->input('description', array('type' => 'textarea', 'label' => false, 'required' => false, 'class' => 'des_required', 'maxlength' => 2000));?>
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