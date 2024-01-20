<?php
require_once 'include/header-link.php';

require_once 'config/connection.php';
if (!empty($_GET['Id'])) {

    $company_Id = $_GET['Id'];

    if (mysqli_query($conn, "DELETE FROM company WHERE company_Id = '$company_Id'")) {

        echo "<script>alert('Record deleted successfully');location.href='managecompany.php'</script>";
    } else {

        echo "<script>alert('Unable to delete')</script>";
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
                    <div class="col-lg-12 card shadow p-3" style="padding:50px;box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;">

                        <div class="section-title text-left">
                            <h3>
                                <span>Manage</span> Company
                            </h3>
                        </div>
                        <table class="table" style="margin-top: 15px;">
                            <thead>
                                <tr>
                                    <th scope="col">Sl.No</th>
                                    <th scope="col">Company Name</th>
                                    <th scope="col">Contact Number</th>
                                    <th scope="col">Address</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Date create</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $result = mysqli_query($conn, "SELECT * FROM company ORDER BY company_Id desc");
                                if (mysqli_num_rows($result) > 0) {
                                    $i = 1;
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo "<tr>";
                                        echo "<td>" . $i . "</td>";

                                        echo "<td>" . $row['company_name'] . "</td>";
                                        echo "<td>" . $row['company_contactno'] . "</td>";
                                        echo "<td>" . $row['company_address'] . "</td>";
                                        echo "<td>" . $row['company_status'] . "</td>";
                                        echo "<td>" . $row['company_datecreate'] . "</td>";
                                        echo "<td><a href='edit-company.php?id=$row[company_Id]' class='btn btn-sm btn-primary'>Edit</a> <a href='managecompany.php?id=$row[company_Id]' class='btn btn-sm btn-danger'>Delete</a></td>";
                                        echo "</tr>";
                                        echo "</tr>";
                                        $i++;
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
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