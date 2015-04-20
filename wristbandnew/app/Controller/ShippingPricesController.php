<?php

App::uses('AppController', 'Controller');
App::uses('Sanitize', 'Utility');

class ShippingPricesController extends AppController
{

    public $components = array('RequestHandler', 'FileWrite');

    // before filter function of Users Controller
    public function beforeFilter()
    {
        parent::beforeFilter();
    }

    /**
     * This function use for shipping prices Listing  in admin panel
     */
    function bandhead_index()
    {
        
       $this->loadModel('ShipTimePrice');
        
       $conditions = array(); 
        
       if (!empty($this->request->data)) {
            if ($this->request->data['ShipTimePrice']['status'] != "") {
                $conditions['ShipTimePrice.status'] = $this->request->data['ShipTimePrice']['status'];
                $this->request->params['named']['ShipTimePrice.status'] = $this->request->data['ShipTimePrice']['status'];
            }
            if ($this->request->data['ShipTimePrice']['search'] != "") {
                $cond = array();
                $cond['ProductCategory.name LIKE'] = "%" . trim($this->request->data['ShipTimePrice']['search']) . "%";
                $cond['MetaDay.name LIKE'] = "%" . trim($this->request->data['ShipTimePrice']['search']) . "%";
                $cond['ShipTimePrice.price LIKE'] = "%" . trim($this->request->data['ShipTimePrice']['search']) . "%";
                $cond['ShipTimePrice.qty LIKE'] = "%" . trim($this->request->data['ShipTimePrice']['search']) . "%";
                $conditions['OR'] = $cond;
                $this->request->params['named']['ShipTimePrice.name'] = $this->request->data['ShipTimePrice']['search'];
            }
            $this->set('searching', 'searching');
        }
        else {

            if (isset($this->request->params['named']['ShipTimePrice.status']) && $this->request->params['named']['ShipTimePrice.status'] != "") {
                $conditions['ShipTimePrice.status'] = $this->request->params['named']['ShipTimePrice.status'];
                $this->request->data['ShipTimePrice']['status'] = $this->request->params['named']['ShipTimePrice.status'];
            }
            if (isset($this->request->params['named']['ShipTimePrice.search']) && $this->request->params['named']['ShipTimePrice.search'] != "") {
                $cond = array();
                $cond['ProductCategory.name LIKE'] = "%" . trim($this->request->data['ShipTimePrice']['search']) . "%";
                $cond['MetaDay.name LIKE'] = "%" . trim($this->request->data['ShipTimePrice']['search']) . "%";
                $cond['ShipTimePrice.price LIKE'] = "%" . trim($this->request->data['ShipTimePrice']['search']) . "%";
                $cond['ShipTimePrice.qty LIKE'] = "%" . trim($this->request->data['ShipTimePrice']['search']) . "%";
                $conditions['OR'] = $cond;
                $this->request->data['ShipTimePrice']['name'] = $this->request->params['named']['ShipTimePrice.search'];
            }
        }
        
        $this->paginate = array(
            'recursive' => 0,
            'limit' => LIMIT,
            'conditions' => $conditions,
            'order' => array(
                'ShipTimePrice.modified' => 'Asc'
            )
        );
        $result = $this->paginate('ShipTimePrice');

        $this->set('result', $result);
    }

    /**
     * This function use for shipping prices add  in admin panel
     */
    function bandhead_add()
    {
        
        $this->loadModel('ProductCategory');
        $this->set("product_cat_list", $this->ProductCategory->find("list", array("conditions" => array("ProductCategory.status" => 1), 'order' => 'ProductCategory.name ASC')));
        
        $this->loadModel('MetaDay');
        $this->set("day_list", $this->MetaDay->find("list", array('order' => 'MetaDay.name ASC')));
        
        if ($this->request->is('post')) {
            
            $this->loadModel('ShipTimePrice');
            $this->ShipTimePrice->set($this->request->data);
            $this->request->data = Sanitize::clean($this->request->data, array('encode' => false));
            
            if ($this->ShipTimePrice->validates()) {
                //pr($this->data); die;
                if ($this->ShipTimePrice->save($this->request->data, false)) {
                    $this->Session->write('flash', array(ADD_RECORD, 'success'));

                } else {
                    $this->Session->write('flash', array(ERROR_MSG, 'failure'));
                }
                $this->redirect(array('controller' => 'ShippingPrices', 'action' => 'index'));
            }
        }
    }

