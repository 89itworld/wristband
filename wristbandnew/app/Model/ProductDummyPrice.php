<?php

    /**
     * Fetching dummy data for production prices
     */
    class ProductDummyPrice extends AppModel {
        
        var $name = 'ProductDummyPrice';
        
        public $belongsTo = array(
            'ProdDay' => array(
                'className' => 'ProdDay'
            )
        );
            
            
    }
    

?>