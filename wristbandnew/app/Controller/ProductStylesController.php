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
class ProductStylesController extends AppController
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
       $conditions = array();
        $this->paginate = array(
            'recursive' => 0,
            'limit' => LIMIT,
            'conditions' => $conditions,
            'order' => array(
                'ProductStyle.updated' => 'DESC'
            )
        );
        $result = $this->paginate('ProductStyle');
        //pr($result);
        $this->set('result', $result);
    }

    /**
     * This function use for ProductStyle category add  in admin panel
     */
    function bandhead_add()
    {
        $this->loadModel('ProductCategory');
        $this->set("product_cat_list", $this->ProductCategory->find("list", array("conditions" => array("ProductCategory.status" => 1), 'order' => 'ProductCategory.name ASC')));
        if ($this->request->is('post')) {
            $this->ProductStyle->set($this->request->data);
            $file = $this->request->data["ProductStyle"]["image"];
            $this->request->data = Sanitize::clean($this->request->data, array('encode' => false));
            if ($this->ProductStyle->validates()) {
                if (!empty($file["name"])) {
                    $target_dir = DS . "img" . DS . "ProductSizeIcon" ;
                    $this->FileWrite->file_write_path = $target_dir;
                    $this->FileWrite->_create_directory();
                    $this->FileWrite->file_write_path = "img" . DS . "ProductStyleIcon" . DS ;
                     $f_name ="ProdStyle".rand(100000,999999).date("Y-m-d");
                    $this->FileWrite->_write_file($file, $f_name);
                }
                $this->request->data["ProductStyle"]["image"] =  $f_name.".png";
                if ($this->ProductStyle->save($this->request->data, false)) {
                    $this->Session->write('flash', array(ADD_RECORD, 'success'));

                } else {
                    $this->Session->write('flash', array(ERROR_MSG, 'failure'));
                }
                $this->redirect(array('controller' => 'ProductStyles', 'action' => 'index'));
            }
        }
    }

    /**
     *This function use for ProductStyle category edit  in admin panel
     * @param string $category_id
     */
    function bandhead_edit($product_id = "")
    {
        $id = base64_decode($product_id);
        $this->loadModel('ProductCategory');
        $this->set("product_cat_list", $this->ProductCategory->find("list", array("conditions" => array("ProductCategory.status" => 1), 'order' => 'ProductCategory.name ASC')));
        $this->loadModel('Product');
        $this->set("product_list", $this->Product->find("list", array("conditions" => array("Product.status" => 1), 'order' => 'Product.name ASC')));
        $this->loadModel('ProductStyle');
        $data = $this->ProductStyle->find('first', array('conditions' => array('ProductStyle.id' => $id)));
        if (!empty($data)) {
            if (!empty($this->request->data)) {
                $file = $this->request->data["ProductStyle"]["image"];
                $this->request->data = Sanitize::clean($this->request->data, array('encode' => false));
                $this->ProductStyle->set($this->request->data);
                if (!empty($file["name"])) {
                    $path = WWW_ROOT . DS . "img" . DS . "ProductStyleIcon" . DS . $this->request->data['ProductStyle']['old_image'];
                    $this->FileWrite->delete_file($path);
                    $target_dir = DS . "img" . DS . "ProductStyleIcon";
                    $this->FileWrite->file_write_path = $target_dir;
                    $this->FileWrite->_create_directory();
                    $this->FileWrite->file_write_path = "img" . DS . "ProductStyleIcon" . DS;
                    $f_name ="ProdStyle".rand(100000,999999).date("Y-m-d");
                    $this->FileWrite->_write_file($file, $f_name);
                }
                if ($this->request->data['ProductStyle']['name'] == $data['ProductStyle']['name']&&$this->request->data['ProductStyle']['product_category_id'] == $data['ProductStyle']['product_category_id']) {
                    unset($this->request->data['ProductStyle']['name']);
                     $this->ProductStyle->validator()->remove('name');
                }
                if (empty($file["name"])) {
                    $this->ProductStyle->validator()->remove('image');
                }
              //  pr($this->request->data); die;
                if ($this->ProductStyle->validates($this->request->data)) {
                    if (empty($file["name"])) {
                        $this->request->data["ProductStyle"]["image"] = $this->request->data["ProductStyle"]["old_image"];
                    } else {
                        $this->request->data["ProductStyle"]["image"] = $f_name . ".png";
                    }
                    if ($this->ProductStyle->save($this->request->data, false)) {
                        $this->Session->write('flash', array(EDIT_RECORD, 'success'));
                        $this->redirect(array('controller' => 'ProductStyles', 'action' => 'index'));
                    } else {
                        $this->Session->write('flash', array(FAILURE_MSG, 'failure'));
                        $this->redirect(array('controller' => 'ProductStyles', 'action' => 'index'));
                    }
                }
                else{
                      $errors = $this->ProductStyle->validationErrors;
                    pr($errors);
                }
            }
            $this->request->data = $data;
        } else {
            $this->redirect(array('controller' => 'ProductStyles', 'action' => 'index'));
        }
    }


    /**
     * This function use for ProductStyle category in-active  in admin panel
     * @param string $category_id
     */
    public function bandhead_activate($id = null)
    {
        if (!empty($id)) {
            $category_id = base64_decode($id);
            $this->ProductStyle->id = $category_id;
            if ($this->ProductStyle->saveField('status', 1)) {
                $this->Session->write('flash', array(ACTIVATE_RECORD, 'success'));
                $this->redirect(array('controller' => 'ProductStyles', 'action' => 'index'));
            } else {
                $this->Session->write('flash', array(FAILURE_MSG, 'failure'));
                $this->redirect(array('controller' => 'ProductStyles', 'action' => 'index'));
            }
        } else {
            $this->Session->write('flash', array(FAILURE_MSG, 'failure'));
            $this->redirect(array('controller' => 'ProductCategoryies', 'action' => 'index'));
        }
    }

    /**
     *  This function use for ProductStyle category record active  in admin panel
     * @param null $id
     */
    public function bandhead_deactivate($id = null)
    {
        if (!empty($id)) {
            $category_id = base64_decode($id);
            $this->ProductStyle->id = $category_id;
            if ($this->ProductStyle->saveField('status', 0)) {
                $this->Session->write('flash', array(INACTIVATE_RECORD, 'success'));
                $this->redirect(array('controller' => 'ProductStyles', 'action' => 'index'));
            } else {
                $this->Session->write('flash', array(FAILURE_MSG, 'failure'));
                $this->redirect(array('controller' => 'ProductStyles', 'action' => 'index'));
            }
        } else {
            $this->Session->write('flash', array(FAILURE_MSG, 'failure'));
            $this->redirect(array('controller' => 'ProductStyles', 'action' => 'index'));
        }
    }

    public function bandhead_view($cat_id)
       {
           $id = base64_decode($cat_id);
           $this->loadModel('ProductStyle');
           $product_data = $this->ProductStyle->find('first', array('conditions' => array('ProductStyle.id' => $id)));
           if (!empty($product_data)) {
               $this->set('product_style_data', $product_data);
           }
           else {
               $this->redirect(array('controller' => 'ProductStyles', 'action' => 'index'));
           }
       }


}
