<?php

class Clipart extends AppModel
{
    var $name = 'Clipart';

    var $validate = array(
        'name' => array(
            'notempty' => array(
                'rule' => 'notempty',
                'message' => 'Please enter clipart name.',
                 "last" => true
            ), 'unique' => array(
                'rule' => 'isUnique',
                'message' => 'This clipart name has been already taken.',
                 "last" => true
            ), 'rule2' => array(
                'rule' => '/^[a-zA-Z, ]*$/',
                'message' => 'Only letters and spaces and allowed'
            )
        ),
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
    {  //pr($data); die;
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
