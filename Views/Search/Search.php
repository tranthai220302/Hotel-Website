<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../../image/icon.png" alt="Icon">
    <title>Sochi</title>
    <link rel="stylesheet" href="../../../Hotel-Website/css/Search.css">
    <link rel="stylesheet" href="../css/home1.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.css" integrity="sha512-UTNP5BXLIptsaj5WdKFrkFov94lDx+eBvbKyoe1YAfjeRPC+gT5kyZ10kOHCfNZqEui1sxmqvodNUx3KbuYI/A==" crossorigin="anonymous"
      referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw=="
      crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<style>
  .search{
    height: 100px;
  }
</style>
<body>
  <div class="navbar">
    <div class="navContainer">
      <a href="../../../Hotel-Website/Views/home.php" class="logo"> <img src="../../image/home/logo.png" alt="logo"></a>
		  <?php
      if(!isset($_SESSION['user']['isAdmin']))
      {
        echo "      
        <div class='navItems'>
        <a href='../../../Hotel-Website/Views/register.php'><button style='background-color: gray;' class='navButton'>Register</button></a>
        <a href='../../../Hotel-Website/Views/login.php'><button style='background-color: gray;' class='navButton'>Login</button></a>
      </div>";
      }else if($_SESSION['user']['isAdmin'] == 1)
          {
           
            echo "

            <div class='user-menu'>
            <div class='username'>
            <img src='../../../Hotel-Website/image/user/".$_SESSION['user']['avatar']."' alt='' class='avatar'>
            </div>
            <ul class='menu'>
                <li><a href='../../../Hotel-Website/Controllers/CityController.php?action=listCity'>Quản lý khách sạn</a></li>
                <li><a href='../../../Hotel-Website/Controllers/UserController.php?action=listUser'>Danh sách người dùng</a></li>
                <li><a href='../../../Hotel-Website/Views/User/ThongtinUser.php'>Thông tin người dùng</a></li>
                <li><a href='../Controllers/RoomController.php?action=getRoombyUser&id=".$_SESSION['user']['id']."'>Xem phòng đã đặt</a></li> 
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
                <li><a href='../../../Hotel-Website/Views/User/ThongtinUser.php'>Thông tin người dùng</a></li>
                <li><a href='../../../Hotel-Website/Controllers/RoomController.php?action=getRoombyUser&id=".$_SESSION['user']['id']."'>Xem phòng đã đặt</a></li>
                <li><a href='../../../Hotel-Website/Controllers/UserController.php?action=logout'>Đăng xuất</a></li>
            </ul>
          </div>";
          }

      ?>
    </div>
  </div>
    <!-- <div class="header">
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
    
              <h1 class="headerTitle">
                A lifetime of discounts? It's Genius.
              </h1>
              <p class="headerDesc">
                
              </p>         
          </div>
      </div> -->
      
      <div class="listContainer">
        <div class="listWrapper">
          <form action="../../../Hotel-Website/Controllers/HotelController.php?action=searchItem" method="post">
            <div class="listSearch" style="padding: 10px 50px;">
            <h1 class="lsTitle">Search</h1>
            <div class="lsItem">
              <label>City</label>
              <input style="" type="text" name = 'city' value="<?php if(isset($arr['nameCity'])){
                echo $arr['nameCity'];
              }; ?>" readonly/>
            </div>
            <div class="lsItem">
            <label>Type</label>
            <select id="search" name="search" required style="height: 34px; border: none  ;">
              <option value="address">Address</option>
              <option value="nameHotel">Name Hotel</option>
              <option value="numStart">Number Star</option>
            </select>
            </div>
            <div class="lsItem">
              <label>Request search</label>
              <input type="text" name = 'address' require/>
            </div>
            <button style="margin-top: 15px;">Search</button>
              </div>
          </form>
          <div class="listResult">
            <a href="../../image/hotel/"></a>
          <?php
              if(is_string($arr))
              {
                echo "<div style = 'color: red;''>$arr</div>";
              }else{
              foreach($arr['hotels'] as $hotel)
                {
                  echo "
                  <div class='searchItem'>
                  <img
                    src='../../../Hotel-Website/image/hotel/".$hotel->getImg()."'
                    alt=''
                    class='siImg'
                  />
                  <div class='siDesc'>
                    <h1 class='siTitle'>".$hotel->getnameHotel()."</h1>
                    <span class='siTaxiOp'>Address: ".$hotel->getAddress()."</span>
                    <span class='siSubtitle'>
                      Studio Apartment with Air conditioning
                    </span>
                    <span class='siFeatures'>
                    ".$hotel->getdescription()."
                    </span>
                    <span class='siCancelOp'>Free cancellation </span>
                    <span class='siCancelOpSubtitle'>
                      You can cancel later, so lock in this great price today!
                    </span>
                  </div>
                  <div class='siDetails'>
                    <div class='siRating'>
                      <span>Star</span>
                      <button> ".$hotel->getnumStart()."</button>
                    </div>
                    <div class='siDetailTexts'>
                      <span class='siTaxOp'>Includes taxes and fees</span>
                      <a href='./SearchItem.php'>
                      <a href='../Controllers/HotelController.php?action=getHotelHome&id=".$hotel->getidHotel()."&isession=1'><button class='siCheckButton'>See availability</button></a>
                      </a>
                    </div>
                  </div>
                </div>

                  ";
                } 
              }
          ?>
          </div>

        </div>

      </div>
      <?php
            if(isset($arr['hotels']))
            {
              echo "<div class='pagination'>";
              for ($i = 1; $i <= $arr['numPage']; $i++) {
                $active = $i == $arr['page'] ? "active" : "";
                echo "<a href='../../../Hotel-Website/Controllers/HotelController.php?action=search&id=".$_SESSION['id_city_search']."&page=$i&is=1' class='$active'>$i</a>";
              }
              echo "</div>";
            }
            ?>
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