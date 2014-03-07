<?php
include '../includes/configLocal.php';
include '../includes/opendb.php';

$sql="INSERT INTO url (url, name, category1)
VALUES
('$_POST[url]','$_POST[name]','$_POST[category1]')";

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