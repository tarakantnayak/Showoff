<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>The Widget App</title>
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/fontawesome-free/css/all.min.css'); ?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/dist/css/adminlte.min.css') ?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css'); ?>">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"/>
  <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<body class="hold-transition layout-top-nav">
<div class="wrapper">
  <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
    <div class="container">
      <a href="<?php echo base_url(); ?>" class="navbar-brand">
        <i class="nav-icon fas fa-th" class="brand-image img-circle elevation-3" style="opacity: .8"></i>
        <span class="brand-text font-weight-light"><b>The Widget App</b></span>
      </a>
      
      <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse order-3" id="navbarCollapse">
		
        <?php if ($this->session->userdata('username')){ ?>
			<form class="form-inline ml-0 ml-md-9">
			  <div class="input-group input-group-sm">
				<input class="form-control form-control-navbar" id="search_my_term" type="search" placeholder="Search" aria-label="Search">
				<div class="input-group-append">
				  <a class="btn btn-navbar" type="button" onclick="search_my_widget();">
					<i class="fas fa-search"></i>
				  </a>
				</div>
			  </div>
			</form>
		<?php } else { ?>
			<form class="form-inline ml-0 ml-md-9">
			  <div class="input-group input-group-sm">
				<input class="form-control form-control-navbar" id="search_term" type="search" placeholder="Search" aria-label="Search">
				<div class="input-group-append">
				  <a class="btn btn-navbar" type="button" onclick="search_widget();">
					<i class="fas fa-search"></i>
				  </a>
				</div>
			  </div>
			</form>
		<?php } ?>
      </div>
	  <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
		<?php if ($this->session->userdata('username')){ ?>
		  <li class="nav-item dropdown">
			<a class="nav-link" data-toggle="dropdown" href="#">
			  <i class="fa fa-user mr-2"></i> <?php echo $this->session->userdata('username'); ?> <i class="fa fa-caret-down"></i>
			</a>
			<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
			  <div class="dropdown-divider"></div>
			  <a onclick="user_logout();" class="dropdown-item nav-link">
				<i class="fa fa-sign-out-alt mr-2"></i> Logout
			  </a>
			  <div class="dropdown-divider"></div>
			  <a data-toggle="modal" data-target="#change_password_modal" class="dropdown-item nav-link">
				<i class="fas fa-unlock-alt mr-2"></i> Change Password
			  </a>
			  <div class="dropdown-divider"></div>
			  <a data-toggle="modal" data-target="#profile_update_modal" class="dropdown-item nav-link">
				<i class="fas fa-user mr-2"></i> Update Profile
			  </a>
			  <div class="dropdown-divider"></div>
			  <a data-toggle="modal" data-target="#create_widget_modal" class="dropdown-item nav-link">
				<i class="fas fa-th mr-2"></i> Create Widget
			  </a>
			</div>
		  </li>
		<?php } else { ?>
        <!-- Messages Dropdown Menu -->
		<li class="nav-item dropdown">
			<a class="nav-link" data-toggle="dropdown" href="#">
			  Account <i class="fa fa-caret-down"></i>
			</a>
			<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
			  <div class="dropdown-divider"></div>
			  <a data-toggle="modal" data-target="#login_modal" class="dropdown-item nav-link">
				<i class="fa fa-sign-in-alt mr-2"></i> Login
			  </a>
			  <div class="dropdown-divider"></div>
			  <a data-toggle="modal" data-target="#signup_modal" class="dropdown-item nav-link">
				<i class="fas fa-user mr-2"></i> Sign Up
			  </a>
		  </li>
		<?php } ?>
      </ul>
    </div>
  </nav>
  <!-- /.navbar -->
	<div class="modal fade" id="login_modal" role="dialog">
		<div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Login</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
			<div id="signup_success"></div>
			<div id="reset_success"></div>
              <input type="text" id="login_email_id" class="form-control" name="login" placeholder="Email Id"><br>
			  <input type="text" id="login_password" class="form-control" name="login" placeholder="Password"><br>
			  <div id="buttons" align="center">
				<button type="button" class="btn btn-info" onclick="user_login();">Log In</button><br>
			  </div>
			  <div id="login_failure"></div>
            </div>
            <div class="modal-footer justify-content-between">
              <button class="btn btn-block btn-outline-primary btn-sm" data-toggle="modal" data-target="#reset_modal" onclick="hide_modal_except('reset_modal','H');">Reset Password</button>
              <button class="btn btn-block btn-outline-primary btn-sm" data-toggle="modal" data-target="#signup_modal" onclick="hide_modal_except('signup_modal','H');">New User? Sign Up</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
	</div>
	<div class="modal fade" id="signup_modal" role="dialog">
		<div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Sign Up / Register</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
			<div id="signup_success"></div>
			<div id="reset_success"></div>
			<form id="sign_up_form" enctype="multipart/form-data" class="form-horizontal">
			  <input type="text" id="first_name" class="form-control" name="first_name" placeholder="First Name"><br>
			  <input type="text" id="last_name" class="form-control" name="last_name" placeholder="Last Name"><br>
			  <input type="text" id="signup_email_id" class="form-control" name="signup_email_id" placeholder="Email Id"><br>
			  <input type="text" id="signup_password" class="form-control" name="signup_password" placeholder="Password"><br>								 
			  <input type="file" id="image_url" class="form-control" name="image_url" placeholder="Image"><br>
			  <div id="buttons" align="center">
				<button type="submit" class="btn btn-info" name="submit" id="sign_up_form">Sign Up</button>
			  </div>
			  <div id="signup_failure"></div>
			</form>
            </div>
            <div class="modal-footer justify-content-between">
              <button class="btn btn-block btn-outline-primary btn-sm" data-toggle="modal" data-target="#reset_modal" onclick="hide_modal_except('reset_modal','H');">Forgot Password? Reset Here!</button>
              <button class="btn btn-block btn-outline-primary btn-sm" data-toggle="modal" data-target="#login_modal" onclick="hide_modal_except('login_modal','H');">Login</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
	</div>
	<div class="modal fade" id="reset_modal" role="dialog">
		<div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Forgot Password</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
			<div id="signup_success"></div>
			<div id="reset_success"></div>
			  <input type="text" id="reset_email_id" class="form-control" name="reset" placeholder="Email Id"><br>
			  <div id="buttons" align="center">
				<button type="button" class="btn btn-info" onclick="user_reset_password();">Reset Password</button><br>
			  </div>
			  <div id="reset_failure"></div>
            </div>
            <div class="modal-footer justify-content-between">
              <button class="btn btn-block btn-outline-primary btn-sm" data-toggle="modal" data-target="#login_modal" onclick="hide_modal_except('login_modal','H');">Login</button>
              <button class="btn btn-block btn-outline-primary btn-sm" data-toggle="modal" data-target="#signup_modal" onclick="hide_modal_except('signup_modal','H');">New User? Sign Up</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
	</div>
	  <div class="modal fade" id="create_widget_modal" role="dialog">
		<div class="modal-dialog">
		  <div class="modal-content">
			<div class="modal-header">
			  <h4 class="modal-title">Create Widget</h4>
			  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			  </button>
			</div>
			<div class="modal-body">
				<div id="cw_success"></div>
				<div class="form-group">
				  <label for="exampleInputEmail1">Widget Name</label>
				  <input type="text" id="widget_name" class="form-control" name="create_widget" placeholder="Widget Name">
				</div>
				<div class="form-group">
				  <label for="exampleInputEmail1">Description</label>
				  <textarea type="text" id="widget_desc" class="form-control" name="create_widget" placeholder="Description" ></textarea>
				</div>
				<div class="form-group">
				  <label for="exampleInputEmail1">Select a Widget Kind</label>
				  <select id="widget_kind" name="create_widget" class="form-control">
					<option value="hidden">Hidden</option>
					<option value="visible">Visible</option>
				  </select>
				</div>
				<div id="cw_failure"></div>
			</div>
			<div class="modal-footer justify-content-between">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary" onclick="create_widget();">Create Widget</button>
			</div>
		  </div>
		  <!-- /.modal-content -->
		</div>
	   </div>
	   
	  <div class="modal fade" id="change_password_modal" role="dialog">
		<div class="modal-dialog">
		  <div class="modal-content">
			<div class="modal-header">
			  <h4 class="modal-title">Change Password</h4>
			  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			  </button>
			</div>
			<div class="modal-body">
				<div id="cp_success"></div>
				<div class="form-group">
				  <label for="exampleInputEmail1">Current Password</label>
				  <input type="text" id="cp_current_password" class="form-control" name="cp_current_password" placeholder="Current Password">
				</div>
				<div class="form-group">
				  <label for="exampleInputEmail1">New Password</label>
				  <input type="text" id="cp_new_password" class="form-control" name="cp_new_password" placeholder="New Password" />
				</div>
				<div id="cp_failure"></div>
			</div>
			<div class="modal-footer justify-content-between">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary" onclick="change_password();">Change Password</button>
			</div>
		  </div>
		  <!-- /.modal-content -->
		</div>
	   </div>
	   
	   
	  <div class="modal fade" id="profile_update_modal" role="dialog">
		<div class="modal-dialog">
		  <div class="modal-content">
			<div class="modal-header">
			  <h4 class="modal-title">Update Profile</h4>
			  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			  </button>
			</div>
			<div class="modal-body">
			  <form id="profile_form" enctype="multipart/form-data" class="form-horizontal">
				<div id="up_success"></div>
				<div class="form-group">
				  <label for="exampleInputEmail1">First Name</label>
				  <input type="text" id="up_first_name" class="form-control" name="up_first_name" placeholder="First Name" value="<?php echo $display['display_first_name']; ?>">
				</div>
				<div class="form-group">
				  <label for="exampleInputEmail1">Last Name</label>
				  <input type="text" id="up_last_name" class="form-control" name="up_last_name" placeholder="Last Name"  value="<?php echo  $display['display_last_name']; ?>" />
				</div>
				<div class="form-group">
				  <label for="exampleInputEmail1">Date Of Birth</label>
				  <input type="date" id="up_date_of_birth" class="form-control" name="up_date_of_birth" placeholder="Date Of Birth"  value="<?php echo  $display['display_date_of_birth']; ?>" />
				</div>
				<div class="form-group">
				  <label for="exampleInputEmail1">Image URL</label><img src="<?php echo $display['display_small_url']; ?>" style="height:100px;width:100px" />
				  <input type="file" id="up_image_url" class="form-control" name="up_image_url" placeholder="Image URL" />
				</div>
				<div id="up_failure"></div><br>
			    <div id="buttons" align="center">
					<button type="submit" class="btn btn-info" name="submit" id="profile_form">Save Changes</button>
			    </div>
			  </form>
			</div>
		  </div>
		  <!-- /.modal-content -->
		</div>
	   </div>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
	<section class="content">
      <div class="container-fluid">
      <?php if ($this->session->userdata('username')){ ?>
        <h5 class="mb-2">My Widgets</h5>
        <?php } else { ?>
        <h5 class="mb-2">All Visible Widgets</h5>
        <?php }  ?>
        <div class="row">
		  <?php if($mega_header['data']['widgets']) { ?>
		  <?php foreach ($mega_header['data']['widgets'] as $widget) { ?>
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <img src="<?php echo $widget['user']['images']['small_url']; ?>" alt="small url" style="height:100px; width:100px">

              <div class="info-box-content">
                <span class="info-box-text"><b><?php echo $widget['name']; ?></b></span>
                <span class="info-box-number"><small style="position: relative;display: inline-block;word-wrap: break-word;overflow: hidden;max-height: 1em; /* (Number of lines you want visible) * (line-height) */ line-height: 1.2em;text-align:justify;text-overflow: ellipsis;"><?php echo $widget['description']; ?></small></span>
				<?php if ($this->session->userdata('username')){ ?>
					<span class="info-box-text"><small><?php echo $widget['kind']; ?></small></span>
				<?php } ?>
				<span class="info-box-text"><em><?php echo $widget['user']['name']; ?></em>
				<?php if ($this->session->userdata('username')){ ?>
					<button type="button" class="btn btn-tool" data-toggle="modal" data-target="#update_widget_modal<?php echo $widget['id']; ?>" title="Edit Widget"><i class="fas fa-edit btn btn-block btn-outline-primary btn-sm"></i>
					<button type="button" class="btn btn-tool" onclick="destroy_widget(<?php echo $widget['id']; ?>);" title="Delete Widget"><i class="fas fa-trash-alt btn btn-block btn-outline-warning btn-sm"></i></span>
				<?php } else { ?>
					</span>
					<button type="button" class="btn btn-tool" data-toggle="modal" data-target="#view_user_widget_modal<?php echo $widget['id']; ?>" title="View All Visible Widgets Of This User"><i class="far fa-eye btn btn-block btn-outline-primary btn-sm"></i>
				<?php } ?>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          
          
           <div class="modal fade" id="view_user_widget_modal<?php echo $widget['id']; ?>" role="dialog">
			<div class="modal-dialog">
			  <div class="modal-content">
				<div class="modal-header">
				  <h4 class="modal-title">Enter Any Serach Term You Like</h4>
				  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				  </button>
				</div>
				<div class="modal-body">
					<div id="vw_success"></div>
					<div class="form-group">
                      <label for="exampleInputEmail1">Search Term (Not Mandatory)</label>
					  <input type="text" id="user_search_term<?php echo $widget['id']; ?>" class="form-control" name="user_search_term" placeholder="User Search Term">
                    </div>
					<div id="vw_failure"></div> <br>
				</div>
				<div class="modal-footer justify-content-between">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="button" class="btn btn-primary" onclick="view_user_widget(<?php echo $widget['id']; ?>, <?php echo $widget['user']['id']; ?>);">Show Widgets</button>
				</div>
			  </div>
			  <!-- /.modal-content -->
			</div>
		   </div>
          
		  <div class="modal fade" id="update_widget_modal<?php echo $widget['id']; ?>" role="dialog">
			<div class="modal-dialog">
			  <div class="modal-content">
				<div class="modal-header">
				  <h4 class="modal-title">Update Widget</h4>
				  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				  </button>
				</div>
				<div class="modal-body">
					<div id="uw_success"></div>
					<div class="form-group">
                      <label for="exampleInputEmail1">Widget Name</label>
					  <input type="text" id="widget_name<?php echo $widget['id']; ?>" class="form-control" name="update_widget" placeholder="Widget Name" value="<?php echo $widget['name']; ?>">
                    </div>
					<div class="form-group">
                      <label for="exampleInputEmail1">Description</label>
					  <textarea type="text" id="widget_desc<?php echo $widget['id']; ?>" class="form-control" name="update_widget" placeholder="Description" ><?php echo $widget['description']; ?></textarea>
                    </div>
					<div id="uw_failure"></div> <br>
				</div>
				<div class="modal-footer justify-content-between">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="button" class="btn btn-primary" onclick="update_widget(<?php echo $widget['id']; ?>);">Save Changes</button>
				</div>
			  </div>
			  <!-- /.modal-content -->
			</div>
		   </div>
		  
		  <?php } ?>
		  <?php } else { ?>
			Sorry, no widgets found.
		  <?php } ?>
        </div>
        <!-- /.row -->
	</section>
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2020-2021 The Widget Team </strong> All rights reserved.
  </footer>
