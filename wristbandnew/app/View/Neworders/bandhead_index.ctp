<div class="container-fluid">
            <div class="row rt">
               <?php echo $this->element('dashboard/navigation'); ?>
                <div class="col-sm-8 col-md-9 col-lg-10">
                    <?php echo $this->Mysession->flash(); ?>

                    <div class="row rr cm ">
                        <div class="col-md-12 rr" >
                            <div class="ps">
                            <h3  style="padding-left: 10px;padding-top: 10px;"><i class="fa fa-truck"></i> Manage Orders	
                            </h3></div>
                        </div>
             <?php if(!empty($result)) {?>
                <div class="col-md-12 mm">
                    <div class="table-responsive">
                    <table class="table cl">
                        <thead class="tb">
                            <tr>
                                <th width="7%">S.no</th>
                                <th width="7%"><?php echo $this->Paginator->sort('ProductCategory.name', ' Category Name'); ?></th>
                                <th width="7%"><?php echo $this->Paginator->sort('Product.name', 'Product Name'); ?></th>
                                <th width="7%"><?php echo $this->Paginator->sort('ProductSize.name', 'Product Size'); ?></th>
                                <th width="7%"><?php echo $this->Paginator->sort('ProductStyle.name', 'Product Style'); ?></th>
                                <th width="4%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $i = 1;
                            isset($this->passedArgs['page'])?$SrNos=((($this->passedArgs['page']*10)-10)+$i):$SrNos=$i;
                            foreach ($result as $key => $data) {
                            	//  pr($data); die;
                                ?>
                                <tr class="<?php if($key%2==0){echo 'tt'; }?>">
                                    <td><?php echo $SrNos; ?></td>    
                                    <td><?php echo ucwords($data['ProductCategory']['name']); ?></td>
                                    <td><?php echo ucwords($data['Product']['name']); ?></td>
                                    <td><?php echo ucwords($data['ProductSize']['name']); ?></td>
                                    <td><?php echo ucwords($data['ProductStyle']['name']); ?></td>
    
                                    <td>
                                        <?php 
                                        
                                            echo $this->Html->link('<span class="glyphicon glyphicon-search" style="color: #2997D4;"> </span>',array('controller'=>'Neworders','action'=>'view',base64_encode($data['Order']['id']),'bandhead'=>true),array('escape'=>false,'title'=>"View"));
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
                   <?php } else {
                    echo "<h4 style='color:red; padding-left:2%; padding-top:4%;'>No Record Store</h4>";
                }?>
                    </div>

                </div>
            </div>
        </div>