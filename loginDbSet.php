<?php
//login form
$uname=$_POST['username'];//username
$password=$_POST['password'];//password 
session_start();

$con=mysqli_connect("localhost","root","mysql","mini_cmi");//mysqli("localhost","username of database","password of database","database name")
$result=mysqli_query($con,"SELECT * FROM `login` WHERE `username`='$uname' && `password`='$password'");
$count=mysqli_num_rows($result);
if($count==1)
{
	echo "Login success";
	$_SESSION['log']=1;
	header("refresh:2;url=admin.php");

}
else
{
	echo "please fill proper details";
	header("refresh:2;url=login.php");// it takes 2 sec to go index page
}


?>