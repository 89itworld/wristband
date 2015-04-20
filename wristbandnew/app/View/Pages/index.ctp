<div class="row">
    <?php echo $this->element('front/leftpanel'); ?>
    <div class="col-lg-9 col-md-9 col-sm-9">

        <div class="right_content">

            <?php

            if (!empty($result["CmsPage"]["description"])) {
                echo $result["CmsPage"]["description"];
            } else {
                echo"<h1>Page not found</h1>";
            }

            ?>
        </div>
    </div>
</div>