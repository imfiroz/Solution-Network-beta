<?php

	include("sql.php");
 
	include("my-account/workflow-manager/notifications/not_pack.php");

 ?>
 <html>
<head>
	<title>
		Solutions Network Welcome page
	</title>
	<link rel="stylesheet" type="text/css" href="style_extra.css">
</head>

<body>

	<div class="header">
		<div class="header_inner">
			<div class="logo">
				<a href="<?php echo base_url(); ?>"><img src="images/extra/logo.png"></a>
			</div>
			
			<div class="upper_menu">
				<div class="login">
					<font class="login_font"><a href="<?php echo base_url(); ?>">Login</a></font>
				</div>
			</div>
		</div>
	</div>
	
	<div class="main_wrapper">				
        <div class="content_head">
            <div class="content_text">
            <?php

$submit = $_POST["submit"];
$name = $_POST["name"];
$umeta_id= $_POST["umeta"];
$username = $_POST["email"];
$lastname = $_POST["lastname"];
$email = $_POST["email"];
$password = $_POST["password"];
$password2 = $_POST["password2"];
$md5 = md5($password);
$register_date = $_POST["register_date"];
$NOW = $_POST["NOW"];
$validemail = @ereg("^[a-z0-9_-]+(\.[a-z0-9_-]+)*@([a-z0-9_-]+\.)*[a-z0-9_-]+\.[a-z]{2,}$", $email); //VALID EMAIL PATTERN


if($submit){

    //CHECKS IF ALL FIELDS HAVE BEEN FILLED
    if($name&&$username&&$email&&$password){
        //CHECKS IF EMAIL IS VALID
        if($validemail){
            $q = mysql_query("SELECT * FROM $table WHERE email='$email'");
            $n = mysql_num_rows($q);
            
            //CHECKS IF EMAIL ALREADY EXISTS IN THE DATABASE
            if(!$n){
                $q = mysql_query("SELECT * FROM $table WHERE username='$username'");
                $n = mysql_num_rows($q);
                
                //CHECKS IF USERNAME ALREADY EXISTS IN THE DATABASE
                if(!$n){
                    //CHECKS IF THE PASSWORD AND CONFIRMATION PASSWORD MATCH
                    if(strlen($password) >= 6){
                        //IF ALL CONDITIONS ARE TRUE, THE USER IS REGISTERED AND AN ACTIVATION KEY IS PROCESSED AND SENT VIA EMAIL
                        $alpha = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
                        $length = 11;
                            
                        for($i=0; $i<$length; $i++){
                            $ran = rand(0, strlen($alpha)-1);
                            $key .= substr($alpha, $ran, 1);
                        }
                        
                        //REGISTERS USER
                        mysql_real_escape_string(mysql_query("INSERT INTO $table VALUES('', '$name', '$username', '$lastname', '', '', '$email', '',  '$password', '$md5', '$key', 'false')"));
						
                
						$user_id = mysql_insert_id();
                        //SENDS EMAIL THAT TELLS THE USER TO ACTIVATE THE ACCOUNT
                        mysql_real_escape_string(mysql_query("INSERT INTO usermeta(`user_id` ,`meta_key` ,`meta_value`) VALUES ('$user_id', 'register_date', NOW())"));
						
                        $activation = "activation.php?key=".$key;
                        
                        $your_email = 'you'; //CHANGE TO YOUR SETTINGS
                        $domain = $_SERVER["HTTP_HOST"]; //YOUR DOMAIN AND EXTENSION
                        $directory = dirname($_SERVER["PHP_SELF"]); //FOLDER WHERE THE FILES WILL BE LOCATED
                        
                        $to = $email;
                        $subject = "Activate Account";
                        $message = "Welcome, ".$username.". You must activate your account via this message to log in. Click the following link to do so: http://".$domain.$directory."/".$activation;
						
						$message .= "
						<h1>Initial Browser Membership Email</h1>
							(photos banner)
							
							<p>You’re on your Way!</p>
							<p>Congratulations $username!
							<p>Allow us to welcome you and your business to the Solutions Network! The first of its kind financial services referral network & business relationship management platform! </p>
							<p>We know this is going to be the start of something amazing!</p>
							<p>As a member you’re going to have the opportunity to launch customized Partner Campaigns to connect with other members that fit the profile for your ideal Solutions Network Referral Partner!</p>
							<p>Once you’ve expanded your business team with Solutions Network partners, you can reap the rewards of both introducing your clients to their service benefits plus receive leads from simultaneous partner’s client campaigns.</p>
							<p>You’ve entered a stage of unlimited potential for leveraging & exponential growth through creating a team of professionals working with you to grow your business.</p>
							<p>Please find below your initial login details to your Solutions Portal:</p>
							<p>Solutions Portal: www.solutionsnetwork.net.au</p>
							<p>Username: (user email)</p>
							<p>Temporary Password: (system generated)</p>
							<p>Upon your first login, you’ll have the opportunity to change this temporary password.</p>
							<p>It’s our pleasure to be of assistance to you on this exciting journey so don’t hesitate to contact us via your Solutions Portal.</p>
							
							<p>Yours in Success,</p>
							
							<p>The Solutions Network Team<br>
							<img src='".base_url()."images/logo-footer.jpg'><br>
							Please take a moment to add this email domain to your safe list to avoid any lost mail!</p>";

						//echo $message;

                        $headers = "From: Your Site <".$your_email."@".$domain.">\r\n"; //MODIFY TO YOUR SETTINGS
                        $headers .= "Content-type: text/html\r\n";
                        mail($to, $subject, $message, $headers);
						set_notification($user_id,1,0);
						
						echo '"Hi '.$name.'! Welcome to the Solutions Network!. Check <b>'.$email.'</b> to activate your account.';
                    } else {
						header("location:".base_url()."?error_r=pe");
                    }
                } else {
                     header("location:".base_url()."?error_r=ut");
                }
            } else {
                     header("location:".base_url()."?error_r=et");
            }
        } else {           
                 header("location:".base_url()."?error_r=at");
        }
    } else 	{	
				 header("location:".base_url()."?error_r=bt");
    }
}



    //IF USER IS ALREADY LOGGED IN, REDIRECTS USES TO THE HOME PAGE
    if($user){
        header("Location: index.php");
    } else {
        echo '';
    }
