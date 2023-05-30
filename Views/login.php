<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../image/icon.png"> 
    <title>Sochi</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <link rel="stylesheet" href="../css/login.css">
</head>
<body>
<section>
        <div class="form-box">
            <div class="form-value">
                <form action="../Controllers/UserController.php?action=login" method="post">
                    <h2>Login</h2>
                    <div class="inputbox">
                        <ion-icon name="username"></ion-icon>
                        <input type="text" required name = 'username' placeholder="Username" style="color: black;">
                    </div>
                    <div class="inputbox">
                        <ion-icon name="password"></ion-icon>
                        <input type="password" required  name="password" placeholder="Password" style="color: black;">

                    </div>
                    <?php if(isset($arr)){
                      echo "<div style='color: red;' >".$arr."</div>";
                    } ?>
    
                    <button style="margin-top: 10px;">Log in</button>
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