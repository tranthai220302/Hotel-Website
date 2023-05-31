<!DOCTYPE html>
<html>
<head>
	<title>User List</title>
  <link rel="stylesheet" href="../../../Hotel-Website/css/home1.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
  <link rel="stylesheet" type="text/css" href="../../../Hotel-Website/Views/Hotels/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
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
	background-position:0px 100px;
}
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}


.header {
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
}

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
  .img{
	width: 297px;
	height: 162px;
	margin-bottom: 10px;
	border-radius: 5px;
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

  <div class="navbar">
		<div class="navContainer">

      <?php
          if($_SESSION['user']['isAdmin'] == 1)
          {
           
            echo "
            <a href='../../../Hotel-Website/Controllers/UserController.php?action=home_admin'><span class='logo' style='color: black;'>Sochi</span></a>
            <div class='user-menu'>
            <div class='username'>
            <img src='../../../Hotel-Website/image/user/".$_SESSION['user']['avatar']."' alt='' class='avatar'>
            </div>
            <ul class='menu'>
                <li><a href='../../../Hotel-Website/Controllers/CityController.php?action=listCity'>Quan ly khach san</a></li>
                <li><a href='../../../Hotel-Website/Controllers/UserController.php?action=listUser'>Danh sách người dùng</a></li>
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
          </div>
            ";
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
    <h2 class ='title'>Danh sách khách hàng</h2>
    <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
		<div class="offcanvas-header">
			<h5 class="offcanvas-title" id="offcanvasExampleLabel">Add User</h5>
			<button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
		</div>
		<div class="offcanvas-body">
			<form action='../../../Hotel-Website/Controllers/RoomController.php?action=addRoom' method='post' enctype='multipart/form-data'>
			<div class='form-group'>
				<label class='col-form-label' for='inputDefault' >First Name</label>
				<input type='text' class='form-control' placeholder='First Name' id='inputDefault' name = 'firstname' required>
			</div>
			<div class='form-group'>
				<label class='col-form-label' for='inputDefault' style='margin-top: 30px;'>Last Name</label>
				<input type='text' class='form-control' placeholder='Last Name' id='inputDefault' name = 'lastname' required>
			</div>
			<div class='form-group'>
				<label class='col-form-label' for='inputDefault' style='margin-top: 30px;'>Email</label>
				<input type='text' class='form-control' placeholder='Email' id='inputDefault' name = 'email' required>
			</div>
			<div class='form-group'>
				<label class='col-form-label' for='inputDefault' style='margin-top: 30px;'>Phone Number</label>
				<input type='text' class='form-control' placeholder='Phone Number' id='inputDefault' name = 'phone-number' required>
			</div>
			<div class='form-group'>
				<label class='col-form-label' for='inputDefault' style='margin-top: 30px;'>Address</label>
				<input type='text' class='form-control' placeholder='Address' id='inputDefault' name = 'address' required>
			</div>
			<div class='form-group'>
				<label for='formFile' class='form-label' style='margin-top: 30px;'>Chọn Anh</label>
				<input class='form-control' type='file' id='formFile' name='imgUser' accept='image/*' required>
			</div>
			<div class='dropdown mt-3' style='margin-top: 30px;'>
				
			<button type='submit' class='btn btn-success'>Success</button>
			</form>
			</div>
		</div>
		</div>
		<div class="img_body">
		<div class = 'add' style="color:black;">
		<button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
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
    <?php
	if(isset($listUser['users']))
	{
		echo "<div class='pagination'>";
		for ($i = 1; $i < $listUser['numPage']; $i++) {
			$active = $i == $listUser['page'] ? "active" : "";
			echo "<a href='../../../Hotel-Website/Controllers/UserController.php?action=listUser&id=&page=$i' class='$active'>$i</a>";
		}
		echo "</div>";
	}
	?>
</body>
</html>