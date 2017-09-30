<?php

include("headers.php");

include("sidebar.php");

?>

<div id="content">
<?php 


		
if($_POST['edit'] == 'Edit') {
	
		if($_POST['edit_pid'] != ''){
		
			mysql_query("UPDATE `prospects` SET `first_name` =  '".$_POST['first_name']."' WHERE `id` =".$_POST['edit_pid']);
			mysql_query("UPDATE `prospects` SET `last_name` =  '".$_POST['last_name']."' WHERE `id` =".$_POST['edit_pid']);
			
			update_prospectsresultsmeta('given_name',$_POST['given_name'],$_POST['edit_pid']);
			update_prospectsresultsmeta('dob',$_POST['dob'],$_POST['edit_pid']);
			update_prospectsresultsmeta('marital_status',$_POST['marital_status'],$_POST['edit_pid']);
			update_prospectsresultsmeta('no_dependants',$_POST['no_dependants'],$_POST['edit_pid']);
			update_prospectsresultsmeta('occupation',$_POST['occupation'],$_POST['edit_pid']);
			update_prospectsresultsmeta('employer',$_POST['employer'],$_POST['edit_pid']);
			update_prospectsresultsmeta('postal_address',$_POST['postal_address'],$_POST['edit_pid']);
		}
		?>
        	    <h1>Edit Prospects</h1>
                <form action="" method="post">
                <table class="sn_table">
                    <?php			
                        if($_POST['id'] != '')
							$id = $_POST['id'];
						else 
							$id = $_POST['edit_pid'];
						
						
                        $prospects = mysql_query("SELECT * FROM  `prospects` where id='".$id."' and user_id=".$user_id);
                        
                        while($prospects_value = mysql_fetch_array($prospects))
                        {	?>          
                                <tr>
                                	<th>Name</th><td><input type="name" name="first_name" value="<?php echo $prospects_value['first_name']; ?>" /></td>
                                </tr>
                                <tr>
                                    <th>Surname</th><td><input type="name" name="last_name" value="<?php echo $prospects_value['last_name']; ?>" /></td>
                                </tr>
                                <tr>
                                    <th>Given Name</th><td><input type="name" name="given_name" value="<?php echo fetch_prospectsresultsmeta('given_name',$id); ?>" /></td>
                                </tr>
                                <tr>
                                    <th>Date of Birth</th><td><input type="name" name="dob" value="<?php echo fetch_prospectsresultsmeta('dob',$id); ?>" /></td>
                                </tr>
                                <tr>
                                    <th>Marital Status</th><td><input type="name" name="marital_status" value="<?php echo fetch_prospectsresultsmeta('marital_status',$id); ?>" /></td>
                                </tr>
                                <tr>
                                    <th>No. Of Dependants</th><td><input type="name" name="no_dependants" value="<?php echo fetch_prospectsresultsmeta('no_dependants',$id); ?>" /></td>
                                </tr>
                                <tr>
                                    <th>Occupation</th><td><input type="name" name="occupation" value="<?php echo fetch_prospectsresultsmeta('occupation',$id); ?>" /></td>
                                </tr>
                                <tr>
                                    <th>Employer</th><td><input type="name" name="employer" value="<?php echo fetch_prospectsresultsmeta('employer',$id); ?>" /></td>
                                </tr>
                                <tr>
                                    <th>Phone</th><td><input type="name" name="phone_number" value="<?php echo $prospects_value['phone_number']; ?>" /></td>
                                </tr>
                                <tr>
                                    <th>Email</th><td><input type="name" name="email_number" value="<?php echo $prospects_value['email_number']; ?>" /></td>
                                </tr>
                                <tr>
                                    <th>Address</th><td><textarea name="address"><?php echo $prospects_value['address']; ?></textarea></td>
                                </tr>
                                <tr>
                                    <th>Postal Address</th><td><textarea name="postal_address"><?php echo fetch_prospectsresultsmeta('postal_address',$id); ?></textarea></td>
                                </tr>
                                <tr>
                                  <td colspan="2">
                                        <input type="submit" value="Edit" name="edit" />
                                        <input type="hidden" value="<?php echo $prospects_value['id']; ?>" name="edit_pid" />
                                        <input type="image" onclick="window.location.href='client-base.php';" src="<?php echo base_url();?>my-account/images/back.jpg">
                                    </td>
                                </tr>
                            <?php
                        }
                    ?>
                </table>
              </form>

        <?php
	}
		
