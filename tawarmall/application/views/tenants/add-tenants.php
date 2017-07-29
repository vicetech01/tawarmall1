<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Add Tenants</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo bootstrap_path;?>css/bootstrap.min.css">
  
  <link rel="stylesheet" href="<?php echo plugin_path;?>datatables/dataTables.bootstrap.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-timepicker/0.5.2/css/bootstrap-timepicker.min.css">
  <!-- fullCalendar 2.2.5-->
  <link rel="stylesheet" href="<?php echo plugin_path;?>fullcalendar/fullcalendar.min.css">
  <link rel="stylesheet" href="<?php echo plugin_path;?>fullcalendar/fullcalendar.print.css" media="print">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo dist_path;?>css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo dist_path;?>css/skins/_all-skins.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo plugin_path;?>iCheck/flat/blue.css">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
     <?php $this->load->view('Common/top_nav.php');?>
    
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <?php $this->load->view('Common/nav_menu.php');?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Add New Tenants 
        
      </h1>
     
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
       
        <!-- /.col -->
        <div class="col-md-12">
          <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title" style="color:red"><?php echo $this->session->flashdata('message'); ?></h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
          </div>
        </div>
        <!-- /.box-header -->
        
        <form name="frm" action="<?php echo page_url;?>Tenants/add" method="post" enctype="multipart/form-data">
        <div class="box-body">
          <div class="row">
          
          <div id="repeated">
          
          <div class="col-md-3">
            
              <div class="form-group">
                <label>No. Of Shops <span style="color:red">*</span></label>
               <select type="text" class="form-control" placeholder="No. of shops" name="nshops" id="nshops" onChange="shopsdata(this.value);">
               <?php
			  
			   //echo $a;exit;
			   for($i=1;$i<4;$i++)
			   {
			   ?>
               <option value="<?php echo $i;?>"><?php echo $i;?></option>
               <?php
			   }
			   ?>
          
               
               </select>
              </div>
              </div>
             
            <div class="col-md-3" style="clear:both">
              <div class="form-group">
                <label>Brand Name <span style="color:red">*</span></label>
                <input type="text" class="form-control" name="bname[]" value="" placeholder="Brand Name">
                <?php echo form_error('bname');?>
              </div>
              
            </div>
            <!-- /.col -->
            <div class="col-md-3">
            
              <div class="form-group">
                <label>Brand Logo</label>
                <input type="file" class="form-control" name="logo[]" id="logo[]">
              </div>
              </div>
              
              
               <!-- /.col -->
            <div class="col-md-3">
            
              <div class="form-group">
                <label>Category <span style="color:red">*</span></label>
                <select class="form-control" name="category[]" id="category[]" >
                
               <option value="">Select Category</option>
               <option value="Shop">Shop</option>
               <option value="Dinning">Dinning</option>
               <option value="Entertainment">Entertainment</option>
               
               	<option value ="Banking">Banking</option>
													<option value ="Beauty/Healthcare/Perfume">Beauty/Healthcare/Perfume</option>
													<option value ="Department Stores">Department Stores</option>
													<option value ="Electronics">Electronics</option>
													<option value ="Entertainment">Entertainment</option>
													<option value ="Eyewear">Eyewear</option>
													<option value ="Fashion">Fashion</option>
													<option value ="Flowers & Toys">Flowers & Toys</option>
													<option value ="Food & Beverage">Food & Beverage</option>
													<option value ="Footwear">Footwear</option>
													<option value ="Handbags">Handbags</option>
													<option value ="Home Furnishing & Lifestyle">Home Furnishing & Lifestyle</option>
													<option value ="Hypermarket">Hypermarket</option>
													<option value ="Jewellery">Jewellery</option>
													<option value ="Lingerie">Lingerie</option>
													<option value ="Sporting Goods & Athletic wear">Sporting Goods & Athletic wear</option>
						                          
                
                </select>
                <?php echo form_error('category');?>
              </div>
              </div>
              
              
              
              <div class="col-md-3">
            
              <div class="form-group">
                <label>Sub Category <span style="color:red">*</span></label>
                <select class="form-control" name="subcat[]" id="subcat[]" >
                
               <option value="">Select Sub Category</option>
               <option value="Shop">Shop</option>
               <option value="Dinning">Dinning</option>
               <option value="Entertainment">Entertainment</option>
               
               	<option value ="Banking">Banking</option>
													<option value ="Beauty/Healthcare/Perfume">Beauty/Healthcare/Perfume</option>
													<option value ="Department Stores">Department Stores</option>
													<option value ="Electronics">Electronics</option>
													<option value ="Entertainment">Entertainment</option>
													<option value ="Eyewear">Eyewear</option>
													<option value ="Fashion">Fashion</option>
													<option value ="Flowers & Toys">Flowers & Toys</option>
													<option value ="Food & Beverage">Food & Beverage</option>
													<option value ="Footwear">Footwear</option>
													<option value ="Handbags">Handbags</option>
													<option value ="Home Furnishing & Lifestyle">Home Furnishing & Lifestyle</option>
													<option value ="Hypermarket">Hypermarket</option>
													<option value ="Jewellery">Jewellery</option>
													<option value ="Lingerie">Lingerie</option>
													<option value ="Sporting Goods & Athletic wear">Sporting Goods & Athletic wear</option>
						                          
                
                </select>
                <?php echo form_error('category');?>
              </div>
              </div>
              
              
              
              
              
               <div class="col-md-3">
            
              <div class="form-group">
                <label>Property Image</label>
                <input type="file" class="form-control" name="pimage[]" id="pimage[]" multiple>
              </div>
              </div>
              
              
               <div class="col-md-3">
            
              <div class="form-group">
                <label>Property Brochure</label>
                <input type="file" class="form-control" name="pbrouch[]" id="pbrouch[]">
              </div>
              </div>
              
                <div class="col-md-6">
            
              <div class="form-group">
                <label>Description</label>
               <textarea class="form-control" name="desc[]" id="desc[]" placeholder="Description">
                
                </textarea>
              </div>
              </div>
              
              
               
                <div class="col-md-3">
            
              <div class="form-group">
                <label>Website</label>
                <input type="text" class="form-control" name="web[]" id="web[]" placeholder="www.example.com">
              </div>
              </div>
              
              
              
               
                <div class="col-md-3">
            
              <div class="form-group">
                <label>Shop Timming</label>
               <input type="text" class="form-control stimeing" name="stime[]" id="t1" placeholder="Shop Timmings" value="">
              </div>
              </div>
              
              </div>
             
              
              <div id="repeated1" style="display:none;clear:both;border-top:dashed 1px;color:#000000;">
            <div class="col-md-3">
              <div class="form-group">
                <label>Brand Name <span style="color:red">*</span></label>
                <input type="text" class="form-control" name="bname[]" value="" placeholder="Brand Name">
                <?php echo form_error('bname');?>
              </div>
              
            </div>
            <!-- /.col -->
            <div class="col-md-3">
            
              <div class="form-group">
                <label>Brand Logo</label>
                <input type="file" class="form-control" name="logo[]" id="logo[]">
              </div>
              </div>
              
              
               <!-- /.col -->
            <div class="col-md-3">
            
              <div class="form-group">
                <label>Category <span style="color:red">*</span></label>
                <select class="form-control" name="category[]" id="category[]" >
                
               <option value="">Select Category</option>
               <option value="Shop">Shop</option>
               <option value="Dinning">Dinning</option>
               <option value="Entertainment">Entertainment</option>
               
               	<option value ="Banking">Banking</option>
													<option value ="Beauty/Healthcare/Perfume">Beauty/Healthcare/Perfume</option>
													<option value ="Department Stores">Department Stores</option>
													<option value ="Electronics">Electronics</option>
													<option value ="Entertainment">Entertainment</option>
													<option value ="Eyewear">Eyewear</option>
													<option value ="Fashion">Fashion</option>
													<option value ="Flowers & Toys">Flowers & Toys</option>
													<option value ="Food & Beverage">Food & Beverage</option>
													<option value ="Footwear">Footwear</option>
													<option value ="Handbags">Handbags</option>
													<option value ="Home Furnishing & Lifestyle">Home Furnishing & Lifestyle</option>
													<option value ="Hypermarket">Hypermarket</option>
													<option value ="Jewellery">Jewellery</option>
													<option value ="Lingerie">Lingerie</option>
													<option value ="Sporting Goods & Athletic wear">Sporting Goods & Athletic wear</option>
						                          
                
                </select>
                <?php echo form_error('category');?>
              </div>
              </div>
              
              
              
              <div class="col-md-3">
            
              <div class="form-group">
                <label>Sub Category <span style="color:red">*</span></label>
                <select class="form-control" name="subcat[]" id="subcat[]" >
                
               <option value="">Select Sub Category</option>
               <option value="Shop">Shop</option>
               <option value="Dinning">Dinning</option>
               <option value="Entertainment">Entertainment</option>
               
               	<option value ="Banking">Banking</option>
													<option value ="Beauty/Healthcare/Perfume">Beauty/Healthcare/Perfume</option>
													<option value ="Department Stores">Department Stores</option>
													<option value ="Electronics">Electronics</option>
													<option value ="Entertainment">Entertainment</option>
													<option value ="Eyewear">Eyewear</option>
													<option value ="Fashion">Fashion</option>
													<option value ="Flowers & Toys">Flowers & Toys</option>
													<option value ="Food & Beverage">Food & Beverage</option>
													<option value ="Footwear">Footwear</option>
													<option value ="Handbags">Handbags</option>
													<option value ="Home Furnishing & Lifestyle">Home Furnishing & Lifestyle</option>
													<option value ="Hypermarket">Hypermarket</option>
													<option value ="Jewellery">Jewellery</option>
													<option value ="Lingerie">Lingerie</option>
													<option value ="Sporting Goods & Athletic wear">Sporting Goods & Athletic wear</option>
						                          
                
                </select>
                <?php echo form_error('category');?>
              </div>
              </div>
              
              
              
              
              
               <div class="col-md-3">
            
              <div class="form-group">
                <label>Property Image</label>
                <input type="file" class="form-control" name="pimage[]" id="pimage[]" multiple>
              </div>
              </div>
              
              
               <div class="col-md-3">
            
              <div class="form-group">
                <label>Property Brochure</label>
                <input type="file" class="form-control" name="pbrouch[]" id="pbrouch[]">
              </div>
              </div>
              
                <div class="col-md-6">
            
              <div class="form-group">
                <label>Description</label>
               <textarea class="form-control" name="desc[]" id="desc[]" placeholder="Description">
                
                </textarea>
              </div>
              </div>
              
              
               
                <div class="col-md-3">
            
              <div class="form-group">
                <label>Website</label>
                <input type="text" class="form-control" name="web[]" id="web[]" placeholder="www.example.com">
              </div>
              </div>
              
              
              
               
                <div class="col-md-3">
            
              <div class="form-group">
                <label>Shop Timming</label>
               <input type="text" class="form-control stimeing" name="stime[]" id="t2" placeholder="Shop Timmings" value="">
              </div>
              </div>
              
              </div>
              
           
              
              <div id="repeated2" style="display:none;clear:both;border-top:dashed 1px;color:#000000;">
             
            <div class="col-md-3">
              <div class="form-group">
                <label>Brand Name <span style="color:red">*</span></label>
                <input type="text" class="form-control" name="bname[]" value="" placeholder="Brand Name">
                <?php echo form_error('bname');?>
              </div>
              
            </div>
            <!-- /.col -->
            <div class="col-md-3">
            
              <div class="form-group">
                <label>Brand Logo</label>
                <input type="file" class="form-control" name="logo[]" id="logo">
              </div>
              </div>
              
              
               <!-- /.col -->
            <div class="col-md-3">
            
              <div class="form-group">
                <label>Category <span style="color:red">*</span></label>
                <select class="form-control" name="category[]" id="category[]" >
                
               <option value="">Select Category</option>
               <option value="Shop">Shop</option>
               <option value="Dinning">Dinning</option>
               <option value="Entertainment">Entertainment</option>
               
               	<option value ="Banking">Banking</option>
													<option value ="Beauty/Healthcare/Perfume">Beauty/Healthcare/Perfume</option>
													<option value ="Department Stores">Department Stores</option>
													<option value ="Electronics">Electronics</option>
													<option value ="Entertainment">Entertainment</option>
													<option value ="Eyewear">Eyewear</option>
													<option value ="Fashion">Fashion</option>
													<option value ="Flowers & Toys">Flowers & Toys</option>
													<option value ="Food & Beverage">Food & Beverage</option>
													<option value ="Footwear">Footwear</option>
													<option value ="Handbags">Handbags</option>
													<option value ="Home Furnishing & Lifestyle">Home Furnishing & Lifestyle</option>
													<option value ="Hypermarket">Hypermarket</option>
													<option value ="Jewellery">Jewellery</option>
													<option value ="Lingerie">Lingerie</option>
													<option value ="Sporting Goods & Athletic wear">Sporting Goods & Athletic wear</option>
						                          
                
                </select>
                <?php echo form_error('category');?>
              </div>
              </div>
              
              
              
              <div class="col-md-3">
            
              <div class="form-group">
                <label>Sub Category <span style="color:red">*</span></label>
                <select class="form-control" name="subcat[]" id="subcat[]" >
                
               <option value="">Select Sub Category</option>
               <option value="Shop">Shop</option>
               <option value="Dinning">Dinning</option>
               <option value="Entertainment">Entertainment</option>
               
               	<option value ="Banking">Banking</option>
													<option value ="Beauty/Healthcare/Perfume">Beauty/Healthcare/Perfume</option>
													<option value ="Department Stores">Department Stores</option>
													<option value ="Electronics">Electronics</option>
													<option value ="Entertainment">Entertainment</option>
													<option value ="Eyewear">Eyewear</option>
													<option value ="Fashion">Fashion</option>
													<option value ="Flowers & Toys">Flowers & Toys</option>
													<option value ="Food & Beverage">Food & Beverage</option>
													<option value ="Footwear">Footwear</option>
													<option value ="Handbags">Handbags</option>
													<option value ="Home Furnishing & Lifestyle">Home Furnishing & Lifestyle</option>
													<option value ="Hypermarket">Hypermarket</option>
													<option value ="Jewellery">Jewellery</option>
													<option value ="Lingerie">Lingerie</option>
													<option value ="Sporting Goods & Athletic wear">Sporting Goods & Athletic wear</option>
						                          
                
                </select>
                <?php echo form_error('category');?>
              </div>
              </div>
              
              
              
              
              
               <div class="col-md-3">
            
              <div class="form-group">
                <label>Property Image</label>
                <input type="file" class="form-control" name="pimage[]" id="pimage[]" multiple>
              </div>
              </div>
              
              
               <div class="col-md-3">
            
              <div class="form-group">
                <label>Property Brochure</label>
                <input type="file" class="form-control" name="pbrouch[]" id="pbrouch[]">
              </div>
              </div>
              
                <div class="col-md-6">
            
              <div class="form-group">
                <label>Description</label>
               <textarea class="form-control" name="desc[]" id="desc[]" placeholder="Description">
                
                </textarea>
              </div>
              </div>
              
              
               
                <div class="col-md-3">
            
              <div class="form-group">
                <label>Website</label>
                <input type="text" class="form-control" name="web[]" id="web[]" placeholder="www.example.com">
              </div>
              </div>
              
              
              
               
                <div class="col-md-3">
            
              <div class="form-group">
                <label>Shop Timming</label>
               <input type="text" class="form-control stimeing" name="stime[]" id="t3" placeholder="Shop Timmings" value="">
              </div>
              </div>
              
              </div>
              
              
              
              <div class="col-md-6">
            
              <div class="form-group">
                <label>&nbsp;</label>
               <input type="text" class="form-control" name="name" id="name" placeholder="Name" style="visibility:hidden">
               <?php echo form_error('name');?>
              </div>
              </div>
              
              
             
              
                <div class="col-md-3">
            
              <div class="form-group">
                <label>Registered Name <span style="color:red">*</span></label>
               <input type="text" class="form-control" name="name" id="name" placeholder="Name">
               <?php echo form_error('name');?>
              </div>
              </div>
              
              
              
                <div class="col-md-3">
            
              <div class="form-group">
                <label>Registered Email <span style="color:red">*</span></label>
               <input type="text" class="form-control" name="email" id="email" placeholder="demo@example.com">
               <?php echo form_error('email');?>
              </div>
              </div>
              
              
              
                <div class="col-md-3">
            
              <div class="form-group">
                <label>Registered Phone</label>
               <input type="text" class="form-control" name="phone" id="phone" placeholder="Contact Number">
              </div>
              </div>
              
              
              
                <div class="col-md-3">
            
              <div class="form-group">
                <label>Password <span style="color:red">*</span></label>
               <input type="password" class="form-control" name="pass" id="pass" placeholder="Password">
               <?php echo form_error('pass');?>
              </div>
              </div>
              
              
              	
                <div class="col-md-3">
            
              <div class="form-group">
                <label>Confirm Password <span style="color:red">*</span></label>
               <input type="password" class="form-control" name="cpass" id="cpass" placeholder="Confirm Password">
               <?php echo form_error('cpass');?>
              </div>
              </div>
              
              
              
               <div class="row">
            	<div class="col-md-10"></div>
                <div class="col-md-2">
                    <div class="form-group">
                     <button type="submit" class="btn btn-block btn-success">Submit</button>
                    </div>
                </div>
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        </form>
        <!-- /.box-body -->
        
      </div>
          <!-- /. box -->
          
          
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
      
      
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    
    <strong>Copyright &copy; 2017.</strong>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Recent Activity</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-birthday-cake bg-red"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                <p>Will be 23 on April 24th</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-user bg-yellow"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

                <p>New phone +1(800)555-1234</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

                <p>nora@example.com</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-file-code-o bg-green"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                <p>Execution time 5 seconds</p>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

        <h3 class="control-sidebar-heading">Tasks Progress</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Custom Template Design
                <span class="label label-danger pull-right">70%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Update Resume
                <span class="label label-success pull-right">95%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-success" style="width: 95%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Laravel Integration
                <span class="label label-warning pull-right">50%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Back End Framework
                <span class="label label-primary pull-right">68%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->
      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
        <form method="post">
          <h3 class="control-sidebar-heading">General Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Report panel usage
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Some information about this general settings option
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Allow mail redirect
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Other sets of options are available
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Expose author name in posts
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Allow the user to show his name in blog posts
            </p>
          </div>
          <!-- /.form-group -->

          <h3 class="control-sidebar-heading">Chat Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Show me as online
              <input type="checkbox" class="pull-right" checked>
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Turn off notifications
              <input type="checkbox" class="pull-right">
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Delete chat history
              <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
            </label>
          </div>
          <!-- /.form-group -->
        </form>
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3.1.1 -->
<script src="<?php echo plugin_path;?>jQuery/jquery-3.1.1.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo bootstrap_path;?>js/bootstrap.min.js"></script>
<!-- Slimscroll -->
<script src="<?php echo plugin_path;?>slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo plugin_path;?>fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo dist_path;?>js/adminlte.min.js"></script>
<!-- iCheck -->
<script src="<?php echo plugin_path;?>iCheck/icheck.min.js"></script>

