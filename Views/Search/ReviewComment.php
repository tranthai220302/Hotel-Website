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
      $(document).on('click', '.delete', function(event) {
        console.log('cc');
   event.preventDefault(); // Ngăn chặn hành vi mặc định của trình duyệt
   var url = $(this).attr('href'); // Lấy đường dẫn từ thuộc tính href của thẻ a
   var button = $(this);
   $.ajax({
      url: url,
      type: 'GET', // Hoặc 'GET' tùy thuộc vào phương thức mà bạn sử dụng trong ReviewController.php
      success: function(response) {
         // Xử lý phản hồi từ máy chủ
         console.log(response);
         if(response == 'oke') {
          // Tìm phần tử cha gần nhất chứa phần tử comment và nút "Delete"
          var commentContainer = button.closest('.comment-container');
          // Xoá phần tử cha đó khỏi DOM
          commentContainer.remove();
        }else{
          $(".error").prepend(`<p style = 'color: red;'>${response}</p>`)
          setTimeout(function() {
            $(".error p:first-child").fadeOut("slow", function() {
              $(this).remove();
            });
          }, 1000);
        }
      },
      error: function() {
         // Xử lý lỗi
         console.log('Lỗi khi gửi yêu cầu AJAX!');
      }
   });
});

$(document).ready(function() {
  $("#comment-form").submit(function(e) {
    e.preventDefault(); // prevent default form submit action
    // get form data
    var formData = $(this).serialize();

    // send AJAX request
    $.ajax({
      type: "POST",
      url: "../../../Hotel-Website/Controllers/ReviewController.php?action=comment",
      data: formData,
      cache: false,
      success: function(data) {
        if(data == "loi")
        {
          $(".error").prepend(`<p style = 'color: red;'>Bạn cần phải đăng nhập trước khi bình luận!</p>`)
          setTimeout(function() {
            $(".error p:first-child").fadeOut("slow", function() {
              $(this).remove();
            });
          }, 1000);
        }else if(data == "no")
        {
          $(".errort").prepend(`<p style = 'color: red;'>Bạn cần phải điền vào ô trống!</p>`)
          setTimeout(function() {
            $(".error p:first-child").fadeOut("slow", function() {
              $(this).remove();
            });
          }, 1000);
        }
        else{
        var review = JSON.parse(data);

        $(".comment-list").prepend(
            `
            <div class='comment-container'>
            <div class='comment' style="display:none;">
                <div class='comment-header'>  
                    <img src='../image/user/${review.imgUser}' alt='Avatar người dùng'>
                    <h3>${review.nameUser}</h3>
                    <span class='comment-time'>${review.time}</span>
                </div>
                <div class='comment-body'>
                    <p>${review.description}</p>
                </div>
                <i class='fa-regular fa-thumbs-up' style = 'margin-right: 15px;'></i>
                <i class='fa-regular fa-thumbs-down'></i>
            </div>
            <a class = 'delete' href='../../../Hotel-Website/Controllers/ReviewController.php?action=delete&idUser=${review.idUser}&idReview=${review.idReview}'> <div class = 'btn'><i class='fa-solid fa-trash'></i></div></a>
              </div> `);

        $(".comment:first").hide().fadeIn("slow"); // hiển thị từ từ
        $("#comment-form textarea").val("");
        }
      },
      error: function(xhr, status, error) {
        // handle error
        console.log(xhr.responseText);
      }
    });
  });

});

</script>
    <div class="boder"></div>
<div class="container">
      <div class="comments">
        <h2 class = 'title'>Comment</h2>
        <div class = 'error'></div>
        <div class="comment-form">
          <form id="comment-form" method="POST">
            <div class="he">
            <textarea placeholder="Nhập bình luận của bạn" class="desc" name = "desc"></textarea>
            <button type="submit">Đăng</button>
            </div>
          </form>
        </div>
        <form action='../../../Hotel-Website/Controllers/ReviewController.php?action=delete&idUser=".$review->getidUser()."&idReview=".$review->getidReview()."' method="get">
        </form>
        <div class="comment-list">
          <?php
          if(is_string($arr['reviews']))
          {
            echo "<div styel = 'color: red;'>".$arr['reviews']."</div>";
          }else
          {
            $i = 0;
            foreach($arr['reviews'] as $review)
            {
              $i++;
              echo "
              <div class='comment-container'>
              <div class='comment'>
              <div class='comment-header'>  
              <img src='../image/user/".$review->getimgUser()."' alt='Avatar người dùng'>
              <h3>".$review->getnameUser()."</h3>
              <span class='comment-time'>".$review->getTime()."</span>
              </div>
              <div class='comment-body'>
              <p>".$review->getdescription()."</p>
              </div>
              <i class='fa-regular fa-thumbs-up' style = 'margin-right: 15px;'></i>
              <i class='fa-regular fa-thumbs-down'></i>
            </div>
            <a class = 'delete' href='../../../Hotel-Website/Controllers/ReviewController.php?action=delete&idUser=".$review->getidUser()."&idReview=".$review->getidReview()."'> <div class = 'btn'><i class='fa-solid fa-trash'></i></div></a>
              </div>  
             

              ";
            }
          }
          ?>
        </div>
      </div>
    </div>
</body>
</html>