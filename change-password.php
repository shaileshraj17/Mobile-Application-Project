<?php
include 'config/connection.php';
session_start();
$uid = $_SESSION['uid'];
if (!isset($_SESSION['login'])) {
    header("Location: index.php");
} else if (isset($_POST['change'])) {
    $cpass = $_POST['cpass'];
    $npass = $_POST['npass'];
    $opass = $_POST['opass'];
    $uid = $_SESSION['uid'];

    if($npass != $cpass){

        echo "<script>alert('Password confirmation doesnt match!');location.href='change-password.php'</script>";
    } else{

    $ResCu= mysqli_query($conn, "SELECT password FROM login_master WHERE unique_id = '$uid'");

    if(mysqli_num_rows($ResCu)>0){

        $ResCu = mysqli_fetch_assoc($ResCu);

        if(mysqli_query($conn, "update login_master set password = '$npass' WHERE unique_id = '$uid'"))
        {
        echo "<script>alert('Your password updated successfully..!');location.href='change-password.php'</script>";
        }
        else
        {
            echo "<script>alert('Unable to update password!');location.href='change-password.php'</script>";
        }
    } else
    {
      echo "<script>alert('An invalid current password!');location.href='change-password.php'</script>";
    }
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
                        <form class="row g-3" method="post" enctype="multipart/form-data">
                            <div class="row" style="margin-bottom: 25px;">

                                <div class="section-title text-center">
                                    <h3>
                                        <span>Change</span> Password
                                    </h3>
                                </div>




                            </div>
                            <div class="form-group row">
                                <div class="col-lg-12">
                                <label>Current Password</label>
                                    <input type="password" name="opass" class="form-control input-style main" id="inputPassword3" placeholder="Current Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-12">
                                <label>New Password</label>
                                    <input type="password" name="npass" class="form-control input-style main" id="inputPassword3" placeholder="New Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-12">
                                <label>Confirm Password</label>
                                    <input type="password" name="cpass" class="form-control input-style main" id="inputPassword3" placeholder="Confirm Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-12">
                                    <button type="submit" class="btn-style-one" name="change">Submit</button>
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