<?php
include 'config/connection.php';
session_start();
$trno = $_GET['id'];
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
                                <span>Your</span> Medicine
                            </h3>
                        </div>
                        <table class="table" style="margin-top: 15px;">
                            <thead>
                            <tr>
                                        <th>#</th>
										<th>Medicine Name</th>
										<th>No. of Days</th>
										<th>Timings</th>
										<th>Date</th>
                                    </tr>
                            </thead>
                            <tbody>

                                <?php 
                                    $query=mysqli_query($conn,"select medicine_master.Medcine_name, medicine.no_of_days, medicine.timings, medicine.date from medicine join medicine_master on medicine_master.Company_id = medicine.medicine_id where medicine.track_no = '$trno' order by medicine.id desc");
                                    $cnt=1;
                                    while($row=mysqli_fetch_array($query))
                                    {?>									
                                        <tr>
                                            <td><?php echo htmlentities($cnt);?></td>
                                            <td><?php echo htmlentities($row['Medcine_name']);?></td>
                                            <td><?php echo htmlentities($row['no_of_days']." Days");?></td>
                                            <td><?php echo htmlentities($row['timings']);?></td>
                                            <td><?php echo htmlentities($row['date']);?></td>
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