<?php

    include '../config/connection.php';

    $userid = 'UID956057';

    // $userid = $_POST['userid'];

    $response=array();

    $qry = "select * from complaint_master where user_id = '$userid'";
    $res = mysqli_query($conn, $qry);
    if(mysqli_num_rows($res)>0)
    {
        while($rows = mysqli_fetch_assoc($res))
        {
            $send["title"] = $rows['complaint_title'];
            if($rows['complaint_status']){
                $send['status']=" Pending ";
            }
            else {
                $send['status']=" Solved ";
            }
            $send["description"] = $rows['complaint_description'];
            $send["date"] = date_format(date_create($rows['posted_on']), 'd F y');

            array_push($response,$send);
        }
    }
    else
    {
        $response=null;
    }  
    echo (json_encode($response));
?>