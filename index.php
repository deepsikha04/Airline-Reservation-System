<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login Form</title>
	<link rel="stylesheet" href="styless.css">
	<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

</head>
<body>
<div class="wrapper">
	<?php
	if(isset($_POST['submit']))
	{
		$email = $_POST['email'];
		$pwd = $_POST['pwd'];
		$type = $_POST["type"];
		require_once ("db.php");
		$sql = "Select id,password as pwd FROM login where id = '$email' and type='$type'";
		//echo "<br>".$sql;
		$r = mysqli_query($con,$sql);
		$user = mysqli_fetch_assoc($r);
		//$user = mysqli_fetch_array($result,MYSQLI_ASSOC);
		
		if($user)
		{
			if($pwd==$user['pwd'] && $type=="User"){
				$_SESSION["type"] = "user";
				$_SESSION["key"] = $email;
				header("Location: airline_dashboard.php");
				die();
			}
			else if($pwd==$user['pwd'] && $type=="Admin"){
				$_SESSION["type"] = "admin";
				$_SESSION["key"] = $email;
				header("Location: airline_dashboard.php");
				die();
			}
			else{
				echo "<div class= 'alert alert-danger'>Password does not match</div>";
			}
		}else{
			echo "<div class= 'alert alert-danger'>Email does not match</div>";
		}
	}
				
	?>
	<form action="index.php" method="post">
	<h1>Login</h1>
	<div class="input-box">
		<input type="text" name="email" placeholder="Username" required>
		<i class='bx bxs-user'></i>
	</div>
	<div class="input-box">
		<input type="Password" name="pwd" placeholder="Password" required>
		<i class='bx bxs-lock-alt'></i>
	</div>
	<div class="radio">
		<input type="radio" name='type' value='User'  required/>User<br><br>
		<input type="radio" name='type' value='Admin'/>Admin<br><br>
	</div>
	<button type="submit class="btn" name="submit">Login</button>
	
	</form>
</div>
</body>
</html>