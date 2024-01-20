<?php

session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

include 'config/connection.php';

if (!isset($_SESSION['login'])) {

    header("Location: index.php");
} else if (isset($_POST['submit'])) {

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $specialization = $_POST['specialization'];
    $num = $_POST['contact'];
    $uid = "UID" . rand(100000, 999999);
    $pass = "PAss" . rand(100000, 999999);
    
    if (mysqli_query($conn, "insert into doctor_master(first_name, last_name,email, contact, unique_id, status, image, specialization)values('$fname', '$lname','$email', '$num', '$uid', true, 'user/doctor_image.jpg', '$specialization')")) {
        
        if (mysqli_query($conn, "insert into login_master(unique_id, user_type, password, status)values('$uid','Doctor','$pass',true)")) {
            
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

                $mail->Username = 'instructiondigital@gmail.com';
                $mail->Password = 'bfkogzibqwculgsl';

                $mail->setFrom('instructiondigital@gmail.com', $appname);
                $mail->addAddress($email, $name);
                $mail->addReplyTo('instructiondigital@gmail.com', $appname); // to set the reply to

                $mail->IsHTML(true);
                $mail->Subject = "User Registration : " . $appname;
                $mail->Body = 'Dear ' . $name . '<br> You have recently registered to our webpage.<br> USER ID : ' . $uid . '<br>Password: ' . $pass . '<br><br> Thank you<br>Team ' . $appname;
                $mail->AltBody = 'User Verification Email';

                $mail->send();

                echo "<script>alert('User registered successfully, and User Id has been sent to your registered email..!');location.href='add-doctor.php'</script>";
            } catch (Exception $e) {

                echo "<script>alert('User registered successfully, and User Id has been sent to your registered email..!');location.href='add-doctor.php'</script>";
            }
        } else {

            echo "<script>alert('Unable to process, Kindly try after sometimes..')</script>";
        }
    } else {

        echo "<script>alert('Unable to insert your data, Kindly try after sometimes..')</script>";
    }
}



require_once 'include/header-link.php';
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
                    <div class="col-lg-6 card shadow p-5" style="padding:50px;box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;">
                        <form method="POST">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="section-title text-left">
                                        <h3>
                                            <span>Add</span> Doctor
                                        </h3>
                                    </div>

                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group first mb-3">
                                        <label for="inputPassword3">First Name</label>
                                        <input type="text" title="Enter First Name" required class="form-control" name="fname" id="validationDefault01" placeholder="Enter First name">
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group last mb-3">
                                        <label for="inputPassword3">Last Name</label>
                                        <input type="text" class="form-control" name="lname" id="validationDefault01" title="Enter Last name" placeholder="Enter Last name">
                                    </div>

                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group last mb-3">
                                        <label for="inputPassword3">Specialization</label>
                                        <input type="text" class="form-control" name="specialization" id="validationDefault01" required title="Specialization" placeholder="Enter Specialization">
                                    </div>
                                </div>






                                <div class="col-lg-12">
                                    <div class="form-group first mt-3">
                                        <label for="inputPassword3">Email</label>
                                        <input type="email" class="form-control" name="email" id="validationDefault02" required placeholder="Enter Email Id">
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group first">
                                        <label for="inputPassword3">Contact No</label>
                                        <input type="text" title="Enter Contact number" required class="form-control" name="contact" id="validationDefault02" pattern="[6789][0-9]{9}" placeholder="Enter Contact Number">
                                    </div>
                                </div>


                                <!-- <div class="col-lg-12">
                                <div class="form-group last mb-3">
                                    <label for="address">Address</label>
                                    <textarea class="form-control" name="txtaddress" rows="4" placeholder="Enter Address"></textarea> 
                                </div>
                            </div>-->


                                <div class="text-center">
                                    <input type="submit" style="margin-top:21px;" value="Submit" class="mt-3 btn-style-one" name="submit">
                                </div>



                        </form>
                    </div>
                    <div class="col-lg-3"></div>
                </div>
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