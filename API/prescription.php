<?php

    include '../config/connection.php';

    // $userid = 'UID956057';

    $userid = $_POST['userid'];

    $response=array();

    $qry = "select user_master.*,
        prescriptions.doctor_id, prescriptions.track_no, 
        prescriptions.date, prescriptions.status, prescriptions.price 
        from prescriptions join user_master on 
        user_master.unique_id = prescriptions.uid  where 
        prescriptions.uid = '$userid' order by prescriptions.id desc";

    $res = mysqli_query($conn, $qry);
    if(mysqli_num_rows($res)>0)
    {
        while($rows = mysqli_fetch_assoc($res))
        {
            $send["doctor_name"] = "";
            $send["specialisation"] = "";
            $send["doctor_email"] = "";
            $send["doctor_phone"] = "";

            $drid = $rows['doctor_id'];
            $ress = mysqli_query($conn, "select * from doctor_master where unique_id = '$drid'");
            if(mysqli_num_rows($ress)>0){

                $ress = mysqli_fetch_assoc($ress);

                $send["doctor_name"] = $ress['first_name']." ".$ress['last_name'];
                $send["specialisation"] = $ress['specialization'];
                $send["doctor_email"] = $ress['email'];
                $send["doctor_phone"] = $ress['contact'];
            }                             

            $send["name"] = $rows['first_name']." ".$rows['last_name'];
            $send["email"] = $rows['email'];
            $send["contact"] = $rows['contact'];
            $send["address"] = "";
            $send["invoice_no"] = "#".$rows['track_no'];

            if($rows['status']){
                $send['status']=" Pending ";
            }
            else {
                $send['status']=" Purchased ";
            }

            $send["price"] = $rows['price'];

            $send["date"] = date_format(date_create($rows['date']), 'd F y');

            array_push($response,$send);
        }
    }
    else
    {
        $response=null;
    }  
    echo (json_encode($response));
?>
