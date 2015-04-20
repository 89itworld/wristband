<?php

class Font extends AppModel
{
	var $name = 'Font';
	
	var $validate = array(
          
        'name' => array(
            'notempty' => array(
                'rule' => 'notempty',
                'message' => 'Please enter font style name.',
                 "last" => true
            )
        ),

         "image" => array(
            'check_empty' => array(
                'rule' => 'check_empty',
                'message' => 'Please select the fontimage.' ,
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
     * check file not empty
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
	
	/*
	 * for checking the file size
	 */
	function check_size($data)
    {  
        try {
            $file_name = $data["image"]["name"];
            if (!empty ($file_name)) {
                $size = $data["image"]["size"];
                if ($size <= 1000000) { //1MB
                    return true;
                }
                return false;
            }
            return false;
        } catch (Exception $exception) {
            echo $exception->getMessage();
        }
    }
	
	/*
	 * for validating the file
	 */
	function validate_file($data)
    {
        try {

            $file_name = $data["image"]["name"];
            if (!empty($file_name)) {
                $tempFile = new File($file_name);
                $ext = $tempFile->ext();
                $ext = strtolower($ext);
                //$types = array("gif", "jpg", "jpeg","png", "pjpeg", "x-png", "x-tiff" );
                $types = array("ttf","otf","eot","svg","woff");
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
}
	