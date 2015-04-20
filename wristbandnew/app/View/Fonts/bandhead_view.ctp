<div class="container-fluid cn">
    <div class="row rt ">
        <?php echo $this->element('dashboard/navigation');?>
        <div class="col-sm-8 col-lg-10 col-md-9">
            <?php echo $this->Mysession->flash(); ?>
            <div class="row rr cl">
                <div class="col-md-12 rr ">
                    <div class="ps">
                        <h3 style="padding-left: 10px;padding-top: 10px;"> View Font Style
                        	<ul class="list-inline pull-right">
                            		<li><?php echo $this->Html->link('<i class="fa fa-list"></i> List Font Styles',array('controller'=>'Fonts','action'=>'index', 'bandhead' => true),array('escape'=> false)); ?></li>
                        	</ul>
                        </h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="clearfix"></div>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <tbody>
                                <tr>
                                    <td class="table-title">Name</td>
                                    <td>  <?php
                                        echo  ucwords(isset($font_data['Font']['name']) ? $font_data['Font']['name'] : '');
                                        ?></td>
                                </tr>
                                <?php if (!empty($font_data['Font']['type'])) { ?>
                                <tr>
                                    <td class="table-title">Type</td>
                                    <td> <?php
                                        echo ucwords(isset($font_data['Font']['type']) ? $font_data['Font']['type'] : '');
                                        ?></td>
                                </tr>
                                    <?php } ?>
                                <tr>
                                    <td class="table-title">Image</td>
                                    <td> <?php echo $this->Html->image('fonts/' . $font_data['Font']['image'], array()); ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="table-title">Status</td>
                                    <td> <?php  if ($font_data['Font']['status'] == 1) {
                                        echo 'Activate';
                                    } else {
                                        echo "Deactive";
                                    }?>
                                    </td>
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