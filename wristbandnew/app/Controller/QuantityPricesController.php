<?php

App::uses('AppController', 'Controller');
App::uses('Sanitize', 'Utility');
class QuantityPricesController extends AppController
{


    public $components = array('RequestHandler');

    // before filter function of Users Controller
    public function beforeFilter()
    {
        parent::beforeFilter();
        $this->Auth->allow('get_cat_product');
    }

    /**
     * This function use for product category Listing  in admin panel
     */
    function bandhead_index()
    {   
        $conditions = array();
        
        if (!empty($this->request->data)) {
            if ($this->request->data['QuantityPrice']['status'] != "") {
                $conditions['QuantityPrice.status'] = $this->request->data['QuantityPrice']['status'];
                $this->request->params['named']['QuantityPrice.status'] = $this->request->data['QuantityPrice']['status'];
            }
            if ($this->request->data['QuantityPrice']['search'] != "") {
                $cond = array();
                $cond['ProductCategory.name LIKE'] = "%" . trim($this->request->data['QuantityPrice']['search']) . "%";
                $conditions['OR'] = $cond;
                $this->request->params['named']['QuantityPrice.name'] = $this->request->data['QuantityPrice']['search'];
            }
            $this->set('searching', 'searching');
        }
        else {

            if (isset($this->request->params['named']['QuantityPrice.status']) && $this->request->params['named']['QuantityPrice.status'] != "") {
                $conditions['QuantityPrice.status'] = $this->request->params['named']['QuantityPrice.status'];
                $this->request->data['QuantityPrice']['status'] = $this->request->params['named']['QuantityPrice.status'];
            }
            if (isset($this->request->params['named']['QuantityPrice.search']) && $this->request->params['named']['QuantityPrice.search'] != "") {
                $cond = array();
                $cond['ProductCategory.name LIKE'] = "%" . trim($this->request->params['named']['QuantityPrice.search']) . "%";
                $conditions['OR'] = $cond;
                $this->request->data['QuantityPrice']['name'] = $this->request->params['named']['QuantityPrice.search'];
            }
        }
        
        $this->paginate = array(
            'recursive' => 0,
            'limit' => LIMIT,
            'conditions' => $conditions,
            'group' => array('product_category_id'),
            'order' => array(
                'QuantityPrice.updated' => 'DESC'
            )
        );
        $result = $this->paginate('QuantityPrice');
        //pr($result);
        $this->set('result', $result);
    }

    /**
     * This function use for QuantityPrice category add  in admin panel
     */
    function bandhead_add()
    {
        $this->loadModel('ProductCategory');
        $this->set("product_cat_list", $this->ProductCategory->find("list", array("conditions" => array("ProductCategory.status" => 1), 'order' => 'ProductCategory.name ASC')));
        
        if ($this->request->is('post')) {

            $this->QuantityPrice->set($this->request->data);
            $this->request->data = Sanitize::clean($this->request->data, array('encode' => false));

            $data = array();
            
            $prodCatId = $this->data['QuantityPrice']['product_category_id'];
            
            foreach ($this->data['QuantityPrice']['name'] as $key => $value) {
                
                $data[] = array('product_category_id' => $prodCatId, 'name' => $this->data['QuantityPrice']['name'][$key]);
            }
            
            $this->loadModel("QuantityPrice");
                    
            $alreadyExists = $this->QuantityPrice->find('first', array('conditions' => array('QuantityPrice.product_category_id' => $prodCatId))); 
            
            
            if (empty($alreadyExists)) {

                //pr($data); die;
                
                $option = array('validate' => false);
                
                if ($this->QuantityPrice->saveMany($data, $option)) {
                    
                    $this->Session->write('flash', array(ADD_RECORD, 'success'));
                } else {
                    
                    $this->Session->write('flash', array(ERROR_MSG, 'failure'));
                }
                        
                $this->redirect(array('controller' => 'QuantityPrices', 'action' => 'index'));

            } else {
                    
                $this->Session->write('flash', array(ALREADY_EXIST, 'failure'));
                $this->redirect(array('controller' => 'QuantityPrices', 'action' => 'index'));
            }                
        }
    }

    /**
     *This function use for QuantityPrice  edit  in admin panel
     * @param string $category_id
     */
    function bandhead_edit($quant_id = "")
    {
        $id = base64_decode($quant_id);
        
        //$this->loadModel('ProductCategory');
        //$this->set("product_cat_list", $this->ProductCategory->find("list", array("conditions" => array("ProductCategory.status" => 1), 'order' => 'ProductCategory.name ASC')));
        
        $this->loadModel("QuantityPrice");
        
        $result = $this->QuantityPrice->find('all', array('conditions' => array('QuantityPrice.product_category_id' => $id), 'fields' => array('QuantityPrice.id', 'QuantityPrice.name', 'ProductCategory.name', 'QuantityPrice.product_category_id')));
        //pr($result);die;
        if (!empty($result)) {
            
            if (!empty($this->request->data)) {
                    
                $data = array();
            
                $prodCatId = $this->data['QuantityPrice']['product_category_id'];
                
                    foreach ($this->data['QuantityPrice']['name'] as $key => $value) {
                        
                        if(!empty($this->data['QuantityPrice']['id'][$key])) {
                            
                            $data[] = array('id' => $this->data['QuantityPrice']['id'][$key], 'product_category_id' => $prodCatId, 'name' => $this->data['QuantityPrice']['name'][$key]);
                        } else {
                            
                            $data[] = array('product_category_id' => $prodCatId, 'name' => $this->data['QuantityPrice']['name'][$key]);
                        }
                        
                        
                    }
                    
                    //pr($data); die;
                    
                    $this->request->data = Sanitize::clean($this->request->data, array('encode' => false));
                    $this->QuantityPrice->set($this->request->data);
                    
                    $option = array('validate' => false);
                    
                    if ($this->QuantityPrice->saveMany($data, $option)) {
                        
                        $this->Session->write('flash', array(EDIT_RECORD, 'success'));
                    } else {
                        
                        $this->Session->write('flash', array(ERROR_MSG, 'failure'));
                    }
                        
                    $this->redirect(array('controller' => 'QuantityPrices', 'action' => 'index'));

            }
            $this->set("result", $result);
        } else {
            $this->redirect(array('controller' => 'QuantityPrices', 'action' => 'index'));
        }
    }


    public function bandhead_view($quant_id)
    {
        $id = base64_decode($quant_id);

        $this->loadModel('QuantityPrice');
                
        $result = $this->QuantityPrice->find('all', array('conditions' => array('QuantityPrice.product_category_id' => $id), 'fields' => array('QuantityPrice.name', 'ProductCategory.name')));
        
        //pr($result); die;
        
        if (!empty($result)) {
            $this->set('result', $result);
        }
        else {
            $this->redirect(array('controller' => 'QuantityPrices', 'action' => 'index'));
        }
    }

    
    public function bandhead_delete()
    {
        $this->autoRender = false;
           
        $id = $_POST['id'];
        
        //pr($id); die;
        if ($this->QuantityPrice->delete($id)) {
            
            echo 1;
        } else {
            
            echo 0;
        }
        
    }
    

}