<!DOCTYPE html>
<html>
<head>
	<link rel="icon" href="../../image/icon.png">
	<title>Sochi</title>
	<link rel="stylesheet" type="text/css" href="../../../Hotel-Website/Views/Room/css/ListRoom.css">
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
<div class="img_body">
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

		<div class = 'btn'>
			<div class = 'add'>
			<a class = 'add_link' href="../../../Hotel-Website/Views/Room/AddRoom.php">
			<i class="fa-solid fa-plus"></i>
			Thêm phòng	
			</a>
			</div>
			<div class = 'back'>
			<a href="../../../Hotel-Website/Controllers/HotelController.php?action=listHotel&id=<?php echo $_SESSION['id_city']?>">
			<i class="fa-solid fa-arrow-left"></i>
			Back
			</a>
			</div>
		</div>
	<main>
	<?php
	if(is_string($arr))
	{
		echo "<div style = 'color: red;''>$arr</div>";
	}else
		{
			
			foreach($arr['rooms'] as $room)
			{
				$isbook = $room->getIsbook() == 0 ? "Phòng trống" : "Đã có người đặt";
				echo "
				<div class='hotel'>
				<div class = 'hotel_item'>
				<img src='../../../Hotel-Website/image/room/".$room->getImg()."'>
				<div class = 'content'>
					<h2>".$room->getnameRoom()."</h2>
					<div class='rating'>Giá: ".$room->getPrice()."</div>
					<p>Adults: ".$room->getAdult()."</p>
					<p>Children: ".$room->getChildren()."</p>
					<p>Status: ".$isbook."</p>
					<p class = 'des'>".$room->getdescription()."</p>
				</div>
				</div>
		
		
				";
			} 
			
		}

	?>
	</main>
	<?php
	if(isset($arr['rooms']))
	{
		echo "<div class='pagination'>";
		for ($i = 1; $i <= $arr['numPage']; $i++) {
			$active = $i == $arr['page'] ? "active" : "";
			echo "<a href='../../../Hotel-Website/Controllers/RoomController.php?action=getlist&id=".$_SESSION['id_hotel']."&page=$i' class='$active'>$i</a>";
		}
		echo "</div>";
	}
	?>

		</div>
</body>
</html>
				


				