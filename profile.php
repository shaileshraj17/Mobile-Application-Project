<?php
include 'config/connection.php';
session_start();
$uid = $_SESSION['uid'];
if (!isset($_SESSION['login']))
 {
    header("Location: index.php");
 } 
 else if(isset($_POST['update']))
 {
   
     $image = 'user/user_image.jpg';
     $fname = $_POST['fname'];
     $lname = $_POST['lname'];
     $gender = $_POST['gender'];
     $email = $_POST['email'];
     $contact = $_POST['contact'];
     $dob = $_POST['dob'];
     $city = $_POST['city'];
     $state = $_POST['state'];
     $district = $_POST['district'];

     if(mysqli_query($conn, "update user_master set image = '$image', first_name = '$fname', last_name = '$lname', gender = '$gender', email = '$email', contact = '$contact', date_of_birth = '$dob', city_id = '$city', state_id = '$state', district_id = '$district' where unique_id = '$uid'"))
     {
       echo "<script>alert('Your profile updated siccessfully..!');location.href='profile.php'</script>";
     }
     else
     {
       echo "<script>alert('Unable to update your profile on server..!');location.href='profile.php'</script>";
     }
 }
 else if(isset($_POST['updatedoc']))
 {
   if(!empty($_FILES['image']['name']))
   {
     $image = "user/".$_FILES["image"]["name"];
     if(move_uploaded_file($_FILES["image"]["tmp_name"],"user/".$_FILES["image"]["name"]))
     {
       $fname = $_POST['fname'];
       $lname = $_POST['lname'];
       $email = $_POST['email'];
       $contact = $_POST['contact'];
       if(mysqli_query($conn, "update doctor_master set image = '$image', first_name = '$fname', last_name = '$lname', email = '$email', contact = '$contact' where unique_id = '$uid'"))
       {
         echo "<script>alert('Your profile updated successfully..!');location.href='profile.php'</script>";
       }
       else
       {
         echo "<script>alert('Unable to update your profile on server..!');location.href='profile.php'</script>";
       }
     }
     else
     {
       echo "<script>alert('Unable to upload your image on server..!');location.href='profile.php'</script>";
     }      
   }
   else
   {
     $image = 'user/doctor_image.jpg';
     $fname = $_POST['fname'];
     $lname = $_POST['lname'];
     $email = $_POST['email'];
     $contact = $_POST['contact'];

     if(mysqli_query($conn, "update doctor_master set image = '$image', first_name = '$fname', last_name = '$lname', email = '$email', contact = '$contact' where unique_id = '$uid'"))
     {
       echo "<script>alert('Your profile updated siccessfully..!');location.href='profile.php'</script>";
     }
     else
     {
       echo "<script>alert('Unable to update your profile on server..!');location.href='profile.php'</script>";
     }
   }
 }
 else if(isset($_POST['updatemedc']))
 {
  
     $fname = $_POST['fname'];
     $email = $_POST['email'];
     $contact = $_POST['contact'];

     if(mysqli_query($conn, "update medical_master set first_name = '$fname', email = '$email', contact = '$contact' where unique_id = '$uid'"))
     {
       echo "<script>alert('Your profile updated siccessfully..!');location.href='profile.php'</script>";
     }
     else
     {
       echo "<script>alert('Unable to update your profile on server..!');location.href='profile.php'</script>";
     }
 }
 else if(isset($_POST['updateadm']))
 {
   
     $image = 'user/admin_image.jpg';
     $fname = $_POST['fname'];
     $lname = $_POST['lname'];
     $email = $_POST['email'];
     $contact = $_POST['contact'];

     if(mysqli_query($conn, "update admin_master set image = '$image', first_name = '$fname', last_name = '$lname', email = '$email', contact = '$contact' where unique_id = '$uid'"))
     {
       echo "<script>alert('Your profile updated successfully..!');location.href='profile.php'</script>";
     }
     else
     {
       echo "<script>alert('Unable to update your profile on server..!');location.href='profile.php'</script>";
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
                                <span>Update</span> Profile</h3>
                                </div>




                            </div>
              <?php 
                if($_SESSION['type']=='Doctor')
                {
                  $resd = mysqli_query($conn, "select * from doctor_master where unique_id = '$uid'");
                  $rowd = mysqli_fetch_assoc($resd);
                  ?>
              <div class="col-md-6">
                <label>First name</label>
                <input type="text" class="form-control main" name="fname" id="validationDefault01" value="<?php echo $rowd['first_name'];?>" required>
              </div>

              <div class="form-group col-md-6">
                <label f>Last name</label>
                <input type="text" class="form-control main" name="lname" id="validationDefault02" value="<?php echo $rowd['last_name'];?>" required>
              </div>

              <div class="form-group col-md-6">
                <label f>Unique ID</label>
                <input type="text" class="form-control main" id="validationDefault02" value="<?php echo $rowd['unique_id'];?>" required disabled>
              </div>

              <div class="form-group col-md-6">
                <label f>Email</label>
                <input type="email" class="form-control main" name="email" id="validationDefault02" value="<?php echo $rowd['email'];?>" required>
              </div>

              <div class="form-group col-md-6">
                <label>Contact Number</label>
                <input type="text" title="Please enter 10 digit valid number" name="contact" pattern="[6789][0-9]{9}" class="form-control main" id="validationDefault02" value="<?php echo $rowd['contact'];?>" required>
              </div>

              <div class="form-group col-md-6">
                <label>Profile Image</label>
                <input type="file" class="form-control main" id="validatedCustomFile" name="image" accept="image/*">
              </div>

              <div class="col-lg-12">
                <button class="btn-style-one" type="submit" name="updatedoc">Submit form</button>
              </div>
                <?php
                }
                else if($_SESSION['type']=='Admin')
                {
                    $sqlf = "select * from admin_master where unique_id = '$uid'";
                  $resa = mysqli_query($conn, $sqlf);
                  $rowa = mysqli_fetch_assoc($resa);
    ?>


              <div class="col-md-6">
                <label for="validationDefault01" class="form-label">First name</label>
                <input type="text" class="form-control input-style main" name="fname" id="validationDefault01" value="<?php echo $rowa['first_name'];?>" required>
              </div>

              <div class="form-group col-md-6">
                <label for="validationDefault02" class="input__label">Last name</label>
                <input type="text" class="form-control input-style main" name="lname" id="validationDefault02" value="<?php echo $rowa['last_name'];?>" required>
              </div>

              <div class="form-group col-md-6">
                <label for="validationDefault02" class="input__label">Email</label>
                <input type="email" class="form-control input-style main" name="email" id="validationDefault02" value="<?php echo $rowa['email'];?>" required>
              </div>

              <div class="form-group col-md-6">
                <label for="validationDefault02" class="input__label">Contact Number</label>
                <input type="text" title="Please enter 10 digit valid number" name="contact" pattern="[6789][0-9]{9}" class="form-control main input-style" id="validationDefault02" value="<?php echo $rowa['contact'];?>" required>
              </div>

              <div class="col-lg-12" style="margin-top: 21px;">
                <button class="btn-style-one" type="submit" name="updateadm">Submit form</button>
              </div>
              <?php

                }
                else if($_SESSION['type']=='Medical')
                { 
                    $resdm = mysqli_query($conn, "select * from medical_master where unique_id = '$uid'");
                  $rowdm = mysqli_fetch_assoc($resdm);
                    ?>
                <div class="col-md-6">
                <label>Name</label>
                <input type="text" class="form-control main" name="fname" id="validationDefault01" value="<?php echo $rowdm['first_name'];?>" required>
              </div>

              <div class="form-group col-md-6">
                <label f>Unique ID</label>
                <input type="text" class="form-control main" id="validationDefault02" value="<?php echo $rowdm['unique_id'];?>" required disabled>
              </div>

              <div class="form-group col-md-6">
                <label f>Email</label>
                <input type="email" class="form-control main" name="email" id="validationDefault02" value="<?php echo $rowdm['email'];?>" required>
              </div>

              <div class="form-group col-md-6">
                <label f>Contact Number</label>
                <input type="text" title="Please enter 10 digit valid number" name="contact" pattern="[6789][0-9]{9}" class="form-control input-style" id="validationDefault02" value="<?php echo $rowdm['contact'];?>" required>
              </div>

              <div class="col-lg-12">
                <button class="btn-style-one" type="submit" name="updatemedc">Submit form</button>
              </div>
                <?php
                }
                else if($_SESSION['type']=='User')
                {
                  $resu = mysqli_query($conn, "select * from user_master where unique_id = '$uid'");
                  $rowu = mysqli_fetch_assoc($resu);
                  ?>
              <div class="col-md-6">
                <label>First name</label>
                <input type="text" class="form-control main" name="fname" id="validationDefault01" value="<?php echo $rowu['first_name'];?>" required>
              </div>

              <div class="form-group col-md-6">
                <label>Last name</label>
                <input type="text" class="form-control main" name="lname" id="validationDefault02" value="<?php echo $rowu['last_name'];?>" required>
              </div>

              <div class="form-group col-md-6">
                <label>Unique ID</label>
                <input type="text" class="form-control main" id="validationDefault02" value="<?php echo $rowu['unique_id'];?>" required disabled>
              </div>

              <div class="form-group col-md-6">
                  <label for="inputState" class="input__label">Gender</label>
                  <select id="inputState" class="form-control main" required name="gender">
                      <option <?php if($rowu['gender']=='Male'){echo 'selected';}?>>Male</option>
                      <option <?php if($rowu['gender']=='Female'){echo 'selected';}?>>Female</option>
                      <option <?php if($rowu['gender']=='Other'){echo 'selected';}?>>Other</option>
                  </select>
              </div>

              <div class="form-group col-md-6">
                <label>Email</label>
                <input type="email" class="form-control main" name="email" id="validationDefault02" value="<?php echo $rowu['email'];?>" required>
              </div>

              <div class="form-group col-md-6">
                <label>Contact Number</label>
                <input type="text" title="Please enter 10 digit valid number" name="contact" pattern="[6789][0-9]{9}" class="form-control main" id="validationDefault02" value="<?php echo $rowu['contact'];?>" required>
              </div>

              <div class="form-group col-md-6">
                        <label for="inputPassword3" class="col-sm-12 col-form-label input__label">Choose State</label>
                       
                        <select class="form-control main" aria-label="Default select example" required name="state">
                            <option value="">Select State</option>
                            <?php 
                                $res1 = mysqli_query($conn, "select State_id , State_name from state_master where Status = true");
                                while($row1 = mysqli_fetch_assoc($res1)){
                                    ?>
                                    <option value="<?php echo $row1['State_id'];?>" <?php if($rowu['state_id']==$row1['State_id']){echo "selected";}?>><?php echo $row1['State_name'];?></option>
                                    <?php
                                }?>
                        </select>
                    </div>

                    <div class="form-group col-md-6">
                        <label>Choose District</label>
                  
                        <select class="form-control main" aria-label="Default select example" required name="district">
                            <option value="">Select District</option>
                            <?php 
                                $res1 = mysqli_query($conn, "select District_id , District_name from district_master where D_status = true");
                                while($row1 = mysqli_fetch_assoc($res1)){
                                    ?>
                                    <option value="<?php echo $row1['District_id'];?>" <?php if($rowu['district_id']==$row1['District_id']){echo "selected";}?>><?php echo $row1['District_name'];?></option>
                                    <?php
                                }?>
                        </select>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="inputPassword3" class="col-form-label input__label">Choose City</label>
                       
                        <select class="form-control main" aria-label="Default select example" required name="city">
                            <option value="">Select City</option>
                            <?php 
                                $res1 = mysqli_query($conn, "select City_id  , City_name from city_master where City_status = true");
                                while($row1 = mysqli_fetch_assoc($res1)){
                                    ?>
                                      <option value="<?php echo $row1['City_id'];?>" <?php if($rowu['city_id']==$row1['City_id']){echo "selected";}?>><?php echo $row1['City_name'];?></option>

                                    <?php
                                }?>
                        </select>
                    </div>

              <div class="form-group col-md-6">
                <label for="validationDefault02" class="input__label">Date Of Birth</label>
                <input type="date" min="1950-01-01" max="2003-05-13" name="dob" class="form-control main" id="validationDefault02" value="<?php echo $rowu['date_of_birth'];?>" required>
              </div>

              <div class="col-lg-12">
                <button class="btn-style-one" type="submit" name="update">Submit form</button>
              </div>
                <?php
                }
              ?>
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