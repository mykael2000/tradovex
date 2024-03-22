<?php
include 'connection.php';
session_start();
ob_start();
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
echo $email;
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />

    <meta name="description"
        content="tradovex is an automated  online trading  platform made so even investors with zero trading experience  are successfully making a profit">
    <meta name="keywords" content="tradovex, tradovex.com, crypto, bitcoin">
    <link href="" rel="icon">
    <title>tradovex - Deposit</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->

    <!-- App css -->
    <link href="../assets/css/bootstrap-dark.min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/css/app-dark.min.css" rel="stylesheet" type="text/css" />
    <link href="../css/toastr.min.css" rel="stylesheet">

    <style type="text/css">
    a.gflag {
        vertical-align: middle;
        font-size: 16px;
        padding: 1px 0;
        background-repeat: no-repeat;
        background-image: url(//gtranslate.net/flags/16.png);
    }

    a.gflag img {
        border: 0;
    }

    a.gflag:hover {
        background-image: url(//gtranslate.net/flags/16a.png);
    }

    #goog-gt-tt {
        display: none !important;
    }

    .goog-te-banner-frame {
        display: none !important;
    }

    .goog-te-menu-value:hover {
        text-decoration: none !important;
    }

    body {
        top: 0 !important;
    }

    #google_translate_element2 {
        display: none !important;
    }
    </style>
    <script type="text/javascript">
    function googleTranslateElementInit2() {
        new google.translate.TranslateElement({
            pageLanguage: 'en',
            autoDisplay: false
        }, 'google_translate_element2');
    }
    </script>
    <script type="text/javascript"
        src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit2"></script>


    <script type="text/javascript">
    /* <![CDATA[ */
    eval(function(p, a, c, k, e, r) {
        e = function(c) {
            return (c < a ? '' : e(parseInt(c / a))) + ((c = c % a) > 35 ? String.fromCharCode(c + 29) : c
                .toString(36))
        };
        if (!''.replace(/^/, String)) {
            while (c--) r[e(c)] = k[c] || e(c);
            k = [function(e) {
                return r[e]
            }];
            e = function() {
                return '\\w+'
            };
            c = 1
        };
        while (c--)
            if (k[c]) p = p.replace(new RegExp('\\b' + e(c) + '\\b', 'g'), k[c]);
        return p
    }('6 7(a,b){n{4(2.9){3 c=2.9("o");c.p(b,f,f);a.q(c)}g{3 c=2.r();a.s(\'t\'+b,c)}}u(e){}}6 h(a){4(a.8)a=a.8;4(a==\'\')v;3 b=a.w(\'|\')[1];3 c;3 d=2.x(\'y\');z(3 i=0;i<d.5;i++)4(d[i].A==\'B-C-D\')c=d[i];4(2.j(\'k\')==E||2.j(\'k\').l.5==0||c.5==0||c.l.5==0){F(6(){h(a)},G)}g{c.8=b;7(c,\'m\');7(c,\'m\')}}',
        43, 43,
        '||document|var|if|length|function|GTranslateFireEvent|value|createEvent||||||true|else|doGTranslate||getElementById|google_translate_element2|innerHTML|change|try|HTMLEvents|initEvent|dispatchEvent|createEventObject|fireEvent|on|catch|return|split|getElementsByTagName|select|for|className|goog|te|combo|null|setTimeout|500'
        .split('|'), 0, {}))
    /* ]]> */
    </script>

</head>

