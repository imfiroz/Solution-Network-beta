<?php

include("headers.php");

include("sidebar.php"); ?>

<div id="content">
<h1>Client Campaigns</h1>


<?php

	if(!empty($_POST['submit'])) {
			$_SESSION['matchedresult_client_id'] = $_POST['client_id'];
			$_SESSION['partnership_campaign_id'] = $_POST['partnership_id'];
			
			header('location:campaign_basic_detail.php');
	}

	//check client campaign is already done.
	$client_campaign_id = mysql_fetch_array(mysql_query("SELECT * FROM  `partnership_task` where status='2' and user_id=".$user_id));
	if($client_campaign_id == 0) echo "No Client campaign to launch.";
	
	
	
	$partnership_campaign_id = mysql_query("SELECT * FROM  `partnership_task` where status='2' and user_id=".$user_id);
	
	while($partnership_campaign_id_value = mysql_fetch_array($partnership_campaign_id))
		{
			
			$user_values_cc = mysql_fetch_array(mysql_query("SELECT * FROM users WHERE id=".$partnership_campaign_id_value['client_id']));
			$partnership_campaign_cc = mysql_fetch_array(mysql_query("SELECT * FROM partnership_campaign WHERE id=".$partnership_campaign_id_value['pcamp_id']));
			
			 ?>
             	<form action="" method="post">
					<input type="hidden" value="<?php echo $partnership_campaign_id_value['pcamp_id']; ?>" name="partnership_id">
					<input type="hidden" value="<?php echo $partnership_campaign_id_value['client_id']; ?>" name="client_id">
                    <input type="submit" name="submit" value="Launch <?php echo $partnership_campaign_cc['service']; ?> Client Campaign" />
                </form>
<?php
	
		}
?>
</div>
<?php include("../../footer.php"); ?>