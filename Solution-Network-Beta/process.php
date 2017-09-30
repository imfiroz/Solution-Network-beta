<?php

include("headers.php");
$postuser = $_POST["user"];
$pass = $_POST["pass"];

echo "<div id='sidebar'></div><div id='content'>";

if(!$user){
    if($postuser&&$pass){
        //CHECKS IF USERNAME AND PASSWORD MATCH IN THE DATABASE
        $q = mysql_query("SELECT * FROM $table WHERE username='$postuser'");
        $r = mysql_fetch_assoc($q);
        $n = mysql_num_rows($q);
        
        if($r["username"]){
            if($r["password"]==$pass){
                //CHECKS IF THE ACCOUNT IS ACTIVATED
                if($r["activated"]=='true'){
                    $_SESSION["user"] = $postuser;
                    session_write_close();              
					header('Location: my-account');
                } else {
                	header("location:".base_url()."?error=a");
                }
            } else {
                header("location:".base_url()."?error=p");
            }
        } else {
            header("location:".base_url()."?error=u");
        }
    } else {
        header("location:".base_url()."?error=b");
    }
} else {
    header("location:".base_url()."my-account");
}

echo "</div>";

include("footer.php");

?>