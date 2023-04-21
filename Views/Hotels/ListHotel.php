<!DOCTYPE html>
<html>
<head>
	<title>Danh sách khách sạn ở Việt Nam</title>
	<link rel="stylesheet" type="text/css" href="../../../Hotel-Website/Views/Hotels/css/ListHotel.css">
	<link rel="stylesheet" href="../../../Hotel-Website/css/home1.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
</head>
<style>
.user-menu{
  position: relative;
  z-index: 9999;
}
</style>
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
          </div>";
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
		<div class="img_body">
		<div class = 'btn'>
		<div class = 'add' style="color:black;">
		<a class = 'add_link' href="../../../Hotel-Website/Views/Hotels/AddHotel.php">
		<i class="fa-solid fa-plus">
		</i>Thêm khách sạn
		</a>
		</div>
		<div class = 'back'>
		<a style="text-decoration: none;" href="../../../Hotel-Website/Controllers/CityController.php?action=listCity">
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
	}else{
	foreach($arr['hotels'] as $hotel)
		{
			echo "
			<div class='hotel'>
			<div class = 'hotel_item'>
				<img class = 'img' src='../../../Hotel-Website/image/hotel/".$hotel->getImg()."'>
				<div class = 'content'>
					<h2>".$hotel->getnameHotel()."</h2>
					<div class='rating'>
					Số sao đánh giá: ".$hotel->getnumStart()."
					<i class='fa-solid fa-star'></i>
					</div>
					<div class='info'>Số phòng: ".$hotel->getnumRoom()."</div>
					<div class='info'>Địa điểm: ".$hotel->getAddress()."</div>
					<p class = 'des'>".$hotel->getdescription()."</p>
				</div>
			</div>
				<div class = 'ed'>
				<a class = 'link' href='../../../Hotel-Website/Controllers/HotelController.php?action=delete&id=".$hotel->getidHotel()."'>Delete</a>
				<a class = 'link' href='../../../Hotel-Website/Controllers/HotelController.php?action=getHotel&id=".$hotel->getidHotel()."'>Edit</a>
				<a class = 'link' href='../../../Hotel-Website/Controllers/RoomController.php?action=getlist&id=".$hotel->getidHotel()."'>List Room</a>
				</div>
			</div>

			";
		} 
	}
	?>
	</main>
	<?php
	if(isset($arr['hotels']))
	{
		echo "<div class='pagination'>";
		for ($i = 1; $i <= $arr['numPage']; $i++) {
			$active = $i == $arr['page'] ? "active" : "";
			echo "<a href='../../../Hotel-Website/Controllers/HotelController.php?action=listHotel&id=".$_SESSION['id_city']."&page=$i' class='$active'>$i</a>";
		}
		echo "</div>";
	}
	?>
		</div>
		

</body>
</html>
				