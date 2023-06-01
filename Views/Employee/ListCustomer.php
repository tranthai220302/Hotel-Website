<!DOCTYPE html>
<html>
<head>
  <link rel="icon" href="../../image/icon.png">
	<title>Sochi</title>
  <link rel="stylesheet" href="../../../Hotel-Website/css/home1.css">
  <link rel="stylesheet" href="../../../Hotel-Website/css/home.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
	<style>

.user-menu{
  position: relative;
  z-index: 9999;
}

		.table {
			border-collapse: collapse;
			width: 100%;
		}

		.table th, .table td {
			padding: 8px;
			text-align: left;
			border: 1px solid black;
		}

		.table th {
			background-color: #f2f2f2;
      color: black;
      font-weight: 700;
		}
    .table tr {
      font-family: "Courier New";
      color: black;
      font-weight: 600;
      background-color: rgba(255, 255, 255, 0.4);
		}
    body {
	margin: 0;
	padding: 0;
	background-image: url('./31.jpg');
	background-position:0px -200px;
}
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}


/* .header {
  background-color: #003580;
  color: white;
  display: flex;
  justify-content: center;
  position: relative;
}

.headerContainer {
  width: 100%;
  max-width: 1024px;
  margin: 20px 0px 100px 0px;
}

.headerContainer.listMode {
  margin: 20px 0px 0px 0px;
}

.headerList {
  display: flex;
  gap: 40px;
  margin-bottom: 50px;
}

.headerListItem {
  display: flex;
  align-items: center;
  gap: 10px;
}

.headerListItem.active {
  border: 1px solid white;
  padding: 10px;
  border-radius: 20px;
}

.headerDesc {
  margin: 20px 0px;
}

.headerBtn {
  background-color: #0071c2;
  color: white;
  font-weight: 500;
  border: none;
  padding: 10px;
  cursor: pointer;
}

.headerSearch {
  height: 30px;
  background-color: white;
  border: 3px solid #febb02;
  display: flex;
  align-items: center;
  justify-content: space-around;
  padding: 10px 0px;
  border-radius: 5px;
  position: absolute;
  bottom: -25px;
  width: 100%;
  max-width: 1024px;
}

.headerIcon {
  color: lightgray;
}

.headerSearchItem {
  display: flex;
  align-items: center;
  gap: 10px;
}

.headerSearchInput {
  border: none;
  outline: none;
}

.headerSearchText {
  color: lightgray;
  cursor: pointer;
} */

/*nava*/
.navbar{
  height: 50px;
  background-color: #003580;
  display: flex;
  justify-content: center;
}

.navContainer{
  width: 100%;
  max-width: 1024px;
  color: white;
  display: flex;
  align-items: center;
  justify-content: space-between;
}

.logo{
  font-weight: 500;
}

.navButton{
  margin-left: 20px;
  border: none;
  padding: 5px 10px;
  cursor: pointer;
  color: #003580;
}
.pagination {
	display: flex;
	justify-content: center;
	align-items: center;
	margin-top: 20px;

	}

	.pagination a {
	color: black;
	text-decoration: none;
	transition: background-color 0.3s;
    display: inline-block;
    background-color: #333;
    color: #fff;
    padding: 5px 10px;
    border-radius: 5px;
    margin-right: 10px;
    margin-bottom: 10px;

	}

	.pagination a.active, .pagination a:hover {
		background-color:darkslategray;
		color: black;
	}
    body {
	font-family: Arial, sans-serif;
	margin: 0;
	padding: 0;
	background-image: url('../../../Hotel-Website/image/home/31.jpg');
	background-position:0px -200px;
}
.title{
  text-align: center;
  margin-top: 20px;
  text-shadow: 1px 1px 2px black;
  font-size: 35px;

}

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
							<li> <a href='../Controllers/CityController.php?action=listCity' class='nav-lin'>Hotel Manage</a> </li>
							<li> <a href='../Controllers/UserController.php?action=listUser' class='nav-lin'>User Manage</a> </li>
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
    
  <div class="top">
    <h2 class ='title'>Danh sách khách hàng</h2>
  </div>
	<table class="table" style="margin-top: 30px; width: 90%; margin: 30px auto;">
		<thead>
			<tr>
				<th>STT</th>
				<th>First Name</th>
				<th>Last Name</th>
				<th>Email</th>
				<th>Phone Number</th>
				<th>Address</th>
				<th>Booked Rooms</th>
			</tr>
		</thead>
		<tbody>
      <a href="../../../Hotel-Website/Controllers/RoomController.php?action=getRoombyUser&id=$Us"></a>
            <?php	if(is_string($users))
            {
                echo "<div style = 'color: red;''>$users</div>";
            }else{
                  $i = 0;
                  foreach($users as $User)
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
                      </tr>";
                  }
            }
            ?>
			</tr>
			<!-- Thêm các dòng khác tương tự để hiển thị thông tin của các user khác -->
		</tbody>
	</table>
</body>
</html>