<?php

include("headers.php");

include("sidebar.php");

$client_campaign_values = mysql_fetch_array(mysql_query("SELECT * FROM  client_campaign where id=".$_SESSION['client_campaign_id']));

?>

<div id="content">
<h1>Client Campaign: <?php echo $_SESSION["user"]; ?></h1>

<?php if($_GET['edit'] == '') { ?>
	<table class="sn_table" width="50%">
    	<tr>
        	<td>
				<a href="prospect_activity.php">
					<img src="<?php echo base_url(); ?>my-account/images/client-campaing/prospects.jpg" /></a></td>
            <td>
				<a href="leads.php">
					<img src="<?php echo base_url(); ?>my-account/images/client-campaing/leads-sales_gery.jpg" />
				</a>
			</td>
			<td>
				<a href="performance.php">
					<img src="<?php echo base_url(); ?>my-account/images/client-campaing/performance_gray.jpg" />
				</a>
			</td>
        </tr>
        
    	<tr>
        	<td>
				<a href="prospect_activity.php">
					<img src="<?php echo base_url(); ?>my-account/images/client-campaing/activities-blue.jpg" title="Activities" alt="Activities" />
				</a>
			</td>
            <td>
				<a href="prospect_activity.php?edit=plog">
					<img src="<?php echo base_url(); ?>my-account/images/client-campaing/prospect-log-grey.jpg" title="Prospect Log" alt="Prospect Log" />
				</a>
			</td>
			<td>&nbsp;</td>
        </tr>
     </table>
     
     <table class="sn_table_data">
    	<tr>
        	<th colspan="4" align="left">Prospecting Activities</th>
        </tr>
    	<tr>
        	<td><b>Activity Date</b></td><td><b>Target Prospect #</b></td>
            <td><b>Status</b></td><td><b>Action</b></td>
        </tr>
    	<tr>
        	<td><?php echo $client_campaign_values['review_dates']; ?></td>
            <td><?php echo fetch_client_campaign_meta('campaign_clientdb',$user_id); ?></td>
            <td><?php ?></td>
            <td>
            	<form action="prospect_activity.php?edit=p" method="POST">
                    <input name="submit" type="submit" value="Action"> 
                </form>
           </td>
        </tr>        
    </table>
     
     <table class="sn_table_data">
    	<tr>
        	<th colspan="4" align="left">Follow Up Activities</th>
        </tr>
    	<tr>
        	<td><b>Date</b></td><td><b>Client</b></td>
            <td><b>Action</b></td>
        </tr>
        <?php
        
			$prospects_result = mysql_query("SELECT * FROM  `prospects_results` where status='0' and user_id=".$user_id);
			if($prospects_result != false){	
						while($prospects_result_value = mysql_fetch_array($prospects_result))
								{
									
									$prospects_value = mysql_fetch_array(mysql_query("SELECT * FROM  `prospects` where id=".$prospects_result_value['prospect_id']));

							?>
                            	<tr>
                                    <td><?php echo $prospects_value['date']; ?></td>
                                    <td><?php echo $prospects_value['last_name'].', '.$prospects_value['first_name']; ?></td>
                                    <td>
                                        <form action="?edit=pl" method="POST">
                                            <input type="hidden" value="<?php echo $prospects_value['id']; ?>" name="prospect_id">
                                            <?php if($prospects_result_value['type'] == '1') { ?>
                                            	<input name="submit" type="submit" value="Email"> 
                                            <?php } else  { ?>
                                            	<input name="submit" type="submit" value="Call"> 
                                            <?php } ?>
                                        </form>
                                   </td>
                                </tr>
							<?php			
					}
				}
			?>		
    	
    </table>
<?php }

