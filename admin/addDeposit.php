<?php
include "includes/header.php";
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;

//Load Composer's autoloader

require '../dash/PHPMailer-master/src/PHPMailer.php';
require '../dash/PHPMailer-master/src/Exception.php';
require '../dash/PHPMailer-master/src/SMTP.php';
//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);
$message = "";

if (isset($_POST['profit'])) {
    $amount = $_POST['amount'];
    $account = $_POST['account'];

    $fetchaccount = "SELECT * FROM clients WHERE id = '$account'";
    $accquery = mysqli_query($conn, $fetchaccount);
    $getter = mysqli_fetch_assoc($accquery);
    $username = $getter['username'];
    $useremail = $getter['email'];
    $firstname = $getter['first_name'];
    $client_id = $getter['id'];
    $tranx_id = rand(000000, 999999);
    $created_at = $_POST['created_at'];

    $newBal = $getter['total_balance'] + $amount;
    $newActiveDeposits = $getter['active_deposits'] + $amount;
    $plan = $_POST['plan'];
    $paidvia = $_POST['paidvia'];
    $address = "";
    $prosql = "UPDATE clients set total_balance = '$newBal', active_deposits = '$newActiveDeposits' WHERE id = '$account'";
    $proquery = mysqli_query($conn, $prosql);
    if (empty($_POST['investmet_status'])) {
        $investment_status = "not-active";
    } else {
        $investment_status = $_POST['investment_status'];
    }
    $sqlpde = "INSERT into deposits (client_id, username, tranx_id, plan, paid_via, amount, status, created_at) VALUES ('$client_id','$username','$tranx_id','$plan','$paidvia','$amount','$investment_status','$created_at')";
    $stmtde = mysqli_query($conn, $sqlpde);

    $message = '<div class="alert alert-success d-flex align-items-center" role="alert">
            <svg class="bi flex-shrink-0 me-2" width="24" height="24">
                <use xlink:href="#check-circle-fill" />
            </svg>
            <div>Deposit of ' . $amount . ' added to ' . $username . ' successfully</div>
        </div>';
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
        $mail->addAddress($useremail); //Add a recipient               //Name is optional

        $mail->addCC('support@tradovex.com');

        //Content
        $mail->isHTML(true); //Set email format to HTML
        $mail->Subject = 'Deposit added';
        $mail->Body = '<html><head></head></head>
<body style="background-color: #1e2024; padding: 45px;">
    <div>
        <img style="position:relative; left:35%;" src="https://tradovex.com/images/logo.png">
        <h3 style="color: black;">Mail From support@tradovex.com - Deposit Added</h3>
    </div>
    <div style="color: #ffff;"><hr/>
        <h3>Dear ' . $firstname . '</h3>
        <p>Deposit of $' . $amount . ' has successfully been credited to your account, kindly sign in to view your balance</p>

        <a style="background-color:#060c39;color:#ffff; padding:15px; text-decoration:none;border-radius: 10px;font-size: 20px;" href="https://tradovex.com/dash/auth/login.php" class="btn btn primary">Sign in</a>

        <h5>Note : the details in this email should not be disclosed to anyone</h5>

    </div><hr/>
        <div style="background-color: white; color: black;">
            <h3 style="color: black;">support@tradovex<sup>TM</sup> </h3>
        </div>

</body></html>

';

        $mail->send();

    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}

// Close the database connection
mysqli_close($conn);
?>
<!-- Right side column. Contains the navbar and content of the page -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Dashboard
            <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Main row -->
        <div class="row">
            <div class="col-md-6">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Add Deposit To a User</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <form action="" method="post" role="form">
                        <?php echo $message; ?>
                        <div class="box-body">
                            <div class="form-group">
                                <label for="exampleInputltc">Paid Via</label>
                                <input type="text" name="paidvia" class="form-control" id="exampleInputltc"
                                    placeholder="Enter Payment Method">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputltc">Plan</label>
                                <input type="text" name="plan" class="form-control" id="exampleInputltc"
                                    placeholder="Enter Plan">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputltc">Amount</label>
                                <input type="text" name="amount" class="form-control" id="exampleInputltc"
                                    placeholder="Enter amount">
                            </div>
                            <div class="form-group">
                                <label style="padding-right: 5px;" for="exampleInputltc">Select an
                                    account</label>
                                <select class="form-control" name="account">
                                    <option>
                                        -- select --</option>
                                    <?php
while ($fetchuser = mysqli_fetch_assoc($query)) {
    ?>
                                    <option value="<?php echo $fetchuser['id']; ?>"><?php echo $fetchuser['email']; ?>
                                    </option>
                                    <?php
}
?>

                                </select>
                            </div>
                            <div class="form-group">
                                <label style="padding-right: 5px;" for="exampleInputltc">Investment Status</label>
                                <select class="form-control" name="investment_status">
                                    <option>
                                        -- select --</option>

                                    <option value="active">Active</option>
                                    <option value="not-active">Not Active</option>
                                    <option value="pending">Pending</option>


                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputltc">Date of Transaction</label>
                                <input type="date" name="created_at" class="form-control" id="exampleInputltc">
                            </div>


                        </div><!-- /.box-body -->

                        <div class="box-footer">
                            <button name="profit" type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div><!-- /.box -->



            </div>
        </div>
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->
<?php
include "includes/footer.php";

?>