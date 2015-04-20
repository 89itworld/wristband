<?php

    /**
     * Fetching dummy data for shipping prices
     */
    class ShipTimeDummyPrice extends AppModel {
        
        var $name = 'ShipTimeDummyPrice';
        
        public $belongsTo = array(
            'MetaDay' => array(
                'className' => 'MetaDay'
            )
        );
            
            
    }
    

?>