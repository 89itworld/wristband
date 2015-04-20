<?php
/**
 * Created by IntelliJ IDEA.
 * User: Ankur Chauhan
 * Date: 3/2/15
 * Time: 11:33 AM
 * To change this template use File | Settings | File Templates.
 */

class Price extends AppModel
{
    var $name = 'Price';
    var $useTable = 'product_prices';
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

   /* function get_wristband_category_price(){
          $this->unbindModel(array('belongsTo' => array('ProductCategory','ProductSize','ProductStyle')), true);
          $result=$this->find("all",array('conditions'=>array('Price.product_category_id'=>1)));
       // $result=$this->findById(1);
           return $result;
    }*/


}
