<?php
/**
 * 
 * Add Color options for products 
 * 
 *
 */
App::uses('AppController', 'Controller');
App::uses('Sanitize', 'Utility');
class ProductColorsController extends AppController
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
            //'group' => array('product_size_id', 'product_style_id'),
            'order' => array(
                'ProductColor.updated' => 'DESC'
            )
        );
        $result = $this->paginate('ProductColor');
        //pr($result); die;        
        $this->set('result', $result);
    }

    /**
     * This function use for ProductColor category add  in admin panel
     */
    function bandhead_add()
    {
        $this->loadModel('ProductCategory');
        $this->set("product_cat_list", $this->ProductCategory->find("list", array("conditions" => array("ProductCategory.status" => 1), 'order' => 'ProductCategory.name ASC')));
        
        if ($this->request->is('post')) {
            
            $this->ProductColor->set($this->request->data);
            $this->request->data = Sanitize::clean($this->request->data, array('encode' => false));
            if ($this->ProductColor->validates()) {
                //pr($this->request->data);
                $this->loadModel("ProductColor");
                $result = $this->ProductColor->find("first", array('conditions' => array('ProductColor.product_category_id' => $this->request->data["ProductColor"]["product_category_id"], 'ProductColor.product_id' => $this->request->data["ProductColor"]["product_id"], 'ProductColor.product_size_id' => $this->request->data["ProductColor"]["product_size_id"], 'ProductColor.product_style_id' => $this->request->data["ProductColor"]["product_style_id"], 'ProductColor.name' => $this->request->data["ProductColor"]["name"])));
                //pr($result); die;
                if (empty($result)) {
                    
                    if(count($this->data['ProductColor']['hex_value']) > 1){
                    
                        $this->request->data['ProductColor']['hex_value'] = implode(',', array_filter($this->data['ProductColor']['hex_value']));
                    }
                    
                    $file = $this->request->data["ProductColor"]["image"];
                    
                    if (!empty($file["name"])) {
                        $filename = $this->FileWrite->_save_image($this->request->data["ProductColor"]['image'], PROD_CLR_IMAGE_PATH);
                        $this->request->data["ProductColor"]["image"] = $filename;
                        if ($this->ProductColor->save($this->request->data)) {
                            $this->Session->write('flash', array(ADD_RECORD, 'success'));

                        } else {
                            $this->Session->write('flash', array(ERROR_MSG, 'failure'));
                        }
                    } else {
                        
                        $this->Session->write('flash', array('Please provide product image.', 'failure'));
                    }
                } else {
                    $this->Session->write('flash', array("You have added color for this product, Now please update color.", 'failure'));
                }
                $this->redirect(array('controller' => 'ProductColors', 'action' => 'index'));
            }
        }
    }

    /**
     *This function use for ProductColor  edit  in admin panel
     * @param string $category_id
     */
    function bandhead_edit($product_id = "")
    {
        $id = base64_decode($product_id);
        
        $this->loadModel('ProductColor');
        $data = $this->ProductColor->find('first', array('conditions' => array('ProductColor.id' => $id)));
        
        $this->set("data", $data);
        
        $this->ProductColor->unBindModel(array("belongsTo" => array("ProductCategory", "Product", 'ProductSize', "ProductStyle")));
        
        $result = $this->ProductColor->find('first', array('conditions' => array('ProductColor.product_category_id' => $data['ProductColor']['product_category_id'], 'ProductColor.product_id' => $data['ProductColor']['product_id'], 'ProductColor.product_size_id' => $data['ProductColor']['product_size_id'], 'ProductColor.product_style_id' => $data['ProductColor']['product_style_id'])));
        
        //pr($result);die;
        if (!empty($result)) {
            if (!empty($this->request->data)) {

                if(count($this->data['ProductColor']['hex_value']) > 1){
                    
                    $this->request->data['ProductColor']['hex_value'] = implode(',', array_filter($this->data['ProductColor']['hex_value']));
                }
                    
                //pr($this->request->data);die;
                $file = $this->request->data["ProductColor"]["image"];
                
                if (!empty($file["name"])) {

                    $filename = $this->FileWrite->_save_image($this->request->data["ProductColor"]['image'], PROD_CLR_IMAGE_PATH);

                    // Delete previous image link

                    $path = WWW_ROOT . DS . PROD_CLR_IMAGE_PATH . $this->request->data['ProductColor']['old_image'];
                    $delFile = new File($path, false, 0777);
                    $delFile->delete();

                    $this->request->data["ProductColor"]["image"] = $filename;
                } else {

                    $this->request->data["ProductColor"]["image"] = $this->request->data["ProductColor"]["old_image"];
                    $this->ProductColor->validator()->remove('image');
                }
                unset($this->request->data["ProductColor"]["old_image"]);
                //pr($this->request->data); die;
                $id = $this->request->data['ProductColor']['id'];
                
                foreach ($this->data['ProductColor'] as $key => $value) {
                    //echo $key;
                    //pr($result['ProductColor']);
                    if (in_array($key, $result['ProductColor']) && $key != 'old_image' ) {
                        
                        if ($value == $result['ProductColor'][$key]) {
                            
                            unset($this->request->data['ProductColor'][$key]);
                        }
                    } 
                }
    

                //pr($id);
                //pr($this->request->data);die;
                
                if (!empty($this->request->data['ProductColor'])) {
                    
                    $this->request->data = Sanitize::clean($this->request->data, array('encode' => false));
                        
                        $this->request->data['ProductColor']['id'] = $id;
                        //pr($this->request->data);
                        //die;
                        if ($this->ProductColor->save($this->request->data, FALSE)) {
                            $this->Session->write('flash', array(EDIT_RECORD, 'success'));
                        } else {
                            $this->Session->write('flash', array(FAILURE_MSG, 'failure'));
                        }
                    
                } else {
                    
                    $this->Session->write('flash', array(FAILURE_MSG, 'failure'));
                }
                $this->redirect(array('controller' => 'ProductColors', 'action' => 'index'));

            }
            $this->set("result",$result);        }
        else {
            $this->redirect(array('controller' => 'ProductColors', 'action' => 'index'));
        }
    }


    public function bandhead_view($price_id)
    {
        $id = base64_decode($price_id);
        $this->loadModel('ProductColor');
        $product_data = $this->ProductColor->find('first', array('conditions' => array('ProductColor.id' => $id)));
        //$result = $this->ProductColor->find('all', array('conditions' => array('ProductColor.product_category_id' => $product_data['ProductColor']['product_category_id'], 'ProductColor.product_id' => $product_data['ProductColor']['product_id'], 'ProductColor.product_size_id' => $product_data['ProductColor']['product_size_id'], 'ProductColor.product_style_id' => $product_data['ProductColor']['product_style_id'])));
        if (!empty($product_data)) {
            $this->set('price_data', $product_data);
        }
        else {
            $this->redirect(array('controller' => 'ProductColors', 'action' => 'index'));
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
        //$item_list = $this->QuantityPrice->find('list', array('conditions' => array('QuantityPrice.product_category_id' => $cat_id, 'QuantityPrice.status' => 1), 'fields' => array('QuantityPrice.id', 'QuantityPrice.name')));
        //$this->set('item_list', $item_list);
        //$this->render("/Elements/dashboard/fillQuantity");
    }

    public function wristband(){
        $this->layout="front";
        $this->loadModel("ProductCategory");
        $this->loadModel("Product");
        $this->Product->bindModel(array('hasMany' =>array('ProductColor')), true);
        $this->Product->unbindModel(array('belongsTo' =>array('ProductCategory')), true);
        //$product_result=$this->Product->find("all",array('fields'=>array('Product.name','Product.image'),'conditions'=>array('Product.product_category_id'=>1)));
        $prod_price=$this->ProductCategory->get_wristband_category_price();
       // pr($prod_price);
        $this->set("prod_price",$prod_price);
    }
    
    
}?>