<?php

    /**
     * 
     */
    class Order extends AppModel {
        
        var $name = 'Order';
        
        public $belongsTo  = array(

               'ProductCategory' => array(
                   'className' => 'ProductCategory',
                   'foreignKey' => 'product_category_id'
               ),
               'Product' => array(
                   'className' => 'Product',
                   'foreignKey' => 'product_id'
               ),
               'ProductSize' => array(
                   'className' => 'ProductSize',
                   'foreignKey' => 'product_size_id'
               ),
               'ProductStyle' => array(
                   'className' => 'ProductStyle',
                   'foreignKey' => 'product_style_id'
               ),
               'User' => array(
                   'className' => 'User',
                   'foreignKey' => 'user_id'
               )
           );
        
         var $validate = array(
              'product_category_id' => array(
                'notempty' => array(
                    'rule' => 'notempty',
                    'message' => 'Please select category name.'
                )
            ),
             'product_size_id' => array(
                'notempty' => array(
                    'rule' => 'notempty',
                    'message' => 'Please select product size.'
                )
            ),
             'product_style_id' => array(
                'notempty' => array(
                    'rule' => 'notempty',
                    'message' => 'Please select product style.'
                )
            ),
        );
        
     
        
    }  

?>