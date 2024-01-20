<?php
include 'config/connection.php';
session_start();
$trno = $_GET['id'];
$unid = $_GET['unid'];
if (!isset($_SESSION['login']))
 {
    header("Location: index.php");
 } else if(isset($_POST['submit']))
 {
     $price = $_POST['price'];
     if(mysqli_query($conn, "update prescriptions set price = '$price', status = true where track_no = '$trno' and uid = '$unid'"))
     {
         echo "<script>alert('Medicine purchased successfully..');location.href='view-bill.php?id=$trno&unid=$unid'</script>";
     }
     else
     {
         echo "<script>alert('Unable to purchase medicine..');</script>";
     }
 }

 $trno = $_GET['id'];
 $unid = $_GET['unid'];
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
                    <div class="col-lg-12 card shadow p-3" style="padding:50px;box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;">

                        <div class="section-title text-left">
                            <h3>
                                <span>View</span> Medicine
                            </h3>
                        </div>
                        <table class="table" style="margin-top: 15px;">
                            <thead>
                            <tr>
                                    <th>#</th>
										<th>Medicine Name</th>
										<th>No. of Days</th>
										<th>Timings</th>
										<th>Date</th>
                                    </tr>
                            </thead>
                            <tbody>

<?php 
    $query=mysqli_query($conn,"select medicine_master.Medcine_name, medicine.no_of_days, medicine.timings, medicine.date from medicine join medicine_master on medicine_master.Medicine_id = medicine.medicine_id where medicine.track_no = '$trno' order by medicine.id desc");
    $cnt=1;
    while($row=mysqli_fetch_array($query))
    {?>									
        <tr>
        <td><?php echo htmlentities($cnt);?></td>
            <td><?php echo htmlentities($row['Medcine_name']);?></td>
            <td><?php echo htmlentities($row['no_of_days']." Days");?></td>
            <td><?php echo htmlentities($row['timings']);?></td>
            <td><?php echo htmlentities($row['date']);?></td>
        </tr>
        <?php $cnt=$cnt+1; 
    } ?>
</tbody>	
                        </table>
                        
                    <form method="post" action="#" >
                            <div class="row mt-5" style="margin-top: 50px;">
                                    <div class="col-lg-5">
                                        <input type="number" placeholder="Total Price" min="1" class="form-control main input-style" name="price" required>
                                    </div>
                                    <div class="col-lg-3">
                                        <button type="submit" class="btn-style-one" name="submit">Purchase</button> 
                                    </div>
                            </div>
                        </form>
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