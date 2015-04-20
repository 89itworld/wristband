<?php
    echo $this->Html->css(array('msdropdown/dd', 'front/colorbox'), array('media' => 'screen'));
?>
<script>
    $(document).ready(function(e) {
        $("#payments").msDropdown({visibleRows:4});
        $(".clipArtHolder").msDropdown({visibleRows:4});
    });
</script>

<div class="page order-page clearfix">
<div class="step" style="display:block;">
    <div class="row offer-bar margin-bootom-20">
        <div class="col-xs-3 col-sm-2 offer">Step <span class="sRename">1</span></div>
        <div class="col-xs-12 col-sm-10 offer-details">Select Wristband Style</div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 select-wristband-style">
            <div class="product-info clearfix">
            
                <?php foreach ($productData as $key => $value) {    ?>
                <div class="col-lg-3 col-md-3 col-sm-4  col-xs-6 porduct-item wstyle">
                    <div class="product <?php  if($key == $wrist_type) echo 'xselected'; ?>">
                        <div class="to-highlight">
                            <span class="magnifire wlrg cboxElement" ref="lGroup" title="Large View"
                                  href="<?php echo Router::Url('/img/ProductIcon/'.$value['Product']['image']); ?>"></span>
                            <?php echo $this->Html->image("ProductIcon/".$value['Product']['image'], array('class' => "cached img-responsive")); ?>
                            <div class="text-holder">
                                <div class="ffRadioWrapper <?php if($key == $wrist_type) echo 'on'; ?>">
                                    <div class="ffRadio"></div>
                                    <a href="javascript:void(0)"><?php echo $value['Product']['name']; ?></a>
                                    <input name="rStyle" class="select-style" value="<?php echo $value['Product']['id']; ?>" ref="<?php echo $value['Product']['ref']; ?>" text_color="2" refm="<?php echo $value['Product']['min_qty']; ?>" reft="<?php echo $value['Product']['name']; ?>" style="display: none;" type="radio">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
<div class="step">
    <div class="row offer-bar margin-bootom-30">
        <div class="col-xs-3 col-sm-2 offer">Step <span class="sRename">2</span></div>
        <div class="col-xs-12 col-sm-10 offer-details">Choose Wristband Size</div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 select-wristband-size">
            <div class="select-size clearfix">
                <?php foreach ($productData as $key1 => $value1) {   
                        
                        foreach ($value1['ProductSize'] as $key => $value) {   ?>
                        
                    <div class="col-lg-2 col-md-2 col-sm-3  col-xs-6 SZ<?php echo $value['product_id']; ?> porduct-item wsize" style="display: <?php if($key1 == 0){ echo 'block';} else { echo 'none'; }  ?>;">
                        <div class="product">
                            <div class="to-highlight">
                                <?php echo $this->Html->image('ProductSizeIcon/'.$value['image'], array('class' => "")); ?>
                                <div class="text-holder">
                                    <div class="ffRadioWrapper">
                                        <div class="ffRadio"></div>
                                        <a href="javascript:void(0)"><?php echo $value['name']; ?></a>
                                        <input name="rSize" class="select-size" value="<?php echo $value['id']; ?>" ref="<?php echo $value['ref']; ?>" reft="<?php echo $value['name']; ?>" style="display: none;" type="radio"></div>
                                </div>
                                <div class="classy"><?php echo $value['type']; ?></div>
                            </div>
                        </div>
                    </div>
                
                <?php   } }   ?>
                
            </div>
        </div>
    </div>
</div>
<div class="step">

    <div class="row offer-bar margin-bootom-10">

        <div class="col-xs-3 col-sm-2 offer">Step <span class="sRename">3</span></div>

        <div class="col-xs-12 col-sm-10 offer-details">Choose Wristband Color
            <div class="pull-right min-qty"> 
                <span class="minQty" style="display: none;">Minimum Qty is <span class="minQtyValue">10</span></span>  
                <span>Total Qty: <span class="wristQty">0</span> 
                <span class="freeQty" style="display: none;"></span>  | Price: $<span class="wristPrice">0.00</span> </span>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 select-wristband-color">
            <div class="btnAddMore">
                <div class="addColor"></div>
                Add more custom bands
            </div>
            <div class="margin-bootom-10 colorsSel" align="center">
                <label>Colors: </label>

                <div class="ffRadioWrapper TypeClick on">
                    <div class="ffRadio"></div>
                    <a href="javascript:void(0)">All Colors</a>
                    <input checked="checked" name="rpType" class="select-type" value="0" style="display: none;"
                           type="radio">
                </div>
                
                <?php   foreach ($productData[0]['ProductStyle'] as $key => $value) {    ?>
                        
                    <div class="ffRadioWrapper TypeClick">
                        <div class="ffRadio"></div>
                        <a href="javascript:void(0)"><?php echo $value['name']; ?></a>
                        <input name="rpType" class="select-type" value="<?php echo $value['id']; ?>" style="display: none;" type="radio">
                    </div>
                            
                <?php   }   ?>
                


            </div>

            <div class="product-info clearfix Cfill" id="colorSelect">

                <div style="display: block;" class="col-lg-3 col-md-3 col-sm-4  col-xs-6 porduct-item Bx  CusBands"
                     refid="7010">
                    <div class="Cbtn"></div>
                    <div class="product">
                        <div class="to-highlight">
                            <div class="row custon-color">
                                <div class="col-xs-6 col-sm6">
                                    <input placeholder="Color Code" class="cmsColor txtPms" reftype="x" refid="7010"
                                           type="text">
                                </div>
                                <div class="col-xs-6 col-sm6"><span class="pickcolor"></span></div>
                            </div>
                            <?php echo $this->Html->image('custom.jpg', array('class' => "customImage")); ?>
                            <div class="text-holder">
                                <div class="ffRadioWrapper">
                                    <div class="ffRadio"></div>
                                    <a href="javascript:void(0)" class="txtLabel">Custom</a>
                                </div>
                                <div class="row">
                                    <div class="col-xs-4 col-sm-4">
                                        <label>Toddler</label>
                                        <input class="qty txtQty" refid="7010" metallic="2" placeholder="Qty"
                                               refname="Custom"
                                               reft="Toddler" ref="ffffff" reftype="x" name="txtToddler" type="text">
                                    </div>
                                    <div class="col-xs-4 col-sm-4">
                                        <label>Youth</label>
                                        <input class="qty txtQty" refid="7010" metallic="2" placeholder="Qty"
                                               refname="Custom"
                                               reft="Youth" ref="ffffff" reftype="x" name="txtYouth" type="text">
                                    </div>
                                    <div class="col-xs-4 col-sm-4">
                                        <label>Adult</label>
                                        <input class="qty txtQty" refid="7010" metallic="2" placeholder="Qty"
                                               refname="Custom"
                                               reft="Adult" ref="ffffff" reftype="x" name="txtAdult" type="text">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <?php
                
                    foreach ($styles as $key => $value) {
                        
                        $styleNames[$value['ProductStyle']['id']] = $value['ProductStyle']['name'];
                    }
                    
                    foreach ($productData as $key1 => $value1) {  
                    
                        foreach ($value1['ProductColor'] as $key => $value) { ?>
                
                <div style="display: <?php if($key1 == 0){ echo 'block';} else { echo 'none'; }  ?>;" class="col-lg-3 col-md-3 col-sm-4  col-xs-6 porduct-item B<?php echo $value['product_style_id']; ?> SZ<?php echo $value['product_id']; ?> NorBands"
                     refid="<?php echo $value['id']; ?>">

                    <div class=""></div>
                    <div class="product">
                        <div class="to-highlight">
                            <div class="row custon-color">
                                <div class="col-xs-12 col-sm6 txtCus">
                                    <?php echo $styleNames[$value['product_style_id']]; ?>
                                </div>
                            </div>
                            <?php 
                                echo $this->Html->image('prodColor/'.$value['image'], array('alt' => 'Wristbands', 'class' => 'normalImage', 'height' => '104'));
                            ?>
                            <div class="text-holder">

                                <div class="ffRadioWrapper">

                                    <div class="ffRadio"></div>

                                    <a href="javascript:void(0)" class="txtLabel"><?php echo ucfirst($value['name']); ?></a>

                                </div>

                                <div class="row">

                                    <div class="col-xs-4 col-sm-4">

                                        <label>Toddler</label>

                                        <input class="qty txtQty" refid="90" metallic="2" placeholder="Qty" refname="<?php echo ucfirst($value['name']); ?>" reft="Toddler" ref="FFFFFF" reftype="<?php echo $value['product_style_id']; ?>" name="txtToddler" type="text">

                                    </div>

                                    <div class="col-xs-4 col-sm-4">

                                        <label>Youth</label>

                                        <input class="qty txtQty" refid="90" metallic="2" placeholder="Qty" refname="White" reft="Youth" ref="FFFFFF" reftype="<?php echo $value['product_style_id']; ?>" name="txtYouth" type="text">
                                        
                                    </div>

                                    <div class="col-xs-4 col-sm-4">

                                        <label>Adult</label>

                                        <input class="qty txtQty" refid="90" metallic="2" placeholder="Qty" refname="White" reft="Adult" ref="FFFFFF" reftype="<?php echo $value['product_style_id']; ?>" name="txtAdult" type="text">

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>
                <?php  } } ?>
            </div>
        </div>
    </div>
</div>
<div class="step step5">

<div class="row offer-bar margin-bootom-30">

    <div class="col-xs-3 col-sm-2 offer">Step <span class="sRename">4</span></div>

    <div class="col-xs-12 col-sm-10 offer-details">Message on Wristband

        <div class="pull-right min-qty">Minimum Qty is <span class="minQtyValue">10</span> 
            <span>Total Qty: <span class="wristQty">0</span> 
            <span style="display: none;" class="freeQty"></span>  | Price: $
            <span class="wristPrice">0.00</span> </span>
        </div>
    </div>


</div>


<div class="previewHolder regular_size">

    <span class="prevArrow">Wristband illustration</span>


    <table style="background-image: none;" class="bandPreview frontBackMsg" border="0" cellpadding="0" cellspacing="0">

        <tbody>
        <tr>
            <td class="frontMsg">

                <table class="innerTbl" border="0" cellpadding="0" cellspacing="0">
                    <tbody>
                    <tr>
                        <td class="tdleft"></td>
                        <td class="tdcenter"><?php echo $this->Html->image('load_025.png', array('class' => "txtmsg")); ?></td>
                        <td class="tdright"></td>
                    </tr>
                    </tbody>
                </table>

            </td>


            <td class="backMsg">

                <table class="innerTbl" border="0" cellpadding="0" cellspacing="0">
                    <tbody>
                    <tr>
                        <td class="tdleft"></td>
                        <td class="tdcenter"><?php echo $this->Html->image('load_047.png', array('class' => "txtmsg")); ?></td>
                        <td class="tdright"></td>
                    </tr>
                    </tbody>
                </table>

            </td>
        </tr>

        </tbody>
    </table>


    <table style="background-image: none; display: none;" class="bandPreview internalMsg" border="0" cellpadding="0"
           cellspacing="0">
        <tbody>
        <tr>
            <td class="interMsg"><img src="assets/images/load_040.png" class="txtmsg" style=""></td>
        </tr>
        </tbody>
    </table>


    <div class="wristPager">
        <ul></ul>
    </div>


    <div class="note">

        <p>* Text will be max size on bands.</p>
        <p style="display: block;" class="embossed">* Color of message will be same as bands.</p>
        <p class="inter">* Internal message will always be embossed.</p>
        <p class="inter">* Internal message is slightly raised and that cannot be in different color.</p>
        <p class="glow">* The actual colors will be translucent and cloudy(shade of color you select).</p>
        <p class="glow">* The wristbands will ONLY glow in green color.</p>
        <p class="swirl">* This picture is only for reference as the actual band will have random mixing of colors.</p>
        <p class="swirl">* Blending/Mixing of 2 or more colors most likely to produce 3rd color, we will not be
            responsible for it.</p>
        <p class="swirl">* Segmented style is more recommended over swirl as the colors are more random &amp; bleeding
            of color can be noticed.</p>
        <p style="display: none;" class="lessthan">* Quantity less than 100pcs are made by laser cut process,bands made
            by this process have the text slightly engraved.</p>
        <p class="freemsg">* Free bands are duplicate of the original order and they are evenly distributed among the
            colors or sizes you order for.</p>
        <p class="keychain">* Keychains are for attachment purpose cannot be used as a wrist band.</p>
        <p class="customFont">* Custom font will be used.</p>

    </div>

</div>

<div class="wristForm">

<p class="msgStyle"><label>Message style</label>

	<span>
    	<input name="msgStyle" id="rFrontBack" checked="checked" value="front_back" type="radio"><label for="rFrontBack" class="checked">Front/Back Message</label>
    	<input name="msgStyle" id="rContinuous" value="continuous" type="radio"><label for="rContinuous">Continuous Message</label>
	</span>
</p>


<table class="form">

    <tbody>

    <tr>
        <td class="left">

            <p><label class="ieText"><span class="lblMsgStyle">Front</span> message</label>
                <span>
                    <input id="fronttxtmsg" maxlength="40" placeholder="Enter Front Message" type="text" onkeyup="getIllust('fronttxtmsg')">

            		<span class="extraFrontMsg note">
            		    <em>Additional extra 18 character in front message.</em>
            		    <i class="fmExtraPrice">(+0/each)</i>
            	    </span>

	            </span>
            </p>

        </td>
        
        <td class="right">

            <p class="back_msg_con">
                <label class="ieText">Back message 
                    <span class="extraBackMsg note">
                        <i class="bmExtraPrice">(+0/each)</i>
                    </span>
                </label>
                <span>
                    <input id="backtxtmsg" maxlength="40" placeholder="Enter Back Message" type="text" onkeyup="getIllust('backtxtmsg')">

		              <span class="extraBackMsg2 note">
		                  <em>Additional extra 18 character in back message.</em>
		                  <i class="bmExtraPrice2">(+0/each)</i>
	                  </span>
                </span>
            </p>

        </td>
    </tr>

    <tr>
        <td class="center" colspan="2">
            <p style="display: none;" class="internal_msg_con">
                <label class="ieText">Internal message 
                    <span class="extraIntMsg note">
                        <i class="imExtraPrice">(+0/each)</i>
                    </span>
                </label>
                <span>
                    <input id="txtinternal" maxlength="40" placeholder="Enter Internal Message" type="text">
                    <span class="extraIntMsg2 note">
                        <em>Additional extra 18 character in internal message.</em>
                        <i class="imExtraPrice2">(+0/each)</i>
                    </span>
                </span>
            </p>
        </td>
    </tr>


    <tr>
        <td class="left">

            <p><label>Add Logo/Clipart <span class="extraLogoMsg note"><i
                    class="logoExtraPrice">(+0/each)</i></span></label></p>

            <ul class="clipart">
                <li>
                    
                    <a id="dropSmenu" href="javascript:void(0);" class="drpMenuItems closex" default="Front Start Clipart" ><img height="27px;" /><small>Front Start Clipart</small><span></span></a>
                        <div class="clipArtHolderS drpMenuItems_clipart">
                            <div class="clipart-div">
                                <ul>
                                    <li>
                                        <a reft="0" ref="upload.png" title="Upload Clipart"><img src="<?php echo Router::Url('/img/upload.png'); ?>"><b>Upload Clipart</b>
                                        </a>
                                    </li>
                                    <?php
                                    
                                        foreach ($cliparts as $key => $value) {
                                            
                                            $img = $this->Html->image("cliparts/".$value['Clipart']['image'], array('alt' => $value['Clipart']['name']));
                                            
                                            echo "<li>".$this->Html->link($img."<b>".$value['Clipart']['name']."</b>", 'javascript:void(0)' , array('title' => $value['Clipart']['name'], 'reft' => $value['Clipart']['id'], 'ref' => $value['Clipart']['image'], 'escape' => false))."</li>";
        
                                        }
                                    
                                    ?>
                                            
                                </ul>
                            </div>        
                        </div>

                    
                    <div style="position: relative;" id="containerFS">
                        <a class="ownart closex" id="fsartwork">Or Upload Your Own Artwork</a>
                        <input style="z-index: 1; display: none;" name="fsfile" id="fsfile" class="uploadClipart" type="file">
                        <div class="fileLoading" id="fsLoading">
                            <span></span>
                        </div>
                        <div class="uploadedFile" id="fsUploadedFile">
                            <a class="closex" href="#" target="_blank"><b>File name goes here</b></a><span>X</span>
                        </div>
                        <div style="position: absolute; top: 0px; left: -46px; width: 223px; height: 33px; overflow: hidden; z-index: 0;" class="moxie-shim moxie-shim-html5" id="html5_19ebl79odaoq1fsc1vu51vb4mc04_container">
                            <input id="html5_19ebl79odaoq1fsc1vu51vb4mc04" style="font-size: 999px; opacity: 0; position: absolute; top: 0px; left: 0px; width: 100%; height: 100%;" accept="image/jpeg,image/gif,image/png,application/postscript,application/pdf,image/photoshop,image/bmp,image/tiff" type="file">
                        </div>
                    </div>
                    
                </li>

                <li class="last">
                    
                    <a id="dropEmenu" href="javascript:void(0);" class="drpMenuItems closex" default="Front End Clipart" ><img height="27px;" /><small>Front End Clipart</small><span></span></a>
                        
                        <div class="clipArtHolderS drpMenuItems_clipart">
                            <div class="clipart-div">
                                <ul>
                                    
                                    <li>
                                        <a reft="0" ref="upload.png" title="Upload Clipart"><img src="<?php echo Router::Url('/img/upload.png'); ?>"><b>Upload Clipart</b>
                                        </a>
                                    </li>
                                
                                    <?php
                                    
                                        foreach ($cliparts as $key => $value) {
                                            
                                            $img = $this->Html->image("cliparts/".$value['Clipart']['image'], array('alt' => $value['Clipart']['name']));
                                            
                                            echo "<li>".$this->Html->link($img."<b>".$value['Clipart']['name']."</b>", 'javascript:void(0)' , array('title' => $value['Clipart']['name'], 'reft' => $value['Clipart']['id'], 'ref' => $value['Clipart']['image'], 'escape' => false))."</li>";
        
                                        }
                                    
                                    ?>
                                            
                                </ul>
                            </div>        
                        </div>


                        <div id="containerFE" style="position: relative;">
                            <a id="feartwork" class="ownart closex">Or Upload Your Own Artwork</a>
                            <input type="file" class="uploadClipart" id="fefile" name="fefile" style="z-index: 1; display: none;">
                            <div id="feLoading" class="fileLoading"><span></span></div>
                            <div id="feUploadedFile" class="uploadedFile"><a target="_blank" href="#" class="closex"><b>File name goes here</b></a><span>X</span></div>
                            <div id="html5_19ggluhpsn9b1nji1jt1rlk16r38_container" class="moxie-shim moxie-shim-html5" style="position: absolute; top: 0px; left: -46px; width: 223px; height: 33px; overflow: hidden; z-index: 0;">
                                <input type="file" accept="image/jpeg,image/gif,image/png,application/postscript,application/pdf,image/photoshop,image/bmp,image/tiff" style="font-size: 999px; opacity: 0; position: absolute; top: 0px; left: 0px; width: 100%; height: 100%;" id="html5_19ggluhpsn9b1nji1jt1rlk16r38">
                            </div>
                        </div>
                </li>
            </ul>
        </td>
        <td class="right">

            <p class="rightLabelLogo"><label>Add Logo/Clipart</label></p>

            <ul class="clipart backClipart">

                <li>
                    
                    <a id="dropBSmenu" href="javascript:void(0);" class="drpMenuItems closex" default="Back Start Clipart"><img height="27px;" /><small>Back Start Clipart</small><span></span></a>
                    
                        <div class="clipArtHolderS drpMenuItems_clipart">
                            <div class="clipart-div">
                                <ul>
                                    
                                    <li>
                                        <a reft="0" ref="upload.png" title="Upload Clipart"><img src="<?php echo Router::Url('/img/upload.png'); ?>"><b>Upload Clipart</b>
                                        </a>
                                    </li>
                                    
                                    <?php
                                    
                                        foreach ($cliparts as $key => $value) {
                                            
                                            $img = $this->Html->image("cliparts/".$value['Clipart']['image'], array('alt' => $value['Clipart']['name']));
                                            
                                            echo "<li>".$this->Html->link($img."<b>".$value['Clipart']['name']."</b>", 'javascript:void(0)' , array('title' => $value['Clipart']['name'], 'reft' => $value['Clipart']['id'], 'ref' => $value['Clipart']['image'], 'escape' => false))."</li>";
        
                                        }
                                    
                                    ?>
                                            
                                </ul>
                            </div>        
                        </div>

                    <div id="containerBS" style="position: relative;">
                        <a id="bsartwork" class="ownart closex">Or Upload Your Own Artwork</a>
                        <input type="file" class="uploadClipart" id="bsfile" name="bsfile" style="z-index: 1; display: none;">
                        <div id="bsLoading" class="fileLoading"><span></span></div>
                        <div id="bsUploadedFile" class="uploadedFile"><a target="_blank" href="#" class="closex"><b>File name goes here</b></a><span>X</span></div>
                        <div id="html5_19ggluhq09291kfu16s413o1840c_container" class="moxie-shim moxie-shim-html5" style="position: absolute; top: 0px; left: -46px; width: 223px; height: 33px; overflow: hidden; z-index: 0;">
                            <input type="file" accept="image/jpeg,image/gif,image/png,application/postscript,application/pdf,image/photoshop,image/bmp,image/tiff" style="font-size: 999px; opacity: 0; position: absolute; top: 0px; left: 0px; width: 100%; height: 100%;" id="html5_19ggluhq09291kfu16s413o1840c">
                        </div>
                    </div>
                </li>

                <li class="last">
                    
                    <a id="dropBEmenu" href="javascript:void(0);" class="drpMenuItems closex" default="Back End Clipart"  ><img height="27px;" /><small>Back End Clipart</small><span></span></a>
                    
                        <div class="clipArtHolderS drpMenuItems_clipart">
                            <div class="clipart-div">
                                <ul>
                                    
                                    <li>
                                        <a reft="0" ref="upload.png" title="Upload Clipart"><img src="<?php echo Router::Url('/img/cliparts/upload.png'); ?>"><b>Upload Clipart</b>
                                        </a>
                                    </li>
                                    
                                    <?php
                                    
                                        foreach ($cliparts as $key => $value) {
                                            
                                            $img = $this->Html->image("cliparts/".$value['Clipart']['image'], array('alt' => $value['Clipart']['name']));
                                            
                                            echo "<li>".$this->Html->link($img."<b>".$value['Clipart']['name']."</b>", 'javascript:void(0)' , array('title' => $value['Clipart']['name'], 'reft' => $value['Clipart']['id'], 'ref' => $value['Clipart']['image'], 'escape' => false))."</li>";
        
                                        }
                                    
                                    ?>
                                            
                                </ul>
                            </div>        
                        </div>

                    <div id="containerBE" style="position: relative;">
                        <a id="beartwork" class="ownart closex">Or Upload Your Own Artwork</a>
                        <input type="file" class="uploadClipart" id="befile" name="befile" style="z-index: 1; display: none;">
                        <div id="beLoading" class="fileLoading"><span></span></div>
                        <div id="beUploadedFile" class="uploadedFile"><a target="_blank" href="#" class="closex"><b>File name goes here</b></a><span>X</span>
                        </div>
                        <div id="html5_19ggluhq11snmtf4u731sdm1d2qg_container" class="moxie-shim moxie-shim-html5" style="position: absolute; top: 0px; left: -46px; width: 223px; height: 33px; overflow: hidden; z-index: 0;">
                            <input type="file" accept="image/jpeg,image/gif,image/png,application/postscript,application/pdf,image/photoshop,image/bmp,image/tiff" style="font-size: 999px; opacity: 0; position: absolute; top: 0px; left: 0px; width: 100%; height: 100%;" id="html5_19ggluhq11snmtf4u731sdm1d2qg">
                        </div>
                    </div>
                        
                </li>
            </ul>
        </td>
    </tr>

    </tbody>

</table>


<table class="fontForm margin-bootom-20">

    <tbody>
    <tr>
        <td><label>Select Font</label></td>
        <td>
            <!-- onclick="cstmDrpDwnF()" -->
            <a class="drpMenuItems closex" id="btnSelectFont" title="Change Font" href="javascript:void(0)">
                <?php echo $this->Html->image('fonts/fontStyle7096722015-02-19.png', array('id' => 'fontImage')); ?>
                <span></span>
            </a>

                <div  class="fontHolder drpMenuItems_fonts">
                    <div id="fontHolder">
                        <ul>
                            <!-- 'onclick' => "setFontImg('".$value['Font']['image']."','fontImage')" -->
                            <?php
                            
                                foreach ($fonts as $key => $value) {
                                    
                                    $img = $this->Html->image("fonts/".$value['Font']['image'], array('alt' => $value['Font']['name']));
                                    echo "<li><span></span>".$this->Html->link($img, 'javascript:void(0)', array('title' => $value['Font']['name'], 'ref' => $value['Font']['image'], 'escape' => false))."</li>";
                                }
                            
                            ?>
                                    
                        </ul>
                    </div>        
                </div>
        </td>
    </tr>


    <tr>
        <td><label>Digital Proof</label></td>
        <td>
            <div class="dropdownUI"><select name="drpDigital" id="drpDigital">
                <option selected="selected" value="No" ref="0">No</option>
                <option value="Yes" ref="10">Yes ($10)</option>
            </select></div>
            <a target="_blank" class="btnViewEg colorbox cboxElement"
               href="http://www.wristbandtoday.com/images/proof.png">View Example</a>
       </td>
    </tr>


    <tr>
        <td><label>Special Instructions/Comments</label></td>
        <td><textarea id="txtcomments" class="txtcomments"></textarea></td>
    </tr>

    </tbody>
</table>


<div class="clear m"></div>

</div>
</div>

<div class="step">


    <div class="row offer-bar margin-bootom-30">

        <div class="col-xs-3 col-sm-2 offer">Step <span class="sRename">5</span></div>

        <div class="col-xs-12 col-sm-10 offer-details">Extra Wristband Options</div>

    </div>


    <div class="row extra-options">


        <div class="product-info">

            <div class="col-lg-3 col-md-3 col-sm-4  col-xs-6  col-my-12 porduct-item">

                <div class="product">

                    <div class="to-highlight">
                         <?php echo $this->Html->image('extra.png',array('alt'=>"" ,'style'=>"width:200px;height:170px")); ?>
                        <div class="text-holder">

                            <div class="ffRadioWrapper">

                                <div class="ffRadio"></div>

                                <a href="javascript:void(0)">Individually Wrapped</a>

                                <input name="chkWrapped" id="chkWrapped" class="select-extra" value="1" style="display: none;" type="radio">

                            </div>

                            <span class="price extraWrappedPrice" style="display: none;">(+$0/each)</span></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
    <div class="row">


        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">

            <div class="row offer-bar margin-bootom-30">
                
                <div class="col-xs-3 col-sm-4 offer">Step <span class="sRename">6</span></div>

                <div class="col-xs-12 col-sm-8 offer-details">Delivery and Production Time</div>

            </div>

            <div class="row">

                <ul class="timeHolder">

                    <li><label>Select a Production Time</label>

                    <div class="dropdownUI">
                        <select name="drpProdTime" id="drpProdTime">
                            <option selected="selected" value="" ref="0">Please Select Production</option>
                            <?php
                            
                                foreach ($production as $key => $value) {
                                    
                                    if ($value['ProductDummyPrice']['price'] == 0.00) {
                                        $prodPrice = 'Free';
                                    } else {
                                        $prodPrice = $value['ProductDummyPrice']['price'];
                                    }
                                    
                                    echo '<option value="'.$value['ProdDay']['days'].'" ref="'.$value['ProductDummyPrice']['price'].'">'.$value['ProdDay']['title'].' ('.$prodPrice.')</option>';
                                }
                            
                            ?>
                        </select>
                    </div>

                    </li>

                    <li><label>Select a Shipping Time</label>

                        <div class="dropdownUI">
                            <select name="drpShipTime" id="drpShipTime">
                                <option selected="selected" value="" ref="0">Please Select Shipping</option>
                                
                                <?php
                                
                                    foreach ($shipping as $key => $value) {
    
                                        echo '<option value="'.$value['MetaDay']['days'].'" ref="'.$value['ShipTimeDummyPrice']['price'].'">'.$value['ProdDay']['name'].' ('.$value['ShipTimeDummyPrice']['price'].')</option>';
                                    }
                                
                                ?>
    
                            </select>
                        </div>

                    </li>


                    <li style="display: none;" class="blankComments"><label>Special Instructions/Comments</label>

                        <div><textarea id="txtcommentsBlank" class="txtcomments"></textarea></div>

                    </li>


                </ul>


            </div>


        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 add-to-cart review-details">

            <h5>Review Order Details</h5>

            <div class="row">

                <div class="col-lg-7 col-md-6 col-sm-6 col-xs-6 left-text">Guarantee Products Delivered On:</div>

                <div class="col-lg-5 col-md-6 col-sm-6 col-xs-6 right-text deliverDate"></div>

            </div>

            <div class="row">

                <div class="col-lg-7 col-md-6 col-sm-6 col-xs-6 left-text">Total Quantity:</div>

                <div class="col-lg-5 col-md-6 col-sm-6 col-xs-6 right-text "><b class="wristQty" style="float:left">0</b> 
                    <b class="freeQty" style="float: left; margin-left: 10px; display: none;"></b>
                </div>

            </div>

            <div class="row">

                <div class="col-lg-7 col-md-6 col-sm-6 col-xs-6 left-text">Total Amount:</div>

                <div class="col-lg-5 col-md-6 col-sm-6 col-xs-6 right-text ">$ <label class="wristPrice">0.00</label><br>
                    <span class="salesTxt"></span> <strong>(AllInclusive)</strong>
                </div>

            </div>

            <div class="row">

                <div class="col-lg-12"><a style="background:#FFF" class="btn text-uppercase btnAddToCart" href="javascript:;">Add to cart</a>
                </div>

                <div class="col-lg-12 cartLoad ximgLoading" style="display:none;">
                    <?php echo $this->Html->image('wload.gif', array('alt' => 'loading')); ?>
                </div>

            </div>

        </div>

    </div>
    
</div>

</div>

<script>
 /*   
  * onclick="cstmDrpDwn('dropBEmenu')"
  *
    var selectedId;
    
    function cstmDrpDwn(id) {
        
        var ids = ["dropEmenu", "dropBSmenu", "dropBEmenu", "dropSmenu"];

        for (var i=0; i<ids.length; i++) {
            
            if ( id == ids[i] ) {
                selectedId = id;
                if ($('#'+id).hasClass('closex')) {

                    $('.clipArtHolderS').fadeIn("slow");
                    $('#'+id).removeClass('closex');
                    $('#'+id).addClass('open');
                } else {
                    
                    $('.clipArtHolderS').fadeOut("slow");
                    $('#'+id).removeClass('open');
                    $('#'+id).addClass('closex');
                }
            } else {
                
                if ( $('#'+ids[i]).hasClass('open') ) {

                    $('#'+ids[i]).removeClass('open');
                    $('#'+ids[i]).addClass('closex');
                }
            }
        }

    }
*/
    
    
    /*
    function cstmDrpDwnF() {
        
        $('.fontHolder').fadeToggle("slow");        
        if ($('#btnSelectFont').hasClass('closex')) {
            $('#btnSelectFont').removeClass('closex');
            $('#btnSelectFont').addClass('open');
        } else {
            $('#btnSelectFont').removeClass('open');
            $('#btnSelectFont').addClass('closex');
        }
    }
    */
    
    
    /*
     * 'onclick' => 'setClipImg(this)', 
     *
    function setClipImg(getImg){
        
        var imgSrc = $(getImg).find('img').attr('src');
        var txt = $(getImg).find('img').attr('alt');
        var imgArr = imgSrc.split('/');
        var lastEle = imgArr[imgArr.length-1];
        //console.log(lastEle);
        $("#"+selectedId).attr("ref", lastEle);
        $("#"+selectedId+" img").attr("src", imgSrc);
        $('#'+selectedId+" small").text(txt);
        $('.clipArtHolderS').fadeOut("slow");
        $('#'+selectedId).removeClass('open');
        $('#'+selectedId).addClass('closex');
    }
    */
    
    /*
     * 
    function setFontImg(imgSrc,imgId){
        
        imgSrc = "/wristbandnew/img/fonts/"+imgSrc;
        $("#"+imgId).attr("src", imgSrc);
        
        $('.fontHolder').fadeOut("slow");
        $('#btnSelectFont').removeClass('open');
        $('#btnSelectFont').addClass('closex');
    }
    */
    
    
    /*
    var fontSelector = '#fontHolder li';

    $(fontSelector).on('click', function(){
        $(fontSelector).removeClass('active');
        $(this).addClass('active');
    });
    */
    
    
    function getIllust(id){
       
       if (id == 'fronttxtmsg') {
           
           var textIll = $("#fronttxtmsg").val();
           var imgName = 'img001.png';
       } else {
           
           var textIll = $("#backtxtmsg").val();
           var imgName = 'img002.png';
       }
       
       $.ajax({
            url: '<?php echo $this->Html->url(array('controller' => 'Neworders','action' => 'createIllustration','bandhead'=>false)); ?>',
            type: "POST",
            data: {'text': textIll, img : imgName},
            success: function (resp) {
                
                if(resp){
                    
                    if (id == 'fronttxtmsg') {
                        
                        var updateClass = '.frontMsg';
                        var updateSrc = '/wristbandnew/img/img001.png?' + new Date().getTime();
                    } else if (id == 'backtxtmsg') {
                        
                        var updateClass = '.backMsg';
                        var updateSrc = '/wristbandnew/img/img002.png?' + new Date().getTime();
                    }
                    
                    $(updateClass+" img:last-child").remove();
                    $(updateClass+' .tdcenter').append('<img alt="" class="txtmsg" />')
                    
                    $(updateClass+" img").load(function() {
                        $(this).hide();
                        $(this).fadeIn('slow');
                    }).attr('src', updateSrc);
                    
                } else {
                    alert('Unable to create illustration.');
                }
            }
        });
    }
    
    
    var fullDate = new Date();
    
    var S_YEAR = fullDate.getFullYear(),S_MONTH = fullDate.getMonth()+1,S_DAY = fullDate.getDate(),S_HOURS = fullDate.getHours(),S_MINUTES = fullDate.getMinutes(),S_SECONDS=fullDate.getSeconds();
    var SEO_KEYWORD = '';
    var SALE_USER = false;
    var HTTP_SERVER = 'http://103.230.150.50/';
    var COUNTRY_CODE = 'US';
    var CURRENCY = '$';
    var TEXT_COLOR = 'color';
    var LY_CUSTOM_FEE = 80;
    var LY_COLOR_CHANGE = 35;
    var subpage = 'wristband';
    
    /********* Edits *********/
    
    var UPLOAD_URL = '<?php echo $this->Html->url(array('controller' => 'Neworders','action' => 'clipUpload','bandhead'=>false)); ?>';
    
    /********* Edits *********/ 
</script>

<?php
    
    echo $this->Html->script(array('msdropdown/jquery.dd', 'front/global', 'front/colorbox-min', 'front/pulpload', 'front/wb-core', 'front/valid-custom', 'front/file-upload'));
    
?>