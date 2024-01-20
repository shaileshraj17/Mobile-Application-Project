<?php
include 'config/connection.php';
session_start();
if (!isset($_SESSION['login']))
 {
    header("Location: index.php");
 }
 else if(isset($_POST['submit']))
    {
        $unique_id = $_SESSION['uid'];
        
        $title = $_POST['title'];
        $description = $_POST['description'];
        if(mysqli_query($conn, "insert into complaint_master(complaint_title, complaint_description,user_id, complaint_status)values('$title', '$description', '$unique_id', true)"))
        {
            echo "<script>alert('Complaint added successfully..');</script>";
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
                                <div class="col-lg-12">
                                <div class="section-title text-left">   
                                <h3>
                                <span>Add</span> Complaint</h3>
                                </div>

                            </div>
                            <div class="col-lg-12">
                                <div class="form-group first mb-2">
                                    <label for="inputPassword3">Complaint Title</label>
                                    <input type="text" class="form-control" name="title" id="validationDefault01" required>
                                </div>
                            </div>


                            <div class="col-lg-12">
                                <div class="form-group last mb-2">
                                    <label for="inputPassword3">Description</label>
                                    <textarea name="description" class="form-control" required></textarea>
                                </div>
                            </div>

                            
                            <div class="text-center">
                                <input type="submit" style="margin-top:21px;" value="Submit" class="mt-5 btn-style-one" name="submit">
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