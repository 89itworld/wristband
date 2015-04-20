<?php

App::uses('AppController', 'Controller');
App::uses('Sanitize', 'Utility');

class BannersController extends AppController
{

    public $components = array('RequestHandler', 'Paginator', 'FileWrite');

    public function beforeFilter()
    {
        parent::beforeFilter();
    }

/*
*Banner List
*/
    function bandhead_index()
    {
        //pr($this->request->data);
       // die;
        $this->loadModel('Banner');
        $conditions = array();
        
        if (!empty($this->request->data)) {
            if ($this->request->data['Banner']['is_active'] != "") {
                $conditions['Banner.is_active'] = $this->request->data['Banner']['is_active'];
                $this->request->params['named']['Banner.is_active'] = $this->request->data['Banner']['is_active'];
            }
            if ($this->request->data['Banner']['search'] != "") {
                $cond = array();
                $cond['Banner.name LIKE'] = "%" . trim($this->request->data['Banner']['search']) . "%";
                $cond['Banner.hex_value LIKE'] = "%" . trim($this->request->data['Banner']['search']) . "%";
                $conditions['OR'] = $cond;
                $this->request->params['named']['Banner.name'] = $this->request->data['Banner']['search'];
            }
            $this->set('searching', 'searching');
        }
        else {

            if (isset($this->request->params['named']['Banner.is_active']) && $this->request->params['named']['Banner.is_active'] != "") {
                $conditions['Banner.is_active'] = $this->request->params['named']['Banner.is_active'];
                $this->request->data['Banner']['is_active'] = $this->request->params['named']['Banner.is_active'];
            }
            if (isset($this->request->params['named']['Banner.search']) && $this->request->params['named']['Banner.search'] != "") {
                $cond = array();
                $cond['Banner.name LIKE'] = "%" . trim($this->request->params['named']['Banner.search']) . "%";
                $cond['Banner.hex_value LIKE'] = "%" . trim($this->request->params['named']['Banner.search']) . "%";
                $conditions['OR'] = $cond;
                $this->request->data['Banner']['name'] = $this->request->params['named']['Banner.search'];
            }
        }
        
        //$this->Banner->virtualFields['branch'] = 'Branch.name';
        
        $this->paginate = array(
            'recursive' => -1,
            'limit' => PAGINATION_LIMIT,
            'conditions' => $conditions,
        );
        
        $banners_data = $this->paginate('Banner');
        //pr($banners_data);
        $this->set('banners_data', $banners_data);
    }

    /*
    *Add new Banner
    */
    public function bandhead_add()
    {
        
        if ($this->request->is('post')) {
            
            $this->loadModel('Banner');
            
            $this->request->data = Sanitize::clean($this->request->data, array('encode' => false));
            $this->Banner->set($this->request->data);
            
            if ($this->Banner->validates()) {
                    
                $file = $this->request->data["Banner"]["image"];
                
                if (!empty($file["name"])) {
                    
                    $filename = $this->FileWrite->_save_image($this->request->data["Banner"]['image'], BANNER_IMAGE_PATH);
                    
                    $this->request->data["Banner"]["image"] = $filename;
                    
                    
                    if ($this->Banner->save($this->request->data, false)) {
                        
                        $this->Session->write('flash', array('Banner has been added successfully.', 'success'));
                        $this->redirect(array('controller' => 'Banners', 'action' => 'index'));
                        
                    }else {
                        
                        $this->Session->write('flash', array('Some error occurred to add the Banner.', 'failure'));
                        $this->redirect(array('controller' => 'Banners', 'action' => 'index'));
                    }
                    
                } else {
                    
                    $this->Session->write('flash', array('Please provide banner image.', 'failure'));
                    $this->redirect(array('controller' => 'Banners', 'action' => 'index'));
                }
                

            }
        }
    }

