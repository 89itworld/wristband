<script>
    
    $(document).ready(function () {

        $('#UserLoginForm').validate();
        
    });
    
</script>


    <div class="container-fluid">
        <div class="row" style="background-color: #F8F8F8;">
            <div class="col-lg-12 cl" style="text-align: center;">
                <div class="login-card">
                    
                    
                    <?php echo $this->Form->create('User',array('action'=>'login')); ?>
                    
                    <h2 style="text-align: center;">Login</h2>
                    <!-- <img src="images/user1.png" alt="user" class="center-block img-circle img-responsive" width="120" /> -->
                    <?php echo $this->Html->image('findmatic/user1.png', array( 'alt' => 'user', 'class' => "center-block img-circle img-responsive", 'width' => "120" )); ?>
                    
                    <?php echo $this->Mysession->flash();
                        
                        //pr(AuthComponent::password('navneet123'));
                    ?>
                    <br>
                    
                    <?php
                    
                        echo $this->Form->input('email', array('type'=>'text', 'label'=>false, 'div'=>false, 'placeholder'=>'Username', 'class'=>'form-control required', 'required' => false));
                        echo $this->Form->input('password', array('type'=>'password', 'label'=>false, 'div'=>false, 'placeholder'=>'Password', 'class'=>'form-control mk required', 'required' => false));
                        
                    ?>
                    
                    <!-- <input type="text" class="form-control" maxlength="255" placeholder="Username">
                    <input type="password" class="form-control mk" maxlength="255" placeholder="Password"> -->
                    <div class="checkbox">
                        <a href="#" class="pull-right">Forgot Password</a>
                        <?php //echo $this->Html->link('Forgot Password', array('controller' => 'Users','action' => '#'), array('class' => 'pull-right')); ?>
                    </div>
                    <div class="clearfix"></div>
                     <div class="checkbox">
                    <!-- <input  class="btn btn-lg sign-btn btn-primary btn-block" type="submit" value="Login"/> -->
                    <?php 
                    
                            echo $this->Form->submit('Login',array('class'=>'btn btn-lg sign-btn btn-primary btn-block','div'=>false,'label'=>false));
                             
                    ?>
                    </div>
                    
                    <p class="centered new-user">
                        <a href="#">New User</a>
                        <?php //echo $this->Html->link('New User', array('controller' => 'Users','action' => '#'), array('class' => '')); ?>
                    </p>
                    
                    <?php echo $this->Form->end(); ?>
                    
                </div>
            </div>
        </div>
    </div>