</div>
<script>
	$("form#sign_up_form").submit(function(e) {
		//alert("123");
		e.preventDefault();
		$.ajax({
			url: '<?=base_url()?>index.php/methods/user_signup',
			type: "POST",
			data: new FormData(this),
			contentType: false,
			cache: false,
			processData: false,
			dataType: 'json',
			success: function(response){
				try {
					if (response['code'] == 0){
					//	alert('successfully signed up');
						hide_modal_except('login_modal', 'S');
						$("#signup_success").html('<div class="col-md-12 text-center" style="color:#33cc33"><b>' + response['message'] + '</b></div>').show('fast').delay(5000).hide('fast');
					} else {
						//alert('failed to sign up');
						$("#signup_failure").html('<div class="col-md-12 text-center" style="color:red"><b>' + response['message'] + '</b></div>').show('fast').delay(5000).hide('fast');
					}
				} catch (e) {
					//alert("in exception");
					alert(e.message);
				}
			},
			error: function (xhr, ajaxOptions, thrownError) {
				alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
			}
		});
	});
		
</script>

<script>
	$("form#profile_form").submit(function(e) {
		//alert("123");
		e.preventDefault();
		$.ajax({
			url: '<?=base_url()?>index.php/methods/update_profile',
			type: "POST",
			data: new FormData(this),
			contentType: false,
			cache: false,
			processData: false,
			dataType: 'json',
			success: function(response){
				try {
					if (response['code'] == 0){
						alert('successfully updated the profile :'+<?=base_url()?>);
						window.location = '<?=base_url()?>';
						$("#up_success").html('<div class="col-md-12 text-center" style="color:#33cc33"><b>' + response['message'] + '</b></div>').show('fast').delay(5000).hide('fast');
						
					} else {
						$("#up_failure").html('<div class="col-md-12 text-center" style="color:#33cc33"><b>' + response['message'] + '</b></div>').show('fast').delay(5000).hide('fast');
					}
				} catch (e) {
					alert(e.message);
				}
			},
			error: function (xhr, ajaxOptions, thrownError) {
				alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
			}
		});
	});
		
