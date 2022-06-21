<?php 

$username = $_REQUEST['username'];
$password = $_REQUEST['password'];
$confirmpassword = $_REQUEST['confirm pasword'];
$fname = $_REQUEST['fname'];

if($username == null || $password == null || $confirmpassword == null || $fname == null ){
	echo "null username/password/confirmpassword/name...";
}else{
			header('location: Loginpage.html');			
		}

}

?>