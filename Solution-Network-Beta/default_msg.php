<?php
/*
Author : Raja Shaikh
Date : 21 December 2013
*/
define("UPGRADE_PAGE","<a href='".base_url()."my-account/membership-details.php'><img src='".base_url()."my-account/images/partnership_campaign/upgrade-membership.png' /><a/>");
define("P_A_I", '<a href="campaign-matches.php?edit=ai"><img src="'.base_url().'my-account/images/partnership_campaign/profile_access_invitation.jpg" alt="" /></a>');
define("P_I_A", '<a href="?edit=ai"><img src="'.base_url().'my-account/images/partnership_campaign/accept-invitation.jpg" alt="" /></a>');
define("R_S_P_V_I", '');
define("A_M_G", '');
define("PP_MA", '');
define("S_P_G_T", '');
define("G_P_A", '');
define("G_P_C_G", '');
define("U_C_D", '');
define("L_C_M_C", '');
define("R_R", '');
define("S_R_I", '');
define("M_C_A", '');
define("U_W_M", '');

//include_once($_SERVER['DOCUMENT_ROOT']."/sn/sql.php");

//check member type returns TURE || FALSE
function check_member_type($user_id, $meta_key) {
	if(fetch_usermeta("membertype", $user_id) == 'sn_member') {return true;}
	else {return false;}
}

//get partnership campaign status number 1 - 5
function get_pc_status_number($user_id, $cc_id, $c_service) {
	$num = mysql_query("select status from partnership_campaign WHERE user_id=".$user_id." AND id=".$cc_id." AND service='".$c_service."'");
	$num =  mysql_fetch_row($num);

	return $num[0];
}

function get_user_id_by_name($user_name) {
	$id = mysql_fetch_row(mysql_query("SELECT id FROM users WHERE name='".$user_name."'"));
	return $id[0];
}

function get_user_name_by_id($user_id) {
	$name = mysql_fetch_row(mysql_query("SELECT name FROM users WHERE id='".$user_id."'"));
	return $name[0];
}

function get_partnership_candidate($user_id) {
	$can_list = mysql_fetch_row(mysql_query("SELECT id FROM partnership_campaign WHERE user_id=".$user_id));
	$can_list = mysql_fetch_row(mysql_query("SELECT meta_value FROM partnership_campaignmeta WHERE pcamp_id=".$can_list[0]." AND meta_key='send_invitation'"));
	return $can_list;
}


/*
The above functions are tested and working correctly
echo "<hr/>";
echo get_pc_status_number($user_id, $_SESSION['partnership_campaign_id'], $_SESSION['partnership_service']);
echo "<hr/>";
echo (check_member_type($user_id, 'membertype') ? BTN_P_A_I:UPGRADE_PAGE);
*/
?>