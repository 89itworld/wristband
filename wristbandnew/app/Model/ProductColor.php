<?php

class ProductColor extends AppModel
{
    var $name = 'ProductColor';
      
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
           )
       );



    var $validate = array(
        'name' => array(
            'notempty' => array(
                'rule' => 'notempty',
                'message' => 'Please enter product name.',
                 "last" => true
            ), 'rule2' => array(
                'rule' => '/^[a-zA-Z&, ]*$/',
                'message' => 'Only letters and spaces and (&,) are allowed'
            )
        ),
         'product_category_id' => array(
            'notempty' => array(
                'rule' => 'notempty',
                'message' => 'Please select category name.',
                 "last" => true
            )
        )

    );


}