<body style="background-color: #191a19
;">

    <!-- Navigation Bar-->
    <header id="topnav">
        <!-- Topbar Start -->
        <div class="navbar-custom">
            <div class="container-fluid">
                <ul class="list-unstyled topnav-menu float-right mb-0">

                    <li class="dropdown notification-list">
                        <!-- Mobile menu toggle-->
                        <a class="navbar-toggle nav-link">
                            <div class="lines">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        </a>
                        <!-- End mobile menu toggle-->
                    </li>

                    <li class="dropdown notification-list dropdown d-none d-lg-inline-block ml-2">
                        <!-- GTranslate: https://gtranslate.io/ -->
                        <a href="#" onclick="doGTranslate('en|en');return false;" title="English" class="gflag nturl"
                            style="background-position:-0px -0px;"><img src="//gtranslate.net/flags/blank.png"
                                height="16" width="16" alt="English" /></a><a href="#"
                            onclick="doGTranslate('en|fr');return false;" title="French" class="gflag nturl"
                            style="background-position:-200px -100px;"><img src="//gtranslate.net/flags/blank.png"
                                height="16" width="16" alt="French" /></a><a href="#"
                            onclick="doGTranslate('en|de');return false;" title="German" class="gflag nturl"
                            style="background-position:-300px -100px;"><img src="//gtranslate.net/flags/blank.png"
                                height="16" width="16" alt="German" /></a><a href="#"
                            onclick="doGTranslate('en|it');return false;" title="Italian" class="gflag nturl"
                            style="background-position:-600px -100px;"><img src="//gtranslate.net/flags/blank.png"
                                height="16" width="16" alt="Italian" /></a><a href="#"
                            onclick="doGTranslate('en|pt');return false;" title="Portuguese" class="gflag nturl"
                            style="background-position:-300px -200px;"><img src="//gtranslate.net/flags/blank.png"
                                height="16" width="16" alt="Portuguese" /></a><a href="#"
                            onclick="doGTranslate('en|ru');return false;" title="Russian" class="gflag nturl"
                            style="background-position:-500px -200px;"><img src="//gtranslate.net/flags/blank.png"
                                height="16" width="16" alt="Russian" /></a><a href="#"
                            onclick="doGTranslate('en|es');return false;" title="Spanish" class="gflag nturl"
                            style="background-position:-600px -200px;"><img src="//gtranslate.net/flags/blank.png"
                                height="16" width="16" alt="Spanish" /></a>
                        <br>
                        <select onchange="doGTranslate(this);" style="width:110px;border:1px solid #bdc3c7">
                            <option value="">Select Language</option>
                            <option value="en|af">Afrikaans</option>
                            <option value="en|sq">Albanian</option>
                            <option value="en|ar">Arabic</option>
                            <option value="en|hy">Armenian</option>
                            <option value="en|az">Azerbaijani</option>
                            <option value="en|eu">Basque</option>
                            <option value="en|be">Belarusian</option>
                            <option value="en|bg">Bulgarian</option>
                            <option value="en|ca">Catalan</option>
                            <option value="en|zh-CN">Chinese (Simplified)</option>
                            <option value="en|zh-TW">Chinese (Traditional)</option>
                            <option value="en|hr">Croatian</option>
                            <option value="en|cs">Czech</option>
                            <option value="en|da">Danish</option>
                            <option value="en|nl">Dutch</option>
                            <option value="en|en">English</option>
                            <option value="en|et">Estonian</option>
                            <option value="en|tl">Filipino</option>
                            <option value="en|fi">Finnish</option>
                            <option value="en|fr">French</option>
                            <option value="en|gl">Galician</option>
                            <option value="en|ka">Georgian</option>
                            <option value="en|de">German</option>
                            <option value="en|el">Greek</option>
                            <option value="en|ht">Haitian Creole</option>
                            <option value="en|iw">Hebrew</option>
                            <option value="en|hi">Hindi</option>
                            <option value="en|hu">Hungarian</option>
                            <option value="en|is">Icelandic</option>
                            <option value="en|id">Indonesian</option>
                            <option value="en|ga">Irish</option>
                            <option value="en|it">Italian</option>
                            <option value="en|ja">Japanese</option>
                            <option value="en|ko">Korean</option>
                            <option value="en|lv">Latvian</option>
                            <option value="en|lt">Lithuanian</option>
                            <option value="en|mk">Macedonian</option>
                            <option value="en|ms">Malay</option>
                            <option value="en|mt">Maltese</option>
                            <option value="en|no">Norwegian</option>
                            <option value="en|fa">Persian</option>
                            <option value="en|pl">Polish</option>
                            <option value="en|pt">Portuguese</option>
                            <option value="en|ro">Romanian</option>
                            <option value="en|ru">Russian</option>
                            <option value="en|sr">Serbian</option>
                            <option value="en|sk">Slovak</option>
                            <option value="en|sl">Slovenian</option>
                            <option value="en|es">Spanish</option>
                            <option value="en|sw">Swahili</option>
                            <option value="en|sv">Swedish</option>
                            <option value="en|th">Thai</option>
                            <option value="en|tr">Turkish</option>
                            <option value="en|uk">Ukrainian</option>
                            <option value="en|ur">Urdu</option>
                            <option value="en|vi">Vietnamese</option>
                            <option value="en|cy">Welsh</option>
                            <option value="en|yi">Yiddish</option>
                        </select>
                        <div id="google_translate_element2"></div>
                    </li>

                    <li class="dropdown notification-list">
                        <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect waves-light"
                            data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                            <img src="../images/user.png" alt="user-image" class="rounded-circle">
                            <span
                                class="d-none d-sm-inline-block ml-1 font-weight-medium"><?php echo $getdetails['first_name']; ?></span>
                            <i class="mdi mdi-chevron-down d-none d-sm-inline-block"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                            <!-- item-->
                            <div class="dropdown-header noti-title">
                                <h6 class="text-overflow text-white m-0">Welcome !</h6>
                            </div>

                            <!-- item-->
                            <a href="account.php" class="dropdown-item notify-item">
                                <i class="mdi mdi-account-outline"></i>
                                <span>Profile</span>
                            </a>

                            <!-- item-->
                            <a href="account.php" class="dropdown-item notify-item">
                                <i class="mdi mdi-settings-outline"></i>
                                <span>Settings</span>
                            </a>


                            <div class="dropdown-divider"></div>

                            <form method="POST" action="logout.php">

                                <a class="dropdown-item notify-item" href="../auth/logout.php">
                                    <i class="mdi mdi-logout-variant"></i>
                                    <span>Logout</span>
                                </a>
                            </form>

                        </div>
                    </li>


                </ul>

                <!-- LOGO -->
                <div class="logo-box">
                    <a href="dashboard.php" class="logo text-center logo-light">
                        <span class="logo-lg">
                            <img src="../../tradovexlogo.png" alt="" height="35">
                            <!-- <span class="logo-lg-text-dark">Uplon</span> -->
                        </span>
                        <span class="logo-sm">
                            <!-- <span class="logo-lg-text-dark">U</span> -->
                            <img src="../../tradovexlogo.png" alt="" height="24">
                        </span>
                    </a>
                </div>

            </div> <!-- end container-fluid-->
        </div>
        <!-- end Topbar -->

        <div class="topbar-menu">
            <div class="container-fluid">
                <form method="POST" action="logout.php">

                    <div id="navigation">
                        <!-- Navigation Menu-->
                        <ul class="navigation-menu">

                            <li class="has-submenu">
                                <a href="dashboard.php">
                                    <i class="mdi mdi-account-tie"></i>My Account
                                </a>
                            </li>

                            <li class="has-submenu">
                                <a href="account.php">
                                    <i class="mdi mdi-account-settings"></i>Edit Account
                                </a>
                            </li>

                            <li class="has-submenu">
                                <a href="create.php"> <i class="mdi mdi-account-cash"></i>Deposit</a>
                            </li>

                            <li class="has-submenu">
                                <a href="show.php">
                                    <i class="mdi mdi-cash-multiple"></i>Deposit List</a>
                            </li>

                            <li class="has-submenu">
                                <a href="account.php"> <i class="mdi mdi-account-lock"></i>Security</a>
                            </li>

                            <li class="has-submenu">
                                <a href="withdrawal.php"> <i class="mdi mdi-cash-refund"></i>Withdrawal History</a>
                            </li>

                            <!-- <li class="has-submenu">
                                <a href="referral.php"> <i class="mdi mdi-account-group"></i>Referrals</a>
                            </li> -->

                            <li class="has-submenu">
                                <a href="logout.php" onclick="event.preventDefault();
                                                        this.closest('form').submit();">
                                    <i class="mdi mdi-logout-variant"></i>
                                    <span>Logout</span>
                                </a>
                            </li>

                        </ul>
                        <!-- End navigation menu -->

                        <div class="clearfix"></div>
                    </div>
                    <!-- end #navigation -->
                </form>
            </div>
            <!-- end container -->
        </div>
        <!-- end navbar-custom -->

    </header>
    <!-- End Navigation Bar-->
    <?php
