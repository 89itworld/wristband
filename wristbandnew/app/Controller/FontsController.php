<?php

	App::uses('Sanitize', 'Utility');
    
App::import('Vendor', 'image-master', array('file' => 'image-master/vendor/autoload.php'));

// import the Intervention Image Manager Class
use Intervention\Image\ImageManagerStatic as Image;

	class FontsController extends AppController{
		
		public $components = array('RequestHandler', 'FileWrite');
		
		// before filter function of Users Controller
	    public function beforeFilter()
	    {
	        parent::beforeFilter();
	    }
		
		
		/**
	     * This function use for product category Listing  in admin panel
	     */
	    function bandhead_index()
	    {
	    	$this->loadModel('Font');
			
	        $conditions = array();
	        $this->paginate = array(
	            'recursive' => 0,
	            'limit' => LIMIT,
	            'conditions' => $conditions,
	            'order' => array(
	                'Font.updated' => 'DESC'
	            )
	        );
	        $result = $this->paginate('Font');
	        //pr($result);
	        $this->set('result', $result);
	    }
	
		 /**
	     * This function used to add font in admin panel
	     */
	    function bandhead_add()
	    {
	        $this->loadModel('Font');
			
			if ($this->request->is('post')) {
				//pr($this->request->data);die;
	            $this->Font->set($this->request->data);
	            $file = $this->request->data["Font"]["image"];
	            $this->request->data = Sanitize::clean($this->request->data, array('encode' => false));
				
	            if ($this->Font->validates()) {
	                if (!empty($file["name"])) {	                   
	                    $target_dir = DS . "fonts" . DS. "uploads" ;
                        $file_name = rand(100000,999999).date("Y-m-d").$file["name"];
                        $gs_name = $file['tmp_name'];
                        move_uploaded_file($gs_name, "fonts" . DS . "uploads" . DS. $file_name);
                        $this->request->data["Font"]["image"] =  $file_name;
	                }
	                //$this->request->data["Font"]["image"] =  $f_name.".png";
	                if ($this->Font->save($this->request->data, false)) {
	                    $this->Session->write('flash', array(ADD_RECORD, 'success'));
	                } else {
	                    $this->Session->write('flash', array(ERROR_MSG, 'failure'));
	                }
					
	                $this->redirect(array('controller' => 'Fonts', 'action' => 'index'));
	            }
	        }
	    }
		
		 /**
	     * This function used to edit  in admin panel
	     */
	    function bandhead_edit($font_id = "")
	    {
	         $id = base64_decode($font_id);
			 $this->loadModel('Font');
		  	 $data = $this->Font->find('first', array('conditions' => array('Font.id' => $id)));
			 
			 if (!empty($data)) {
	            if (!empty($this->request->data)) {
	                $file = $this->request->data["Font"]["image"];
	                $this->request->data = Sanitize::clean($this->request->data, array('encode' => false));
	                $this->Font->set($this->request->data);
	                if (!empty($file["name"])) {
	                    // $path = WWW_ROOT . DS . "img" . DS . "fonts" . DS . $data['Font']['image'];
	                    // $this->FileWrite->delete_file($path);
	                    // $target_dir = DS . "img" . DS . "fonts";
	                    // $this->FileWrite->file_write_path = $target_dir;
	                    // $this->FileWrite->_create_directory();
	                    // $this->FileWrite->file_write_path = "img" . DS . "fonts" . DS;
	                    // $f_name ="fontStyle".rand(100000,999999).date("Y-m-d");
	                    // $this->FileWrite->_write_file($file, $f_name);
	                    $target_dir = DS . "fonts" . DS. "uploads" ;
                        $file_name = rand(100000,999999).date("Y-m-d").$file["name"];
                        $gs_name = $file['tmp_name'];
                        move_uploaded_file($gs_name, "fonts" . DS . "uploads" . DS. $file_name);
                        $this->request->data["Font"]["image"] =  $file_name;
	                }
	                if ($this->request->data['Font']['name'] == $data['Font']['name']) {
	                    unset($this->request->data['Font']['name']);
	                     $this->Font->validator()->remove('name');
	                }
	                if (empty($file["name"])) {
	                    $this->Font->validator()->remove('image');
	                }
	              //  pr($this->request->data); die;
	                if ($this->Font->validates($this->request->data)) {
	                    if (empty($file["name"])) {
	                        $this->request->data["Font"]["image"] = $data["Font"]["image"];
	                    } else {
	                        $this->request->data["Font"]["image"] = $file_name;
	                    }
						
						   $this->Font->id =  $id;
	                    if ($this->Font->save($this->request->data, false)) {
	                        $this->Session->write('flash', array(EDIT_RECORD, 'success'));
	                        $this->redirect(array('controller' => 'Fonts', 'action' => 'index'));
	                    } else {
	                        $this->Session->write('flash', array(FAILURE_MSG, 'failure'));
	                        $this->redirect(array('controller' => 'Fonts', 'action' => 'index'));
	                    }
	                }
	                else{
	                      $errors = $this->Font->validationErrors;
	                    pr($errors);
	                }
	            }
	            $this->request->data = $data;
				$img = $data['Font']['image'];
				$this->set('img',$img);
	        } else {
	            $this->redirect(array('controller' => 'Fonts', 'action' => 'index'));
	        }
	    }
		
		/* 
		 * This function used to activate font  in admin panel
	     */
	    function bandhead_activate($id=null)
	    {
	        if (!empty($id)) {
	            $font_id = base64_decode($id);
	            $this->Font->id = $font_id;
	            if ($this->Font->saveField('status', 1)) {
	                $this->Session->write('flash', array(ACTIVATE_RECORD, 'success'));
	                $this->redirect(array('controller' => 'Fonts', 'action' => 'index'));
	            } else {
	                $this->Session->write('flash', array(FAILURE_MSG, 'failure'));
	                $this->redirect(array('controller' => 'Fonts', 'action' => 'index'));
	            }
	        } else {
	            $this->Session->write('flash', array(FAILURE_MSG, 'failure'));
	            $this->redirect(array('controller' => 'Fonts', 'action' => 'index'));
	        }
	    }
		
		/*
	     * This function used to deactivate font in admin panel
	     */
	    function bandhead_deactivate($id=null)
	    {
	        if (!empty($id)) {
	            $font_id = base64_decode($id);
	            $this->Font->id = $font_id;
	            if ($this->Font->saveField('status', 0)) {
	                $this->Session->write('flash', array(INACTIVATE_RECORD, 'success'));
	                $this->redirect(array('controller' => 'Fonts', 'action' => 'index'));
	            } else {
	                $this->Session->write('flash', array(FAILURE_MSG, 'failure'));
	                $this->redirect(array('controller' => 'Fonts', 'action' => 'index'));
	            }
	        } else {
	            $this->Session->write('flash', array(FAILURE_MSG, 'failure'));
	            $this->redirect(array('controller' => 'Fonts', 'action' => 'index'));
	        }
	    }
		
		/**
	     * This function used for view in admin panel
	     */
	    function bandhead_view($font_id=null)
	    {
	       $id = base64_decode($font_id);
           $this->loadModel('Font');
           $font_data = $this->Font->find('first', array('conditions' => array('Font.id' => $id)));
           if (!empty($font_data)) {
               $this->set('font_data', $font_data);
           }
           else {
               $this->redirect(array('controller' => 'font_data', 'action' => 'index'));
           }
	    }
        
        
	} 