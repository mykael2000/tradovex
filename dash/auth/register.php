<?php
include '../user-area/includes/connection.php';
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;

//Load Composer's autoloader

require '../PHPMailer-master/src/PHPMailer.php';
require '../PHPMailer-master/src/Exception.php';
require '../PHPMailer-master/src/SMTP.php';
//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);
@$ref = $_GET['ref'];
$first_nameErr = $last_nameErr = $emailErr = $countryErr = $phone_numberErr = $btcWalletErr = $ethWalletErr = $referralErr = $usernameErr = $sQuestionErr = $sAnswerErr = $passwordErr = $c_passwordErr = "";
$first_name = $last_name = $email = $country = $phone_number = $btcWallet = $ethWallet = $referral = $username = $sQuestion = $sAnswer = $password = $c_password = $successRegister = "";
$sql = "";
if (isset($_POST["submit"])) {

    if (empty($_POST["first_name"])) {
        $first_nameErr = "First Name is required";
    } else {
        $first_name = $_POST["first_name"];
    }
    if (empty($_POST["last_name"])) {
        $last_nameErr = "Last Name is required";
    } else {
        $last_name = $_POST["last_name"];
    }
    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
    } else {
        $email = $_POST["email"];
    }
    if (empty($_POST["country"])) {
        $countryErr = "Country is required";
    } else {
        $country = $_POST["country"];
    }
    if (empty($_POST["phone"])) {
        $phoneErr = "Phone Number is required";
    } else {
        $phone = $_POST["phone"];
    }

    $btcWallet = $_POST["btcWallet"];
    $ethWallet = $_POST["ethWallet"];

    if (empty($_POST["username"])) {
        $usernameErr = "Username is required";
    } else {
        $username = $_POST["username"];
    }
    if (empty($_POST["password"])) {
        $passwordErr = "Password is required";
    } elseif (strlen(trim($_POST["password"])) < 8) {
        $passwordErr = "Password must be more than 8";
    } else {
        $password = $_POST["password"];
    }

    $c_password = $_POST['c_password'];

    $referral = $_POST["referral"];

    if (empty($_POST["sQuestion"])) {
        $sQuestionErr = "Question is required";
    } else {
        $sQuestion = $_POST["sQuestion"];
    }
    if (empty($_POST["sAnswer"])) {
        $sAnswerErr = "Answer is required";
    } else {
        $sAnswer = $_POST["sAnswer"];
    }

    $sql_e = "SELECT * FROM clients WHERE email='$email'";
    $res_e = mysqli_query($con, $sql_e);
    if (mysqli_num_rows($res_e) > 0) {
        echo "<script>alert('Email already exists')</script>";
    } elseif (strlen(trim($_POST["password"])) < 8) {
        $passwordErr = "Password must be more than 8 characters";
    } else {
        $avatar = "user.png";
        if ($password = $c_password) {
            $sql = "INSERT into clients (first_name, last_name, email, country, phone, btcWallet, ethWallet, username, password, referrer_code, sQuestion, sAnswer, avatar)  VALUES ('$first_name', '$last_name', '$email','$country', '$phone','$btcWallet','$ethWallet', '$username','$password','$referral','$sQuestion','$sAnswer','$avatar')";
            mysqli_query($con, $sql);
            try {
                //Server settings
                $mail->SMTPDebug = 0; //Enable verbose debug output
                $mail->isSMTP(); //Send using SMTP
                $mail->Host = 'mail.tradovex.com'; //Set the SMTP server to send through
                $mail->SMTPAuth = true; //Enable SMTP authentication
                $mail->Username = 'support@tradovex.com'; //SMTP username
                $mail->Password = 'Bitcoin123'; //SMTP password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; //Enable implicit TLS encryption
                $mail->Port = 465; //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

                //Recipients
                $mail->setFrom('support@tradovex.com', 'Support');
                $mail->addAddress($email); //Add a recipient               //Name is optional

                $mail->addCC('support@tradovex.com');

                //Content
                $mail->isHTML(true); //Set email format to HTML
                $mail->Subject = 'Successful Registration';
                $mail->Body = '
                <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Welcome to Tradovex!</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <link rel="stylesheet" href="css/style.css" />
    <style>
    * {
        padding: 0;
        margin: 0;
    }

    body {
        background-color: #fff;
        height: 100%;
        width: 100%;
    }

    .section-body {
        color: #1a1a1a;
        font-size: 16px;
        font-family: Aileron;
        font-weight: 400;
        line-height: 22px;
        word-wrap: break-word;
        padding-bottom: 20px;
    }

    .section-header {
        color: #1a1a1a;
        font-size: 18px;
        font-family: Aileron;
        font-weight: 700;
        word-wrap: break-word;
    }

    .footer-link {
        color: black;
        font-size: 12px;
        font-family: Aileron;
        font-weight: 400;
        text-decoration: underline;
        word-wrap: break-word;
    }
    </style>
</head>

<body>
    <div class="d-flex justify-content-center">
        <img src="tradovexlogo.png" alt="logo" />
    </div>
    <div style="background-color: #09055e;"
        class="header d-flex flex-column justify-content-center align-items-center text-center py-5">
        <ul class="nav justify-content-center">
            <li class="nav-item">
                <a style="color: #fff;" class="nav-link active" aria-current="page" href="#">My account</a>
            </li>
            <li class="nav-item">
                <a style="color: #fff;" class="nav-link" href="#">FAQ</a>
            </li>
            <li class="nav-item">
                <a style="color: #fff;" class="nav-link" href="#">About Us</a>
            </li>
        </ul>

    </div>
    <div style="position: relative; top: -30px, padding-top: 20px;"
        class="container d-flex flex-column justify-content-center px-5">
        <h4 style="font-size: 20px; padding-top: 15px; padding-bottom: 5px;" class="section-header">Hey there, welcome
            to the community!</h4>
        <p style="font-size: 17px; font-weight: 200;" class="section-body">
            We’re here to help make your trades easy, simple, and profitable!

            Since 2017, we have been revolutionizing the way people trade cryptocurrencies. By providing an intuitive
            and reliable platform with powerful tools, we help people of all skill levels make the most money in the
            shortest amount of time – without having to stay awake or be chained to a computer.
        </p>
        <div class="container">
            <div class="container text-center">
                <div class="row">
                    <div class="col">
                        <img src="mail-images/smart.png">
                        <h5 style="font-weight: 800;">SmartTrade</h5>
                        <p>
                            An exclusive 3Commas feature that pairs with TradingView indicators that lets users view
                            multiple signals from one place.
                        </p>
                    </div>
                    <div class="col">
                        <img src="mail-images/dca.png">
                        <h5 style="font-weight: 800;">DCA Bot</h5>
                        <p>Invest at preset intervals to reduce the entry price of a position over time and mitigate
                            volatility risk.</p>
                    </div>
                    <div class="col">
                        <img src="mail-images/grid.png">
                        <h5 style="font-weight: 800;">GRID Bot</h5>
                        <p>Small price movements drive HODLers crazy, use the bot to follow the money!</p>
                    </div>
                </div>
            </div>
        </div>
        <button style="background-color: #09055e; color: #fff;" class="btn">Lets get it started!</button>
        <div class="container">
            <p style="padding-top: 15px;" class="section-body">
                Thank you once again for choosing to join our community. We\'re honored to be a part
                of your journey and look forward to a successful collaboration.
                <br /><br />

                Best Regards,<br />
                Tradovex Team
            </p>
        </div>
        <div class="footer">
            <div class="d-flex justify-content-center">
                <a class="p-2" href=""><img src="mail-images/facebook.png" alt="" /></a>
                <a class="p-2" href=""><img src="mail-images/instagram.png" alt="" /></a>
                <a class="p-2" href=""><img src="mail-images/linkedin.png" alt="" /></a>
            </div>
            <div>
                <p class="section-body text-center">
                    ©2017 Tradovex All rights reserved
                </p>
                <div class="d-flex justify-content-center">
                    <a class="p-2 footer-link" href="">Unsubscribe</a>
                    <a class="p-2 footer-link" href="">Terms & Privacy</a>
                    <a class="p-2 footer-link" href="">Contact Us</a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>

';

                $mail->send();
                echo 'Email has been sent to ' . $email;
                echo "<script>alert('Account created successfully')</script>";
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
            $successRegister = "<h4 class='badge badge-success'>You have successfully registered,<br> Please check your email address!!</h4>";
        } else {
            echo "<script>alert('Password does not match')</script>";
        }
    }

}

