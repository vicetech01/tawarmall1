<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Classified Matrimony</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo bootstrap_path;?>css/bootstrap.min.css">
  
  <link rel="stylesheet" href="<?php echo plugin_path;?>datatables/dataTables.bootstrap.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
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
<body class="hold-transition skin-blue sidebar-mini sidebar-collapse">
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
        Informational Page Management
        
      </h1>
     
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        
        <!-- /.col -->
        <div class="col-md-12">
          <div class="box box-default">
        <div class="box-header with-border">
        <?php if(isset($edit_rec))?>
        <?php foreach($edit_rec as $edit_record)?>
          <h3 class="box-title"><?php if($edit_record){?>Edit<?php }else{?>Add New<?php }?> Page</h3>
<?php echo $this->session->flashdata('message'); ?></span>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
        <form method="post" action="<?php echo page_url;?>Pages/Content/<?php if(isset($edit_record)){?>update_page<?php }else{?>add_page<?php }?>">
        <input type="hidden" name="page_id" value="<?php if(isset($edit_record)){echo $edit_record->id;}?>">
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label>Page Name<span style="color:red;">*</span> <?php echo form_error('name');?></label>
                
                <input type="text" class="form-control" name="name" id="name" placeholder="Page Name" value="<?php if(isset($edit_record)){ echo $edit_record->Page_name;}?><?php echo set_value('name');?>">
              </div>
              
            </div>
            <!-- /.col -->
            <div class="col-md-4">
              <div class="form-group">
                <label>Page Title</label>
                <input type="text" class="form-control" placeholder="Page Title" name="page_title" value="<?php if(isset($edit_record)){ echo $edit_record->page_title;}?><?php echo set_value('page_title');?>">
              </div>
              
            </div>
            
            <div class="col-md-4">
              <div class="form-group">
                <label>Meta Keywords</label>
                <input type="text" class="form-control" placeholder="Meta Keywords" name="meta_keyword" value="<?php if(isset($edit_record)){ echo $edit_record->meta_keyword;}?><?php echo set_value('meta_keyword');?>">
              </div>
              
            </div>
            
            <div class="col-md-4">
              <div class="form-group">
                <label>Meta Descripton</label>
                <textarea class="form-control" name="meta_description"><?php if(isset($edit_record)){ echo $edit_record->meta_description;}?><?php echo set_value('meta_description');?></textarea>
              </div>
              
              <div class="form-group">
                <label>Show on Top/Bottom<span style="color:red;">*</span> <?php echo form_error('show_on');?></label>
                
                <select class="form-control" name="show_on" id="show_on">
                	<option value="<?php if(isset($edit_record)){ echo $edit_record->show_on_top;}?>">---Select Anyone Option---</option>
                	<option value="1">---Top---</option>
                    <option value="2">---Footer---</option>
                </select>
                
              </div>
              
            </div>
            
            <div class="col-md-8">
              <div class="form-group">
                <label>Page Content<span style="color:red">*</span> <?php echo form_error('content');?></label>
                
                <textarea class="form-control" name="content" id="content"><?php if(isset($edit_record)){ echo $edit_record->description;}?><?php echo set_value('content');?></textarea>
                
              </div>
              <div class="row">
            	<div class="col-md-10"></div>
                <div class="col-md-2">
                    <div class="form-group">
                    
                         <button type="submit" class="btn btn-block btn-success"><?php if(isset($edit_record)){?>Update<?php }else{?>Submit<?php }?></button>
                    </div>
                </div>
            </div>
              
            </div>
            
            
            <!-- /.col -->
          </div>
          <!-- /.row -->
          </form>
        </div>
        <!-- /.box-body -->
        
      </div>
          <!-- /. box -->
          
          <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Informational Pages Content</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>S No.</th>
                  <th>Page Name</th>
                  <th>Page Title</th>
                  <th>Meta Keyword</th>
                  <th>Meta Description</th>
                  <th>Page Content</th>
                  <th>Show on Top</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php
				    $i=0; 
					$this->db->select('*');
					$this->db->from('informational_pages');
					$query = $this->db->get();
					$res = $query->result();
					foreach($res as $row)
					{
				?>
                <tr>
                  <td><?php echo $i;?></td>
                  <td><?php echo $row->Page_name;?></td>
                  <td><?php echo $row->page_title;?></td>
                  <td><?php echo $row->meta_keyword;?></td>
                  <td><?php echo $row->meta_description;?></td>
                  <td><?php echo $row->description;?></td>
                  <td><?php if($row->show_on_top=='1'){?>Yes<?php }else{?>No<?php }?></td>
                  <td><?php if($row->status=='1'){$status = "<button type='button' class='btn btn-block btn-success btn-xs'>Active</button>";}else{$status="<button type='button' class='btn btn-block btn-danger btn-xs'>Inactive</button>";}?><a href="<?php echo page_url;?>Pages/Content/update_page_status/<?php echo $row->status;?>/<?php echo $row->id;?>"><?php echo $status;?></a></td>
                  <td><a href="<?php echo page_url;?>Pages/Content/edit_page/<?php echo $row->id;?>"><i class="fa fa-pencil"></i></a> &nbsp; &nbsp; &nbsp;<a href="<?php echo page_url;?>Pages/Content/delete_page/<?php echo $row->id;?>"><i class="fa fa-trash"></i></a></td>
                </tr>
                
                <?php $i++;}?>
                </tbody>
                
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
      
      
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    
    <strong>Copyright &copy; 2017 Powered by <a href="http://www.netjunglemedia.com">NetJungle Media</a>.</strong>
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
</body>
</html>
