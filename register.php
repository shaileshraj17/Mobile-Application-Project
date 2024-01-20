<?php

session_start();

require_once 'include/header-link.php';
include 'config/connection.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

if (isset($_SESSION['login'])) {

    header("Location: index.php");
} else {

    if (isset($_POST['submit'])) {
        $pass = $_POST['password'];
        $cpass = $_POST['cpassword'];

        if ($pass == $cpass) {

            $fname = $_POST['fname'];
            $lname = $_POST['lname'];
            $gender = $_POST['gender'];
            $email = $_POST['email'];
            $num = $_POST['contact'];
            $dob = $_POST['dob'];

            $uid = "UID" . rand(100000, 999999);

            if (mysqli_query($conn, "insert into user_master(first_name, last_name, gender, email, contact, date_of_birth, unique_id, status, image)values('$fname', '$lname', '$gender', '$email', '$num', '$dob', '$uid', true, 'user/user_image.jpg')")) {
                
                if (mysqli_query($conn, "insert into login_master(unique_id, user_type, password, status)values('$uid','User','$pass',true)")) {
                    
                    $name = $fname . " " . $lname;
                    $appname = "Medicare";

                    try {

                        require 'vendor-email/autoload.php';

                        $mail = new PHPMailer();
                        $mail->isSMTP();
                        $mail->Host = 'smtp.gmail.com';
                        $mail->Port = 465;
                        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
                        $mail->SMTPAuth = true;
                        $mail->IsHTML(true);

                        $mail->Username = 'suramyarai2002@gmail.com';
                        $mail->Password = 'jvyihccjjsjxzrev';

                        $mail->setFrom('suramyarai2002@gmail.com', $appname);
                        $mail->addAddress($email, $name);
                        $mail->addReplyTo('suramyarai2002@gmail.com', $appname);

                        $mail->IsHTML(true);
                        $mail->Subject = "User Registration : " . $appname;
                        $mail->Body = 'Dear ' . $name . '<br> You have recently registered to our webpage.<br> USER ID : ' . $uid . '<br><br> Thank you<br>Team ' . $appname;
                        $mail->AltBody = 'User Verification Email';

                        $mail->send();

                        echo "<script>alert('User registered successfully, and User Id has been sent to your registered email..!');location.href='index.php'</script>";
                    } catch (Exception $e) {

                        echo "<script>alert('Unable to process, Kindly try after sometimes..');</script>";
                    }
                } else {

                    echo "<script>alert('Unable to insert your data, Kindly try after sometimes..')</script>";
                }
            } else {

                echo "<script>alert('Unable to insert your data, Kindly try after sometimes..')</script>";

            }
        } else {

            echo "<script>alert('Password Mis-Match..')</script>";
        }
    }
}
?>

<body>
    <div class="page-wrapper">

        <?php
        require_once 'include/header.php';
        ?>

        <section class="service-section bg-gray section">
            <div class="container">
                <div class="row clearfix">
                    <div class="col-lg-3"></div>
                    <div class="col-lg-6 card shadow p-4" style="padding:50px;box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;">
                        <form method="POST">
                            <div class="row">

                                <div class="section-title text-center">
                                    <h3>Sign Up
                                        <span>Here</span>
                                    </h3>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group first mt-3">
                                        <label>First Name</label>
                                        <input type="text" class="form-control" name="fname" required >
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Last Name</label>
                                        <input type="text" class="form-control" name="lname" required>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group first mt-3">
                                        <label for="username">Email</label>
                                        <input type="email" class="form-control" name="email" required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group first">
                                        <label for="username">Contact Number</label>
                                        <input type="text" title="Please enter 10 digit valid number" required class="form-control" name="contact" pattern="[6789][0-9]{9}">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group pt-3">
                                        <label for="username">Gender </label><br>
                                        <input class="form-check-input" required type="radio" name="gender" id="inlineRadio1" value="Male">
                                        <label class="form-check-label" for="inlineRadio1" style="font-size: 12px;">Male</label>
                                        <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="Female">
                                        <label class="form-check-label" for="inlineRadio2" style="font-size: 12px;">Female</label>
                                        <input class="form-check-input" type="radio" name="gender" id="inlineRadio3" value="Other">
                                        <label class="form-check-label" for="inlineRadio3" style="font-size: 12px;">Other</label>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group mt-4">
                                        <label for="username">Date Of Birth </label>
                                        <input type="date" class="form-control mb-2" name="dob" min="1950-01-01" max="<?php $time = strtotime("-18 year", time());echo $date = date("Y-m-d", $time);?>" required>

                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group last mb-4">
                                        <label for="password">Password</label>
                                        <input type="password" class="form-control" name="password" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group last mb-4">
                                        <label for="password">Confirm Password</label>
                                        <input type="password" class="form-control" name="cpassword" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters">
                                    </div>
                                </div>
                                <div class="text-center">
                                    <input type="submit" style="margin-top: 21px;" value="Sign Up" class="btn-style-one" name="submit">
                                </div>

                            </div>
                            <div class="text-center" style="margin-top: 25px;">
                                Already have an account?<a href="login.php"> Sign In</a>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-3"></div>
                </div>
            </div>
        </section>

        <?php
        require_once 'include/footer.php';
        ?>

    </div>

    <?php
    require_once 'include/footer-link.php';
    ?>