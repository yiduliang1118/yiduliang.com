<html>
<head>
<?php
include '../includes/configLocal.php';
include '../includes/opendb.php';
?>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Yidu's Web-Starter | Web Starter</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta http-equiv="imagetoolbar" content="no" />
<link rel="stylesheet" href="../styles/layout.css" type="text/css" />
<link rel="shortcut icon" href="../images/favicon.ico" type="image/x-icon"/>
</head>
<body>
<div>
	<?php include '../includes/header.php'; ?>
</div>
<div class="wrapper" style="height:1000px, width:80%">
<div class="container">
	<form action="webServer.php" method="post">
		URL: <input type="text" name="url" style="width:380px;">
		<br/>
		Name: <input type="text" name="name">
		<br/>
		Category: <input type="text" name="category1">
		<br/>
		<input type="submit">
	</form>
    <div class="content" style="width:100%">
	</br></br>
	<?php	
	//判断奇数，是返回TRUE，否返回FALSE
	function is_odd($num){
		return (is_numeric($num)&($num&1));
	}
	//判断偶数，是返回TRUE，否返回FALSE
	function is_even($num){
		return (is_numeric($num)&(!($num&1)));
	}
	
	$category = mysqli_query($link,"SELECT distinct category1 FROM url");
	while($row = mysqli_fetch_array($category)){
	?>
	<form name="<?php echo $row['category1'] ?>" onsubmit="return getCategory()" style="float:left">
		<input type="hidden" name="var" value="<?php echo $row['category1'] ?>"/>
		<input type="submit" value="<?php echo $row['category1'] ?>"/>
	</form>
	<?php
	}
	?>
	<script type="text/javascript">
	function getCategory() {
		window.location.href = "home.php?lat="+document.forms[<?php $row['category1'] ?>]["var"].value;
		return true;
	}
	</script>	
	<?php
	if(array_key_exists('var', $_GET)){
		$searchKey = $_GET["var"];
		$result = mysqli_query($link,"SELECT * FROM url where category1 = '".$searchKey."'");
		
	}
	else{
		$result = mysqli_query($link,"SELECT * FROM url");
	}
	//$result = mysqli_query($link,"SELECT * FROM url");
	$rowcount = mysqli_num_rows($result);
	?>
	</br></br></br>
	<h2><?php echo $rowcount ?></h2>
	<table summary="Summary Here" cellpadding="0" cellspacing="0" >
        <thead>
          <tr>
            <th style="width:5%;">Number</th>
            <th style="width:600px;">URL</th>
            <th>Name</th>
            <th>Category</th>
          </tr>
        </thead>
        <tbody>
	<?php
	$i = 1;
	$tr_style;
	while($row = mysqli_fetch_array($result)){	
	if(is_odd($i)){
		$tr_style = "light";
	}else{
		$tr_style = "dark";
	}
	?>
          <tr class="<?php echo $tr_style ?>">
            <td><?php echo $i ?></td>
            <td><?php echo $row['url'] ?></td>
            <td><?php echo $row['name'] ?></td>
            <td><?php echo $row['category1'] ?></td>
          </tr> 
	<?php
		$i++;
	}
	?>
        </tbody>
      </table>
	</div>
   </div>	
</div>
<div>
	<?php include '../includes/footer.php'; ?>
</div>
</body>
</html>