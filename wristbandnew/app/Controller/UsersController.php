<?php

 

App::uses('AppController', 'Controller');

App::uses('Sanitize', 'Utility');



class UsersController extends AppController {



   public $components = array('RequestHandler','Email');

   public function beforeFilter(){

        parent::beforeFilter();

        $this->Auth->allow('admin_login','resetpassword');

    }

    

     public function login(){

    

    public function bandhead_login(){

        //echo AuthComponent::password('123456');

        $this->layout = 'findmatic';

        

        $this->_checkLoginStatus();

        

        if ($this->request->is('post')) {

            

            $this->User->set($this->request->data);

            $this->User->validator()->remove('email', 'unique');

            

            if ($this->User->validates()) {

                

                if ($this->Auth->login()){

                    

                    $this->redirect(array('controller' => 'Users', 'action' => 'dashboard','bandhead'=>true));

                } else {

                    

                    $this->Session->write('flash', array('You Have entered wrong username or password.', 'failure'));

                    $this->redirect(array('controller' => 'Users', 'action' => 'login','bandhead'=>'true'));

                }

            }

        }

    }

    

    

    public function bandhead_logout(){

        

        $this->Session->write('flash', array(LOGOUT_SUCCESS, 'success'));

        return $this->redirect($this->Auth->logout());

    }

    

    function bandhead_dashboard() {
    }

    

    /*

     *Add new User

     */

    public function bandhead_addUser(){

        

        App::Import('Model','User');

        $this->User = new User();

        

        $usertypes=array(1=>'Super Admin', 2=>'Admin');

        $this->set('usertypes',$usertypes);

        

        App::Import('Model','Country');

        $this->Country=new Country();

        $countries=$this->Country->find("list",array('fields'=>array('Country.countryCode','Country.countryName')));



        $this->set('countries',$countries);

        

        if ($this->request->is('post')) {

            $this->request->data = Sanitize::clean($this->request->data, array('encode' => false));

            $this->User->set($this->request->data);

            if($this->User->validates()) {

                $activationkey=rand(7, 10).time();

                $this->request->data['User']['activation']=$activationkey;

                $this->request->data['User']['password']='123456';

                if ($this->User->save($this->request->data)) {

                    $link =Router::url('/Users/resetpassword/'.base64_encode($this->User->getLastInsertID()).'/'.base64_encode($activationkey), true);

                    $this->sendMail($this->request->data['User']['email'],USER_ADDED_EMAIL_SUBJECT,'invitation',$link);

                    $this->Session->write('flash', array('User has been added successfully.', 'success'));

                    $this->redirect(array('controller' => 'Users', 'action' => 'dashboard','admin'=>true));

                }

                else {

                    $this->Session->write('flash', array('Some error occurred to add the User.', 'failure'));

                    $this->redirect(array('controller' => 'Users', 'action' => 'dashboard','admin'=>true));

                }

            }

        }

    }



    function sendMail($email = null, $subject = null, $template = null, $data = null) {

        $this->autoRender = false;

        $this->Email->delivery = MAIL_DELIVERY;



        $this->Email->smtpOptions = array('host' => SMTP_HOST, 'username' => SMTP_USERNAME, 'password' => SMTP_PWD, 'port' => SMTP_PORT);



        $this->Email->to = $email;

        $this->Email->cc = CC;

        $this->Email->subject = $subject;

        $from = EMAIL_NOTIFICATION;

        if (!is_null($from) && trim($from) != "") {

            $this->Email->from = $from;

        } else {

            $this->Email->from = false;

            $this->Email->fromName = false;

        }

        $this->Email->template = $template;



        $this->set("data", $data);



        $this->Email->replyTo = NOREPLY_EMAIL;

        $this->Email->sendAs = 'both';



        if ($this->Email->send()) {

            return true;

        } else {

            return false;

        }

    }

    

    /*

     *Edit User

     */

    public function bandhead_editUser($userid){

        $userid=base64_decode($userid);

        App::Import('Model','User');

        $this->User = new User();

        $usertypes=array('1'=>'Super Admin','2'=>'Admin');

        $user=$this->User->find('first',array('conditions'=>array('User.id'=>$userid)));

        App::Import('Model','Country');

        $this->Country=new Country();

        $countries=$this->Country->find("list",array('fields'=>array('Country.countryCode','Country.countryName')));

        $this->set('countries',$countries);

        $this->set('usertypes',$usertypes);

        $this->set('user',$user);

        if ($this->request->is('post')) {

            $this->request->data = Sanitize::clean($this->request->data, array('encode' => false));

            $this->User->set($this->request->data);

            $this->User->validator()->remove('email', 'unique');

            if($this->User->validates()) {

                $this->request->data['User']['id'] = $userid;

                if ($this->User->save($this->request->data)) {

                    $this->Session->write('flash', array('User updated successfully.', 'success'));

                    $this->redirect(array('controller' => 'Users', 'action' => 'editUser',base64_encode($userid),'admin'=>true));

                }

                else {

                    $this->Session->write('flash', array('Some error occurred to add the User.', 'failure'));

                    $this->redirect(array('controller' => 'Users', 'action' => 'editUser',base64_encode($userid),'admin'=>true));

                }

            }

        }

    }



    /*

     *View User

     */

    public function bandhead_viewUser($userid){

            

        $userid=base64_decode($userid);

        

        App::Import('Model','User');

        $this->User = new User();

        

        $usertypes=array('1'=>'Super Admin','2'=>'Admin');

        

        $user=$this->User->find('first',array('conditions'=>array('User.id'=>$userid)));

        App::Import('Model','Country');

        $this->Country=new Country();

        $countries=$this->Country->find("list",array('fields'=>array('Country.countryCode','Country.countryName')));

        $this->set('countries',$countries);

        $this->set('usertypes',$usertypes);

        $this->set('user',$user);

    }

    

    

    /**

    * activate single user

    * @param string $userid

    * @return void

    */

        function bandhead_activate($userid=""){

            $userid=base64_decode($userid);

            App::Import('Model','User');

            $this->User = new User();

            $user_data=$this->User->find('first',array('conditions'=>array('User.id'=>$userid)));

            if(!empty($user_data)){

                $new_user_data['User']['is_active']=1;

                $new_user_data['User']['id']=$user_data['User']['id'];

                if($this->User->save($new_user_data)){

                    $this->Session->write('flash', array('Your selected record has been Activated successfully.', 'success'));

                    $this->redirect(array('controller' => 'Users', 'action' => 'dashboard','admin'=>true));

                }

                else{

                    $this->Session->write('flash', array('Some error occured to Activate the record.', 'failure'));

                    $this->redirect(array('controller' => 'Users', 'action' => 'dashboard','admin'=>true));

                }

            }

            else{

                $this->redirect(array('controller' => 'Users', 'action' => 'dashboard','admin'=>true));

            }

        }

    /**

     * De-active single user

     * @param string $userid

     * @return void

     */

        function bandhead_deactivate($userid=""){

            $userid=base64_decode($userid);

            App::Import('Model','User');

            $this->User = new User();

            $user_data=$this->User->find('first',array('conditions'=>array('User.id'=>$userid)));

            if(!empty($user_data)){

                $new_user_data['User']['is_active']=0;

                $new_user_data['User']['id']=$user_data['User']['id'];

                if($this->User->save($new_user_data)){

                    $this->Session->write('flash', array('Your selected record has been Deactivated successfully.', 'success'));

                    $this->redirect(array('controller' => 'Users', 'action' => 'dashboard','admin'=>true));

                }

                else{

                    $this->Session->write('flash', array('Some error occured to Deactivate the record.', 'failure'));

                    $this->redirect(array('controller' => 'Users', 'action' => 'dashboard','admin'=>true));

                }

            }

            else{

                $this->redirect(array('controller' => 'Users', 'action' => 'dashboard','admin'=>true));

            }

        }

    

     function bandhead_change_password(){
            if (!empty($this->request->data)) {
                $this->User->set($this->request->data);
                if ($this->User->validates()) {
                    $userid = $this->Auth->user('id');
                    $pass = $this->Auth->password($this->request->data['User']['password']);
                    if ($this->User->find('first', array('conditions' => array('User.id' => $userid, 'User.password' => $pass, 'User.user_type' => 1)))) {
                        if ($this->request->data['User']['new_pass'] == $this->request->data['User']['confirm_pass']) {
                            $this->request->data['User']['id'] = $userid;
                            $this->request->data['User']['password'] = $this->request->data['User']['new_pass'];
                            if ($this->User->save($this->request->data)) {
                                $this->Session->write('flash', array('Your Password has been successfully changed.', 'success'));
                                $this->redirect(array('controller' => 'users', 'action' => 'change_password'));
                            }
                            else {
                                $this->Session->write('flash', array('Some error occured to change thje password.', 'failure'));
                                $this->redirect(array('controller' => 'users', 'action' => 'change_password'));
                            }
                        }
                        else {
                            $this->Session->write('flash', array('Password and confirm password did not match.', 'failure'));
                            $this->redirect(array('controller' => 'users', 'action' => 'change_password'));
                        }
                    }
                    else {
                        $this->Session->write('flash', array('You have entered wrong password.', 'failure'));
                        $this->redirect(array('controller' => 'users', 'action' => 'change_password'));
                    }
                }
            }
        }

    

    protected function _checkLoginStatus() {

        

        if ($this->Auth->loggedIn()) {

            

            return $this->redirect($this->Auth->redirect());

        }

                               

    }

}

?>
