<?php
App::uses('AppController', 'Controller');
App::uses('Sanitize', 'Utility');
class SubTabsController extends AppController
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
       $this->loadModel('SubTab');
       $conditions = array();
       if (!empty($this->request->data)) {
            if ($this->request->data['SubTab']['status'] != "") {
                $conditions['SubTab.status'] = $this->request->data['SubTab']['status'];
                $this->request->params['named']['SubTab.status'] = $this->request->data['SubTab']['status'];
            }
            if ($this->request->data['SubTab']['search'] != "") {
                $cond = array();
                $cond['SubTab.name LIKE'] = "%" . trim($this->request->data['SubTab']['search']) . "%";
                // $cond['SubTab.value LIKE'] = "%" . trim($this->request->data['SubTab']['search']) . "%";
                $conditions['OR'] = $cond;
                $this->request->params['named']['SubTab.name'] = $this->request->data['SubTab']['search'];
            }
            $this->set('searching', 'searching');
        }
        else {
            if (isset($this->request->params['named']['SubTab.status']) && $this->request->params['named']['SubTab.status'] != "") {
                $conditions['SubTab.status'] = $this->request->params['named']['SubTab.status'];
                $this->request->data['SubTab']['status'] = $this->request->params['named']['SubTab.status'];
            }
            if (isset($this->request->params['named']['SubTab.search']) && $this->request->params['named']['SubTab.search'] != "") {
                $cond = array();
                $cond['SubTab.name LIKE'] = "%" . trim($this->request->data['SubTab']['search']) . "%";
                // $cond['SubTab.value LIKE'] = "%" . trim($this->request->data['SubTab']['search']) . "%";
                $conditions['OR'] = $cond;
                $this->request->data['SubTab']['name'] = $this->request->params['named']['SubTab.search'];
            }
        }
        $this->paginate = array(
            'recursive' => 1,
            'limit' => LIMIT,
            'conditions' => $conditions,
            'order' => array(
            'SubTab.modified' => 'Asc'
            )
        );
        $result = $this->paginate('SubTab');
		// pr($result);die;
        $this->set('result', $result);
    }
    /**
     * This function use for shipping prices add  in admin panel
     */
    function bandhead_add()
    {
		$this->loadModel('Tab');
	    $tab=$this->Tab->find('list',array('conditions'=>array('status'=>1)));
		$this->set('options',$tab);
        if ($this->request->is('post')) {
            $this->loadModel('SubTab');
            $this->SubTab->set($this->request->data);
            $this->request->data = Sanitize::clean($this->request->data, array('encode' => false));
            if ($this->SubTab->validates()) {
              //  pr($this->request->data);die;
                if ($this->SubTab->save($this->request->data, false)) {
                    $this->Session->write('flash', array(ADD_RECORD, 'success'));
                } else {
                    $this->Session->write('flash', array(ERROR_MSG, 'failure'));
                }
                $this->redirect(array('controller' => 'SubTabs', 'action' => 'index'));
            }
        }
    }





    /**


     *This function use for shipping prices edit  in admin panel


     * @param string $ship_price_id


     */


    function bandhead_edit($SubTab_id = "")
    {
        $id = base64_decode($SubTab_id);
        $this->loadModel('SubTab');
		$this->loadModel('Tab');
	    $tab=$this->Tab->find('list',array('conditions'=>array('status'=>1)));
		$this->set('options',$tab);
        $data = $this->SubTab->find('first', array('conditions' => array('SubTab.id' => $id)));
        if (!empty($data)) {
            if (!empty($this->request->data)) {
                $this->request->data = Sanitize::clean($this->request->data, array('encode' => false));
                $this->SubTab->set($this->request->data);
                foreach ($this->request->data['SubTab'] as $key => $value) {
                    if ($this->request->data['SubTab'][$key] == $data['SubTab'][$key]) {
                        unset($this->request->data['SubTab'][$key]);
                    }
                }
                if ($this->SubTab->validates() && !empty($this->request->data)) {
                    if ($this->SubTab->save($this->request->data, false)) {
                        $this->Session->write('flash', array(EDIT_RECORD, 'success'));
                        $this->redirect(array('controller' => 'SubTabs', 'action' => 'index'));
                    } else {
                        $this->Session->write('flash', array(FAILURE_MSG, 'failure'));
                        $this->redirect(array('controller' => 'SubTabs', 'action' => 'index'));
                    }
                }
            }
            $this->request->data = $data;
        } else {
            $this->redirect(array('controller' => 'SubTabs', 'action' => 'index'));
        }
    }








    /**


     * This function use for shipping prices in-active in admin panel


     * @param string $SubTab_id


     */


    public function bandhead_activate($id = null)


    {


        if (!empty($id)) {


            $SubTab_id = base64_decode($id);


            


            $this->loadModel('SubTab');


            


            $this->SubTab->id = $SubTab_id;


            if ($this->SubTab->saveField('status', 1)) {


                $this->Session->write('flash', array(ACTIVATE_RECORD, 'success'));


                $this->redirect(array('controller' => 'SubTabs', 'action' => 'index'));


            } else {


                $this->Session->write('flash', array(FAILURE_MSG, 'failure'));


                $this->redirect(array('controller' => 'SubTabs', 'action' => 'index'));


            }


        } else {


            $this->Session->write('flash', array(FAILURE_MSG, 'failure'));


            $this->redirect(array('controller' => 'SubTabs', 'action' => 'index'));


        }


    }





    /**


     *  This function use for shipping prices record active in admin panel


     * @param null $id


     */


    public function bandhead_deactivate($id = null)


    {


        if (!empty($id)) {


            $SubTab_id = base64_decode($id);


            


            $this->loadModel('SubTab');


            


            $this->SubTab->id = $SubTab_id;


            if ($this->SubTab->saveField('status', 0)) {


                $this->Session->write('flash', array(INACTIVATE_RECORD, 'success'));


                $this->redirect(array('controller' => 'SubTabs', 'action' => 'index'));


            } else {


                $this->Session->write('flash', array(FAILURE_MSG, 'failure'));


                $this->redirect(array('controller' => 'SubTabs', 'action' => 'index'));


            }


        } else {


            $this->Session->write('flash', array(FAILURE_MSG, 'failure'));


            $this->redirect(array('controller' => 'SubTabs', 'action' => 'index'));


        }


    }





    public function bandhead_view($SubTab_id)
    {
    	$id = base64_decode($SubTab_id);
        $this->loadModel('SubTab');
        $SubTab_data = $this->SubTab->find('first', array('conditions' => array('SubTab.id' => $id)));
        if (!empty($SubTab_data)) {
			$this->set('SubTab_data', $SubTab_data);
			// pr($SubTab_data);die;
        }
        else {
            $this->redirect(array('controller' => 'SubTabs', 'action' => 'index'));
        }
    }








}