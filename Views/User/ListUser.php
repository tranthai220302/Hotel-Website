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

<header class="header-user" id="navigation-menu">
		<div class="container">
			<nav>
				<a href="#" class="logo"> <img src="../image/home/logo.png" alt=""> </a>
				<ul class="nav-menu">
					<?php
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
    <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
		<div class="offcanvas-header">
			<h5 class="offcanvas-title" id="offcanvasExampleLabel">Create User</h5>
			<button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
		</div>
		<div class="offcanvas-body">
			<form action='../../../Hotel-Website/Controllers/RoomController.php?action=addRoom' method='post' enctype='multipart/form-data'>
			<div class='form-group'>
				<label class='col-form-label' for='inputDefault' >First Name</label>
				<input type='text' class='form-control' placeholder='First Name' id='inputDefault' name = 'nameRoom' required>
			</div>
			<div class='form-group'>
				<label class='col-form-label' for='inputDefault' style='margin-top: 30px;'>Last Name</label>
				<input type='text' class='form-control' placeholder='Last Name' id='inputDefault' name = 'Price' required>
			</div>
			<div class='form-group'>
				<label class='col-form-label' for='inputDefault' style='margin-top: 30px;'>Email</label>
				<input type='text' class='form-control' placeholder='Email' id='inputDefault' name = 'adults' required>
			</div>
			<div class='form-group'>
				<label class='col-form-label' for='inputDefault' style='margin-top: 30px;'>Phone Number</label>
				<input type='text' class='form-control' placeholder='Phone Number' id='inputDefault' name = 'childrens' required>
			</div>
			<div class='form-group'>
			<label for='exampleTextarea' style='margin-top: 30px;'><Address></Address></label>
			<textarea class='form-control' id='exampleTextarea' rows='3' name = 'description' required></textarea>
			</div>
			<div class='form-group'>
				<label for='formFile' class='form-label' style='margin-top: 30px;'>Chọn Ảnh</label>
				<input class='form-control' type='file' id='formFile' name='imgRoom' accept='image/*' required>
			</div>
			<div class='dropdown mt-3' style='margin-top: 30px;'>
				
			<button type='submit' class='btn btn-success'>Create</button>
			</form>
			</div>
		</div>
		</div>
		<div class="img_body">
		<div class = 'add' style="color:black;">
		<button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample" style="margin-left: 5%;">
		<i class="fa-solid fa-plus">
		</i>Create User
		</button>
		</div>
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
        <th>Edit User</th>
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
                      <td style ='text-decoration: none;'><a href='../../../Hotel-Website/Controllers/UserController.php?action=deleteUser&id=".$User->getId()."'>Delete</a></td>
                      <td style ='text-decoration: none;'>
                      <button class='btn btn-primary' type='button' data-bs-toggle='offcanvas' data-bs-target='#offcanvasExample".$User->getId()."' aria-controls='offcanvasExample".$User->getId()."'>
                        Edit
                      </button>
                      <div class='offcanvas offcanvas-start' tabindex='-1' id='offcanvasExample".$User->getId()."' aria-labelledby='offcanvasExampleLabel'>
                        <div class='offcanvas-header'>
                          <h5 class='offcanvas-title' id='offcanvasExampleLabel'>Detail User</h5>
                          <button type='button' class='btn-close text-reset' data-bs-dismiss='offcanvas' aria-label='Close'></button>
                        </div>
                        <div class='offcanvas-body'>
                        <div class='offcanvas-body'>
                        <form action='../../../Hotel-Website/Controllers/UserController.php?action=editUser&id=".$User->getId()."' method='post' enctype='multipart/form-data'>
            
                        <div class='form-group'>
                        <img class = 'img' src='../../../Hotel-Website/image/user/".$User->getImg()."'>
                      </div>
                        <div class='form-group'>
                          <label class='col-form-label' for='inputDefault' >First Name</label>
                          <input type='text' class='form-control' placeholder='Name Hotel' id='inputDefault' name = 'firstname'  value = '".$User->getFirstName()."'>
                        </div>
                        <div class='form-group'>
                        <label class='col-form-label' for='inputDefault' >Last Name</label>
                        <input type='text' class='form-control' placeholder='Name Hotel' id='inputDefault' name = 'lastname'  value = '".$User->getLastName()."'>
                      </div>
                        <div class='form-group'>
                          <label class='col-form-label' for='inputDefault' style='margin-top: 30px;'>Email</label>
                          <input type='text' class='form-control' placeholder='Địa điểm' id='inputDefault' name = 'email'  value = '".$User->getEmail()."'>
                        </div>
                        <div class='form-group'>
                        <label for='exampleTextarea' style='margin-top: 30px;'>Phone</label>
                        <input type='text' class='form-control' placeholder='Địa điểm' id='inputDefault' name = 'phone-number'  value = '".$User->getPhone()."'>
                        </div>
            
                        <div class='form-group'>
                        <label for='exampleTextarea' style='margin-top: 30px;'>Address</label>
                        <input type='text' class='form-control' placeholder='Địa điểm' id='inputDefault' name = 'address'  value = '".$User->getAddress()."'>
                        </div>
                          
                        <button type='submit' class='btn btn-success' style='margin-top: 20px;'>Edit</button>
                        </form>
                      </div>
                          </div>
                        </div>
                      </div>
                      </td>
                      </tr>";
                  }
            }
            ?>
			</tr>
			<!-- Thêm các dòng khác tương tự để hiển thị thông tin của các user khác -->
		</tbody>
	</table>
      
		</div>
	  </div>
</body>
</html>