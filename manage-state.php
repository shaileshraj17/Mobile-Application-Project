<?php
include 'config/connection.php';
session_start();
if (!isset($_SESSION['login']))
 {
    header("Location: index.php");
 } 

if(isset($_GET['del']))
    {
        if(mysqli_query($conn,"delete from state_master where State_id  = '".$_GET['id']."'"))
        {
            echo "<script>alert('State deleted successfully..!');location.href='manage-state.php';</script>";
        }
        else
        {
            echo "<script>alert('Unable to delete state..!')</script>";
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
                                <span>Manage</span>  State
                            </h3>
                        </div>
                        <table class="table" style="margin-top: 15px;">
                            <thead>
                                <tr>
                                    <th scope="col">Sl.No</th>
                                    <th scope="col">State Name</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Created On</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $query=mysqli_query($conn,"select * from state_master order by State_id desc");
                                    $cnt=1;
                                    while($row=mysqli_fetch_array($query))
                                {?>
                                    <tr>
                                        <td><?php echo htmlentities($cnt);?></td>
                                        <td><?php echo htmlentities($row['State_name']);?></td>
                                        <td> <?php if($row['Status']){echo 'Active';}else{echo 'In-Active';}?></td>
                                        <td> <?php echo htmlentities($row['SCreated_date']);?></td>

                                        <td>
                                            <a data-toggle="modal" data-target="#edit<?php echo $row['State_id'] ?>"><i class="fa fa-edit"></i></a> |
                                            
                                            <a href="manage-state.php?id=<?php echo $row['State_id']?>&del=delete" onClick="return confirm('Are you sure you want to delete?')"><i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>

                                    <div class="modal fade" id="edit<?php echo $row['id'] ?>" tabindex="-1" aria-labelledby="edit" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <form method="POST">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="edit">Edit Company</h5>
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