?>



<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description"
        content="Tradovex is an automated  online trading  platform made so even investors with zero trading experience  are successfully making a profit">
    <meta name="keywords" content="Tradovex, Tradovex.com, crypto, bitcoin">
    <link href="" rel="icon">
    <title>Tradovex | Register</title>
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="../css/ruang-admin.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-login" style="background:black;">
    <!-- Login Content -->
    <div class="container-login">
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-12 col-md-10 pt-5">
                <div style="background-color:#222;" class="card shadow-sm my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="login-form">
                                    <div class="d-flex justify-content-center p-3 pb-5">
                                        <img src="../../tradovexlogo.png" alt="logo">
                                    </div>
                                    <div class="text-center">
                                        <h1 class="h4 text-white mb-4">Register</h1>
                                    </div>
                                    <!-- Session Status -->
                                    <x-auth-session-status class="mb-4" :status="session('status')" />
                                    <?php echo $successRegister; ?>

                                    <!-- Validation Errors -->
                                    <x-auth-validation-errors class="mb-4" :errors="$errors" />
                                    <form class="user" method="POST" action="" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label class="text-white">First Name</label>
                                            <input type="text" class="form-control" id="exampleInputFirstName"
                                                placeholder="Enter First Name"
                                                value="<?php if (!empty($first_name)) {echo $_POST['first_name'];}?>"
                                                name="first_name" autofocus>
                                            <span style="font-size:12px; color:red;" class="error">
                                                <?php echo $first_nameErr; ?></span>
                                        </div>

                                        <div class="form-group">
                                            <label class="text-white">Last Name</label>
                                            <input type="text" class="form-control" id="exampleInputLastName"
                                                placeholder="Enter Last Name"
                                                value="<?php if (!empty($last_name)) {echo $_POST['last_name'];}?>"
                                                name="last_name">
                                            <span style="font-size:12px; color:red;" class="error">
                                                <?php echo $last_nameErr; ?></span>
                                        </div>


                                        <div class="form-group">
                                            <label class="text-white">Email</label>
                                            <input type="email" class="form-control" id="exampleInputEmail"
                                                aria-describedby="emailHelp" placeholder="Enter Email Address"
                                                value="<?php if (!empty($email)) {echo $_POST['email'];}?>"
                                                name="email">
                                            <span style="font-size:12px; color:red;" class="error">
                                                <?php echo $emailErr; ?></span>
                                        </div>


                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="text-white">Country</label><br>
                                                    <select id="country" name="country" class="form-control">
                                                        <option
                                                            value="<?php if (!empty($country)) {echo $_POST['country'];}?>">
                                                            Select your Country</option>
                                                        <option value="Afganistan">Afghanistan</option>
                                                        <option value="Albania">Albania</option>
                                                        <option value="Algeria">Algeria</option>
                                                        <option value="American Samoa">American Samoa</option>
                                                        <option value="Andorra">Andorra</option>
                                                        <option value="Angola">Angola</option>
                                                        <option value="Anguilla">Anguilla</option>
                                                        <option value="Antigua & Barbuda">Antigua & Barbuda</option>
                                                        <option value="Argentina">Argentina</option>
                                                        <option value="Armenia">Armenia</option>
                                                        <option value="Aruba">Aruba</option>
                                                        <option value="Australia">Australia</option>
                                                        <option value="Austria">Austria</option>
                                                        <option value="Azerbaijan">Azerbaijan</option>
                                                        <option value="Bahamas">Bahamas</option>
                                                        <option value="Bahrain">Bahrain</option>
                                                        <option value="Bangladesh">Bangladesh</option>
                                                        <option value="Barbados">Barbados</option>
                                                        <option value="Belarus">Belarus</option>
                                                        <option value="Belgium">Belgium</option>
                                                        <option value="Belize">Belize</option>
                                                        <option value="Benin">Benin</option>
                                                        <option value="Bermuda">Bermuda</option>
                                                        <option value="Bhutan">Bhutan</option>
                                                        <option value="Bolivia">Bolivia</option>
                                                        <option value="Bonaire">Bonaire</option>
                                                        <option value="Bosnia & Herzegovina">Bosnia & Herzegovina
                                                        </option>
                                                        <option value="Botswana">Botswana</option>
                                                        <option value="Brazil">Brazil</option>
                                                        <option value="British Indian Ocean Ter">British Indian Ocean
                                                            Ter</option>
                                                        <option value="Brunei">Brunei</option>
                                                        <option value="Bulgaria">Bulgaria</option>
                                                        <option value="Burkina Faso">Burkina Faso</option>
                                                        <option value="Burundi">Burundi</option>
                                                        <option value="Cambodia">Cambodia</option>
                                                        <option value="Cameroon">Cameroon</option>
                                                        <option value="Canada">Canada</option>
                                                        <option value="Canary Islands">Canary Islands</option>
                                                        <option value="Cape Verde">Cape Verde</option>
                                                        <option value="Cayman Islands">Cayman Islands</option>
                                                        <option value="Central African Republic">Central African
                                                            Republic</option>
                                                        <option value="Chad">Chad</option>
                                                        <option value="Channel Islands">Channel Islands</option>
                                                        <option value="Chile">Chile</option>
                                                        <option value="China">China</option>
                                                        <option value="Christmas Island">Christmas Island</option>
                                                        <option value="Cocos Island">Cocos Island</option>
                                                        <option value="Colombia">Colombia</option>
                                                        <option value="Comoros">Comoros</option>
                                                        <option value="Congo">Congo</option>
                                                        <option value="Cook Islands">Cook Islands</option>
                                                        <option value="Costa Rica">Costa Rica</option>
                                                        <option value="Cote DIvoire">Cote DIvoire</option>
                                                        <option value="Croatia">Croatia</option>
                                                        <option value="Cuba">Cuba</option>
                                                        <option value="Curaco">Curacao</option>
                                                        <option value="Cyprus">Cyprus</option>
                                                        <option value="Czech Republic">Czech Republic</option>
                                                        <option value="Denmark">Denmark</option>
                                                        <option value="Djibouti">Djibouti</option>
                                                        <option value="Dominica">Dominica</option>
                                                        <option value="Dominican Republic">Dominican Republic</option>
                                                        <option value="East Timor">East Timor</option>
                                                        <option value="Ecuador">Ecuador</option>
                                                        <option value="Egypt">Egypt</option>
                                                        <option value="El Salvador">El Salvador</option>
                                                        <option value="Equatorial Guinea">Equatorial Guinea</option>
                                                        <option value="Eritrea">Eritrea</option>
                                                        <option value="Estonia">Estonia</option>
                                                        <option value="Ethiopia">Ethiopia</option>
                                                        <option value="Falkland Islands">Falkland Islands</option>
                                                        <option value="Faroe Islands">Faroe Islands</option>
                                                        <option value="Fiji">Fiji</option>
                                                        <option value="Finland">Finland</option>
                                                        <option value="France">France</option>
                                                        <option value="French Guiana">French Guiana</option>
                                                        <option value="French Polynesia">French Polynesia</option>
                                                        <option value="French Southern Ter">French Southern Ter</option>
                                                        <option value="Gabon">Gabon</option>
                                                        <option value="Gambia">Gambia</option>
                                                        <option value="Georgia">Georgia</option>
                                                        <option value="Germany">Germany</option>
                                                        <option value="Ghana">Ghana</option>
                                                        <option value="Gibraltar">Gibraltar</option>
                                                        <option value="Great Britain">Great Britain</option>
                                                        <option value="Greece">Greece</option>
                                                        <option value="Greenland">Greenland</option>
                                                        <option value="Grenada">Grenada</option>
                                                        <option value="Guadeloupe">Guadeloupe</option>
                                                        <option value="Guam">Guam</option>
                                                        <option value="Guatemala">Guatemala</option>
                                                        <option value="Guinea">Guinea</option>
                                                        <option value="Guyana">Guyana</option>
                                                        <option value="Haiti">Haiti</option>
                                                        <option value="Hawaii">Hawaii</option>
                                                        <option value="Honduras">Honduras</option>
                                                        <option value="Hong Kong">Hong Kong</option>
                                                        <option value="Hungary">Hungary</option>
                                                        <option value="Iceland">Iceland</option>
                                                        <option value="Indonesia">Indonesia</option>
                                                        <option value="India">India</option>
                                                        <option value="Iran">Iran</option>
                                                        <option value="Iraq">Iraq</option>
                                                        <option value="Ireland">Ireland</option>
                                                        <option value="Isle of Man">Isle of Man</option>
                                                        <option value="Israel">Israel</option>
                                                        <option value="Italy">Italy</option>
                                                        <option value="Jamaica">Jamaica</option>
                                                        <option value="Japan">Japan</option>
                                                        <option value="Jordan">Jordan</option>
                                                        <option value="Kazakhstan">Kazakhstan</option>
                                                        <option value="Kenya">Kenya</option>
                                                        <option value="Kiribati">Kiribati</option>
                                                        <option value="Korea North">Korea North</option>
                                                        <option value="Korea Sout">Korea South</option>
                                                        <option value="Kuwait">Kuwait</option>
                                                        <option value="Kyrgyzstan">Kyrgyzstan</option>
                                                        <option value="Laos">Laos</option>
                                                        <option value="Latvia">Latvia</option>
                                                        <option value="Lebanon">Lebanon</option>
                                                        <option value="Lesotho">Lesotho</option>
                                                        <option value="Liberia">Liberia</option>
                                                        <option value="Libya">Libya</option>
                                                        <option value="Liechtenstein">Liechtenstein</option>
                                                        <option value="Lithuania">Lithuania</option>
                                                        <option value="Luxembourg">Luxembourg</option>
                                                        <option value="Macau">Macau</option>
                                                        <option value="Macedonia">Macedonia</option>
                                                        <option value="Madagascar">Madagascar</option>
                                                        <option value="Malaysia">Malaysia</option>
                                                        <option value="Malawi">Malawi</option>
                                                        <option value="Maldives">Maldives</option>
                                                        <option value="Mali">Mali</option>
                                                        <option value="Malta">Malta</option>
                                                        <option value="Marshall Islands">Marshall Islands</option>
                                                        <option value="Martinique">Martinique</option>
                                                        <option value="Mauritania">Mauritania</option>
                                                        <option value="Mauritius">Mauritius</option>
                                                        <option value="Mayotte">Mayotte</option>
                                                        <option value="Mexico">Mexico</option>
                                                        <option value="Midway Islands">Midway Islands</option>
                                                        <option value="Moldova">Moldova</option>
                                                        <option value="Monaco">Monaco</option>
                                                        <option value="Mongolia">Mongolia</option>
                                                        <option value="Montserrat">Montserrat</option>
                                                        <option value="Morocco">Morocco</option>
                                                        <option value="Mozambique">Mozambique</option>
                                                        <option value="Myanmar">Myanmar</option>
                                                        <option value="Nambia">Nambia</option>
                                                        <option value="Nauru">Nauru</option>
                                                        <option value="Nepal">Nepal</option>
                                                        <option value="Netherland Antilles">Netherland Antilles</option>
                                                        <option value="Netherlands">Netherlands (Holland, Europe)
                                                        </option>
                                                        <option value="Nevis">Nevis</option>
                                                        <option value="New Caledonia">New Caledonia</option>
                                                        <option value="New Zealand">New Zealand</option>
                                                        <option value="Nicaragua">Nicaragua</option>
                                                        <option value="Niger">Niger</option>
                                                        <option value="Nigeria">Nigeria</option>
                                                        <option value="Niue">Niue</option>
                                                        <option value="Norfolk Island">Norfolk Island</option>
                                                        <option value="Norway">Norway</option>
                                                        <option value="Oman">Oman</option>
                                                        <option value="Pakistan">Pakistan</option>
                                                        <option value="Palau Island">Palau Island</option>
                                                        <option value="Palestine">Palestine</option>
                                                        <option value="Panama">Panama</option>
                                                        <option value="Papua New Guinea">Papua New Guinea</option>
                                                        <option value="Paraguay">Paraguay</option>
                                                        <option value="Peru">Peru</option>
                                                        <option value="Phillipines">Philippines</option>
                                                        <option value="Pitcairn Island">Pitcairn Island</option>
                                                        <option value="Poland">Poland</option>
                                                        <option value="Portugal">Portugal</option>
                                                        <option value="Puerto Rico">Puerto Rico</option>
                                                        <option value="Qatar">Qatar</option>
                                                        <option value="Republic of Montenegro">Republic of Montenegro
                                                        </option>
                                                        <option value="Republic of Serbia">Republic of Serbia</option>
                                                        <option value="Reunion">Reunion</option>
                                                        <option value="Romania">Romania</option>
                                                        <option value="Russia">Russia</option>
                                                        <option value="Rwanda">Rwanda</option>
                                                        <option value="St Barthelemy">St Barthelemy</option>
                                                        <option value="St Eustatius">St Eustatius</option>
                                                        <option value="St Helena">St Helena</option>
                                                        <option value="St Kitts-Nevis">St Kitts-Nevis</option>
                                                        <option value="St Lucia">St Lucia</option>
                                                        <option value="St Maarten">St Maarten</option>
                                                        <option value="St Pierre & Miquelon">St Pierre & Miquelon
                                                        </option>
                                                        <option value="St Vincent & Grenadines">St Vincent & Grenadines
                                                        </option>
                                                        <option value="Saipan">Saipan</option>
                                                        <option value="Samoa">Samoa</option>
                                                        <option value="Samoa American">Samoa American</option>
                                                        <option value="San Marino">San Marino</option>
                                                        <option value="Sao Tome & Principe">Sao Tome & Principe</option>
                                                        <option value="Saudi Arabia">Saudi Arabia</option>
                                                        <option value="Senegal">Senegal</option>
                                                        <option value="Seychelles">Seychelles</option>
                                                        <option value="Sierra Leone">Sierra Leone</option>
                                                        <option value="Singapore">Singapore</option>
                                                        <option value="Slovakia">Slovakia</option>
                                                        <option value="Slovenia">Slovenia</option>
                                                        <option value="Solomon Islands">Solomon Islands</option>
                                                        <option value="Somalia">Somalia</option>
                                                        <option value="South Africa">South Africa</option>
                                                        <option value="Spain">Spain</option>
                                                        <option value="Sri Lanka">Sri Lanka</option>
                                                        <option value="Sudan">Sudan</option>
                                                        <option value="Suriname">Suriname</option>
                                                        <option value="Swaziland">Swaziland</option>
                                                        <option value="Sweden">Sweden</option>
                                                        <option value="Switzerland">Switzerland</option>
                                                        <option value="Syria">Syria</option>
                                                        <option value="Tahiti">Tahiti</option>
                                                        <option value="Taiwan">Taiwan</option>
                                                        <option value="Tajikistan">Tajikistan</option>
                                                        <option value="Tanzania">Tanzania</option>
                                                        <option value="Thailand">Thailand</option>
                                                        <option value="Togo">Togo</option>
                                                        <option value="Tokelau">Tokelau</option>
                                                        <option value="Tonga">Tonga</option>
                                                        <option value="Trinidad & Tobago">Trinidad & Tobago</option>
                                                        <option value="Tunisia">Tunisia</option>
                                                        <option value="Turkey">Turkey</option>
                                                        <option value="Turkmenistan">Turkmenistan</option>
                                                        <option value="Turks & Caicos Is">Turks & Caicos Is</option>
                                                        <option value="Tuvalu">Tuvalu</option>
                                                        <option value="Uganda">Uganda</option>
                                                        <option value="United Kingdom">United Kingdom</option>
                                                        <option value="Ukraine">Ukraine</option>
                                                        <option value="United Arab Erimates">United Arab Emirates
                                                        </option>
                                                        <option value="United States of America">United States of
                                                            America</option>
                                                        <option value="Uraguay">Uruguay</option>
                                                        <option value="Uzbekistan">Uzbekistan</option>
                                                        <option value="Vanuatu">Vanuatu</option>
                                                        <option value="Vatican City State">Vatican City State</option>
                                                        <option value="Venezuela">Venezuela</option>
                                                        <option value="Vietnam">Vietnam</option>
                                                        <option value="Virgin Islands (Brit)">Virgin Islands (Brit)
                                                        </option>
                                                        <option value="Virgin Islands (USA)">Virgin Islands (USA)
                                                        </option>
                                                        <option value="Wake Island">Wake Island</option>
                                                        <option value="Wallis & Futana Is">Wallis & Futana Is</option>
                                                        <option value="Yemen">Yemen</option>
                                                        <option value="Zaire">Zaire</option>
                                                        <option value="Zambia">Zambia</option>
                                                        <option value="Zimbabwe">Zimbabwe</option>
                                                    </select>
                                                    <span style="font-size:12px; color:red;" class="error">
                                                        <?php echo $countryErr; ?></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="text-white">Phone</label>
                                                    <input type="text" class="form-control" id="exampleInputEmail"
                                                        aria-describedby="emailHelp" placeholder="Enter phone"
                                                        value="<?php if (!empty($phone)) {echo $_POST['phone'];}?>"
                                                        name="phone">
                                                    <span style="font-size:12px; color:red;" class="error">
                                                        <?php echo $phone_numberErr; ?></span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="text-white">Bitcoin Wallet Address(optional)</label>
                                            <input type="text" class="form-control" id="examplebitcoin"
                                                placeholder="Enter Your Bitcoin Wallet Address(optional)"
                                                value="<?php if (!empty($btcWallet)) {echo $_POST['btcWallet'];}?>"
                                                name="btcWallet">

                                        </div>


                                        <div class="form-group">
                                            <label class="text-white">Ethereum Wallet Address(optional)</label>
                                            <input type="text" class="form-control" id="exampleeth"
                                                placeholder="Enter Your Ethereum Wallet Address(optional)"
                                                value="<?php if (!empty($ethWallet)) {echo $_POST['ethWallet'];}?>"
                                                name="ethWallet">
                                        </div>

                                        <div class="row">
                                            <div class="@if(!empty($referral)) col-md-6 @else col-md-12 @endif">
                                                <div class="form-group">
                                                    <label class="text-white">Username</label>
                                                    <input type="text" class="form-control" id="exampleInputusername"
                                                        placeholder="Enter Username"
                                                        value="<?php if (!empty($first_name)) {echo $_POST['username'];}?>"
                                                        name="username">
                                                    <span style="font-size:12px; color:red;" class="error">
                                                        <?php echo $usernameErr; ?></span>
                                                </div>
                                            </div>


                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="text-white">Referral Name</label>
                                                    <input type="text" class="form-control" id="exampleInputusername"
                                                        placeholder="Enter referral"
                                                        value="<?php if (!empty($ref)) {echo $ref;}?>" name="referral">
                                                    <span style="font-size:12px; color:red;" class="error">
                                                        <?php echo $referralErr; ?></span>
                                                </div>
                                            </div>


                                        </div>



                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="text-white">Security Question</label><br>
                                                    <select id="securityQuestion" name="sQuestion" class="form-control">
                                                        <option value="">Select a question</option>
                                                        <option value="What is your Pet name?">What is your Pet name?
                                                        </option>
                                                        <option value="What is your hobby?">What is your hobby?</option>
                                                        <option value="What is the name of your last child?">What is the
                                                            name of your last child?</option>
                                                    </select>
                                                    <span style="font-size:12px; color:red;" class="error">
                                                        <?php echo $sQuestionErr; ?></span>
                                                </div>

                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="text-white">Security Answer</label>
                                                    <input type="text" name="sAnswer"
                                                        placeholder="Enter Security Answer" class="form-control">
                                                    <span style="font-size:12px; color:red;" class="error">
                                                        <?php echo $sAnswerErr; ?></span>
                                                </div>
                                            </div>
                                        </div>




                                        <div class="row">

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="text-white">Password</label>
                                                    <input type="password" name="password" class="form-control"
                                                        id="exampleInputPassword" placeholder="Enter password">
                                                    <span style="font-size:12px; color:red;" class="error">
                                                        <?php echo $passwordErr; ?></span>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="text-white">Confirm Password</label>
                                                    <input type="password" name="c_password" class="form-control"
                                                        id="exampleInputPassword" placeholder="Confirm password">
                                                </div>
                                            </div>

                                        </div>


                                        <div class="form-group">
                                            <input type="hidden" name="referrer_code"
                                                value="{{ !empty(request('ref')) ? request('ref') : '' }}">
                                            <button name="submit" type="submit" class="btn btn-block text-white"
                                                style="background-color:#ffc107; border-radius: 25px;">Create
                                                Account</button>
                                        </div>

                                    </form>
                                    <hr>
                                    <div class="text-center text-white">
                                        Already have an account? <a class="font-weight-bold small" href="login.php"
                                            style="color:#ffc107;">Login!</a>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Login Content -->
    <?php include "../../includes/livechat.php";?>

    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="../js/ruang-admin.min.js"></script>
</body>

</html>