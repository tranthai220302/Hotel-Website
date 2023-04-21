<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Add Room</title>
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
    <form action="../../../Hotel-Website/Controllers/RoomController.php?action=addRoom" method="post" enctype="multipart/form-data">
      <label for="nameRoom">Name:</label>
      <input type="text" id="nameRoom" name="nameRoom" required>
      
      <label for="description">Description:</label>
      <textarea id="description" name="description" required></textarea>
      
      <label for="price">Price:</label>
      <input type="text" name="Price" required>
      <label for="imgHotel">Image:</label>
      <input type="file" id="imgRoom" name="imgRoom" accept="image/*" required>
      <input type="submit" value="Add">
    </form>
  </body>
</html>