<?php
/**
 * Created by IntelliJ IDEA.
 * User: Ankur Chauhan
 * Date: 5/2/15
 * Time: 10:58 AM
 * To change this template use File | Settings | File Templates.
 */
App::uses('AppController', 'Controller');
App::uses('Sanitize', 'Utility');
class PricesController extends AppController
{


    public $components = array('RequestHandler', 'FileWrite');

    // before filter function of Users Controller
    public function beforeFilter()
    {
        parent::beforeFilter();
        $this->Auth->allow('get_cat_product', 'get_cat_sizes', 'get_cat_styles', 'get_fill_items','wristband');
    }

    /**
     * This function use for product category Listing  in admin panel
     */
    function bandhead_index()
    {
        $conditions = array();
        $this->paginate = array(
            'recursive' => 0,
            'limit' => LIMIT,
            'conditions' => $conditions,
            'group' => array('product_size_id', 'product_style_id'),
            'order' => array(
                'Price.updated' => 'DESC'
            )
        );
        $result = $this->paginate('Price');
        //pr($result);
        $this->set('result', $result);
    }

    /**
     * This function use for Price category add  in admin panel
     */
    function bandhead_add()
    {
        $this->loadModel('ProductCategory');
        $this->set("product_cat_list", $this->ProductCategory->find("list", array("conditions" => array("ProductCategory.status" => 1), 'order' => 'ProductCategory.name ASC')));
        
        if ($this->request->is('post')) {
            $this->Price->set($this->request->data);
            $this->request->data = Sanitize::clean($this->request->data, array('encode' => false));
            if ($this->Price->validates()) {
                $this->loadModel("Price");
                $result = $this->Price->find("first", array('conditions' => array('Price.product_category_id' => $this->request->data["Price"]["product_category_id"], 'Price.product_id' => $this->request->data["Price"]["product_id"], 'Price.product_size_id' => $this->request->data["Price"]["product_size_id"], 'Price.product_style_id' => $this->request->data["Price"]["product_style_id"],)));
                if (empty($result)) {
                    foreach ($this->request->data["MultiplePrice"] as $record) {
                        $this->request->data["Price"]["price"] = $record["price"];
                        $this->request->data["Price"]["qty"] = $record["qty"];
                        $this->request->data["Price"]["free_qty"] = $record["free_qty"];
                        $this->Price->create();
                        if ($this->Price->save($this->request->data)) {
                            $this->Session->write('flash', array(ADD_RECORD, 'success'));

                        } else {
                            $this->Session->write('flash', array(ERROR_MSG, 'failure'));
                        }
                    }

                } else {
                    $this->Session->write('flash', array("You have been added price for this product, Now please update price.", 'failure'));
                }
                $this->redirect(array('controller' => 'Prices', 'action' => 'index'));
            }
        }
    }

    /**
     *This function use for Price  edit  in admin panel
     * @param string $category_id
     */
    function bandhead_edit($product_id = "")
    {
        $id = base64_decode($product_id);
        
        $this->loadModel('Price');
        $data = $this->Price->find('first', array('conditions' => array('Price.id' => $id)));
        
        $this->set("data", $data);
        
        $this->Price->unBindModel(array("belongsTo" => array("ProductCategory", "Product", 'ProductSize', "ProductStyle")));
        
        $result = $this->Price->find('all', array('conditions' => array('Price.product_category_id' => $data['Price']['product_category_id'], 'Price.product_id' => $data['Price']['product_id'], 'Price.product_size_id' => $data['Price']['product_size_id'], 'Price.product_style_id' => $data['Price']['product_style_id'])));
        
        //pr($result);die;
        if (!empty($result)) {
            if (!empty($this->request->data)) {
                //pr($this->data); die;
                $this->request->data = Sanitize::clean($this->request->data, array('encode' => false));
                $this->Price->set($this->request->data);
                if ($this->Price->validates($this->request->data)) {
                    //$result = $this->Price->find("count", array('conditions' => array('Price.product_category_id' => $this->request->data["Price"]["product_category_id"], 'Price.product_id' => $this->request->data["Price"]["product_id"], 'Price.product_size_id' => $this->request->data["Price"]["product_size_id"], 'Price.product_style_id' => $this->request->data["Price"]["product_style_id"],)));
                  //pr($result);die;

                    foreach ($this->request->data["MultiplePrice"] as $record) {
                        $this->request->data["Price"]["id"] = $record["id"];
                        $this->request->data["Price"]["price"] = $record["price"];
                        $this->request->data["Price"]["qty"] = $record["qty"];
                        $this->request->data["Price"]["free_qty"] = $record["free_qty"];
                        $this->Price->create();
                        if ($this->Price->save($this->request->data)) {
                            $this->Session->write('flash', array(EDIT_RECORD, 'success'));

                        } else {
                            $this->Session->write('flash', array(ERROR_MSG, 'failure'));
                        }
                    }

                    $this->redirect(array('controller' => 'Prices', 'action' => 'index'));
                }
            }
            $this->set("result",$result);        }
        else {
            $this->redirect(array('controller' => 'Prices', 'action' => 'index'));
        }
    }


