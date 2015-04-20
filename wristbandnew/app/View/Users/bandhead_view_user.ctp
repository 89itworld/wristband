<div class="container-fluid cn" >
            <div class="row rt ">
                <?php echo $this->element('dashboard/navigation');?>
                <div class="col-sm-8 col-lg-10 col-md-9">
                    <div class="row rr cl">
                        <div class="col-md-12 rr " >
                            <div class="ps">
                            <h3 style="padding-left: 10px;padding-top: 10px;"> View User</h3></div>
                        </div>
                        
                        
                        
                        
                <div class="row">
                    <div class="col-lg-12">
                        <div class="clearfix"></div>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <tbody>
                                <tr>
                                    <td class="table-title">First Name</td>
                                    <td>  <?php
                                        echo isset($user['User']['first_name'])?$user['User']['first_name']:'';
                                        ?></td>
                                     <td class="table-title">E-mail</td>
                                    <td>  <?php
                                        echo isset($user['User']['email'])?$user['User']['email']:'';
                                        ?></td>
                                </tr>
                                <tr>
                                    <td class="table-title">Mobile</td>
                                    <td>  <?php
                                        echo isset($user['User']['mobile'])?$user['User']['mobile']:'';
                                        ?></td>
                                     <td class="table-title">User type</td>
                                    <td>  <?php
                                        if ($user['User']['user_type'] == 1) { echo 'SuperAdmin'; } else { echo 'User'; }
                                        ?></td>
                                </tr>
                                <tr>
                                    <td class="table-title">Country</td>
                                    <td>  <?php
                                            $user['User']['country'] = 'IN';
                                            
                                            if (array_key_exists($user['User']['country'], $countries) ){
                                                
                                                echo $countries[$user['User']['country']];
                                            } else {
                                                
                                                echo "None";
                                            }
                                        ?></td>
                                     <td class="table-title">Zipcode</td>
                                    <td>  <?php
                                        echo isset($user['User']['zipcode'])?$user['User']['zipcode']:'';
                                        ?></td>
                                </tr>
                                <tr>
                                    <td class="table-title">Address</td>
                                    <td>  <?php
                                        echo isset($user['User']['address'])?$user['User']['address']:'';
                                        ?></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                        
                        
                    </div>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>