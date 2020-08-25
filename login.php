<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<style>
	.logf {
		border: solid gray 1px;
		border-top: solid black 30px;
		border-bottom: solid black 30px;
		width: 20%;
		border-radius: 5px;
		margin: 100px auto;
		background-color: #0000001a;
		padding: 50px;
	
	}

		.Btn{
			color: white;
			background-color: black;
			padding:  2px 20px;
			margin-right: 30px;
			margin-left: 30px;
		}
		
</style>
<title>login</title>
</head>
<body>

<form class="logf" method="POST" action="loginDbSet.php">
	Username  <input type="text" name="username"><br><br>
	Password  <input  type="password" name="password"><br><br>
	<input class="Btn" type="submit" value="Login">
	<input class="Btn" type="button" value="Go back" onclick="window.history.back()" /> 

</form>

</body>
</html>
<?php
session_destroy();
?>