<!DOCTYPE html>
<html>
<head>
	<link rel="icon" href="../image/icon.png">
	<title>Sochi</title>
	<link rel="stylesheet" href="../../Hotel-Website/css/home1.css">
	<link rel="stylesheet" href="../../Hotel-Website/css/QuanlyHotel.css">
</head>
<style>
.user-menu{
  position: relative;
  z-index: 9999;
}
</style>
<body>
<div class="navbar" >
		<div class="navContainer">
		  <a href="../../Hotel-Website/Controllers/UserController.php?action=home"><span class="logo"><img src="../image/home/logo.png" alt=""></span></a>
		  <?php
          if($_SESSION['user']['isAdmin'] == 1)
          {
           
            echo "
            <div class='user-menu'>
            <div class='username' >
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
          </div>";
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
	<div class="container">
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

</body>
</html>
				