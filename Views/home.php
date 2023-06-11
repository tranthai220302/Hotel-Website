<?php 
    if (session_status() == PHP_SESSION_NONE) {
    session_start(); // Khởi tạo session
}
?>
<?php
if(isset($_SESSION['user']['isAdmin'])){
  if($_SESSION['user']['isAdmin'] == 1){
    $link = '../Controllers/CityController.php?action=listCity';
    header("Location: $link");
  }else if(isset($_SESSION['user']['isHotel']) && $_SESSION['user']['isHotel'] == 1){
    $link = '../Controllers/UserController.php?action=homeHotel';
    header("Location: $link");
  }
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <link rel="icon" href="../image/icon.png"> 
  <title>Sochi</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../css/home.css">
  <link rel="stylesheet" href="../css/home1.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />


  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.css" integrity="sha512-UTNP5BXLIptsaj5WdKFrkFov94lDx+eBvbKyoe1YAfjeRPC+gT5kyZ10kOHCfNZqEui1sxmqvodNUx3KbuYI/A==" crossorigin="anonymous"
    referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>

</head>
<?php 
  $idUser = isset($_SESSION['user']['id']) ? $_SESSION['user']['id'] : '10';
  $srcImg =isset($_SESSION['user']['avatar']) ? $_SESSION['user']['avatar'] : 'hinh-anh-avatar-trang-cho-nu-de-thuong.jpg';
  $phonNumber = isset($_SESSION['user']['numberphone']) ? $_SESSION['user']['numberphone'] : '';
  $username = isset($_SESSION['user']['username']) ? $_SESSION['user']['username'] : '';
  $address = isset($_SESSION['user']['address']) ? $_SESSION['user']['address'] : '';
  $isAdmin = isset($_SESSION['user']['isAdmin'])  ? $_SESSION['user']['isAdmin']: null;
  $isHotel = isset($_SESSION['user']['isHotel'])  ? $_SESSION['user']['isHotel']: null;

?>
<style>

</style>
<body>
  <!-- home -->
  <header class="header" id="navigation-menu">
    <div class="container">
    <nav>
        <a href="#" class="logo"> <img src="../image/home/logo.png" alt=""> </a>
        <ul class="nav-menu">
          <!-- <li> <a href="#home" class="nav-link">Home</a> </li>
          <li> <a href="#about" class="nav-link">About</a> </li>
          <li> <a href="#room" class="nav-link">Rooms</a> </li>
          <li> <a href="#map" class="nav-link">Map</a> </li>
          <a href="../Controllers/CityController.php?action=listHotel"></a> -->
          <?php 
          if(!isset($isAdmin))
          {
            echo "
            <li> <a href='#home' class='nav-link'>Home</a> </li>
            <li> <a href='#about' class='nav-link'>About</a> </li>
            <li> <a href='#room' class='nav-link'>Rooms</a> </li>
            <li> <a href='#map' class='nav-link'>Map</a> </li>
            <a href='../Controllers/CityController.php?action=listHotel'></a>
            <li> <a href='../Views/login.php' class='nav-link'>Login</a> </li>
            <li> <a href='../Views/register.php' class='nav-link'>Register</a> </li>";
          }else if($isAdmin == 1)
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
            }else if($isHotel == 1){
              echo "
              <li><a href='../../../Hotel-Website/Controllers/UserController.php?action=homeHotel'>Home</a></li>
              <li><a href='../../../Hotel-Website/Controllers/UserController.php?action=home1'>Hotel Manage</a></li>
              <li><a href='../../../Hotel-Website/Controllers/UserController.php?action=userbookRoom'>List User</a></li>
              <li><a href='../../../Hotel-Website/Views/Thongke.php'>Doanh Thu</a></li>
              <a href='../Controllers/CityController.php?action=listHotel'></a> 
              <li>
              <div class='user-menu'>
              <div class='username'>
              <img src='../../Hotel-Website/image/user/".$srcImg."' alt='' class='avatar'>
              </div>
              <ul class='menu'>
                  <li><a href='../Views/User/ThongtinUser.php'>Thông tin cá nhân</a></li>
                  <li><a href='../Controllers/RoomController.php?action=getRoombyUser&id=".$idUser."'>Xem phòng đã đặt</a></li>
                  <li><a href='../Controllers/UserController.php?action=logout'>Đăng xuất</a></li>
              </ul>
            </div>
              </li>";
            }else if($isHotel == 0 && $isAdmin == 0){
              echo "
              <li> <a href='#home' class='nav-link'>Home</a> </li>
              <li> <a href='#about' class='nav-link'>About</a> </li>
              <li> <a href='#room' class='nav-link'>Rooms</a> </li>
              <li> <a href='#map' class='nav-link'>Map</a> </li>
              <li>
              <div class='user-menu'>
              <div class='username'>
              <img src='../../Hotel-Website/image/user/".$srcImg."' alt='' class='avatar'>
              </div>
              <ul class='menu'>
                  <li><a href='../Views/User/ThongtinUser.php'>Thông tin cá nhân</a></li>
                  <li><a href='../Controllers/RoomController.php?action=getRoombyUser&id=".$idUser."'>Xem phòng đã đặt</a></li>
                  <li><a href='../Controllers/UserController.php?action=logout'>Đăng xuất</a></li>
              </ul>
            </div>
              </li>";
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
  <script>
    function img(anything) {
      document.querySelector('.slide').src = anything;
    }

    function change(change) {
      const line = document.querySelector('.image');
      line.style.background = change;
    }
  </script>
  <!-- gioi thieu -->
  <form action="../../Hotel-Website/Controllers/HotelController.php?action=search" method="post">
  <section class="book">
    <div class="container flex">
      <div class="input grid">
      <div class="box">
          <label style="color: white;">City</label>
          <select class="numStar" name="City" required>
          <option value="">Select City</option>
          <?php
          if(isset($arr['Citys']))
          {
            foreach($arr['Citys'] as $city)
            {
              echo "<option value='".$city->getidCity()."'>".$city->getnameCity()."</option>";
  
            }
          }else{
            include_once('../Views/homedata.php');
            foreach($arr['Citys'] as $city)
            {
              echo "<option value='".$city->getidCity()."'>".$city->getnameCity()."</option>";
  
            }
          }
          ?>
          </select>
        </div>
        <div class="box">
          <label style="color: white;">Check-in</label>
          <input type="date" placeholder="Check-in-Date" name = 'Startdate' require>
        </div>
        <div class="box">
          <label style="color: white;">Check-out</label>
          <input type="date" placeholder="Check-out-Date" name = 'Enddate' require>
        </div>
        <div class="box">
          <label style="color: white;">Adults</label> <br>
          <input type="number" placeholder="0" name = 'Adults' require>
        </div>
        <div class="box">
          <label style="color: white;">Children</label> <br>
          <input type="number" placeholder="0" name = 'Childrens' require>
        </div>
        <div class="box">
        <label style="color: #263760">Children</label> <br>
          <input class="btn" type="submit" value="SEARCH">
        </div>
      </div>


    </div>
  </section>
  </form>
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
  <!-- gioi thieu  -->
  <!-- danh sach thanh pho -->
  <section class="room top" id="room">
    <div class="container">
      <div class="heading_top flex1">
        <div class="heading">
          <h5>RAISING COMFORT TO THE HIGHEST LEVEL</h5>
          <h2>Cities</h2>
        </div>
      </div>
      <div class="featured">
      <?php
    if(isset($arr['City_numHotel']))
    {
      foreach($arr['City_numHotel'] as $city)
      {
        echo "
        <a href='../../Hotel-Website/Controllers/HotelController.php?action=search&id=".$city->getidCity()."&is=1'>
          <div class='featuredItem'>
            <img
              src='".$city->getImg()."'
              alt=''
              class='featuredImg'
            />
            <div class='featuredTitles'>
              <h1>".$city->getnameCity()."</h1>
              <h2>".$city->getnumHotels()." Hotels</h2>
            </div>
          </div>
          </a>";
      }
    }else{
      include_once('../Views/homedata.php');
      foreach($arr['City_numHotel'] as $city)
      {
        echo "
        <a href='../../Hotel-Website/Controllers/HotelController.php?action=search&id=".$city->getidCity()."&is=1'>
          <div class='featuredItem'>
            <img
              src='".$city->getImg()."'
              alt=''
              class='featuredImg'
            />
            <div class='featuredTitles'>
              <h1>".$city->getnameCity()."</h1>
              <h2>".$city->getnumHotels()." Hotels</h2>
            </div>
          </div>
          </a>";
      } 
    }
    ?>
      </div>
    </div>
  </section>
  
  <!-- list kieu khach san -->
  <div class="heading_top_1" style="margin-top: 6%; ">
    <div class="heading">
      <h5>RAISING COMFORT TO THE HIGHEST LEVEL</h5>
      <h2>Rooms $ Suites</h2>
    </div>
  </div>
  <div class="pList">
    
    <?php
    if(isset($arr['Hotels']))
    {
      foreach($arr['Hotels'] as $hotel)
      {
        echo "
        <a href='../Controllers/HotelController.php?action=getHotelHome&id=".$hotel->getidHotel()."'>
          <div class='pListItem'>
            <img
              src='../image/hotel/".$hotel->getImg()."'
              alt=''
              class='pListImg'
            />
            <div class='pListTitles'>
              <h1>".$hotel->getnameHotel()."</h1>
              <h2>".$hotel->getnumStart()."<i class='fa-solid fa-star' style='color: yellow;'></i></h2>
            </div>
          </div>
          </a>";
      }
    }else{
      include_once('../Views/homedata.php');
      foreach($arr['Hotels'] as $hotel)
      {
        echo "
        <a href='../Controllers/HotelController.php?action=getHotelHome&id=".$hotel->getidHotel()."'>
          <div class='pListItem'>
            <img
              src='../image/hotel/".$hotel->getImg()."'
              alt=''
              class='pListImg'
            />
            <div class='pListTitles'>
              <h1>".$hotel->getnameHotel()."</h1>
              <h2>".$hotel->getnumStart()."<i class='fa-solid fa-star' style='color: yellow;'></i></h2>
            </div>
          </div>
          </a>";
      } 
    }
    ?>
  </div>

  <!-- map -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.js" integrity="sha512-gY25nC63ddE0LcLPhxUJGFxa2GoIyA5FLym4UJqHDEMHjp8RET6Zn/SHo1sltt3WuVtqfyxECP38/daUc/WVEA==" crossorigin="anonymous"
    referrerpolicy="no-referrer"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous"
    referrerpolicy="no-referrer"></script>
  <script>
    $('.owl-carousel').owlCarousel({
      loop: true,
      margin: 10,
      nav: true,
      dots: false,
      navText: ["<i class='fas fa-chevron-left'></i>", "<i class='fas fa-chevron-right'></i>"],
      responsive: {
        0: {
          items: 1
        },
        768: {
          items: 2
        },
        1000: {
          items: 4
        }
      }
    })
  </script>
<!-- map -->
  <section class="map top" id="map">
  <div class="heading">
      <h5>RAISING COMFORT TO THE HIGHEST LEVEL</h5>
      <h2>Map</h2>
    </div>
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3833.837342332594!2d108.14731717495643!3d16.073928339312477!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x314218d68dff9545%3A0x714561e9f3a7292c!2zVHLGsOG7nW5nIMSQ4bqhaSBo4buNYyBCw6FjaCBLaG9hIC0gxJDhuqFpIGjhu41jIMSQw6AgTuG6tW5n!5e0!3m2!1svi!2s!4v1685629927367!5m2!1svi!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
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
</body>

</html>