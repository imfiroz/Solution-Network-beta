<?php include("sql.php"); ?>
<html>
<head>
	<title>
		Solutions Network
	</title>
	<link rel="stylesheet" type="text/css" href="stylesn.css">
</head>

<body>
 <?php
    	if($user){  
            echo '';
        }
		else {
    		?>            	
                <div class="login_head">
                    <form action="process.php" method="post">    	
                        <ul>
                            <li><label for="session_key-login"> 
								<?php //error fetching 
				                    if($_GET['error'] == 'u') { echo '<small class="error">Username doesn\'t exist</small>'; } 
									elseif($_GET['error'] == 'p'){ echo '<small class="error">Wrong password</small>'; }
									elseif($_GET['error'] == 'a'){ echo '<small class="error">Account not acctivated</small>'; }
									elseif($_GET['error'] == 'b'){ echo '<small class="error">Enter both fields</small>'; }
								?>
                                </label><br>
                            <input name="user" placeholder="Email address">
                            </li>
                            <li>
                                <label for="session_key-login"><a href="forget_password.php" class="register">Forgot your Password?</a></label><br>
                                <input name="pass" type="password" placeholder="Password">
                            </li>
                            <li><label for="session_key-login">&nbsp;</label><br>
                                 <input id="submit" type="submit" value="Sign In"><br>
                            </li>
                         </ul>
                         <div class="clear"></div>
                     </form>       
                </div>
            <?php
		}
	?>
	<div class="main_wrapper">
		<div class="header">	
			
			<div class="banner"><a href="<?php echo base_url(); ?>"><img class="img_logo" src="images/logo.png"></a>
			  <div class="registor_now">             
              		<h2>Register now – It's free to join</h2>
                    <form action="register.php" method="post">
                   				<?php //error fetching 
				                    if($_GET['error_r'] == 'ut') { echo '<small class="error">Username taken.</small>'; } 
									elseif($_GET['error_r'] == 'et'){ echo '<small class="error">Email taken.</small>'; }
									elseif($_GET['error_r'] == 'at'){ echo '<small class="error">Invalid Email.</small>'; }
									elseif($_GET['error_r'] == 'bt'){ echo '<small class="error">Enter all fields</small>'; }
									elseif($_GET['error_r'] == 'pe'){ echo '<small class="error">Passwords is less than 6 characters</small>'; }
								?>
                         <table class="sn_table">
                            <tr>
                                <td><input name="name" placeholder="First Name" style="width:150px"></td>
                                <td><input name="lastname" placeholder="Last Name" style="width:150px"></td>
                            </tr>
                            <tr>
                                <td colspan="2"><input style="width:320px" name="email" placeholder="Email address"></td>
                            </tr>
                            <tr>
                                <td colspan="2"><input style="width:320px" name="password" type="password" placeholder="Password (6 or more characters)"></td>
                            </tr>
                            <tr><td colspan="2"><small>By clicking join now, you agree to the Solutions Network Membership Terms & Agreement</small>
                            <br><br><input name="submit" type="submit" value="Join Now" style="float:none;"></td></tr>
                            
                        </table>
                       </form>
                       
				
                        <div class="play_now">
                            <div class="play_now_inner">
                                <font class="play_now_top_font">What is</font></br>
                                <a href="#"><img class="img_play_now_button" src="images/play_now_button.png"></a></br>
                                <div class="play_now_bottom"><font class="play_now_bottom_font">Solution Networks</font></div>
                            </div>	
                            
                        </div>
				</div>
			</div>
					
	  </div>
		
		<div class="navigation">
			 <?php
    	if($user){  
            echo '<a href="my-account">My account</a> | <a href="logout.php">Logout</a><br>';
        }
		else {
    		echo '<a href="'.base_url().'">Home Page</a>  <a href="login.php">Member Login</a>';
		}
	?>
            
		</div>
		
		<div class="about_us">
			<div class="about_us_head"><font class="about_us_head_font">How the <big>Solutions Network</big> is changing the</font><br><font class="game_font">Game</font></div>
			
			<div class="text">
				<font class="text_font">
					The Solutions Network is changing the way Financial Service industry members refer clients, generate new business opportunities and assess the future potential for their business’growth & profits capabilities future potential for their business’growth & profits capabilities future potential for their business’growth & profit....... Read more...
				</font>
			</div>
		</div>	
			<div class="everything_aboutus">
				<font class="everything_aboutus_head_font">Everything You Need to Know About the Solutions Network</font>
			</div>
			
