<?php

App::uses('AppController', 'Controller');
App::uses('Sanitize', 'Utility');

class OptionsController extends AppController
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
       
       $this->loadModel('Option');
        
       $conditions = array(); 
       
       if (!empty($this->request->data)) {
            if ($this->request->data['Option']['status'] != "") {
                $conditions['Option.status'] = $this->request->data['Option']['status'];
                $this->request->params['named']['Option.status'] = $this->request->data['Option']['status'];
            }
            if ($this->request->data['Option']['search'] != "") {
                $cond = array();
                $cond['Option.name LIKE'] = "%" . trim($this->request->data['Option']['search']) . "%";
                $cond['Option.value LIKE'] = "%" . trim($this->request->data['Option']['search']) . "%";
                $conditions['OR'] = $cond;
                $this->request->params['named']['Option.name'] = $this->request->data['Option']['search'];
            }
            $this->set('searching', 'searching');
        }
        else {

            if (isset($this->request->params['named']['Option.status']) && $this->request->params['named']['Option.status'] != "") {
                $conditions['Option.status'] = $this->request->params['named']['Option.status'];
                $this->request->data['Option']['status'] = $this->request->params['named']['Option.status'];
            }
            if (isset($this->request->params['named']['Option.search']) && $this->request->params['named']['Option.search'] != "") {
                $cond = array();
                $cond['Option.name LIKE'] = "%" . trim($this->request->data['Option']['search']) . "%";
                $cond['Option.value LIKE'] = "%" . trim($this->request->data['Option']['search']) . "%";
                $conditions['OR'] = $cond;
                $this->request->data['Option']['name'] = $this->request->params['named']['Option.search'];
            }
        }
        
        $this->paginate = array(
            'recursive' => 0,
            'limit' => LIMIT,
            'conditions' => $conditions,
            'order' => array(
                'Option.modified' => 'Asc'
            )
        );
        $result = $this->paginate('Option');

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
            
            $this->loadModel('Option');
            $this->Option->set($this->request->data);
            $this->request->data = Sanitize::clean($this->request->data, array('encode' => false));
            
            if ($this->Option->validates()) {
                //pr($this->data); die;
                if ($this->Option->save($this->request->data, false)) {
                    $this->Session->write('flash', array(ADD_RECORD, 'success'));

                } else {
                    $this->Session->write('flash', array(ERROR_MSG, 'failure'));
                }
                $this->redirect(array('controller' => 'Options', 'action' => 'index'));
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
        
        $this->loadModel('Option');
        $data = $this->Option->find('first', array('conditions' => array('Option.id' => $id)));

        if (!empty($data)) {
            
            if (!empty($this->request->data)) {
                
                $this->request->data = Sanitize::clean($this->request->data, array('encode' => false));
                $this->Option->set($this->request->data);
                
                foreach ($this->request->data['Option'] as $key => $value) {
                    
                    if ($this->request->data['Option'][$key] == $data['Option'][$key]) {

                        unset($this->request->data['Option'][$key]);
                    }
                    
                }

                if ($this->Option->validates() && !empty($this->request->data)) {
                    //pr($this->request->data); die;
                    if ($this->Option->save($this->request->data, false)) {
                        $this->Session->write('flash', array(EDIT_RECORD, 'success'));
                        $this->redirect(array('controller' => 'Options', 'action' => 'index'));
                    } else {
                        $this->Session->write('flash', array(FAILURE_MSG, 'failure'));
                        $this->redirect(array('controller' => 'Options', 'action' => 'index'));
                    }
                }
            }
            $this->request->data = $data;
        } else {
            $this->redirect(array('controller' => 'Options', 'action' => 'index'));
        }
    }


    /**
     * This function use for shipping prices in-active in admin panel
     * @param string $option_id
     */
    public function bandhead_activate($id = null)
    {
        if (!empty($id)) {
            $option_id = base64_decode($id);
            
            $this->loadModel('Option');
            
            $this->Option->id = $option_id;
            if ($this->Option->saveField('status', 1)) {
                $this->Session->write('flash', array(ACTIVATE_RECORD, 'success'));
                $this->redirect(array('controller' => 'Options', 'action' => 'index'));
            } else {
                $this->Session->write('flash', array(FAILURE_MSG, 'failure'));
                $this->redirect(array('controller' => 'Options', 'action' => 'index'));
            }
        } else {
            $this->Session->write('flash', array(FAILURE_MSG, 'failure'));
            $this->redirect(array('controller' => 'Options', 'action' => 'index'));
        }
    }

    /**
     *  This function use for shipping prices record active in admin panel
     * @param null $id
     */
    public function bandhead_deactivate($id = null)
    {
        if (!empty($id)) {
            $option_id = base64_decode($id);
            
            $this->loadModel('Option');
            
            $this->Option->id = $option_id;
            if ($this->Option->saveField('status', 0)) {
                $this->Session->write('flash', array(INACTIVATE_RECORD, 'success'));
                $this->redirect(array('controller' => 'Options', 'action' => 'index'));
            } else {
                $this->Session->write('flash', array(FAILURE_MSG, 'failure'));
                $this->redirect(array('controller' => 'Options', 'action' => 'index'));
            }
        } else {
            $this->Session->write('flash', array(FAILURE_MSG, 'failure'));
            $this->redirect(array('controller' => 'Options', 'action' => 'index'));
        }
    }

    public function bandhead_view($option_id)
    {
           $id = base64_decode($option_id);

           $this->loadModel('Option');
           $option_data = $this->Option->find('first', array('conditions' => array('Option.id' => $id)));
           if (!empty($option_data)) {
               $this->set('option_data', $option_data);
           }
           else {
               $this->redirect(array('controller' => 'Options', 'action' => 'index'));
           }
    }


}