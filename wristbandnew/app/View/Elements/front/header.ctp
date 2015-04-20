<div class="container container-width">

<div class="header-border"></div>

    <div class="row">

        <div class="col-lg-12">

            <ul class="list-inline pull-right sub-nav">

                <li><p class="head-text">Wristband 24/7 International:</p></li>

                <li> <?php echo $this->Html->image('flags.PNG'); ?></li>

                <li><a href="#">Support Ticket</a></li>

                <li><?php echo $this->Html->link('Contact Us', array('controller'=>'Homes', 'action'=>'contact_us'));?></li>

                <li><a href="#">My Account</a></li>

                <li><a href="#">My Cart</a></li>

            </ul>

        </div>

    </div>

    <div class="row">

        <div class="col-lg-12">

            <div class="col-sm-4 col-xs-6 col-my-12 padding">
                <?php echo $this->Html->link($this->Html->image("logo.png",array('alt'=>'logo', 'class'=>"img-responsive")),array('controller'=>'Homes','action'=>'index'),array('title'=>'','escape'=>false));?>
            </div>

            <div class="col-sm-4 col-xs-6 hidden-xs col-my-12">
                   <?php echo $this->Html->image('shoper_img.png',array('alt'=>"shopper" ,'class'=>"img-responsive pull-right hidden-xs")); ?>
            </div>

            <div class="col-sm-4 number">

                <i class="fa fa-mobile mobile-icon"></i> 1(855) 352 7263

                <p>24 Hours</p>

            </div>

        </div>

    </div>

    <div class="row">

        <div class="col-lg-12">

            <nav class="navbar navbar-inverse">

                <div class="container-fluid">

                    <!-- Brand and toggle get grouped for better mobile display -->

                    <div class="navbar-header">

                        <button data-target="#bs-example-navbar-collapse-9" data-toggle="collapse"
                                class="navbar-toggle collapsed" type="button">

                            <span class="sr-only">Toggle navigation</span>

                            <span class="icon-bar"></span>

                            <span class="icon-bar"></span>

                            <span class="icon-bar"></span>

                        </button>

                    </div>


                    <!-- Collect the nav links, forms, and other content for toggling -->

                    <div id="bs-example-navbar-collapse-9" class="collapse navbar-collapse">

                        <ul class="nav navbar-nav">

                            <li><?php echo $this->Html->link("HOME",array('controller'=>'Homes','action'=>'index'));?></li>
                            <li><?php echo $this->Html->link("PRICES",array('controller'=>'Prices','action'=>'wristband'));?></li>
                            <li><?php echo $this->Html->link("COLORS",array('controller'=>'Homes','action'=>'colors'));?></li>
                            <li id="bandTypes" >
                              <?php echo $this->Html->link("ORDER NOW <span class='caret'></span>", 'javascript:void(0)', array('class' => 'dropdown-toggle', 'aria-expanded' => false, 'escape' => false ));?>
                              <ul class="dropdown-menu" role="menu">
                                <?php
                                    
                                    $linkData = array('Wristbands' => 'custom_wristbands', 'Lanyards' => 'lanyards', 'Tyvek Bands' => 'tyvek_bands', 'Vinyl Bands' => 'vinyl_bands', 'Plastic Bands' => 'plastic_bands', 'Tattoos' => 'tattoos');
                                    
                                    foreach ($linkData as $key => $value) {
                                        
                                        echo "<li>".$this->Html->link($key, array('controller' => 'orders', 'action' => $value))."<li>";
                                    }
                                
                                ?>
                              </ul>
                            </li>
                            
                            
                            
                            
                            <!-- <li><?php echo $this->Html->link("WRISTBAND",array('controller'=>'Homes','action'=>'index'));?></li> -->
                            <li><?php echo $this->Html->link("GALLERY",array('controller'=>'Homes','action'=>'gallery'));?></li>
                            <li><?php echo $this->Html->link("CONTACT US",array('controller'=>'Homes','action'=>'contact_us'));?></li>
                        </ul>
                    </div>
                    <!-- /.navbar-collapse -->

                </div>

            </nav>

        </div>

    </div>

    <div class="row">

    <div class="col-lg-12">
               <?php echo $this->Html->image('banner.jpg', array('class' => 'img-responsive')); ?>
        </div>

 </div>
 
 <!-- Updated Code -->
 
 <div id="colorCode" style="display:none;">
    <div class="col-lg-3 col-md-3 col-sm-4  col-xs-6 porduct-item B#refType#  #bandclass#" refid="#refID#">
       <div class="#Cbtn#"></div>
       <div class="product">
                <div class="to-highlight">
                  #PMSBOX#
                  <img src="/img/#img#" class="#customImage#" refid="#refID#" alt="p" height="104" />
                  <div class="text-holder">
                    <div class="ffRadioWrapper">
                        <div class="ffRadio"></div>
                        <a href="javascript:void(0)" class="txtLabel">#title#</a>
                     </div>
                    <div class="row">
                      <div class="col-xs-4 col-sm-4">
                        <label>Toddler</label>
                        <input type="text" class="qty txtQty" refid="#refID#" metallic="#metallic#" placeholder="Qty" refname="#title#" reft="Toddler" ref="#colorcode#" reftype="#refType#" placeholder="QTY" name="txtToddler">
                      </div>
                      <div class="col-xs-4 col-sm-4">
                        <label>Youth</label>
                        <input type="text" class="qty txtQty" refid="#refID#" metallic="#metallic#" placeholder="Qty" refname="#title#" reft="Youth" ref="#colorcode#" reftype="#refType#" placeholder="QTY" name="txtYouth">
                      </div>
                      <div class="col-xs-4 col-sm-4">
                        <label>Adult</label>
                        <input type="text" class="qty txtQty" refid="#refID#" metallic="#metallic#" placeholder="Qty" refname="#title#" reft="Adult" ref="#colorcode#" reftype="#refType#" placeholder="QTY" name="txtAdult">
                      </div>
                    </div>
                   
                    #TextDrp#
                    
                  </div>
                </div>
              </div>
    </div>
