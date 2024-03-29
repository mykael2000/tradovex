<?php
include 'includes/connection.php';
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

if (isset($_POST['changepicture'])) {

    $target_dir = "pictures/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $pname = $_FILES["fileToUpload"]["name"];

    $updatepic = "UPDATE clients set avatar = '$pname' WHERE username ='$clientid'";
    $picquery = mysqli_query($con, $updatepic);

    move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);

    echo "<script>alert('profile picture changed successfully')</script>";
    header("location:account.php");
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />

    <meta name="description"
        content="tradovex is an automated  online trading  platform made so even investors with zero trading experience  are successfully making a profit">
    <meta name="keywords" content="tradovex, tradovex.com, crypto, bitcoin">
    <link href="" rel="icon">
    <title>tradovex - Account</title>
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
    <!-- Container Fluid-->
    <div class="wrapper">
        <div class="container-fluid" id="container-wrapper">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                                <li class="breadcrumb-item active">Account</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Account Settings</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <!-- Form Basic -->
                    <div class="card mb-4">

                        <div class="card-body">

                            <div class="profile-section d-flex">
                                <!-- <div class="profile-img w-25">
                                    <img src="pictures/<?php echo $getdetails['avatar']; ?>" id="avatar_preview"
                                        class="w-100 img-thumbnail">
                                    <span class="text-danger avatar fts-12"></span>
                                    <form method="POST" action="" enctype="multipart/form-data">
                                        <input name="fileToUpload" type="file" class="form-file-input" id="customFile">
                                        <label class="form-file-label" for="customFile">
                                            <button type="submit" name="changepicture" class="btn btn-primary">Change
                                                profile picture</button>

                                        </label>
                                    </form>
                                </div> -->
                                <div class="personal-details w-50 pl-3">
                                    <h3 class="d-full_name"><?php echo $getdetails['first_name']; ?>
                                        <?php echo $getdetails['last_name']; ?></h3>
                                    <p class="d-email"><?php echo $getdetails['email']; ?></p>
                                    <!--<form enctype="multipart/form-data" class="avatarForm">-->
                                    <!--    <div class="form-group">-->
                                    <!--        <label for="change_avatar" class="btn btn-primary btn-sm chng-btn">Change avatar</label>-->
                                    <!--        <input type="file" name="avatar" id="change_avatar" class="d-none" class="el">-->
                                    <!--    </div>-->
                                    <!--</form>-->
                                </div>
                            </div>

                            <nav class="mt-5">
                                <ul class="nav nav-tabs nav-justified" id="nav-tab" role="tablist">

                                    <li class="nav-item">
                                        <a class="nav-link active" id="nav-personal-tab" data-toggle="tab"
                                            href="#nav-personal" role="tab" aria-controls="nav-personal"
                                            aria-selected="true">Personal Information</a>
                                    </li>



                                    <li class="nav-item">
                                        <a class="nav-link" id="nav-account-security-tab" data-toggle="tab"
                                            href="#nav-account-security" role="tab" aria-controls="nav-account-security"
                                            aria-selected="false">Account Security</a>
                                    </li>

                                </ul>
                            </nav>

                            <div class="tab-content mt-4" id="nav-tabContent">

                                <div class="tab-pane fade show active" id="nav-personal" role="tabpanel"
                                    aria-labelledby="nav-personal-tab">
                                    <form method="post" autocomplete="off" class="personalInfoForm">

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="name">First name</label>
                                                    <input type="text" name="first_name" class="form-control el"
                                                        placeholder="Enter your first name"
                                                        value="<?php echo $getdetails['first_name']; ?>" disabled>
                                                    <span class="text-danger first_name fts-12"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="name">Last name</label>
                                                    <input type="text" name="last_name" class="form-control el"
                                                        placeholder="Enter your last name"
                                                        value="<?php echo $getdetails['last_name']; ?>" disabled>
                                                    <span class="text-danger last_name fts-12"></span>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="email">Email address</label>
                                                    <input type="email" name="email" class="form-control el"
                                                        placeholder="Enter your email address"
                                                        value="<?php echo $getdetails['email']; ?>" disabled>
                                                    <span class="text-danger email fts-12"></span>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="phone">Phone</label>
                                                    <input type="text" name="phone" class="form-control el"
                                                        placeholder="Enter your phone number"
                                                        value="<?php echo $getdetails['phone']; ?>" disabled>
                                                    <span class="text-danger phone fts-12"></span>
                                                </div>
                                            </div>



                                            <!--<div class="col-md-6">-->
                                            <!--  <div class="form-group">-->
                                            <!--    <label for="company">Date Of Birth</label>-->
                                            <!--    <input type="date" name="date_of_birth" class="form-control el" placeholder="Enter your date of birth" value="{{ date('Y-m-d', strtotime(auth('client')->user()->date_of_birth)) }}">-->
                                            <!--    <span class="text-danger date_of_birth fts-12"></span>-->
                                            <!--  </div>-->
                                            <!--</div>-->

                                            <!--<div class="col-md-12">-->
                                            <!--  <div class="form-group">-->
                                            <!--    <label for="address">Address</label>-->
                                            <!--    <input type="text" name="physical_address" class="form-control el" placeholder="Enter your address" value="{{ auth('client')->user()->physical_address }}">-->
                                            <!--    <span class="text-danger physical_address fts-12"></span>-->
                                            <!--  </div>-->
                                            <!--</div>-->

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="country">Country</label>
                                                    <input type="text" name="country" class="form-control el"
                                                        placeholder="Enter your country"
                                                        value="<?php echo $getdetails['country']; ?>" disabled>
                                                    <span class="text-danger country fts-12"></span>
                                                </div>
                                            </div>

                                            <!--<div class="col-md-6">-->
                                            <!--  <div class="form-group">-->
                                            <!--    <label for="region">Region</label>-->
                                            <!--    <input type="text" name="region" class="form-control el" placeholder="Enter your region" value="{{ auth('client')->user()->region }}">-->
                                            <!--    <span class="text-danger region fts-12"></span>-->
                                            <!--  </div>-->
                                            <!--</div>-->

                                            <!--<div class="col-md-6">-->
                                            <!--  <div class="form-group">-->
                                            <!--    <label for="town">Town</label>-->
                                            <!--    <input type="text" name="town" class="form-control el" placeholder="Enter your town" value="{{ auth('client')->user()->town }}">-->
                                            <!--    <span class="text-danger town fts-12"></span>-->
                                            <!--  </div>-->
                                            <!--</div>-->

                                            <!--    <div class="col-md-6">-->
                                            <!--      <div class="form-group">-->
                                            <!--        <label for="postcode">Post Code</label>-->
                                            <!--        <input type="text" name="postcode" class="form-control el" placeholder="Enter your postcode" value="{{ auth('client')->user()->postcode }}">-->
                                            <!--        <span class="text-danger postcode fts-12"></span>-->
                                            <!--      </div>-->
                                            <!--    </div>-->

                                        </div>




                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary btn-sm saveBtn">Save
                                                changes</button>
                                        </div>

                                    </form>
                                </div>

                                <div class="tab-pane fade" id="nav-payment" role="tabpanel"
                                    aria-labelledby="nav-payment-tab">

                                    <form method="post" autocomplete="off" class="paymentForm">

                                        <div class="form-group">
                                            <label for="payment_method">Select Payment method</label>
                                            <select name="payment_method" id="payment_method" class="form-control el">
                                                <option value="">-- Select --</option>
                                                @foreach($payment_methods as $payment_method)
                                                @php
                                                $payment = json_decode($payment_method->data);
                                                @endphp
                                                <option value="{{ $payment_method->id }}" @if(!empty($payment_info) &&
                                                    $payment_info->payment_method_id == $payment_method->id) selected
                                                    @endif>{{ empty($payment->method_name) ? 'Bank Transfer': ucwords($payment->method_name) }}
                                                </option>
                                                @endforeach
                                            </select>
                                            <span class="text-danger payment_method fts-12"></span>
                                        </div>

                                        <div
                                            class="form-group method @if(empty($paymentInfoData->note)) d-none @endif manual-method">
                                            <label for="manual">Enter payment note below</label>
                                            <textarea rows="5" class="form-control el" name="note"
                                                placeholder="Write here...">{{ !empty($paymentInfoData->note) ? $paymentInfoData->note:''  }}</textarea>
                                            <span class="note text-danger" style="font-size:12px;"></span>
                                        </div>

                                        <div
                                            class="form-group method @if(empty($paymentInfoData->bank_name)) d-none @endif bank-method">
                                            <label class="border-bottom pb-2">Enter bank details below</label>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Bank Name</label>
                                                        <input type="text" name="bank_name" class="form-control el"
                                                            placeholder="Enter bank name"
                                                            value="{{ !empty($paymentInfoData->bank_name) ? $paymentInfoData->bank_name:''  }}">
                                                        <span class="bank_name text-danger"
                                                            style="font-size:12px;"></span>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Account Name</label>
                                                        <input type="text" name="account_name" class="form-control el"
                                                            placeholder="Enter account name"
                                                            value="{{ !empty($paymentInfoData->account_name) ? $paymentInfoData->account_name:'' }}">
                                                        <span class="account_name text-danger"
                                                            style="font-size:12px;"></span>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Account Number</label>
                                                        <input type="text" name="account_number" class="form-control el"
                                                            placeholder="Enter account number"
                                                            value="{{ !empty($paymentInfoData->account_number) ? $paymentInfoData->account_number:'' }}">
                                                        <span class="account_number text-danger"
                                                            style="font-size:12px;"></span>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Swift Code</label>
                                                        <input type="text" name="swift_code" class="form-control el"
                                                            placeholder="Enter swift code"
                                                            value="{{ !empty($paymentInfoData->swift_code) ? $paymentInfoData->swift_code:'' }}">
                                                        <span class="swift_code text-danger"
                                                            style="font-size:12px;"></span>
                                                    </div>
                                                </div>

                                            </div>

                                        </div>

                                        <div
                                            class="form-group auto-method method @if(empty($paymentInfoData->email)) d-none @endif paypal-method">
                                            <label for="paypal">Enter your paypal email below</label>
                                            <input type="text" class="form-control el" name="email"
                                                placeholder="Type here..."
                                                value="{{ !empty($paymentInfoData->email) ? $paymentInfoData->email:'' }}">
                                            <span class="email text-danger" style="font-size:12px;"></span>
                                        </div>

                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary btn-sm saveBtn">Save
                                                changes</button>
                                        </div>

                                    </form>

                                </div>

                                <div class="tab-pane fade" id="nav-account-security" role="tabpanel"
                                    aria-labelledby="nav-account-security-tab">

                                    <form method="post" autocomplete="off" class="accountSecurityForm">

                                        <div class="form-group">
                                            <label for="current_password">Current password</label>
                                            <input type="password" name="current_password" id="current_password"
                                                class="form-control el" placeholder="Enter your current password">
                                            <span class="text-danger current_password fts-12"></span>
                                        </div>

                                        <div class="form-group">
                                            <label for="password">New password</label>
                                            <input type="password" name="password" id="password" class="form-control el"
                                                placeholder="Enter new password">
                                            <span class="text-danger password fts-12"></span>
                                        </div>

                                        <div class="form-group">
                                            <label for="cpassword">Confirm password</label>
                                            <input type="password" name="password_confirmation" id="cpassword"
                                                class="form-control" placeholder="Confirm password">
                                        </div>

                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary btn-sm saveBtn">Save
                                                changes</button>
                                        </div>

                                    </form>

                                </div>

                            </div>



                        </div>

                    </div>

                </div>

            </div>
            <!--Row-->

        </div>
        <!---Container Fluid-->
    </div>

    <script src="../js/account/client/settings.js'"></script>
    <?php

include 'includes/footer.php';

?>