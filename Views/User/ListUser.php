<!DOCTYPE html>
<html>
<head>
  <link rel="icon" href="../../image/icon.png">
	<title>Sochi</title>
  <link rel="stylesheet" href="../../../Hotel-Website/css/home.css">
  <link rel="stylesheet" href="../../../Hotel-Website/css/home1.css">
  <link rel="stylesheet" href="../../../Hotel-Website/css/ListUser.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
	<style>
    
	</style>
</head>
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

  <div class="top">
    <h2 class ='title'>User Manage</h2>
    <table class="table" style="margin-top: 30px;">
      <thead>
        <tr>
          <th>STT</th>
          <th>First Name</th>
          <th>Last Name</th>
          <th>Email</th>
          <th>Phone Number</th>
          <th>Address</th>
          <th>Booked Rooms</th>
          <th>Update User</th>
        </tr>
      </thead>
      <tbody>
        <a href="../../../Hotel-Website/Controllers/RoomController.php?action=getRoombyUser&id=$Us"></a>
              <?php	if(is_string($listUser))
              {
                  echo "<div style = 'color: red;''>$listUser</div>";
              }else{
                    $i = 0;
                    foreach($listUser['users'] as $User)
                    {
                        $isRoom = $User->getnumRoom() == 0 ? "Không có phòng" : "<a href='../../../Hotel-Website/Controllers/RoomController.php?action=getRoombyUser&id=".$User->getId()."'>Danh sách phòng</a>";
                        $i++;
                        echo "		
                        <tr>
                        <td>".$i."</td>
                        <td>".$User->getFirstName()."</td>
                        <td>".$User->getLastName()."</td>
                        <td>".$User->getEmail()."</td>
                        <td>".$User->getPhone()."</td>
                        <td>".$User->getAddress()."</td>
                        <td>".$isRoom."</td>
                        <td style ='text-decoration: none;'><a href='../../../Hotel-Website/Controllers/UserController.php?action=updateAdmin&id=".$User->getId()."'>Update admin</a></td>
                        </tr>";
                    }
              }
              ?>
        </tr>
        <!-- Thêm các dòng khác tương tự để hiển thị thông tin của các user khác -->
      </tbody>
    </table>
      <?php
    // if(isset($listUser['users']))
    // {
    //   echo "<div class='pagination'>";
    //   for ($i = 1; $i <= $listUser['numPage']; $i++) {
    //     $active = $i == $listUser['page'] ? "active" : "";
    //     echo "<a href='../../../Hotel-Website/Controllers/UserController.php?action=listUser&id=&page=$i' class='$active'>$i</a>";
    //   }
    //   echo "</div>";
    // }
    ?>
  </div>
</body>
</html>