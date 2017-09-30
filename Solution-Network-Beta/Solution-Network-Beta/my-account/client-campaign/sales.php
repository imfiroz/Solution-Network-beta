<?php

include("headers.php");

include("sidebar.php"); 

?>

<div id="content">
<h4>CLIENT CAMPAIGN: John @ ABC FINANCIAL</h4>
	<table class="sn_table" width="50%">
		<tr>
			<td>
				<a href="prospect_activity.php">
					<img src="<?php echo base_url(); ?>my-account/images/client-campaing/prospects_grey.jpg" />
				</a>
			</td>
			<td>
				<a href="leads.php">
					<img src="<?php echo base_url(); ?>my-account/images/client-campaing/leads-sales.jpg" />
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
				<img src="<?php echo base_url(); ?>my-account/images/client-campaing/leads_grey.jpg" />
			</a>
		</td>
		<td>
			<a href="">
				<img src="<?php echo base_url(); ?>my-account/images/client-campaing/sales.jpg" />
			</a>
		</td>
	</tr>
	
	</table>
	<table class="sn_table_data">
			<tr>
				<td>YOUR SALES / PARTNERS SALES </td></tr>
			
			<tr>
				<td><b>Active Sales: </b></td></tr>
  </table>
  
  <table class="sn_table_data">
			<tr>
				<td><b>Date Lead Received: </b></td>
				<td>Name: </td>
				<td>Status: </td></tr>
			
			<?php
			
				$prospects_result = mysql_query("SELECT * FROM  `prospects_results` where status='2' and client_id=".$user_id);
				
		while($prospects_result_value = mysql_fetch_array($prospects_result))
			{
							$prospects = mysql_fetch_array(mysql_query("SELECT * FROM  `prospects` where id=".$prospects_result_value['prospect_id']));
							echo '<tr>
										<td>1-Mar</td>
										<td>Smith, John</td>
										<td>Strategy Meeting</td>
										<td><a href=""><img src="../images/client-campaing/view.jpg" /></a></td></tr>';
				}
			?>
   </table>
   
   <table class="sn_table_data">
			<tr>
				<td colspan="4"><b>Closed Sales: </b></td></tr>
			
			<tr>
				<td>Date Closed: </td>
				<td>Name: </td>
				<td colspan="2">Status: </td></tr>
			
			<?php
			
				$prospects_result = mysql_query("SELECT * FROM  `prospects_results` where status='6' and client_id=".$user_id);
				
		while($prospects_result_value = mysql_fetch_array($prospects_result))
			{
							$prospects = mysql_fetch_array(mysql_query("SELECT * FROM  `prospects` where id=".$prospects_result_value['prospect_id']));
							echo '<tr>
										<td>27-Feb</td>
										<td>Lake, Jane</td>
										<td>Successfull</td>
										<td><a href=""><img src="../images/client-campaing/view.jpg" /></a></td></tr>';
				}
			?> 
  </table>

</div>

<?php include("../../footer.php"); ?>