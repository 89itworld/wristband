<div class="container-fluid cn">
    <div class="row rt ">
        <?php echo $this->element('dashboard/navigation');?>
        <div class="col-sm-8 col-lg-10 col-md-9">
            <div class="row rr cl">
                <div class="col-md-12 rr ">
                    <div class="ps">
                        <h3 style="padding-left: 10px;padding-top: 10px;"> View Template</h3></div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <tbody>
                                <tr>
                                    <td class="table-title">Title</td>
                                    <td>  <?php
                                        echo  ucwords(isset($page_data['EmailTemplate']['title']) ? $page_data['EmailTemplate']['title'] : '');
                                        ?></td>
                                </tr>
                                <tr>
                                    <td class="table-title">Slug</td>
                                    <td>  <?php
                                        echo  ucwords(isset($page_data['EmailTemplate']['slug']) ? $page_data['EmailTemplate']['slug'] : '');
                                        ?></td>
                                </tr>
                                <tr>
                                    <td class="table-title">Keyword</td>
                                    <td> <?php
                                        echo isset($page_data['EmailTemplate']['subject']) ? $page_data['EmailTemplate']['subject'] : '';
                                        ?></td>
                                </tr>
                                  <?php if(!empty($page_data['EmailTemplate']['description'])) { ?>
                                   <tr>
                                    <td class="table-title">Description</td>
                                    <td> <?php
                                        echo isset($page_data['EmailTemplate']['description']) ? $page_data['EmailTemplate']['description'] : '';
                                        ?></td>
                                </tr>
    <?php } ?>
                                
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