<!DOCTYPE html>

	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Luxe &mdash; 100% Free Fully Responsive HTML5 Template by FREEHTML5.co</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Free HTML5 Template by FREEHTML5.CO" />
	<meta name="keywords" content="free html5, free template, free bootstrap, html5, css3, mobile first, responsive" />
	<meta name="author" content="FREEHTML5.CO" />
	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />

	<!-- Stylesheets -->
	<!-- Dropdown Menu -->
	<link rel="stylesheet" href="../../../../Hotel-Website/Views/Employee/home/css/superfish.css">
	<!-- Owl Slider -->
	<!-- <link rel="stylesheet" href="../../../../Hotel-Website/Views/Employee/home/css/owl.carousel.css"> -->
	<!-- <link rel="stylesheet" href="../../../../Hotel-Website/Views/Employee/home/css/owl.theme.default.min.css"> -->
	<!-- Date Picker -->
	<link rel="stylesheet" href="../../../../Hotel-Website/Views/Employee/home/css/bootstrap-datepicker.min.css">
	<!-- CS Select -->
	<link rel="stylesheet" href="../../../../Hotel-Website/Views/Employee/home/css/cs-select.css">
	<link rel="stylesheet" href="../../../../Hotel-Website/Views/Employee/home/css/cs-skin-border.css">

	<!-- Themify Icons -->
	<link rel="stylesheet" href="../../../../Hotel-Website/Views/Employee/home/css/themify-icons.css">
	<!-- Flat Icon -->
	<link rel="stylesheet" href="../../../../Hotel-Website/Views/Employee/home/css/flaticon.css">
	<!-- Icomoon -->
	<link rel="stylesheet" href="../../../../Hotel-Website/Views/Employee/home/css/icomoon.css">
	<!-- Flexslider  -->
	<link rel="stylesheet" href="../../../../Hotel-Website/Views/Employee/home/css/flexslider.css">
	
	<!-- Style -->
	<link rel="stylesheet" href="../../../../Hotel-Website/Views/Employee/home/css/style.css">
	
	<link rel="stylesheet" href="../../../../Hotel-Website/css/home1.css">

	<!-- Modernizr JS -->
	<script src="../../../../Hotel-Website/Views/Employee/home/js/modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="../../../../Hotel-Website/Views/Employee/home/js/respond.min.js"></script>
	<![endif]-->

