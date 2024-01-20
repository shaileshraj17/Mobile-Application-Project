<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

include 'config/connection.php';
session_start();
$unid = $_GET['unid'];
$uid = $_SESSION['uid'];
$trano = $_GET['medid'];
if (!isset($_SESSION['login'])) {
    header("Location: index.php");
} else if (isset($_POST['submit'])) {
    $time = "";
    if (!empty($_POST['check_list'])) {
        foreach ($_POST['check_list'] as $selected) {
            $time = $time . $selected;
        }
        $presc = $_POST['medicine'];
        $qty = $_POST['quantity'];

        mysqli_query($conn, "INSERT INTO `medicine`( `medicine_id`, `no_of_days`,  `status`, `track_no`, timings) VALUES('$presc','$qty',true, '$trano', '$time')");
    } else {
        echo "<script>alert('Kindly choose timings..');</script>";
    }
} else if (isset($_POST['submitadd'])) {
    $time = "";
    if (!empty($_POST['check_list'])) {
        foreach ($_POST['check_list'] as $selected) {
            $time = $time . $selected;
        }

        $presc = $_POST['medicine'];
        $qty = $_POST['quantity'];

        if (mysqli_query($conn, "INSERT INTO `medicine`( `medicine_id`, `no_of_days`,  `status`, `track_no`, timings ) VALUES('$presc','$qty',true, '$trano', '$time')")) {
            if (mysqli_query($conn, "insert into prescriptions (uid, doctor_id, status, track_no)values('$unid','$uid', false, $trano)")) {

                $sq = "SELECT * FROM user_master WHERE unique_id = '$unid'";
                $resus = mysqli_query($conn, $sq);
                $resus = mysqli_fetch_assoc($resus);
                $name = $resus['first_name'] . " " . $resus['first_name'];
            $email = $resus['email'];

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
        $mail->addReplyTo('instructiondigital@gmail.com', $appname);

                    // Setting the email content
                    $mail->IsHTML(true);
                    $mail->Subject = "New Prescription";
                    $mail->Body = 'Dear ' . $name . '<br> You have new prescription.<br> Your track number is ' . $trano . '<br><br> Thank you<br>Team ' . $appname;
                    $mail->AltBody = 'User Verification Email';

                    $mail->send();
                    // echo "Email message sent.";

                    echo "<script>alert('Prescription sumitted successfully..Thank you');window.location.href='prescrption.php';</script>";
                } catch (Exception $e) {
                    // echo "Error in sending email. Mailer Error: {$mail->ErrorInfo}";
                    echo "<script>alert('Prescription sumitted successfully..Thank you');window.location.href='prescrption.php';</script>";
                }
            } else {
                echo "<script>alert('Unable to process..');</script>";
            }
        } else {
            echo "<script>alert('Unable to process..');</script>";
        }
    } else {
        echo "<script>alert('Kindly choose timings..');</script>";
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
                    <div class="col-lg-12 card shadow p-3" style="padding:50px;box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;">

                        <div class="section-title text-left">
                            <div class="row">
                                <div class="col-3">
                                    <h3><span>Add</span> Prescription</h3>
                                </div>
                            </div>
                            <div class="row">
              <div class="col-lg-12 align-self pr-lg-4">
                <form action="#" method="post">

                    <div class="row" style="margin-top: 25px;">
                        <div class="col-lg-4"><strong>Prescription</strong></div>
                        <div class="col-lg-4"><strong>No. of Days</strong></div>
                        <div class="col-lg-4"><strong>Timings</strong></div>
                    </div>
                    <div class="row mt-4">
                    <?php
                        $res = mysqli_query($conn, "select medicine.no_of_days, medicine.timings, medicine_master.Medcine_name  from medicine join medicine_master on medicine_master.Medicine_id = medicine.medicine_id where track_no = '$trano'");
                        if(mysqli_num_rows($res)>0)
                        {
                            $count=1;
                            while($row=mysqli_fetch_assoc($res))
                            {
                                ?>
                                <div class="col-lg-4"><?php echo $count.". ".$row['Medcine_name'];?></div>
                                <div class="col-lg-4"><?php echo $row['no_of_days'];?></div>
                                <div class="col-lg-4"><?php echo $row['timings'];?></div>
                            <?php
                            $count++;
                            }
                        }
                    ?>
                    </div>

                    <div class="row mt-5" style="margin-top: 30px;">
                        <div class="col-lg-3">
                        <label for="inputPassword3" class="col-form-label input__label">Choose Medicine</label>
                        
                        <select class="form-control input-style" aria-label="Default select example" required name="medicine">
                            <option value="">Select Medicine</option>
                            <?php 
                                $res = mysqli_query($conn, "select medicine_master.Medicine_id , medicine_master.Medcine_name, company_master.Company_name from medicine_master join company_master on company_master.Company_id = medicine_master.Company_id");
                                while($row = mysqli_fetch_assoc($res)){
                                    ?>
                                    <option value="<?php echo $row['Medicine_id'];?>"><?php echo $row['Medcine_name']."(".$row['Company_name'].")";?></option>
                                    <?php
                                }?>
                        </select>        
                    </div>
                    
                    <div class="col-lg-3">
                        <label for="inputPassword3" class="col-form-label input__label">Choose No. of Days</label>
                        <input type="number" placeholder="No. of Days" min="1" class="form-control input-style" name="quantity" id="validationDefault01" required>
                    </div>
                    

                    <div class="col-lg-6">
                        <label for="inputPassword3" class="col-form-label input__label">Timings</label>
                        <br>
                        <input type="checkbox" name="check_list[]" value="Morning, "><label>&nbsp;&nbsp;Morning</label>&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="checkbox" name="check_list[]" value="Afternoon, "><label>&nbsp;&nbsp;Afternoon</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="checkbox" name="check_list[]" value="Night, "><label>&nbsp;&nbsp;Night</label>
                    </div>
                </div>


                    <div class="row mt-4" style="margin-top: 30px;">
                        <div class="col-lg-12">
                            <button type="submit" class="btn btn-style btn-primary mr-4 btn-style-one" name="submitadd">Submit</button>                      
                            <button type="submit" class="btn-style-two" name="submit">Add+</button>
                        </div>
                    </div>
                </form>
                
              </div>
            </div>
                        </div>

                    </div>
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