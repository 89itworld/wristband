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
class ProductsController extends AppController
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
        $conditions = array('Product.is_deleted' => 0);
        $this->paginate = array(
            'recursive' => 0,
            'limit' => LIMIT,
            'conditions' => $conditions,
            'order' => array(
                'Product.updated' => 'Asc'
            )
        );
        $result = $this->paginate('Product');
        //pr($result);
        $this->set('result', $result);
    }

    /**
     * This function use for product category add  in admin panel
     */
    function bandhead_add()
    {
        $this->loadModel('ProductCategory');
        $this->set("product_cat_list", $this->ProductCategory->find("list", array("conditions" => array("ProductCategory.status" => 1), 'order' => 'ProductCategory.name ASC')));
        if ($this->request->is('post')) {
            $this->Product->set($this->request->data);
            $file = $this->request->data["Product"]["image"];
            $this->request->data = Sanitize::clean($this->request->data, array('encode' => false));
            if ($this->Product->validates()) {
                if (!empty($file["name"])) {
                    $target_dir = DS . "img" . DS . "ProductIcon" ;
                    $this->FileWrite->file_write_path = $target_dir;
                    $this->FileWrite->_create_directory();
                    $this->FileWrite->file_write_path = "img" . DS . "ProductIcon" . DS ;
                     $f_name ="prod".rand(100000,999999).date("Y-m-d");
                    $this->FileWrite->_write_file($file, $f_name);
                }
                $this->request->data["Product"]["image"] =  $f_name.".png";
                if ($this->Product->save($this->request->data, false)) {
                    $this->Session->write('flash', array(ADD_RECORD, 'success'));

                } else {
                    $this->Session->write('flash', array(ERROR_MSG, 'failure'));
                }
                $this->redirect(array('controller' => 'Products', 'action' => 'index'));
            }
        }
    }

    /**
     *This function use for product category edit  in admin panel
     * @param string $category_id
     */
    function bandhead_edit($product_id = "")
    {
        $id = base64_decode($product_id);
        $this->loadModel('ProductCategory');
        $this->set("product_cat_list", $this->ProductCategory->find("list", array("conditions" => array("ProductCategory.status" => 1), 'order' => 'ProductCategory.name ASC')));
        $this->loadModel('Product');
        $data = $this->Product->find('first', array('conditions' => array('Product.id' => $id)));
        if (!empty($data)) {
            if (!empty($this->request->data)) {
                $file = $this->request->data["Product"]["image"];
                // $this->request->data = Sanitize::clean($this->request->data, array('encode' => false));
                $this->Product->set($this->request->data);
                if (!empty($file["name"])) {
                    $path = WWW_ROOT . DS . "img" . DS . "ProductIcon" . DS . $this->request->data['Product']['old_image'];
                    $this->FileWrite->delete_file($path);
                    $target_dir = DS . "img" . DS . "ProductIcon" . DS . $this->request->data["Product"]["name"];
                    $this->FileWrite->file_write_path = $target_dir;
                    $this->FileWrite->_create_directory();
                    $this->FileWrite->file_write_path = "img" . DS . "ProductIcon" . DS;
                    $f_name ="prod".rand(100000,999999).date("Y-m-d");
                    $this->FileWrite->_write_file($file, $f_name);
                }
                $cate_name = $this->request->data['Product']['name'];
                if ($this->request->data['Product']['name'] == $data['Product']['name']) {

                    unset($this->request->data['Product']['name']);
                }
                if ($this->request->data['Product']['slug'] == $data['Product']['slug']) {
                    unset($this->request->data['Product']['slug']);
                }
                if (empty($file["name"])) {
                    $this->Product->validator()->remove('image');
                }
                if ($this->Product->validates()) {

                    if (empty($file["name"])) {
                        $this->request->data["Product"]["image"] = $this->request->data["Product"]["old_image"];
                    } else {
                        $this->request->data["Product"]["image"] = $f_name . ".png";
                    }
                    if ($this->Product->save($this->request->data, false)) {
                        $this->Session->write('flash', array(EDIT_RECORD, 'success'));
                        $this->redirect(array('controller' => 'Products', 'action' => 'index'));
                    } else {
                        $this->Session->write('flash', array(FAILURE_MSG, 'failure'));
                        $this->redirect(array('controller' => 'Products', 'action' => 'index'));
                    }
                }
            }
            $this->request->data = $data;
        } else {
            $this->redirect(array('controller' => 'Products', 'action' => 'index'));
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
            $this->Product->id = $category_id;
            if ($this->Product->saveField('status', 1)) {
                $this->Session->write('flash', array(ACTIVATE_RECORD, 'success'));
                $this->redirect(array('controller' => 'Products', 'action' => 'index'));
            } else {
                $this->Session->write('flash', array(FAILURE_MSG, 'failure'));
                $this->redirect(array('controller' => 'Products', 'action' => 'index'));
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
            $this->Product->id = $category_id;
            if ($this->Product->saveField('status', 0)) {
                $this->Session->write('flash', array(INACTIVATE_RECORD, 'success'));
                $this->redirect(array('controller' => 'Products', 'action' => 'index'));
            } else {
                $this->Session->write('flash', array(FAILURE_MSG, 'failure'));
                $this->redirect(array('controller' => 'Products', 'action' => 'index'));
            }
        } else {
            $this->Session->write('flash', array(FAILURE_MSG, 'failure'));
            $this->redirect(array('controller' => 'Products', 'action' => 'index'));
        }
    }

    public function bandhead_view($cat_id)
       {
           $id = base64_decode($cat_id);
           $this->loadModel('Product');
           $product_data = $this->Product->find('first', array('conditions' => array('Product.id' => $id)));
           if (!empty($product_data)) {
               $this->set('product_data', $product_data);
           }
           else {
               $this->redirect(array('controller' => 'Products', 'action' => 'index'));
           }
       }
}