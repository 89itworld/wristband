<?php

class QuantityPrice extends AppModel
{
    var $name = 'QuantityPrice';
    var $useTable = 'quantities';
    public $belongsTo  = array(

           'ProductCategory' => array(
               'className' => 'ProductCategory',
               'foreignKey' => 'product_category_id'
           )
           
       );


    var $validate = array(
          'product_category_id' => array(
            'notempty' => array(
                'rule' => 'notempty',
                'message' => 'Please select category name.'
               )
           ),
           'name' => array(
            'notempty' => array(
                'rule' => 'notempty',
                'message' => 'Please provide quantity name.'
               )
           )
        
    );


}