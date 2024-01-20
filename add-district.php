<?php

include 'config/connection.php';
session_start();
if (!isset($_SESSION['login']))
 {
    header("Location: index.php");
 }
else if(isset($_POST['submit']))
    {
        $state = $_POST['state'];
        $district = $_POST['district'];
        
        if(mysqli_query($conn, "insert into district_master(State_id, District_name,D_status)values('$state', '$district', true)"))
        {
            echo "<script>alert('District added successfully..');</script>";
        }
        else
        {
            echo "<script>alert('Unable to insert your data, Kindly try after sometimes..')</script>";
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
                    <div class="col-lg-3"></div>
                    <div class="col-lg-6 card shadow p-3" style="padding:50px;box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;">
                        <form method="POST">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="section-title text-left">
                                        <h3>
                                            <span>Add</span> District
                                        </h3>
                                    </div>
                                </div>

                           <div class="col-lg-8">
                                    <div class="form-group first mb-3">
                                    <label for="inputPassword3">Choose State</label>
                                    <select style="width: 100%;height: 34px;
    font-size: 14px;
    line-height: 1.42857143;
    color: #555;
    border: 1px solid #ccc;
    background-color: #fff;
    background-image: none;
    border-radius: 4px;" aria-label="Default select example" required name="state">
                                    <option value="">Select State</option>
                                        <?php 
                                            $res = mysqli_query($conn, "select State_id , State_name from state_master where Status = true");
                                            while($row = mysqli_fetch_assoc($res)){
                                                ?>
                                    <option value="<?php echo $row['State_id'];?>"><?php echo $row['State_name'];?></option>
                                                <?php
                                            }?>
                                    </select>
                                </div>
                            </div>

                                <!--<div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-4 col-form-label input__label">Choose State</label>
                                    <select class="form-control" aria-label="Default select example" required name="state">
                                    <option value="">Select State</option>
                                        <?php 
                                            $res = mysqli_query($conn, "select State_id , State_name from state_master where Status = true");
                                            while($row = mysqli_fetch_assoc($res)){
                                                ?>
                                                <option value="<?php echo $row['State_id'];?>"><?php echo $row['State_name'];?></option>
                                                <?php
                                            }?>
                                    </select>
                                </div>-->

                                <div class="col-lg-8">
                                    <div class="form-group first mb-3">
                                        <label for="inputPassword3">District Name</label>
                                        <input type="text" class="form-control" name="district" id="validationDefault01" required>
                                      
                                    </div>
                                </div>

                                <div class="col-lg-8">
                                    <div class="text-left">
                                        <input type="submit" style="margin-top:25px;" value="Submit" class="mt-2 btn-style-one" name="submit">
                                    </div>
                                </div>

                        </form>
                    </div>
                    <div class="col-lg-3"></div>
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