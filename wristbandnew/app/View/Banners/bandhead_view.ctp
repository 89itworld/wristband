<div class="container-fluid cn" >
    <div class="row rt ">
        <?php echo $this -> element('dashboard/navigation'); ?>
        <div class="col-sm-8 col-lg-10 col-md-9">
            <?php echo $this -> Mysession -> flash(); ?>
            <div class="row rr">
            <div class="row rr cl">
                <div class="col-md-12 rr " >
                    <div class="ps">
                    <h3 style="padding-left: 10px;padding-top: 10px;"> View Banner</h3></div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="col-lg-12">
                    	<div class="clearfix"></div>
                    	<p><strong>Name:</strong> <?php
                                    echo ucwords(isset($banner_data['Banner']['name']) ? $banner_data['Banner']['name'] : '');
                                        ?></p>
                         <p><strong>Banner:</strong> <?php echo $this -> Html -> image('banners/' . $banner_data['Banner']['image'], array('class'=>'img-responsive','style'=>'display:inline;')); ?></p>           
                    </div>
                    </div>
                </div>

            </div>
        </div>
        </div>
    </div>
</div>
<div class="clearfix"></div>