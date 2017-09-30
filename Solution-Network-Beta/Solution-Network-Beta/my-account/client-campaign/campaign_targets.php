<?php

include("headers.php");

include("sidebar.php"); ?>

<div id="content">
<h1>Client Campaign Creation - Stage 2 (Monthly Targets)</h1>

<?php 

$submit = $_POST["submit"];
$campaign_clientdb = $_POST["campaign_clientdb"];


//Partnership campaign
$client_id_values = mysql_fetch_array(mysql_query("SELECT * FROM partnership_campaign WHERE id=".$_SESSION["partnership_campaign_id"]));

if($submit){
	mysql_query("UPDATE `client_campaign` SET  `status` =  '3' WHERE `id` =".$_SESSION["partnership_campaign_id"]);
	
	mysql_query("UPDATE `partnership_task` SET  `status` =  '4' WHERE `pcamp_id` =".$_SESSION["partnership_campaign_id"]);
	
	//ADD PERSONAL DETAILS IN USERMETA TABLE
	update_client_campaign_meta('campaign_clientdb', $campaign_clientdb,$user_id);
	
	set_notification($_SESSION["matchedresult_client_id"],21, 1);
	//END ADD PERSONAL DETAILS IN USERMETA TABLE	
} 

else{

		$client_id_values = mysql_fetch_array(mysql_query("SELECT * FROM partnership_task WHERE pcamp_id=".$_SESSION['partnership_campaign_id']));
		$appeal_rates = '30';
			
		$total_prospects = select_usermeta('approx_existing', $client_id_values['client_id'])+select_usermeta('new_clients', $client_id_values['client_id']);
		$total_prospects_two = select_usermeta('approx_existing', $user_id)+select_usermeta('new_clients', $user_id);
			
		$leads  = ($appeal_rates*$total_prospects)/100;
		$leads_two  = ($appeal_rates*$total_prospects_two)/100;
		
		$sales = ($leads*select_usermeta('sale_conversionrate', $client_id_values['client_id']))/100;
		$sales_two =  ($leads_two*select_usermeta('sale_conversionrate', $user_id))/100;
		
		$total_monthly_sale = $sales*select_usermeta('average_inc_cilent', $user_id);
		$total_monthly_sale_two = $sales_two*select_usermeta('average_inc_cilent', $client_id_values['client_id']);
			
		$minimal_referral_fee = $total_monthly_sale*.2;
			
		$minimal_referral_fee_two = $total_monthly_sale_two*.2;
			
		$total_mrincome = $minimal_referral_fee_two*.8;
		$total_mrincome_two = $minimal_referral_fee*.8;
			
		$subtract = $total_monthly_sale - $minimal_referral_fee;
		$total_mci = $subtract+$total_mrincome;			
		$total_mci_two = ($total_monthly_sale_two - $minimal_referral_fee_two)+$total_mrincome_two;
			
 		echo '<script src="../js/jquery.js"></script>
			<script>
			$(function(){
				$("#submit").click(function(){

					var campaign_clientdb = $("#campaign_clientdb").val();
					var data = "submit=yes&campaign_clientdb="+campaign_clientdb;
					$.ajax({
						type: "POST",
						data: data,
						url: "campaign_targets.php",
						success: function(e){
							window.location.href="index.php";
						}
					});
				});
			});
			</script>

		<table class="sn_table_data"> 
				  <tr>
				 	   <th align="left" colspan="3">Prospects</th>
				  </tr>
				  <tr>
					  <td>&nbsp;</td>
					  <td>'.$user_values['name'].'</td>
					  <td>'.$user_v['name'].'</td>
				  </tr>
				  <tr>
				  <td colspan="3"><b>Prospects Contacted</b></td>
				  </tr>
				  <tr>
				  <td>% Of Existing Client Database</td>
				  <td>
					  <select name="campaign_clientdb" id="campaign_clientdb" style="width: 50px;" >
						<option '.((fetch_client_campaign_meta("campaign_clientdb",$user_id) == '5') ? "SELECTED": " ").' value="5">5</option>
						<option '.((fetch_client_campaign_meta("campaign_clientdb",$user_id) == '10') ? "SELECTED": " ").'value="10">10</option>
						<option '.((fetch_client_campaign_meta("campaign_clientdb",$user_id) == '20') ? "SELECTED": " ").' value="20">20</option>
					  </select>%
				  </td>
				  <td><input type="text" name="campaign_clientdb_client" id="campaign_clientdb_client" value="'.fetch_client_campaign_meta("campaign_clientdb_client",$user_id).'">%</td>
				  </tr>  
				  <tr>
				  <td>Partner\'s Exsting Client Database:</td>
				  <td>'.select_usermeta('approx_existing', $client_id_values['client_id']).'</td>
				  <td>'.select_usermeta('approx_existing', $user_id).'</td>
				  </tr>
				  <tr>
				  <td>Partner\'s New Client Prospects:</td>
				  <td>'.select_usermeta('new_clients', $client_id_values['client_id']).'</td>
				  <td>'.select_usermeta('new_clients', $user_id).'</td>
				  </tr>
				  
				  <tr>
				  <td><br><b>Total Prospects</b></td>
				  <td>'.$total_prospects.'</td>
				  <td><br>'.$total_prospects_two.'</td>
				  </tr> 
				  
				  <tr>
				  <td colspan="3"><br><b>Leads Recieved</b></td>
				  </tr>
				  
				  <tr>
				  <td>Appeal Rates</td>
				  <td>'.$appeal_rates.'%</td>
				  <td>42%</td>
				  </tr>
				  
				  <tr>
				  <td>Leads</td>
				 <td>'.$leads.'</td>
				  <td>'.$leads_two.'</td>
				  </tr>
				  
				  <tr>
				  <td colspan="3"><br><b>Sales</b></td>
				  </tr>
				  
				  <tr>
				  <td>Your Conversion Rate</td>
				  <td>'.select_usermeta('sale_conversionrate', $user_id).'%</td>
				  <td>'.select_usermeta('sale_conversionrate', $client_id_values['client_id']).'%</td>
				  </tr>
				  
				  <tr>
				  <td>Sales</td>
				 <td>'.$sales.'</td>
				  <td>'.$sales_two.'</td>
				  </tr>
				  
				  <tr>
				  <td colspan="3"><br><b>Income</b></td>
				  </tr>
				  
				  <tr>
					  <td>Your Average Income</td>
					  <td>$'.select_usermeta('average_inc_cilent', $user_id).'</td>
					  <td>$'.select_usermeta('average_inc_cilent', $client_id_values['client_id']).'</td>
				  </tr>
				  
				  <tr>
					  <td>Total Monthly Sales Income</td>
					  <td>$'.$total_monthly_sale.'</td>
					  <td>$'.$total_monthly_sale_two.'</td>
				  </tr>
				  
				  <tr>
					  <td>Minus Referral Fees</td>
					  <td>$'.$minimal_referral_fee.'</td>
					  <td>$'.$minimal_referral_fee_two.'</td>
				  </tr>
				  
				  <tr>
					  <td>Total Monthly Referral income</td>
					  <td>$'.$total_mrincome.'</td>
					  <td>$'.$total_mrincome_two.'</td>
				  </tr>
				  
				   <tr>
					  <td><br><b>TOTAL MONTHLY CAMPAIGN INCOME:</b></td>
					  <td><br>$'.$total_mci.'</td>
					  <td><br>$'.$total_mci_two.'</td>
				  </tr>
				   <tr align="right">
						<td colspan="3">
						  <input id="submit" type="button" value="Complete">
						</td>
				  </tr>
	  
	</table><br><br>
					
			<div id="message"></div>';

}
?>
</div>

<?php include("../../footer.php"); ?>