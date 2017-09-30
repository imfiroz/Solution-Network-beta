<?php

include("headers.php");

include("sidebar.php");

?>

<div id="content">
<h1>Client Service History</h1>	
    <table class="sn_table_data">
    	<tr>
        	<td colspan="6">
            	<select onchange="window.location.href=this.options[this.selectedIndex].value">
                	<option value="client-base.php">Select</option>
                	<option value="?id=<?php echo $id; ?>&edit=bi">Basic Information</option>
                	<option value="?id=<?php echo $id; ?>&edit=al">Assets and Liabilities</option>
                	<option value="?id=<?php echo $id; ?>&edit=ie">Income and Experience</option>
                </select><br /><br /><br />
            </td>
        </tr>
    	<tr>
        	<th>Date</th>
            <th>Service</th>
            <th>Solutions Team Partner</th>
            <th>Status</th>
            <th>Attach.</th>
            <th>Activities</th>
        </tr>
    	<tr>
        	<td>7/1/2013</td>
        	<td>Financial Planner</td>
        	<td>John @ ABC Financial Planner</td>
        	<td>Active</td>
        	<td></td>
        	<td></td>
        	<td><?php echo fetch_prospectsresultsmeta('occupation',$_POST['id']); ?></td>
        </tr>
    </table>
</div>
<?php include("../../footer.php"); ?>


