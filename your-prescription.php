<?php
include 'config/connection.php';
session_start();
$uid = $_SESSION['uid'];
if (!isset($_SESSION['login']))
 {
    header("Location: index.php");
 } 


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
                                <span>Your</span> Prescription
                            </h3>
                        </div>
                        <table class="table" style="margin-top: 15px;">
                            <thead>
                            <tr>
                                        <th>#</th>
										<th>Name</th>
										<th>Doctor Name</th>
										<th>Date</th>
										<th>Medical Status</th>
										<th>Price</th>
                                        <th>Action</th>
                                    </tr>
                            </thead>
                            <tbody>

                                <?php 
                                    $query=mysqli_query($conn,"select user_master.first_name, user_master.last_name, prescriptions.doctor_id, prescriptions.track_no, prescriptions.date, prescriptions.status, prescriptions.price from prescriptions join user_master on user_master.unique_id = prescriptions.uid  where prescriptions.uid = '$uid' order by prescriptions.id desc");
                                    $cnt=1;
                                    while($row=mysqli_fetch_array($query))
                                    {?>									
                                        <tr>
                                            <td><?php echo htmlentities($cnt);?></td>
                                            <td><?php echo htmlentities($row['first_name']." ".$row['last_name']);?></td>
                                            <?php 
                                                $drid = $row['doctor_id'];
                                                $ress = mysqli_query($conn, "select first_name, last_name from doctor_master where unique_id = '$drid'");
                                                $rows = mysqli_fetch_assoc($ress);
                                            ?>
                                            <td><?php echo htmlentities($rows['first_name']." ".$rows['last_name']);?></td>
                                            <td><?php echo htmlentities($row['date']);?></td>
                                            <td> <?php if($row['status']){echo 'Purchased';}else{echo 'Pending';}?></td>
                                            <td><?php if(empty($row['price'])){echo "N/A";}else{echo htmlentities(number_format($row['price'], 2));}?></td>
                                            <td>
                                                <a href="view-medicine-user.php?id=<?php echo $row['track_no']?>">View </a>
                                               <?php if(!empty($row['price'])){?>| <a href="view-bill.php?id=<?php echo $row['track_no']?>&unid=<?php echo $uid;?>">Bill</i><?php }?></a>
                                            </td>
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