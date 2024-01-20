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

<div class="hero-slider">
    
    <div class="slider-item slide1"  style="background-image:url(images/slider/bg2.jpg)">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="content style text-right">
                        <h2 class="text-white text-bold mb-2">Our Surgeons</h2>
                        <p class="tag-text mb-5">The Smarter Choice For Your Health</p>
                    </div>
                </div>
            </div> 
        </div>
    </div>
    <div class="slider-item" style="background-image:url(images/slider/slider-bg-2.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="content style text-right">
                        <h2 class="text-white">We Care About <br>Your Health</h2>
                        <p class="tag-text">Where health meets happiness </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="slider-item" style="background-image:url(images/slider/slider-bg-3.jpg)">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="content text-right style">
                        <h2 class="text-white text-bold mb-2">Best Medical <br>Services</h2>
                        <p class="tag-text mb-5">Get the right kind of care with Digital Instruction</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<section class="cta" style="margin-top: 30px;">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="cta-block">
                    <div class="emmergency item">
                        <i class="fa fa-phone"></i>
                        <h2>Emegency Cases</h2>
                        <a href="#">713-884-3131</a>
                        <p>Medicine is a science of uncertainty and an art of probablity</p>
                    </div>
                    <div class="top-doctor item">
                        <i class="fa fa-stethoscope"></i>
                        <h2>24 Hour Service</h2>
                        <p>No matter the time of day, we've got you</p>
                    </div>
                    <div class="working-time item">
                        <i class="fa fa-hourglass-o"></i>
                        <h2>Working Hours</h2>
                        <ul class="w-hours">
                            <li>Mon - Fri  - <span>8:00 - 5:00</span></li>
                            <li>Saturday   - <span>8:00 - 2:00</span></li>
                            <li>Sunday     - <span>holiday</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="service-section bg-gray section">
    <div class="container">
        <div class="section-title text-center">
            <h3>Our
                <span>Doctors</span>
            </h3>
        </div>
        <div class="row items-container clearfix">

            <?php
            $resdoc = mysqli_query($conn, "SELECT * FROM doctor_master WHERE status = 1");
            if(mysqli_num_rows($resdoc)>0){

                while($rowdoc = mysqli_fetch_assoc($resdoc)){

                    ?>
<div class="item">
                <div class="inner-box">
                    <div class="img_holder">
                        <a><?php #echo $rowdoc['image'];?>
                            <img src="<?php echo $rowdoc['image'];?>" alt="images" class="img-responsive">
                        </a>
                    </div>
                    <div class="image-content text-center">
                        <a>
                            <h6>Dr. <?php echo $rowdoc['first_name']." ".$rowdoc['last_name'];?></h6>
                        </a>
                        <span><?php echo $rowdoc['specialization'];?></span>
                    </div>
                </div>
            </div>
                    <?php
                }
            }
           ?> 


        </div>
    </div>
</section>

<?php
    require_once 'include/footer.php';
?>

</div>
<!--End pagewrapper-->

<?php
    require_once 'include/footer-link.php';
?>