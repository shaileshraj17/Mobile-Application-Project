<?php
    include '../config/connection.php';

    $userid = $_POST['userid'];
    $password = $_POST['password'];
    $oldpassword = $_POST['oldpassword'];

    // $userid = "UID956057";
    // $password = "Mguyhj@2104";
    // $oldpassword = "Hitha@2104";

    $res = mysqli_query($conn, "select password from login_master where unique_id = '$userid'");
    if(mysqli_num_rows($res)>0)
    {
        $row = mysqli_fetch_assoc($res);
        if($row['password']==$oldpassword)
        {
            if(mysqli_query($conn, "update login_master set password = '$password' where unique_id = '$userid'"))
            {
                $responce['success']=true;
                $responce['message']="Your password updated successfully..!"; 
            }
            else
            {
                $responce['success']=false;
                $responce['message']="Oops, Unable to update your password..!"; 
            }
        }
        else
        {
            $responce['success']=false;
            $responce['message']="You have entered an invalid current password..!";
        }
    }
    else
    {
        $responce['success']=false;
        $responce['message']="You have sent an invalid request..!";
    }

    echo json_encode($responce);
?>