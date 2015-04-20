<?php

define('SITE_URL', "http://" . $_SERVER['HTTP_HOST'] . "/");

define("LOGIN_SUCCESS","Welcome to Wristbands.");

define("LOGOUT_SUCCESS","You have successfully logged out");

define('WRONG_USR_PASS', 'You have entered wrong username or password.');



define('SEND_PASSWORD','Please check your email to change password');

define('EMAIL_ERR','Unable to send email.');

define('EMAIL_ALREADY_SENT','Password reset information already sent, please check your email.');

define('WRONG_EMAIL_USER','Wrong email or new user.');



define('CHANGE_PASSWORD','Password changed successfully');

define('INVALID_LINK','Link is not valid.');



define('INVALID_DETAILS','Please provide details below.');



define('SAVE_SUCC','Data saved successfully.');

define('SAVE_FAIL','Unable to save details.');



define('LIMIT', 10);

define('USER_ADDED_EMAIL_SUBJECT', 'Invite from Wristbands');
define('PASSWORD_RESET_SUCCESS', 'Password saved successfully, please login to continue.');

define('CLIPART_IMAGE_PATH', "img" . DS . "cliparts" . DS);
define('CLIPART_UPLOAD_IMAGE_PATH', "img" . DS . "cliparts" . DS . "uploads" . DS);

define('BANNER_IMAGE_PATH', "img" . DS . "banners" . DS);

define('GALLERY_LARGE_IMAGE_PATH', "img" . DS . "gallery" . DS);
define('GALLERY_SMALL_IMAGE_PATH', "img" . DS . "gallery/small" . DS);

define('PROD_CLR_IMAGE_PATH', "img" . DS . "prodColor" . DS);

define('DEL_SUCC','Record has been deleted successfully.');

define('DEL_FAIL','Unable to delete the record.');


// Email Configuration



define('MAIL_DELIVERY','smtp');

define('SMTP_HOST','ssl://smtp.gmail.com');

define('SMTP_USERNAME','amuk89itworld@gmail.com');

define('SMTP_PWD','89itworld123');

define('SMTP_PORT',"465");

//define('EMAIL_NOTIFICATION','support@89itworld.com');

//define('NOREPLY_EMAIL','donotreply@89itworld.com');

//define("EMAIL_FROM",'info@89itworld.com');

define('EMAIL_NOTIFICATION','amuk89itworld@gmail.com');

define("EMAIL_FROM",'amuk89itworld@gmail.com');

define('NOREPLY_EMAIL','amuk89itworld@gmail.com');

define("CC",'amuk@89itworld.com');



define('PAGINATION_LIMIT',10);

define('ACTIVATE_IMAGE','admin/activate.png');

define('DEACTIVATE_IMAGE','admin/deactive.png');

define('VIEW_IMAGE','admin/view.png');

define('EDIT_IMAGE','admin/edit.png');

define('DELETE_IMAGE','admin/delete.png');
define('ADD_RECORD', ' Record has been added successfully');
define('EDIT_RECORD', ' Record has been update successfully');
define('ALREADY_EXIST','Record already present, please try to edit the record.');
define('DELETE_RECORD', ' Record has been deleted successfully');
define('ACTIVATE_RECORD', ' Record has been activated successfully');
define('INACTIVATE_RECORD', ' Record has been Deactivated successfully');
define('ERROR_MSG', ' Some error occurred to add the Employee.');
define('FAILURE_MSG', ' Some error occurred');


// Paypal Configuration

define('PAYPAL_USERNAME','praveen89_api1.89itworld.com');
define('PAYPAL_PASSWORD','34K7WABC4HU97KTY');
define('PAYPAL_SIGNATURE','AdC6F2ioh3mF5IlJw5NxQGi1FLoOA4ffRDpW.BdE9y.mZm7RmuOzZaNs');


// Authorize Configuration

define("AUTHORIZENET_API_LOGIN_ID", "6tUckZ6Ab5z");
define("AUTHORIZENET_TRANSACTION_KEY", "8364d92QLj8Bw7v3");
define("AUTHORIZENET_SANDBOX", true);


?>