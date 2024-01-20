<?php
    include '../config/connection.php';

    $userid = $_POST['userid'];
    $title = $_POST['title'];
    $description = $_POST['description'];

    // $userid = "UID956057";
    // $title = "Mguyhj@2104";
    // $description = "Hitha@2104";

    if(mysqli_query($conn, "INSERT INTO complaint_master (user_id, complaint_title, 
        complaint_description, complaint_status, posted_on) VALUES 
        ('$userid', '$title', '$description', 1, NOW())"))
    {
        $responce['success']=true;
        $responce['message']="Complaint submitted successfully..!"; 
    }
    else
    {
        $responce['success']=false;
        $responce['message']="Oops, Unable to submit your complaint..!"; 
    }

    echo json_encode($responce);
