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
    <title>Document</title>
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
    }else if($isAdmin == 0)
    {
      $isAdmin = 'Khách hàng';
    }
    $email = isset($_SESSION['user']['email'])? $_SESSION['user']['email'] : '';


?>
<body>
<div class="navbar">
		<div class="navContainer">
		  <a href="../../../Hotel-Website/Controllers/UserController.php?action=home"><span class="logo" style="color: black;">Sochi</span></a>
      <?php
          if($_SESSION['user']['isAdmin'] == 1)
          {
           
            echo "
            
            <div class='user-menu'>
            <div class='username'>
            <img src='../../../Hotel-Website/image/user/".$_SESSION['user']['avatar']."' alt='' class='avatar'>
            </div>
            <ul class='menu'>
                <li><a href='../../../Hotel-Website/Controllers/CityController.php?action=listCity'>Quan ly khach san</a></li>
                <li><a href='../../../Hotel-Website/Controllers/UserController.php?action=listUser'>Danh sách người dùng</a></li>
                <li><a href='../../../Hotel-Website/Views/User/ThongtinUser.php'>Thông tin người dùng</a></li>
                <li><a href='../Controllers/RoomController.php?action=getRoombyUser&id=".$_SESSION['user']['id']."'>Xem phòng đã đặt</a></li>
                <li><a href='../../../Hotel-Website/Controllers/UserController.php?action=logout'>Đăng xuất</a></li>
            </ul>
          </div>
            ";
          }else if($_SESSION['user']['isAdmin'] == 0){
            echo "
          
            <div class='user-menu'>
            <div class='username'>
            <img src='../../../Hotel-Website/image/user/".$_SESSION['user']['avatar']."' alt='' class='avatar'>
            </div>
            <ul class='menu'>
                <li><a href='../../../Hotel-Website/Views/User/ThongtinUser.php'>Thong tin ngươi dùng</a></li>
                <li><a href='../../../Hotel-Website/Controllers/RoomController.php?action=getRoombyUser&id=".$_SESSION['user']['id']."'>Xem phòng đã đặt</a></li>
                <li><a href='../../../Hotel-Website/Controllers/UserController.php?action=logout'>Đăng xuất</a></li>
            </ul>
          </div>
            ";
          }
      ?>
		</div>
	  </div>
		<div class="header">
			<div class= "headerContainer listMode">
			  <div class="headerList">
				<div class="headerListItem active">
				  <span>Stays</span>
				</div>
				<div class="headerListItem">
				  <span>Flights</span>
				</div>
				<div class="headerListItem">
				  <span>Car rentals</span>
				</div>
				<div class="headerListItem">
				  <span>Attractions</span>
				</div>
				<div class="headerListItem">
				  <span>Airport taxis</span>
				</div>
			  </div>
		
				  <p class="headerDesc">
					
				  </p>         
				</div>
		</div>
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
        <div class="btn">
        <div class="back">
        <a href="../../../Hotel-Website /Controllers/UserController.php?action=back"><i class="fa-solid fa-arrow-left"></i>Home</a>
        </div>
        <input type="submit" value="Edit" class="submit">
        </div>
    </div>
  </form>
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