elseif($_POST['delete'] == 'Delete') {
	
			mysql_query("DELETE from `prospects` where `user_id` =  '".$user_id."' and `id` =".$_POST['id']);
		
		?>
        	   Record deleted.

        <?php
	}	
elseif($_POST['submit'] == '' && $_GET['id'] == '') { ?>

    <h1>Prospect Details</h1>
        <table class="sn_table_data">
            <tr>
                <th>Name</th><th>Status</th><th>Source</th><th>Stage</th><th>Date</th><th>Action</th>
            </tr>
            <?php			
                
                $prospects = mysql_query("SELECT * FROM  `prospects` where user_id=".$user_id);
                
                while($prospects_value = mysql_fetch_array($prospects))
                {	?>          
                        <tr>
                            <td><?php echo $prospects_value['first_name']; ?></td>
                            <td><?php echo $prospects_value['type']; ?></td>
                            <td>Website Lead</td>
                            <td>Activated</td>
                            <td><?php echo $prospects_value['date']; ?></td>
                            <td>
                                <form action="" method="post" style="width:20%;float:left;">
                                    <input type="submit" value="View" name="submit" />
                                    <input type="hidden" value="<?php echo $prospects_value['id']; ?>" name="id" />
                                </form><form action="" method="post" style="width:20%;margin-left: 5px;float:left;">
                                    <input type="submit" value="Edit" name="edit" />
                                    <input type="hidden" value="<?php echo $prospects_value['id']; ?>" name="id" />
                                 </form><form action="" method="post" style="width:20%;float:left;">
                                    <input type="submit" value="Delete" name="delete" />
                                    <input type="hidden" value="<?php echo $prospects_value['id']; ?>" name="id" />
                                </form>
                            </td>
                        </tr>
                    <?php
                }
            ?>
        </table>
<?php }

