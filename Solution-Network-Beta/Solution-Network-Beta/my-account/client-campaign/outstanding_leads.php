<?php

include("headers.php");

include("sidebar.php"); ?>

<div id="content">
     
<h3>CLIENT CAMPAIGN: Jones, Mark</h3>

<?php

if($_GET['id'] != '')
$_SESSION['prospect_id'] = $_GET['id'];

if($_GET['edit'] == '')
	{
?>
             <table class="sn_table_new">
                           <tr>
                                <td colspan="2">Needs Assessment Type: </td>
                                <td colspan="2">E-Campaign Assessment </td>
                                <td colspan="2">Assessment Date: </td>
                                <td colspan="2">1-Mar </td></tr>
                                
                           <tr>
                                <td colspan="2">Service Assessed: </td>
                                <td colspan="2">Financial Planning</td>
                                <td colspan="2">Assessment Result: </td>
                                <td>Successful</td></tr>
                                
                           <tr>
                                <td><img src="<?php echo base_url(); ?>my-account/images/client-campaing/basic-info.jpg" /></td>
                                <td><a href="?edit=al"><img src="<?php echo base_url(); ?>my-account/images/client-campaing/a&linc&exp_gray.jpg" /></a></td>
                                <td><a href="?edit=as"><img src="<?php echo base_url(); ?>my-account/images/client-campaing/assessment.jpg" /></a></td>
                                <td><a href="?edit=na"><img src="<?php echo base_url(); ?>my-account/images/client-campaing/notes-attachements_gray.jpg" /></a></td>
                          </tr>
               </table>
               
               <?php $prospects = mysql_fetch_array(mysql_query("SELECT * FROM  `prospects` where id='".$_GET['id']."'")); ?>
               <table class="sn_table_new">
                            <tr>
                                <td><b>BASIC INFO</b></td></tr>
                            
                            <tr>
                                <td><b>First Name: </b><?php echo $prospects['first_name']; ?></td>
                                <td><b>Surname:  </b><?php echo $prospects['last_name']; ?></td></tr>
                            
                            <tr>
                                <td><b>Date of Birth: </b></td></tr>
                            
                            <tr>
                                <td><b>Location:	</b>(suburb p/c only)</td></tr>
                            
                            <tr>
                                <td><b>Working Status: </b>Working</td>
                                <td><b>Employment Type: </b></td></tr>
                            
                            <tr>
                                <td><b>Occupation Type: </b>White Collar</td></tr>
                           
                    </table>

                      <?php
                        if($_POST['accept_lead'] == 'Accept Lead') {
	 
                            $client_id = mysql_fetch_array(mysql_query("SELECT * FROM `client_campaign` where id =".$_SESSION['client_campaign_id']));
                            mysql_query("UPDATE `prospects_results` SET `status` =  '6' where prospect_id = ".$_POST['prospect_id']." and ccamp_id = ".$_SESSION['client_campaign_id']);
                            header("location:leads.php");
                       }
                      
                      ?>
                       
                       <form action="" method="POST">                           
                           <input type="image" onclick="" src="../images/back.jpg" />
                           <input type="image" onClick="" src="../images/decline.jpg" />
                           <input type="hidden" name="prospect_id" value="<?php echo $_GET['id']; ?>" />
                           <input type="submit" name="accept_lead" value="Accept Lead" />
                       </form>
<?php } ?>

