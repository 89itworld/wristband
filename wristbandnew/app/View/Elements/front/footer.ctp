<div class="footer_wraper">

    <div class="row">

        <div class="col-lg-12 left_nav">

            <div class="col-lg-3 col-sm-4 col-my-12">

                <div class="heading">Customer Service <?php echo $this->Html->image('footer_border.png'); ?></div>

                <ul>

                    <li><?php echo $this->Html->link('Home', array('controller'=>'Homes', 'action'=>'index'));?></li>

                    <li><?php echo $this->Html->link('About Us', array('controller'=>'pages', 'action'=>'index', 'slug' => "about_us"));?></li>
                    <li><?php echo $this->Html->link('Prices', array('controller'=>'prices', 'action'=>'wristband'));?></li>

                    <li><?php echo $this->Html->link('Custom Bracelets', array('controller'=>'pages', 'action'=>'index', 'slug' => "custom_bracelets"));?></li>

                    <li><?php echo $this->Html->link('Custom Wristbands', array('controller'=>'pages', 'action'=>'index', 'slug' => "custom_wristbands"));?></li>

                    <li><?php echo $this->Html->link('Color Wristband', array('controller'=>'pages', 'action'=>'index', 'slug' => "color_wristband"));?></li>

                    <li><?php echo $this->Html->link('Custom Rubber Wristbands', array('controller'=>'pages', 'action'=>'index', 'slug' => "custom_rubber_wristbands"));?></li>

                </ul>

            </div>

            <div class="col-lg-4 col-sm-4 col-my-12">

                <div class="mid_nav">

                    <div class="heading1">Userful Links<?php echo $this->Html->image('footer_border.png'); ?></div>

                    <ul class="pull-left">

                        <li><?php echo $this->Html->link('Silicone Wristbands', array('controller'=>'pages', 'action'=>'index', 'slug' => "silicone_wristbands"));?></li>

                        <li><?php echo $this->Html->link('Contact Us', array('controller'=>'Homes', 'action'=>'contact_us'));?></li>
                        <li><?php echo $this->Html->link('FAQ', array('controller'=>'pages', 'action'=>'index', 'slug' => "faq"));?></li>

                        <li><a href="#">Colors</a></li>

                        <li><a href="#">Sitemap</a></li>
                        <li><?php echo $this->Html->link('Privacy Policy', array('controller'=>'pages', 'action'=>'index', 'slug' => "privacy_policy"));?></li>
                        <li><?php echo $this->Html->link('Disclaimer', array('controller'=>'pages', 'action'=>'index', 'slug' => "disclaimer"));?></li>
                    </ul>

                    <ul class="pull-right left-pull">

                        <li class="right_nav"><?php echo $this->Html->link('Blog', array('controller'=>'pages', 'action'=>'index', 'slug' => "blog"));?></li>

                        <li class="right_nav"><?php echo $this->Html->link('Term and Condition', array('controller'=>'pages', 'action'=>'index', 'slug' => "term_and_condition"));?></li>

                    </ul>

                </div>

            </div>

            <div class="col-lg-4 col-sm-4 col-my-12">

                <div class="video">

                    <div class="heading3">

                        Satisfied Customers<?php echo $this->Html->image('footer_border.png',array('class'=>"video-img")); ?>

                    </div>
                     <?php echo $this->Html->image('video.png',array('class'=>"video-img")); ?>

                </div>

            </div>

        </div>

    </div>

</div>
</div>

<div class="footer">

    <div class="container container-width">

        <div class="col-lg-12">

            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 left_news padding">

                <h5>NEWSLETTER SIGNUP</h5>

                <form name="newletter">

                    <input type="text" onfocus="if (this.value == 'enter your email') {this.value=''}"
                           onblur="if(this.value == '') { this.value='enter your email'}" value="enter your email">
                    <br>
                     <?php echo $this->Form->submit('submit_btn.png',array('id'=>"submit")); ?>
                </form>

            </div>

            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 mid_payment">

                <h5>Payment Method</h5>
                 <?php echo $this->Html->image('paypal_img.png'); ?>
                 <?php echo $this->Html->image('amri_img.png'); ?>
                 <?php echo $this->Html->image('discover_img.png'); ?>
                 <?php echo $this->Html->image('visa_img.png'); ?>
                 <?php echo $this->Html->image('m_img.png'); ?>
                <div class="payment">Currency</div>
                  <?php echo $this->Html->image('1_img.png'); ?>
                  <?php echo $this->Html->image('2_img.png'); ?>
                  <?php echo $this->Html->image('3_img.png'); ?>
                  <?php echo $this->Html->image('4_img.png'); ?>
                  <?php echo $this->Html->image('5_img.png'); ?>
            </div>

            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">

                <div class="social_links">

                    <div class="social">CONNECT US</div>

                    <ul class="list-inline">

                        <li><a href="#">
                            <div class="facebook"></div>
                        </a></li>

                        <li><a href="#">
                            <div class="twitter"></div>
                        </a></li>

                        <li><a href="#">
                            <div class="youtube"></div>
                        </a></li>

                        <li><a href="#">
                            <div class="skype"></div>
                        </a></li>

                        <li><a href="#">
                            <div class="printrest"></div>
                        </a></li>

                        <li><a href="#">
                            <div class="mail"></div>
                        </a></li>

                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="copyright">
    <div class="copyright_container">
        Copyright &copy; <?php echo date('Y'); ?> by Brandnex. All rights reserved.

    </div>

</div>