</head>
<style>
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
</style>
<body>
	<div class="img" style="background-color: #003580;">
	<div class="navbar">
		<div class="navContainer">
		<a href="../../../Hotel-Website/Controllers/UserController.php?action=home2"><span class="logo" style="color: black;">Sochi</span></a>

		  <?php
          if($_SESSION['user']['isHotel'] == 1)
          {
           
            echo "

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
	</div>

	<div id="featured-hotel" class="fh5co-bg-color">
		<div class="container">
			
			<div class="row">
				<div class="col-md-12">
					<div class="section-title text-center">
						<h2>WELCOME HOTEL <?php
							echo $hotel->getnameHotel();
						?>
						
						</h2>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="feature-full-1col">
					<div class="image" style="background-image: url(<?php echo $city->getImg() ?>);">
						<div class="descrip text-center">
							<p><small>Welcome</small></p>
						</div>
					</div>
					<div class="desc">
						<h3><?php echo $city->getnameCity() ?></h3>
						<p><?php echo $city->getdescription() ?></p>
						<p><a href="#" class="btn btn-primary btn-luxe-primary">Read More <i class="ti-angle-right"></i></a></p>
					</div>
				</div>

				<div class="feature-full-2col">
					<?php
					$count = 0;
					foreach($arr['rooms'] as $room)
					{
						$isbook = $room->getIsbook() == 0 ? "Phòng trống" : "Đã có người đặt";
						echo "
						<div class='f-hotel'>
						<div class='image' style='background-image: url(../../../Hotel-Website/image/room/".$room->getImg().");'>
							<div class='descrip text-center'>
								<p><small>For as low as</small><span>".$room->getPrice()."/night</span></p>
							</div>
						</div>
						<div class='desc'>
							<h3>".$room->getnameRoom()."</h3>
							<p>".$room->getdescription()."</p>
						</div>
						</div>
						";
					    $count++;
						if ($count == 2) {
							break;
						}

					}
					?>
				</div>
			</div>

		</div>
	</div>

	<div id="hotel-facilities">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="section-title text-center">
						<h2>Hotel Facilities</h2>
					</div>
				</div>
			</div>

			<div id="tabs">
				<nav class="tabs-nav">
					<a href="#" class="active" data-tab="tab1">
						<i class="flaticon-restaurant icon"></i>
						<span>Restaurant</span>
					</a>
					<a href="#" data-tab="tab2">
						<i class="flaticon-cup icon"></i>
						<span>Bar</span>
					</a>
					<a href="#" data-tab="tab3">
					
						<i class="flaticon-car icon"></i>
						<span>Pick-up</span>
					</a>
					<a href="#" data-tab="tab4">
						
						<i class="flaticon-swimming icon"></i>
						<span>Swimming Pool</span>
					</a>
					<a href="#" data-tab="tab5">
						
						<i class="flaticon-massage icon"></i>
						<span>Spa</span>
					</a>
					<a href="#" data-tab="tab6">
						
						<i class="flaticon-bicycle icon"></i>
						<span>Gym</span>
					</a>
				</nav>

			</div>
		</div>
	</div>



	<footer id="footer" class="fh5co-bg-color">
		<div class="container">
			<div class="row">
				<div class="col-md-3">
					<div class="copyright">
						<p><small>&copy; 2016 Free HTML5 Template. <br> All Rights Reserved. <br>
						Designed by <a href="http://freehtml5.co" target="_blank">FreeHTML5.co</a> <br> Demo Images: <a href="http://unsplash.com/" target="_blank">Unsplash</a></small></p>
					</div>
				</div>
				<div class="col-md-6">
					<div class="row">
						<div class="col-md-3">
							<h3>Company</h3>
							<ul class="link">
								<li><a href="#">About Us</a></li>
								<li><a href="#">Hotels</a></li>
								<li><a href="#">Customer Care</a></li>
								<li><a href="#">Contact Us</a></li>
							</ul>
						</div>
						<div class="col-md-3">
							<h3>Our Facilities</h3>
							<ul class="link">
								<li><a href="#">Resturant</a></li>
								<li><a href="#">Bars</a></li>
								<li><a href="#">Pick-up</a></li>
								<li><a href="#">Swimming Pool</a></li>
								<li><a href="#">Spa</a></li>
								<li><a href="#">Gym</a></li>
							</ul>
						</div>
						<div class="col-md-6">
							<h3>Subscribe</h3>
							<p>Sed cursus ut nibh in semper. Mauris varius et magna in fermentum. </p>
							<form action="#" id="form-subscribe">
								<div class="form-field">
									<input type="email" placeholder="Email Address" id="email">
									<input type="submit" id="submit" value="Send">
								</div>
							</form>
						</div>
					</div>
				</div>
				<div class="col-md-3">
					<ul class="social-icons">
						<li>
							<a href="#"><i class="icon-twitter-with-circle"></i></a>
							<a href="#"><i class="icon-facebook-with-circle"></i></a>
							<a href="#"><i class="icon-instagram-with-circle"></i></a>
							<a href="#"><i class="icon-linkedin-with-circle"></i></a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</footer>

	</div>
	<!-- END fh5co-page -->

	</div>
	<!-- END fh5co-wrapper -->
	
	<!-- Javascripts -->
	<script src="../../../../Hotel-Website/Views/Employee/home/js/jquery-2.1.4.min.js"></script>
	<!-- Dropdown Menu -->
	<script src="../../../../Hotel-Website/Views/Employee/home/js/hoverIntent.js"></script>
	<script src="../../../../Hotel-Website/Views/Employee/home/js/superfish.js"></script>
	<!-- Bootstrap -->
	<script src="../../../../Hotel-Website/Views/Employee/home/js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="../../../../Hotel-Website/Views/Employee/home/js/jquery.waypoints.min.js"></script>
	<!-- Counters -->
	<script src="../../../../Hotel-Website/Views/Employee/home/js/jquery.countTo.js"></script>
	<!-- Stellar Parallax -->
	<script src="../../../../Hotel-Website/Views/Employee/home/js/jquery.stellar.min.js"></script>
	<!-- Owl Slider -->
	<!-- // <script src="../../../../Hotel-Website/Views/Employee/home/js/owl.carousel.min.js"></script> -->
	<!-- Date Picker -->
	<script src="../../../../Hotel-Website/Views/Employee/home/js/bootstrap-datepicker.min.js"></script>
	<!-- CS Select -->
	<script src="../../../../Hotel-Website/Views/Employee/home/js/classie.js"></script>
	<script src="../../../../Hotel-Website/Views/Employee/home/js/selectFx.js"></script>
	<!-- Flexslider -->
	<script src="../../../../Hotel-Website/Views/Employee/home/js/jquery.flexslider-min.js"></script>

	<script src="../../../../Hotel-Website/Views/Employee/home/js/custom.js"></script>

</body>
</html>