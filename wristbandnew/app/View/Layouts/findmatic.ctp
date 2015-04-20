<?php echo $this->element('header'); ?>
        
        
        <?php echo $this->Session->flash(); ?>
        <?php echo $this->fetch('content'); ?>

<script>
    function remove_msg() {
        
        $(".all-msg").remove();
    }
    setInterval(remove_msg, 6000);
</script>

<?php echo $this->element('footer'); ?>