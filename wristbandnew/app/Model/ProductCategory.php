<?php
/**
 * Created by IntelliJ IDEA.
 * User: Ankur Chauhan
 * Date: 3/2/15
 * Time: 11:33 AM
 * To change this template use File | Settings | File Templates.
 */

class ProductCategory extends AppModel
{
    var $name = 'ProductCategory';
    
     public $hasMany  = array(
           'Product' => array(
               'className' => 'Product',

           ),
           'ProductSize' => array(
               'className' => 'ProductSize',

           ),
           'ProductStyle' => array(
               'className' => 'ProductStyle',

           ),
           'ProductColor' => array(
               'className' => 'ProductColor',

           )

       );
    
    var $validate = array(
        'name' => array(
            'notempty' => array(
                'rule' => 'notempty',
                'message' => 'Please enter category name.',
                 "last" => true
            ), 'unique' => array(
                'rule' => 'isUnique',
                'message' => 'This  category name has been already taken.',
                 "last" => true
            ), 'rule2' => array(
                'rule' => '/^[a-zA-Z&, ]*$/',
                'message' => 'Only letters and spaces and (&,) are allowed'
            )
        ),

         'slug' => array(
                'notempty' => array(
                    'rule' => 'notempty',
                    'message' => 'Please enter the slug.',
                     "last" => true
                ),
                'unique' => array(
                    'rule' => 'isUnique',
                    'message' => 'Slug has been already added.' ,
                     "last" => true
                ),
                'alphaNumeric' => array(
                    'rule'     => ' /^[A-Za-z]+$/',
                    'message'  => 'Please enter a valid slug.',
                     "last" => true
                ) ,
                'minlength'=>array(
                    'rule' => array('minLength','3'),
                    'message' => 'Slug must be atleast 3 characters long.',
                     "last" => true
                ),
                'maxlength'=>array(
                    'rule' => array('maxLength','50'),
                    'message' => 'Slug must be atmost 50 characters long.',
                )
            ) ,
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
                "last" => true
            ),

        ),


    );

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
	
	 function get_all_product_by_category(){
        $this->recursive = 2;
       $result=$this->find("first",array('conditions'=>array('ProductCategory.id'=>1)));
       // $result=$this->findById(1);
        // pr($result);
        return $result;
    }

    function get_wristband_category_price(){
        $this->recursive = 2;
       // $this->bindModel(array('hasMany' =>array('Price')), true);
        $this->unbindModel(array('hasMany' =>array('ProductSize','ProductStyle')), true);
       // $result=$this->find("all",array('fields'=>array('ProductCategory.name','Product.name','Product.image','Price.price','Price.qty','Price.free_qty'),'conditions'=>array('ProductCategory.id'=>1)));
        $result=$this->find("first",array('fields'=>array(),'conditions'=>array('ProductCategory.id'=>1)));
       // $result=$this->findById(1);
       // pr($result) ;
        return $result;
    }
	

}
