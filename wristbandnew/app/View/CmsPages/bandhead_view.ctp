<div class="container-fluid cn">
    <div class="row rt ">
        <?php echo $this->element('dashboard/navigation');?>
        <div class="col-sm-8 col-lg-10 col-md-9">
            <div class="row rr cl">
                <div class="col-md-12 rr ">
                    <div class="ps">
                        <h3 style="padding-left: 10px;padding-top: 10px;"> View Product</h3></div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <tbody>
                                <tr>
                                    <td class="table-title">Title</td>
                                    <td>  <?php
                                        echo  ucwords(isset($page_data['CmsPage']['title']) ? $page_data['CmsPage']['title'] : '');
                                        ?></td>
                                </tr>
                                <tr>
                                    <td class="table-title">Slug</td>
                                    <td>  <?php
                                        echo  ucwords(isset($page_data['CmsPage']['slug']) ? $page_data['CmsPage']['slug'] : '');
                                        ?></td>
                                </tr>
                                <tr>
                                    <td class="table-title">Keyword</td>
                                    <td> <?php
                                        echo isset($page_data['CmsPage']['keyword']) ? $page_data['CmsPage']['keyword'] : '';
                                        ?></td>
                                </tr>
                                  <?php if(!empty($page_data['CmsPage']['description'])) { ?>
                                   <tr>
                                    <td class="table-title">Description</td>
                                    <td> <?php
                                        echo isset($page_data['CmsPage']['description']) ? $page_data['CmsPage']['description'] : '';
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