<!DOCTYPE html>
<html>
<head>
	<link rel="icon" href="../image/icon.png"> 
	<title>Sochi</title>

	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="../../Hotel-Website/css/home1.css">
	<link rel="stylesheet" href="../../Hotel-Website/css/home.css">
	<link rel="stylesheet" href="../../Hotel-Website/css/QuanlyHotel.css">

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />


  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.css" integrity="sha512-UTNP5BXLIptsaj5WdKFrkFov94lDx+eBvbKyoe1YAfjeRPC+gT5kyZ10kOHCfNZqEui1sxmqvodNUx3KbuYI/A==" crossorigin="anonymous"
    referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>

</head>
<style>
.user-menu{
  position: relative;
  z-index: 9999;
}
</style>
<body>
	<header class="header" id="navigation-menu">
		<div class="container">
			<nav>
				<a href="#" class="logo"> <img src="../image/home/logo.png" alt=""> </a>
				<ul class="nav-menu">
					<?php
						if($_SESSION['user']['isAdmin'] == 1)
						{
							echo "
							<li> <a href='../Controllers/CityController.php?action=listCity' class='nav-link'>Hotel Manage</a> </li>
							<li> <a href='../Controllers/UserController.php?action=listUser' class='nav-link'>User Manage</a> </li>
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
						} else if($_SESSION['user']['isAdmin'] == 0){
							echo "
							<li> <a href='#home' class='nav-link'>Home</a> </li>
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
						}
					?>
				</ul>
			</nav>
		</div>
  </header>

  <section class="room top" id="room">
  	<h2 class ='title'>Hotel Manage</h2>
    <div class="containerQL">
      <div class="content">
      <?php
				foreach($citys as $city)
				{
					echo "
					<div class='city'>
					<a href='../../../Hotel-Website/Controllers/HotelController.php?action=listHotel&id=".$city->getidCity()."&page=1'>
						<img class = 'img_city' src='".$city->getImg()."' alt='Hà Nội'>
						<p>".$city->getnameCity()."</p>
						<p>Số lượng khách sạn: ".$city->getnumHotels()."</p>
						<p class = 'des'>
						".$city->getdescription()."
						</p>
					</a>
				</div>
					";
				} 
				?>
      </div>
    </div>
    <!-- gioi thieu -->
  </section>

  <!-- body -->
	<!-- <section class="body">
		<div class="containerQL">
			<div class="content"> 
				<?php
				foreach($citys as $city)
				{
					echo "
					<div class='city'>
					<a href='../../../Hotel-Website/Controllers/HotelController.php?action=listHotel&id=".$city->getidCity()."&page=1'>
						<img class = 'img_city' src='".$city->getImg()."' alt='Hà Nội'>
						<p>".$city->getnameCity()."</p>
						<p>Số lượng khách sạn: ".$city->getnumHotels()."</p>
						<p class = 'des'>
						".$city->getdescription()."
						</p>
					</a>
				</div>
					";
				} 
				?>
			</div>
		</div>
	</section> -->
	<!-- footer -->
	<footer>
    <div class="footer">
      <div class="social">
        <i class="fa-brands fa-square-facebook"></i>
        <i class="fa-brands fa-square-instagram"></i>
        <i class="fa-brands fa-linkedin"></i>
        <i class="fa-brands fa-square-twitter"></i>
      </div>
      <p>Copyright <i class="fa-regular fa-copyright"></i> by Sochi</p>
    </div>
  </footer>
</body>
</html>

				