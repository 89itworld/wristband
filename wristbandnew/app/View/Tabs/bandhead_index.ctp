<div class="container-fluid">
            <div class="row rt">
               <?php echo $this->element('dashboard/navigation'); ?>
                <div class="col-sm-8 col-md-9 col-lg-10">
                    <?php echo $this->Mysession->flash(); ?>
                    <div class="row rr cm ">
                        <div class="col-md-12 rr" >
                            <div class="ps">
                            <h3  style="padding-left: 10px;padding-top: 10px;"><i class="fa fa-support"></i> Manage Tabs
                            <ul class="list-inline pull-right">
                            	<li><?php echo $this->Html->link('<i class="fa fa-plus-circle"></i> Add Tab',array('controller'=>'Tabs','action'=>'add', 'bandhead' => true),array('escape'=>false)); ?></li>
                            </ul>
                            </h3></div>
                        </div>
                <?php echo $this->Form->create('Tab', array('url' => array('controller' => 'Tabs', 'action' => 'index', 'bandhead'=>true))); ?>

                    <div class="col-md-12 mk">
                        <div class="col-md-4">
                            <div class="col-md-5"  style="padding-top: 7px">
                               Enter Name
                            </div>
                            <div class="col-md-7">
                                <?php echo $this->Form->input('search', array('type' => 'text', 'id' => 'search_code', 'label' => false, "div" => false, 'required' => false, 'class' => 'search_required form-control', 'maxlength' => 200)); ?>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="col-md-3"  style="padding-top: 7px">
                                Status
                            </div>
                            <div class="col-md-8">
                                <?php
                                $status=array("1"=>'Active',"0"=>'Inactive');
                                echo $this->Form->input('status', array("options"=>$status,"empty"=>"----- Select Status -----",'type' => 'select', 'label' => false, 'required' => false, 'class' => 'country_required form-control'));
                                ?>
                            </div>
                        </div>
                        <div class="col-md-3 ">
                            <input type="submit" value="Search" class="btn btn-primary pull-right">
                        </div>
                    </div>

                <?php echo $this->Form->end(); ?>


                <div class="col-md-12 mm">
                    <div class="table-responsive">
                    <table class="table cl">
                        <thead class="tb">
                            <tr>
                                <th width="10%">S.no</th>
                                <th width="5%"><?php echo $this->Paginator->sort('Tab.name', 'Name'); ?></th>
                                <th width="5%"><?php echo $this->Paginator->sort('Tab.slug', 'Slug'); ?></th>
                                <th width="5%"><?php echo $this->Paginator->sort('Tab.controller', 'Controller'); ?></th>
                                <th width="5%"><?php echo $this->Paginator->sort('Tab.action', 'Action'); ?></th>
                                <th width="5%">Status</th>
                                <th width="3%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            isset($this->passedArgs['page'])?$SrNos=((($this->passedArgs['page']*10)-10)+$i):$SrNos=$i;
                            foreach ($result as $key => $data) {
                                $action='deactivate';
                                $user_status='Active';
                                $title='DeActive';
                                $class='glyphicon glyphicon-ok';
                                $color='#3D8137;';
                                if($data['Tab']['status']==0){
                                    $action='activate';
                                    $user_status='Deactive';
                                    $title='Active';
                                    $class='glyphicon glyphicon-remove';
                                    $color='#ef6365;';
                                }
                                ?>
                                <tr class="<?php if($key%2==0){echo 'tt'; }?>">
                                <td><?php echo $SrNos; ?></td>
                                <td><?php echo $data['Tab']['name']; ?></td>
                                <td><?php echo $data['Tab']['slug']; ?></td>
                                <td><?php echo $data['Tab']['controller']; ?></td>
                                <td><?php echo $data['Tab']['action']; ?></td>
                                <td><?php echo $user_status; ?></td>
                                <td>
                                    <?php

                                        echo $this->Html->link('<span class="'.$class.'" style="color: '.$color.' "> </span>',array('controller'=>'Tabs','action'=>$action,base64_encode($data['Tab']['id']),'bandhead'=>true),array('escape'=>false,'title'=>$title)).' ';
                                        echo $this->Html->link('<span class="glyphicon glyphicon-search" style="color: #2997D4;"> </span>',array('controller'=>'Tabs','action'=>'view',base64_encode($data['Tab']['id']),'bandhead'=>true),array('escape'=>false,'title'=>"View")).' ';
                                        echo $this->Html->link('<span class="glyphicon glyphicon-pencil" style="color: #FFCC00;"> </span>',array('controller'=>'Tabs','action'=>'edit',base64_encode($data['Tab']['id']),'bandhead'=>true),array('escape'=>false,'title'=>"edit"));
                                    ?>
                                </td>
                                </tr>
                           <?php $SrNos++; }?>
                        </tbody>
                    </table>

                   <?php

                        if (empty($result)) {
                            echo "<br /><h4 style='color: red; padding-left: 4%;'>No Record Store</h4>";
                        }

                    ?>

            <div class="pagination remove-margin" style="float:right;">

                <?php

                if($this->Paginator->counter(array('format' => '%pages%'))>1){
                      echo $prev_link = '« ' . $this->paginator -> prev('Previous');?>

                    &nbsp;<?php echo $this -> Paginator -> numbers(); ?>&nbsp;

                    <?php echo $next_link = $this->paginator -> next('Next'). ' »';?>

                <?php }?>

            </div>
                    </div>
                </div>

                <?php echo $this->element('legend'); ?>

                    </div>
                </div>
            </div>
        </div>