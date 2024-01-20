<?php
require_once 'config/connection.php';
$company_Id = $_GET['id'];

if (isset($_POST['btnsubmit'])) {

    $company_name = $_POST['txtname'];
    $company_contactno = $_POST['txtcontact'];
    $comany_address = $_POST['txtaddress'];
    // $company_status = $_POST['txtstatus'];
    // $company_datecreate = $_POST['txtdatecreate'];


    if (mysqli_query($conn, "UPDATE company SET company_name ='$company_name', company_address = '$company_address', phone = '$company_contactno' WHERE company_Id = '$company_Id'")) {

        echo "<script>alert('Record updated successfully');</script>";
    } else {

        echo "<script>alert('Unable to update');</script>";
    }
}


$result = mysqli_query($conn, "SELECT * FROM company WHERE company_Id = '$company_Id'");

if (mysqli_num_rows($result) > 0) {

    $row = mysqli_fetch_assoc($result);
} else {

    echo "<script>alert('Unable to process');location.href='managecompany.php'</script>";
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>project</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    </head>

    <body class="mt-3">
        <div class="row">
            <div class="col-lg-4"></div>
            <div class="col-lg-4 mt-3  card shadow p-5">
                <form method="POST">


                    <h2 class="text-center"><b>Edit Company Details</b></h2>

                    <label class="mt-4"> Company Name </label>
                    <input class="form-control" type="Text" name="txtname" size="20" required value="<?php echo $row['company_name'];?>">

                    <label class="mt-3"> Contact Number </label>
                    <input class="form-control" type="number" name="txtcontact" required maxlength="10" pattern="[0-9]{10}" title="it accept 10 digit number" required value="<?php echo $row['phone'];?>">
                    <label class="mt-3"> Address </label>
                    <textarea class="form-control" name="txtaddress" required value="<?php echo $row['company_address'];?>"></textarea>

                    <input type="Submit" name="btnsubmit" value="Submit" class="mt-5 btn btn-primary">



                </form>
            </div>
        <div class="col-lg-4"></div>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
        </div>
    </body>

</Html>