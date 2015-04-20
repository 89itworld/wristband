<?php
App::uses('AppController', 'Controller');
App::uses('Sanitize', 'Utility');
class TabsController extends AppController
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


       


       $this->loadModel('Tab');


        


       $conditions = array(); 


       


       if (!empty($this->request->data)) {


            if ($this->request->data['Tab']['status'] != "") {


                $conditions['Tab.status'] = $this->request->data['Tab']['status'];


                $this->request->params['named']['Tab.status'] = $this->request->data['Tab']['status'];


            }


            if ($this->request->data['Tab']['search'] != "") {


                $cond = array();


                $cond['Tab.name LIKE'] = "%" . trim($this->request->data['Tab']['search']) . "%";


                // $cond['Tab.value LIKE'] = "%" . trim($this->request->data['Tab']['search']) . "%";


                $conditions['OR'] = $cond;


                $this->request->params['named']['Tab.name'] = $this->request->data['Tab']['search'];


            }


            $this->set('searching', 'searching');


        }


        else {





            if (isset($this->request->params['named']['Tab.status']) && $this->request->params['named']['Tab.status'] != "") {


                $conditions['Tab.status'] = $this->request->params['named']['Tab.status'];


                $this->request->data['Tab']['status'] = $this->request->params['named']['Tab.status'];


            }


            if (isset($this->request->params['named']['Tab.search']) && $this->request->params['named']['Tab.search'] != "") {


                $cond = array();


                $cond['Tab.name LIKE'] = "%" . trim($this->request->data['Tab']['search']) . "%";


                // $cond['Tab.value LIKE'] = "%" . trim($this->request->data['Tab']['search']) . "%";


                $conditions['OR'] = $cond;


                $this->request->data['Tab']['name'] = $this->request->params['named']['Tab.search'];


            }


        }


        


        $this->paginate = array(


            'recursive' => 0,


            'limit' => LIMIT,


            'conditions' => $conditions,


            'order' => array(


                'Tab.modified' => 'Asc'


            )


        );


        $result = $this->paginate('Tab');





        $this->set('result', $result);


    }
    /**
     * This function use for shipping prices add  in admin panel
     */
    function bandhead_add()
    {

        if ($this->request->is('post')) {
            $this->loadModel('Tab');
            $this->Tab->set($this->request->data);
            $this->request->data = Sanitize::clean($this->request->data, array('encode' => false));
            if ($this->Tab->validates()) {
              //  pr($this->request->data);die;
                if ($this->Tab->save($this->request->data, false)) {
                    $this->Session->write('flash', array(ADD_RECORD, 'success'));
                } else {
                    $this->Session->write('flash', array(ERROR_MSG, 'failure'));
                }
                $this->redirect(array('controller' => 'Tabs', 'action' => 'index'));
            }
        }
    }





    /**


     *This function use for shipping prices edit  in admin panel


     * @param string $ship_price_id


     */


    function bandhead_edit($tab_id = "")
    {
        $id = base64_decode($tab_id);
        $this->loadModel('Tab');
        $data = $this->Tab->find('first', array('conditions' => array('Tab.id' => $id)));
        if (!empty($data)) {
            if (!empty($this->request->data)) {
                $this->request->data = Sanitize::clean($this->request->data, array('encode' => false));
                $this->Tab->set($this->request->data);
                foreach ($this->request->data['Tab'] as $key => $value) {
                    if ($this->request->data['Tab'][$key] == $data['Tab'][$key]) {
                        unset($this->request->data['Tab'][$key]);
                    }
                }
                if ($this->Tab->validates() && !empty($this->request->data)) {
                    if ($this->Tab->save($this->request->data, false)) {
                        $this->Session->write('flash', array(EDIT_RECORD, 'success'));
                        $this->redirect(array('controller' => 'Tabs', 'action' => 'index'));
                    } else {
                        $this->Session->write('flash', array(FAILURE_MSG, 'failure'));
                        $this->redirect(array('controller' => 'Tabs', 'action' => 'index'));
                    }
                }
            }
            $this->request->data = $data;
        } else {
            $this->redirect(array('controller' => 'Tabs', 'action' => 'index'));
        }
    }








    /**


     * This function use for shipping prices in-active in admin panel


     * @param string $Tab_id


     */


    public function bandhead_activate($id = null)


    {


        if (!empty($id)) {


            $Tab_id = base64_decode($id);


            


            $this->loadModel('Tab');


            


            $this->Tab->id = $Tab_id;


            if ($this->Tab->saveField('status', 1)) {


                $this->Session->write('flash', array(ACTIVATE_RECORD, 'success'));


                $this->redirect(array('controller' => 'Tabs', 'action' => 'index'));


            } else {


                $this->Session->write('flash', array(FAILURE_MSG, 'failure'));


                $this->redirect(array('controller' => 'Tabs', 'action' => 'index'));


            }


        } else {


            $this->Session->write('flash', array(FAILURE_MSG, 'failure'));


            $this->redirect(array('controller' => 'Tabs', 'action' => 'index'));


        }


    }





    /**


     *  This function use for shipping prices record active in admin panel


     * @param null $id


     */


    public function bandhead_deactivate($id = null)


    {


        if (!empty($id)) {


            $Tab_id = base64_decode($id);


            


            $this->loadModel('Tab');


            


            $this->Tab->id = $Tab_id;


            if ($this->Tab->saveField('status', 0)) {


                $this->Session->write('flash', array(INACTIVATE_RECORD, 'success'));


                $this->redirect(array('controller' => 'Tabs', 'action' => 'index'));


            } else {


                $this->Session->write('flash', array(FAILURE_MSG, 'failure'));


                $this->redirect(array('controller' => 'Tabs', 'action' => 'index'));


            }


        } else {


            $this->Session->write('flash', array(FAILURE_MSG, 'failure'));


            $this->redirect(array('controller' => 'Tabs', 'action' => 'index'));


        }


    }





    public function bandhead_view($Tab_id)
    {
    	$id = base64_decode($Tab_id);
        $this->loadModel('Tab');
        $Tab_data = $this->Tab->find('first', array('conditions' => array('Tab.id' => $id)));
        if (!empty($Tab_data)) {
			$this->set('Tab_data', $Tab_data);
			// pr($Tab_data);die;
        }
        else {
            $this->redirect(array('controller' => 'Tabs', 'action' => 'index'));
        }
    }








}