<div class="container-fluid cn" >
    <div class="row rt ">
        <?php echo $this->element('dashboard/navigation');?>
        <div class="col-sm-8 col-lg-10 col-md-9 col-xs-12">
            <?php echo $this->Mysession->flash(); ?>
            <div class="row rr cl">
                <div class="col-md-12 rr " >
                    <div class="ps">
                    <h3 style="padding-left: 10px;padding-top: 10px;"> View Gallery Image</h3></div>
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
                                        echo  ucwords(isset($gallery_data['Gallery']['name']) ? $gallery_data['Gallery']['name'] : '');
                                        ?></td>
                                </tr>

                                <tr>
                                    <td class="table-title">Image</td>
                                    <td> <?php echo $this->Html->image('gallery/small/' . $gallery_data['Gallery']['image'], array()); ?>
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