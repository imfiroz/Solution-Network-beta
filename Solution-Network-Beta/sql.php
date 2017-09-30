<?php ob_start();

//STARTS THE SESSION
session_start();
$user = $_SESSION["user"];

//var_dump($_SESSION);
//CONNECTS TO DATABASE (MODIFY TO YOUR SETTINGS)
//$c = mysql_connect("166.62.8.87", "obcd", "Newpass23!");
$c = mysql_connect("localhost", "root", "");
$db = mysql_select_db("obcd", $c);
$table = "users";
$usermeta_table = 'usermeta';


function base_url() {
	return "http://localhost/solution-network/";
	//return "http://localhost/sn/";
}


//FETCH USER ID
$user_values = mysql_fetch_array(mysql_query("SELECT * FROM $table WHERE username='$user'"));
$user_id = $user_values['id'];
global $user_id;

//for campaing-matches.php ,  page
if($_SESSION['matchedresult_client_id'] != '' || $_SESSION['inviter_client_id'] != '') {
	
	if($_SESSION['matchedresult_client_id'] != '')
	$user_session_id = $_SESSION['matchedresult_client_id'];
	else
	$user_session_id = $_SESSION['inviter_client_id'];
	
	
	$user_v = mysql_fetch_array(mysql_query("SELECT * FROM $table WHERE id=".$user_session_id));
}


function update_user($field, $value, $user_id){
	mysql_real_escape_string(mysql_query("UPDATE `users` SET `$field` = '$value' WHERE `id` =$user_id;"));
}

function fetch_user_name($user_id){	
        $user_values = mysql_fetch_array(mysql_query("SELECT * FROM users WHERE id='$user_id'"));
        return $user_values['name'];   
}
## usermeta fetch and check functions ##

//FETCH usermeta for perticular user
function select_usermeta($meta_key, $user_id){
	
   $usermeta_table = 'usermeta';
   //echo "SELECT meta_value FROM $usermeta_table WHERE meta_key = '$meta_key' and user_id='$user_id'";
   
   $usermeta_values = mysql_fetch_array(mysql_query("SELECT meta_value FROM usermeta WHERE meta_key = '$meta_key' and user_id='$user_id'"));
   
   return $usermeta_values['meta_value'];
}
//FETCH usermeta for  user
function fetch_match_details($meta_key, $user_id,$client_id){
	
   $usermeta_table = 'usermeta';
   
   $host_values = mysql_fetch_array(mysql_query("SELECT * FROM $usermeta_table WHERE meta_key = '$meta_key' and user_id='$user_id'")  );
   $client_values = mysql_fetch_array(mysql_query("SELECT * FROM $usermeta_table WHERE meta_key = '$meta_key' and user_id='$client_id'")  );
   
   if($host_values['meta_value'] == $client_values['meta_value']){
		return 'Successful Match';
   }
   else {
		return 'Not Match';
   }
}

//FETCH usermeta to check rows
function check_usermeta($meta_key, $user_id){
	
   $usermeta_table = 'usermeta';
   
   $usermeta_values = mysql_num_rows(mysql_query("SELECT meta_value FROM $usermeta_table WHERE meta_key = '$meta_key' and user_id='$user_id'"));
   
   return $usermeta_values;
}


//FETCH usermeta to check rows
function fetch_usermeta($meta_key, $user_id){
	
   $usermeta_table = 'usermeta';
   
   $usermeta_values = mysql_fetch_array(mysql_query("SELECT meta_value FROM $usermeta_table WHERE meta_key = '$meta_key' and user_id='$user_id'"));
   
   return $usermeta_values['meta_value'];
}


//Update usermeta
function update_usermeta($meta_key, $user_id, $meta_value){
	
   $usermeta_table = 'usermeta';
   if(check_usermeta($meta_key, $user_id) == 0 )
		mysql_real_escape_string(mysql_query("INSERT INTO $usermeta_table VALUES('', '$user_id', '$meta_key', '$meta_value')"));
			
   if(check_usermeta($meta_key, $user_id) > 0)				
		mysql_real_escape_string(mysql_query("UPDATE $usermeta_table SET `meta_value` = '$meta_value' WHERE meta_key = '$meta_key' and `user_id` =$user_id"));
		
}
## End: usermeta fetch and check functions ##


