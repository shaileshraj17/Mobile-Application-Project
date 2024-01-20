<?php
include 'config/connection.php';
session_start();
$unid = $_GET['unid'];
if (!isset($_SESSION['login'])) {
    header("Location: index.php");
} else if (isset($_POST['submit'])) {
    $hei = $_POST['height'];
    $wei = $_POST['weight'];
    $blood = $_POST['blood'];
    $bp = $_POST['bp'];
    $pulse = $_POST['pulse'];
    if (mysqli_query($conn, "update user_master set blood_pressure = '$bp', pulse = '$pulse', blood_group = '$blood', height = '$hei', weight = '$wei' where unique_id = '$unid'")) {
        echo "<script>alert('Physical data updated siccessfully..!');</script>";
    } else {
        echo "<script>alert('Unable to update data on server..!');</script>";
    }
}

require_once 'include/header-link.php';
?>


<body>
    <div class="page-wrapper">

        <?php
        require_once 'include/header.php';

        $res1 = mysqli_query($conn, "select first_name,unique_id,status, last_name, gender, email, contact, date_of_birth, height, weight,blood_group,blood_pressure, pulse from user_master where unique_id = '$unid' ");
        $row1 = mysqli_fetch_assoc($res1);
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
                                            <span>Update</span> Information
                                        </h3>
                                    </div>


                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group first mb-3">
                                        <label for="inputPassword3">Heaight(Inches)</label>
                                        <input type="number" step="0.01" class="form-control" name="height" required value="<?php echo $row1['height'];?>">
                                    </div>
                                </div>


                                <div class="col-lg-6">
                                    <div class="form-group first mb-3">
                                        <label for="inputPassword3">Weight(KG)</label>
                                        <input type="number" step="0.01" required class="form-control" name="weight" value="<?php echo $row1['weight'];?>">
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group last mb-3">
                                        <label for="inputPassword3">Blood Group</label>
                                        <select id="inputState" class="form-control input-style" required name="blood">
                                            <option>Choose..</option>
                                            <option <?php if ($row1['blood_group'] == 'O+') {
                                                        echo 'selected';
                                                    } ?>>O+</option>
                                            <option <?php if ($row1['blood_group'] == 'O-') {
                                                        echo 'selected';
                                                    } ?>>O-</option>
                                            <option <?php if ($row1['blood_group'] == 'A+') {
                                                        echo 'selected';
                                                    } ?>>A+</option>
                                            <option <?php if ($row1['blood_group'] == 'A-') {
                                                        echo 'selected';
                                                    } ?>>A-</option>
                                            <option <?php if ($row1['blood_group'] == 'B+') {
                                                        echo 'selected';
                                                    } ?>>B+</option>
                                            <option <?php if ($row1['blood_group'] == 'B-') {
                                                        echo 'selected';
                                                    } ?>>B-</option>
                                            <option <?php if ($row1['blood_group'] == 'AB+') {
                                                        echo 'selected';
                                                    } ?>>AB+</option>
                                            <option <?php if ($row1['blood_group'] == 'AB-') {
                                                        echo 'selected';
                                                    } ?>>AB-</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group last mb-3">
                                        <label for="inputPassword3">Blood Pressure</label>
                                        <input type="text" class="form-control" name="bp" required value="<?php echo $row1['blood_pressure']; ?>">
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group last mb-3">
                                        <label for="inputPassword3">Pulse</label>
                                        <input type="text" class="form-control" name="pulse" value="<?php echo $row1['pulse']; ?>" required>
                                    </div>
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