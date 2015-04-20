<div class="container-fluid cn">
    <div class="row rt ">
        <?php echo $this->element('dashboard/navigation');?>
        <div class="col-sm-8 col-lg-10 col-md-9">
            <div class="row rr cl">
                <div class="col-md-12 rr ">
                    <div class="ps">
                        <h3 style="padding-left: 10px;padding-top: 10px;"> View Sub Tab</h3></div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <tbody>
                                <tr>
                                    <td class="table-title">Name</td>
                                    <td>  <?php
                                        echo  isset($SubTab_data['SubTab']['name'])?$SubTab_data['SubTab']['name']:'';
                                     ?></td>
                                </tr>
                                <tr>
                                    <td class="table-title">Slug</td>
                                    <td> <?php
                                        echo isset($SubTab_data['SubTab']['slug'])?$SubTab_data['SubTab']['slug']:'';
                                    ?></td>
                                </tr>
                                <tr>
                                    <td class="table-title">Controller</td>
                                    <td> <?php
                                        echo isset($SubTab_data['SubTab']['controller'])?$SubTab_data['SubTab']['controller']:'';
                                    ?></td>
                                </tr>
                                <tr>
                                    <td class="table-title">Action</td>
                                    <td> <?php
                                        echo isset($SubTab_data['SubTab']['action'])?$SubTab_data['SubTab']['action']:'';
                                    ?></td>
                                </tr>
                                <tr>
                                    <td class="table-title">Description</td>
                                    <td> <?php
                                        echo isset($SubTab_data['SubTab']['description'])?$SubTab_data['SubTab']['description']:'';
                                    ?></td>
                                </tr>
                                <tr>
                                    <td class="table-title">Title</td>
                                    <td> <?php
                                        echo isset($SubTab_data['SubTab']['title'])?$SubTab_data['SubTab']['title']:'';
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