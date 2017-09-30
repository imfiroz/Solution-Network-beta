<?php $filename = basename($_SERVER['REQUEST_URI'], '?' . $_SERVER['QUERY_STRING']); ?>
<div id="sidebar">
	<ul>
        <li class="active"><a href="my-account/personal-details.php">My Solutions Profile</a></li>
        <li class="active"><a href="<?php echo base_url(); ?>my-account/partnership/partnership-campaign.php">Partnership Campaign Manager</a></li>       
        <li class="active"><a href="<?php echo base_url(); ?>my-account/workflow-manager/current-task.php">Work Flow Manager</a></li>
        <li class="active"><a href="<?php echo base_url(); ?>my-account/client-campaign/index.php">Client Campaign Manager</a></li>
        <li class="active"><a href="<?php echo base_url(); ?>my-account/client-campaign/client-base.php">My Client Base</a></li>
        <li class="active"><a href="<?php echo base_url(); ?>my-account/network-solution-team/primary_solutions_team.php">Network Solution Team</a></li>
	</ul>
</div>








            