?>
</div>
        </div>
	</div>
			
	
	<div class="footer">
			
		<div class="footer_inner">	
			<div class="aside">
				<font class="footer_font"><a href="<?php echo base_url(); ?>">Home</a></font>  |  <font class="footer_font"><a href="<?php echo base_url(); ?>aboutus.php">About Us</a></font>  |  <font class="footer_font"><a href="#">Contact Us</a></font>  |  <font class="footer_font"><a href="#">Facilities</a></font>  |  <font class="footer_font"><a href="#">Services</a></font>  |  <font class="footer_font"><a href="#">Our Team</a></font><br>
				<font class="footer_copyright_font"><b>&copy; Copyright 2013 Solution Network.com, All right reserved.</b></font>
			</div>
			
			<div class="bside">
				<form action="#" method="POST">
					<input type="text" class="form_textbox"><br>
					<div class="footer_logos">
						<a href="#" rel="nofollow" target="Facebook"><img class="footer_logos_img" src="images/fb.png"></a>
						<a href="#" rel="nofollow" target="Google+"><img class="footer_logos_img" src="images/g+.png"></a>
						<a href="#" rel="nofollow" target="Twitter"><img class="footer_logos_img" src="images/twitter.png"></a>
						<a href="#" rel="nofollow" target="Skype"><img class="footer_logos_img" src="images/skype.png"></a>
					</div>
				</form>
				
				<font class="footer_developed">
					Design and Developed by <a href="#">Amkwebsolutions.com</a>
				</font>
			</div>
		</div>
	</div>
	
</body>
</html>