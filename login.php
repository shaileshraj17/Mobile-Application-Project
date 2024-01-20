<?php

    session_start();
    require_once 'include/header-link.php';
    include 'config/connection.php';

    if(isset($_SESSION['login'])){

         header ("Location: index.php");
    }
    else {

        if(isset($_POST['submit'])) {

            $uid = $_POST['uid'];
            $pass = $_POST['password'];

            $res = mysqli_query($conn, "select unique_id, user_type, password from login_master where status = true and unique_id = '$uid' and password ='$pass' AND NOT user_type = 'User'");
            if(mysqli_num_rows($res)>0) {

                $row = mysqli_fetch_assoc($res);
                $_SESSION['type'] = $row['user_type'];
                $_SESSION['uid'] = $row['unique_id'];
                $_SESSION['login'] = true;

                header("Location: index.php");
            }
            else {

                echo "<script>alert('Invalid credentials..Kindly try with valid data')</script>";
            }
        }
     }
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
                                
                                <div class="section-title text-center">   
                                <h3>
                                <span>Sign In </span> Digital Instruction</h3>
                                </div>




                            </div>
                            <div class="col-lg-12">
                                <div class="form-group first mb-3">
                                    <label for="userid">User Id</label>
                                    <input type="text" title="Please enter valid number" required class="form-control main" name="uid">
                                </div>
                            </div>



                            <div class="col-lg-12">
                                <div class="form-group last mb-3">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control main" name="password" required   pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"  ></br>
                                </div>
                            </div>
                            <div class="col-lg-12">
                            </div>
                            <div class="text-center">
                                <input type="submit" style="margin-top:21px;" value="Login" class="mt-3 btn-style-one" name="submit">
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