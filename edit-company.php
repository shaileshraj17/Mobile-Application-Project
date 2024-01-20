<?php
require_once 'include/header-link.php';
require_once 'config/connection.php';
$company_Id = $_GET['Id'];

if (isset($_POST['btnsubmit'])) {

    $company_name = $_POST['txtcname'];
    $company_contactno = $_POST['txtcontact'];
    $comany_address = $_POST['txtaddress'];
    // $company_status = $_POST['txtstatus'];
    // $company_datecreate = $_POST['txtdatecreate'];


    if (mysqli_query($conn, "UPDATE company SET company_name ='$company_name', company_address = '$company_address', usercontact= '$company_contactno' WHERE company_Id = '$company_Id'")) {

        echo "<script>alert('Record updated successfully');</script>";
    }
}


$result = mysqli_query($conn, "SELECT * FROM company WHERE company_Id = '$company_Id'");

if (mysqli_num_rows($result) > 0) {

    $row = mysqli_fetch_assoc($result);
} else {

    echo "<script>alert('Unable to process');location.href='manage-company.php'</script>";
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
                    <div class="col-lg-6 card shadow p-5" style="padding:50px;box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;">
                        <form method="POST">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="section-title text-left">
                                        <h3>
                                            Edit Company Details</h3>
                                    </div>




                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group first mb-3">
                                        <label for="company_name">Company Name</label>
                                        <input type="text" title="Enter company Name" required class="form-control" name="txtcname" placeholder="Enter company name">
                                    </div>
                                </div>




                                <div class="col-lg-12">
                                    <div class="form-group first">
                                        <label for="usercontact">Contact No</label>
                                        <input type="text" title="Enter Contact number" required class="form-control" name="txtcontact" pattern="[6789][0-9]{9}" placeholder="Enter Contact Number">
                                    </div>
                                </div>


                                <div class="col-lg-12">
                                    <div class="form-group last mb-3">
                                        <label for="address">Address</label>
                                        <textarea class="form-control" name="txtaddress" rows="4" placeholder="Enter Address"></textarea>
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
    require_once 'include/footer.php';
    ?>

    </div>

    <?php
    require_once 'include/footer-link.php';
    ?>