</script>
<script>
function user_login(){
	//alert("inside user login");
	
	var email_id = document.getElementById('login_email_id').value;
	var password = document.getElementById('login_password').value;
	
	//alert("email_id :"+email_id);
	//alert("password is :"+password);
	
	$.ajax({
		method: 'post',
		url: '<?=base_url()?>index.php/methods/user_login',
		data: {email_id: email_id, password:password},
		dataType: 'json',
		success: function(response){
		//	alert('login successful');
			//alert("code from json :"+json['code']);
			
			//alert('code :'+response['code']);
			try {
    			if (response['code'] == 0){
    			//	alert('successfully logged in');
    			      window.location = '<?=base_url()?>';
      				
    			} else {
    				$("#login_failure").html('<div class="col-md-12 text-center" style="color:red"><b>' + response['message'] + '</b></div>').show('fast').delay(5000).hide('fast');
    			}
			} catch (e) {
				//alert("in exception");
				alert(e.message);
			}
		},
		error: function (xhr, ajaxOptions, thrownError) {
			alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
		}
	});

}
</script>
<script>
function hide_modal_except(modal_name, action_type){
	//alert("inside hide_modal_except :"+modal_name);
		//alert("1");
		if ($('#signup_modal').hasClass('show') == true){
			//alert("1.1");
			$('#signup_modal').modal('hide');
			//alert("1.2");
		}
		//alert("2");
		if ($('#reset_modal').hasClass('show') == true){
			//alert("2.1");
			$('#reset_modal').modal('hide');
			//alert("2.2");
		}
		//alert("3");
		if ($('#login_modal').hasClass('show') == true){
			//alert("3.1");
			$('#login_modal').modal('hide');
			//alert("3.2");
		}

		if (action_type == 'S'){ //if it's S, Show the modal, else ignore
			$('#' +modal_name).modal('show');
		}
		//alert("4");
	
}
</script>
<script>
function user_reset_password(){
	//alert("inside user password reset");
	
	var reset_email_id = document.getElementById('reset_email_id').value;
	
	$.ajax({
		method: 'post',
		url: '<?=base_url()?>index.php/methods/user_reset_password',
		data: {reset_email_id: reset_email_id},
		dataType: 'json',
		success: function(response){
			//alert("message :"+json['message']);
			//alert("value :"+json['value']);
			//response = JSON.parse(json);
			try {
    			if (response['code'] == 0){
    				//alert('successfully reset the password');
    				hide_modal_except('login_modal', 'S');
    				$("#reset_success").html('<div class="col-md-12 text-center" style="color:#33cc33"><b>' + response['message'] + '</b></div>').show('fast').delay(5000).hide('fast');
    				
    			} else {
    				$("#reset_failure").html('<div class="col-md-12 text-center" style="color:red"><b>' + response['message'] + '</b></div>').show('fast').delay(5000).hide('fast');
    			}
			} catch (e) {
				alert(e.message);
			}
		},
		error: function (xhr, ajaxOptions, thrownError) {
			alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
		}
	});

}
</script>
<script>
function search_widget(){
	//alert("inside search widget");
	
	var search_term = document.getElementById('search_term').value;
	var url = '<?=base_url()?>index.php?search_term='+search_term;

	//alert('url is :'+url);
	
	window.location = url;
}
</script>