elseif($_GET['edit'] == 'p') {

	?>
    
    	<table class="sn_table" width="50%">
                <tr>                    
                    <td><a href="prospect_activity.php"><img src="<?php echo base_url(); ?>my-account/images/client-campaing/prospects.jpg" /></a></td>
                    <td><a href="leads.php"><img src="<?php echo base_url(); ?>my-account/images/client-campaing/leads-sales_gery.jpg" /></a></td>
                    <td><a href="index.php?edit=past"><img src="<?php echo base_url(); ?>my-account/images/client-campaing/performance_gray.jpg" /></a></td>
                </tr>
                
                <tr>
                    <td colspan="3"><b>Prospect Selection</b><br /><br />
			Please select prospects from your existing client base or upload new prospects:						
                    </td>
                </tr>
             </table>
             
             <table class="sn_table_data">
                <tr>
                    <td><a href="prospect_activity.php?edit=p">Prospect</a></td><td>Database</td> <td>Upload New Required Prospect 10</td>
                </tr>
                <tr>
                    <td colspan="3">
                    	Available Existing Clients for Prospect Marketing:						
					</td>
                </tr>
                <tr>
                    <th>Name</th>
                    <th>Select for E Campaign</th>
                    <th>Select for Open Contact</th>
                </tr> 
                <form action="" method="POST">
                <?php
				if($_POST['next'] == 'Next') {
				
					$e_open_contact = $_POST['e_open_contact'];
					$count = $_POST['count'];
					$prospect_id = $_POST['prospect_id'];

					for($i=0; $i < $count; $i++){

						//0 for lead not sent, 1 for interested lead, 2 for not interested lead
						
						mysql_query("INSERT INTO `prospects_results` (`user_id` ,`client_id` ,`ccamp_id` ,`prospect_id` ,`status`,type)VALUES ('".$user_id."',  '', '".$_SESSION['client_campaign_id']."', '".$prospect_id[$i]."', '0', '".$_POST['e_open_contact'.($i+1)]."')");
						
						if($_POST['e_open_contact'.($i+1)] == 1){
						
								$prospects_value = mysql_fetch_array(mysql_query("SELECT * FROM  `prospects` where id=".$prospect_id[$i]));
							
								$partnership_campaign_value = mysql_fetch_array(mysql_query("SELECT * FROM  `partnership_campaign` where id=".$_SESSION['client_campaign_id']));
								$to  = $prospects_value['email_number'];
								
								$subject = 'Prospects';
								
								$message = '<a href="'.base_url().'assessment_result.php?pcid='.$_SESSION['client_campaign_id'].'&a_name='.$partnership_campaign_value['service'].'&prospect_id='.$prospect_id[$i].'">'.$sql_value["first_name"].'</a>';
								
								$headers = 'From: webmaster@example.com' . "\r\n" .
									'Reply-To: webmaster@example.com' . "\r\n" .
									'X-Mailer: PHP/' . phpversion();
								
								mail($to, $subject, $message, $headers);
						
						}
					}
                                //header("location:prospect_activity.php");
				}
								
				$prospects = mysql_query("SELECT * FROM  `prospects` where user_id=".$user_id);
					$count = 1;
						while($prospects_value = mysql_fetch_array($prospects))
						{
							
				$prospects_check = mysql_num_rows(mysql_query("SELECT * FROM  `prospects_results` where ccamp_id =".$_SESSION['client_campaign_id']." and prospect_id=".$prospects_value['id']));
				if($prospects_check == 0) {
							?>
                                 <tr>
                                    <td><?php echo $prospects_value['last_name'].', '.$prospects_value['first_name']; ?></td>
                                    <td><input type="hidden" name="prospect_id[]" value="<?php echo $prospects_value['id']; ?>"/>
                                    <input type="radio" name="e_open_contact<?php echo $count;?>" value="1"/></td>
                                    <td><input type="radio" name="e_open_contact<?php echo $count;?>" value="2" /></td>
                                </tr>
							<?php
								$count++;
							}	
						}
						
						$prospectscount_check = mysql_num_rows($prospects);
						if($count == 1) {
							?>
                                 <tr>
                                    <td colspan="3">No prospects</td>
                                </tr>
							<?php
							}
				?>
                <tr>
                    <td colspan="3">
					   	<input name="count" type="hidden" value="<?php echo $count - 1;?>">					
					   	<input name="next" type="submit" value="Next">					
					</td>
                </tr>   
                	 
                </form>  
            </table>
    <?php
}