## partnership campaign fetch and check functions ##

//Update campaign	
		
function insert_partnershipcampaign($user_id, $meta_value,$client_campaign_id){
	
	$partnershipcampaign_table = 'partnership_campaign';
	
  	mysql_real_escape_string(mysql_query("INSERT INTO $partnershipcampaign_table (`user_id` ,`service`, `client_campaign_id`, `status`, `launch_date`) VALUES('$user_id', '$meta_value', '$client_campaign_id', '0', NOW())"));
	
	$_SESSION["partnership_campaign_id"] = mysql_insert_id();
	
	return $pcamp_id;
		
}


if($_SESSION['partnership_campaign_id'] != '') {
	$table = "partnership_campaign";
	$partnership_campaign = mysql_fetch_array(mysql_query("SELECT * FROM $table WHERE user_id = '$user_id' and id=".$_SESSION['partnership_campaign_id']));
}

//check campaign meta to check rows
function check_campaignmeta($meta_key, $pcamp_id){
	
   $partnership_campaignmeta_table = 'partnership_campaignmeta';
   
   $campaignmeta_values = mysql_num_rows(mysql_query("SELECT meta_value FROM $partnership_campaignmeta_table WHERE meta_key = '$meta_key' and pcamp_id='$pcamp_id'"));
   
   return $campaignmeta_values;
}


//fetch campaign meta to check rows
function fecth_campaignmeta($meta_key, $pcamp_id){
	
   $partnership_campaignmeta_table = 'partnership_campaignmeta';
   
   $campaignmeta_values = mysql_fetch_array(mysql_query("SELECT meta_value FROM $partnership_campaignmeta_table WHERE meta_key = '$meta_key' and pcamp_id='$pcamp_id'"));
   
   return $campaignmeta_values['meta_value'];
}

//Update campaign meta
function insert_campaignmeta($meta_key, $meta_value){
	
   $partnership_campaignmeta = 'partnership_campaignmeta';
	
	$pcamp_id = $_SESSION["partnership_campaign_id"];
	
   if(check_campaignmeta($meta_key, $pcamp_id) == 0 )
		mysql_real_escape_string(mysql_query("INSERT INTO $partnership_campaignmeta VALUES('', '$pcamp_id', '$meta_key', '$meta_value')"));
			
   if(check_campaignmeta($meta_key, $pcamp_id) > 0)				
		mysql_real_escape_string(mysql_query("UPDATE $partnership_campaignmeta SET `meta_value` = '$meta_value' WHERE meta_key = '$meta_key' and `pcamp_id` =$pcamp_id"));
		
}
## End : partnership campaign fetch and check functions ##



## meet and greet fetch and check functions ##
//check campaign meta to check rows
function check_meet_and_greet($user_id, $pcamp_id){
	
   $meet_and_greet_table = 'meet_and_greet';
   
   $meet_and_greet_values = mysql_num_rows(mysql_query("SELECT * FROM  $meet_and_greet_table where user_id= '$user_id' and pcamp_id = '$pcamp_id'"));
  
   
   return $meet_and_greet_values;
}


function check_meetandgreetmeta($meetandgreet_id){
	
   $meet_and_greet_meta_table = 'meet_and_greet_meta';
   
   $meet_and_greet_values = mysql_num_rows(mysql_query("SELECT * FROM  $meet_and_greet_meta_table where meetandgreet_id = '$meetandgreet_id'"));  
   
   return $meet_and_greet_values;
}


