<?php

    include '../config/connection.php';

    $track = '799301';

    // $track = $_POST['track'];

    $response=array();

    $qry = "select medicine_master.Medcine_name, medicine.no_of_days, medicine.timings, medicine.date from medicine join medicine_master on medicine_master.Medicine_id = medicine.medicine_id where medicine.track_no = '$track' order by medicine.id desc";
    $res = mysqli_query($conn, $qry);
    if(mysqli_num_rows($res)>0)
    {
        $i = 1;
        while($rows = mysqli_fetch_assoc($res))
        {
            $send["sl"] = $i;
            $send["name"] = $rows['Medcine_name'];
            $send["day"] = $rows['no_of_days'];
            $send["time"] = $rows['timings'];

            array_push($response,$send);
            $i++;
        }
    }
    else
    {
        $response=null;
    }  
    echo (json_encode($response));
?>