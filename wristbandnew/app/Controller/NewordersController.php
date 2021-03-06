<?php
App::uses('AppController', 'Controller');
App::uses('Sanitize', 'Utility');

App::import('Vendor', 'image-master', array('file' => 'image-master/vendor/autoload.php'));

// import the Intervention Image Manager Class
use Intervention\Image\ImageManagerStatic as Image;

class NewordersController extends AppController
{
    public $components = array('RequestHandler', 'FileWrite');
    // before filter function of Users Controller

    public function beforeFilter()
    {
        parent::beforeFilter();
        $this->Auth->allow();
    }
    /**
     * This function use for product category Listing  in admin panel
     */

    function bandhead_index()
    {
        $conditions = array();

        $this->paginate = array(

            'recursive' => 0,

            'limit' => LIMIT,

            'conditions' => $conditions,

            'group' => array('product_size_id', 'product_style_id'),

            'order' => array(

                'Order.updated' => 'DESC'

            )

        );

        $result = $this->paginate('Order');

        //pr($result);

        $this->set('result', $result);

    }

    public function bandhead_view($order_id)
    {
        $id = base64_decode($order_id);

        $this->loadModel('Order');

        $product_data = $this->Order->find('first', array('conditions' => array('Order.id' => $id)));

        $result = $this->Order->find('all', array('conditions' => array('Order.product_category_id' => $product_data['Order']['product_category_id'], 'Order.product_id' => $product_data['Order']['product_id'], 'Order.product_size_id' => $product_data['Order']['product_size_id'], 'Order.product_style_id' => $product_data['Order']['product_style_id'])));
        if (!empty($result)) {

            $this->set('price_data', $result);

        }

        else {

            $this->redirect(array('controller' => 'Orders', 'action' => 'index'));
        }

    }
    
    public function custom_wristbands($prod_slug=null) {
            
        $this->layout = "front";
        if($prod_slug == null){
             $wrist_type=0;
         }else{

             $wrist_type=$prod_slug;}
        $this->set("wrist_type",$wrist_type);
        $this->loadModel('Clipart');
        $cliparts = $this->Clipart->find('all', array('conditions' => array('Clipart.is_active' => 1), 'fields' => array('Clipart.id','Clipart.name', 'Clipart.image')));
        
        $this->loadModel('Font');
        $fonts = $this->Font->find('all', array('conditions' => array('Font.status' => 1), 'fields' => array('Font.name', 'Font.image')));
        
        $this->loadModel('ProductStyle');
        $styles = $this->ProductStyle->find('all', array('conditions' => array('ProductStyle.product_category_id' => 1), 'fields' => array('ProductStyle.name', 'ProductStyle.id')));
        
        $this->loadModel('ProductionDummyPrice');
        
        $production = $this->ProductionDummyPrice->find('all', array('conditions' => array('ProductionDummyPrice.product_category_id' => 1, 'ProductionDummyPrice.product_id' => 3, 'ProductionDummyPrice.product_size_id' => 2, 'ProductionDummyPrice.product_style_id' => 1, 'ProductionDummyPrice.qty_id' => 1), 'fields' => array('ProdDay.days', 'ProdDay.title', 'ProductionDummyPrice.price')));
        
        $this->loadModel('ShipTimeDummyPrice');
        $shipping = $this->ShipTimeDummyPrice->find('all', array('conditions' => array('ShipTimeDummyPrice.product_category_id' => 1, 'ShipTimeDummyPrice.product_id' => 3, 'ShipTimeDummyPrice.product_size_id' => 2, 'ShipTimeDummyPrice.product_style_id' => 1), 'fields' => array('MetaDay.days', 'MetaDay.name', 'ShipTimeDummyPrice.price')));
        //pr($shipping); die;
        $this->loadModel('Product');
        //$productData = $this->Product->find('all', array('conditions' => array('Product.product_category_id' => 1), 'recursive' => 1) );
        
        $this->Product->bindModel(array(
            'hasMany' => array(
                'ProductSize' => array(
                    'className' => 'ProductSize'
                ),
                'ProductStyle' => array(
                    'className' => 'ProductStyle'
                ),
                'ProductColor' => array(
                    'className' => 'ProductColor'
                )
            )
        ), true);
        
        
        $this->Product->Behaviors->load('Containable');
            
        $productData = $this->Product->find('all', array('conditions' => array('Product.product_category_id' => 1), 'fields' => array('id', 'name', 'ref', 'min_qty', 'image'), 'contain' => array( 'ProductSize' => array( 'conditions' => array('ProductSize.product_category_id' => 1), 'fields' => array('id', 'name', 'ref', 'type', 'image'), ), 'ProductStyle' => array( 'conditions' => array('ProductStyle.product_category_id' => 1), 'fields' => array('id', 'name', 'image'), ), 'ProductColor' => array( 'conditions' => array('ProductColor.product_category_id' => 1), 'fields' => array('id', 'name', 'image', 'product_style_id')) ) ));
        
        //pr($productData);
        //$log = $this->Product->getDataSource()->getLog(false, false);
        //debug($log);
        //die;
        
        $this->set(compact('cliparts', 'fonts', 'productData', 'styles'));
    }
    
    
     public function lanyards() {
             $this->layout="front";

    }

    

    public function tyvek_bands() {

        $this->layout="";



    }
    
    public function vinyl_bands() {
        
        return $this->redirect( array('controller' => 'orders', 'action' => 'custom_wristbands') );
    }
    
    public function plastic_bands() {
        
        return $this->redirect( array('controller' => 'orders', 'action' => 'custom_wristbands') );
    }
    
