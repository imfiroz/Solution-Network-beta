<?php

include("headers.php");

include("sidebar.php");

$today = date("Y-m-d") . "<br>";

?>

<div id="content">

	<table>
    	<tr>
        	<td><a href="index.php"><img src="<?php echo base_url(); ?>my-account/images/client-campaing/active-campaigns.jpg" /></a></td>
            <td><a href="index.php?edit=past"><img src="<?php echo base_url(); ?>my-account/images/client-campaing/past-campaigns_grey.jpg" /></a></td>
        </tr>
    </table>
    
    <?php
	if($_POST['submit'] == 'View') {
			$_SESSION['client_campaign_id'] = $_POST['client_campaign_id'];
			header('Location:prospect_activity.php');
		}

                //campaign active mode
		if($_GET['edit'] == '') {
		?>
			<table class="sn_table_data">
            	<?php				
					$client_campaign_id = mysql_query("SELECT * FROM  client_campaign where status='3' and user_id=".$user_id);
					$true = 'no';
					
					if($client_campaign_id)
					{
						while($client_campaign_id_value = mysql_fetch_array($client_campaign_id))
							{
							   echo '<tr>
                                                                    <td>Campaign team member</td><td>'.fetch_user_name($client_campaign_id_value['solution_team_partner']).'</td>
                                                                    <td rowspan="2">
                                                                        <form action="index.php" method="POST">
                                                                            <input type="hidden" value="'.$client_campaign_id_value['id'].'" name="client_campaign_id"> 
                                                                            <input name="submit" type="submit" value="View"> 
                                                                        </form>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                        <td>Campaign status</td><td>Active</td>
                                                                </tr>
                                                                <tr>
                                                                        <td colspan="3"><hr></td>
                                                                </tr>';
							}	
                                                           $true = 'yes';	
									
					}
				?>
                
                <?php				
					$client_campaign_id_two = mysql_query("SELECT * FROM  client_campaign where status='3' and solution_team_partner=".$user_id);
					
					//echo "SELECT * FROM  client_campaign cc,  client_campaign_meta ccm where cc.status='3' and ccm.meta_key='campaign_relation_id' and  cc.review_dates >  '".$today."' and ccm.meta_value=".$user_id;
							
					if($client_campaign_id_two)
					{
						while($client_campaign_id_value = mysql_fetch_array($client_campaign_id_two))
							{
							   echo '<tr>
										<td>Campaign team member</td><td>'.fetch_user_name($client_campaign_id_value['user_id']).'</td>
										<td rowspan="2">
											<form action="index.php" method="POST">
												<input type="hidden" value="'.$client_campaign_id_value['id'].'" name="client_campaign_id"> 
												<input name="submit" type="submit" value="View"> 
											</form>
										</td>
									</tr>
									<tr>
										<td>Campaign status</td><td>Active</td>
									</tr>';
							}
                                                        $true = 'yes';
									
					}
                                        
					if(mysql_num_rows($client_campaign_id_two) == 0 && $true == 'no') {
                                            echo '<tr>
                                                      <td>No active client campaign</td>
                                                  </tr>';
					}
				?>
			</table>	
		<?php
		}
		elseif($_GET['edit'] == 'past') {
		
				?>
			<table class="sn_table_data">
            	<?php				
					$client_campaign_id = mysql_query("SELECT * FROM  client_campaign where status='4' and user_id=".$user_id);
					
					
					//echo "SELECT * FROM  client_campaign cc,  client_campaign_meta ccm where cc.status='3' and ccm.meta_key='campaign_relation_id' and  cc.review_dates >  '".$today."' and ccm.meta_value=".$user_id;
							
					if($client_campaign_id)
					{
						while($client_campaign_id_value = mysql_fetch_array($client_campaign_id))
							{
							   echo '<tr>
										<td>Campaign team member</td><td>'.$client_campaign_id_value['solution_team_partner'].'</td>
										<td rowspan="2">
											<form action="index.php" method="POST">
												<input type="hidden" value="'.$client_campaign_id_value['id'].'" name="client_campaign_id"> 
												<input name="submit" type="submit" value="View"> 
											</form>
										</td>
									</tr>
									<tr>
										<td>Campaign status</td><td>'.$client_campaign_id_value['status'].'</td>
									</tr>';
							}		
									
					}
				?>
			</table>
            
            
            <table class="sn_table_data">
            	<?php				
					
					//echo "SELECT * FROM  client_campaign cc,  client_campaign_meta ccm where cc.status='3' and ccm.meta_key='campaign_relation_id' and  cc.review_dates >  '".$today."' and ccm.meta_value=".$user_id;
							
					if($client_campaign_id_client)
					{
						while($client_campaign_id_client_value = mysql_fetch_array($client_campaign_id_client))
							{
							   echo '<tr>
										<td>Campaign team member</td><td>'.$client_campaign_id_client_value['solution_team_partner'].'</td>
										<td rowspan="2">
											<form action="index.php" method="POST">
												<input type="hidden" value="'.$client_campaign_id_client_value['id'].'" name="client_campaign_id"> 
												<input name="submit" type="submit" value="View"> 
											</form>
										</td>
									</tr>
									<tr>
										<td>Campaign status</td><td>'.$client_campaign_id_client_value['status'].'</td>
									</tr>';
							}		
									
					}
					
					$client_campaign_id_client = mysql_query("SELECT * FROM  client_campaign where status='4' and user_id=".$user_id);
					
					if(mysql_num_rows($client_campaign_id_client) == 0) {
							echo '<tr>
									<td>No past client campaign</td>
								</tr>';
					}
				?>
			</table>
		<?php
		
		}
	?>
    
</div>
<?php include("../../footer.php"); ?>