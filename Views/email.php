<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/SearchItemn.css">
    <link rel="stylesheet" href="../css/home1.css">
</head>
<style>
.comments {
  width: 80%;
  margin: 0 auto;
}

.comment-form input,
.comment-form textarea,
.comment-form button {
  display: block;
  width: 100%;
  padding: 10px;
  margin-bottom: 10px;
  border: none;
  border-radius: 5px;
  font-size: 16px;
}

.comment-form input,
.comment-form textarea {
  height: 40px;
}

.comment-form button {
  background-color: #008CBA;
  color: #fff;
  font-weight: bold;
  cursor: pointer;
}

.comment-form button:hover {
  background-color: #00688B;
}

.comment-list {
  margin-top: 20px;
}

.comment {
  border-bottom: 1px solid #ccc;
  padding: 10px 0;
}

.comment:last-child {
  border-bottom: none;
}

.comment-header {
  display: flex;
  align-items: center;
}

.comment-header img {
  width: 50px;
  height: 50px;
  border-radius: 50%;
  margin-right: 10px;
}

.comment-header h3 {
  font-size: 18px;
  font-weight: bold;
  margin: 0;
}

.comment-time {
  font-size: 14px;
  color: #999;
  margin-left: 10px;
}

.comment-body {
  margin-top: 10px;
}

.comment-body p {
  font-size: 16px;
  margin: 0;
}

/* Style cho nút xem thêm bình luận */
.load-more {
  display: block;
  margin: 20px auto 0;
  padding: 10px 20px;
  border: none;
  border-radius: 5px;
  background-color: #008CBA;
  color: #fff;
  font-weight: bold;
  cursor: pointer;
}

.load-more:hover {
  background-color: #00688B;
}
</style>
<body>
<div class="navbar">
		<div class="navContainer">
		<a  href="../../../Hotel-Website/Controllers/UserController.php?action=home"><span class="logo" style="color: black;">Sochi</span></a>
		  

            <div class='user-menu'>
            <div class='username'>
            <img src='../../../Hotel-Website/image/user/WIN_20211213_18_12_05_Pro.jpg' alt='' class='avatar'>
            </div>
            <ul class='menu'>
                <li><a href='../../../Hotel-Website/Controllers/CityController.php?action=listCity'>Quan ly khach san</a></li>
                <li><a href='../../../Hotel-Website/Controllers/UserController.php?action=listUser'>Danh sách người dùng</a></li>
                <li><a href='../../../Hotel-Website/Views/User/ThongtinUser.php'>Thông tin người dùng</a></li>
                <li><a href='../Controllers/RoomController.php?action=getRoombyUser&id=24'>Xem phòng đã đặt</a></li> 
                <li><a href='../../../Hotel-Website/Controllers/UserController.php?action=logout'>Đăng xuất</a></li>
            </ul>
          </div>		</div>
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
    <div class="hotelContainer">
      <form action="../Controllers/RoomController.php?action=book&is=0" method="post">
      <div class="listSearch">
        <h1 class="lsTitle">Search</h1>
        <div class="lsItem">
          <label>City</label>
          <input type="text" name = 'city' value="Hồ Chí Minh City"/>
        </div>
        <div class="lsItem">
          <label>Start Date</label>
          <input type="date" placeholder="Check-in-Date" name = 'datestart' value = >
        </div>
        <div class="lsItem">
          <label>End Date</label>
          <input type="date" placeholder="Check-in-Date" name = 'dateend' value = >
        </div>
        <div class="lsItem">
          <label>Adults</label>
              <input
                type="number"
                name = "adult"
                placeholder="Adult"
                value =               />
        </div>
        <div class="lsItem">
          <label>Childrens</label>
              <input
                type="number"
                name = "children"
                placeholder="Childrends"
                value =                 require
              />
                      </div>
        <button>Reserve or Book Now!</button>
      </div>
      </form>
      <div class="hotelWrapper">
        <h1 class="hotelTitle">Mulberry Collection Silk Village</h1>
        <div class="hotelAddress">
          <span>Phòng còn trống: 4</span>
        </div>
        <span class="hotelDistance">
          Excellent location – 500m from center
        </span>
        <span class="hotelPriceHighlight">
          Book a stay over $114 at this property and get a free airport taxi
        </span>
        <div class="hotelImages">
          
            <div class='hotelImgWrapper'>
            <img
              src = '../image/room/20.png'
              alt=''
              class='hotelImg'
            />
          </div>
            <div class='hotelImgWrapper'>
            <img
              src = '../image/room/13.png'
              alt=''
              class='hotelImg'
            />
          </div>
            <div class='hotelImgWrapper'>
            <img
              src = '../image/room/39.png'
              alt=''
              class='hotelImg'
            />
          </div>
            <div class='hotelImgWrapper'>
            <img
              src = '../image/room/8.png'
              alt=''
              class='hotelImg'
            />
          </div>
            <div class='hotelImgWrapper'>
            <img
              src = '../image/room/7.png'
              alt=''
              class='hotelImg'
            />
          </div>
        </div>
        <div class="hotelDetails">
          <div class="hotelDetailsTexts">
            <h1 class="hotelTitle">Stay in the heart of City</h1>
            <p class="hotelDesc">
              Mulberry Collection Silk Village nằm ở thành phố Hội An thuộc tỉnh Quảng Nam, cách Phố cổ Hội An 1,5 km. Resort này được thiết kế giống như một làng lụa chính thống.            </p>
          </div>

        </div>
      </div>

    </div>
    <script>

        </script>
        <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
  $("#comment-form").submit(function(e) {
    e.preventDefault(); // prevent default form submit action
    // get form data
    var formData = $(this).serialize();

    // send AJAX request
    $.ajax({
      type: "POST",
      url: "../../../Hotel-Website/Controllers/ReviewController.php?action=comment",
      data: {
        formData,
        qqqqqaction: "comment",
      },
      cache: false,
      success: function(data) {
        console.log(data);
      },
      error: function(xhr, status, error) {
        // handle error
        console.log(xhr.responseText);
      }
    });
  });
});

    </script>
