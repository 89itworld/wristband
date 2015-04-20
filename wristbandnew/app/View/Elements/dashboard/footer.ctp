<div class="footer">
            2015 Wristbands, All rights are reserved
</div>
        <?php echo $this->Html->script(array('bootstrap.min')); ?>
        <script>
    function remove_msg() {
        
        $(".all-msg").remove();
    }
    setInterval(remove_msg, 6000);
</script>
    </body>
</html>