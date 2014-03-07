<html>
<head>
<?php
include '../includes/configLocal.php';
include '../includes/opendb.php';
?>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Yidu's Todo List | Todo List</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta http-equiv="imagetoolbar" content="no" />
<script src="//code.jquery.com/jquery-1.9.1.js"></script>
<script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
<link rel="stylesheet" href="../styles/layout.css" type="text/css" />
<link rel="shortcut icon" href="../images/favicon.ico" type="image/x-icon"/>
<script>
	$(function(){
		$( "#datepicker" ).datepicker();
	});   
	function showDoneTask()
	{
		var done = "Y";
		window.location.href = "home.php?done="+done;
	}
	function showUnDoneTask()
	{
		var done = "N";
		window.location.href = "home.php?done="+done;
	}
	</script>
	<script type="text/javascript">	
	function getCategory() {
		alert("Hello!");
		window.location.href = "home.php?lat="+document.forms[<?php $row['catalog1'] ?>]["var"].value;
		return true;
	}
	</script>
<style>
.ui-datepicker-calendar{
background-color:white;
}
.ui-datepicker-header{
background-color:white;
}
#insertForm{
	padding:15px;
	border-style:solid;
	border-width:1px;
	width:50%;
	height:180px;
	float:left;
}
#subTaskForm{
	padding:15px;
	border-style:solid;
	border-width:1px;
	width:43.3%;
	height:180px;
	float:left;
}
.navBar{
	width:70%;
	border-style:solid;
	border-width:1px;
	padding:15px;
	float:left;
	height:50px;
}
.twoButton{
	width:23.3%;
	border-style:solid;
	border-width:1px;
	padding:15px;
	float:left;
	height:50px;
}
</style>
</head>
<body>
<div>
	<?php include '../includes/header.php'; ?>
</div>
<div class="wrapper" style="height:1000px">
<div class="container">
	<div id="insertForm">
		<form id="Insert" action="todoListHelper.php" method="post">
			Task: <input type="text" name="task" style="width:380px;"/>
			<br/>
			Deadline: <input type="text" id="datepicker" name="deadline" style="null"/>
			<br/>
			Category1: <input type="text" name="category1"/>
			<br/>
			Category2: <input type="text" name="category2"/>
			<br/>
			Event: <input type="text" name="event"/>
			<br/>
			Priority: <input type="text" name="priority"/>
			<input type="hidden" name="type" value="insertNew">
			<input type="submit" name="action" value="Insert">
		</form>
	</div>
	
	<div id="subTaskForm">
	<h3>Tasks Need to be Done</h3>
		1. Data Validation: Insert can not be null, DoFilter<br/>
		2. Header/Footer: inclue yiduliang.com header/footer<br/>
		3. Login Validation: Make sure no gust vist this page, or not allow gust insert or delete data<br/>
		4. Show specific time period of tasks: 1 week, two weeks, 1 months, 3 months, 6 months  <br/>
		5. Show Info: Today's Date <br/>
	</div>
	
    <div class="content" style="width:100%">
	<div class="navBar">
	
	<?php	
	//判断奇数，是返回TRUE，否返回FALSE
	function is_odd($num){
		return (is_numeric($num)&($num&1));
	}
	//判断偶数，是返回TRUE，否返回FALSE
	function is_even($num){
		return (is_numeric($num)&(!($num&1)));
	}
	
	$category = mysqli_query($link,"SELECT distinct catalog1 FROM todolist");
	while($row = mysqli_fetch_array($category)){
	?>
	<form name="<?php echo $row['catalog1'] ?>" onsubmit="return getCategory()" style="float:left">
		<input type="hidden" name="var" value="<?php echo $row['catalog1'] ?>"/>
		<input type="submit" value="<?php echo $row['catalog1'] ?>"/>
	</form>
		
	<?php
	}
	?>
	</div>
	<div class="twoButton">
		<button onclick="showDoneTask()">What I have done</button>
		</br>
		<button onclick="showUnDoneTask()">What Need to be done</button>
	</div>
		
	<?php
	if(array_key_exists('var', $_GET)){
		$searchKey = $_GET["var"];
		$result = mysqli_query($link,"SELECT * FROM todolist where catalog1 = '".$searchKey."' and done = 'N'");		
	}
	else{
		$done = 'N';
		if(isset($_GET["done"])) {
			$done = $_GET["done"];
		}		
		$result = mysqli_query($link,"SELECT * FROM todolist where done = '".$done."' order by deadline");
	}
	//$result = mysqli_query($link,"SELECT * FROM todolist");
	$rowcount = mysqli_num_rows($result);
	?>
	</br></br></br>
	<!--<h2><?php echo $rowcount ?></h2>-->
	<table summary="Summary Here" cellpadding="0" cellspacing="0">
        <thead>
          <tr>
            <th style="width:2%;">#</th>
            <th style="width:60%;">Task</th>
            <th style="width:12%;">Deadline</th>
			<th>Category</th>
			<th>Category*</th>
			<th>Priority</th>
			<th>Event</th>
			<th>Done</th>
			<th>Delete</th>
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
	<form id="doneTask" action="todoListDoneTask.php" method="get">
        <tr class="<?php echo $tr_style ?>">
            <td><?php echo $i ?></td>
            <td><?php echo $row['taskName'] ?></td>
			<td><?php echo $row['deadline'] ?></td>
            <td><?php echo $row['catalog1'] ?></td>
			<td><?php echo $row['catalog2'] ?></td>
			<td><?php echo $row['priority'] ?></td>
			<td><?php echo $row['event'] ?></td>
			<input type="hidden" name="task_id" value="<?php echo $row['task_id'] ?>">
			<td><button name="doneTask" value="doneTask">doneTask</button></td>
			<td><button name="deleteTask" value="deleteTask">Delete</button></td>
        </tr> 
	</form>
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