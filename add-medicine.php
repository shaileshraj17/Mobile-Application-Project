<?php

include 'config/connection.php';
session_start();
// if (!isset($_SESSION['login']))
//  {
//     header("Location: index.php");
//  } 
if(isset($_POST['submit']))
    {
        $name = $_POST['name'];
        $description = $_POST['description'];
        $company = $_POST['company'];
        if(mysqli_query($conn, "insert into medicine_master(Company_id, Medcine_name,Description, Medicine_status)values('$company', '$name', '$description', true)"))
        {
            echo "<script>alert('Medicine added successfully..');</script>";
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
                    <div class="col-lg-6 card shadow p-5" style="padding:50px;box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;">
                        <form method="POST">
                            <div class="row">
                                <div class="col-lg-12">
                                <div class="section-title text-left">   
                                <h3>
                                <span>Add</span> Medicine</h3>
                                </div>
                            </div>
                            
                            <!--
                            <div class="col-lg-6">
                                <div class="form-group first mb-3">
                                    <label for="choose_company">Choose Company</label>
                                    <input type="text" title="Select Company" required class="form-control" name="choose_company"placeholder="Select Company">
                                </div>
                            </div>
                            -->

                            <div class="col-lg-6">
                                <div class="form-group first mb-3">
                                    <label for="inputPassword3">Choose Company</label>
                                    
                                        <select class="form-control" aria-label="Default select example" required name="company">
                                        <option value="">Select Company</option>
                                            <?php 
                                                $res = mysqli_query($conn, "select Company_name, Company_id from company_master where Company_Status = true");
                                                while($row = mysqli_fetch_assoc($res)){
                                                    ?>
                                                    <option value="<?php echo $row['Company_id'];?>"><?php echo $row['Company_name'];?></option>
                                                    <?php
                                                }?>
                                        </select>
                                   
                                </div>
                            </div>
                        

                            <div class="col-lg-6">
                                <div class="form-group last mb-3">
                                    <label for="inputPassword3" >Medicine Name</label>
                                    <input type="text" class="form-control" name="name"  title="add medicine name" required>
                                </div>
                            </div>
                
                           
                             <div class="col-lg-12">
                                <div class="form-group last mb-3">
                                    <label for="inputPassword3">Description</label>
                                    <textarea class="form-control" name="description" rows="5" required></textarea> 
                                </div>
                            </div>
                            
                            <div class="text-center">
                                <input type="submit" style="margin-top:21px;" value="Submit" class="mt-3 btn-style-one" name="submit">
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