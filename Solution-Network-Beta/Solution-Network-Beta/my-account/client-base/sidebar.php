<?php $filename = basename($_SERVER['REQUEST_URI'], '?' . $_SERVER['QUERY_STRING']); ?>

<div id="sidebar">
 	<ul>
    	<li class="active"><a href="<?php echo base_url(); ?>my-account/client-base/client-base.php">My Client Base</a></li>
        
        	<?php if($filename == 'client-base.php' || $filename == 'client-service-history.php' || $filename == 'client-solution-team.php' || $filename == 'create-new-client.php' || $filename == 'service-opportunities.php' || $filename == 'client-base-reporting.php' || $filename == 'enter_prospects.php'){ ?>
            
                <li class="inactive"><a href="<?php echo base_url(); ?>my-account/client-base/client-base.php">Client Base</a></li>
                <?php if($filename == 'client-base.php' || $filename == 'client-service-history.php' || $filename == 'client-solution-team.php'){
			?>
                 <li <?php if($filename == 'client-base.php'){ echo 'class="active_iin"'; } ?>><a href="<?php echo base_url(); ?>my-account/client-base/client-base.php">Client Information</a></li>
                 <li <?php if($filename == 'client-solution-team.php'){ echo 'class="active_iin"'; } ?>><a href="<?php echo base_url(); ?>my-account/client-base/client-solution-team.php">Client Solution Team</a></li>
                 <li <?php if($filename == 'client-service-history.php'){ echo 'class="active_iin"'; } ?>><a href="<?php echo base_url(); ?>my-account/client-base/client-service-history.php">Client Service History</a></li>
			<?php
					}
					
				?>
                <li <?php if($filename == 'enter_prospects.php'){ echo 'class="active_in"'; } else {  echo 'class="inactive"'; } ?>><a href="<?php echo base_url(); ?>my-account/client-base/enter_prospects.php">Create New Client</a></li>
                <li <?php if($filename == 'service-opportunities.php'){ echo 'class="active_in"'; } else {  echo 'class="inactive"'; } ?>><a href="<?php echo base_url(); ?>my-account/client-base/service-opportunities.php">Service Opportunities</a></li>
                <li <?php if($filename == 'client-base-reporting.php'){ echo 'class="active_in"'; } else {  echo 'class="inactive"'; } ?>><a href="<?php echo base_url(); ?>my-account/client-base/client-base-reporting.php">Client Base Reporting</a></li>
                
            <?php } ?>            
            
        <li class="active"><a href="<?php echo base_url(); ?>my-account/personal-details.php">My Solutions Profile</a></li> 
        <li class="active"><a href="<?php echo base_url(); ?>my-account/partnership/index.php">Partnership Campaign Manager</a></li>
        <li class="active"><a href="<?php echo base_url(); ?>my-account/workflow-manager/current-task.php">Work Flow Manager</a></li>
        <li class="active"><a href="<?php echo base_url(); ?>my-account/client-campaign/index.php">Client Campaign Manager</a></li>
        <li class="active"><a href="<?php echo base_url(); ?>my-account/network-solution-team/primary_solutions_team.php">Network Solution Team</a></li>
</div>