<div class="everything">
				
				<a href="#">
				<div class="everything_thumbnail">
					<table class="" border="0" cellspacing="15" cellpadding="0" >
						<tr>
							<td>
								<font class="thumb_font">Everything has Changed</font>
							</td>
						</tr>
						

						<tr>
							<td>
								<img  width="100%" style="display:block;" src="images/t1.png">
							</td>
						</tr>
						
						<tr>
							<td>
								<font class="thumb_desc">In a industry of adapt or die’ see how the Solutions Network....</font>
							</td>
						</tr>
						
					</table>
				</div>
				</a>
				<a href="#">
				<div class="everything_thumbnail">
				<table class="" border="0" cellspacing="15" cellpadding="0" collapse;">
						<tr>
							<td>
								<font class="thumb_font">Tell Me More</font>
							</td>
						</tr>
						

						<tr>
							<td>
								<img  width="100%" style="display:block;" src="images/t2.png">
							</td>
						</tr>
						
						<tr>
							<td>
								<font class="thumb_desc">See the answers to some of the most frequency asked questions....</font>
							</td>
						</tr>
						
				</table>
				</div>
				</a>
				<a href="#">
				<div class="everything_thumbnail">
				<table class="" border="0" cellspacing="15" cellpadding="0" collapse;">
						<tr>
							<td>
								<font class="thumb_font">Get In Touch</font>
							</td>
						</tr>
						

						<tr>
							<td>
								<img  width="100%" style="display:block;" src="images/t3.png">
							</td>
						</tr>
						
						<tr>
							<td>
								<font class="thumb_desc">It’d be our pleasure to arrange a free consultation.....<br>.</font>
							</td>
						</tr>
						
				</table>
				</div>
				</a>
				<a href="#">
				<div class="everything_thumbnail">
				<table class="" border="0" cellspacing="15" cellpadding="0" collapse;">
						<tr>
							<td>
								<font class="thumb_font">The Basic Overview</font>
							</td>
						</tr>
						

						<tr>
							<td>
								<img  width="100%" style="display:block;" src="images/t4.png">
							</td>
						</tr>
						
						<tr>
							<td>
								<font class="thumb_desc">A basic overview of how the Solutions Network....<br>.</font>
							</td>
						</tr>
						
				</table>
				</div>
				</a>
			</div>
			
	</div>	
	<div class="footer">
			
		<div class="footer_inner">	
			<div class="aside">
				<div class="footer_font">
                    <a href="#">Home | </a> 
                    <a href="aboutus.php">About Us  | </a> 
                    <a href="#">Contact Us  | </a> 
                    <a href="#">Facilities  |</a>  
                    <a href="#">Services  | </a> 
                    <a href="#">Our Team</a>
                </div>
				<font class="footer_copyright_font"><b>&copy; Copyright 2013 Solution Network.com, All right reserved.</b></font>
			</div>
			
			<div class="bside">
				<form action="#" method="POST">
					<input type="text" class="form_textbox"><br>
					<div class="footer_logos">
						<a href="#"><img class="footer_logos_img" src="images/fb.png"></a>
						<a href="#"><img class="footer_logos_img"src="images/g+.png"></a>
						<a href="#"><img class="footer_logos_img"src="images/twitter.png"></a>
						<a href="#"><img class="footer_logos_img"src="images/skype.png"></a>
					</div>
				</form>
				
				<font class="footer_developed">
					Design and Developed by <a href="www.amkwebsolutions.com">Amkwebsolutions.com</a>
				</font>
			</div>
		</div>
	</div>
</body>
</html>