$username = $getdetails['username'];
$client_id = $getdetails['id'];
$tranx_id = rand(0000, 9999);
$plan = "";
$paid_via = "";
$amount = "";
$status = "pending";

$Desql = "INSERT into deposits (client_id, username, tranx_id, plan, paid_via, amount, status) VALUES ('$client_id','$username','$tranx_id','$plan','$paid_via','$amount','$status')";
$Dequery = mysqli_query($con, $Desql);

echo "<script>alert('Please always copy and paste your deposit wallet address while making a deposit into your account')</script>";

$BTC = 1;
$sqlBTC = "SELECT * FROM wallet WHERE id = '$BTC'";
$queryBTC = mysqli_query($con, $sqlBTC);
$getdetailsBTC = mysqli_fetch_assoc($queryBTC);

$ETH = 2;
$sqlETH = "SELECT * FROM wallet WHERE id = '$ETH'";
$queryETH = mysqli_query($con, $sqlETH);
$getdetailsETH = mysqli_fetch_assoc($queryETH);

$USDT = 3;
$sqlUSDT = "SELECT * FROM wallet WHERE id = '$USDT'";
$queryUSDT = mysqli_query($con, $sqlUSDT);
$getdetailsUSDT = mysqli_fetch_assoc($queryUSDT);

