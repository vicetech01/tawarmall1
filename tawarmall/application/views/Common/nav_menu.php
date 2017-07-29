<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo dist_path;?>img/man.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo  $this->session->userdata['logged_in']['user_name'];?></p>
          
        </div>
      </div>
     
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        
        
        
        <li class="active treeview menu-open">
          <a href="<?php echo page_url;?>Dashboard">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          
          </a>	
         </li>

<?php $user =   $this->session->userdata['logged_in']['user_name'];
if($user=='Admin'){?>

<li class="treeview menu-close">
          <a href="">
            <i class="fa fa-files-o"></i>
            <span>Tenant Management</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo page_url;?>Tenants"><i class="fa fa-circle-o"></i>New Tenants</a></li>
            <li><a href="<?php echo page_url;?>Tenants/list_records"><i class="fa fa-circle-o"></i>All tenants</a></li>
            
          </ul>
          
        </li>

<!--<li class="treeview menu-close">
          <a href="">
            <i class="fa fa-files-o"></i>
            <span>Shop Management</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href=""><i class="fa fa-circle-o"></i>Shop Allocation</a></li>
            <li><a href=""><i class="fa fa-circle-o"></i>New Product</a></li>
            
          </ul>
          
        </li>-->
        
        
        <li class="treeview menu-close">
          <a href="">
            <i class="fa fa-files-o"></i>
            <span>Notifications</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo page_url;?>Tenants/list_notifications"><i class="fa fa-circle-o"></i>Inbox</a></li>
            <li><a href="<?php echo page_url;?>/Tenants/notificationamount"><i class="fa fa-circle-o"></i>Add Amount</a></li>
            <li><a href=""><i class="fa fa-circle-o"></i>Status</a></li>
            
          </ul>
          
        </li>
        
        
         
        <li class="treeview menu-close">
          <a href="">
            <i class="fa fa-files-o"></i>
            <span>Deals/Offers/Events</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo page_url;?>Tenants/list_deals"><i class="fa fa-circle-o"></i>Available Deals</a></li>
            <!--<li><a href="<?php echo page_url;?>Tenants/list_events"><i class="fa fa-circle-o"></i>Available Events</a></li>-->
            
          </ul>
          
        </li>
        
        
        
          
        <li class="treeview menu-close">
          <a href="">
            <i class="fa fa-files-o"></i>
            <span>SOS Services</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo page_url;?>Tenants/list_lostfound"><i class="fa fa-circle-o"></i>Inbox</a></li>
            <li><a href="<?php echo page_url;?>Tenants/list_log"><i class="fa fa-circle-o"></i>Complaints</a></li>
            
          </ul>
          
        </li>


<?php }else{?>

<li><a href=""><i class="fa fa-circle-o"></i> Profile</a></li>
 
 
 <li class="treeview menu-close">
          <a href="">
            <i class="fa fa-files-o"></i>
            <span>Product Management</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo page_url;?>Tenants/product"><i class="fa fa-circle-o"></i>New Product</a></li>
            <li><a href="<?php echo page_url;?>Tenants/all_products"><i class="fa fa-circle-o"></i> All Products</a></li>
            
          </ul>
          
        </li>
        
        
        <li class="treeview menu-close">
          <a href="">
            <i class="fa fa-files-o"></i>
            <span>Notifications</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo page_url;?>Tenants/notification"><i class="fa fa-circle-o"></i>New Notifications</a></li>
            <li><a href="<?php echo page_url;?>Tenants/tenant_list_notifications"><i class="fa fa-circle-o"></i> Status</a></li>
            
          </ul>
          
        </li>
        
        
         
        <li class="treeview menu-close">
          <a href="">
            <i class="fa fa-files-o"></i>
            <span>Deals/Events</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo page_url;?>Tenants/deals"><i class="fa fa-circle-o"></i>New</a></li>
            <li><a href="<?php echo page_url;?>Tenants/tenant_list_deals"><i class="fa fa-circle-o"></i> Status</a></li>
            
          </ul>
          
        </li>
        
        
        
        <li class="treeview menu-close">
          <a href="">
            <i class="fa fa-files-o"></i>
            <span>SOS Services</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo page_url;?>Tenants/log_request"><i class="fa fa-circle-o"></i>Log Request</a></li>
            <li><a href="<?php echo page_url;?>Tenants/tenant_list_log"><i class="fa fa-circle-o"></i> Status</a></li>
            <li><a href="<?php echo page_url;?>Tenants/lost_found"><i class="fa fa-circle-o"></i> Lost/Found</a></li>
            <li><a href="<?php echo page_url;?>Tenants/tenant_list_lostfound"><i class="fa fa-circle-o"></i> Status</a></li>
            
          </ul>
          
        </li>
        
        
   <?php }?>    
        
       
        
        
        
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>