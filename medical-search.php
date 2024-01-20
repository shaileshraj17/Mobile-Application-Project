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
                        <div class="row">
                <div class="col-3">
                    <h3><span>Search</span> Prescription</h3>
                </div>
                <div class="col-6">
                    <div class="search-box">
                        <form action="#" method="get">
                            <input class="form-control main" placeholder="Search Here..." type="search" id="search" name="unid" required style="width:80%;float:left;margin-right:15px;">
                            <button class="btn-style-one" value="" name="submit_search"><i class="fa fa-search"></i></button>
                        </form>
                    </div>
                </div>
            </div>
                        
            <div class="row">
                <?php
                if(isset($_GET['submit_search']))
                {
                    $unid = $_GET['unid'];
                    $sq = "select u.* from user_master u, prescriptions p 
                    where u.unique_id = p.uid AND p.track_no = '$unid'";
                    $res1 = mysqli_query($conn, $sq);
                    if(mysqli_num_rows($res1)>0)
                    {
                        $row1 = mysqli_fetch_assoc($res1);
                        $uniq = $row1['unique_id'];
                        ?>
                        
                        <div class="card-body">
                            <div class="cards__heading" style="margin-top: 25px;">
                                <h3>Search Results..</h3>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 align-self pr-lg-4">
                                    <h5 class="my-3">Personal Information</h5>
                                    <label for="validationDefault01" class="form-label">Name : </label>
                                    <?php echo "<strong>".$row1['first_name']." ".$row1['last_name']."</strong>";?><br>
                                    <label for="validationDefault02" class="input__label">Unique ID : </label>
                                    <?php echo "<strong>".$row1['unique_id']."</strong>";?>
                                </div>
                                <div class="col-lg-6 align-self pr-lg-4">
                                    <h5 class="my-3">&nbsp;</h5>
                                    <label for="validationDefault02" class="input__label">Email : </label>
                                    <?php echo "<strong>".$row1['email']."</strong>";?><br>
                                    <label for="validationDefault02" class="input__label">Contact Number : </label>
                                    <?php echo "<strong>".$row1['contact']."</strong>";?><br>
                                </div>
                                <div class="col-lg-12 pl-lg-4 mt-lg-0 mt-4">
                                    <h5 class="mt-5" style="margin-top: 25px;font-size:18px;color:#000">Medical Information</h5>
                                        <table cellpadding="0" style="margin-top: 15px;" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped	 display table-hover" width="100%">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>User Id</th>
                                                    <th>Doctor Name</th>
                                                    <th>Date</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                            <?php 
                                             $sql = "select uid , doctor_id, date, status, track_no from prescriptions where track_no = '$unid' and status=false order by id desc";
                                                $query=mysqli_query($conn,$sql);
                                                $cnt=1;
                                                while($row=mysqli_fetch_array($query))
                                                {?>									
                                                    <tr>
                                                        <td><?php echo htmlentities($cnt);?></td>
                                                        <td><?php echo htmlentities($row['uid']);?></td>
                                                        
                                                        <?php 
                                                $drid = $row['doctor_id'];
                                                $ress = mysqli_query($conn, "select first_name, last_name from doctor_master where unique_id = '$row[doctor_id]'");
                                                $rows = mysqli_fetch_assoc($ress);
                                            ?>
                                            <td><?php echo htmlentities($rows['first_name']." ".$rows['last_name']);?></td>

                                                        <td> <?php echo htmlentities($row['date']);?></td>
                                                        <td> <?php if($row['status']){echo 'Purchased';}else{echo 'Pending';}?></td>

                                                        <td>
                                                        <a href="view-medicine-medical.php?id=<?php echo $row['track_no']?>&unid=<?php echo $row['uid'];?>">View</a>
                                                    </td>

                                                    </tr>
                                                    <?php $cnt=$cnt+1; 
                                                } ?>
                                            </tbody>			
                                        </table>
                                </div>
                            </div>
                            
                        </div>
                    <?php
                    }
                    else
                    {?>
                        <div class="cards__heading" style="margin-top: 15px;">
                            <h4>Track Number not found..</h4>
                        </div>
                    <?php
                    }
                }
                else
                {?>
                <div class="text-center col-12">
                    <img src="image/search.jpg" alt="" class="img-fluid rounded" />              
                </div>
                <?php   
                }
                ?>
            </div>
    </section>

    <?php
    require_once 'include/footer.php';
    ?>

    </div>

    <?php
    require_once 'include/footer-link.php';
    ?>