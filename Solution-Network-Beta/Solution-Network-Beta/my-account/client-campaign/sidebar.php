<?php $filename = basename($_SERVER['REQUEST_URI'], '?' . $_SERVER['QUERY_STRING']); ?>

<div id="sidebar">
 	<ul>
    	<li class="active"><a href="<?php echo base_url(); ?>my-account/client-campaign/index.php">Client Campaign Manager</a></li>
        
                 <li <?php if($filename == 'index.php'){ echo 'class="active_iin"'; } ?>><a href="<?php echo base_url(); ?>my-account/client-campaign/index.php">Client Campaign</a></li>
                 <li <?php if($filename == 'launch-new-campaign.php'){ echo 'class="active_iin"'; } ?>><a href="<?php echo base_url(); ?>my-account/client-campaign/campaign_basic_detail.php">Launch New Campaign</a></li>
                 
        <li class="active"><a href="<?php echo base_url(); ?>my-account/personal-details.php">My Solutions Profile</a></li> 
        <li class="active"><a href="<?php echo base_url(); ?>my-account/partnership/index.php">Partnership Campaign Manager</a></li>
        <li class="active"><a href="<?php echo base_url(); ?>my-account/workflow-manager/current-task.php">Work Flow Manager</a></li>
        <li class="active"><a href="<?php echo base_url(); ?>my-account/client-base/client-base.php">My Client Base</a></li>
        <li class="active"><a href="<?php echo base_url(); ?>my-account/network-solution-team/primary_solutions_team.php">Network Solution Team</a>		</li>
    </ul>
</div>