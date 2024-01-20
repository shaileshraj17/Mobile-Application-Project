<?php

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;

    include '../config/connection.php';

    // $userid = 'UID956057';

    $userid = $_POST['userid'];

    $res = mysqli_query($conn, "select password from 
        login_master where unique_id = '$userid'");
    
    if(mysqli_num_rows($res)>0) {

        $rows = mysqli_fetch_assoc($res);

        $password = $rows['password'];
        $appname = "Digital Instruction";

        $res1 = mysqli_query($conn, "select first_name, last_name, 
            email from user_master where unique_id = '$userid'");

        if(mysqli_num_rows($res1)>0){

            $row1 = mysqli_fetch_assoc($res1);
            $name = $row1['first_name']." ".$row1['last_name'];
            $email = $row1['email'];

            try 
            {
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

                $mail->Subject = "Forgot Password : ".$appname;
                $mail->Body = 'Dear '.$name.'<br> You recently requested reset your password<br> Password : '.$password.'<br><br> Thank you<br>Team '.$appname;
                $mail->AltBody = 'Forgot password reset email';

                $mail->send();
             
                $response['success'] = true;
                $response['message'] = "Password has been sent to your registered email..!";
            } 
            catch (Exception $e) 
            {
                $response['success'] = true;
                $response['message'] = "Password has been sent to your registered email..!";
            }
        } else{

            $response['success'] = false;
            $response['message'] = "Unable to process your request..!";
        }
    } else
    {
        $response['success'] = false;
        $response['message'] = "Invalid data you provided..!";
    }

    echo json_encode($response);
?>