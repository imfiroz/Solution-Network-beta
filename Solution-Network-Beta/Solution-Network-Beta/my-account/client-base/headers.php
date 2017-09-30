<?php

// replace partnership from base directory and return my-account directory
$url = str_replace("client-base", "",getcwd());

include($url."headers.php"); 

?>