<?php
class Contact extends AppModel {
        
    var $name = 'Contact';

    var $validate = array(

        'name' => array(
                'notempty' => array(
                    'rule' => 'notempty',
                    'message' => 'Please enter the name.'
                ), 'rule2' => array(
                    'rule' => '/^[A-Za-z]+$/',
                    'message' => 'Please enter a valid name.'
                ),
            ),

        'message' => array(
            'notempty' => array(
                'rule' => 'notempty',
                'message' => 'Please enter the message.'
            )
        ),

        'email' => array(

            'notempty' => array(

                'rule' => 'notempty',

                'message' => 'Please enter the email Address.'

            ),
            'email' => array(

                'rule' => 'email',

                'message' => 'Please enter a valid email address.'

            ),

        ),
        'mobile' => array(
                'notempty' => array(
                    'rule' => 'notempty',
                    'message' => 'Please enter the Mobile number.'
                ), 'rule2' => array(
                    'rule' => '/^[0-9]{10,15}+$/',
                    'message' => 'Please enter a valid mobile number. (Minimum 10 and Maximum 15 digits required)'
                ),
            ),
    );
}?>