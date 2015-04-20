<script>
    
    $.validator.addMethod("name_required", function(value, element) {
        return value != "";
    }, "Please enter the name.");

    $.validator.addMethod("value_required", function(value, element) {
        return value != "";
    }, "Please enter the value.");

    $(document).ready(function() {
        $("#add_option").validate();
    });
</script>
<div class="container-fluid cn">
    <div class="row rt ">
        <?php echo $this->element('dashboard/navigation');?>
        <div class="col-sm-8 col-lg-10 col-md-9 col-xs-12">
        	<div class="row rr cm">
            <div class="col-md-12 rr">
                <div class="ps">
                    <h3 style="padding-left: 10px;padding-top: 10px;"> Add Option
                    <ul class="list-inline pull-right">
                            	<li><?php echo $this->Html->link('<i class="fa fa-list"></i>
                            	 List Options',array('controller'=>'Options','action'=>'index', 'bandhead' => true),array('escape'=>false)); ?></li>
                            </ul>	
                    </h3>
                </div>
            </div>
            <div class="col-md-12">
                <div class="content-forms content-box">
                    <?php echo $this->Form->create('Option', array('id' => 'add_option', 'type' => 'file'));?>
                    
                    <div class="content-forms-field">
                        <label>Name<span class="require_field">*</span></label>

                        <div class="input select required">
                            <?php echo $this->Form->input('name', array('type' => 'text', 'label' => false, 'required' => false, 'class' => 'name_required', 'maxlength' => 200, 'placeholder' => "Name"));?>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    
                    <div class="content-forms-field">
                        <label>Value<span class="require_field">*</span></label>

                        <div class="input select required">
                            <?php echo $this->Form->input('value', array('type' => 'text', 'label' => false, 'required' => false, 'class' => 'value_required', 'maxlength' => 200, 'placeholder' => "Value"));?>
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