<script>
function search_my_widget(){
	//alert("inside search my widget");
	
	var search_term = document.getElementById('search_my_term').value;
	var url = '<?=base_url()?>index.php?search_term='+search_term;

	//alert('url is :'+url);
	
	window.location = url;
}
</script>

<script>
function view_user_widget(widget_id, user_id){
//	alert("inside destroy widget");
	
	
	var search_term = document.getElementById('user_search_term'+widget_id).value;
	var url = '<?=base_url()?>index.php?search_term='+ search_term + '&user_id='+ user_id;

//	alert('url is :'+url);
	
	window.location = url;
}

</script>

<script>
function user_logout(){
	//alert("inside user login");
	//alert("email_id :"+email_id);
	//alert("password is :"+password);
	
	$.ajax({
		method: 'post',
		url: '<?=base_url()?>index.php/methods/user_logout',
		dataType: 'json',
		success: function(response){
			//alert("code from json :"+json['code']);
			
			//alert('code :'+response['code']);
			try {
    			if (response['code'] == 0){
//    				//alert('successfully logged out');
    			      window.location = '<?=base_url()?>';
      				
    			} else {
    				$("#login_failure").html('<div class="col-md-12 text-center" style="color:#33cc33"><b>' + response['message'] + '</b></div>').show('fast').delay(5000).hide('fast');
    			}
			} catch (e) {
	//			alert("in exception");
				alert(e.message);
			}
		},
		error: function (xhr, ajaxOptions, thrownError) {
			alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
		}
	});

}
</script>
<script>
function change_password(){
	//alert("inside change password");
	
	var current_password = document.getElementById('cp_current_password').value;
	var new_password = document.getElementById('cp_new_password').value;
	var message;

	
	if (!current_password){
		message = 'Current Password cannot be empty';
		$("#cp_failure").html('<div class="col-md-12 text-center" style="color:#33cc33"><b>' + message + '</b></div>').show('fast').delay(5000).hide('fast');
		return;
	}

	if (!new_password){
		message = 'New Password cannot be empty';
		$("#cp_failure").html('<div class="col-md-12 text-center" style="color:#33cc33"><b>' + message + '</b></div>').show('fast').delay(5000).hide('fast');
		return;
	}

	if (current_password == new_password){
		message = 'Both current & new Passwords cannot be same';
		$("#cp_failure").html('<div class="col-md-12 text-center" style="color:#33cc33"><b>' + message + '</b></div>').show('fast').delay(5000).hide('fast');
		return;

	}
	
	$.ajax({
		method: 'post',
		url: '<?=base_url()?>index.php/methods/change_password',
		data: {current_password: current_password, new_password: new_password},
		dataType: 'json',
		success: function(response){
			//alert("message :"+json['message']);
			//alert("value :"+json['value']);
			//response = JSON.parse(json);
			try {
    			if (response['code'] == 0){
    				//alert('successfully changed the password');
    				window.location = '<?=base_url()?>';
    				$("#cp_success").html('<div class="col-md-12 text-center" style="color:#33cc33"><b>' + response['message'] + '</b></div>').show('fast').delay(5000).hide('fast');
    				
    			} else {
    				$("#cp_failure").html('<div class="col-md-12 text-center" style="color:#33cc33"><b>' + response['message'] + '</b></div>').show('fast').delay(5000).hide('fast');
    			}
			} catch (e) {
				alert(e.message);
			}
		},
		error: function (xhr, ajaxOptions, thrownError) {
			alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
		}
	});

}
</script>