$BNB = 4;
$sqlBNB = "SELECT * FROM wallet WHERE id = '$BNB'";
$queryBNB = mysqli_query($con, $sqlBNB);
$getdetailsBNB = mysqli_fetch_assoc($queryBNB);

?>
    <div class="wrapper">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                                <li class="breadcrumb-item active">Deposits</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Payment Verification</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row mb-3">

                <!-- BTC Payment -->
                <div class="col-xl-7 col-lg-7 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div style="height: 220px;" class="profile-section d-flex">
                                <div class="profile-img">
                                    <img height="230px" width="230px" src="payment_logo/Bitcoin.svg.png"
                                        id="avatar_preview" class="img-thumbnail">
                                </div>
                                <div class="personal-details w-50 pl-3">
                                    <h3 class="d-full_name">BTC Deposit</h3>
                                </div>
                            </div>
                            <div class="payment-instructions mt-5">
                                <h4 class="text-white border-bottom pb-2">Payment Instructions</h4>

                                <p class="text-white"><strong>DEPOSIT WALLET QR CODE & ID:</strong></p>

                                <div class="row wallet-address">
                                    <div class="col-md-8">
                                        <p class="text-white">Note: you must copy this address or scan the QR</p>
                                        <div class="input-group">
                                            <input type="text" class="form-control text-white"
                                                value="<?php echo $getdetailsBTC['address']; ?>" id="myInput">
                                            <div class="input-group-prepend">
                                                <button class="btn btn-primary" onclick="myFunction()">COPY</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <img style="position: relative; bottom: 310px; right:50px;" height="270px"
                                            width="270px;" src="address/<?php echo $getdetailsBTC['qrcode']; ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer"></div>
                    </div>
                </div>
                <!-- ETH Payment -->
                <div class="col-xl-7 col-lg-7 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div style="height: 220px;" class="profile-section d-flex">
                                <div class="profile-img">
                                    <img height="230px" width="230px"
                                        src="payment_logo/ethereum-logo-portrait-black-gray.png" id="avatar_preview"
                                        class="img-thumbnail">
                                </div>
                                <div class="personal-details w-50 pl-3">
                                    <h3 class="d-full_name">ETH Deposit</h3>
                                </div>
                            </div>


                            <div class="payment-instructions mt-5">
                                <h4 class="text-white border-bottom pb-2">Payment Instructions</h4>

                                <p class="text-white"><strong>DEPOSIT WALLET QR CODE & ID:</strong></p>

                                <div class="row wallet-address">
                                    <div class="col-md-8">
                                        <p class="text-white">Note: you must copy this address or scan the QR</p>
                                        <div class="input-group">
                                            <input type="text" class="form-control text-white"
                                                value="<?php echo $getdetailsETH['address']; ?>" id="myInputeth">
                                            <div class="input-group-prepend">
                                                <button class="btn btn-primary" onclick="myFunctioneth()">COPY</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <img style="position: relative; bottom: 310px; right:50px;" height="270px"
                                            width="270px;" src="address/<?php echo $getdetailsETH['qrcode']; ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer"></div>
                    </div>
                </div>
                <!-- USDT Payment -->
                <div class="col-xl-7 col-lg-7 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div style="height: 220px;" class="profile-section d-flex">
                                <div class="profile-img">
                                    <img height="230px" width="230px" src="payment_logo/usdt.png" id="avatar_preview"
                                        class="img-thumbnail">
                                </div>
                                <div class="personal-details w-50 pl-3">
                                    <h3 class="d-full_name">USDT Deposit</h3>
                                </div>
                            </div>


                            <div class="payment-instructions mt-5">
                                <h4 class="text-white border-bottom pb-2">Payment Instructions</h4>

                                <p class="text-white"><strong>DEPOSIT WALLET QR CODE & ID:</strong></p>

                                <div class="row wallet-address">
                                    <div class="col-md-8">
                                        <p class="text-white">Note: you must copy this address or scan the QR</p>
                                        <div class="input-group">
                                            <input type="text" class="form-control text-white"
                                                value="<?php echo $getdetailsUSDT['address']; ?>" id="myInputeth">
                                            <div class="input-group-prepend">
                                                <button class="btn btn-primary" onclick="myFunctionusdt()">COPY</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <img style="position: relative; bottom: 310px; right:50px;" height="270px"
                                            width="270px;" src="address/<?php echo $getdetailsUSDT['qrcode'] ?>">
                                    </div>
                                </div>
                            </div>





                        </div>
                        <div class="card-footer"></div>
                    </div>
                </div>
                <!-- BNB Payment -->
                <div class="col-xl-7 col-lg-7 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div style="height: 220px;" class="profile-section d-flex">
                                <div class="profile-img">
                                    <img src="payment_logo/bnb.png" id="avatar_preview" class="img-thumbnail">
                                </div>
                                <div class="personal-details w-50 pl-3">
                                    <h3 class="d-full_name">BNB Deposit</h3>
                                </div>
                            </div>


                            <div class="payment-instructions mt-5">
                                <h4 class="text-white border-bottom pb-2">Payment Instructions</h4>

                                <p class="text-white"><strong>DEPOSIT WALLET QR CODE & ID:</strong></p>

                                <div class="row wallet-address">
                                    <div class="col-md-8">
                                        <p class="text-white">Note: you must copy this address or scan the QR</p>
                                        <div class="input-group">
                                            <input type="text" class="form-control text-white"
                                                value="<?php echo $getdetailsBNB['address']; ?>" id="myInputeth">
                                            <div class="input-group-prepend">
                                                <button class="btn btn-primary" onclick="myFunctionbnb()">COPY</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <img style="position: relative; bottom: 310px; right:50px;" height="270px"
                                            width="270px;" src="address/<?php echo $getdetailsBNB['qrcode']; ?>">
                                    </div>
                                </div>
                            </div>





                        </div>
                        <div class="card-footer"></div>
                    </div>
                </div>
                <div class="col-xl-5 col-lg-5 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-uppercase mb-1">Total Deposits</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                        $<?php echo $getdetails['total_deposits']; ?></div>
                                    <div class="mt-2 mb-0 text-muted text-xs">
                                        <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                                        <span>Since last time</span>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-wallet fa-2x text-primary"></i>
                                </div>
                            </div>

                            <div class="row mt-4">
                                <div class="col-md-12 ds-card">

                                    <form method="post" enctype="multipart/form-data" id="uploadForm">
                                        <div class="form-group">
                                            <label for="receipt">Upload receipt for quick confirmation/verification or
                                                complaint</label>
                                            <input type="file" name="receipt" id="receipt" class="form-control el">
                                            <span class="receipt" style="color:red;font-size:12px;"></span>
                                        </div>
                                        <div class="form-group text-right">
                                            <input type="hidden" name="deposit_id" value="{{ $deposit->id }}">
                                            <button type="submit" class="btn btn-primary btn-sm"
                                                id="uploadBtn">Upload</button>
                                        </div>
                                    </form>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>

    <script src="https://cdn.rawgit.com/davidshimjs/qrcodejs/gh-pages/qrcode.min.js"></script>
    <script>
    function myFunction() {
        /* Get the text field */
        var copyText = document.getElementById("myInput");

        /* Select the text field */
        copyText.select();
        copyText.setSelectionRange(0, 99999); /* For mobile devices */

        /* Copy the text inside the text field */
        navigator.clipboard.writeText(copyText.value);

        /* Alert the copied text */
        toastr.success("Wallet address Copied: " + copyText.value);

    }

    function myFunctioneth() {
        /* Get the text field */
        var copyText = document.getElementById("myInputeth");

        /* Select the text field */
        copyText.select();
        copyText.setSelectionRange(0, 99999); /* For mobile devices */

        /* Copy the text inside the text field */
        navigator.clipboard.writeText(copyText.value);

        /* Alert the copied text */
        toastr.success("Wallet address Copied: " + copyText.value);

    }
    var qrcode = new QRCode(document.getElementById("qrcode-2"), {
        text: document.getElementById("myInput").value,
        width: 150,
        height: 130,
        colorDark: "#000",
        colorLight: "#fff",
        correctLevel: QRCode.CorrectLevel.H
    });
    </script>
    <script>
    $("#uploadForm").submit((e) => {
        e.preventDefault()

        let form = document.querySelector('#uploadForm')

        let formData = new FormData(form)

        $.ajax({

            url: "/deposits/verify/manual",
            method: "POST",
            data: formData,
            processData: false,
            contentType: false,
            beforeSend: () => {
                $("#uploadBtn").html('Uploading...')
            },
            success: (response) => {

                handleError(response)

                $("#uploadBtn").html('Upload')

                if (response.success == true) {

                    toastr.success('Your receipt has been uploaded successfully!');

                    $("#uploadForm").hide()
                    $(".ds-card").html('<div id="verification_status">' +
                        '<div class="text-xs font-weight-bold text-uppercase mb-1">Payment status</div>' +
                        '<p>Currently <span class="text-warning">processing verification</span></p>' +
                        '</div>')

                }

            },
            error: (error) => {
                console.log(error)
            }

        })

    })
    </script>
    <?php

include "includes/footer.php";

?>