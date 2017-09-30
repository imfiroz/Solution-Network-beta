<?php

include("headers.php");

include("sidebar.php");

if($_POST['prospect_id'] != '')
		$_SESSION['prospect_id'] = $_POST['prospect_id'];
if($_SESSION['prospect_id'] != '')
		$prospect_id = $_SESSION['prospect_id'];
else 
		$prospect_id = $_POST['prospect_id'];

$prospects_values = mysql_fetch_array(mysql_query("SELECT * FROM  prospects where id=".$prospect_id));
									
?>

<div id="content">
<h1>Client Campaign: <?php echo $_SESSION["user"]; ?></h1>

<?php if($_GET['edit'] == '') {


	 if($_POST['sendlead'] == 'Send Lead') {
	 
		$client_id = mysql_fetch_array(mysql_query("SELECT * FROM `client_campaign` where id =".$_SESSION['client_campaign_id']));
		
		mysql_query("UPDATE `prospects_results` SET  `client_id` =  '".$client_id['solution_team_partner']."', status = '2' where ccamp_id = ".$_SESSION['client_campaign_id']." and user_id = '$user_id' and prospect_id	= ".$_SESSION['prospect_id']);
		
		$tmp_id = mysql_result(mysql_query("SELECT id FROM `prospects_results` where ccamp_id = ".$_SESSION['client_campaign_id']." and user_id = '$user_id' and prospect_id	= ".$_SESSION['prospect_id']), 0, "id");
		
		mysql_query("INSERT INTO `prospects_results_meta` VALUES (NULL, $tmp_id, 'lead_recived_date', NOW() )");
		
		mysql_query("UPDATE `prospects` SET `type`='Successful' WHERE id=".$rj_id);

        header("location:prospect_activity.php?edit=plog");
		}
 ?>
        <table class="sn_table_new">
            <tr>
                <td colspan="2"><b>Needs Assessment Type:</b> E-Campaign Assessment</td>
                <td colspan="2"><b>Assessment Date:</b> 1-Mar</td>
            </tr>
            <tr>
                <td colspan="2"><b>Service Assessed:</b> Financial Planning</td>
                <td colspan="2"><b>Assessment Result:</b> Successful</td>
            </tr>
            <tr>
                <td><a href="referring-lead.php"><img src="<?php echo base_url(); ?>my-account/images/client-campaing/basic-info.jpg" /></a></td>
                <td><a href="referring-lead.php?edit=aande"><img src="<?php echo base_url(); ?>my-account/images/client-campaing/a&linc&exp_gray.jpg" /></a></td>
                <td><a href="referring-lead.php?edit=a"><img src="<?php echo base_url(); ?>my-account/images/client-campaing/assessment.jpg" /></a></td>
                <td><a href="referring-lead.php?edit=na"><img src="<?php echo base_url(); ?>my-account/images/client-campaing/notes-attachements_gray.jpg" /></a></td>
            </tr>
            
            
            <tr>
                <td>First Name:</td><td></td>
                <td>Date of Birth:</td><td></td>
            </tr>
            <tr>
                <td>Location:	(suburb p/c only)</td><td></td>
                <td>Working Status:</td><td></td>
            </tr>
            <tr>
                <td>Employment Type:</td><td></td>
                <td>Occupation Type:</td><td></td>
            </tr>
            <tr>
                <td>Income:</td><td></td>
                <td></td><td></td>
            </tr>
            <tr>
                <td>
                	<form action="" method="POST">
                    	<input type="submit" name="sendlead" value="Send Lead"/>
                	</form>
                </td>
            </tr>
            
        </table>
<?php

}

 ?>
</div>
<?php include("../../footer.php"); ?>