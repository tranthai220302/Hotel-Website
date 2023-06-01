<!DOCTYPE html>
<html>
<head>
	<link rel="icon" href="../../image/icon.png">
	<title>Sochi</title>
	<link rel="stylesheet" type="text/css" href="../../../Hotel-Website/Views/Hotels/css/ListHotel.css">
	<link rel="stylesheet" type="text/css" href="../../../Hotel-Website/Views/Hotels/css/bootstrap.min.css">
	<link rel="stylesheet" href="../../../Hotel-Website/css/home.css">
	<link rel="stylesheet" href="../../../Hotel-Website/css/home1.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
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
	<div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
		<div class="offcanvas-header">
			<h5 class="offcanvas-title" id="offcanvasExampleLabel">Add Hotel</h5>
			<button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
		</div>
		<div class="offcanvas-body">
			<form action='../../../Hotel-Website/Controllers/HotelController.php?action=addHotel' method='post' enctype='multipart/form-data'>
			<div class='form-group'>
				<label class='col-form-label' for='inputDefault' >Name Hotel</label>
				<input type='text' class='form-control' placeholder='Name Hotel' id='inputDefault' name = 'nameHotel' required>
			</div>
			<div class='form-group'>
				<label for='exampleSelect1' style='margin-top: 30px;'>Số sao</label>
				<select class='form-select' id='exampleSelect1' name = 'numStar' required>
					<option>1</option>
					<option>2</option>
					<option>3</option>
					<option>4</option>
					<option>5</option>
				</select>
			</div>
			<div class='form-group'>
				<label class='col-form-label' for='inputDefault' style='margin-top: 30px;'>Địa Điểm</label>
				<input type='text' class='form-control' placeholder='Địa điểm' id='inputDefault' name = 'address' required>
			</div>
			<div class='form-group'>
			<label for='exampleTextarea' style='margin-top: 30px;'>Miêu tả</label>
			<textarea class='form-control' id='exampleTextarea' rows='3' name = 'description' required></textarea>
			</div>
			<div class='form-group'>
				<label for='formFile' class='form-label' style='margin-top: 30px;'>Chọn ảnh</label>
				<input class='form-control' type='file' id='formFile' name='imgHotel' accept='image/*' required>
			</div>
			<div class='dropdown mt-3' style='margin-top: 30px;'>
				
			<button type='submit' class='btn btn-success'>Add</button>
			</form>
			</div>
		</div>
	</div>
	
