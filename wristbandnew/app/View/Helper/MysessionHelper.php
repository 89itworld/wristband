<?php
    class MysessionHelper extends SessionHelper {  
        var $__active = true;
        public $helpers=array('Html');
        function __construct($base = null) {  
            // copied from the parent SessionHelper  
            if (!defined('AUTO_SESSION') || AUTO_SESSION === true) {  
                parent::__construct($base, false);  
            } else {  
                $this->__active = false;
            }  
        }  
        function flash($key = '', $attrs = array()) {
            $output = '';
            $data = parent::read('flash');
            
            if(isset($_SESSION['flash'])){  unset($_SESSION['flash']);   }
            
            if(!empty($data[0])) {
                switch($data[1]) {
                    case 'success':  
                        // print out a div with a success class  
                        $output .= '<div class="success all-msg">';
                        break;  
                    case 'failure':  
                        // print out a div with a failure class  
                        $output .= '<div class="error_flash all-msg">';
                        break;  
                    case 'warning':  
                        // print out a default flash class  
                        $output .= '<div class="exclamation all-msg">';
                        break;
                    case 'notice':  
                        // print out a default flash class  
                        $output .= '<div class="information all-msg">';
                        break;
                }  
                // save the flash message with the closing div  
                $output .='<p>'.$data[0].'</p>'.$this->Html->link($this->Html->image("admin/cross-ico.png",array()),"javascript://void(0);",array("escape"=>false,"onclick"=>"remove_msg()","id"=>"rmv_message")).'<div class="clearfix"> </div></div>';
            }  
            return $output;
        }  
    }  
?>
