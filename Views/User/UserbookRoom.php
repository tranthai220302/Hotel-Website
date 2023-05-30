<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../../../Hotel-Website/Views/Room/css/ListRoom2.css">
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
<div class="img_body">
<div class="navbar1">
		<div class="navContainer1">

          <?php
          if($_SESSION['user']['isAdmin'] == 1)
          {
           
            echo "
			<a href='../../../Hotel-Website/Controllers/UserController.php?action=home'><span class='logo' style='color: black;'>Sochi</span></a>
            <div class='user-menu'>
            <div class='username'>
            <img src='../../../Hotel-Website/image/user/".$_SESSION['user']['avatar']."' alt='' class='avatar'>
            </div>
            <ul class='menu'>
                <li><a href='../../../Hotel-Website/Controllers/CityController.php?action=listCity'>Quan ly khach san</a></li>
                <li><a href='../../../Hotel-Website/Controllers/UserController.php?action=listUser'>Danh sách người dùng</a></li>
				<li><a href='../Controllers/RoomController.php?action=getRoombyUser&id=".$_SESSION['user']['id']."'>Xem phòng đã đặt</a></li>
                <li><a href='../../../Hotel-Website/Views/User/ThongtinUser.php'>Thông tin người dùng</a></li>
                <li><a href='../../../Hotel-Website/Controllers/UserController.php?action=logout'>Đăng xuất</a></li>
            </ul>
          </div>";
          }else if($_SESSION['user']['isAdmin'] == 0 && $_SESSION['user']['isHotel'] == 0){
            echo "
			<a href='../../../Hotel-Website/Controllers/UserController.php?action=home'><span class='logo' style='color: black;'>Sochi</span></a>
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
          }else if($_SESSION['user']['isHotel'] == 1)
          {
           
            echo "
			<a href='../../../Hotel-Website/Controllers/UserController.php?action=home2'><span class='logo' style='color: black;'>Sochi</span></a>
            <div class='user-menu'>
            <div class='username'>
            <img src='../../../Hotel-Website/image/user/".$_SESSION['user']['avatar']."' alt='' class='avatar'>
            </div>
            <ul class='menu'>
            <li><a href='../../../Hotel-Website/Controllers/UserController.php?action=home1'>Quan ly khach san</a></li>
                <li><a href='../../../Hotel-Website/Controllers/UserController.php?action=userbookRoom'>Danh sách khách hàng</a></li>
                <li><a href='../../../Hotel-Website/Views/User/ThongtinUser.php'>Thông tin người dùng</a></li>
                <li><a href='../../../Hotel-Website/Controllers/UserController.php?action=logout'>Đăng xuất</a></li>
            </ul>
          </div>";
          }
      ?>
		</div>
	  </div>
		<div class="header1">
			<div class= "header1Container listMode">
			  <div class="header1List">
				<div class="header1ListItem active">
				  <span>Stays</span>
				</div>
				<div class="header1ListItem">
				  <span>Flights</span>
				</div>
				<div class="header1ListItem">
				  <span>Car rentals</span>
				</div>
				<div class="header1ListItem">
				  <span>Attractions</span>
				</div>
				<div class="header1ListItem">
				  <span>Airport taxis</span>
				</div>
			  </div>
		
				  <p class="header1Desc">
					
				  </p>         
				</div>
		</div>
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
</body>
</html>
				


				