<div class="top" >
	<div class="btn-group" style="display: flex;">
		<div class = 'back1'>
			<a style="text-decoration: none;" href="../../../Hotel-Website/Controllers/CityController.php?action=listCity">
				<i class="fa-solid fa-arrow-left"></i>
				Back
			</a>
		</div>
		<div class = 'add' style="color:black;">
			<button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
				<i class="fa-solid fa-plus">
				</i>Thêm khách sạn
			</button>
		</div>
	</div>

	<main>
		<?php
		$page = isset($_GET['page']) ? $_GET['page'] : 1;
		if(is_string($arr))
		{
			echo "<div style = 'color: red;''>$arr</div>";
		}else{
			$j = -1;
			$i=0;
		foreach($arr['hotels'] as $hotel)
			{
				$i++;
				$j--;
				if($hotel->getIdUser()){
					if($users[$hotel->getidHotel()]->getImg()){
						$img = $users[$hotel->getidHotel()]->getImg();
					}else{
						$img = 'avata.jpg';
					}
					$a = "
					<a style = 'margin-left: 45%;' class='btn btn-primary' data-bs-toggle='offcanvas' href='#offcanvasExample".$i."' role='button' aria-controls='offcanvasExample".$i."'>
					Detail Hotel
					</a>
				<div class='offcanvas offcanvas-start' tabindex='-1' id='offcanvasExample".$i."' aria-labelledby='offcanvasExampleLabel'>
				<div class='offcanvas-header'>
					<h5 class='offcanvas-title' id='offcanvasExampleLabel'>Detail Hotel</h5>
					<button type='button' class='btn-close text-reset' data-bs-dismiss='offcanvas' aria-label='Close'></button>
				</div>
				<div class='offcanvas-body'>
					<form action='../../../Hotel-Website/Controllers/HotelController.php?action=edit&id=".$hotel->getidHotel()."' method='post' enctype='multipart/form-data'>
					<div class='form-group'>
					<img src='../../../Hotel-Website/image/user/".$img." ' alt='' style='border-radius: 50%; width: 360px; height: 300px;'>
					</div>
					<div class='form-group'>
					<label class='col-form-label' for='inputDefault' >Name</label>
					<input type='text' class='form-control' placeholder='Name Hotel' id='inputDefault' name = 'nameHotel'  value = '".$users[$hotel->getidHotel()]->getFirstName()." ".$users[$hotel->getidHotel()]->getLastName()."'>
					</div>
					<div class='form-group'>
						<label class='col-form-label' for='inputDefault' style='margin-top: 30px;'>Address</label>
						<input type='text' class='form-control' placeholder='Địa điểm' id='inputDefault' name = 'address'  value = '".$users[$hotel->getidHotel()]->getAddress()."'>
					</div>
					<div class='form-group'>
					<label class='col-form-label' for='inputDefault' style='margin-top: 30px;'>Phone</label>
					<input type='text' class='form-control' placeholder='Địa điểm' id='inputDefault' name = 'address'  value = '".$users[$hotel->getidHotel()]->getPhone()."'>
					</div>
					<div class='form-group'>
					<label class='col-form-label' for='inputDefault' style='margin-top: 30px;'>Email</label>
					<input type='text' class='form-control' placeholder='Địa điểm' id='inputDefault' name = 'address'  value = '".$users[$hotel->getidHotel()]->getEmail()."'>
					</div>
					</form>
				</div>
			</div>
					";
				}else{
					$a = "
					<a style = 'margin-left: 45%;' class='btn btn-primary' data-bs-toggle='offcanvas' href='#offcanvasExample".$j."' role='button' aria-controls='offcanvasExample".$j."'>
					Create User
					</a>
					<div class='offcanvas offcanvas-start' tabindex='-1' id='offcanvasExample".$j."' aria-labelledby='offcanvasExampleLabel'>
					<div class='offcanvas-header'>
						<h5 class='offcanvas-title' id='offcanvasExampleLabel'>User Hotel</h5>
						<button type='button' class='btn-close text-reset' data-bs-dismiss='offcanvas' aria-label='Close'></button>
					</div>
					<div class='offcanvas-body'>
						<form action='../../../Hotel-Website/Controllers/UserController.php?action=createUserByHotel&id=".$hotel->getidHotel()."&page=".$page."' method='post' enctype='multipart/form-data'>
						<div class='form-group'>
						<label class='col-form-label' for='inputDefault' >Username</label>
						<input type='text' class='form-control' placeholder='Username' id='inputDefault' name = 'username'  >
						</div>
						<div class='form-group'>
							<label class='col-form-label' for='inputDefault' style='margin-top: 30px;'>Password</label>
							<input type='text' class='form-control' placeholder='Password' id='inputDefault' name = 'password'  >
						</div>
						<div class='form-group'>
						<label class='col-form-label' for='inputDefault' style='margin-top: 30px;'>FirstName</label>
						<input type='text' class='form-control' placeholder='FirstName' id='inputDefault' name = 'firstName'  >
						</div>
						<div class='form-group'>
						<label class='col-form-label' for='inputDefault' style='margin-top: 30px;'>LastName</label>
						<input type='text' class='form-control' placeholder='LastName' id='inputDefault' name = 'lastName' >
						</div>
						<div class='form-group'>
						<label class='col-form-label' for='inputDefault' style='margin-top: 30px;'>Email</label>
						<input type='text' class='form-control' placeholder='email' id='inputDefault' name = 'email' >
						</div>
						<div class='form-group'>
						<label class='col-form-label' for='inputDefault' style='margin-top: 30px;'>Address</label>
						<input type='text' class='form-control' placeholder='address' id='inputDefault' name = 'address' >
						</div>
						<div class='form-group'>
						<label class='col-form-label' for='inputDefault' style='margin-top: 30px;'>Numberphone</label>
						<input type='text' class='form-control' placeholder='Numberphone' id='inputDefault' name = 'Numberphone' >
						</div>
						<div class='form-group'>
						<label for='formFile' class='form-label' style='margin-top: 30px;'>Chọn Anh</label>
						<input class='form-control' type='file' id='formFile' name='Avatar' accept='image/*' >
						</div>
						<button type='submit' class='btn btn-success' style='margin-top: 30px;'>Success</button>
						</form>
					</div>
				</div>
					";
				}
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
					<a class='btn btn-primary' href='../../../Hotel-Website/Controllers/HotelController.php?action=delete&id=".$hotel->getidHotel()."' onclick='return confirmDelete();' style = 'margin-right: 15px;'>Delete</a>
					<button class='btn btn-primary' type='button' data-bs-toggle='offcanvas' data-bs-target='#offcanvasExample".$hotel->getidHotel()."' aria-controls='offcanvasExample".$hotel->getidHotel()."'>
					Edit
				</button>
				<div class='offcanvas offcanvas-start' tabindex='-1' id='offcanvasExample".$hotel->getidHotel()."' aria-labelledby='offcanvasExampleLabel'>
				<div class='offcanvas-header'>
					<h5 class='offcanvas-title' id='offcanvasExampleLabel'>Edit Hotel</h5>
					<button type='button' class='btn-close text-reset' data-bs-dismiss='offcanvas' aria-label='Close'></button>
				</div>
				<div class='offcanvas-body'>
					<form action='../../../Hotel-Website/Controllers/HotelController.php?action=edit&id=".$hotel->getidHotel()."' method='post' enctype='multipart/form-data'>
					<div class='form-group'>
						<label class='col-form-label' for='inputDefault' >Name Hotel</label>
						<input type='text' class='form-control' placeholder='Name Hotel' id='inputDefault' name = 'nameHotel'  value = '".$hotel->getnameHotel()."'>
					</div>
					<div class='form-group'>
						<label for='exampleSelect1' style='margin-top: 30px;'>Số sao</label>
						<select class='form-select' id='exampleSelect1' name = 'numStar'  value = ".$hotel->getnumStart().">
							<option>".$hotel->getnumStart()."</option>
							<option>1</option>
							<option>2</option>
							<option>3</option>
							<option>4</option>
							<option>5</option>
						</select>
					</div>
					<div class='form-group'>
						<label class='col-form-label' for='inputDefault' style='margin-top: 30px;'>Địa Điểm</label>
						<input type='text' class='form-control' placeholder='Địa điểm' id='inputDefault' name = 'address'  value = '".$hotel->getAddress()."'>
					</div>
					<div class='form-group'>
					<label for='exampleTextarea' style='margin-top: 30px;'>Miêu tả</label>
					<textarea class='form-control' id='exampleTextarea' rows='3' name = 'description'  value = '".$hotel->getdescription()."'>".$hotel->getdescription()."</textarea>
					</div>
					<div class='form-group'>
						<label for='formFile' class='form-label' style='margin-top: 30px;'>Chọn ảnh</label>
						<input class='form-control' type='file' id='formFile' name='imgHotel' accept='image/*' >
					</div>
						
					<button type='submit' class='btn btn-success' style='margin-top: 20px'>Edit</button>
					</form>
				</div>
				</div>
				<div style='display: flex; justify-content: space-between;'>
				</div>
					<a class='btn btn-primary' href='../../../Hotel-Website/Controllers/RoomController.php?action=getlist&id=".$hotel->getidHotel()."' style = 'margin-left: 15px;'>List Room</a>
					".$a."
					</div>
				</div>

				";
			} 
		}
		?>
	</main>
	<script>
		function confirmDelete() {
			return confirm("Bạn có muốn xóa khách sạn này không?");
		}
	</script>
	<?php
	// if(isset($arr['hotels']))
	// {
	// 	echo "<div class='pagination'>";
	// 	for ($i = 1; $i <= $arr['numPage']; $i++) {
	// 		$active = $i == $arr['page'] ? "active" : "";
	// 		echo "<a href='../../../Hotel-Website/Controllers/HotelController.php?action=listHotel&id=".$_SESSION['id_city']."&page=$i' class='$active'>$i</a>";
	// 	}
	// 	echo "</div>";
	// }
	
	?>
</div>

</body>
</html>