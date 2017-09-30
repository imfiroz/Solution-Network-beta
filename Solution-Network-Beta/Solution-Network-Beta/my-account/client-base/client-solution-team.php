<?php

include("headers.php");

include("sidebar.php");

?>

<div id="content">

	<h1>Client Solution Team</h1>
	<table class="sn_table">
          <tr>
            <td height="300" style="vertical-align:top;"><img src="../images/client-campaing/PRIMARY-TEAM-SERVICES.jpg"/>
            
            </td>
            <td height="300" style="vertical-align:top;"><img src="../images/client-campaing/SECONDARY-TEAM-SERVICES.jpg"/>
            
            </td>
          </tr>
          <tr>
            <td height="300" style="vertical-align:top;"><img src="../images/client-campaing/EXTERNAL-TEAM-SERVICES.jpg" />
            
            </td>
            <td height="300" style="vertical-align:top;"><img src="../images/client-campaing/AVAILABLE-SERVICE-OPPORTUNITIES.jpg"/>
            
            </td>
          </tr>
    </table>
        
        
        
        
        
        
        
       <!-- <table width="100%">
          <tr>
            <td><h2>Please select your desired Solutions partnership:</h2>
            
            <?php //
            
            ## Display services which are available for partnership , which are not available for partnership ##
               // $array_services = array('Accountant','Book-keeper','Financial Planner','General Insurance Broker','Solicitor','Mortgage Broker','Property Management','Property Consulting','Real Estate Agent','Property Valuer');
                
                //$partnership_services = mysql_query("SELECT pc.service, um.meta_value FROM partnership_campaign pc, usermeta um  WHERE um.meta_key = 'services' and pc.user_id='$user_id' and um.user_id='$user_id'");
                
              //  echo "<h3>Already have partnership using below services</h3>";
                
             //   while($p_services_value = mysql_fetch_array($partnership_services)) {
                
                //    echo $p_services_value['service'].'<br>';
                    
                  //  if(($key = array_search($p_services_value['service'], $array_services)) !== false) {
                   //     unset($array_services[$key]);
                  //  }
                    
                    //service for host user
                 //   $service = $p_services_value['meta_value'];
                    
                //    if(($key = array_search($p_services_value['meta_value'], $array_services)) !== false) {
                //        unset($array_services[$key]);
                //    }	
              //  }
                
            //    $array_services = array_values($array_services);
                
             //   $pos = array_search(fetch_usermeta('services',$user_id), $array_services);
                
            //    unset($array_services[$pos]);
             //   
                //display all available services for partnership
             //   echo "<h3>Available services for partnership</h3>";
             //   for($i=0;$i<=count($array_services);$i++)
             //   {
             //       echo $array_services[$i].'<br>';
            //    }
            ##End:  Display services which are available for partnership , which are not available for partnership ##
       //     ?>
            </td>
          </tr>
        </table>-->
</div>
<?php include("../../footer.php"); ?>