<script>
function create_widget(){
	//alert("inside create widget");
	
	var widget_name = document.getElementById('widget_name').value;
	var widget_desc = document.getElementById('widget_desc').value;
	var widget_kind = document.getElementById('widget_kind').value;
	
	$.ajax({
		method: 'post',
		url: '<?=base_url()?>index.php/methods/create_widget',
		data: {widget_name: widget_name, widget_desc: widget_desc, widget_kind: widget_kind},
		dataType: 'json',
		success: function(response){
			//alert("message :"+json['message']);
			//alert("value :"+json['value']);
			//response = JSON.parse(json);
			try {
    			if (response['code'] == 0){
    				//alert('successfully created a widget');
    				$("#cw_success").html('<div class="col-md-12 text-center" style="color:#33cc33"><b>' + response['message'] + '</b></div>').show('fast').delay(5000).hide('fast');
    				window.location = '<?=base_url()?>';
    				
    			} else {
    				$("#cw_failure").html('<div class="col-md-12 text-center" style="color:#33cc33"><b>' + response['message'] + '</b></div>').show('fast').delay(5000).hide('fast');
    			}
			} catch (e) {
				alert(e.message);
			}
		},
		error: function (xhr, ajaxOptions, thrownError) {
			alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
		}
	});

}
</script>
<script>
function update_widget(widget_id){
	//alert("inside update widget");
	
	var widget_name = document.getElementById('widget_name'+widget_id).value;
	var widget_desc = document.getElementById('widget_desc'+widget_id).value;
	
	$.ajax({
		method: 'post',
		url: '<?=base_url()?>index.php/methods/update_widget',
		data: {widget_name: widget_name, widget_desc: widget_desc, widget_id: widget_id},
		dataType: 'json',
		success: function(response){
			//alert("message :"+json['message']);
			//alert("value :"+json['value']);
			//response = JSON.parse(json);
			try {
    			if (response['code'] == 0){
    				//alert('successfully updated a widget');
    				$("#uw_success").html('<div class="col-md-12 text-center" style="color:#33cc33"><b>' + response['message'] + '</b></div>').show('fast').delay(5000).hide('fast');
    				window.location = '<?=base_url()?>';
    				
    			} else {
    				$("#uw_failure").html('<div class="col-md-12 text-center" style="color:#33cc33"><b>' + response['message'] + '</b></div>').show('fast').delay(5000).hide('fast');
    			}
			} catch (e) {
				alert(e.message);
			}
		},
		error: function (xhr, ajaxOptions, thrownError) {
			alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
		}
	});

}
</script>