</div>




 <div class="row" id="TxtColor" style="display:none">
  <div class="col-xs-4 col-sm-4 adjustMrg" style="padding-left:0px;">
    <label><nobr>Text Color</nobr></label>
    <select name="drpToddler" ref="#colorcode#" reft="Toddler" reftype="#refType#" refname="#title#" refid="#refID#" class="drpColor" >
    <option value="">Select</option>
    #addOpt#
    </select>
    <div class="other">
    <input type="text" class="txtOther" refid="#refID#" reftype="#refType#" refname="custom" reft="Toddler" ref="#colorcode#" placeholder="PMS#" name="txtOtherToddler">
    </div>
  </div>
  <div class="col-xs-4 col-sm-4 adjustMrg" style="padding-left:10px;">
   <label><nobr>Text Color</nobr></label>
    <select name="drpYouth" ref="#colorcode#" reft="Youth" reftype="#refType#" refname="#title#" refid="#refID#" class="drpColor" >
    <option value="">Select</option>
    #addOpt#
    </select>
    <div class="other">
    <input type="text" class="txtOther" refid="#refID#" reftype="#refType#" refname="custom" reft="Youth" ref="#colorcode#" placeholder="PMS#" name="txtOtherYouth">
    </div>
  </div>
  <div class="col-xs-4 col-sm-4 adjustMrg" style="padding-left:16px;">
 <label><nobr>Text Color</nobr></label>
  <select name="drpAdult" ref="#colorcode#" reft="Adult" reftype="#refType#" refname="#title#" refid="#refID#" class="drpColor" >
  <option value="">Select</option>
  #addOpt#
   </select>
   <div class="other">
   <input type="text" class="txtOther" refid="#refID#" reftype="#refType#" refname="custom" reft="Adult" ref="#colorcode#" placeholder="PMS#" name="txtOtherAdult">
   </div>
  </div>
</div>




<div id="PMSBox" style="display:none;">
    <div class="row custon-color">
        <div class="col-xs-6 col-sm6">
          <input type="text" placeholder="Color Code" class="cmsColor txtPms" reftype="#refType#" refid="#refID#" >
        </div>
        <div class="col-xs-6 col-sm6"><span class="pickcolor" ></span></div>
      </div>
</div>
<div id="BandType" style="display:none;">
    <div class="row custon-color">
        <div class="col-xs-12 col-sm6 txtCus">
         #typeName#
        </div>
      </div>
</div>


<div style="display:none;">
    <div id="colorChart">
    <div class="csType">Select Color Type <select class="customType"><option value="1">Solid</option><option value="2">Segmented</option><option value="3">Swirl</option></select></div>
    <div class="selectedColors"></div>
        <div class="colors"></div>
    </div>
</div>
 

<!-- Updated Code -->
 
 
<script>
	$("#bandTypes").hover(function() {
		$(this).addClass('open');
	}, function() {
		$(this).removeClass("open");
	});


	var url = window.location;
// Will only work if string in href matches with location
$('ul.nav a[href="'+ url +'"]').parent().addClass('active');

// Will also work for relative and absolute hrefs
$('ul.nav a').filter(function() {
    return this.href == url;
}).parent().addClass('active');


    
    

</script>