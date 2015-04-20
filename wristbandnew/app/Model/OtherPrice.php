<?php
	class OtherPrice extends AppModel{
		var $name="OtherPrice";
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
		   'QuantityPrice' => array(
               'className' => 'QuantityPrice',
               'foreignKey' => 'quantity_id'
           )
       );
	}
?>