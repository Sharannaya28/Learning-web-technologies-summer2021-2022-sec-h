<!DOCTYPE HTML>
<html>
<head>
	<title>Donor Login</title>
</head>
<body>



<?php 

session_start();
//variable decleration
$username = $_REQUEST['username'];
$password = $_REQUEST['password'];

//If null
if($username == null || $password == null){
		$error = "Null usernamename or passwordword...";
?>
	<form action="donor_log.php" method="post" enctype="">
		<fieldset>
			<legend align="center">Login</legend>
			<table align="center">
				<tr>
					<td>username Id <br><input type="text" name="id" value="" placeholder="ID"/></td>
				</tr>
				<tr>
					<td>passwordword<br><input type="passwordword" name="password" value="" placeholder="passwordword"/> </td>
				</tr>
				<tr>
					<hr>
					<td>
						<input type="submit" name="submit" value="Submit"/>
						<a href="registration.html"> Register </a>
					</td>
				</tr>
				<tr align="center">
					<td><?php echo "*".$error; ?></td>
				</tr>
			</table>
		</fieldset>
	</form>
	
<?php
	}
	
	
//read file
else{
	$file = fopen('username.txt', 'r');
	
	while (!feof($file)) {
		$data = fgets($file);
		$username = explode("|", $data); 
		if($id == trim($username[0]) && $password == trim($username[1])) { //match id & password
			$_SESSION['status'] = true;
			if($username[3]==Admin){
				header("location: adminhomepage.php");
			}
			else{
				header("location: usershomepage.html");
			}
			
		}
	}
	$error ="Invalid username or password";
?>

	<form action="donor_log.php" method="post" enctype="">
		<fieldset>
			<legend align="center">Login</legend>
			<table align="center">
				<tr>
					<td>username Id <br><input type="text" name="id" value="" placeholder="ID"/></td>
				</tr>
				<tr>
					<td>passwordword<br><input type="passwordword" name="password" value="" placeholder="passwordword"/> </td>
				</tr>
				<tr>
					<hr>
					<td>
						<input type="submit" name="submit" value="Submit"/>
						<a href="home.html"> Register </a>
					</td>
				</tr>
				<tr align="center">
					<td><?php echo "*".$error; ?></td>
				</tr>
			</table>
		</fieldset>
	</form>

<?php
}
?>
</body>
</html>