    public function tattoos() {
        
        return $this->redirect( array('controller' => 'orders', 'action' => 'custom_wristbands') );
    }
    
    public function createIllustration() {
        
        $this->autoRender = FALSE;
        
        if (!empty($_POST)) {
            
            $text = $_POST['text'];
            $img = $_POST['img'];
            

            $font_size = 20;
            $text_angle = 0;
            $text_padding = 10;
            
            $fontpath = realpath('fonts');
            putenv('GDFONTPATH='.$fontpath);
            $font = 'arial-black-bold.ttf';
            
            $the_box = $this->_calculateTextBox($text, $font, $font_size, $text_angle);
            
            $imgWidth = $the_box["width"] + $text_padding;
            $imgHeight = $the_box["height"] + $text_padding; 
            
            $im = imagecreatetruecolor($imgWidth, $imgHeight);
            
            // Create some colors
            $grey = imagecolorallocate($im, 238, 238, 238);
            $lightGrey = imagecolorallocate($im, 50, 50, 50);
            $shadow_color = imagecolorallocate($im,0x99,0x99,0x99);
            
            imagefilledrectangle($im, 0, 0, ($imgWidth-1), ($imgHeight-1), $grey);
            
            $this->_imagettftextblur($im,$font_size,0,$the_box["left"] + 5,$the_box["top"] + 5,$shadow_color,$font,$text,5);
            $this->_imagettftextblur($im,$font_size,0,$the_box["left"],$the_box["top"],$lightGrey,$font,$text);
            // Add the text
            //imagettftext($im, $font_size, $text_angle, 10, 34, $lightGrey, $font, $text);
        
            if (imagepng($im, WWW_ROOT."img/".$img)) {
                
                imagedestroy($im);
                echo "1";
            } else {
                
                echo "0";
            }
        }        
    }    

    
    protected function _calculateTextBox($text,$fontFile,$fontSize,$fontAngle) {

        $rect = imagettfbbox($fontSize,$fontAngle,$fontFile,$text);
        $minX = min(array($rect[0],$rect[2],$rect[4],$rect[6]));
        $maxX = max(array($rect[0],$rect[2],$rect[4],$rect[6]));
        $minY = min(array($rect[1],$rect[3],$rect[5],$rect[7]));
        $maxY = max(array($rect[1],$rect[3],$rect[5],$rect[7]));
       
        return array(
         "left"   => abs($minX) - 1,
         "top"    => abs($minY) - 1,
         "width"  => $maxX - $minX,
         "height" => $maxY - $minY,
         "box"    => $rect
        );
    } 
    
