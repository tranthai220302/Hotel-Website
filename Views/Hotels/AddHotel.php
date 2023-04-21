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
  </head>
  <body>
    <h1>Add Hotel</h1>
    <form action="../../../Hotel-Website/Controllers/HotelController.php?action=addHotel" method="post" enctype="multipart/form-data">
      <label for="nameHotel">Name:</label>
      <input type="text" id="nameHotel" name="nameHotel" required>
      <label for="address">Address:</label>
      <input type="text" id="address" name="address" required>
      <label for="description">Description:</label>
      <textarea id="description" name="description" required></textarea>
      
      <label for="numStar">Number of Stars:</label>
      <select id="numStar" name="numStar" required>
        <option value="">-- Select Number of Stars --</option>
        <option value="1">1 Star</option>
        <option value="2">2 Stars</option>
        <option value="3">3 Stars</option>
        <option value="4">4 Stars</option>
        <option value="5">5 Stars</option>
      </select>
      
      <label for="imgHotel">Image:</label>
      <input type="file" id="imgHotel" name="imgHotel" accept="image/*" required>
      
      <input type="submit" value="Add">
    </form>
  </body>
</html>