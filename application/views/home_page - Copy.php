<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="apple-touch-icon.png">

        <link rel="stylesheet" href="css/normalize.min.css">
        <link rel="stylesheet" href="css/main.css">

        <script src="js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<style>

/* BASIC */

html {
  background-color: #56baed;
}

body {
  font-family: "Poppins", sans-serif;
  height: 100vh;
}

a {
  color: #92badd;
  display:inline-block;
  text-decoration: none;
  font-weight: 400;
}

h2 {
  text-align: center;
  font-size: 16px;
  font-weight: 600;
  text-transform: uppercase;
  display:inline-block;
  margin: 40px 8px 10px 8px; 
  color: #cccccc;
}



/* STRUCTURE */

.wrapper {
  display: flex;
  align-items: center;
  flex-direction: column; 
  justify-content: center;
  width: 100%;
  min-height: 100%;
  padding: 20px;
}

#formContent {
  -webkit-border-radius: 10px 10px 10px 10px;
  border-radius: 10px 10px 10px 10px;
  background: #fff;
  padding: 30px;
  width: 90%;
  max-width: 450px;
  position: relative;
  padding: 0px;
  -webkit-box-shadow: 0 30px 60px 0 rgba(0,0,0,0.3);
  box-shadow: 0 30px 60px 0 rgba(0,0,0,0.3);
  text-align: center;
}

#formFooter {
  background-color: #f6f6f6;
  border-top: 1px solid #dce8f1;
  padding: 25px;
  text-align: center;
  -webkit-border-radius: 0 0 10px 10px;
  border-radius: 0 0 10px 10px;
}



/* TABS */

h2.inactive {
  color: #cccccc;
}

h2.active {
  color: #0d0d0d;
  border-bottom: 2px solid #5fbae9;
}



/* FORM TYPOGRAPHY*/

.btn_style  {
  background-color: #56baed;
  border: none;
  color: white;
  padding: 15px 80px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  text-transform: uppercase;
  font-size: 13px;
  -webkit-box-shadow: 0 10px 30px 0 rgba(95,186,233,0.4);
  box-shadow: 0 10px 30px 0 rgba(95,186,233,0.4);
  -webkit-border-radius: 5px 5px 5px 5px;
  border-radius: 5px 5px 5px 5px;
  margin: 5px 20px 40px 20px;
  -webkit-transition: all 0.3s ease-in-out;
  -moz-transition: all 0.3s ease-in-out;
  -ms-transition: all 0.3s ease-in-out;
  -o-transition: all 0.3s ease-in-out;
  transition: all 0.3s ease-in-out;
}

.btn_style:hover {
  background-color: #39ace7;
}

.btn_style:active {
  -moz-transform: scale(0.95);
  -webkit-transform: scale(0.95);
  -o-transform: scale(0.95);
  -ms-transform: scale(0.95);
  transform: scale(0.95);
}

input {
  background-color: #f6f6f6;
  border: none;
  color: #0d0d0d;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 5px;
  width: 85%;
  border: 2px solid #f6f6f6;
  -webkit-transition: all 0.5s ease-in-out;
  -moz-transition: all 0.5s ease-in-out;
  -ms-transition: all 0.5s ease-in-out;
  -o-transition: all 0.5s ease-in-out;
  transition: all 0.5s ease-in-out;
  -webkit-border-radius: 5px 5px 5px 5px;
  border-radius: 5px 5px 5px 5px;
}

input:focus {
  background-color: #fff;
  border-bottom: 2px solid #5fbae9;
}

input:placeholder {
  color: #cccccc;
}

.my_drop_down {
  background-color: #f6f6f6;
  border: none;
  color: #0d0d0d;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 5px;
  width: 85%;
  border: 2px solid #f6f6f6;
  -webkit-transition: all 0.5s ease-in-out;
  -moz-transition: all 0.5s ease-in-out;
  -ms-transition: all 0.5s ease-in-out;
  -o-transition: all 0.5s ease-in-out;
  transition: all 0.5s ease-in-out;
  -webkit-border-radius: 5px 5px 5px 5px;
  border-radius: 5px 5px 5px 5px;
}

.my_drop_down:focus {
  background-color: #fff;
  border-bottom: 2px solid #5fbae9;
}

.my_drop_down:placeholder {
  color: #cccccc;
}


/* ANIMATIONS */

/* Simple CSS3 Fade-in-down Animation */
.fadeInDown {
  -webkit-animation-name: fadeInDown;
  animation-name: fadeInDown;
  -webkit-animation-duration: 1s;
  animation-duration: 1s;
  -webkit-animation-fill-mode: both;
  animation-fill-mode: both;
}