<div class="container">
      <div class="comments">
        <h2>Bình luận</h2>
        <div class="comment-form">
          <form id="comment-form" method="POST">
            <textarea placeholder="Nhập bình luận của bạn" name="desc"></textarea>
            <button type="submit">Đăng</button>
          </form>
        </div>
        <div class="comment-list">
          
              <div class='comment'>
                <div class='comment-header'>  
                <img src='../image/user/WIN_20211213_18_12_05_Pro.jpg' alt='Avatar người dùng'>
                <h3>TranQuangThai</h3>
                <span class='comment-time'>2023-03-25</span>
                </div>
                <div class='comment-body'>
                <p>Thai</p>
                </div>
              </div>
              
              <div class='comment'>
                <div class='comment-header'>  
                <img src='../image/user/WIN_20211213_18_12_05_Pro.jpg' alt='Avatar người dùng'>
                <h3>TranQuangThai</h3>
                <span class='comment-time'>2023-03-25</span>
                </div>
                <div class='comment-body'>
                <p></p>
                </div>
              </div>
              
              <div class='comment'>
                <div class='comment-header'>  
                <img src='../image/user/WIN_20211213_18_12_05_Pro.jpg' alt='Avatar người dùng'>
                <h3>TranQuangThai</h3>
                <span class='comment-time'>2023-03-25</span>
                </div>
                <div class='comment-body'>
                <p></p>
                </div>
              </div>
              
              <div class='comment'>
                <div class='comment-header'>  
                <img src='../image/user/WIN_20211213_18_12_05_Pro.jpg' alt='Avatar người dùng'>
                <h3>TranQuangThai</h3>
                <span class='comment-time'>2023-03-25</span>
                </div>
                <div class='comment-body'>
                <p>cc</p>
                </div>
              </div>
              
              <div class='comment'>
                <div class='comment-header'>  
                <img src='../image/user/WIN_20211213_18_12_05_Pro.jpg' alt='Avatar người dùng'>
                <h3>TranQuangThai</h3>
                <span class='comment-time'>2023-03-25</span>
                </div>
                <div class='comment-body'>
                <p>xccc</p>
                </div>
              </div>
              
              <div class='comment'>
                <div class='comment-header'>  
                <img src='../image/user/WIN_20211213_18_12_05_Pro.jpg' alt='Avatar người dùng'>
                <h3>TranQuangThai</h3>
                <span class='comment-time'>2023-03-25</span>
                </div>
                <div class='comment-body'>
                <p></p>
                </div>
              </div>
              
              <div class='comment'>
                <div class='comment-header'>  
                <img src='../image/user/WIN_20211213_18_12_05_Pro.jpg' alt='Avatar người dùng'>
                <h3>TranQuangThai</h3>
                <span class='comment-time'>2023-03-25</span>
                </div>
                <div class='comment-body'>
                <p></p>
                </div>
              </div>
                      </div>

        <button class="load-more">Xem thêm bình luận</button>
      </div>
    </div>
</body>
</html></body>
</html>