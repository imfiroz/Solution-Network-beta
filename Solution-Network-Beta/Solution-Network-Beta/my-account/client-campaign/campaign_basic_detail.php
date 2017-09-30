<?php

include("headers.php");
include("sidebar.php");

if(isset($_GET['pcid']) AND $_GET['pcid'] != '') {
	$_SESSION['partnership_campaign_id'] = $_GET['pcid'];
	$tmp = mysql_result(mysql_query("SELECT client_id FROM partnership_task WHERE pcamp_id='".$_GET['pcid']."'"), 0, "client_id");

	$_SESSION['matchedresult_client_id'] = $tmp;
	echo "<script>window.location.href='campaign_basic_detail.php'</script>";
}
if(isset($_SESSION['partnership_campaign_id']) AND $_SESSION['partnership_campaign_id'] != '') {
	$partnership_campaign_id = mysql_fetch_array(mysql_query("SELECT * FROM  `partnership_campaign` where id=".$_SESSION['partnership_campaign_id']));

 ?>
<div id="content">
<h1>Client Campaign Creation - Stage 1 (Basic)</h1>
<?php

	$submit = $_POST["submit"];
	$campaign_creation = $_POST["campaign_creation"];
	$partner = $_POST["partner"];
	$period = $_POST["period"];
	$campaign_mf = $_POST["campaign_mf"];
	$review_date = $_POST["review_date"];
	$weekly_pday = $_POST["weekly_pday"];

	if($submit){
	
			//ADD PERSONAL DETAILS IN USERMETA TABLE
			
				//mysql_query("UPDATE `client_campaign` SET  `creation_date` =  '".$campaign_creation."',`solution_team_partner` =  '".$partner."',`campaign_period` =  '".$period."',`campaign_milestone_frequency` =  '".$campaign_mf."',`review_dates` =  '".$review_date."',`weekly_prospect_activity_day` =  '".$weekly_pday."',`status` =  '2' WHERE `id` =".$_SESSION['partnership_campaign_id']);
				
				mysql_query("UPDATE `client_campaign` SET  `creation_date` =  '".$campaign_creation."',`solution_team_partner` =  '".$_SESSION['matchedresult_client_id']."',`campaign_period` =  '".$period."',`campaign_milestone_frequency` =  '".$campaign_mf."',`review_dates` =  '".$review_date."',`weekly_prospect_activity_day` =  '".$weekly_pday."',`status` =  '2' WHERE `id` =".$_SESSION['partnership_campaign_id']);
				update_client_campaign_meta('campaign_relation_id', $user_id,$user_id);

				mysql_query("INSERT INTO `meeting` (`user_id`, `title`, `type`, `time`, `end`, `date`, `address`, `invitecontent`) VALUES ('".$user_id."', '".$partnership_campaign_id['service']."', 'Client Campaign Prospects', '".$campaign_creation."', '".$review_date."', '".$campaign_creation."', '','')");

				$meeting_id_current = mysql_insert_id();
				$link = base_url().'my-account/client-campaign/campaign_contact.php';
				mysql_query("INSERT INTO `meeting_meta` (`meeting_id` ,`meta_key` ,`meta_value`) VALUES ('$meeting_id_current',  'link',  'campaign_contact.php')");

				mysql_query("UPDATE `partnership_task` SET `status` = '3' WHERE pcamp_id = '".$_SESSION['partnership_campaign_id']."' and `user_id` =".$user_id);
			//END ADD PERSONAL DETAILS IN USERMETA TABLE
	} 

	else	{
	
	
	echo '<script src="../js/jquery.js"></script>
				<script>
				$(function(){
					$("#submit").click(function(){
	
						var campaign_creation = $("#campaign_creation").val();
						var partner = $("#partner").val();
						var period = $("#period").val();
						var campaign_creation = $("#campaign_creation").val();
						var campaign_mf = $("#campaign_mf").val();
						var review_date = $("#campaign_creation2").val();
						var weekly_pday = $("#weekly_pday").val();
						var partnership_id = $("#partnership_id").val();
						
						var data = "submit=yes&campaign_creation="+campaign_creation+"&partner="+partner+"&period="+period+"&review_date="+review_date+"&partnership_id="+partnership_id+"&campaign_mf="+campaign_mf+"&weekly_pday="+weekly_pday;
						
						$.ajax({
							type: "POST",
							data: data,
							url: "campaign_basic_detail.php",
							success: function(e){

								window.location.href="campaign_targets.php";
							}
						});
					});
				});
				</script>
				
				<table width="100%" height="369" border="0">
					  <tr>
						<td valign="top">Solutions Team Partner:</td>
						<td valign="top">
							<select name="partner" id="partner" onchange="window.location.href=(\'?pcid=\'+this.value)">
							<option value="">Select User</option>';
							
									$partnership_campaign_id = mysql_query("SELECT * FROM  `partnership_task` where status='2' and user_id=".$user_id);

									while($partnership_campaign_id_value = mysql_fetch_array($partnership_campaign_id))
										{
											$user_values_cc = mysql_fetch_array(mysql_query("SELECT * FROM users WHERE id=".$partnership_campaign_id_value['client_id']));
											
											echo '<option value="'.$partnership_campaign_id_value['pcamp_id'].'" '.(($_SESSION['partnership_campaign_id'] == $partnership_campaign_id_value['pcamp_id']) ? "SELECTED" : "").' >'.$user_values_cc["name"].'</option>';
										}
							echo '
							</select>
						</td>
					  </tr>
					  <tr>
						<td valign="top">Creation Date:</td>
						<td valign="top">
						<script>
						window.onload = function(){
							new JsDatePick({
							useMode:2,
							target:"campaign_creation",
							dateFormat:"%Y-%m-%d"
							});
							new JsDatePick({
							useMode:2,
							target:"campaign_creation2",
							dateFormat:"%Y-%m-%d"
							});
							
							}; 
						</script>
						<input type="text" name="campaign_creation" id="campaign_creation"/></td>
					  </tr>
					  <tr>
						<td valign="top">Campaign Period:</td>
						<td valign="top">
						  <select name="period" id="period">
						   <option value="3 months" ';			
							if(select_usermeta('period', $user_id) == "3 months") { echo "selected='selected'"; }			
							echo '>3 months</option><option ';			
							if(select_usermeta('period', $user_id) == "6 months") { echo "selected='selected'"; }			
							echo '>6 months</option><option ';			
							if(select_usermeta('period', $user_id) == "9 months") { echo "selected='selected'"; }			
							echo '>9 months</option>
						<option ';			
							if(select_usermeta('period', $user_id) == "12 months") { echo "selected='selected'"; }			
							echo '>12 months</option>
						  </select>
						</td>
					  </tr>
					  <tr>
						<td valign="top">Campaign Milestone Frequency:</td>
						<td valign="top"><select name="campaign_mf" id="campaign_mf">
						   <option value="Monthly" ';			
								if(select_usermeta('campaign_mf', $user_id) == "Monthly") { echo "selected='selected'"; }			
								echo '>Monthly</option>
						   <option ';			
								if(select_usermeta('campaign_mf', $user_id) == "Yearly") { echo "selected='selected'"; }			
								echo '>Yearly</option>
						  </select></td>
					  </tr>
					  <tr>
						<td valign="top">Review Dates:</td>
						<td valign="top"><input type="text" name="review_date" id="campaign_creation2" /></td>
					  </tr>
					  <tr>
						<td valign="top">Weekly Prospect Activity Day:</td>
						<td valign="top">
						  <select name="weekly_pday" id="weekly_pday">
							 <option ';			
								if(select_usermeta('day', $user_id) == " monday") { echo "selected='selected'"; }			
								echo '>monday</option>
							 <option ';			
								if(select_usermeta('day', $user_id) == " tuesday") { echo "selected='selected'"; }			
								echo '>tuesday</option>
						   <option ';			
								if(select_usermeta('day', $user_id) == " wednesday") { echo "selected='selected'"; }			
								echo '>wednesday</option>
							 <option ';			
								if(select_usermeta('day', $user_id) == " thursday") { echo "selected='selected'"; }			
								echo '>thursday</option>
							 <option ';			
								if(select_usermeta('day', $user_id) == " friday") { echo "selected='selected'"; }			
								echo '>friday</option>
							  <option ';			
								if(select_usermeta('day', $user_id) == " saturday") { echo "selected='selected'"; }			
								echo '>saturday</option>
							 <option ';			
								if(select_usermeta('day', $user_id) == " sunday") { echo "selected='selected'"; }			
								echo '>sunday</option>
						  </select>
						</td>
					  </tr>
					   <tr align="right">
						<td colspan="2">
						  <input id="submit" type="button" value="Next">
						</td>
					  </tr>
				</table>';
	}
} else {
	echo '<h1>No Client Campaign To Launch.</h1>';
}
?>
</div>
<?php include("../../footer.php"); ?>