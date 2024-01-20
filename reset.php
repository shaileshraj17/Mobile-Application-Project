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
                    <div class="col-lg-6 card shadow p-5" style="padding:50px;box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;">
                        <form method="POST">
                            <div class="row">

                                <div class="section-title text-center">
                                    <h3>Reset Password..

                                    </h3>
                                </div>




                            </div>
                            <div class="col-lg-12">
                                <div class="form-group first mb-3">
                                    <label for="userid">User Id</label>
                                    <input type="text" title="Please enter valid number" required class="form-control" name="id" pattern="[a-z][A-Z]{9}[0-9]">
                                </div>
                            </div>
                            <div class="text-center">
                                <input type="submit" style="margin-top:15px;" value="Submit" class="mt-3 btn-style-one" name="submit">
                            </div>
                            <div class="text-center" style="margin-top: 25px;">
                                Remember your password <a href="login.php">Sign Up</a>
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