<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../../image/icon.png" alt="Icon">
    <title>Sochi</title>
    <link rel="stylesheet" href="../css/SearchItemn.css">
    <link rel="stylesheet" href="../css/home1.css">
    <link rel="stylesheet" href="../css/home.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
</head>

<body>
<header class="header" id="navigation-menu">
		<div class="container" style="width: 100%">
			<nav>
				<a href="#" class="logo"> <img src="../image/home/logo.png" alt=""> </a>
				<ul class="nav-menu">
					<?php
						if($_SESSION['user']['isAdmin'] == 1)
						{
							echo "
							<li> <a href='../../Controllers/CityController.php?action=listCity' class='nav-link'>Hotel Manage</a> </li>
							<li> <a href='../../Controllers/UserController.php?action=listUser' class='nav-link'>User Manage</a> </li>
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
  
    <div class="top">
    <div class="hotelContainer">
      <form action="../Controllers/RoomController.php?action=book&is=0" method="post" style="width: 30%">
      <div class="listSearch">
        <h1 class="lsTitle">Room Search</h1>
        <div class="lsItem">
          <label>City</label>
          <input type="text" name = 'city' value="<?php echo $arr['City']->getnameCity(); ?>"/>
        </div>
        <div class="lsItem">
          <label>Start Date</label>
          <input type="date" placeholder="Check-in-Date" name = 'datestart' value = <?php if(isset($isession) && $isession == 1 && isset($_SESSION['search']['startdate'])){echo $_SESSION['search']['startdate'];} ?>>
        </div>
        <div class="lsItem">
          <label>End Date</label>
          <input type="date" placeholder="Check-in-Date" name = 'dateend' value = <?php if(isset($isession) && $isession == 1 && isset($_SESSION['search']['enddate'])){echo $_SESSION['search']['enddate'];} ?>>
        </div>
        <div class="lsItem">
          <label>Adults</label>
              <input
                type="number"
                name = "adult"
                placeholder="Adult"
                value = <?php if(isset($isession) && $isession == 1 && isset($_SESSION['search']['adults'])){echo $_SESSION['search']['adults'];} ?>
              />
        </div>
        <div class="lsItem">
          <label>Childrens</label>
              <input
                type="number"
                name = "children"
                placeholder="Childrends"
                value = <?php if(isset($isession) && $isession == 1 && isset($_SESSION['search']['children'])){echo $_SESSION['search']['children'];} ?>
                require
              />
              <?php
              if(isset($err))
              {
                echo "<p style = 'color: red;'>".$err."</p>";
              }
              ?>
        </div>
        <button>Reserve or Book Now!</button>
      </div>
      </form>
      <div class="hotelWrapper">
        <div class="back" style="display: flex; justify-content: space-between;">
        <h1 class="hotelTitle">Tìm phòng tại <?php echo $arr['Hotels']->getnameHotel(); ?></h1>
        <a href="../../Hotel-Website/Controllers/HotelController.php?action=search&id=<?php echo $_SESSION['id_city_search'] ?>&is=1" style="margin-top: 15px;"><i class="fa-solid fa-backward">  Back</i></a>
        </div>
        <div class="hotelAddress">
          <span>Phòng còn trống: <?php echo $arr['numRoom']; ?></span>
        </div>
        <span class="hotelDistance">
          Excellent location – 500m from center
        </span>
        <span class="hotelPriceHighlight">
          Book a stay over $114 at this property and get a free airport taxi
        </span>
        <div class="hotelImages" style = 'height: 50%;'>
          <?php
          foreach($arr['Rooms'] as $room)
          {
            echo "
            <div class='hotelImgWrapper' style ='margin: 5px'>
            <img
              src = '../image/room/".$room->getImg()."'
              alt=''
              class='hotelImg'
              style = 'height: 100%;'
            />
          </div>";
          }
          ?>

        </div>
        <!-- <div class="hotelDetails">
          <div class="hotelDetailsTexts">
            <h1 class="hotelTitle">Stay in the heart of City</h1>
            <p class="hotelDesc">
              <?php echo $arr['Hotels']->getdescription(); ?>
            </p>
          </div>

        </div> -->
      </div>

    </div>
    </div>
    <script>

        </script>
        <?php include(__DIR__ . '/ReviewComment.php') ?>
</body>
</html>