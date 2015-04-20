<?php

App::uses('AppController', 'Controller');
App::uses('Sanitize', 'Utility');
class CmsPagesController extends AppController
{


    public $components = array('RequestHandler', 'FileWrite');

    // before filter function of Users Controller
    public function beforeFilter()
    {
        parent::beforeFilter();
    }

    /**
     * This function use for cms pages Listing  in admin panel
     */
    function bandhead_index()
    {
        $conditions = array();
        
        if (!empty($this->request->data)) {
            if ($this->request->data['CmsPage']['status'] != "") {
                $conditions['CmsPage.status'] = $this->request->data['CmsPage']['status'];
                $this->request->params['named']['CmsPage.status'] = $this->request->data['CmsPage']['status'];
            }
            if ($this->request->data['CmsPage']['search'] != "") {
                $cond = array();
                $cond['CmsPage.title LIKE'] = "%" . trim($this->request->data['CmsPage']['search']) . "%";
                $cond['CmsPage.slug LIKE'] = "%" . trim($this->request->data['CmsPage']['search']) . "%";
                $cond['CmsPage.description LIKE'] = "%" . trim($this->request->data['CmsPage']['search']) . "%";
                $conditions['OR'] = $cond;
                $this->request->params['named']['CmsPage.name'] = $this->request->data['CmsPage']['search'];
            }
            $this->set('searching', 'searching');
        }
        else {

            if (isset($this->request->params['named']['CmsPage.status']) && $this->request->params['named']['CmsPage.status'] != "") {
                $conditions['CmsPage.status'] = $this->request->params['named']['CmsPage.status'];
                $this->request->data['CmsPage']['status'] = $this->request->params['named']['CmsPage.status'];
            }
            if (isset($this->request->params['named']['CmsPage.search']) && $this->request->params['named']['CmsPage.search'] != "") {
                $cond = array();
                $cond['CmsPage.title LIKE'] = "%" . trim($this->request->data['CmsPage']['search']) . "%";
                $cond['CmsPage.slug LIKE'] = "%" . trim($this->request->data['CmsPage']['search']) . "%";
                $cond['CmsPage.description LIKE'] = "%" . trim($this->request->data['CmsPage']['search']) . "%";
                $conditions['OR'] = $cond;
                $this->request->data['CmsPage']['name'] = $this->request->params['named']['CmsPage.search'];
            }
        }
        
        $this->paginate = array(
            'recursive' => 0,
            'limit' => LIMIT,
            'conditions' => $conditions,
            'order' => array(
                'CmsPage.modified' => 'Asc'
            )
        );
        $result = $this->paginate('CmsPage');
        //pr($result);
        $this->set('result', $result);
    }

    /**
     * This function use for cms pages add  in admin panel
     */
    function bandhead_add()
    {
        
        if ($this->request->is('post')) {
            //pr($this->data); die;
            
            $this->request->data['CmsPage']['description'] = str_replace("\n","",$this->request->data['CmsPage']['description']);
            
            $this->CmsPage->set($this->request->data);

            $this->request->data = Sanitize::clean($this->request->data, array('encode' => false));
            
            if ($this->CmsPage->validates()) {

                if ($this->CmsPage->save($this->request->data, false)) {
                    $this->Session->write('flash', array(ADD_RECORD, 'success'));

                } else {
                    $this->Session->write('flash', array(ERROR_MSG, 'failure'));
                }
                $this->redirect(array('controller' => 'CmsPages', 'action' => 'index'));
            }
        }
    }

    /**
     *This function use for cms pages edit  in admin panel
     * @param string $page_id
     */
    function bandhead_edit($page_id = "")
    {
        $id = base64_decode($page_id);
        
        $this->loadModel('CmsPage');
        $data = $this->CmsPage->find('first', array('conditions' => array('CmsPage.id' => $id)));
        
        if (!empty($data)) {
            
            if (!empty($this->request->data)) {
                
                $this->request->data['CmsPage']['description'] = str_replace("\n","",stripslashes($this->request->data['CmsPage']['description']));
                
                $this->request->data = Sanitize::clean($this->request->data, array('encode' => false));
                $this->CmsPage->set($this->request->data);
                
                foreach ($this->request->data['CmsPage'] as $key => $value) {
                    
                    if ($this->request->data['CmsPage'][$key] == $data['CmsPage'][$key]) {

                        unset($this->request->data['CmsPage'][$key]);
                    }
                    
                }

                if ($this->CmsPage->validates() && !empty($this->request->data)) {

                    if ($this->CmsPage->save($this->request->data, false)) {
                        $this->Session->write('flash', array(EDIT_RECORD, 'success'));
                        $this->redirect(array('controller' => 'CmsPages', 'action' => 'index'));
                    } else {
                        $this->Session->write('flash', array(FAILURE_MSG, 'failure'));
                        $this->redirect(array('controller' => 'CmsPages', 'action' => 'index'));
                    }
                }
            }
            $this->request->data = $data;
        } else {
            $this->redirect(array('controller' => 'CmsPages', 'action' => 'index'));
        }
    }


    /**
     * This function use for cms pages in-active  in admin panel
     * @param string $page_id
     */
    public function bandhead_activate($id = null)
    {
        if (!empty($id)) {
            $page_id = base64_decode($id);
            $this->CmsPage->id = $page_id;
            if ($this->CmsPage->saveField('status', 1)) {
                $this->Session->write('flash', array(ACTIVATE_RECORD, 'success'));
                $this->redirect(array('controller' => 'CmsPages', 'action' => 'index'));
            } else {
                $this->Session->write('flash', array(FAILURE_MSG, 'failure'));
                $this->redirect(array('controller' => 'CmsPages', 'action' => 'index'));
            }
        } else {
            $this->Session->write('flash', array(FAILURE_MSG, 'failure'));
            $this->redirect(array('controller' => 'CmsPages', 'action' => 'index'));
        }
    }

    /**
     *  This function use for cms pages record active  in admin panel
     * @param null $id
     */
    public function bandhead_deactivate($id = null)    {        if (!empty($id)) {            $page_id = base64_decode($id);            $this->CmsPage->id = $page_id;            if ($this->CmsPage->saveField('status', 0)) {                $this->Session->write('flash', array(INACTIVATE_RECORD, 'success'));                $this->redirect(array('controller' => 'CmsPages', 'action' => 'index'));            } else {                $this->Session->write('flash', array(FAILURE_MSG, 'failure'));                $this->redirect(array('controller' => 'CmsPages', 'action' => 'index'));            }        } else {            $this->Session->write('flash', array(FAILURE_MSG, 'failure'));            $this->redirect(array('controller' => 'CmsPages', 'action' => 'index'));        }    }    public function bandhead_view($page_id)       {           $id = base64_decode($page_id);           $this->loadModel('CmsPage');           $page_data = $this->CmsPage->find('first', array('conditions' => array('CmsPage.id' => $id)));           if (!empty($page_data)) {               $this->set('page_data', $page_data);           }           else {               $this->redirect(array('controller' => 'CmsPages', 'action' => 'index'));           }       }}