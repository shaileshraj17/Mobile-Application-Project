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
                    <h3><span>Search</span> Patient</h3>
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
                    $res1 = mysqli_query($conn, "select first_name,unique_id,status, last_name, gender, email, contact, date_of_birth, height, weight,blood_group,blood_pressure, pulse, city_id, state_id, district_id from user_master where unique_id = '$unid'");
                    if(mysqli_num_rows($res1)>0)
                    {
                        $row1 = mysqli_fetch_assoc($res1);
                        ?>
                        
                        <div class="card-body" style="margin-top: 35px;">
                            <div class="cards__heading">
                                <h3>Search Results..</h3>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 align-self pr-lg-4">
                                    <h5 class="my-3">Personal Information</h5>
                                    <label for="validationDefault01" class="form-label">Name : </label>
                                    <?php echo "<strong>".$row1['first_name']." ".$row1['last_name']."</strong>";?><br>
                                    <label for="validationDefault02" class="input__label">Unique ID : </label>
                                    <?php echo "<strong>".$row1['unique_id']."</strong>";?><br>
                                    <label for="validationDefault02" class="input__label">Gender : </label>
                                    <?php echo "<strong>".$row1['gender']."</strong>";?><br>
                                    <label for="validationDefault02" class="input__label">Email : </label>
                                    <?php echo "<strong>".$row1['email']."</strong>";?><br>
                                    <label for="validationDefault02" class="input__label">Contact Number : </label>
                                    <?php echo "<strong>".$row1['contact']."</strong>";?><br>
                                    <label for="validationDefault02" class="input__label">Date Of Birth : </label>
                                    <?php echo "<strong>".$row1['date_of_birth']."</strong>";?><br>
                                    <label for="validationDefault02" class="input__label">City : </label>
                                    <?php 
                                        $cityid = $row1['city_id'];
                                        $resc = mysqli_query($conn, "select City_name from city_master where City_id = '$cityid'");
                                        $rowc = mysqli_fetch_assoc($resc);
                                        echo "<strong>".$rowc['City_name']."</strong>";?><br>

                                    <label for="validationDefault02" class="input__label">District : </label>
                                    <?php 
                                        $cityid = $row1['district_id'];
                                        $resc = mysqli_query($conn, "select District_name from district_master where District_id = '$cityid'");
                                        $rowc = mysqli_fetch_assoc($resc);
                                        echo "<strong>".$rowc['District_name']."</strong>";?><br>

                                    <label for="validationDefault02" class="input__label">State : </label>
                                    <?php 
                                        $cityid = $row1['state_id'];
                                        $resc = mysqli_query($conn, "select State_name from state_master where State_id  = '$cityid'");
                                        $rowc = mysqli_fetch_assoc($resc);
                                        echo "<strong>".$rowc['State_name']."</strong>";?><br>
                                </div>
                                <div class="col-lg-6 pl-lg-4 mt-lg-0 mt-4">
                                    <h5 class="my-3">Physical Information</h5>
                                    <label for="validationDefault01" class="form-label">Height : </label>
                                    <?php echo "<strong>".$row1['height']."</strong>";?><br>
                                    <label for="validationDefault02" class="input__label">Weight : </label>
                                    <?php echo "<strong>".$row1['weight']."</strong>";?><br>
                                    <label for="validationDefault02" class="input__label">Blood Group : </label>
                                    <?php echo "<strong>".$row1['blood_group']."</strong>";?><br>
                                    <label for="validationDefault02" class="input__label">Blood Pressure : </label>
                                    <?php echo "<strong>".$row1['blood_pressure']."</strong>";?><br>
                                    <label for="validationDefault02" class="input__label">Pulse : </label>
                                    <?php echo "<strong>".$row1['pulse']."</strong>";?><br>
                                    <a href="update-physical.php?unid=<?php echo $unid;?>" class="btn btn-primary float-right mt-3 btn-style-one" >Update</a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 align-self pr-lg-4">
                                    <div class="cards__heading">
                                        <h3>Prescription</h3>
                                    </div>
                                    <a href="add-prescription.php?unid=<?php echo $unid;?>&medid=<?php echo rand(100000,999999);?>" class="btn btn-style btn-primary mr-4 btn-style-one" >Write New</a>
                                    <a href="view-prescription.php?unid=<?php echo $unid;?>" class="btn-style-two" >View Old</a>
                                </div>
                                <div class="col-lg-6 pl-lg-4 mt-lg-0 mt-4">
                                    <img src="image/prescription.jpg" alt="" class="img-fluid rounded" />
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                    else
                    {?>
                        <div class="cards__heading">
                            <h3>User ID not found..</h3>
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
                        </div>
                       
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