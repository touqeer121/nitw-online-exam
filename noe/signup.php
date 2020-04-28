<?php
include_once 'dbConnection.php';
ob_start();
$name = $_POST['full_name'];
$name= ucwords(strtolower($name));
$username = $_POST['username'];
$reg_no = $_POST['reg_no'];
$roll_no = $_POST['roll_no'];
$course = $_POST['course'];
$gender = $_POST['gender'];
$email = $_POST['email'];
$mob = $_POST['mobile_no'];
$password = $_POST['password1'];
$current_year = $_POST['current_year'];
$admission_type = $_POST['admission_type'];
$name = stripslashes($name);
$name = addslashes($name);
$name = ucwords(strtolower($name));
$username = stripslashes($username);
$username = addslashes($username);
$reg_no = stripslashes($reg_no);
$reg_no = addslashes($reg_no);
$roll_no = stripslashes($roll_no);
$roll_no = addslashes($roll_no);
$course = stripslashes($course);
$course = addslashes($course);
$gender = stripslashes($gender);
$gender = addslashes($gender);
$email = stripslashes($email);
$email = addslashes($email);
$mob = stripslashes($mob);
$mob = addslashes($mob);
$current_year = stripslashes($current_year);
$current_year = addslashes($current_year);
$admission_type = stripslashes($admission_type);
$admission_type = addslashes($admission_type);

$password = stripslashes($password);
$password = addslashes($password);
$password = md5($password);

$q3="INSERT INTO user VALUES  ('$name' , '$username' , '$reg_no' , '$roll_no', '$course', '$gender' ,'$email' ,'$mob', '$password', '$current_year', '$admission_type')";

if(mysqli_query($con, $q3)){
		// echo "3rd row inserted successfully<br>";
		session_start();
		$_SESSION["username"] = $username;
		$_SESSION["name"] = $name;
		header("location:account.php?q=1");
}
else{
		echo"ERROR: Could not execute $q3.".mysqli_error($con);
		// header("location:index.php?q7=Email Already Registered!!!");
}
ob_end_flush();
?>