<?php 
if($_GET['edit'] == 'al'){
 ?>    
		 <table class="sn_table_new">
               
               <tr>
                    <td colspan="2">Needs Assessment Type: </td>
                    <td colspan="2">E-Campaign Assessment</td>
                    <td colspan="2">Assessment Date: </td>
                    <td colspan="2">1-Mar </td></tr>
                                
                <tr>
                    <td colspan="2">Service Assessed: </td>
                    <td colspan="2">Financial Planning</td>
                    <td colspan="2">Assessment Result: </td>
                    <td>Successful</td></tr>
               <tr>
               		<td><a href="outstanding_leads.php?edit=ba"><img src="../images/client-campaing/basic-info_gray.jpg" /></a></td>
                 	<td><img src="../images/client-campaing/a&l-inc&exp.jpg" /></td>
                 	<td><a href="outstanding_leads.php?edit=as"><img src="../images/client-campaing/assessment_gray.jpg" /></a></td>
                 	<td><a href="outstanding_leads.php?edit=na"><img src="../images/client-campaing/notes-attachements_gray.jpg" /></a></td></tr>
           </table> 
		   <?php
           //echo "SELECT * FROM  `prospects_assets` where prospect_id='".$prospects."'"; exit;
		   $prospects_assets = mysql_fetch_array(mysql_query("SELECT * FROM  `prospects_assets` where prospect_id=".$_SESSION['prospect_id'])); ?>
           <table class="sn_table_new">
               <tr>
                    <td><b>Assets: </b></td></tr>
                            
               <tr>
                    <td><b>Asset Type: </b><?php echo $prospects_assets['asset_type']; ?></td>
                    <td><b>Detail: </b><?php echo $prospects_assets['detail']; ?></td>
                    <td><b>Asset Value: </b>s<?php echo $prospects_assets['asset_value']; ?></td></tr>
           </table>
            
          
		  <?php $prospects_liabilities = mysql_fetch_array(mysql_query("SELECT * FROM  `prospects_liabilities` where prospect_id=".$_SESSION['prospect_id'])); ?>   		  			
          <table class="sn_table_new">
               <tr>
                    <td><b>Liabilities: </b></td></tr>
                            
               <tr>
                    <td><b>Liability Type: </b><?php echo $prospects_liabilities['liability_type']; ?></td>
                    <td><b>Detail: </b><?php echo $prospects_liabilities['detail']; ?></td>
                    <td><b>Liability Balance: </b><?php echo $prospects_liabilities['liabilities_balance']; ?></td></tr>
             </table>
           
          <?php $prospects_income = mysql_fetch_array(mysql_query("SELECT * FROM  `prospects_income` where prospect_id=".$_SESSION['prospect_id'])); ?>  
          <table class="sn_table_new">           
               <tr>
                    <td><b>Income:</b></td></tr>
               
               <tr>
                    <td><b>Category: </b></td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td><b>Detail: </b><?php echo $prospects_income['detail']; ?></td>
                    <td><b>Amount: </b><?php echo $prospects_income['amount']; ?></td>
                    <td><b>Frequency: </b><?php echo $prospects_income['frequency']; ?></td></tr>
           </table>
           
           <?php $prospects_expence = mysql_fetch_array(mysql_query("SELECT * FROM  `prospects_expence` where prospect_id=".$_SESSION['prospect_id'])); ?>     
           <table class="sn_table_new">            
               <tr>
                    <td><b>Expenses: </b></td></tr>
               <tr>
                    <td><b>Category: </b><?php echo $prospects_expence['category']; ?></td>
                    <td><b>Detail: </b><?php echo $prospects_expence['detail']; ?></td>
                    <td><b>Amount: </b><?php echo $prospects_expence['amount']; ?></td>
                    <td><b>Frequency: </b><?php echo $prospects_expence['frequency']; ?></td></tr>
          </table>
          
          <?php
                        if($_POST['accept_lead'] == 'Accept Lead') {
	 
                            $client_id = mysql_fetch_array(mysql_query("SELECT * FROM `client_campaign` where id =".$_SESSION['client_campaign_id']));
                            mysql_query("UPDATE `prospects_results` SET `status` =  '6' where prospect_id = ".$_POST['prospect_id']." and ccamp_id = ".$_SESSION['client_campaign_id']);
                            header("location:leads.php");
                       }
                      
                      ?>

<?php } ?>  

