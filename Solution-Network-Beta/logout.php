<?php

include("headers.php");

//IF USER IS STILL LOGGED IN
if($user){
    //LOGS USER OUT THE OLD-FASHIONED WAY AND GOES TO THE LOGIN PAGE
    session_unset();
    session_destroy();
    header("Location: ".base_url()."index.php");
}
else //IF USER IS NOT LOGGED IN THE FIRST PLACE
{
    echo '<div id="sidebar"></div><div id="content">Error logging out. <a href="index.php">Back to demo</a></div>';
}
include("footer.php");

?>