@-webkit-keyframes fadeInDown {
  0% {
    opacity: 0;
    -webkit-transform: translate3d(0, -100%, 0);
    transform: translate3d(0, -100%, 0);
  }
  100% {
    opacity: 1;
    -webkit-transform: none;
    transform: none;
  }
}

@keyframes fadeInDown {
  0% {
    opacity: 0;
    -webkit-transform: translate3d(0, -100%, 0);
    transform: translate3d(0, -100%, 0);
  }
  100% {
    opacity: 1;
    -webkit-transform: none;
    transform: none;
  }
}

/* Simple CSS3 Fade-in Animation */
@-webkit-keyframes fadeIn { from { opacity:0; } to { opacity:1; } }
@-moz-keyframes fadeIn { from { opacity:0; } to { opacity:1; } }
@keyframes fadeIn { from { opacity:0; } to { opacity:1; } }

.fadeIn {
  opacity:0;
  -webkit-animation:fadeIn ease-in 1;
  -moz-animation:fadeIn ease-in 1;
  animation:fadeIn ease-in 1;

  -webkit-animation-fill-mode:forwards;
  -moz-animation-fill-mode:forwards;
  animation-fill-mode:forwards;

  -webkit-animation-duration:1s;
  -moz-animation-duration:1s;
  animation-duration:1s;
}

.fadeIn.first {
  -webkit-animation-delay: 0.4s;
  -moz-animation-delay: 0.4s;
  animation-delay: 0.4s;
}

.fadeIn.second {
  -webkit-animation-delay: 0.6s;
  -moz-animation-delay: 0.6s;
  animation-delay: 0.6s;
}

.fadeIn.third {
  -webkit-animation-delay: 0.8s;
  -moz-animation-delay: 0.8s;
  animation-delay: 0.8s;
}

.fadeIn.fourth {
  -webkit-animation-delay: 1s;
  -moz-animation-delay: 1s;
  animation-delay: 1s;
}

/* Simple CSS3 Fade-in Animation */
.underlineHover:after {
  display: block;
  left: 0;
  bottom: -10px;
  width: 0;
  height: 2px;
  background-color: #56baed;
  content: "";
  transition: width 0.2s;
}

.underlineHover:hover {
  color: #0d0d0d;
}

.underlineHover:hover:after{
  width: 100%;
}



/* OTHERS */

*:focus {
    outline: none;
} 

#icon {
  width:60%;
}


