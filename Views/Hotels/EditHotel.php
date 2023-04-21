<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Add Hotel</title>
    <style>
      /* CSS style for form layout */
      label {
        display: block;
        margin-bottom: 5px;
        font-weight: bold;
      }
      input[type="text"],
      select,
      textarea {
        width: 100%;
        padding: 5px;
        margin-bottom: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
      }
      input[type="file"] {
        margin-top: 10px;
      }
      input[type="submit"] {
        background-color: #4CAF50;
        color: white;
        padding: 10px 15px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 16px;
      }
      input[type="submit"]:hover {
        background-color: #45a049;
      }
    </style>
    <?php
    $nameHotel = $Get_hotel->getnameHotel();
    $description = $Get_hotel->getdescription();
    $numStar = $Get_hotel->getnumStart();
    $img = $Get_hotel->getImg();
    ?>
  </head>
  <body>
    <h1>Add Hotel</h1>
    <form action="../../../Hotel-Website/Controllers/HotelController.php?action=edit&id=<?php echo $Get_hotel->getidHotel()?>" method="post" enctype="multipart/form-data">
      <label for="nameHotel">Name:</label>
      <input type="text" id="nameHotel" name="nameHotel" value="<?php echo $nameHotel;?>">
      
      <label for="description">Description:</label>
      <textarea id="description" name="description" required><?php echo $description; ?></textarea>
      
      <label for="numStar">Number of Stars:</label>
      <select id="numStar" name="numStar" >
        <option value="1" <?php if(1 == $numStar){echo "selected";}?>>1 Star</option>
        <option value="2" <?php if(2 == $numStar){echo "selected";}?>>2 Stars</option>
        <option value="3" <?php if(3 == $numStar){echo "selected";}?>>3 Stars</option>
        <option value="4" <?php if(4 == $numStar){echo "selected";}?>>4 Stars</option>
        <option value="5" <?php if(5 == $numStar){echo "selected";}?>>5 Stars</option>
      </select>
      
      <label for="imgHotel">Image:</label>
      <input type="file" id="imgHotel" name="imgHotel" accept="image/*" required value="">
      
      <input type="submit" value="Add">
    </form>
  </body>
</html>