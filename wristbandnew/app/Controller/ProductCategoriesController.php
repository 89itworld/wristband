<?php
/**
 * Created by IntelliJ IDEA.
 * User: Ankur Chauhan
 * Date: 3/2/15
 * Time: 10:58 AM
 * To change this template use File | Settings | File Templates.
 */
App::uses('AppController', 'Controller');
App::uses('Sanitize', 'Utility');
class ProductCategoriesController extends AppController
{


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
        $conditions = array('ProductCategory.is_deleted' => 0);
        $this->paginate = array(
            'recursive' => 0,
            'limit' => LIMIT,
            'conditions' => $conditions,
            'order' => array(
                'ProductCategory.sort_order' => 'Asc'
            )
        );
        $result = $this->paginate('ProductCategory');
        //pr($result);
        $this->set('result', $result);
    }

    /**
     * This function use for product category add  in admin panel
     */
    function bandhead_add()
    {
        if ($this->request->is('post')) {
            $this->ProductCategory->set($this->request->data);
            $file = $this->request->data["ProductCategory"]["image"];
            $this->request->data = Sanitize::clean($this->request->data, array('encode' => false));
            if ($this->ProductCategory->validates()) {
                if (!empty($file["name"])) {
                    $target_dir = DS . "img" . DS . "ProductCategoryIcon" ;
                    $this->FileWrite->file_write_path = $target_dir;
                    $this->FileWrite->_create_directory();
                    $this->FileWrite->file_write_path = "img" . DS . "ProductCategoryIcon" . DS ;
                    $f_name = "CATe".rand(100000,99999).date("Y-m-d");
                    $this->FileWrite->_write_file($file, $f_name);
                }
                $this->request->data["ProductCategory"]["image"] = $f_name . ".png";
                if ($this->ProductCategory->save($this->request->data, false)) {
                    $this->Session->write('flash', array(ADD_RECORD, 'success'));

                } else {
                    $this->Session->write('flash', array(ERROR_MSG, 'failure'));
                }
                $this->redirect(array('controller' => 'ProductCategories', 'action' => 'index'));
            }
        }
    }

    /**
     *This function use for product category edit  in admin panel
     * @param string $category_id
     */
    function bandhead_edit($category_id = "")
    {
        $id = base64_decode($category_id);
        $this->loadModel('ProductCategory');
        $data = $this->ProductCategory->find('first', array('conditions' => array('ProductCategory.id' => $id)));
        if (!empty($data)) {
            if (!empty($this->request->data)) {
                $file = $this->request->data["ProductCategory"]["image"];
                // $this->request->data = Sanitize::clean($this->request->data, array('encode' => false));
                $this->ProductCategory->set($this->request->data);
                if (!empty($file["name"])) {
                    $path = WWW_ROOT . DS . "img" . DS . "ProductCategoryIcon" . DS  . $this->request->data['ProductCategory']['old_image'];
                    $this->FileWrite->delete_file($path);
                    $target_dir = DS . "img" . DS . "ProductCategoryIcon";
                    $this->FileWrite->file_write_path = $target_dir;
                    $this->FileWrite->_create_directory();
                    $this->FileWrite->file_write_path = "img" . DS . "ProductCategoryIcon" . DS;
                    $f_name ="CATe".rand(100000,999999).date("Y-m-d");
                    $this->FileWrite->_write_file($file, $f_name);
                }
                if ($this->request->data['ProductCategory']['name'] == $data['ProductCategory']['name']) {
                    unset($this->request->data['ProductCategory']['name']);
                }
                if ($this->request->data['ProductCategory']['slug'] == $data['ProductCategory']['slug']) {
                    unset($this->request->data['ProductCategory']['slug']);
                }
                if (empty($file["name"])) {
                    $this->ProductCategory->validator()->remove('image');
                }
                if ($this->ProductCategory->validates()) {

                    if (empty($file["name"])) {
                        $this->request->data["ProductCategory"]["image"] = $this->request->data["ProductCategory"]["old_image"];
                    } else {
                        $this->request->data["ProductCategory"]["image"] = $f_name . ".png";
                    }
                    if ($this->ProductCategory->save($this->request->data, false)) {
                        $this->Session->write('flash', array(EDIT_RECORD, 'success'));
                        $this->redirect(array('controller' => 'ProductCategories', 'action' => 'index'));
                    } else {
                        $this->Session->write('flash', array(FAILURE_MSG, 'failure'));
                        $this->redirect(array('controller' => 'ProductCategories', 'action' => 'index'));
                    }
                }
            }
            $this->request->data = $data;
        } else {
            $this->redirect(array('controller' => 'ProductCategories', 'action' => 'index'));
        }
    }


    /**
     * This function use for product category in-active  in admin panel
     * @param string $category_id
     */
    public function bandhead_activate($id = null)
    {
        if (!empty($id)) {
            $category_id = base64_decode($id);
            $this->ProductCategory->id = $category_id;
            if ($this->ProductCategory->saveField('status', 1)) {
                $this->Session->write('flash', array(ACTIVATE_RECORD, 'success'));
                $this->redirect(array('controller' => 'ProductCategories', 'action' => 'index'));
            } else {
                $this->Session->write('flash', array(FAILURE_MSG, 'failure'));
                $this->redirect(array('controller' => 'ProductCategories', 'action' => 'index'));
            }
        } else {
            $this->Session->write('flash', array(FAILURE_MSG, 'failure'));
            $this->redirect(array('controller' => 'ProductCategoryies', 'action' => 'index'));
        }
    }

    /**
     *  This function use for product category record active  in admin panel
     * @param null $id
     */
    public function bandhead_deactivate($id = null)
    {
        if (!empty($id)) {
            $category_id = base64_decode($id);
            $this->ProductCategory->id = $category_id;
            if ($this->ProductCategory->saveField('status', 0)) {
                $this->Session->write('flash', array(INACTIVATE_RECORD, 'success'));
                $this->redirect(array('controller' => 'ProductCategories', 'action' => 'index'));
            } else {
                $this->Session->write('flash', array(FAILURE_MSG, 'failure'));
                $this->redirect(array('controller' => 'ProductCategories', 'action' => 'index'));
            }
        } else {
            $this->Session->write('flash', array(FAILURE_MSG, 'failure'));
            $this->redirect(array('controller' => 'ProductCategories', 'action' => 'index'));
        }
    }

    public function bandhead_view($cat_id)
       {
           $id = base64_decode($cat_id);
           $this->loadModel('ProductCategory');
           $cat_data = $this->ProductCategory->find('first', array('conditions' => array('ProductCategory.id' => $id), 'recursive' => -1));
           if (!empty($cat_data)) {
               $this->set('cat_data', $cat_data);
           }
           else {
               $this->redirect(array('controller' => 'ProductCategories', 'action' => 'index'));
           }
       }


}
