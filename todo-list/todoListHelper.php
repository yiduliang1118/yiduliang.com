<?php
include '../includes/configLocal.php';
include '../includes/opendb.php';

$date = ($_POST['deadline']);
$deadline = date("Y-m-d", strtotime($date));

$sql="INSERT INTO todolist(user_id, taskName, catalog1, catalog2, priority, event, deadline, done)
	VALUES
	(1,'$_POST[task]','$_POST[category1]','$_POST[category2]','$_POST[priority]', '$_POST[event]', '".$deadline."', 'N')";

if (!mysqli_query($link,$sql))
{
	die('Error: ' . mysqli_error($link));
}

$home = "home.php";
redirect($home);


function redirect($url){
    if (headers_sent()){
      die('<script type="text/javascript">window.location.href="' . $url . '";</script>');
    }else{
      header('Location: ' . $url);
      die();
    }    
}

include '../includes/closedb.php';

?>