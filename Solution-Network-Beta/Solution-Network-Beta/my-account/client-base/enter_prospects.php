<?php

include("headers.php");

include("sidebar.php");


if($_POST['submit'] == 'Enter Prospects') {

	mysql_query("INSERT INTO `prospects` (`user_id`,`first_name` ,`last_name` ,`phone_number` ,`email_number` ,`address`, `type`, `date`)VALUES ($user_id,'".$_POST['first_name']."',  '".$_POST['last_name']."',  '".$_POST['phone_number']."',  '".$_POST['email_address']."',  '".$_POST['address']."', 'Assessment Incomplete', NOW() )");
	echo "<script>alert('Prospect Inserted Successfully.')</script>";
}
?>

<div id="content">
<h1>Enter Prospects</h1>
<form action="" method="POST">
	<table class="sn_table_new">
    	<tr>
        	<td>First Name</td><td><input type="text" name="first_name" required /></td>
        </tr>
    	<tr>
        	<td>Last Name</td><td><input type="text" name="last_name" required /></td>
        </tr>
    	<tr>
        	<td>Phone Number</td>
			<td>
				<input type="text" name="phone_number" 
				onKeyUp="this.value=this.value.replace(/[^\d]/,'')"
				required />
			</td>
        </tr>
    	<tr>
        	<td>Email Address</td><td><input type="text" name="email_address" required /></td>
        </tr>
    	<tr>
        	<td>Address</td><td><textarea name="address" required ></textarea></td>
        </tr>
    	<tr>
        	<td><input type="submit" value="Enter Prospects" name="submit" required /></td>
        </tr>
    </table>
</form>
</div>
<?php include("../../footer.php"); ?>


