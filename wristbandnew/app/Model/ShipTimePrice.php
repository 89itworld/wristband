<?php

class ShipTimePrice extends AppModel
{
    var $name = 'ShipTimePrice';
    
    public $belongsTo  = array(
    
        'ProductCategory' => array(
            'className' => 'ProductCategory',
            'foreignKey' => 'product_category_id'
        ),
        'MetaDay' => array(
            'className' => 'MetaDay',
            'foreignKey' => 'meta_day_id'
        )
    );


    var $validate = array(

        'product_category_id' => array(
            'notempty' => array(
                'rule' => 'notempty',
                'message' => 'Please select category name.'
            )
        ),
        'meta_day_id' => array(
            'notempty' => array(
                'rule' => 'notempty',
                'message' => 'Please select a day.'
            )
        ),

    );



}