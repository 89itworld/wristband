<?php

    /**
     * Fetching dummy data for production prices
     */
    class ProductionDummyPrice extends AppModel {
        
        var $name = 'ProductionDummyPrice';
        
        public $belongsTo = array(
            'ProdDay' => array(
                'className' => 'ProdDay'
            )
        );
            
            
    }
    

?>