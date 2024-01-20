<?php

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;

    include '../config/connection.php';

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $dob = $_POST['dob'];
    $password = $_POST['password'];
    $gender = $_POST['gender'];

    // $fname = "demo";
    // $lname = "demo";
    // $email = "demo";
    // $phone = "demo";
    // $dob = "demo";
    // $gender = "demo";
    // $password = "demo";

    $uid = "UID" . rand(100000, 999999);

    if(mysqli_query($conn, "insert into user_master(first_name, last_name, 
        gender, email, contact, date_of_birth, unique_id, status, image)
        values('$fname', '$lname', '$gender', '$email', '$phone', '$dob', 
        '$uid', true, 'user/user_image.jpg')"))
    {

        if (mysqli_query($conn, "insert into login_master(unique_id, user_type, 
            password, status)values('$uid','User','$password',true)")) {
                    
            $name = $fname . " " . $lname;
            $appname = "Digital Instruction";

            try {

                require '../vendor-email/autoload.php';

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

                $mail->Subject = "User Registration : " . $appname;
                $mail->Body = 'Dear ' . $name . '<br> You have recently registered to our webpage.<br> USER ID : ' . $uid . '<br><br> Thank you<br>Team ' . $appname;
                $mail->AltBody = 'User Verification Email';

                $mail->send();

                $responce['success']=true;
                $responce['message']="You have registered successfully..!";          

            } catch (Exception $e) {

                $responce['success']=true;
                $responce['message']="You have registered successfully..!";
            }
        } else {

            $responce['success']=false;
            $responce['message']="Ooops, Unable to register your data..!";
        }
    }
    else
    {
        $responce['success']=false;
        $responce['message']="Ooops, Unable to register your data..!";
    }

    echo json_encode($responce);
?>