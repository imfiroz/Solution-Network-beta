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
					<img src="<?php echo base_url(); ?>my-account/images/client-campaing/leads.jpg" />
				</a>
			</td>
			<td>
				<a href="sales.php">
					<img src="<?php echo base_url(); ?>my-account/images/client-campaing/sales_grey.jpg" />
				</a>
			</td>
		</tr>
	</table>
		<table class="sn_table_data">   
			<tr>
				<th colspan="4">YOUR LEADS / PARTNERS LEADS</th></tr>
			<tr>
				<th colspan="4" align="left">Outstanding Leads</th></tr>
			
			<tr>
				<td>Date Received: </td>
				<td>Name: </td>
				<td colspan="2">Status: </td></tr>
			
			<?php
			
				$prospects_result = mysql_query("SELECT * FROM  `prospects_results` where status='2' and client_id=".$user_id);
				
		while($prospects_result_value = mysql_fetch_array($prospects_result))
			{
							$prospects = mysql_fetch_array(mysql_query("SELECT * FROM  `prospects` where id=".$prospects_result_value['prospect_id']));
							echo '<tr>
									<td>1-Mar</td>
									<td>'.$prospects['last_name'].' '.$prospects['first_name'].'</td>
									<td>Overdue</td>
									<td><a href="outstanding_leads.php?id='.$prospects['id'].'"><img src="../images/view.jpg"></a></td>
								</tr>';
						}
			?>                    
			<tr>
				<th colspan="4" align="left">Accepted Leads</th></tr>
			
			<tr>
				<td>Date Accepted: </td><td colspan="2">Name: </td><td>Action</td></tr>
			 <?php
			
				$prospects_result = mysql_query("SELECT * FROM  `prospects_results` where status='6' and client_id=".$user_id);
				
		while($prospects_result_value = mysql_fetch_array($prospects_result))
			{
							$prospects = mysql_fetch_array(mysql_query("SELECT * FROM  `prospects` where id=".$prospects_result_value['prospect_id']));
							echo '<tr>
									<td>1-Mar</td>
									<td colspan="2">'.$prospects['last_name'].' '.$prospects['first_name'].'</td>
									<td><a href=""><img src="../images/view.jpg"></a></td>
								</tr>';
						}
			?>  
		</table>
</div>

<?php include("../../footer.php"); ?>