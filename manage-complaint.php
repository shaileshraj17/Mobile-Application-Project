<?php
include 'config/connection.php';
session_start();
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
                                <span>Manage</span>  Complaints
                            </h3>
                        </div>
                        <table class="table" style="margin-top: 15px;">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>User Name</th>
                                    <th>User Phone</th>
                                    <th>Complaint</th>
                                    <th>Description</th>
                                    <th>Created On</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $query=mysqli_query($conn,"select user_master.first_name, user_master.last_name, user_master.contact, complaint_master.complaint_title, complaint_master.complaint_description, complaint_master.posted_on from complaint_master join user_master on user_master.unique_id = complaint_master.user_id order by complaint_master.complaint_id desc");
                                    $cnt=1;
                                    while($row=mysqli_fetch_array($query))
                                    {?> 
                                    <tr>
                                         <td><?php echo htmlentities($cnt);?></td>
                                            <td><?php echo htmlentities($row['first_name']." ".$row['last_name']);?></td>
                                            <td><?php echo htmlentities($row['contact']);?></td>
                                            <td><?php echo htmlentities($row['complaint_title']);?></td>
                                            <td><?php echo htmlentities($row['complaint_description']);?></td>
                                            <td> <?php echo htmlentities($row['posted_on']);?></td>
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