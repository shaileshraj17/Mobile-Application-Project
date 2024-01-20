<?php
include 'config/connection.php';
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: index.php");
}


require_once 'include/header-link.php';
?>


<body>
    <div class="page-wrapper">

        <?php
        require_once 'include/header.php';
        ?>

<style>
    body {
        margin-top: 20px;
        color: #484b51;
    }

    .text-secondary-d1 {
        color: #728299 !important;
    }

    .page-header {
        margin: 0 0 1rem;
        padding-bottom: 1rem;
        padding-top: .5rem;
        border-bottom: 1px dotted #e2e2e2;
        display: -ms-flexbox;
        display: flex;
        -ms-flex-pack: justify;
        justify-content: space-between;
        -ms-flex-align: center;
        align-items: center;
    }

    .page-title {
        padding: 0;
        margin: 0;
        font-size: 1.75rem;
        font-weight: 300;
    }

    .brc-default-l1 {
        border-color: #dce9f0 !important;
    }

    .ml-n1,
    .mx-n1 {
        margin-left: -.25rem !important;
    }

    .mr-n1,
    .mx-n1 {
        margin-right: -.25rem !important;
    }

    .mb-4,
    .my-4 {
        margin-bottom: 1.5rem !important;
    }

    hr {
        margin-top: 1rem;
        margin-bottom: 1rem;
        border: 0;
        border-top: 1px solid rgba(0, 0, 0, .1);
    }

    .text-grey-m2 {
        color: #888a8d !important;
    }

    .text-success-m2 {
        color: #86bd68 !important;
    }

    .font-bolder,
    .text-600 {
        font-weight: 600 !important;
    }

    .text-110 {
        font-size: 110% !important;
    }

    .text-blue {
        color: #478fcc !important;
    }

    .pb-25,
    .py-25 {
        padding-bottom: .75rem !important;
    }

    .pt-25,
    .py-25 {
        padding-top: .75rem !important;
    }

    .bgc-default-tp1 {
        background-color: rgba(121, 169, 197, .92) !important;
    }

    .bgc-default-l4,
    .bgc-h-default-l4:hover {
        background-color: #f3f8fa !important;
    }

    .page-header .page-tools {
        -ms-flex-item-align: end;
        align-self: flex-end;
    }

    .btn-light {
        color: #757984;
        background-color: #f5f6f9;
        border-color: #dddfe4;
    }

    .w-2 {
        width: 1rem;
    }

    .text-120 {
        font-size: 120% !important;
    }

    .text-primary-m1 {
        color: #4087d4 !important;
    }

    .text-danger-m1 {
        color: #dd4949 !important;
    }

    .text-blue-m2 {
        color: #68a3d5 !important;
    }

    .text-150 {
        font-size: 150% !important;
    }

    .text-60 {
        font-size: 60% !important;
    }

    .text-grey-m1 {
        color: #7b7d81 !important;
    }

    .align-bottom {
        vertical-align: bottom !important;
    }
    </style>
        <section class="service-section bg-gray section">
            <div class="container">
                <div class="row clearfix">
                    <div class="col-lg-12 card shadow p-3" style="padding:50px;box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;">

                        <div class="section-title text-left">
                            <h3>
                                <span>View</span> Bill
                            </h3>
                        </div>

                        <div class="page-content container" id="printableArea">

                            <div class="container px-0">
                                <div class="row mt-4">
                                    <div class="col-12 col-lg-10 offset-lg-1">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="text-center text-150">
                                                <h3 class="">
                                    Invoice
                                        <i class="fa fa-angle-double-right text-80"></i>
                                        ID: #<?php echo $_GET['id']; ?>
                                </h2>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- .row -->

                                        <?php
                                                    $res3 = mysqli_query($conn, "select * from prescriptions where track_no = '$_GET[id]'");
                                                    if (mysqli_num_rows($res3) > 0) {
                                                        $row3 = mysqli_fetch_assoc($res3);
                                                    } else {
                                                        echo "<script>alert('Unable to process..');location.href='index.php';</script>";
                                                    }
                                                    ?>

                                        <?php
                                        
                                        $sql = "select user_master.first_name, user_master.last_name, user_master.contact, state_master.State_name, district_master.District_name, city_master.City_name  from user_master join state_master on state_master.State_id = user_master.state_id join district_master on district_master.District_id = user_master.district_id join city_master on city_master.City_id = user_master.city_id where user_master.unique_id = '$row3[uid]'";
                                        $res = mysqli_query($conn, $sql);
                                        if (mysqli_num_rows($res) > 0) {
                                            $row = mysqli_fetch_assoc($res);
                                        } else {
                                            // echo "<script>alert('Unable to process..');location.href='index.php';</script>";
                                        }
                                        ?>
                                        <div class="row" style="margin-top: 42px;">
                                            <div class="col-sm-6">
                                                <div>
                                                    <span class="text-sm text-grey-m2 align-middle">To:</span>
                                                    <span class="text-600 text-110 text-blue align-middle"><?php echo $row['first_name'] . " " . $row['last_name']; ?></span>
                                                </div>
                                                <div class="text-grey-m2">
                                                    <div class="my-1">
                                                        <?php echo $row['City_name']; ?>
                                                    </div>
                                                    <div class="my-1">
                                                        <?php echo $row['District_name']; ?>, <?php echo $row['State_name']; ?>
                                                    </div>
                                                    <div class="my-1"><i class="fa fa-phone fa-flip-horizontal text-secondary"></i> <b class="text-600"><?php echo $row['contact']; ?></b></div>
                                                </div>
                                            </div>
                                            <div class="text-95 col-sm-6 align-self-start d-sm-flex justify-content-end">
                                                <div class="text-grey-m2">
                                                    
                                                    <div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> <span class="text-600 text-90">Date:</span> <?php echo $row3['date']; ?></div>

                                                    <div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> <span class="text-600 text-90">Status: PAID</span></div>
                                                </div>
                                            </div>
                                            <!-- /.col -->
                                        </div>

                                        <div class="mt-4" style="margin-top: 42px;">
                                            <table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered display table-hover" width="100%">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Medicine Name</th>
                                                        <th>No. of Days</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    <?php
                                                    $query = mysqli_query($conn, "select medicine_master.Medcine_name, medicine.no_of_days, medicine.timings, medicine.date from medicine join medicine_master on medicine_master.Medicine_id = medicine.medicine_id where medicine.track_no = '$_GET[id]' order by medicine.id desc");
                                                    $cnt = 1;
                                                    while ($row = mysqli_fetch_array($query)) { ?>
                                                        <tr>
                                                            <td><?php echo htmlentities($cnt); ?></td>
                                                            <td><?php echo htmlentities($row['Medcine_name']); ?></td>
                                                            <td><?php echo htmlentities($row['no_of_days'] . " Days"); ?></td>
                                                        </tr>
                                                    <?php $cnt = $cnt + 1;
                                                    } ?>
                                                </tbody>
                                            </table>


                                        </div>

                                        <div class="row border-b-2 brc-default-l2"></div>

                                        <div class="row mt-3">
                                            <div class="col-12 col-sm-7 text-grey-d2 text-95 mt-2 mt-lg-0">
                                            </div>

                                            <div class="col-12 col-sm-5 text-grey text-90 order-first order-sm-last">

                                                <div class="row my-2 align-items-center bgc-primary-l3 p-2" style="margin-top: 25px;">
                                                    <div class="col-lg-7 text-right">
                                                        Total Amount
                                                    </div>
                                                    <div class="col-lg-5">
                                                        <span class="text-150 text-success-d3 opacity-2"><?php echo "Rs. " . $row3['price'] . " /-"; ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                       

                                        <hr />

                                        <div>
                                            <span class="text-secondary-d1 text-105">Thank you for your business</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div style="margin-top: 29px;text-align:right">
                                        <a class="btn-style-one" href="#" data-title="Print" onclick="printDiv('printableArea')">
                                            <i class="mr-1 fa fa-print"></i>
                                            Print
                                        </a>
                                        </div>
                    </div>
                </div>
            </div>
    </div>
    </div>
    </section>

    <script>
    function printDiv(divName) {
        var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;

        window.print();

        document.body.innerHTML = originalContents;
    }
    </script>

    <?php
    require_once 'include/footer.php';
    ?>

    </div>

    <?php
    require_once 'include/footer-link.php';
    ?>