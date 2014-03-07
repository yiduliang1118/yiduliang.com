<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="EN" lang="EN" dir="ltr">
<head profile="http://gmpg.org/xfn/11">
<?php
include 'includes/configLocal.php';
include 'includes/opendb.php';
?>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Yidu Liang's personal web, Yidu Liang's Photo Wall, Liang yidu's photo, 梁一都, 梁一都的照片" />
<title>Yidu's Home | Photo Wall</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta http-equiv="imagetoolbar" content="no" />
<link rel="stylesheet" href="styles/layout.css" type="text/css" />
<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon"/>
</head>
<body id="top">
<div>
	<?php include 'includes/header.php'; ?>
</div>
<!-- ####################################################################################################### -->
<div class="wrapper">
  <div id="breadcrumb">
    <ul>
      <li class="first">You Are Here</li>
      <li>&#187;</li>
      <li><a href="index.php">Home</a></li>
      <li>&#187;</li>
      <li class="current"><a href="photoWall.php">Photo Wall</a></li>
    </ul>
  </div>
</div>
<!-- ####################################################################################################### -->
<div class="wrapper" style="height:auto;">
  <div class="container">
    <img src="images/demo/photo.gif" alt="" />	
  </div>
  
  <div class="container">
  <div class="content" style="width:100%;">
	  <h1>Be greateful for this moment... </h1>
<?php 
	  $result = mysqli_query($link,"SELECT * FROM photo");
	  $rowcount = mysqli_num_rows($result);
	  $pageName = "photo/photo.php";
	  while($row = mysqli_fetch_array($result)){
	  $rowNum = $row['album_id'];
	  if($rowNum % 2 == 0)
	  {
		 $imageLayout = "imgr";
	  }
	  else{
		 $imageLayout = "imgl";
	  }
		  echo '<div class="content" style="width:100%;">';
		  echo '<a href="'.$pageName.'?album='.$rowNum.'"><img class="'.$imageLayout.'" src="'.$row['album_pic'].'" alt="" width="125" height="125" />';
		  echo '<br/>';
		  echo '<p><b>'.$row['album_name'].'</b></p>';
		  echo '<p>'.$row['place'].' -- '.$row['time'].'</p>';
		  echo '<p>'.$row['description'].'</p></a>';
		  echo '</div>';
	  }
?>      
	  <h1>For this moment is my life</h1>
	  <br/><br/><br/>
  </div>
</div>
<!-- ####################################################################################################### -->
<?php include 'includes/footer.php'; ?>
</body>
</html>
