<?php
class User extends AppModel {
        
    var $name = 'User';

    var $validate = array(
        'first_name' => array(
                'notempty' => array(
                    'rule' => 'notempty',
                    'message' => 'Please enter the first name.'
                ), 'rule2' => array(
                    'rule' => '/^[A-Za-z]+$/',
                    'message' => 'Please enter a valid first name.'
                ),
            ),
        'user_type' => array(
            'notempty' => array(
                'rule' => 'notempty',
                'message' => 'Please select User type.'
            )
        ),
        'country' => array(
            'notempty' => array(
                'rule' => 'notempty',
                'message' => 'Please select country.'
            )
        ),
        'email' => array(
            'notempty' => array(
                'rule' => 'notempty',
                'message' => 'Please enter the email Address.'
            ),
            'unique' => array(
                'rule' => 'isUnique',
                'message' => 'This email Address has already been taken.'
            ),
            'email' => array(
                'rule' => 'email',
                'message' => 'Please enter a valid email address.'
            ),
        ),
        'password' => array(
            'notempty' => array(
                'rule' => 'notempty',
                'message' => 'Please enter the current Password.'
            ),
            'maxlength'=>array(
                'rule' => array('maxLength','15'),
                'message' => 'Please choose password of minimum 6 and maximum 15 characters',
            ),
            'minlength'=>array(
                'rule' => array('minLength','6'),
                'message' => 'Please choose password of minimum 6 and maximum 15 characters',
            )
        ),
        'new_pass' =>array(
            'notempty'=>array(
                'rule' => 'notempty',
                'message' => 'Please enter the Password.'
            ),
            'maxlength'=>array(
                'rule' => array('maxLength','15'),
                'message' => 'Please choose password of minimum 6 and maximum 15 characters',
            ),
            'minlength'=>array(
                'rule' => array('minLength','6'),
                'message' => 'Please choose password of minimum 6 and maximum 15 characters',
            )
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
        'confirm_password' =>array(
            'notempty'=>array(
                'rule' => 'notempty',
                'message' => 'Please enter the confirm Password.'
            ),
            'identicalFieldValues' => array (
                'rule' => array('identicalFieldValues', 'password'),
                'message' =>  "The confirm password does not match the password."
            )
        ),
        
    );

    public function beforeSave($options = array()){
            if (isset($this->data[$this->name]['password'])) {
                $this->data[$this->name]['password'] = AuthComponent::password($this->data[$this->name]['password']);
            }
            return true;
        }

    function identicalFieldValues($field = array(), $compare_field = null)
    {
        foreach ($field as $key => $value) {
            $v1 = $value;
            $v2 = $this->data[$this->name][$compare_field];
            if ($v1 !== $v2) {
                return FALSE;
            } else {
                continue;
            }
        }
        return TRUE;
    }
        
        
}
    
    
    
    
?>