    protected function _imagettftextblur(&$image,$size,$angle,$x,$y,$color,$fontfile,$text,$blur_intensity = null) {
        
        $blur_intensity = !is_null($blur_intensity) && is_numeric($blur_intensity) ? (int)$blur_intensity : 0;
        if ($blur_intensity > 0)
        {
            $text_shadow_image = imagecreatetruecolor(imagesx($image),imagesy($image));
            imagefill($text_shadow_image,0,0,imagecolorallocate($text_shadow_image,0x00,0x00,0x00));
            imagettftext($text_shadow_image,$size,$angle,$x,$y,imagecolorallocate($text_shadow_image,0xFF,0xFF,0xFF),$fontfile,$text);
            for ($blur = 1;$blur <= $blur_intensity;$blur++)
                imagefilter($text_shadow_image,IMG_FILTER_GAUSSIAN_BLUR);
            for ($x_offset = 0;$x_offset < imagesx($text_shadow_image);$x_offset++)
            {
                for ($y_offset = 0;$y_offset < imagesy($text_shadow_image);$y_offset++)
                {
                    $visibility = (imagecolorat($text_shadow_image,$x_offset,$y_offset) & 0xFF) / 255;
                    if ($visibility > 0)
                        imagesetpixel($image,$x_offset,$y_offset,imagecolorallocatealpha($image,($color >> 16) & 0xFF,($color >> 8) & 0xFF,$color & 0xFF,(1 - $visibility) * 127));
                }
            }
            imagedestroy($text_shadow_image);
        }
        else
            return imagettftext($image,$size,$angle,$x,$y,$color,$fontfile,$text);
    }
    
    
    public function colors() {

        $this->autoRender = false;
        
        $this->loadModel('Color');
        $colors = $this->Color->find('all', array('conditions' => array('Color.is_active' => 1), 'fields' => array('Color.hex_value', 'Color.name')));
        
        if (!empty($colors)) {
            
            foreach ($colors as $key => $value) {
                
                $result['colors'][] = array('colorTitle' => $value['Color']['name'], 'colorCode' => str_replace('#', '', $value['Color']['hex_value'])); 
            }
        }
        
        $this->loadModel('Font');
        $fonts = $this->Font->find('all', array('conditions' => array('Font.status' => 1), 'fields' => array('Font.name', 'Font.image')));
        
        if (!empty($fonts)) {
            
            foreach ($fonts as $key => $value) {
                
                $result['font'][] = array('title' => $value['Font']['name'], 'image' => $value['Font']['image'] ); 
            }
        }
        
        echo json_encode($result);
        exit();
    }
    
    
    public function prices() {

        $this->autoRender = false;
        
        $this->loadModel('Quantity');
        $extra_prices = $this->Quantity->find('all');
        
        if (!empty($extra_prices)) {
            
            foreach ($extra_prices as $key => $value) {
                
                $result['prodShipQty'][] = array('quantity_id' => $value['Quantity']['id'], 'qty_value' => $value['Quantity']['value']); 
            }
        }
        
        $this->loadModel('MetaDay');
        $shipping_prices = $this->MetaDay->find('all');
        
        if (!empty($shipping_prices)) {
            
            foreach ($shipping_prices as $key => $value) {
                
                $result['shipping'][] = array('shipping_id' => $value['MetaDay']['id'], 'ship_days' => $value['MetaDay']['days'], 'ship_title' => $value['MetaDay']['name']); 
            }
        }
        
        $this->loadModel('ShipTimeDummyPrice');
        $ship_dummy_prices = $this->ShipTimeDummyPrice->find('all', array('conditions' => array('ShipTimeDummyPrice.product_category_id' => 1)));
        
        if (!empty($ship_dummy_prices)) {
            
            foreach ($ship_dummy_prices as $key => $value) {
                
                $result['shipPrice'][] = array('style_id' => $value['ShipTimeDummyPrice']['product_id'], 'size_id' => $value['ShipTimeDummyPrice']['product_size_id'], 'type_id' => $value['ShipTimeDummyPrice']['product_style_id'], 'qty_id' => $value['ShipTimeDummyPrice']['qty_id'], 'ship_id' => $value['ShipTimeDummyPrice']['meta_day_id'], 'price' => $value['ShipTimeDummyPrice']['price']); 
            }
        }
        
        $this->loadModel('ProdDay');
        $prod_days = $this->ProdDay->find('all');
        
        if (!empty($prod_days)) {
            
            foreach ($prod_days as $key => $value) {
                
                $result['production'][] = array('production_id' => $value['ProdDay']['id'], 'prod_days' => $value['ProdDay']['days'], 'prod_title' => $value['ProdDay']['title']); 
            }
        }
        
        $this->loadModel('ProductionDummyPrice');
        $dummy_prices = $this->ProductionDummyPrice->find('all', array('conditions' => array('ProductionDummyPrice.product_category_id' => 1)));
        
        if (!empty($dummy_prices)) {
            
            foreach ($dummy_prices as $key => $value) {
                
                $result['prodPrice'][] = array('style_id' => $value['ProductionDummyPrice']['product_id'], 'size_id' => $value['ProductionDummyPrice']['product_size_id'], 'type_id' => $value['ProductionDummyPrice']['product_style_id'], 'qty_id' => $value['ProductionDummyPrice']['qty_id'], 'prod_id' => $value['ProductionDummyPrice']['prod_day_id'], 'price' => $value['ProductionDummyPrice']['price']); 
            }
        }
        
        $this->loadModel('PriceQuantity');
        $price_quants = $this->PriceQuantity->find('all', array('conditions' => array('PriceQuantity.product_category_id' => 1)));
        
        if (!empty($price_quants)) {
            
            foreach ($price_quants as $key => $value) {
                
                $result['priceQty'][] = array('quantity_id' => $value['PriceQuantity']['id'], 'qty_value' => $value['PriceQuantity']['value']); 
            }
        }
        
        $this->loadModel('ProductDummyPrice');
        $prod_prices = $this->ProductDummyPrice->find('all', array('conditions' => array('ProductDummyPrice.product_category_id' => 1)));
        
        if (!empty($prod_prices)) {
            
            foreach ($prod_prices as $key => $value) {
                
                $result['bandPrice'][] = array('style_id' => $value['ProductDummyPrice']['product_id'], 'size_id' => $value['ProductDummyPrice']['product_size_id'], 'type_id' => $value['ProductDummyPrice']['product_style_id'], 'qty_id' => $value['ProductDummyPrice']['qty_id'], 'price' => $value['ProductDummyPrice']['price']); 
            }
        }
        
        echo json_encode($result);
        exit();
    }    
    
    
    public function extraPrices() {

        $this->autoRender = false;
        
        $this->loadModel('ExtraPriceQuantity');
        $extra_prices = $this->ExtraPriceQuantity->find('all');
        
        if (!empty($extra_prices)) {
            
            foreach ($extra_prices as $key => $value) {
                
                $result['extraPriceQty'][] = array('quantity_id' => $value['ExtraPriceQuantity']['id'], 'qty_value' => $value['ExtraPriceQuantity']['value']);
            }
        }
        
        $this->loadModel('OtherPrice');
        $other_prices = $this->OtherPrice->find('all', array('conditions' => array('OtherPrice.product_category_id' => 1)));
        
        if (!empty($other_prices)) {
            
            foreach ($other_prices as $key => $value) {
                
                $result['otherPrice'][] = array('style_id' => $value['OtherPrice']['product_id'], 'size_id' => $value['OtherPrice']['product_size_id'], 'type_id' => $value['OtherPrice']['product_style_id'], 'qty_id' => $value['OtherPrice']['quantity_id'], 'front_msg_extra' => $value['OtherPrice']['front_msg_extra'], 'internal_msg' => $value['OtherPrice']['internal_msg'], 'internal_msg_extra' => $value['OtherPrice']['internal_msg_extra'], 'back_msg' => $value['OtherPrice']['back_msg'], 'back_msg_extra' => $value['OtherPrice']['back_msg_extra'], 'logo' => $value['OtherPrice']['logo'] ,'keychain' => $value['OtherPrice']['keychain'], 'warpper' => $value['OtherPrice']['wrapper'], 'thickness_2mm' => $value['OtherPrice']['thickness_2mm']); 
            }
        }
        echo json_encode($result);
        exit();
    }
    
    
    public function clipUpload() {

        $this->autoRender = false;
        
        if ($this->request->is('post')) {
            
            if (isset($_FILES) && ($_FILES['file']['error'] == 0) ) {
                
                $filename = $this->FileWrite->_save_image($_FILES['file'], CLIPART_UPLOAD_IMAGE_PATH, $_POST['name']);
                $result = array('jsonrpc' => '2.0', 'result' => null, 'id' => 'id');
                echo json_encode($result);
                exit();
            }
        }
    }


