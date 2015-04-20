<div class="container-fluid cn">
    <div class="row rt ">
        <?php echo $this->element('dashboard/navigation');?>
        <div class="col-sm-8 col-lg-10 col-md-9">
            <div class="row rr cl">
                <div class="col-md-12 rr ">
                    <div class="ps">
                        <h3 style="padding-left: 10px;padding-top: 10px;"> View Domain</h3></div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <tbody>
                                <tr>
                                    <td class="table-title">Name</td>
                                    <td>  <?php
                                        echo  isset($Domain_data['Domain']['name'])?$Domain_data['Domain']['name']:'';
                                     ?></td>
                                </tr>
                                <tr>
                                    <td class="table-title">Value</td>
                                    <td> <?php
                                        echo isset($Domain_data['Domain']['domain'])?$Domain_data['Domain']['domain']:'';
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