function insert_meetandgreetmeta($meta_key, $meta_value){
	
   $meet_and_greet_meta_table = 'meet_and_greet_meta';
		
   $meetandgreet_id = $_SESSION['meetandgreet_id'];
		
		mysql_query("INSERT INTO $meet_and_greet_meta_table (`meetandgreet_id`, `meta_key`, `meta_value`) VALUES
(".$meetandgreet_id.", '$meta_key', '$meta_value')");
		
}

function fetch_meet_and_greet_meta($meta_key, $meetandgreet_id){
	
   $meet_and_greet_meta_table = 'meet_and_greet_meta';
   
   $meet_and_greet_meta_values = mysql_fetch_array(mysql_query("SELECT meta_value FROM $meet_and_greet_meta_table WHERE meta_key = '$meta_key' and meetandgreet_id='$meetandgreet_id'"));
   
   return $meet_and_greet_meta_values['meta_value'];
}


//fetch campaign meta to check rows
function fecth_partnerhsiptask($user_id, $pcamp_id){
	
   $partnership_task_table = 'partnership_task';
   
   $campaignmeta_values = mysql_fetch_array(mysql_query("SELECT * from $partnership_task_table WHERE user_id = '$user_id' and pcamp_id='$pcamp_id'"));
   
   return $campaignmeta_values['meta_value'];
}


## End: meet and greet fetch and check functions ##




## Client campaign functiona functions ##



function update_clientcampaign($id, $field, $value){
	
	$clientcampaign_table = 'client_campaign';
	
  	mysql_real_escape_string(mysql_query("UPDATE $clientcampaign_table SET $field =  '$value' WHERE `id` = $id;"));	
	
	return $pcamp_id;
		
}



function check_client_campaign_meta($meta_key, $user_id) {  
 
	$client_campaign_values = mysql_num_rows(mysql_query("SELECT * FROM  client_campaign_meta where  `meta_key` ='$meta_key' and user_id = '$user_id'"));  
	
	return $client_campaign_values;
}
		
function update_client_campaign_meta($meta_key,$meta_value,$user_id) {
		
   if(check_client_campaign_meta($meta_key, $user_id) == 0 ) {
		mysql_query("INSERT INTO `client_campaign_meta` (`user_id` ,`meta_key` ,`meta_value`) VALUES ('$user_id',  '$meta_key',  '$meta_value')");
	}else {
		mysql_real_escape_string(mysql_query("UPDATE `client_campaign_meta` SET  `meta_value` =  '$meta_value' WHERE  `meta_key` ='$meta_key' and user_id = '$user_id'"));	
	}
		
}


function fetch_client_campaign_meta($meta_key,$user_id) {  
 
	$client_campaign_values = mysql_fetch_array(mysql_query("SELECT * FROM  client_campaign_meta where  `meta_key` ='$meta_key' and user_id = '$user_id'"));
	return $client_campaign_values['meta_value'];
}


/** update_meetingmeta **/

function fetch_meetingmeta($meta_key,$meeting_id) {
	
	$meetingmeta_values = mysql_fetch_array(mysql_query("SELECT * FROM  meeting_meta where  `meta_key` ='$meta_key' and meeting_id = '$meeting_id'")); 
	
	return $meetingmeta_values['meta_value'];
}


function check_meetingmeta($meta_key,$meta_value) {
	
	$meeting_id = $_SESSION['meeting_id'];
	$meetingmeta_values = mysql_num_rows(mysql_query("SELECT * FROM  meeting_meta where  `meta_key` ='$meta_key' and meeting_id = '$meeting_id'")); 
	
	return $meetingmeta_values;
}

		
function update_meetingmeta($meta_key,$meta_value) {

	$meeting_id = $_SESSION['meeting_id'];
		
   if(check_meetingmeta($meta_key,$meta_value) == 0 )
		mysql_query("INSERT INTO `meeting_meta` (`meeting_id` ,`meta_key` ,`meta_value`) VALUES ('$meeting_id',  '$meta_key',  '$meta_value')");

			
   if(check_meetingmeta($meta_key,$meta_value) > 0)				
		mysql_real_escape_string(mysql_query("UPDATE `meeting_meta` SET  `meta_value` =  '$meta_value' WHERE  `meta_key` ='$meta_key' and meeting_id = '$meeting_id'"));	
}


function fetch_prospectsresultsmeta($meta_key,$presult_id) {
	
	$prospectsresultsmeta_values = mysql_fetch_array(mysql_query("SELECT * FROM  prospects_results_meta where `meta_key` ='$meta_key' and presult_id = '$presult_id'")); 
	
	return $prospectsresultsmeta_values['meta_value'];
}

 
 
 
function check_prospectsresultsmeta($meta_key,$presult_id) {
	
	$prospectsresultsmeta_values = mysql_num_rows(mysql_query("SELECT * FROM  prospects_results_meta where `meta_key` ='$meta_key' and presult_id = '$presult_id'")); 
	
	return $prospectsresultsmeta_values;
}


 function update_prospectsresultsmeta($meta_key,$meta_value,$presult_id) {
		
   if(check_prospectsresultsmeta($meta_key,$presult_id) == 0 )
		mysql_query("INSERT INTO `prospects_results_meta` (`presult_id` ,`meta_key` ,`meta_value`) VALUES ('$presult_id',  '$meta_key',  '$meta_value')");

			
   if(check_prospectsresultsmeta($meta_key,$presult_id) > 0)				
		mysql_real_escape_string(mysql_query("UPDATE `prospects_results_meta` SET  `meta_value` =  '$meta_value' WHERE  `meta_key` ='$meta_key' and presult_id = '$presult_id'"));	
		
}

function get_username ($user_id) {
	$name = mysql_fetch_row(mysql_query("SELECT name FROM users WHERE id=".$user_id));
	return $name[0];
}
include('default_msg.php');





//FETCH external partners meta for perticular user
function select_external_partners_meta($meta_key,$external_partner_id){

	
   $external_partners_meta_table = 'external_partners_meta';
   
   //echo "SELECT meta_value FROM $external_partners_meta_table WHERE meta_key = '$meta_key' and external_partner_id='$external_partner_id'";
   //exit;
   
   $external_partners_meta_values = mysql_fetch_array(mysql_query("SELECT meta_value FROM $external_partners_meta_table WHERE meta_key = '$meta_key' and external_partner_id='$external_partner_id'"));
   
   return $external_partners_meta_values['meta_value'];
}

//FETCH external partners for perticular user
function select_external_partners($value,$external_partner_id){
	
   $external_partners_table = 'external_partners';
   
   $external_partners_values = mysql_fetch_row(mysql_query("SELECT $value FROM $external_partners_table WHERE user_id='$external_partner_id'"));
   
   return ($external_partners_values[0]);
}
//FETCH EXTERNAL PARTNER META to check rows
function check_external_partners_meta($meta_key, $external_partner_id){
	
   $external_partners_meta_table = 'external_partners_meta';
   
   $external_partners_meta_values = mysql_num_rows(mysql_query("SELECT meta_value FROM $external_partners_meta_table WHERE meta_key = '$meta_key' and external_partner_id='$external_partner_id'"));
   
   return $external_partners_meta_values;
}

//Update external partners meta
function update_external_partners_meta($meta_key, $external_partner_id, $meta_value){

  $external_partners_meta_table = 'external_partners_meta';
   if(check_external_partners_meta($meta_key, $external_partner_id) == 0 )
		mysql_real_escape_string(mysql_query("INSERT INTO $external_partners_meta_table VALUES('', '$external_partner_id', '$meta_key', '$meta_value')"));
			
   if(check_external_partners_meta($meta_key, $external_partner_id) > 0)				
		mysql_real_escape_string(mysql_query("UPDATE $external_partners_meta_table SET `meta_value` = '$meta_value' WHERE meta_key = '$meta_key' and `external_partner_id` =$external_partner_id"));
		
}
## End: usermeta fetch and check functions ##

//FETCH PARTNERSHIP RELATION ID 
function fetch_partnership_relation($rowname, $rowvalue){
	
   $fetch_partnership_relation_table = 'partnership_relation';
  // echo "SELECT * FROM $fetch_partnership_relation_table WHERE $rowname = '$rowvalue' "; exit;
   $partnership_relation_values = mysql_fetch_array(mysql_query("SELECT * FROM $fetch_partnership_relation_table WHERE $rowname = '$rowvalue' "));
   
   return $partnership_relation_values;
}
//SET MEETING HISTORY 	MEETING TRANSAACTION 	meeting_transaction

function set_meeting_history($meeting_transaction, $meeting_id) {
	$table = "meeting_history";
	
	mysql_query("INSERT INTO $table VALUES(NULL,$meeting_id,NOW(),'".$meeting_transaction."')") ;
		
}
## End:PARTNERSHIP RELATION
?>