    public function imageEffects()
    {
        $this->autoRender = false;
        
        Image::configure(array('driver' => 'gd'));
        
        if( ( isset($this->params['url']['style']) && !empty($this->params['url']['style']) ) && ( isset($this->params['url']['color']) && !empty($this->params['url']['color']) ) ){
            
            $style = $this->params['url']['style'];
            $color = $this->params['url']['color'];
        }else{
            
            throw new NotFoundException();
        }
        
        if($style == 'solid'){
            
            $img = Image::canvas(150,104, '#'.$color)->insert(WWW_ROOT.DS.IMAGES_URL.'test/2.png');
            $img->sharpen(5);
            $img->save(WWW_ROOT.DS.IMAGES_URL.'test/tes.png');
            
            echo $img->response();
        }elseif($style == 'segmented'){
            
            // create empty canvas
            $img = Image::canvas(1000,690);
            
            $points = array(
                0 => array(403,13,400,24,401,47,390,54,393,108,402,111,398,126,407,133,409,173,456,170,527,170,575,174,615,176,659,181,685,189,717,199,745,208,749,200,753,188,761,180,760,171,767,162,768,155,776,146,770,133,806,106,805,63,760,45,724,32,668,20,623,15,565,11), 
                1 => array(801,62,848,85,896,116,935,144,959,170,970,190,989,225,992,283,991,329,976,462,950,514,903,561,845,604,805,623,791,603,795,578,774,546,771,512,748,488,742,467,781,456,805,443,833,431,855,420,882,407,903,394,928,370,943,355,920,324,896,302,870,278,833,250,811,239,779,222,748,208,746,187,758,179,755,172,765,165,761,156,774,146,770,131,803,106), 
                2 => array(745,466,750,489,773,507,776,551,793,567,796,591,792,603,805,608,806,621,798,625,765,640,700,663,615,680,552,686,466,689,406,684,406,671,414,660,409,642,419,627,415,614,415,589,421,568,420,542,430,531,431,524,437,518,437,500,487,503,530,502,578,499,672,488,716,475), 
                3 => array(438,508,436,501,370,492,314,482,269,470,230,457,205,447,173,432,143,419,127,434,128,442,95,473,100,482,87,489,90,496,54,533,108,582,162,615,279,660,360,676,386,680,405,684,405,672,414,663,415,633,420,621,421,590,420,586,424,552,429,533,437,517), 
                4 => array(90,121,91,232,101,238,99,248,111,252,108,264,119,269,116,278,124,284,106,302,74,328,59,343,60,351,76,367,95,382,115,399,144,419,127,439,131,445,98,473,102,481,88,492,90,499,55,536,33,507,17,473,13,420,8,389,6,296,4,278,3,255,10,219,24,192,51,156), 
                5 => array(89,119,109,105,143,86,184,66,222,48,256,38,293,28,341,20,372,16,402,13,402,49,392,55,394,104,404,111,400,126,410,132,410,167,408,177,363,177,323,185,295,193,258,203,201,228,161,253,122,287,114,281,112,267,105,263,106,252,99,249,98,236,90,232)
            );
            
            $colors = explode(',', $color);
            //echo count($colors);
            //pr($colors);die;
            
            if(count($colors) == 6){
                
                foreach ($points as $key => $value) {
        
                    $img->polygon($value, function ($draw) use ($colors,$key) {
                          
                      $draw->background('#'.$colors[$key]);
                  });
                }
                            
            }elseif(count($colors) == 5){
                
                foreach ($points as $key => $value) {
                    
                    if($key==0){
                        
                        $img->polygon($value, function ($draw) use ($colors,$key) {
                            $draw->background('#'.$colors[0]);
                        });
                    }elseif($key==1){
                        $img->polygon($value, function ($draw) use ($colors,$key) {
                            $draw->background('#'.$colors[1]);
                        });
                    }elseif($key==2){
                        $img->polygon($value, function ($draw) use ($colors,$key) {
                            $draw->background('#'.$colors[2]);
                        });
                    }elseif($key==3 || $key==4){
                        $img->polygon($value, function ($draw) use ($colors,$key) {
                            $draw->background('#'.$colors[3]);
                        });
                    }else{
                        $img->polygon($value, function ($draw) use ($colors,$key) {
                            $draw->background('#'.$colors[4]);
                        });
                    }
                    
                }
                
            }elseif(count($colors) == 4){
                
                foreach ($points as $key => $value) {
                    
                    if($key==1){
                        
                        $img->polygon($value, function ($draw) use ($colors,$key) {
                            $draw->background('#'.$colors[0]);
                        });
                    }elseif($key==2 || $key==3){
                        $img->polygon($value, function ($draw) use ($colors,$key) {
                            $draw->background('#'.$colors[1]);
                        });
                    }elseif($key==4){
                        $img->polygon($value, function ($draw) use ($colors,$key) {
                            $draw->background('#'.$colors[2]);
                        });
                    }else{
                        $img->polygon($value, function ($draw) use ($colors,$key) {
                            $draw->background('#'.$colors[3]);
                        });
                    }
                    
                }
            }elseif(count($colors) == 3){
                
                foreach ($points as $key => $value) {
                    
                    if($key<2){
                        
                        $img->polygon($value, function ($draw) use ($colors,$key) {
                            $draw->background('#'.$colors[0]);
                        });
                    }elseif($key>1 && $key<4){
                        $img->polygon($value, function ($draw) use ($colors,$key) {
                            $draw->background('#'.$colors[1]);
                        });
                    } else {
                        $img->polygon($value, function ($draw) use ($colors,$key) {
                            $draw->background('#'.$colors[2]);
                        });
                    }
                    
                }
            }elseif(count($colors) == 2){
    
                foreach ($points as $key => $value) {
                    
                    if($key<3){
                        
                        $img->polygon($value, function ($draw) use ($colors,$key) {
                            $draw->background('#'.$colors[0]);
                        });
                    }else{
                        $img->polygon($value, function ($draw) use ($colors,$key) {
                            $draw->background('#'.$colors[1]);
                        });
                    }
                    
                }
            }
            
            $img->resize(150, 104);
            
            $img->save(WWW_ROOT.DS.IMAGES_URL.'test/tes.png');
            echo $img->response();
            
        }elseif($style == 'swirl'){
            
            $img = Image::canvas(1000,690,'#F2F2F2');
        
            
            $points = array(
                0 => array(100,103,114,106,112,128,136,103,144,106,144,146,131,144,122,154,119,154,120,172,160,173,161,202,136,224,136,240,143,242,144,261,77,320,49,318,53,307,42,299,43,226,2,229,11,201,22,179,38,158,52,142,73,123), 
                1 => array(100,103,114,106,112,128,136,103,144,106,144,146,131,144,122,154,119,154,120,172,160,173,161,202,136,224,136,240,143,242,144,261,172,239,202,221,234,207,262,196,293,185,329,179,339,170,338,163,319,166,309,158,318,146,314,142,332,121,344,124,350,116,360,116,364,102,398,110,402,76,465,74,468,88,480,82,486,95,496,88,501,91,515,80,509,70,501,75,499,64,487,67,481,59,478,33,507,35,516,25,531,24,534,2,433,0,382,3,340,8,283,18,240,27,200,41,167,56,129,79), 
                2 => array(691,11,717,18,735,23,755,31,752,41,761,48,762,57,757,61,749,60,743,57,740,52,735,50,729,51,724,58,725,62,731,64,740,64,746,74,748,84,742,93,732,99,723,98,709,112,700,110,688,127,669,130,649,128,626,127,614,129,611,121,594,124,586,114,582,114,582,129,583,141,563,163,541,164,518,165,514,155,508,151,490,154,482,152,480,144,462,146,455,143,450,136,433,137,418,133,413,146,400,142,393,144,395,157,390,161,380,159,375,170,351,174,329,179,339,170,338,163,319,166,309,158,318,146,314,142,332,121,344,124,350,116,360,116,364,102,398,110,402,76,465,74,468,88,480,82,486,95,496,88,501,91,515,80,509,70,501,75,499,64,487,67,481,59,478,50,478,33,492,32,507,35,516,25,531,24,534,2,563,2,598,2,613,3,625,3,639,4,658,6,672,8), 
                3 => array(846,72,809,52,775,38,752,32,752,41,761,48,762,57,757,61,749,60,743,57,740,52,735,50,729,51,724,58,725,62,731,64,740,64,746,74,748,84,742,93,732,99,723,98,709,112,700,110,688,127,669,130,649,128,626,127,614,129,611,121,594,124,586,114,582,114,582,129,583,141,571,146,558,143,544,152,526,148,514,155,508,151,490,154,482,152,480,144,462,146,455,143,450,136,433,137,418,133,413,146,400,142,393,144,395,157,388,160,380,159,375,170,385,168,402,166,421,163,441,163,468,162,495,162,514,163,541,162,565,163,591,165,614,166,636,169,665,173,691,182,715,188,738,197,754,203,771,210,791,221,815,233,832,243,854,258,875,276,889,289,903,302,915,312,925,324,938,342,946,337,947,332,940,325,932,322,937,312,928,309,929,290,921,283,920,268,902,268,900,273,901,280,887,283,881,281,884,268,875,262,877,243,883,239,882,234,883,228,891,221,900,219,908,212,913,210,920,199,920,182,928,180,928,149,944,147,931,133,920,122,903,109,885,97,875,90), 
                4 => array(994,300,987,317,991,307,978,321,969,327,961,335,950,341,939,346,934,334,945,329,940,325,932,322,937,312,928,309,929,290,921,283,920,268,902,268,900,273,901,280,887,283,881,281,884,268,875,262,877,243,883,239,882,234,883,228,891,221,900,219,908,212,913,210,920,199,920,182,928,180,928,149,948,147,959,159,971,173,981,194,987,206,993,226,995,246,996,270),
                5 => array(998,280,990,287,989,300,979,316,971,326,966,334,955,346,944,360,945,386,945,410,956,425,979,445,984,426,987,411,991,389,993,374,995,349), 
                6 => array(973,318,974,325,966,335,956,346,946,361,945,411,978,443,972,467,949,505,911,543,880,568,849,595,839,601,842,591,838,575,830,567,820,574,813,582,809,575,808,567,777,563,763,570,735,569,730,560,717,560,696,562,677,558,667,559,660,558,658,551,646,539,633,533,623,536,608,540,598,549,589,560,562,560,557,551,548,551,537,538,522,526,521,518,511,522,506,512,494,515,474,502,451,500,430,500,405,502,379,497,362,499,358,508,350,508,343,513,336,516,339,527,349,536,347,543,344,549,333,550,330,565,332,584,343,584,344,590,345,603,353,611,364,614,371,612,375,607,363,602,374,599,386,609,377,618,375,641,382,646,412,643,414,647,412,652,416,658,425,660,426,669,433,666,437,675,447,671,455,675,458,683,418,682,373,677,320,667,275,654,241,641,217,633,175,617,148,602,156,598,168,594,186,598,203,582,213,574,207,569,210,559,200,551,185,549,178,544,170,537,167,527,158,519,149,514,140,509,131,493,123,488,111,483,82,482,72,478,72,465,74,451,87,451,94,448,98,443,98,431,91,428,84,427,79,424,77,418,68,420,55,419,57,411,63,406,70,408,75,399,89,398,81,393,70,382,74,380,54,362,41,346,44,338,28,325,17,315,18,305,21,297,12,292,5,283,1,264,2,246,5,226,20,225,43,226,45,250,42,269,42,289,41,300,52,305,51,318,74,318,55,339,94,378,153,413,228,444,294,463,358,478,422,485,572,483,638,478,699,469,761,455,810,434,857,410,918,372,937,353,945,340,954,334),
                7 => array(839,601,842,591,838,575,830,567,820,574,813,582,809,575,808,567,777,563,763,570,735,569,730,560,717,560,696,562,677,558,667,559,660,558,658,551,646,539,633,533,623,536,608,540,598,549,589,560,562,560,557,551,548,551,537,538,522,526,521,518,511,522,506,512,494,515,477,501,451,500,430,500,405,502,379,497,362,499,358,508,350,508,343,513,336,516,339,527,349,536,347,543,344,549,333,550,330,565,332,584,343,584,344,590,345,603,353,611,364,614,371,612,375,607,363,602,374,599,386,609,377,618,375,641,382,646,412,643,414,647,412,652,416,658,425,660,426,669,433,666,437,675,447,671,455,675,458,683,483,684,531,684,572,681,621,675,662,669,709,659,762,640,801,621),
                8 => array(2,264,6,265,11,282,15,293,21,301,22,316,44,336,44,347,59,359,72,375,73,384,81,390,87,397,87,403,78,399,70,407,62,406,54,414,64,419,78,417,82,424,93,425,100,431,105,441,95,453,86,451,76,453,71,462,75,476,117,477,122,488,135,483,133,490,147,508,160,515,169,523,177,529,187,536,203,545,211,554,217,560,211,570,212,577,200,589,192,599,173,599,161,596,151,604,104,575,74,549,50,526,27,501,17,479,10,455,9,439,8,421,7,371,6,329)
                
            );
            
            $colors = $this->params['url']['color'];
            
            $colors = explode(',', $colors);
    
            if(count($colors) == 3){
                    
                foreach ($points as $key => $value) {
                    
                    if($key==0 || $key==4 || $key==7){
                        
                        $img->polygon($value, function ($draw) use ($colors,$key) {
                            $draw->background('#'.$colors[0]);
                        });
                    }elseif($key==1 || $key==3 || $key==6){
                        $img->polygon($value, function ($draw) use ($colors,$key) {
                            $draw->background('#'.$colors[1]);
                        });
                    }else{
                        $img->polygon($value, function ($draw) use ($colors,$key) {
                            $draw->background('#'.$colors[2]);
                        });
                    }
                    
                }
            }elseif(count($colors) == 2){
    
                foreach ($points as $key => $value) {
                    
                    if($key==1 || $key==3 || $key==4 || $key==6){
                        
                        $img->polygon($value, function ($draw) use ($colors,$key) {
                            $draw->background('#'.$colors[0]);
                        });
                    }else{
                        $img->polygon($value, function ($draw) use ($colors,$key) {
                            $draw->background('#'.$colors[1]);
                        });
                    }
                    
                }
            }


            $img->resize(150, 104);
            echo $img->response();
        }
            
        
    }

    
    public function effects()
    {
        $this->autoRender = false;

        if(isset($this->params['url']['effectClipart']) && !empty($this->params['url']['effectClipart'])){
            
            $effect = $this->params['url']['effectClipart'];
            $img = $this->params['url']['name'];
        }else{
            
            throw new Exception("Error Processing Request", 1);
            
        }

        if($effect == 'embossed'){
            
            $image = imagecreatefromjpeg(WWW_ROOT.DS.IMAGES_URL.'cliparts/'.$img);

            $emboss = array(array(2, 0, 0), array(0, -1, 0), array(0, 0, -1));
            imageconvolution($image, $emboss, 3, 235);
            
            header('Content-Type: image/png');
            imagepng($image,null,9);
            imagegd($image);
            imagedestroy($image);

        }
        exit;
        
    }
    
    
    public function fontEffects()
    {
        $this->autoRender = false;
        

        if(isset($this->params['url']['effect']) && !empty($this->params['url']['effect'])){
            
            $effect = $this->params['url']['effect'];
            $img = $this->params['url']['name'];
        }else{
            
            throw new Exception("Error Processing Request", 1);
            
        }
        
        // The text to draw
        $text = $this->params['url']['text'];
        // Replace path by your own font path
        $font = WWW_ROOT.DS.'fonts/uploads/'.$this->params['url']['name'];
        
        $fontSize = $this->params['url']['size'];
        
        $text_angle = 0;
        
        //echo $effect; die;
        
        if($effect == 'embossed'){
            
            $text_padding = 1;
            
            $the_box = $this->_calculateTextBox($text, $font, $fontSize, $text_angle);
            
            $imgWidth = $the_box["width"] + $text_padding;
            $imgHeight = $the_box["height"] + $text_padding; 
            
            $im = imagecreatetruecolor($imgWidth, $imgHeight);
            
            // Create some colors
            $white = imagecolorallocate($im, 255, 255, 255);
            $grey = imagecolorallocate($im, 128, 128, 128);
            $black = imagecolorallocate($im, 0, 0, 0);
            imagefilledrectangle($im, 0, 0, $imgWidth-1, $imgHeight-1, $white);

            // Add some shadow to the text
            imagettftext($im, $fontSize, $text_angle, 0, 30, $grey, $font, $text);
            
            // Add the text
            imagettftext($im, $fontSize, $text_angle, 0, 30, $black, $font, $text);
            
            $emboss = array(array(2, 0, 0), array(0, -1, 0), array(0, 0, -1));
            imageconvolution($im, $emboss, 3, 235);
            
            // Set the content-type
            //header('Content-Type: image/png');
            imagepng($im);
            imagegd($im);
            imagedestroy($im);
            
            exit;
        
        } elseif ($effect == 'debossed') {
            
            
            $text_padding = 1;
            
            $the_box = $this->_calculateTextBox($text, $font, $fontSize, $text_angle);
            
            $imgWidth = $the_box["width"] + $text_padding;
            $imgHeight = $the_box["height"] + $text_padding; 
            
            $im = imagecreatetruecolor($imgWidth, $imgHeight);
            
            // Create some colors
            $white = imagecolorallocate($im, 255, 255, 255);

            $black = imagecolorallocate($im, 0, 0, 0);
            
            
            $grey = imagecolorallocate($im, 238, 238, 238);
            $lightGrey = imagecolorallocate($im, 220, 220, 220);
            $shadow_color = imagecolorallocate($im, 50, 50, 50);
            
            
            imagefilledrectangle($im, 0, 0, $imgWidth-1, $imgHeight-1, $white);
            
            // Add some shadow to the text
            imagettftext($im, $fontSize, $text_angle, 0, 30, $grey, $font, $text);
            
            
            imagefilledrectangle($im, 0, 0, ($imgWidth-1), ($imgHeight-1), $grey);
            
            $this->_imagettftextblur($im,$fontSize,$text_angle,$the_box["left"] + 2,$the_box["top"] + 2,$shadow_color,$font,$text,1);
            $this->_imagettftextblur($im,$fontSize,$text_angle,$the_box["left"],$the_box["top"],$lightGrey,$font,$text);
            
            // Set the content-type
            //header('Content-Type: image/png');
            imagepng($im);
            imagegd($im);
            imagedestroy($im);
            
            exit;
            
        } elseif ($effect == 'printed'){
            
            $text_padding = 1;
            
            $the_box = $this->_calculateTextBox($text, $font, $fontSize, $text_angle);
            
            $imgWidth = $the_box["width"] + $text_padding;
            $imgHeight = $the_box["height"] + $text_padding; 
            
            $im = imagecreatetruecolor($imgWidth, $imgHeight);
            
            // Create some colors
            $white = imagecolorallocate($im, 235, 235, 235);
            $grey = imagecolorallocate($im, 238, 238, 238);
            $black = imagecolorallocate($im, 50, 50, 50);
            imagefilledrectangle($im, 0, 0, $imgWidth-1, $imgHeight-1, $white);

            // Add some shadow to the text
            imagettftext($im, $fontSize, $text_angle, 0, 32, $grey, $font, $text);
            
            // Add the text
            imagettftext($im, $fontSize, $text_angle, 0, 32, $black, $font, $text);
    
            imagepng($im);
            imagegd($im);
            imagedestroy($im);
            
            exit;
            
        } else {
            
            
            // Set the content-type
            header('Content-Type: image/png');
            
            // The text to draw
            $text = $this->params['url']['text'];
            // Replace path by your own font path
            $font = WWW_ROOT.DS.'fonts/uploads/'.$this->params['url']['name'];
            
            $fontSize = $this->params['url']['size'];
            
            $text_angle = 0;
            
            $text_padding = 0;
            
            $the_box = $this->_calculateTextBox($text, $font, $fontSize, $text_angle);
            
            $imgWidth = $the_box["width"] + $text_padding;
            $imgHeight = $the_box["height"] + $text_padding; 
            
            $im = imagecreatetruecolor($imgWidth, $imgHeight);
            
            // Create some colors
            $white = imagecolorallocate($im, 255, 255, 255);
            $grey = imagecolorallocate($im, 128, 128, 128);
            $black = imagecolorallocate($im, 0, 0, 0);
            imagefilledrectangle($im, 0, 0, $imgWidth-1, $imgHeight-1, $white);

            // Add some shadow to the text
            imagettftext($im, $fontSize, $text_angle, 0, 20, $grey, $font, $text);
            
            // Add the text
            imagettftext($im, $fontSize, $text_angle, 0, 20, $black, $font, $text);
    
            imagepng($im);
            imagegd($im);
            imagedestroy($im);
            
            exit;
        }
        
        
    }
    
