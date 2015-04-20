<script>
    $.validator.addMethod("name_required", function(value, element) {
        return value != "";
    }, "Please enter the name.");
    $.validator.addMethod("domain_required", function(value, element) {
        return value != "";
    }, "Please enter the domain.");
      $.validator.addMethod("valid_domain", function (value, element) {
        return /^(http:\/\/www\.|https:\/\/www\.|http:\/\/|https:\/\/)[a-z0-9]+([\-\.]{1}[a-z0-9]+)*\.[a-z]{2,5}(:[0-9]{1,5})?(\/.*)?$/.test(value);
    }, "Please enter a valid domain address.");
    $(document).ready(function() {
        $("#add_domain").validate();
    });
</script>
<div class="container-fluid cn">
    <div class="row rt ">
        <?php echo $this->element('dashboard/navigation');?>
        <div class="col-sm-8 col-lg-10 col-md-9 col-xs-12">
        	<div class="row rr cm">
            <div class="col-md-12 rr">
                <div class="ps">
                    <h3 style="padding-left: 10px;padding-top: 10px;"> Add Domain
                    <ul class="list-inline pull-right">
                            	<li><?php echo $this->Html->link('<i class="fa fa-list"></i>
                            	 List Domains',array('controller'=>'Domains','action'=>'index', 'bandhead' => true),array('escape'=>false)); ?></li>
                            </ul>	
                    </h3>
                </div>
            </div>
            <div class="col-md-12">
                <div class="content-forms content-box">
                    <?php echo $this->Form->create('Domain', array('id' => 'add_domain', 'type' => 'file'));?>
                    
                    <div class="content-forms-field">
                        <label>Name<span class="require_field">*</span></label>

                        <div class="input select required">
                            <?php echo $this->Form->input('name', array('type' => 'text', 'label' => false, 'required' => false, 'class' => 'name_required', 'maxlength' => 100, 'placeholder' => "Name"));?>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    
                    <div class="content-forms-field">
                        <label>Domain<span class="require_field">*</span></label>

                        <div class="input select required">
                            <?php echo $this->Form->input('domain', array('type' => 'text', 'label' => false, 'required' => false, 'class' => 'domain_required valid_domain', 'maxlength' => 100));?>
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