<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Tawarmall | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo bootstrap_path;?>css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="<?php echo plugin_path;?>jvectormap/jquery-jvectormap-1.2.2.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo dist_path;?>css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo dist_path;?>css/skins/_all-skins.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini ">
<div class="wrapper">

  <header class="main-header">
 <!-- Header Navbar: style can be found in header.less -->
    <?php $this->load->view('Common/top_nav.php');?>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <?php $this->load->view('Common/nav_menu.php');?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        
      </h1>
     
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Info boxes -->
      <div class="row">
      
      <?php $user =   $this->session->userdata['logged_in']['user_name'];
			if($user=='Admin'){?>
        <!--<div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="ion ion-ios-gear-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Total Tenants</span>
              <span class="info-box-number">90<small>%</small></span>
            </div>
            
          </div>
        
        </div>-->

        <!-- /.col -->
       <?php }else
	   {?>
       
       <div class="container">
      <div class="row">
      <!--<div class="col-md-5  toppad  pull-right col-md-offset-3 ">
           <A href="edit.html" >Edit Profile</A>

        <A href="edit.html" >Logout</A>
       <br>
<p class=" text-info">May 05,2014,03:00 pm </p>
      </div>-->
      
      <?php
     $id=$this->session->userdata['logged_in']['user_id'];
	 
	 $this->db->select('*')->from('hoosk_tenant')->where('tenant_id',$id);
	 $que=$this->db->get();
	 $rest=$que->result();
	 foreach($rest as $res)
      ?>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >
   
   
          <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title"><strong><?php echo $res->fullname;?></strong></h3>
            </div>
            <div class="panel-body">
              <div class="row">
                <div class="col-md-3 col-lg-3 " align="center"> <img alt="User Pic" src="<?php echo ext_path;?><?php echo $res->brand_logo;?>" class="img-circle img-responsive"> </div>
                
               
                <div class=" col-md-9 col-lg-9 "> 
                  <table class="table table-user-information">
                    <tbody>
                      <tr>
                        <td>Brand Name:</td>
                          <td><strong><?php echo $res->brand_name;?></strong></td>
                      </tr>
                      <tr>
                        <td>Tenant ID:</td>
                        <td><?php echo $res->tenant_id;?></td>
   
                      </tr>
                      <tr>
                        <td>Category</td>
                        <td><?php echo $res->category;?></td>
                      </tr>
                   
                         <tr>
                             <tr>
                        <td>No. Of Shops</td>
                        <td><?php echo $res->no_of_shops;?></td>
                      </tr>
                        <tr>
                        <td>Shop Timmings</td>
                        <td><?php echo $res->shop_timing;?></td>
                      </tr>
                      <tr>
                        <td>Email</td>
                        <td><a href="mailto:<?php echo $res->email;?>"><?php echo $res->email;?></a></td>
                      </tr>
                      <tr>
                        <td>Phone Number</td>
                        <td><?php echo $res->phone;?>
                        </td>
                        </tr>
                        <tr>
                        <td>Website</td>
                        <td><?php echo $res->website;?></td>
                        </tr>
                           
                      </tr>
                     
                    </tbody>
                  </table>
                  
                 <!-- <a href="#" class="btn btn-primary">My Sales Performance</a>
                  <a href="#" class="btn btn-primary">Team Sales Performance</a>-->
                </div>
              </div>
            </div>
                
            
          </div>
        </div>
      </div>
    </div>
    
       <?php
	   }
	   ?>

        <!-- /.col -->
      </div>
      <!-- /.row -->

      
      <!-- /.row -->

      <!-- Main row -->
      
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
   
    <strong>Tawar Mall &copy; 2017 &nbsp;</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  
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
<!-- FastClick -->
<script src="<?php echo plugin_path;?>fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo dist_path;?>js/adminlte.js"></script>
<!-- Sparkline -->
<script src="<?php echo plugin_path;?>sparkline/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="<?php echo plugin_path;?>jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?php echo plugin_path;?>jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- SlimScroll 1.3.0 -->
<script src="<?php echo plugin_path;?>slimScroll/jquery.slimscroll.min.js"></script>
<!-- ChartJS 1.0.1 -->
<script src="<?php echo plugin_path;?>chartjs/Chart.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo dist_path;?>js/pages/dashboard2.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo dist_path;?>js/demo.js"></script>
</body>
</html>
