
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="../../../Hotel-Website/css/home1.css">
  <link rel="stylesheet" href="../../../Hotel-Website/css/Rooms.css">
</head>
<?php
$i = 0; 
?>
<style>
  .container {
    justify-content: space-around;
}

h1 {
	margin-bottom: 20px;
}

label {
	display: inline-block;
	margin-bottom: 10px;
}

input[type="number"],
input[type="text"] {
	padding: 5px;
	border-radius: 5px;
	border: 1px solid #ccc;
	margin-right: 10px;
}

input[type="submit"] {
	background-color: #008CBA;
	color: #fff;
	padding: 10px 20px;
	border-radius: 5px;
	border: none;
	cursor: pointer;
}

input[type="submit"]:hover {
	background-color: #00698C;
}
.listSearch {
    flex: 1;
    background-color: #febb02;
    padding: 10px;
    border-radius: 10px;
    position: sticky;
    top: 10px;
    height: max-content;
  }
  
  .lsTitle{
    font-size: 20px;
    color: #555;
    margin-bottom: 10px;
  }
  
  .lsItem{
    display: flex;
    flex-direction: column;
    gap: 5px;
    margin-bottom: 10px;
  }
  
  .lsItem>label{
    font-size: 12px;
  }
  
  .lsItem>input{
    height: 30px;
    border: none;
    padding: 5px;
  }
  .lsItem>span{
    height: 30px;
    padding: 5px;
    background-color: white;
    display: flex;
    align-items: center;
    cursor: pointer;
  }
  
  .lsOptions{
    padding: 10px;
  }
  
  .lsOptionItem{
    display: flex;
    justify-content: space-between;
    margin-bottom: 10px;
    color: #555;
    font-size: 12px;
  }
  
  .lsOptionInput{
    width: 50px;
  }
  
  .listSearch>button{
    padding: 10px;
    background-color: #0071c2;
    color: white;
    border: none;
    width: 100%;
    font-weight: 500;
    cursor: pointer;
  }
  
  .listResult {
    flex: 3;
  }
  /*list*/
  .listContainer {
    display: flex;
    justify-content: center;
    margin-top: 20px;
  }
  
  .listWrapper {
    width: 100%;
    max-width: 1024px;
    display: flex;
    gap: 20px;
  }
  
  .listSearch {
    flex: 1;
    background-color: #febb02;
    padding: 10px;
    border-radius: 10px;
    position: sticky;
    top: 10px;
    height: max-content;
  }
  
  .lsTitle{
    font-size: 20px;
    color: #555;
    margin-bottom: 10px;
  }
  
  .lsItem{
    display: flex;
    flex-direction: column;
    gap: 5px;
    margin-bottom: 10px;
  }
  
  .lsItem>label{
    font-size: 12px;
  }
  
  .lsItem>input{
    height: 30px;
    border: none;
    padding: 5px;
  }
  .lsItem>span{
    height: 30px;
    padding: 5px;
    background-color: white;
    display: flex;
    align-items: center;
    cursor: pointer;
  }
  
  .lsOptions{
    padding: 10px;
  }
  
  .lsOptionItem{
    display: flex;
    justify-content: space-between;
    margin-bottom: 10px;
    color: #555;
    font-size: 12px;
  }
  
  .lsOptionInput{
    width: 50px;
  }
  
  .listSearch>button{
    padding: 10px;
    background-color: #0071c2;
    color: white;
    border: none;
    width: 100%;
    font-weight: 500;
    cursor: pointer;
  }
  
  .listResult {
    flex: 3;
  }
</style>
<body>
<div class="navbar">
		<div class="navContainer">
		<a  href="../../../Hotel-Website/Controllers/UserController.php?action=home"><span class="logo" style="color: black;">Sochi</span></a>
    <a href='../../../Hotel-Website/Views/login.php'></a>
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
                <li><a href='../../../Hotel-Website/Controllers/CityController.php?action=listCity'>Quan ly khach san</a></li>
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
                <li><a href='../../../Hotel-Website/Views/User/ThongtinUser.php'>Thong tin ngươi dùng</a></li>
                <li><a href='../../../Hotel-Website/Controllers/RoomController.php?action=getRoombyUser&id=".$_SESSION['user']['id']."'>Xem phòng đã đặt</a></li>
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
    <div class="container" style="display: flex; justify-content: space-around;">

    <form action="../../../Hotel-Website/Controllers/RoomController.php?action=search" method="post"  style="margin-top: 48px; margin-right: 100px; margin-left: 20px;">
            <div class="listSearch" style="padding: 10px 50px;">
            <h1 class="lsTitle">Search</h1>
            <div class="lsItem">
              <label>Hotel</label>
              <input style="" type="text" name = 'city' value="<?php if(isset($arr['nameHotel'])){
                echo $arr['nameHotel'];
              }; ?>" readonly/>
            </div>
            <div class="lsItem">
            <label>Type</label>
            <select id="search" name="search" required style="height: 36px; border: none  ; width: 110%; border-radius: 7px;">
              <option value="nameRoom">Name Room</option>
              <option value="priceMin">Price min</option>
              <option value="Description">Description</option>
            </select>
            </div>
            <div class="lsItem">
            <label for="description">Miêu tả:</label>
			      <input type="text" id="description" name="val">
            </div>
            <button style="margin-top: 15px;">Search</button>
              </div>
          </form>

  <table style="margin-top: 50px;">
    <thead>
      <tr>
        <th>Tên phòng</th>
        <th>Giá</th>
        <th>Các lựa chọn</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      <?php
      if(isset($arr['rooms']))
      {
        
        foreach($arr['rooms'] as $room)
        {
          $i++;
          echo "
          <tr>
          <td style='width: 40%;'> 
            <h2>".$room->getnameRoom()."</h2>
            <p class = 'des'>M".$room->getdescription()."</p>
          </td>
          <td>$".$room->getPrice()."</td>
          <td>
            <ul>
              <li>Wifi miễn phí</li>
              <li>Máy điều hòa</li>
              <li>Phòng tắm riêng</li>
              <li>Bàn làm việc</li>
            </ul>
          </td>
          <td><a class = 'link1' href='../../Hotel-Website/Controllers/RoomController.php?action=getBookRoom&id=".$room->getidRoom()."'>Đặt phòng</a></td>
          </tr>
          ";
        }
      } else{
        echo "<div style = 'color: red; margin-top: 30px;'>".$arr."</div>";
      }
      ?>
    </tbody>
  </table>
  </div>
</body>
</html>