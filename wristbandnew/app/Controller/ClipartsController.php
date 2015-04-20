<?php

App::uses('AppController', 'Controller');
App::uses('Sanitize', 'Utility');

class ClipartsController extends AppController
{

    public $components = array('RequestHandler', 'Paginator', 'FileWrite');

    public function beforeFilter()
    {
        parent::beforeFilter();
    }

/*
*Clipart List
*/
    function bandhead_index()
    {
        //pr($this->request->data);
       // die;
        $this->loadModel('Clipart');
        $conditions = array();
        
        if (!empty($this->request->data)) {
            if ($this->request->data['Clipart']['is_active'] != "") {
                $conditions['Clipart.is_active'] = $this->request->data['Clipart']['is_active'];
                $this->request->params['named']['Clipart.is_active'] = $this->request->data['Clipart']['is_active'];
            }
            if ($this->request->data['Clipart']['search'] != "") {
                $cond = array();
                $cond['Clipart.name LIKE'] = "%" . trim($this->request->data['Clipart']['search']) . "%";
                $cond['Clipart.hex_value LIKE'] = "%" . trim($this->request->data['Clipart']['search']) . "%";
                $conditions['OR'] = $cond;
                $this->request->params['named']['Clipart.name'] = $this->request->data['Clipart']['search'];
            }
            $this->set('searching', 'searching');
        }
        else {

            if (isset($this->request->params['named']['Clipart.is_active']) && $this->request->params['named']['Clipart.is_active'] != "") {
                $conditions['Clipart.is_active'] = $this->request->params['named']['Clipart.is_active'];
                $this->request->data['Clipart']['is_active'] = $this->request->params['named']['Clipart.is_active'];
            }
            if (isset($this->request->params['named']['Clipart.search']) && $this->request->params['named']['Clipart.search'] != "") {
                $cond = array();
                $cond['Clipart.name LIKE'] = "%" . trim($this->request->params['named']['Clipart.search']) . "%";
                $cond['Clipart.hex_value LIKE'] = "%" . trim($this->request->params['named']['Clipart.search']) . "%";
                $conditions['OR'] = $cond;
                $this->request->data['Clipart']['name'] = $this->request->params['named']['Clipart.search'];
            }
        }
        
        //$this->Clipart->virtualFields['branch'] = 'Branch.name';
        
        $this->paginate = array(
            'recursive' => -1,
            'limit' => PAGINATION_LIMIT,
            'conditions' => $conditions,
        );
        
        $cliparts_data = $this->paginate('Clipart');
        //pr($cliparts_data);
        $this->set('cliparts_data', $cliparts_data);
    }

    /*
    *Add new Clipart
    */
    public function bandhead_add()
    {
        
        if ($this->request->is('post')) {
            
            $this->loadModel('Clipart');
            
            $this->request->data = Sanitize::clean($this->request->data, array('encode' => false));
            $this->Clipart->set($this->request->data);
            
            if ($this->Clipart->validates()) {
            		
            	$file = $this->request->data["Clipart"]["image"];
				
				if (!empty($file["name"])) {
					
                    $filename = $this->FileWrite->_save_image($this->request->data["Clipart"]['image'], CLIPART_IMAGE_PATH);
					
					$this->request->data["Clipart"]["image"] = $filename;
					
					
	                if ($this->Clipart->save($this->request->data, false)) {
	                	
	                    $this->Session->write('flash', array('Clipart has been added successfully.', 'success'));
	                    $this->redirect(array('controller' => 'Cliparts', 'action' => 'index'));
	                    
	                }else {
	                    
	                    $this->Session->write('flash', array('Some error occurred to add the Clipart.', 'failure'));
	                    $this->redirect(array('controller' => 'Cliparts', 'action' => 'index'));
	                }
					
                } else {
                    
					$this->Session->write('flash', array('Please provide clipart image.', 'failure'));
                    $this->redirect(array('controller' => 'Cliparts', 'action' => 'index'));
                }
                

            }
        }
    }

