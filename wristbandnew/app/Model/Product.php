<?php
/**
 * Created by IntelliJ IDEA.
 * User: Ankur Chauhan
 * Date: 3/2/15
 * Time: 11:33 AM
 * To change this template use File | Settings | File Templates.
 */

class Product extends AppModel
{
    var $name = 'Product';
    
    public $actsAs = array('Containable');
    
    public $belongsTo  = array(

           'ProductCategory' => array(
               'className' => 'ProductCategory',
               'foreignKey' => 'product_category_id'
           )
       );
  

    var $validate = array(
        'name' => array(
            'notempty' => array(
                'rule' => 'notempty',
                'message' => 'Please enter product name.',
                 "last" => true
            ), 'unique' => array(
                'rule' => 'isUnique',
                'message' => 'This product name has been already taken.',
                 "last" => true
            ), 'rule2' => array(
                'rule' => '/^[a-zA-Z&, ]*$/',
                'message' => 'Only letters and spaces and (&,) are allowed'
            )
        ),
         'product_category_id' => array(
            'notempty' => array(
                'rule' => 'notempty',
                'message' => 'Please select category name.',
                 "last" => true
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

    

}