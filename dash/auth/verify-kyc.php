<?php
include '../user-area/includes/connection.php';
session_start();
ob_start();

$username = $_SESSION['username'];
$sql = "SELECT * FROM clients WHERE username = '$username'";
$query = mysqli_query($con, $sql);
$user = mysqli_fetch_assoc($query);

$shopid = $user['id'];
if (!empty($user['kyc'])) {
    header("location:../user-area/dashboard.php");
}

if (isset($_POST['submit'])) {
    $identity_doc = $_POST["identity_type"];
    $address_doc_type = $_POST["address_doc_type"];
    $target_dir = "../uploads/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    $target_dirAdd = "../uploads/";
    $target_fileAdd = $target_dirAdd . basename($_FILES["address_document"]["name"]);
    $uploadOkAdd = 1;
    $imageFileTypeAdd = strtolower(pathinfo($target_fileAdd, PATHINFO_EXTENSION));

    $kyc = $_FILES["fileToUpload"]["name"];
    $address_doc = $_FILES["address_document"]["name"];
    $kycsql = "UPDATE clients set kyc = '$kyc', address_doc = '$address_doc', identity = '$identity_doc', address_doc_type = '$address_doc_type'  WHERE id = '$shopid'";
    $queryky = mysqli_query($con, $kycsql);
    move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
    move_uploaded_file($_FILES["address_document"]["tmp_name"], $target_fileAdd);
    header("location:../user-area/dashboard.php");

}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="With Tradovex your money works for you!">
    <meta name="keywords"
        content="Tradovex, Tradovex.com, ethereum invesment, bitcoin investment, stock investment, Tradovex">
    <link href="../storage/logos/N6PlpwsHVj4wa0MfeGD1iOzwj9fxwGzOjdHd9LhW.png" rel="icon">
    <title>Tradovex Investment | Verify KYC</title>
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="../css/ruang-admin.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-login" style="background:black;">
    <!-- Login Content -->
    <div class="container-login">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-12 col-md-9">
                <div style="background-color: #222;" class="card shadow-sm my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="login-form">
                                    <div class="d-flex justify-content-center p-3 pb-5">
                                        <img src="../../images/logo.png" alt="logo">
                                    </div>
                                    <div class="text-center">
                                        <h1 class="h4 text-white mb-4">KYC Verification</h1>
                                        <p class="text-info text-center text-white">Please verify your account by
                                            pressing proceed
                                            below. You can skip this page and return back later when you want to
                                            complete the form</p>
                                    </div>
                                    <!-- Session Status -->

                                    <!-- Validation Errors -->
                                    <form class="user" method="POST" action="" enctype="multipart/form-data">
                                        <input type="hidden" name="_token"
                                            value="UUgTSLdlNWrlZr2zoQsfdXtqdTdSMRaHMC805dUI">
                                        <div class="form-group border-bottom">
                                            <h4 class="text-white">Identification Document</h4>
                                        </div>

                                        <div class="form-group">
                                            <label class="text-white">Please select the identification document that you
                                                want to
                                                upload</label>
                                            <select class="form-control" id="exampleInputFirstName" name="identity_type"
                                                required>
                                                <option value="">-- Select --</option>
                                                <option>National ID</option>
                                                <option>International Passport</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label class="text-white">Please upload a file with clear images of your
                                                ID/passport</label>
                                            <input type="file" class="form-control" id="exampleInputLastName"
                                                name="fileToUpload" required>
                                        </div>

                                        <div class="form-group border-bottom">
                                            <h4 class="text-white">Address Document</h4>
                                        </div>

                                        <div class="form-group">
                                            <label class="text-white">Please select a valid address document for our KYC
                                                review
                                                process</label>
                                            <select class="form-control" id="exampleInputFirstName"
                                                name="address_doc_type" required>
                                                <option value="">-- Select --</option>
                                                <option>Utility Bill</option>
                                                <option>Bank Reference</option>
                                                <option>Proof of residence</option>
                                                <option>Driver or residence permit</option>
                                                <option>Other</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label class="text-white">Please upload a file with clear images of your
                                                ID/passport</label>
                                            <input type="file" class="form-control" id="exampleInputLastName"
                                                name="address_document" required>
                                        </div>


                                        <div class="form-group">
                                            <button name="submit" type="submit" class="btn text-white btn-block"
                                                style="background-color:#ffc107; border-radius: 25px;">Submit</button>
                                        </div>

                                    </form>
                                    <hr>
                                    <div class="text-center text-white">
                                        Skip to <a class="font-weight-bold small" href="../user-area/dashboard.php"
                                            style="color:#ffc107;">dashboard</a>
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