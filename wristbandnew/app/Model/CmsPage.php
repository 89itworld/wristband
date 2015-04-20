<?php
class CmsPage extends AppModel

{

    var $name = 'CmsPage';



    var $validate = array(

        'title' => array(

            'notempty' => array(

                'rule' => 'notempty',

                'message' => 'Please enter page title.',

                 "last" => true

            ), 'unique' => array(

                'rule' => 'isUnique',

                'message' => 'This page title has been already used.',

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

              /*  'alphaNumeric' => array(

                    'rule'     => ' /^[A-Za-z]+$/',

                    'message'  => 'Please enter a valid slug.',

                     "last" => true

                ) ,*/

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

        'description' => array(

            'notempty' => array(

                'rule' => 'notempty',

                'message' => 'Please provide page description.',

                 "last" => true

            )

        )

        

    );





}

