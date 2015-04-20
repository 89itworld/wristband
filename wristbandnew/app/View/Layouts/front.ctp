<!DOCTYPE html>
<html lang="en">
<head>
    <?php echo $this->Html->charset(); ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Wristband</title>

    <?php
        echo $this->Html->meta('img/favicon.png','/img/favicon.png',array('type' => 'icon'));
        echo $this->Html->css(array('font-awesome.min', 'front/bootstrap', 'front/main'),array('media'=>'screen'));
        echo $this->Html->script(array('jquery.v1.11.0', 'bootstrap.min'));
    ?>


</head><!--/head-->

<body>

<?php echo $this->element('front/header'); ?>
        
        
        <?php echo $this->Session->flash(); ?>
        <?php echo $this->fetch('content'); ?>



<?php echo $this->element('front/footer'); ?>

</body>
</html>