<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <title>Hotel Website</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/home.css">

  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />


  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.css" integrity="sha512-UTNP5BXLIptsaj5WdKFrkFov94lDx+eBvbKyoe1YAfjeRPC+gT5kyZ10kOHCfNZqEui1sxmqvodNUx3KbuYI/A==" crossorigin="anonymous"
    referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>

</head>

<body>
  <!-- home -->
  <header class="header" id="navigation-menu">
    <div class="container">
      <nav>
        <a href="#" class="logo"> <img src="image/logo.png" alt=""> </a>

        <ul class="nav-menu">
          <li> <a href="#home" class="nav-link">Home</a> </li>
          <li> <a href="#about" class="nav-link">About</a> </li>
          <li> <a href="#rooms" class="nav-link">Rooms</a> </li>
          <li> <a href="#restaurant" class="nav-link">Restaurant</a> </li>
          <li> <a href="#gallery" class="nav-link">Gallery</a> </li>
          <li> <a href="#contact" class="nav-link">Contact</a> </li>
          <li> <a href="#login" class="nav-link">Login</a> </li>
          <li> <a href="#register" class="nav-link">Register</a> </li>
        </ul>

        <div class="hambuger">
          <span class="bar"></span>
          <span class="bar"></span>
          <span class="bar"></span>
        </div>
      </nav>
    </div>
  </header>
  <script>
    const hambuger = document.querySelector('.hambuger');
    const navMenu = document.querySelector('.nav-menu');

    hambuger.addEventListener("click", mobileMenu);

    function mobileMenu() {
      hambuger.classList.toggle("active");
      navMenu.classList.toggle("active");
    }

    const navLink = document.querySelectorAll('.nav-link');
    navLink.forEach((n) => n.addEventListener("click", closeMenu));

    function closeMenu() {
      hambuger.classList.remove("active");
      navMenu.classList.remove("active");
    }
  </script>

  <section class="home" id="home">
    <div class="head_container">
      <div class="box">
        <div class="text">
          <h1>Hello.Salut.Hola</h1>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
          <button>MORE INFO</button>
        </div>
      </div>
      <div class="image">
        <img src="image/home1.jpg" class="slide">
      </div>
      <div class="image_item">
        <img src="image/home1.jpg" alt="" class="slide active" onclick="img('image/home1.jpg')">
        <img src="image/home2.jpg" alt="" class="slide" onclick="img('image/home2.jpg')">
        <img src="image/home3.jpg" alt="" class="slide" onclick="img('image/home3.jpg')">
        <img src="image/home4.jpg" alt="" class="slide" onclick="img('image/home4.jpg')">
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
  <section class="book">
    <div class="container flex">
      <div class="input grid">
        <div class="box">
          <label>Check-in:</label>
          <input type="date" placeholder="Check-in-Date">
        </div>
        <div class="box">
          <label>Check-out:</label>
          <input type="date" placeholder="Check-out-Date">
        </div>
        <div class="box">
          <label>Adults:</label> <br>
          <input type="number" placeholder="0">
        </div>
        <div class="box">
          <label>Children:</label> <br>
          <input type="number" placeholder="0">
        </div>
      </div>
      <a href="./Search.php" class="search">
        <div class="">
          <input type="submit" value="SEARCH">
        </div>
      </a>

    </div>
  </section>
  <section class="about top" id="about">
    <div class="container flex">
      <div class="left">
        <div class="img">
          <img src="image/a1.jpg" alt="" class="image1">
          <img src="image/a2.jpg" alt="" class="image2">
        </div>
      </div>
      <div class="right">
        <div class="heading">
          <h5>RAISING COMFOMRT TO THE HIGHEST LEVEL</h5>
          <h2>Welcome to Luviana Hotel Resort</h2>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
          <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
          <button class="btn1">READ MORE</button>
        </div>
      </div>
    </div>
  <!-- </section>
  gioi thieu -->
  <section class="wrapper top">
    <div class="container">
      <div class="text">
        <h2>Our Amenities</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>

        <div class="content">
          <div class="box flex">
            <i class="fas fa-swimming-pool"></i>
            <span>Swimming pool</span>
          </div>
          <div class="box flex">
            <i class="fas fa-dumbbell"></i>
            <span>Gym & yogo</span>
          </div>
          <div class="box flex">
            <i class="fas fa-spa"></i>
            <span>Spa & massage</span>
          </div>
          <div class="box flex">
            <i class="fas fa-ship"></i>
            <span>Boat Tours</span>
          </div>
          <div class="box flex">
            <i class="fas fa-swimmer"></i>
            <span>Surfing Lessons</span>
          </div>
          <div class="box flex">
            <i class="fas fa-microphone"></i>
            <span>Conference room</span>
          </div>
          <div class="box flex">
            <i class="fas fa-water"></i>
            <span>Diving & smorking</span>
          </div>
          <div class="box flex">
            <i class="fas fa-umbrella-beach"></i>
            <span>Private Beach</span>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- danh sach thanh pho -->
  <section class="room top" id="room">
    <div class="container">
      <div class="heading_top flex1">
        <div class="heading">
          <h5>RAISING COMFORT TO THE HIGHEST LEVEL</h5>
          <h2>Rooms $ Suites</h2>
        </div>
      </div>

      <div class="featured">
        <div class="featuredItem">
          <img
            src="https://cf.bstatic.com/xdata/images/city/max500/957801.webp?k=a969e39bcd40cdcc21786ba92826063e3cb09bf307bcfeac2aa392b838e9b7a5&o="
            alt=""
            class="featuredImg"
          />
          <div class="featuredTitles">
            <h1>Dublin</h1>
            <h2>123 properties</h2>
          </div>
        </div>
        
        <div class="featuredItem">
          <img
            src="https://cf.bstatic.com/xdata/images/city/max500/690334.webp?k=b99df435f06a15a1568ddd5f55d239507c0156985577681ab91274f917af6dbb&o="
            alt=""
            class="featuredImg"
          />
          <div class="featuredTitles">
            <h1>Reno</h1>
            <h2>533 properties</h2>
          </div>
        </div>
        <div class="featuredItem">
          <img
            src="https://cf.bstatic.com/xdata/images/city/max500/689422.webp?k=2595c93e7e067b9ba95f90713f80ba6e5fa88a66e6e55600bd27a5128808fdf2&o="
            alt=""
            class="featuredImg"
          />
          <div class="featuredTitles">
            <h1>Austin</h1>
            <h2>532 properties</h2>
          </div>
        </div>
      </div>
    </div>
    <!-- gioi thiueu -->
  </section>
  <section class="wrapper wrapper2 top">
    <div class="container">
      <div class="text">
        <div class="heading">
          <h5>AT THE HEART OF COMMUNICATION</h5>
          <h2>People Say</h2>
        </div>

        <div class="para">
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>

          <div class="box flex">
            <div class="img">
              <img src="image/c.jpg" alt="">
            </div>
            <div class="name">
              <h5>KATE PALMER</h5>
              <h5>IDAHO</h5>
            </div>
          </div>
        </div>
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
    <div class="pListItem">
      <img
        src="https://cf.bstatic.com/xdata/images/xphoto/square300/57584488.webp?k=bf724e4e9b9b75480bbe7fc675460a089ba6414fe4693b83ea3fdd8e938832a6&o="
        alt=""
        class="pListImg"
      />
      <div class="pListTitles">
        <h1>Hotels</h1>
        <h2>233 hotels</h2>
      </div>
    </div>
    <div class="pListItem">
      <img
        src="https://cf.bstatic.com/static/img/theme-index/carousel_320x240/card-image-apartments_300/9f60235dc09a3ac3f0a93adbc901c61ecd1ce72e.jpg"
        alt=""
        class="pListImg"
      />
      <div class="pListTitles">
        <h1>Apartments</h1>
        <h2>2331 hotels</h2>
      </div>
    </div>
    <div class="pListItem">
      <img
        src="https://cf.bstatic.com/static/img/theme-index/carousel_320x240/bg_resorts/6f87c6143fbd51a0bb5d15ca3b9cf84211ab0884.jpg"
        alt=""
        class="pListImg"
      />
      <div class="pListTitles">
        <h1>Resorts</h1>
        <h2>2331 hotels</h2>
      </div>
    </div>
    <div class="pListItem">
      <img
        src="https://cf.bstatic.com/static/img/theme-index/carousel_320x240/card-image-villas_300/dd0d7f8202676306a661aa4f0cf1ffab31286211.jpg"
        alt=""
        class="pListImg"
      />
      <div class="pListTitles">
        <h1>Villas</h1>
        <h2>2331 hotels</h2>
      </div>
    </div>
    <div class="pListItem">
      <img
        src="https://cf.bstatic.com/static/img/theme-index/carousel_320x240/card-image-chalet_300/8ee014fcc493cb3334e25893a1dee8c6d36ed0ba.jpg"
        alt=""
        class="pListImg"
      />
      <div class="pListTitles">
        <h1>Cabins</h1>
        <h2>2331 hotels</h2>
      </div>
    </div>
  </div>
  <!-- gioi thieu danh sach khach san gia re -->
  <section class="wrapper top">
    <div class="container">
      <div class="text">
        <h2>Our Amenities</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>

        <div class="content">
          <div class="box flex">
            <i class="fas fa-swimming-pool"></i>
            <span>Swimming pool</span>
          </div>
          <div class="box flex">
            <i class="fas fa-dumbbell"></i>
            <span>Gym & yogo</span>
          </div>
          <div class="box flex">
            <i class="fas fa-spa"></i>
            <span>Spa & massage</span>
          </div>
          <div class="box flex">
            <i class="fas fa-ship"></i>
            <span>Boat Tours</span>
          </div>
          <div class="box flex">
            <i class="fas fa-swimmer"></i>
            <span>Surfing Lessons</span>
          </div>
          <div class="box flex">
            <i class="fas fa-microphone"></i>
            <span>Conference room</span>
          </div>
          <div class="box flex">
            <i class="fas fa-water"></i>
            <span>Diving & smorking</span>
          </div>
          <div class="box flex">
            <i class="fas fa-umbrella-beach"></i>
            <span>Private Beach</span>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- danh sach khach san gia re -->
  <div class="heading_top_1" style="margin-top: 6%; ">
    <div class="heading">
      <h5>RAISING COMFORT TO THE HIGHEST LEVEL</h5>
      <h2>Rooms $ Suites</h2>
    </div>
  </div>
  <div class="fp">
    <div class="fpItem">
      <img
        src="https://cf.bstatic.com/xdata/images/hotel/square600/13125860.webp?k=e148feeb802ac3d28d1391dad9e4cf1e12d9231f897d0b53ca067bde8a9d3355&o=&s=1"
        alt=""
        class="fpImg"
      />
      <span class="fpName">Aparthotel Stare Miasto</span>
      <span class="fpCity">Madrid</span>
      <span class="fpPrice">Starting from $120</span>
      <div class="fpRating">
        <button>8.9</button>
        <span>Excellent</span>
      </div>
    </div>
    <div class="fpItem">
      <img
        src="https://cf.bstatic.com/xdata/images/hotel/max1280x900/215955381.jpg?k=ff739d1d9e0c8e233f78ee3ced82743ef0355e925df8db7135d83b55a00ca07a&o=&hp=1"
        alt=""
        class="fpImg"
      />
      <span class="fpName">Comfort Suites Airport</span>
      <span class="fpCity">Austin</span>
      <span class="fpPrice">Starting from $140</span>
      <div class="fpRating">
        <button>9.3</button>
        <span>Exceptional</span>
      </div>
    </div>
    <div class="fpItem">
      <img
        src="https://media-cdn.tripadvisor.com/media/photo-s/16/1a/ea/54/hotel-presidente-4s.jpg"
        alt=""
        class="fpImg"
      />
      <span class="fpName">Four Seasons Hotel</span>
      <span class="fpCity">Lisbon</span>
      <span class="fpPrice">Starting from $99</span>
      <div class="fpRating">
        <button>8.8</button>
        <span>Excellent</span>
      </div>
    </div>
    <div class="fpItem">
      <img
        src="https://cf.bstatic.com/xdata/images/hotel/max1280x900/322658536.jpg?k=3fffe63a365fd0ccdc59210188e55188cdb7448b9ec1ddb71b0843172138ec07&o=&hp=1"
        alt=""
        class="fpImg"
      />
      <span class="fpName">Hilton Garden Inn</span>
      <span class="fpCity">Berlin</span>
      <span class="fpPrice">Starting from $105</span>
      <div class="fpRating">
        <button>8.9</button>
        <span>Excellent</span>
      </div>
    </div>
  </div>
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
  <section class="map top">
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
      <div class="fText">Copyright © 2022 Lamabooking.</div>
    </div>
  </footer>
</body>

</html>