<script src="<?php echo plugin_path;?>datatables/jquery.dataTables.min.js"></script>


<script src="<?php echo plugin_path;?>datatables/dataTables.bootstrap.min.js"></script>
<!-- Page Script -->
<script>
  $(function () {
    //Enable iCheck plugin for checkboxes
    //iCheck for checkbox and radio inputs
    $('.mailbox-messages input[type="checkbox"]').iCheck({
      checkboxClass: 'icheckbox_flat-blue',
      radioClass: 'iradio_flat-blue'
    });

    //Enable check and uncheck all functionality
    $(".checkbox-toggle").click(function () {
      var clicks = $(this).data('clicks');
      if (clicks) {
        //Uncheck all checkboxes
        $(".mailbox-messages input[type='checkbox']").iCheck("uncheck");
        $(".fa", this).removeClass("fa-check-square-o").addClass('fa-square-o');
      } else {
        //Check all checkboxes
        $(".mailbox-messages input[type='checkbox']").iCheck("check");
        $(".fa", this).removeClass("fa-square-o").addClass('fa-check-square-o');
      }
      $(this).data("clicks", !clicks);
    });

    //Handle starring for glyphicon and font awesome
    $(".mailbox-star").click(function (e) {
      e.preventDefault();
      //detect type
      var $this = $(this).find("a > i");
      var glyph = $this.hasClass("glyphicon");
      var fa = $this.hasClass("fa");

      //Switch states
      if (glyph) {
        $this.toggleClass("glyphicon-star");
        $this.toggleClass("glyphicon-star-empty");
      }

      if (fa) {
        $this.toggleClass("fa-star");
        $this.toggleClass("fa-star-o");
      }
    });
  });
</script>

<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo dist_path;?>js/demo.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-timepicker/0.5.2/js/bootstrap-timepicker.min.js"></script>
<script>
$("#t1").timepicker();
$("#t2").timepicker();
$("#t3").timepicker();
</script>
<script>
function shopsdata(id)
{

if(id=='2')
{
	$("#repeated1").show();
	$("#repeated2").hide();
	
}else if(id=='3')
{
	$("#repeated1").show();
	$("#repeated2").show();
	
}else
{
	$("#repeated1").hide();
	$("#repeated2").hide();
}
}
</script>
<script>
$(document).ready(function(){
    
        $("p").slideToggle();
   
});

</script>
</body>
</html>
