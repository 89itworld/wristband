<script>
    
    $(document).ready(function () {

        $('#UserResetpasswordForm').validate();
        
    });
    
</script>


    <div class="container-fluid">
        <div class="row" style="background-color: #F8F8F8;">
            <div class="col-lg-12 cl" style="text-align: center;">
                <div class="login-card">
                    <?php echo $this->Form->create('User',array('url'=>array('controller'=>'Users','action'=>'resetpassword',base64_encode($data['userid']),base64_encode($data['activation'])))); ?>
                    <h2 style="text-align: center;">Create Password</h2>
                    <?php echo $this->Html->image('findmatic/user1.png', array( 'alt' => 'user', 'class' => "center-block img-circle img-responsive", 'width' => "120" )); ?>
                    
                    <?php echo $this->Mysession->flash();
                    ?>
                    <br>
                    
                    <?php
                    
                        echo $this->Form->input('password', array('type'=>'password', 'label'=>false, 'div'=>false, 'placeholder'=>'Enter Password', 'class'=>'form-control required', 'required' => false));
                        echo $this->Form->input('confirm_password', array('type'=>'password', 'label'=>false, 'div'=>false, 'placeholder'=>'Confirm Password', 'class'=>'form-control mk required', 'required' => false));
                        
                    ?>
                    
                    
                    <div class="clearfix"></div>
                     <div class="checkbox">
                    <?php 
                    
                            echo $this->Form->submit('Reset',array('class'=>'btn btn-lg sign-btn btn-primary btn-block','div'=>false,'label'=>false));
                             
                    ?>
                    </div>
                    
                    <p class="centered new-user">
                        <?php echo $this->Html->link('Login',array('controller'=>'Users','action'=>'login','admin'=>true)); ?>
                    </p>
                    
                    <?php echo $this->Form->end(); ?>
                    
                </div>
            </div>
        </div>
    </div>
