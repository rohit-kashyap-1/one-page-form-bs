<?php
session_start();
if(!isset($_SESSION['user_login']) || !isset($_SESSION['user_id'])){
    header('Location:login.php');
}
include('forms/functions.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Data</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Krub:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">


</head>

<body>
    
    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top">
        <div class="container d-flex align-items-center justify-content-center py-2">

            <h1 class="logo"><a href="index.html">webSiteLogo</a></h1>




        </div>
    </header><!-- End Header -->

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center text-start" style="height: auto;">

        <div class="container  flex-column align-items-center  justify-content-center" data-aos="" style="padding-top: 30px;">
            <div class="data">
                <div class="d-flex justify-content-between align-items-center">
                <h3 class="mt-2 mb-2">Registration Data</h3>
                <a href="logout.php" class="btn btn-sm btn-danger">Logout</a>
                </div>
                <table class="table table-stripped table-hover table-bordered w-100">
                    <thead>
                        <tr>
                            <th>S.No</th>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th>Reg.No.</th>
                            <th>Mr.No.</th>
                            <th>Designation</th>
                            <th>Msg</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $count = 1;
                        $datas = users();
                        if($datas!=null && $datas!=false){
                            foreach($datas as $d){
                                ?>
                                <tr>
                                    <td><?php  echo $count++;?></td>
                                    <td><?php echo $d->name; ?></td>
                                    <td><?php echo $d->phone; ?></td>
                                    <td><?php echo $d->phone; ?></td>
                                    <td><?php echo $d->reg_no; ?></td>
                                    <td><?php echo $d->mr_no; ?></td>
                                    <td><?php echo $d->designation; ?></td>
                                    <td><?php echo $d->msg; ?></td>
                                </tr>
                                <?php 
                            }
                        }else{
                            echo "<tr>
                            <td class='text-danger text-center' colspan='8'>No Records</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>

    </section><!-- End Hero -->



    <!-- ======= Footer ======= -->
    <footer id="footer">



        <div class="container d-md-flex py-4">

            <div class="me-md-auto text-center text-md-start">
                <div class="copyright">
                    &copy; Copyright <strong><span> 2023</span></strong>. All Rights Reserved
                </div>
            </div>
            <div class="social-links text-center text-md-right pt-3 pt-md-0">
                <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
            </div>
        </div>
    </footer><!-- End Footer -->

    <div id="preloader"></div>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>

    <script src="assets/js/jqry.js"></script>

    <script src="assets/js/main.js"></script>
    
</body>

</html>