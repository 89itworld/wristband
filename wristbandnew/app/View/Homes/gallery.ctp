<?php echo $this->Html->css(array('front/prettyPhoto')); ?>
<div class="row">
    <?php echo $this->Element('front/leftpanel'); ?>
    <div class="col-lg-9 col-md-9 col-sm-9 right_content">
        <h1>Gallery</h1>
        <div class="gallery">
            
            <div class="row">
                <div class="col-lg-12 thumbnails">
            
            <?php   foreach ($gallery as $key => $value) {

                            if ($key % 4 == 0) {
                                
                                echo '</div></div><div class="row"><div class="col-lg-12 thumbnails">';
                            }
            ?>
                        
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 col-my-12">
                            <?php
                                
                                $img = $this->Html->image('gallery/small/' . $value['Gallery']['image'], array('title' => 'Image Title'));
                                echo $this->Html->tag('a', $img, array('href' => Router::Url('/img/').'gallery/'. $value['Gallery']['image'], 'class' => 'thumbnail gallery-grid', 'rel' => 'divghtbox[gallery]', 'escape' => false)); 
                            ?>    
                        </div>
            <?php    }  ?>

                </div>
            </div>
            
            
            <div class="pagination remove-margin" style="float:right;">
            
                <?php
                
                if($this->Paginator->counter(array('format' => '%pages%'))>1)   {
                      echo $prev_link = '« ' . $this->paginator -> prev('Previous');    ?>
        
                    &nbsp;<?php echo $this -> Paginator -> numbers(); ?>&nbsp;
         
                    <?php echo $next_link = $this->paginator -> next('Next'). ' »';?>
        
                <?php } ?>
                
            </div>
            
    </div>
</div>

<?php echo $this->Html->script(array('front/jquery.prettyPhoto'));?>
<script>
    $(document).ready(function() {
        $("[rel^='divghtbox']").prettyPhoto({
            theme:'pp_default'
        });
    });
</script>