</style>

    </head>
    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->



        <div class="header-container">
            <header class="wrapper clearfix">
                <h1 class="title">The Widget Application (PHP Based)</h1>
                <nav>
                    <ul>
                        <?php if ($this->session->userdata('username')){ ?>
                            <li><a onclick="user_logout();" >Logout</a></li>
                            <li><a>Welcome <?php echo $this->session->userdata('username'); ?> !</a></li>
                            <li><a data-toggle="modal" data-target="#change_password_modal">Change Password</a></li>
                            <li><a data-toggle="modal" data-target="#profile_update_modal">Update Profile</a></li>
                            <li><a data-toggle="modal" data-target="#create_widget_modal">Create Widget</a></li>
                        <?php } else { ?>
 	                       <li><a data-toggle="modal" data-target="#login_modal" onclick="hide_modal_except('login_modal','H');" >Sign Up / Login</a></li>
 	                       <li><a data-toggle="modal" data-target="#search_widget_modal">Search Widget</a></li>
                        <?php } ?>
                    </ul>
                </nav>
            </header>
        </div>

        <div class="main-container">
		
			<div class="modal fade" id="login_modal" role="dialog">
			   <div class="modal-dialog">
				  <!-- Modal content-->
				  <div class="modal-content">
					 <div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Login</h4>
					 </div>
					 <div class="modal-body">
						<div class="wrapper fadeInDown">
						   <div id="formContent">
							  <!-- Tabs Titles -->
							  <!-- Icon -->
							  <div class="fadeIn first">
								 <img src="http://danielzawadzki.com/codepen/01/icon.svg" id="icon" alt="User Icon" />
							  </div>
							  <!-- Login Form -->
							  <div id="signup_success"></div>
							  <div id="reset_success"></div>
							  
							  <div>
								 <input type="text" id="login_email_id" class="fadeIn second" name="login" placeholder="Email Id">
								 <input type="text" id="login_password" class="fadeIn third" name="login" placeholder="Password">
								 <button type="button" class="fadeIn fourth btn_style" onclick="user_login();">Log In</button><br>
								 <div id="login_failure"></div> <br>
								 <a class="underlineHover" data-toggle="modal" data-target="#signup_modal" onclick="hide_modal_except('signup_modal','H');">New User? Sign Up</a>
							  </div>
							  <!-- Remind Passowrd -->
							  <div id="formFooter">
								 <a class="underlineHover" data-toggle="modal" data-target="#reset_modal" onclick="hide_modal_except('reset_modal','H');">Reset Password</a>
							 
							  </div>
						   </div>
						</div>
					 </div>
					 <div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					 </div>
				  </div>
			   </div>
			</div>
			
			<div class="modal fade" id="signup_modal" role="dialog">
			   <div class="modal-dialog">
				  <!-- Modal content-->
				  <div class="modal-content">
					 <div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Sign Up / Register</h4>
					 </div>
					 <div class="modal-body">
						<div class="wrapper fadeInDown">
						   <div id="formContent">
							  <!-- Tabs Titles -->
							  <!-- Icon -->
							  <div class="fadeIn first">
								 <img src="http://danielzawadzki.com/codepen/01/icon.svg" id="icon" alt="Sign Up" />
							  </div>
							  <!-- Signup Form -->
							  <div>
								 <input type="text" id="first_name" class="fadeIn second" name="sign_up" placeholder="First Name">
								 <input type="text" id="last_name" class="fadeIn second" name="sign_up" placeholder="Last Name">
								 <input type="text" id="signup_email_id" class="fadeIn second" name="sign_up" placeholder="Email Id">
								 <input type="text" id="signup_password" class="fadeIn second" name="sign_up" placeholder="Password">								 
								 <input type="file" id="image" class="fadeIn third" name="sign_up" placeholder="Image">
								 
								 <button type="button" class="fadeIn fourth btn_style" onclick="user_signup();">Sign Up</button><br>
								 <div id="signup_failure"></div> <br>
								 
								 <a class="underlineHover" data-toggle="modal" data-target="#login_modal" onclick="hide_modal_except('login_modal','H');">Login</a>
								 
								 
							  </div>
							  <!-- Remind Passowrd -->
							  <div id="formFooter">
								<a class="underlineHover" data-toggle="modal" data-target="#reset_modal" onclick="hide_modal_except('reset_modal','H');">Forgot Password? Reset Here!</a>
								
							  </div>
						   </div>
						</div>
					 </div>
					 <div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					 </div>
				  </div>
			   </div>
			</div>
			
			<div class="modal fade" id="reset_modal" role="dialog">
			   <div class="modal-dialog">
				  <!-- Modal content-->
				  <div class="modal-content">
					 <div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Forgot Password</h4>
					 </div>
					 <div class="modal-body">
						<div class="wrapper fadeInDown">
						   <div id="formContent">
							  <!-- Tabs Titles -->
							  <!-- Icon -->
							  <div class="fadeIn first">
								 <img src="http://danielzawadzki.com/codepen/01/icon.svg" id="icon" alt="Forgot Password" />
							  </div>
							  <!-- Login Form -->
							  <div>
								 <input type="text" id="reset_email_id" class="fadeIn second" name="reset" placeholder="Email Id">
								 <button type="button" class="fadeIn fourth btn_style" onclick="user_reset_password();">Reset Password</button><br>
								 <div id="reset_failure"></div> <br>
								 <a class="underlineHover" data-toggle="modal" data-target="#login_modal" onclick="hide_modal_except('login_modal','H');">Login</a>
							  </div>
							  <!-- Remind Passowrd -->
							  <div id="formFooter">
								 <a class="underlineHover" data-toggle="modal" data-target="#signup_modal" onclick="hide_modal_except('signup_modal','H');">New User? Sign Up</a>
							  </div>
						   </div>
						</div>
					 </div>
					 <div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					 </div>
				  </div>
			   </div>
			</div>	
			
			
			<div class="modal fade" id="change_password_modal" role="dialog">
			   <div class="modal-dialog">
				  <!-- Modal content-->
				  <div class="modal-content">
					 <div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Change Password</h4>
					 </div>
					 <div class="modal-body">
						<div class="wrapper fadeInDown">
						   <div id="formContent">
							  <!-- Tabs Titles -->
							  <!-- Icon -->
							  <div class="fadeIn first">
								 <img src="http://danielzawadzki.com/codepen/01/icon.svg" id="icon" alt="User Icon" />
							  </div>
							  <!-- Login Form -->
							  <div id="cp_success"></div> <br>
							  <div>
								 <input type="text" id="cp_current_password" class="fadeIn second" name="change_password" placeholder="Current Password">
								 <input type="text" id="cp_new_password" class="fadeIn third" name="change_password" placeholder="New Password">
								 <button type="button" class="fadeIn fourth btn_style" onclick="change_password();">Save Changes</button><br>
								 <div id="cp_failure"></div> <br>
							  </div>
							  <!-- Remind Passowrd -->
							  <div id="formFooter">
							 
							  </div>
						   </div>
						</div>
					 </div>
					 <div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					 </div>
				  </div>
			   </div>
			</div>
			
			
			
			<div class="modal fade" id="profile_update_modal" role="dialog">
			   <div class="modal-dialog">
				  <!-- Modal content-->
				  <div class="modal-content">
					 <div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Update Profile</h4>
					 </div>
					 <div class="modal-body">
						<div class="wrapper fadeInDown">
						   <div id="formContent">
							  <!-- Tabs Titles -->
							  <!-- Icon -->
							  <div class="fadeIn first">
								 <img src="http://danielzawadzki.com/codepen/01/icon.svg" id="icon" alt="User Icon" />
							  </div>
							  <!-- Login Form -->
							  <div id="up_success"></div> <br>
							  <div>
								 <input type="text" id="up_first_name" class="fadeIn second" name="update_profile" placeholder="First Name" value="<?php echo $display['display_first_name']; ?>" >
								 <input type="text" id="up_last_name" class="fadeIn second" name="update_profile" placeholder="Last Name"  value="<?php echo  $display['display_last_name']; ?>">
								 <input type="date" id="up_date_of_birth" class="fadeIn second" name="update_profile" placeholder="Date Of Birth"  value="<?php echo  $display['display_date_of_birth']; ?>">
								 <input type="file" id="up_image_url" class="fadeIn third" name="update_profile" placeholder="Image URL"  value="<?php echo $display['display_small_url']; ?>">
								 <button type="button" class="fadeIn fourth btn_style" onclick="update_profile();">Save Changes</button><br>
								 <div id="up_failure"></div> <br>
							  </div>
							  <!-- Remind Passowrd -->
							  <div id="formFooter">
							 
							  </div>
						   </div>
						</div>
					 </div>
					 <div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					 </div>
				  </div>
			   </div>
			</div>



			<div class="modal fade" id="create_widget_modal" role="dialog">
			   <div class="modal-dialog">
				  <!-- Modal content-->
				  <div class="modal-content">
					 <div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Create Widget</h4>
					 </div>
					 <div class="modal-body">
						<div class="wrapper fadeInDown">
						   <div id="formContent">
							  <!-- Tabs Titles -->
							  <!-- Icon -->
							  <div class="fadeIn first">
								 <img src="http://danielzawadzki.com/codepen/01/icon.svg" id="icon" alt="User Icon" />
							  </div>
							  <!-- Login Form -->
							  <div id="cw_success"></div> <br>
							  <div>
								 <input type="text" id="widget_name" class="fadeIn second" name="create_widget" placeholder="Widget Name">
								 <input type="text" id="widget_desc" class="fadeIn third" name="create_widget" placeholder="Description">
								<div class="my_drop_down"> 
								 <label for="cars">Select a Widget Kind</label>
                                  <select id="widget_kind" name="create_widget" class="fadeIn third">
                                    <option value="hidden">Hidden</option>
                                    <option value="visible">Visible</option>
                                  </select>
								 </div>
								 <button type="button" class="fadeIn fourth btn_style" onclick="create_widget();">Create Widget</button><br>
								 <div id="cw_failure"></div> <br>
							  </div>
							  <!-- Remind Passowrd -->
							  <div id="formFooter">
							 
							  </div>
						   </div>
						</div>
					 </div>
					 <div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					 </div>
				  </div>
			   </div>
			</div>



			<div class="modal fade" id="search_widget_modal" role="dialog">
			   <div class="modal-dialog">
				  <!-- Modal content-->
				  <div class="modal-content">
					 <div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Search Widget</h4>
					 </div>
					 <div class="modal-body">
						<div class="wrapper fadeInDown">
						   <div id="formContent">
							  <!-- Tabs Titles -->
							  <!-- Icon -->
							  <div class="fadeIn first">
								 <img src="http://danielzawadzki.com/codepen/01/icon.svg" id="icon" alt="User Icon" />
							  </div>
							  <!-- Login Form -->
							  <div id="sw_success"></div> <br>
							  <div>
								 <input type="text" id="search_term" class="fadeIn second" name="search_widget" placeholder="Search Term">
								 <button type="button" class="fadeIn fourth btn_style" onclick="search_widget();">Search Widget</button><br>
								 <div id="sw_failure"></div> <br>
							  </div>
							  <!-- Remind Passowrd -->
							  <div id="formFooter">
							 
							  </div>
						   </div>
						</div>
					 </div>
					 <div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					 </div>
				  </div>
			   </div>
			</div>





			
					
            <div class="main wrapper clearfix">

                    <article>
                        <header>

                        </header>
                        <?php foreach ($mega_header['data']['widgets'] as $widget) { ?>
                            <div>
                                <h2><?php echo $widget['name']; ?></h2>
                                <h2><?php echo $widget['description']; ?></h2>
                                <h2><?php echo $widget['kind']; ?></h2>
                                <h2><?php echo $widget['user']['id']; ?></h2>
                                <h2><?php echo $widget['user']['name']; ?></h2>
                                <img src="<?php echo $widget['user']['images']['small_url']; ?>" alt="small url" >
                                
                                <?php if ($this->session->userdata('username')){ ?>
                                     <li><a data-toggle="modal" data-target="#update_widget_modal<?php echo $widget['id']; ?>">Update Widget</a></li>
                                     <li><a onclick="destroy_widget(<?php echo $widget['id']; ?>);" >Destroy Widget</a></li>

								<?php } else { ?>
                                     <li><a data-toggle="modal" data-target="#view_user_modal<?php echo $widget['id']; ?>"  onclick="view_user(<?php echo $widget['user']['id']; ?>, <?php echo $widget['id']; ?>);">View User</a></li>

                				<?php } ?>
                                
                                
                            </div>
                            
                            
                            			<div class="modal fade" id="update_widget_modal<?php echo $widget['id']; ?>" role="dialog">
			   <div class="modal-dialog">
				  <!-- Modal content-->
				  <div class="modal-content">
					 <div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Update Widget</h4>
					 </div>
					 <div class="modal-body">
						<div class="wrapper fadeInDown">
						   <div id="formContent">
							  <!-- Tabs Titles -->
							  <!-- Icon -->
							  <div class="fadeIn first">
								 <img src="http://danielzawadzki.com/codepen/01/icon.svg" id="icon" alt="User Icon" />
							  </div>
							  <!-- Login Form -->
							  <div id="uw_success"></div> <br>
							  <div>
								 <input type="text" id="widget_name<?php echo $widget['id']; ?>" class="fadeIn second" name="update_widget" placeholder="Widget Name" value="<?php echo $widget['name']; ?>">
								 <input type="text" id="widget_desc<?php echo $widget['id']; ?>" class="fadeIn third" name="update_widget" placeholder="Description" value="<?php echo $widget['description']; ?>">
								 <button type="button" class="fadeIn fourth btn_style" onclick="update_widget(<?php echo $widget['id']; ?>);">Save Changes</button><br>
								 <div id="uw_failure"></div> <br>
							  </div>
							  <!-- Remind Passowrd -->
							  <div id="formFooter">
							 
							  </div>
						   </div>
						</div>
					 </div>
					 <div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					 </div>
				  </div>
			   </div>
			</div>
                            
                            
                            			<div class="modal fade" id="view_user_modal<?php echo $widget['id']; ?>" role="dialog">
			   <div class="modal-dialog">
				  <!-- Modal content-->
				  <div class="modal-content">
					 <div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">View User Details</h4>
					 </div>
					 <div class="modal-body">
						<div class="wrapper fadeInDown">
						   <div id="formContent">
							  <!-- Tabs Titles -->
							  <!-- Icon -->
							  <div class="fadeIn first">
								 <img src="http://danielzawadzki.com/codepen/01/icon.svg" id="icon" alt="User Icon" />
							  </div>
							  <!-- Login Form -->
							  <div id="uw_success"></div> <br>
							  <div>
								 <input type="text" id="first_name<?php echo $widget['id']; ?>" class="fadeIn second" name="view_user" disabled >
								 <input type="text" id="last_name<?php echo $widget['id']; ?>" class="fadeIn third" name="view_user" disabled >
								 <div id="uw_failure"></div> <br>
							  </div>
							  <!-- Remind Passowrd -->
							  <div id="formFooter">
							 
							  </div>
						   </div>
						</div>
					 </div>
					 <div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					 </div>
				  </div>
			   </div>
			</div>
                            
                            
                            
                        <?php } ?>
                    </article>
            </div> <!-- #main -->
            
            
        </div> <!-- #main-container -->

        <div class="footer-container">
            <footer class="wrapper">
                <h3>footer</h3>
            </footer>
        </div>

