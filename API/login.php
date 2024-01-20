<?php
    include '../config/connection.php';

    // $userid = "UID322676";
    // $password = "MAnoj143";

    $userid = $_POST['userid'];
    $password = $_POST['password'];

    $res = mysqli_query($conn, "select unique_id from login_master where status = true and unique_id = '$userid' and password ='$password' AND user_type = 'User'");
    if(mysqli_num_rows($res)>0)
    {
        $row = mysqli_fetch_assoc($res);
        $responce['success']=true;
        $responce['id']=$row['unique_id'];
        $responce['message']="You have logged in successfully..!"; 
    }
    else
    {
        $responce['success']=false;
        $responce['message']="Invalid credentials you entered..!";
    }

    echo json_encode($responce);
?>