elseif($_GET['edit'] == 'pl') {

	$prospects = mysql_fetch_array(mysql_query("SELECT * FROM  `prospects` where id= '".$_POST['prospect_id']."' and user_id=".$user_id));
	
	$prospects_result = mysql_fetch_array(mysql_query("SELECT * FROM  `prospects_results` where prospect_id = '".$prospects['id']."' and user_id=".$user_id));

	?>
    
    	<table class="sn_table" width="50%">
                <tr>
                    <td><a href="prospect_activity.php"><img src="<?php echo base_url(); ?>my-account/images/client-campaing/prospects.jpg" /></a></td>
                    <td><a href="leads.php"><img src="<?php echo base_url(); ?>my-account/images/client-campaing/leads-sales_gery.jpg" /></a></td>
                    <td><a href="index.php?edit=past"><img src="<?php echo base_url(); ?>my-account/images/client-campaing/performance_gray.jpg" /></a></td>
                </tr>
                <tr>
                    <td><a href="index.php"><img src="<?php echo base_url(); ?>my-account/images/client-campaing/activities-blue.jpg" /></a></td><td><a href="prospect_activity.php?edit=plog"><img src="<?php echo base_url(); ?>my-account/images/client-campaing/prospect-log-grey.jpg" /></a></td><td></td>
                </tr>
             </table>
             
             <table class="sn_table_data">
                <tr>
                    <td><b>Prospect:</b> <?php echo $prospects['last_name'].' '.$prospects['first_name']; ?></td>
                    <td><b>Follow up Date:</b> 24th January</td>
                </tr>
                <?php
				
	
		if($prospects_result['type'] == '1') { 
		
				echo '<tr>
							<td><b>Select follow up Action:</b></td>
							<td>Email</td>
					</tr>
					<tr>
							<td colspan="2">Follow up Email Template:</td>
					</tr>
					<tr>
							<td colspan="2">Dear (client first name),
									I trust my email finds you well. Just a courtesy follow up to our recent invitation for an assessment of your current satisfaction and confidence in your (partner service) needs. As you may be aware, we have recently expanded the range of Financial services available via our new referral partners.</td>
					</tr>';
				
		}
		
		else {
			if($_POST['result_prospect_id'] != ''){
				mysql_query("UPDATE `prospects_results` SET  `status` =  '".$_POST['call_result']."' WHERE `id` =".$_POST['result_prospect_id']);
				update_prospectsresultsmeta("phone_notes",$_POST['phone_notes'],$_POST['result_prospect_id']);
				header("location:?edit=plog");
			}
		
			echo '<form action="?edit=pl" method="POST">
							<tr>
									<td><b>Select follow up Action:</b></td>
									<td>Phone</td>
							</tr>
							<tr>
									<td colspan="2">Notes:</td>
							</tr>
							<tr>
									<td colspan="2"><textarea style="width:600px" name="phone_notes"></textarea></td>
							</tr>
							<tr>
									<td colspan="2">
										Call Result: 
										<input type="hidden" name="result_prospect_id" value="'.$prospects_result['id'].'">
										<input type="hidden" name="prospect_id" value="'.$_POST['prospect_id'].'">
										<input type="radio" name="call_result" value="4"> Left Msg
										<input type="radio" name="call_result" value="3"> Postpone
										<input type="radio" name="call_result" value="2"> Unsuccessful
										<input type="radio" name="call_result" value="1"> Successful	
									</td>
							</tr>
							<tr>
									<td colspan="2">
										<input name="confirm" type="submit" value="Confirm">	
									</td>
							</tr>
					 </form>'; 
					}		 
				?>
            </table>
    <?php

}



