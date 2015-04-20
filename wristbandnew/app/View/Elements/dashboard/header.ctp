<!DOCTYPE html>
<html>
    <head>
        <title>Wristband</title>
        <?php echo $this->Html->charset(); ?>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <?php
            echo $this->Html->meta('img/favicon.png','/img/favicon.png',array('type' => 'icon'));
            echo $this->Html->css(array('form','buzz', 'bootstrap.min', 'font-awesome.min', 'stylesheet'),array('media'=>'screen'));
            echo $this->Html->script(array('jquery.min', 'jquery.validate1.13.1.min'));
        ?>

    </head>
<body>
        <nav class="navbar navbar-default head">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <?php echo $this->Html->link($this->Html->image('findmatic/logo.png',array('class' => "img-responsive center-block logo", 'style' => 'text-align: center;', 'alt' => 'logo')),array('controller'=>'Users','action'=>'dashboard','head'=>true),array('escape'=>false,'class'=>'navbar-brand admin-logo')); ?>
      
      
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right right">
        <ul class="list-group hidden-lg hidden-sm hidden-md">
            <li class="list-group-item <?php echo (!empty($this->params['controller']) && ($this->params['controller']=='Users') && !empty($this->params['action']) && ($this->params['action']=='bandhead_dashboard') )?'active' :'' ?>"><?php echo $this->Html->link('<i class="fa fa-dashboard"></i> Dashboard',array('controller'=>'Users','action'=>'dashboard'),array('escape'=>false)); ?></li>
        <li class="list-group-item <?php echo (!empty($this->params['controller']) && ($this->params['controller']=='Users')  && !empty($this->params['action']) && ($this->params['action']=='bandhead_users')  )?'active' :'' ?>"><?php echo $this->Html->link('<i class="fa fa-group"></i> Manage Users',array('controller'=>'Users','action'=>'users'),array('escape'=>false)); ?></li>
            <li class="list-group-item <?php echo (!empty($this->params['controller']) && ($this->params['controller']=='ProductCategories') )?'active' :'' ?>"><?php echo $this->Html->link('<i class="fa fa-2x fa-line-chart"></i> Manage Product Categories ',array('controller'=>'ProductCategories','action'=>'index', 'bandhead' => true),array('escape'=>false)); ?></li>
            <li class="list-group-item <?php echo (!empty($this->params['controller']) && ($this->params['controller']=='Products') )?'active' :'' ?>"><?php echo $this->Html->link('<i class="fa fa-2x fa-pie-chart"></i> Manage Products',array('controller'=>'Products','action'=>'index', 'bandhead' => true),array('escape'=>false)); ?></li>
            <li class="list-group-item <?php echo (!empty($this->params['controller']) && ($this->params['controller']=='ProductSizes') )?'active' :'' ?>"><?php echo $this->Html->link('<i class="fa fa-2x fa-cube"></i> Manage Products Sizes',array('controller'=>'ProductSizes','action'=>'index', 'bandhead' => true),array('escape'=>false)); ?></li>
            <li class="list-group-item <?php echo (!empty($this->params['controller']) && ($this->params['controller']=='ProductStyles') )?'active' :'' ?>"><?php echo $this->Html->link('<i class="fa fa-2x fa-cubes"></i> Manage Products Styles',array('controller'=>'ProductStyles','action'=>'index', 'bandhead' => true),array('escape'=>false)); ?></li>
            <li class="list-group-item <?php echo (!empty($this->params['controller']) && ($this->params['controller']=='Prices') )?'active' :'' ?>"><?php echo $this->Html->link('<i class="fa fa-2x fa-money"></i> Manage Products Price',array('controller'=>'Prices','action'=>'index', 'bandhead' => true),array('escape'=>false)); ?></li>
            <li class="list-group-item <?php echo (!empty($this->params['controller']) && ($this->params['controller']=='Colors') )?'active' :'' ?>"><?php echo $this->Html->link('<i class="fa fa-2x fa-paint-brush"></i> Manage Colors',array('controller'=>'Colors','action'=>'index', 'bandhead' => true),array('escape'=> false)); ?></li>
            <li class="list-group-item <?php echo (!empty($this->params['controller']) && ($this->params['controller']=='Cliparts') )?'active' :'' ?>"><?php echo $this->Html->link('<i class="fa fa-2x fa-puzzle-piece"></i> Manage Cliparts',array('controller'=>'Cliparts','action'=>'index', 'bandhead' => true),array('escape'=>false)); ?></li>
            <li class="list-group-item <?php echo (!empty($this->params['controller']) && ($this->params['controller']=='QuantityPrices') )?'active' :'' ?>"><?php echo $this->Html->link('<i class="fa fa-2x fa-shopping-cart"></i> Manage Quantity',array('controller'=>'QuantityPrices','action'=>'index', 'bandhead' => true),array('escape'=>false)); ?></li>
            <li class="list-group-item <?php echo (!empty($this->params['controller']) && ($this->params['controller']=='CmsPages') )?'active' :'' ?>"><?php echo $this->Html->link('<i class="fa fa-2x fa-book"></i> Manage Pages',array('controller'=>'CmsPages','action'=>'index', 'bandhead' => true),array('escape'=>false)); ?></li>
            <li class="list-group-item <?php echo (!empty($this->params['controller']) && ($this->params['controller']=='EmailTemplates') )?'active' :'' ?>"><?php echo $this->Html->link('<i class="fa fa-2x fa-file-text"></i> Manage Template',array('controller'=>'EmailTemplates','action'=>'index', 'bandhead' => true),array('escape'=>false)); ?></li>
            <li class="list-group-item <?php echo (!empty($this->params['controller']) && ($this->params['controller']=='ShippingPrices') )?'active' :'' ?>"><?php echo $this->Html->link('<i class="fa fa-2x fa-plane"></i> Manage Shipping Prices',array('controller'=>'ShippingPrices','action'=>'index', 'bandhead' => true),array('escape'=>false)); ?></li>
            <li class="list-group-item <?php echo (!empty($this->params['controller']) && ($this->params['controller']=='Banners') )?'active' :'' ?>"><?php echo $this->Html->link('<i class="fa fa-2x fa-picture-o"></i> Manage Banners',array('controller'=>'Banners','action'=>'index', 'bandhead' => true),array('escape'=>false)); ?></li>
        </ul>
        <li class="dropdown down">
          <a href="#" class="dropdown-toggle setting-padd" data-toggle="dropdown" role="button" aria-expanded="false">Setting <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu" style="background-color: #ffffff;" >
            <li> <?php echo $this->Html->link('Change Password', array('controller' => 'Users','action' => 'change_password','bandhead'=>true)); ?></li>
            <li>
                <?php echo $this->Html->link('Logout', array('controller' => 'Users','action' => 'logout')); ?>
                </li>
            <!-- <li class="divider"></li>
            <li><a href="#">Separated link</a></li> -->
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
