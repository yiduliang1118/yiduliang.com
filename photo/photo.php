<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="EN" lang="EN" dir="ltr">
<head profile="http://gmpg.org/xfn/11">
<?php
include '../includes/configLocal.php';
include '../includes/opendb.php';
?>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Yidu's Home | Photo Wall</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta http-equiv="imagetoolbar" content="no" />
<link rel="stylesheet" href="styles/layout.css" type="text/css" />
<link rel="shortcut icon" href="../images/favicon.ico" type="image/x-icon"/>
</head>
<body id="top">
<div>
	<?php include '../includes/header.php'; ?>
</div>

<!-- ####################################################################################################### -->
<?php
	$album = $_GET['album'];
	$result = mysqli_query($link,"SELECT * FROM photo where album_id = ".$album." ");
	$rowcount = mysqli_num_rows($result);
	$name = mysqli_fetch_array($result);
?>
<div class="wrapper">
  <div id="breadcrumb">
    <ul>
      <li class="first">You Are Here</li>
      <li>&#187;</li>
      <li><a href="../index.php">Home</a></li>
      <li>&#187;</li>
      <li><a href="../photoWall.php">Photo Wall</a></li>
      <li>&#187;</li>
      <li class="current"><a href="#"><?php echo $name['album_name'] ?></a></li>
    </ul>
  </div>
</div>
<div class="container">
	<div id="breadcrumb">
	</div>
<?php
	$result = mysqli_query($link,"SELECT * FROM picture where album_id = ".$album." ");
	$rowcount = mysqli_num_rows($result);
	while($row = mysqli_fetch_array($result)){
?>	
	<div class="picture">
	<a href = "picture.php?album=<?php echo $album?>&pic=<?php echo $row['picture_id'] ?>">
		<img src="<?php echo $row['filePath'].$row['fileName'] ?>" style="width:300px;height:200px"/>
	</a>	
	</div>
<?php
}
?>	
<br/><br/><br/>
</div>
<!-- ####################################################################################################### -->
<?php 
include '../includes/footer.php'; 
//include 'includes/closedb.php';
?>
</body>
</html>