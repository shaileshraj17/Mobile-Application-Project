<?php
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
                                            <span>Add</span> Company
                                        </h3>
                                    </div>




                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group first mb-3">
                                        <label for="company1_name">Company Name</label>
                                        <input type="text" title="Select Company" required class="form-control" name="txtcname">
                                    </div>
                                </div>



                                


                                <div class="col-lg-6">
                                    <div class="form-group first">
                                        <label for="usercontact">Contact No</label>
                                        <input type="text" title="Please enter 10 digit valid number" required class="form-control" name="txtcontact" pattern="[6789][0-9]{9}">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group last mb-3">
                                        <label for="company_address">Company Address</label>
                                        <textarea class="form-control" name="txtaddress" rows="5"></textarea>
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