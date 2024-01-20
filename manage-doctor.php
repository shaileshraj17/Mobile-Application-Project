<?php
include 'config/connection.php';
session_start();
if (!isset($_SESSION['login']))
 {
    header("Location: index.php");
 } 

if (isset($_GET['del']))
 {
    if (mysqli_query($conn, "delete from doctor_master where id = '" . $_GET['id'] . "'")) {
        echo "<script>alert('doctor record deleted successfully..!');location.href='manage-doctor.php';</script>";
    } else {
        echo "<script>alert('Unable to delete doctor record..!')</script>";
        // echo mysqli_error($conn);
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
                                <span>Manage</span>  Doctors
                            </h3>
                        </div>
                        <table class="table" style="margin-top: 15px;">
                            <thead>
                                <tr>
                                    <th scope="col">Sl.No</th>
                                    <th scope="col">First Name</th>
                                    <th scope="col">Last Name</th>
                                    <th scope="col">Specialization</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Contact no</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Unique_id</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>

                               <?php 
                                    $query=mysqli_query($conn,"select id , unique_id, first_name, last_name, specialization, email, contact, status from doctor_master order by id desc");
                                    $cnt=1;
                                    while($row=mysqli_fetch_array($query))
                                    {?>
                                    <tr>
                                        <td><?php echo htmlentities($cnt);?></td>
                                            <td><?php echo htmlentities($row['first_name']);?></td>
                                            <td><?php echo htmlentities($row['last_name']);?></td>
                                            <td><?php echo htmlentities($row['specialization']);?></td>
                                            <td><?php echo htmlentities($row['email']);?></td>
                                            <td> <?php echo htmlentities($row['contact']);?></td>
                                            <td> <?php if($row['status']){echo 'Active';}else{echo 'In-Active';}?></td>
                                            <td> <?php echo htmlentities($row['unique_id']);?></td>

                                        <td>
                                            <!-- <a data-toggle="modal" data-target="#edit<?php echo $row['id'] ?>"><i class="fa fa-edit"></i></a> | -->
                                            
                                            <a href="manage-doctor.php?id=<?php echo $row['id']?>&del=delete" onClick="return confirm('Are you sure you want to delete?')"><i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>

                                    <div class="modal fade" id="edit<?php echo $row['id'] ?>" tabindex="-1" aria-labelledby="edit" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <form method="POST">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="edit">Company</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="col-lg-6">
                                                            <div class="form-group first mb-3">
                                                                <label for="company1_name">Company Name</label>
                                                                <input type="text" title="Select Company" required class="form-control" name="txtcname">
                                                            </div>

                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="form-group first ">
                                                                <label for="usercontact">Contact No</label>
                                                                <input type="text" title="Please enter 10 digit valid number" required class="form-control" name="txtcontact" pattern="[6789][0-9]{9}">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12">
                                                            <div class="form-group last mb-3">
                                                                <label for="company_address">Company Address</label>
                                                                <textarea class="form-control" name="txtaddress" rows="5"></textarea>
                                                            </div>
                                                        </div>


                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <button type="button" class="btn btn-primary">Update</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                <?php
                                    $cnt = $cnt + 1;
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