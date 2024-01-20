<?php
    include '../config/connection.php';

    $userid = $_POST['userid'];
    // $userid = "UID956057";

    $res = mysqli_query($conn, "select * from user_master where unique_id = '$userid'");
    if(mysqli_num_rows($res)>0)
    {
        $row = mysqli_fetch_assoc($res);
        $responce['uid']=$row['unique_id'];
        $responce['date']=$row['date_of_birth'];
        $responce['name']=$row['first_name']." ".$row['last_name'];
        $responce['number']=$row['contact'];
        $responce['email']=$row['email'];
        $responce['gender']=$row['gender'];

        if($row['status']){
            $responce['status']="Active";
        }
        else {
            $responce['status']="In-Active";
        }
        
        $responce['success']=true;
        $responce['message']="Your data fetched successfully..!";
       
    }
    else
    {
        $responce['success']=false;
        $responce['message']="Unable to fetch your data..!";
    }

    echo json_encode($responce);
?>