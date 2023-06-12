<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="../../image/icon.png">
	<title>Sochi</title>
  <link rel="stylesheet" href="../../../Hotel-Website/css/home1.css">
  <link rel="stylesheet" href="../../../Hotel-Website/css/home.css">
  <link rel="stylesheet" href="../../../Hotel-Website/css/Rooms.css">
</head>
<?php
$i = 0; 
?>
<body>
<header class="header-user" id="navigation-menu">
		<div class="container">
			<nav>
				<a href="#" class="logo"> <img src="../image/home/logo.png" alt=""> </a>
				<ul class="nav-menu">
					<?php
                    if(!isset($_SESSION['user']['isAdmin'])){
                      echo "
                      <li> <a href='../../../Hotel-Website/Controllers/UserTìmontroller.php?action=back' class='nav-link'>Home</a> </li>
                      <li> <a href='../Views/login.php' class='nav-link'>Login</a> </li>
                      <li> <a href='../Views/register.php' class='nav-link'>Register</a> </li>
                      ";
                    }
                      else
						if($_SESSION['user']['isAdmin'] == 1)
						{
							echo "
							<li> <a href='../Controllers/CityController.php?action=listCity' class='nav-link' style='color: white'>Hotel Manage</a> </li>
							<li> <a href='../Controllers/UserController.php?action=listUser' class='nav-link' style='color: white'>User Manage</a> </li>
							<a href='../Controllers/CityController.php?action=listHotel'></a>
							<li><div class='user-menu-u'>
							<div class='username-u' style='display: contents;' >
							<img src='../../../Hotel-Website/image/user/".$_SESSION['user']['avatar']."' alt='' class='avatar'>
							</div>
								<ul class='menu-u'>
									<li><a href='../../../Hotel-Website/Views/User/ThongtinUser.php'>Thông tin cá nhân</a></li>
									<li><a href='../../../Hotel-Website/Controllers/UserController.php?action=logout'>Đăng xuất</a></li>
								</ul>
							</div></li>";
						} else if($_SESSION['user']['isAdmin'] == 0){
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
						}
					?>
				</ul>
			</nav>
		</div>
  </header>
    <div class="container top" style="display: flex; justify-content: space-around;">

    <form action="../../../Hotel-Website/Controllers/RoomController.php?action=search" method="post"  style="margin-top: 48px; margin-right: 100px; margin-left: 20px; width: 26%;">
            <div class="listSearch">
            <h1 class="lsTitle">Search</h1>
            <div class="lsItem">
              <label>Hotel</label>
              <input style="" type="text" name = 'city' value="<?php if(isset($arr['nameHotel'])){
                echo $arr['nameHotel'];
              }; ?>" readonly/>
            </div>
            <div class="lsItem">
            <label>Type</label>
            <select id="search" name="search" required style="height: 36px; border: none  ; border-radius: 7px;">
              <option value="nameRoom">Name Room</option>
              <option value="priceMin">Price min</option>
              <option value="Description">Description</option>
            </select>
            </div>
            <div class="lsItem">
            <label for="description">Miêu tả:</label>
			      <input type="text" id="description" name="val">
            </div>
            <button style="margin-top: 15px;">Search</button>
              </div>
              <a href="../../Hotel-Website/Controllers/HotelController.php?action=search&id=<?php echo $_SESSION['id_city_search'] ?>&is=1" style="margin-top: 15px;"><i class="fa-solid fa-backward">  Back</i></a>
          </form>
          

  <table style="margin-top: 50px;">
    <thead>
      <tr>
        <th>Tên phòng</th>
        <th>Giá</th>
        <th style="width: 200px";>Các lựa chọn</th>
        <th style="width: 150px;">Đặt phòng</th>
      </tr>
      <img src="../../../Hotel-Website/image/room/" alt="">
    </thead>
    <tbody>
      <?php
      if(isset($arr['rooms']))
      {
        if(is_string($arr['rooms'])){
          echo "<div style = 'color: red; margin-top: 30px;'>".$arr['rooms']."</div>";
        }else{
          foreach($arr['rooms'] as $room)
          {
            $i++;
            echo "
            <tr>
            <td><img src='../../../Hotel-Website/image/room/".$room->getImg()."' alt='></td>
            <td style='width: 40%;'> 
              <h2>".$room->getnameRoom()."</h2>
              <p class = 'des'>M".$room->getdescription()."</p>
            </td>
            <td>$".$room->getPrice()."</td>
            <td>
              <ul>
                <li>Wifi miễn phí</li>
                <li>Máy điều hòa</li>
                <li>Phòng tắm riêng</li>
                <li>Bàn làm việc</li>
              </ul>
            </td>
            <td><a class = 'link1' href='../../Hotel-Website/Controllers/RoomController.php?action=getBookRoom&id=".$room->getidRoom()."'>Đặt phòng</a></td>
            </tr>
            ";
          }
        }
      }
      ?>
    </tbody>
  </table>
  </div>
</body>
</html>