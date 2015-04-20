<div class="container-fluid">
            <div class="row rt">
               <?php echo $this->element('dashboard/navigation'); ?>
                <div class="col-sm-8 col-md-9 col-lg-10">
                    <?php echo $this->Mysession->flash(); ?>
                    <div class="row rr cm ">
                        <div class="col-md-12 rr" >
                            <div class="ps">
                            <h3  style="padding-left: 10px;padding-top: 10px;"><i class="fa fa-pie-chart"></i> Manage Products
                            <ul class="list-inline pull-right">
                            	<li><?php echo $this->Html->link('<i class="fa fa-plus-circle"></i> Add Product',array('controller'=>'Products','action'=>'add', 'bandhead' => true),array('escape'=>false)); ?></li>
                            </ul>	
                            </h3></div>
                        </div>
<?php echo $this->Form->create('Color', array('url' => array('controller' => 'Colors', 'action' => 'index', 'bandhead'=>true))); ?>

<?php echo $this->Form->end(); ?>              

  
                <div class="col-md-12 mm">
                    <div class="table-responsive">
                    <table class="table cl">
                        <thead class="tb">
                            <tr>
                                <th width="7%">S.no</th>
                                <th width="7%"><?php echo $this->Paginator->sort('ProductCategory.name', ' Category Name'); ?></th>
                                <th width="7%"><?php echo $this->Paginator->sort('name', 'Name'); ?></th>
                                <th width="7%"><?php echo $this->Paginator->sort('slug', 'Slug'); ?></th>
                                <th width="7%"><?php echo $this->Paginator->sort('image', 'Icon'); ?></th>
                                <th width="7%">Status</th>
                                <th width="4%">Action</th>
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
                                if($data['Product']['status']==0){
                                    $action='activate';
                                    $user_status='Deactive';
                                    $title='Active';
                                    $class='glyphicon glyphicon-remove';
                                    $color='#ef6365;';
                                }
                                ?>
                                <tr class="<?php if($key%2==0){echo 'tt'; }?>">
                                <td><?php echo $SrNos; ?></td>    
                                <td><?php echo ucwords($data['ProductCategory']['name']); ?></td>
                                <td><?php echo ucwords($data['Product']['name']); ?></td>
                                <td><?php echo $data['Product']['slug']; ?></td>
                                <td> <?php echo $this->Html->image('ProductIcon/'. $data['Product']['image'], array('style' => 'width:50px;height:50px;')); ?></td>
                                <td><?php echo $user_status; ?></td>
                                <td>
                                    <?php 
                                    
                                        echo $this->Html->link('<span class="'.$class.'" style="color: '.$color.' "> </span>',array('controller'=>'Products','action'=>$action,base64_encode($data['Product']['id']),'bandhead'=>true),array('escape'=>false,'title'=>$title)).' ';
                                        echo $this->Html->link('<span class="glyphicon glyphicon-search" style="color: #2997D4;"> </span>',array('controller'=>'Products','action'=>'view',base64_encode($data['Product']['id']),'bandhead'=>true),array('escape'=>false,'title'=>"View")).' ';
                                        echo $this->Html->link('<span class="glyphicon glyphicon-pencil" style="color: #FFCC00;"> </span>',array('controller'=>'Products','action'=>'edit',base64_encode($data['Product']['id']),'bandhead'=>true),array('escape'=>false,'title'=>"edit"));
                                    ?>
                                </td>
                                </tr>
                           <?php $SrNos++; }?>
                        </tbody>
                    </table>
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