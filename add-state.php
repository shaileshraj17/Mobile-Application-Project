<?php

include 'config/connection.php';
session_start();
if (!isset($_SESSION['login']))
 {
    header("Location: index.php");
 }
else if(isset($_POST['submit']))
    {
        $name = $_POST['name'];
        
        if(mysqli_query($conn, "insert into state_master(State_name, Status)values('$name', true)"))
        {
            echo "<script>alert('State added successfully..');</script>";
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
                                            <span>Add</span> State
                                        </h3>
                                    </div>

                                </div>
                                <div class="col-lg-8">
                                    <div class="form-group first mb-3">
                                        <label for="inputPassword3">State Name</label>
                                        <input type="text" title="enter state name" class="form-control" name="name" id="validationDefault01" required>
                                      
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