<?php
include 'config/connection.php';
session_start();
if (!isset($_SESSION['login']))
 {
    header("Location: index.php");
 } 

 if(isset($_GET['del']))
    {
        if(mysqli_query($conn,"delete from user_master where user_id = '".$_GET['id']."'"))
        {
            echo "<script>alert('User deleted successfully..!')</script>";
        }
        else
        {
            echo "<script>alert('Unable to delete user..!')</script>";
            echo mysqli_error($conn);
        }
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
                                <span>Manage</span> User
                            </h3>
                        </div>
                        <table class="table" style="margin-top: 15px;">
                            <thead>
                                <tr>
                                <th>#</th>
										<th>Name</th>
										<th>unique_id</th>
										<th>Email</th>
										<th>Contact</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php 
                                    $query=mysqli_query($conn,"select distinct user_master.first_name, user_master.last_name, user_master.unique_id, user_master.email, user_master.contact from user_master join prescriptions on prescriptions.uid = user_master.unique_id AND prescriptions.doctor_id = '$_SESSION[uid]'");
                                    $cnt=1;
                                    while($row=mysqli_fetch_array($query))
                                    {?>									
                                        <tr>
                                            <td><?php echo htmlentities($cnt);?></td>
                                            <td><?php echo htmlentities($row['first_name']." ".$row['last_name']);?></td>
                                            <td><?php echo htmlentities($row['unique_id']);?></td>
                                            <td><?php echo htmlentities($row['email']);?></td>
                                            <td><?php echo htmlentities($row['contact']);?></td>
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