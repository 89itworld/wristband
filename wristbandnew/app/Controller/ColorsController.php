<?php

App::uses('AppController', 'Controller');
App::uses('Sanitize', 'Utility');

class ColorsController extends AppController
{

    public $components = array('RequestHandler', 'Email', 'Paginator');

    public function beforeFilter()
    {
        parent::beforeFilter();
    }

/*
*Color List
*/
    function bandhead_index()
    {
        //pr($this->request->data);
       // die;
        $this->loadModel('Color');
        $conditions = array();
        
        if (!empty($this->request->data)) {
            if ($this->request->data['Color']['is_active'] != "") {
                $conditions['Color.is_active'] = $this->request->data['Color']['is_active'];
                $this->request->params['named']['Color.is_active'] = $this->request->data['Color']['is_active'];
            }
            if ($this->request->data['Color']['search'] != "") {
                $cond = array();
                $cond['Color.name LIKE'] = "%" . trim($this->request->data['Color']['search']) . "%";
                $cond['Color.hex_value LIKE'] = "%" . trim($this->request->data['Color']['search']) . "%";
                $conditions['OR'] = $cond;
                $this->request->params['named']['Color.name'] = $this->request->data['Color']['search'];
            }
            $this->set('searching', 'searching');
        }
        else {

            if (isset($this->request->params['named']['Color.is_active']) && $this->request->params['named']['Color.is_active'] != "") {
                $conditions['Color.is_active'] = $this->request->params['named']['Color.is_active'];
                $this->request->data['Color']['is_active'] = $this->request->params['named']['Color.is_active'];
            }
            if (isset($this->request->params['named']['Color.search']) && $this->request->params['named']['Color.search'] != "") {
                $cond = array();
                $cond['Color.name LIKE'] = "%" . trim($this->request->params['named']['Color.search']) . "%";
                $cond['Color.hex_value LIKE'] = "%" . trim($this->request->params['named']['Color.search']) . "%";
                $conditions['OR'] = $cond;
                $this->request->data['Color']['name'] = $this->request->params['named']['Color.search'];
            }
        }
        
        //$this->Color->virtualFields['branch'] = 'Branch.name';
        
        $this->paginate = array(
            'recursive' => -1,
            'limit' => PAGINATION_LIMIT,
            'conditions' => $conditions,
        );
        
        $colors_data = $this->paginate('Color');
        //pr($colors_data);
        $this->set('colors_data', $colors_data);
    }

    /*
    *Add new color
    */
    public function bandhead_add()
    {
        
        if ($this->request->is('post')) {
            
            $this->loadModel('Color');
            
            $this->request->data = Sanitize::clean($this->request->data, array('encode' => false));
            $this->Color->set($this->request->data);
            pr($this->request->data);die;
            if ($this->Color->validates()) {
                
                if ($this->Color->save($this->request->data)) {
                    $this->Session->write('flash', array('Color has been added successfully.', 'success'));
                    $this->redirect(array('controller' => 'Colors', 'action' => 'index'));
                    
                }else {
                    
                    $this->Session->write('flash', array('Some error occurred to add the Color.', 'failure'));
                    $this->redirect(array('controller' => 'Colors', 'action' => 'index'));
                }
            }
        }
    }

    /**
     * Edit a color
     * @param  $color_id
     * @return void
     */
    public function bandhead_edit($color_id)
    {
        $id = base64_decode($color_id);
        
        $this->loadModel('Color');
        $color = $this->Color->find('first', array('conditions' => array('Color.id' => $id)));

        if (!empty($color)) {
        
            if (!empty($this->request->data)) {
                
                $this->request->data = Sanitize::clean($this->request->data, array('encode' => false));
                $this->Color->set($this->request->data);
                
                if ($this->Color->validates()) {
                    if ($this->Color->save($this->request->data)) {
                        $this->Session->write('flash', array('Color has been updated successfully.', 'success'));
                        $this->redirect(array('controller' => 'Colors', 'action' => 'index'));
                    }
                    else {
                        $this->Session->write('flash', array('Some error occured to edit the Color.', 'failure'));
                        $this->redirect(array('controller' => 'Colors', 'action' => 'index'));
                    }
                }
            }
            $this->request->data = $color;
        }
        else {
            $this->redirect(array('controller' => 'Colors', 'action' => 'index'));
        }
    }

    /**
     * view a color
     * @param  $color_id
     * @return void
     */
    public function bandhead_view($color_id)
    {
        $id = base64_decode($color_id);
        
        $this->loadModel('Color');
        $color_data = $this->Color->find('first', array('conditions' => array('Color.id' => $id), 'recursive' => -1));
        
        if (!empty($color_data)) {
            $this->set('color_data', $color_data);
        }
        else {
            $this->redirect(array('controller' => 'Colors', 'action' => 'index'));
        }
    }


    /**
     * active color
     * @param string $color_id
     * @return void
     */
    function bandhead_activate($color_id = "")
    {
        
        $id = base64_decode($color_id);
        $color_data = $this->Color->find('first', array('conditions' => array('Color.id' => $id), 'recursive' => -1));
        //pr($color_data); die;
        if (!empty($color_data)) {
            $new_color_data['Color']['is_active'] = 1;
            $new_color_data['Color']['id'] = $color_data['Color']['id'];
            if ($this->Color->save($new_color_data)) {
                $this->Session->write('flash', array('Your selected record has been Activated successfully.', 'success'));
                $this->redirect(array('controller' => 'Colors', 'action' => 'index'));
            }
            else {
                $this->Session->write('flash', array('Some error occured to Activate the record.', 'failure'));
                $this->redirect(array('controller' => 'Colors', 'action' => 'index'));
            }
        }
        else {
            $this->redirect(array('controller' => 'Colors', 'action' => 'index'));
        }
    }

    /**
     * De-active single color
     * @param string $color_id
     * @return void
     */
    function bandhead_deactivate($color_id = "")
    {
        $id = base64_decode($color_id);
        $color_data = $this->Color->find('first', array('conditions' => array('Color.id' => $id), 'recursive' => -1));
        //pr($color_data); die;
        if (!empty($color_data)) {
            $new_color_data['Color']['is_active'] = 0;
            $new_color_data['Color']['id'] = $color_data['Color']['id'];
            if ($this->Color->save($new_color_data)) {
                $this->Session->write('flash', array('Your selected record has been Deactivated successfully.', 'success'));
                $this->redirect(array('controller' => 'Colors', 'action' => 'index'));
            }
            else {
                $this->Session->write('flash', array('Some error occured to Deactivate the record.', 'failure'));
                $this->redirect(array('controller' => 'Colors', 'action' => 'index'));
            }
        }
        else {
            $this->redirect(array('controller' => 'Colors', 'action' => 'index'));
        }
    }

}