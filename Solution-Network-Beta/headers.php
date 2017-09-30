<?php

	include("sql.php");
 
	include("my-account/workflow-manager/notifications/not_pack.php");

 ?>
<html>
<head>
<link type="text/css" href="<?php echo base_url(); ?>my-account/style.css"  rel="stylesheet" />
<script type='text/javascript' src='<?php echo base_url(); ?>my-account/js/jquery-1.10.2.min.js'></script>

<script type="text/javascript">
	$(document).ready(function(){

		$("ul.subnav").parent().append("<span></span>"); 
		//Only shows drop down trigger when js is enabled (Adds empty span tag after ul.subnav*)
		
		$("ul.topnav li span").click(function() { 
		//When trigger is clicked...
			
			//Following events are applied to the subnav itself (moving subnav up and down)
			$(this).parent().find("ul.subnav").slideDown('fast').show(); //Drop down the subnav on click
	
			$(this).parent().hover(function() {
			}, function(){	
				$(this).parent().find("ul.subnav").slideUp('slow'); 
				//When the mouse hovers out of the subnav, move it back up
			});
	
			//Following events are applied to the trigger (Hover events for the trigger)
			}).hover(function() { 
				$(this).addClass("subhover"); 
				//On hover over, add class "subhover"
			}, function(){	
				//On Hover Out
				$(this).removeClass("subhover"); 
				//On hover out, remove class "subhover"
		});
	
	});
</script>
</head>
<body>
<div id="main_container">
<div id="header">
   
              <div class="head_three">
              
              	<div class="three_logo">
                	
                    <div style="float:left"><a href="<?php echo base_url(); ?>my-account/main-menu.php"><img src="<?php echo base_url(); ?>/my-account/images/logo.jpg" /></a></div>
                   
                         <div class="head_one"><a href="<?php echo base_url(); ?>my-account/main-menu.php"><img src="<?php echo base_url(); ?>/my-account/images/logo1.jpg" /></a></div>
                        <div class="head_two">
                                 <?php
                                    if($user){
                                     	 if(select_usermeta('corporate_head_shot_photo', $user_id) != '' )								
												{
													echo '<img width="55" height="55" src="'.base_url().'my-account/ajax-upload/temp/'.select_usermeta('corporate_head_shot_photo', $user_id).'" class="image_head"> ';
												}  
											
											else { echo " "; }
									?>
                                        <ul class="topnav">
                                            <li>
                                                <a href="#">
                                                    <?php
                                                        echo $user; 
                                                     ?>
                                                 
                                                 </a>
                                                 
                                                <ul class="subnav">
                                                    <li><a href="<?php echo base_url(); ?>logout.php">Logout</a></li>
                                                </ul>
                                            </li>
                                            <li>
                                                <a href="<?php echo base_url(); ?>my-account/workflow-manager/email-notifications.php"><img src="<?php echo base_url(); ?>/my-account/images/notification_logo.jpg" />
                                                <?php if(get_note_num($user_id) > 0) echo '<b>'.get_note_num($user_id).'</b>'; ?></a>
                                            </li>
                                            <li><a href="<?php echo base_url(); ?>reset-password.php"><img src="<?php echo base_url(); ?>/my-account/images/setting.jpg" /></a></li>
                                        </ul>
                                         <?php
                                        
                                    }
                                    else {
                                        echo '<a href="'.base_url().'login.php">Login</a>';
                                    }
                                ?>
                                  </div>
                        <div class="clear"></div>
                </div>
             </div>
    <div class="clear"></div>
</div>