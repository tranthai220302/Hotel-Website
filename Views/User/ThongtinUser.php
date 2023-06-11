<?php 
  if (session_status() == PHP_SESSION_NONE) {
  session_start(); 
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../../image/icon.png">
    <title>Sochi</title>
    <link rel="stylesheet" href="../../../Hotel-Website/css/home.css">
    <link rel="stylesheet" href="../../../Hotel-Website/css/ThongtinUser.css">
    <link rel="stylesheet" href="../../../Hotel-Website/css/home1.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
</head>
<style>
.user-menu{
  position: relative;
  z-index: 9999;
}
</style>
<?php 
    $srcImg =isset($_SESSION['user']['avatar']) ? $_SESSION['user']['avatar'] : 'hinh-anh-avatar-trang-cho-nu-de-thuong.jpg';
    $phonNumber = isset($_SESSION['user']['numberphone']) ? $_SESSION['user']['numberphone'] : '';
    $username = isset($_SESSION['user']['username']) ? $_SESSION['user']['username'] : '';
    $address = isset($_SESSION['user']['address']) ? $_SESSION['user']['address'] : '';
    $isAdmin = isset($_SESSION['user']['isAdmin'])  ? $_SESSION['user']['isAdmin']: '';
    $firstName = isset($_SESSION['user']['firstName'])  ? $_SESSION['user']['firstName']: '';
    $lastName = isset($_SESSION['user']['lastName'])  ? $_SESSION['user']['lastName']: '';
    if($isAdmin == 1)
    {
      $isAdmin = 'Admin';
    }else if($_SESSION['user']['isHotel']){
      $isAdmin = 'Hotel';
    }
    else if($isAdmin == 0)
    {
      $isAdmin = 'Khách hàng';
    }
    $email = isset($_SESSION['user']['email'])? $_SESSION['user']['email'] : '';
?>
<body>
<header class="header" id="navigation-menu">
		<div class="container" style="height: 60px;">
			<nav style="padding: 0;">
				<a href="#" class="logo"> <img src="../../image/home/logo.png" alt=""> </a>
				<ul class="nav-menu">
					<?php
						if($_SESSION['user']['isAdmin'] == 1)
						{
							echo "
							<li> <a href='../../Controllers/CityController.php?action=listCity' class='nav-link'>Hotel Manage</a> </li>
							<li> <a href='../../Controllers/UserController.php?action=listUser' class='nav-link'>User Manage</a> </li>
							<a href='../Controllers/CityController.php?action=listHotel'></a>
							<li><div class='user-menu'>
							<div class='username' >
							<img src='../../../Hotel-Website/image/user/".$_SESSION['user']['avatar']."' alt='' class='avatar'>
							</div>
								<ul class='menu'>
									<li><a href='../../../Hotel-Website/Views/User/ThongtinUser.php'>Thông tin cá nhân</a></li>
									<li><a href='../../../Hotel-Website/Controllers/UserController.php?action=logout'>Đăng xuất</a></li>
								</ul>
							</div></li>";
						} else if($_SESSION['user']['isAdmin'] == 0 && $_SESSION['user']['isHotel'] == 0){
							echo "
							<li> <a href='../../../Hotel-Website/Controllers/UserController.php?action=back' class='nav-link'>Home</a> </li>
							<li> <a href='#about' class='nav-link'>About</a> </li>
							<li> <a href='#room' class='nav-link'>Rooms</a> </li>
							<li> <a href='#map' class='nav-link'>Map</a> </li>
							<li><a href='../Controllers/CityController.php?action=listHotel'></a></li>
							<div class='user-menu'>
							<div class='username'>
							<img src='../../../Hotel-Website/image/user/".$_SESSION['user']['avatar']."' alt='' class='avatar'>
							</div>
							<ul class='menu'>
								<li><a href='../../../Hotel-Website/Views/User/ThongtinUser.php'>Thông tin cá nhân</a></li>
								<li><a href='../../../Hotel-Website/Controllers/RoomController.php?action=getRoombyUser&id=".$_SESSION['user']['id']."'>Xem phòng đã đặt</a></li>
								<li><a href='../../../Hotel-Website/Controllers/UserController.php?action=logout'>Đăng xuất</a></li>
							</ul>
						</div>";
          }else if($_SESSION['user']['isHotel'] == 1){
            echo "
								<li><a href='../../../Hotel-Website/Controllers/UserController.php?action=homeHotel'>Home</a></li>
								<li><a href='../../../Hotel-Website/Controllers/UserController.php?action=home1'>Hotel Manage</a></li>
								<li><a href='../../../Hotel-Website/Controllers/UserController.php?action=userbookRoom'>List User</a></li>
                <li><a href='../../../Hotel-Website/Views/Thongke.php'>Doanh Thu</a></li>
								<div class='user-menu'>
								<div class='username'>
								<img src='../../../Hotel-Website/image/user/".$_SESSION['user']['avatar']."' alt='' class='avatar'>
								</div>
								<ul class='menu'>
									<li><a href='../../../Hotel-Website/Views/User/ThongtinUser.php'>Thông tin cá nhân</a></li>
									<li><a href='../../../Hotel-Website/Controllers/UserController.php?action=logout'>Đăng xuất</a></li>
								</ul>
							</div>";
          }
					?>
				</ul>
			</nav>
		</div>
  </header>

  <div class="top">
  <h2 class ='title'>Thông tin cá nhân</h2>
  <form action="../../../Hotel-Website/Controllers/UserController.php?action=edit" method="post">
  <div class="user-profile">
        <img class = 'img' src="../../../Hotel-Website/image/user/<?php echo $srcImg; ?>" alt="">
        <div class = 'profile_main'>
          <div class="profile">
            <div class="profile_item">
              <label for="" class="profilr_title">First Name:</label>
              <p name = "firstName" class="firstName"><?php echo $firstName; ?></p>
            </div>
            <div class="profile_item">
              <label for="" class="profilr_title">Last Name:</label>
              <p name = "lastName" class="lastName"><?php echo $lastName; ?></p>
            </div>
            <div class="profile_item">
              <label for="" class="profilr_title">Phone Number:</label>
              <p name = "phone-number" class="phone-number"><?php echo $phonNumber; ?></p>
            </div>
          </div>
          <div class="profile">
            <div class="profile_item" style="padding-right: -100px;">
                <label for="" class="profilr_title">Address:</label>
                <p name = "address" class="address"><?php echo $address; ?></p>
              </div>
              <div class="profile_item">
                <label for="" class="profilr_title">Status:</label>
                <p name = "is-admin" class="is-admin"> <?php echo $isAdmin; ?></p>
              </div>
              <div class="profile_item">
                <label for="" class="profilr_title">Email:</label>
                <p name = "email" class="email"><?php echo $email; ?></p>
              </div>
          </div>
        </div>
        <div class="btn-group">
          <div class="back">
            <a href="../../Controllers/CityController.php?action=listCity"><i class="fa-solid fa-arrow-left"></i>Back</a>
          </div>
          <input type="submit" value="Edit" class="submit">
        </div>
    </div>
  </form>
  </div>
</body>

<script>
  const editButton = document.querySelector('input[value="Edit"]');
  editButton.addEventListener('click', function() {
  const lastNameElement = document.querySelector('.lastName');
  const phonNumberElement = document.querySelector('.phone-number');
  const addressElement = document.querySelector('.address');
  const emailElement = document.querySelector('.email');
  const firstNameElement = document.querySelector('.firstName');

  const lastNameInput = document.createElement('input');
  lastNameInput.setAttribute('type', 'text');
  lastNameInput.setAttribute('value', lastNameElement.innerHTML);
  lastNameInput.setAttribute('name', 'lastName');
  lastNameElement.replaceWith(lastNameInput);
  
  const firstNameInput = document.createElement('input');
  firstNameInput.setAttribute('type', 'text');
  firstNameInput.setAttribute('value', firstNameElement.innerHTML);
  firstNameInput.setAttribute('name', 'firstName');
  firstNameElement.replaceWith(firstNameInput);
  const phonNumberInput = document.createElement('input');
  phonNumberInput.setAttribute('type', 'text');
  phonNumberInput.setAttribute('value', phonNumberElement.innerHTML);
  phonNumberInput.setAttribute('name', 'phone-number');
  phonNumberElement.replaceWith(phonNumberInput);
  console.log(phonNumberInput);

  const addressInput = document.createElement('input');
  addressInput.setAttribute('type', 'text');
  addressInput.setAttribute('value', addressElement.innerHTML);
  addressInput.setAttribute('name', 'address');
  addressElement.replaceWith(addressInput);

  console.log(addressInput);



  const emailInput = document.createElement('input');
  emailInput.setAttribute('type', 'email');
  emailInput.setAttribute('value', emailElement.innerHTML);
  emailInput.setAttribute('name', 'email');
  emailElement.replaceWith(emailInput);
  console.log(emailElement);

  const okButton = document.createElement('input');
  okButton.setAttribute('type', 'submit');
  okButton.setAttribute('value', 'OK');
  editButton.replaceWith(okButton);

  okButton.addEventListener('click', function() {
      // Thực hiện gửi thông tin lên server
    });
  });
</script>

</html>