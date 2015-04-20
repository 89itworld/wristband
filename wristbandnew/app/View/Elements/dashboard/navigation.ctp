<div class="col-sm-4 col-lg-2 col-md-3 sidenav-padd hidden-xs">
    <ul class="list-group nav-shadow">
    	<li class="list-group-item <?php echo (!empty($this->params['controller']) && ($this->params['controller']=='Users') && !empty($this->params['action']) && ($this->params['action']=='bandhead_dashboard') )?'active' :'' ?>"><?php echo $this->Html->link('<i class="fa fa-dashboard"></i> Dashboard',array('controller'=>'Users','action'=>'dashboard'),array('escape'=>false)); ?></li>
    	<li class="list-group-item <?php echo (!empty($this->params['controller']) && ($this->params['controller']=='Users')  && !empty($this->params['action']) && ($this->params['action']=='bandhead_users')  )?'active' :'' ?>"><?php echo $this->Html->link('<i class="fa fa-group"></i> Manage Users',array('controller'=>'Users','action'=>'users'),array('escape'=>false)); ?></li>
    	<li class="list-group-item <?php echo (!empty($this->params['controller']) && ($this->params['controller']=='ProductCategories') )?'active' :'' ?>"><?php echo $this->Html->link('<i class="fa fa-line-chart"></i> Manage Product Categories ',array('controller'=>'ProductCategories','action'=>'index', 'bandhead' => true),array('escape'=>false)); ?></li>
    	<li class="list-group-item <?php echo (!empty($this->params['controller']) && ($this->params['controller']=='Products') )?'active' :'' ?>"><?php echo $this->Html->link('<i class="fa fa-pie-chart"></i> Manage Products',array('controller'=>'Products','action'=>'index', 'bandhead' => true),array('escape'=>false)); ?></li>
    	<li class="list-group-item <?php echo (!empty($this->params['controller']) && ($this->params['controller']=='ProductSizes') )?'active' :'' ?>"><?php echo $this->Html->link('<i class="fa fa-cube"></i> Manage Products Sizes',array('controller'=>'ProductSizes','action'=>'index', 'bandhead' => true),array('escape'=>false)); ?></li>
    	<li class="list-group-item <?php echo (!empty($this->params['controller']) && ($this->params['controller']=='ProductStyles') )?'active' :'' ?>"><?php echo $this->Html->link('<i class="fa fa-cubes"></i> Manage Products Styles',array('controller'=>'ProductStyles','action'=>'index', 'bandhead' => true),array('escape'=>false)); ?></li>
    	<li class="list-group-item <?php echo (!empty($this->params['controller']) && ($this->params['controller']=='Prices') )?'active' :'' ?>"><?php echo $this->Html->link('<i class="fa fa-money"></i> Manage Products Price',array('controller'=>'Prices','action'=>'index', 'bandhead' => true),array('escape'=>false)); ?></li>
    	<li class="list-group-item <?php echo (!empty($this->params['controller']) && ($this->params['controller']=='Colors') )?'active' :'' ?>"><?php echo $this->Html->link('<i class="fa fa-paint-brush"></i> Manage Colors',array('controller'=>'Colors','action'=>'index', 'bandhead' => true),array('escape'=> false)); ?></li>
    	<li class="list-group-item <?php echo (!empty($this->params['controller']) && ($this->params['controller']=='Cliparts') )?'active' :'' ?>"><?php echo $this->Html->link('<i class="fa fa-puzzle-piece"></i> Manage Cliparts',array('controller'=>'Cliparts','action'=>'index', 'bandhead' => true),array('escape'=>false)); ?></li>
    	<li class="list-group-item <?php echo (!empty($this->params['controller']) && ($this->params['controller']=='QuantityPrices') )?'active' :'' ?>"><?php echo $this->Html->link('<i class="fa fa-shopping-cart"></i> Manage Quantity',array('controller'=>'QuantityPrices','action'=>'index', 'bandhead' => true),array('escape'=>false)); ?></li>
    	<li class="list-group-item <?php echo (!empty($this->params['controller']) && ($this->params['controller']=='CmsPages') )?'active' :'' ?>"><?php echo $this->Html->link('<i class="fa fa-book"></i> Manage Pages',array('controller'=>'CmsPages','action'=>'index', 'bandhead' => true),array('escape'=>false)); ?></li>
    	<li class="list-group-item <?php echo (!empty($this->params['controller']) && ($this->params['controller']=='EmailTemplates') )?'active' :'' ?>"><?php echo $this->Html->link('<i class="fa fa-file-text"></i> Manage Template',array('controller'=>'EmailTemplates','action'=>'index', 'bandhead' => true),array('escape'=>false)); ?></li>
    	<li class="list-group-item <?php echo (!empty($this->params['controller']) && ($this->params['controller']=='ShippingPrices') )?'active' :'' ?>"><?php echo $this->Html->link('<i class="fa fa-plane"></i> Manage Shipping Prices',array('controller'=>'ShippingPrices','action'=>'index', 'bandhead' => true),array('escape'=>false)); ?></li>
    	<li class="list-group-item <?php echo (!empty($this->params['controller']) && ($this->params['controller']=='Banners') )?'active' :'' ?>"><?php echo $this->Html->link('<i class="fa fa-picture-o"></i> Manage Banners',array('controller'=>'Banners','action'=>'index', 'bandhead' => true),array('escape'=>false)); ?></li>
    	<li class="list-group-item <?php echo (!empty($this->params['controller']) && ($this->params['controller']=='Orders') )?'active' :'' ?>"><?php echo $this->Html->link('<i class="fa fa-truck"></i> Manage Orders',array('controller'=>'Orders','action'=>'index', 'bandhead' => true),array('escape'=>false)); ?></li>
    	<li class="list-group-item <?php echo (!empty($this->params['controller']) && ($this->params['controller']=='Options') )?'active' :'' ?>"><?php echo $this->Html->link('<i class="fa fa-support"></i> Manage Options',array('controller'=>'Options','action'=>'index', 'bandhead' => true),array('escape'=>false)); ?></li>
    	<li class="list-group-item <?php echo (!empty($this->params['controller']) && ($this->params['controller']=='Fonts') )?'active' :'' ?>"><?php echo $this->Html->link('<i class="fa fa-adn"></i> Manage Fonts',array('controller'=>'Fonts','action'=>'index', 'bandhead' => true),array('escape'=>false)); ?></li>
    	<li class="list-group-item <?php echo (!empty($this->params['controller']) && ($this->params['controller']=='Galleries') )?'active' :'' ?>"><?php echo $this->Html->link('<i class="fa fa-film"></i> Manage Gallery',array('controller'=>'Galleries','action'=>'index', 'bandhead' => true),array('escape'=>false)); ?></li>
    	<li class="list-group-item <?php echo (!empty($this->params['controller']) && ($this->params['controller']=='ProductColors') )?'active' :'' ?>"><?php echo $this->Html->link('<i class="fa fa-eyedropper"></i> Manage Product Colors',array('controller'=>'ProductColors','action'=>'index', 'bandhead' => true),array('escape'=>false)); ?></li>
       	<li class="list-group-item <?php echo (!empty($this->params['controller']) && ($this->params['controller']=='Tabs') )?'active' :'' ?>"><?php echo $this->Html->link('<i class="fa fa-th-large"></i> Manage Tabs',array('controller'=>'Tabs','action'=>'index', 'bandhead' => true),array('escape'=>false)); ?></li>
       	<li class="list-group-item <?php echo (!empty($this->params['controller']) && ($this->params['controller']=='SubTabs') )?'active' :'' ?>"><?php echo $this->Html->link('<i class="fa fa-th-list"></i> Manage  Sub Tabs',array('controller'=>'SubTabs','action'=>'index', 'bandhead' => true),array('escape'=>false)); ?></li>
		<li class="list-group-item <?php echo (!empty($this->params['controller']) && ($this->params['controller']=='OtherPrices') )?'active' :'' ?>"><?php echo $this->Html->link('<i class="fa fa-th-list"></i> Manage  Other Prices',array('controller'=>'OtherPrices','action'=>'index', 'bandhead' => true),array('escape'=>false)); ?></li>
  		<li class="list-group-item <?php echo (!empty($this->params['controller']) && ($this->params['controller']=='Domains') )?'active' :'' ?>"><?php echo $this->Html->link('<i class="fa fa-th-list"></i> Manage  Domain',array('controller'=>'Domains','action'=>'index', 'bandhead' => true),array('escape'=>false)); ?></li>

    </ul>
</div>