<?php

include("headers.php");

include("sidebar.php");

$_SESSION["partnership_campaign_id"] = $_GET['pcid'];



if($_POST['submit'] == 'Send Open Email') {
	
		$to      = $_POST['open_contact_email'];
		$subject = 'Prospects';
		$message = 'Please fill the below assessment';
		$headers = 'From: webmaster@example.com' . "\r\n" .
			'Reply-To: webmaster@example.com' . "\r\n" .
			'X-Mailer: PHP/' . phpversion();
		
		mail($to, $subject, $message, $headers);
}


if($_POST['submit'] == 'Open Contact') {
		
	$sql = mysql_query("SELECT * FROM  `prospects` where user_id=".$user_id);
	
	?>
    <br />Select and Send Email OR call<br /><br />
    <form action="" method="post">
    	<input type="hidden" value="<?php echo $sql_value['id']; ?>" name="prospect_id" />
        <select name="open_contact_email">
        <?php
            while($sql_value = mysql_fetch_array($sql)) {
            
                    ?>
                            <option value="<?php echo $sql_value['email_number']; ?>">
                                <?php echo $sql_value['email_number'].' ('.$sql_value['phone_number'].' )'; ?>
                            </option>
                    <?php
            }
            ?>
        </select>
        <input type="submit" value="Send Open Email" name="submit"/>
    </form>
    <?php
}
?>

<div id="content">
<h1>Contact Prospects</h1>

<p>Contact the prospects through below available options</p>		

<form action="" method="POST">
	Option 1: <input type="submit" value="E-Campaign Needs Assessment" name="submit"/>
</form>	
<?php
if($_POST['submit'] == 'E-Campaign Needs Assessment') {

	$sql = mysql_query("SELECT * FROM  `prospects` where user_id=".$user_id);
	echo '<ul>';	
	while($sql_value = mysql_fetch_array($sql)) {
		
		echo '<li><a href="assessment_result.php?pcid='.$_SESSION["partnership_campaign_id"].'&a_name=mortgage_broker&prospect_id='.$sql_value["id"].'">'.$sql_value["first_name"].'</a></li>';
		/**$to      = $sql_value['email_number'];
		$subject = 'Prospects';
		$message = 'Please fill the below assessment';
		$message .= '<a href="assessment_result.php?pcid='.$_SESSION["partnership_campaign_id"].'&a_name=mortgage_broker&prospect_id='.$sql_value["id"].'">assessment_result</a>';
		$headers = 'From: webmaster@example.com' . "\r\n" .
			'Reply-To: webmaster@example.com' . "\r\n" .
			'X-Mailer: PHP/' . phpversion();
		
		mail($to, $subject, $message, $headers);**/
	}
	echo '</ul><br><br>';
}
?>

<form action="" method="POST">
	Option 2: <input type="submit" value="Open Contact" name="submit"/>
</form>
</div>
<?php include("../../footer.php"); ?>


