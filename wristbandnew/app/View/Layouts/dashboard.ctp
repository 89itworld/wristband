<?php
 
    echo $this->element('dashboard/header');
    echo $this->fetch('content');
    //echo $this->element('sql_dump');
    echo $this->element('dashboard/footer');
?>