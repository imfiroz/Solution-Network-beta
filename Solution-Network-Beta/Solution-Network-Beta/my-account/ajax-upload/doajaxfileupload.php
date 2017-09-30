<?php

include("../../sql.php");


if (file_exists("temp/" . $_FILES["myfile"]["name"]) && $_FILES["myfile"]["tmp_name"] != '') {
    echo $_FILES["myfile"]["name"] . " already exists1. ";
}
elseif($_FILES["myfile"]["tmp_name"] != '') {
    move_uploaded_file($_FILES["myfile"]["tmp_name"],
    "temp/" . $_FILES["myfile"]["name"]);
	update_usermeta('corporate_head_shot_photo', $user_id, $_FILES["myfile"]["name"]);
    echo "Please check: " . "temp/" . $_FILES["myfile"]["name"];
}


if (file_exists("temp/" . $_FILES["businesslogo"]["name"]) && $_FILES["businesslogo"]["tmp_name"] != '') {
    echo $_FILES["businesslogo"]["name"] . " already exists2. ";
}
elseif($_FILES["businesslogo"]["tmp_name"] != '') {
    move_uploaded_file($_FILES["businesslogo"]["tmp_name"],
    "temp/" . $_FILES["businesslogo"]["name"]);
	update_usermeta('businesslogo', $user_id, $_FILES["businesslogo"]["name"]);
    echo "Please check: " . "temp/" . $_FILES["businesslogo"]["name"];
}

if (file_exists("temp/" . $_FILES["business_cardcopy"]["name"]) && $_FILES["business_cardcopy"]["tmp_name"] != '') {
    echo $_FILES["business_cardcopy"]["name"] . " already exists3. ";
}
elseif($_FILES["business_cardcopy"]["tmp_name"] != '') {
    move_uploaded_file($_FILES["business_cardcopy"]["tmp_name"],
    "temp/" . $_FILES["business_cardcopy"]["name"]);
	update_usermeta('business_cardcopy', $user_id, $_FILES["business_cardcopy"]["name"]);
    echo "Please check: " . "temp/" . $_FILES["business_cardcopy"]["name"];
}
?>