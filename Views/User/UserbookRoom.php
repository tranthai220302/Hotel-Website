<!DOCTYPE html>
<html>
<head>
	<link rel="icon" href="../../image/icon.png">
	<title>Sochi</title>
	<link rel="stylesheet" href="../../../Hotel-Website/Views/Room/css/ListRoom2.css">
	<link rel="stylesheet" href="../../../Hotel-Website/css/home1.css">
	<link rel="stylesheet" href="../../../Hotel-Website/css/home.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
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
											<li> <a href='../../../Hotel-Website/Controllers/CityController.php?action=listCity' class='nav-link'>Hotel Manage</a> </li>
											<li> <a href='../../../Hotel-Website/Controllers/UserController.php?action=listUser' class='nav-link'>User Manage</a> </li>
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
        <?php
        if($_SESSION['user']['isAdmin'] == 1)
        {
            echo "		<div class = 'btn'>
			<div class = 'back' style='color: black;'>
			<a href='../../../Hotel-Website/Controllers/UserController.php?action=listUser'>
			<i class='fa-solid fa-arrow-left'></i>
			Back
			</a>
			</div>
		</div>";
        }
        ?>
	<div class="top">
		<h2 class="title">Phòng đã đặt</h2>
	<main>
	<?php
    if(is_string($arr))
    {
        echo "<div style = 'color: red;''>Không có phòng</div>";
    }else{
        	$i = 0;		
			foreach($arr['rooms'] as $room)
			{
				$isbook = $room->getIsbook() == 0 ? "Phòng trống" : "Bạn đã đặt phòng này";
				echo "
				<div class='hotel'>
				<div class = 'hotel_item'>
				<img src='../../../Hotel-Website/image/room/".$room->getImg()."'>
				<div class = 'content'>
					<h2>".$room->getnameRoom()."</h2>
					<div class='rating'>Giá: ".$room->getPrice()."$</div>
					<p>Adults: ".$arr['booking'][$i]->getAdults()."</p>
					<p>Children: ".$arr['booking'][$i]->getChildrens()."</p>
					<p>Status: ".$isbook."</p>
					<p>Date: ".$arr['booking'][$i]->getstartDate()." --> ".$arr['booking'][$i]->getendDate()."</p>
					<p class = 'des'>".$room->getdescription()."</p>
					<a style = 'margin-right: 40px;'  class='btn btn-primary' data-bs-toggle='offcanvas' href='../../../Hotel-Website/Controllers/BookingController.php?action=huyphong&id=".$room->getidRoom()."&date_end=".$arr['booking'][$i]->getendDate()."	' role='button' aria-controls='offcanvasExample' onclick='return confirmDelete();'>
					Huỷ phòng
				  </a>
				</div>
				</div>
				</div>
		
		
				";
				$i++;
			} 
    }

	?>
	</main>
	</div>
</div>
</body>
</html>
				


				