<style>
    
    #button ul li:hover a, .selected{
        background:url(../img/buttoncolor.png) 0 -40px no-repeat !important;
    }
    
</style>

<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="right_content">
            <h1>Colors</h1>
            <div id="contanier1">
                <div id="colour_images">
                    <div id="button">
                        <p id="pra1" style="display: none;">
                            Solid Wristband Preview
                        </p>
                        <p id="pra2" style="display: none;">
                            Swirl Wristband Preview
                        </p>
                        <p id="pra3" style="display: none;">
                            Segmented Wristband Preview
                        </p>
                        <ul>
                            <li>
                                <a id="solid" class="">Solid</a>
                            </li>
                            <li>
                                <a id="Swirl" class="">Swirl</a>
                            </li>
                            <li>
                                <a id="Segmented" class="">Segmented</a>
                            </li>
                        </ul>
                    </div>
                    <!--button-->
                    <div id="step-1" style="display: none;">
                        <div id="images">
                            <?php
                            
                                echo $this->Html->image('bandImages/strock.png', array('width' => '387', 'height' => '287', 'alt' => 'Silicone Wristbands', 'style' => 'position:absolute;z-index:2;'));
                                echo $this->Html->image('bandImages/shadow-1.png', array('width' => '387', 'height' => '287', 'alt' => 'Silicone Wristbands', 'style' => 'position:absolute;z-index:1;'));
                                echo $this->Html->image('bandImages/band_1.png', array('width' => '387', 'height' => '287', 'alt' => 'Silicone Wristbands', 'style' => 'position:absolute;z-index:0;', 'id' => 'band', 'onload' => 'getPixels(this)'));
                            ?>
                        </div>
                        <!--images-->

                        <p>
                            click to change color
                        </p>
                        <input type="button" value="113" onclick="button1Clicked()" id="button1" style="background-color: rgb(249, 229, 91); color: rgb(142, 142, 142);" class="select">
                        <p style="margin-top:10px; display:inline-block;">
                            To change the color click the color above and then select a color from the color chart
                        </p>
                    </div>
                    <!--step-1-->
                    <div id="step-2" style="display: none;">
                        <div id="btn">
                            <ul>
                                <li>
                                    <a id="2color1" class="">2 Colors</a>
                                </li>
                                <li>
                                    <a id="3color1" class="selected11">3 Colors</a>
                                </li>
                            </ul>
                        </div>
                        <!--btn-->
                        <div id="seg_11" style="display: none;">
                            <div style="margin-top:15px;" id="images">
                                
                                <?php
                            
                                    echo $this->Html->image('bandImages/strock.png', array('width' => '387', 'height' => '287', 'alt' => 'Silicone Wristbands', 'style' => 'position:absolute;z-index:3;', 'usemap' => '#simple2', 'class' => 'map'));
                                    echo $this->Html->image('bandImages/shadow-1.png', array('width' => '387', 'height' => '287', 'alt' => 'Silicone Wristbands', 'style' => 'position:absolute;z-index:2;', 'usemap' => '#simple2', 'class' => 'map'));
                                    echo $this->Html->image('bandImages/11.png', array('width' => '387', 'height' => '287', 'alt' => 'Silicone Wristbands', 'style' => 'position:absolute;z-index:1;', 'usemap' => '#simple2', 'class' => 'map', 'onload' => 'getPixels7(this)', 'id' => 'band7'));
                                    echo $this->Html->image('bandImages/band_1.png', array('width' => '387', 'height' => '287', 'alt' => 'Silicone Wristbands', 'style' => 'position:absolute;z-index:0;', 'usemap' => '#simple2', 'class' => 'map', 'id' => 'band8', 'onload' => 'getPixels8(this)'));
                                ?>
                                
                            </div>
                            <!--images-->
                            <map name="simple2">
                                <area data-maphilight="{&quot;stroke&quot;:false,&quot;fillColor&quot;:&quot;FF24DA&quot;,&quot;fillOpacity&quot;:0,&quot;alwaysOn&quot;:true}" alt="Legs" coords="199,45,194,45,191,45,187,45,184,44,180,42,178,41,172,38,169,37,164,37,161,37,156,37,154,37,147,37,146,37,143,37,142,38,141,39,138,41,136,42,133,42,131,42,128,43,126,43,123,43,121,43,118,43,117,44,114,45,111,46,110,47,107,48,104,50,102,51,98,53,96,56,93,60,92,62,89,64,85,66,83,66,80,67,77,67,77,65,76,64,75,60,75,57,76,54,79,52,81,51,83,50,86,50,89,50,91,50,95,49,96,49,97,48,103,47,103,47,109,43,113,41,115,39,117,36,118,33,119,30,122,29,124,28,129,28,131,28,135,27,140,27,144,27,149,28,152,28,158,28,162,29,166,29,175,30,179,31,184,33,188,34,193,35,199,35,201,34,202,32,202,30,200,29,198,28,195,27,193,26,193,24,193,22,195,20,199,19,201,19,203,19,207,20,212,20,215,19,215,16,211,15,211,12,212,10,215,8,220,8,226,8,230,9,234,9,238,10,245,10,250,11,254,12,261,12,266,13,272,15,273,16,277,18,282,19,288,21,288,23,285,25,284,27,277,28,275,28,275,31,275,35,274,37,270,36,267,35,263,35,260,35,258,37,258,39,257,42,256,43,252,44,249,44,244,44,241,43,237,44,234,45,231,46,226,46,224,46,221,46,219,46,217,46,214,46,211,46,209,46,205,46,202,46" class="area9" shape="poly" href="javascript:void(null);">
                                <area data-maphilight="{&quot;stroke&quot;:false,&quot;fillColor&quot;:&quot;FF24DA&quot;,&quot;fillOpacity&quot;:0,&quot;alwaysOn&quot;:true}" alt="Legs" coords="37,85,40,81,43,83,45,85,46,87,47,89,50,92,52,93,57,93,61,89,63,85,62,82,63,79,66,76,63,73,60,73,57,72,56,70,56,66,59,63,59,61,57,58,54,58,52,58,50,58,47,56,45,57,43,61,43,64,43,65,41,69,40,70,39,72,36,75,35,77,35,79,35,81,37,84" class="area9" shape="poly" href="javascript:void(null);">
                                <area data-maphilight="{&quot;stroke&quot;:false,&quot;fillColor&quot;:&quot;FF24DA&quot;,&quot;fillOpacity&quot;:0,&quot;alwaysOn&quot;:true}" alt="Legs" coords="35,110,41,110,43,112,46,114,47,116,47,117,50,118,53,118,56,122,59,125,59,128,59,131,59,135,61,137,61,139,59,142,57,144,57,146,57,148,60,150,61,152,64,155,68,155,70,157,74,159,77,162,79,165,81,168,84,168,88,171,90,174,92,178,94,180,96,182,95,183,92,183,87,183,86,182,82,181,79,179,76,178,73,176,71,172,68,171,63,170,62,166,59,163,56,160,52,157,48,153,45,147,43,143,40,137,39,130,38,124,36,118,36,113" class="area9" shape="poly" href="javascript:void(null);">
                                <area data-maphilight="{&quot;stroke&quot;:false,&quot;fillColor&quot;:&quot;FF24DA&quot;,&quot;fillOpacity&quot;:0,&quot;alwaysOn&quot;:true}" alt="Legs" coords="344,92,340,94,339,96,336,99,335,101,333,104,332,107,330,110,331,114,330,117,331,120,332,122,335,124,338,123,340,123,344,120,343,117,343,113,343,110,343,106,341,103,341,99,344,96,344,94,345,91,345,89" class="area9" shape="poly" href="javascript:void(null);">
                                <area data-maphilight="{&quot;stroke&quot;:false,&quot;fillColor&quot;:&quot;FF24DA&quot;,&quot;fillOpacity&quot;:0,&quot;alwaysOn&quot;:true}" coords="155,150,163,149,169,151,177,151,185,151,186,154,186,157,186,160,186,162,188,162,191,164,194,164,198,164,199,167,198,168,203,167,202,168,201,170,204,171,207,174,211,176,211,177,215,178,219,178,224,178,229,178,232,178,239,178,244,179,248,179,252,179,254,181,259,181,262,181,265,181,271,181,275,178,277,178,281,175,284,174,286,176,287,177,288,181,288,182,291,183,293,181,293,183,289,186,284,187,278,190,273,192,267,193,262,195,255,196,246,198,239,200,232,201,224,202,218,203,212,203,204,203,198,204,191,203,187,204,185,199,182,196,182,192,181,188,181,186,179,185,177,185,175,185,173,183,171,182,169,179,169,176,169,173,168,171,166,171,164,170,161,170,159,170,156,169,154,168,153,166,154,165,157,164,161,162,162,162,164,161,164,158,162,155,159,155,157,155,155,155,154,154,154,151" class="area9" shape="poly" href="javascript:void(null);">
                                <area data-maphilight="{&quot;stroke&quot;:false,&quot;fillColor&quot;:&quot;FF24DA&quot;,&quot;fillOpacity&quot;:0,&quot;alwaysOn&quot;:true}" alt="Legs" coords="65,120,57,112,52,105,54,97,56,93,49,92,45,87,42,82" class="area9" shape="poly" href="javascript:void(null);">
                                <area data-maphilight="{&quot;stroke&quot;:false,&quot;fillColor&quot;:&quot;565656&quot;,&quot;fillOpacity&quot;:0,&quot;alwaysOn&quot;:true}" alt="Legs" coords="33,79,35,109,41,109,47,113,50,119,55,119,60,126,60,133,62,136,61,139,59,142,57,145,56,147,64,154,71,154,78,161,80,165,86,169,91,174,95,178,96,184,104,187,128,194,154,200,175,202,187,203,182,194,180,187,174,182,170,181,169,177,168,173,164,170,158,170,151,167,155,163,159,161,162,158,157,155,154,155,154,151,147,149,133,146,109,140,97,135,80,127,59,111,52,102,55,95,51,92,44,86,41,82,37,83,34,81,32,77,37,67,39,61,48,51,67,35,102,19,140,9,177,5,204,5,243,6,267,10,289,16,286,20,277,16,262,12,245,8,223,7,211,9,210,14,213,16,209,19,202,17,196,17,195,20,195,22,195,25,197,29,200,32,198,34,190,33,185,30,178,28,168,26,158,26,144,26,133,26,122,27,119,31,117,36,108,39,102,44,95,46,88,47,82,47,79,48,77,53,76,57,74,60,74,65,80,67,84,65,91,62,97,57,103,53,111,48,119,46,128,43,141,40,150,36,172,38,183,44,211,46,252,44,259,39,263,34,270,37,275,32,274,29,280,29,285,25,300,22,297,30,292,42,287,48,281,54,273,59,261,58,249,56,226,51,197,49,172,49,137,52,106,59,93,68,81,73,73,75,68,80,66,83,64,85,63,82,64,78,65,76,63,74,62,73,59,72,57,70,57,65,58,62,58,60,56,58,53,58,51,57,50,57,48,56,47,55,45,55,42,58,41,62,41,65,41,67,38,69,36,71,35,72,36,65,37,62,40,58,44,54,48,51,53,47,61,44,40,60,40,53,52,47,58,40,68,36,43,55" class="area8" shape="poly" href="javascript:void(null);">
                                <area data-maphilight="{&quot;stroke&quot;:false,&quot;fillColor&quot;:&quot;565656&quot;,&quot;fillOpacity&quot;:0,&quot;alwaysOn&quot;:true}" alt="Legs" coords="290,16,286,22,286,25,290,24,302,22,307,24,316,29,322,32,327,38,333,42,337,47,344,54,346,59,349,70,352,76,351,84,350,90,349,93,349,98,348,105,347,108,345,107,341,101,344,98,346,93,342,91,340,94,338,95,336,98,334,103,332,108,332,113,332,117,335,121,339,122,342,120,343,118,344,113,345,111,345,117,345,120,340,132,339,137,330,156,310,174,297,179,292,181,288,180,287,176,285,174,280,174,274,177,268,179,251,179,234,178,219,177,211,178,209,174,204,171,202,170,200,169,200,165,197,163,188,163,188,158,188,152,193,152,212,151,233,148,252,145,265,143,279,138,299,132,308,128,317,121,324,115,330,108,332,103,332,100,317,84,301,73,286,66,278,64,272,61,267,59,263,43,279,37,292,28,290,21,292,16,298,18,299,21,295,22,294,20" class="area8" shape="poly" href="javascript:void(null);">
                            </map>
                            <p>
                                click to change color
                            </p>
                            <input type="button" style="margin-left: 50px; background-color: rgb(254, 26, 123); color: rgb(255, 255, 255);" value="Hot Pink PMS 806" onclick="button1Clicked()" id="button11" class="select">
                            <input type="button" value="" onclick="button2Clicked()" id="button22">
                            <br>
                            <br>
                            <p style="margin-top:10px; display:inline-block;">
                                To change the color click the color above and then select a color from the color chart
                            </p>
                        </div>
                        <!--seg_1-->
                        <div id="seg_22" style="display: block;">
                            <div style="margin-top:15px;" id="images">
                                
                                <?php
                            
                                    echo $this->Html->image('bandImages/strock.png', array('width' => '387', 'height' => '287', 'alt' => 'Silicone Wristbands', 'style' => 'position:absolute;z-index:3;', 'usemap' => '#simple3', 'class' => 'map'));
                                    echo $this->Html->image('bandImages/shadow-1.png', array('width' => '387', 'height' => '287', 'alt' => 'Silicone Wristbands', 'style' => 'position:absolute;z-index:3;', 'usemap' => '#simple3', 'class' => 'map'));
                                    echo $this->Html->image('bandImages/band_29.png', array('width' => '387', 'height' => '287', 'alt' => 'Silicone Wristbands', 'style' => 'position:absolute;z-index:1;', 'usemap' => '#simple3', 'class' => 'map', 'onload' => 'getPixels10(this)', 'id' => 'band10'));
                                    echo $this->Html->image('bandImages/band_30.png', array('width' => '387', 'height' => '287', 'alt' => 'Silicone Wristbands', 'style' => 'position:absolute;z-index:2;', 'usemap' => '#simple3', 'class' => 'map', 'onload' => 'getPixels9(this)', 'id' => 'band9'));
                                    echo $this->Html->image('bandImages/band_1.png', array('width' => '387', 'height' => '287', 'alt' => 'Silicone Wristbands', 'style' => 'position:absolute;z-index:0;', 'usemap' => '#simple3', 'class' => 'map', 'id' => 'band11', 'onload' => 'getPixels11(this)'));
                                ?>
                                
                            </div>
                            <!--images-->
                            <map name="simple3">
                                <area data-maphilight="{&quot;stroke&quot;:false,&quot;fillColor&quot;:&quot;FF24DA&quot;,&quot;fillOpacity&quot;:0,&quot;alwaysOn&quot;:true}" alt="Legs" coords="79,28,69,32,55,43,44,53,40,61,43,64,49,63,48,70,49,75,49,83,53,89,56,93,63,87,71,79,78,75,82,69,76,61,79,57,84,52,87,47,79,46,74,45,72,40,77,35," class="area11" shape="poly" href="javascript:void(null);">
                                <area data-maphilight="{&quot;stroke&quot;:false,&quot;fillColor&quot;:&quot;FF24DA&quot;,&quot;fillOpacity&quot;:0,&quot;alwaysOn&quot;:true}" alt="Legs" coords="309,173,269,172,240,171,220,171,215,170,209,165,203,164,200,155,193,151,174,150,161,150,147,148,138,148,139,154,143,159,148,163,151,166,143,168,141,172,145,176,153,178,156,183,156,189,161,192,167,195,171,199,177,203,187,203,198,203,203,202,207,197,212,195,219,194,223,194,228,196,233,197,238,197,241,194,247,192,251,191,254,191,255,192,259,193,260,195,266,194,278,190,290,184,300,179" shape="poly" class="area11" href="javascript:void(null);">
                                <area data-maphilight="{&quot;stroke&quot;:false,&quot;fillColor&quot;:&quot;FF24DA&quot;,&quot;fillOpacity&quot;:0,&quot;alwaysOn&quot;:true}" alt="Legs" coords="312,77,316,69,322,65,325,59,327,53,330,48,334,45,336,49,335,52,340,52,341,55,341,60,343,63,347,65,347,70,346,75,343,77,343,81,346,84,346,89,344,93,341,96,337,99,333,97,331,92,328,86,325,80,322,77,319,79,317,82,314,80" class="area11" shape="poly" href="javascript:void(null);">
                                <area data-maphilight="{&quot;stroke&quot;:false,&quot;fillColor&quot;:&quot;FF24DA&quot;,&quot;fillOpacity&quot;:0,&quot;alwaysOn&quot;:true}" alt="Legs" coords="349,97,344,101,342,107,343,112,345,115,347,108,348,101" class="area11" shape="poly" href="javascript:void(null);">
                                <area data-maphilight="{&quot;stroke&quot;:false,&quot;fillColor&quot;:&quot;98ED7E&quot;,&quot;fillOpacity&quot;:0,&quot;alwaysOn&quot;:true}" coords="203,6,215,6,227,8,236,9,244,9,252,11,259,11,264,13,271,15,274,17,268,16,261,15,264,18,269,22,269,27,263,30,255,33,247,37,237,37,230,36,222,35,219,34,217,40,211,45,204,46,197,44,190,42,182,41,177,39,174,37,170,40,166,41,160,41,153,46,148,49,142,50,139,49,137,44,139,40,144,38,148,37,153,35,159,33,164,32,164,28,164,24,169,25,176,26,184,27,189,28,194,29,197,27,199,24,198,20,193,19,188,16,189,13,195,12,199,11" class="area12" shape="poly" href="javascript:void(null);">
                                <area data-maphilight="{&quot;stroke&quot;:false,&quot;fillColor&quot;:&quot;98ED7E&quot;,&quot;fillOpacity&quot;:0,&quot;alwaysOn&quot;:true}" coords="32,87,35,103,35,111,36,118,37,126,39,134,41,143,45,148,51,155,59,163,64,167,72,172,80,178,88,177,93,175,95,169,90,162,85,157,79,151,73,146,68,143,62,142,58,142,54,141,51,137,54,133,60,131,57,127,53,126,48,124,50,121,54,117,50,112,46,108,42,104,38,98,31,86" class="area12" shape="poly" href="javascript:void(null);">
                                <area data-maphilight="{&quot;stroke&quot;:false,&quot;fillColor&quot;:&quot;98ED7E&quot;,&quot;fillOpacity&quot;:0,&quot;alwaysOn&quot;:true}" coords="202,203,206,198,211,194,216,194,220,193,226,194,230,195,234,196,239,194,243,192,247,190,250,189,255,189,257,191,258,192,259,194,258,195,256,197,255,197,253,198,251,198,248,198,245,198,242,198,241,199,238,200,236,200,233,200,230,200,227,201,225,201,222,202,219,202,218,202,211,202" class="area12" shape="poly" href="javascript:void(null);">
                                <area data-maphilight="{&quot;stroke&quot;:false,&quot;fillColor&quot;:&quot;98ED7E&quot;,&quot;fillOpacity&quot;:0,&quot;alwaysOn&quot;:true}" coords="348,93,341,97,338,102,334,108,333,114,334,120,336,124,339,129,342,131,343,125,343,120,343,118,343,113,343,107,347,102,347,98,349,93" class="area12" shape="poly" href="javascript:void(null);">
                                <area data-maphilight="{&quot;stroke&quot;:false,&quot;fillColor&quot;:&quot;565656&quot;,&quot;fillOpacity&quot;:0,&quot;alwaysOn&quot;:true}" alt="Legs" coords="79,29,71,42,71,47,79,47,84,47,87,51,80,56,77,61,79,66,82,69,82,73,87,69,106,61,119,57,134,53,143,53,163,50,181,49,201,48,223,49,248,54,276,62,292,68,306,76,310,77,313,72,318,66,324,58,329,48,335,42,328,37,315,28,306,23,294,18,281,13,272,11,274,15,273,17,267,15,262,15,262,17,267,21,268,25,267,28,263,29,259,32,255,34,250,36,245,36,240,36,234,36,229,36,220,33,217,39,211,45,204,46,195,44,186,41,177,39,172,38,166,40,161,40,156,42,152,48,148,50,145,50,138,48,138,44,138,40,145,37,150,34,155,32,159,31,161,29,163,27,163,24,169,24,173,25,180,26,183,27,190,29,195,30,196,27,198,25,200,22,196,18,191,18,186,15,188,12,191,12,195,12,196,11,199,9,202,8,207,7,213,6,226,7,234,8,241,9,248,10,256,11,261,13,270,12,269,10,265,10,258,9,255,8,250,8,238,7,234,5,228,5,217,5,209,4,188,4,177,6,138,10,126,12,103,17,80,27" class="area13" shape="poly" href="javascript:void(null);">
                                <area data-maphilight="{&quot;stroke&quot;:false,&quot;fillColor&quot;:&quot;565656&quot;,&quot;fillOpacity&quot;:0,&quot;alwaysOn&quot;:true}" alt="Legs" coords="38,63,43,65,47,64,47,70,46,78,50,87,55,93,55,98,51,103,54,109,65,118,79,127,97,136,111,141,123,144,141,147,164,150,189,151,227,149,263,144,281,138,307,126,321,120,328,112,334,105,331,99,326,94,323,88,317,83,320,81,323,82,326,89,329,93,332,99,333,102,334,105,338,101,341,97,344,93,345,89,345,85,343,82,342,78,344,76,346,73,346,70,343,66,341,63,339,60,340,55,336,53,334,51,333,49,330,47,333,43,336,46,340,50,345,55,347,64,351,69,351,78,351,85,350,90,348,91,343,96,341,99,336,102,332,105,333,111,333,116,334,121,338,126,340,129,341,131,331,154,324,162,313,171,308,173,215,172,201,162,196,152,192,150,184,151,166,151,138,150,139,157,146,164,145,168,148,166,141,170,140,174,145,177,150,178,154,183,155,189,158,193,163,196,168,200,169,202,162,202,153,201,129,196,121,193,112,191,104,188,95,183,82,177,89,177,94,173,95,168,91,163,84,156,78,149,71,146,65,142,58,140,51,139,52,135,56,132,59,129,56,125,49,124,52,119,54,116,50,111,45,106,36,95,32,88,33,79,36,69,40,68,48,88,51,100,53,106,56,112,60,117,64,128,67,135,69,144" class="area13" shape="poly" href="javascript:void(null);">
                            </map>
                            <p>
                                click to change color
                            </p>
                            <input type="button" style="margin-left:-5px;" value="" onclick="button1Clicked()" id="button_seg11">
                            <input type="button" value="" onclick="button2Clicked()" id="button_seg22">
                            <input type="button" value="Royal Blue PMS 2747" onclick="button3Clicked()" id="button_seg33" style="background-color: rgb(41, 28, 142); color: rgb(255, 255, 255);" class="select">
                            <p style="margin-top:10px; display:inline-block;">
                                To change the color click the color above and then select a color from the color chart
                            </p>
                        </div>
                        <!--seg_1-->
                    </div>
                    <!--step-2-->
                    <div id="step-3" style="display: none;">
                        <div id="btn">
                            <ul>
                                <li>
                                    <a id="2color" class="">2 Colors</a>
                                </li>
                                <li>
                                    <a id="3color" class="selected1">3 Colors</a>
                                </li>
                            </ul>
                        </div>
                        <!--btn-->
                        <div id="seg_1" style="display: none;">
                            <div style="margin-top:15px;" id="images">
                                
                                
                                <?php
                            
                                    echo $this->Html->image('bandImages/strock_2.png', array('width' => '387', 'height' => '287', 'alt' => 'Silicone Wristbands', 'style' => 'position:absolute;z-index:3;', 'usemap' => '#simple2', 'class' => 'map'));
                                    echo $this->Html->image('bandImages/shadow-1.png', array('width' => '387', 'height' => '287', 'alt' => 'Silicone Wristbands', 'style' => 'position:absolute;z-index:1;', 'usemap' => '#simple2', 'class' => 'map'));
                                    echo $this->Html->image('bandImages/band_2.png', array('width' => '387', 'height' => '287', 'alt' => 'Silicone Wristbands', 'style' => 'position:absolute;z-index:0;', 'usemap' => '#simple2', 'class' => 'map', 'onload' => 'getPixels2(this)', 'id' => 'band2'));
                                    echo $this->Html->image('bandImages/band_3.png', array('width' => '387', 'height' => '287', 'alt' => 'Silicone Wristbands', 'style' => 'position:absolute;z-index:0;', 'usemap' => '#simple2', 'class' => 'map', 'id' => 'band3', 'onload' => 'getPixels3(this)'));
                                ?>

                            </div>
                            <!--images-->
                            <map name="simple">
                                <area data-maphilight="{&quot;stroke&quot;:false,&quot;fillColor&quot;:&quot;#565656&quot;,&quot;fillOpacity&quot;:1,&quot;alwaysOn&quot;:true}" alt="Legs" coords="218,6,211,6,198,5,186,5,175,5,170,6,158,7,150,8,143,9,137,10,137,11,127,13,122,14,115,15,111,16,108,17,105,18,103,19,98,21,91,24,83,28,76,32,67,37,57,44,50,50,45,57,41,64,38,70,37,75,36,79,35,85,35,85,35,93,37,101,39,109,40,119,42,129,42,131,44,139,48,147,62,161,74,171,90,180,108,187,124,192,141,196,144,191,144,181,152,173,156,167,156,155,154,148,147,147,130,144,100,135,78,125,57,109,53,104,52,101,57,94,60,90,66,83,80,73,94,66,124,56,144,52,164,50,194,48,206,49,212,39,212,29,210,23,210,15" shape="poly" id="area1" href="javascript:void(null);">
                                <area data-maphilight="{&quot;stroke&quot;:false,&quot;fillColor&quot;:&quot;blue&quot;,&quot;fillOpacity&quot;:0,&quot;alwaysOn&quot;:true}" alt="Legs" coords="218,6,210,16,213,25,210,41,207,47,236,50,266,56,297,68,322,85,336,104,319,119,279,138,246,145,208,149,153,148,155,160,149,174,142,182,143,190,141,197,192,202,254,196,299,179,335,151,352,87,346,58,333,42,312,29,285,18,238,7" shape="poly" id="area2" href="javascript:void(null);">
                            </map>
                            <p>
                                click to change color
                            </p>
                            <input type="button" style="margin-left: 50px; background-color: rgb(31, 107, 103); color: rgb(255, 255, 255);" value="Teal PMS 3155" onclick="button1Clicked()" id="button2" class="">
                            <input type="button" value="107" onclick="button2Clicked()" id="button3" class="select" style="background-color: rgb(249, 229, 38); color: rgb(142, 142, 142);">
                            <br>
                            <br>
                            <p style="margin-top:10px; display:inline-block;">
                                To change the color click the color above and then select a color from the color chart
                            </p>
                        </div>
                        <!--seg_1-->
                        <div id="seg_2" style="display: block;">
                            <div style="margin-top:15px;" id="images">

                                <?php
                            
                                    echo $this->Html->image('bandImages/strock_3.png', array('width' => '387', 'height' => '287', 'alt' => 'Silicone Wristbands', 'style' => 'position:absolute;z-index:3;', 'usemap' => '#simple1', 'class' => 'map'));
                                    echo $this->Html->image('bandImages/shadow-1.png', array('width' => '387', 'height' => '287', 'alt' => 'Silicone Wristbands', 'style' => 'position:absolute;z-index:1;', 'usemap' => '#simple1', 'class' => 'map'));
                                    echo $this->Html->image('bandImages/band_4.png', array('width' => '387', 'height' => '287', 'alt' => 'Silicone Wristbands', 'style' => 'position:absolute;z-index:0;', 'usemap' => '#simple1', 'class' => 'map', 'onload' => 'getPixels4(this)', 'id' => 'band4'));
                                    echo $this->Html->image('bandImages/band_5.png', array('width' => '387', 'height' => '287', 'alt' => 'Silicone Wristbands', 'style' => 'position:absolute;z-index:0;', 'usemap' => '#simple1', 'class' => 'map', 'onload' => 'getPixels5(this)', 'id' => 'band5'));
                                    echo $this->Html->image('bandImages/band_6.png', array('width' => '387', 'height' => '287', 'alt' => 'Silicone Wristbands', 'style' => 'position:absolute;z-index:0;', 'usemap' => '#simple1', 'class' => 'map', 'id' => 'band6', 'onload' => 'getPixels6(this)'));
                                ?>

                            </div>
                            <!--images-->
                            <map name="simple1">
                                <area coords="64,119,55,131,58,143,54,157,81,177,115,190,159,202,257,194,293,181,290,177,287,169,280,151,276,140,251,146,200,151,150,149,108,141,81,130" shape="poly" id="area4" href="javascript:void(null);">
                                <area coords="217,8,211,18,213,31,210,42,208,49,238,52,277,62,307,76,332,102,313,123,275,140,279,152,277,161,288,170,292,181,325,160,335,148,344,115,350,87,348,65,327,40,305,27,274,16,236,9" shape="poly" id="area5" href="javascript:void(null);">
                                <area coords="64,122,57,129,57,138,60,147,58,153,55,157,41,140,37,120,33,94,33,78,47,51,80,28,120,14,167,7,199,6,217,7,211,17,213,30,214,37,208,48,177,49,145,51,116,59,81,72,56,94,49,105,63,121" shape="poly" id="area6" href="javascript:void(null);">
                            </map>
                            <p>
                                click to change color
                            </p>
                            <input type="button" style="margin-left: -5px; background-color: rgb(153, 132, 10); color: rgb(255, 255, 255);" value="112" onclick="button1Clicked()" id="button_seg1" class="">
                            <input type="button" value="109" onclick="button2Clicked()" id="button_seg2" class="" style="background-color: rgb(249, 214, 22); color: rgb(142, 142, 142);">
                            <input type="button" value="106" onclick="button3Clicked()" id="button_seg3" class="select" style="background-color: rgb(247, 232, 89); color: rgb(142, 142, 142);">
                            <p style="margin-top:10px; display:inline-block;">
                                To change the color click the color above and then select a color from the color chart
                            </p>
                        </div>
                        <!--seg_1-->
                    </div>
                    <!--step-1-->
                </div>
                <!--colour_images-->
                <div id="colour_code">
                    <div class="pvcont content mCustomScrollbar" id="container">
                        <table bordercolor="" border="2" id="table">
                            <tbody>
                                <tr>
                                    
                                    <?php   foreach ($colors as $key => $value) {   
                                                
                                                if ($key % 4 == 0) {
                                                    
                                                    echo "</tr><tr>";
                                                }
                                    ?>
                                                <td onclick="changeColor('<?php echo $value['Color']['hex_value']; ?>','<?php echo $value['Color']['name']; ?>')">
                                                    
                                                <?php 
                                                
                                                    echo $this->Html->image('band.png', array('alt' => 'Silicone Wristbands', 'style' => 'background-color:'.$value['Color']['hex_value']))."<p>".$value['Color']['name']."</p>";
                                                
                                                ?>
                                                
                                                </td>
                                                
                                    <?php    }  ?>
                                    
                                </tr>
                                
                            </tbody>
                        </table>
                    </div>
                    <!--color-->
                </div>
                <!--colour_code-->

            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(function() {
            //$('a[rel*=facebox]').facebox();
        });
        var mug;
        var mug2;
        var mug3;
        var mug4;
        var mug5;
        var mug6;
        var mug7;
        var mug8;

        var canvas = document.createElement("canvas");
        var ctx = canvas.getContext("2d");

        var canvas2 = document.createElement("canvas");
        var ctx2 = canvas2.getContext("2d");

        var canvas3 = document.createElement("canvas");
        var ctx3 = canvas3.getContext("2d");

        var canvas4 = document.createElement("canvas");
        var ctx4 = canvas4.getContext("2d");

        var canvas5 = document.createElement("canvas");
        var ctx5 = canvas5.getContext("2d");

        var canvas6 = document.createElement("canvas");
        var ctx6 = canvas6.getContext("2d");

        var canvas7 = document.createElement("canvas");
        var ctx7 = canvas7.getContext("2d");

        var canvas8 = document.createElement("canvas");
        var ctx8 = canvas8.getContext("2d");

        var canvas9 = document.createElement("canvas");
        var ctx9 = canvas9.getContext("2d");

        var canvas10 = document.createElement("canvas");
        var ctx10 = canvas10.getContext("2d");

        var canvas11 = document.createElement("canvas");
        var ctx11 = canvas11.getContext("2d");

        var originalPixels = null;
        var currentPixels = null;

        var originalPixels2 = null;
        var currentPixels2 = null;

        var originalPixels3 = null;
        var currentPixels3 = null;

        var originalPixels4 = null;
        var currentPixels4 = null;

        var originalPixels5 = null;
        var currentPixels5 = null;

        var originalPixels6 = null;
        var currentPixels6 = null;

        var originalPixels7 = null;
        var currentPixels7 = null;

        var originalPixels8 = null;
        var currentPixels8 = null;

        var originalPixels9 = null;
        var currentPixels9 = null;

        var originalPixels10 = null;
        var currentPixels10 = null;

        var originalPixels11 = null;
        var currentPixels11 = null;

        var selectedPage = 1;
        var selectedBtn = 1;

        var currentClr;
        var currentTxt;

        function HexToRGB(Hex) {
            var Long = parseInt(Hex.replace(/^#/, ""), 16);
            return {
                R : (Long >>> 16) & 0xff,
                G : (Long >>> 8) & 0xff,
                B : Long & 0xff
            };
        }

        function button1Clicked() {

            if (selectedPage == 3) {
                $("#button2").addClass("select");
                $("#button3").removeClass("select");
            } else if (selectedPage == 2) {
                $("#button11").addClass("select");
                $("#button22").removeClass("select");
            } else if (selectedPage == 4) {
                $("#button_seg1").addClass("select");
                $("#button_seg2").removeClass("select");
                $("#button_seg3").removeClass("select");
            } else if (selectedPage == 5) {
                $("#button_seg11").addClass("select");
                $("#button_seg22").removeClass("select");
                $("#button_seg33").removeClass("select");
            }
            selectedBtn = 1;
        }

        function button2Clicked() {

            if (selectedPage == 3) {
                $("#button3").addClass("select");
                $("#button2").removeClass("select");
            } else if (selectedPage == 2) {
                $("#button22").addClass("select");
                $("#button11").removeClass("select");
            } else if (selectedPage == 4) {
                $("#button_seg2").addClass("select");
                $("#button_seg1").removeClass("select");
                $("#button_seg3").removeClass("select");
            } else if (selectedPage == 5) {
                $("#button_seg22").addClass("select");
                $("#button_seg11").removeClass("select");
                $("#button_seg33").removeClass("select");
            }

            selectedBtn = 2;
        }

        function button3Clicked() {
            if (selectedPage == 4) {
                $("#button_seg3").addClass("select");
                $("#button_seg2").removeClass("select");
                $("#button_seg1").removeClass("select");
            } else if (selectedPage == 5) {
                $("#button_seg33").addClass("select");
                $("#button_seg22").removeClass("select");
                $("#button_seg11").removeClass("select");
            }
            selectedBtn = 3;
        }

        function changeColor(newColor, _txt) {

            //currentTxt = _txt;
            //currentClr = newColor;
            
            if (selectedPage == 1) {
                $("#button1").css("background-color", newColor);
                $("#button1").val(_txt);
                if (newColor == "#ffffff" || newColor == "#fff700" || newColor == "#f4ed7c" || newColor == "#f4ed47" || newColor == "#f9e814" || newColor == "#f7e859" || newColor == "#f9e526" || newColor == "#f9e55b" || newColor == "#f9e24C" || newColor == "#f9e24c" || newColor == "#f9e04c" || newColor == "#f9dd16" || newColor == "#f9d616" || newColor == "#f9e27f" || newColor == "#f7e8aa" || newColor == "#f9e070" || newColor == "#f9e08c" || newColor == "#fcd856" || newColor == "#f4e287" || newColor == "#ffd87f" || newColor == "#ffd691" || newColor == "#fcc963" || newColor == "#fcce87" || newColor == "#ffd69b" || newColor == "#fccc93" || newColor == "#f4dBaa " || newColor == "#f9bf9e" || newColor == "#f2c68c" || newColor == "#fca577" || newColor == "#f4c9c9" || newColor == "#e0cee0" || newColor == "#c4d8e2" || newColor == "#f2ef87" || newColor == "#f4edaf" || newColor == "#ffff7d" || newColor == "#edb3d9" || newColor == "#f0cee6" || newColor == "#bad5e8" || newColor == "#e5d4e7" || newColor == "#b3e2dc" || newColor == "#c3e7cd" || newColor == "#addc6c" || newColor == "#dcef3b" || newColor == "#e6e6e6") {
                    $("#button1").css("color", "#8e8e8e");
                } else {
                    $("#button1").css("color", "#FFF");
                }
                $("#button1").addClass("select");

            } else if (selectedPage == 3) {
                if (selectedBtn == 1) {
                    $("#button2").css("background-color", newColor);
                    $("#button2").val(_txt);
                    if (newColor == "#ffffff" || newColor == "#fff700" || newColor == "#f4ed7c" || newColor == "#f4ed47" || newColor == "#f9e814" || newColor == "#f7e859" || newColor == "#f9e526" || newColor == "#f9e55b" || newColor == "#f9e24C" || newColor == "#f9e24c" || newColor == "#f9e04c" || newColor == "#f9dd16" || newColor == "#f9d616" || newColor == "#f9e27f" || newColor == "#f7e8aa" || newColor == "#f9e070" || newColor == "#f9e08c" || newColor == "#fcd856" || newColor == "#f4e287" || newColor == "#ffd87f" || newColor == "#ffd691" || newColor == "#fcc963" || newColor == "#fcce87" || newColor == "#ffd69b" || newColor == "#fccc93" || newColor == "#f4dBaa " || newColor == "#f9bf9e" || newColor == "#f2c68c" || newColor == "#fca577" || newColor == "#f4c9c9" || newColor == "#e0cee0" || newColor == "#c4d8e2" || newColor == "#f2ef87" || newColor == "#f4edaf" || newColor == "#ffff7d" || newColor == "#edb3d9" || newColor == "#f0cee6" || newColor == "#bad5e8" || newColor == "#e5d4e7" || newColor == "#b3e2dc" || newColor == "#c3e7cd" || newColor == "#addc6c" || newColor == "#dcef3b" || newColor == "#e6e6e6") {
                        $("#button2").css("color", "#8e8e8e");
                    } else {
                        $("#button2").css("color", "#FFF");
                    }
                    $("#button2").addClass("select");
                    $("#button3").removeClass("select");

                } else {
                    $("#button3").css("background-color", newColor);
                    $("#button3").val(_txt);
                    if (newColor == "#ffffff" || newColor == "#fff700" || newColor == "#f4ed7c" || newColor == "#f4ed47" || newColor == "#f9e814" || newColor == "#f7e859" || newColor == "#f9e526" || newColor == "#f9e55b" || newColor == "#f9e24C" || newColor == "#f9e24c" || newColor == "#f9e04c" || newColor == "#f9dd16" || newColor == "#f9d616" || newColor == "#f9e27f" || newColor == "#f7e8aa" || newColor == "#f9e070" || newColor == "#f9e08c" || newColor == "#fcd856" || newColor == "#f4e287" || newColor == "#ffd87f" || newColor == "#ffd691" || newColor == "#fcc963" || newColor == "#fcce87" || newColor == "#ffd69b" || newColor == "#fccc93" || newColor == "#f4dBaa " || newColor == "#f9bf9e" || newColor == "#f2c68c" || newColor == "#fca577" || newColor == "#f4c9c9" || newColor == "#e0cee0" || newColor == "#c4d8e2" || newColor == "#f2ef87" || newColor == "#f4edaf" || newColor == "#ffff7d" || newColor == "#edb3d9" || newColor == "#f0cee6" || newColor == "#bad5e8" || newColor == "#e5d4e7" || newColor == "#b3e2dc" || newColor == "#c3e7cd" || newColor == "#addc6c" || newColor == "#dcef3b" || newColor == "#e6e6e6") {
                        $("#button3").css("color", "#8e8e8e");
                    } else {
                        $("#button3").css("color", "#FFF");
                    }
                    $("#button3").addClass("select");
                    $("#button2").removeClass("select");

                }
            } else if (selectedPage == 2) {
                if (selectedBtn == 1) {
                    $("#button11").css("background-color", newColor);
                    $("#button11").val(_txt);
                    if (newColor == "#ffffff" || newColor == "#fff700" || newColor == "#f4ed7c" || newColor == "#f4ed47" || newColor == "#f9e814" || newColor == "#f7e859" || newColor == "#f9e526" || newColor == "#f9e55b" || newColor == "#f9e24C" || newColor == "#f9e24c" || newColor == "#f9e04c" || newColor == "#f9dd16" || newColor == "#f9d616" || newColor == "#f9e27f" || newColor == "#f7e8aa" || newColor == "#f9e070" || newColor == "#f9e08c" || newColor == "#fcd856" || newColor == "#f4e287" || newColor == "#ffd87f" || newColor == "#ffd691" || newColor == "#fcc963" || newColor == "#fcce87" || newColor == "#ffd69b" || newColor == "#fccc93" || newColor == "#f4dBaa " || newColor == "#f9bf9e" || newColor == "#f2c68c" || newColor == "#fca577" || newColor == "#f4c9c9" || newColor == "#e0cee0" || newColor == "#c4d8e2" || newColor == "#f2ef87" || newColor == "#f4edaf" || newColor == "#ffff7d" || newColor == "#edb3d9" || newColor == "#f0cee6" || newColor == "#bad5e8" || newColor == "#e5d4e7" || newColor == "#b3e2dc" || newColor == "#c3e7cd" || newColor == "#addc6c" || newColor == "#dcef3b" || newColor == "#e6e6e6") {
                        $("#button11").css("color", "#8e8e8e");
                    } else {
                        $("#button11").css("color", "#FFF");
                    }
                    $("#button11").addClass("select");
                    $("#button22").removeClass("select");
                } else {
                    $("#button22").css("background-color", newColor);
                    $("#button22").val(_txt);
                    if (newColor == "#ffffff" || newColor == "#fff700" || newColor == "#f4ed7c" || newColor == "#f4ed47" || newColor == "#f9e814" || newColor == "#f7e859" || newColor == "#f9e526" || newColor == "#f9e55b" || newColor == "#f9e24C" || newColor == "#f9e24c" || newColor == "#f9e04c" || newColor == "#f9dd16" || newColor == "#f9d616" || newColor == "#f9e27f" || newColor == "#f7e8aa" || newColor == "#f9e070" || newColor == "#f9e08c" || newColor == "#fcd856" || newColor == "#f4e287" || newColor == "#ffd87f" || newColor == "#ffd691" || newColor == "#fcc963" || newColor == "#fcce87" || newColor == "#ffd69b" || newColor == "#fccc93" || newColor == "#f4dBaa " || newColor == "#f9bf9e" || newColor == "#f2c68c" || newColor == "#fca577" || newColor == "#f4c9c9" || newColor == "#e0cee0" || newColor == "#c4d8e2" || newColor == "#f2ef87" || newColor == "#f4edaf" || newColor == "#ffff7d" || newColor == "#edb3d9" || newColor == "#f0cee6" || newColor == "#bad5e8" || newColor == "#e5d4e7" || newColor == "#b3e2dc" || newColor == "#c3e7cd" || newColor == "#addc6c" || newColor == "#dcef3b" || newColor == "#e6e6e6") {
                        $("#button22").css("color", "#8e8e8e");
                    } else {
                        $("#button22").css("color", "#FFF");
                    }
                    $("#button22").addClass("select");
                    $("#button11").removeClass("select");
                }
            } else if (selectedPage == 4) {
                if (selectedBtn == 1) {
                    $("#button_seg1").css("background-color", newColor);
                    $("#button_seg1").val(_txt);
                    if (newColor == "#ffffff" || newColor == "#fff700" || newColor == "#f4ed7c" || newColor == "#f4ed47" || newColor == "#f9e814" || newColor == "#f7e859" || newColor == "#f9e526" || newColor == "#f9e55b" || newColor == "#f9e24C" || newColor == "#f9e24c" || newColor == "#f9e04c" || newColor == "#f9dd16" || newColor == "#f9d616" || newColor == "#f9e27f" || newColor == "#f7e8aa" || newColor == "#f9e070" || newColor == "#f9e08c" || newColor == "#fcd856" || newColor == "#f4e287" || newColor == "#ffd87f" || newColor == "#ffd691" || newColor == "#fcc963" || newColor == "#fcce87" || newColor == "#ffd69b" || newColor == "#fccc93" || newColor == "#f4dBaa " || newColor == "#f9bf9e" || newColor == "#f2c68c" || newColor == "#fca577" || newColor == "#f4c9c9" || newColor == "#e0cee0" || newColor == "#c4d8e2" || newColor == "#f2ef87" || newColor == "#f4edaf" || newColor == "#ffff7d" || newColor == "#edb3d9" || newColor == "#f0cee6" || newColor == "#bad5e8" || newColor == "#e5d4e7" || newColor == "#b3e2dc" || newColor == "#c3e7cd" || newColor == "#addc6c" || newColor == "#dcef3b" || newColor == "#e6e6e6") {
                        $("#button_seg1").css("color", "#8e8e8e");
                    } else {
                        $("#button_seg1").css("color", "#FFF");
                    }
                    $("#button_seg1").addClass("select");
                    $("#button_seg2").removeClass("select");
                    $("#button_seg3").removeClass("select");
                } else if (selectedBtn == 2) {
                    $("#button_seg2").css("background-color", newColor);
                    $("#button_seg2").val(_txt);
                    if (newColor == "#ffffff" || newColor == "#fff700" || newColor == "#f4ed7c" || newColor == "#f4ed47" || newColor == "#f9e814" || newColor == "#f7e859" || newColor == "#f9e526" || newColor == "#f9e55b" || newColor == "#f9e24C" || newColor == "#f9e24c" || newColor == "#f9e04c" || newColor == "#f9dd16" || newColor == "#f9d616" || newColor == "#f9e27f" || newColor == "#f7e8aa" || newColor == "#f9e070" || newColor == "#f9e08c" || newColor == "#fcd856" || newColor == "#f4e287" || newColor == "#ffd87f" || newColor == "#ffd691" || newColor == "#fcc963" || newColor == "#fcce87" || newColor == "#ffd69b" || newColor == "#fccc93" || newColor == "#f4dBaa " || newColor == "#f9bf9e" || newColor == "#f2c68c" || newColor == "#fca577" || newColor == "#f4c9c9" || newColor == "#e0cee0" || newColor == "#c4d8e2" || newColor == "#f2ef87" || newColor == "#f4edaf" || newColor == "#ffff7d" || newColor == "#edb3d9" || newColor == "#f0cee6" || newColor == "#bad5e8" || newColor == "#e5d4e7" || newColor == "#b3e2dc" || newColor == "#c3e7cd" || newColor == "#addc6c" || newColor == "#dcef3b" || newColor == "#e6e6e6") {
                        $("#button_seg2").css("color", "#8e8e8e");
                    } else {
                        $("#button_seg2").css("color", "#FFF");
                    }
                    $("#button_seg2").addClass("select");
                    $("#button_seg1").removeClass("select");
                    $("#button_seg3").removeClass("select");
                } else if (selectedBtn == 3) {
                    $("#button_seg3").css("background-color", newColor);
                    $("#button_seg3").val(_txt);
                    if (newColor == "#ffffff" || newColor == "#fff700" || newColor == "#f4ed7c" || newColor == "#f4ed47" || newColor == "#f9e814" || newColor == "#f7e859" || newColor == "#f9e526" || newColor == "#f9e55b" || newColor == "#f9e24C" || newColor == "#f9e24c" || newColor == "#f9e04c" || newColor == "#f9dd16" || newColor == "#f9d616" || newColor == "#f9e27f" || newColor == "#f7e8aa" || newColor == "#f9e070" || newColor == "#f9e08c" || newColor == "#fcd856" || newColor == "#f4e287" || newColor == "#ffd87f" || newColor == "#ffd691" || newColor == "#fcc963" || newColor == "#fcce87" || newColor == "#ffd69b" || newColor == "#fccc93" || newColor == "#f4dBaa " || newColor == "#f9bf9e" || newColor == "#f2c68c" || newColor == "#fca577" || newColor == "#f4c9c9" || newColor == "#e0cee0" || newColor == "#c4d8e2" || newColor == "#f2ef87" || newColor == "#f4edaf" || newColor == "#ffff7d" || newColor == "#edb3d9" || newColor == "#f0cee6" || newColor == "#bad5e8" || newColor == "#e5d4e7" || newColor == "#b3e2dc" || newColor == "#c3e7cd" || newColor == "#addc6c" || newColor == "#dcef3b" || newColor == "#e6e6e6") {
                        $("#button_seg3").css("color", "#8e8e8e");
                    } else {
                        $("#button_seg3").css("color", "#FFF");
                    }
                    $("#button_seg3").addClass("select");
                    $("#button_seg2").removeClass("select");
                    $("#button_seg1").removeClass("select");
                }
            } else if (selectedPage == 5) {
                if (selectedBtn == 1) {
                    $("#button_seg11").css("background-color", newColor);
                    $("#button_seg11").val(_txt);
                    if (newColor == "#ffffff" || newColor == "#fff700" || newColor == "#f4ed7c" || newColor == "#f4ed47" || newColor == "#f9e814" || newColor == "#f7e859" || newColor == "#f9e526" || newColor == "#f9e55b" || newColor == "#f9e24C" || newColor == "#f9e24c" || newColor == "#f9e04c" || newColor == "#f9dd16" || newColor == "#f9d616" || newColor == "#f9e27f" || newColor == "#f7e8aa" || newColor == "#f9e070" || newColor == "#f9e08c" || newColor == "#fcd856" || newColor == "#f4e287" || newColor == "#ffd87f" || newColor == "#ffd691" || newColor == "#fcc963" || newColor == "#fcce87" || newColor == "#ffd69b" || newColor == "#fccc93" || newColor == "#f4dBaa " || newColor == "#f9bf9e" || newColor == "#f2c68c" || newColor == "#fca577" || newColor == "#f4c9c9" || newColor == "#e0cee0" || newColor == "#c4d8e2" || newColor == "#f2ef87" || newColor == "#f4edaf" || newColor == "#ffff7d" || newColor == "#edb3d9" || newColor == "#f0cee6" || newColor == "#bad5e8" || newColor == "#e5d4e7" || newColor == "#b3e2dc" || newColor == "#c3e7cd" || newColor == "#addc6c" || newColor == "#dcef3b" || newColor == "#e6e6e6") {
                        $("#button_seg11").css("color", "#8e8e8e");
                    } else {
                        $("#button_seg11").css("color", "#FFF");
                    }
                    $("#button_seg11").addClass("select");
                    $("#button_seg22").removeClass("select");
                    $("#button_seg33").removeClass("select");
                } else if (selectedBtn == 2) {
                    $("#button_seg22").css("background-color", newColor);
                    $("#button_seg22").val(_txt);
                    if (newColor == "#ffffff" || newColor == "#fff700" || newColor == "#f4ed7c" || newColor == "#f4ed47" || newColor == "#f9e814" || newColor == "#f7e859" || newColor == "#f9e526" || newColor == "#f9e55b" || newColor == "#f9e24C" || newColor == "#f9e24c" || newColor == "#f9e04c" || newColor == "#f9dd16" || newColor == "#f9d616" || newColor == "#f9e27f" || newColor == "#f7e8aa" || newColor == "#f9e070" || newColor == "#f9e08c" || newColor == "#fcd856" || newColor == "#f4e287" || newColor == "#ffd87f" || newColor == "#ffd691" || newColor == "#fcc963" || newColor == "#fcce87" || newColor == "#ffd69b" || newColor == "#fccc93" || newColor == "#f4dBaa " || newColor == "#f9bf9e" || newColor == "#f2c68c" || newColor == "#fca577" || newColor == "#f4c9c9" || newColor == "#e0cee0" || newColor == "#c4d8e2" || newColor == "#f2ef87" || newColor == "#f4edaf" || newColor == "#ffff7d" || newColor == "#edb3d9" || newColor == "#f0cee6" || newColor == "#bad5e8" || newColor == "#e5d4e7" || newColor == "#b3e2dc" || newColor == "#c3e7cd" || newColor == "#addc6c" || newColor == "#dcef3b" || newColor == "#e6e6e6") {
                        $("#button_seg22").css("color", "#8e8e8e");
                    } else {
                        $("#button_seg22").css("color", "#FFF");
                    }
                    $("#button_seg22").addClass("select");
                    $("#button_seg11").removeClass("select");
                    $("#button_seg33").removeClass("select");
                } else if (selectedBtn == 3) {
                    $("#button_seg33").css("background-color", newColor);
                    $("#button_seg33").val(_txt);
                    if (newColor == "#ffffff" || newColor == "#fff700" || newColor == "#f4ed7c" || newColor == "#f4ed47" || newColor == "#f9e814" || newColor == "#f7e859" || newColor == "#f9e526" || newColor == "#f9e55b" || newColor == "#f9e24C" || newColor == "#f9e24c" || newColor == "#f9e04c" || newColor == "#f9dd16" || newColor == "#f9d616" || newColor == "#f9e27f" || newColor == "#f7e8aa" || newColor == "#f9e070" || newColor == "#f9e08c" || newColor == "#fcd856" || newColor == "#f4e287" || newColor == "#ffd87f" || newColor == "#ffd691" || newColor == "#fcc963" || newColor == "#fcce87" || newColor == "#ffd69b" || newColor == "#fccc93" || newColor == "#f4dBaa " || newColor == "#f9bf9e" || newColor == "#f2c68c" || newColor == "#fca577" || newColor == "#f4c9c9" || newColor == "#e0cee0" || newColor == "#c4d8e2" || newColor == "#f2ef87" || newColor == "#f4edaf" || newColor == "#ffff7d" || newColor == "#edb3d9" || newColor == "#f0cee6" || newColor == "#bad5e8" || newColor == "#e5d4e7" || newColor == "#b3e2dc" || newColor == "#c3e7cd" || newColor == "#addc6c" || newColor == "#dcef3b" || newColor == "#e6e6e6") {
                        $("#button_seg33").css("color", "#8e8e8e");
                    } else {
                        $("#button_seg33").css("color", "#FFF");
                    }
                    $("#button_seg33").addClass("select");
                    $("#button_seg22").removeClass("select");
                    $("#button_seg11").removeClass("select");
                }
            }
            updateColor(newColor);
        }

        function updateColor(newColor) {

            var newColor = HexToRGB(newColor);
            if (selectedPage == 1) {
                for (var I = 0, L = originalPixels.data.length; I < L; I += 4) {
                    if (currentPixels.data[I + 3] > 0) {
                        currentPixels.data[I] = originalPixels.data[I] / 255 * newColor.R;
                        currentPixels.data[I + 1] = originalPixels.data[I + 1] / 255 * newColor.G;
                        currentPixels.data[I + 2] = originalPixels.data[I + 2] / 255 * newColor.B;
                    }
                }
                ctx.putImageData(currentPixels, 0, 0);
                mug.src = canvas.toDataURL("image/png");
            } else if (selectedPage == 3) {
                if (selectedBtn == 1) {
                    for (var I = 0, L = originalPixels2.data.length; I < L; I += 4) {
                        if (currentPixels2.data[I + 3] > 0) {
                            currentPixels2.data[I] = originalPixels2.data[I] / 255 * newColor.R;
                            currentPixels2.data[I + 1] = originalPixels2.data[I + 1] / 255 * newColor.G;
                            currentPixels2.data[I + 2] = originalPixels2.data[I + 2] / 255 * newColor.B;
                        }
                    }
                    ctx2.putImageData(currentPixels2, 0, 0);
                    mug2.src = canvas2.toDataURL("image/png");
                } else {
                    for (var I = 0, L = originalPixels3.data.length; I < L; I += 4) {
                        if (currentPixels3.data[I + 3] > 0) {
                            currentPixels3.data[I] = originalPixels3.data[I] / 255 * newColor.R;
                            currentPixels3.data[I + 1] = originalPixels3.data[I + 1] / 255 * newColor.G;
                            currentPixels3.data[I + 2] = originalPixels3.data[I + 2] / 255 * newColor.B;
                        }
                    }
                    ctx3.putImageData(currentPixels3, 0, 0);
                    mug3.src = canvas3.toDataURL("image/png");
                }
            } else if (selectedPage == 2) {
                if (selectedBtn == 1) {
                    for (var I = 0, L = originalPixels7.data.length; I < L; I += 4) {
                        if (currentPixels7.data[I + 3] > 0) {
                            currentPixels7.data[I] = originalPixels7.data[I] / 255 * newColor.R;
                            currentPixels7.data[I + 1] = originalPixels7.data[I + 1] / 255 * newColor.G;
                            currentPixels7.data[I + 2] = originalPixels7.data[I + 2] / 255 * newColor.B;
                        }
                    }
                    ctx7.putImageData(currentPixels7, 0, 0);
                    mug7.src = canvas7.toDataURL("image/png");

                } else {
                    for (var I = 0, L = originalPixels8.data.length; I < L; I += 4) {
                        if (currentPixels8.data[I + 3] > 0) {
                            currentPixels8.data[I] = originalPixels8.data[I] / 255 * newColor.R;
                            currentPixels8.data[I + 1] = originalPixels8.data[I + 1] / 255 * newColor.G;
                            currentPixels8.data[I + 2] = originalPixels8.data[I + 2] / 255 * newColor.B;
                        }
                    }
                    ctx8.putImageData(currentPixels8, 0, 0);
                    mug8.src = canvas8.toDataURL("image/png");
                }
            } else if (selectedPage == 4) {
                if (selectedBtn == 1) {
                    for (var I = 0, L = originalPixels4.data.length; I < L; I += 4) {

                        if (currentPixels4.data[I + 3] > 0) {

                            currentPixels4.data[I] = originalPixels4.data[I] / 255 * newColor.R;
                            currentPixels4.data[I + 1] = originalPixels4.data[I + 1] / 255 * newColor.G;
                            currentPixels4.data[I + 2] = originalPixels4.data[I + 2] / 255 * newColor.B;
                        }
                    }
                    ctx4.putImageData(currentPixels4, 0, 0);
                    mug4.src = canvas4.toDataURL("image/png");
                } else if (selectedBtn == 2) {
                    for (var I = 0, L = originalPixels5.data.length; I < L; I += 4) {

                        if (currentPixels5.data[I + 3] > 0) {

                            currentPixels5.data[I] = originalPixels5.data[I] / 255 * newColor.R;
                            currentPixels5.data[I + 1] = originalPixels5.data[I + 1] / 255 * newColor.G;
                            currentPixels5.data[I + 2] = originalPixels5.data[I + 2] / 255 * newColor.B;
                        }
                    }
                    ctx5.putImageData(currentPixels5, 0, 0);
                    mug5.src = canvas5.toDataURL("image/png");
                } else if (selectedBtn == 3) {
                    for (var I = 0, L = originalPixels6.data.length; I < L; I += 4) {
                        if (currentPixels6.data[I + 3] > 0) {
                            currentPixels6.data[I] = originalPixels6.data[I] / 255 * newColor.R;
                            currentPixels6.data[I + 1] = originalPixels6.data[I + 1] / 255 * newColor.G;
                            currentPixels6.data[I + 2] = originalPixels6.data[I + 2] / 255 * newColor.B;
                        }
                    }
                    ctx6.putImageData(currentPixels6, 0, 0);
                    mug6.src = canvas6.toDataURL("image/png");
                }
            } else if (selectedPage == 5) {
                if (selectedBtn == 1) {
                    for (var I = 0, L = originalPixels9.data.length; I < L; I += 4) {
                        if (currentPixels9.data[I + 3] > 0) {
                            currentPixels9.data[I] = originalPixels9.data[I] / 255 * newColor.R;
                            currentPixels9.data[I + 1] = originalPixels9.data[I + 1] / 255 * newColor.G;
                            currentPixels9.data[I + 2] = originalPixels9.data[I + 2] / 255 * newColor.B;
                        }

                    }
                    ctx9.putImageData(currentPixels9, 0, 0);
                    mug9.src = canvas9.toDataURL("image/png");
                } else if (selectedBtn == 2) {
                    for (var I = 0, L = originalPixels10.data.length; I < L; I += 4) {
                        if (currentPixels10.data[I + 3] > 0) {
                            currentPixels10.data[I] = originalPixels10.data[I] / 255 * newColor.R;
                            currentPixels10.data[I + 1] = originalPixels10.data[I + 1] / 255 * newColor.G;
                            currentPixels10.data[I + 2] = originalPixels10.data[I + 2] / 255 * newColor.B;
                        }
                    }
                    ctx10.putImageData(currentPixels10, 0, 0);
                    mug10.src = canvas10.toDataURL("image/png");
                } else if (selectedBtn == 3) {
                    for (var I = 0, L = originalPixels11.data.length; I < L; I += 4) {
                        if (currentPixels11.data[I + 3] > 0) {
                            currentPixels11.data[I] = originalPixels11.data[I] / 255 * newColor.R;
                            currentPixels11.data[I + 1] = originalPixels11.data[I + 1] / 255 * newColor.G;
                            currentPixels11.data[I + 2] = originalPixels11.data[I + 2] / 255 * newColor.B;
                        }
                    }
                    ctx11.putImageData(currentPixels11, 0, 0);
                    mug11.src = canvas11.toDataURL("image/png");
                }
            }
        }

        function getPixels(img) {
            mug = document.getElementById("band");

            canvas.width = img.width;
            canvas.height = img.height;
            ctx.drawImage(img, 0, 0, img.naturalWidth, img.naturalHeight, 0, 0, img.width, img.height);
            originalPixels = ctx.getImageData(0, 0, img.width, img.height);
            currentPixels = ctx.getImageData(0, 0, img.width, img.height);
            img.onload = null;
            updateColor("#7a0172")
        }

        function getPixels2(img) {
            mug2 = document.getElementById("band2");
            canvas2.width = img.width;
            canvas2.height = img.height;
            ctx2.drawImage(img, 0, 0, img.naturalWidth, img.naturalHeight, 0, 0, img.width, img.height);
            originalPixels2 = ctx2.getImageData(0, 0, img.width, img.height);
            currentPixels2 = ctx2.getImageData(0, 0, img.width, img.height);
            img.onload = null;

        }

        function getPixels3(img) {
            mug3 = document.getElementById("band3");
            canvas3.width = img.width;
            canvas3.height = img.height;
            ctx3.drawImage(img, 0, 0, img.naturalWidth, img.naturalHeight, 0, 0, img.width, img.height);
            originalPixels3 = ctx3.getImageData(0, 0, img.width, img.height);
            currentPixels3 = ctx3.getImageData(0, 0, img.width, img.height);
            img.onload = null;

        }

        function getPixels4(img) {
            mug4 = document.getElementById("band4");
            canvas4.width = img.width;
            canvas4.height = img.height;
            ctx4.drawImage(img, 0, 0, img.naturalWidth, img.naturalHeight, 0, 0, img.width, img.height);
            originalPixels4 = ctx4.getImageData(0, 0, img.width, img.height);
            currentPixels4 = ctx4.getImageData(0, 0, img.width, img.height);
            img.onload = null;
        }

        function getPixels5(img) {
            mug5 = document.getElementById("band5");
            canvas5.width = img.width;
            canvas5.height = img.height;
            ctx5.drawImage(img, 0, 0, img.naturalWidth, img.naturalHeight, 0, 0, img.width, img.height);
            originalPixels5 = ctx5.getImageData(0, 0, img.width, img.height);
            currentPixels5 = ctx5.getImageData(0, 0, img.width, img.height);
            img.onload = null;
        }

        function getPixels6(img) {
            mug6 = document.getElementById("band6");
            canvas6.width = img.width;
            canvas6.height = img.height;
            ctx6.drawImage(img, 0, 0, img.naturalWidth, img.naturalHeight, 0, 0, img.width, img.height);
            originalPixels6 = ctx6.getImageData(0, 0, img.width, img.height);
            currentPixels6 = ctx6.getImageData(0, 0, img.width, img.height);
            img.onload = null;
        }

        function getPixels7(img) {
            mug7 = document.getElementById("band7");
            canvas7.width = img.width;
            canvas7.height = img.height;
            ctx7.drawImage(img, 0, 0, img.naturalWidth, img.naturalHeight, 0, 0, img.width, img.height);
            originalPixels7 = ctx7.getImageData(0, 0, img.width, img.height);
            currentPixels7 = ctx7.getImageData(0, 0, img.width, img.height);
            img.onload = null;
        }

        function getPixels8(img) {
            mug8 = document.getElementById("band8");
            canvas8.width = img.width;
            canvas8.height = img.height;
            ctx8.drawImage(img, 0, 0, img.naturalWidth, img.naturalHeight, 0, 0, img.width, img.height);
            originalPixels8 = ctx8.getImageData(0, 0, img.width, img.height);
            currentPixels8 = ctx8.getImageData(0, 0, img.width, img.height);
            img.onload = null;
        }

        function getPixels9(img) {
            mug9 = document.getElementById("band9");
            canvas9.width = img.width;
            canvas9.height = img.height;
            ctx9.drawImage(img, 0, 0, img.naturalWidth, img.naturalHeight, 0, 0, img.width, img.height);
            originalPixels9 = ctx9.getImageData(0, 0, img.width, img.height);
            currentPixels9 = ctx9.getImageData(0, 0, img.width, img.height);
            img.onload = null;
        }

        function getPixels10(img) {
            mug10 = document.getElementById("band10");
            canvas10.width = img.width;
            canvas10.height = img.height;
            ctx10.drawImage(img, 0, 0, img.naturalWidth, img.naturalHeight, 0, 0, img.width, img.height);
            originalPixels10 = ctx10.getImageData(0, 0, img.width, img.height);
            currentPixels10 = ctx10.getImageData(0, 0, img.width, img.height);
            img.onload = null;
        }

        function getPixels11(img) {
            mug11 = document.getElementById("band11");
            canvas11.width = img.width;
            canvas11.height = img.height;
            ctx11.drawImage(img, 0, 0, img.naturalWidth, img.naturalHeight, 0, 0, img.width, img.height);
            originalPixels11 = ctx11.getImageData(0, 0, img.width, img.height);
            currentPixels11 = ctx11.getImageData(0, 0, img.width, img.height);
            img.onload = null;
        }
        
        function getImgPixels(img,id) {
            
            mug = document.getElementById(id);
            canvas.width = img.width;
            canvas.height = img.height;
            ctx.drawImage(img, 0, 0, img.naturalWidth, img.naturalHeight, 0, 0, img.width, img.height);
            originalPixels = ctx11.getImageData(0, 0, img.width, img.height);
            currentPixels = ctx11.getImageData(0, 0, img.width, img.height);
            img.onload = null;
        }
        
    </script>
</div>

<?php echo $this->Html->script(array('front/custom.js', 'front/valid-custom.js', 'front/wb-core.js', 'front/pulpload.js', 'front/global.js', 'front/scroller.js')); ?>