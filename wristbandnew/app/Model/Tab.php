<?php

class Tab extends AppModel
{
	var $name = 'Tab';	
	var $hasMany=array('SubTab'=>array('className'=>'SubTab','conditions'=>array('SubTab.status'=>1)));
    
   	var $validate = array(
      'name' => array(
          'notempty' => array(
                'rule' => 'notempty',
                'message' => 'Please enter tab name.',
                 "last" => true
            ), 
            'unique' => array(
                'rule' => 'isUnique',
                'message' => 'This tab name has been already used.',
                 "last" => true
            )
        ),'slug' => array(
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
                'minlength'=>array(
                    'rule' => array('minLength','3'),
                    'message' => 'Slug must be atleast 3 characters long.',
                     "last" => true
                ),
                'maxlength'=>array(
                    'rule' => array('maxLength','50'),
                    'message' => 'Slug must be atmost 50 characters long.',
                )
        ),
        /*'description' => array(
            'notempty' => array(
                'rule' => 'notempty',
                'message' => 'Please provide page description.',
                 "last" => true
            )
        )*/
    );

}



