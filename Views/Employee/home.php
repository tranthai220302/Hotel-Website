<!DOCTYPE html>
<html>
<head>
	<link rel="icon" href="../../image/icon.png">
	<title>Sochi</title>
	<link rel="stylesheet" type="text/css" href="../../../Hotel-Website/Views/Room/css/ListRoom2.css">
	<link rel="stylesheet" href="../../../Hotel-Website/css/home1.css">
	<link rel="stylesheet" href="../../../Hotel-Website/css/home.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="../../../Hotel-Website/Views/Hotels/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</head>
<style>
.user-menu{
  position: relative;
  z-index: 9999;
}
.img{
	width: 297px;
	height: 162px;
	margin-bottom: 10px;
	border-radius: 5px;
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
		<h5 class="offcanvas-title" id="offcanvasExampleLabel">Add Room</h5>
		<button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
	</div>
	<div class="offcanvas-body">
		<form action='../../../Hotel-Website/Controllers/RoomController.php?action=addRoom' method='post' enctype='multipart/form-data'>
		<div class='form-group'>
			<label class='col-form-label' for='inputDefault' >Name Room</label>
			<input type='text' class='form-control' placeholder='Name Hotel' id='inputDefault' name = 'nameRoom' required>
		</div>
		<div class='form-group'>
			<label class='col-form-label' for='inputDefault' style='margin-top: 30px;'>Price</label>
			<input type='text' class='form-control' placeholder='Price' id='inputDefault' name = 'Price' required>
		</div>
		<div class='form-group'>
			<label class='col-form-label' for='inputDefault' style='margin-top: 30px;'>Adults</label>
			<input type='text' class='form-control' placeholder='Price' id='inputDefault' name = 'adults' required>
		</div>
		<div class='form-group'>
			<label class='col-form-label' for='inputDefault' style='margin-top: 30px;'>Childrens</label>
			<input type='text' class='form-control' placeholder='Price' id='inputDefault' name = 'childrens' required>
		</div>
		<div class='form-group'>
		<label for='exampleTextarea' style='margin-top: 30px;'>Description</label>
		<textarea class='form-control' id='exampleTextarea' rows='3' name = 'description' required></textarea>
		</div>
		<div class='form-group'>
			<label for='formFile' class='form-label' style='margin-top: 30px;'>Chọn Anh</label>
			<input class='form-control' type='file' id='formFile' name='imgRoom' accept='image/*' required>
		</div>
		<div class='dropdown mt-3' style='margin-top: 30px;'>
			
		<button type='submit' class='btn btn-success'>Success</button>
		</form>
		</div>
	</div>
	</div>
	<div class="top">
	<div class="img_body">
	<div class = 'add' style="color:black;">
	<button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
	<i class="fa-solid fa-plus">
	</i>Thêm phòng
	</button>
	</div>
	<main>
	<?php
	if($_SESSION['user']['isHotel']){
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
					if($room->getIsbook() == 0){
					echo "
						<div class = 'ed'>
						<a style = 'margin-right: 40px;margin-left: 40px;'  class='btn btn-primary' data-bs-toggle='offcanvas' href='../../../Hotel-Website/Controllers/RoomController.php?action=delete&id=".$room->getidRoom()."' role='button' aria-controls='offcanvasExample' onclick='return confirmDelete();'>
						Delete
					  </a>
						<button class='btn btn-primary' type='button' data-bs-toggle='offcanvas' data-bs-target='#offcanvasExample".$room->getidRoom()."' aria-controls='offcanvasExample".$room->getidRoom()."'>
						Edit
					</button>
					<div class='offcanvas offcanvas-start' tabindex='-1' id='offcanvasExample".$room->getidRoom()."' aria-labelledby='offcanvasExampleLabel'>
						<div class='offcanvas-header'>
						<h5 class='offcanvas-title' id='offcanvasExampleLabel'>Edit Room</h5>
						<button type='button' class='btn-close text-reset' data-bs-dismiss='offcanvas' aria-label='Close'></button>
					</div>
					<div class='offcanvas-body'>
						<form action='../../../Hotel-Website/Controllers/RoomController.php?action=editRoom&id=".$room->getidRoom()."' method='post' enctype='multipart/form-data'>

						<div class='form-group'>
						<img class = 'img' src='../../../Hotel-Website/image/room/".$room->getImg()."'>
					</div>
						<div class='form-group'>
							<label class='col-form-label' for='inputDefault' >Name Hotel</label>
							<input type='text' class='form-control' placeholder='Name Hotel' id='inputDefault' name = 'nameRoom'  value = '".$room->getnameRoom()."'>
						</div>
						<div class='form-group'>
							<label class='col-form-label' for='inputDefault' style='margin-top: 30px;'>Price</label>
							<input type='text' class='form-control' placeholder='Địa điểm' id='inputDefault' name = 'Price'  value = '".$room->getPrice()."'>
						</div>
						<div class='form-group'>
						<label for='exampleTextarea' style='margin-top: 30px;'>Description</label>
						<textarea class='form-control' id='exampleTextarea' rows='3' name = 'description'  >".$room->getdescription()."</textarea>
						</div>

						<div class='form-group'>
							<label for='formFile' class='form-label' style='margin-top: 30px;'>Chọn Ảnh</label>
							<input class='form-control' type='file' id='formFile' name='imgRoom' accept='image/*' >
						</div>
							
						<button type='submit' class='btn btn-success' style='margin-top: 20px;'>Add</button>
						</form>
					</div>
					</div>
						</div>
						</div>
					";
					}else{
						echo "
						<div class = 'ed'>
						<a style = 'margin-right: 40px;margin-left: 40px;' class='btn btn-warning' data-bs-toggle='offcanvas' href='#' role='button' aria-controls='offcanvasExample' '>
						Delete
					  </a>
						<button class='btn btn-warning' type='button' data-bs-toggle='offcanvas' data-bs-target='#offcanvasExample".$room->getidRoom()."' aria-controls='offcanvasExample".$room->getidRoom()."'>
						Edit
					</button>
						</div>
						</div>
					";
					}
				} 
				
			}
	
	}else if($_SESSION['user']['isAdmin']){
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
					if($room->getIsbook() == 0){
					echo "
						<div class = 'ed'>
						<a class = '' href='../../../Hotel-Website/Controllers/RoomController.php?action=delete&id=".$room->getidRoom()."'></a>
						<a class = '' href='../../../Hotel-Website/Controllers/RoomController.php?action=getRoom&id=".$room->getidRoom()."'></a>
						</div>
						</div>
					";
					}else{
						echo "
						<div class = 'ed'>
						
						</div>
						</div>
					";
					}
				} 
				
			}
	
	}
	?>
	</main>
	</div>
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
	<script>
		function confirmDelete() {
			return confirm("Bạn có muốn xóa khách sạn này không?");
		}
	</script>
		</div>
</body>
</html>
				


				