elseif($_GET['edit'] == 'plog') {

	$prospects_result = mysql_query("SELECT * FROM  prospects_results pr, prospects p where pr.prospect_id = p.id and pr.ccamp_id = '".$_SESSION['client_campaign_id']."' and pr.status > 0 and pr.user_id=".$user_id);
	
	?>
    
    	<table class="sn_table" width="50%">
                <tr>
                    <td><a href="prospect_activity.php"><img src="<?php echo base_url(); ?>my-account/images/client-campaing/prospects.jpg" /></a></td>
                    <td><a href="leads.php"><img src="<?php echo base_url(); ?>my-account/images/client-campaing/leads-sales_gery.jpg" /></a></td>
                    <td><a href="index.php?edit=past"><img src="<?php echo base_url(); ?>my-account/images/client-campaing/performance_gray.jpg" /></a></td>
                </tr>
                <tr>
                    <td><a href="prospect_activity.php"><img src="<?php echo base_url(); ?>my-account/images/client-campaing/activities.jpg" title="Activities" alt="Activities" /></a></td>
                    <td><a href="prospect_activity.php?edit=plog"><img src="<?php echo base_url(); ?>my-account/images/client-campaing/prospect-log.jpg" title="Prospect Log" alt="Prospect Log" /></a></td>
                    <td></td>
                </tr>
             </table>
             
             <table class="sn_table_data">
                <tr>
                    <th>Name</th><th>Status</th><th>Action</th>
                </tr>
                <?php 
					while($prospects_result_value = mysql_fetch_array($prospects_result))
								{
				?>
                    <tr>
                        <td><?php echo $prospects_result_value['last_name'].' '.$prospects_result_value['first_name']; ?></td>
                        <td>
                        	<?php 
                                    if($prospects_result_value['status'] == 0){
                                                    echo 'Assessment Incomplete';							
                                    } 
                                    elseif($prospects_result_value['status'] == 1){
                                                    echo 'Assessment Incomplete';
                                    }
                                                elseif($prospects_result_value['status'] == 2){
                                                    echo 'successful';							
                                    } 
                                                elseif($prospects_result_value['status'] == 3){
                                                    echo 'Unsuccessful';							
                                    } 
                                                elseif($prospects_result_value['status'] == 4){
                                                    echo 'Postpone';							
                                    } 
                                                elseif($prospects_result_value['status'] == 5){
                                                    echo 'Left Msg';							
                                    } 
									              elseif($prospects_result_value['status'] == 6){
                                                    echo 'Lead Accepted';							
                                    } 
                                ?>
                        </td>
                        <td>
                                <?php 
                                    if($prospects_result_value['status'] == 0){
                                                    echo '<form action="refering-lead.php" method="POST">
                                                            <input type="hidden" name="prospect_id" value="'.$prospects_result_value['id'].'" />
                                                            <input type="submit" name="view_lead" value="view" />
                                                        </form>';							
                                    } 
                                    elseif($prospects_result_value['status'] == 1){
                                                    echo '<form action="refering-lead.php" method="POST">
                                                            <input type="hidden" name="prospect_id" value="'.$prospects_result_value['id'].'" />
                                                            <input type="submit" name="view_lead" value="view" />
                                                        </form>';
                                    }
                                                elseif($prospects_result_value['status'] == 2){
                                                    echo 'Lead Send';							
                                    } 
                                                elseif($prospects_result_value['status'] == 3){
                                                    echo '<form action="refering-lead.php" method="POST">
                                                            <input type="hidden" name="prospect_id" value="'.$prospects_result_value['id'].'" />
                                                            <input type="submit" name="view_lead" value="Resend Lead" />
                                                        </form>';							
                                    } 
                                                elseif($prospects_result_value['status'] == 4){
                                                    echo '';							
                                    } 
                                ?>
                        </td>
                    </tr>
                 <?php 
					}
				if(mysql_num_rows($prospects_result) == 0) {
					echo '<tr><td colspan="3">No Record Found</td></tr>';
				}
				?>
            </table>
    <?php

}

 ?>
</div>
<?php include("../../footer.php"); ?>