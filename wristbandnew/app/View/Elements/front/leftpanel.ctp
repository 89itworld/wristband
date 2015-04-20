<div class="col-lg-3 col-md-3 col-sm-3 rate">
      <?php echo $this->Html->image('writband.com.png',array('alt'=>"rate",'class'=>"img-responsive center-block hidden-xs")); ?>
    <ul class="list-group">

        <li class="list-group-item list-group-head">OTHER LINKS</li>

        <li class="list-group-item"><?php echo $this->Html->image('Po-Orders.png',array('alt'=>"icon")); ?><?php echo $this->Html->link('PO ORDERS', array('controller'=>'pages', 'action'=>'index', 'slug' => "po_orders"));?></li>

        <li class="list-group-item"><a href="#"><?php echo $this->Html->image('video1.png',array('alt'=>"icon")); ?> VIDEO TESTIMONIALS </a>
        </li>

        <li class="list-group-item"><a href="#"><?php echo $this->Html->image('pic.png',array('alt'=>"icon")); ?> PICTURE GALLERY </a></li>

        <li class="list-group-item"><?php echo $this->Html->image('sign1.png',array('alt'=>"icon", 'class'=>"icon-padding")); ?><?php echo $this->Html->link('FAQ', array('controller'=>'pages', 'action'=>'index', 'slug' => "faq"));?></li>


    </ul>
     <?php echo $this->Html->image('fb_likers.png',array('alt'=>"", 'class'=>"img-responsive hidden-xs")); ?>
</div>