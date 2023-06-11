<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="../../Hotel-Website/css/home1.css">
    <link rel="stylesheet" href="../../Hotel-Website/css/home.css">
    <title>Đồ thị thống kê doanh thu</title>
    <style>
        #chartContainer {
            width: 600px;
            height: 400px;
            margin: 0 auto;
        }
    </style>
</head>
<?php 
?>
<body>
<header class="header" id="navigation-menu">
		<div class="container" style="height: 60px;">
			<nav style="padding: 0;">
				<a href="#" class="logo"> <img src="../../image/home/logo.png" alt=""> </a>
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
    
    <h1 style="margin-top: 100px;">Đồ thị thống kê doanh thu của khách sạn</h1>
    <h2>Chọn khoảng ngày:</h2>
    <label for="start-date">Ngày bắt đầu:</label>
    <input style="width: 15%;" type="date" id="start-date" name="start-date">

    <label for="end-date">Ngày kết thúc:</label>
    <input style="width: 15%;" type="date" id="end-date" name="end-date">

    <button style="background-color: red;" onclick="loadData()">Hiển thị</button>

    <div id="chartContainer"></div>

    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
    <script>
        function loadData() {
            var startDate = document.getElementById("start-date").value;
            var endDate = document.getElementById("end-date").value;

            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    
                    console.log(xhr.responseText);
                    var jsonData = JSON.parse(xhr.responseText);
                    if(jsonData.length == 0){
                        alert("Thời gian này không có doanh thu!")
                    }else{
                        var dataPoints = [];
                        for (var i = 0; i < jsonData.length; i++) {
                        if (jsonData[i].date) {
                            var dateParts = jsonData[i].date.split('-');
                            var year = parseInt(dateParts[0]);
                            var month = parseInt(dateParts[1]) - 1; // Trừ 1 vì tháng trong JavaScript bắt đầu từ 0
                            var day = parseInt(dateParts[2]);

                            var dataPoint = {
                                x: new Date(year, month, day),
                                y: parseInt(jsonData[i].price)
                            };

                            dataPoints.push(dataPoint);
                        }
                    }

                    console.log(dataPoints);
                    drawChart(dataPoints);
                    }
                }
            };
            xhr.open('POST', '../../../Hotel-Website/Controllers/BookingController.php?action=thongke&id=<?php echo $_SESSION['id_hotel'] ?>', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.send("date_start=" + startDate + "&date_end=" + endDate);
        }

        function drawChart(dataPoints) {
            var chart = new CanvasJS.Chart("chartContainer", {
                animationEnabled: true,
                theme: "light2",
                title: {
                    text: "Doanh thu theo ngày"
                },
                axisX: {
                    title: "Ngày",
                    valueFormatString: "DD/MM"
                },
                axisY: {
                    title: "Doanh thu (USD)"
                },
                data: [{
                    type: "column",
                    dataPoints: dataPoints
                }]
            });
            chart.render();
        }
    </script>
</body>
</html>
