<!DOCTYPE html>
<html>
<head>
    <link rel="icon" href="../image/icon.png">
	<title>Sochi</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <link rel="stylesheet" href="../css/register.css">
	<style>

	</style>
<?php   
    $errUsername = isset($User_login['username']) ? $User_login['username'] : '';
    $errPassword = isset($User_login['password']) ? $User_login['password'] : '';
    $errConfirm = isset($User_login['ConfirmPassword']) ? $User_login['ConfirmPassword'] : '';
    $errEmail = isset($User_login['email']) ? $User_login['email'] : '';  
?>
</head>
<body>
	<section>
        <div class="form-box">
            <div class="form-value">
                <form action="../Controllers/UserController.php?action=register" method="post" enctype="multipart/form-data">
                    <h2>Register</h2>
                    <div class="inputbox">
                        <ion-icon name="username"></ion-icon>
                        <input type="text" required name = 'username' placeholder="Username" style="color: black;">
                        <?php echo "<div style='color: red;' >".$errUsername."</div>"; ?>
                    </div>
                    <div class="inputbox">
                        <ion-icon name="password"></ion-icon>
                        <input type="password" required  name="password" placeholder="Password" style="color: black;">

                    </div>
					<?php echo "<div style='color: red;' >".$errPassword."</div>"; ?>
					<div class="inputbox">
						<input type="password" placeholder="Confirm Password" name="confirmpassword" required>
						<?php echo "<div style='color: red;' >".$errConfirm."</div>"; ?>
					</div>
					<div class="inputbox">
					<input type="text" placeholder="FirstName" name="firstName" required>
					</div>
					<div class="inputbox">
					<input type="text" placeholder="LastName" name="lastName" required>
					</div>
					<div class="inputbox">
					<input type="email" placeholder="Email" name="email" required>
					<?php echo "<div style='color: red;' >".$errEmail."</div>"; ?>
					</div>
					<div class="inputbox">
					<input type= 'text' placeholder="Address" name="address" required>
					</div>
					<div class="inputbox">
					<input type="tel" placeholder="Numberphone" name="Numberphone" required>
					</div>
					<div class="inputbox1">
                    <input type="file" name="Avatar" required>
                    </div>
    
                    <button type = 'submit' style="margin-top: 10px;">Register</button>
                    <div class="register">	
                      <a href="../../Hotel-Website/Views/home.php"><i style="font-size: 30px; color: black;" class="fa-solid fa-house"></i></a>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>





