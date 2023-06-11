<!DOCTYPE html>

	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="icon" href="../../../image/icon.png">
	<title>Sochi</title>
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
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
	<link rel="stylesheet" href="../../../../Hotel-Website/Views/Employee/home/css/themify-icons.css">
	<!-- Flat Icon -->
	<link rel="stylesheet" href="../../../../Hotel-Website/Views/Employee/home/css/flaticon.css">
	<!-- Icomoon -->
	<link rel="stylesheet" href="../../../../Hotel-Website/Views/Employee/home/css/icomoon.css">
	<!-- Flexslider  -->
	<link rel="stylesheet" href="../../../../Hotel-Website/Views/Employee/home/css/flexslider.css">
	
	<!-- Style -->
	<!-- <link rel="stylesheet" href="../../../../Hotel-Website/Views/Employee/home/css/style.css"> -->
	<link rel="stylesheet" href="../../../../Hotel-Website/Views/Employee/home/css/style1.css">
	<link rel="stylesheet" href="../../../../Hotel-Website/css/home1.css">
	<link rel="stylesheet" href="../../../../Hotel-Website/css/home.css">

	<!-- Modernizr JS -->
	<script src="../../../../Hotel-Website/Views/Employee/home/js/modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="../../../../Hotel-Website/Views/Employee/home/js/respond.min.js"></script>
	<![endif]-->

</head>
<style>
	/*--------------header--------*/
header {
  height: 60px;
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  background-color: #263760;
  border-bottom: 0.5px solid #f8f8f9;
  z-index: 5;
}

.logo img {
  width: 120px;
}

header nav {
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 10px 0;
}

.hambuger {
  display: none;
}

.slide{
  width: 100%;
}

.bar {
  display: block;
  width: 25px;
  height: 3px;
  margin: 5px auto;
  transition: all 0.3s ease-in-out;
  background-color: #fff;
}

header ul {
  display: flex;
  justify-content: space-between;
  align-items: center;
}

header ul li {
  margin-left: 3rem;
}

header ul li a {
  font-size: 1.2rem;
  font-weight: 400;
  color: white;
  transition: 0.5s;
  text-decoration: none;
}

header ul li a:hover {
  color: #C1B086;
}

@media only screen and (max-width: 768px) {
  header ul {
    display: block;
    position: fixed;
    left: -100%;
    top: 5rem;
    flex-direction: column;
    background-color: #fff;
    width: 100%;
    border-radius: 10px;
    text-align: center;
    transition: 0.5s;
    box-shadow: 0 10px 27px rgba(0, 0, 0, 0.05);
    z-index: 20;
  }

  header ul.active {
    left: 0%;
  }

  header ul li {
    margin: 2.5rem 0;
  }

  header ul li a {
    color: black;
  }

  .hambuger {
    display: block;
    cursor: pointer;
  }

  .hambuger.active .bar:nth-child(2) {
    opacity: 0;
  }

  .hambuger.active .bar:nth-child(1) {
    transform: translateY(8px) rotate(45deg);
  }

  .hambuger.active .bar:nth-child(3) {
    transform: translateY(-8px) rotate(-45deg);
  }
}

/*--------------header--------*/
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
.title{
  text-align: center;
  margin-top: 20px;
  color: rgb(38 55 96);
  text-shadow: 1px 1px 2px rgb(255, 255, 255);
  font-size: 35px;
  }
</style>
<body>
<header class="header" id="navigation-menu">
		<div class="container">
			<nav>
				<a href="../../../Hotel-Website/Controllers/UserController.php?action=home2" class="logo"> <img src="../image/home/logo.png" alt=""> </a>
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
              <li><a href='../../../Hotel-Website/Views/Thongke.php'>Doanh Thu</a></li>
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

  <section class="home" id="home">
    <div class="head_container">
      <div class="box">
        <div class="text">
          <h1>Sochi xin chào</h1>
          <p>Mỗi lần đi du lịch ở Sapa tôi và gia đình đều ở khách sạn này. Khách sạn tọa lạc tại đỉnh núi. Khách sạn rất rộng. Màu chủ đạo là màu trắng. Vì là khách sạn tại vùng núi nên không gian ở đây được thiết kế rất hòa hợp với thiên nhiên. Sân của khách sạn có nhiều loại hoa khiến khách du lịch cảm thấy rất thu hút. Khi ở tại khách sạn, Khách sạn có phần sảnh khá rộng. </p>
          <button style="margin-bottom: 20px;">MORE INFO</button>
        </div>
      </div>
      <div class="image">
        <img src="../image/home/home1.jpg" class="slide">
      </div>
      <div class="image_item">

      </div>
    </div>
  </section>

  <section class="about top" id="about">
    <div class="container flex">
      <div class="left">
        <div class="img">
          <img src="../image/home/a1.jpg" alt="" class="image1">
          <img src="../image/home/a2.jpg" alt="" class="image2">
        </div>
      </div>
      <div class="right">
        <div class="heading">
          <h5>RAISING COMFOMRT TO THE HIGHEST LEVEL</h5>
          <h2>Welcome to Sochi</h2>
          <p>Được thành lập vào năm 2023 ở Việt Nam, Sochi đã phát triển từ một nhóm khởi nghiệp nhỏ ở Việt Nam để trở thành một trong các công ty hàng đầu thế giới cung cấp các dịch vụ du lịch dựa trên nền tảng số hóa. Sứ mệnh của Sochi là giúp mọi người trải nghiệm thế giới dễ dàng hơn.</p>
          <p>Bằng cách đầu tư vào công nghệ giúp loại bỏ những phiền toái khi du lịch, Sochi kết nối hàng triệu du khách với các trải nghiệm đáng nhớ, nhiều lựa chọn vận chuyển và các chỗ nghỉ tuyệt vời - từ dạng nhà ở cho đến khách sạn và nhiều hơn nữa. Là một trong những thị trường du lịch lớn nhất thế giới cho cả những thương hiệu lớn và doanh nghiệp ở mọi quy mô, Sochi giúp các chỗ nghỉ trên khắp thế giới kết nối với khách hàng toàn cầu và phát triển doanh nghiệp của họ.</p>

        </div>
      </div>
    </div>
  </section>

<!-- footer -->
  <footer>
    <div class="footer">
      <div class="social">
        <i class="fa-brands fa-square-facebook"></i>
        <i class="fa-brands fa-square-instagram"></i>
        <i class="fa-brands fa-linkedin"></i>
        <i class="fa-brands fa-square-twitter"></i>
      </div>
      <p>Copyright <i class="fa-regular fa-copyright"></i> by Sochi</p>
    </div>
  </footer>
	
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