<script>
function view_user(user_id, widget_id){
	alert("inside view_user");
	
	$.ajax({
		method: 'post',
		url: '<?=base_url()?>index.php/methods/view_user',
		data: {user_id: user_id},
		dataType: 'json',
		success: function(response){
			//alert("message :"+json['message']);
			//alert("value :"+json['value']);
			//response = JSON.parse(json);
			try {
    			if (response['code'] == 0){
    				//alert('successfully updated a widget');
    				$("#vu_success").html('<div class="col-md-12 text-center" style="color:#33cc33"><b>' + response['message'] + '</b></div>').show('fast').delay(5000).hide('fast');
    				document.getElementById('first_name'+widget_id).value = response['data']['user']['first_name'];
    				document.getElementById('last_name'+widget_id).value = response['data']['user']['last_name'];
    				
    			} else {
    				$("#vu_failure").html('<div class="col-md-12 text-center" style="color:#33cc33"><b>' + response['message'] + '</b></div>').show('fast').delay(5000).hide('fast');
    			}
			} catch (e) {
				alert(e.message);
			}
		},
		error: function (xhr, ajaxOptions, thrownError) {
			alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
		}
	});

}
</script>



<script>
function destroy_widget(widget_id){
	//alert("inside destroy widget");
	
	$.ajax({
		method: 'post',
		url: '<?=base_url()?>index.php/methods/destroy_widget',
		data: {widget_id: widget_id},
		dataType: 'json',
		success: function(response){
			//alert("message :"+json['message']);
			//alert("value :"+json['value']);
			//response = JSON.parse(json);
			try {
    			if (response['code'] == 0){
    				//alert('successfully destroyed a widget');
    				$("#dw_success").html('<div class="col-md-12 text-center" style="color:#33cc33"><b>' + response['message'] + '</b></div>').show('fast').delay(5000).hide('fast');
    				window.location = '<?=base_url()?>';
    				
    			} else {
    				$("#dw_failure").html('<div class="col-md-12 text-center" style="color:#33cc33"><b>' + response['message'] + '</b></div>').show('fast').delay(5000).hide('fast');
    			}
			} catch (e) {
				alert(e.message);
			}
		},
		error: function (xhr, ajaxOptions, thrownError) {
			alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
		}
	});

}
</script>


<script src="<?php echo base_url('assets/plugins/jquery/jquery.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/plugins/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/dist/js/adminlte.min.js'); ?>"></script>
</body>
</html>