      function add_cart(){
       $this->layout = "front";
     }
      
      function deboss(){
        $this->layout=false;
        $this->render(false);
        $img="IMG39600270.png";  
        
        $image = imagecreatefromjpeg(WWW_ROOT.DS.IMAGES_URL.'cliparts/'.$img); //or whatever loading function you need
        $sharpenMatrix = array
            (
                array(0, 0, 1),
                array(0, -1, 1),
                array(0, 0, -1)
            );

            // calculate the sharpen divisor
            $divisor = 3;

            $offset = 230;
           
            // apply the matrix
            imageconvolution($image, $sharpenMatrix, $divisor, $offset); 
            
            header('Content-Type: image/png');
            imagepng($image, null, 9);
        
        exit;
      }


    function emboss(){
        $this->layout=false;
        $this->render(false);
        $img="IMG85772079.png"; 
        $image = imagecreatefromjpeg(WWW_ROOT.DS.IMAGES_URL.'cliparts/'.$img);

        $emboss = array(array(2, 0, 0), array(0, -1, 0), array(0, 0, -1));
        imageconvolution($image, $emboss, 3, 235);
        
        header('Content-Type: image/png');
        imagepng($image,null,9);
        imagegd($image);
        imagedestroy($image);
        exit;
    }
    
    function dualayer(){
        $this->layout=false;
        $this->render(false);
        
        $text_padding = 1;
            
            $text_angle=0;
            $font = WWW_ROOT.DS.'fonts/uploads/4897462015-03-27arialbd.ttf';
            $fontSize=20;
            $text="FRONT MESSAGE";
            
            $the_box = $this->_calculateTextBox($text, $font, $fontSize, $text_angle);
            
            $imgWidth = $the_box["width"] + $text_padding;
            $imgHeight = $the_box["height"] + $text_padding; 
            
            $im = imagecreatetruecolor($imgWidth, $imgHeight);
            
            // Create some colors
            $white = imagecolorallocate($im, 255, 255, 255);
            $grey = imagecolorallocate($im, 128, 128, 128);
            $black = imagecolorallocate($im, 50, 50, 50);
            imagefilledrectangle($im, 0, 0, $imgWidth-1, $imgHeight-1, $white);

            // Add some shadow to the text
            imagettftext($im, $fontSize, $text_angle, 0, 22, $grey, $font, $text);
            
            // Add the text
            imagettftext($im, $fontSize, $text_angle, 2, 22, $black, $font, $text);
            
            // $sharpenMatrix = array
            // (
                // array(0, 0, 1),
                // array(0, -1, 1),
                // array(0, 0, -1)
            // );
            // imageconvolution($im, $sharpenMatrix, 3, 235);
            
            // Set the content-type
            header('Content-Type: image/png');
            imagepng($im);
            imagegd($im);
            imagedestroy($im);
            
            exit;
        
        
    }