else {

		if($_POST['id'] != '')
		$id = $_POST['id'];
		else
		$id = $_GET['id'];
		
		$prospects = mysql_fetch_array(mysql_query("SELECT * FROM  `prospects` where id=".$id));
		
		
 if($_GET['edit'] == 'bi' || $_POST['id'] != '') {

	if($_POST['id'] == '')
		$id = $_GET['id'];
	else
		$id = $_POST['id'];
		
	?>
    <table class="sn_table">
    	<tr>
        	<td colspan="2">
            	<select onchange="window.location.href=this.options[this.selectedIndex].value">
                	<option>Basic Information</option>
                	<option value="?id=<?php echo $id; ?>&edit=al">Assets and Liabilities</option>
                	<option value="?id=<?php echo $id; ?>&edit=ie">Income and Experience</option>
                </select><br /><br /><br />
            </td>
        </tr>
    	<tr>
        	<th>Surname</th><td><?php echo $prospects['last_name']; ?></td>
        </tr>
        <tr>
            <th>Given Name</th><td><?php echo $prospects['first_name']; ?></td>
        </tr>
        <tr>
            <th>Date of Birth</th><td><?php echo fetch_prospectsresultsmeta('dob',$id); ?></td>
        </tr>
        <tr>
            <th>Marital Status</th><td><?php echo fetch_prospectsresultsmeta('marital_status',$id); ?></td>
        </tr>
        <tr>
            <th>No. Of Dependants</th><td><?php echo fetch_prospectsresultsmeta('no_dependants',$id); ?></td>
        </tr>
        <tr>
            <th>Occupation</th><td><?php echo fetch_prospectsresultsmeta('occupation',$id); ?></td>
        </tr>
        <tr>
            <th>Employer</th><td><?php echo fetch_prospectsresultsmeta('employer',$id); ?></td>
        </tr>
        <tr>
            <th>Phone</th><td><?php echo $prospects['phone_number']; ?></td>
        </tr>
        <tr>
            <th>Email</th><td><?php echo $prospects['phone_number']; ?></td>
        </tr>
        <tr>
            <th>Address</th><td><?php echo $prospects['address']; ?></td>
        </tr>
        <tr>
            <th>Postal Address</th><td><?php echo fetch_prospectsresultsmeta('postal_address',$id); ?></td>
        </tr>
        <tr>
            <td colspan="2"> <input type="image" onclick="window.location.href='client-base.php';" src="../images/cancel.gif"></td>
        </tr>
    </table>
   
	<?php
		}
		
		elseif($_GET['edit'] == 'al') {
			
			if($_POST['add_assets'] == 'Add Assets') {
			
			
			if($_POST['prospect_id_assets'] != '') {
			
				mysql_query("INSERT INTO `prospects_assets` (`prospect_id` ,`asset_type` ,`detail` ,`asset_value` ,`attached_liability` ,`attached_income` ,`attached_expense`)VALUES ('".$_POST['prospect_id_assets']."', '".$_POST['asset_type']."', '".$_POST['detail']."',  '".$_POST['asset_value']."',  '".$_POST['attached_liability']."',  '".$_POST['attached_income']."',  '".$_POST['attached_expense']."')");
				
				header('Location:?id='.$_POST['prospect_id_assets'].'&edit=al');
			}
	?>
    		<form action="" method="post">
                 <table class="sn_table">
                    <tr>
                        <th colspan="2">Add Assets</th>
                    </tr>
                    <tr>
                        <td>Asset Type</td><td><input type="text" name="asset_type" /></td>
                    </tr>
                    <tr>
                        <td>Detail</td><td><input type="text" name="detail" /></td>
                    </tr>
                    <tr>
                        <td>Asset Value</td><td><input type="text" name="asset_value" /></td>
                    </tr>
                    <tr>
                        <td>Attached Liability</td><td><input type="text" name="attached_liability" /></td>
                    </tr>
                    <tr>
                        <td>Attached Income</td><td><input type="text" name="attached_income" /></td>
                    </tr>
                    <tr>
                        <td>Attached Expense</td><td><input type="text" name="attached_expense" /></td>
                    </tr>
                    <tr>
                        <td colspan="2"><input type="hidden" name="prospect_id_assets" value="<?php echo $_POST['prospect_id']; ?>" />
                        <input type="submit" name="add_assets" value="Add Assets" /></td>
                    </tr>
                </table>
    		</form>
    <?php
		}
	?>
    
    
    <table class="sn_table_data">
    	<tr>
        	<td colspan="6">
            	<select onchange="window.location.href=this.options[this.selectedIndex].value">
                	<option>Assets and Liabilities</option>
                	<option value="?id=<?php echo $id; ?>&edit=bi">Basic Information</option>
                	<option value="?id=<?php echo $id; ?>&edit=ie">Income and Experience</option>
                </select><br /><br /><br />
            	<select onchange="window.location.href=this.options[this.selectedIndex].value">
                	<option value="client-base.php">Asset</option>
                	<option value="?id=<?php echo $id; ?>&edit=lbt">Liabilities</option>
                </select><br /><br /><br />
            </td>
        </tr>
    	<tr>
        	<th>Asset Type</th>
            <th>Detail</th>
            <th>Asset Value</th>
            <th>Attached Liability</th>
            <th>Attached Income</th>
            <th>Attached Expense</th>
        </tr>
        <?php 
			 if($id == '')
			 	$id = $_POST['prospect_id'];
				
				 $prospectsassets = mysql_query("SELECT * FROM  `prospects_assets` where prospect_id=".$id);
				 
				while($prospectsassets_value = mysql_fetch_array($prospectsassets))
				{
		?>
                    <tr>
                        <td><?php echo $prospectsassets_value['asset_type']; ?></td>
                        <td><?php echo $prospectsassets_value['detail']; ?></td>
                        <td><?php echo $prospectsassets_value['asset_value']; ?></td>
                        <td><?php echo $prospectsassets_value['attached_liability']; ?></td>
                        <td><?php echo $prospectsassets_value['attached_income']; ?></td>
                        <td><?php echo $prospectsassets_value['attached_expense']; ?></td>
                    </tr>
		<?php
        		}
        ?>
    </table>
    <form action="" method="post">
      <input type="hidden" name="prospect_id" value="<?php echo $id; ?>" />
      <input type="submit" name="add_assets" value="Add Assets" />
      <input type="image" onclick="window.location.href='client-base.php';" src="../images/cancel.gif">	
    </form>
	<?php
		}
		
		elseif($_GET['edit'] == 'lbt') {
			
			if($_POST['add_liability'] == 'Add Liability') {
			
			
			if($_POST['prospect_id_assets'] != '') {
			
				mysql_query("INSERT INTO `prospects_liabilities` (`liability_type` ,`detail` ,`liabilities_balance` ,`attached_type` ,
`interest_rate` ,`attached_expense` ,`prospect_id`)VALUES ('".$_POST['liability_type']."', '".$_POST['detail']."',  '".$_POST['liabilities_balance']."',  '".$_POST['attached_type']."',  '".$_POST['interest_rate']."',  '".$_POST['attached_expense']."', '".$_POST['prospect_id_assets']."')");
				
				header('Location:?id='.$_POST['prospect_id_assets'].'&edit=lbt');
			}
	?>
    		<form action="" method="post">
                 <table class="sn_table">
                    <tr>
                        <th colspan="2">Add Assets</th>
                    </tr>
                    <tr>
                        <td>Liability Type</td><td><input type="text" name="liability_type" /></td>
                    </tr>
                    <tr>
                        <td>Detail</td><td><input type="text" name="detail" /></td>
                    </tr>
                    <tr>
                        <td>Liability Balance</td><td><input type="text" name="liabilities_balance" /></td>
                    </tr>
                    <tr>
                        <td>Attached Type</td><td><input type="text" name="attached_type" /></td>
                    </tr>
                    <tr>
                        <td>Interest Rate%</td><td><input type="text" name="interest_rate" /></td>
                    </tr>
                    <tr>
                        <td>Attached Expense</td><td><input type="text" name="attached_expense" /></td>
                    </tr>
                    <tr>
                        <td colspan="2"><input type="hidden" name="prospect_id_assets" value="<?php echo $_POST['prospect_id']; ?>" />
                        <input type="submit" name="add_liability" value="Add Liability" /></td>
                    </tr>
                </table>
    		</form>
    <?php
		}
	?>
    
    
    <table class="sn_table_data">
    	<tr>
        	<td colspan="6">
            	<select onchange="window.location.href=this.options[this.selectedIndex].value">
                	<option value="?id=<?php echo $id; ?>&edit=al">Assets and Liabilities</option>
                	<option value="?id=<?php echo $id; ?>&edit=bi">Basic Information</option>
                	<option value="?id=<?php echo $id; ?>&edit=ie">Income and Experience</option>
                </select><br /><br /><br />
            	<select onchange="window.location.href=this.options[this.selectedIndex].value">
                	<option value="client-base.php">Liabilities</option>
                	<option value="?id=<?php echo $id; ?>&edit=al">Asset</option>
                </select><br /><br /><br />
            </td>
        </tr>
    	<tr>
        	<th>Liability Type</th>
            <th>Detail</th>
            <th>Liability Balance</th>
            <th>Attached Type</th>
            <th>Interest Rate%</th>
            <th>Attached Expense</th>
        </tr>
        <?php 
			 if($id == '')
			 	$id = $_POST['prospect_id'];
				
				 $prospectsassets = mysql_query("SELECT * FROM  `prospects_liabilities` where prospect_id=".$id);
				 
				while($prospectsassets_value = mysql_fetch_array($prospectsassets))
				{
		?>
                    <tr>
                        <td><?php echo $prospectsassets_value['liability_type']; ?></td>
                        <td><?php echo $prospectsassets_value['detail']; ?></td>
                        <td><?php echo $prospectsassets_value['liabilities_balance']; ?></td>
                        <td><?php echo $prospectsassets_value['attached_type']; ?></td>
                        <td><?php echo $prospectsassets_value['interest_rate']; ?></td>
                        <td><?php echo $prospectsassets_value['attached_expense']; ?></td>
                    </tr>
		<?php
        		}
        ?>
    </table>
    <form action="" method="post">
      <input type="hidden" name="prospect_id" value="<?php echo $id; ?>" />
      <input type="submit" name="add_liability" value="Add Liability" />
      <input type="image" onclick="window.location.href='client-base.php';" src="../images/cancel.gif">	
    </form>
	<?php
		}
		
		elseif($_GET['edit'] == 'ie') {
		
				if($_POST['add_income'] == 'Add Income') {
			
			
			if($_POST['prospect_id_income'] != '') {
			
				mysql_query("INSERT INTO `prospects_income` (`prospect_id` ,`income_type` ,`detail` ,`amount` ,`frequency`)VALUES ('".$_POST['prospect_id_income']."', '".$_POST['income_type']."',  '".$_POST['detail']."',  '".$_POST['amount']."',  '".$_POST['frequency']."')");
				
				header('Location:?id='.$_POST['prospect_id_income'].'&edit=ie');
			}
	?>
    		<form action="" method="post">
                 <table class="sn_table">
                    <tr>
                        <th colspan="2">Add Income</th>
                    </tr>
                    <tr>
                        <td>Income Type</td><td><input type="text" name="income_type" /></td>
                    </tr>
                    <tr>
                        <td>Detail</td><td><input type="text" name="detail" /></td>
                    </tr>
                    <tr>
                        <td>Amount</td><td><input type="text" name="amount" /></td>
                    </tr>
                    <tr>
                        <td>Frequency</td><td><input type="text" name="frequency" /></td>
                    </tr>
                    <tr>
                        <td colspan="2"><input type="hidden" name="prospect_id_income" value="<?php echo $_POST['prospect_id']; ?>" />
                        <input type="submit" name="add_income" value="Add Income" /></td>
                    </tr>
                </table>
    		</form>
    <?php
		}
	?>
    
    <table class="sn_table_data">
    	<tr>
        	<td colspan="6">
            	<select onchange="window.location.href=this.options[this.selectedIndex].value">
                	<option>Income and Experience</option>
                	<option value="?id=<?php echo $id; ?>&edit=bi">Basic Information</option>
                	<option value="?id=<?php echo $id; ?>&edit=al">Assets and Liabilities</option>
                </select><br /><br /><br />
            	<select onchange="window.location.href=this.options[this.selectedIndex].value">
                	<option value="client-base.php">Income</option>
                	<option value="?id=<?php echo $id; ?>&edit=exp">Expenses</option>
                </select><br /><br /><br />
            </td>
        </tr>
    	<tr>
        	<th>Income Type</th>
            <th>Detail</th>
            <th>Amount</th>
            <th>Frequency</th>
        </tr>
    	<?php
			 if($id == '')
			 	$id = $_POST['prospect_id'];
				
				 $prospectsassets = mysql_query("SELECT * FROM  `prospects_income` where prospect_id=".$id);
				 
				while($prospectsassets_value = mysql_fetch_array($prospectsassets))
				{
		?>
                    <tr>
                        <td><?php echo $prospectsassets_value['income_type']; ?></td>
                        <td><?php echo $prospectsassets_value['detail']; ?></td>
                        <td><?php echo $prospectsassets_value['amount']; ?></td>
                        <td><?php echo $prospectsassets_value['frequency']; ?></td>
                    </tr>
		<?php
        		}
        ?>
    </table>    
    <form action="" method="post">
      <input type="hidden" name="prospect_id" value="<?php echo $id; ?>" />
      <input type="submit" name="add_income" value="Add Income" />
      <input type="image" onclick="window.location.href='client-base.php';" src="../images/cancel.gif">	
    </form>
	<?php
		}
		
		
		elseif($_GET['edit'] == 'exp') {
		
				if($_POST['add_expenses'] == 'Add Expenses') {
			
			if($_POST['prospect_id_expenses'] != '') {
			
				mysql_query("INSERT INTO `prospects_expence` (`prospect_id` ,`category` ,`detail` ,`amount` ,`frequency`)VALUES ('".$_POST['prospect_id_expenses']."', '".$_POST['category']."',  '".$_POST['detail']."',  '".$_POST['amount']."',  '".$_POST['frequency']."')");
				
				header('Location:?id='.$_POST['prospect_id_expenses'].'&edit=exp');
			}
	?>
    		<form action="" method="post">
                 <table class="sn_table">
                    <tr>
                        <th colspan="2">Add Expenses</th>
                    </tr>
                    <tr>
                        <td>Category</td><td><input type="text" name="category" /></td>
                    </tr>
                    <tr>
                        <td>Detail</td><td><input type="text" name="detail" /></td>
                    </tr>
                    <tr>
                        <td>Amount</td><td><input type="text" name="amount" /></td>
                    </tr>
                    <tr>
                        <td>Frequency</td><td><input type="text" name="frequency" /></td>
                    </tr>
                    <tr>
                        <td colspan="2"><input type="hidden" name="prospect_id_expenses" value="<?php echo $_POST['prospect_id']; ?>" />
      					<input type="submit" name="add_expenses" value="Add Expenses" /></td>
                    </tr>
                </table>
    		</form>
    <?php
		}
	?>
    
    <table class="sn_table_data">
    	<tr>
        	<td colspan="6">
            	<select onchange="window.location.href=this.options[this.selectedIndex].value">
                	<option>Income and Experience</option>
                	<option value="?id=<?php echo $id; ?>&edit=bi">Basic Information</option>
                	<option value="?id=<?php echo $id; ?>&edit=al">Assets and Liabilities</option>
                </select><br /><br /><br />
            	<select onchange="window.location.href=this.options[this.selectedIndex].value">
                	<option value="client-base.php">Expenses</option>
                	<option value="?id=<?php echo $id; ?>&edit=ie">Income</option>
                </select><br /><br /><br />
            </td>
        </tr>
    	<tr>
        	<th>Category</th>
            <th>Detail</th>
            <th>Amount</th>
            <th>Frequency</th>
        </tr>
    	<?php
			 if($id == '')
			 	$id = $_POST['prospect_id'];
				
				 $prospectsassets = mysql_query("SELECT * FROM  `prospects_expence` where prospect_id=".$id);
				 
				while($prospectsassets_value = mysql_fetch_array($prospectsassets))
				{
		?>
                    <tr>
                        <td><?php echo $prospectsassets_value['category']; ?></td>
                        <td><?php echo $prospectsassets_value['detail']; ?></td>
                        <td><?php echo $prospectsassets_value['amount']; ?></td>
                        <td><?php echo $prospectsassets_value['frequency']; ?></td>
                    </tr>
		<?php
        		}
        ?>
    </table>    
    <form action="" method="post">
      <input type="hidden" name="prospect_id" value="<?php echo $id; ?>" />
      <input type="submit" name="add_expenses" value="Add Expenses" />
      <input type="image" onclick="window.location.href='client-base.php';" src="../images/cancel.gif">	
    </form>
	<?php
		}
}


	
?>
</div>
<?php include("../../footer.php"); ?>