    /**
     * Edit a Banner
     * @param  $banner_id
     * @return void
     */
    public function bandhead_edit($banner_id)
    {
        $id = base64_decode($banner_id);
        
        $this->loadModel('Banner');
        $banner = $this->Banner->find('first', array('conditions' => array('Banner.id' => $id)));

        if (!empty($banner)) {
        
            if (!empty($this->request->data)) {
                
                $this->request->data = Sanitize::clean($this->request->data, array('encode' => false));
                $this->Banner->set($this->request->data);
                
                $file = $this->request->data["Banner"]["image"];
                    
                if (!empty($file["name"])) {
                    
                    $filename = $this->FileWrite->_save_image($this->request->data["Banner"]['image'], BANNER_IMAGE_PATH);
                    
                    // Delete previous image link
                    $path = WWW_ROOT . DS . BANNER_IMAGE_PATH . $this->request->data['Banner']['old_image'];
                    
                    $delFile = new File($path, false, 0777);
                    $delFile->delete();
                    
                    $this->request->data["Banner"]["image"] = $filename;
                
                } else {
                    
                    $this->request->data["Banner"]["image"] = $this->request->data["Banner"]["old_image"];
                    $this->Banner->validator()->remove('image');
                }
                
                if ($this->Banner->validates()) {
                    
                    //pr($this->request->data); die;
                    $this->Banner->id = $this->request->data["Banner"]["id"];
                    if ($this->Banner->save($this->request->data, false)) {
                        $this->Session->write('flash', array('Banner has been updated successfully.', 'success'));
                        $this->redirect(array('controller' => 'Banners', 'action' => 'index'));
                    }
                    else {
                        $this->Session->write('flash', array('Some error occured to edit the Banner.', 'failure'));
                        $this->redirect(array('controller' => 'Banners', 'action' => 'index'));
                    }
                }
            }
            $this->request->data = $banner;
        }
        else {
            $this->redirect(array('controller' => 'Banners', 'action' => 'index'));
        }
    }

    /**
     * view a banner
     * @param  $banner_id
     * @return void
     */
    public function bandhead_view($banner_id)
    {
        $id = base64_decode($banner_id);
        
        $this->loadModel('Banner');
        $banner_data = $this->Banner->find('first', array('conditions' => array('Banner.id' => $id), 'recursive' => -1));
        
        if (!empty($banner_data)) {
            $this->set('banner_data', $banner_data);
        }
        else {
            $this->redirect(array('controller' => 'Banners', 'action' => 'index'));
        }
    }


    /**
     * active banner
     * @param string $banner_id
     * @return void
     */
    function bandhead_activate($banner_id = "")
    {
        
        $id = base64_decode($banner_id);
        $banner_data = $this->Banner->find('first', array('conditions' => array('Banner.id' => $id), 'recursive' => -1));
        //pr($banner_data); die;
        if (!empty($banner_data)) {
            $new_banner_data['Banner']['is_active'] = 1;
            $new_banner_data['Banner']['id'] = $banner_data['Banner']['id'];
            if ($this->Banner->save($new_banner_data)) {
                $this->Session->write('flash', array('Your selected record has been Activated successfully.', 'success'));
                $this->redirect(array('controller' => 'Banners', 'action' => 'index'));
            }
            else {
                $this->Session->write('flash', array('Some error occured to Activate the record.', 'failure'));
                $this->redirect(array('controller' => 'Banners', 'action' => 'index'));
            }
        }
        else {
            $this->redirect(array('controller' => 'Banners', 'action' => 'index'));
        }
    }

    /**
     * De-active single banner
     * @param string $banner_id
     * @return void
     */
    function bandhead_deactivate($banner_id = "")
    {
        $id = base64_decode($banner_id);
        $banner_data = $this->Banner->find('first', array('conditions' => array('Banner.id' => $id), 'recursive' => -1));
        //pr($banner_data); die;
        if (!empty($banner_data)) {
            $new_banner_data['Banner']['is_active'] = 0;
            $new_banner_data['Banner']['id'] = $banner_data['Banner']['id'];
            if ($this->Banner->save($new_banner_data)) {
                $this->Session->write('flash', array('Your selected record has been Deactivated successfully.', 'success'));
                $this->redirect(array('controller' => 'Banners', 'action' => 'index'));
            }
            else {
                $this->Session->write('flash', array('Some error occured to Deactivate the record.', 'failure'));
                $this->redirect(array('controller' => 'Banners', 'action' => 'index'));
            }
        }
        else {
            $this->redirect(array('controller' => 'Banners', 'action' => 'index'));
        }
    }
}