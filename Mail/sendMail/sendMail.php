<?php
include (__DIR__ . '/PHPMailer.php');
include (__DIR__ . "/Exception.php");
include (__DIR__ . "/OAuthTokenProvider.php");
include (__DIR__ . "/OAuth.php");
include (__DIR__ . "/POP3.php");
include (__DIR__ . "/SMTP.php");
include (__DIR__ . "/DSNConfigurator.php");
 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
$mail = new PHPMailer(true);    

try {
    //Server settings
    $mail->SMTPDebug = 0;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'thailu220302@gmail.com';                 // SMTP username
    $mail->Password = 'glnh uxnj siox rset';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to
 
    //Recipients
    $mail->setFrom('thailu220302@gmail.com', 'Mailer');
    $mail->addAddress($send_mail, 'Joe User');     // Add a recipient          // Name is optional
    //Content
    if(isset($username))
    {
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'Sochi';
        $mail->Body    = "	
        <div class='container' style='		
        margin: 20px auto;
        padding: 20px;
        max-width: 600px;
        border: 2px solid #ccc;
        border-radius: 5px;
        background-color: #fff;
        font-family: Arial, sans-serif;
        font-size: 16px;
        line-height: 1.5;'>
            <h1 style='
            font-size: 24px;
            font-weight: bold;
            margin-top: 0;
            text-align: center;
            '>Khách sạn Sochi</h1>
            <p style='margin: 0; padding: 5px 0;'>Kính gửi khách hàng ".$username."</p>
            <p>Chúng tôi xin chân thành cảm ơn quý khách đã đặt phòng tại Khách sạn Sochi. Dưới đây là thông tin về đơn đặt phòng của quý khách:</p>
            <ul>
                <li>Tên khách sạn: Khách sạn Sochi</li>
                <li>Loại phòng: ".$nameRoom."</li>
                <li>Thời gian đặt phòng: từ ngày ".$startDate." đến ngày ".$endDate."</li>
                <li>Giá phòng: ".$price."$/đêm</li>
            </ul>
            <p>Chúng tôi rất mong được đón tiếp quý khách tại Khách sạn Sochi. Nếu quý khách có bất kỳ thắc mắc hoặc yêu cầu nào, xin vui lòng liên hệ với chúng tôi.</p>
            <div class='signature' style='	margin-top: 30px; text-align: right;'>
                <p style='	margin: 0;'>Trân trọng,</p>
                <p style='	margin: 0;'>Khách sạn Sochi</p>
            </div>
        </div>";
        $mail->send();
        $sendMail = "oke";
    } 
} catch (Exception $e) {
    $sendMail = 'loi';
}
?>