<?php
if($_GET['edit'] == 'as')
	{
?>
          <table class="sn_table_new">
                        <tr>
                            <td colspan="2">Needs Assessment Type: </td>
                            <td colspan="2">E-Campaign Assessment </td>
                            <td colspan="2">Assessment Date: </td>
                            <td colspan="2">1-Mar </td></tr>
                                        
                        <tr>
                            <td colspan="2">Service Assessed: </td>
                            <td colspan="2">Financial Planning</td>
                            <td colspan="2">Assessment Result: </td>
                            <td>Successful</td></tr>
                       <tr>
                            <td><a href="?edit=ba"><img src="../images/client-campaing/basic-info_gray.jpg"></a></td>
                            <td><a href="?edit=al"><img src="../images/client-campaing/a&linc&exp_gray.jpg"></td>
                            <td><img src="../images/client-campaing/assessment_blue.jpg"></a></td>
                            <td><a href="?edit=na"><img src="../images/client-campaing/notes-attachements_gray.jpg"></a></td></tr>
                        
                        <tr>
                            <td><b>CATEGORY: </b></td>
                            <td>Confidence in Current Professional Advice </td></tr>
            </table>
            
            <table class="sn_table_new">            
                       <tr>
                            <td>Please provide a 1 - 10 score in accordance with your confidence in each of the below areas (10 = Absolutely Confidence, 0 = No Confidence at all)</td></tr>
                                    
             </table>
             
             <table class="sn_table_new">          
                       <tr>
                            <td>1</td>
                            <td>The current Wealth Professional's Investment strategy has included a detailed analysis of my lifestyle & financial goals both long & short term and has been presented as being relevent to my retirement time frames, debt reduction requirements & future lifestyle income & expense goals.</td></tr>
                                    
                       <tr>
                            <td>ANS:</td>
                            <td>4</td></tr>
                 </table>
                 
                 <?php
                        if($_POST['accept_lead'] == 'Accept Lead') {
	 
                            $client_id = mysql_fetch_array(mysql_query("SELECT * FROM `client_campaign` where id =".$_SESSION['client_campaign_id']));
                            mysql_query("UPDATE `prospects_results` SET `status` =  '2' where prospect_id = ".$_POST['prospect_id']." and ccamp_id = ".$_SESSION['client_campaign_id']);
                            header("location:leads.php");
                       }
                      
                      ?>
                   
                   <input type="image" onclick="" src="../images/back.jpg" />
                   <input type="image" onClick="" src="../images/decline.jpg" />
                   <input type="image" onClick="" src="../images/accept_lead.jpg" />

<?php }
 ?>  


<?php
if($_GET['edit'] == 'na')
	{
?> 
		<table class="sn_table_new">
           		<tr>
                    <td colspan="2">Needs Assessment Type: </td>
                    <td colspan="2">E-Campaign Assessment </td>
                    <td colspan="2">Assessment Date: </td>
                    <td colspan="2">1-Mar </td></tr>
                                
                <tr>
                    <td colspan="2">Service Assessed: </td>
                    <td colspan="2">Financial Planning</td>
                    <td colspan="2">Assessment Result: </td>
                    <td>Successful</td></tr>
               <tr>
               		<td><a href="?edit=ba"><img src="../images/client-campaing/basic-info_gray.jpg"></a></td>
                 	<td><a href="?edit=al"><img src="../images/client-campaing/a&linc&exp_gray.jpg"></td>
                 	<td><a href="?edit=as"><img src="../images/client-campaing/assessment_gray.jpg"></a></td>
                 	<td><img src="../images/client-campaing/notes-attachements_blue.jpg"></a></td></tr>
               </table>
               
               <table class="sn_table_new">
               <tr>
               		<td><b>Service Provider Notes: </b></td></tr>
         </table>
         
         <table class="sn_table_new">
               <tr>
               		<td><b>Attachements</b></td></tr>
               
               <tr>
               		<td>1: </td>
                    <td>Client Assets & Liabilities details.pdf</td></tr>
                    
               <tr>
               		<td>2: </td>
                    <td>Client Accounting Report.pdf</td></tr>
         </table>
         
         <?php
                        if($_POST['accept_lead'] == 'Accept Lead') {
	 
                            $client_id = mysql_fetch_array(mysql_query("SELECT * FROM `client_campaign` where id =".$_SESSION['client_campaign_id']));
                            mysql_query("UPDATE `prospects_results` SET `status` =  '2' where prospect_id = ".$_POST['prospect_id']." and ccamp_id = ".$_SESSION['client_campaign_id']);
                            header("location:leads.php");
                       }
                      
                      ?>
               <input type="image" onclick="" src="../images/back.jpg" />
                 <input type="image" onClick="" src="../images/decline.jpg" />
                 <input type="image" onClick="" src="../images/accept_lead.jpg" />

<?php }
 ?>             
       
</div>

<?php include("../../footer.php"); ?>