<?php





App::uses('AppController', 'Controller');


App::uses('Sanitize', 'Utility');





class DomainsController extends AppController


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


            if ($this->request->data['Domain']['status'] != "") {


                $conditions['Domain.status'] = $this->request->data['Domain']['status'];


                $this->request->params['named']['Domain.status'] = $this->request->data['Domain']['status'];


            }


            if ($this->request->data['Domain']['search'] != "") {


                $cond = array();


                $cond['Domain.name LIKE'] = "%" . trim($this->request->data['Domain']['search']) . "%";


                $cond['Domain.value LIKE'] = "%" . trim($this->request->data['Domain']['search']) . "%";


                $conditions['OR'] = $cond;


                $this->request->params['named']['Domain.name'] = $this->request->data['Domain']['search'];


            }


            $this->set('searching', 'searching');


        }


        else {





            if (isset($this->request->params['named']['Domain.status']) && $this->request->params['named']['Domain.status'] != "") {


                $conditions['Domain.status'] = $this->request->params['named']['Domain.status'];


                $this->request->data['Domain']['status'] = $this->request->params['named']['Domain.status'];


            }


            if (isset($this->request->params['named']['Domain.search']) && $this->request->params['named']['Domain.search'] != "") {


                $cond = array();


                $cond['Domain.name LIKE'] = "%" . trim($this->request->data['Domain']['search']) . "%";


                $cond['Domain.value LIKE'] = "%" . trim($this->request->data['Domain']['search']) . "%";


                $conditions['OR'] = $cond;


                $this->request->data['Domain']['name'] = $this->request->params['named']['Domain.search'];


            }


        }


        


        $this->paginate = array(


            'recursive' => 0,


            'limit' => LIMIT,


            'conditions' => $conditions,


            'order' => array(


                'Domain.modified' => 'Asc'


            )


        );


        $result = $this->paginate('Domain');





        $this->set('result', $result);


    }





    /**


     * This function use for shipping prices add  in admin panel


     */


    function bandhead_add()


    {

        if ($this->request->is('post')) {


            


            $this->loadModel('Domain');


            $this->Domain->set($this->request->data);


            $this->request->data = Sanitize::clean($this->request->data, array('encode' => false));


            


            if ($this->Domain->validates()) {


                //pr($this->data); die;


                if ($this->Domain->save($this->request->data, false)) {


                    $this->Session->write('flash', array(ADD_RECORD, 'success'));





                } else {


                    $this->Session->write('flash', array(ERROR_MSG, 'failure'));


                }


                $this->redirect(array('controller' => 'Domains', 'action' => 'index'));


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
       $this->loadModel('Domain');


        $data = $this->Domain->find('first', array('conditions' => array('Domain.id' => $id)));





        if (!empty($data)) {


            


            if (!empty($this->request->data)) {


                


                $this->request->data = Sanitize::clean($this->request->data, array('encode' => false));


                $this->Domain->set($this->request->data);
                     if ($this->Domain->validates() && !empty($this->request->data)) {


                    //pr($this->request->data); die;


                    if ($this->Domain->save($this->request->data, false)) {


                        $this->Session->write('flash', array(EDIT_RECORD, 'success'));


                        $this->redirect(array('controller' => 'Domains', 'action' => 'index'));


                    } else {


                        $this->Session->write('flash', array(FAILURE_MSG, 'failure'));


                        $this->redirect(array('controller' => 'Domains', 'action' => 'index'));


                    }


                }


            }


            $this->request->data = $data;


        } else {


            $this->redirect(array('controller' => 'Domains', 'action' => 'index'));


        }


    }








    /**


     * This function use for shipping prices in-active in admin panel


     * @param string $Domain_id


     */


    public function bandhead_activate($id = null)


    {


        if (!empty($id)) {


            $Domain_id = base64_decode($id);


            


            $this->loadModel('Domain');


            


            $this->Domain->id = $Domain_id;


            if ($this->Domain->saveField('status', 1)) {


                $this->Session->write('flash', array(ACTIVATE_RECORD, 'success'));


                $this->redirect(array('controller' => 'Domains', 'action' => 'index'));


            } else {


                $this->Session->write('flash', array(FAILURE_MSG, 'failure'));


                $this->redirect(array('controller' => 'Domains', 'action' => 'index'));


            }


        } else {


            $this->Session->write('flash', array(FAILURE_MSG, 'failure'));


            $this->redirect(array('controller' => 'Domains', 'action' => 'index'));


        }


    }





    /**


     *  This function use for shipping prices record active in admin panel


     * @param null $id


     */


    public function bandhead_deactivate($id = null)


    {


        if (!empty($id)) {


            $Domain_id = base64_decode($id);


            


            $this->loadModel('Domain');


            


            $this->Domain->id = $Domain_id;


            if ($this->Domain->saveField('status', 0)) {


                $this->Session->write('flash', array(INACTIVATE_RECORD, 'success'));


                $this->redirect(array('controller' => 'Domains', 'action' => 'index'));


            } else {


                $this->Session->write('flash', array(FAILURE_MSG, 'failure'));


                $this->redirect(array('controller' => 'Domains', 'action' => 'index'));


            }


        } else {


            $this->Session->write('flash', array(FAILURE_MSG, 'failure'));


            $this->redirect(array('controller' => 'Domains', 'action' => 'index'));


        }


    }





    public function bandhead_view($Domain_id)


    {
           $id = base64_decode($Domain_id);
           $this->loadModel('Domain');
           $Domain_data = $this->Domain->find('first', array('conditions' => array('Domain.id' => $id)));
           if (!empty($Domain_data)) {
               $this->set('Domain_data', $Domain_data);
           }
           else {
               $this->redirect(array('controller' => 'Domains', 'action' => 'index'));
           }
    }








}