    function embossedprinted(){
        $this->layout=false;
        $this->render(false);
        $img="IMG85772079.png";  
        
        $image = imagecreatefromjpeg(WWW_ROOT.DS.IMAGES_URL.'cliparts/'.$img); //or whatever loading function you need
        $sharpenMatrix = array
            (
                array(-12, -5, -2),
                array(1, -1, -1),
                array(1, -1, -2)
            );

            // calculate the sharpen divisor
           $divisor = array_sum(array_map('array_sum', $sharpenMatrix)); 

            $offset = 5;
           
            // apply the matrix
            imageconvolution($image, $sharpenMatrix, $divisor, $offset); 
            
            
            header('Content-Type: image/png');
            imagepng($image, null, 9);
        
        exit;
    }
    

    function embossprintedcolor($textcolor=null){
        $this->layout=false;
        $this->render(false);
        $img="IMG85772079.png";  
        $image = imagecreatefromjpeg(WWW_ROOT.DS.IMAGES_URL.'cliparts/'.$img);
            $sharpenMatrix = array
            (
                array(-12, -5, -2),
                array(1, -1, -1),
                array(1, -1, -2)
            );

            // calculate the sharpen divisor
            $divisor = array_sum(array_map('array_sum', $sharpenMatrix)); 

            $offset = 5;
           
            // apply the matrix
            imageconvolution($image, $sharpenMatrix, $divisor, $offset); 
            
            imagealphablending($image, true);
            
            $white = imagecolorallocatealpha($image, 255, 255, 255, 127);
            //$red = imagecolorallocatealpha($image, 255, 0, 0, 127);
            
            
            imagecolortransparent($image, $white);
            //imagefill( $image, 0, 0, $red );
            imagefilter($image, IMG_FILTER_BRIGHTNESS, 20);
            
            header('Content-Type: image/png');
            imagepng($image, null, 9);
            imagegd($image);
            imagedestroy($image);
            exit;
    }