    /**
     *This function use for shipping prices edit  in admin panel
     * @param string $ship_price_id
     */
    function bandhead_edit($ship_price_id = "")
    {
        $id = base64_decode($ship_price_id);
        
        $this->loadModel('ProductCategory');
        $this->set("product_cat_list", $this->ProductCategory->find("list", array("conditions" => array("ProductCategory.status" => 1), 'order' => 'ProductCategory.name ASC')));
        
        $this->loadModel('MetaDay');
        $this->set("day_list", $this->MetaDay->find("list", array('order' => 'MetaDay.name ASC')));
        
        $this->loadModel('ShipTimePrice');
        $data = $this->ShipTimePrice->find('first', array('conditions' => array('ShipTimePrice.id' => $id)));

        if (!empty($data)) {
            
            if (!empty($this->request->data)) {
                
                $this->request->data = Sanitize::clean($this->request->data, array('encode' => false));
                $this->ShipTimePrice->set($this->request->data);
                
                foreach ($this->request->data['ShipTimePrice'] as $key => $value) {
                    
                    if ($this->request->data['ShipTimePrice'][$key] == $data['ShipTimePrice'][$key]) {

                        unset($this->request->data['ShipTimePrice'][$key]);
                    }
                    
                }

                if ($this->ShipTimePrice->validates() && !empty($this->request->data)) {
                    //pr($this->request->data); die;
                    if ($this->ShipTimePrice->save($this->request->data, false)) {
                        $this->Session->write('flash', array(EDIT_RECORD, 'success'));
                        $this->redirect(array('controller' => 'ShippingPrices', 'action' => 'index'));
                    } else {
                        $this->Session->write('flash', array(FAILURE_MSG, 'failure'));
                        $this->redirect(array('controller' => 'ShippingPrices', 'action' => 'index'));
                    }
                }
            }
            $this->request->data = $data;
        } else {
            $this->redirect(array('controller' => 'ShippingPrices', 'action' => 'index'));
        }
    }


    /**
     * This function use for shipping prices in-active in admin panel
     * @param string $ship_price_id
     */
    public function bandhead_activate($id = null)
    {
        if (!empty($id)) {
            $ship_price_id = base64_decode($id);
            
            $this->loadModel('ShipTimePrice');
            
            $this->ShipTimePrice->id = $ship_price_id;
            if ($this->ShipTimePrice->saveField('status', 1)) {
                $this->Session->write('flash', array(ACTIVATE_RECORD, 'success'));
                $this->redirect(array('controller' => 'ShippingPrices', 'action' => 'index'));
            } else {
                $this->Session->write('flash', array(FAILURE_MSG, 'failure'));
                $this->redirect(array('controller' => 'ShippingPrices', 'action' => 'index'));
            }
        } else {
            $this->Session->write('flash', array(FAILURE_MSG, 'failure'));
            $this->redirect(array('controller' => 'ShippingPrices', 'action' => 'index'));
        }
    }

    /**
     *  This function use for shipping prices record active in admin panel
     * @param null $id
     */
    public function bandhead_deactivate($id = null)
    {
        if (!empty($id)) {
            $ship_price_id = base64_decode($id);
            
            $this->loadModel('ShipTimePrice');
            
            $this->ShipTimePrice->id = $ship_price_id;
            if ($this->ShipTimePrice->saveField('status', 0)) {
                $this->Session->write('flash', array(INACTIVATE_RECORD, 'success'));
                $this->redirect(array('controller' => 'ShippingPrices', 'action' => 'index'));
            } else {
                $this->Session->write('flash', array(FAILURE_MSG, 'failure'));
                $this->redirect(array('controller' => 'ShippingPrices', 'action' => 'index'));
            }
        } else {
            $this->Session->write('flash', array(FAILURE_MSG, 'failure'));
            $this->redirect(array('controller' => 'ShippingPrices', 'action' => 'index'));
        }
    }

    public function bandhead_view($ship_price_id)
    {
           $id = base64_decode($ship_price_id);

           $this->loadModel('ShipTimePrice');
           $ship_price_data = $this->ShipTimePrice->find('first', array('conditions' => array('ShipTimePrice.id' => $id)));
           if (!empty($ship_price_data)) {
               $this->set('ship_price_data', $ship_price_data);
           }
           else {
               $this->redirect(array('controller' => 'ShippingPrices', 'action' => 'index'));
           }
    }


}