<script>
function hide_modal_except(modal_name, action_type){
	//alert("inside hide_modal_except :"+modal_name);
		//alert("1");
		if ($('#signup_modal').hasClass('in') == true){
			//alert("1.1");
			$('#signup_modal').modal('hide');
			//alert("1.2");
		}
		//alert("2");
		if ($('#reset_modal').hasClass('in') == true){
			//alert("2.1");
			$('#reset_modal').modal('hide');
			//alert("2.2");
		}
		//alert("3");
		if ($('#login_modal').hasClass('in') == true){
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
    				$("#login_failure").html('<div class="col-md-12 text-center" style="color:#33cc33"><b>' + response['message'] + '</b></div>').show('fast').delay(5000).hide('fast');
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
//    				alert('successfully logged out');
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
function user_signup(){
	alert("inside user signup");
	
	var first_name = document.getElementById('first_name').value;
	var last_name = document.getElementById('last_name').value;
	var signup_email_id = document.getElementById('signup_email_id').value;
	var signup_password = document.getElementById('signup_password').value;
	var image = document.getElementById('image').value;
	
	$.ajax({
		method: 'post',
		url: '<?=base_url()?>index.php/methods/user_signup',
		data: {first_name: first_name, last_name: last_name, signup_email_id: signup_email_id, signup_password: signup_password, image: image},
		dataType: 'json',
		success: function(json){
			alert("success ajax");
			try {
    			if (response['code'] == 0){
    				alert('successfully signed up');
    				hide_modal_except('login_modal', 'S');
    				$("#signup_success").html('<div class="col-md-12 text-center" style="color:#33cc33"><b>' + response['message'] + '</b></div>').show('fast').delay(5000).hide('fast');
    			} else {
    				alert('failed to sign up');
    				$("#signup_failure").html('<div class="col-md-12 text-center" style="color:#33cc33"><b>' + response['message'] + '</b></div>').show('fast').delay(5000).hide('fast');
    			}
			} catch (e) {
				alert("in exception");
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
function user_reset_password(){
	alert("inside user password reset");
	
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
    				alert('successfully reset the password');
    				hide_modal_except('login_modal', 'S');
    				$("#reset_success").html('<div class="col-md-12 text-center" style="color:#33cc33"><b>' + response['message'] + '</b></div>').show('fast').delay(5000).hide('fast');
    				
    			} else {
    				$("#reset_failure").html('<div class="col-md-12 text-center" style="color:#33cc33"><b>' + response['message'] + '</b></div>').show('fast').delay(5000).hide('fast');
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
function change_password(){
	alert("inside change password");
	
	var current_password = document.getElementById('cp_current_password').value;
	var new_password = document.getElementById('cp_new_password').value;
	
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
    				alert('successfully changed the password');
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
function update_profile(){
	alert("inside update_profile");
	
	var first_name = document.getElementById('up_first_name').value;
	var last_name = document.getElementById('up_last_name').value;
	var date_of_birth = document.getElementById('up_date_of_birth').value;
	var image_url = document.getElementById('up_image_url').value;
	
	$.ajax({
		method: 'post',
		url: '<?=base_url()?>index.php/methods/update_profile',
		data: {first_name: first_name, last_name: last_name, date_of_birth: date_of_birth, image_url: image_url},
		dataType: 'json',
		success: function(response){
			//alert("message :"+json['message']);
			//alert("value :"+json['value']);
			//response = JSON.parse(json);
			try {
    			if (response['code'] == 0){
    				alert('successfully updated the profile');
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

}
</script>


<script>
function create_widget(){
	alert("inside create widget");
	
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
    				alert('successfully created a widget');
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
function search_widget(){
	alert("inside search widget");
	
	var search_term = document.getElementById('search_term').value;
	var url = '<?=base_url()?>index.php?search_term='+search_term;

	alert('url is :'+url);
	
	window.location = url;
}
</script>


<script>
function update_widget(widget_id){
	alert("inside update widget");
	
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
    				alert('successfully updated a widget');
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
    				alert('successfully updated a widget');
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
	alert("inside destroy widget");
	
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
    				alert('successfully destroyed a widget');
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

    </body>
</html>
