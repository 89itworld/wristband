<?php
App::uses('AppController', 'Controller');
App::uses('Sanitize', 'Utility');
App::uses('Paypal', 'Paypal.Lib');
class HomesController extends AppController
{
    public $components = array('RequestHandler', 'Email');
    public function beforeFilter()
    {
        parent::beforeFilter();
        $this->Auth->allow('index', 'contact_us', 'resetpassword', 'paypalCkOut', 'returnMe', 'cancelMe', 'AuthorizeCkOut', 'colors', 'gallery');
    }

    public function index()
    {
        $this->layout = 'front';
        $this->loadModel("ProductCategory");
        $this->loadModel("Product");
        $this->Product->bindModel(array('hasMany' => array('Price' => array(
            'className' => 'Price',
            'conditions' => 'Price.qty = "100000+"',
            'limit' => '1'
        ))), true);
        $this->Product->unbindModel(array('belongsTo' => array('ProductCategory')), true);
        $product_result = $this->ProductCategory->get_all_product_by_category();
        //pr($product_result);
        $this->set("prod_result", $product_result);
    }

    public function contact_us()
    {
        $this->layout = "front";
        if ($this->request->is('post')) {
            $this->loadModel("Contact");
            $this->Contact->set($this->request->data);
            $this->request->data = Sanitize::clean($this->request->data, array('encode' => false));
            if ($this->Contact->validates()) {
                if ($this->Contact->save($this->request->data, false)) {
                    $name = $this->request->data["Contact"]['name'];
                    $mobile = $this->request->data["Contact"]['mobile'];
                    $email = $this->request->data["Contact"]['email'];
                    $message = $this->request->data["Contact"]['message'];
                    $subject = "Contact US";
                    $this->sendMail($email, $subject, "", $message);
                    $this->Session->write('flash', array("Your message send successfully our team.", 'success'));
                } else {
                    $this->Session->write('flash', array(ERROR_MSG, 'failure'));
                }
                $this->redirect(array('controller' => 'Homes', 'action' => 'contact_us'));
            }
        }
    }

    function sendMail($email = null, $subject = null, $template = null, $data = null)
    {

        $this->autoRender = false;

        $this->Email->delivery = MAIL_DELIVERY;

        $this->Email->smtpOptions = array('host' => SMTP_HOST, 'username' => SMTP_USERNAME, 'password' => SMTP_PWD, 'port' => SMTP_PORT);

        $this->Email->to = "ankur@89itworld.com";

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

    function resetpassword($id, $activationkey)
    {

        $key = base64_decode($activationkey);

        $userid = base64_decode($id);

        $this->layout = 'findmatic';

        App::Import('Model', 'User');

        $this->User = new User();

        $user = $this->User->find('first', array('conditions' => array('User.id' => $userid, 'User.activation' => $key)));

        if (!empty($user)) {

            $data = array('userid' => $userid, 'activation' => $key);

            $this->set('data', $data);

            if ($this->request->is('post')) {

                $this->User->set($this->request->data);

                if ($this->User->validates()) {

                    $this->request->data['User']['id'] = $userid;

                    $this->request->data['User']['verified'] = 1;

                    unset($this->request->data['User']['confirm_password']);

                    if ($this->User->save($this->request->data)) {

                        $this->Session->write('flash', array(PASSWORD_RESET_SUCCESS, 'success'));

                        $this->redirect(array('controller' => 'Users', 'action' => 'resetpassword', $id, $activationkey));

                    }

                }

            }

        } else {

            $this->redirect(array('controller' => 'Users', 'action' => 'login', 'admin' => true));

        }

    }

    protected function _checkLoginStatus()
    {

        if ($this->Auth->loggedIn()) {

            return $this->redirect($this->Auth->redirect());

        }

    }

    public function paypalCkOut()
    {
        
        $this->layout = false;

        $this->autoRender = false;
        
        if ($this->Session->check('Cart')) {
           
           $prodDetails = $this->Session->read('Cart');
           
           $this->loadModel('OrderDummyDetail');
           $details = $this->OrderDummyDetail->find('first', array('conditions' => array('OrderDummyDetail.order_id' => $prodDetails['order_id'])));
           
           if (!empty($details)) {

               $shipping = filter_var(trim(explode('(', $details['OrderDummyDetail']['shipping_time'])[1]), FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
               
               $production = filter_var(trim(explode('(', $details['OrderDummyDetail']['production_time'])[1]), FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
               
               //pr($details);die;
               
               $this->Paypal = new Paypal(array(
        
                    'sandboxMode' => true,
        
                    'nvpUsername' => PAYPAL_USERNAME,
        
                    'nvpPassword' => PAYPAL_PASSWORD,
        
                    'nvpSignature' => PAYPAL_SIGNATURE
        
               ));
        
                $order = array(
        
                    'description' => 'Your purchase with Brandnex store',
        
                    'currency' => 'USD',
        
                    'return' => Router::url(array('controller'=>'Homes', 'action'=>'succTrans'), true),
        
                    'cancel' => Router::url(array('controller'=>'Homes', 'action'=>'failTrans'), true),
        
                    'custom' => 'Brandnex',
                    
                    'items' => array(
                        
                        0 => array(
                            'name' => $details['OrderDummyDetail']['category'].' '.ucfirst($details['OrderDummyDetail']['product']).' » '.ucfirst($details['OrderDummyDetail']['style']),
            
                            'description' => 'Size '.$details['OrderDummyDetail']['size'],
        
                            'tax' => 0.00,
        
                            'subtotal' => $details['OrderDummyDetail']['price'],
            
                            'qty' => 1,
                        )
                    )

                );
        
                try {
        
                    $this->redirect($this->Paypal->setExpressCheckout($order));
        
                } catch (Exception $e) {
        
                    $e->getMessage();
        
                }
            } else {
                
                return $this->redirect( array('controller' => 'Orders', 'action' => 'checkout'));
            }
           
        } else {
           
           return $this->redirect( array('controller' => 'Homes', 'action' => 'index'));
        }
        

    }

    public function succTrans($token = null, $payerId = null)
    {

        echo "Transaction successful with payer Id" . $payerId;

    }

    public function failTrans($token = null)
    {

        echo "Transaction failed";

    }

    
    public function colors() {

        $this->layout = "front";
        
        $this->loadModel('Color');

        $colors = $this->Color->find('all', array('conditions' => array('Color.is_active' => 1), 'fields' => array('Color.hex_value', 'Color.name')));
        
        //pr($colors);
        $this->set('colors', $colors);
    }
    
    public function gallery() {

        $this->layout = "front";
        
        $this->loadModel('Gallery');
        
        $this -> paginate = array('recursive' => -1, 'limit' => 16, 'conditions' => array('Gallery.is_active' => 1), 'fields' => array('Gallery.image') );

        $gallery = $this -> paginate('Gallery');
        $this->set('gallery', $gallery);
    }
    
    
    
}

?>