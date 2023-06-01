<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../../image/icon.png">
	  <title>Sochi</title>
    <link rel="stylesheet" href="../../../Hotel-Website/css/bookRoom.css">
</head>
<?php
$start = $_SESSION['datestart'];
$end = $_SESSION['dateend'];
$adult = $_SESSION['adult'];
$children = $_SESSION['children'];
$date1 = new DateTime($start);
$date2 = new DateTime($end);
$interval = $date1->diff($date2);
$price = intval($interval->days)*($Get_room->getPrice());
?>
<body>
  <div class="imgbody">
  <div id="myModal" class="modal">
    <div class="modal-content">
      <div class="room">
        <img src="../image/room/anh100.jpg" alt="Phòng khách sạn">

        <div class="room-description">
          <h2><?php echo $Get_room->getnameRoom() ?></h2>
          <p><?php echo $Get_room->getdescription(); ?></p>
          <ul>
            <li>Máy điều hòa</li>
            <li>Tủ lạnh mini</li>
            <li>Truyền hình cáp</li>
            <li>Wi-Fi miễn phí</li>
          </ul>
          <p class="price">Giá: $<?php echo $Get_room->getPrice(); ?>/ngày</p>
          <form action="../Controllers/BookingController.php?action=bookRoom&id=<?php echo $Get_room->getidRoom(); ?>" method="post">
            <label for="check-in">Ngày nhận phòng:</label>
            <input type="date" id="check-in" name="startDate" readonly value="<?php echo $start ?>">
            <br>
            <label for="check-out">Ngày trả phòng:</label>
            <input type="date" id="check-out" name="endDate" readonly value="<?php echo $end ?>">
            <br>
            <label for="check-in">Adults:</label>
            <input type="text" id="Adults" name="Adults" readonly value="<?php echo $adult ?>">
            <br>
            <label for="check-in">Childrens:</label>
            <input type="text" id="Childrens" name="Childrens" readonly value="<?php echo $children ?>">
            <br>
            <p style="font-weight: 700; color: red;">Số tiền phải thanh toán : $<?php echo $price; ?></p>
            <button type="submit">Đặt phòng</button>
          </form>
          <a class = "link" href="../Controllers/RoomController.php?action=book&is=1">Huỷ</a>
        </div>
      </div>
      
    </div>
  </div>
  </div>
</body>
</html>