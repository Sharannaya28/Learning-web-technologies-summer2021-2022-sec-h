<!DOCTYPE HTML>
<html>
<head>
	<title>Registration</title>
</head>
<body>


<?php
	//variable defines
	$usertypeName = $_REQUEST["usertypeName"];
	$password = $_REQUEST["password"];
	$password = $_REQUEST["password"];
	$Name = $_REQUEST["Name"];
	$usertype = $_REQUEST["usertype"];
	
	
	$error_Name=$error_usertypeName=$error_password=$error_usertype="";
	
	
	
	
	
	//Name valusertypeNameation
	if($Name == null){ //null check
		$error_Name = "*Name is required<br>";
	}
	else if(strlen($Name)<2){ //if less than two charecter
		$error_Name = "*Name must contain two words<br>";
	}
	else if((!preg_match("/^[a-zA-Z][a-zA-Z_\.\s]*$/",$Name))){
		$error_Name = "*Only contain letter '_' and '.' also need to be start with a letter<br>";
	}
	
	
	
	
	//usertypeName valusertypeNameation
	if($usertypeName == null){
		$error_usertypeName = "*usertypeName is required<br>";
	}
	else if(!preg_match("/^[a-zA-Z0-9_\.\s]*$/",$usertypeName)){
		$error_usertypeName = "*Only contain letter '_' and '.' also need to be start with a letter<br>";
	}
	else{
		//Chech if usertypeName is already exist or not
		$file = fopen('usertype.txt', 'r');
		
		while (!feof($file)) {
			$data = fgets($file);
			$usertype = explode("|", $data); 
			if(trim($usertype[0])== $usertypeName){
				$error_usertypeName = "*usertypeName already taken.";
			}
		}
	}
	
	
	//passwordword
	if($password == null || $password == null){
		$error_password = "*passwordword is required<br>";
	}
	else if(strlen($password) != 6){
		$error_password = "*6 digit only <br>";
	}
	else if($password != $password){
		$error_password = "*passwordword not matched<br>";
	}
	
	
	
	
	//usertype type valusertypeNameation
	if($usertype == null){
		$error_usertype = "*usertype type is required<br>";
	}
	
	
	
	//if no error than go to login page
	if ($error_Name=="" && $error_usertypeName=="" && $error_usertype==""  $error_password==""){
		
		$usertype = $usertypeName."|".$password."|".$Name."|".$usertype."\r\n";
		
		//write a file
		$file = fopen('usertype.txt', 'a');
		fwrite($file, $usertype);
		fclose($file);
		header('location: login.html');
	}
	else{
?>

	<?php //form notice show ?>
	<form action="registration.php" method="post" >
		<fieldset>
			<legend>Registration</legend>
			<table>
				<tr>
					<td>usertypeName<br><input type="text" Name="usertypeName" value="<?php echo $usertypeName; ?>" placeholder="usertypeName"></td>
					<td><?php echo $error_usertypeName; ?></td>
				</tr>
				<tr>
					<td>passwordword<br><input type="passwordword" Name="password" value="<?php echo $password; ?>" placeholder="passwordword"></td>
					<td><?php echo $error_password; ?></td>
				</tr>
				<tr>
					<td>Confirm passwordword<br><input type="passwordword" Name="password" value="<?php echo $password; ?>" placeholder="Confirm passwordword"></td>
					<td><?php echo $error_password; ?></td>
				</tr>
				<tr>
					<td>
						Name<br><input type="text" Name="Name" value="<?php echo $Name; ?>" Placeholder="Name">
					</td>
					<td><?php echo $error_Name; ?></td>
				</tr>
				<tr>
					<td>usertype Type<br><hr></td>
				</tr>
				
				<tr>
					<td>
						<input type="radio" Name="usertype" value="Admin" checked> Admin
						<input type="radio" Name="usertype" value="usertype" > usertype<br>
						<hr>
					</td>
					<td><?php echo $error_usertype; ?></td>
				</tr>
				<tr>
					<td>
						<input type="submit" Name="submit" value="Sign Up">
						<a href="login.html">Sign in</a>
						
					</td>
				</tr>
				<tr>
					
				</tr>
			</table>
			
		</fieldset>
	</form>




<?php
	}
?>
</body>
</html>
