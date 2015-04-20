<!DOCTYPE html>
<html>
    <head>
        <title>Wristbands</title>
        <?php echo $this->Html->charset(); ?>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <?php
            echo $this->Html->meta('img/favicon.png','/img/favicon.png',array('type' => 'icon'));
            echo $this->Html->css(array('buzz', 'bootstrap.min', 'font-awesome.min', 'stylesheet'),array('media'=>'screen'));
            echo $this->Html->script(array('jquery.min', 'jquery.validate1.13.1.min'));
        ?>

    </head>
    
    <body>
    
    <div class="header he" style="background-color: #3FB8E5">
    
            <?php echo $this->Html->image('findmatic/logo.png', array('class' => "img-responsive center-block", 'style' => 'text-align: center; margin-bottom:20px;', 'alt' => 'logo','width'=>'105')); ?>
        
    </div>
