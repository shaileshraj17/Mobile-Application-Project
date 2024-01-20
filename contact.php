<?php
session_start();
include 'config/connection.php';

 require_once 'include/header-link.php';
?>

<body>
    <div class="page-wrapper">

        <?php
        require_once 'include/header.php';
        ?>

<section class="section contact">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="address-block">
                    <div class="media">
                        <i class="fa fa-map-o"></i>
                        <div class="media-body">
                            <h3>Location</h3>
                            <p>Mangalore</p>
                        </div>
                    </div>
                    <div class="media">
                        <i class="fa fa-phone"></i>
                        <div class="media-body">
                            <h3>Phone</h3>
                            <p>8050739289
                              
                            </p>
                        </div>
                    </div>
                    <div class="media">
                        <i class="fa fa-envelope-o"></i>
                        <div class="media-body">
                            <h3>Email</h3>
                            <p>
                            instructiondigital@gmail.com
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
            <section class="map">
    <div id="map"></div>
</section>
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
 </body>