    function embosseffectcolor($textcolor=null){
        $this->layout=false;
        $this->render(false);
        $img="IMG85772079.png"; 
        $image = imagecreatefromjpeg(WWW_ROOT.DS.IMAGES_URL.'cliparts/'.$img);

        $emboss = array(array(2, 0, 0), array(0, -1, 0), array(0, 0, -1));
        //imageconvolution($image, $emboss, 1, 235);
        imagefilter($image, IMG_FILTER_NEGATE); 
        imagefilter($image, IMG_FILTER_COLORIZE, 0, 0, 255);
        imagefilter($image, IMG_FILTER_NEGATE); 
        imagealphablending( $image, false );
        imagesavealpha( $image, true );
        header('Content-Type: image/png');
        imagepng($image,null,9);
        imagegd($image);
        imagedestroy($image);
        exit;
    }
    
    function color(){
        $this->layout=false;
        $this->render(false);
        $img="IMG85772079.png"; 
        $image = imagecreatefromjpeg(WWW_ROOT.DS.IMAGES_URL.'cliparts/'.$img);

        $emboss = array(array(2, 0, 0), array(0, -1, 0), array(0, 0, -1));
        //imageconvolution($image, $emboss, 1, 235);
        
        header('Content-Type: image/png');
        $newimg=imagepng($image,null,9);
        imagegd($image);
        imagedestroy($image);
        $im=Image::make($newimg);
        $im->colorize(0, 0, 100);
        $im->colorize(-100, 0, 100);
        echo $im->response();
        exit;
        
         
        // create new Intervention Image
        //$img = Image::make(WWW_ROOT.DS.IMAGES_URL.'cliparts/'.$img);
        
        // take out red color and add blue
        //$img->colorize(0, 0, 100);
        
        // just add a little green tone to the image
        //$img->colorize(0, 30, 0);
        //echo $img->response();
        exit;
    }
    

}