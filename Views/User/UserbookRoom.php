<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../../../Hotel-Website/Views/Room/css/ListRoom.css">
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
				<li><a href='../Controllers/RoomController.php?action=getRoombyUser&id=".$_SESSION['user']['id']."'>Xem phòng đã đặt</a></li>
                <li><a href='../../../Hotel-Website/Views/User/ThongtinUser.php'>Thông tin người dùng</a></li>
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
    if(is_string($rooms))
    {
        echo "<div style = 'color: red;''>$rooms</div>";
    }else{
        			
			foreach($rooms as $room)
			{
				$isbook = $room->getIsbook() == 0 ? "Phòng trống" : "Bạn đã đặt phòng này";
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
					<p>Time: ".$room->getstartDay()." -> ".$room->getendDay()."</p>
					<p class = 'des'>".$room->getdescription()."</p>
				</div>
				</div>
				</div>
		
		
				";
			} 
    }

	?>
	</main>
</div>
</body>
</html>
				


				