    public function bandhead_view($price_id)
    {
        $id = base64_decode($price_id);
        $this->loadModel('Price');
        $product_data = $this->Price->find('first', array('conditions' => array('Price.id' => $id)));
        $result = $this->Price->find('all', array('conditions' => array('Price.product_category_id' => $product_data['Price']['product_category_id'], 'Price.product_id' => $product_data['Price']['product_id'], 'Price.product_size_id' => $product_data['Price']['product_size_id'], 'Price.product_style_id' => $product_data['Price']['product_style_id'])));
        if (!empty($result)) {
            $this->set('price_data', $result);
        }
        else {
            $this->redirect(array('controller' => 'Prices', 'action' => 'index'));
        }
    }

    /**
     * @return void
     */
    function get_cat_product()
    {
        $this->autoRender = false;
        $cat_id = $this->request->data['cat_id'];
        $this->loadModel('Product');
        $product_list = $this->Product->find('list', array('conditions' => array('Product.product_category_id' => $cat_id, 'Product.status' => 1), 'fields' => array('Product.id', 'Product.name')));
        $options = "<option value=''>--Select Product--</option>";
        foreach ($product_list as $key => $rs) {
            $options .= "<option value=" . $key . " >" . $rs . "</option>";
        }
        echo $options;
    }

    function get_cat_sizes()
    {
        $this->autoRender = false;
        $cat_id = $this->request->data['cat_id'];
        $this->loadModel('ProductSize');
        $product_list = $this->ProductSize->find('list', array('conditions' => array('ProductSize.product_category_id' => $cat_id, 'ProductSize.status' => 1), 'fields' => array('ProductSize.id', 'ProductSize.name')));
        $options = "<option value=''>--Select Size--</option>";
        foreach ($product_list as $key => $rs) {
            $options .= "<option value=" . $key . " >" . $rs . "</option>";
        }
        echo $options;
    }

    function get_cat_styles()
    {
        $this->autoRender = false;
        $cat_id = $this->request->data['cat_id'];
        $this->loadModel('ProductStyle');
        $product_list = $this->ProductStyle->find('list', array('conditions' => array('ProductStyle.product_category_id' => $cat_id, 'ProductStyle.status' => 1), 'fields' => array('ProductStyle.id', 'ProductStyle.name')));
        $options = "<option value=''>--Select Style--</option>";
        foreach ($product_list as $key => $rs) {
            $options .= "<option value=" . $key . " >" . $rs . "</option>";
        }
        echo $options;
    }

    function get_fill_items()
    {

        $this->autoRender = false;
        $cat_id = $this->request->data['cat_id'];
        $this->loadModel('QuantityPrice');
        $item_list = $this->QuantityPrice->find('list', array('conditions' => array('QuantityPrice.product_category_id' => $cat_id, 'QuantityPrice.status' => 1), 'fields' => array('QuantityPrice.id', 'QuantityPrice.name')));
        $this->set('item_list', $item_list);
        $this->render("/Elements/dashboard/fillQuantity");
    }

    public function wristband(){
        $this->layout="front";
        $this->loadModel("ProductCategory");
        $this->loadModel("Product");
        $this->Product->bindModel(array('hasMany' =>array('Price')), true);
        $this->Product->unbindModel(array('belongsTo' =>array('ProductCategory')), true);
        //$product_result=$this->Product->find("all",array('fields'=>array('Product.name','Product.image'),'conditions'=>array('Product.product_category_id'=>1)));
        $prod_price=$this->ProductCategory->get_wristband_category_price();
       // pr($prod_price);
        $this->set("prod_price",$prod_price);
    }
    
    
}?>