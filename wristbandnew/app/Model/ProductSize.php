<?php
/**
 * Created by IntelliJ IDEA.
 * User: Ankur Chauhan
 * Date: 3/2/15
 * Time: 11:33 AM
 * To change this template use File | Settings | File Templates.
 */

class ProductSize extends AppModel
{
    var $name = 'ProductSize';
    public $belongsTo  = array(

           'ProductCategory' => array(
               'className' => 'ProductCategory',
               'foreignKey' => 'product_category_id'
           ),
           'Product' => array(
               'className' => 'Product',
               'foreignKey' => 'product_id'
           )
       );


    var $validate = array(
          'product_category_id' => array(
            'notempty' => array(
                'rule' => 'notempty',
                'message' => 'Please select category name.'
            )
        ),
        'name' => array(
            'notempty' => array(
                'rule' => 'notempty',
                'message' => 'Please enter product size name.',
                 "last" => true
            ),
            'product_size_unique' => array(
                'rule' => array('product_size_unique','product_category_id'),
                'message' => 'This product size name has been already taken.',
            )
        ),

        /* 'type' => array(
            'notempty' => array(
                'rule' => 'notempty',
                'message' => 'Please enter type.',
                 "last" => true
            )
        ),*/
         "image" => array(
            'check_empty' => array(
                'rule' => 'check_empty',
                'message' => 'Please select the image for icon.' ,
                 "last" => true
            ),
            "check_size" => array(
                "rule" => array("check_size"),
                "message" => "Image size is more than specified size.",
                 "last" => true

            ),
            "check_format" => array(
                "rule" => array("validate_file"),
                "message" => "File upload Error , Please upload proper file format ONLY.",
            )
        ),
    );

    /**
     * check name unique
     * @param  $data
     * @return void
     */
    function product_size_unique($data = array(), $compare_field = null)
    {
       $cat_id =$this->data[$this->name][$compare_field];
        try {
            $data = $this->find('first', array('conditions' => array('ProductSize.name' => $data["name"],'ProductSize.product_category_id' => $cat_id)));
            if (!empty ($data)) {
                return false;
            } else {
                return true;
            }
        } catch (Exception $exception) {
            echo $exception->getMessage();
        }
    }

     /**
     * check file not empty
     * @param  $data
     * @return void
     */
    function check_empty($data)
    {
        try {
            $file_name = $data["image"]["name"];
            if (!empty ($file_name)) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $exception) {
            echo $exception->getMessage();
        }
    }

    /**
     *
     * @param  $data
     * @return bool
     */
    function validate_file($data)
    {
        try {

            $file_name = $data["image"]["name"];
            if (!empty($file_name)) {
                $tempFile = new File($file_name);
                $ext = $tempFile->ext();
                $ext = strtolower($ext);
                $types = array("gif", "jpg", "jpeg","png", "pjpeg", "x-png", "x-tiff" );
                $val = in_array($ext, $types, true);
                if ($val) {
                    return true;
                }
                return false;
            }
            return true;
        } catch (Exception $exception) {
            echo $exception->getMessage();
        }
    }

    /**
     *
     * @param  $data
     * @return bool
     */
    function check_size($data)
    {  // pr($data); die;
        try {
            $file_name = $data["image"]["name"];
            if (!empty ($file_name)) {
                $size = $data["image"]["size"];
                if ($size <= 300000) { //1MB
                    return true;
                }
                return false;
            }
            return false;
        } catch (Exception $exception) {
            echo $exception->getMessage();
        }
    }

}
