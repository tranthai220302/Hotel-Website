<?php 
    if (session_status() == PHP_SESSION_NONE) {
    session_start(); // Khởi tạo session
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
          <li> <a href="#home" class="nav-link">Home</a> </li>
          <li> <a href="#about" class="nav-link">About</a> </li>
          <li> <a href="#room" class="nav-link">Rooms</a> </li>
          <li> <a href="#map" class="nav-link">Map</a> </li>
          <a href="../Controllers/CityController.php?action=listHotel"></a>
          <?php 
          if(!isset($isAdmin))
          {
            echo "<li> <a href='../Views/login.php' class='nav-link'>Login</a> </li>
            <li> <a href='../Views/register.php' class='nav-link'>Register</a> </li>";
          }else if($isAdmin == 1)
            {
              echo "
              <li>
              <div class='user-menu'>
              <div class='username'>
              <img src='../../Hotel-Website/image/user/".$srcImg."' alt='' class='avatar'>
              </div>
              <ul class='menu'>
                  <li><a href='../Controllers/CityController.php?action=listCity'>Quan ly khach san</a></li>
                  <li><a href='../Controllers/UserController.php?action=listUser'>Danh sách người dùng</a></li>
                  <li><a href='../Controllers/UserController.php?action=detailUser'>Thông tin người dùng</a></li>
                  <li><a href='../Controllers/RoomController.php?action=getRoombyUser&id=".$idUser."'>Xem phòng đã đặt</a></li>
                  <li><a href='../Controllers/UserController.php?action=logout'>Đăng xuất</a></li>
              </ul>
            </div>
              </li>";
            }else if($isAdmin == 0){
              echo "
              <li>
              <div class='user-menu'>
              <div class='username'>
              <img src='../../Hotel-Website/image/user/".$srcImg."' alt='' class='avatar'>
              </div>
              <ul class='menu'>
                  <li><a href='../Views/User/ThongtinUser.php'>Thông tin ngươi dùng</a></li>
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
          <h1>Hello.Salut.Hola</h1>
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
    <div class="flex">
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
          <h2>Welcome to Luviana Hotel Resort</h2>
          <p>Khách sạn Equatorial là một trong những khách sạn 5 sao nổi tiếng tại thành phố Hồ Chí Minh. Ở đây các bạn có thể tận hưởng trọn vẹn sự thoải mái và tiện nghi trong suốt quá trình nghỉ dưỡng. Khách sạn có vị trí địa lí thuận lợi cho việc di chuyển đến sân bay và các khu trung tâm thương mại. Khách sạn có tổng cộng 333 phòng dành cho khách tiêu chuẩn và hạng sang. Các phòng được thiết kế đẹp mắt và tinh tế. Mỗi phòng đều có những thiết bị cơ bản như tivi, điều hòa, tủ lạnh, máy sấy tóc,…Không gian tại khách sạn vô cùng sạch sẽ và mát mẻ. Thái độ phục vụ của nhân viên rất nhiệt tình. </p>
          <p>Tại khách sạn còn có phà hàng và quán cà phê tiện lợi cho nhu cầu của khách đặt phòng.Tại đây có có phòng họp và phòng hội nghị lớn có thể chứa đến hơn 1000 người. Khi đặt phòng tại Equatorial, quý khách hàng còn có thể tham gia trung tâm thể thao đẳng cấp thế giới với hồ bơi ngoài trời, phòng thể hình và quầy bar nổi trên mặt nước.Lựa chọn cho mình một khách sạn tuyệt vời bạn sẽ có một kỳ nghỉ xứng đáng.</p>

        </div>
      </div>
    </div>
  <!-- </section>
  gioi thieu -->
  <!-- danh sach thanh pho -->
  <section class="room top" id="room">
    <div class="container">
      <div class="heading_top flex1">
        <div class="heading">
          <h5>RAISING COMFORT TO THE HIGHEST LEVEL</h5>
          <h2>Rooms & Suites</h2>
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
    <!-- gioi thiueu -->
  </section>
  <!-- <section class="wrapper wrapper2 top">
    <div class="container">
      <div class="text">
        <div class="heading">
          <h5>AT THE HEART OF COMMUNICATION</h5>
          <h2>People Say</h2>
        </div>

        <div class="para">
          <p>Tại khách sạn còn có phà hàng và quán cà phê tiện lợi cho nhu cầu của khách đặt phòng.Tại đây có có phòng họp và phòng hội nghị lớn có thể chứa đến hơn 1000 người. Khi đặt phòng tại Equatorial, quý khách hàng còn có thể tham gia trung tâm thể thao đẳng cấp thế giới với hồ bơi ngoài trời, phòng thể hình và quầy bar nổi trên mặt nước.Lựa chọn cho mình một khách sạn tuyệt vời bạn sẽ có một kỳ nghỉ xứng đáng. </p>

          <div class="box flex">
            <div class="img">
              <img src="../image/home/c.jpg" alt="">
            </div>
            <div class="name">
              <h5>KATE PALMER</h5>
              <h5>IDAHO</h5>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section> -->

  <!-- danh sach khach san gia re -->

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
    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d14131.036667732067!2d85.32395955!3d27.69383745!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2snp!4v1637755481449!5m2!1sen!2snp" width="600" height="450" style="border:0;"
      allowfullscreen="" loading="lazy"></iframe>
  </section>
<!-- footer -->
  <footer>
    <div class="footer">
      <div class="fLists">
        <ul class="fList">
          <li class="fListItem">Countries</li>
          <li class="fListItem">Regions</li>
          <li class="fListItem">Cities</li>
          <li class="fListItem">Districts</li>
          <li class="fListItem">Airports</li>
          <li class="fListItem">Hotels</li>
        </ul>
        <ul class="fList">
          <li class="fListItem">Homes </li>
          <li class="fListItem">Apartments </li>
          <li class="fListItem">Resorts </li>
          <li class="fListItem">Villas</li>
          <li class="fListItem">Hostels</li>
          <li class="fListItem">Guest houses</li>
        </ul>
        <ul class="fList">
          <li class="fListItem">Unique places to stay </li>
          <li class="fListItem">Reviews</li>
          <li class="fListItem">Unpacked: Travel articles </li>
          <li class="fListItem">Travel communities </li>
          <li class="fListItem">Seasonal and holiday deals </li>
        </ul>
        <ul class="fList">
          <li class="fListItem">Car rental </li>
          <li class="fListItem">Flight Finder</li>
          <li class="fListItem">Restaurant reservations </li>
          <li class="fListItem">Travel Agents </li>
        </ul>
        <ul class="fList">
          <li class="fListItem">Curtomer Service</li>
          <li class="fListItem">Partner Help</li>
          <li class="fListItem">Careers</li>
          <li class="fListItem">Sustainability</li>
          <li class="fListItem">Press center</li>
          <li class="fListItem">Safety Resource Center</li>
          <li class="fListItem">Investor relations</li>
          <li class="fListItem">Terms & conditions</li>
        </ul>
      </div>
    </div>
  </footer>
</body>

</html>