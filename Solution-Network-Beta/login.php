<?php

include("headers.php");

		//IF USER JUST ACTIVATED THE ACCOUNT...
    if($_GET["email"]&&$_GET["key"]){
        //EMAIL & ACTIVATION KEY
        $email = $_GET["email"];
        $key = $_GET["key"];
        
        //CHECKS IF BOTH THE EMAIL ADDRESS & THE ACTIVATION KEY ARE VALID
        $q = mysql_query("SELECT * FROM $table WHERE email='$email' AND code='$key'");
        $r = mysql_fetch_assoc($q);
        $n = mysql_num_rows($q);
        
        if($n){
            //ACTIVATES ACCOUNT IF IT HAS NOT BEEN ALREADY
            if($r["activated"]!="true"){
                mysql_query("UPDATE $table SET activated='true' WHERE email='$email' AND code='$key'");
            }
        }
    }
		 
    echo '<div class="member_text"><h1>Log in and get to work</h1></div>
	<div class="member_login">
	<script src="my-account/js/jquery.js"></script><br>
    <script>
    $(function(){
        $("#submit").click(function(){
            var user = $("#user").val(); //USERNAME FROM FIELD
            var pass = $("#pass").val(); //PASSWORD FROM FIELD
            var data = "user="+user+"&pass="+pass; //DATA TO BE PROCESS THRU AJAX
            
            $.ajax({
                type: "POST",
                url: "process.php", //AJAX FILE
                data: data,
                 success: function(m){                        
                        window.location.href="my-account";
                }
            });
        });
    });
    </script>
		<input id="user"><br><br>
		<input id="pass" type="password"><br>
		<input id="submit" type="button" value="Login"><br>
		<a href="register.php" class="register">Register</a>
	</div>
    <span id="m"></span>';

 include("footer.php"); ?>