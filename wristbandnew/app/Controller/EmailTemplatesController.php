<?php

App::uses('AppController', 'Controller');
App::uses('Sanitize', 'Utility');
class EmailTemplatesController extends AppController
{


    public $components = array('RequestHandler', 'FileWrite');

    // before filter function of Users Controller
    public function beforeFilter()
    {
        parent::beforeFilter();
    }

    /**
     * This function use for template pages Listing  in admin panel
     */
    function bandhead_index()
    {
       
       $conditions = array(); 
        
       if (!empty($this->request->data)) {
            if ($this->request->data['EmailTemplate']['status'] != "") {
                $conditions['EmailTemplate.status'] = $this->request->data['EmailTemplate']['status'];
                $this->request->params['named']['EmailTemplate.status'] = $this->request->data['EmailTemplate']['status'];
            }
            if ($this->request->data['EmailTemplate']['search'] != "") {
                $cond = array();
                $cond['EmailTemplate.title LIKE'] = "%" . trim($this->request->data['EmailTemplate']['search']) . "%";
                $cond['EmailTemplate.slug LIKE'] = "%" . trim($this->request->data['EmailTemplate']['search']) . "%";
                $cond['EmailTemplate.description LIKE'] = "%" . trim($this->request->data['EmailTemplate']['search']) . "%";
                $conditions['OR'] = $cond;
                $this->request->params['named']['EmailTemplate.name'] = $this->request->data['EmailTemplate']['search'];
            }
            $this->set('searching', 'searching');
        }
        else {

            if (isset($this->request->params['named']['EmailTemplate.status']) && $this->request->params['named']['EmailTemplate.status'] != "") {
                $conditions['EmailTemplate.status'] = $this->request->params['named']['EmailTemplate.status'];
                $this->request->data['EmailTemplate']['status'] = $this->request->params['named']['EmailTemplate.status'];
            }
            if (isset($this->request->params['named']['EmailTemplate.search']) && $this->request->params['named']['EmailTemplate.search'] != "") {
                $cond = array();
                $cond['EmailTemplate.title LIKE'] = "%" . trim($this->request->data['EmailTemplate']['search']) . "%";
                $cond['EmailTemplate.slug LIKE'] = "%" . trim($this->request->data['EmailTemplate']['search']) . "%";
                $cond['EmailTemplate.description LIKE'] = "%" . trim($this->request->data['EmailTemplate']['search']) . "%";
                $conditions['OR'] = $cond;
                $this->request->data['EmailTemplate']['name'] = $this->request->params['named']['EmailTemplate.search'];
            }
        }
        
        $this->paginate = array(
            'recursive' => 0,
            'limit' => LIMIT,
            'conditions' => $conditions,
            'order' => array(
                'EmailTemplate.modified' => 'Asc'
            )
        );
        $result = $this->paginate('EmailTemplate');
        //pr($result);
        $this->set('result', $result);
    }

    /**
     * This function use for template pages add  in admin panel
     */
    function bandhead_add()
    {
        
        if ($this->request->is('post')) {
            //pr($this->data); die;
            $this->request->data['EmailTemplate']['description'] = str_replace("\n","",$this->request->data['EmailTemplate']['description']);
            
            $this->EmailTemplate->set($this->request->data);

            $this->request->data = Sanitize::clean($this->request->data, array('encode' => false));
            
            if ($this->EmailTemplate->validates()) {

                if ($this->EmailTemplate->save($this->request->data, false)) {
                    $this->Session->write('flash', array(ADD_RECORD, 'success'));

                } else {
                    $this->Session->write('flash', array(ERROR_MSG, 'failure'));
                }
                $this->redirect(array('controller' => 'EmailTemplates', 'action' => 'index'));
            }
        }
    }

    /**
     *This function use for template pages edit  in admin panel
     * @param string $page_id
     */
    function bandhead_edit($page_id = "")
    {
        $id = base64_decode($page_id);
        
        $this->loadModel('EmailTemplate');
        $data = $this->EmailTemplate->find('first', array('conditions' => array('EmailTemplate.id' => $id)));
        
        if (!empty($data)) {
            
            if (!empty($this->request->data)) {
                
                $this->request->data['EmailTemplate']['description'] = str_replace("\n","",$this->request->data['EmailTemplate']['description']);
                
                $this->request->data = Sanitize::clean($this->request->data, array('encode' => false));
                $this->EmailTemplate->set($this->request->data);
                
                foreach ($this->request->data['EmailTemplate'] as $key => $value) {
                    
                    if ($this->request->data['EmailTemplate'][$key] == $data['EmailTemplate'][$key]) {

                        unset($this->request->data['EmailTemplate'][$key]);
                    }
                    
                }

                if ($this->EmailTemplate->validates() && !empty($this->request->data)) {

                    if ($this->EmailTemplate->save($this->request->data, false)) {
                        $this->Session->write('flash', array(EDIT_RECORD, 'success'));
                        $this->redirect(array('controller' => 'EmailTemplates', 'action' => 'index'));
                    } else {
                        $this->Session->write('flash', array(FAILURE_MSG, 'failure'));
                        $this->redirect(array('controller' => 'EmailTemplates', 'action' => 'index'));
                    }
                }
            }
            $this->request->data = $data;
        } else {
            $this->redirect(array('controller' => 'EmailTemplates', 'action' => 'index'));
        }
    }


    /**
     * This function use for template pages in-active in admin panel
     * @param string $page_id
     */
    public function bandhead_activate($id = null)
    {
        if (!empty($id)) {
            $page_id = base64_decode($id);
            $this->EmailTemplate->id = $page_id;
            if ($this->EmailTemplate->saveField('status', 1)) {
                $this->Session->write('flash', array(ACTIVATE_RECORD, 'success'));
                $this->redirect(array('controller' => 'EmailTemplates', 'action' => 'index'));
            } else {
                $this->Session->write('flash', array(FAILURE_MSG, 'failure'));
                $this->redirect(array('controller' => 'EmailTemplates', 'action' => 'index'));
            }
        } else {
            $this->Session->write('flash', array(FAILURE_MSG, 'failure'));
            $this->redirect(array('controller' => 'EmailTemplates', 'action' => 'index'));
        }
    }

    /**
     *  This function use for template pages record active in admin panel
     * @param null $id
     */
    public function bandhead_deactivate($id = null)
    {
        if (!empty($id)) {
            $page_id = base64_decode($id);
            $this->EmailTemplate->id = $page_id;
            if ($this->EmailTemplate->saveField('status', 0)) {
                $this->Session->write('flash', array(INACTIVATE_RECORD, 'success'));
                $this->redirect(array('controller' => 'EmailTemplates', 'action' => 'index'));
            } else {
                $this->Session->write('flash', array(FAILURE_MSG, 'failure'));
                $this->redirect(array('controller' => 'EmailTemplates', 'action' => 'index'));
            }
        } else {
            $this->Session->write('flash', array(FAILURE_MSG, 'failure'));
            $this->redirect(array('controller' => 'EmailTemplates', 'action' => 'index'));
        }
    }

    public function bandhead_view($page_id)
       {
           $id = base64_decode($page_id);

           $this->loadModel('EmailTemplate');
           $page_data = $this->EmailTemplate->find('first', array('conditions' => array('EmailTemplate.id' => $id)));
           if (!empty($page_data)) {
               $this->set('page_data', $page_data);
           }
           else {
               $this->redirect(array('controller' => 'EmailTemplates', 'action' => 'index'));
           }
       }


}