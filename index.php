<?php 
	 error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));

     $koneksi = new mysqli("localhost","root","","kas");

 ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Aplikasi KAS</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
     <!-- MORRIS CHART STYLES-->
    <link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <!-- TABLE STYLE -->
    <link href="assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">APLIKASI KAS</a> 
            </div>
  <div style="color: white;
padding: 15px 50px 5px 50px;
float: right;
font-size: 16px;"> Diakses Pada : <?php echo date('d / M / y'); ?> &nbsp; <a href="login.html" class="btn btn-danger square-btn-adjust">Logout</a> </div>
        </nav>   
           <!-- /. NAV TOP  -->
                <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
				<li class="text-center">
                    <img src="assets/img/find_user.png" class="user-image img-responsive"/>
					</li>
				
					
                    <li>
                        <a  href="index.php"><i class="glyphicon glyphicon-home"></i> Dashboard</a>
                    </li>
                     <li>
                        <a  href="?page=masuk"><i class="glyphicon glyphicon-cloud-download"></i> Kas Masuk</a>
                    </li>
                     <li>
                        <a  href="?page=keluar"><i class="glyphicon glyphicon-cloud-upload"></i> Kas Keluar</a>
                    </li>
                     <li>
                        <a  href="?page=rekap"><i class="glyphicon glyphicon-list"></i> Rekapitulasi Kas</a>
                    </li>
                     <li>
                        <a  href="?page=user"><i class="glyphicon glyphicon-user"></i> Manajemen User</a>
                    </li>
                    
            
        </nav>  
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                    	<?php 
                    		$page = $_GET['page'];
                    		$aksi = $_GET['aksi'];

                    		if ($page == "masuk") {
                    			if ($aksi == "") {
                    				include "page/kas_masuk/masuk.php";
                    			}if ($aksi == "hapus") {
                                    include "page/kas_masuk/hapus.php";
                                }
                    		}elseif ($page == "keluar") {
                    			if ($aksi == "") {
                    				include "page/kas_keluar/keluar.php";
                    			}
                    		}elseif ($page == "rekap") {
                    			if ($aksi == "") {
                    				include "page/rekap/rekap.php";
                    			}
                    		}elseif ($page == "user") {
                    			if ($aksi == "") {
                    				include "page/user/user.php";
                    			}
                    		}

                    	 ?>
                    </div>
                </div>
                 <!-- /. ROW  -->
                 <hr />
               
    </div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
  <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
     <!-- MORRIS CHART SCRIPTS -->
     <script src="assets/js/morris/raphael-2.1.0.min.js"></script>
    <script src="assets/js/morris/morris.js"></script>
      <!-- CUSTOM SCRIPTS -->
    
        <!-- Jquery n JS  -->
    <script src="assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
        <script>
            $(document).ready(function () {
                $('#dataTables-kas').dataTable();
            });
    </script>
         <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
    
   
</body>
</html>
