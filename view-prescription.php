<?php
include 'config/connection.php';
session_start();
if (!isset($_SESSION['login']))
 {
    header("Location: index.php");
 } 

 $unid = $_GET['unid'];
 $uid = $_SESSION['uid'];
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
                            <h3>
                                <span>View</span> Prescription
                            </h3>
                        </div>
                        <table class="table" style="margin-top: 15px;">
                            <thead>
                                <tr>
                                <th>#</th>
										<th>Name</th>
										<th>Unique Id</th>
										<th>Date</th>
										<th>Medical Status</th>
                                        <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php 
                                    $query=mysqli_query($conn,"select user_master.first_name, user_master.last_name, user_master.unique_id, prescriptions.doctor_id, prescriptions.track_no, prescriptions.date, prescriptions.status from prescriptions join user_master on user_master.unique_id = prescriptions.uid  where prescriptions.uid = '$unid' and prescriptions.doctor_id = '$uid' order by prescriptions.id desc");
                                    $cnt=1;
                                    while($row=mysqli_fetch_array($query))
                                    {?>									
                                        <tr>
                                            <td><?php echo htmlentities($cnt);?></td>
                                            <td><?php echo htmlentities($row['first_name']." ".$row['last_name']);?></td>
                                            <td><?php echo htmlentities($row['unique_id']);?></td>
                                            <td><?php echo htmlentities($row['date']);?></td>
                                            <td> <?php if($row['status']){echo 'Purchased';}else{echo 'Pending';}?></td>
                                            <td>
                                                <a href="view-medicine.php?id=<?php echo $row['track_no']?>&unid=<?php echo $unid;?>">View <i class="fa fa-eye"></i></a></td>
                                        </tr>
                                        <?php $cnt=$cnt+1; 
                                    } ?>
                                </tbody>
                        </table>
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