    /**
     * Edit a Clipart
     * @param  $clipart_id
     * @return void
     */
    public function bandhead_edit($clipart_id)
    {
        $id = base64_decode($clipart_id);
        
        $this->loadModel('Clipart');
        $clipart = $this->Clipart->find('first', array('conditions' => array('Clipart.id' => $id)));

        if (!empty($clipart)) {
        
            if (!empty($this->request->data)) {
                
                $this->request->data = Sanitize::clean($this->request->data, array('encode' => false));
                $this->Clipart->set($this->request->data);
                
				$file = $this->request->data["Clipart"]["image"];
					
				if (!empty($file["name"])) {
					
                    $filename = $this->FileWrite->_save_image($this->request->data["Clipart"]['image'], CLIPART_IMAGE_PATH);
					
					// Delete previous image link
                    $path = WWW_ROOT . DS . CLIPART_IMAGE_PATH . $this->request->data['Clipart']['old_image'];
                    
                    $delFile = new File($path, false, 0777);
                    $delFile->delete();
					
					$this->request->data["Clipart"]["image"] = $filename;
				
				} else {
					
					$this->request->data["Clipart"]["image"] = $this->request->data["Clipart"]["old_image"];
					$this->Clipart->validator()->remove('image');
				}
				
                if ($this->Clipart->validates()) {
					
					//pr($this->request->data); die;
					$this->Clipart->id = $this->request->data["Clipart"]["id"];
                    if ($this->Clipart->save($this->request->data, false)) {
                        $this->Session->write('flash', array('Clipart has been updated successfully.', 'success'));
                        $this->redirect(array('controller' => 'Cliparts', 'action' => 'index'));
                    }
                    else {
                        $this->Session->write('flash', array('Some error occured to edit the Clipart.', 'failure'));
                        $this->redirect(array('controller' => 'Cliparts', 'action' => 'index'));
                    }
                }
            }
            $this->request->data = $clipart;
        }
        else {
            $this->redirect(array('controller' => 'Cliparts', 'action' => 'index'));
        }
    }

    /**
     * view a clipart
     * @param  $clipart_id
     * @return void
     */
    public function bandhead_view($clipart_id)
    {
        $id = base64_decode($clipart_id);
        
        $this->loadModel('Clipart');
        $clipart_data = $this->Clipart->find('first', array('conditions' => array('Clipart.id' => $id), 'recursive' => -1));
        
        if (!empty($clipart_data)) {
            $this->set('clipart_data', $clipart_data);
        }
        else {
            $this->redirect(array('controller' => 'Cliparts', 'action' => 'index'));
        }
    }


    /**
     * active clipart
     * @param string $clipart_id
     * @return void
     */
    function bandhead_activate($clipart_id = "")
    {
        
        $id = base64_decode($clipart_id);
        $clipart_data = $this->Clipart->find('first', array('conditions' => array('Clipart.id' => $id), 'recursive' => -1));
        //pr($clipart_data); die;
        if (!empty($clipart_data)) {
            $new_clipart_data['Clipart']['is_active'] = 1;
            $new_clipart_data['Clipart']['id'] = $clipart_data['Clipart']['id'];
            if ($this->Clipart->save($new_clipart_data)) {
                $this->Session->write('flash', array('Your selected record has been Activated successfully.', 'success'));
                $this->redirect(array('controller' => 'Cliparts', 'action' => 'index'));
            }
            else {
                $this->Session->write('flash', array('Some error occured to Activate the record.', 'failure'));
                $this->redirect(array('controller' => 'Cliparts', 'action' => 'index'));
            }
        }
        else {
            $this->redirect(array('controller' => 'Cliparts', 'action' => 'index'));
        }
    }

    /**
     * De-active single clipart
     * @param string $clipart_id
     * @return void
     */
    function bandhead_deactivate($clipart_id = "")
    {
        $id = base64_decode($clipart_id);
        $clipart_data = $this->Clipart->find('first', array('conditions' => array('Clipart.id' => $id), 'recursive' => -1));
        //pr($clipart_data); die;
        if (!empty($clipart_data)) {
            $new_clipart_data['Clipart']['is_active'] = 0;
            $new_clipart_data['Clipart']['id'] = $clipart_data['Clipart']['id'];
            if ($this->Clipart->save($new_clipart_data)) {
                $this->Session->write('flash', array('Your selected record has been Deactivated successfully.', 'success'));
                $this->redirect(array('controller' => 'Cliparts', 'action' => 'index'));
            }
            else {
                $this->Session->write('flash', array('Some error occured to Deactivate the record.', 'failure'));
                $this->redirect(array('controller' => 'Cliparts', 'action' => 'index'));
            }
        }
        else {
            $this->redirect(array('controller' => 'Cliparts', 'action' => 'index'));
        }
    }

}