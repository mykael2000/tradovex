<?php
include 'includes/connection.php';
session_start();
ob_start();

use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;

//Load Composer's autoloader

require '../PHPMailer-master/src/PHPMailer.php';
require '../PHPMailer-master/src/Exception.php';
require '../PHPMailer-master/src/SMTP.php';
//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);
if (!isset($_SESSION['username'])) {
    header('location: ../auth/login.php');

}

$clientid = $_SESSION['username'];
$sql = "SELECT * FROM clients WHERE username ='$clientid' ";
$query = mysqli_query($con, $sql);
$getdetails = mysqli_fetch_assoc($query);
$shopid = $getdetails['id'];

$sqlDE = "SELECT * FROM deposits WHERE client_id='$shopid' ";
$queryDE = mysqli_query($con, $sqlDE);

$sqlWi = "SELECT * FROM withdrawals WHERE client_id='$shopid' ";
$queryWi = mysqli_query($con, $sqlWi);
$email = $getdetails['email'];
$otp = $_GET['id'];

try {
    //Server settings
    $mail->SMTPDebug = 0; //Enable verbose debug output
    $mail->isSMTP(); //Send using SMTP
    $mail->Host = 'srv46404747.ultasrv.net'; //Set the SMTP server to send through
    $mail->SMTPAuth = true; //Enable SMTP authentication
    $mail->Username = 'support@tradovex.com'; //SMTP username
    $mail->Password = 'trad123@214VEX'; //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; //Enable implicit TLS encryption
    $mail->Port = 465; //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('support@tradovex.com', 'Support');
    $mail->addAddress($email); //Add a recipient               //Name is optional

    $mail->addCC('support@tradovex.com');

    //Content
    $mail->isHTML(true); //Set email format to HTML
    $mail->Subject = 'Two factor authentication';
    $mail->Body = '
                <html><head></head></head>
<body style="background-color: #474d80; padding: 45px;">
    <div>
        <img style="position:relative; left:35%;" src="https://tradovex.com/tradovexlogo.png">
        <h3 style="color: black;">Mail From support@Tradovex.com - Two factor</h3>
    </div>
    <div style="color: #ffff;"><hr/>
        <h3>Dear ' . $getdetails['first_name'] . '</h3>
        <p>Here is your login OTP - ' . $otp . '</p>
        <h5>Kindly copy and paste in the otp area to log in</h5>

        <h5>Note : the details in this email should not be disclosed to anyone. If you did not register kindly ignore this email</h5>

    </div><hr/>
        <div style="background-color: white; color: black;">
            <h3 style="color: black;">support@Tradovex<sup>TM</sup> - Phone : +17577423555</h3>
        </div>

</body></html>

';

    $mail->send();
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
if (isset($_POST['submit'])) {
    $code = $_POST['password'];
    if ($otp == $code) {
        header("location: dashboard.php");
    } else {
        echo "<script>alert('Two factor authentication failed, redirecting.........')</script>";
        header("refresh: 2; url=logout.php");
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Tradovex</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <style>
    body {
        color: #565656;
        background: #ddd;
        font-family: "Open Sans", Helvetica, Arial, sans-serif;
        font-size: 100%;
        padding: 0px;
        margin: 0px;
        min-height: 100%;
        position: relative;
        text-rendering: optimizeLegibility;
        -webkit-font-smoothing: antialiased;
    }

    #locked-screen {
        margin-top: 80px;
    }

    .img-user {
        margin: auto;
    }

    .panel-primary>.panel-heading {
        color: #fff;
        background-color: #39bbdb;
        border-color: #556b8d;
    }

    .panel>.panel-heading {
        font-weight: 400;
        text-transform: uppercase;
        padding: 14px 10px;
    }

    .panel {
        border: none;
        -webkit-border-radius: 0;
        -moz-border-radius: 0;
        -ms-border-radius: 0;
        -o-border-radius: 0;
        border-radius: 0;
    }

    .panel-heading>.panel-title {
        height: auto;
        font-size: 0.813em;
    }

    .profile-pic {
        margin: 15px 0;
    }

    .profile-pic img {
        border: 7px solid #e5e6ea;
    }

    .btn-primary,
    a.btn-primary:link,
    a.btn-primary:visited {
        color: #fff;
        background-color: #39bbdb;
        border-radius: 0px;
    }

    #password {
        padding-left: 32px;
    }

    .form-control {
        border: 2px solid #e8ebed;
        border-radius: 2px;
        box-shadow: none;
        height: 37px;
        padding: 8px 12px 9px 12px;
    }

    .form-group i {
        position: absolute;
        left: 27px;
        top: 11px;
    }
    </style>
</head>

<body>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" />
    <div class="container bootstrap snippets bootdey">
        <div class="row">
            <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-12">
                <div class="panel panel-primary" id="locked-screen">
                    <div class="panel-heading">
                        <h3 class="panel-title">Tradovex - Two factor authentication</h3>
                    </div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form">
                            <div class="profile-pic text-center">
                                <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt=""
                                    class="img-circle img-thumbnail img-user" />
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <input type="password" class="form-control" id="password"
                                        placeholder="Enter 2fa code" />
                                    <i class="fa fa-lock"></i>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <a href="#" name="submit" type="submit" class="btn btn-primary btn-block">Submit</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
