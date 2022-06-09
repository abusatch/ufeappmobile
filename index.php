<?php if($_COOKIE['email'] == ""){ ?>



<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin UFE | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://ufe-section-indonesie.org/ufeapp/admin/menuhome/ufe2.png" rel="shortcut icon" type="image/vnd.microsoft.icon" /> 
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href=""><b>Admin</b> UFE</a>
  </div>
  <!-- /.login-logo -->
  
  <?php
	if(isset($_POST['login'])){
		
include('../db.php');
$pss = md5($_POST['pass']);
$nb = mysqli_query($koneksi,"select * from user where username = '$_POST[email]' and password = '$pss' and level = 'admin-ufe'");
$nb2 = mysqli_num_rows($nb);
$nb3 = mysqli_fetch_array($nb);		
if($nb2 >= 1){
setcookie("email", $_POST['email'], time()+10800);

		?>
<script>
//alert("oke");
location="index.php";
</script>	
<?php	
}else{
	?>
<script>
alert("password atau username salah");
//location="index.php";
</script>	
	
	<?php
}

	}

  ?>
  
  
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <form action="" method="post">
        <div class="input-group mb-3">
          <input type="email" name="email" class="form-control" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="pass" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button name="login" type="submit" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
<!--
      <div class="social-auth-links text-center mb-3">
        <p>- OR -</p>
        <a href="#" class="btn btn-block btn-primary">
          <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
        </a>
        <a href="#" class="btn btn-block btn-danger">
          <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
        </a>
      </div> -->
      <!-- /.social-auth-links -->
<!--
      <p class="mb-1">
        <a href="forgot-password.html">I forgot my password</a>
      </p>
      <p class="mb-0">
        <a href="register.html" class="text-center">Register a new membership</a>
      </p> -->
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>

</body>
</html>



<?php }else{ ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin | UFE</title>
  <!-- Tell the browser to be responsive to screen width -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <link rel="stylesheet" href="plugins/summernote/summernote-bs4.css">
      
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">

<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.dataTables.min.css">


      <link href="https://ufe-section-indonesie.org/ufeapp/admin/menuhome/ufe2.png" rel="shortcut icon" type="image/vnd.microsoft.icon" /> 
  
  <link rel="stylesheet" type="text/css" href="https://rp.fratekindo.com/media/css/jquery.dataTables.css">
	<link rel="stylesheet" type="text/css" href="https://rp.fratekindo.com/resources/syntax/shCore.css">
	<link rel="stylesheet" type="text/css" href="https://rp.fratekindo.com/resources/demo.css">
<script src="plugins/jquery/jquery.min.js"></script>
  
  
    <!--<link rel="stylesheet" href="fashi/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="fashi/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="fashi/css/themify-icons.css" type="text/css">
    <link rel="stylesheet" href="fashi/css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="fashi/css/style.css" type="text/css">
    <link rel="stylesheet" href="fashi/css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="fashi/css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="fashi/css/slicknav.min.css" type="text/css">
    
  -->
  
  
  <?php 
//ini_set('display_errors', '1');
//ini_set('display_startup_errors', '1');
//error_reporting(E_ALL);
?>
  
  <?php 
if($_GET['p'] == ""){

?>
<script>
location = "?p=tb_dm_1";
</script>

<?php 
}
?>
  <style>
  



.hero-items .single-hero-items {
	height: 725px;
	padding-top: 210px;
}

.hero-items .single-hero-items span {
	color: #e7ab3c;
	font-size: 12px;
	font-weight: 700;
	letter-spacing: 2px;
	text-transform: uppercase;
	line-height: 28px;
	display: inline-block;
	position: relative;
	top: 50px;
	opacity: 0;
}

.hero-items .single-hero-items h1 {
	color: #252525;
	font-size: 72px;
	font-weight: 700;
	margin-bottom: 6px;
	position: relative;
	top: 50px;
	opacity: 0;
}

.hero-items .single-hero-items p {
	margin-bottom: 42px;
	position: relative;
	top: 100px;
	opacity: 0;
}

.hero-items .single-hero-items .primary-btn {
	position: relative;
	top: 100px;
	opacity: 0;
}

.hero-items .off-card {
	height: 154px;
	width: 154px;
	padding-top: 40px;
	border-radius: 50%;
	text-align: center;
	line-height: 140px;
	position: absolute;
	left: 47%;
	top: 160px;
	background: #e7ab3c;
	z-index: 1;
	-webkit-transform: rotate(45deg);
	-ms-transform: rotate(45deg);
	transform: rotate(45deg);
	opacity: 0;
}

.hero-items .off-card:after {
	position: absolute;
	left: 5px;
	top: 5px;
	width: calc(100% - 10px);
	height: calc(100% - 10px);
	border: 2px dashed #ffffff;
	content: "";
	border-radius: 50%;
	z-index: -1;
}

.hero-items .off-card h2 {
	font-size: 32px;
	font-weight: 700;
	color: #ffffff;
	text-transform: uppercase;
}

.hero-items .off-card h2 span {
	display: block;
	font-size: 32px;
	font-weight: 700;
	color: #ffffff;
	text-transform: uppercase;
	margin-top: 6px;
}

.hero-items .owl-item.active .single-hero-items span,
.hero-items .owl-item.active .single-hero-items h1,
.hero-items .owl-item.active .single-hero-items p,
.hero-items .owl-item.active .single-hero-items .primary-btn {
	top: 0;
	opacity: 1;
}

.hero-items .owl-item.active .single-hero-items span {
	-webkit-transition: all 0.2s ease 0.2s;
	-o-transition: all 0.2s ease 0.2s;
	transition: all 0.2s ease 0.2s;
}

.hero-items .owl-item.active .single-hero-items h1 {
	-webkit-transition: all 0.4s ease 0.4s;
	-o-transition: all 0.4s ease 0.4s;
	transition: all 0.4s ease 0.4s;
}

.hero-items .owl-item.active .single-hero-items p {
	-webkit-transition: all 0.6s ease 0.6s;
	-o-transition: all 0.6s ease 0.6s;
	transition: all 0.6s ease 0.6s;
}

.hero-items .owl-item.active .single-hero-items .primary-btn {
	-webkit-transition: all 0.8s ease 0.8s;
	-o-transition: all 0.8s ease 0.8s;
	transition: all 0.8s ease 0.8s;
}

.hero-items .owl-item.active .single-hero-items .off-card {
	opacity: 1;
	-webkit-transform: rotate(0deg);
	-ms-transform: rotate(0deg);
	transform: rotate(0deg);
	-webkit-transition: all 1s ease 1s;
	-o-transition: all 1s ease 1s;
	transition: all 1s ease 1s;
}

.hero-items .owl-nav button[type=button] {
	font-size: 30px;
	position: absolute;
	left: 40px;
	top: 45%;
	color: #252525;
}

.hero-items .owl-nav button[type=button]:hover {
	color: #dfad51;
}

.hero-items .owl-nav button[type=button].owl-next {
	left: auto;
	right: 40px;
}
  
  
.partner-logo {
	background: #303030;
	padding: 38px 0;
}

.logo-carousel .logo-item {
	display: table;
}

.logo-carousel .logo-item .tablecell-inner {
	display: table-cell;
	height: 45px;
	vertical-align: middle;
}

.owl-carousel .owl-item img {
	display: block;
	width: auto;
}
  </style>
  
  
  
  
  
  
</head>



<body  class="hold-transition sidebar-mini layout-navbar-fixed">
<!-- Site wrapper -->
<div class="wrapper"> 
  
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
     <!-- <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li> -->
    </ul>

    <!-- SEARCH FORM 
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>-->

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu 
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-comments"></i>
          <span class="badge badge-danger navbar-badge">3</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item">

            <div class="media">
              <img src="dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Brad Diesel
                  <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">Call me whenever you can...</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
         
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
          
            <div class="media">
              <img src="dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  John Pierce
                  <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">I got your message bro</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
        
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
          
            <div class="media">
              <img src="dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Nora Silvester
                  <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">The subject goes here</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
           
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
        </div>
      </li> -->
      <!-- Notifications Dropdown Menu 
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li> -->
     <!-- <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#">
          <i class="fas fa-th-large"></i>
        </a>
      </li> -->
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4" style="position: fixed;">
    <!-- Brand Logo -->
    <a href="?p=tb_dm_1" class="brand-link elevation-4">
      <img src="dist/img/AdminLTELogo.png"
           alt="AdminLTE Logo"
           class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Halaman Admin</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar" style="padding-top:10px;margin-top:60px;">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex" style="height:60px;">
        <div class="image">
          <img src="men.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Admin</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="?p=tulisan" class="nav-link">
            <!-- <i class="nav-icon fas fa-adjust"></i> -->
            <i class="nav-icon fas fa-highlighter"></i>
              <p>
                Tulisan
              </p>
            </a>
          </li>
		  
          <li class="nav-item">
            <a href="?p=background" class="nav-link">
            <!-- <i class="nav-icon fas fa-adjust"></i> -->
            <i class="nav-icon fas fa-image"></i>
              <p>
                Background
              </p>
            </a>
          </li>

 <li class="nav-item">
            <a href="#" class="nav-link">

              <i class="nav-icon fas fa-flag"></i>
              <p>
                Tb Article
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="?p=article_active" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Release</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="?p=article_waiting_confirm" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Waiting Confirmation</p>
                </a>
              </li>
   		 
            </ul>
          </li>

		  		 
		  
		     <li class="nav-item">
            <a href="#" class="nav-link">

              <i class="nav-icon fas fa-flag"></i>
              <p>
                Tb Indonésie
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="?p=menu&id_menu=1" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Geographie</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="?p=menu&id_menu=2" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Demographie</p>
                </a>
              </li>
   <li class="nav-item">
                <a href="?p=menu&id_menu=3" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Economie</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="?p=menu&id_menu=4" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Historie</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="?p=menu&id_menu=5" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Politique</p>
                </a>
              </li>
			 
            </ul>
          </li>




	
		  <li class="nav-item">
            <a href="?p=data_presiden" class="nav-link">
            <i class="nav-icon far fa-flag"></i>
              <p>
                Tb President
              </p>
            </a>
          </li>
		   <li class="nav-item">
            <a href="?p=info_member" class="nav-link">
            <i class="nav-icon far fa-flag"></i>
              <p>
                Info Member
              </p>
            </a>
          </li>
		  <li class="nav-item">
            <a href="?p=tb_dm_1" class="nav-link">
            <i class="nav-icon fas fa-adjust"></i>
              <p>
                Tb Demarches
              </p>
            </a>
          </li>
		  <li class="nav-item">
            <a href="?p=tb_ufe" class="nav-link">
            <i class="nav-icon fas fa-adjust"></i>
              <p>
                Tb UFE
              </p>
            </a>
          </li>
		  
		 
		     <li class="nav-item">
            <a href="#" class="nav-link">

              <i class="nav-icon fab fa-mendeley"></i>
              <p>
                Menu
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="?p=menu&id_menu=1" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Menu 1</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="?p=menu&id_menu=2" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Menu 2</p>
                </a>
              </li>
   <li class="nav-item">
                <a href="?p=menu&id_menu=3" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Menu 3</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="?p=menu&id_menu=4" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Menu 4</p>
                </a>
              </li>
			  <li class="nav-item">
                <a href="?p=menu&id_menu=5" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Menu 5</p>
                </a>
              </li>
            </ul>
          </li>
		  
		   <li class="nav-item">
            <a href="#" class="nav-link">

              <i class="nav-icon fas fa-user-tag"></i>
              <p>
                User VIP
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="?p=user_vip_belum_dikonfirmasi" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Need Confirm</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="?p=user_vip_sudah_dikonfirmasi" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Confirmed</p>
                </a>
              </li>
   
            </ul>
          </li>
		  
		  
		  
		  
		   <li class="nav-item">
            <a href="#" class="nav-link">

              <i class="nav-icon fas fa-user-shield"></i>
              <p>
                User Personal
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="?p=user_personal_belum_dikonfirmasi" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Need Confirm</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="?p=user_personal_sudah_dikonfirmasi" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Confirmed</p>
                </a>
              </li>
   
            </ul>
          </li>
		  
		  
		   <li class="nav-item">
            <a href="#" class="nav-link">

              <i class="nav-icon fas fa-dollar-sign"></i>
              <p>
                Order
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="?p=order_dikonfirmasi_sedang_aktif" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Sedang Aktif</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="?p=order_dikonfirmasi_histori" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>History</p>
                </a>
              </li>
     <li class="nav-item">
                <a href="?p=order_menunggu_konfirmasi" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Menunggu Konfirmasi</p>
                </a>
              </li>
            </ul>
          </li>
		  
		  
		 <!--
		  <li class="nav-item">
            <a href="/" class="nav-link">
            <i class="nav-icon fas fa-adjust"></i>
              <p>
                Tb Agent
              </p>
            </a>
          </li> -->
		  
		   
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
  <div class="content-wrapper">
  
  
  
  <?php if($_GET['p'] == "tb_dm_1"){ ?>
	
	 <div class="card shadow-sm border-bottom-primary">
    <div class="card-header bg-white py-3">
        <div class="row">
            <div class="col">
                 <ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item"><a href="?p=tb_dm_1">Home</a></li>
		
              <li class="breadcrumb-item active">Data Demarches</li>
                            </ol>
            </div>


            <!-- <div class="col-auto">
                <a href="" data-toggle="modal" data-target="#modaltambah" class="btn btn-sm btn-primary btn-icon-split">
                    <span class="icon">
                        <i class="fa fa-plus"></i>
                    </span>
                    <span class="text">

                        Tambah Data
                    </span>
                </a>
            </div> -->
			
			
			 <div class="modal fade" id="modaltambah">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Tambah Data</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
           			
<?php 
if(isset($_POST['tambahproduk'])){
if(($_POST['nama']) || ($_POST['short_desc'])){

include('../db.php');
mysqli_query($koneksi,"insert into tb_menu (jenis,nama_menu,short_desc,long_desc)
values
('DEMARCHES','$_POST[nama]','$_POST[deskripsi]','$_POST[long_deskripsi]')
");

?>
<script>
alert('Data berhasil ditambahkan<?php echo mysqli_error($koneksi); ?>');
</script>



<?php } } ?>

			<form method="POST" enctype="multipart/form-data" >
            <div class="modal-body" style="height:70vh;overflow:scroll;">
						
			
			<!-- <input onchange="readURLe(this);" type="file" name="image_link" class="form-control" />
			</a><br>
			<center>
			<i><font style="font-size:10px;">* mode kamera landscape
			</font></i><br><img src="" id="product_imagee" style="width:1px;height:1px;" name="product_imagee" class="img-thumbnail">
			</center>
							  <script>
  function readURLe(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#product_imagee')
                .attr('src', e.target.result)
                .width(100)
				.height(100);
        };

        reader.readAsDataURL(input.files[0]);
    }
		
  }
</script>	 -->
	
             <div class="input-group mb-3" style="margin-top:10px;">
                  <div class="input-group-prepend">
                    <span class="input-group-text" style="width:120px;">Nama</span>
                  </div>
				  
				  
				  <input type="hidden" name="unik" value="578866556602c6b54236d7.png" />
                
                  <input type="text" name="nama" value="" class="form-control" placeholder="Nama Kategori" required>
                </div>
				
				<!-- <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" style="width:120px;">Kategori</span>
                  </div>
				  <select name="kategori" class="form-control" required>
                  <option value="" >- kategori -</option>
				  					<option value="19" >Layanan Service</option>
										<option value="21" >Rental Mesin Fotocopy</option>
										<option value="23" >Jual Mesin Fotocopy</option>
										<option value="25" >Spare part</option>
					                </select>
				</div>
            <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" style="width:120px;">Harga</span>
                  </div>
                  <input type="number" name="harga" value="" class="form-control" placeholder="harga" required>
                </div>
				<div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" style="width:120px;">Short Desc</span>
                  </div>
                  <input type="text" name="short" value="" class="form-control" placeholder="Short Desc" required>
                </div>
				
				
				   -->
        <div>Short Desc</div>        
                <textarea class="form-control" name="deskripsi" placeholder="Place some text here"
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" required></textarea>
             
             
                          <div style="margin-top:15px">Long Desc</div>        
                <textarea class="form-control" name="long_deskripsi" placeholder="Place some text here"
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" ></textarea>
             
          
				
				
				
				
				
			</div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" name="tambahproduk" class="btn btn-primary">Add</button>
            </div>
			</form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>			
						
						
                                           
                   <?php 
                   include ('../db.php');
                   $kj = mysqli_query($koneksi,"select * from tb_menu where jenis = 'DEMARCHES'");


                   ?>                            
     <?php 
if(isset($_POST['updatekategori'])){

    
if(($_POST['nama'])){



$maxDimW = 400;
$maxDimH = 500;
list($width, $height, $type, $attr) = getimagesize( $_FILES['image_link']['tmp_name'] );
if ( $width > $maxDimW) {
    $target_filename = $_FILES['image_link']['tmp_name'];
    $fn = $_FILES['image_link']['tmp_name'];
    $size = getimagesize( $fn );
    $ratio = $size[0]/$size[1]; 
    $width = $maxDimW;
    $height = ($maxDimW / $size[0]) * $size[1];
  
    $src = imagecreatefromstring(file_get_contents($fn));
    $dst = imagecreatetruecolor( $width, $height );
    imagecopyresampled($dst, $src, 0, 0, 0, 0, $width, $height, $size[0], $size[1] );

    imagejpeg($dst, $target_filename); 
}

$namaa = $_FILES['image_link']['name'];


$bgsplash = $_FILES['bgsplash']['name'];
$bgsplash3 = date('YmdHi');
$bgsplash2 = $bgsplash3.$_FILES['bgsplash']['name'];

if(!empty($bgsplash)){
    mysqli_query($koneksi,"update tb_menu set bg = '$bgsplash2' where id_menu = '$_POST[idc]'");
   

    
$maxDimWbgs = 400;
$maxDimHbgs = 500;
list($widthbgs, $heightbgs, $typebgs, $attrbgs) = getimagesize( $_FILES['bgsplash']['tmp_name'] );
if ( $widthbgs > $maxDimWbgs) {
    $target_filenamebgs = $_FILES['bgsplash']['tmp_name'];
    $fnbgs = $_FILES['bgsplash']['tmp_name'];
    $sizebgs = getimagesize( $fnbgs );
    $ratiobgs = $sizebgs[0]/$sizebgs[1]; 
    $widthbgs = $maxDimWbgs;
    $heightbgs = ($maxDimWbgs / $sizebgs[0]) * $sizebgs[1];
  
    $srcbgs = imagecreatefromstring(file_get_contents($fnbgs));
    $dstbgs = imagecreatetruecolor( $widthbgs, $heightbgs );
    imagecopyresampled($dstbgs, $srcbgs, 0, 0, 0, 0, $widthbgs, $heightbgs, $sizebgs[0],
     $sizebgs[1] );

    imagejpeg($dstbgs, $target_filenamebgs); 
}

move_uploaded_file($_FILES['bgsplash']['tmp_name'],"bg/".$bgsplash2);	


}




$bgg = $_FILES['bgg']['name'];
$bgg3 = date('YmdHi');
$bgg2 = $bgg3.$_FILES['bgg']['name'];
if(!empty($bgg)){

    mysqli_query($koneksi,"update tb_menu set bg2 = '$bgg2' where id_menu = '$_POST[idc]'");
    $maxDimWbgg = 400;
$maxDimHbgg = 500;
list($widthbgg, $heightbgg, $typebgg, $attrbgg) = getimagesize( $_FILES['bgg']['tmp_name'] );
if ( $widthbgg > $maxDimWbgg) {
    $target_filenamebgg = $_FILES['bgg']['tmp_name'];
    $fnbgg = $_FILES['bgg']['tmp_name'];
    $sizebgg = getimagesize( $fnbgg );
    $ratiobgg = $sizebgg[0]/$sizebgg[1]; 
    $widthbgg = $maxDimWbgg;
    $heightbgg = ($maxDimWbgg / $sizebgg[0]) * $sizebgg[1];
  
    $srcbgg = imagecreatefromstring(file_get_contents($fnbgg));
    $dstbgg = imagecreatetruecolor( $widthbgg, $heightbgg );
    imagecopyresampled($dstbgg, $srcbgg, 0, 0, 0, 0, $widthbgg, $heightbgg, $sizebgg[0], 
    $sizebgg[1] );
    imagejpeg($dstbgg, $target_filenamebgg); 
  
}
    move_uploaded_file($_FILES['bgg']['tmp_name'],"bg/".$bgg2);	
 
}

$deskripsi1 = str_replace("'","&petiksatu&",$_POST['deskripsi']);

if($namaa == null){
mysqli_query($koneksi,"update tb_menu set nama_menu = '$_POST[nama]',
short_desc = '$deskripsi1',
long_desc = '$_POST[long_deskripsi]'
where id_menu = '$_POST[idc]'
");
}else{
move_uploaded_file($_FILES['image_link']['tmp_name'],"../images/menu/".$_FILES['image_link']['name']);	
mysqli_query($koneksi,"update tb_menu set nama_menu = '$_POST[nama]',
short_desc = '$deskripsi1',
gambar2 = '$namaa',
long_desc = '$_POST[long_deskripsi]'
where id_menu = '$_POST[idc]'
");
}

?>

<script>
alert("Data berhasil di ubah <?php echo mysqli_error($koneksi); ?>");
location = "https://ufe-section-indonesie.org/ufeapp/admin/?p=tb_dm_1";
</script>


<?php 
 } 
}
 ?>
    <div class="table-responsive" style="padding:5px;">
        <table class="table table-striped w-100 dt-responsive nowrap" id="dataTable">
            <thead>
                <tr>
                    <th>No. </th>
                    <th>Nama</th>
                    <th>Background Splash</th>
                    <th>Background</th>
                  <th>Short Desc</th>
                  
                    <th>Opsi</th>
                </tr>
            </thead>
            <tbody>
            <?php 
            $no = 1;
            while($kj2 = mysqli_fetch_array($kj)){
            $idd = $kj2['id_menu'];
            ?>

			                                        <tr>
                            <td><?php echo $no; ?></td>
                            <td><?php echo $kj2['nama_menu'] ?></td>
                            <td><img src="https://ufe-section-indonesie.org/ufeapp/admin/bg/<?php echo $kj2['bg'] ?>"
                            style="height:100px;" />
                            </td>
                            <td><img src="https://ufe-section-indonesie.org/ufeapp/admin/bg/<?php echo $kj2['bg2'] ?>"
                            style="height:100px;" /></td>


                 <?php
                  $short_desc1 = str_replace("&petiksatu&","'",$kj2['short_desc']);
                 ?>
							                            <td><?php echo $short_desc1; ?></td>
                            
							<td>


                                <a data-toggle="modal" data-target="#modal-lg_<?php echo $idd ?>" href="" class="btn btn-warning btn-circle btn-sm"><i class="fa fa-edit"></i></a>
                                <a href="?p=rincian&id=<?php echo $idd ?>" class="btn btn-primary btn-circle btn-sm">Lebih lanjut
                                &nbsp;&nbsp;&nbsp;
                                <i class="fa fa-edit"></i></a>

                            </td>
                        </tr
                        >
						
						
			  <div class="modal fade" id="modal-lg_<?php echo $idd; ?>">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">4. Edit Produk</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
						



			<form method="POST" enctype="multipart/form-data" >
            <div class="modal-body" style="overflow:scroll;height:70vh">
			
			<center>
							<img src="https://ufe-section-indonesie.org/ufeapp/images/menu/<?php echo $kj2['gambar2'] ?>"  style="width:200px;" />
			</center> 
			
		<input onchange="readURL<?php echo $idd; ?>(this);" type="file" name="image_link" class="form-control"/>
			</a><br>
			<center>
			<i><font style="font-size:10px;">* mode kamera landscape
			</font></i><br><img src="" id="product_image<?php echo $idd; ?>" style="width:1px;height:1px;" name="product_image<?php echo $idd; ?>" class="img-thumbnail">
			</center>
							  <script>
  function readURL<?php echo $idd; ?>(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#product_image<?php echo $idd; ?>')
                .attr('src', e.target.result)
                .width(100)
				.height(100);
        };

        reader.readAsDataURL(input.files[0]);
    }
		
  }
</script>	
	
             <div class="input-group mb-3" style="margin-top:10px;">
                  <div class="input-group-prepend">
                    <span class="input-group-text" style="width:120px;">Nama</span>
                  </div>
				  
				  
				  <input type="hidden" name="unik" value="430992371602c6b5423c26.png" />
                  <input type="hidden" name="idc" value="<?php echo $idd ?>" />
                  <input type="text" name="nama" value="<?php echo $kj2['nama_menu'] ?>" class="form-control" placeholder="Nama Menu" required>
                </div>
				
				<!-- <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" style="width:120px;">Kategori</span>
                  </div>
				  <select name="kategori" class="form-control" required>
                  <option value="23" >Jual Mesin Fotocopy</option>
				  					<option value="19" >Layanan Service</option>
										<option value="21" >Rental Mesin Fotocopy</option>
										<option value="25" >Spare part</option>
					                </select>
				</div> -->
            <!-- <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" style="width:120px;">Harga</span>
                  </div>
                  <input type="number" name="harga" value="8000000" class="form-control" placeholder="harga" required>
                </div>
				<div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" style="width:120px;">Short Desc</span>
                  </div>
                  <input type="text" name="short" value="XploitSec-ID" class="form-control" placeholder="Short Desc" required>
                </div> -->
				
				
				  <div>
                Short Desc
               </div>
               <?php 
               $short_desc1 = str_replace("&petiksatu&","'",$kj2['short_desc']);

               ?>
                <!-- <textarea class="textarea" name="deskripsi" placeholder="Place some text here" -->
                <textarea class="form-control" name="deskripsi" placeholder="Place some text here"
              
                           required><?php echo $short_desc1 ?></textarea>
             

                <div></div>
                <fieldset style="margin-top:10px;text-align:center;width:100%;">
                <img id="bgsplashh<?php echo $idd; ?>" style="height:150px;" src="https://ufe-section-indonesie.org/ufeapp/admin/bg/<?php echo $kj2['bg']  ?>" />
                </fieldset>
                <div>Background Splash</div>
                <div><input class="form-control" name="bgsplash" type="file" 
                onchange="bgsplash<?php echo $idd; ?>(this)"                
                onclick="bgsplash<?php echo $idd; ?>(this)" /></div>

                <script>
                function bgsplash<?php echo $idd; ?>(input) {
                if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                $('#bgsplashh<?php echo $idd; ?>')
                .attr('src', e.target.result)
                .height(150);
                };

                reader.readAsDataURL(input.files[0]);
                }

                }
                </script>	


                <div></div>
                <fieldset style="margin-top:10px;text-align:center;width:100%;">
                <img id="bggg<?php echo $idd; ?>" style="height:150px;" src="https://ufe-section-indonesie.org/ufeapp/admin/bg/<?php echo $kj2['bg2']  ?>" />
                </fieldset>
                <div>Background</div>
                <div><input
                onchange="bgg<?php echo $idd; ?>(this)"
                  class="form-control" name="bgg" type="file" /></div>

                <script>
                function bgg<?php echo $idd; ?>(input) {
                if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                $('#bggg<?php echo $idd; ?>')
                .attr('src', e.target.result)
                .height(150);
                };

                reader.readAsDataURL(input.files[0]);
                }

                }
                </script>	


             <!--
             <div style="margin-top:15px;">
                           Long Desc
                </div>
                <textarea class="form-control" name="long_deskripsi" placeholder="Place some text here"
              
                          ><?php echo $kj2['long_desc'] ?></textarea>
             
             -->
				
				
				
				
				
			</div>
            <style>
            .kluk:hover{
                  font-size:23px;  
            }
            </style>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <!--
              <a onclick="return confirm('Are you sure you want to delete this item?');" href="del_demar.php?id=<?php echo $idd ?>"><i  style="cursor:pointer;color:red;font-size:20px;font-weight:500;text-align:right;" class="far fa-times-circle kluk"></i>
			  </a>
			  -->
              <button type="submit" name="updatekategori" class="btn btn-primary">Save changes</button>
            </div>
			</form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>			
						
						
             <?php $no++;} ?>          
						
						
                                           
                                                </tbody>
		</table>
    </div>
</div>
	 </div>
</div>

<?php }else if($_GET['p'] == "tb_dm_2"){ ?>		
	


  <div class="card shadow-sm border-bottom-primary">
    <div class="card-header bg-white py-3">
        <div class="row">
            <div class="col">
   <ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item"><a href="?p=tb_dm_1">Home</a></li>
		
              <li class="breadcrumb-item active">Data Demarches</li>
                            </ol>
            </div>


            <!-- <div class="col-auto">
                <a href="" data-toggle="modal" data-target="#modaltambah" class="btn btn-sm btn-primary btn-icon-split">
                    <span class="icon">
                        <i class="fa fa-plus"></i>
                    </span>
                    <span class="text">

                        Tambah Data
                    </span>
                </a>
            </div> -->
			
			
			 <div class="modal fade" id="modaltambah">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Tambah Data</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
           			
<?php 
if(isset($_POST['tambahproduk'])){
if(($_POST['nama']) || ($_POST['short_desc'])){

include('../db.php');
mysqli_query($koneksi,"insert into tb_menu (jenis,nama_menu,short_desc,long_desc)
values
('DEMARCHES','$_POST[nama]','$_POST[deskripsi]','$_POST[long_deskripsi]')
");

?>
<script>
alert('Data berhasil ditambahkan<?php echo mysqli_error($koneksi); ?>');
location = "https://ufe-section-indonesie.org/ufeapp/admin/?p=tb_dm_2";
</script>



<?php } } ?>

			<form method="POST" enctype="multipart/form-data" >
            <div class="modal-body" style="height:70vh;overflow:scroll;">
						
			
			<!-- <input onchange="readURLe(this);" type="file" name="image_link" class="form-control" />
			</a><br>
			<center>
			<i><font style="font-size:10px;">* mode kamera landscape
			</font></i><br><img src="" id="product_imagee" style="width:1px;height:1px;" name="product_imagee" class="img-thumbnail">
			</center>
							  <script>
  function readURLe(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#product_imagee')
                .attr('src', e.target.result)
                .width(100)
				.height(100);
        };

        reader.readAsDataURL(input.files[0]);
    }
		
  }
</script>	 -->
	
             <div class="input-group mb-3" style="margin-top:10px;">
                  <div class="input-group-prepend">
                    <span class="input-group-text" style="width:120px;">Nama</span>
                  </div>
				  
				  
				  <input type="hidden" name="unik" value="578866556602c6b54236d7.png" />
                
                  <input type="text" name="nama" value="" class="form-control" placeholder="Nama Kategori" required>
                </div>
				
				<!-- <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" style="width:120px;">Kategori</span>
                  </div>
				  <select name="kategori" class="form-control" required>
                  <option value="" >- kategori -</option>
				  					<option value="19" >Layanan Service</option>
										<option value="21" >Rental Mesin Fotocopy</option>
										<option value="23" >Jual Mesin Fotocopy</option>
										<option value="25" >Spare part</option>
					                </select>
				</div>
            <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" style="width:120px;">Harga</span>
                  </div>
                  <input type="number" name="harga" value="" class="form-control" placeholder="harga" required>
                </div>
				<div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" style="width:120px;">Short Desc</span>
                  </div>
                  <input type="text" name="short" value="" class="form-control" placeholder="Short Desc" required>
                </div>
				
				
				   -->
        <div>Short Desc</div>        
                <textarea class="form-control" name="deskripsi" placeholder="Place some text here"
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" required></textarea>
             
             
                          <div style="margin-top:15px">Long Desc</div>        
                <textarea class="form-control" name="long_deskripsi" placeholder="Place some text here"
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" ></textarea>
             
          
				
				
				
				
				
			</div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" name="tambahproduk" class="btn btn-primary">Add</button>
            </div>
			</form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>			
						
						
                                           
                   <?php 
                   include ('../db.php');
                   $kj = mysqli_query($koneksi,"select * from tb_menu where jenis = 'DEMARCHES'");


                   ?>                            
     <?php 
if(isset($_POST['updatekategori'])){

    
if(($_POST['nama']) || ($_POST['deskripsi'])){


    
mysqli_query($koneksi,"update tb_menu set nama_menu = '$_POST[nama]',
short_desc = '$_POST[deskripsi]',
long_desc = '$_POST[long_deskripsi]'
where id_menu = '$_POST[idc]'
");


?>

<script>
alert("Data berhasil di ubah <?php echo mysqli_error($koneksi); ?>");
</script>


<?php 
 } 
}
 ?>
    <div class="table-responsive" style="padding:5px;">
        <table class="table table-striped w-100 dt-responsive nowrap" id="example">
            <thead>
                <tr>
                    <th>No. </th>
                    <th>Nama</th>
                  <th>Short Desc</th>
                  
                    <th>Opsi</th>
                </tr>
            </thead>
            <tbody>
            <?php 
            $no = 1;
            while($kj2 = mysqli_fetch_array($kj)){
            $idd = $kj2['id_menu'];
            ?>

			                                        <tr>
                            <td><?php echo $no; ?></td>
                            <td><?php echo $kj2['nama_menu'] ?></td>
                 
							                            <td><?php echo $kj2['short_desc'] ?></td>
                            
							<td>


                                <a data-toggle="modal" data-target="#modal-lg_<?php echo $idd ?>" href="" class="btn btn-warning btn-circle btn-sm"><i class="fa fa-edit"></i></a>

                                <a href="?p=rincian&id=<?php echo $idd ?>" class="btn btn-primary btn-circle btn-sm">Lebih lanjut
                                &nbsp;&nbsp;&nbsp;
                                <i class="fa fa-edit"></i></a>


                            </td>
                        </tr
                        >
						
						
			  <div class="modal fade" id="modal-lg_<?php echo $idd; ?>">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">5. Edit Produk</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
						



			<form method="POST" enctype="multipart/form-data" >
            <div class="modal-body" style="overflow:scroll;height:70vh">
<!-- 			
			<center>
							<img src="gambar/18897871535f8f71b2237d2.png"  style="width:200px;" />
			</center> -->
			
		
			
			
			<!-- <input onchange="readURL<?php //echo $idd; ?>(this);" type="file" name="image_link" class="form-control"/>
			</a><br>
			<center>
			<i><font style="font-size:10px;">* mode kamera landscape
			</font></i><br><img src="" id="product_image50" style="width:1px;height:1px;" name="product_image50" class="img-thumbnail">
			</center>
							  <script>
  function readURL50(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#product_image50')
                .attr('src', e.target.result)
                .width(100)
				.height(100);
        };

        reader.readAsDataURL(input.files[0]);
    }
		
  }
</script>	
	 -->
             <div class="input-group mb-3" style="margin-top:10px;">
                  <div class="input-group-prepend">
                    <span class="input-group-text" style="width:120px;">Nama</span>
                  </div>
				  
				  
				  <input type="hidden" name="unik" value="430992371602c6b5423c26.png" />
                  <input type="hidden" name="idc" value="<?php echo $idd ?>" />
                  <input type="text" name="nama" value="<?php echo $kj2['nama_menu'] ?>" class="form-control" placeholder="Nama Menu" required>
                </div>
				
				<!-- <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" style="width:120px;">Kategori</span>
                  </div>
				  <select name="kategori" class="form-control" required>
                  <option value="23" >Jual Mesin Fotocopy</option>
				  					<option value="19" >Layanan Service</option>
										<option value="21" >Rental Mesin Fotocopy</option>
										<option value="25" >Spare part</option>
					                </select>
				</div> -->
            <!-- <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" style="width:120px;">Harga</span>
                  </div>
                  <input type="number" name="harga" value="8000000" class="form-control" placeholder="harga" required>
                </div>
				<div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" style="width:120px;">Short Desc</span>
                  </div>
                  <input type="text" name="short" value="XploitSec-ID" class="form-control" placeholder="Short Desc" required>
                </div> -->
				
				
				  <div>
                Short Desc
               </div>
                <!-- <textarea class="textarea" name="deskripsi" placeholder="Place some text here" -->
                <textarea class="form-control" name="deskripsi" placeholder="Place some text here"
              
                           required><?php echo $kj2['short_desc'] ?></textarea>
             
             <div style="margin-top:15px;">
                           Long Desc
                </div>
                <!-- <textarea class="textarea" name="deskripsi" placeholder="Place some text here" -->
                <textarea class="form-control" name="long_deskripsi" placeholder="Place some text here"
              
                          ><?php echo $kj2['long_desc'] ?></textarea>
             
             
				
				
				
				
				
			</div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" name="updatekategori" class="btn btn-primary">Save changes</button>
            </div>
			</form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>			
						
						
             <?php $no++;} ?>          
						
						
                                           
                                                </tbody>
          <tfoot>
                <tr>
                    <th>No. </th>
                    <th>Nama</th>
                  <th>Short Desc</th>
                  
                    <th>Opsi</th>
                </tr>
            </tfoot>
		</table>
    </div>
</div>
	 </div>
</div>

<?php }else if($_GET['p'] == "article_active"){ ?>
 <div class="card shadow-sm border-bottom-primary">
    <div class="card-header bg-white py-3">
        <div class="row">
            <div class="col">
<?php 
include('../db.php');
//$idmenuu = "MENU".$_GET['id_menu'];
//$qw = mysqli_query($koneksi,"select * from tb_menu where id_menu = '$_GET[id_menu]'");
//$qw2 = mysqli_fetch_array($qw);
?>
  
           <ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item"><a href="?p=tb_dm_1">Home</a></li>
		
              <li class="breadcrumb-item active">Active Article </li>
                            </ol>
			
			
			<!--
<center>
			<fieldset style="background-color:grey;width:90%;max-width:500px;align:center;">
			tessss
			</fieldset>
		</center>	
			-->
			</div>
   

             
		
						
						
                                           
                   <?php 
                   include ('../db.php');
                   $kj = mysqli_query($koneksi,"select * from tb_menu where id_menu = '$_GET[id_menu]'");


                   ?>                            
    <?php 
if(isset($_POST['updatekategori_menu21'])){

    
if(($_POST['idc'])){





$maxDimW = 1000;
$maxDimH = 500;
list($width, $height, $type, $attr) = getimagesize( $_FILES['image_link21']['tmp_name'] );
if ( $width > $maxDimW || $height > $maxDimH ) {
    $target_filename = $_FILES['image_link21']['tmp_name'];
    $fn = $_FILES['image_link21']['tmp_name'];
    $size = getimagesize( $fn );
    $ratio = $size[0]/$size[1]; // width/height
    //if( $ratio > 1) {
        $width = $maxDimW;
        $height = ($maxDimW / $size[0]) * $size[1];
    // } else {
    //     $width = $maxDimW*$ratio;
    //     $height = $maxDimH;
    // }
    $src = imagecreatefromstring(file_get_contents($fn));
    $dst = imagecreatetruecolor( $width, $height );
    imagecopyresampled($dst, $src, 0, 0, 0, 0, $width, $height, $size[0], $size[1] );

    imagejpeg($dst, $target_filename); // adjust format as needed


}

$namaa = $_FILES['image_link21']['name'];

move_uploaded_file($_FILES['image_link21']['tmp_name'],"../images/menu/".$_FILES['image_link21']['name']);

    if($_FILES['image_link21']['name'] == null){
//mysqli_query($koneksi,"update tb_menu set nama_menu = '$_POST[nama]',
//long_desc = '$_POST[long_deskripsi]'
//where id_menu = '$_POST[idc]'
//");
	}else{
		
mysqli_query($koneksi,"update tb_menu set

gambar = '$namaa'
where id_menu = '$_POST[idc]'
");		
		
	}


if($_FILES['image_link21']['name'] == null){

?>

<script>
alert("Gambar tidak boleh kosong");
location = "?p=menu&id_menu=<?php echo $_POST['idc2'] ?>";

</script>

<?php }else{ ?>

<script>
alert("Data berhasil di ubah <?php echo mysqli_error($koneksi); ?>");
location = "?p=menu&id_menu=<?php echo $_POST['idc2'] ?>";

</script>


<?php } ?>

<?php 
 } 
}
 ?> 

 <?php 
if(isset($_POST['updatetb_artikel'])){

    
if(!empty($_POST['judul'])){





$maxDimW = 1000;
$maxDimH = 500;
list($width, $height, $type, $attr) = getimagesize( $_FILES['image_link']['tmp_name'] );
if ( $width > $maxDimW || $height > $maxDimH ) {
    $target_filename = $_FILES['image_link']['tmp_name'];
    $fn = $_FILES['image_link']['tmp_name'];
    $size = getimagesize( $fn );
    $ratio = $size[0]/$size[1]; // width/height
    //if( $ratio > 1) {
        $width = $maxDimW;
        $height = ($maxDimW / $size[0]) * $size[1];
    // } else {
    //     $width = $maxDimW*$ratio;
    //     $height = $maxDimH;
    // }
    $src = imagecreatefromstring(file_get_contents($fn));
    $dst = imagecreatetruecolor( $width, $height );
    imagecopyresampled($dst, $src, 0, 0, 0, 0, $width, $height, $size[0], $size[1] );

    imagejpeg($dst, $target_filename); // adjust format as needed


}

$namaa = $_FILES['image_link']['name'];

move_uploaded_file($_FILES['image_link']['tmp_name'],"../images/actualite/".$_FILES['image_link']['name']);


$judul1 = str_replace("'","&petiksatu&",$_POST['judul']);
$deskripsi1 = str_replace("'","&petiksatu&",$_POST['deskripsi']);
$keterangan1 = str_replace("'","&petiksatu&",$_POST['keterangan']);

    if($_FILES['image_link']['name'] == null){
mysqli_query($koneksi,"update tb_template set 
judul = '$judul1',
deskripsi = '$deskripsi1',
keterangan = '$keterangan1'
where id_template = '$_POST[id_template]'
");
	}else{
		
mysqli_query($koneksi,"update tb_template set
judul = '$judul1',
deskripsi = '$deskripsi1',
keterangan = '$keterangan1',
gambar = '$namaa'
where id_template = '$_POST[id_template]'
");		
		
	}


if($_FILES['image_link']['name'] == null){

?>

<script>
//alert("Data had been changed\nid_template-<?php echo $_POST['id_template'] ?>"+
//"\ntitle-<?php echo $_POST['judul'] ?>"+
//"\nketerangan-<?php echo $_POST['keterangan'] ?>"+
// "<?php echo mysqli_error($koneksi); ?>");
location = "?p=article_active&ac=art";

</script>

<?php }else{ ?>

<script>
alert("Data had been changed <?php echo mysqli_error($koneksi); ?>");
location = "?p=article_active&ac=art";

</script>


<?php } ?>

<?php 
 } 
}
 ?>
    <div class="table-responsive" style="padding:5px;">
        <table class="table table-striped w-100 dt-responsive nowrap" id="example">
            <thead>
                <tr>
                    <th>No. </th>
					<th>Act</th>                   
				   <th>Title</th>
               
                  <th>Description</th>
				  <th>Member name</th>
                   <th>Email</th>
				   <th>Web link</th>
				   <th>Date</th>
				    <th>Pic</th>
                    
                </tr>
            </thead>
            <tbody>
            <?php 
            $no = 1;

			$kj = mysqli_query($koneksi,"select * from tb_template where keterangan  = 'release' 
            and visibility = '1'
            order by tanggal desc");
            while($kj2 = mysqli_fetch_array($kj)){
            $idd = $kj2['id_template'];
            ?>

			                                        <tr>
                            <td><?php echo $no; ?></td>
                            <td>
							
                                <a data-toggle="modal" data-target="#modal-lg_<?php echo $idd ?>" href="" class="btn btn-warning btn-circle btn-sm"><i class="fa fa-edit"></i></a>


							</td>

                    <?php 
                    $judul1 = str_replace("&petiksatu&","'",$kj2['judul']);
                    $deskripsi1 = str_replace("&petiksatu&","'",$kj2['deskripsi']);
                    
                    ?>

							<td><?php echo $judul1 ?></td>
                          
                 <td><?php echo substr($deskripsi1,0,100); ?></td>
						<?php
						$ok = mysqli_query($koneksi,"select * from user where idUser = '$kj2[id_member_vip]'");
						$ok2 = mysqli_fetch_array($ok);
						?>	          
<td><?php echo $ok2['first_name']."&nbsp;".$ok2['second_name'] ?></td>
<td><?php echo $ok2['username']; ?></td>	
<td><?php echo $kj2['linkweb']; ?></td>	
<td><?php echo $kj2['tanggal']; ?></td>				
                                    <td><img src="https://ufe-section-indonesie.org/ufeapp/images/actualite/<?php echo $kj2['gambar'] ?>"
									style="width:50px;height:auto;" 
									/></td>
								
                        </tr
                        >
						
						
			  <div class="modal fade" id="modal-lg_<?php echo $idd; ?>">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
<?php 
$rt = mysqli_query($koneksi,"select * from tb_template where id_template = '$idd'");
$rt2 = mysqli_fetch_array($rt);

$judul1 = str_replace("&petiksatu&","'",$rt2['judul']);
$deskripsi1 = str_replace("&petiksatu&","'",$rt2['deskripsi']);

?>

              <h4 class="modal-title">16. Edit <?php echo $judul1 ?></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
						



			<form method="POST" enctype="multipart/form-data" >
            <div class="modal-body" style="overflow-y:scroll;height:70vh">

			
			
			
						
			<center>
							<img src="https://ufe-section-indonesie.org/ufeapp/images/actualite/<?php echo $kj2['gambar'] ?>"  style="width:200px;" />
			</center> 
			
		<input onchange="readURL<?php echo $idd; ?>(this);" type="file" name="image_link" class="form-control"/>
			</a><br>
			<center>
			<i><font style="font-size:10px;">* mode kamera landscape
			</font></i><br><img src="" id="product_image<?php echo $idd; ?>" 
			style="width:1px;height:1px;" name="product_image<?php echo $idd; ?>" 
			class="img-thumbnail">
			</center>
							  <script>
  function readURL<?php echo $idd; ?>(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#product_image<?php echo $idd; ?>')
                .attr('src', e.target.result)
                .width(100)
				.height(100);
        };

        reader.readAsDataURL(input.files[0]);
    }
		
  }
</script>	
	
             <div class="input-group mb-3" style="margin-top:10px;">
                  <div class="input-group-prepend">
                    <span class="input-group-text" style="width:120px;">Title</span>
                  </div>
				  
				  
				 
          <input type="hidden" name="id_template" value="<?php echo $idd; ?>" />
                 <input name="judul" class="form-control" 
				 value="<?php echo $judul1 ?>" />
                </div>
				
             <div style="margin-top:10px;padding-left:5px;">
                           Description
                </div>
                <!-- <textarea class="textarea" name="deskripsi" placeholder="Place some text here" -->
                <textarea class="form-control" name="deskripsi" placeholder="Place some text here"
              
                          ><?php echo $deskripsi1 ?></textarea>
             
             
				
				
				<select style="margin-top:10px;" class="form-control" name="keterangan">
				<option value="<?php echo $rt2['keterangan'] ?>">
				<?php echo $rt2['keterangan'] ?></option>
				<?php if($rt2['keterangan'] == "release"){ ?>
				<option value="pending">Pending</option>
				<?php }else{ ?>
				<option value="release">Release</option>
				
				<?php } ?>
				</select>
				
				
			</div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" name="updatetb_artikel" class="btn btn-primary">Save changes</button>
            </div>
			</form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>			
						










						
             <?php $no++;} ?>          
						
						
                                           
                                                </tbody>
        
		 <tfoot>
                <tr>
                    <th>No. </th>
					<th>Act</th>                   
				   <th>Title</th>
               
                  <th>Description</th>
				  <th>Member name</th>
                   <th>Email</th>
				   <th>Web link</th>
				   <th>Date</th>
				    <th>Pic</th>
                    
                </tr>
            </tfoot>
		</table>
    </div>
</div>
	 </div>
</div>
<?php }else if($_GET['p'] == "article_waiting_confirm"){ ?>
 <div class="card shadow-sm border-bottom-primary">
    <div class="card-header bg-white py-3">
        <div class="row">
            <div class="col">
<?php 
include('../db.php');
//$idmenuu = "MENU".$_GET['id_menu'];
//$qw = mysqli_query($koneksi,"select * from tb_menu where id_menu = '$_GET[id_menu]'");
//$qw2 = mysqli_fetch_array($qw);
?>
  
           <ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item"><a href="?p=tb_dm_1">Home</a></li>
		
              <li class="breadcrumb-item active">Article Waiting Confirmation </li>
                            </ol>
			
			
			<!--
<center>
			<fieldset style="background-color:grey;width:90%;max-width:500px;align:center;">
			tessss
			</fieldset>
		</center>	
			-->
			</div>
   

             
		
						
						
                                           
                  
 <?php 
if(isset($_POST['updatetb_artikel'])){

    
if(!empty($_POST['judul'])){





$maxDimW = 1000;
$maxDimH = 500;
list($width, $height, $type, $attr) = getimagesize( $_FILES['image_link']['tmp_name'] );
if ( $width > $maxDimW || $height > $maxDimH ) {
    $target_filename = $_FILES['image_link']['tmp_name'];
    $fn = $_FILES['image_link']['tmp_name'];
    $size = getimagesize( $fn );
    $ratio = $size[0]/$size[1]; // width/height
    //if( $ratio > 1) {
        $width = $maxDimW;
        $height = ($maxDimW / $size[0]) * $size[1];
    // } else {
    //     $width = $maxDimW*$ratio;
    //     $height = $maxDimH;
    // }
    $src = imagecreatefromstring(file_get_contents($fn));
    $dst = imagecreatetruecolor( $width, $height );
    imagecopyresampled($dst, $src, 0, 0, 0, 0, $width, $height, $size[0], $size[1] );

    imagejpeg($dst, $target_filename); // adjust format as needed


}

$namaa = $_FILES['image_link']['name'];

move_uploaded_file($_FILES['image_link']['tmp_name'],"../images/actualite/".$_FILES['image_link']['name']);



$judul1 = str_replace("'","&petiksatu&",$_POST['judul']);
$judul2 = str_replace('"','&petikdua&',$judul1);

$deskripsi1 = str_replace("'","&petiksatu&",$_POST['deskripsi']);
$deskripsi2 = str_replace('"','&petikdua&',$deskripsi1);



    if($_FILES['image_link']['name'] == null){
mysqli_query($koneksi,"update tb_template set 
judul = '$judul2',
deskripsi = '$deskripsi2',
keterangan = '$_POST[keterangan]'
where id_template = '$_POST[id_template]'
");
	}else{
		
mysqli_query($koneksi,"update tb_template set
judul = '$judul2',
deskripsi = '$deskripsi2',
keterangan = '$_POST[keterangan]',
gambar = '$namaa'
where id_template = '$_POST[id_template]'
");		
		
	}


if($_FILES['image_link']['name'] == null){

?>

<script>
//alert("Data had been changed\nid_template-<?php echo $_POST['id_template'] ?>"+
//"\ntitle-<?php echo $_POST['judul'] ?>"+
//"\nketerangan-<?php echo $_POST['keterangan'] ?>"+
// "<?php echo mysqli_error($koneksi); ?>");
location = "?p=article_waiting_confirm&ac=art";

</script>

<?php }else{ ?>

<script>
alert("Data had been changed <?php echo mysqli_error($koneksi); ?>");
location = "?p=article_waiting_confirm&ac=art";

</script>


<?php } ?>

<?php 
 } 
}
 ?>
    <div class="table-responsive" style="padding:5px;">
        <table class="table table-striped w-100 dt-responsive nowrap" id="example">
            <thead>
                <tr>
                    <th>No. </th>
					<th>Act</th>                   
				   <th>Title</th>
               
                  <th>Description</th>
				  <th>Member name</th>
                   <th>Email</th>
				   <th>Web link</th>
				   <th>Date</th>
				    <th>Pic</th>
                    
                </tr>
            </thead>
            <tbody>
            <?php 
            $no = 1;

			$kj = mysqli_query($koneksi,"select * from tb_template where keterangan  = 'pending' 
            and visibility = '1'
            order by tanggal desc");
            while($kj2 = mysqli_fetch_array($kj)){
            $idd = $kj2['id_template'];
            ?>

			                                        <tr>
                            <td><?php echo $no; ?></td>
                            <td>
							
                                <a data-toggle="modal" data-target="#modal-lg_<?php echo $idd ?>" href="" class="btn btn-warning btn-circle btn-sm"><i class="fa fa-edit"></i></a>


							</td>

                <?php 
                
                $judul1 = str_replace("&petiksatu&","'",$kj2['judul']);
                $judul2 = str_replace("&petikdua&",'"',$judul1);

                $deskripsi1 = str_replace("&petiksatu&","'",$kj2['deskripsi']);
                $deskripsi2 = str_replace("&petikdua&",'"',$deskripsi1);
                
                ?>

							<td><?php echo $judul2 ?></td>
                          
                 <td><?php echo substr($deskripsi2,0,100); ?></td>
						<?php
						$ok = mysqli_query($koneksi,"select * from user where idUser = '$kj2[id_member_vip]'");
						$ok2 = mysqli_fetch_array($ok);
						?>	          
<td><?php echo $ok2['first_name']."&nbsp;".$ok2['second_name'] ?></td>
<td><?php echo $ok2['username']; ?></td>	
<td><?php echo $kj2['linkweb']; ?></td>	
<td><?php echo $kj2['tanggal']; ?></td>				
                                    <td><img src="https://ufe-section-indonesie.org/ufeapp/images/actualite/<?php echo $kj2['gambar'] ?>"
									style="width:50px;height:auto;" 
									/></td>
								
                        </tr
                        >
						
						
			  <div class="modal fade" id="modal-lg_<?php echo $idd; ?>">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
<?php 
$rt = mysqli_query($koneksi,"select * from tb_template where id_template = '$idd'");
$rt2 = mysqli_fetch_array($rt);
?>

              <h4 class="modal-title">16. Edit <?php echo $rt2['judul'] ?></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
						



			<form method="POST" enctype="multipart/form-data" >
            <div class="modal-body" style="overflow-y:scroll;height:70vh">

			
			
			
						
			<center>
							<img src="https://ufe-section-indonesie.org/ufeapp/images/actualite/<?php echo $kj2['gambar'] ?>"  style="width:200px;" />
			</center> 
			
		<input onchange="readURL<?php echo $idd; ?>(this);" type="file" name="image_link" class="form-control"/>
			</a><br>
			<center>
			<i><font style="font-size:10px;">* mode kamera landscape
			</font></i><br><img src="" id="product_image<?php echo $idd; ?>" 
			style="width:1px;height:1px;" name="product_image<?php echo $idd; ?>" 
			class="img-thumbnail">
			</center>
							  <script>
  function readURL<?php echo $idd; ?>(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#product_image<?php echo $idd; ?>')
                .attr('src', e.target.result)
                .width(100)
				.height(100);
        };

        reader.readAsDataURL(input.files[0]);
    }
		
  }
</script>	
	
             <div class="input-group mb-3" style="margin-top:10px;">
                  <div class="input-group-prepend">
                    <span class="input-group-text" style="width:120px;">Title</span>
                  </div>
				  
				  
				 
          <input type="hidden" name="id_template" value="<?php echo $idd; ?>" />
                 <input name="judul" class="form-control" 
				 value="<?php echo $judul2 ?>" />
                </div>
				
             <div style="margin-top:10px;padding-left:5px;">
                           Description
                </div>
                <!-- <textarea class="textarea" name="deskripsi" placeholder="Place some text here" -->
                <textarea class="form-control" name="deskripsi" placeholder="Place some text here"
              
                          ><?php echo $deskripsi2 ?></textarea>
             
             
				
				
				<select style="margin-top:10px;" class="form-control" name="keterangan">
				<option value="<?php echo $rt2['keterangan'] ?>">
				<?php echo $rt2['keterangan'] ?></option>
				<?php if($rt2['keterangan'] == "release"){ ?>
				<option value="pending">Pending</option>
				<?php }else{ ?>
				<option value="release">Release</option>
				
				<?php } ?>
				</select>
				
				
			</div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" name="updatetb_artikel" class="btn btn-primary">Save changes</button>
            </div>
			</form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>			
						










						
             <?php $no++;} ?>          
						
						
                                           
                                                </tbody>
        
		 <tfoot>
                <tr>
                    <th>No. </th>
					<th>Act</th>                   
				   <th>Title</th>
               
                  <th>Description</th>
				  <th>Member name</th>
                   <th>Email</th>
				   <th>Web link</th>
				   <th>Date</th>
				    <th>Pic</th>
                    
                </tr>
            </tfoot>
		</table>
    </div>
</div>
	 </div>
</div>
<?php }else if($_GET['p'] == "menu"){ ?>

  <div class="card shadow-sm border-bottom-primary">
    <div class="card-header bg-white py-3">
        <div class="row">
            <div class="col">
<?php 
include('../db.php');
$idmenuu = "MENU".$_GET['id_menu'];
$qw = mysqli_query($koneksi,"select * from tb_menu where id_menu = '$_GET[id_menu]'");
$qw2 = mysqli_fetch_array($qw);
?>
  
           <ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item"><a href="?p=tb_dm_1">Home</a></li>
		
              <li class="breadcrumb-item active"><?php echo $qw2['nama_menu'] ?> </li>
                            </ol>
			
			
			<!--
<center>
			<fieldset style="background-color:grey;width:90%;max-width:500px;align:center;">
			tessss
			</fieldset>
		</center>	
			-->
			</div>
   

             

<!--
      <div class="col-auto">
                <a href="" data-toggle="modal" data-target="#modaltambah" class="btn btn-sm btn-primary btn-icon-split">
                    <span class="icon">
                        <i class="fa fa-plus"></i>
                    </span>
                    <span class="text">

                       14. Tambah Data
                    </span>
                </a>
            </div>
	-->		
			
			 <div class="modal fade" id="modaltambah">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Tambah Data (<?php echo $qw2['nama_menu'] ?>)</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
           			
<?php 
if(isset($_POST['tambahproduk2'])){
if(($_POST['nama'])){

include('../db.php');






$maxDimW = 1000;
$maxDimH = 500;
list($width, $height, $type, $attr) = getimagesize( $_FILES['image_link']['tmp_name'] );
if ( $width > $maxDimW || $height > $maxDimH ) {
    $target_filename = $_FILES['image_link']['tmp_name'];
    $fn = $_FILES['image_link']['tmp_name'];
    $size = getimagesize( $fn );
    $ratio = $size[0]/$size[1]; // width/height
    //if( $ratio > 1) {
        $width = $maxDimW;
        $height = ($maxDimW / $size[0]) * $size[1];
    // } else {
    //     $width = $maxDimW*$ratio;
    //     $height = $maxDimH;
    // }
    $src = imagecreatefromstring(file_get_contents($fn));
    $dst = imagecreatetruecolor( $width, $height );
    imagecopyresampled($dst, $src, 0, 0, 0, 0, $width, $height, $size[0], $size[1] );

    imagejpeg($dst, $target_filename); // adjust format as needed


}

$namaa = $_FILES['image_link']['name'];


 
if($namaa == null){
mysqli_query($koneksi,"insert into tb_demar2 (id_kategori,judul,judul2,short_desc,long_desc) values
('$_POST[idc2]','$_POST[nama]','$_POST[nama2]','$_POST[short_desc]','$_POST[long_deskripsi]')
");
}else{
	
move_uploaded_file($_FILES['image_link']['tmp_name'],"../images/menu/".$_FILES['image_link']['name']);
mysqli_query($koneksi,"insert into tb_demar2 (gambar,id_kategori,judul,judul2,short_desc,long_desc) values
('$namaa','$_POST[idc2]','$_POST[nama]','$_POST[nama2]','$_POST[short_desc]','$_POST[long_deskripsi]')
");	
}
?>
<script>
alert('Data berhasil ditambahkan<?php echo mysqli_error($koneksi); ?>');
location = "?p=rincian&id=<?php echo $_POST['idc2'] ?>";
</script>



<?php }else{
?>
<script>
alert("gagal");
</script>
<?php
}

}//else{
  ?>
<!-- <script>
alert("gagal");
</script> -->
  <?php
//}


?>

			<form method="POST" enctype="multipart/form-data" >
            <div class="modal-body" style="height:70vh;overflow:scroll;">
						
			 <input onchange="readURLe(this);" type="file" name="image_link" class="form-control" />
			</a><br>
			<center>
			<i><font style="font-size:10px;">* mode kamera landscape
			</font></i><br><img src="" id="product_imagee" style="width:1px;height:1px;" name="product_imagee" class="img-thumbnail">
			</center>
							  <script>
  function readURLe(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#product_imagee')
                .attr('src', e.target.result)
                .width(100)
				.height(100);
        };

        reader.readAsDataURL(input.files[0]);
    }
		
  }
</script>	 
	
             <div class="input-group mb-3" style="margin-top:10px;">
                  <div class="input-group-prepend">
                    <span class="input-group-text" style="width:120px;">Nama</span>
                  </div>

                  <input type="hidden" name="idc2" value="<?php echo $_GET['id'] ?>" />
                				  
				  
				  <input type="hidden" name="unik" value="578866556602c6b54236d7.png" />
                
                  <input type="text" name="nama" value="" class="form-control" placeholder="Nama" required>
                </div>

                <div class="input-group mb-3" style="margin-top:10px;">
                  <div class="input-group-prepend">
                    <span class="input-group-text" style="width:120px;">Nama (Tablayout)</span>
                  </div>

                  <input type="text" name="nama2" value="" class="form-control" placeholder="Nama (Tablayout)" required>
                </div>

				<!-- <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" style="width:120px;">Kategori</span>
                  </div>
				  <select name="kategori" class="form-control" required>
                  <option value="" >- kategori -</option>
				  					<option value="19" >Layanan Service</option>
										<option value="21" >Rental Mesin Fotocopy</option>
										<option value="23" >Jual Mesin Fotocopy</option>
										<option value="25" >Spare part</option>
					                </select>
				</div>
            <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" style="width:120px;">Harga</span>
                  </div>
                  <input type="number" name="harga" value="" class="form-control" placeholder="harga" required>
                </div>
				<div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" style="width:120px;">Short Desc</span>
                  </div>
                  <input type="text" name="short" value="" class="form-control" placeholder="Short Desc" required>
                </div>
				
				
				   -->
        <div>Short Desc</div>        
                <textarea class="form-control" name="short_desc" placeholder="Place some text here"
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" required></textarea>
             
             
                          <div style="margin-top:15px">Long Desc</div>        
                <textarea class="form-control" name="long_deskripsi" placeholder="Place some text here"
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" ></textarea>
             
          
				
				
				
				
				
			</div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" name="tambahproduk2" class="btn btn-primary">Add</button>
            </div>
			</form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>			
						
						
                                           
                   <?php 
                   include ('../db.php');
                   $kj = mysqli_query($koneksi,"select * from tb_menu where id_menu = '$_GET[id_menu]'");


                   ?>                            
    <?php 
if(isset($_POST['updatekategori_menu21'])){

    
if(($_POST['idc'])){





$maxDimW = 1000;
$maxDimH = 500;
list($width, $height, $type, $attr) = getimagesize( $_FILES['image_link21']['tmp_name'] );
if ( $width > $maxDimW || $height > $maxDimH ) {
    $target_filename = $_FILES['image_link21']['tmp_name'];
    $fn = $_FILES['image_link21']['tmp_name'];
    $size = getimagesize( $fn );
    $ratio = $size[0]/$size[1]; // width/height
    //if( $ratio > 1) {
        $width = $maxDimW;
        $height = ($maxDimW / $size[0]) * $size[1];
    // } else {
    //     $width = $maxDimW*$ratio;
    //     $height = $maxDimH;
    // }
    $src = imagecreatefromstring(file_get_contents($fn));
    $dst = imagecreatetruecolor( $width, $height );
    imagecopyresampled($dst, $src, 0, 0, 0, 0, $width, $height, $size[0], $size[1] );

    imagejpeg($dst, $target_filename); // adjust format as needed


}

$namaa = $_FILES['image_link21']['name'];

move_uploaded_file($_FILES['image_link21']['tmp_name'],"../images/menu/".$_FILES['image_link21']['name']);

    if($_FILES['image_link21']['name'] == null){
//mysqli_query($koneksi,"update tb_menu set nama_menu = '$_POST[nama]',
//long_desc = '$_POST[long_deskripsi]'
//where id_menu = '$_POST[idc]'
//");
	}else{
		
mysqli_query($koneksi,"update tb_menu set

gambar = '$namaa'
where id_menu = '$_POST[idc]'
");		
		
	}


if($_FILES['image_link21']['name'] == null){

?>

<script>
alert("Gambar tidak boleh kosong");
location = "?p=menu&id_menu=<?php echo $_POST['idc2'] ?>";

</script>

<?php }else{ ?>

<script>
alert("Data berhasil di ubah <?php echo mysqli_error($koneksi); ?>");
location = "?p=menu&id_menu=<?php echo $_POST['idc2'] ?>";

</script>


<?php } ?>

<?php 
 } 
}
 ?> 

 <?php 
if(isset($_POST['updatekategori_menu'])){

    
if(($_POST['nama'])){





$maxDimW = 1000;
$maxDimH = 500;
list($width, $height, $type, $attr) = getimagesize( $_FILES['image_link']['tmp_name'] );
if ( $width > $maxDimW || $height > $maxDimH ) {
    $target_filename = $_FILES['image_link']['tmp_name'];
    $fn = $_FILES['image_link']['tmp_name'];
    $size = getimagesize( $fn );
    $ratio = $size[0]/$size[1]; // width/height
    //if( $ratio > 1) {
        $width = $maxDimW;
        $height = ($maxDimW / $size[0]) * $size[1];
    // } else {
    //     $width = $maxDimW*$ratio;
    //     $height = $maxDimH;
    // }
    $src = imagecreatefromstring(file_get_contents($fn));
    $dst = imagecreatetruecolor( $width, $height );
    imagecopyresampled($dst, $src, 0, 0, 0, 0, $width, $height, $size[0], $size[1] );

    imagejpeg($dst, $target_filename); // adjust format as needed


}

$namaa = $_FILES['image_link']['name'];

move_uploaded_file($_FILES['image_link']['tmp_name'],"../images/menu/".$_FILES['image_link']['name']);

$nama1 = str_replace("'","&petiksatu&",$_POST['nama']);
$short_desc1 = str_replace("'","&petiksatu&",$_POST['short_desc']);
$long_deskripsi1 = str_replace("'","&petiksatu&",$_POST['long_deskripsi']);

    if($_FILES['image_link']['name'] == null){
mysqli_query($koneksi,"update tb_menu set 
nama_menu = '$nama1',
short_desc = '$short_desc1',
long_desc = '$long_deskripsi1'

where id_menu = '$_POST[idc]'
");
	}else{
		
mysqli_query($koneksi,"update tb_menu set 
gambar2 = '$namaa',
nama_menu = '$nama1',
short_desc = '$short_desc1',
long_desc = '$long_deskripsi1'

where id_menu = '$_POST[idc]'
");		
		
	}


if($_FILES['image_link']['name'] == null){

?>

<script>
alert("<?php echo mysqli_error($koneksi); ?>");
location = "?p=menu&id_menu=<?php echo $_POST['idc2'] ?>";

</script>

<?php }else{ ?>

<script>
alert("Data berhasil di ubah <?php echo mysqli_error($koneksi); ?>");
location = "?p=menu&id_menu=<?php echo $_POST['idc2'] ?>";

</script>


<?php } ?>

<?php 
 } else{
	 ?>
	 <script>
	 alert("gagal");
	 </script>
	 <?php
 }
}
 ?>
    <div class="table-responsive" style="padding:5px;">
        <table class="table table-striped w-100 dt-responsive nowrap" id="dataTable">
            <thead>
                <tr>
                    <th>No. </th>
                    <th>Nama</th>
               
                  <th>Short Desc</th>
				  <th>Long Desc</th>
                   <th>Gambar 1</th>
				    <th>Gambar 2</th>
                    <th>Opsi</th>
                </tr>
            </thead>
            <tbody>
            <?php 
            $no = 1;
            while($kj2 = mysqli_fetch_array($kj)){
            $idd = $kj2['id_menu'];


            $nama_menu1 = str_replace("&petiksatu&","'",$kj2['nama_menu']);
            $short_desc1 = str_replace("&petiksatu&","'",$kj2['short_desc']);
            $long_desc1 = str_replace("&petiksatu&","'",$kj2['long_desc']);

            ?>

			                                        <tr>
                            <td><?php echo $no; ?></td>
                            <td><?php echo $nama_menu1 ?></td>
                          
                 <td><?php echo substr($short_desc1,0,100); ?></td>
				<td><?php echo substr($long_desc1,0,100); ?></td>
                 <td><img src="https://ufe-section-indonesie.org/ufeapp/images/menu/<?php echo $kj2['gambar'] ?>"
									style="width:50px;height:auto;" 
									/></td>
									        <td><img src="https://ufe-section-indonesie.org/ufeapp/images/menu/<?php echo $kj2['gambar2'] ?>"
									style="width:50px;height:auto;" 
									/></td>
							<td>


                                <a data-toggle="modal" data-target="#modal-lg_<?php echo $idd ?>" href="" class="btn btn-warning btn-circle btn-sm"><i class="fa fa-edit"></i></a>

                                <a data-toggle="modal" data-target="#modal-lg_<?php echo $idd ?>21" href="" class="btn btn-primary btn-circle btn-sm"><i class="fa fa-edit"></i> Edit Ikon</a>

                              <!--  <a href="?p=rincian2&id=<?php echo $idd ?>" class="btn btn-primary btn-circle btn-sm">Lebih lanjut
                                &nbsp;&nbsp;&nbsp;
                                <i class="fa fa-edit"></i></a>
								-->
								
								
								<!-- <a href="hapustbdemar2.php?id=<?php echo $idd ?>&idc=<?php echo $_GET['id'] ?>" class="btn btn-danger btn-circle btn-sm">Hapus
                                &nbsp;&nbsp;&nbsp;
                                <i class="fa fa-trash"></i></a>
-->

                            </td>
                        </tr
                        >
						
						
			  <div class="modal fade" id="modal-lg_<?php echo $idd; ?>">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
<?php 
$rt = mysqli_query($koneksi,"select * from tb_menu where id_menu = '$idd'");
$rt2 = mysqli_fetch_array($rt);
?>

              <h4 class="modal-title">91. Edit <?php echo $rt2['nama_menu'] ?></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
						



			<form method="POST" enctype="multipart/form-data" >
            <div class="modal-body" style="overflow:scroll;height:70vh">

			
			
			
						
			<center>
							<img src="https://ufe-section-indonesie.org/ufeapp/images/menu/<?php echo $kj2['gambar2'] ?>"  style="width:200px;" />
			</center> 
			
		<input onchange="readURL<?php echo $idd; ?>(this);" type="file" name="image_link" class="form-control"/>
			</a><br>
			<center>
			<i><font style="font-size:10px;">* mode kamera landscape
			</font></i><br><img src="" id="product_image<?php echo $idd; ?>" style="width:1px;height:1px;" name="product_image<?php echo $idd; ?>" class="img-thumbnail">
			</center>
							  <script>
  function readURL<?php echo $idd; ?>(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#product_image<?php echo $idd; ?>')
                .attr('src', e.target.result)
                .width(100)
				.height(100);
        };

        reader.readAsDataURL(input.files[0]);
    }
		
  }
</script>	
	
             <div class="input-group mb-3" style="margin-top:10px;">
                  <div class="input-group-prepend">
                    <span class="input-group-text" style="width:120px;">Nama</span>
                  </div>
				  
				  
				  <input type="hidden" name="unik" value="430992371602c6b5423c26.png" />
          <input type="hidden" name="idc2" value="<?php echo $_GET['id_menu'] ?>" />
                  <input type="hidden" name="idc" value="<?php echo $idd ?>" />
                  <input type="text" name="nama" value="<?php echo $nama_menu1 ?>" class="form-control" placeholder="Nama" required>
                </div>
				

				 <div style="margin-top:15px;padding-left:5px;">
                           Short Desc
                </div>
                <!-- <textarea class="textarea" name="deskripsi" placeholder="Place some text here" -->
                <textarea class="textarea"  name="short_desc" placeholder="Place some text here"
              
                          ><?php echo $short_desc1 ?></textarea>
				
             <div style="margin-top:15px;padding-left:5px;">
                           Long Desc
                </div>
                <!-- <textarea class="textarea" name="deskripsi" placeholder="Place some text here" -->
                <textarea class="textarea"  name="long_deskripsi" placeholder="Place some text here"
              
                          ><?php echo $long_desc1 ?></textarea>
             
             
				
				
				
				
				
			</div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" name="updatekategori_menu" class="btn btn-primary">Save changes</button>
            </div>
			</form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>			
						










			  <div class="modal fade" id="modal-lg_<?php echo $idd; ?>21">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
<?php 
$rt = mysqli_query($koneksi,"select * from tb_menu where id_menu = '$idd'");
$rt2 = mysqli_fetch_array($rt);
?>

              <h4 class="modal-title">10. Edit <?php echo $rt2['nama_menu'] ?></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
						



			<form method="POST" enctype="multipart/form-data" >
            <div class="modal-body" style="overflow:scroll;height:70vh">

			
			
			
						
			<center>
							<img src="https://ufe-section-indonesie.org/ufeapp/images/menu/<?php echo $kj2['gambar'] ?>"  style="width:200px;" />
			</center> 
			
		<input onchange="readURL21<?php echo $idd; ?>(this);" type="file" name="image_link21" class="form-control"/>
			</a><br>
			<center>
			<i><font style="font-size:10px;">* mode kamera landscape
			</font></i><br><img src="" id="product_image21<?php echo $idd; ?>" style="width:1px;height:1px;" name="product_image21<?php echo $idd; ?>" class="img-thumbnail">
			</center>
							  <script>
  function readURL21<?php echo $idd; ?>(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#product_image21<?php echo $idd; ?>')
                .attr('src', e.target.result)
                .width(100)
				.height(100);
        };

        reader.readAsDataURL(input.files[0]);
    }
		
  }
</script>	
	<input type="hidden" name="idc2" value="<?php echo $_GET['id_menu'] ?>" />
                  <input type="hidden" name="idc" value="<?php echo $idd ?>" />
               
				
			</div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" name="updatekategori_menu21" class="btn btn-primary">Save changes</button>
            </div>
			</form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>			

						
             <?php $no++;} ?>          
						
						
                                           
                                                </tbody>
        </table>
    </div>
</div>
	 </div>
</div>

<?php }else if($_GET['p'] == "rincian"){ ?>


  <div class="card shadow-sm border-bottom-primary">
    <div class="card-header bg-white py-3">
        <div class="row">
            <div class="col">
<?php 
include('../db.php');
$qw = mysqli_query($koneksi,"select * from tb_menu where id_menu = '$_GET[id]'");
$qw2 = mysqli_fetch_array($qw);
?>


              <ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item"><a href="?p=tb_dm_1">Home</a></li>
              <li class="breadcrumb-item"><a href="?p=tb_dm_1">Demarches</a></li>
              <li class="breadcrumb-item active"><?php echo $qw2['nama_menu'] ?></li>
                            </ol>
            </div>


      <div class="col-auto">
                <a href="" data-toggle="modal" data-target="#modaltambah" class="btn btn-sm btn-primary btn-icon-split">
                    <span class="icon">
                        <i class="fa fa-plus"></i>
                    </span>
                    <span class="text">

                       1-1. Tambah Data
                    </span>
                </a>
            </div>
			  <div class="col-auto">
                <a href="importdata.php?p=demar2&id=<?php echo $_GET['id'] ?>"  class="btn btn-sm btn-success btn-icon-split">
                    <span class="icon">
                        <i class="fa fa-plus"></i>
                    </span>
                    <span class="text">

                       1. Import Data
                    </span>
                </a>
            </div>
			
			
			 <div class="modal fade" id="modaltambah">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Tambah Data (<?php echo $qw2['nama_menu'] ?>)</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
           			
<?php 
if(isset($_POST['tambahproduk2'])){
if(($_POST['nama'])){

include('../db.php');






$maxDimW = 1000;
$maxDimH = 500;
list($width, $height, $type, $attr) = getimagesize( $_FILES['image_link']['tmp_name'] );
if ( $width > $maxDimW || $height > $maxDimH ) {
    $target_filename = $_FILES['image_link']['tmp_name'];
    $fn = $_FILES['image_link']['tmp_name'];
    $size = getimagesize( $fn );
    $ratio = $size[0]/$size[1]; // width/height
    //if( $ratio > 1) {
        $width = $maxDimW;
        $height = ($maxDimW / $size[0]) * $size[1];
    // } else {
    //     $width = $maxDimW*$ratio;
    //     $height = $maxDimH;
    // }
    $src = imagecreatefromstring(file_get_contents($fn));
    $dst = imagecreatetruecolor( $width, $height );
    imagecopyresampled($dst, $src, 0, 0, 0, 0, $width, $height, $size[0], $size[1] );

    imagejpeg($dst, $target_filename); // adjust format as needed


}

$namaa = $_FILES['image_link']['name'];


 $nama1 = str_replace("'","&petiksatu&",$_POST['nama']);
 $nama21 = str_replace("'","&petiksatu&",$_POST['nama2']);
 $short_desc1 = str_replace("'","&petiksatu&",$_POST['short_desc']);
 $long_deskripsi1 = str_replace("'","&petiksatu&",$_POST['long_deskripsi']);
if($namaa == null){
mysqli_query($koneksi,"insert into tb_demar2 (
    id_kategori,
    judul,
    judul2,
    short_desc,
    long_desc
    ) values
(
'$_POST[idc2]',
'$nama1',
'$nama21',
'$short_desc1',
'$long_deskripsi1'
)
");
}else{
	
move_uploaded_file($_FILES['image_link']['tmp_name'],"../images/menu/".$_FILES['image_link']['name']);
mysqli_query($koneksi,"insert into tb_demar2 (
    gambar,
    id_kategori,
    judul,
    judul2,
    short_desc,
    long_desc
    ) values
(
    '$namaa',
    '$_POST[idc2]',
    '$nama1',
'$nama21',
'$short_desc1',
'$long_deskripsi1'
    )
");	
}
?>
<script>
alert('Data berhasil ditambahkan<?php echo mysqli_error($koneksi); ?>');
location = "?p=rincian&id=<?php echo $_POST['idc2'] ?>";
</script>



<?php }else{
?>
<script>
alert("gagal");
</script>
<?php
}

}//else{
  ?>
<!-- <script>
alert("gagal");
</script> -->
  <?php
//}


?>

			<form method="POST" enctype="multipart/form-data" >
            <div class="modal-body" style="height:70vh;overflow:scroll;">
						
			 <input onchange="readURLe(this);" type="file" name="image_link" class="form-control" />
			</a><br>
			<center>
			<i><font style="font-size:10px;">* mode kamera landscape
			</font></i><br><img src="" id="product_imagee" style="width:1px;height:1px;" name="product_imagee" class="img-thumbnail">
			</center>
							  <script>
  function readURLe(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#product_imagee')
                .attr('src', e.target.result)
                .width(100)
				.height(100);
        };

        reader.readAsDataURL(input.files[0]);
    }
		
  }
</script>	 
	
             <div class="input-group mb-3" style="margin-top:10px;">
                  <div class="input-group-prepend">
                    <span class="input-group-text" style="width:120px;">Nama</span>
                  </div>

                  <input type="hidden" name="idc2" value="<?php echo $_GET['id'] ?>" />
                				  
				  
				  <input type="hidden" name="unik" value="578866556602c6b54236d7.png" />
                
                  <input type="text" name="nama" value="" 
                  class="form-control" placeholder="Nama" required>
                </div>

                <div class="input-group mb-3" style="margin-top:10px;">
                  <div class="input-group-prepend">
                    <span class="input-group-text" style="width:120px;">Nama (Tablayout)</span>
                  </div>

                  <input type="text" name="nama2" value="" class="form-control" placeholder="Nama (Tablayout)" required>
                </div>

				<!-- <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" style="width:120px;">Kategori</span>
                  </div>
				  <select name="kategori" class="form-control" required>
                  <option value="" >- kategori -</option>
				  					<option value="19" >Layanan Service</option>
										<option value="21" >Rental Mesin Fotocopy</option>
										<option value="23" >Jual Mesin Fotocopy</option>
										<option value="25" >Spare part</option>
					                </select>
				</div>
            <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" style="width:120px;">Harga</span>
                  </div>
                  <input type="number" name="harga" value="" class="form-control" placeholder="harga" required>
                </div>
				<div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" style="width:120px;">Short Desc</span>
                  </div>
                  <input type="text" name="short" value="" class="form-control" placeholder="Short Desc" required>
                </div>
				
				
				   -->
        <div>Short Desc</div>        
                <textarea class="form-control" name="short_desc" placeholder="Place some text here"
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" required></textarea>
             
             
                          <div style="margin-top:15px">Long Desc</div>        
                <textarea class="form-control" name="long_deskripsi" placeholder="Place some text here"
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" ></textarea>
             
          
				
				
				
				
				
			</div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" name="tambahproduk2" class="btn btn-primary">Add</button>
            </div>
			</form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>			
						
						
                                           
                   <?php 
                   include ('../db.php');
                   $kj = mysqli_query($koneksi,"select * from tb_demar2 where id_kategori = '$_GET[id]' and visibility = '1'");


                   ?>                            
     <?php 
if(isset($_POST['updatekategori'])){

    
if(($_POST['nama']) || ($_POST['deskripsi'])){





$maxDimW = 1000;
$maxDimH = 500;
list($width, $height, $type, $attr) = getimagesize( $_FILES['image_link']['tmp_name'] );
if ( $width > $maxDimW || $height > $maxDimH ) {
    $target_filename = $_FILES['image_link']['tmp_name'];
    $fn = $_FILES['image_link']['tmp_name'];
    $size = getimagesize( $fn );
    $ratio = $size[0]/$size[1]; // width/height
    //if( $ratio > 1) {
        $width = $maxDimW;
        $height = ($maxDimW / $size[0]) * $size[1];
    // } else {
    //     $width = $maxDimW*$ratio;
    //     $height = $maxDimH;
    // }
    $src = imagecreatefromstring(file_get_contents($fn));
    $dst = imagecreatetruecolor( $width, $height );
    imagecopyresampled($dst, $src, 0, 0, 0, 0, $width, $height, $size[0], $size[1] );

    imagejpeg($dst, $target_filename); // adjust format as needed


}

$namaa = $_FILES['image_link']['name'];


$nama1 = str_replace("'","&petiksatu&",$_POST['nama']);
$nama21 = str_replace("'","&petiksatu&",$_POST['nama2']);
$deskripsi1 = str_replace("'","&petiksatu&",$_POST['deskripsi']);
$long_deskripsi1 = str_replace("'","&petiksatu&",$_POST['long_deskripsi']);

move_uploaded_file($_FILES['image_link']['tmp_name'],"../images/menu/".$_FILES['image_link']['name']);

    if($_FILES['image_link']['name'] == null){
mysqli_query($koneksi,"update tb_demar2 set 
judul = '$nama1',
judul2 = '$nama21',
short_desc = '$deskripsi1',
long_desc = '$long_deskripsi1'
where id_demar = '$_POST[idc]'
");
	}else{
		
mysqli_query($koneksi,"update tb_demar2 set 
judul = '$nama1',
judul2 = '$nama21',
short_desc = '$deskripsi1',
long_desc = '$long_deskripsi1',
gambar = '$namaa'

where id_demar = '$_POST[idc]'
");		
		
	}


if($_FILES['image_link']['name'] == null){

?>

<script>
alert("Data berhasil di ubah <?php echo mysqli_error($koneksi); ?>");
location = "?p=rincian&id=<?php echo $_POST['idc2'] ?>";

</script>

<?php }else{ ?>

<script>
alert("Data berhasil di ubah <?php echo mysqli_error($koneksi); ?>");
location = "?p=rincian&id=<?php echo $_POST['idc2'] ?>";

</script>


<?php } ?>

<?php 
 } 
}
 ?>
    <div class="table-responsive" style="padding:5px;">
        <table class="table table-striped w-100 dt-responsive nowrap" id="dataTable">
            <thead>
                <tr>
                    <th>No. </th>
                    <th>Act</th>
                    <th>Nama</th>
                    <th>Nama (Tablayout)</th>

                  <th>Description</th>
                  

                </tr>
            </thead>
            <tbody>
            <?php 
            $no = 1;
            while($kj2 = mysqli_fetch_array($kj)){
            $idd = $kj2['id_demar'];
            ?>

			                                        <tr>
                            <td><?php echo $no; ?></td>
							<td>
                                <a data-toggle="modal" 
                                data-target="#modal-lg_<?php echo $idd ?>" 
                                href="" class="btn btn-warning btn-circle btn-sm">
                                <i class="fa fa-edit"></i></a>
								<a href="?p=rincian2&id=<?php echo $idd ?>" 
                                class="btn btn-primary btn-circle btn-sm">Lebih lanjut
                                &nbsp;&nbsp;&nbsp;
                                <i class="fa fa-edit"></i></a>
								 <a onclick="return 
                                 confirm('Are you sure you want to delete this item?');" href="hapustbdemar2.php?id=<?php echo $idd ?>&idc=<?php echo $_GET['id'] ?>" class="btn btn-danger btn-circle btn-sm">Hapus
                                &nbsp;&nbsp;&nbsp;
                                <i class="fa fa-trash"></i></a>
							</td>

                            <?php 
                            $judul1 = str_replace("&petiksatu&","'",$kj2['judul']);
                            $judul21 = str_replace("&petiksatu&","'",$kj2['judul2']);
                            $short_desc1 = str_replace("&petiksatu&","'",$kj2['short_desc']);
                            
                            ?>                    
					<td><?php echo $judul1 ?></td>
                            <td><?php echo $judul21 ?></td>
                 
							                            <td><?php echo $short_desc1 ?></td>
                            
						
                        </tr>
						
						
			  <div class="modal fade" id="modal-lg_<?php echo $idd; ?>">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
<?php 
$rt = mysqli_query($koneksi,"select * from tb_demar2 where id_demar = '$idd'");
$rt2 = mysqli_fetch_array($rt);
?>

              <h4 class="modal-title">1. Edit <?php echo $rt2['judul2'] ?></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
						



			<form method="POST" enctype="multipart/form-data" >
            <div class="modal-body" style="overflow:scroll;height:70vh">

			
			
			
						
			<center>
							<img src="https://ufe-section-indonesie.org/ufeapp/images/menu/<?php echo $kj2['gambar'] ?>"  style="width:200px;" />
			</center> 
			
		<input onchange="readURL<?php echo $idd; ?>(this);" type="file" name="image_link" class="form-control"/>
			</a><br>
			<center>
			<i><font style="font-size:10px;">* mode kamera landscape
			</font></i><br><img src="" id="product_image<?php echo $idd; ?>" style="width:1px;height:1px;" name="product_image<?php echo $idd; ?>" class="img-thumbnail">
			</center>
							  <script>
  function readURL<?php echo $idd; ?>(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#product_image<?php echo $idd; ?>')
                .attr('src', e.target.result)
                .width(100)
				.height(100);
        };

        reader.readAsDataURL(input.files[0]);
    }
		
  }
</script>	
	
             <div class="input-group mb-3" style="margin-top:10px;">
                  <div class="input-group-prepend">
                    <span class="input-group-text" style="width:120px;">Nama</span>
                  </div>
				  
				  
				  <input type="hidden" name="unik" value="430992371602c6b5423c26.png" />
          <input type="hidden" name="idc2" value="<?php echo $_GET['id'] ?>" />
                  <input type="hidden" name="idc" value="<?php echo $idd ?>" />
                  <input type="text" name="nama" value="<?php echo $judul1 ?>" class="form-control" placeholder="Nama" required>
                </div>
				


                <div class="input-group mb-3" style="margin-top:10px;">
                  <div class="input-group-prepend">
                    <span class="input-group-text" style="width:120px;">Nama (Tablayout)</span>
                  </div>
				  
				  
				  <input type="hidden" name="unik" value="430992371602c6b5423c26.png" />
                  <input type="hidden" name="idc" value="<?php echo $idd ?>" />
                  <input type="text" name="nama2" value="<?php echo $judul21 ?>" class="form-control" placeholder="Nama (Tablayout)" required>
                </div>
				<!-- <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" style="width:120px;">Kategori</span>
                  </div>
				  <select name="kategori" class="form-control" required>
                  <option value="23" >Jual Mesin Fotocopy</option>
				  					<option value="19" >Layanan Service</option>
										<option value="21" >Rental Mesin Fotocopy</option>
										<option value="25" >Spare part</option>
					                </select>
				</div> -->
            <!-- <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" style="width:120px;">Harga</span>
                  </div>
                  <input type="number" name="harga" value="8000000" class="form-control" placeholder="harga" required>
                </div>
				<div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" style="width:120px;">Short Desc</span>
                  </div>
                  <input type="text" name="short" value="XploitSec-ID" class="form-control" placeholder="Short Desc" required>
                </div> -->
				
				
				  <div>
                Short Desc
               </div>
                <!-- <textarea class="textarea" name="deskripsi" placeholder="Place some text here" -->
                <textarea class="form-control" name="deskripsi" placeholder="Place some text here"
              
                           required><?php echo $short_desc1 ?></textarea>
             
             <div style="margin-top:15px;">
                           Long Desc
                </div>
                <!-- <textarea class="textarea" name="deskripsi" placeholder="Place some text here" -->
                <textarea class="form-control" name="long_deskripsi" placeholder="Place some text here"
              <?php 
              $long_desc1 = str_replace("&petiksatu&","'",$kj2['long_desc']);
              ?>
                          ><?php echo $long_desc1 ?></textarea>
             
             
				
				
				
				
				
			</div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" name="updatekategori" class="btn btn-primary">Save changes</button>
            </div>
			</form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>			
						
						
             <?php $no++;} ?>          
						
						
                                           
                                                </tbody>
        </table>
    </div>
</div>
	 </div>
</div>

<?php }else if($_GET['p'] == "background"){ ?>

<div class="card shadow-sm border-bottom-primary">
  <div class="card-header bg-white py-3">
      <div class="row">
        
      <div class="col">
         <ol class="breadcrumb float-sm-left">
            <li class="breadcrumb-item"><a href="?p=tb_dm_1">Home</a></li>
      
            <li class="breadcrumb-item active">Background</li>
                          </ol>
          
 
          </div>
  </div>


          
          
                  
                      
                      
  
  <div class="table-responsive" style="padding:5px;">
      <table class="table table-striped w-100 dt-responsive nowrap" id="dataTable">
          <thead>
              <tr>
                  <th>No. </th>
                  <th>Bg</th>
                  <th>Bg 2</th>
                  <th>Jenis</th>
                  
                
                  <th>Opsi</th>
              </tr>
          </thead>
          <tbody>
 
          
          <?php 
          $no = 1;
          include ('../db.php');
          $dw = mysqli_query($koneksi,"select * from tb_background order by keterangan asc");
          while($dw2 = mysqli_fetch_array($dw)){
          ?>
               <tr>
                          <td><?php echo $no; ?></td>
                          <td colspan="2"><img src="bg/<?php echo $dw2['gambar'] ?>" style="width:100px;" /></td>
                          <td><?php echo $dw2['keterangan'] ?></td>
                          
                          <td>
                            <span data-toggle="modal" 
                            data-target="#editbg<?php echo $dw2['id_bg'] ?>" 
                            style="cursor:pointer;" class="btn btn-primary btn-sm" >
                           Edit&nbsp;&nbsp;<i class="fa fa-edit"></i></span>
                          </td>
                      </tr
                      >
          

                      <div class="modal fade" id="editbg<?php echo $dw2['id_bg'] ?>">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Edit Background</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
           			
            <?php 
            if(isset($_POST['editbg'])){

                
$maxDimW = 1500;
$maxDimH = 3000;
list($width, $height, $type, $attr) = getimagesize( $_FILES['image_link']['tmp_name'] );
if ( $width > $maxDimW || $height > $maxDimH ) {
    $target_filename = $_FILES['image_link']['tmp_name'];
    $fn = $_FILES['image_link']['tmp_name'];
    $size = getimagesize( $fn );
    $ratio = $size[0]/$size[1]; // width/height
    //if( $ratio > 1) {
        $width = $maxDimW;
        $height = ($maxDimW / $size[0]) * $size[1];
    // } else {
    //     $width = $maxDimW*$ratio;
    //     $height = $maxDimH;
    // }
    $src = imagecreatefromstring(file_get_contents($fn));
    $dst = imagecreatetruecolor( $width, $height );
    imagecopyresampled($dst, $src, 0, 0, 0, 0, $width, $height, $size[0], $size[1] );

    imagejpeg($dst, $target_filename); // adjust format as needed


}

date_default_timezone_set('Asia/Jakarta');
$tanggal3 = date('YmdHis');


$namaa = $_FILES['image_link']['name'];
$nama_file = $tanggal3.$_FILES['image_link']['name'];


if(empty($namaa)){

}else{
    $tanggal3 = date('YmdHis');


$namaa = $_FILES['image_link']['name'];
$nama_file = $tanggal3.$_FILES['image_link']['name'];
    mysqli_query($koneksi,"update tb_background set gambar = '$nama_file' 
    where id_bg = '$_POST[id_bg]'
    ");
    $nama_file = $tanggal3.$_FILES['image_link']['name'];
   
move_uploaded_file($_FILES["image_link"]["tmp_name"],"bg/".$nama_file);	

}

?>
<script>

alert("<?php echo $namaa; ?>");

    location = "https://ufe-section-indonesie.org/ufeapp/admin/?p=background";
//alert(<?php echo $_POST['id_bg'] ?>);
    </script>
<?php

            }
            ?>        
			<form method="POST"   enctype="multipart/form-data" >
            <div class="modal-body" style="height:50vh;overflow-y:scroll;">
            <input name="id_bg" value="<?php echo $dw2['id_bg'] ?>" type="hidden" />
         <div class="row">
             <fieldset style="width:100%;text-align:center;">
            <img id="gamber<?php echo $dw2['id_tb'] ?>" src="bg/<?php echo $dw2['gambar'] ?>" style="width:100%;max-width:150px;" /><br>
            <input type="file" onchange="readp<?php echo $dw2['id_tb'] ?>(this);" name="image_link" class="form-control" required/>
        </fieldset>
        </div>
            
        
        </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" name="editbg" class="btn btn-primary">Save Changes</button>
            </div>
			</form>
          </div>
        </div>
      </div>			
				



      <script>
  function readp<?php echo $dw2['id_tb'] ?>(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $("#gamber<?php echo $dw2['id_tb'] ?>")
                .attr('src', e.target.result)
                .width(150);
        };

        reader.readAsDataURL(input.files[0]);
    }
		
  }
</script>	 

<?php $no++;} ?>



<?php 

$nimm = $no;
$og = mysqli_query($koneksi,"select * from tb_menu where jenis = 'DEMARCHES'");
while($og2 = mysqli_fetch_array($og)){
?>

<tr>
                          <td><?php echo $nimm; ?></td>
                          <td><img src="bg/<?php echo $og2['bg'] ?>" style="width:100px;" /></td>
                          <td><img src="bg/<?php echo $og2['bg2'] ?>" style="width:100px;" /></td>
                          
                          <td><?php echo $og2['nama_menu'] ?></td>
                          
                          <td>
                            <span data-toggle="modal" 
                            data-target="#editbgdemar<?php echo $og2['id_menu'] ?>" 
                            style="cursor:pointer;" class="btn btn-primary btn-sm" >
                           Edit&nbsp;&nbsp;<i class="fa fa-edit"></i></span>
                          </td>
                      </tr
                      >
          

                      <div class="modal fade" id="editbgdemar<?php echo $og2['id_menu'] ?>">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Edit Background</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
           			
            <?php 
            if(isset($_POST['editbgdemar'])){




                $maxDimWx = 1500;
                $maxDimHx = 3000;
                list($width2, $height2, $type2, $attr2) = getimagesize( $_FILES['image_link2']['tmp_name'] );
                if ( $width2 > $maxDimWx || $height2 > $maxDimHx ) {
                    $target_filename2 = $_FILES['image_link2']['tmp_name'];
                    $fn2 = $_FILES['image_link2']['tmp_name'];
                    $size2 = getimagesize( $fn2 );
                    $ratio2 = $size[0]/$size[1]; // width/height
                    //if( $ratio > 1) {
                        $width2 = $maxDimWx;
                        $height2 = ($maxDimWx / $size[0]) * $size[1];
                    // } else {
                    //     $width = $maxDimW*$ratio;
                    //     $height = $maxDimH;
                    // }
                    $src2 = imagecreatefromstring(file_get_contents($fn2));
                    $dst2 = imagecreatetruecolor( $width2, $height2 );
                    imagecopyresampled($dst2, $src2, 0, 0, 0, 0, $width2, $height2, $size[0],
                     $size[1] );
                
                    imagejpeg($dst2, $target_filename2); // adjust format as needed
                
                
                }
                
                date_default_timezone_set('Asia/Jakarta');
                $tanggal3 = date('YmdHis');
                
                
                $namaa2 = $_FILES['image_link2']['name'];
                
                
                
                if(empty($namaa2)){
                
                }else{
                    $nama_file2 = $tanggal3.$_FILES['image_link2']['name'];
                    mysqli_query($koneksi,"update tb_menu set bg2 = '$nama_file2' 
                where id_menu = '$_POST[id_menu]'
                ");
                move_uploaded_file($_FILES["image_link2"]["tmp_name"],"bg/".$nama_file2);	
                
                }
                









                
$maxDimW = 1500;
$maxDimH = 3000;
list($width, $height, $type, $attr) = getimagesize( $_FILES['image_link']['tmp_name'] );
if ( $width > $maxDimW || $height > $maxDimH ) {
    $target_filename = $_FILES['image_link']['tmp_name'];
    $fn = $_FILES['image_link']['tmp_name'];
    $size = getimagesize( $fn );
    $ratio = $size[0]/$size[1]; // width/height
    //if( $ratio > 1) {
        $width = $maxDimW;
        $height = ($maxDimW / $size[0]) * $size[1];
    // } else {
    //     $width = $maxDimW*$ratio;
    //     $height = $maxDimH;
    // }
    $src = imagecreatefromstring(file_get_contents($fn));
    $dst = imagecreatetruecolor( $width, $height );
    imagecopyresampled($dst, $src, 0, 0, 0, 0, $width, $height, $size[0], $size[1] );

    imagejpeg($dst, $target_filename); // adjust format as needed


}

date_default_timezone_set('Asia/Jakarta');
$tanggal3 = date('YmdHis');


$namaa = $_FILES['image_link']['name'];



if(empty($namaa)){

}else{
    $nama_file = $tanggal3.$_FILES['image_link']['name'];
    mysqli_query($koneksi,"update tb_menu set bg = '$nama_file' 
where id_menu = '$_POST[id_menu]'
");
move_uploaded_file($_FILES["image_link"]["tmp_name"],"bg/".$nama_file);	

}

?>
<script>
    location = "https://ufe-section-indonesie.org/ufeapp/admin/?p=background";
//alert(<?php echo $_POST['id_bg'] ?>);
    </script>
<?php

            }
            ?>        
			<form method="POST"   enctype="multipart/form-data" >
            <div class="modal-body" style="height:50vh;overflow-y:scroll;">
            <input name="id_menu" value="<?php echo $og2['id_menu'] ?>" type="hidden" />
         <div class="row">
             <fieldset style="width:100%;text-align:center;">
            <img id="gamber<?php echo $og2['id_menu'] ?>" src="bg/<?php echo $og2['bg'] ?>" style="width:100%;max-width:150px;" /><br>
            <input type="file" onchange="readpp<?php echo $og2['id_menu'] ?>(this);" name="image_link" class="form-control" />
        </fieldset>

            <br>
        <fieldset style="width:100%;text-align:center;">
            <img id="gamberr<?php echo $og2['id_menu'] ?>" src="bg/<?php echo $og2['bg2'] ?>" style="width:100%;max-width:150px;" /><br>
            <input type="file" onchange="readppp<?php echo $og2['id_menu'] ?>(this);" name="image_link2" class="form-control" />
        </fieldset>
        </div>
            
        
        </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" name="editbgdemar" class="btn btn-primary">Save Changes</button>
            </div>
			</form>
          </div>
        </div>
      </div>			
				



      <script>
  function readpp<?php echo $og2['id_menu'] ?>(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $("#gamber<?php echo $og2['id_menu'] ?>")
                .attr('src', e.target.result)
                .width(150);
        };

        reader.readAsDataURL(input.files[0]);
    }
		
  }

  function readppp<?php echo $og2['id_menu'] ?>(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $("#gamberr<?php echo $og2['id_menu'] ?>")
                .attr('src', e.target.result)
                .width(150);
        };

        reader.readAsDataURL(input.files[0]);
    }
		
  }
</script>	 









<?php
$nimm++;}

?>



                                         
                                              </tbody>
      </table>
  </div>
</div>
   </div>
</div>


<?php }else if($_GET['p'] == "tulisan"){ ?>

  <div class="card shadow-sm border-bottom-primary">
    <div class="card-header bg-white py-3">
        <div class="row">
          
		<div class="col">
           <ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item"><a href="?p=tb_dm_1">Home</a></li>
		
              <li class="breadcrumb-item active">Tulisan</li>
                            </ol>
			
			
			<!--
<center>
			<fieldset style="background-color:grey;width:90%;max-width:500px;align:center;">
			tessss
			</fieldset>
		</center>	
			-->
			</div>
    </div>


			
			
					
						
						
                                           
                   <?php 
                   include ('../db.php');
                   $kj = mysqli_query($koneksi,"select * from tb_tulisan order by id_tulisan asc");


                   ?>                            
    
    <div class="table-responsive" style="padding:5px;">
        <table class="table table-striped w-100 dt-responsive nowrap" id="dataTable">
            <thead>
                <tr>
                    <th>No. </th>
                    <th>Jenis</th>
                    
                  
                    <th>Opsi</th>
                </tr>
            </thead>
            <tbody>
			
			     <tr>
                            <td>1</td>
                            <td>Home</td>
                            
							<td>
                                <a href="?p=home" class="btn btn-primary btn-circle btn-sm">Lebih lanjut
                                &nbsp;&nbsp;&nbsp;
                                <i class="fa fa-edit"></i></a>
                            </td>
                        </tr
                        >
			
            <?php 
            $no = 2;
            while($kj2 = mysqli_fetch_array($kj)){
            $idd = $kj2['id_tulisan'];
            ?>

			                                        <tr>
                            <td><?php echo $no; ?></td>
                            <td><?php echo $kj2['jenis'] ?></td>
                            
                            
							<td>


                               
                                <a href="?p=edit_tulisan&id=<?php echo $idd ?>" class="btn btn-primary btn-circle btn-sm">Lebih lanjut
                                &nbsp;&nbsp;&nbsp;
                                <i class="fa fa-edit"></i></a>
								
								
								
								


                            </td>
                        </tr
                        >
						
						
			 		
						
						
             <?php $no++;} ?>          
						
						
                                           
                                                </tbody>
        </table>
    </div>
</div>
	 </div>
</div>

<?php }else if($_GET['p'] == "edit_tulisan"){ ?>

 <div class="card shadow-sm border-bottom-primary">
    <div class="card-header bg-white py-3">
        <div class="row">
            <div class="col">

<?php 
include('../db.php');
$oi = mysqli_query($koneksi,"select * from tb_tulisan where id_tulisan = '$_GET[id]'");
$oi2 = mysqli_fetch_array($oi);
?>
<ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item"><a href="?p=tb_dm_1">Home</a></li>
			<li class="breadcrumb-item"><a href="?p=tulisan">Tulisan</a></li>
                            
              <li class="breadcrumb-item active"><?php echo $oi2['jenis'] ?></li>
                            </ol>
<!--                <h4 class="h5 align-middle m-0 font-weight-bold text-primary">
                    <?php //echo //$oi2['jenis'] ?>                </h4>-->
            </div>



			
			
	
						
						
                                           
                  
                  
    </div>
		<table style="width:100%;margin-top:20px;">
		<?php
		$rg = mysqli_query($koneksi,"select * from tb_tulisan where id_tulisan = '$oi2[id_tulisan]'");
$rg2 = mysqli_fetch_array($rg);
		?>
		<tr>
		<?php if($rg2['tulisan1'] == null){}else{ ?>
		<td>
		1.
		</td>
		<td>
        <?php 
        $tulisan11 = str_replace("&petiksatu&","'",$rg2['tulisan1']);
        ?>

		<?php echo $tulisan11 ?>
		</td>
		<td>
		<span class="btn btn-primary" data-toggle="modal" data-target="#edittulisan1" style="cursor:pointer;">
		<i class="far fa-edit"></i>&nbsp;&nbsp;Edit
		</span>
		</td>




			 <div class="modal fade" id="edittulisan1">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Edit Tulisan</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
           			

			<form method="POST" action="edittulisann.php"  enctype="multipart/form-data" >
            <div class="modal-body" style="height:70vh;overflow:scroll;">
	    <input name="tulisan" value="tulisan1" type="hidden" />
		<input name="id_tulisan" value="<?php echo $rg2['id_tulisan'] ?>" type="hidden" />
                <textarea class="form-control" name="tulisan1" 
                placeholder="Place some text here"
                          style="width: 100%; height: 200px; 
                          font-size: 14px; line-height: 18px; border: 1px solid #dddddd; 
                          padding: 10px;" required><?php echo $tulisan11 ?></textarea>
     	
			</div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" name="tambahproduk2" class="btn btn-primary">Save</button>
            </div>
			</form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>			
						
				

		<?php } ?>
		</tr>
		<tr>
		<?php if($rg2['tulisan2'] == null){}else{ ?>
		<td>
		2.
		</td>
		<td>
		<?php echo $rg2['tulisan2'] ?>
		</td>
		<td>
		<span class="btn btn-primary" data-toggle="modal" data-target="#edittulisan2" style="cursor:pointer;">
		<i class="far fa-edit"></i>&nbsp;&nbsp;Edit
		</span>
		</td>




			 <div class="modal fade" id="edittulisan2">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Edit Tulisan</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
           			

			<form method="POST" action="edittulisann.php"  enctype="multipart/form-data" >
            <div class="modal-body" style="height:70vh;overflow:scroll;">
	    <input name="tulisan" value="tulisan2" type="hidden" />
		<input name="id_tulisan" value="<?php echo $rg2['id_tulisan'] ?>" type="hidden" />
                <textarea class="form-control" name="tulisan1" placeholder="Place some text here"
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" required><?php echo $rg2['tulisan2'] ?></textarea>
     	
			</div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" name="tambahproduk2" class="btn btn-primary">Save</button>
            </div>
			</form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>			
						
				

		<?php } ?>
		</tr>
		<tr>
		<?php if($rg2['tulisan3'] == null){}else{ ?>
		<td>
		3.
		</td>
		<td>
		<?php echo $rg2['tulisan3'] ?>
		</td>
		<td>
		<span class="btn btn-primary" data-toggle="modal" data-target="#edittulisan3" style="cursor:pointer;">
		<i class="far fa-edit"></i>&nbsp;&nbsp;Edit
		</span>
		</td>




			 <div class="modal fade" id="edittulisan3">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Edit Tulisan</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
           			

			<form method="POST" action="edittulisann.php"  enctype="multipart/form-data" >
            <div class="modal-body" style="height:70vh;overflow:scroll;">
	    <input name="tulisan" value="tulisan3" type="hidden" />
		<input name="id_tulisan" value="<?php echo $rg2['id_tulisan'] ?>" type="hidden" />
                <textarea class="form-control" name="tulisan1" placeholder="Place some text here"
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" required><?php echo $rg2['tulisan3'] ?></textarea>
     	
			</div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" name="tambahproduk2" class="btn btn-primary">Save</button>
            </div>
			</form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>			
						
				

		<?php } ?>
		</tr>
		<tr>
		<?php if($rg2['tulisan4'] == null){}else{ ?>
		<td>
		4.
		</td>
		<td>
		<?php echo $rg2['tulisan4'] ?>
		</td>
		<td>
		<span class="btn btn-primary" data-toggle="modal" data-target="#edittulisan4" style="cursor:pointer;">
		<i class="far fa-edit"></i>&nbsp;&nbsp;Edit
		</span>
		</td>




			 <div class="modal fade" id="edittulisan4">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Edit Tulisan</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
           			

			<form method="POST" action="edittulisann.php"  enctype="multipart/form-data" >
            <div class="modal-body" style="height:70vh;overflow:scroll;">
	    <input name="tulisan" value="tulisan4" type="hidden" />
		<input name="id_tulisan" value="<?php echo $rg2['id_tulisan'] ?>" type="hidden" />
                <textarea class="form-control" name="tulisan1" placeholder="Place some text here"
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" required><?php echo $rg2['tulisan4'] ?></textarea>
     	
			</div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" name="tambahproduk2" class="btn btn-primary">Save</button>
            </div>
			</form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>			
						
				

		<?php } ?>
		</tr>
		<tr>
		<?php if($rg2['tulisan5'] == null){}else{ ?>
		<td>
		5.
		</td>
		<td>
		<?php echo $rg2['tulisan5'] ?>
		</td>
		<td>
		<span class="btn btn-primary" data-toggle="modal" data-target="#edittulisan5" style="cursor:pointer;">
		<i class="far fa-edit"></i>&nbsp;&nbsp;Edit
		</span>
		</td>




			 <div class="modal fade" id="edittulisan5">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Edit Tulisan</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
           			

			<form method="POST" action="edittulisann.php"  enctype="multipart/form-data" >
            <div class="modal-body" style="height:70vh;overflow:scroll;">
	    <input name="tulisan" value="tulisan5" type="hidden" />
		<input name="id_tulisan" value="<?php echo $rg2['id_tulisan'] ?>" type="hidden" />
                <textarea class="form-control" name="tulisan1" placeholder="Place some text here"
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" required><?php echo $rg2['tulisan5'] ?></textarea>
     	
			</div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" name="tambahproduk2" class="btn btn-primary">Save</button>
            </div>
			</form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>			
						
				

		<?php } ?>
		</tr>
		<tr>
		<?php if($rg2['tulisan6'] == null){}else{ ?>
		<td>
		6.
		</td>
		<td>
		<?php echo $rg2['tulisan6'] ?>
		</td>
		<td>
		<span class="btn btn-primary" data-toggle="modal" data-target="#edittulisan6" style="cursor:pointer;">
		<i class="far fa-edit"></i>&nbsp;&nbsp;Edit
		</span>
		</td>




			 <div class="modal fade" id="edittulisan6">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Edit Tulisan</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
           			

			<form method="POST" action="edittulisann.php"  enctype="multipart/form-data" >
            <div class="modal-body" style="height:70vh;overflow:scroll;">
	    <input name="tulisan" value="tulisan6" type="hidden" />
		<input name="id_tulisan" value="<?php echo $rg2['id_tulisan'] ?>" type="hidden" />
                <textarea class="form-control" name="tulisan1" placeholder="Place some text here"
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" required><?php echo $rg2['tulisan6'] ?></textarea>
     	
			</div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" name="tambahproduk2" class="btn btn-primary">Save</button>
            </div>
			</form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>			
						
				

		<?php } ?>
		</tr>
		<tr>
		<?php if($rg2['tulisan7'] == null){}else{ ?>
		<td>
		7.
		</td>
		<td>
		<?php echo $rg2['tulisan7'] ?>
		</td>
		<td>
		<span class="btn btn-primary" data-toggle="modal" data-target="#edittulisan7" style="cursor:pointer;">
		<i class="far fa-edit"></i>&nbsp;&nbsp;Edit
		</span>
		</td>




			 <div class="modal fade" id="edittulisan7">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Edit Tulisan</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
           			

			<form method="POST" action="edittulisann.php"  enctype="multipart/form-data" >
            <div class="modal-body" style="height:70vh;overflow:scroll;">
	    <input name="tulisan" value="tulisan7" type="hidden" />
		<input name="id_tulisan" value="<?php echo $rg2['id_tulisan'] ?>" type="hidden" />
                <textarea class="form-control" name="tulisan1" placeholder="Place some text here"
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" required><?php echo $rg2['tulisan7'] ?></textarea>
     	
			</div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" name="tambahproduk2" class="btn btn-primary">Save</button>
            </div>
			</form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>			
						
				

		<?php } ?>
		</tr>
		<tr>
		<?php if($rg2['tulisan8'] == null){}else{ ?>
		<td>
		8.
		</td>
		<td>
		<?php echo $rg2['tulisan8'] ?>
		</td>
		<td>
		<span class="btn btn-primary" data-toggle="modal" data-target="#edittulisan8" style="cursor:pointer;">
		<i class="far fa-edit"></i>&nbsp;&nbsp;Edit
		</span>
		</td>




			 <div class="modal fade" id="edittulisan8">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Edit Tulisan</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
           			

			<form method="POST" action="edittulisann.php"  enctype="multipart/form-data" >
            <div class="modal-body" style="height:70vh;overflow:scroll;">
	    <input name="tulisan" value="tulisan8" type="hidden" />
		<input name="id_tulisan" value="<?php echo $rg2['id_tulisan'] ?>" type="hidden" />
                <textarea class="form-control" name="tulisan1" placeholder="Place some text here"
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" required><?php echo $rg2['tulisan8'] ?></textarea>
     	
			</div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" name="tambahproduk2" class="btn btn-primary">Save</button>
            </div>
			</form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>			
						
				

		<?php } ?>
		</tr>
		<tr>
		<?php if($rg2['tulisan9'] == null){}else{ ?>
		<td>
		9.
		</td>
		<td>
		<?php echo $rg2['tulisan9'] ?>
		</td>
		<td>
		<span class="btn btn-primary" data-toggle="modal" data-target="#edittulisan9" style="cursor:pointer;">
		<i class="far fa-edit"></i>&nbsp;&nbsp;Edit
		</span>
		</td>




			 <div class="modal fade" id="edittulisan9">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Edit Tulisan</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
           			

			<form method="POST" action="edittulisann.php"  enctype="multipart/form-data" >
            <div class="modal-body" style="height:70vh;overflow:scroll;">
	    <input name="tulisan" value="tulisan9" type="hidden" />
		<input name="id_tulisan" value="<?php echo $rg2['id_tulisan'] ?>" type="hidden" />
                <textarea class="form-control" name="tulisan1" placeholder="Place some text here"
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" required><?php echo $rg2['tulisan9'] ?></textarea>
     	
			</div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" name="tambahproduk2" class="btn btn-primary">Save</button>
            </div>
			</form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>			
						
				

		<?php } ?>
		</tr>
		<tr>
		<?php if($rg2['tulisan10'] == null){}else{ ?>
		<td>
		10.
		</td>
		<td>
		<?php echo $rg2['tulisan10'] ?>
		</td>
		<td>
		<span class="btn btn-primary" data-toggle="modal" data-target="#edittulisan10" style="cursor:pointer;">
		<i class="far fa-edit"></i>&nbsp;&nbsp;Edit
		</span>
		</td>




			 <div class="modal fade" id="edittulisan10">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Edit Tulisan</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
           			

			<form method="POST" action="edittulisann.php"  enctype="multipart/form-data" >
            <div class="modal-body" style="height:70vh;overflow:scroll;">
	    <input name="tulisan" value="tulisan10" type="hidden" />
		<input name="id_tulisan" value="<?php echo $rg2['id_tulisan'] ?>" type="hidden" />
                <textarea class="form-control" name="tulisan1" placeholder="Place some text here"
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" required><?php echo $rg2['tulisan10'] ?></textarea>
     	
			</div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" name="tambahproduk2" class="btn btn-primary">Save</button>
            </div>
			</form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>			
						
				

		<?php } ?>
		</tr>
		<tr>
		<?php if($rg2['tulisan11'] == null){}else{ ?>
		<td>
		11.
		</td>
		<td>
		<?php echo $rg2['tulisan11'] ?>
		</td>
		<td>
		<span class="btn btn-primary" data-toggle="modal" data-target="#edittulisan11" style="cursor:pointer;">
		<i class="far fa-edit"></i>&nbsp;&nbsp;Edit
		</span>
		</td>




			 <div class="modal fade" id="edittulisan11">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Edit Tulisan</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
           			

			<form method="POST" action="edittulisann.php"  enctype="multipart/form-data" >
            <div class="modal-body" style="height:70vh;overflow:scroll;">
	    <input name="tulisan" value="tulisan11" type="hidden" />
		<input name="id_tulisan" value="<?php echo $rg2['id_tulisan'] ?>" type="hidden" />
                <textarea class="form-control" name="tulisan1" placeholder="Place some text here"
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" required><?php echo $rg2['tulisan11'] ?></textarea>
     	
			</div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" name="tambahproduk2" class="btn btn-primary">Save</button>
            </div>
			</form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>			
						
				

		<?php } ?>
		</tr>
		<tr>
		<?php if($rg2['tulisan12'] == null){}else{ ?>
		<td>
		12.
		</td>
		<td>
		<?php echo $rg2['tulisan12'] ?>
		</td>
		<td>
		<span class="btn btn-primary" data-toggle="modal" data-target="#edittulisan12" style="cursor:pointer;">
		<i class="far fa-edit"></i>&nbsp;&nbsp;Edit
		</span>
		</td>




			 <div class="modal fade" id="edittulisan12">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Edit Tulisan</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
           			

			<form method="POST" action="edittulisann.php"  enctype="multipart/form-data" >
            <div class="modal-body" style="height:70vh;overflow:scroll;">
	    <input name="tulisan" value="tulisan12" type="hidden" />
		<input name="id_tulisan" value="<?php echo $rg2['id_tulisan'] ?>" type="hidden" />
                <textarea class="form-control" name="tulisan1" placeholder="Place some text here"
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" required><?php echo $rg2['tulisan12'] ?></textarea>
     	
			</div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" name="tambahproduk2" class="btn btn-primary">Save</button>
            </div>
			</form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>			
						
				

		<?php } ?>
		</tr>
		<tr>
		<?php if($rg2['tulisan13'] == null){}else{ ?>
		<td>
		13.
		</td>
		<td>
		<?php echo $rg2['tulisan13'] ?>
		</td>
		<td>
		<span class="btn btn-primary" data-toggle="modal" data-target="#edittulisan13" style="cursor:pointer;">
		<i class="far fa-edit"></i>&nbsp;&nbsp;Edit
		</span>
		</td>




			 <div class="modal fade" id="edittulisan13">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Edit Tulisan</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
           			

			<form method="POST" action="edittulisann.php"  enctype="multipart/form-data" >
            <div class="modal-body" style="height:70vh;overflow:scroll;">
	    <input name="tulisan" value="tulisan13" type="hidden" />
		<input name="id_tulisan" value="<?php echo $rg2['id_tulisan'] ?>" type="hidden" />
                <textarea class="form-control" name="tulisan1" placeholder="Place some text here"
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" required><?php echo $rg2['tulisan13'] ?></textarea>
     	
			</div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" name="tambahproduk2" class="btn btn-primary">Save</button>
            </div>
			</form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>			
						
				

		<?php } ?>
		</tr>
		<tr>
		<?php if($rg2['tulisan14'] == null){}else{ ?>
		<td>
		14.
		</td>
		<td>
		<?php echo $rg2['tulisan14'] ?>
		</td>
		<td>
		<span class="btn btn-primary" data-toggle="modal" data-target="#edittulisan14" style="cursor:pointer;">
		<i class="far fa-edit"></i>&nbsp;&nbsp;Edit
		</span>
		</td>




			 <div class="modal fade" id="edittulisan14">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Edit Tulisan</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
           			

			<form method="POST" action="edittulisann.php"  enctype="multipart/form-data" >
            <div class="modal-body" style="height:70vh;overflow:scroll;">
	    <input name="tulisan" value="tulisan14" type="hidden" />
		<input name="id_tulisan" value="<?php echo $rg2['id_tulisan'] ?>" type="hidden" />
                <textarea class="form-control" name="tulisan1" placeholder="Place some text here"
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" required><?php echo $rg2['tulisan14'] ?></textarea>
     	
			</div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" name="tambahproduk2" class="btn btn-primary">Save</button>
            </div>
			</form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>			
						
				

		<?php } ?>
		</tr>
		<tr>
		<?php if($rg2['tulisan15'] == null){}else{ ?>
		<td>
		15.
		</td>
		<td>
		<?php echo $rg2['tulisan15'] ?>
		</td>
		<td>
		<span class="btn btn-primary" data-toggle="modal" data-target="#edittulisan15" style="cursor:pointer;">
		<i class="far fa-edit"></i>&nbsp;&nbsp;Edit
		</span>
		</td>




			 <div class="modal fade" id="edittulisan15">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Edit Tulisan</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
           			

			<form method="POST" action="edittulisann.php"  enctype="multipart/form-data" >
            <div class="modal-body" style="height:70vh;overflow:scroll;">
	    <input name="tulisan" value="tulisan15" type="hidden" />
		<input name="id_tulisan" value="<?php echo $rg2['id_tulisan'] ?>" type="hidden" />
                <textarea class="form-control" name="tulisan1" placeholder="Place some text here"
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" required><?php echo $rg2['tulisan15'] ?></textarea>
     	
			</div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" name="tambahproduk2" class="btn btn-primary">Save</button>
            </div>
			</form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>			
						
				

		<?php } ?>
		</tr>
		<tr>
		<?php if($rg2['tulisan16'] == null){}else{ ?>
		<td>
		16.
		</td>
		<td>
		<?php echo $rg2['tulisan16'] ?>
		</td>
		<td>
		<span class="btn btn-primary" data-toggle="modal" data-target="#edittulisan16" style="cursor:pointer;">
		<i class="far fa-edit"></i>&nbsp;&nbsp;Edit
		</span>
		</td>




			 <div class="modal fade" id="edittulisan16">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Edit Tulisan</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
           			

			<form method="POST" action="edittulisann.php"  enctype="multipart/form-data" >
            <div class="modal-body" style="height:70vh;overflow:scroll;">
	    <input name="tulisan" value="tulisan16" type="hidden" />
		<input name="id_tulisan" value="<?php echo $rg2['id_tulisan'] ?>" type="hidden" />
                <textarea class="form-control" name="tulisan1" placeholder="Place some text here"
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" required><?php echo $rg2['tulisan16'] ?></textarea>
     	
			</div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" name="tambahproduk2" class="btn btn-primary">Save</button>
            </div>
			</form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>			
						
				

		<?php } ?>
		</tr>
		<tr>
		<?php if($rg2['tulisan17'] == null){}else{ ?>
		<td>
		17.
		</td>
		<td>
		<?php echo $rg2['tulisan17'] ?>
		</td>
		<td>
		<span class="btn btn-primary" data-toggle="modal" data-target="#edittulisan17" style="cursor:pointer;">
		<i class="far fa-edit"></i>&nbsp;&nbsp;Edit
		</span>
		</td>




			 <div class="modal fade" id="edittulisan17">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Edit Tulisan</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
           			

			<form method="POST" action="edittulisann.php"  enctype="multipart/form-data" >
            <div class="modal-body" style="height:70vh;overflow:scroll;">
	    <input name="tulisan" value="tulisan17" type="hidden" />
		<input name="id_tulisan" value="<?php echo $rg2['id_tulisan'] ?>" type="hidden" />
                <textarea class="form-control" name="tulisan1" placeholder="Place some text here"
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" required><?php echo $rg2['tulisan17'] ?></textarea>
     	
			</div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" name="tambahproduk2" class="btn btn-primary">Save</button>
            </div>
			</form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>			
						
				

		<?php } ?>
		</tr>
		<tr>	
		<?php if($rg2['tulisan18'] == null){}else{ ?>
		<td>
		18.
		</td>
		<td>
		<?php echo $rg2['tulisan18'] ?>
		</td>
		<td>
		<span class="btn btn-primary" data-toggle="modal" data-target="#edittulisan18" style="cursor:pointer;">
		<i class="far fa-edit"></i>&nbsp;&nbsp;Edit
		</span>
		</td>




			 <div class="modal fade" id="edittulisan18">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Edit Tulisan</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
           			

			<form method="POST" action="edittulisann.php"  enctype="multipart/form-data" >
            <div class="modal-body" style="height:70vh;overflow:scroll;">
	    <input name="tulisan" value="tulisan18" type="hidden" />
		<input name="id_tulisan" value="<?php echo $rg2['id_tulisan'] ?>" type="hidden" />
                <textarea class="form-control" name="tulisan1" placeholder="Place some text here"
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" required><?php echo $rg2['tulisan18'] ?></textarea>
     	
			</div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" name="tambahproduk2" class="btn btn-primary">Save</button>
            </div>
			</form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>			
						
				

		<?php } ?>
		</tr>
		<tr>
		<?php if($rg2['tulisan19'] == null){}else{ ?>
		<td>
		19.
		</td>
		<td>
		<?php echo $rg2['tulisan19'] ?>
		</td>
		<td>
		<span class="btn btn-primary" data-toggle="modal" data-target="#edittulisan19" style="cursor:pointer;">
		<i class="far fa-edit"></i>&nbsp;&nbsp;Edit
		</span>
		</td>




			 <div class="modal fade" id="edittulisan19">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Edit Tulisan</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
           			

			<form method="POST" action="edittulisann.php"  enctype="multipart/form-data" >
            <div class="modal-body" style="height:70vh;overflow:scroll;">
	    <input name="tulisan" value="tulisan19" type="hidden" />
		<input name="id_tulisan" value="<?php echo $rg2['id_tulisan'] ?>" type="hidden" />
                <textarea class="form-control" name="tulisan1" placeholder="Place some text here"
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" required><?php echo $rg2['tulisan19'] ?></textarea>
     	
			</div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" name="tambahproduk2" class="btn btn-primary">Save</button>
            </div>
			</form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>			
						
				

		<?php } ?>
		</tr>
		<tr>
		<?php if($rg2['tulisan20'] == null){}else{ ?>
		<td>
		20.
		</td>
		<td>
		<?php echo $rg2['tulisan20'] ?>
		</td>
		<td>
		<span class="btn btn-primary" data-toggle="modal" data-target="#edittulisan20" style="cursor:pointer;">
		<i class="far fa-edit"></i>&nbsp;&nbsp;Edit
		</span>
		</td>




			 <div class="modal fade" id="edittulisan20">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Edit Tulisan</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
           			

			<form method="POST" action="edittulisann.php"  enctype="multipart/form-data" >
            <div class="modal-body" style="height:70vh;overflow:scroll;">
	    <input name="tulisan" value="tulisan20" type="hidden" />
		<input name="id_tulisan" value="<?php echo $rg2['id_tulisan'] ?>" type="hidden" />
                <textarea class="form-control" name="tulisan1" placeholder="Place some text here"
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" required><?php echo $rg2['tulisan20'] ?></textarea>
     	
			</div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" name="tambahproduk2" class="btn btn-primary">Save</button>
            </div>
			</form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>			
						
				

		<?php } ?>
		</tr>
		<tr>
		<?php if($rg2['tulisan21'] == null){}else{ ?>
		<td>
		21.
		</td>
		<td>
		<?php echo $rg2['tulisan21'] ?>
		</td>
		<td>
		<span class="btn btn-primary" data-toggle="modal" data-target="#edittulisan21" style="cursor:pointer;">
		<i class="far fa-edit"></i>&nbsp;&nbsp;Edit
		</span>
		</td>




			 <div class="modal fade" id="edittulisan21">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Edit Tulisan</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
           			

			<form method="POST" action="edittulisann.php"  enctype="multipart/form-data" >
            <div class="modal-body" style="height:70vh;overflow:scroll;">
	    <input name="tulisan" value="tulisan21" type="hidden" />
		<input name="id_tulisan" value="<?php echo $rg2['id_tulisan'] ?>" type="hidden" />
                <textarea class="form-control" name="tulisan1" placeholder="Place some text here"
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" required><?php echo $rg2['tulisan21'] ?></textarea>
     	
			</div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" name="tambahproduk2" class="btn btn-primary">Save</button>
            </div>
			</form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>			
						
				

		<?php } ?>
		</tr>
		<tr>
		<?php if($rg2['tulisan22'] == null){}else{ ?>
		<td>
		22.
		</td>
		<td>
		<?php echo $rg2['tulisan22'] ?>
		</td>
		<td>
		<span class="btn btn-primary" data-toggle="modal" data-target="#edittulisan22" style="cursor:pointer;">
		<i class="far fa-edit"></i>&nbsp;&nbsp;Edit
		</span>
		</td>




			 <div class="modal fade" id="edittulisan22">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Edit Tulisan</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
           			

			<form method="POST" action="edittulisann.php"  enctype="multipart/form-data" >
            <div class="modal-body" style="height:70vh;overflow:scroll;">
	    <input name="tulisan" value="tulisan22" type="hidden" />
		<input name="id_tulisan" value="<?php echo $rg2['id_tulisan'] ?>" type="hidden" />
                <textarea class="form-control" name="tulisan1" placeholder="Place some text here"
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" required><?php echo $rg2['tulisan22'] ?></textarea>
     	
			</div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" name="tambahproduk2" class="btn btn-primary">Save</button>
            </div>
			</form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>			
						
				

		<?php } ?>
		
		
		</tr>
</table>		
</div>
	 </div>


<?php }else if($_GET['p'] == "data_presiden"){ ?>

 <div class="card shadow-sm border-bottom-primary">
    <div class="card-header bg-white py-3">
        <div class="row">
            <div class="col">
<?php 
include('../db.php');
$qw = mysqli_query($koneksi,"select * from tb_menu where id_menu = '$_GET[id]'");
$qw2 = mysqli_fetch_array($qw);
?>


                  <ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item"><a href="?p=tb_dm_1">Home</a></li>
		
              <li class="breadcrumb-item active">Data Presiden</li>
                            </ol>
            </div>


      <div class="col-auto">
                <a href="" data-toggle="modal" data-target="#modaltambah" class="btn btn-sm btn-primary btn-icon-split">
                    <span class="icon">
                        <i class="fa fa-plus"></i>
                    </span>
                    <span class="text">

                       1. Tambah Data
                    </span>
                </a>
            </div>
			
			
			 <div class="modal fade" id="modaltambah">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Tambah Data (<?php echo $qw2['nama_menu'] ?>)</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
           			
<?php 
if(isset($_POST['tambahproduk2'])){
if(($_POST['nama'])){

include('../db.php');






$maxDimW = 1000;
$maxDimH = 500;
list($width, $height, $type, $attr) = getimagesize( $_FILES['image_link']['tmp_name'] );
if ( $width > $maxDimW || $height > $maxDimH ) {
    $target_filename = $_FILES['image_link']['tmp_name'];
    $fn = $_FILES['image_link']['tmp_name'];
    $size = getimagesize( $fn );
    $ratio = $size[0]/$size[1]; // width/height
    //if( $ratio > 1) {
        $width = $maxDimW;
        $height = ($maxDimW / $size[0]) * $size[1];
    // } else {
    //     $width = $maxDimW*$ratio;
    //     $height = $maxDimH;
    // }
    $src = imagecreatefromstring(file_get_contents($fn));
    $dst = imagecreatetruecolor( $width, $height );
    imagecopyresampled($dst, $src, 0, 0, 0, 0, $width, $height, $size[0], $size[1] );

    imagejpeg($dst, $target_filename); // adjust format as needed


}

$namaa = $_FILES['image_link']['name'];


 
if($namaa == null){
mysqli_query($koneksi,"insert into tb_president (nama,deskripsi) values
('$_POST[nama]','$_POST[long_deskripsi]')
");
}else{
	
move_uploaded_file($_FILES['image_link']['tmp_name'],"../images/menu/".$_FILES['image_link']['name']);
mysqli_query($koneksi,"insert into tb_president (gambar,nama,deskripsi) values
('$namaa','$_POST[nama]','$_POST[long_deskripsi]')
");	
}
?>
<script>
alert('Data berhasil ditambahkan<?php echo mysqli_error($koneksi); ?>');
location = "?p=data_presiden";
</script>



<?php }else{
?>
<script>
alert("gagal");
</script>
<?php
}

}//else{
  ?>
<!-- <script>
alert("gagal");
</script> -->
  <?php
//}


?>

			<form method="POST" enctype="multipart/form-data" >
            <div class="modal-body" style="height:70vh;overflow:scroll;">
						
			 <input onchange="readURLe(this);" type="file" name="image_link" class="form-control" />
			</a><br>
			<center>
			<i><font style="font-size:10px;">* mode kamera landscape
			</font></i><br><img src="" id="product_imagee" style="width:1px;height:1px;" name="product_imagee" class="img-thumbnail">
			</center>
							  <script>
  function readURLe(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#product_imagee')
                .attr('src', e.target.result)
                .width(100)
				.height(100);
        };

        reader.readAsDataURL(input.files[0]);
    }
		
  }
</script>	 
	
             <div class="input-group mb-3" style="margin-top:10px;">
                  <div class="input-group-prepend">
                    <span class="input-group-text" style="width:120px;">Periode</span>
                  </div>

                  <input type="hidden" name="idc2" value="<?php echo $_GET['id'] ?>" />
                				  
				  
				  <input type="hidden" name="unik" value="578866556602c6b54236d7.png" />
                
                  <input type="text" name="nama" value="" class="form-control" placeholder="Nama" required>
                </div>

          

				<!-- <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" style="width:120px;">Kategori</span>
                  </div>
				  <select name="kategori" class="form-control" required>
                  <option value="" >- kategori -</option>
				  					<option value="19" >Layanan Service</option>
										<option value="21" >Rental Mesin Fotocopy</option>
										<option value="23" >Jual Mesin Fotocopy</option>
										<option value="25" >Spare part</option>
					                </select>
				</div>
            <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" style="width:120px;">Harga</span>
                  </div>
                  <input type="number" name="harga" value="" class="form-control" placeholder="harga" required>
                </div>
				<div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" style="width:120px;">Short Desc</span>
                  </div>
                  <input type="text" name="short" value="" class="form-control" placeholder="Short Desc" required>
                </div>
				
				
				   -->
        <div>Deskripsi</div>        
                <textarea class="form-control" name="long_deskripsi" placeholder="Place some text here"
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" required></textarea>
             
             
             <!--             <div style="margin-top:15px">Long Desc</div>        
                <textarea class="form-control" name="long_deskripsi" placeholder="Place some text here"
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" ></textarea>
             -->
          
				
				
				
				
				
			</div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" name="tambahproduk2" class="btn btn-primary">Add</button>
            </div>
			</form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>			
						
						
                                           
                   <?php 
                   include ('../db.php');
                   $kj = mysqli_query($koneksi,"select * from tb_president order by id_presiden asc");


                   ?>                            
     <?php 
if(isset($_POST['update_presiden'])){

    
if(($_POST['nama']) ){





$maxDimW = 945;
$maxDimH = 1383;
list($width, $height, $type, $attr) = getimagesize( $_FILES['image_link']['tmp_name'] );
if ( $width > $maxDimW || $height > $maxDimH ) {
    $target_filename = $_FILES['image_link']['tmp_name'];
    $fn = $_FILES['image_link']['tmp_name'];
    $size = getimagesize( $fn );
    $ratio = $size[0]/$size[1]; // width/height
    //if( $ratio > 1) {
        $width = $maxDimW;
        $height = ($maxDimW / $size[0]) * $size[1];
    // } else {
    //     $width = $maxDimW*$ratio;
    //     $height = $maxDimH;
    // }
    $src = imagecreatefromstring(file_get_contents($fn));
    $dst = imagecreatetruecolor( $width, $height );
    imagecopyresampled($dst, $src, 0, 0, 0, 0, $width, $height, $size[0], $size[1] );

    imagejpeg($dst, $target_filename); // adjust format as needed


}

$namaa = $_FILES['image_link']['name'];


$longde = str_replace("'","\'",$_POST['long_deskripsi']);


    if($_FILES['image_link']['name'] == null){
mysqli_query($koneksi,"update tb_president set nama = '$_POST[nama]',
deskripsi = '$longde'
where id_presiden = '$_POST[idc]'
");
	}else{
move_uploaded_file($_FILES['image_link']['tmp_name'],"../images/menu/".$_FILES['image_link']['name']);

mysqli_query($koneksi,"update tb_president set nama = '$_POST[nama]',
gambar = '$namaa',
deskripsi = '$longde'
where id_presiden = '$_POST[idc]'
");		
		
	}


if($_FILES['image_link']['name'] == null){

?>

<script>
alert("Data berhasil di ubah <?php echo mysqli_error($koneksi); ?>");
location = "?p=data_presiden";

</script>

<?php }else{ ?>

<script>
alert("Data berhasil di ubah <?php echo mysqli_error($koneksi); ?>");
location = "?p=data_presiden";

</script>


<?php } ?>

<?php 
 } 
}
 ?>
    <div class="table-responsive" style="padding:5px;">
        <table class="table table-striped w-100 dt-responsive nowrap" id="dataTable">
            <thead>
                <tr>
                    <th>No. </th>
                    <th>Gambar</th>
                    <th>Periode</th>

                  <th>Deskripsi</th>
                  
                    <th>Opsi</th>
                </tr>
            </thead>
            <tbody>
            <?php 
            $no = 1;
            while($kj2 = mysqli_fetch_array($kj)){
            $idd = $kj2['id_presiden'];
            ?>

			                                        <tr>
                            <td><?php echo $no; ?></td>
                            <td><img style="width:100px;" src="https://ufe-section-indonesie.org/ufeapp/images/menu/<?php echo $kj2['gambar'] ?>" /></td>
                            <td><?php echo $kj2['nama'] ?></td>
                 
							                            <td><?php echo substr($kj2['deskripsi'],0,100); ?></td>
                            
							<td>


                                <a data-toggle="modal" data-target="#modal-lg_<?php echo $idd ?>" href="" class="btn btn-warning btn-circle btn-sm"><i class="fa fa-edit"></i></a>

                                <!--<a href="?p=rincian2&id=<?php echo $idd ?>" class="btn btn-primary btn-circle btn-sm">Lebih lanjut
                                &nbsp;&nbsp;&nbsp;
                                <i class="fa fa-edit"></i></a>-->
								
								
								
								 <a href="hapustbpresiden.php?id=<?php echo $idd ?>&idc=<?php echo $_GET['id'] ?>" class="btn btn-danger btn-circle btn-sm">Hapus
                                &nbsp;&nbsp;&nbsp;
                                <i class="fa fa-trash"></i></a>


                            </td>
                        </tr
                        >
						
						
			  <div class="modal fade" id="modal-lg_<?php echo $idd; ?>">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
<?php 
$rt = mysqli_query($koneksi,"select * from tb_president where id_presiden = '$idd'");
$rt2 = mysqli_fetch_array($rt);
?>

              <h4 class="modal-title">123. Edit <?php echo $rt2['judul2'] ?></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
						



			<form method="POST" enctype="multipart/form-data" >
            <div class="modal-body" style="overflow:scroll;height:70vh">

			
			
			
						
			<center>
							<img src="https://ufe-section-indonesie.org/ufeapp/images/menu/<?php echo $kj2['gambar'] ?>"  style="width:200px;" />
			</center> 
			
		<input onchange="readURL<?php echo $idd; ?>(this);" type="file" name="image_link" class="form-control"/>
			</a><br>
			<center>
			<i><font style="font-size:10px;">* mode kamera landscape
			</font></i><br><img src="" id="product_image<?php echo $idd; ?>" style="width:1px;height:1px;" name="product_image<?php echo $idd; ?>" class="img-thumbnail">
			</center>
							  <script>
  function readURL<?php echo $idd; ?>(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#product_image<?php echo $idd; ?>')
                .attr('src', e.target.result)
                .width(100)
				.height(100);
        };

        reader.readAsDataURL(input.files[0]);
    }
		
  }
</script>	
	
             <div class="input-group mb-3" style="margin-top:10px;">
                  <div class="input-group-prepend">
                    <span class="input-group-text" style="width:120px;">Periode</span>
                  </div>
				  
				  
				  <input type="hidden" name="unik" value="430992371602c6b5423c26.png" />
          <input type="hidden" name="idc2" value="<?php echo $_GET['id'] ?>" />
                  <input type="hidden" name="idc" value="<?php echo $idd ?>" />
                  <input type="text" name="nama" value="<?php echo $kj2['nama'] ?>" class="form-control" placeholder="Nama" required>
                </div>
				


                
				<!-- <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" style="width:120px;">Kategori</span>
                  </div>
				  <select name="kategori" class="form-control" required>
                  <option value="23" >Jual Mesin Fotocopy</option>
				  					<option value="19" >Layanan Service</option>
										<option value="21" >Rental Mesin Fotocopy</option>
										<option value="25" >Spare part</option>
					                </select>
				</div> -->
            <!-- <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" style="width:120px;">Harga</span>
                  </div>
                  <input type="number" name="harga" value="8000000" class="form-control" placeholder="harga" required>
                </div>
				<div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" style="width:120px;">Short Desc</span>
                  </div>
                  <input type="text" name="short" value="XploitSec-ID" class="form-control" placeholder="Short Desc" required>
                </div> -->
				
				
			
             
             <div style="margin-top:15px;">
                           Deskripsi
                </div>
                <!-- <textarea class="textarea" name="deskripsi" placeholder="Place some text here" -->
                <textarea class="form-control" name="long_deskripsi" placeholder="Place some text here"
              
                          ><?php echo $kj2['deskripsi'] ?></textarea>
             
             
				
				
				
				
				
			</div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" name="update_presiden" class="btn btn-primary">Save changes</button>
            </div>
			</form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>			
						
						
             <?php $no++;} ?>          
						
						
                                           
                                                </tbody>
        </table>
    </div>
</div>
	 </div>
</div>

<?php }else if($_GET['p'] == "info_member"){ ?>


 <div class="card shadow-sm border-bottom-primary">
    <div class="card-header bg-white py-3">
        <div class="row">
            <div class="col">
<?php 
include('../db.php');
$qw = mysqli_query($koneksi,"select * from tb_menu where id_menu = '$_GET[id]'");
$qw2 = mysqli_fetch_array($qw);
?>


        <ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item"><a href="?p=tb_dm_1">Home</a></li>
		
              <li class="breadcrumb-item active">Info Member</li>
                            </ol>
            </div>


      <!--<div class="col-auto">
                <a href="" data-toggle="modal" data-target="#modaltambah" class="btn btn-sm btn-primary btn-icon-split">
                    <span class="icon">
                        <i class="fa fa-plus"></i>
                    </span>
                    <span class="text">

                       1. Tambah Data
                    </span>
                </a>
            </div>
			-->
			
			 <div class="modal fade" id="modaltambah">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Tambah Data (<?php echo $qw2['nama_menu'] ?>)</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
           			
<?php 
if(isset($_POST['tambahproduk2'])){
if(($_POST['nama'])){

include('../db.php');






$maxDimW = 1000;
$maxDimH = 500;
list($width, $height, $type, $attr) = getimagesize( $_FILES['image_link']['tmp_name'] );
if ( $width > $maxDimW || $height > $maxDimH ) {
    $target_filename = $_FILES['image_link']['tmp_name'];
    $fn = $_FILES['image_link']['tmp_name'];
    $size = getimagesize( $fn );
    $ratio = $size[0]/$size[1]; // width/height
    //if( $ratio > 1) {
        $width = $maxDimW;
        $height = ($maxDimW / $size[0]) * $size[1];
    // } else {
    //     $width = $maxDimW*$ratio;
    //     $height = $maxDimH;
    // }
    $src = imagecreatefromstring(file_get_contents($fn));
    $dst = imagecreatetruecolor( $width, $height );
    imagecopyresampled($dst, $src, 0, 0, 0, 0, $width, $height, $size[0], $size[1] );

    imagejpeg($dst, $target_filename); // adjust format as needed


}

$namaa = $_FILES['image_link']['name'];


 
if($namaa == null){
mysqli_query($koneksi,"insert into tb_president (nama,deskripsi) values
('$_POST[nama]','$_POST[long_deskripsi]')
");
}else{
	
move_uploaded_file($_FILES['image_link']['tmp_name'],"../images/menu/".$_FILES['image_link']['name']);
mysqli_query($koneksi,"insert into tb_president (gambar,nama,deskripsi) values
('$namaa','$_POST[nama]','$_POST[long_deskripsi]')
");	
}
?>
<script>
alert('Data berhasil ditambahkan<?php echo mysqli_error($koneksi); ?>');
location = "?p=data_presiden";
</script>



<?php }else{
?>
<script>
alert("gagal");
</script>
<?php
}

}//else{
  ?>
<!-- <script>
alert("gagal");
</script> -->
  <?php
//}


?>

			<form method="POST" enctype="multipart/form-data" >
            <div class="modal-body" style="height:70vh;overflow:scroll;">
						
			 <input onchange="readURLe(this);" type="file" name="image_link" class="form-control" />
			</a><br>
			<center>
			<i><font style="font-size:10px;">* mode kamera landscape
			</font></i><br><img src="" id="product_imagee" style="width:1px;height:1px;" name="product_imagee" class="img-thumbnail">
			</center>
							  <script>
  function readURLe(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#product_imagee')
                .attr('src', e.target.result)
                .width(100)
				.height(100);
        };

        reader.readAsDataURL(input.files[0]);
    }
		
  }
</script>	 
	
             <div class="input-group mb-3" style="margin-top:10px;">
                  <div class="input-group-prepend">
                    <span class="input-group-text" style="width:120px;">Judul</span>
                  </div>

                  <input type="hidden" name="idc2" value="<?php echo $_GET['id'] ?>" />
                				  
				  
				  <input type="hidden" name="unik" value="578866556602c6b54236d7.png" />
                
                  <input type="text" name="nama" value="" class="form-control" placeholder="Nama" required>
                </div>

          

				<!-- <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" style="width:120px;">Kategori</span>
                  </div>
				  <select name="kategori" class="form-control" required>
                  <option value="" >- kategori -</option>
				  					<option value="19" >Layanan Service</option>
										<option value="21" >Rental Mesin Fotocopy</option>
										<option value="23" >Jual Mesin Fotocopy</option>
										<option value="25" >Spare part</option>
					                </select>
				</div>
            <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" style="width:120px;">Harga</span>
                  </div>
                  <input type="number" name="harga" value="" class="form-control" placeholder="harga" required>
                </div>
				<div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" style="width:120px;">Short Desc</span>
                  </div>
                  <input type="text" name="short" value="" class="form-control" placeholder="Short Desc" required>
                </div>
				
				
				   -->
        <div>Deskripsi</div>        
                <textarea class="form-control" name="long_deskripsi" placeholder="Place some text here"
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" required></textarea>
             
             
             <!--             <div style="margin-top:15px">Long Desc</div>        
                <textarea class="form-control" name="long_deskripsi" placeholder="Place some text here"
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" ></textarea>
             -->
          
				
				
				
				
				
			</div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" name="tambahproduk2" class="btn btn-primary">Add</button>
            </div>
			</form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>			
						
						
                                           
                   <?php 
                   include ('../db.php');
                   $kj = mysqli_query($koneksi,"select * from info_member ");


                   ?>                            
     <?php 
if(isset($_POST['updatekategori'])){

    
if(($_POST['nama']) ){





$maxDimW = 1000;
$maxDimH = 500;
list($width, $height, $type, $attr) = getimagesize( $_FILES['image_link']['tmp_name'] );
if ( $width > $maxDimW || $height > $maxDimH ) {
    $target_filename = $_FILES['image_link']['tmp_name'];
    $fn = $_FILES['image_link']['tmp_name'];
    $size = getimagesize( $fn );
    $ratio = $size[0]/$size[1]; // width/height
    //if( $ratio > 1) {
        $width = $maxDimW;
        $height = ($maxDimW / $size[0]) * $size[1];
    // } else {
    //     $width = $maxDimW*$ratio;
    //     $height = $maxDimH;
    // }
    $src = imagecreatefromstring(file_get_contents($fn));
    $dst = imagecreatetruecolor( $width, $height );
    imagecopyresampled($dst, $src, 0, 0, 0, 0, $width, $height, $size[0], $size[1] );

    imagejpeg($dst, $target_filename); // adjust format as needed


}

$namaa = $_FILES['image_link']['name'];

move_uploaded_file($_FILES['image_link']['tmp_name'],"../images/menu/".$_FILES['image_link']['name']);

    if($_FILES['image_link']['name'] == null){
mysqli_query($koneksi,"update info_member set judul = '$_POST[nama]',
deskripsi = '$_POST[long_deskripsi]'
where id_info = '$_POST[idc]'
");
	}else{
		
mysqli_query($koneksi,"update info_member set judul = '$_POST[nama]',
gambar = '$namaa',
deskripsi = '$_POST[long_deskripsi]'
where id_info = '$_POST[idc]'
");		
		
	}


if($_FILES['image_link']['name'] == null){

?>

<script>
alert("Data berhasil di ubah <?php echo mysqli_error($koneksi); ?>");
location = "?p=info_member";

</script>

<?php }else{ ?>

<script>
alert("Data berhasil di ubah <?php echo mysqli_error($koneksi); ?>");
location = "?p=info_member";

</script>


<?php } ?>

<?php 
 } 
}
 ?>
    <div class="table-responsive" style="padding:5px;">
        <table class="table table-striped w-100 dt-responsive nowrap" id="dataTable">
            <thead>
                <tr>
                    <th>No. </th>
                    <th>Gambar</th>
                    <th>Judul</th>

                  <th>Deskripsi</th>
                  
                    <th>Opsi</th>
                </tr>
            </thead>
            <tbody>
            <?php 
            $no = 1;
            while($kj2 = mysqli_fetch_array($kj)){
            $idd = $kj2['id_info'];
            ?>

			                                        <tr>
                            <td><?php echo $no; ?></td>
                            <td><img style="width:100px;" src="https://ufe-section-indonesie.org/ufeapp/images/menu/<?php echo $kj2['gambar'] ?>" /></td>
                            <td><?php echo $kj2['judul'] ?></td>
                 
							                            <td><?php echo substr($kj2['deskripsi'],0,100); ?></td>
                            
							<td>


                                <a data-toggle="modal" data-target="#modal-lg_<?php echo $idd ?>" href="" class="btn btn-warning btn-circle btn-sm"><i class="fa fa-edit"></i></a>

                                <!--<a href="?p=rincian2&id=<?php echo $idd ?>" class="btn btn-primary btn-circle btn-sm">Lebih lanjut
                                &nbsp;&nbsp;&nbsp;
                                <i class="fa fa-edit"></i></a>-->
								
								
								
								<!-- <a href="hapustbpresiden.php?id=<?php echo $idd ?>&idc=<?php echo $_GET['id'] ?>" class="btn btn-danger btn-circle btn-sm">Hapus
                                &nbsp;&nbsp;&nbsp;
                                <i class="fa fa-trash"></i></a>
-->

                            </td>
                        </tr
                        >
						
						
			  <div class="modal fade" id="modal-lg_<?php echo $idd; ?>">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
<?php 
$rt = mysqli_query($koneksi,"select * from info_member where id_info = '$idd'");
$rt2 = mysqli_fetch_array($rt);
?>

              <h4 class="modal-title">1. Edit <?php echo $rt2['judul'] ?></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
						



			<form method="POST" enctype="multipart/form-data" >
            <div class="modal-body" style="overflow:scroll;height:70vh">

			
			
			
						
			<center>
							<img src="https://ufe-section-indonesie.org/ufeapp/images/menu/<?php echo $kj2['gambar'] ?>"  style="width:200px;" />
			</center> 
			
		<input onchange="readURL<?php echo $idd; ?>(this);" type="file" name="image_link" class="form-control"/>
			</a><br>
			<center>
			<i><font style="font-size:10px;">* mode kamera landscape
			</font></i><br><img src="" id="product_image<?php echo $idd; ?>" style="width:1px;height:1px;" name="product_image<?php echo $idd; ?>" class="img-thumbnail">
			</center>
							  <script>
  function readURL<?php echo $idd; ?>(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#product_image<?php echo $idd; ?>')
                .attr('src', e.target.result)
                .width(100)
				.height(100);
        };

        reader.readAsDataURL(input.files[0]);
    }
		
  }
</script>	
	
             <div class="input-group mb-3" style="margin-top:10px;">
                  <div class="input-group-prepend">
                    <span class="input-group-text" style="width:120px;">Periode</span>
                  </div>
				  
				  
				  <input type="hidden" name="unik" value="430992371602c6b5423c26.png" />
          <input type="hidden" name="idc2" value="<?php echo $_GET['id'] ?>" />
                  <input type="hidden" name="idc" value="<?php echo $idd ?>" />
                  <input type="text" name="nama" value="<?php echo $kj2['judul'] ?>" class="form-control" placeholder="Nama" required>
                </div>
				


                
				<!-- <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" style="width:120px;">Kategori</span>
                  </div>
				  <select name="kategori" class="form-control" required>
                  <option value="23" >Jual Mesin Fotocopy</option>
				  					<option value="19" >Layanan Service</option>
										<option value="21" >Rental Mesin Fotocopy</option>
										<option value="25" >Spare part</option>
					                </select>
				</div> -->
            <!-- <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" style="width:120px;">Harga</span>
                  </div>
                  <input type="number" name="harga" value="8000000" class="form-control" placeholder="harga" required>
                </div>
				<div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" style="width:120px;">Short Desc</span>
                  </div>
                  <input type="text" name="short" value="XploitSec-ID" class="form-control" placeholder="Short Desc" required>
                </div> -->
				
				
			
             
             <div style="margin-top:15px;">
                           Deskripsi
                </div>
                <!-- <textarea class="textarea" name="deskripsi" placeholder="Place some text here" -->
                <textarea class="form-control" name="long_deskripsi" placeholder="Place some text here"
              
                          ><?php echo $kj2['deskripsi'] ?></textarea>
             
             
				
				
				
				
				
			</div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" name="updatekategori" class="btn btn-primary">Save changes</button>
            </div>
			</form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>			
						
						
             <?php $no++;} ?>          
						
						
                                           
                                                </tbody>
        </table>
    </div>
</div>
	 </div>
</div>

<?php }else if($_GET['p'] == "order_dikonfirmasi_sedang_aktif"){ ?>
<div class="card shadow-sm border-bottom-primary">
    <div class="card-header bg-white py-3">
        <div class="row">
            <div class="col">
<?php 
include('../db.php');
$qw = mysqli_query($koneksi,"select * from tb_menu");
$qw2 = mysqli_fetch_array($qw);
?>


                <ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item"><a href="?p=tb_dm_1">Home</a></li>
		
              <li class="breadcrumb-item active">Order dikonfirmasi Sedang Aktif</li>
                            </ol>
            </div>


    <!-- <div class="col-auto">
                <a href="" data-toggle="modal" data-target="#modaltambah" class="btn btn-sm btn-primary btn-icon-split">
                    <span class="icon">
                        <i class="fa fa-plus"></i>
                    </span>
                    <span class="text">

                       1. Tambah Data
                    </span>
                </a>
            </div> -->
			
			
			 <div class="modal fade" id="modaltambah">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Tambah Data (<?php echo $qw2['nama_menu'] ?>)</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
           			
<?php 
if(isset($_POST['tambahproduk2'])){
if(($_POST['nama'])){

include('../db.php');






$maxDimW = 1000;
$maxDimH = 500;
list($width, $height, $type, $attr) = getimagesize( $_FILES['image_link']['tmp_name'] );
if ( $width > $maxDimW || $height > $maxDimH ) {
    $target_filename = $_FILES['image_link']['tmp_name'];
    $fn = $_FILES['image_link']['tmp_name'];
    $size = getimagesize( $fn );
    $ratio = $size[0]/$size[1]; // width/height
    //if( $ratio > 1) {
        $width = $maxDimW;
        $height = ($maxDimW / $size[0]) * $size[1];
    // } else {
    //     $width = $maxDimW*$ratio;
    //     $height = $maxDimH;
    // }
    $src = imagecreatefromstring(file_get_contents($fn));
    $dst = imagecreatetruecolor( $width, $height );
    imagecopyresampled($dst, $src, 0, 0, 0, 0, $width, $height, $size[0], $size[1] );

    imagejpeg($dst, $target_filename); // adjust format as needed


}

$namaa = $_FILES['image_link']['name'];


 
if($namaa == null){
mysqli_query($koneksi,"insert into tb_demar2 (id_kategori,judul,judul2,short_desc,long_desc) values
('$_POST[idc2]','$_POST[nama]','$_POST[nama2]','$_POST[short_desc]','$_POST[long_deskripsi]')
");
}else{
	
move_uploaded_file($_FILES['image_link']['tmp_name'],"../images/menu/".$_FILES['image_link']['name']);
mysqli_query($koneksi,"insert into tb_demar2 (gambar,id_kategori,judul,judul2,short_desc,long_desc) values
('$namaa','$_POST[idc2]','$_POST[nama]','$_POST[nama2]','$_POST[short_desc]','$_POST[long_deskripsi]')
");	
}
?>
<script>
alert('Data berhasil ditambahkan<?php echo mysqli_error($koneksi); ?>');
location = "?p=rincian&id=<?php echo $_POST['idc2'] ?>";
</script>



<?php }else{
?>
<script>
alert("gagal");
</script>
<?php
}

}//else{
  ?>
<!-- <script>
alert("gagal");
</script> -->
  <?php
//}


?>

			<form method="POST" enctype="multipart/form-data" >
            <div class="modal-body" style="height:70vh;overflow:scroll;">
						
			 <input onchange="readURLe(this);" type="file" name="image_link" class="form-control" />
			</a><br>
			<center>
			<i><font style="font-size:10px;">* mode kamera landscape
			</font></i><br><img src="" id="product_imagee" style="width:1px;height:1px;" name="product_imagee" class="img-thumbnail">
			</center>
							  <script>
  function readURLe(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#product_imagee')
                .attr('src', e.target.result)
                .width(100)
				.height(100);
        };

        reader.readAsDataURL(input.files[0]);
    }
		
  }
</script>	 
	
             <div class="input-group mb-3" style="margin-top:10px;">
                  <div class="input-group-prepend">
                    <span class="input-group-text" style="width:120px;">Nama</span>
                  </div>

                  <input type="hidden" name="idc2" value="<?php echo $_GET['id'] ?>" />
                				  
				  
				  <input type="hidden" name="unik" value="578866556602c6b54236d7.png" />
                
                  <input type="text" name="nama" value="" class="form-control" placeholder="Nama" required>
                </div>

                <div class="input-group mb-3" style="margin-top:10px;">
                  <div class="input-group-prepend">
                    <span class="input-group-text" style="width:120px;">Nama (Tablayout)</span>
                  </div>

                  <input type="text" name="nama2" value="" class="form-control" placeholder="Nama (Tablayout)" required>
                </div>

				<!-- <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" style="width:120px;">Kategori</span>
                  </div>
				  <select name="kategori" class="form-control" required>
                  <option value="" >- kategori -</option>
				  					<option value="19" >Layanan Service</option>
										<option value="21" >Rental Mesin Fotocopy</option>
										<option value="23" >Jual Mesin Fotocopy</option>
										<option value="25" >Spare part</option>
					                </select>
				</div>
            <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" style="width:120px;">Harga</span>
                  </div>
                  <input type="number" name="harga" value="" class="form-control" placeholder="harga" required>
                </div>
				<div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" style="width:120px;">Short Desc</span>
                  </div>
                  <input type="text" name="short" value="" class="form-control" placeholder="Short Desc" required>
                </div>
				
				
				   -->
        <div>Short Desc</div>        
                <textarea class="form-control" name="short_desc" placeholder="Place some text here"
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" required></textarea>
             
             
                          <div style="margin-top:15px">Long Desc</div>        
                <textarea class="form-control" name="long_deskripsi" placeholder="Place some text here"
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" ></textarea>
             
          
				
				
				
				
				
			</div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" name="tambahproduk2" class="btn btn-primary">Add</button>
            </div>
			</form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>			
						
						
                                           
                   <?php 
                   include ('../db.php');
                   $kj = mysqli_query($koneksi,"select * from tb_order where ket = 'sudahdibayar' and hapus = '2'
				   
				   order by id_order desc
				   ");


                   ?>                            
     <?php 
if(isset($_POST['updatekategori'])){

    
if(($_POST['nama']) || ($_POST['deskripsi'])){





$maxDimW = 1000;
$maxDimH = 500;
list($width, $height, $type, $attr) = getimagesize( $_FILES['image_link']['tmp_name'] );
if ( $width > $maxDimW || $height > $maxDimH ) {
    $target_filename = $_FILES['image_link']['tmp_name'];
    $fn = $_FILES['image_link']['tmp_name'];
    $size = getimagesize( $fn );
    $ratio = $size[0]/$size[1]; // width/height
    //if( $ratio > 1) {
        $width = $maxDimW;
        $height = ($maxDimW / $size[0]) * $size[1];
    // } else {
    //     $width = $maxDimW*$ratio;
    //     $height = $maxDimH;
    // }
    $src = imagecreatefromstring(file_get_contents($fn));
    $dst = imagecreatetruecolor( $width, $height );
    imagecopyresampled($dst, $src, 0, 0, 0, 0, $width, $height, $size[0], $size[1] );

    imagejpeg($dst, $target_filename); // adjust format as needed


}

$namaa = $_FILES['image_link']['name'];

move_uploaded_file($_FILES['image_link']['tmp_name'],"../images/menu/".$_FILES['image_link']['name']);

    if($_FILES['image_link']['name'] == null){
mysqli_query($koneksi,"update tb_demar2 set judul = '$_POST[nama]',
judul2 = '$_POST[nama2]',
short_desc = '$_POST[deskripsi]',
long_desc = '$_POST[long_deskripsi]'
where id_demar = '$_POST[idc]'
");
	}else{
		
mysqli_query($koneksi,"update tb_demar2 set judul = '$_POST[nama]',
judul2 = '$_POST[nama2]',
gambar = '$namaa',
short_desc = '$_POST[deskripsi]',
long_desc = '$_POST[long_deskripsi]'
where id_demar = '$_POST[idc]'
");		
		
	}


if($_FILES['image_link']['name'] == null){

?>

<script>
alert("Data berhasil di ubah <?php echo mysqli_error($koneksi); ?>");
location = "?p=rincian&id=<?php echo $_POST['idc2'] ?>";

</script>

<?php }else{ ?>

<script>
alert("Data berhasil di ubah <?php echo mysqli_error($koneksi); ?>");
location = "?p=rincian&id=<?php echo $_POST['idc2'] ?>";

</script>


<?php } ?>

<?php 
 } 
}
 ?>
    <div class="table-responsive" style="padding:5px;">
        <table class="table table-striped w-100 dt-responsive nowrap" id="example">
            <thead>
                <tr>
                    <th>No. </th>
        <th>Email</th>
			<th>Nama</th>
					<th>Masa Aktif</th>
                    <th>Nama Depan</th>
				<th>Nama Belakang</th>
<th>Harga</th>
<th>No Invoice</th>
<th>Kode Inv</th>
                  
              <!--      <th>Opsi</th> -->
                </tr>
            </thead>
            <tbody>
            <?php 
            $no = 1;
            while($kj2 = mysqli_fetch_array($kj)){
				
				$hf = mysqli_query($koneksi,"select * from user where idUser = '$kj2[id_user]'");
				$hf2 = mysqli_fetch_array($hf);
				
				
				date_default_timezone_set('Asia/Jakarta');
				$sekarang = date('Y-m-d');
				
				$vc = mysqli_query($koneksi,"select * from tb_order_aktif where id_order = '$kj2[id_order]'");
				$vc2 = mysqli_fetch_array($vc);
				  $idd = $kj2['id_order'];
				if($vc2['tanggal_akhir'] <= $sekarang){}else{
				
          
            ?>

			                                        <tr>
                            <td><?php echo $no; ?></td>
               <td><?php echo $hf2['username'] ?></td>
						 <td><?php echo $kj2['nama_produk'] ?></td>
						 
						 <?php if($kj2['jenis_order'] == "memberufe"){ ?>
							 <td><?php echo $hf2['masa_aktif'] ?></td>
						 <?php }else{ ?>
						  <td><?php echo $vc2['tanggal_akhir'] ?></td>
						 <?php } ?>
                            <td><?php echo $kj2['nama_depan'] ?></td>
                       <td><?php echo $kj2['nama_belakang'] ?></td>
                 <td><?php echo number_format($kj2['harga'],0,",",".") ?></td>
							                            <td><?php echo substr($kj2['no_invoice'],4,1000) ?></td>
														<td><?php echo substr($kj2['no_invoice'],0,3) ?></td>
                            
							<!--<td>-->


                               <!-- <a data-toggle="modal" data-target="#modal-lg_<?php echo $idd ?>" href="" class="btn btn-warning btn-circle btn-sm"><i class="fa fa-edit"></i></a>
-->
                             <!-- <a href="?p=rincian2&id=<?php echo $idd ?>" class="btn btn-primary btn-circle btn-sm">Lebih lanjut
                                &nbsp;&nbsp;&nbsp;
                                <i class="fa fa-edit"></i></a>
								
								
								
								 <a href="hapustbdemar2.php?id=<?php echo $idd ?>&idc=<?php echo $_GET['id'] ?>" class="btn btn-danger btn-circle btn-sm">Hapus
                                &nbsp;&nbsp;&nbsp;
                                <i class="fa fa-trash"></i></a> -->


                            <!--</td>-->
                        </tr
                        >
						
						
			  <div class="modal fade" id="modal-lg_<?php echo $idd; ?>">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
<?php 
$rt = mysqli_query($koneksi,"select * from tb_order where id_order = '$idd'");
$rt2 = mysqli_fetch_array($rt);
?>

              <h4 class="modal-title">1. Edit <?php echo $rt2['nama_produk'] ?></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
						



			<form method="POST" enctype="multipart/form-data" >
            <div class="modal-body" style="overflow:scroll;height:70vh">

			
			
			
						
			<center>
							<img src="https://ufe-section-indonesie.org/ufeapp/images/menu/<?php echo $kj2['gambar'] ?>"  style="width:200px;" />
			</center> 
			
		<input onchange="readURL<?php echo $idd; ?>(this);" type="file" name="image_link" class="form-control"/>
			</a><br>
			<center>
			<i><font style="font-size:10px;">* mode kamera landscape
			</font></i><br><img src="" id="product_image<?php echo $idd; ?>" style="width:1px;height:1px;" name="product_image<?php echo $idd; ?>" class="img-thumbnail">
			</center>
							  <script>
  function readURL<?php echo $idd; ?>(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#product_image<?php echo $idd; ?>')
                .attr('src', e.target.result)
                .width(100)
				.height(100);
        };

        reader.readAsDataURL(input.files[0]);
    }
		
  }
</script>	
	
             <div class="input-group mb-3" style="margin-top:10px;">
                  <div class="input-group-prepend">
                    <span class="input-group-text" style="width:120px;">Nama</span>
                  </div>
				  
				  
				  <input type="hidden" name="unik" value="430992371602c6b5423c26.png" />
          <input type="hidden" name="idc2" value="<?php echo $_GET['id'] ?>" />
                  <input type="hidden" name="idc" value="<?php echo $idd ?>" />
                  <input type="text" name="nama" value="<?php echo $kj2['judul'] ?>" class="form-control" placeholder="Nama" required>
                </div>
				


                <div class="input-group mb-3" style="margin-top:10px;">
                  <div class="input-group-prepend">
                    <span class="input-group-text" style="width:120px;">Nama (Tablayout)</span>
                  </div>
				  
				  
				  <input type="hidden" name="unik" value="430992371602c6b5423c26.png" />
                  <input type="hidden" name="idc" value="<?php echo $idd ?>" />
                  <input type="text" name="nama2" value="<?php echo $kj2['judul2'] ?>" class="form-control" placeholder="Nama (Tablayout)" required>
                </div>
				<!-- <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" style="width:120px;">Kategori</span>
                  </div>
				  <select name="kategori" class="form-control" required>
                  <option value="23" >Jual Mesin Fotocopy</option>
				  					<option value="19" >Layanan Service</option>
										<option value="21" >Rental Mesin Fotocopy</option>
										<option value="25" >Spare part</option>
					                </select>
				</div> -->
            <!-- <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" style="width:120px;">Harga</span>
                  </div>
                  <input type="number" name="harga" value="8000000" class="form-control" placeholder="harga" required>
                </div>
				<div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" style="width:120px;">Short Desc</span>
                  </div>
                  <input type="text" name="short" value="XploitSec-ID" class="form-control" placeholder="Short Desc" required>
                </div> -->
				
				
				  <div>
                Short Desc
               </div>
                <!-- <textarea class="textarea" name="deskripsi" placeholder="Place some text here" -->
                <textarea class="form-control" name="deskripsi" placeholder="Place some text here"
              
                           required><?php echo $kj2['short_desc'] ?></textarea>
             
             <div style="margin-top:15px;">
                           Long Desc
                </div>
                <!-- <textarea class="textarea" name="deskripsi" placeholder="Place some text here" -->
                <textarea class="form-control" name="long_deskripsi" placeholder="Place some text here"
              
                          ><?php echo $kj2['long_desc'] ?></textarea>
             
             
				
				
				
				
				
			</div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" name="updatekategori" class="btn btn-primary">Save changes</button>
            </div>
			</form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>			
						
						
				<?php }$no++;} ?>          
						
						
                                           
                                                </tbody>
        <tfoot>
                <tr>
                    <th>No. </th>
        <th>Email</th>
			<th>Nama</th>
					<th>Masa Aktif</th>
                    <th>Nama Depan</th>
				<th>Nama Belakang</th>
<th>Harga</th>
<th>No Invoice</th>
<th>Kode Inv</th>
                  
              <!--      <th>Opsi</th> -->
                </tr>
            </tfoot>
		</table>
    </div>
</div>
	 </div>
</div>

<?php }else if($_GET['p'] == "order_dikonfirmasi_histori"){ ?>
<div class="card shadow-sm border-bottom-primary">
    <div class="card-header bg-white py-3">
        <div class="row">
            <div class="col">
<?php 
include('../db.php');
$qw = mysqli_query($koneksi,"select * from tb_menu");
$qw2 = mysqli_fetch_array($qw);
?>


                 <ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item"><a href="?p=tb_dm_1">Home</a></li>
		
              <li class="breadcrumb-item active">Riwayat Order dikonfirmasi</li>
                            </ol>
            </div>


    <!-- <div class="col-auto">
                <a href="" data-toggle="modal" data-target="#modaltambah" class="btn btn-sm btn-primary btn-icon-split">
                    <span class="icon">
                        <i class="fa fa-plus"></i>
                    </span>
                    <span class="text">

                       1. Tambah Data
                    </span>
                </a>
            </div> -->
			
			
			 <div class="modal fade" id="modaltambah">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Tambah Data (<?php echo $qw2['nama_menu'] ?>)</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
           			
<?php 
if(isset($_POST['tambahproduk2'])){
if(($_POST['nama'])){

include('../db.php');






$maxDimW = 1000;
$maxDimH = 500;
list($width, $height, $type, $attr) = getimagesize( $_FILES['image_link']['tmp_name'] );
if ( $width > $maxDimW || $height > $maxDimH ) {
    $target_filename = $_FILES['image_link']['tmp_name'];
    $fn = $_FILES['image_link']['tmp_name'];
    $size = getimagesize( $fn );
    $ratio = $size[0]/$size[1]; // width/height
    //if( $ratio > 1) {
        $width = $maxDimW;
        $height = ($maxDimW / $size[0]) * $size[1];
    // } else {
    //     $width = $maxDimW*$ratio;
    //     $height = $maxDimH;
    // }
    $src = imagecreatefromstring(file_get_contents($fn));
    $dst = imagecreatetruecolor( $width, $height );
    imagecopyresampled($dst, $src, 0, 0, 0, 0, $width, $height, $size[0], $size[1] );

    imagejpeg($dst, $target_filename); // adjust format as needed


}

$namaa = $_FILES['image_link']['name'];


 
if($namaa == null){
mysqli_query($koneksi,"insert into tb_demar2 (id_kategori,judul,judul2,short_desc,long_desc) values
('$_POST[idc2]','$_POST[nama]','$_POST[nama2]','$_POST[short_desc]','$_POST[long_deskripsi]')
");
}else{
	
move_uploaded_file($_FILES['image_link']['tmp_name'],"../images/menu/".$_FILES['image_link']['name']);
mysqli_query($koneksi,"insert into tb_demar2 (gambar,id_kategori,judul,judul2,short_desc,long_desc) values
('$namaa','$_POST[idc2]','$_POST[nama]','$_POST[nama2]','$_POST[short_desc]','$_POST[long_deskripsi]')
");	
}
?>
<script>
alert('Data berhasil ditambahkan<?php echo mysqli_error($koneksi); ?>');
location = "?p=rincian&id=<?php echo $_POST['idc2'] ?>";
</script>



<?php }else{
?>
<script>
alert("gagal");
</script>
<?php
}

}//else{
  ?>
<!-- <script>
alert("gagal");
</script> -->
  <?php
//}


?>

			<form method="POST" enctype="multipart/form-data" >
            <div class="modal-body" style="height:70vh;overflow:scroll;">
						
			 <input onchange="readURLe(this);" type="file" name="image_link" class="form-control" />
			</a><br>
			<center>
			<i><font style="font-size:10px;">* mode kamera landscape
			</font></i><br><img src="" id="product_imagee" style="width:1px;height:1px;" name="product_imagee" class="img-thumbnail">
			</center>
							  <script>
  function readURLe(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#product_imagee')
                .attr('src', e.target.result)
                .width(100)
				.height(100);
        };

        reader.readAsDataURL(input.files[0]);
    }
		
  }
</script>	 
	
             <div class="input-group mb-3" style="margin-top:10px;">
                  <div class="input-group-prepend">
                    <span class="input-group-text" style="width:120px;">Nama</span>
                  </div>

                  <input type="hidden" name="idc2" value="<?php echo $_GET['id'] ?>" />
                				  
				  
				  <input type="hidden" name="unik" value="578866556602c6b54236d7.png" />
                
                  <input type="text" name="nama" value="" class="form-control" placeholder="Nama" required>
                </div>

                <div class="input-group mb-3" style="margin-top:10px;">
                  <div class="input-group-prepend">
                    <span class="input-group-text" style="width:120px;">Nama (Tablayout)</span>
                  </div>

                  <input type="text" name="nama2" value="" class="form-control" placeholder="Nama (Tablayout)" required>
                </div>

				<!-- <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" style="width:120px;">Kategori</span>
                  </div>
				  <select name="kategori" class="form-control" required>
                  <option value="" >- kategori -</option>
				  					<option value="19" >Layanan Service</option>
										<option value="21" >Rental Mesin Fotocopy</option>
										<option value="23" >Jual Mesin Fotocopy</option>
										<option value="25" >Spare part</option>
					                </select>
				</div>
            <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" style="width:120px;">Harga</span>
                  </div>
                  <input type="number" name="harga" value="" class="form-control" placeholder="harga" required>
                </div>
				<div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" style="width:120px;">Short Desc</span>
                  </div>
                  <input type="text" name="short" value="" class="form-control" placeholder="Short Desc" required>
                </div>
				
				
				   -->
        <div>Short Desc</div>        
                <textarea class="form-control" name="short_desc" placeholder="Place some text here"
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" required></textarea>
             
             
                          <div style="margin-top:15px">Long Desc</div>        
                <textarea class="form-control" name="long_deskripsi" placeholder="Place some text here"
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" ></textarea>
             
          
				
				
				
				
				
			</div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" name="tambahproduk2" class="btn btn-primary">Add</button>
            </div>
			</form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>			
						
						
                                           
                   <?php 
                   include ('../db.php');
                   $kj = mysqli_query($koneksi,"select * from tb_order where ket = 'sudahdibayar' and hapus = '2'
				   
				   order by id_order desc
				   ");


                   ?>                            
     <?php 
if(isset($_POST['updatekategori'])){

    
if(($_POST['nama']) || ($_POST['deskripsi'])){





$maxDimW = 1000;
$maxDimH = 500;
list($width, $height, $type, $attr) = getimagesize( $_FILES['image_link']['tmp_name'] );
if ( $width > $maxDimW || $height > $maxDimH ) {
    $target_filename = $_FILES['image_link']['tmp_name'];
    $fn = $_FILES['image_link']['tmp_name'];
    $size = getimagesize( $fn );
    $ratio = $size[0]/$size[1]; // width/height
    //if( $ratio > 1) {
        $width = $maxDimW;
        $height = ($maxDimW / $size[0]) * $size[1];
    // } else {
    //     $width = $maxDimW*$ratio;
    //     $height = $maxDimH;
    // }
    $src = imagecreatefromstring(file_get_contents($fn));
    $dst = imagecreatetruecolor( $width, $height );
    imagecopyresampled($dst, $src, 0, 0, 0, 0, $width, $height, $size[0], $size[1] );

    imagejpeg($dst, $target_filename); // adjust format as needed


}

$namaa = $_FILES['image_link']['name'];

move_uploaded_file($_FILES['image_link']['tmp_name'],"../images/menu/".$_FILES['image_link']['name']);

    if($_FILES['image_link']['name'] == null){
mysqli_query($koneksi,"update tb_demar2 set judul = '$_POST[nama]',
judul2 = '$_POST[nama2]',
short_desc = '$_POST[deskripsi]',
long_desc = '$_POST[long_deskripsi]'
where id_demar = '$_POST[idc]'
");
	}else{
		
mysqli_query($koneksi,"update tb_demar2 set judul = '$_POST[nama]',
judul2 = '$_POST[nama2]',
gambar = '$namaa',
short_desc = '$_POST[deskripsi]',
long_desc = '$_POST[long_deskripsi]'
where id_demar = '$_POST[idc]'
");		
		
	}


if($_FILES['image_link']['name'] == null){

?>

<script>
alert("Data berhasil di ubah <?php echo mysqli_error($koneksi); ?>");
location = "?p=rincian&id=<?php echo $_POST['idc2'] ?>";

</script>

<?php }else{ ?>

<script>
alert("Data berhasil di ubah <?php echo mysqli_error($koneksi); ?>");
location = "?p=rincian&id=<?php echo $_POST['idc2'] ?>";

</script>


<?php } ?>

<?php 
 } 
}
 ?>
    <div class="table-responsive" style="padding:5px;">
        <table class="table table-striped w-100 dt-responsive nowrap" id="example">
            <thead>
                <tr>
                    <th>No. </th>
        <th>Email</th>
			<th>Nama</th>
					<th>Masa Aktif</th>
                    <th>Nama Depan</th>
				<th>Nama Belakang</th>
<th>Harga</th>
<th>No Invoice</th>
                  
                   <!-- <th>Opsi</th> -->
                </tr>
            </thead>
            <tbody>
            <?php 
            $no = 1;
            while($kj2 = mysqli_fetch_array($kj)){
				
				$hf = mysqli_query($koneksi,"select * from user where idUser = '$kj2[id_user]'");
				$hf2 = mysqli_fetch_array($hf);
				
				
				date_default_timezone_set('Asia/Jakarta');
				$sekarang = date('Y-m-d');
				
				$vc = mysqli_query($koneksi,"select * from tb_order_aktif where id_order = '$kj2[id_order]'");
				$vc2 = mysqli_fetch_array($vc);
				  $idd = $kj2['id_order'];
				//if($vc2['tanggal_akhir'] <= $sekarang){}else{
				
          
            ?>

			                                        <tr>
                            <td><?php echo $no; ?></td>
               <td><?php echo $hf2['username'] ?></td>
						 <td><?php echo $kj2['nama_produk'] ?></td>
						 
						 <?php if($kj2['jenis_order'] == "memberufe"){ ?>
							 <td><?php echo $hf2['masa_aktif'] ?></td>
						 <?php }else{ ?>
						  <td><?php echo $vc2['tanggal_akhir'] ?></td>
						 <?php } ?>
                            <td><?php echo $kj2['nama_depan'] ?></td>
                       <td><?php echo $kj2['nama_belakang'] ?></td>
                 <td><?php echo number_format($kj2['harga'],0,",",".") ?></td>
							                            <td><?php echo $kj2['no_invoice'] ?></td>
                            
						<!--	<td>


                                <a data-toggle="modal" data-target="#modal-lg_<?php echo $idd ?>" href="" class="btn btn-warning btn-circle btn-sm"><i class="fa fa-edit"></i></a>
-->
                             <!-- <a href="?p=rincian2&id=<?php echo $idd ?>" class="btn btn-primary btn-circle btn-sm">Lebih lanjut
                                &nbsp;&nbsp;&nbsp;
                                <i class="fa fa-edit"></i></a>
								
								
								
								 <a href="hapustbdemar2.php?id=<?php echo $idd ?>&idc=<?php echo $_GET['id'] ?>" class="btn btn-danger btn-circle btn-sm">Hapus
                                &nbsp;&nbsp;&nbsp;
                                <i class="fa fa-trash"></i></a> -->


                           <!-- </td>-->
                        </tr
                        >
						
						
			  <div class="modal fade" id="modal-lg_<?php echo $idd; ?>">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
<?php 
$rt = mysqli_query($koneksi,"select * from tb_order where id_order = '$idd'");
$rt2 = mysqli_fetch_array($rt);
?>

              <h4 class="modal-title">1. Edit <?php echo $rt2['nama_produk'] ?></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
						



			<form method="POST" enctype="multipart/form-data" >
            <div class="modal-body" style="overflow:scroll;height:70vh">

			
			
			
						
			<center>
							<img src="https://ufe-section-indonesie.org/ufeapp/images/menu/<?php echo $kj2['gambar'] ?>"  style="width:200px;" />
			</center> 
			
		<input onchange="readURL<?php echo $idd; ?>(this);" type="file" name="image_link" class="form-control"/>
			</a><br>
			<center>
			<i><font style="font-size:10px;">* mode kamera landscape
			</font></i><br><img src="" id="product_image<?php echo $idd; ?>" style="width:1px;height:1px;" name="product_image<?php echo $idd; ?>" class="img-thumbnail">
			</center>
							  <script>
  function readURL<?php echo $idd; ?>(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#product_image<?php echo $idd; ?>')
                .attr('src', e.target.result)
                .width(100)
				.height(100);
        };

        reader.readAsDataURL(input.files[0]);
    }
		
  }
</script>	
	
             <div class="input-group mb-3" style="margin-top:10px;">
                  <div class="input-group-prepend">
                    <span class="input-group-text" style="width:120px;">Nama</span>
                  </div>
				  
				  
				  <input type="hidden" name="unik" value="430992371602c6b5423c26.png" />
          <input type="hidden" name="idc2" value="<?php echo $_GET['id'] ?>" />
                  <input type="hidden" name="idc" value="<?php echo $idd ?>" />
                  <input type="text" name="nama" value="<?php echo $kj2['judul'] ?>" class="form-control" placeholder="Nama" required>
                </div>
				


                <div class="input-group mb-3" style="margin-top:10px;">
                  <div class="input-group-prepend">
                    <span class="input-group-text" style="width:120px;">Nama (Tablayout)</span>
                  </div>
				  
				  
				  <input type="hidden" name="unik" value="430992371602c6b5423c26.png" />
                  <input type="hidden" name="idc" value="<?php echo $idd ?>" />
                  <input type="text" name="nama2" value="<?php echo $kj2['judul2'] ?>" class="form-control" placeholder="Nama (Tablayout)" required>
                </div>
				<!-- <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" style="width:120px;">Kategori</span>
                  </div>
				  <select name="kategori" class="form-control" required>
                  <option value="23" >Jual Mesin Fotocopy</option>
				  					<option value="19" >Layanan Service</option>
										<option value="21" >Rental Mesin Fotocopy</option>
										<option value="25" >Spare part</option>
					                </select>
				</div> -->
            <!-- <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" style="width:120px;">Harga</span>
                  </div>
                  <input type="number" name="harga" value="8000000" class="form-control" placeholder="harga" required>
                </div>
				<div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" style="width:120px;">Short Desc</span>
                  </div>
                  <input type="text" name="short" value="XploitSec-ID" class="form-control" placeholder="Short Desc" required>
                </div> -->
				
				
				  <div>
                Short Desc
               </div>
                <!-- <textarea class="textarea" name="deskripsi" placeholder="Place some text here" -->
                <textarea class="form-control" name="deskripsi" placeholder="Place some text here"
              
                           required><?php echo $kj2['short_desc'] ?></textarea>
             
             <div style="margin-top:15px;">
                           Long Desc
                </div>
                <!-- <textarea class="textarea" name="deskripsi" placeholder="Place some text here" -->
                <textarea class="form-control" name="long_deskripsi" placeholder="Place some text here"
              
                          ><?php echo $kj2['long_desc'] ?></textarea>
             
             
				
				
				
				
				
			</div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" name="updatekategori" class="btn btn-primary">Save changes</button>
            </div>
			</form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>			
						
						
				<?php $no++;} ?>          
						
						
                                           
                                                </tbody>
         <tfoot>
                <tr>
                    <th>No. </th>
        <th>Email</th>
			<th>Nama</th>
					<th>Masa Aktif</th>
                    <th>Nama Depan</th>
				<th>Nama Belakang</th>
<th>Harga</th>
<th>No Invoice</th>
                  
                   <!-- <th>Opsi</th> -->
                </tr>
            </tfoot>
		</table>
    </div>
</div>
	 </div>
</div>

<?php
			}else if($_GET['p'] == "order_menunggu_konfirmasi"){
 ?>
<div class="card shadow-sm border-bottom-primary">
    <div class="card-header bg-white py-3">
        <div class="row">
            <div class="col">
<?php 
include('../db.php');
$qw = mysqli_query($koneksi,"select * from tb_menu");
$qw2 = mysqli_fetch_array($qw);
?>


                 <ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item"><a href="?p=tb_dm_1">Home</a></li>
		
              <li class="breadcrumb-item active">Order menunggu konfirmasi</li>
                            </ol>
            </div>


    <!-- <div class="col-auto">
                <a href="" data-toggle="modal" data-target="#modaltambah" class="btn btn-sm btn-primary btn-icon-split">
                    <span class="icon">
                        <i class="fa fa-plus"></i>
                    </span>
                    <span class="text">

                       1. Tambah Data
                    </span>
                </a>
            </div> -->
			
			
			 <div class="modal fade" id="modaltambah">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Tambah Data (<?php echo $qw2['nama_menu'] ?>)</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
           			
<?php 
if(isset($_POST['tambahproduk2'])){
if(($_POST['nama'])){

include('../db.php');






$maxDimW = 1000;
$maxDimH = 500;
list($width, $height, $type, $attr) = getimagesize( $_FILES['image_link']['tmp_name'] );
if ( $width > $maxDimW || $height > $maxDimH ) {
    $target_filename = $_FILES['image_link']['tmp_name'];
    $fn = $_FILES['image_link']['tmp_name'];
    $size = getimagesize( $fn );
    $ratio = $size[0]/$size[1]; // width/height
    //if( $ratio > 1) {
        $width = $maxDimW;
        $height = ($maxDimW / $size[0]) * $size[1];
    // } else {
    //     $width = $maxDimW*$ratio;
    //     $height = $maxDimH;
    // }
    $src = imagecreatefromstring(file_get_contents($fn));
    $dst = imagecreatetruecolor( $width, $height );
    imagecopyresampled($dst, $src, 0, 0, 0, 0, $width, $height, $size[0], $size[1] );

    imagejpeg($dst, $target_filename); // adjust format as needed


}

$namaa = $_FILES['image_link']['name'];


 
if($namaa == null){
mysqli_query($koneksi,"insert into tb_demar2 (id_kategori,judul,judul2,short_desc,long_desc) values
('$_POST[idc2]','$_POST[nama]','$_POST[nama2]','$_POST[short_desc]','$_POST[long_deskripsi]')
");
}else{
	
move_uploaded_file($_FILES['image_link']['tmp_name'],"../images/menu/".$_FILES['image_link']['name']);
mysqli_query($koneksi,"insert into tb_demar2 (gambar,id_kategori,judul,judul2,short_desc,long_desc) values
('$namaa','$_POST[idc2]','$_POST[nama]','$_POST[nama2]','$_POST[short_desc]','$_POST[long_deskripsi]')
");	
}
?>
<script>
alert('Data berhasil ditambahkan<?php echo mysqli_error($koneksi); ?>');
location = "?p=rincian&id=<?php echo $_POST['idc2'] ?>";
</script>



<?php }else{
?>
<script>
alert("gagal");
</script>
<?php
}

}//else{
  ?>
<!-- <script>
alert("gagal");
</script> -->
  <?php
//}


?>

			<form method="POST" enctype="multipart/form-data" >
            <div class="modal-body" style="height:70vh;overflow:scroll;">
						
			 <input onchange="readURLe(this);" type="file" name="image_link" class="form-control" />
			</a><br>
			<center>
			<i><font style="font-size:10px;">* mode kamera landscape
			</font></i><br><img src="" id="product_imagee" style="width:1px;height:1px;" name="product_imagee" class="img-thumbnail">
			</center>
							  <script>
  function readURLe(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#product_imagee')
                .attr('src', e.target.result)
                .width(100)
				.height(100);
        };

        reader.readAsDataURL(input.files[0]);
    }
		
  }
</script>	 
	
             <div class="input-group mb-3" style="margin-top:10px;">
                  <div class="input-group-prepend">
                    <span class="input-group-text" style="width:120px;">Nama</span>
                  </div>

                  <input type="hidden" name="idc2" value="<?php echo $_GET['id'] ?>" />
                				  
				  
				  <input type="hidden" name="unik" value="578866556602c6b54236d7.png" />
                
                  <input type="text" name="nama" value="" class="form-control" placeholder="Nama" required>
                </div>

                <div class="input-group mb-3" style="margin-top:10px;">
                  <div class="input-group-prepend">
                    <span class="input-group-text" style="width:120px;">Nama (Tablayout)</span>
                  </div>

                  <input type="text" name="nama2" value="" class="form-control" placeholder="Nama (Tablayout)" required>
                </div>

				<!-- <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" style="width:120px;">Kategori</span>
                  </div>
				  <select name="kategori" class="form-control" required>
                  <option value="" >- kategori -</option>
				  					<option value="19" >Layanan Service</option>
										<option value="21" >Rental Mesin Fotocopy</option>
										<option value="23" >Jual Mesin Fotocopy</option>
										<option value="25" >Spare part</option>
					                </select>
				</div>
            <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" style="width:120px;">Harga</span>
                  </div>
                  <input type="number" name="harga" value="" class="form-control" placeholder="harga" required>
                </div>
				<div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" style="width:120px;">Short Desc</span>
                  </div>
                  <input type="text" name="short" value="" class="form-control" placeholder="Short Desc" required>
                </div>
				
				
				   -->
        <div>Short Desc</div>        
                <textarea class="form-control" name="short_desc" placeholder="Place some text here"
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" required></textarea>
             
             
                          <div style="margin-top:15px">Long Desc</div>        
                <textarea class="form-control" name="long_deskripsi" placeholder="Place some text here"
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" ></textarea>
             
          
				
				
				
				
				
			</div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" name="tambahproduk2" class="btn btn-primary">Add</button>
            </div>
			</form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>			
						
						
                                           
                   <?php 
                   include ('../db.php');
                   $kj = mysqli_query($koneksi,"select * from tb_order where ket = 'menunggu' and hapus = '2'
				   
				   order by id_order desc
				   ");


                   ?>                            
     <?php 
if(isset($_POST['updatekategori'])){

    
if(($_POST['nama']) || ($_POST['deskripsi'])){





$maxDimW = 1000;
$maxDimH = 500;
list($width, $height, $type, $attr) = getimagesize( $_FILES['image_link']['tmp_name'] );
if ( $width > $maxDimW || $height > $maxDimH ) {
    $target_filename = $_FILES['image_link']['tmp_name'];
    $fn = $_FILES['image_link']['tmp_name'];
    $size = getimagesize( $fn );
    $ratio = $size[0]/$size[1]; // width/height
    //if( $ratio > 1) {
        $width = $maxDimW;
        $height = ($maxDimW / $size[0]) * $size[1];
    // } else {
    //     $width = $maxDimW*$ratio;
    //     $height = $maxDimH;
    // }
    $src = imagecreatefromstring(file_get_contents($fn));
    $dst = imagecreatetruecolor( $width, $height );
    imagecopyresampled($dst, $src, 0, 0, 0, 0, $width, $height, $size[0], $size[1] );

    imagejpeg($dst, $target_filename); // adjust format as needed


}

$namaa = $_FILES['image_link']['name'];

move_uploaded_file($_FILES['image_link']['tmp_name'],"../images/menu/".$_FILES['image_link']['name']);

    if($_FILES['image_link']['name'] == null){
mysqli_query($koneksi,"update tb_demar2 set judul = '$_POST[nama]',
judul2 = '$_POST[nama2]',
short_desc = '$_POST[deskripsi]',
long_desc = '$_POST[long_deskripsi]'
where id_demar = '$_POST[idc]'
");
	}else{
		
mysqli_query($koneksi,"update tb_demar2 set judul = '$_POST[nama]',
judul2 = '$_POST[nama2]',
gambar = '$namaa',
short_desc = '$_POST[deskripsi]',
long_desc = '$_POST[long_deskripsi]'
where id_demar = '$_POST[idc]'
");		
		
	}


if($_FILES['image_link']['name'] == null){

?>

<script>
alert("Data berhasil di ubah <?php echo mysqli_error($koneksi); ?>");
location = "?p=rincian&id=<?php echo $_POST['idc2'] ?>";

</script>

<?php }else{ ?>

<script>
alert("Data berhasil di ubah <?php echo mysqli_error($koneksi); ?>");
location = "?p=rincian&id=<?php echo $_POST['idc2'] ?>";

</script>


<?php } ?>

<?php 
 } 
}
 ?>
    <div class="table-responsive" style="padding:5px;">
        <table class="table table-striped w-100 dt-responsive nowrap" id="example">
            <thead>
                <tr>
                    <th>No. </th>
        <th>Action</th>
    
        <th>Email</th>
			<th>Nama</th>
					
                    <th>Nama Depan</th>
				<th>Nama Belakang</th>
<th>Harga</th>
<th>No Invoice</th>
                  
              <!--      <th>Opsi</th> -->
                </tr>
            </thead>
            <tbody>
            <?php 
            $no = 1;
            while($kj2 = mysqli_fetch_array($kj)){
				
				$hf = mysqli_query($koneksi,"select * from user where idUser = '$kj2[id_user]'");
				$hf2 = mysqli_fetch_array($hf);
				
				
				date_default_timezone_set('Asia/Jakarta');
				$sekarang = date('Y-m-d');
				
				$vc = mysqli_query($koneksi,"select * from tb_order_aktif where id_order = '$kj2[id_order]'");
				$vc2 = mysqli_fetch_array($vc);
				  $idd = $kj2['id_order'];
				//if($vc2['tanggal_akhir'] <= $sekarang){}else{
				
          
            ?>

			                                        <tr>
                            <td><?php echo $no; ?></td>
               <td><span class="badge badge-primary" style="cursor:pointer;">View</span></td>
              <td><?php echo $hf2['username'] ?></td>
						 <td><?php echo $kj2['nama_produk'] ?></td>
						 
						
                            <td><?php echo $kj2['nama_depan'] ?></td>
                       <td><?php echo $kj2['nama_belakang'] ?></td>
                 <td><?php echo number_format($kj2['harga'],0,",",".") ?></td>
							                            <td><?php echo $kj2['no_invoice'] ?></td>
                            
						<!--	<td>


                                <a data-toggle="modal" data-target="#modal-lg_<?php echo $idd ?>" href="" class="btn btn-warning btn-circle btn-sm"><i class="fa fa-edit"></i></a>
-->
                             <!-- <a href="?p=rincian2&id=<?php echo $idd ?>" class="btn btn-primary btn-circle btn-sm">Lebih lanjut
                                &nbsp;&nbsp;&nbsp;
                                <i class="fa fa-edit"></i></a>
								
								
								
								 <a href="hapustbdemar2.php?id=<?php echo $idd ?>&idc=<?php echo $_GET['id'] ?>" class="btn btn-danger btn-circle btn-sm">Hapus
                                &nbsp;&nbsp;&nbsp;
                                <i class="fa fa-trash"></i></a> -->


                        <!--    </td> -->
                        </tr
                        >
						
						
			  <div class="modal fade" id="modal-lg_<?php echo $idd; ?>">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
<?php 
$rt = mysqli_query($koneksi,"select * from tb_order where id_order = '$idd'");
$rt2 = mysqli_fetch_array($rt);
?>

              <h4 class="modal-title">1. Edit <?php echo $rt2['nama_produk'] ?></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
						



			<form method="POST" enctype="multipart/form-data" >
            <div class="modal-body" style="overflow:scroll;height:70vh">

			
			
			
						
			<center>
							<img src="https://ufe-section-indonesie.org/ufeapp/images/menu/<?php echo $kj2['gambar'] ?>"  style="width:200px;" />
			</center> 
			
		<input onchange="readURL<?php echo $idd; ?>(this);" type="file" name="image_link" class="form-control"/>
			</a><br>
			<center>
			<i><font style="font-size:10px;">* mode kamera landscape
			</font></i><br><img src="" id="product_image<?php echo $idd; ?>" style="width:1px;height:1px;" name="product_image<?php echo $idd; ?>" class="img-thumbnail">
			</center>
							  <script>
  function readURL<?php echo $idd; ?>(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#product_image<?php echo $idd; ?>')
                .attr('src', e.target.result)
                .width(100)
				.height(100);
        };

        reader.readAsDataURL(input.files[0]);
    }
		
  }
</script>	
	
             <div class="input-group mb-3" style="margin-top:10px;">
                  <div class="input-group-prepend">
                    <span class="input-group-text" style="width:120px;">Nama</span>
                  </div>
				  
				  
				  <input type="hidden" name="unik" value="430992371602c6b5423c26.png" />
          <input type="hidden" name="idc2" value="<?php echo $_GET['id'] ?>" />
                  <input type="hidden" name="idc" value="<?php echo $idd ?>" />
                  <input type="text" name="nama" value="<?php echo $kj2['judul'] ?>" class="form-control" placeholder="Nama" required>
                </div>
				


                <div class="input-group mb-3" style="margin-top:10px;">
                  <div class="input-group-prepend">
                    <span class="input-group-text" style="width:120px;">Nama (Tablayout)</span>
                  </div>
				  
				  
				  <input type="hidden" name="unik" value="430992371602c6b5423c26.png" />
                  <input type="hidden" name="idc" value="<?php echo $idd ?>" />
                  <input type="text" name="nama2" value="<?php echo $kj2['judul2'] ?>" class="form-control" placeholder="Nama (Tablayout)" required>
                </div>
				<!-- <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" style="width:120px;">Kategori</span>
                  </div>
				  <select name="kategori" class="form-control" required>
                  <option value="23" >Jual Mesin Fotocopy</option>
				  					<option value="19" >Layanan Service</option>
										<option value="21" >Rental Mesin Fotocopy</option>
										<option value="25" >Spare part</option>
					                </select>
				</div> -->
            <!-- <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" style="width:120px;">Harga</span>
                  </div>
                  <input type="number" name="harga" value="8000000" class="form-control" placeholder="harga" required>
                </div>
				<div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" style="width:120px;">Short Desc</span>
                  </div>
                  <input type="text" name="short" value="XploitSec-ID" class="form-control" placeholder="Short Desc" required>
                </div> -->
				
				
				  <div>
                Short Desc
               </div>
                <!-- <textarea class="textarea" name="deskripsi" placeholder="Place some text here" -->
                <textarea class="form-control" name="deskripsi" placeholder="Place some text here"
              
                           required><?php echo $kj2['short_desc'] ?></textarea>
             
             <div style="margin-top:15px;">
                           Long Desc
                </div>
                <!-- <textarea class="textarea" name="deskripsi" placeholder="Place some text here" -->
                <textarea class="form-control" name="long_deskripsi" placeholder="Place some text here"
              
                          ><?php echo $kj2['long_desc'] ?></textarea>
             
             
				
				
				
				
				
			</div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" name="updatekategori" class="btn btn-primary">Save changes</button>
            </div>
			</form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>			
						
						
				<?php $no++;} ?>          
						
						
                                           
                                                </tbody>
<tfoot>
                <tr>
                    <th>No. </th>
        <th>Email</th>
			<th>Nama</th>
					
                    <th>Nama Depan</th>
				<th>Nama Belakang</th>
<th>Harga</th>
<th>No Invoice</th>
                  
              <!--      <th>Opsi</th> -->
                </tr>
            </tfoot>       
	   </table>
    </div>
</div>
	 </div>
</div>
<?php }else if($_GET['p'] == "user_personal_sudah_dikonfirmasi"){ ?>
<div class="card shadow-sm border-bottom-primary">
    <div class="card-header bg-white py-3">
        <div class="row">
            <div class="col">
<?php 
include('../db.php');
$qw = mysqli_query($koneksi,"select * from user where level = 'personal' and verifikasi_admin = 'belum'");
$qw2 = mysqli_fetch_array($qw);
?>


               <ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item"><a href="?p=tb_dm_1">Home</a></li>
		
              <li class="breadcrumb-item active">User Personal sudah dikonfirmasi</li>
                            </ol>
            </div>

<!--
      <div class="col-auto">
                <a href="" data-toggle="modal" data-target="#modaltambah" class="btn btn-sm btn-primary btn-icon-split">
                    <span class="icon">
                        <i class="fa fa-plus"></i>
                    </span>
                    <span class="text">

                       1. Tambah Data
                    </span>
                </a>
            </div>
	-->		
			
			 <div class="modal fade" id="modaltambah">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Tambah Data (<?php echo $qw2['nama_menu'] ?>)</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
           			
<?php 
if(isset($_POST['tambahproduk2'])){
if(($_POST['nama'])){

include('../db.php');






$maxDimW = 1000;
$maxDimH = 500;
list($width, $height, $type, $attr) = getimagesize( $_FILES['image_link']['tmp_name'] );
if ( $width > $maxDimW || $height > $maxDimH ) {
    $target_filename = $_FILES['image_link']['tmp_name'];
    $fn = $_FILES['image_link']['tmp_name'];
    $size = getimagesize( $fn );
    $ratio = $size[0]/$size[1]; // width/height
    //if( $ratio > 1) {
        $width = $maxDimW;
        $height = ($maxDimW / $size[0]) * $size[1];
    // } else {
    //     $width = $maxDimW*$ratio;
    //     $height = $maxDimH;
    // }
    $src = imagecreatefromstring(file_get_contents($fn));
    $dst = imagecreatetruecolor( $width, $height );
    imagecopyresampled($dst, $src, 0, 0, 0, 0, $width, $height, $size[0], $size[1] );

    imagejpeg($dst, $target_filename); // adjust format as needed


}

$namaa = $_FILES['image_link']['name'];


 
if($namaa == null){
mysqli_query($koneksi,"insert into tb_demar2 (id_kategori,judul,judul2,short_desc,long_desc) values
('$_POST[idc2]','$_POST[nama]','$_POST[nama2]','$_POST[short_desc]','$_POST[long_deskripsi]')
");
}else{
	
move_uploaded_file($_FILES['image_link']['tmp_name'],"../images/menu/".$_FILES['image_link']['name']);
mysqli_query($koneksi,"insert into tb_demar2 (gambar,id_kategori,judul,judul2,short_desc,long_desc) values
('$namaa','$_POST[idc2]','$_POST[nama]','$_POST[nama2]','$_POST[short_desc]','$_POST[long_deskripsi]')
");	
}
?>
<script>
alert('Data berhasil ditambahkan<?php echo mysqli_error($koneksi); ?>');
location = "?p=rincian&id=<?php echo $_POST['idc2'] ?>";
</script>



<?php }else{
?>
<script>
alert("gagal");
</script>
<?php
}

}//else{
  ?>
<!-- <script>
alert("gagal");
</script> -->
  <?php
//}


?>

			<form method="POST" enctype="multipart/form-data" >
            <div class="modal-body" style="height:70vh;overflow:scroll;">
						
			 <input onchange="readURLe(this);" type="file" name="image_link" class="form-control" />
			</a><br>
			<center>
			<i><font style="font-size:10px;">* mode kamera landscape
			</font></i><br><img src="" id="product_imagee" style="width:1px;height:1px;" name="product_imagee" class="img-thumbnail">
			</center>
							  <script>
  function readURLe(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#product_imagee')
                .attr('src', e.target.result)
                .width(100)
				.height(100);
        };

        reader.readAsDataURL(input.files[0]);
    }
		
  }
</script>	 
	
             <div class="input-group mb-3" style="margin-top:10px;">
                  <div class="input-group-prepend">
                    <span class="input-group-text" style="width:120px;">Nama</span>
                  </div>

                  <input type="hidden" name="idc2" value="<?php echo $_GET['id'] ?>" />
                				  
				  
				  <input type="hidden" name="unik" value="578866556602c6b54236d7.png" />
                
                  <input type="text" name="nama" value="" class="form-control" placeholder="Nama" required>
                </div>

                <div class="input-group mb-3" style="margin-top:10px;">
                  <div class="input-group-prepend">
                    <span class="input-group-text" style="width:120px;">Nama (Tablayout)</span>
                  </div>

                  <input type="text" name="nama2" value="" class="form-control" placeholder="Nama (Tablayout)" required>
                </div>

				<!-- <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" style="width:120px;">Kategori</span>
                  </div>
				  <select name="kategori" class="form-control" required>
                  <option value="" >- kategori -</option>
				  					<option value="19" >Layanan Service</option>
										<option value="21" >Rental Mesin Fotocopy</option>
										<option value="23" >Jual Mesin Fotocopy</option>
										<option value="25" >Spare part</option>
					                </select>
				</div>
            <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" style="width:120px;">Harga</span>
                  </div>
                  <input type="number" name="harga" value="" class="form-control" placeholder="harga" required>
                </div>
				<div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" style="width:120px;">Short Desc</span>
                  </div>
                  <input type="text" name="short" value="" class="form-control" placeholder="Short Desc" required>
                </div>
				
				
				   -->
        <div>Short Desc</div>        
                <textarea class="form-control" name="short_desc" placeholder="Place some text here"
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" required></textarea>
             
             
                          <div style="margin-top:15px">Long Desc</div>        
                <textarea class="form-control" name="long_deskripsi" placeholder="Place some text here"
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" ></textarea>
             
          
				
				
				
				
				
			</div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" name="tambahproduk2" class="btn btn-primary">Add</button>
            </div>
			</form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>			
						
						
                                           
                   <?php 
                   include ('../db.php');
                   $kj = mysqli_query($koneksi,"select * from user where level = 'personal' and verifikasi_admin = 'sudah' order by idUser desc");


                   ?>                            
     <?php 
if(isset($_POST['updatekategori'])){

    
if(($_POST['nama']) || ($_POST['deskripsi'])){





$maxDimW = 1000;
$maxDimH = 500;
list($width, $height, $type, $attr) = getimagesize( $_FILES['image_link']['tmp_name'] );
if ( $width > $maxDimW || $height > $maxDimH ) {
    $target_filename = $_FILES['image_link']['tmp_name'];
    $fn = $_FILES['image_link']['tmp_name'];
    $size = getimagesize( $fn );
    $ratio = $size[0]/$size[1]; // width/height
    //if( $ratio > 1) {
        $width = $maxDimW;
        $height = ($maxDimW / $size[0]) * $size[1];
    // } else {
    //     $width = $maxDimW*$ratio;
    //     $height = $maxDimH;
    // }
    $src = imagecreatefromstring(file_get_contents($fn));
    $dst = imagecreatetruecolor( $width, $height );
    imagecopyresampled($dst, $src, 0, 0, 0, 0, $width, $height, $size[0], $size[1] );

    imagejpeg($dst, $target_filename); // adjust format as needed


}

$namaa = $_FILES['image_link']['name'];

move_uploaded_file($_FILES['image_link']['tmp_name'],"../images/menu/".$_FILES['image_link']['name']);

    if($_FILES['image_link']['name'] == null){
mysqli_query($koneksi,"update user set verifikasi_admin = 'belum'
where idUser = '$_POST[idc]'
");
	}else{
		
mysqli_query($koneksi,"update user set verifikasi_admin = 'sudah'
where idUser = '$_POST[idc]'
");		
		
	}


if($_FILES['image_link']['name'] == null){

?>

<script>
alert("Data berhasil di ubah <?php echo mysqli_error($koneksi); ?>");
location = "?p=user_personal_sudah_dikonfirmasi";

</script>

<?php }else{ ?>

<script>
alert("Data berhasil di ubah <?php echo mysqli_error($koneksi); ?>");
location = "?p=rincian&id=<?php echo $_POST['idc2'] ?>";

</script>


<?php } ?>

<?php 
 } 
}
 ?>
    <div class="table-responsive" style="padding:5px;">
        <table class="table table-striped w-100 dt-responsive nowrap" id="example">
            <thead>
                <tr>
                    <th>No. </th>
                    <th>Nama</th>
                    <th>Email</th>

                  <th>Company</th>
                  <th>Tgl Daftar</th>
                  
                    <th>Opsi</th>
                </tr>
            </thead>
            <tbody>
            <?php 
            $no = 1;
            while($kj2 = mysqli_fetch_array($kj)){
            $idd = $kj2['idUser'];
            ?>

			                                        <tr>
                            <td><?php echo $no; ?></td>
                            <td><?php echo $kj2['first_name'] ?> <?php echo $kj2['second_name'] ?></td>
                            <td><?php echo $kj2['username'] ?></td>
                 
							                            <td><?php echo $kj2['company'] ?></td>
                                                   <td><?php echo $kj2['tgl_daftar'] ?></td>
                            
							<td>


                                <a data-toggle="modal" data-target="#modal-lg_<?php echo $idd ?>" href="" class="btn btn-warning btn-circle btn-sm"><i class="fa fa-eye"></i></a>

   <!--                             <a href="?p=rincian2&id=<?php //echo $idd ?>" class="btn btn-primary btn-circle btn-sm">Lebih lanjut
                                &nbsp;&nbsp;&nbsp;
                                <i class="fa fa-edit"></i></a>
		-->						
								
	<!--							
								 <a href="hapustbdemar2.php?id=<?php //echo $idd ?>&idc=<?php //echo $_GET['id'] ?>" class="btn btn-danger btn-circle btn-sm">Hapus
                                &nbsp;&nbsp;&nbsp;
                                <i class="fa fa-trash"></i></a>
-->

                            </td>
                        </tr
                        >
						
						
			  <div class="modal fade" id="modal-lg_<?php echo $idd; ?>">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
<?php 
$rt = mysqli_query($koneksi,"select * from user where idUser = '$idd'");
$rt2 = mysqli_fetch_array($rt);
?>

              <h4 class="modal-title">14. Edit <?php echo $rt2['username'] ?></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
						



			<form method="POST" enctype="multipart/form-data" >
            <div class="modal-body" style="overflow:scroll;height:70vh">

			
			
			
						
			<center>
							<img src="https://ufe-section-indonesie.org/ufeapp/images/propic/<?php echo $kj2['propic'] ?>"  style="width:200px;" />
			</center> 
			<!--
		<input onchange="readURL<?php echo $idd; ?>(this);" type="file" name="image_link" class="form-control"/>
			</a><br>
			<center>
			<i><font style="font-size:10px;">* mode kamera landscape
			</font></i><br><img src="" id="product_image<?php echo $idd; ?>" style="width:1px;height:1px;" name="product_image<?php echo $idd; ?>" class="img-thumbnail">
			</center>
							  <script>
  function readURL<?php echo $idd; ?>(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#product_image<?php echo $idd; ?>')
                .attr('src', e.target.result)
                .width(100)
				.height(100);
        };

        reader.readAsDataURL(input.files[0]);
    }
		
  }
</script>	
	-->
             <div class="input-group mb-3" style="margin-top:10px;">
                  <div class="input-group-prepend">
                    <span class="input-group-text" style="width:120px;">Nama</span>
                  </div>
				  
				  
				  <input type="hidden" name="unik" value="430992371602c6b5423c26.png" />
          <input type="hidden" name="idc2" value="<?php echo $_GET['id'] ?>" />
                  <input type="hidden" name="idc" value="<?php echo $idd ?>" />
                  <input readonly type="text" name="nama" value="<?php echo $kj2['first_name'] ?> <?php echo $kj2['second_name'] ?>" class="form-control" placeholder="Nama" required>
                </div>
				


                <div class="input-group mb-3" style="margin-top:10px;">
                  <div class="input-group-prepend">
                    <span class="input-group-text" style="width:120px;">Email</span>
                  </div>
				  
				  
                  <input type="text" name="nama2" value="<?php echo $kj2['username'] ?>" class="form-control" placeholder="" readonly required>
                </div>




                <div class="input-group mb-3" style="margin-top:10px;">
                  <div class="input-group-prepend">
                    <span class="input-group-text" style="width:120px;">Company</span>
                  </div>
				  
				  
                  <input type="text" name="nama2" value="<?php echo $kj2['company'] ?>" class="form-control" placeholder="" readonly required>
                </div>
				
				
				

                <div class="input-group mb-3" style="margin-top:10px;">
                  <div class="input-group-prepend">
                    <span class="input-group-text" style="width:120px;">Address</span>
                  </div>
				  
				  
                  <input type="text" name="nama2" value="<?php echo $kj2['alamat'] ?>" class="form-control" placeholder="" readonly required>
                </div>

				
				<?php 
				date_default_timezone_set('Asia/Jakarta');
				$hariini = date('Y-m-d');
				
				$nb = mysqli_query($koneksi,"select * from tb_order_aktif where id_user = '$idd'");
				while($nb2 = mysqli_fetch_array($nb)){
				
				if($nb2['tanggal_akhir'] <= $hariini){}else{
				
				?>
				
				 <div class="row" style="border:1px #707070 solid;border-radius:10px;margin-left:10px;margin-right:10px;margin-bottom:3px;">
            <div class="col">

               
            <?php echo $nb2['nama_kegiatan'] ?>              
            </div>


      <div class="col-auto">
             
                <?php 
				
				$st = $nb2['tanggal_akhir'];

$st = date('D, d M Y', strtotime($st . ' +0 day'));

				?>    
            Aktif sampai: <?php echo $st ?>                            
            </div>
			</div>
				
				<?php } } ?>
				
				
				<!-- <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" style="width:120px;">Kategori</span>
                  </div>
				  <select name="kategori" class="form-control" required>
                  <option value="23" >Jual Mesin Fotocopy</option>
				  					<option value="19" >Layanan Service</option>
										<option value="21" >Rental Mesin Fotocopy</option>
										<option value="25" >Spare part</option>
					                </select>
				</div> -->
            <!-- <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" style="width:120px;">Harga</span>
                  </div>
                  <input type="number" name="harga" value="8000000" class="form-control" placeholder="harga" required>
                </div>
				<div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" style="width:120px;">Short Desc</span>
                  </div>
                  <input type="text" name="short" value="XploitSec-ID" class="form-control" placeholder="Short Desc" required>
                </div> -->
				
				<!--
				  <div>
                Alamat
               </div>-->
                <!-- <textarea class="textarea" name="deskripsi" placeholder="Place some text here" -->
              <!--
				  <textarea class="form-control" name="deskripsi" placeholder="Place some text here"
              
                           required><?php echo $kj2['alamat'] ?></textarea>-->
             <!--
             <div style="margin-top:15px;">
                           Long Desc
                </div> -->
                <!-- <textarea class="textarea" name="deskripsi" placeholder="Place some text here" -->
            <!--    <textarea class="form-control" name="long_deskripsi" placeholder="Place some text here"
              
                          ><?php echo $kj2['long_desc'] ?></textarea>
             -->
             
				
				
				
				
				
			</div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" name="updatekategori" class="btn btn-primary">Batalkan</button>
            </div>
			</form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>			
						
						
             <?php $no++;} ?>          
						
						
                                           
                                                </tbody>
        <tfoot>
                <tr>
                    <th>No. </th>
                    <th>Nama</th>
                    <th>Email</th>

                  <th>Company</th>
                  <th>Tgl Daftar</th>
                  
                    <th>Opsi</th>
                </tr>
            </tfoot>
		</table>
    </div>
</div>
	 </div>
</div>


<?php }else if($_GET['p'] == "semua_user"){ ?>
<div class="card shadow-sm border-bottom-primary">
    <div class="card-header bg-white py-3">
        <div class="row">
            <div class="col">
<?php 
include('../db.php');
$qw = mysqli_query($koneksi,"select * from user ");
$qw2 = mysqli_fetch_array($qw);
?>


                <h4 class="h5 align-middle m-0 font-weight-bold text-primary">
                    Semua user                 </h4>
            </div>

<!--
      <div class="col-auto">
                <a href="" data-toggle="modal" data-target="#modaltambah" class="btn btn-sm btn-primary btn-icon-split">
                    <span class="icon">
                        <i class="fa fa-plus"></i>
                    </span>
                    <span class="text">

                       1. Tambah Data
                    </span>
                </a>
            </div>
	-->		
			
			 <div class="modal fade" id="modaltambah">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Tambah Data (<?php echo $qw2['nama_menu'] ?>)</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
           			
<?php 
if(isset($_POST['tambahproduk2'])){
if(($_POST['nama'])){

include('../db.php');






$maxDimW = 1000;
$maxDimH = 500;
list($width, $height, $type, $attr) = getimagesize( $_FILES['image_link']['tmp_name'] );
if ( $width > $maxDimW || $height > $maxDimH ) {
    $target_filename = $_FILES['image_link']['tmp_name'];
    $fn = $_FILES['image_link']['tmp_name'];
    $size = getimagesize( $fn );
    $ratio = $size[0]/$size[1]; // width/height
    //if( $ratio > 1) {
        $width = $maxDimW;
        $height = ($maxDimW / $size[0]) * $size[1];
    // } else {
    //     $width = $maxDimW*$ratio;
    //     $height = $maxDimH;
    // }
    $src = imagecreatefromstring(file_get_contents($fn));
    $dst = imagecreatetruecolor( $width, $height );
    imagecopyresampled($dst, $src, 0, 0, 0, 0, $width, $height, $size[0], $size[1] );

    imagejpeg($dst, $target_filename); // adjust format as needed


}

$namaa = $_FILES['image_link']['name'];


 
if($namaa == null){
mysqli_query($koneksi,"insert into tb_demar2 (id_kategori,judul,judul2,short_desc,long_desc) values
('$_POST[idc2]','$_POST[nama]','$_POST[nama2]','$_POST[short_desc]','$_POST[long_deskripsi]')
");
}else{
	
move_uploaded_file($_FILES['image_link']['tmp_name'],"../images/menu/".$_FILES['image_link']['name']);
mysqli_query($koneksi,"insert into tb_demar2 (gambar,id_kategori,judul,judul2,short_desc,long_desc) values
('$namaa','$_POST[idc2]','$_POST[nama]','$_POST[nama2]','$_POST[short_desc]','$_POST[long_deskripsi]')
");	
}
?>
<script>
alert('Data berhasil ditambahkan<?php echo mysqli_error($koneksi); ?>');
location = "?p=rincian&id=<?php echo $_POST['idc2'] ?>";
</script>



<?php }else{
?>
<script>
alert("gagal");
</script>
<?php
}

}//else{
  ?>
<!-- <script>
alert("gagal");
</script> -->
  <?php
//}


?>

			<form method="POST" enctype="multipart/form-data" >
            <div class="modal-body" style="height:70vh;overflow:scroll;">
						
			 <input onchange="readURLe(this);" type="file" name="image_link" class="form-control" />
			</a><br>
			<center>
			<i><font style="font-size:10px;">* mode kamera landscape
			</font></i><br><img src="" id="product_imagee" style="width:1px;height:1px;" name="product_imagee" class="img-thumbnail">
			</center>
							  <script>
  function readURLe(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#product_imagee')
                .attr('src', e.target.result)
                .width(100)
				.height(100);
        };

        reader.readAsDataURL(input.files[0]);
    }
		
  }
</script>	 
	
             <div class="input-group mb-3" style="margin-top:10px;">
                  <div class="input-group-prepend">
                    <span class="input-group-text" style="width:120px;">Nama</span>
                  </div>

                  <input type="hidden" name="idc2" value="<?php echo $_GET['id'] ?>" />
                				  
				  
				  <input type="hidden" name="unik" value="578866556602c6b54236d7.png" />
                
                  <input type="text" name="nama" value="" class="form-control" placeholder="Nama" required>
                </div>

                <div class="input-group mb-3" style="margin-top:10px;">
                  <div class="input-group-prepend">
                    <span class="input-group-text" style="width:120px;">Nama (Tablayout)</span>
                  </div>

                  <input type="text" name="nama2" value="" class="form-control" placeholder="Nama (Tablayout)" required>
                </div>

				<!-- <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" style="width:120px;">Kategori</span>
                  </div>
				  <select name="kategori" class="form-control" required>
                  <option value="" >- kategori -</option>
				  					<option value="19" >Layanan Service</option>
										<option value="21" >Rental Mesin Fotocopy</option>
										<option value="23" >Jual Mesin Fotocopy</option>
										<option value="25" >Spare part</option>
					                </select>
				</div>
            <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" style="width:120px;">Harga</span>
                  </div>
                  <input type="number" name="harga" value="" class="form-control" placeholder="harga" required>
                </div>
				<div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" style="width:120px;">Short Desc</span>
                  </div>
                  <input type="text" name="short" value="" class="form-control" placeholder="Short Desc" required>
                </div>
				
				
				   -->
        <div>Short Desc</div>        
                <textarea class="form-control" name="short_desc" placeholder="Place some text here"
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" required></textarea>
             
             
                          <div style="margin-top:15px">Long Desc</div>        
                <textarea class="form-control" name="long_deskripsi" placeholder="Place some text here"
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" ></textarea>
             
          
				
				
				
				
				
			</div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" name="tambahproduk2" class="btn btn-primary">Add</button>
            </div>
			</form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>			
						
						
                                           
                   <?php 
                   include ('../db.php');
                   $kj = mysqli_query($koneksi,"select * from user order by idUser desc");


                   ?>                            
     <?php 
if(isset($_POST['updatekategori'])){

    
if(($_POST['nama'])){





$maxDimW = 1000;
$maxDimH = 500;
list($width, $height, $type, $attr) = getimagesize( $_FILES['image_link']['tmp_name'] );
if ( $width > $maxDimW || $height > $maxDimH ) {
    $target_filename = $_FILES['image_link']['tmp_name'];
    $fn = $_FILES['image_link']['tmp_name'];
    $size = getimagesize( $fn );
    $ratio = $size[0]/$size[1]; // width/height
    //if( $ratio > 1) {
        $width = $maxDimW;
        $height = ($maxDimW / $size[0]) * $size[1];
    // } else {
    //     $width = $maxDimW*$ratio;
    //     $height = $maxDimH;
    // }
    $src = imagecreatefromstring(file_get_contents($fn));
    $dst = imagecreatetruecolor( $width, $height );
    imagecopyresampled($dst, $src, 0, 0, 0, 0, $width, $height, $size[0], $size[1] );

    imagejpeg($dst, $target_filename); // adjust format as needed


}

$namaa = $_FILES['image_link']['name'];

move_uploaded_file($_FILES['image_link']['tmp_name'],"../images/menu/".$_FILES['image_link']['name']);






    if($_FILES['image_link']['name'] == null){
mysqli_query($koneksi,"update user set verifikasi_admin = 'sudah'
where idUser = '$_POST[idc]'
");
	}else{
		
mysqli_query($koneksi,"update user set verifikasi_admin = 'sudah'
where idUser = '$_POST[idc]'
");		
		
	}


	
	
	
	
	$kg = mysqli_query($koneksi,"select * from user where idUser = '$_POST[idc]'");
	$kg2 = mysqli_fetch_array($kg);
	
	
	
		$to = "indonesie@ufe.org,abusatch@gmail.com,".$kg2['username'];
$subject = "Compte a été confirmé";

$message = "
<html>
<head>
<title>UFE Indonésie</title>
</head>
<body>
    <fieldset style='text-align:left;border:1px solid #D1D1D1;padding:10px;border-radius:3px;max-width:600px;'>
<table style='width:100%;'>
<tr style='padding:10px 10px 10px 10px;'>
<th style='width:100%;text-align:right;'><img src='http://ufe-section-indonesie.org/pages/wp-content/uploads/2017/11/Asset-2.png' style='width:150px;'/></th>
</tr>
</table>
<table style='width:100%;border-top:1px solid #D1D1D1;margin-top:5px;'>
    <tr>
        <th></th>
    </tr>
    </table>

<p style='font-size:15px;'>Bonjour ".$kg2['username']." <br><br>Votre compte a été approuvé par l’Administrateur
</p>
<table>

<tr>
<td style='font-size:20px;'><b>".$randd."</b></td>
</tr>
</table>
<table style='width:100%;border-top:1px solid #D1D1D1;margin-top:20px;'>
    <tr>
        <th></th>
    </tr>
    </table>
<table style='width:100%;margin-top:5px;'>
<tr><th style='font-size:20px;text-align:left;'>
UFE Section Indonésie</th></tr></table>

<table style='width:100%;'>
<tr><td style='font-size:15px;'>
Jakarta - Indonésie<br>
e-mail: indonesie@ufe.org<br>
site internet: ufe-section-indonesie.org
</td></tr></table>
</fieldset>
</body>
</html>
";

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: UFE Indonésie<indonesie@ufe.org>' . "\r\n";
$headers .= 'Cc: abusatch@gmail.com' . "\r\n";

mail($to,$subject,$message,$headers);

				
				
				
				
				
class startSendNotification
{
	
		function sendNoti($titleNoti, $bodyNoti,$gambarrr){

		define( 'API_ACCESS_KEY', 'AAAARVfjooY:APA91bEAKbWGNffjb80WnOsnE4U_iNWJOUhW1UqiMsnLiJXah2oFmEcn2Y5EcBvUeCWHWgAfBwmFZHhnCdKvyvrUf4m7okrNCICisXtzNyxfKu4F8FxfhXcnxPICACaUrLQJekNqYZPy');
        include 'db.php';

		$ewww = mysqli_query($koneksi,"select * from user where idUser = '$_POST[idc]'");
while ($tyu = mysqli_fetch_array($ewww)){
	
	
$qw[] = $tyu['token_push'];

}
		$fcmMsg = array(
			'title' => $titleNoti,
			'body' => $bodyNoti,
            'image' => $gambarrr,
            'icon' => 'image/look24-logo-s.png'
// 			'click_action' => $actionNoti
		);
		
		$fcmFields = array(
		//	'to' => "e2Ns7U3A0GI:APA91bFVM1soWWG-MrQAsjkiuxgkMdnDdZY3jKzYnhzcx4bJFblyuAdBTkiocnrJNBOWCQuieQVNoOWIttpknML46HF-zgjeEHsm9iGvZ4wfyShCKVX-BO83yLSnq4AoVhIUvqXT2sYq",
		//	'registration_ids' => $registrationIDs,
			'registration_ids' => $qw,
			
			'priority' => 'high',
			'notification' => $fcmMsg
		);

		$headers = array(
			'Authorization: key=' . API_ACCESS_KEY,
			'Content-Type: application/json'
		);
		
		$ch = curl_init();
		curl_setopt( $ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' );
		curl_setopt( $ch,CURLOPT_POST, true );
		curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
		curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
		curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
		curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fcmFields ) );
		$result = curl_exec($ch );
		curl_close( $ch );
		echo $result . "\n\n".$qw;
	}

}
$bagian = $_GET['dsafds'];
$nama = $_GET['fdfvcx'];
$tujuan = $_GET['vsde'];


// include ('koneksi3.php');

// $iu = mysqli_query($con,"select * from temanuser where idtemanuser = '$_POST[dari]'");
// $iu2 = mysqli_fetch_array($iu);


include('db.php');

$fro = mysqli_query($koneksi,"select * from tb_actualite order by id_actualite desc");
$fro2 = mysqli_fetch_array($fro);



// How to use
$titleNoti = "Hello ".$kg2['username'];
$bodyNoti = "Akun Anda telah dikonfirmasi oleh Admin";
$actionNoti = "https://medium.com/@ptuckyeagle";
$gambarrr = "https://ufe-section-indonesie.org/ufeapp/berhasil.png";
$callNoti = new startSendNotification();



//$callNoti->sendNoti($titleNoti, $bodyNoti, $actionNoti);
$callNoti->sendNoti($titleNoti, $bodyNoti,$gambarrr);

	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
if($_FILES['image_link']['name'] == null){

?>

<script>
alert("Data berhasil di ubah <?php echo mysqli_error($koneksi); ?>");
location = "?p=user_personal_belum_dikonfirmasi";

</script>

<?php }else{ ?>

<script>
alert("Data berhasil di ubah <?php echo mysqli_error($koneksi); ?>");
location = "?p=rincian&id=<?php echo $_POST['idc2'] ?>";

</script>


<?php } ?>

<?php 
 } 
}
 ?>
    <div class="table-responsive" style="padding:5px;">
        <table class="table table-striped w-100 dt-responsive nowrap" id="example">
            <thead>
                <tr>
                    <th>No. </th>
                    <th>Nama</th>
                    <th>Email</th>
					<th>Telp</th>
					<th>Kode Verif</th>
					<th>Verifikasi email</th>
                  <th>Company</th>
                  <th>Tgl Daftar</th>
				  <th>Token</th>
                    <th>Opsi</th>
                </tr>
            </thead>
            <tbody>
            <?php 
            $no = 1;
            while($kj2 = mysqli_fetch_array($kj)){
            $idd = $kj2['idUser'];
			$tanggal_awal = $kj2['tanggal2'];
			$tanggal_akhir = date('H:i Y-m-d', strtotime($tanggal_awal . ' +1 year'));
            ?>

			                                        <tr>
                            <td><?php echo $no; ?></td>
                            <td><?php echo $kj2['first_name'] ?> <?php echo $kj2['second_name'] ?></td>
                            <td><?php echo $kj2['username'] ?></td>
							 <td><?php echo $kj2['phone'] ?></td>
							  <td><?php echo $kj2['kode_verif'] ?></td>
							   <td><?php echo $kj2['verifikasi'] ?></td>
                 
							                            <td><?php echo $kj2['company'] ?></td>
                                                     <td><?php echo $kj2['tgl_daftar'] ?></td>
                            <td><?php echo $kj2['token_push'] ?></td>
							<td>


                                <a data-toggle="modal" data-target="#modal-lg_<?php echo $idd ?>" href="" class="btn btn-warning btn-circle btn-sm"><i class="fa fa-eye"></i></a>

   <!--                             <a href="?p=rincian2&id=<?php //echo $idd ?>" class="btn btn-primary btn-circle btn-sm">Lebih lanjut
                                &nbsp;&nbsp;&nbsp;
                                <i class="fa fa-edit"></i></a>
		-->						
								 <a href="kirimulangkode.php?id=<?php echo $idd ?>&p=<?php echo $_GET['p'] ?>" class="btn btn-danger btn-circle btn-sm">Kirim ulang kode
                                &nbsp;&nbsp;&nbsp;
                                <i class="far fa-paper-plane"></i></a>
	<!--							
								 <a href="hapustbdemar2.php?id=<?php //echo $idd ?>&idc=<?php //echo $_GET['id'] ?>" class="btn btn-danger btn-circle btn-sm">Hapus
                                &nbsp;&nbsp;&nbsp;
                                <i class="fa fa-trash"></i></a>
-->

                            </td>
                        </tr
                        >
						
						
			  <div class="modal fade" id="modal-lg_<?php echo $idd; ?>">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
<?php 
$rt = mysqli_query($koneksi,"select * from user where idUser = '$idd'");
$rt2 = mysqli_fetch_array($rt);
?>

              <h4 class="modal-title">12. Edit <?php echo $rt2['username'] ?></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
						



			<form method="POST" enctype="multipart/form-data" >
            <div class="modal-body" style="overflow:scroll;height:70vh">

			
			
			
						
			<center>
							<img src="https://ufe-section-indonesie.org/ufeapp/images/propic/<?php echo $kj2['propic'] ?>"  style="width:200px;" />
			</center> 
			<!--
		<input onchange="readURL<?php echo $idd; ?>(this);" type="file" name="image_link" class="form-control"/>
			</a><br>
			<center>
			<i><font style="font-size:10px;">* mode kamera landscape
			</font></i><br><img src="" id="product_image<?php echo $idd; ?>" style="width:1px;height:1px;" name="product_image<?php echo $idd; ?>" class="img-thumbnail">
			</center>
							  <script>
  function readURL<?php echo $idd; ?>(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#product_image<?php echo $idd; ?>')
                .attr('src', e.target.result)
                .width(100)
				.height(100);
        };

        reader.readAsDataURL(input.files[0]);
    }
		
  }
</script>	
	-->
             <div class="input-group mb-3" style="margin-top:10px;">
                  <div class="input-group-prepend">
                    <span class="input-group-text" style="width:120px;">Nama</span>
                  </div>
				  
				  
				  <input type="hidden" name="unik" value="430992371602c6b5423c26.png" />
          <input type="hidden" name="idc2" value="<?php echo $_GET['id'] ?>" />
                  <input type="hidden" name="idc" value="<?php echo $idd ?>" />
                  <input readonly type="text" name="nama" value="<?php echo $kj2['first_name'] ?> <?php echo $kj2['second_name'] ?>" class="form-control" placeholder="Nama" required>
                </div>
				


                <div class="input-group mb-3" style="margin-top:10px;">
                  <div class="input-group-prepend">
                    <span class="input-group-text" style="width:120px;">Email</span>
                  </div>
				  
				  
                  <input type="text" name="nama2" value="<?php echo $kj2['username'] ?>" class="form-control" placeholder="" readonly required>
                </div>




                <div class="input-group mb-3" style="margin-top:10px;">
                  <div class="input-group-prepend">
                    <span class="input-group-text" style="width:120px;">Company</span>
                  </div>
				  
				  
                  <input type="text" name="nama2" value="<?php echo $kj2['company'] ?>" class="form-control" placeholder="" readonly required>
                </div>
				
				
				

                <div class="input-group mb-3" style="margin-top:10px;">
                  <div class="input-group-prepend">
                    <span class="input-group-text" style="width:120px;">Address</span>
                  </div>
				  
				  
                  <input type="text" name="nama2" value="<?php echo $kj2['alamat'] ?>" class="form-control" placeholder="" readonly required>
                </div>

				<!-- <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" style="width:120px;">Kategori</span>
                  </div>
				  <select name="kategori" class="form-control" required>
                  <option value="23" >Jual Mesin Fotocopy</option>
				  					<option value="19" >Layanan Service</option>
										<option value="21" >Rental Mesin Fotocopy</option>
										<option value="25" >Spare part</option>
					                </select>
				</div> -->
            <!-- <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" style="width:120px;">Harga</span>
                  </div>
                  <input type="number" name="harga" value="8000000" class="form-control" placeholder="harga" required>
                </div>
				<div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" style="width:120px;">Short Desc</span>
                  </div>
                  <input type="text" name="short" value="XploitSec-ID" class="form-control" placeholder="Short Desc" required>
                </div> -->
				
				<!--
				  <div>
                Alamat
               </div>-->
                <!-- <textarea class="textarea" name="deskripsi" placeholder="Place some text here" -->
              <!--
				  <textarea class="form-control" name="deskripsi" placeholder="Place some text here"
              
                           required><?php echo $kj2['alamat'] ?></textarea>-->
             <!--
             <div style="margin-top:15px;">
                           Long Desc
                </div> -->
                <!-- <textarea class="textarea" name="deskripsi" placeholder="Place some text here" -->
            <!--    <textarea class="form-control" name="long_deskripsi" placeholder="Place some text here"
              
                          ><?php echo $kj2['long_desc'] ?></textarea>
             -->
             
				
				
				
				
				
			</div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" name="updatekategori" class="btn btn-primary">Accept</button>
            </div>
			</form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>			
						
						
             <?php $no++;} ?>          
						
						
                                           
                                                </tbody>
        <tfoot>
                <tr>
                    <th>No. </th>
                    <th>Nama</th>
                    <th>Email</th>
					<th>Telp</th>
					<th>Kode Verif</th>
					<th>Verifikasi email</th>
                  <th>Company</th>
                  <th>Tgl Daftar</th>
				  <th>Token</th>
                    <th>Opsi</th>
                </tr>
            </tfoot>
		</table>
    </div>
</div>
	 </div>
</div>
<?php }else if($_GET['p'] == "user_personal_belum_dikonfirmasi"){ ?>
<div class="card shadow-sm border-bottom-primary">
    <div class="card-header bg-white py-3">
        <div class="row">
            <div class="col">
<?php 
include('../db.php');
$qw = mysqli_query($koneksi,"select * from user where level = 'personal' and verifikasi_admin = 'belum'");
$qw2 = mysqli_fetch_array($qw);
?>


               <ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item"><a href="?p=tb_dm_1">Home</a></li>
		
              <li class="breadcrumb-item active">User personal belum dikonfirmasi</li>
                            </ol>
            </div>

<!--
      <div class="col-auto">
                <a href="" data-toggle="modal" data-target="#modaltambah" class="btn btn-sm btn-primary btn-icon-split">
                    <span class="icon">
                        <i class="fa fa-plus"></i>
                    </span>
                    <span class="text">

                       1. Tambah Data
                    </span>
                </a>
            </div>
	-->		
			
			 <div class="modal fade" id="modaltambah">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Tambah Data (<?php echo $qw2['nama_menu'] ?>)</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
           			
<?php 
if(isset($_POST['tambahproduk2'])){
if(($_POST['nama'])){

include('../db.php');






$maxDimW = 1000;
$maxDimH = 500;
list($width, $height, $type, $attr) = getimagesize( $_FILES['image_link']['tmp_name'] );
if ( $width > $maxDimW || $height > $maxDimH ) {
    $target_filename = $_FILES['image_link']['tmp_name'];
    $fn = $_FILES['image_link']['tmp_name'];
    $size = getimagesize( $fn );
    $ratio = $size[0]/$size[1]; // width/height
    //if( $ratio > 1) {
        $width = $maxDimW;
        $height = ($maxDimW / $size[0]) * $size[1];
    // } else {
    //     $width = $maxDimW*$ratio;
    //     $height = $maxDimH;
    // }
    $src = imagecreatefromstring(file_get_contents($fn));
    $dst = imagecreatetruecolor( $width, $height );
    imagecopyresampled($dst, $src, 0, 0, 0, 0, $width, $height, $size[0], $size[1] );

    imagejpeg($dst, $target_filename); // adjust format as needed


}

$namaa = $_FILES['image_link']['name'];


 
if($namaa == null){
mysqli_query($koneksi,"insert into tb_demar2 (id_kategori,judul,judul2,short_desc,long_desc) values
('$_POST[idc2]','$_POST[nama]','$_POST[nama2]','$_POST[short_desc]','$_POST[long_deskripsi]')
");
}else{
	
move_uploaded_file($_FILES['image_link']['tmp_name'],"../images/menu/".$_FILES['image_link']['name']);
mysqli_query($koneksi,"insert into tb_demar2 (gambar,id_kategori,judul,judul2,short_desc,long_desc) values
('$namaa','$_POST[idc2]','$_POST[nama]','$_POST[nama2]','$_POST[short_desc]','$_POST[long_deskripsi]')
");	
}
?>
<script>
alert('Data berhasil ditambahkan<?php echo mysqli_error($koneksi); ?>');
location = "?p=rincian&id=<?php echo $_POST['idc2'] ?>";
</script>



<?php }else{
?>
<script>
alert("gagal");
</script>
<?php
}

}//else{
  ?>
<!-- <script>
alert("gagal");
</script> -->
  <?php
//}


?>

			<form method="POST" enctype="multipart/form-data" >
            <div class="modal-body" style="height:70vh;overflow:scroll;">
						
			 <input onchange="readURLe(this);" type="file" name="image_link" class="form-control" />
			</a><br>
			<center>
			<i><font style="font-size:10px;">* mode kamera landscape
			</font></i><br><img src="" id="product_imagee" style="width:1px;height:1px;" name="product_imagee" class="img-thumbnail">
			</center>
							  <script>
  function readURLe(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#product_imagee')
                .attr('src', e.target.result)
                .width(100)
				.height(100);
        };

        reader.readAsDataURL(input.files[0]);
    }
		
  }
</script>	 
	
             <div class="input-group mb-3" style="margin-top:10px;">
                  <div class="input-group-prepend">
                    <span class="input-group-text" style="width:120px;">Nama</span>
                  </div>

                  <input type="hidden" name="idc2" value="<?php echo $_GET['id'] ?>" />
                				  
				  
				  <input type="hidden" name="unik" value="578866556602c6b54236d7.png" />
                
                  <input type="text" name="nama" value="" class="form-control" placeholder="Nama" required>
                </div>

                <div class="input-group mb-3" style="margin-top:10px;">
                  <div class="input-group-prepend">
                    <span class="input-group-text" style="width:120px;">Nama (Tablayout)</span>
                  </div>

                  <input type="text" name="nama2" value="" class="form-control" placeholder="Nama (Tablayout)" required>
                </div>

				<!-- <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" style="width:120px;">Kategori</span>
                  </div>
				  <select name="kategori" class="form-control" required>
                  <option value="" >- kategori -</option>
				  					<option value="19" >Layanan Service</option>
										<option value="21" >Rental Mesin Fotocopy</option>
										<option value="23" >Jual Mesin Fotocopy</option>
										<option value="25" >Spare part</option>
					                </select>
				</div>
            <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" style="width:120px;">Harga</span>
                  </div>
                  <input type="number" name="harga" value="" class="form-control" placeholder="harga" required>
                </div>
				<div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" style="width:120px;">Short Desc</span>
                  </div>
                  <input type="text" name="short" value="" class="form-control" placeholder="Short Desc" required>
                </div>
				
				
				   -->
        <div>Short Desc</div>        
                <textarea class="form-control" name="short_desc" placeholder="Place some text here"
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" required></textarea>
             
             
                          <div style="margin-top:15px">Long Desc</div>        
                <textarea class="form-control" name="long_deskripsi" placeholder="Place some text here"
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" ></textarea>
             
          
				
				
				
				
				
			</div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" name="tambahproduk2" class="btn btn-primary">Add</button>
            </div>
			</form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>			
						
						
                                           
                   <?php 
                   include ('../db.php');
                   $kj = mysqli_query($koneksi,"select * from user where level = 'personal' and verifikasi_admin = 'belum' order by idUser desc");


                   ?>                            
     <?php 
if(isset($_POST['updatekategori'])){

    
if(($_POST['nama'])){





$maxDimW = 1000;
$maxDimH = 500;
list($width, $height, $type, $attr) = getimagesize( $_FILES['image_link']['tmp_name'] );
if ( $width > $maxDimW || $height > $maxDimH ) {
    $target_filename = $_FILES['image_link']['tmp_name'];
    $fn = $_FILES['image_link']['tmp_name'];
    $size = getimagesize( $fn );
    $ratio = $size[0]/$size[1]; // width/height
    //if( $ratio > 1) {
        $width = $maxDimW;
        $height = ($maxDimW / $size[0]) * $size[1];
    // } else {
    //     $width = $maxDimW*$ratio;
    //     $height = $maxDimH;
    // }
    $src = imagecreatefromstring(file_get_contents($fn));
    $dst = imagecreatetruecolor( $width, $height );
    imagecopyresampled($dst, $src, 0, 0, 0, 0, $width, $height, $size[0], $size[1] );

    imagejpeg($dst, $target_filename); // adjust format as needed


}

$namaa = $_FILES['image_link']['name'];

move_uploaded_file($_FILES['image_link']['tmp_name'],"../images/menu/".$_FILES['image_link']['name']);






    if($_FILES['image_link']['name'] == null){
mysqli_query($koneksi,"update user set verifikasi_admin = 'sudah'
where idUser = '$_POST[idc]'
");
	}else{
		
mysqli_query($koneksi,"update user set verifikasi_admin = 'sudah'
where idUser = '$_POST[idc]'
");		
		
	}


	
	
	
	
	$kg = mysqli_query($koneksi,"select * from user where idUser = '$_POST[idc]'");
	$kg2 = mysqli_fetch_array($kg);
	
	
	
		$to = "indonesie@ufe.org,abusatch@gmail.com,".$kg2['username'];
$subject = "Compte a été confirmé";

$message = "
<html>
<head>
<title>UFE Indonésie</title>
</head>
<body>
    <fieldset style='text-align:left;border:1px solid #D1D1D1;padding:10px;border-radius:3px;max-width:600px;'>
<table style='width:100%;'>
<tr style='padding:10px 10px 10px 10px;'>
<th style='width:100%;text-align:right;'><img src='http://ufe-section-indonesie.org/pages/wp-content/uploads/2017/11/Asset-2.png' style='width:150px;'/></th>
</tr>
</table>
<table style='width:100%;border-top:1px solid #D1D1D1;margin-top:5px;'>
    <tr>
        <th></th>
    </tr>
    </table>

<p style='font-size:15px;'>Bonjour ".$kg2['username']." <br><br>Votre compte a été approuvé par l’Administrateur
</p>
<table>

<tr>
<td style='font-size:20px;'><b>".$randd."</b></td>
</tr>
</table>
<table style='width:100%;border-top:1px solid #D1D1D1;margin-top:20px;'>
    <tr>
        <th></th>
    </tr>
    </table>
<table style='width:100%;margin-top:5px;'>
<tr><th style='font-size:20px;text-align:left;'>
UFE Section Indonésie</th></tr></table>

<table style='width:100%;'>
<tr><td style='font-size:15px;'>
Jakarta - Indonésie<br>
e-mail: indonesie@ufe.org<br>
site internet: ufe-section-indonesie.org
</td></tr></table>
</fieldset>
</body>
</html>
";

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: UFE Indonésie<indonesie@ufe.org>' . "\r\n";
$headers .= 'Cc: abusatch@gmail.com' . "\r\n";

mail($to,$subject,$message,$headers);

				
				
				
				
				
class startSendNotification
{
	
		function sendNoti($titleNoti, $bodyNoti,$gambarrr){

		define( 'API_ACCESS_KEY', 'AAAARVfjooY:APA91bEAKbWGNffjb80WnOsnE4U_iNWJOUhW1UqiMsnLiJXah2oFmEcn2Y5EcBvUeCWHWgAfBwmFZHhnCdKvyvrUf4m7okrNCICisXtzNyxfKu4F8FxfhXcnxPICACaUrLQJekNqYZPy');
        include 'db.php';

		$ewww = mysqli_query($koneksi,"select * from user where idUser = '$_POST[idc]'");
while ($tyu = mysqli_fetch_array($ewww)){
	
	
$qw[] = $tyu['token_push'];

}
		$fcmMsg = array(
			'title' => $titleNoti,
			'body' => $bodyNoti,
            'image' => $gambarrr,
            'icon' => 'image/look24-logo-s.png'
// 			'click_action' => $actionNoti
		);
		
		$fcmFields = array(
		//	'to' => "e2Ns7U3A0GI:APA91bFVM1soWWG-MrQAsjkiuxgkMdnDdZY3jKzYnhzcx4bJFblyuAdBTkiocnrJNBOWCQuieQVNoOWIttpknML46HF-zgjeEHsm9iGvZ4wfyShCKVX-BO83yLSnq4AoVhIUvqXT2sYq",
		//	'registration_ids' => $registrationIDs,
			'registration_ids' => $qw,
			
			'priority' => 'high',
			'notification' => $fcmMsg
		);

		$headers = array(
			'Authorization: key=' . API_ACCESS_KEY,
			'Content-Type: application/json'
		);
		
		$ch = curl_init();
		curl_setopt( $ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' );
		curl_setopt( $ch,CURLOPT_POST, true );
		curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
		curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
		curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
		curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fcmFields ) );
		$result = curl_exec($ch );
		curl_close( $ch );
		echo $result . "\n\n".$qw;
	}

}
$bagian = $_GET['dsafds'];
$nama = $_GET['fdfvcx'];
$tujuan = $_GET['vsde'];


// include ('koneksi3.php');

// $iu = mysqli_query($con,"select * from temanuser where idtemanuser = '$_POST[dari]'");
// $iu2 = mysqli_fetch_array($iu);


include('db.php');

$fro = mysqli_query($koneksi,"select * from tb_actualite order by id_actualite desc");
$fro2 = mysqli_fetch_array($fro);



// How to use
$titleNoti = "Hello ".$kg2['username'];
$bodyNoti = "Akun Anda telah dikonfirmasi oleh Admin";
$actionNoti = "https://medium.com/@ptuckyeagle";
$gambarrr = "https://ufe-section-indonesie.org/ufeapp/berhasil.png";
$callNoti = new startSendNotification();



//$callNoti->sendNoti($titleNoti, $bodyNoti, $actionNoti);
$callNoti->sendNoti($titleNoti, $bodyNoti,$gambarrr);

	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
if($_FILES['image_link']['name'] == null){

?>

<script>
alert("Data berhasil di ubah <?php echo mysqli_error($koneksi); ?>");
location = "?p=user_personal_belum_dikonfirmasi";

</script>

<?php }else{ ?>

<script>
alert("Data berhasil di ubah <?php echo mysqli_error($koneksi); ?>");
location = "?p=rincian&id=<?php echo $_POST['idc2'] ?>";

</script>


<?php } ?>

<?php 
 } 
}
 ?>
    <div class="table-responsive" style="padding:5px;">
        <table class="table table-striped w-100 dt-responsive nowrap" id="dataTable">
            <thead>
                <tr>
                    <th>No. </th>
                    <th>Nama</th>
                    <th>Email</th>
					<th>Telp</th>
					<th>Kode Verif</th>
					<th>Verifikasi email</th>
                  <th>Company</th>
                  <th>Tgl Daftar</th>
                    <th>Opsi</th>
                </tr>
            </thead>
            <tbody>
            <?php 
            $no = 1;
            while($kj2 = mysqli_fetch_array($kj)){
            $idd = $kj2['idUser'];
			$tanggal_awal = $kj2['tanggal2'];
			$tanggal_akhir = date('H:i Y-m-d', strtotime($tanggal_awal . ' +1 year'));
            ?>

			                                        <tr>
                            <td><?php echo $no; ?></td>
                            <td><?php echo $kj2['first_name'] ?> <?php echo $kj2['second_name'] ?></td>
                            <td><?php echo $kj2['username'] ?></td>
							 <td><?php echo $kj2['phone'] ?></td>
							  <td><?php echo $kj2['kode_verif'] ?></td>
							   <td><?php echo $kj2['verifikasi'] ?></td>
                 
							                            <td><?php echo $kj2['company'] ?></td>
                                                     <td><?php echo $kj2['tgl_daftar'] ?></td>
                            
							<td>


                                <a data-toggle="modal" data-target="#modal-lg_<?php echo $idd ?>" href="" class="btn btn-warning btn-circle btn-sm"><i class="fa fa-eye"></i></a>

   <!--                             <a href="?p=rincian2&id=<?php //echo $idd ?>" class="btn btn-primary btn-circle btn-sm">Lebih lanjut
                                &nbsp;&nbsp;&nbsp;
                                <i class="fa fa-edit"></i></a>
		-->						
								 <a href="kirimulangkode.php?id=<?php echo $idd ?>&p=<?php echo $_GET['p'] ?>" class="btn btn-danger btn-circle btn-sm">Kirim ulang kode
                                &nbsp;&nbsp;&nbsp;
                                <i class="far fa-paper-plane"></i></a>
	<!--							
								 <a href="hapustbdemar2.php?id=<?php //echo $idd ?>&idc=<?php //echo $_GET['id'] ?>" class="btn btn-danger btn-circle btn-sm">Hapus
                                &nbsp;&nbsp;&nbsp;
                                <i class="fa fa-trash"></i></a>
-->

                            </td>
                        </tr
                        >
						
						
			  <div class="modal fade" id="modal-lg_<?php echo $idd; ?>">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
<?php 
$rt = mysqli_query($koneksi,"select * from user where idUser = '$idd'");
$rt2 = mysqli_fetch_array($rt);
?>

              <h4 class="modal-title">12. Edit <?php echo $rt2['username'] ?></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
						



			<form method="POST" enctype="multipart/form-data" >
            <div class="modal-body" style="overflow:scroll;height:70vh">

			
			
			
						
			<center>
							<img src="https://ufe-section-indonesie.org/ufeapp/images/propic/<?php echo $kj2['propic'] ?>"  style="width:200px;" />
			</center> 
			<!--
		<input onchange="readURL<?php echo $idd; ?>(this);" type="file" name="image_link" class="form-control"/>
			</a><br>
			<center>
			<i><font style="font-size:10px;">* mode kamera landscape
			</font></i><br><img src="" id="product_image<?php echo $idd; ?>" style="width:1px;height:1px;" name="product_image<?php echo $idd; ?>" class="img-thumbnail">
			</center>
							  <script>
  function readURL<?php echo $idd; ?>(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#product_image<?php echo $idd; ?>')
                .attr('src', e.target.result)
                .width(100)
				.height(100);
        };

        reader.readAsDataURL(input.files[0]);
    }
		
  }
</script>	
	-->
             <div class="input-group mb-3" style="margin-top:10px;">
                  <div class="input-group-prepend">
                    <span class="input-group-text" style="width:120px;">Nama</span>
                  </div>
				  
				  
				  <input type="hidden" name="unik" value="430992371602c6b5423c26.png" />
          <input type="hidden" name="idc2" value="<?php echo $_GET['id'] ?>" />
                  <input type="hidden" name="idc" value="<?php echo $idd ?>" />
                  <input readonly type="text" name="nama" value="<?php echo $kj2['first_name'] ?> <?php echo $kj2['second_name'] ?>" class="form-control" placeholder="Nama" required>
                </div>
				


                <div class="input-group mb-3" style="margin-top:10px;">
                  <div class="input-group-prepend">
                    <span class="input-group-text" style="width:120px;">Email</span>
                  </div>
				  
				  
                  <input type="text" name="nama2" value="<?php echo $kj2['username'] ?>" class="form-control" placeholder="" readonly required>
                </div>




                <div class="input-group mb-3" style="margin-top:10px;">
                  <div class="input-group-prepend">
                    <span class="input-group-text" style="width:120px;">Company</span>
                  </div>
				  
				  
                  <input type="text" name="nama2" value="<?php echo $kj2['company'] ?>" class="form-control" placeholder="" readonly required>
                </div>
				
				
				

                <div class="input-group mb-3" style="margin-top:10px;">
                  <div class="input-group-prepend">
                    <span class="input-group-text" style="width:120px;">Address</span>
                  </div>
				  
				  
                  <input type="text" name="nama2" value="<?php echo $kj2['alamat'] ?>" class="form-control" placeholder="" readonly required>
                </div>

				<!-- <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" style="width:120px;">Kategori</span>
                  </div>
				  <select name="kategori" class="form-control" required>
                  <option value="23" >Jual Mesin Fotocopy</option>
				  					<option value="19" >Layanan Service</option>
										<option value="21" >Rental Mesin Fotocopy</option>
										<option value="25" >Spare part</option>
					                </select>
				</div> -->
            <!-- <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" style="width:120px;">Harga</span>
                  </div>
                  <input type="number" name="harga" value="8000000" class="form-control" placeholder="harga" required>
                </div>
				<div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" style="width:120px;">Short Desc</span>
                  </div>
                  <input type="text" name="short" value="XploitSec-ID" class="form-control" placeholder="Short Desc" required>
                </div> -->
				
				<!--
				  <div>
                Alamat
               </div>-->
                <!-- <textarea class="textarea" name="deskripsi" placeholder="Place some text here" -->
              <!--
				  <textarea class="form-control" name="deskripsi" placeholder="Place some text here"
              
                           required><?php echo $kj2['alamat'] ?></textarea>-->
             <!--
             <div style="margin-top:15px;">
                           Long Desc
                </div> -->
                <!-- <textarea class="textarea" name="deskripsi" placeholder="Place some text here" -->
            <!--    <textarea class="form-control" name="long_deskripsi" placeholder="Place some text here"
              
                          ><?php echo $kj2['long_desc'] ?></textarea>
             -->
             
				
				
				
				
				
			</div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" name="updatekategori" class="btn btn-primary">Accept</button>
            </div>
			</form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>			
						
						
             <?php $no++;} ?>          
						
						
                                           
                                                </tbody>
        </table>
    </div>
</div>
	 </div>
</div>

<?php }else if($_GET['p'] == "user_vip_belum_dikonfirmasi"){ ?>
 <div class="card shadow-sm border-bottom-primary">
    <div class="card-header bg-white py-3">
        <div class="row">
            <div class="col">
<?php 
include('../db.php');
$qw = mysqli_query($koneksi,"select * from user where level = 'vip-admin' and verifikasi_admin = 'belum'");
$qw2 = mysqli_fetch_array($qw);
?>


          <ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item"><a href="?p=tb_dm_1">Home</a></li>
		
              <li class="breadcrumb-item active">User VIP belum dikonfirmasi</li>
                            </ol>
            </div>

<!--
      <div class="col-auto">
                <a href="" data-toggle="modal" data-target="#modaltambah" class="btn btn-sm btn-primary btn-icon-split">
                    <span class="icon">
                        <i class="fa fa-plus"></i>
                    </span>
                    <span class="text">

                       1. Tambah Data
                    </span>
                </a>
            </div>
	-->		
			
			 <div class="modal fade" id="modaltambah">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Tambah Data (<?php echo $qw2['nama_menu'] ?>)</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
           			
<?php 
if(isset($_POST['tambahproduk2'])){
if(($_POST['nama'])){

include('../db.php');






$maxDimW = 1000;
$maxDimH = 500;
list($width, $height, $type, $attr) = getimagesize( $_FILES['image_link']['tmp_name'] );
if ( $width > $maxDimW || $height > $maxDimH ) {
    $target_filename = $_FILES['image_link']['tmp_name'];
    $fn = $_FILES['image_link']['tmp_name'];
    $size = getimagesize( $fn );
    $ratio = $size[0]/$size[1]; // width/height
    //if( $ratio > 1) {
        $width = $maxDimW;
        $height = ($maxDimW / $size[0]) * $size[1];
    // } else {
    //     $width = $maxDimW*$ratio;
    //     $height = $maxDimH;
    // }
    $src = imagecreatefromstring(file_get_contents($fn));
    $dst = imagecreatetruecolor( $width, $height );
    imagecopyresampled($dst, $src, 0, 0, 0, 0, $width, $height, $size[0], $size[1] );

    imagejpeg($dst, $target_filename); // adjust format as needed


}

$namaa = $_FILES['image_link']['name'];


 
if($namaa == null){
mysqli_query($koneksi,"insert into tb_demar2 (id_kategori,judul,judul2,short_desc,long_desc) values
('$_POST[idc2]','$_POST[nama]','$_POST[nama2]','$_POST[short_desc]','$_POST[long_deskripsi]')
");
}else{
	
move_uploaded_file($_FILES['image_link']['tmp_name'],"../images/menu/".$_FILES['image_link']['name']);
mysqli_query($koneksi,"insert into tb_demar2 (gambar,id_kategori,judul,judul2,short_desc,long_desc) values
('$namaa','$_POST[idc2]','$_POST[nama]','$_POST[nama2]','$_POST[short_desc]','$_POST[long_deskripsi]')
");	
}
?>
<script>
alert('Data berhasil ditambahkan<?php echo mysqli_error($koneksi); ?>');
location = "?p=rincian&id=<?php echo $_POST['idc2'] ?>";
</script>



<?php }else{
?>
<script>
alert("gagal");
</script>
<?php
}

}//else{
  ?>
<!-- <script>
alert("gagal");
</script> -->
  <?php
//}


?>

			<form method="POST" enctype="multipart/form-data" >
            <div class="modal-body" style="height:70vh;overflow:scroll;">
						
			 <input onchange="readURLe(this);" type="file" name="image_link" class="form-control" />
			</a><br>
			<center>
			<i><font style="font-size:10px;">* mode kamera landscape
			</font></i><br><img src="" id="product_imagee" style="width:1px;height:1px;" name="product_imagee" class="img-thumbnail">
			</center>
							  <script>
  function readURLe(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#product_imagee')
                .attr('src', e.target.result)
                .width(100)
				.height(100);
        };

        reader.readAsDataURL(input.files[0]);
    }
		
  }
</script>	 
	
             <div class="input-group mb-3" style="margin-top:10px;">
                  <div class="input-group-prepend">
                    <span class="input-group-text" style="width:120px;">Nama</span>
                  </div>

                  <input type="hidden" name="idc2" value="<?php echo $_GET['id'] ?>" />
                				  
				  
				  <input type="hidden" name="unik" value="578866556602c6b54236d7.png" />
                
                  <input type="text" name="nama" value="" class="form-control" placeholder="Nama" required>
                </div>

                <div class="input-group mb-3" style="margin-top:10px;">
                  <div class="input-group-prepend">
                    <span class="input-group-text" style="width:120px;">Nama (Tablayout)</span>
                  </div>

                  <input type="text" name="nama2" value="" class="form-control" placeholder="Nama (Tablayout)" required>
                </div>

				<!-- <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" style="width:120px;">Kategori</span>
                  </div>
				  <select name="kategori" class="form-control" required>
                  <option value="" >- kategori -</option>
				  					<option value="19" >Layanan Service</option>
										<option value="21" >Rental Mesin Fotocopy</option>
										<option value="23" >Jual Mesin Fotocopy</option>
										<option value="25" >Spare part</option>
					                </select>
				</div>
            <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" style="width:120px;">Harga</span>
                  </div>
                  <input type="number" name="harga" value="" class="form-control" placeholder="harga" required>
                </div>
				<div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" style="width:120px;">Short Desc</span>
                  </div>
                  <input type="text" name="short" value="" class="form-control" placeholder="Short Desc" required>
                </div>
				
				
				   -->
        <div>Short Desc</div>        
                <textarea class="form-control" name="short_desc" placeholder="Place some text here"
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" required></textarea>
             
             
                          <div style="margin-top:15px">Long Desc</div>        
                <textarea class="form-control" name="long_deskripsi" placeholder="Place some text here"
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" ></textarea>
             
          
				
				
				
				
				
			</div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" name="tambahproduk2" class="btn btn-primary">Add</button>
            </div>
			</form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>			
						
						
                                           
                   <?php 
                   include ('../db.php');
                   $kj = mysqli_query($koneksi,"select * from user where level = 'vip-admin' and verifikasi_admin = 'belum' order by idUser desc");


                   ?>                            
     <?php 
if(isset($_POST['updatekategori'])){

    
if(($_POST['nama']) || ($_POST['deskripsi'])){





$maxDimW = 1000;
$maxDimH = 500;
list($width, $height, $type, $attr) = getimagesize( $_FILES['image_link']['tmp_name'] );
if ( $width > $maxDimW || $height > $maxDimH ) {
    $target_filename = $_FILES['image_link']['tmp_name'];
    $fn = $_FILES['image_link']['tmp_name'];
    $size = getimagesize( $fn );
    $ratio = $size[0]/$size[1]; // width/height
    //if( $ratio > 1) {
        $width = $maxDimW;
        $height = ($maxDimW / $size[0]) * $size[1];
    // } else {
    //     $width = $maxDimW*$ratio;
    //     $height = $maxDimH;
    // }
    $src = imagecreatefromstring(file_get_contents($fn));
    $dst = imagecreatetruecolor( $width, $height );
    imagecopyresampled($dst, $src, 0, 0, 0, 0, $width, $height, $size[0], $size[1] );

    imagejpeg($dst, $target_filename); // adjust format as needed


}

$namaa = $_FILES['image_link']['name'];


$rand = rand(1000,9999);


move_uploaded_file($_FILES['image_link']['tmp_name'],"../images/menu/".$_FILES['image_link']['name']);

    if($_FILES['image_link']['name'] == null){
mysqli_query($koneksi,"update user set verifikasi_admin = 'sudah',
kode_vip = '$rand'
where idUser = '$_POST[idc]'
");
	}else{
		
mysqli_query($koneksi,"update user set verifikasi_admin = 'sudah',
kode_vip = '$rand'

where idUser = '$_POST[idc]'
");		
		
	}


	
	
	
	$kg = mysqli_query($koneksi,"select * from user where idUser = '$_POST[idc]'");
	$kg2 = mysqli_fetch_array($kg);
	
	
	
		$to = "indonesie@ufe.org,abusatch@gmail.com,".$kg2['username'];
$subject = "Compte a été confirmé";

$message = "
<html>
<head>
<title>UFE Indonésie</title>
</head>
<body>
    <fieldset style='text-align:left;border:1px solid #D1D1D1;padding:10px;border-radius:3px;max-width:600px;'>
<table style='width:100%;'>
<tr style='padding:10px 10px 10px 10px;'>
<th style='width:100%;text-align:right;'><img src='http://ufe-section-indonesie.org/pages/wp-content/uploads/2017/11/Asset-2.png' style='width:150px;'/></th>
</tr>
</table>
<table style='width:100%;border-top:1px solid #D1D1D1;margin-top:5px;'>
    <tr>
        <th></th>
    </tr>
    </table>

<p style='font-size:15px;'>Bonjour ".$kg2['username']." <br><br>Votre compte a été approuvé par l’Administrateur
<br><br>
Code VIP: ".$kg2['kode_vip']."
</p>
<table>

<tr>
<td style='font-size:20px;'><b>".$randd."</b></td>
</tr>
</table>
<table style='width:100%;border-top:1px solid #D1D1D1;margin-top:20px;'>
    <tr>
        <th></th>
    </tr>
    </table>
<table style='width:100%;margin-top:5px;'>
<tr><th style='font-size:20px;text-align:left;'>
UFE Section Indonésie</th></tr></table>

<table style='width:100%;'>
<tr><td style='font-size:15px;'>
Jakarta - Indonésie<br>
e-mail: indonesie@ufe.org<br>
site internet: ufe-section-indonesie.org
</td></tr></table>
</fieldset>
</body>
</html>
";

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: UFE Indonésie<indonesie@ufe.org>' . "\r\n";
$headers .= 'Cc: abusatch@gmail.com' . "\r\n";

mail($to,$subject,$message,$headers);

				
				
				
				
				
class startSendNotification
{
	
		function sendNoti($titleNoti, $bodyNoti,$gambarrr){

		define( 'API_ACCESS_KEY', 'AAAARVfjooY:APA91bEAKbWGNffjb80WnOsnE4U_iNWJOUhW1UqiMsnLiJXah2oFmEcn2Y5EcBvUeCWHWgAfBwmFZHhnCdKvyvrUf4m7okrNCICisXtzNyxfKu4F8FxfhXcnxPICACaUrLQJekNqYZPy');
        include 'db.php';

		$ewww = mysqli_query($koneksi,"select * from user where idUser = '$_POST[idc]'");
while ($tyu = mysqli_fetch_array($ewww)){
	
	
$qw[] = $tyu['token_push'];

}
		$fcmMsg = array(
			'title' => $titleNoti,
			'body' => $bodyNoti,
            'image' => $gambarrr,
            'icon' => 'image/look24-logo-s.png'
// 			'click_action' => $actionNoti
		);
		
		$fcmFields = array(
		//	'to' => "e2Ns7U3A0GI:APA91bFVM1soWWG-MrQAsjkiuxgkMdnDdZY3jKzYnhzcx4bJFblyuAdBTkiocnrJNBOWCQuieQVNoOWIttpknML46HF-zgjeEHsm9iGvZ4wfyShCKVX-BO83yLSnq4AoVhIUvqXT2sYq",
		//	'registration_ids' => $registrationIDs,
			'registration_ids' => $qw,
			
			'priority' => 'high',
			'notification' => $fcmMsg
		);

		$headers = array(
			'Authorization: key=' . API_ACCESS_KEY,
			'Content-Type: application/json'
		);
		
		$ch = curl_init();
		curl_setopt( $ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' );
		curl_setopt( $ch,CURLOPT_POST, true );
		curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
		curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
		curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
		curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fcmFields ) );
		$result = curl_exec($ch );
		curl_close( $ch );
		echo $result . "\n\n".$qw;
	}

}
$bagian = $_GET['dsafds'];
$nama = $_GET['fdfvcx'];
$tujuan = $_GET['vsde'];


// include ('koneksi3.php');

// $iu = mysqli_query($con,"select * from temanuser where idtemanuser = '$_POST[dari]'");
// $iu2 = mysqli_fetch_array($iu);


include('db.php');

$fro = mysqli_query($koneksi,"select * from tb_actualite order by id_actualite desc");
$fro2 = mysqli_fetch_array($fro);



// How to use
$titleNoti = "Hello ".$kg2['username'];
$bodyNoti = "Akun Anda telah dikonfirmasi oleh Admin";
$actionNoti = "https://medium.com/@ptuckyeagle";
$gambarrr = "https://ufe-section-indonesie.org/ufeapp/berhasil.png";
$callNoti = new startSendNotification();



//$callNoti->sendNoti($titleNoti, $bodyNoti, $actionNoti);
$callNoti->sendNoti($titleNoti, $bodyNoti,$gambarrr);

	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
if($_FILES['image_link']['name'] == null){

?>

<script>
alert("Data berhasil di ubah <?php echo mysqli_error($koneksi); ?>");
location = "?p=user_vip_belum_dikonfirmasi";

</script>

<?php }else{ ?>

<script>
alert("Data berhasil di ubah <?php echo mysqli_error($koneksi); ?>");
location = "?p=rincian&id=<?php echo $_POST['idc2'] ?>";

</script>


<?php } ?>

<?php 
 } 
}
 ?>
    <div class="table-responsive" style="padding:5px;">
        <table class="table table-striped w-100 dt-responsive nowrap" id="dataTable">
            <thead>
                <tr>
                    <th>No. </th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Telp</th>
					<th>Kode Verif</th>
					<th>Verifikasi email</th>
					<th>Kode VIP</th>
                  <th>Company</th>
                  <th>Tgl Daftar</th>
                  
                    <th>Opsi</th>
                </tr>
            </thead>
            <tbody>
            <?php 
            $no = 1;
            while($kj2 = mysqli_fetch_array($kj)){
			$ps = $kj2['password'];	
            $idd = $kj2['idUser'];
            ?>

			                                        <tr>
                            <td><?php echo $no; ?></td>
                            <td><?php echo $kj2['first_name'] ?> <?php echo $kj2['second_name'] ?></td>
                            <td><?php echo $kj2['username'] ?></td>
							 <td><?php echo $kj2['phone'] ?></td>
							  <td><?php echo $kj2['kode_verif'] ?></td>
							  <td><?php echo $kj2['verifikasi'] ?></td>
							   <td><?php echo $kj2['kode_vip'] ?></td>
                 
							                            <td><?php echo $kj2['company'] ?></td>
                              <td><?php echo $kj2['tgl_daftar'] ?></td>
							<td>


                                <a data-toggle="modal" data-target="#modal-lg_<?php echo $idd ?>" href="" class="btn btn-warning btn-circle btn-sm"><i class="fa fa-eye"></i></a>

   <!--                             <a href="?p=rincian2&id=<?php //echo $idd ?>" class="btn btn-primary btn-circle btn-sm">Lebih lanjut
                                &nbsp;&nbsp;&nbsp;
                                <i class="fa fa-edit"></i></a>
		-->						
								
							
								 <a href="kirimulangkode.php?id=<?php echo $idd ?>&p=<?php echo $_GET['p'] ?>" class="btn btn-danger btn-circle btn-sm">Kirim ulang kode
                                &nbsp;&nbsp;&nbsp;
                                <i class="far fa-paper-plane"></i></a>


                            </td>
                        </tr
                        >
						
						
			  <div class="modal fade" id="modal-lg_<?php echo $idd; ?>">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
<?php 
$rt = mysqli_query($koneksi,"select * from user where idUser = '$idd'");
$rt2 = mysqli_fetch_array($rt);
?>

              <h4 class="modal-title">11. Edit <?php echo $rt2['username'] ?></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
						



			<form method="POST" enctype="multipart/form-data" >
            <div class="modal-body" style="overflow:scroll;height:70vh">

			
			
			
						
			<center>
							<img src="https://ufe-section-indonesie.org/ufeapp/images/propic/<?php echo $kj2['propic'] ?>"  style="width:200px;" />
			</center> 
			<!--
		<input onchange="readURL<?php echo $idd; ?>(this);" type="file" name="image_link" class="form-control"/>
			</a><br>
			<center>
			<i><font style="font-size:10px;">* mode kamera landscape
			</font></i><br><img src="" id="product_image<?php echo $idd; ?>" style="width:1px;height:1px;" name="product_image<?php echo $idd; ?>" class="img-thumbnail">
			</center>
							  <script>
  function readURL<?php echo $idd; ?>(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#product_image<?php echo $idd; ?>')
                .attr('src', e.target.result)
                .width(100)
				.height(100);
        };

        reader.readAsDataURL(input.files[0]);
    }
		
  }
</script>	
	-->
             <div class="input-group mb-3" style="margin-top:10px;">
                  <div class="input-group-prepend">
                    <span class="input-group-text" style="width:120px;">Nama</span>
                  </div>
				  
				  
				  <input type="hidden" name="unik" value="430992371602c6b5423c26.png" />
          <input type="hidden" name="idc2" value="<?php echo $_GET['id'] ?>" />
                  <input type="hidden" name="idc" value="<?php echo $idd ?>" />
                  <input readonly type="text" name="nama" value="<?php echo $kj2['first_name'] ?> <?php echo $kj2['second_name'] ?>" class="form-control" placeholder="Nama" required>
                </div>
				


                <div class="input-group mb-3" style="margin-top:10px;">
                  <div class="input-group-prepend">
                    <span class="input-group-text" style="width:120px;">Email</span>
                  </div>
				  
				  
                  <input type="text" name="nama2" value="<?php echo $kj2['username'] ?>" class="form-control" placeholder="" readonly required>
                </div>




                <div class="input-group mb-3" style="margin-top:10px;">
                  <div class="input-group-prepend">
                    <span class="input-group-text" style="width:120px;">Company</span>
                  </div>
				  
				  
                  <input type="text" name="nama2" value="<?php echo $kj2['company'] ?>" class="form-control" placeholder="" readonly required>
                </div>
				
				
				

                <div class="input-group mb-3" style="margin-top:10px;">
                  <div class="input-group-prepend">
                    <span class="input-group-text" style="width:120px;">Address</span>
                  </div>
				  
				  
                  <input type="text" name="nama2" value="<?php echo $kj2['alamat'] ?>" class="form-control" placeholder="" readonly required>
                </div>

				<!-- <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" style="width:120px;">Kategori</span>
                  </div>
				  <select name="kategori" class="form-control" required>
                  <option value="23" >Jual Mesin Fotocopy</option>
				  					<option value="19" >Layanan Service</option>
										<option value="21" >Rental Mesin Fotocopy</option>
										<option value="25" >Spare part</option>
					                </select>
				</div> -->
            <!-- <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" style="width:120px;">Harga</span>
                  </div>
                  <input type="number" name="harga" value="8000000" class="form-control" placeholder="harga" required>
                </div>
				<div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" style="width:120px;">Short Desc</span>
                  </div>
                  <input type="text" name="short" value="XploitSec-ID" class="form-control" placeholder="Short Desc" required>
                </div> -->
				
				<!--
				  <div>
                Alamat
               </div>-->
                <!-- <textarea class="textarea" name="deskripsi" placeholder="Place some text here" -->
              <!--
				  <textarea class="form-control" name="deskripsi" placeholder="Place some text here"
              
                           required><?php echo $kj2['alamat'] ?></textarea>-->
             <!--
             <div style="margin-top:15px;">
                           Long Desc
                </div> -->
                <!-- <textarea class="textarea" name="deskripsi" placeholder="Place some text here" -->
            <!--    <textarea class="form-control" name="long_deskripsi" placeholder="Place some text here"
              
                          ><?php echo $kj2['long_desc'] ?></textarea>
             -->
             
				
				
				
				
				
			</div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" name="updatekategori" class="btn btn-primary">Accept</button>
            </div>
			</form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>			
						
						
             <?php $no++;} ?>          
						
						
                                           
                                                </tbody>
        </table>
    </div>
</div>
	 </div>
</div>
<?php }else if($_GET['p'] == "user_vip_sudah_dikonfirmasi"){ ?>
 <div class="card shadow-sm border-bottom-primary">
    <div class="card-header bg-white py-3">
        <div class="row">
            <div class="col">
<?php 
include('../db.php');
$qw = mysqli_query($koneksi,"select * from user where level = 'vip-admin' and verifikasi_admin = 'sudah'");
$qw2 = mysqli_fetch_array($qw);
?>


              <ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item"><a href="?p=tb_dm_1">Home</a></li>
		
              <li class="breadcrumb-item active">User VIP sudah dikonfirmasi</li>
                            </ol>
            </div>

<!--
      <div class="col-auto">
                <a href="" data-toggle="modal" data-target="#modaltambah" class="btn btn-sm btn-primary btn-icon-split">
                    <span class="icon">
                        <i class="fa fa-plus"></i>
                    </span>
                    <span class="text">

                       1. Tambah Data
                    </span>
                </a>
            </div>
	-->		
			
			 <div class="modal fade" id="modaltambah">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Tambah Data (<?php echo $qw2['nama_menu'] ?>)</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
           			
<?php 
if(isset($_POST['tambahproduk2'])){
if(($_POST['nama'])){

include('../db.php');






$maxDimW = 1000;
$maxDimH = 500;
list($width, $height, $type, $attr) = getimagesize( $_FILES['image_link']['tmp_name'] );
if ( $width > $maxDimW || $height > $maxDimH ) {
    $target_filename = $_FILES['image_link']['tmp_name'];
    $fn = $_FILES['image_link']['tmp_name'];
    $size = getimagesize( $fn );
    $ratio = $size[0]/$size[1]; // width/height
    //if( $ratio > 1) {
        $width = $maxDimW;
        $height = ($maxDimW / $size[0]) * $size[1];
    // } else {
    //     $width = $maxDimW*$ratio;
    //     $height = $maxDimH;
    // }
    $src = imagecreatefromstring(file_get_contents($fn));
    $dst = imagecreatetruecolor( $width, $height );
    imagecopyresampled($dst, $src, 0, 0, 0, 0, $width, $height, $size[0], $size[1] );

    imagejpeg($dst, $target_filename); // adjust format as needed


}

$namaa = $_FILES['image_link']['name'];


 
if($namaa == null){
mysqli_query($koneksi,"insert into tb_demar2 (id_kategori,judul,judul2,short_desc,long_desc) values
('$_POST[idc2]','$_POST[nama]','$_POST[nama2]','$_POST[short_desc]','$_POST[long_deskripsi]')
");
}else{
	
move_uploaded_file($_FILES['image_link']['tmp_name'],"../images/menu/".$_FILES['image_link']['name']);
mysqli_query($koneksi,"insert into tb_demar2 (gambar,id_kategori,judul,judul2,short_desc,long_desc) values
('$namaa','$_POST[idc2]','$_POST[nama]','$_POST[nama2]','$_POST[short_desc]','$_POST[long_deskripsi]')
");	
}
?>
<script>
alert('Data berhasil ditambahkan<?php echo mysqli_error($koneksi); ?>');
location = "?p=rincian&id=<?php echo $_POST['idc2'] ?>";
</script>



<?php }else{
?>
<script>
alert("gagal");
</script>
<?php
}

}//else{
  ?>
<!-- <script>
alert("gagal");
</script> -->
  <?php
//}


?>

			<form method="POST" enctype="multipart/form-data" >
            <div class="modal-body" style="height:70vh;overflow:scroll;">
						
			 <input onchange="readURLe(this);" type="file" name="image_link" class="form-control" />
			</a><br>
			<center>
			<i><font style="font-size:10px;">* mode kamera landscape
			</font></i><br><img src="" id="product_imagee" style="width:1px;height:1px;" name="product_imagee" class="img-thumbnail">
			</center>
							  <script>
  function readURLe(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#product_imagee')
                .attr('src', e.target.result)
                .width(100)
				.height(100);
        };

        reader.readAsDataURL(input.files[0]);
    }
		
  }
</script>	 
	
             <div class="input-group mb-3" style="margin-top:10px;">
                  <div class="input-group-prepend">
                    <span class="input-group-text" style="width:120px;">Nama</span>
                  </div>

                  <input type="hidden" name="idc2" value="<?php echo $_GET['id'] ?>" />
                				  
				  
				  <input type="hidden" name="unik" value="578866556602c6b54236d7.png" />
                
                  <input type="text" name="nama" value="" class="form-control" placeholder="Nama" required>
                </div>

                <div class="input-group mb-3" style="margin-top:10px;">
                  <div class="input-group-prepend">
                    <span class="input-group-text" style="width:120px;">Nama (Tablayout)</span>
                  </div>

                  <input type="text" name="nama2" value="" class="form-control" placeholder="Nama (Tablayout)" required>
                </div>

				<!-- <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" style="width:120px;">Kategori</span>
                  </div>
				  <select name="kategori" class="form-control" required>
                  <option value="" >- kategori -</option>
				  					<option value="19" >Layanan Service</option>
										<option value="21" >Rental Mesin Fotocopy</option>
										<option value="23" >Jual Mesin Fotocopy</option>
										<option value="25" >Spare part</option>
					                </select>
				</div>
            <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" style="width:120px;">Harga</span>
                  </div>
                  <input type="number" name="harga" value="" class="form-control" placeholder="harga" required>
                </div>
				<div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" style="width:120px;">Short Desc</span>
                  </div>
                  <input type="text" name="short" value="" class="form-control" placeholder="Short Desc" required>
                </div>
				
				
				   -->
        <div>Short Desc</div>        
                <textarea class="form-control" name="short_desc" placeholder="Place some text here"
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" required></textarea>
             
             
                          <div style="margin-top:15px">Long Desc</div>        
                <textarea class="form-control" name="long_deskripsi" placeholder="Place some text here"
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" ></textarea>
             
          
				
				
				
				
				
			</div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" name="tambahproduk2" class="btn btn-primary">Add</button>
            </div>
			</form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>			
						
						
                                           
                   <?php 
                   include ('../db.php');
                   $kj = mysqli_query($koneksi,"select * from user where level = 'vip-admin' and verifikasi_admin = 'sudah' order by idUser desc");


                   ?>                            
     <?php 
if(isset($_POST['updatekategori'])){

    
if(($_POST['nama']) || ($_POST['deskripsi'])){





$maxDimW = 1000;
$maxDimH = 500;
list($width, $height, $type, $attr) = getimagesize( $_FILES['image_link']['tmp_name'] );
if ( $width > $maxDimW || $height > $maxDimH ) {
    $target_filename = $_FILES['image_link']['tmp_name'];
    $fn = $_FILES['image_link']['tmp_name'];
    $size = getimagesize( $fn );
    $ratio = $size[0]/$size[1]; // width/height
    //if( $ratio > 1) {
        $width = $maxDimW;
        $height = ($maxDimW / $size[0]) * $size[1];
    // } else {
    //     $width = $maxDimW*$ratio;
    //     $height = $maxDimH;
    // }
    $src = imagecreatefromstring(file_get_contents($fn));
    $dst = imagecreatetruecolor( $width, $height );
    imagecopyresampled($dst, $src, 0, 0, 0, 0, $width, $height, $size[0], $size[1] );

    imagejpeg($dst, $target_filename); // adjust format as needed


}

$namaa = $_FILES['image_link']['name'];

move_uploaded_file($_FILES['image_link']['tmp_name'],"../images/menu/".$_FILES['image_link']['name']);

    if($_FILES['image_link']['name'] == null){
		
		if($_POST['membervip'] == "belum"){
mysqli_query($koneksi,"update user set verifikasi_admin = 'belum',
masa_aktif = '$_POST[masa_aktif]'


where idUser = '$_POST[idc]'
");			
		}else{
mysqli_query($koneksi,"update user set
masa_aktif = '$_POST[masa_aktif]'


where idUser = '$_POST[idc]'
");
		}
	}else{
		
mysqli_query($koneksi,"update user set verifikasi_admin = 'sudah'
where idUser = '$_POST[idc]'
");		
		
	}


if($_FILES['image_link']['name'] == null){

?>

<script>
alert("Data berhasil di ubah <?php echo mysqli_error($koneksi); ?>");
location = "?p=user_vip_sudah_dikonfirmasi";

</script>

<?php }else{ ?>

<script>
alert("Data berhasil di ubah <?php echo mysqli_error($koneksi); ?>");
location = "?p=rincian&id=<?php echo $_POST['idc2'] ?>";

</script>


<?php } ?>

<?php 
 } 
}
 ?>
    <div class="table-responsive" style="padding:5px;">
        <table class="table table-striped w-100 dt-responsive nowrap" id="example">
            <thead>
                <tr>
                    <th>No. </th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Masa Aktif</th>
                    <th>Counter</th>
                    <th>Ket</th>
                    <th>Desc</th>
					<th>Phone</th>
					<th>Mobile</th>
					
					<th>Address</th>
					<th>Link Address</th>
					<th>City</th>
					<th>Postal ZIP</th>
					<th>Fax</th>
					<th>Website</th>
					<th>Comp Email</th>
					<th>Comp Address</th>
					<th>Comp City</th>
					<th>Comp Post Code</th>
					<th>Comp Phone</th>
					<th>Comp Fax</th>
					<th>Comp Mobile</th>
					<th>Fb</th>
					<th>Twitter</th>
					<th>IG</th>
					
					
					
					<th>Kode VIP</th>

					<th>Tgl Mendaftar</th>

                  <th>Company</th>
                  
                    <th>Opsi</th>
                </tr>
            </thead>
            <tbody>
            <?php 
            $no = 1;
            while($kj2 = mysqli_fetch_array($kj)){
            $idd = $kj2['idUser'];
            
            
            date_default_timezone_set('Asia/Jakarta');
                $hariini = date('Y-m-d');	
				$date1 = date_create($hariini);
				$date2 = date_create($kj2['masa_aktif']);
				
				$diff = date_diff($date1, $date2);
				$selisih = $diff->format('%R%a');
            
            ?>

			                                        <tr>
                            <td><?php echo $no; ?></td>
                            <td><?php echo $kj2['first_name'] ?> <?php echo $kj2['second_name'] ?></td>
                            <td><?php echo $kj2['username'] ?></td>
                 <td><?php echo $kj2['masa_aktif'] ?></td>
				 <td><?php echo $selisih ?></td>
				 <td><?php 
                 if($selisih <= 0){
                 echo "Expired";}else{ echo "Active"; }  ?></td>
				 
				 
				 <td><?php echo $kj2['deskripsi'] ?></td>
				<td><?php echo $kj2['phone'] ?></td>
			 <td><?php echo $kj2['mobile'] ?></td>
			<td><?php echo $kj2['alamat'] ?></td>
			<td><?php echo $kj2['link_alamat'] ?></td>
		<td><?php echo $kj2['kota'] ?></td>
		<td><?php echo $kj2['kodepos'] ?></td>
		<td><?php echo $kj2['fax'] ?></td>
		<td><?php echo $kj2['website'] ?></td>
		<td><?php echo $kj2['email_company'] ?></td>
		<td><?php echo $kj2['alamat_company'] ?></td>
		<td><?php echo $kj2['kota_company'] ?></td>
		<td><?php echo $kj2['kodepos_company'] ?></td>
		<td><?php echo $kj2['telp_company'] ?></td>
		<td><?php echo $kj2['fax_company'] ?></td>
		<td><?php echo $kj2['mobile_company'] ?></td>
		<td><?php echo $kj2['facebook'] ?></td>
		<td><?php echo $kj2['twitter'] ?></td>
		<td><?php echo $kj2['instagram'] ?></td> 
				 
				 <td><?php echo $kj2['kode_vip'] ?></td>
                 <td><?php echo $kj2['tgl_daftar'] ?></td>
                 
							                            <td><?php echo $kj2['company'] ?></td>
                            
							<td>

                                <a data-toggle="modal" data-target="#modal-lg_<?php echo $idd ?>" href="" class="btn btn-warning btn-circle btn-sm"><i class="fa fa-eye"></i></a>

   <!--                             <a href="?p=rincian2&id=<?php //echo $idd ?>" class="btn btn-primary btn-circle btn-sm">Lebih lanjut
                                &nbsp;&nbsp;&nbsp;
                                <i class="fa fa-edit"></i></a>
		-->						
								
	<!--							
								 <a href="hapustbdemar2.php?id=<?php //echo $idd ?>&idc=<?php //echo $_GET['id'] ?>" class="btn btn-danger btn-circle btn-sm">Hapus
                                &nbsp;&nbsp;&nbsp;
                                <i class="fa fa-trash"></i></a>
-->

                            </td>
                        </tr
                        >
						
						
			  <div class="modal fade" id="modal-lg_<?php echo $idd; ?>">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
<?php 
$rt = mysqli_query($koneksi,"select * from user where idUser = '$idd'");
$rt2 = mysqli_fetch_array($rt);
?>

              <h4 class="modal-title">8. Edit <?php echo $rt2['username'] ?></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
						



			<form method="POST" enctype="multipart/form-data" >
            <div class="modal-body" style="overflow-y:scroll;height:70vh">

			
			
			
						
			<center>
							<img src="https://ufe-section-indonesie.org/ufeapp/images/propic/<?php echo $kj2['propic'] ?>"  style="width:200px;" />
			</center> 
			<!--
		<input onchange="readURL<?php echo $idd; ?>(this);" type="file" name="image_link" class="form-control"/>
			</a><br>
			<center>
			<i><font style="font-size:10px;">* mode kamera landscape
			</font></i><br><img src="" id="product_image<?php echo $idd; ?>" style="width:1px;height:1px;" name="product_image<?php echo $idd; ?>" class="img-thumbnail">
			</center>
							  <script>
  function readURL<?php echo $idd; ?>(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#product_image<?php echo $idd; ?>')
                .attr('src', e.target.result)
                .width(100)
				.height(100);
        };

        reader.readAsDataURL(input.files[0]);
    }
		
  }
</script>	
	-->
             <div class="input-group mb-3" style="margin-top:10px;">
                  <div class="input-group-prepend">
                    <span class="input-group-text" style="width:120px;">Nama</span>
                  </div>
				  
				  
				  <input type="hidden" name="unik" value="430992371602c6b5423c26.png" />
          <input type="hidden" name="idc2" value="<?php echo $_GET['id'] ?>" />
                  <input type="hidden" name="idc" value="<?php echo $idd ?>" />
                  <input readonly type="text" name="nama" value="<?php echo $kj2['first_name'] ?> <?php echo $kj2['second_name'] ?>" class="form-control" placeholder="Nama" required>
                </div>
				


                <div class="input-group mb-3" style="margin-top:10px;">
                  <div class="input-group-prepend">
                    <span class="input-group-text" style="width:120px;">Email</span>
                  </div>
				  
				  
                  <input type="text" name="nama2" value="<?php echo $kj2['username'] ?>" class="form-control" placeholder="" readonly required>
                </div>


                <div class="input-group mb-3" style="margin-top:10px;">
                  <div class="input-group-prepend">
                    <span class="input-group-text" style="width:120px;">Member VIP</span>
                  </div>
				  
				  <select class="form-control" name="membervip">
				  <option value="sudah">Confirmed</option>
				  
				  <option value="belum">Batalkan</option>
				  </select>
                </div>


                <div class="input-group mb-3" style="margin-top:10px;">
                  <div class="input-group-prepend">
                    <span class="input-group-text" style="width:120px;">Masa Aktif</span>
                  </div>
				  
				  
                  <input type="date" name="masa_aktif" value="<?php echo $kj2['masa_aktif'] ?>" class="form-control" placeholder="Masa Aktif" required>
                </div>

                <div class="input-group mb-3" style="margin-top:10px;">
                  <div class="input-group-prepend">
                    <span class="input-group-text" style="width:120px;">Company</span>
                  </div>
				  
				  
                  <input type="text" name="nama2" value="<?php echo $kj2['company'] ?>" class="form-control" placeholder="" readonly required>
                </div>
				
				
				

                <div class="input-group mb-3" style="margin-top:10px;">
                  <div class="input-group-prepend">
                    <span class="input-group-text" style="width:120px;">Address</span>
                  </div>
				  
				  
                  <input type="text" name="nama2" value="<?php echo $kj2['alamat'] ?>" class="form-control" placeholder="" readonly required>
                </div>

				<!-- <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" style="width:120px;">Kategori</span>
                  </div>
				  <select name="kategori" class="form-control" required>
                  <option value="23" >Jual Mesin Fotocopy</option>
				  					<option value="19" >Layanan Service</option>
										<option value="21" >Rental Mesin Fotocopy</option>
										<option value="25" >Spare part</option>
					                </select>
				</div> -->
            <!-- <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" style="width:120px;">Harga</span>
                  </div>
                  <input type="number" name="harga" value="8000000" class="form-control" placeholder="harga" required>
                </div>
				<div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" style="width:120px;">Short Desc</span>
                  </div>
                  <input type="text" name="short" value="XploitSec-ID" class="form-control" placeholder="Short Desc" required>
                </div> -->
				
				<!--
				  <div>
                Alamat
               </div>-->
                <!-- <textarea class="textarea" name="deskripsi" placeholder="Place some text here" -->
              <!--
				  <textarea class="form-control" name="deskripsi" placeholder="Place some text here"
              
                           required><?php echo $kj2['alamat'] ?></textarea>-->
             <!--
             <div style="margin-top:15px;">
                           Long Desc
                </div> -->
                <!-- <textarea class="textarea" name="deskripsi" placeholder="Place some text here" -->
            <!--    <textarea class="form-control" name="long_deskripsi" placeholder="Place some text here"
              
                          ><?php echo $kj2['long_desc'] ?></textarea>
             -->
             
				
				
				
				
				
			</div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" name="updatekategori" class="btn btn-primary">Save</button>
            </div>
			</form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>			
						
						
             <?php $no++;} ?>          
						
						
                                           
                                                </tbody>
        
		          <tfoot>
                <tr>
                    <th>No. </th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Masa Aktif</th>
                    
					<th>Desc</th>
					<th>Phone</th>
					<th>Mobile</th>
					
					<th>Address</th>
					<th>Link Address</th>
					<th>City</th>
					<th>Postal ZIP</th>
					<th>Fax</th>
					<th>Website</th>
					<th>Comp Email</th>
					<th>Comp Address</th>
					<th>Comp City</th>
					<th>Comp Post Code</th>
					<th>Comp Phone</th>
					<th>Comp Fax</th>
					<th>Comp Mobile</th>
					<th>Fb</th>
					<th>Twitter</th>
					<th>IG</th>
					
					
					
					<th>Kode VIP</th>

					<th>Tgl Mendaftar</th>

                  <th>Company</th>
                  
                    <th>Opsi</th>
                </tr>
            </tfoot>
		</table>
    </div>
</div>
	 </div>
</div>
<?php }else if($_GET['p'] == "r2_tb_ufe"){ ?>

  <div class="card shadow-sm border-bottom-primary">
    <div class="card-header bg-white py-3">
        <div class="row">
		
            <div class="col">
<?php 
include('../db.php');
$qw = mysqli_query($koneksi,"select * from tb_activites_jenis where id_jenis = '$_GET[id]'");
$qw2 = mysqli_fetch_array($qw);
?>


                <h4 class="h5 align-middle m-0 font-weight-bold text-primary">
                    <?php echo $qw2['nama'] ?>                 </h4>
            </div>


   <!--   <div class="col-auto">
                <a href="" data-toggle="modal" data-target="#modaltambah" class="btn btn-sm btn-primary btn-icon-split">
                    <span class="icon">
                        <i class="fa fa-plus"></i>
                    </span>
                    <span class="text">

                       8. Tambah Data
                    </span>
                </a>
            </div>
		-->	
			
			 <div class="modal fade" id="modaltambah">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Tambah Data (<?php echo $qw2['nama'] ?>)</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
           			
<?php 
if(isset($_POST['tambahproduk2'])){
if(($_POST['nama'])){

include('../db.php');






$maxDimW = 1000;
$maxDimH = 500;
list($width, $height, $type, $attr) = getimagesize( $_FILES['image_link']['tmp_name'] );
if ( $width > $maxDimW || $height > $maxDimH ) {
    $target_filename = $_FILES['image_link']['tmp_name'];
    $fn = $_FILES['image_link']['tmp_name'];
    $size = getimagesize( $fn );
    $ratio = $size[0]/$size[1]; // width/height
    //if( $ratio > 1) {
        $width = $maxDimW;
        $height = ($maxDimW / $size[0]) * $size[1];
    // } else {
    //     $width = $maxDimW*$ratio;
    //     $height = $maxDimH;
    // }
    $src = imagecreatefromstring(file_get_contents($fn));
    $dst = imagecreatetruecolor( $width, $height );
    imagecopyresampled($dst, $src, 0, 0, 0, 0, $width, $height, $size[0], $size[1] );

    imagejpeg($dst, $target_filename); // adjust format as needed


}

$namaa = $_FILES['image_link']['name'];


 
if($namaa == null){
mysqli_query($koneksi,"insert into tb_creche (id_kategori,judul,judul2,short_desc,long_desc) values
('$_POST[idc2]','$_POST[nama]','$_POST[nama2]','$_POST[short_desc]','$_POST[long_deskripsi]')
");
}else{
	
move_uploaded_file($_FILES['image_link']['tmp_name'],"../images/menu/".$_FILES['image_link']['name']);
mysqli_query($koneksi,"insert into tb_demar2 (gambar,id_kategori,judul,judul2,short_desc,long_desc) values
('$namaa','$_POST[idc2]','$_POST[nama]','$_POST[nama2]','$_POST[short_desc]','$_POST[long_deskripsi]')
");	
}
?>
<script>
alert('Data berhasil ditambahkan<?php echo mysqli_error($koneksi); ?>');
location = "?p=rincian&id=<?php echo $_POST['idc2'] ?>";
</script>



<?php }else{
?>
<script>
alert("gagal");
</script>
<?php
}

}//else{
  ?>
<!-- <script>
alert("gagal");
</script> -->
  <?php
//}


?>

			<form method="POST" enctype="multipart/form-data" >
            <div class="modal-body" style="height:70vh;overflow:scroll;">
						
			 <input onchange="readURLe(this);" type="file" name="image_link" class="form-control" />
			</a><br>
			<center>
			<i><font style="font-size:10px;">* mode kamera landscape
			</font></i><br><img src="" id="product_imagee" style="width:1px;height:1px;" name="product_imagee" class="img-thumbnail">
			</center>
							  <script>
  function readURLe(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#product_imagee')
                .attr('src', e.target.result)
                .width(100)
				.height(100);
        };

        reader.readAsDataURL(input.files[0]);
    }
		
  }
</script>	 
	
             <div class="input-group mb-3" style="margin-top:10px;">
                  <div class="input-group-prepend">
                    <span class="input-group-text" style="width:120px;">Nama</span>
                  </div>

                  <input type="hidden" name="idc2" value="<?php echo $_GET['id'] ?>" />
                				  
				  
				  <input type="hidden" name="unik" value="578866556602c6b54236d7.png" />
                
                  <input type="text" name="nama" value="" class="form-control" placeholder="Nama" required>
                </div>

                <div class="input-group mb-3" style="margin-top:10px;">
                  <div class="input-group-prepend">
                    <span class="input-group-text" style="width:120px;">Nama (Tablayout)</span>
                  </div>

                  <input type="text" name="nama2" value="" class="form-control" placeholder="Nama (Tablayout)" required>
                </div>

				<!-- <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" style="width:120px;">Kategori</span>
                  </div>
				  <select name="kategori" class="form-control" required>
                  <option value="" >- kategori -</option>
				  					<option value="19" >Layanan Service</option>
										<option value="21" >Rental Mesin Fotocopy</option>
										<option value="23" >Jual Mesin Fotocopy</option>
										<option value="25" >Spare part</option>
					                </select>
				</div>
            <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" style="width:120px;">Harga</span>
                  </div>
                  <input type="number" name="harga" value="" class="form-control" placeholder="harga" required>
                </div>
				<div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" style="width:120px;">Short Desc</span>
                  </div>
                  <input type="text" name="short" value="" class="form-control" placeholder="Short Desc" required>
                </div>
				
				
				   -->
        <div>Short Desc</div>        
                <textarea class="form-control" name="short_desc" placeholder="Place some text here"
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" required></textarea>
             
             
                          <div style="margin-top:15px">Long Desc</div>        
                <textarea class="form-control" name="long_deskripsi" placeholder="Place some text here"
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" ></textarea>
             
          
				
				
				
				
				
			</div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" name="tambahproduk2" class="btn btn-primary">Add</button>
            </div>
			</form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>			
						
						
                                           
                   <?php 
                   include ('../db.php');
                   $kj = mysqli_query($koneksi,"select * from tb_creche");


                   ?>                            
     <?php 
if(isset($_POST['updatekategori45'])){

    
if(($_POST['nama'])){





$maxDimW = 1000;
$maxDimH = 500;
list($width, $height, $type, $attr) = getimagesize( $_FILES['image_link']['tmp_name'] );
if ( $width > $maxDimW || $height > $maxDimH ) {
    $target_filename = $_FILES['image_link']['tmp_name'];
    $fn = $_FILES['image_link']['tmp_name'];
    $size = getimagesize( $fn );
    $ratio = $size[0]/$size[1]; // width/height
    //if( $ratio > 1) {
        $width = $maxDimW;
        $height = ($maxDimW / $size[0]) * $size[1];
    // } else {
    //     $width = $maxDimW*$ratio;
    //     $height = $maxDimH;
    // }
    $src = imagecreatefromstring(file_get_contents($fn));
    $dst = imagecreatetruecolor( $width, $height );
    imagecopyresampled($dst, $src, 0, 0, 0, 0, $width, $height, $size[0], $size[1] );

    imagejpeg($dst, $target_filename); // adjust format as needed


}

date_default_timezone_set('Asia/Jakarta');
$tanggal = date('Y-m-d');


$namaa = $_FILES['image_link']['name'];


$kett1 = str_replace("'","\'",$_POST['nama']);
$kett2 = str_replace("'","\'",$_POST['ket2']);
$kett3 = str_replace("'","\'",$_POST['ket3']);
$kett4 = str_replace("'","\'",$_POST['ket4']);

//move_uploaded_file($_FILES['image_link']['tmp_name'],"../images/menu/".$_FILES['image_link']['name']);

    if($_FILES['image_link']['name'] == null){
mysqli_query($koneksi,"update tb_creche set 
harga = '$_POST[harga]',
ket1 = '$kett1',
ket2 = '$kett2',
ket3 = '$kett3',
ket4 = '$kett4',
tanggal = '$tanggal'
where id_tarif = '$_POST[idc]'
");
	}else{
		
mysqli_query($koneksi,"update tb_demar2 set judul = '$_POST[nama]',
judul2 = '$_POST[nama2]',
gambar = '$namaa',
short_desc = '$_POST[deskripsi]',
long_desc = '$_POST[long_deskripsi]'
where id_demar = '$_POST[idc]'
");		
		
	}


if($_FILES['image_link']['name'] == null){

?>

<script>
alert("Data berhasil di ubah <?php echo mysqli_error($koneksi); ?>");
location = "?p=r2_tb_ufe&id=<?php echo $_POST['idc2'] ?>&idc=<?php echo $_POST['idc3'] ?>";

</script>

<?php }else{ ?>

<script>
alert("Data berhasil di ubah <?php echo mysqli_error($koneksi); ?>");
location = "?p=rincian&id=<?php echo $_POST['idc2'] ?>";

</script>


<?php } ?>

<?php 
 } 
}
 ?>
    <div class="table-responsive" style="padding:5px;">
        <table class="table table-striped w-100 dt-responsive nowrap" id="dataTable">
            <thead>
                <tr>
                    <th>No. </th>
                    <th>Paket</th>
                    <th>Periode</th>

                  <th>Harga</th>
				  <th>Ket 1</th>
				  <th>Ket 2</th>
				  <th>Ket 3</th>
				  <th>Ket 4</th>
				  
                    <th>Opsi</th>
                </tr>
            </thead>
            <tbody>
            <?php 
            $no = 1;
            while($kj2 = mysqli_fetch_array($kj)){
            $idd = $kj2['id_tarif'];
            ?>

			                                        <tr>
                            <td><?php echo $no; ?></td>
                            <td><?php echo $kj2['paket'] ?></td>
                            <td><?php echo $kj2['periode'] ?></td>
							<td><?php echo $kj2['harga'] ?></td>
                            <td><?php echo $kj2['ket1'] ?></td>
							<td><?php echo $kj2['ket2'] ?></td>
							<td><?php echo $kj2['ket3'] ?></td>
							<td><?php echo $kj2['ket4'] ?></td>
							<td>


                                <a data-toggle="modal" data-target="#modal-lg_<?php echo $idd ?>" href="" class="btn btn-warning btn-circle btn-sm"><i class="fa fa-edit"></i></a>

                             <!--   <a href="?p=rincian2&id=<?php echo $idd ?>" class="btn btn-primary btn-circle btn-sm">Lebih lanjut
                                &nbsp;&nbsp;&nbsp;
                                <i class="fa fa-edit"></i></a>
								-->
								
								
								<!-- <a href="hapustbdemar2.php?id=<?php echo $idd ?>&idc=<?php echo $_GET['id'] ?>" class="btn btn-danger btn-circle btn-sm">Hapus
                                &nbsp;&nbsp;&nbsp;
                                <i class="fa fa-trash"></i></a>
-->

                            </td>
                        </tr
                        >
						
						
			  <div class="modal fade" id="modal-lg_<?php echo $idd; ?>">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
<?php 
$rt = mysqli_query($koneksi,"select * from tb_demar2 where id_demar = '$idd'");
$rt2 = mysqli_fetch_array($rt);
?>

              <h4 class="modal-title">15. Edit <?php echo $rt2['judul2'] ?></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
						



			<form method="POST" enctype="multipart/form-data" >
            <div class="modal-body" style="overflow:scroll;height:70vh">

			
			
			
			<!--			
			<center>
							<img src="https://ufe-section-indonesie.org/ufeapp/images/menu/<?php echo $kj2['gambar'] ?>"  style="width:200px;" />
			</center> 
			
		<input onchange="readURL<?php echo $idd; ?>(this);" type="file" name="image_link" class="form-control"/>
			</a><br>
			<center>
			<i><font style="font-size:10px;">* mode kamera landscape
			</font></i><br><img src="" id="product_image<?php echo $idd; ?>" style="width:1px;height:1px;" name="product_image<?php echo $idd; ?>" class="img-thumbnail">
			</center>
							  <script>
  function readURL<?php echo $idd; ?>(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#product_image<?php echo $idd; ?>')
                .attr('src', e.target.result)
                .width(100)
				.height(100);
        };

        reader.readAsDataURL(input.files[0]);
    }
		
  }
</script>	

-->
	
             <div class="input-group mb-3" style="margin-top:10px;">
                  <div class="input-group-prepend">
                    <span class="input-group-text" style="width:120px;">Ket. 1</span>
                  </div>
				  
				  
				  <input type="hidden" name="unik" value="430992371602c6b5423c26.png" />
          <input type="hidden" name="idc2" value="<?php echo $_GET['id'] ?>" />
		     <input type="hidden" name="idc3" value="<?php echo $_GET['idc'] ?>" />
                  <input type="hidden" name="idc" value="<?php echo $idd ?>" />
                  <input type="text" name="nama" value="<?php echo $kj2['ket1'] ?>" class="form-control" placeholder="Nama" required>
                </div>
				


                <div class="input-group mb-3" style="margin-top:10px;">
                  <div class="input-group-prepend">
                    <span class="input-group-text" style="width:120px;">Harga</span>
                  </div>
			
                  <input type="text" name="harga" value="<?php echo $kj2['harga'] ?>" class="form-control" placeholder="" required>
                </div>
				
                <div class="input-group mb-3" style="margin-top:10px;">
                  <div class="input-group-prepend">
                    <span class="input-group-text" style="width:120px;">Ket. 2</span>
                  </div>
			
                  <input type="text" name="ket2" value="<?php echo $kj2['ket2'] ?>" class="form-control" placeholder="" required>
                </div>
				
				 <div class="input-group mb-3" style="margin-top:10px;">
                  <div class="input-group-prepend">
                    <span class="input-group-text" style="width:120px;">Ket. 3</span>
                  </div>
			
                  <input type="text" name="ket3" value="<?php echo $kj2['ket3'] ?>" class="form-control" placeholder="" required>
                </div>
				
				
				 <div class="input-group mb-3" style="margin-top:10px;">
                  <div class="input-group-prepend">
                    <span class="input-group-text" style="width:120px;">Ket. 4</span>
                  </div>
			
                  <input type="text" name="ket4" value="<?php echo $kj2['ket4'] ?>" class="form-control" placeholder="" required>
                </div>
				<!-- <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" style="width:120px;">Kategori</span>
                  </div>
				  <select name="kategori" class="form-control" required>
                  <option value="23" >Jual Mesin Fotocopy</option>
				  					<option value="19" >Layanan Service</option>
										<option value="21" >Rental Mesin Fotocopy</option>
										<option value="25" >Spare part</option>
					                </select>
				</div> -->
            <!-- <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" style="width:120px;">Harga</span>
                  </div>
                  <input type="number" name="harga" value="8000000" class="form-control" placeholder="harga" required>
                </div>
				<div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" style="width:120px;">Short Desc</span>
                  </div>
                  <input type="text" name="short" value="XploitSec-ID" class="form-control" placeholder="Short Desc" required>
                </div> -->
				
				
				<!--  <div>
                Short Desc
               </div>
             
                <textarea class="form-control" name="deskripsi" placeholder="Place some text here"
              
                           required><?php echo $kj2['short_desc'] ?></textarea>
             
             <div style="margin-top:15px;">
                           Long Desc
                </div>
                <textarea class="form-control" name="long_deskripsi" placeholder="Place some text here"
              
                          ><?php echo $kj2['long_desc'] ?></textarea>
             
             -->
				
				
				
				
				
			</div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" name="updatekategori45" class="btn btn-primary">Save changes</button>
            </div>
			</form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>			
						
						
             <?php $no++;} ?>          
						
						
                                           
                                                </tbody>
        </table>
    </div>
</div>
	 </div>
</div>

<?php }else if($_GET['p'] == "r_tb_ufe"){ ?>

<div class="card shadow-sm border-bottom-primary">
    <div class="card-header bg-white py-3">
        <div class="row">
            <div class="col">
<?php 
include('../db.php');
$qw = mysqli_query($koneksi,"select * from tb_activites_jenis where id_jenis = '$_GET[id]'");
$qw2 = mysqli_fetch_array($qw);

$nama1 = str_replace("&petiksatu&","'",$qw2['nama']);
?>


                <h4 class="h5 align-middle m-0 font-weight-bold text-primary">
                    <?php echo $nama1 ?>                 </h4>
            </div>


      <div class="col-auto">
                <a href="" data-toggle="modal" data-target="#modaltambah" class="btn btn-sm btn-primary btn-icon-split">
                    <span class="icon">
                        <i class="fa fa-plus"></i>
                    </span>
                    <span class="text">

                       5. Tambah Data
                    </span>
                </a>
            </div>
			
			
			 <div class="modal fade" id="modaltambah">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Tambah Data (<?php echo $qw2['nama'] ?>)</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
           			
<?php 
if(isset($_POST['tambahproduk4'])){
if(($_POST['nama'])){

include('../db.php');






$maxDimW = 1000;
$maxDimH = 500;
list($width, $height, $type, $attr) = getimagesize( $_FILES['image_link']['tmp_name'] );
if ( $width > $maxDimW || $height > $maxDimH ) {
    $target_filename = $_FILES['image_link']['tmp_name'];
    $fn = $_FILES['image_link']['tmp_name'];
    $size = getimagesize( $fn );
    $ratio = $size[0]/$size[1]; // width/height
    //if( $ratio > 1) {
        $width = $maxDimW;
        $height = ($maxDimW / $size[0]) * $size[1];
    // } else {
    //     $width = $maxDimW*$ratio;
    //     $height = $maxDimH;
    // }
    $src = imagecreatefromstring(file_get_contents($fn));
    $dst = imagecreatetruecolor( $width, $height );
    imagecopyresampled($dst, $src, 0, 0, 0, 0, $width, $height, $size[0], $size[1] );

    imagejpeg($dst, $target_filename); // adjust format as needed


}

$namaa = $_FILES['image_link']['name'];

$nama1 = str_replace("'","&petiksatu&",$_POST['nama']);
$long_deskripsi1 = str_replace("'","&petiksatu&",$_POST['long_deskripsi']);
$instruktur1 = str_replace("'","&petiksatu&",$_POST['instruktur']);
$ket_instruktur1 = str_replace("'","&petiksatu&",$_POST['ket_instruktur']);


if($namaa == null){
mysqli_query($koneksi,"insert into tb_activites (
    id_jenis,
    judul,
    deskripsi,
    instruktur,
    ket_instruktur
    ) values
(
'$_POST[idc2]',
'$nama1,
'$long_deskripsi1',
'$instruktur1',
'$ket_instruktur1'
)
");
}else{
	
move_uploaded_file($_FILES['image_link']['tmp_name'],"../images/activites/".$_FILES['image_link']['name']);
mysqli_query($koneksi,"insert into tb_activites (
    gambar,
    id_jenis,
    judul,
    deskripsi,
    instruktur,
    ket_instruktur
    ) values
(
    '$namaa',
    '$_POST[idc2]',
    '$nama1,
    '$long_deskripsi1',
    '$instruktur1',
    '$ket_instruktur1'
    )
");	
}
?>
<script>
alert('Data berhasil ditambahkan<?php echo mysqli_error($koneksi); ?>');
location = "?p=r_tb_ufe&id=<?php echo $_POST['idc2'] ?>";
</script>



<?php }else{
?>
<script>
alert("gagal");
</script>
<?php
}

}//else{
  ?>
<!-- <script>
alert("gagal");
</script> -->
  <?php
//}


?>

			<form method="POST" enctype="multipart/form-data" >
            <div class="modal-body" style="height:70vh;overflow:scroll;">
						
			 <input onchange="readURLe(this);" type="file" name="image_link" class="form-control" />
			</a><br>
			<center>
			<i><font style="font-size:10px;">* mode kamera landscape
			</font></i><br><img src="" id="product_imagee" style="width:1px;height:1px;" name="product_imagee" class="img-thumbnail">
			</center>
							  <script>
  function readURLe(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#product_imagee')
                .attr('src', e.target.result)
                .width(100)
				.height(100);
        };

        reader.readAsDataURL(input.files[0]);
    }
		
  }
</script>	 
	
             <div class="input-group mb-3" style="margin-top:10px;">
                  <div class="input-group-prepend">
                    <span class="input-group-text" style="width:120px;">Nama</span>
                  </div>

                  <input type="hidden" name="idc2" value="<?php echo $_GET['id'] ?>" />
                				  
				  
				  <input type="hidden" name="unik" value="578866556602c6b54236d7.png" />
                
                  <input type="text" name="nama" value="" class="form-control" placeholder="Nama" required>
                </div>


             <div class="input-group mb-3" style="margin-top:10px;">
                  <div class="input-group-prepend">
                    <span class="input-group-text" style="width:120px;">Instruktur</span>
                  </div>

                  <input type="text" name="instruktur" value="" class="form-control" placeholder="Instruktur" required>
                </div>
				
             <div class="input-group mb-3" style="margin-top:10px;">
                  <div class="input-group-prepend">
                    <span class="input-group-text" style="width:120px;">Ket. Instruktur</span>
                  </div>
                  <input type="text" name="ket_instruktur" value="" class="form-control" placeholder="Ket. Instruktur" required>
                </div>
				<!-- <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" style="width:120px;">Kategori</span>
                  </div>
				  <select name="kategori" class="form-control" required>
                  <option value="" >- kategori -</option>
				  					<option value="19" >Layanan Service</option>
										<option value="21" >Rental Mesin Fotocopy</option>
										<option value="23" >Jual Mesin Fotocopy</option>
										<option value="25" >Spare part</option>
					                </select>
				</div>
            <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" style="width:120px;">Harga</span>
                  </div>
                  <input type="number" name="harga" value="" class="form-control" placeholder="harga" required>
                </div>
				<div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" style="width:120px;">Short Desc</span>
                  </div>
                  <input type="text" name="short" value="" class="form-control" placeholder="Short Desc" required>
                </div>
				
				
				   -->
             
                          <div style="margin-top:15px">Deskripsi</div>        
                <textarea class="textarea" name="long_deskripsi" placeholder="Place some text here"
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" ></textarea>
             
          
				
				
				
				
				
			</div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" name="tambahproduk4" class="btn btn-primary">Add</button>
            </div>
			</form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>			
						
						
                                           
                   <?php 
                   include ('../db.php');
                   $kj = mysqli_query($koneksi,"select * from tb_activites where id_jenis = '$_GET[id]'");


                   ?>                            
     <?php 
if(isset($_POST['tambahjadwalac'])){

    
if(($_POST['nama'])){





$maxDimW = 1000;
$maxDimH = 500;
list($width, $height, $type, $attr) = getimagesize( $_FILES['image_link']['tmp_name'] );
if ( $width > $maxDimW || $height > $maxDimH ) {
    $target_filename = $_FILES['image_link']['tmp_name'];
    $fn = $_FILES['image_link']['tmp_name'];
    $size = getimagesize( $fn );
    $ratio = $size[0]/$size[1]; // width/height
    //if( $ratio > 1) {
        $width = $maxDimW;
        $height = ($maxDimW / $size[0]) * $size[1];
    // } else {
    //     $width = $maxDimW*$ratio;
    //     $height = $maxDimH;
    // }
    $src = imagecreatefromstring(file_get_contents($fn));
    $dst = imagecreatetruecolor( $width, $height );
    imagecopyresampled($dst, $src, 0, 0, 0, 0, $width, $height, $size[0], $size[1] );

    imagejpeg($dst, $target_filename); // adjust format as needed


}

$namaa = $_FILES['image_link']['name'];

move_uploaded_file($_FILES['image_link']['tmp_name'],"../images/activites/".$_FILES['image_link']['name']);

    
$nama1 = str_replace("'","&petiksatu&",$_POST['nama']);
$deskripsi1 = str_replace("'","&petiksatu&",$_POST['deskripsi']);


    if($_FILES['image_link']['name'] == null){
mysqli_query($koneksi," insert into tb_jadwal_program (
    id_activites,
    jadwal,
    keterangan
    ) values (
        '$_POST[idc]',
        '$nama1',
        '$deskripsi1'
)");
	}else{
		
mysqli_query($koneksi,"update tb_demar2 set 
judul = '$_POST[nama]',

gambar = '$namaa',
deskripsi = '$_POST[long_deskripsi]'
where id_activites = '$_POST[idc]'
");		
		
	}


if($_FILES['image_link']['name'] == null){

?>

<script>
alert("Data berhasil di tambahkan <?php echo mysqli_error($koneksi); ?>");
location = "?p=r_tb_ufe&id=<?php echo $_POST['idc2'] ?>";

</script>

<?php }else{ ?>

<script>
alert("Data berhasil di tambahkan <?php echo mysqli_error($koneksi); ?>");
location = "?p=r_tb_ufe&id=<?php echo $_POST['idc2'] ?>";

</script>


<?php } ?>

<?php 
 } 
}
 ?>
 
 
 
 
 
 
 
 
 
 
      <?php 
if(isset($_POST['updatekategori33'])){

    
if(($_POST['nama'])){





$maxDimW = 1000;
$maxDimH = 500;
list($width, $height, $type, $attr) = getimagesize( $_FILES['image_link']['tmp_name'] );
if ( $width > $maxDimW || $height > $maxDimH ) {
    $target_filename = $_FILES['image_link']['tmp_name'];
    $fn = $_FILES['image_link']['tmp_name'];
    $size = getimagesize( $fn );
    $ratio = $size[0]/$size[1]; // width/height
    //if( $ratio > 1) {
        $width = $maxDimW;
        $height = ($maxDimW / $size[0]) * $size[1];
    // } else {
    //     $width = $maxDimW*$ratio;
    //     $height = $maxDimH;
    // }
    $src = imagecreatefromstring(file_get_contents($fn));
    $dst = imagecreatetruecolor( $width, $height );
    imagecopyresampled($dst, $src, 0, 0, 0, 0, $width, $height, $size[0], $size[1] );

    imagejpeg($dst, $target_filename); // adjust format as needed


}

$namaa = $_FILES['image_link']['name'];



$nama1 = str_replace("'","&petiksatu&",$_POST['nama']);
$long_deskripsi1 = str_replace("'","&petiksatu&",$_POST['long_deskripsi']);
$instruktur1 = str_replace("'","&petiksatu&",$_POST['instruktur']);
$ket_instruktur1 = str_replace("'","&petiksatu&",$_POST['ket_instruktur']);



move_uploaded_file($_FILES['image_link']['tmp_name'],"../images/activites/".$_FILES['image_link']['name']);

    if($_FILES['image_link']['name'] == null){
mysqli_query($koneksi,"update tb_activites set 

judul = '$nama1',
deskripsi = '$long_deskripsi1',
instruktur = '$instruktur1',
ket_instruktur = '$ket_instruktur1'

where id_activites = '$_POST[idc]'
");
	}else{
		
mysqli_query($koneksi,"update tb_activites set 

judul = '$nama1',
deskripsi = '$long_deskripsi1',
instruktur = '$instruktur1',
ket_instruktur = '$ket_instruktur1',

gambar = '$namaa'

where id_activites = '$_POST[idc]'
");		
		
	}


if($_FILES['image_link']['name'] == null){

?>

<script>
alert("Data berhasil di ubah <?php echo mysqli_error($koneksi); ?>");
location = "?p=r_tb_ufe&id=<?php echo $_POST['idc2'] ?>";

</script>

<?php }else{ ?>

<script>
alert("Data berhasil di ubah <?php echo mysqli_error($koneksi); ?>");
location = "?p=r_tb_ufe&id=<?php echo $_POST['idc2'] ?>";

</script>


<?php } ?>

<?php 
 } 
}
 ?>
 
 
 
 
 
 
 
    <div class="table-responsive" style="padding:5px;">
        <table class="table table-striped w-100 dt-responsive nowrap" id="dataTable">
            <thead>
                <tr>
                    <th>No. </th>
                    <th>Nama</th>
               
                  <th>Deskripsi</th>
				  
                  <th>Instruktur</th>
				  <th>Ket Instruktur</th>
				  
                    <th>Opsi</th>
                </tr>
            </thead>
            <tbody>
            <?php 
            $no = 1;
            while($kj2 = mysqli_fetch_array($kj)){
            $idd = $kj2['id_activites'];
            ?>

			                                        <tr>
                            <td><?php echo $no; ?></td>
                            <td><?php echo $kj2['judul'] ?></td>
                        
							                            <td><?php echo $kj2['deskripsi'] ?></td>
        					                            <td><?php echo $kj2['instruktur'] ?></td>
        					                            <td><?php echo $kj2['ket_instruktur'] ?></td>
                            
							<td>

 <a data-toggle="modal" data-target="#modal-lg_<?php echo $idd ?>" href="" class="btn btn-warning btn-circle btn-sm"><i class="fa fa-edit"></i></a>
 <?php if($_GET['id'] == "3"){ ?>
  <a href="?p=r2_tb_ufe&id=<?php echo $idd ?>&idc=<?php echo $_GET['id'] ?>" class="btn btn-primary btn-circle btn-sm">Lebih Lanjut
                                &nbsp;&nbsp;&nbsp;
                                <i class="fa fa-edit"></i></a>
 <?php }else{ ?>
                                <a data-toggle="modal" data-target="#modal-tambah-lg_<?php echo $idd ?>" href="" class="btn btn-warning btn-circle btn-sm">
								Tambah Harga +</a>
								
   <a data-toggle="modal" data-target="#modal-tambah2-lg_<?php echo $idd ?>" href="" class="btn btn-warning btn-circle btn-sm">
								Tambah Jadwal +</a>
                              <!--  <a href="?p=r_tb_ufe&id=<?php //echo $idd ?>" class="btn btn-primary btn-circle btn-sm">Lebih lanjut
                                &nbsp;&nbsp;&nbsp;
                                <i class="fa fa-edit"></i></a>
								-->
								
								
								 <a href="hapustbactivites.php?id=<?php echo $idd ?>&idc=<?php echo $_GET['id'] ?>" class="btn btn-danger btn-circle btn-sm">Hapus
                                &nbsp;&nbsp;&nbsp;
                                <i class="fa fa-trash"></i></a>
 <?php } ?>

                            </td>
                        </tr
                        >
					<div class="modal fade" id="modal-tambah2-lg_<?php echo $idd; ?>">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
<?php 
$rt = mysqli_query($koneksi,"select * from tb_activites where id_jenis = '$_GET[id]'");
$rt2 = mysqli_fetch_array($rt);
?>

              <h4 class="modal-title">7. Tambah Jadwal <?php echo $rt2['judul'] ?></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
						



			<form method="POST" enctype="multipart/form-data" >
            <div class="modal-body" style="overflow:scroll;height:70vh">

			
			<fieldset>
			<?php 
	$re = mysqli_query($koneksi,"select * from tb_jadwal_program where id_activites = '$idd'");
			while($re2 = mysqli_fetch_array($re)){
			?>
			 <div class="row" style="border:1px #707070 solid;border-radius:10px;margin-left:10px;margin-right:10px;margin-bottom:3px;">
            <div class="col">

               
            <?php echo $re2['jadwal'] ?> | <?php echo $re2['keterangan'] ?>              
            </div>


      <div class="col-auto">
             
                    <a href="hapusjadwalactivites.php?id=<?php echo $re2['id_jadwal'] ?>&idc=<?php echo $_GET['id'] ?>">
					<span class="icon" class="btn btn-danger-sm">
                        <i class="fa fa-trash"></i>
                    </span>
                    </a>
              
            </div>
			</div>
			
			<?php } ?>
			
			</fieldset>
			<!--			
			<center>
							<img src="https://ufe-section-indonesie.org/ufeapp/images/activites/<?php //echo $kj2['gambar'] ?>"  style="width:200px;" />
			</center> 
			
		<input onchange="readURL<?php //echo $idd; ?>(this);" type="file" name="image_link" class="form-control"/>
			</a><br>
			<center>
			<i><font style="font-size:10px;">* mode kamera landscape
			</font></i><br><img src="" id="product_image<?php //echo $idd; ?>" style="width:1px;height:1px;" name="product_image<?php //echo $idd; ?>" class="img-thumbnail">
			</center>
							  <script>
  function readURL<?php //echo $idd; ?>(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#product_image<?php //echo $idd; ?>')
                .attr('src', e.target.result)
                .width(100)
				.height(100);
        };

        reader.readAsDataURL(input.files[0]);
    }
		
  }
</script>	
	-->
             <div class="input-group mb-3" style="margin-top:10px;">
                  <div class="input-group-prepend">
                    <span class="input-group-text" style="width:120px;">Jadwal</span>
                  </div>
				  
				  
				  <input type="hidden" name="unik" value="430992371602c6b5423c26.png" />
          <input type="hidden" name="idc2" value="<?php echo $_GET['id'] ?>" />
                  <input type="hidden" name="idc" value="<?php echo $idd ?>" />
                  <input type="text" name="nama" value="" class="form-control" placeholder="Jadwal" required>
                </div>
				

				
				             <div class="input-group mb-3" style="margin-top:10px;">
                  <div class="input-group-prepend">
                    <span class="input-group-text" style="width:120px;">Ket</span>
                  </div>
				  
				  
                  <input type="text" name="deskripsi" value="" class="form-control" placeholder="Keterangan" required>
                </div>
<!--
                <div class="input-group mb-3" style="margin-top:10px;">
                  <div class="input-group-prepend">
                    <span class="input-group-text" style="width:120px;">Nama (Tablayout)</span>
                  </div>
				  
				  
				  <input type="hidden" name="unik" value="430992371602c6b5423c26.png" />
                  <input type="hidden" name="idc" value="<?php //echo $idd ?>" />
                  <input type="text" name="nama2" value="<?php //echo $kj2['judul2'] ?>" class="form-control" placeholder="Nama (Tablayout)" required>
                </div> -->
				<!-- <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" style="width:120px;">Kategori</span>
                  </div>
				  <select name="kategori" class="form-control" required>
                  <option value="23" >Jual Mesin Fotocopy</option>
				  					<option value="19" >Layanan Service</option>
										<option value="21" >Rental Mesin Fotocopy</option>
										<option value="25" >Spare part</option>
					                </select>
				</div> -->
            <!-- <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" style="width:120px;">Harga</span>
                  </div>
                  <input type="number" name="harga" value="8000000" class="form-control" placeholder="harga" required>
                </div>
				<div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" style="width:120px;">Short Desc</span>
                  </div>
                  <input type="text" name="short" value="XploitSec-ID" class="form-control" placeholder="Short Desc" required>
                </div> -->
				
				
				  <!--<div>
                Short Desc
               </div>-->
                <!-- <textarea class="textarea" name="deskripsi" placeholder="Place some text here" -->
             <!--   <textarea class="form-control" name="deskripsi" placeholder="Place some text here"
              
                           required><?php //echo $kj2['short_desc'] ?></textarea>
             -->
             <!--<div style="margin-top:15px;">
                           Deskripsi
                </div>-->
                <!-- <textarea class="textarea" name="deskripsi" placeholder="Place some text here" -->
               <!-- <textarea class="textarea" name="long_deskripsi" placeholder="Place some text here"
              
                          ><?php //echo $kj2['deskripsi'] ?></textarea>
             -->
             
				
				
				
				
				
			</div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" name="tambahjadwalac" class="btn btn-primary">Add</button>
            </div>
			</form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>		
			 	
			  <div class="modal fade" id="modal-tambah-lg_<?php echo $idd; ?>">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
<?php 
$rt = mysqli_query($koneksi,"select * from tb_activites where id_jenis = '$idd'");
$rt2 = mysqli_fetch_array($rt);
?>

              <h4 class="modal-title">7. Tambah Harga <?php echo $rt2['judul'] ?></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
						



			<form method="POST" enctype="multipart/form-data" >
            <div class="modal-body" style="overflow:scroll;height:70vh">

			
			<fieldset>
			<?php 
	$re = mysqli_query($koneksi,"select * from tb_harga_program where id_activites = '$idd'");
			while($re2 = mysqli_fetch_array($re)){
			?>
			 <div class="row" style="border:1px #707070 solid;border-radius:10px;margin-left:10px;margin-right:10px;margin-bottom:3px;">
            <div class="col">

               
              Rp. <?php echo number_format($re2['harga'],0,',','.') ?> | <?php echo $re2['keterangan'] ?>              
            </div>


      <div class="col-auto">
             
                    <a href="hapushargaactivites.php?id=<?php echo $re2['id_harga'] ?>&idc=<?php echo $_GET['id'] ?>">
					<span class="icon" class="btn btn-danger-sm">
                        <i class="fa fa-trash"></i>
                    </span>
                    </a>
              
            </div>
			</div>
			
			<?php } ?>
			
			</fieldset>
			<!--			
			<center>
							<img src="https://ufe-section-indonesie.org/ufeapp/images/activites/<?php //echo $kj2['gambar'] ?>"  style="width:200px;" />
			</center> 
			
		<input onchange="readURL<?php //echo $idd; ?>(this);" type="file" name="image_link" class="form-control"/>
			</a><br>
			<center>
			<i><font style="font-size:10px;">* mode kamera landscape
			</font></i><br><img src="" id="product_image<?php //echo $idd; ?>" style="width:1px;height:1px;" name="product_image<?php //echo $idd; ?>" class="img-thumbnail">
			</center>
							  <script>
  function readURL<?php //echo $idd; ?>(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#product_image<?php //echo $idd; ?>')
                .attr('src', e.target.result)
                .width(100)
				.height(100);
        };

        reader.readAsDataURL(input.files[0]);
    }
		
  }
</script>	
	-->
             <div class="input-group mb-3" style="margin-top:10px;">
                  <div class="input-group-prepend">
                    <span class="input-group-text" style="width:120px;">Harga</span>
                  </div>
				  
				  
				  <input type="hidden" name="unik" value="430992371602c6b5423c26.png" />
          <input type="hidden" name="idc2" value="<?php echo $_GET['id'] ?>" />
                  <input type="hidden" name="idc" value="<?php echo $idd ?>" />
                  <input type="number" name="nama" value="<?php echo $kj2['judul'] ?>" class="form-control" placeholder="Harga" required>
                </div>
				

				
				             <div class="input-group mb-3" style="margin-top:10px;">
                  <div class="input-group-prepend">
                    <span class="input-group-text" style="width:120px;">Ket</span>
                  </div>
				  
				  
                  <input type="text" name="deskripsi" value="" class="form-control" placeholder="Keterangan" required>
                </div>
<!--
                <div class="input-group mb-3" style="margin-top:10px;">
                  <div class="input-group-prepend">
                    <span class="input-group-text" style="width:120px;">Nama (Tablayout)</span>
                  </div>
				  
				  
				  <input type="hidden" name="unik" value="430992371602c6b5423c26.png" />
                  <input type="hidden" name="idc" value="<?php //echo $idd ?>" />
                  <input type="text" name="nama2" value="<?php //echo $kj2['judul2'] ?>" class="form-control" placeholder="Nama (Tablayout)" required>
                </div> -->
				<!-- <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" style="width:120px;">Kategori</span>
                  </div>
				  <select name="kategori" class="form-control" required>
                  <option value="23" >Jual Mesin Fotocopy</option>
				  					<option value="19" >Layanan Service</option>
										<option value="21" >Rental Mesin Fotocopy</option>
										<option value="25" >Spare part</option>
					                </select>
				</div> -->
            <!-- <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" style="width:120px;">Harga</span>
                  </div>
                  <input type="number" name="harga" value="8000000" class="form-control" placeholder="harga" required>
                </div>
				<div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" style="width:120px;">Short Desc</span>
                  </div>
                  <input type="text" name="short" value="XploitSec-ID" class="form-control" placeholder="Short Desc" required>
                </div> -->
				
				
				  <!--<div>
                Short Desc
               </div>-->
                <!-- <textarea class="textarea" name="deskripsi" placeholder="Place some text here" -->
             <!--   <textarea class="form-control" name="deskripsi" placeholder="Place some text here"
              
                           required><?php //echo $kj2['short_desc'] ?></textarea>
             -->
             <!--<div style="margin-top:15px;">
                           Deskripsi
                </div>-->
                <!-- <textarea class="textarea" name="deskripsi" placeholder="Place some text here" -->
               <!-- <textarea class="textarea" name="long_deskripsi" placeholder="Place some text here"
              
                          ><?php //echo $kj2['deskripsi'] ?></textarea>
             -->
             
				
				
				
				
				
			</div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" name="tambahhargaac" class="btn btn-primary">Add</button>
            </div>
			</form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>		
			 
			 <div class="modal fade" id="modal-lg_<?php echo $idd; ?>">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
<?php 
$rt = mysqli_query($koneksi,"select * from tb_activites where id_jenis = '$idd'");
$rt2 = mysqli_fetch_array($rt);
?>

              <h4 class="modal-title">6. Edit <?php echo $rt2['judul'] ?></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
						



			<form method="POST" enctype="multipart/form-data" >
            <div class="modal-body" style="overflow:scroll;height:70vh">

			
			
			
						
			<center>
							<img src="https://ufe-section-indonesie.org/ufeapp/images/activites/<?php echo $kj2['gambar'] ?>"  style="width:200px;" />
			</center> 
			
		<input onchange="readURL<?php echo $idd; ?>(this);" type="file" name="image_link" class="form-control"/>
			</a><br>
			<center>
			<i><font style="font-size:10px;">* mode kamera landscape
			</font></i><br><img src="" id="product_image<?php echo $idd; ?>" style="width:1px;height:1px;" name="product_image<?php echo $idd; ?>" class="img-thumbnail">
			</center>
							  <script>
  function readURL<?php echo $idd; ?>(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#product_image<?php echo $idd; ?>')
                .attr('src', e.target.result)
                .width(100)
				.height(100);
        };

        reader.readAsDataURL(input.files[0]);
    }
		
  }
</script>	
	
             <div class="input-group mb-3" style="margin-top:10px;">
                  <div class="input-group-prepend">
                    <span class="input-group-text" style="width:120px;">Nama</span>
                  </div>
				  
				  
				  <input type="hidden" name="unik" value="430992371602c6b5423c26.png" />
          <input type="hidden" name="idc2" value="<?php echo $_GET['id'] ?>" />
                  <input type="hidden" name="idc" value="<?php echo $idd ?>" />
                  <input type="text" name="nama" value="<?php echo $kj2['judul'] ?>" class="form-control" placeholder="Nama" required>
                </div>
				
				
				
             <div class="input-group mb-3" style="margin-top:10px;">
                  <div class="input-group-prepend">
                    <span class="input-group-text" style="width:120px;">Instruktur</span>
                  </div>
				  
				  
		          <input type="text" name="instruktur" value="<?php echo $kj2['instruktur'] ?>"
				  class="form-control" placeholder="Instruktur" required>
                </div>
				
				
				
             <div class="input-group mb-3" style="margin-top:10px;">
                  <div class="input-group-prepend">
                    <span class="input-group-text" style="width:120px;">Ket. Instruktur</span>
                  </div>
				  
				  
		          <input type="text" name="ket_instruktur" value="<?php echo $kj2['ket_instruktur'] ?>"
				  class="form-control" placeholder="Ket. Instruktur" required>
                </div>
				

<!--
                <div class="input-group mb-3" style="margin-top:10px;">
                  <div class="input-group-prepend">
                    <span class="input-group-text" style="width:120px;">Nama (Tablayout)</span>
                  </div>
				  
				  
				  <input type="hidden" name="unik" value="430992371602c6b5423c26.png" />
                  <input type="hidden" name="idc" value="<?php //echo $idd ?>" />
                  <input type="text" name="nama2" value="<?php //echo $kj2['judul2'] ?>" class="form-control" placeholder="Nama (Tablayout)" required>
                </div> -->
				<!-- <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" style="width:120px;">Kategori</span>
                  </div>
				  <select name="kategori" class="form-control" required>
                  <option value="23" >Jual Mesin Fotocopy</option>
				  					<option value="19" >Layanan Service</option>
										<option value="21" >Rental Mesin Fotocopy</option>
										<option value="25" >Spare part</option>
					                </select>
				</div> -->
            <!-- <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" style="width:120px;">Harga</span>
                  </div>
                  <input type="number" name="harga" value="8000000" class="form-control" placeholder="harga" required>
                </div>
				<div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" style="width:120px;">Short Desc</span>
                  </div>
                  <input type="text" name="short" value="XploitSec-ID" class="form-control" placeholder="Short Desc" required>
                </div> -->
				
				
				  <!--<div>
                Short Desc
               </div>-->
                <!-- <textarea class="textarea" name="deskripsi" placeholder="Place some text here" -->
             <!--   <textarea class="form-control" name="deskripsi" placeholder="Place some text here"
              
                           required><?php //echo $kj2['short_desc'] ?></textarea>
             -->
             <div style="margin-top:15px;">
                           Deskripsi
                </div>
                <!-- <textarea class="textarea" name="deskripsi" placeholder="Place some text here" -->
                <textarea class="textarea" name="long_deskripsi" placeholder="Place some text here"
              
                          ><?php echo $kj2['deskripsi'] ?></textarea>
             
             
				
				
				
				
				
			</div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" name="updatekategori33" class="btn btn-primary">Save changes</button>
            </div>
			</form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>			
						
						
             <?php $no++;} ?>          
						
						
                                           
                                                </tbody>
        </table>
    </div>
</div>
	 </div>
</div>


<?php }else if($_GET['p'] == "testable"){ ?>

   
    <div class="card shadow-sm border-bottom-primary">
    <div class="card-header bg-white py-3">
        <div class="row">
            <div class="col">
               <ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item"><a href="?p=tb_dm_1">Home</a></li>
              <li class="breadcrumb-item active">Tes table</li>
                            </ol>
            </div>
</div>
</div>

 <table id="example23" class="display responsive nowrap" style="width:100%">
        <thead>
            <tr>
                <th>First name</th>
                <th>Last name</th>
                <th>Position</th>
                <th>Office</th>
                <th>Age</th>
                <th>Start date</th>
                <th>Salary</th>
                <th>Extn.</th>
                <th>E-mail</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Tiger</td>
                <td>Nixon</td>
                <td>System Architect</td>
                <td>Edinburgh</td>
                <td>61</td>
                <td>2011/04/25</td>
                <td>$320,800</td>
                <td>5421</td>
                <td>t.nixon@datatables.net</td>
            </tr>
            <tr>
                <td>Garrett</td>
                <td>Winters</td>
                <td>Accountant</td>
                <td>Tokyo</td>
                <td>63</td>
                <td>2011/07/25</td>
                <td>$170,750</td>
                <td>8422</td>
                <td>g.winters@datatables.net</td>
            </tr>
            <tr>
                <td>Ashton</td>
                <td>Cox</td>
                <td>Junior Technical Author</td>
                <td>San Francisco</td>
                <td>66</td>
                <td>2009/01/12</td>
                <td>$86,000</td>
                <td>1562</td>
                <td>a.cox@datatables.net</td>
            </tr>
            <tr>
                <td>Cedric</td>
                <td>Kelly</td>
                <td>Senior Javascript Developer</td>
                <td>Edinburgh</td>
                <td>22</td>
                <td>2012/03/29</td>
                <td>$433,060</td>
                <td>6224</td>
                <td>c.kelly@datatables.net</td>
            </tr>
            <tr>
                <td>Airi</td>
                <td>Satou</td>
                <td>Accountant</td>
                <td>Tokyo</td>
                <td>33</td>
                <td>2008/11/28</td>
                <td>$162,700</td>
                <td>5407</td>
                <td>a.satou@datatables.net</td>
            </tr>
            <tr>
                <td>Brielle</td>
                <td>Williamson</td>
                <td>Integration Specialist</td>
                <td>New York</td>
                <td>61</td>
                <td>2012/12/02</td>
                <td>$372,000</td>
                <td>4804</td>
                <td>b.williamson@datatables.net</td>
            </tr>
            <tr>
                <td>Herrod</td>
                <td>Chandler</td>
                <td>Sales Assistant</td>
                <td>San Francisco</td>
                <td>59</td>
                <td>2012/08/06</td>
                <td>$137,500</td>
                <td>9608</td>
                <td>h.chandler@datatables.net</td>
            </tr>
            <tr>
                <td>Rhona</td>
                <td>Davidson</td>
                <td>Integration Specialist</td>
                <td>Tokyo</td>
                <td>55</td>
                <td>2010/10/14</td>
                <td>$327,900</td>
                <td>6200</td>
                <td>r.davidson@datatables.net</td>
            </tr>
            <tr>
                <td>Colleen</td>
                <td>Hurst</td>
                <td>Javascript Developer</td>
                <td>San Francisco</td>
                <td>39</td>
                <td>2009/09/15</td>
                <td>$205,500</td>
                <td>2360</td>
                <td>c.hurst@datatables.net</td>
            </tr>
            <tr>
                <td>Sonya</td>
                <td>Frost</td>
                <td>Software Engineer</td>
                <td>Edinburgh</td>
                <td>23</td>
                <td>2008/12/13</td>
                <td>$103,600</td>
                <td>1667</td>
                <td>s.frost@datatables.net</td>
            </tr>
            <tr>
                <td>Jena</td>
                <td>Gaines</td>
                <td>Office Manager</td>
                <td>London</td>
                <td>30</td>
                <td>2008/12/19</td>
                <td>$90,560</td>
                <td>3814</td>
                <td>j.gaines@datatables.net</td>
            </tr>
            <tr>
                <td>Quinn</td>
                <td>Flynn</td>
                <td>Support Lead</td>
                <td>Edinburgh</td>
                <td>22</td>
                <td>2013/03/03</td>
                <td>$342,000</td>
                <td>9497</td>
                <td>q.flynn@datatables.net</td>
            </tr>
            <tr>
                <td>Charde</td>
                <td>Marshall</td>
                <td>Regional Director</td>
                <td>San Francisco</td>
                <td>36</td>
                <td>2008/10/16</td>
                <td>$470,600</td>
                <td>6741</td>
                <td>c.marshall@datatables.net</td>
            </tr>
            <tr>
                <td>Haley</td>
                <td>Kennedy</td>
                <td>Senior Marketing Designer</td>
                <td>London</td>
                <td>43</td>
                <td>2012/12/18</td>
                <td>$313,500</td>
                <td>3597</td>
                <td>h.kennedy@datatables.net</td>
            </tr>
            <tr>
                <td>Tatyana</td>
                <td>Fitzpatrick</td>
                <td>Regional Director</td>
                <td>London</td>
                <td>19</td>
                <td>2010/03/17</td>
                <td>$385,750</td>
                <td>1965</td>
                <td>t.fitzpatrick@datatables.net</td>
            </tr>
            <tr>
                <td>Michael</td>
                <td>Silva</td>
                <td>Marketing Designer</td>
                <td>London</td>
                <td>66</td>
                <td>2012/11/27</td>
                <td>$198,500</td>
                <td>1581</td>
                <td>m.silva@datatables.net</td>
            </tr>
            <tr>
                <td>Paul</td>
                <td>Byrd</td>
                <td>Chief Financial Officer (CFO)</td>
                <td>New York</td>
                <td>64</td>
                <td>2010/06/09</td>
                <td>$725,000</td>
                <td>3059</td>
                <td>p.byrd@datatables.net</td>
            </tr>
            <tr>
                <td>Gloria</td>
                <td>Little</td>
                <td>Systems Administrator</td>
                <td>New York</td>
                <td>59</td>
                <td>2009/04/10</td>
                <td>$237,500</td>
                <td>1721</td>
                <td>g.little@datatables.net</td>
            </tr>
            <tr>
                <td>Bradley</td>
                <td>Greer</td>
                <td>Software Engineer</td>
                <td>London</td>
                <td>41</td>
                <td>2012/10/13</td>
                <td>$132,000</td>
                <td>2558</td>
                <td>b.greer@datatables.net</td>
            </tr>
            <tr>
                <td>Dai</td>
                <td>Rios</td>
                <td>Personnel Lead</td>
                <td>Edinburgh</td>
                <td>35</td>
                <td>2012/09/26</td>
                <td>$217,500</td>
                <td>2290</td>
                <td>d.rios@datatables.net</td>
            </tr>
            <tr>
                <td>Jenette</td>
                <td>Caldwell</td>
                <td>Development Lead</td>
                <td>New York</td>
                <td>30</td>
                <td>2011/09/03</td>
                <td>$345,000</td>
                <td>1937</td>
                <td>j.caldwell@datatables.net</td>
            </tr>
            <tr>
                <td>Yuri</td>
                <td>Berry</td>
                <td>Chief Marketing Officer (CMO)</td>
                <td>New York</td>
                <td>40</td>
                <td>2009/06/25</td>
                <td>$675,000</td>
                <td>6154</td>
                <td>y.berry@datatables.net</td>
            </tr>
            <tr>
                <td>Caesar</td>
                <td>Vance</td>
                <td>Pre-Sales Support</td>
                <td>New York</td>
                <td>21</td>
                <td>2011/12/12</td>
                <td>$106,450</td>
                <td>8330</td>
                <td>c.vance@datatables.net</td>
            </tr>
            <tr>
                <td>Doris</td>
                <td>Wilder</td>
                <td>Sales Assistant</td>
                <td>Sydney</td>
                <td>23</td>
                <td>2010/09/20</td>
                <td>$85,600</td>
                <td>3023</td>
                <td>d.wilder@datatables.net</td>
            </tr>
            <tr>
                <td>Angelica</td>
                <td>Ramos</td>
                <td>Chief Executive Officer (CEO)</td>
                <td>London</td>
                <td>47</td>
                <td>2009/10/09</td>
                <td>$1,200,000</td>
                <td>5797</td>
                <td>a.ramos@datatables.net</td>
            </tr>
            <tr>
                <td>Gavin</td>
                <td>Joyce</td>
                <td>Developer</td>
                <td>Edinburgh</td>
                <td>42</td>
                <td>2010/12/22</td>
                <td>$92,575</td>
                <td>8822</td>
                <td>g.joyce@datatables.net</td>
            </tr>
            <tr>
                <td>Jennifer</td>
                <td>Chang</td>
                <td>Regional Director</td>
                <td>Singapore</td>
                <td>28</td>
                <td>2010/11/14</td>
                <td>$357,650</td>
                <td>9239</td>
                <td>j.chang@datatables.net</td>
            </tr>
            <tr>
                <td>Brenden</td>
                <td>Wagner</td>
                <td>Software Engineer</td>
                <td>San Francisco</td>
                <td>28</td>
                <td>2011/06/07</td>
                <td>$206,850</td>
                <td>1314</td>
                <td>b.wagner@datatables.net</td>
            </tr>
            <tr>
                <td>Fiona</td>
                <td>Green</td>
                <td>Chief Operating Officer (COO)</td>
                <td>San Francisco</td>
                <td>48</td>
                <td>2010/03/11</td>
                <td>$850,000</td>
                <td>2947</td>
                <td>f.green@datatables.net</td>
            </tr>
            <tr>
                <td>Shou</td>
                <td>Itou</td>
                <td>Regional Marketing</td>
                <td>Tokyo</td>
                <td>20</td>
                <td>2011/08/14</td>
                <td>$163,000</td>
                <td>8899</td>
                <td>s.itou@datatables.net</td>
            </tr>
            <tr>
                <td>Michelle</td>
                <td>House</td>
                <td>Integration Specialist</td>
                <td>Sydney</td>
                <td>37</td>
                <td>2011/06/02</td>
                <td>$95,400</td>
                <td>2769</td>
                <td>m.house@datatables.net</td>
            </tr>
            <tr>
                <td>Suki</td>
                <td>Burks</td>
                <td>Developer</td>
                <td>London</td>
                <td>53</td>
                <td>2009/10/22</td>
                <td>$114,500</td>
                <td>6832</td>
                <td>s.burks@datatables.net</td>
            </tr>
            <tr>
                <td>Prescott</td>
                <td>Bartlett</td>
                <td>Technical Author</td>
                <td>London</td>
                <td>27</td>
                <td>2011/05/07</td>
                <td>$145,000</td>
                <td>3606</td>
                <td>p.bartlett@datatables.net</td>
            </tr>
            <tr>
                <td>Gavin</td>
                <td>Cortez</td>
                <td>Team Leader</td>
                <td>San Francisco</td>
                <td>22</td>
                <td>2008/10/26</td>
                <td>$235,500</td>
                <td>2860</td>
                <td>g.cortez@datatables.net</td>
            </tr>
            <tr>
                <td>Martena</td>
                <td>Mccray</td>
                <td>Post-Sales support</td>
                <td>Edinburgh</td>
                <td>46</td>
                <td>2011/03/09</td>
                <td>$324,050</td>
                <td>8240</td>
                <td>m.mccray@datatables.net</td>
            </tr>
            <tr>
                <td>Unity</td>
                <td>Butler</td>
                <td>Marketing Designer</td>
                <td>San Francisco</td>
                <td>47</td>
                <td>2009/12/09</td>
                <td>$85,675</td>
                <td>5384</td>
                <td>u.butler@datatables.net</td>
            </tr>
            <tr>
                <td>Howard</td>
                <td>Hatfield</td>
                <td>Office Manager</td>
                <td>San Francisco</td>
                <td>51</td>
                <td>2008/12/16</td>
                <td>$164,500</td>
                <td>7031</td>
                <td>h.hatfield@datatables.net</td>
            </tr>
            <tr>
                <td>Hope</td>
                <td>Fuentes</td>
                <td>Secretary</td>
                <td>San Francisco</td>
                <td>41</td>
                <td>2010/02/12</td>
                <td>$109,850</td>
                <td>6318</td>
                <td>h.fuentes@datatables.net</td>
            </tr>
            <tr>
                <td>Vivian</td>
                <td>Harrell</td>
                <td>Financial Controller</td>
                <td>San Francisco</td>
                <td>62</td>
                <td>2009/02/14</td>
                <td>$452,500</td>
                <td>9422</td>
                <td>v.harrell@datatables.net</td>
            </tr>
            <tr>
                <td>Timothy</td>
                <td>Mooney</td>
                <td>Office Manager</td>
                <td>London</td>
                <td>37</td>
                <td>2008/12/11</td>
                <td>$136,200</td>
                <td>7580</td>
                <td>t.mooney@datatables.net</td>
            </tr>
            <tr>
                <td>Jackson</td>
                <td>Bradshaw</td>
                <td>Director</td>
                <td>New York</td>
                <td>65</td>
                <td>2008/09/26</td>
                <td>$645,750</td>
                <td>1042</td>
                <td>j.bradshaw@datatables.net</td>
            </tr>
            <tr>
                <td>Olivia</td>
                <td>Liang</td>
                <td>Support Engineer</td>
                <td>Singapore</td>
                <td>64</td>
                <td>2011/02/03</td>
                <td>$234,500</td>
                <td>2120</td>
                <td>o.liang@datatables.net</td>
            </tr>
            <tr>
                <td>Bruno</td>
                <td>Nash</td>
                <td>Software Engineer</td>
                <td>London</td>
                <td>38</td>
                <td>2011/05/03</td>
                <td>$163,500</td>
                <td>6222</td>
                <td>b.nash@datatables.net</td>
            </tr>
            <tr>
                <td>Sakura</td>
                <td>Yamamoto</td>
                <td>Support Engineer</td>
                <td>Tokyo</td>
                <td>37</td>
                <td>2009/08/19</td>
                <td>$139,575</td>
                <td>9383</td>
                <td>s.yamamoto@datatables.net</td>
            </tr>
            <tr>
                <td>Thor</td>
                <td>Walton</td>
                <td>Developer</td>
                <td>New York</td>
                <td>61</td>
                <td>2013/08/11</td>
                <td>$98,540</td>
                <td>8327</td>
                <td>t.walton@datatables.net</td>
            </tr>
            <tr>
                <td>Finn</td>
                <td>Camacho</td>
                <td>Support Engineer</td>
                <td>San Francisco</td>
                <td>47</td>
                <td>2009/07/07</td>
                <td>$87,500</td>
                <td>2927</td>
                <td>f.camacho@datatables.net</td>
            </tr>
            <tr>
                <td>Serge</td>
                <td>Baldwin</td>
                <td>Data Coordinator</td>
                <td>Singapore</td>
                <td>64</td>
                <td>2012/04/09</td>
                <td>$138,575</td>
                <td>8352</td>
                <td>s.baldwin@datatables.net</td>
            </tr>
            <tr>
                <td>Zenaida</td>
                <td>Frank</td>
                <td>Software Engineer</td>
                <td>New York</td>
                <td>63</td>
                <td>2010/01/04</td>
                <td>$125,250</td>
                <td>7439</td>
                <td>z.frank@datatables.net</td>
            </tr>
            <tr>
                <td>Zorita</td>
                <td>Serrano</td>
                <td>Software Engineer</td>
                <td>San Francisco</td>
                <td>56</td>
                <td>2012/06/01</td>
                <td>$115,000</td>
                <td>4389</td>
                <td>z.serrano@datatables.net</td>
            </tr>
            <tr>
                <td>Jennifer</td>
                <td>Acosta</td>
                <td>Junior Javascript Developer</td>
                <td>Edinburgh</td>
                <td>43</td>
                <td>2013/02/01</td>
                <td>$75,650</td>
                <td>3431</td>
                <td>j.acosta@datatables.net</td>
            </tr>
            <tr>
                <td>Cara</td>
                <td>Stevens</td>
                <td>Sales Assistant</td>
                <td>New York</td>
                <td>46</td>
                <td>2011/12/06</td>
                <td>$145,600</td>
                <td>3990</td>
                <td>c.stevens@datatables.net</td>
            </tr>
            <tr>
                <td>Hermione</td>
                <td>Butler</td>
                <td>Regional Director</td>
                <td>London</td>
                <td>47</td>
                <td>2011/03/21</td>
                <td>$356,250</td>
                <td>1016</td>
                <td>h.butler@datatables.net</td>
            </tr>
            <tr>
                <td>Lael</td>
                <td>Greer</td>
                <td>Systems Administrator</td>
                <td>London</td>
                <td>21</td>
                <td>2009/02/27</td>
                <td>$103,500</td>
                <td>6733</td>
                <td>l.greer@datatables.net</td>
            </tr>
            <tr>
                <td>Jonas</td>
                <td>Alexander</td>
                <td>Developer</td>
                <td>San Francisco</td>
                <td>30</td>
                <td>2010/07/14</td>
                <td>$86,500</td>
                <td>8196</td>
                <td>j.alexander@datatables.net</td>
            </tr>
            <tr>
                <td>Shad</td>
                <td>Decker</td>
                <td>Regional Director</td>
                <td>Edinburgh</td>
                <td>51</td>
                <td>2008/11/13</td>
                <td>$183,000</td>
                <td>6373</td>
                <td>s.decker@datatables.net</td>
            </tr>
            <tr>
                <td>Michael</td>
                <td>Bruce</td>
                <td>Javascript Developer</td>
                <td>Singapore</td>
                <td>29</td>
                <td>2011/06/27</td>
                <td>$183,000</td>
                <td>5384</td>
                <td>m.bruce@datatables.net</td>
            </tr>
            <tr>
                <td>Donna</td>
                <td>Snider</td>
                <td>Customer Support</td>
                <td>New York</td>
                <td>27</td>
                <td>2011/01/25</td>
                <td>$112,000</td>
                <td>4226</td>
                <td>d.snider@datatables.net</td>
            </tr>
        </tbody>
    </table>


 
</div>



<?php }else if($_GET['p'] == "rincian2"){
?>

<div class="card shadow-sm border-bottom-primary">
    <div class="card-header bg-white py-3">
        <div class="row">
            <div class="col">
<?php 
include('../db.php');
$qw = mysqli_query($koneksi,"select * from tb_demar2 where id_demar = '$_GET[id]' and visibility = '1'");
$qw2 = mysqli_fetch_array($qw);

$ep = mysqli_query($koneksi,"select * from tb_menu where id_menu = '$qw2[id_kategori]'");
$ep2 = mysqli_fetch_array($ep);
?>


               <ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item"><a href="?p=tb_dm_1">Home</a></li>
              <li class="breadcrumb-item"><a href="?p=tb_dm_1">Demarches</a></li>
              <li class="breadcrumb-item"><a href="?p=rincian&id=<?php echo $qw2['id_kategori'] ?>"><?php echo $ep2['nama_menu'] ?></a></li>
              <li class="breadcrumb-item active"><?php echo $qw2['judul2'] ?></li>
                            </ol>
            </div>


       <div class="col-auto">
                <a href="" data-toggle="modal" data-target="#modaltambah" class="btn btn-sm btn-primary btn-icon-split">
                    <span class="icon">
                        <i class="fa fa-plus"></i>
                    </span>
                    <span class="text">

                        2. Tambah Data
                    </span>
                </a>
            </div>
		<div class="col-auto">
                <a href="importdata.php?p=demar3&id=<?php echo $_GET['id'] ?>"  class="btn btn-sm btn-success btn-icon-split">
                    <span class="icon">
                        <i class="fa fa-plus"></i>
                    </span>
                    <span class="text">

                       2. Import Data
                    </span>
                </a>
            </div>
			
			 <div class="modal fade" id="modaltambah">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Tambah Data (<?php echo $qw2['judul2'] ?>)</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
           			
<?php 
if(isset($_POST['tambahproduk2'])){
if(($_POST['nama']) || ($_POST['deskripsi'])){

include('../db.php');






$maxDimW = 1000;
$maxDimH = 500;
list($width, $height, $type, $attr) = getimagesize( $_FILES['image_link']['tmp_name'] );
if ( $width > $maxDimW || $height > $maxDimH ) {
    $target_filename = $_FILES['image_link']['tmp_name'];
    $fn = $_FILES['image_link']['tmp_name'];
    $size = getimagesize( $fn );
    $ratio = $size[0]/$size[1]; // width/height
    //if( $ratio > 1) {
        $width = $maxDimW;
        $height = ($maxDimW / $size[0]) * $size[1];
    // } else {
    //     $width = $maxDimW*$ratio;
    //     $height = $maxDimH;
    // }
    $src = imagecreatefromstring(file_get_contents($fn));
    $dst = imagecreatetruecolor( $width, $height );
    imagecopyresampled($dst, $src, 0, 0, 0, 0, $width, $height, $size[0], $size[1] );

    imagejpeg($dst, $target_filename); // adjust format as needed


}

$namaa = $_FILES['image_link']['name'];

$nama1 = str_replace("'","&petiksatu&",$_POST['nama']);
$deskripsi1 = str_replace("'","&petiksatu&",$_POST['deskripsi']);
$long_deskripsi1 = str_replace("'","&petiksatu&",$_POST['long_deskripsi']);

 
if($namaa == null){
mysqli_query($koneksi,"insert into tb_demar3 (
    id_kategori,
    judul,
    judul2,
    short_desc,
    long_desc,
    ket2
    ) values
(
    '$_POST[idc2]',
    '$nama1',
    '$nama1',
    '$deskripsi1',
    '$long_deskripsi1',
    '1'
    )
");
}else{
	
move_uploaded_file($_FILES['image_link']['tmp_name'],"../images/menu/".$_FILES['image_link']['name']);
mysqli_query($koneksi,"insert into tb_demar3 (
    gambar,
    id_kategori,
    judul,
    judul2,
    short_desc,
    long_desc,
    ket2
    ) values
(
    '$namaa',
    '$_POST[idc2]',
    '$nama1',
    '$nama1',
    '$deskripsi1',
    '$long_deskripsi1',
    '1'
    )
");
}



?>
<script>
alert('Data berhasil ditambahkan<?php echo mysqli_error($koneksi); ?>');
location = "?p=rincian2&id=<?php echo $_POST['idc2'] ?>";
</script>



<?php }else{
?>
<script>
alert("gagal");
</script>
<?php
}

}//else{
  ?>
<!-- <script>
alert("gagal");
</script> -->
  <?php
//}


?>

			<form method="POST" enctype="multipart/form-data" >
            <div class="modal-body" style="height:70vh;overflow:scroll;">
						
	 <input onchange="readURLe(this);" type="file" name="image_link" class="form-control" />
			</a><br>
			<center>
			<i><font style="font-size:10px;">* mode kamera landscape
			</font></i><br><img src="" id="product_imagee" style="width:1px;height:1px;" name="product_imagee" class="img-thumbnail">
			</center>
							  <script>
  function readURLe(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#product_imagee')
                .attr('src', e.target.result)
                .width(100)
				.height(100);
        };

        reader.readAsDataURL(input.files[0]);
    }
		
  }
</script>	 
	
             <div class="input-group mb-3" style="margin-top:10px;">
                  <div class="input-group-prepend">
                    <span class="input-group-text" style="width:120px;">Nama</span>
                  </div>

                  <input type="hidden" name="idc2" value="<?php echo $_GET['id'] ?>" />
                				  
				  
				  <input type="hidden" name="unik" value="578866556602c6b54236d7.png" />
                
                  <input type="text" name="nama" value="" class="form-control" placeholder="Nama" required>
                </div>
<!-- 
                <div class="input-group mb-3" style="margin-top:10px;">
                  <div class="input-group-prepend">
                    <span class="input-group-text" style="width:120px;">Nama (Tablayout)</span>
                  </div>

                  <input type="text" name="nama2" value="" class="form-control" placeholder="Nama (Tablayout)" required>
                </div> -->

				<!-- <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" style="width:120px;">Kategori</span>
                  </div>
				  <select name="kategori" class="form-control" required>
                  <option value="" >- kategori -</option>
				  					<option value="19" >Layanan Service</option>
										<option value="21" >Rental Mesin Fotocopy</option>
										<option value="23" >Jual Mesin Fotocopy</option>
										<option value="25" >Spare part</option>
					                </select>
				</div>
            <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" style="width:120px;">Harga</span>
                  </div>
                  <input type="number" name="harga" value="" class="form-control" placeholder="harga" required>
                </div>
				<div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" style="width:120px;">Short Desc</span>
                  </div>
                  <input type="text" name="short" value="" class="form-control" placeholder="Short Desc" required>
                </div>
				
				
				   -->
        <div>Short Desc</div>        
                <textarea class="form-control" name="deskripsi" placeholder="Place some text here"
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" required></textarea>
             
             
                          <div style="margin-top:15px">Long Desc</div>        
                <textarea class="form-control" name="long_deskripsi" placeholder="Place some text here"
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" ></textarea>
             
          
				
				
				
				
				
			</div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" name="tambahproduk2" class="btn btn-primary">Add</button>
            </div>
			</form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>			
						
						
                                           
                   <?php 
                   include ('../db.php');
                   $kj = mysqli_query($koneksi,"select * from tb_demar3 where id_kategori = '$_GET[id]' and visibility = '1'");


                   ?>                            
     <?php 
if(isset($_POST['updatekategori'])){

    
if(($_POST['nama']) || ($_POST['deskripsi'])){



$maxDimW = 1000;
$maxDimH = 500;
list($width, $height, $type, $attr) = getimagesize( $_FILES['image_link']['tmp_name'] );
if ( $width > $maxDimW || $height > $maxDimH ) {
    $target_filename = $_FILES['image_link']['tmp_name'];
    $fn = $_FILES['image_link']['tmp_name'];
    $size = getimagesize( $fn );
    $ratio = $size[0]/$size[1]; // width/height
    //if( $ratio > 1) {
        $width = $maxDimW;
        $height = ($maxDimW / $size[0]) * $size[1];
    // } else {
    //     $width = $maxDimW*$ratio;
    //     $height = $maxDimH;
    // }
    $src = imagecreatefromstring(file_get_contents($fn));
    $dst = imagecreatetruecolor( $width, $height );
    imagecopyresampled($dst, $src, 0, 0, 0, 0, $width, $height, $size[0], $size[1] );

    imagejpeg($dst, $target_filename); // adjust format as needed


}

$namaa = $_FILES['image_link']['name'];

move_uploaded_file($_FILES['image_link']['tmp_name'],"../images/menu/".$_FILES['image_link']['name']);

$nama1 = str_replace("'","&petiksatu&",$_POST['nama']);
$deskripsi1 = str_replace("'","&petiksatu&",$_POST['deskripsi']);
$long_deskripsi1 = str_replace("'","&petiksatu&",$_POST['long_deskripsi']);


if($namaa == null){
 
mysqli_query($koneksi,"update tb_demar3 set 
judul = '$nama1',
judul2 = '$nama1',
short_desc = '$deskripsi1',
long_desc = '$long_deskripsi1'
where id_demar = '$_POST[idc]'
");
}else{
	
	
mysqli_query($koneksi,"update tb_demar3 set 
gambar = '$namaa',
judul = '$nama1',
judul2 = '$nama1',
short_desc = '$deskripsi1',
long_desc = '$long_deskripsi1'
where id_demar = '$_POST[idc]'
");
}

?>

<script>
alert("Data berhasil di ubah <?php echo mysqli_error($koneksi); ?>");
location = "?p=rincian2&id=<?php echo $_POST['idc2'] ?>";

</script>


<?php 
 } 
}
 ?>
    <div class="table-responsive" style="padding:5px;">
        <table class="display responsive nowrap" id="dataTable23">
            <thead>
                <tr>
                    <th>No. </th>
                    <th>Opsi</th>

                    <th>Nama</th>
                    <!-- <th>Nama (Tablayout)</th> -->

                  <th>Short Desc</th>
                  
                </tr>
            </thead>
            <tbody>
            <?php 
            $no = 1;
            while($kj2 = mysqli_fetch_array($kj)){
            $idd = $kj2['id_demar'];
            ?>

			                                        <tr>
                            <td><?php echo $no; ?></td>
			<td>


                                <a data-toggle="modal" data-target="#modal-lg_<?php echo $idd ?>" href="" class="btn btn-warning btn-circle btn-sm"><i class="fa fa-edit"></i></a>

                                <!-- <a href="?p=rincian2&id=<?php echo $idd ?>" class="btn btn-primary btn-circle btn-sm">Lebih lanjut
                                &nbsp;&nbsp;&nbsp;
                                <i class="fa fa-edit"></i></a> -->

 <a onclick="return confirm('Are you sure you want to delete this item?');" href="hapustbdemar3.php?id=<?php echo $idd ?>&idc=<?php echo $_GET['id'] ?>" class="btn btn-danger btn-circle btn-sm">Hapus
                                &nbsp;&nbsp;&nbsp;
                                <i class="fa fa-trash"></i></a>
                            </td>                
<?php 
 $judul1 = str_replace("&petiksatu&","'",$kj2['judul']);
 $short_desc1 = str_replace("&petiksatu&","'",$kj2['short_desc']);
?>
				<td><?php echo $judul1 ?></td>
                            <!-- <td><?php// echo $kj2['judul2'] ?></td> -->
                 
							                            <td><?php echo $short_desc1 ?></td>
                            
				
                        </tr
                        >
						
						
			  <div class="modal fade" id="modal-lg_<?php echo $idd; ?>">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
<?php 
$rt = mysqli_query($koneksi,"select * from tb_demar3 where id_demar = '$idd'");
$rt2 = mysqli_fetch_array($rt);
?>

              <h4 class="modal-title">2. Edit <?php echo $rt2['judul'] ?></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
						



			<form method="POST" enctype="multipart/form-data" >
            <div class="modal-body" style="overflow:scroll;height:70vh">
	<center>
							<img src="https://ufe-section-indonesie.org/ufeapp/images/menu/<?php echo $kj2['gambar'] ?>"  style="width:200px;" />
			</center> 
			
		<input onchange="readURL<?php echo $idd; ?>(this);" type="file" name="image_link" class="form-control"/>
			</a><br>
			<center>
			<i><font style="font-size:10px;">* mode kamera landscape
			</font></i><br><img src="" id="product_image<?php echo $idd; ?>" style="width:1px;height:1px;" name="product_image<?php echo $idd; ?>" class="img-thumbnail">
			</center>
							  <script>
  function readURL<?php echo $idd; ?>(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#product_image<?php echo $idd; ?>')
                .attr('src', e.target.result)
                .width(100)
				.height(100);
        };

        reader.readAsDataURL(input.files[0]);
    }
		
  }
</script>	
             <div class="input-group mb-3" style="margin-top:10px;">
                  <div class="input-group-prepend">
                    <span class="input-group-text" style="width:120px;">Nama</span>
                  </div>
				  
                  <?php 
 $judul1 = str_replace("&petiksatu&","'",$kj2['judul']);
 $short_desc1 = str_replace("&petiksatu&","'",$kj2['short_desc']);
 $long_desc1 = str_replace("&petiksatu&","'",$kj2['long_desc']);
?>				  
				  <input type="hidden" name="unik" value="430992371602c6b5423c26.png" />
          <input type="hidden" name="idc2" value="<?php echo $_GET['id'] ?>" />
                  <input type="hidden" name="idc" value="<?php echo $idd ?>" />
                  <input type="text" name="nama" value="<?php echo $judul1 ?>" class="form-control" placeholder="Nama" required>
                </div>
				


                <!-- <div class="input-group mb-3" style="margin-top:10px;">
                  <div class="input-group-prepend">
                    <span class="input-group-text" style="width:120px;">Nama (Tablayout)</span>
                  </div>
				  
				  
				  <input type="hidden" name="unik" value="430992371602c6b5423c26.png" />
                  <input type="hidden" name="idc" value="<?php echo $idd ?>" /> -->
                  <!-- <input type="text" name="nama2" value="<?php echo $kj2['judul2'] ?>" class="form-control" placeholder="Nama (Tablayout)" required>
                </div> -->
				<!-- <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" style="width:120px;">Kategori</span>
                  </div>
				  <select name="kategori" class="form-control" required>
                  <option value="23" >Jual Mesin Fotocopy</option>
				  					<option value="19" >Layanan Service</option>
										<option value="21" >Rental Mesin Fotocopy</option>
										<option value="25" >Spare part</option>
					                </select>
				</div> -->
            <!-- <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" style="width:120px;">Harga</span>
                  </div>
                  <input type="number" name="harga" value="8000000" class="form-control" placeholder="harga" required>
                </div>
				<div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" style="width:120px;">Short Desc</span>
                  </div>
                  <input type="text" name="short" value="XploitSec-ID" class="form-control" placeholder="Short Desc" required>
                </div> -->
				
				
				  <div>
                Short Desc
               </div>
                <!-- <textarea class="textarea" name="deskripsi" placeholder="Place some text here" -->
                <textarea class="form-control" name="deskripsi" placeholder="Place some text here"
              
                           required><?php echo $short_desc1 ?></textarea>
             
             <div style="margin-top:15px;">
                           Long Desc
                </div>
                <!-- <textarea class="textarea" name="deskripsi" placeholder="Place some text here" -->
                <textarea class="form-control" name="long_deskripsi" placeholder="Place some text here"
              
                          ><?php echo $long_desc1 ?></textarea>
             
             
				
				
				
				
				
			</div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" name="updatekategori" class="btn btn-primary">Save changes</button>
            </div>
			</form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>			
						
						
             <?php $no++;} ?>          
						
						
                                           
                                                </tbody>
        </table>
    </div>
</div>
	 </div>
</div>





































<div class="card shadow-sm border-bottom-primary">
    <div class="card-header bg-white py-3">
        <div class="row">
            <div class="col">
<?php 
include('../db.php');
$qw = mysqli_query($koneksi,"select * from tb_demar2 where id_demar = '$_GET[id]' and visibility = '1'");
$qw2 = mysqli_fetch_array($qw);
?>

  <ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item"><a href="?p=tb_dm_1">Home</a></li>
              <li class="breadcrumb-item"><a href="?p=tb_dm_1">Demarches</a></li>
              <li class="breadcrumb-item"><a href="?p=rincian&id=<?php echo $qw2['id_kategori'] ?>"><?php echo $ep2['nama_menu'] ?></a></li>
              <li class="breadcrumb-item active">List Agent of <?php echo $qw2['judul2'] ?></li>
                            </ol>
            </div>
<div class="col-auto">
                <a href="importdata.php?p=agent&id=<?php echo $_GET['id'] ?>"  class="btn btn-sm btn-success btn-icon-split">
                    <span class="icon">
                        <i class="fa fa-plus"></i>
                    </span>
                    <span class="text">

                      3. Import Data Agent
                    </span>
                </a>
            </div>

         <div class="col-auto">
                <a href="" data-toggle="modal" data-target="#modaltambahagent" class="btn btn-sm btn-primary btn-icon-split">
                    <span class="icon">
                        <i class="fa fa-plus"></i>
                    </span>
                    <span class="text">

                        Tambah Data Agent
                    </span>
                </a>
            </div>
			      </div>
		
			
			 <div class="modal fade" id="modaltambahagent">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Tambah Data Agent (<?php echo $qw2['judul2'] ?>)</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
           			
<?php 
if(isset($_POST['tambahproduk2agent'])){
// if($_POST['nama']){

include('../db.php');






$shortbaru = str_replace("'","&petiksatu&",$_POST['deskripsi']);
$longbaru = str_replace("'","&petiksatu&",$_POST['long_deskripsi']);






$maxDimW = 1000;
$maxDimH = 500;
list($width, $height, $type, $attr) = getimagesize( $_FILES['image_linkee2']['tmp_name'] );
if ( $width > $maxDimW || $height > $maxDimH ) {
    $target_filename = $_FILES['image_linkee2']['tmp_name'];
    $fn = $_FILES['image_linkee2']['tmp_name'];
    $size = getimagesize( $fn );
    $ratio = $size[0]/$size[1]; // width/height
    //if( $ratio > 1) {
        $width = $maxDimW;
        $height = ($maxDimW / $size[0]) * $size[1];
    // } else {
    //     $width = $maxDimW*$ratio;
    //     $height = $maxDimH;
    // }
    $src = imagecreatefromstring(file_get_contents($fn));
    $dst = imagecreatetruecolor( $width, $height );
    imagecopyresampled($dst, $src, 0, 0, 0, 0, $width, $height, $size[0], $size[1] );

    imagejpeg($dst, $target_filename); // adjust format as needed


}



list($widthq, $heightq, $typeq, $attrq) = getimagesize( $_FILES['image_liun']['tmp_name'] );
if ( $widthq > $maxDimW || $heightq > $maxDimH ) {
    $target_filenameq = $_FILES['image_liun']['tmp_name'];
    $fnq = $_FILES['image_linkee2']['tmp_name'];
    $sizeq = getimagesize( $fnq );
    $ratioq = $sizeq[0]/$sizeq[1]; // width/height
    //if( $ratio > 1) {
        $widthq = $maxDimW;
        $heightq = ($maxDimW / $size[0]) * $size[1];
    // } else {
    //     $width = $maxDimW*$ratio;
    //     $height = $maxDimH;
    // }
    $srcq = imagecreatefromstring(file_get_contents($fnq));
    $dstq = imagecreatetruecolor( $widthq, $heightq );
    imagecopyresampled($dstq, $srcq, 0, 0, 0, 0, $widthq, $heightq,
     $sizeq[0], $sizeq[1] );

    imagejpeg($dstq, $target_filenameq); // adjust format as needed


}




$namaa = $_FILES['image_linkee2']['name'];

$namaa2 = $_FILES['image_liun']['name'];


if($namaa == null){
	

$isi = mysqli_query($koneksi,"insert into tb_agent (
id_kategori,
judul,
judul2,
short_desc,
long_desc,
gambar,
gambar2,
namaagent,
gmaps,
alamatagent,
alamat2agent,
kotaagent,
kodeposagent,
telpagent,
mobileagent,
emailagent,
webagent,
fbagent,
twiteragent,
igagent,
playstoreagent
) values
(
'$_POST[idc2]',
'$_POST[nama]',
'$_POST[nama]',
'$shortbaru',
'$longbaru',
'',
'$namaa2',
'$_POST[namaagent]',
'$_POST[gmaps]',
'$_POST[alamatagent]',
'$_POST[alamat2agent]',
'$_POST[kotaagent]',
'$_POST[kodeposagent]',
'$_POST[telpagent]',
'$_POST[mobileagent]',
'$_POST[emailagent]',
'$_POST[webagent]',
'$_POST[fbagent]',
'$_POST[twiteragent]',
'$_POST[igagent]',
'$_POST[playstoreagent]'
)
");

}else{
move_uploaded_file($_FILES['image_linkee2']['tmp_name'],"../images/agent/".$_FILES['image_linkee2']['name']);
move_uploaded_file($_FILES['image_liun']['tmp_name'],"../images/agent/".$_FILES['image_liun']['name']);
$isi = mysqli_query($koneksi,"insert into tb_agent (
id_kategori,
judul,
judul2,
short_desc,
long_desc,
gambar,
gambar2,
namaagent,
gmaps,
alamatagent,
alamat2agent,
kotaagent,
kodeposagent,
telpagent,
mobileagent,
emailagent,
webagent,
fbagent,
twiteragent,
igagent,
playstoreagent
) values
(
'$_POST[idc2]',
'$_POST[nama]',
'$_POST[nama]',
'$shortbaru',
'$longbaru',
'$namaa',
'$namaa2',
'$_POST[namaagent]',
'$_POST[gmaps]',
'$_POST[alamatagent]',
'$_POST[alamat2agent]',
'$_POST[kotaagent]',
'$_POST[kodeposagent]',
'$_POST[telpagent]',
'$_POST[mobileagent]',
'$_POST[emailagent]',
'$_POST[webagent]',
'$_POST[fbagent]',
'$_POST[twiteragent]',
'$_POST[igagent]',
'$_POST[playstoreagent]'
)
");

}


?>

<script>
alert('Data berhasil ditambahkan<?php echo mysqli_error($koneksi); ?>');
location = "?p=rincian2&id=<?php echo $_POST['idc2'] ?>";
</script>



<?php// }else{
?>
<script>
//alert("gagal 2<?php echo mysqli_error($koneksi); ?>");
</script>
<?php
//}

}//else{
  ?>
<!-- <script>
alert("gagal");
</script> -->
  <?php
//}


?>

        <form method="POST" enctype="multipart/form-data" >
        <div class="modal-body" style="height:70vh;overflow:scroll;">


        <fieldset style="width:100%;text-align:center;">
        <img src="" id="product_imageee2" 
        style="width:1px;height:1px;visibility:hidden;" 
        name="product_imageee2" class="img-thumbnail">
        </fieldset>


        <input onchange="readURLee2(this);" type="file" name="image_linkee2" class="form-control"/>
        </a><br>
        <script>
        function readURLee2(input) {
        if (input.files && input.files[0]) {
        var reader = new FileReader();
        document.getElementById("product_imageee2").style.visibility = 'visible';
        reader.onload = function (e) {
        $('#product_imageee2')
        .attr('src', e.target.result)
        .width("auto")
        .height(100);
        };

        reader.readAsDataURL(input.files[0]);
        }

        }
        </script>	



        <fieldset style="text-align:center;width:100%;"> 
        <img id="adjaij"   
        src="https://ufe-section-indonesie.org/ufeapp/images/agent/<?php echo $kj2['gambar2'] ?>"
        style="width:200px;visibility:hidden;" />
        </fieldset> 




        <input 
        onchange="ffri(this);" type="file" 
        name="image_liun" class="form-control"/>
        </a>
        <div>
        Ukuran file disarankan (398*728)
        </div>

        <script>
        function ffri(input) {
        if (input.files && input.files[0]) {
        var reader = new FileReader();
        document.getElementById("adjaij").style.visibility = "visible";
        reader.onload = function (e) {
        $('#adjaij')
        .attr('src', e.target.result)
        .width("auto")
        .height(100);
        };

        reader.readAsDataURL(input.files[0]);
        }

        }
        </script>	

        <div class="input-group mb-3" style="margin-top:10px;">
        <div class="input-group-prepend">
        <span class="input-group-text" 
        style="width:120px;">Nama</span>
        </div>


        <input type="hidden" name="unik" value="430992371602c6b5423c26.png" />
        <input type="hidden" name="idc2" value="<?php echo $_GET['id'] ?>" />
        <input type="hidden" name="idc" value="<?php echo $idd ?>" />
        <input type="text" name="namaagent" value="<?php echo $kj2['namaagent'] ?>" 
        class="form-control" placeholder="Nama" required>
        </div>

        <div class="input-group mb-3" style="margin-top:10px;">
        <div class="input-group-prepend">
        <span class="input-group-text" style="width:120px;">Gmaps</span>
        </div>

        <input type="text" name="gmaps" value="<?php echo $kj2['gmaps'] ?>" 
        class="form-control" placeholder="Gmaps" required>
        </div>


        <div class="input-group mb-3" style="margin-top:10px;">
        <div class="input-group-prepend">
        <span class="input-group-text" style="width:120px;">
        Alamat</span>
        </div>
        <textarea type="text" style="height:150px;" name="alamatagent"
        class="form-control"
        required><?php echo $kj2['alamatagent'] ?></textarea>

        <!-- <input type="text" name="alamatagent" value="<?php echo $kj2['alamatagent'] ?>" 
        class="form-control" placeholder="Alamat" required> -->
        </div>


        <!-- <div class="input-group mb-3" style="margin-top:10px;">
        <div class="input-group-prepend">
        <span class="input-group-text" style="width:120px;">No. Kantor</span>
        </div>

        <input type="text" name="alamat2agent" value="<?php echo $kj2['alamat2agent'] ?>" 
        class="form-control" placeholder="No." required>
        </div>

        <div class="input-group mb-3" style="margin-top:10px;">
        <div class="input-group-prepend">
        <span class="input-group-text" style="width:120px;">Kota</span>
        </div>

        <input type="text" name="kotaagent" value="<?php echo $kj2['kotaagent'] ?>" 
        class="form-control" placeholder="Kota" required>
        </div>

        <div class="input-group mb-3" style="margin-top:10px;">
        <div class="input-group-prepend">
        <span class="input-group-text" style="width:120px;">Kodepos</span>
        </div> 

        <input type="text" name="kodeposagent" value="<?php echo $kj2['kodeposagent'] ?>" 
        class="form-control" placeholder="Kodepos" required>
        </div>-->

        <div class="input-group mb-3" style="margin-top:10px;">
        <div class="input-group-prepend">
        <span class="input-group-text" style="width:120px;">Telp</span>
        </div>

        <input type="text" name="telpagent" value="<?php echo $kj2['telpagent'] ?>" 
        class="form-control" placeholder="Telp" required>
        </div>

        <div class="input-group mb-3" style="margin-top:10px;">
        <div class="input-group-prepend">
        <span class="input-group-text" style="width:120px;">Handphone</span>
        </div>

        <input type="text" name="mobileagent" value="<?php echo $kj2['mobileagent'] ?>" 
        class="form-control" placeholder="HP" >
        </div>

        <div class="input-group mb-3" style="margin-top:10px;">
        <div class="input-group-prepend">
        <span class="input-group-text" style="width:120px;">Email</span>
        </div>

        <input type="text" name="emailagent" value="<?php echo $kj2['emailagent'] ?>" 
        class="form-control" placeholder="Email" required>
        </div>

        <div class="input-group mb-3" style="margin-top:10px;">
        <div class="input-group-prepend">
        <span class="input-group-text" style="width:120px;">Website</span>
        </div>

        <input type="text" name="webagent" value="<?php echo $kj2['webagent'] ?>" 
        class="form-control" placeholder="No." required>
        </div>

        <div class="input-group mb-3" style="margin-top:10px;">
        <div class="input-group-prepend">
        <span class="input-group-text" style="width:120px;">FB</span>
        </div>

        <input type="text" name="fbagent" value="<?php echo $kj2['fbagent'] ?>" 
        class="form-control" placeholder="FB" >
        </div>

        <div class="input-group mb-3" style="margin-top:10px;">
        <div class="input-group-prepend">
        <span class="input-group-text" style="width:120px;">Twitter</span>
        </div>

        <input type="text" name="twiteragent" value="<?php echo $kj2['twiteragent'] ?>" 
        class="form-control" placeholder="Twitter" >
        </div>

        <div class="input-group mb-3" style="margin-top:10px;">
        <div class="input-group-prepend">
        <span class="input-group-text" style="width:120px;">IG</span>
        </div>

        <input type="text" name="igagent" value="<?php echo $kj2['igagent'] ?>" 
        class="form-control" placeholder="IG" >
        </div>

        <div class="input-group mb-3" style="margin-top:10px;">
        <div class="input-group-prepend">
        <span class="input-group-text" style="width:120px;">Playstore</span>
        </div>

        <input type="text" name="playstoreagent" value="<?php echo $kj2['playstoreagent'] ?>" 
        class="form-control" placeholder="Playstore" >
        </div>

        <div>
        Short Desc
        </div>
        <!-- <textarea class="textarea" name="deskripsi" placeholder="Place some text here" -->
        <textarea class="form-control" name="deskripsi" placeholder="Place some text here"

        required><?php echo $kj2['short_desc'] ?></textarea>

        <div style="margin-top:15px;">
        Long Desc
        </div>
        <!-- <textarea class="textarea" name="deskripsi" placeholder="Place some text here" -->
        <textarea class="form-control" name="long_deskripsi" placeholder="Place some text here"><?php echo $kj2['long_desc'] ?></textarea>








        </div>
        <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" name="tambahproduk2agent" class="btn btn-primary">Add</button>
        </div>
        </form>
        </div>
        <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
        </div>			
						
						
                                           
                   <?php 
                   include ('../db.php');
                   $kj = mysqli_query($koneksi,"select * from tb_agent where id_kategori = '$_GET[id]' and visibility = '1'");


                   ?>                            
     <?php 
if(isset($_POST['updatekategori2'])){

    
if(($_POST['namaagent'])){




$shortbaru = str_replace("'","&petiksatu&",$_POST['short_desc']);
$longbaru = str_replace("'","&petiksatu&",$_POST['long_desc']);



$maxDimW = 1000;
$maxDimH = 500;
list($width, $height, $type, $attr) = getimagesize( $_FILES['image_linkee']['tmp_name'] );
if ( $width > $maxDimW || $height > $maxDimH ) {
    $target_filename = $_FILES['image_linkee']['tmp_name'];
    $fn = $_FILES['image_linkee']['tmp_name'];
    $size = getimagesize( $fn );
    $ratio = $size[0]/$size[1]; // width/height
    // if( $ratio > 1) {
    //     $width = $maxDimW;
    //     $height = $maxDimH/$ratio;
    // } else {
    //     $width = $maxDimW*$ratio;
    //     $height = $maxDimH;
    // }



    $width = $maxDimW;
    $height = ($maxDimW / $size[0]) * $size[1];

    $src = imagecreatefromstring(file_get_contents($fn));
    $dst = imagecreatetruecolor( $width, $height );
    imagecopyresampled($dst, $src, 0, 0, 0, 0, $width, $height, $size[0], $size[1] );

    imagejpeg($dst, $target_filename); // adjust format as needed


}



$maxDimW = 700;
$maxDimH = 500;
list($width, $height, $type, $attr) = getimagesize( $_FILES['image_linkeex']['tmp_name'] );
if ( $width > $maxDimW || $height > $maxDimH ) {
    $target_filename = $_FILES['image_linkeex']['tmp_name'];
    $fn = $_FILES['image_linkeex']['tmp_name'];
    $size = getimagesize( $fn );
    $ratio = $size[0]/$size[1]; // width/height
    // if( $ratio > 1) {
    //     $width = $maxDimW;
    //     $height = $maxDimH/$ratio;
    // } else {
    //     $width = $maxDimW*$ratio;
    //     $height = $maxDimH;
    // }
   
    
    $width = $maxDimW;
    $height = ($maxDimW / $size[0]) * $size[1];

    $src = imagecreatefromstring(file_get_contents($fn));
    $dst = imagecreatetruecolor( $width, $height );
    imagecopyresampled($dst, $src, 0, 0, 0, 0, $width, $height, $size[0], $size[1] );

    imagejpeg($dst, $target_filename); // adjust format as needed


}




$namaa = $_FILES['image_linkee']['name'];


$namaax = $_FILES['image_linkeex']['name'];



$shortt = str_replace("'","\'",$_POST['short_desc']);
$longg = str_replace("'","\'",$_POST['long_desc']);






if($namaax == null){


    
    mysqli_query($koneksi,"update tb_agent set 
    short_desc = '$shortbaru',
    long_desc = '$longbaru',
    namaagent = '$_POST[namaagent]',
    gmaps = '$_POST[gmaps]',
    alamatagent = '$_POST[alamatagent]',
    alamat2agent = '$_POST[alamat2agent]',
    kotaagent = '$_POST[kotaagent]',
    kodeposagent = '$_POST[kodeposagent]',
    telpagent = '$_POST[telpagent]',
    mobileagent = '$_POST[mobileagent]',
    emailagent = '$_POST[emailagent]',
    webagent = '$_POST[webagent]',
    fbagent = '$_POST[fbagent]',
    twiteragent = '$_POST[twiteragent]',
    igagent = '$_POST[igagent]',
    playstoreagent = '$_POST[playstoreagent]'
    
    
    where id_agent = '$_POST[idc]'
    ");
    
    }else{
        
        move_uploaded_file($_FILES['image_linkeex']['tmp_name'],"../images/agent/".$_FILES['image_linkeex']['name']);
    mysqli_query($koneksi,"update tb_agent set 
    short_desc = '$shortbaru',
    long_desc = '$longbaru',
    namaagent = '$_POST[namaagent]',
    gambar2 = '$namaax',
    gmaps = '$_POST[gmaps]',
    alamatagent = '$_POST[alamatagent]',
    alamat2agent = '$_POST[alamat2agent]',
    kotaagent = '$_POST[kotaagent]',
    kodeposagent = '$_POST[kodeposagent]',
    telpagent = '$_POST[telpagent]',
    mobileagent = '$_POST[mobileagent]',
    emailagent = '$_POST[emailagent]',
    webagent = '$_POST[webagent]',
    fbagent = '$_POST[fbagent]',
    twiteragent = '$_POST[twiteragent]',
    igagent = '$_POST[igagent]',
    playstoreagent = '$_POST[playstoreagent]'
    
    
    where id_agent = '$_POST[idc]'
    ");
    
        
    }




if($namaa == null){


    
mysqli_query($koneksi,"update tb_agent set 
short_desc = '$shortbaru',
long_desc = '$longbaru',
namaagent = '$_POST[namaagent]',
gmaps = '$_POST[gmaps]',
alamatagent = '$_POST[alamatagent]',
alamat2agent = '$_POST[alamat2agent]',
kotaagent = '$_POST[kotaagent]',
kodeposagent = '$_POST[kodeposagent]',
telpagent = '$_POST[telpagent]',
mobileagent = '$_POST[mobileagent]',
emailagent = '$_POST[emailagent]',
webagent = '$_POST[webagent]',
fbagent = '$_POST[fbagent]',
twiteragent = '$_POST[twiteragent]',
igagent = '$_POST[igagent]',
playstoreagent = '$_POST[playstoreagent]'


where id_agent = '$_POST[idc]'
");

}else{
	
	move_uploaded_file($_FILES['image_linkee']['tmp_name'],"../images/agent/".$_FILES['image_linkee']['name']);
mysqli_query($koneksi,"update tb_agent set 
short_desc = '$shortbaru',
long_desc = '$longbaru',
namaagent = '$_POST[namaagent]',
gambar = '$namaa',
gmaps = '$_POST[gmaps]',
alamatagent = '$_POST[alamatagent]',
alamat2agent = '$_POST[alamat2agent]',
kotaagent = '$_POST[kotaagent]',
kodeposagent = '$_POST[kodeposagent]',
telpagent = '$_POST[telpagent]',
mobileagent = '$_POST[mobileagent]',
emailagent = '$_POST[emailagent]',
webagent = '$_POST[webagent]',
fbagent = '$_POST[fbagent]',
twiteragent = '$_POST[twiteragent]',
igagent = '$_POST[igagent]',
playstoreagent = '$_POST[playstoreagent]'


where id_agent = '$_POST[idc]'
");

	
}


?>

<script>
alert("Data berhasil di ubah <?php echo mysqli_error($koneksi); ?>");
location = "?p=rincian2&id=<?php echo $_POST['idc2'] ?>";

</script>


<?php 
 } 
}
 ?>
    <div class="table-responsive" style="padding:5px;">
     
        <table class="display responsive nowrap" id="example23">
            <thead>
                <tr>
                    <th>No. </th>
<th>Opsi</th>
<th>Gambar 1</th>       
<th>Gambar 2</th>                   
				   <th>Nama</th>
                  <th>Gmaps</th>
                  <th>Alamat</th>
                  <!-- <th>Alamat 2</th>
                  <th>Kota</th>
                  <th>Kodepos</th> -->
                  <th>Telp</th>
                  <th>Mobile</th>
                  <th>Email</th>
                  <th>Website</th>
                  <th>Fb</th>
                  <th>Twitter</th>
                  <th>IG</th>
                  <th>Playstore</th>
                    
                </tr>
            </thead>
            <tbody>
            <?php 
            $no = 1;
            while($kj2 = mysqli_fetch_array($kj)){
            $idd = $kj2['id_agent'];
            ?>

			                                        <tr>
                            <td><?php echo $no; ?></td>
						<td>


                                <a data-toggle="modal" data-target="#modal-lg2_<?php echo $idd ?>" href="" class="btn btn-warning btn-circle btn-sm"><i class="fa fa-edit"></i></a>

                                <!-- <a href="?p=rincian2&id=<?php echo $idd ?>" class="btn btn-primary btn-circle btn-sm">Lebih lanjut
                                &nbsp;&nbsp;&nbsp;
                                <i class="fa fa-edit"></i></a> -->
				 <a onclick="return confirm('Are you sure you want to delete this item?');"  href="hapustbagent.php?id=<?php echo $idd ?>&idc=<?php echo $_GET['id'] ?>" class="btn btn-danger btn-circle btn-sm">Hapus
                                &nbsp;&nbsp;&nbsp;
                                <i class="fa fa-trash"></i></a>


                            </td>    
	
                            <td><img src="../images/agent/<?php echo $kj2['gambar'] ?>" style="width:120px;" /></td>
    
                            <td>
                            <?php if(!empty($kj2['gambar2'])){ ?>
                            <img src="../images/agent/<?php echo $kj2['gambar2'] ?>" style="width:120px;" />
                            <?php } ?>
                            </td>
    

    <td><?php echo $kj2['namaagent'] ?></td>
                            <td><?php echo $kj2['gmaps'] ?></td>
                            <td><?php echo $kj2['alamatagent'] ?></td>
                            <!-- <td><?php echo $kj2['alamat2agent'] ?></td>
                            <td><?php echo $kj2['kotaagent'] ?></td>
                            <td><?php echo $kj2['kodeposagent'] ?></td> -->
                            <td><?php echo $kj2['telpagent'] ?></td>
                            <td><?php echo $kj2['mobileagent'] ?></td>
                            <td><?php echo $kj2['emailagent'] ?></td>
                            <td><?php echo $kj2['webagent'] ?></td>
                            <td><?php echo $kj2['fbagent'] ?></td>
                            <td><?php echo $kj2['twiteragent'] ?></td>
                            <td><?php echo $kj2['igagent'] ?></td>
							                            <td><?php echo $kj2['playstoreagent'] ?></td>
                            
	
                        </tr
                        >
						
						
			  <div class="modal fade" id="modal-lg2_<?php echo $idd; ?>">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
<?php 
$rt = mysqli_query($koneksi,"select * from tb_demar3 where id_demar = '$idd'");
$rt2 = mysqli_fetch_array($rt);
?>

              <h4 class="modal-title">3. Edit <?php //echo $qw2['judul2'] ?></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
						



			<form method="POST" enctype="multipart/form-data" >
            <div class="modal-body" style="overflow:scroll;height:70vh">
		
			<center>
							<img id="product_imageee<?php echo $idd ?>"  
                             src="https://ufe-section-indonesie.org/ufeapp/images/agent/<?php echo $kj2['gambar'] ?>"
                               style="width:200px;" />
			</center> 
			
		
			
			
			 <input onchange="readURLee<?php echo $idd; ?>(this);" type="file" name="image_linkee" class="form-control"/>
			</a>
							  <script>
  function readURLee<?php echo $idd ?>(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#product_imageee<?php echo $idd ?>')
                .attr('src', e.target.result)
                .width(100)
				.height(100);
        };

        reader.readAsDataURL(input.files[0]);
    }
		
  }
</script>	
	


<br>


<center>
							<img id="product_imageeex<?php echo $idd ?>"  
                             src="https://ufe-section-indonesie.org/ufeapp/images/agent/<?php echo $kj2['gambar2'] ?>"
                               style="width:200px;" />
			</center> 
			
		
			
			
			 <input onchange="readURLeex<?php echo $idd; ?>(this);" type="file" name="image_linkeex" class="form-control"/>
			</a>
<div>
Ukuran file disarankan (398*728)
</div>

							  <script>
  function readURLeex<?php echo $idd ?>(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#product_imageeex<?php echo $idd ?>')
                .attr('src', e.target.result)
                .width(100)
				.height(100);
        };

        reader.readAsDataURL(input.files[0]);
    }
		
  }
</script>	


             <div class="input-group mb-3" style="margin-top:10px;">
                  <div class="input-group-prepend">
                    <span class="input-group-text" style="width:120px;">Nama</span>
                  </div>
				  
				  
				  <input type="hidden" name="unik" value="430992371602c6b5423c26.png" />
          <input type="hidden" name="idc2" value="<?php echo $_GET['id'] ?>" />
                  <input type="hidden" name="idc" value="<?php echo $idd ?>" />
                  <input type="text" name="namaagent" value="<?php echo $kj2['namaagent'] ?>" 
                  class="form-control" placeholder="Nama" required>
                </div>
				
                <div class="input-group mb-3" style="margin-top:10px;">
                  <div class="input-group-prepend">
                    <span class="input-group-text" style="width:120px;">Gmaps</span>
                  </div>
				  
                <input type="text" name="gmaps" value="<?php echo $kj2['gmaps'] ?>" 
                  class="form-control" placeholder="Gmaps" required>
                </div>
				
        
                <div class="input-group mb-3" style="margin-top:10px;">
                  <div class="input-group-prepend">
                    <span class="input-group-text" style="width:120px;">Alamat</span>
                  </div>
				  <textarea style="height:150px;" class="form-control" name="alamatagent" required><?php echo $kj2['alamatagent'] ?></textarea>
                <!-- <input type="text" name="alamatagent" value="<?php echo $kj2['alamatagent'] ?>" 
                  class="form-control" placeholder="Alamat" required> -->
                </div>
				

                <div class="input-group mb-3" style="margin-top:10px;display:none;">
                  <div class="input-group-prepend">
                    <span class="input-group-text" style="width:120px;">No. Kantor</span>
                  </div>
				  
                <input type="text" name="alamat2agent" value="<?php echo $kj2['alamat2agent'] ?>" 
                  class="form-control" placeholder="No." >
                </div>

                <div class="input-group mb-3" style="margin-top:10px;">
                  <div class="input-group-prepend">
                    <span class="input-group-text" style="width:120px;">Kota</span>
                  </div>
				  
                <input type="text" name="kotaagent" value="<?php echo $kj2['kotaagent'] ?>" 
                  class="form-control" placeholder="Kota" required>
                </div>

                <div class="input-group mb-3" style="margin-top:10px;display:none;">
                  <div class="input-group-prepend">
                    <span class="input-group-text" style="width:120px;">Kodepos</span>
                  </div>
				  
                <input type="text" name="kodeposagent" value="<?php echo $kj2['kodeposagent'] ?>" 
                  class="form-control" placeholder="Kodepos" >
                </div>

                <div class="input-group mb-3" style="margin-top:10px;">
                  <div class="input-group-prepend">
                    <span class="input-group-text" style="width:120px;">Telp</span>
                  </div>
				  
                <input type="text" name="telpagent" value="<?php echo $kj2['telpagent'] ?>" 
                  class="form-control" placeholder="Telp" required>
                </div>

                <div class="input-group mb-3" style="margin-top:10px;">
                  <div class="input-group-prepend">
                    <span class="input-group-text" style="width:120px;">Handphone</span>
                  </div>
				  
                <input type="text" name="mobileagent" value="<?php echo $kj2['mobileagent'] ?>" 
                  class="form-control" placeholder="HP" >
                </div>

                <div class="input-group mb-3" style="margin-top:10px;">
                  <div class="input-group-prepend">
                    <span class="input-group-text" style="width:120px;">Email</span>
                  </div>
				  
                <input type="text" name="emailagent" value="<?php echo $kj2['emailagent'] ?>" 
                  class="form-control" placeholder="Email" required>
                </div>

                <div class="input-group mb-3" style="margin-top:10px;">
                  <div class="input-group-prepend">
                    <span class="input-group-text" style="width:120px;">Website</span>
                  </div>
				  
                <input type="text" name="webagent" value="<?php echo $kj2['webagent'] ?>" 
                  class="form-control" placeholder="No." required>
                </div>

                <div class="input-group mb-3" style="margin-top:10px;">
                  <div class="input-group-prepend">
                    <span class="input-group-text" style="width:120px;">FB</span>
                  </div>
				  
                <input type="text" name="fbagent" value="<?php echo $kj2['fbagent'] ?>" 
                  class="form-control" placeholder="FB" >
                </div>

                <div class="input-group mb-3" style="margin-top:10px;">
                  <div class="input-group-prepend">
                    <span class="input-group-text" style="width:120px;">Twitter</span>
                  </div>
				  
                <input type="text" name="twiteragent" value="<?php echo $kj2['twiteragent'] ?>" 
                  class="form-control" placeholder="Twitter" >
                </div>

                <div class="input-group mb-3" style="margin-top:10px;">
                  <div class="input-group-prepend">
                    <span class="input-group-text" style="width:120px;">IG</span>
                  </div>
				  
                <input type="text" name="igagent" value="<?php echo $kj2['igagent'] ?>" 
                  class="form-control" placeholder="IG" >
                </div>

                <div class="input-group mb-3" style="margin-top:10px;">
                  <div class="input-group-prepend">
                    <span class="input-group-text" style="width:120px;">Playstore</span>
                  </div>
				  
                <input type="text" name="playstoreagent" value="<?php echo $kj2['playstoreagent'] ?>" 
                  class="form-control" placeholder="Playstore" >
                </div>

				  <div>
                Short Desc
               </div>
                <!-- <textarea class="textarea" name="deskripsi" placeholder="Place some text here" -->
                <textarea class="form-control" name="short_desc" placeholder="Place some text here"
                <?php 
$shirtbaru = str_replace("&petiksatu&","'",$kj2['short_desc']);
?>
                           ><?php echo $shirtbaru ?></textarea>
             
             <div style="margin-top:15px;">
                           Long Desc
                </div>
                <!-- <textarea class="textarea" name="deskripsi" placeholder="Place some text here" -->
<?php 
$lingbaru = str_replace("&petiksatu&","'",$kj2['long_desc']);
?>

                <textarea class="form-control" name="long_desc" placeholder="Place some text here"><?php echo $lingbaru ?></textarea>
             
             
				
				
				
				
				
			</div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" name="updatekategori2" class="btn btn-primary">Save changes</button>
            </div>
			</form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>			
						
						
             <?php $no++;} ?>          
						
						
                                           
                                                </tbody>
        </table>
    </div>
</div>
	 </div>
</div>

<?php }else if($_GET['p'] == "tb_ufe"){
?>	


	 <div class="card shadow-sm border-bottom-primary">
    <div class="card-header bg-white py-3">
        <div class="row">
            <div class="col">
<?php 
include('../db.php');
$qw = mysqli_query($koneksi,"select * from tb_activites_jenis");
$qw2 = mysqli_fetch_array($qw);
?>


                 <ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item"><a href="?p=tb_dm_1">Home</a></li>
		
              <li class="breadcrumb-item active">Product of UFE</li>
                            </ol>
            </div>

<!--
      <div class="col-auto">
                <a href="" data-toggle="modal" data-target="#modaltambah" class="btn btn-sm btn-primary btn-icon-split">
                    <span class="icon">
                        <i class="fa fa-plus"></i>
                    </span>
                    <span class="text">

                       4. Tambah Data
                    </span>
                </a>
            </div>
	-->		
			
			 <div class="modal fade" id="modaltambah">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Tambah Data (<?php echo $qw2['nama'] ?>)</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
           			
<?php 
if(isset($_POST['tambahproduk3'])){
if(($_POST['nama'])){

include('../db.php');






$maxDimW = 1000;
$maxDimH = 500;
list($width, $height, $type, $attr) = getimagesize( $_FILES['image_link']['tmp_name'] );
if ( $width > $maxDimW || $height > $maxDimH ) {
    $target_filename = $_FILES['image_link']['tmp_name'];
    $fn = $_FILES['image_link']['tmp_name'];
    $size = getimagesize( $fn );
    $ratio = $size[0]/$size[1]; // width/height
    //if( $ratio > 1) {
        $width = $maxDimW;
        $height = ($maxDimW / $size[0]) * $size[1];
    // } else {
    //     $width = $maxDimW*$ratio;
    //     $height = $maxDimH;
    // }
    $src = imagecreatefromstring(file_get_contents($fn));
    $dst = imagecreatetruecolor( $width, $height );
    imagecopyresampled($dst, $src, 0, 0, 0, 0, $width, $height, $size[0], $size[1] );

    imagejpeg($dst, $target_filename); // adjust format as needed


}

$namaa = $_FILES['image_link']['name'];


 
if($namaa == null){
mysqli_query($koneksi,"insert into tb_demar2 (id_kategori,judul,judul2,short_desc,long_desc) values
('$_POST[idc2]','$_POST[nama]','$_POST[nama2]','$_POST[short_desc]','$_POST[long_deskripsi]')
");
}else{
	
move_uploaded_file($_FILES['image_link']['tmp_name'],"../images/menu/".$_FILES['image_link']['name']);
mysqli_query($koneksi,"insert into tb_demar2 (gambar,id_kategori,judul,judul2,short_desc,long_desc) values
('$namaa','$_POST[idc2]','$_POST[nama]','$_POST[nama2]','$_POST[short_desc]','$_POST[long_deskripsi]')
");	
}
?>
<script>
alert('Data berhasil ditambahkan<?php //echo mysqli_error($koneksi); ?>');
location = "?p=rincian&id=<?php //echo $_POST['idc2'] ?>";
</script>



<?php }else{
?>
<script>
alert("gagal");
</script>
<?php
}

}//else{
  ?>
<!-- <script>
alert("gagal");
</script> -->
  <?php
//}


?>

			<form method="POST" enctype="multipart/form-data" >
            <div class="modal-body" style="height:70vh;overflow:scroll;">
						
			 <input onchange="readURLe(this);" type="file" name="image_link" class="form-control" />
			</a><br>
			<center>
			<i><font style="font-size:10px;">* mode kamera landscape
			</font></i><br><img src="" id="product_imagee" style="width:1px;height:1px;" name="product_imagee" class="img-thumbnail">
			</center>
							  <script>
  function readURLe(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#product_imagee')
                .attr('src', e.target.result)
                .width(100)
				.height(100);
        };

        reader.readAsDataURL(input.files[0]);
    }
		
  }
</script>	 
	
             <div class="input-group mb-3" style="margin-top:10px;">
                  <div class="input-group-prepend">
                    <span class="input-group-text" style="width:120px;">Nama</span>
                  </div>
<!--
                  <input type="hidden" name="idc2" value="<?php //echo $_GET['id'] ?>" />
    -->            				  
				  
				  <input type="hidden" name="unik" value="578866556602c6b54236d7.png" />
                
                  <input type="text" name="nama" value="" class="form-control" placeholder="Nama" required>
                </div>
<!--
                <div class="input-group mb-3" style="margin-top:10px;">
                  <div class="input-group-prepend">
                    <span class="input-group-text" style="width:120px;">Nama (Tablayout)</span>
                  </div>

                  <input type="text" name="nama2" value="" class="form-control" placeholder="Nama (Tablayout)" required>
                </div>
-->
				<!-- <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" style="width:120px;">Kategori</span>
                  </div>
				  <select name="kategori" class="form-control" required>
                  <option value="" >- kategori -</option>
				  					<option value="19" >Layanan Service</option>
										<option value="21" >Rental Mesin Fotocopy</option>
										<option value="23" >Jual Mesin Fotocopy</option>
										<option value="25" >Spare part</option>
					                </select>
				</div>
            <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" style="width:120px;">Harga</span>
                  </div>
                  <input type="number" name="harga" value="" class="form-control" placeholder="harga" required>
                </div>
				<div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" style="width:120px;">Short Desc</span>
                  </div>
                  <input type="text" name="short" value="" class="form-control" placeholder="Short Desc" required>
                </div>
				
				
				   -->
      <!--  <div>Short Desc</div>        
                <textarea class="form-control" name="short_desc" placeholder="Place some text here"
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" required></textarea>
             
             
                          <div style="margin-top:15px">Long Desc</div>        
                <textarea class="form-control" name="long_deskripsi" placeholder="Place some text here"
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" ></textarea>
          -->   
          
				
				
				
				
				
			</div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" name="tambahproduk3" class="btn btn-primary">Add</button>
            </div>
			</form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>			
						
						
                                           
                   <?php 
                   include ('../db.php');
                   $kj = mysqli_query($koneksi,"select * from tb_activites_jenis ");


                   ?>                            
     <?php 
if(isset($_POST['updatekategori22'])){

    
if(($_POST['nama'])){





$maxDimW = 1000;
$maxDimH = 500;
list($width, $height, $type, $attr) = getimagesize( $_FILES['image_link']['tmp_name'] );
if ( $width > $maxDimW || $height > $maxDimH ) {
    $target_filename = $_FILES['image_link']['tmp_name'];
    $fn = $_FILES['image_link']['tmp_name'];
    $size = getimagesize( $fn );
    $ratio = $size[0]/$size[1]; // width/height
    //if( $ratio > 1) {
        $width = $maxDimW;
        $height = ($maxDimW / $size[0]) * $size[1];
    // } else {
    //     $width = $maxDimW*$ratio;
    //     $height = $maxDimH;
    // }
    $src = imagecreatefromstring(file_get_contents($fn));
    $dst = imagecreatetruecolor( $width, $height );
    imagecopyresampled($dst, $src, 0, 0, 0, 0, $width, $height, $size[0], $size[1] );

    imagejpeg($dst, $target_filename); // adjust format as needed


}

$namaa = $_FILES['image_link']['name'];

move_uploaded_file($_FILES['image_link']['tmp_name'],"../images/menu/".$_FILES['image_link']['name']);

    if($_FILES['image_link']['name'] == null){
mysqli_query($koneksi,"update tb_activites_jenis set nama = '$_POST[nama]' where id_jenis = '$_POST[idc]'
");
	}else{
		
mysqli_query($koneksi,"update tb_activites_jenis set nama = '$_POST[nama]'
where id_jenis = '$_POST[idc]'
");		
		
	}


if($_FILES['image_link']['name'] == null){

?>

<script>
alert("Data berhasil di ubah <?php echo mysqli_error($koneksi); ?>");
location = "?p=tb_ufe";

</script>

<?php }else{ ?>

<script>
alert("Data berhasil di ubah <?php echo mysqli_error($koneksi); ?>");
location = "?p=tb_ufe";

</script>


<?php } ?>

<?php 
 } 
}
 ?>
    <div class="table-responsive" style="padding:5px;">
        <table class="table table-striped w-100 dt-responsive nowrap" id="dataTable">
            <thead>
                <tr>
                    <th>No. </th>
                    <th>Nama</th>
                  <!--  <th>Nama (Tablayout)</th>

                  <th>Short Desc</th>
                  -->
                    <th>Opsi</th>
                </tr>
            </thead>
            <tbody>
            <?php 
            $no = 1;
            while($kj2 = mysqli_fetch_array($kj)){
            $idd = $kj2['id_jenis'];
            ?>

			                                        <tr>
                            <td><?php echo $no; ?></td>
                            <td><?php echo $kj2['nama'] ?></td>
                          <!--  <td><?php //echo //$kj2['judul2'] ?></td>
                 
							                            <td><?php //echo //$kj2['short_desc'] ?></td>
                            -->
							<td>


                                <a data-toggle="modal" data-target="#modal-lg_<?php echo $idd ?>" href="" class="btn btn-warning btn-circle btn-sm"><i class="fa fa-edit"></i></a>

                                <a href="?p=r_tb_ufe&id=<?php echo $idd ?>" class="btn btn-primary btn-circle btn-sm">Lebih lanjut
                                &nbsp;&nbsp;&nbsp;
                                <i class="fa fa-edit"></i></a>
								
								
								<!--
								 <a href="hapustbdemar2.php?id=<?php echo $idd ?>&idc=<?php echo $_GET['id'] ?>" class="btn btn-danger btn-circle btn-sm">Hapus
                                &nbsp;&nbsp;&nbsp;
                                <i class="fa fa-trash"></i></a>
-->

                            </td>
                        </tr
                        >
						
						
			  <div class="modal fade" id="modal-lg_<?php echo $idd; ?>">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
<?php 
$rt = mysqli_query($koneksi,"select * from tb_activites_jenis where id_jenis = '$idd'");
$rt2 = mysqli_fetch_array($rt);
?>

              <h4 class="modal-title">1. Edit <?php echo $rt2['nama'] ?></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
						



			<form method="POST" enctype="multipart/form-data" >
            <div class="modal-body" style="overflow:scroll;height:70vh">

			
			
			<!--
						
			<center>
							<img src="https://ufe-section-indonesie.org/ufeapp/images/menu/<?php //echo $kj2['gambar'] ?>"  style="width:200px;" />
			</center> 
			
		<input onchange="readURL<?php //echo $idd; ?>(this);" type="file" name="image_link" class="form-control"/>
			</a><br>
			<center>
			<i><font style="font-size:10px;">* mode kamera landscape
			</font></i><br><img src="" id="product_image<?php //echo $idd; ?>" style="width:1px;height:1px;" name="product_image<?php //echo $idd; ?>" class="img-thumbnail">
			</center>
							  <script>
  function readURL<?php //echo $idd; ?>(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#product_image<?php //echo $idd; ?>')
                .attr('src', e.target.result)
                .width(100)
				.height(100);
        };

        reader.readAsDataURL(input.files[0]);
    }
		
  }
</script>	
	-->
             <div class="input-group mb-3" style="margin-top:10px;">
                  <div class="input-group-prepend">
                    <span class="input-group-text" style="width:120px;">Nama</span>
                  </div>
				  
				  
				  <input type="hidden" name="unik" value="430992371602c6b5423c26.png" />
          <input type="hidden" name="idc2" value="<?php echo $_GET['id'] ?>" />
                  <input type="hidden" name="idc" value="<?php echo $idd ?>" />
                  <input type="text" name="nama" value="<?php echo $kj2['nama'] ?>" class="form-control" placeholder="Nama" required>
                </div>
				

<!--
                <div class="input-group mb-3" style="margin-top:10px;">
                  <div class="input-group-prepend">
                    <span class="input-group-text" style="width:120px;">Nama (Tablayout)</span>
                  </div>
				  
				  
				  <input type="hidden" name="unik" value="430992371602c6b5423c26.png" />
                  <input type="hidden" name="idc" value="<?php //echo $idd ?>" />
                  <input type="text" name="nama2" value="<?php //echo $kj2['judul2'] ?>" class="form-control" placeholder="Nama (Tablayout)" required>
                </div> -->
				<!-- <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" style="width:120px;">Kategori</span>
                  </div>
				  <select name="kategori" class="form-control" required>
                  <option value="23" >Jual Mesin Fotocopy</option>
				  					<option value="19" >Layanan Service</option>
										<option value="21" >Rental Mesin Fotocopy</option>
										<option value="25" >Spare part</option>
					                </select>
				</div> -->
            <!-- <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" style="width:120px;">Harga</span>
                  </div>
                  <input type="number" name="harga" value="8000000" class="form-control" placeholder="harga" required>
                </div>
				<div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" style="width:120px;">Short Desc</span>
                  </div>
                  <input type="text" name="short" value="XploitSec-ID" class="form-control" placeholder="Short Desc" required>
                </div> -->
				
				<!--
				  <div>
                Short Desc
               </div> -->
                <!-- <textarea class="textarea" name="deskripsi" placeholder="Place some text here" -->
               <!-- <textarea class="form-control" name="deskripsi" placeholder="Place some text here"
              
                           required><?php //echo $kj2['short_desc'] ?></textarea> -->
             <!--
             <div style="margin-top:15px;">
                           Long Desc
                </div>
                <!-- <textarea class="textarea" name="deskripsi" placeholder="Place some text here" -->
         <!--       <textarea class="form-control" name="long_deskripsi" placeholder="Place some text here"
              
                          ><?php //echo $kj2['long_desc'] ?></textarea>
             
             
				
			-->	
				
				
				
			</div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" name="updatekategori22" class="btn btn-primary">Save changes</button>
            </div>
			</form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>			
						
						
             <?php $no++;} ?>          
						
						
                                           
                                                </tbody>
        </table>
    </div>
</div>
	 </div>
</div>


<?php
}else if($_GET['p'] == "home"){
	?>
 <div class="card shadow-sm border-bottom-primary">
    <div class="card-header bg-white py-3">
       
		<div class="row" >
		<div class="col">
           <ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item"><a href="?p=tb_dm_1">Home</a></li>
			<li class="breadcrumb-item"><a href="?p=tulisan">Tulisan</a></li>
                            
              <li class="breadcrumb-item active">Halaman Depan</li>
                            </ol>
			
			
			<!--
<center>
			<fieldset style="background-color:grey;width:90%;max-width:500px;align:center;">
			tessss
			</fieldset>
		</center>	
			-->
			</div>
    </div>
	
</div>
<div>
		<center>
			<?php 
			include('../db.php');
			$kl = mysqli_query($koneksi,"select * from tb_halaman_depan limit 1");
			$kl2 = mysqli_fetch_array($kl);
			
			
			?>
			
			<fieldset style="margin-top:10px;background-color:white;
			height:80vh;overflow:scroll;
			width:90%;max-width:500px;align:center;">
			<image src="foto.png" style="width:100%;height:auto;" />
			<br>
			<br>
			<!--<div style="margin-left:20px;text-align:left;">
			<image src="menuhome/bon.png" style="width:100px;" />
			</div>
			<div style="margin-top:10px;margin-left:20px;color:#707070;text-align:left;margin-right:20px;">
			<?php echo $kl2['tulisan1'] ?>
			</div>-->
			<!--<div data-toggle="modal" data-target="#modal-lg" style="margin-top:0px;cursor:pointer;margin-left:20px;color:#013173;text-align:right;margin-right:20px;">
			Edit
			</div>-->		
  <div class="modal fade" id="modal-lg">
        <div class="modal-dialog modal-lg">
          <form method="POST" action="edittulisan.php">
		  <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Edit Text2</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body" style="height:70vh;overflow:scroll;">
			<input type="hidden" name="ket_tulisan" value="tulisan1" />
              <textarea id="" type="text" class="form-control" style="height:50vh;" name="tulisan"
			  placeholder="place some text here" required><?php echo $kl2['tulisan1'] ?></textarea>
            </div>
			
			
			    <textarea id="" class="p-3">
<div class="info-box bg-gradient-info">
  <span class="info-box-icon"><i class="far fa-bookmark"></i></span>
  <div class="info-box-content">
    <span class="info-box-text">Bookmarks</span>
    <span class="info-box-number">41,410</span>
    <div class="progress">
      <div class="progress-bar" style="width: 70%"></div>
    </div>
    <span class="progress-description">
      70% Increase in 30 Days
    </span>
  </div>
</div>
              </textarea>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
          </div>
		  </form>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>			
			
			
		








	<div style="margin-left:20px;text-align:left;">
	
	<table>
	<tbody>
	<tr>
	<td style="width:30%;">
			<image src="apm2.png" style="width:100px;" />
		</td>
		<td style="padding-left:10px;font-weight:100;color:#707070" valign="bottom">
			<image src="apm.png" style="width:150px;" /><br>
			Presidént UFE Indonésie
		
		</td>
		</tr>	
			</tbody>
			</table>
			
			</div>
			<div style="margin-top:10px;margin-left:20px;color:#707070;text-align:left;margin-right:20px;">
			<?php echo $kl2['tulisan8'] ?>
			</div>
			<div data-toggle="modal" data-target="#modal-lg_apm" style="margin-top:0px;cursor:pointer;margin-left:20px;color:#013173;text-align:right;margin-right:20px;">
			Edit
			</div>		
  <div class="modal fade" id="modal-lg_apm">
        <div class="modal-dialog modal-lg">
          <form method="POST" action="edittulisan.php">
		  <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Edit Text3</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body" style="text-align:left;height:70vh;overflow:scroll;">
			<input type="hidden" name="ket_tulisan" value="tulisan8" />
              <textarea class="textarea" name="tulisan"
			   required><?php echo $kl2['tulisan8'] ?></textarea>
            
			

			
			
			</div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
          </div>
		  </form>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>			
			
			
			
			

		
			
			
			
			
			<div style="margin-top:10px;margin-left:20px;margin-right:20px;">
		<table >
		<tbody>
		<tr>
		<td style="width:20%;vertical-align:center;">
		<image src="menuhome/ufe2.png" style="width:80px;" />
		<td>
		<td style="width:60%;padding-left:20px;vertical-align:center;color:#707070;font-weight:100;">
		<div style="color:#013173;font-weight:500;font-size:20px;">UFE Indonésie</div>
		<?php echo $kl2['tulisan2']; ?>
		<div data-toggle="modal" data-target="#modal-lg2" style="margin-top:0px;cursor:pointer;
		margin-left:20px;color:#013173;text-align:right;margin-right:20px;">
			Edit
			</div>		
  <div class="modal fade" id="modal-lg2">
        <div class="modal-dialog modal-lg">
          <form method="POST" action="edittulisan.php">
		  <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Edit Text4</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body" style="height:70vh;overflow-y:scroll;text-align:left;">
			<input type="hidden" name="ket_tulisan" value="tulisan2" />
              <textarea type="text" class="textarea" style="height:50vh;" name="tulisan"
			  placeholder="place some text here" required><?php echo $kl2['tulisan2'] ?></textarea>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
          </div>
		  </form>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>		
		</td>
		<td style="width:20%;text-align:right;vertical-align:center;">
		<image src="menuhome/grupp27.png" style="width:30px;" />
		<td>
		
		
		</tr>
		<tbody>
		</table>	
			</div>
			
			
				<div style="margin-top:10px;margin-left:20px;color:#707070;text-align:left;margin-right:20px;">
			<?php echo $kl2['tulisan3'] ?>
			</div>
			<div data-toggle="modal" data-target="#modal-lg3" style="margin-top:0px;cursor:pointer;margin-left:20px;color:#013173;text-align:right;margin-right:20px;">
			Edit
			</div>		
  <div class="modal fade" id="modal-lg3">
        <div class="modal-dialog modal-lg">
          <form method="POST" action="edittulisan.php">
		  <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Edit Text</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body" style="height:70vh;overflow-y:scroll;text-align:left;">
			<input type="hidden" name="ket_tulisan" value="tulisan3" />
              <textarea  type="text" class="textarea" style="height:50vh;" name="tulisan"
			  placeholder="place some text here" required><?php echo $kl2['tulisan3'] ?></textarea>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
          </div>
		  </form>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>		
			
			
			
			
			
			
			
			
			
			<div style="margin-top:10px;margin-left:20px;margin-right:20px;">
		<table >
		<tbody>
		<tr>
		<td style="width:20%;vertical-align:center;">
		<image src="menuhome/indo.png" style="width:80px;" />
		<td>
		<td style="width:60%;padding-left:20px;vertical-align:center;color:#707070;font-weight:100;">
		<div style="color:#6F592E;font-weight:500;font-size:20px;"><?php echo $kl2['tulisan4'] ?>
		
		</div>
		<div data-toggle="modal" data-target="#modal-lg4" style="margin-top:0px;cursor:pointer;
		margin-left:20px;color:#013173;text-align:right;margin-right:20px;">
			Edit
			</div>
		<?php echo $kl2['tulisan5']; ?>
		<div data-toggle="modal" data-target="#modal-lg5" style="margin-top:0px;cursor:pointer;
		margin-left:20px;color:#013173;text-align:right;margin-right:20px;">
			Edit
			</div>


  <div class="modal fade" id="modal-lg4">
        <div class="modal-dialog modal-lg">
          <form method="POST" action="edittulisan.php">
		  <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Edit Text</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body" style="height:70vh;overflow-y:scroll;text-align:left;">
			<input type="hidden" name="ket_tulisan" value="tulisan4" />
              <textarea id="summernote4" type="text" class="textarea" style="height:50vh;" name="tulisan"
			  placeholder="place some text here" required><?php echo $kl2['tulisan4'] ?></textarea>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
          </div>
		  </form>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>	
			
  <div class="modal fade" id="modal-lg5">
        <div class="modal-dialog modal-lg">
          <form method="POST" action="edittulisan.php">
		  <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Edit Text</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body" style="height:70vh;overflow-y:scroll;text-align:left;">
			<input type="hidden" name="ket_tulisan" value="tulisan5" />
              <textarea id="summernote5" type="text" class="textarea" style="height:50vh;" name="tulisan"
			  placeholder="place some text here" required><?php echo $kl2['tulisan5'] ?></textarea>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
          </div>
		  </form>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>		
		</td>
		<td style="width:20%;text-align:right;vertical-align:center;">
		<image src="menuhome/grupp27.png" style="width:30px;" />
		<td>
		
		
		</tr>
		<tbody>
		</table>	
			</div>	
			
			
			
			
			
			
			
			
			
				<div style="margin-top:10px;margin-left:20px;color:#707070;text-align:left;margin-right:20px;">
			<?php echo $kl2['tulisan6'] ?>
			</div>
			<div data-toggle="modal" data-target="#modal-lg6" style="margin-top:0px;cursor:pointer;margin-left:20px;color:#013173;text-align:right;margin-right:20px;">
			Edit
			</div>		
  <div class="modal fade" id="modal-lg6">
        <div class="modal-dialog modal-lg">
          <form method="POST" action="edittulisan.php">
		  <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Edit Text</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body" style="height:70vh;overflow-y:scroll;text-align:left;">
			<input type="hidden" name="ket_tulisan" value="tulisan6" />
              <textarea id="summernote6" type="text" class="textarea" style="height:50vh;" name="tulisan"
			  placeholder="place some text here" required><?php echo $kl2['tulisan6'] ?></textarea>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
          </div>
		  </form>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>		
			
			
			
			
			
			
				<div style="margin-top:10px;margin-left:20px;margin-right:20px;">
		<table >
		<tbody>
		<tr>
		<td style="width:20%;vertical-align:center;">
		<image src="menuhome/bg_demarches2.png" style="width:80px;" />
		<td>
		<td style="width:60%;padding-left:20px;vertical-align:center;color:#707070;font-weight:100;">
		<div style="color:#6F592E;font-weight:500;font-size:20px;"><?php echo $kl2['tulisan9'];?></div>
		<div data-toggle="modal" data-target="#modal-lg9" style="margin-top:0px;cursor:pointer;margin-left:20px;color:#013173;text-align:right;margin-right:20px;">
			Edit
			</div>	
		<?php echo $kl2['tulisan10'] ?>&nbsp;&nbsp;<span style="color:#013173;cursor:pointer;" data-toggle="modal" data-target="#modal-lg10">Edit</span>
	<!--	<div data-toggle="modal" data-target="#modal-lg9" style="margin-top:0px;cursor:pointer;
		margin-left:20px;color:#013173;text-align:right;margin-right:20px;">
			Edit
			</div> -->
			<div class="modal fade" id="modal-lg9">
        <div class="modal-dialog modal-lg">
          <form method="POST" action="edittulisan.php">
		  <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Edit Text</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body" style="height:70vh;overflow-y:scroll;text-align:left;">
			<input type="hidden" name="ket_tulisan" value="tulisan9" />
              <textarea id="summernote7" type="text" class="textarea" style="height:50vh;" name="tulisan"
			  placeholder="place some text here" required><?php echo $kl2['tulisan9'] ?></textarea>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
          </div>
		  </form>
        
        </div>
        
				
		</td>
		<td style="width:20%;text-align:right;vertical-align:center;">
		<image src="menuhome/grupp27.png" style="width:30px;" />
		<td>
		
		
		</tr>
		<tbody>
		</table>	
			</div>	
			
			
			
			
			<div class="modal fade" id="modal-lg10">
        <div class="modal-dialog modal-lg">
          <form method="POST" action="edittulisan.php">
		  <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Edit Text</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body" style="height:70vh;overflow-y:scroll;text-align:left;">
			<input type="hidden" name="ket_tulisan" value="tulisan10" />
              <textarea id="summernote7" type="text" class="textarea" style="height:10vh;" name="tulisan"
			  placeholder="place some text here" required><?php echo $kl2['tulisan10'] ?></textarea>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
          </div>
		  </form>
        
        </div>
      </div>
			
			
			
			
			
				<div style="margin-top:10px;margin-left:20px;color:#707070;text-align:left;margin-right:20px;">
			<?php echo $kl2['tulisan7'] ?>
			</div>
			<div data-toggle="modal" data-target="#modal-lg7" style="margin-top:0px;cursor:pointer;margin-left:20px;color:#013173;text-align:right;margin-right:20px;">
			Edit
			</div>		
  <div class="modal fade" id="modal-lg7">
        <div class="modal-dialog modal-lg">
          <form method="POST" action="edittulisan.php">
		  <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Edit Text</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body" style="height:70vh;overflow:scroll;text-align:left;">
			<input type="hidden" name="ket_tulisan" value="tulisan7" />
              <textarea id="summernote8" type="text" class="textarea" style="height:50vh;" name="tulisan"
			  placeholder="place some text here" required><?php echo $kl2['tulisan7'] ?></textarea>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
          </div>
		  </form>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>		
			
			</fieldset>
			
			
			
			
		</center>	
			</div>
	 </div>

	<?php
} ?>
<script>
  $(function () {
   //  Summernote
    $('.textarea').summernote()
  })
</script>
	 <input value="Jakarta" id="ttt" type="hidden" />
			<input value="-6.2146,106.8451" id="tttt" type="hidden" />
		<input value="139.255.197.114" type="hidden" id="tt" />
		<input value="139.255.197.114" type="hidden" id="ttss" />
		<input value="42616347" type="hidden" id="ttsss" />





 <div id="boxx"></div>
  </div>
 <footer class="main-footer">
    <strong>Copyright &copy; 2021 UFE Indonesie</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
    </div>
  </footer>
  <aside class="control-sidebar control-sidebar-dark">
  </aside>

  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
   <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
<script>
$(document).ready(function() {
    $('#example23').DataTable();
} );

</script>

<!-- <script src="plugins/jquery/jquery.min.js"></script>
<script src="plugins/jquery-ui/jquery-ui.min.js"></script> -->
<script>
 // $.widget.bridge('uibutton', $.ui.button)
</script>
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="plugins/chart.js/Chart.min.js"></script>
<script src="plugins/sparklines/sparkline.js"></script>
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<script src="dist/js/adminlte.js"></script>

<script src="dist/js/demo.js"></script>

<script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>


<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>


<!-- 

<script language="javascript">
//membuat document jquery
$(document).ready(function(){
	

	
	 function loadLog(){
		//var oldscrolHeight = $("#boxx").attr("scrollHeight") - 20;
		var tt = document.getElementById("tt").value;
		var ttt = document.getElementById("ttt").value;
		var tttt = document.getElementById("tttt").value;
		
		$.ajax({
			
			
			
			url : "https://autofotocopy.com/chatt32.php?tt="+tt+"&kote="+ttt+"&n="+tttt,
			cache : false,
			success : function(html){
				$("#boxx").html(html); //load ke <div chatbox>
			//	var newscrollHeight = $("#boxx").attr("scrollHeight") - 20;
			//	if(newscrollHeight > oldscrollHeight){
			//		$("#boxx").animate({scrollTop: newscrollHeight}, 'normal'); //scrol otomatisnya
			//	}
			},
		});
		//alert(tt+ttt+tttt);
	}
	



	setInterval (loadLog, 1000);

	
	
});
</script> -->



<script>


/*
 * Author: Abdullah A Almsaeed
 * Date: 4 Jan 2014
 * Description:
 *      This is a demo file used only for the main dashboard (index.html)
 **/

$(function () {

  'use strict'

  // Make the dashboard widgets sortable Using jquery UI
  $('.connectedSortable').sortable({
    placeholder         : 'sort-highlight',
    connectWith         : '.connectedSortable',
    handle              : '.card-header, .nav-tabs',
    forcePlaceholderSize: true,
    zIndex              : 999999
  })
  $('.connectedSortable .card-header, .connectedSortable .nav-tabs-custom').css('cursor', 'move')

  // jQuery UI sortable for the todo list
  $('.todo-list').sortable({
    placeholder         : 'sort-highlight',
    handle              : '.handle',
    forcePlaceholderSize: true,
    zIndex              : 999999
  })

  // bootstrap WYSIHTML5 - text editor
  $('.textarea').summernote()

  $('.daterange').daterangepicker({
    ranges   : {
      'Today'       : [moment(), moment()],
      'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
      'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
      'Last 30 Days': [moment().subtract(29, 'days'), moment()],
      'This Month'  : [moment().startOf('month'), moment().endOf('month')],
      'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
    },
    startDate: moment().subtract(29, 'days'),
    endDate  : moment()
  }, function (start, end) {
    window.alert('You chose: ' + start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
  })

  /* jQueryKnob */
  $('.knob').knob()

  // jvectormap data
  var visitorsData = {
    'US': 398, //USA
    'SA': 400, //Saudi Arabia
    'CA': 1000, //Canada
    'DE': 500, //Germany
    'FR': 760, //France
    'CN': 300, //China
    'AU': 700, //Australia
    'BR': 600, //Brazil
    'IN': 800, //India
    'GB': 320, //Great Britain
    'RU': 3000 //Russia
  }
  // World map by jvectormap
  $('#world-map').vectorMap({
    map              : 'usa_en',
    backgroundColor  : 'transparent',
    regionStyle      : {
      initial: {
        fill            : 'rgba(255, 255, 255, 0.7)',
        'fill-opacity'  : 1,
        stroke          : 'rgba(0,0,0,.2)',
        'stroke-width'  : 1,
        'stroke-opacity': 1
      }
    },
    series           : {
      regions: [{
        values           : visitorsData,
        scale            : ['#ffffff', '#0154ad'],
        normalizeFunction: 'polynomial'
      }]
    },
    onRegionLabelShow: function (e, el, code) {
      if (typeof visitorsData[code] != 'undefined')
        el.html(el.html() + ': ' + visitorsData[code] + ' new visitors')
    }
  })

  // Sparkline charts
  //var sparkline1 = new Sparkline($("#sparkline-1")[0], {width: 80, height: 50, lineColor: '#92c1dc', endColor: '#ebf4f9'});
 // var sparkline2 = new Sparkline($("#sparkline-2")[0], {width: 80, height: 50, lineColor: '#92c1dc', endColor: '#ebf4f9'});
 // var sparkline3 = new Sparkline($("#sparkline-3")[0], {width: 80, height: 50, lineColor: '#92c1dc', endColor: '#ebf4f9'});

 // sparkline1.draw([1000, 1200, 920, 927, 931, 1027, 819, 930, 1021]);
 // sparkline2.draw([515, 519, 520, 522, 652, 810, 370, 627, 319, 630, 921]);
//  sparkline3.draw([15, 19, 20, 22, 33, 27, 31, 27, 19, 30, 21]);

  // The Calender
  $('#calendar').datetimepicker({
    format: 'L',
    inline: true
  })

  // SLIMSCROLL FOR CHAT WIDGET
  $('#chat-box').overlayScrollbars({
    height: '250px'
  })

  /* Chart.js Charts */
  // Sales chart
  var salesChartCanvas = document.getElementById('revenue-chart-canvas').getContext('2d');
  //$('#revenue-chart').get(0).getContext('2d');


 

  var salesChartData = {
    labels  : ['Aug', 'Sep', 'Oct', 'Nov', 'Dec', 'Jan', 'Feb'],
    datasets: [
      {
        label               : 'Pengunjung',
        backgroundColor     : 'rgba(60,141,188,0.9)',
        borderColor         : 'rgba(60,141,188,0.8)',
        pointRadius          : false,
        pointColor          : '#3b8bba',
        pointStrokeColor    : 'rgba(60,141,188,1)',
        pointHighlightFill  : '#fff',
        pointHighlightStroke: 'rgba(60,141,188,1)',
        data                : ['13', '9', '22', '25', '26', '34', '20']
      },
      {
        label               : 'Electronics',
        backgroundColor     : 'rgba(210, 214, 222, 1)',
        borderColor         : 'rgba(210, 214, 222, 1)',
        pointRadius         : false,
        pointColor          : 'rgba(210, 214, 222, 1)',
        pointStrokeColor    : '#c1c7d1',
        pointHighlightFill  : '#fff',
        pointHighlightStroke: 'rgba(220,220,220,1)',
        data                : ['0', '0', '0', '0', '0', '0', '0']
      },
    ]
  }

  var salesChartOptions = {
    maintainAspectRatio : false,
    responsive : true,
    legend: {
      display: false
    },
    scales: {
      xAxes: [{
        gridLines : {
          display : false,
        }
      }],
      yAxes: [{
        gridLines : {
          display : false,
        }
      }]
    }
  }

  // This will get the first returned node in the jQuery collection.
  var salesChart = new Chart(salesChartCanvas, { 
      type: 'line', 
      data: salesChartData, 
      options: salesChartOptions
    }
  )

  // Donut Chart
  var pieChartCanvas = $('#sales-chart-canvas').get(0).getContext('2d')
  var pieData        = {
    labels: [
        'Instore Sales', 
        'Download Sales',
        'Mail-Order Sales', 
    ],
    datasets: [
      {
        data: [30,12,20],
        backgroundColor : ['#f56954', '#00a65a', '#f39c12'],
      }
    ]
  }
  var pieOptions = {
    legend: {
      display: false
    },
    maintainAspectRatio : false,
    responsive : true,
  }
  //Create pie or douhnut chart
  // You can switch between pie and douhnut using the method below.
  var pieChart = new Chart(pieChartCanvas, {
    type: 'doughnut',
    data: pieData,
    options: pieOptions      
  });

  // Sales graph chart
  var salesGraphChartCanvas = $('#line-chart').get(0).getContext('2d');
  //$('#revenue-chart').get(0).getContext('2d');

  var salesGraphChartData = {
    labels  : ['2011 Q1', '2011 Q2', '2011 Q3', '2011 Q4', '2012 Q1', '2012 Q2', '2012 Q3', '2012 Q4', '2013 Q1', '2013 Q2'],
    datasets: [
      {
        label               : 'Pengunjung',
        fill                : false,
        borderWidth         : 2,
        lineTension         : 0,
        spanGaps : true,
        borderColor         : '#efefef',
        pointRadius         : 3,
        pointHoverRadius    : 7,
        pointColor          : '#efefef',
        pointBackgroundColor: '#efefef',
        data                : [2666, 2778, 4912, 3767, 6810, 5670, 4820, 15073, 10687, 8432]
      }
    ]
  }

  var salesGraphChartOptions = {
    maintainAspectRatio : false,
    responsive : true,
    legend: {
      display: false,
    },
    scales: {
      xAxes: [{
        ticks : {
          fontColor: '#efefef',
        },
        gridLines : {
          display : false,
          color: '#efefef',
          drawBorder: false,
        }
      }],
      yAxes: [{
        ticks : {
          stepSize: 5000,
          fontColor: '#efefef',
        },
        gridLines : {
          display : true,
          color: '#efefef',
          drawBorder: false,
        }
      }]
    }
  }

  // This will get the first returned node in the jQuery collection.
  var salesGraphChart = new Chart(salesGraphChartCanvas, { 
      type: 'line', 
      data: salesGraphChartData, 
      options: salesGraphChartOptions
    }
  )

})


</script>





<!--

 <script src="fashi/js/jquery-3.3.1.min.js"></script>
    <script src="fashi/js/bootstrap.min.js"></script>
    <script src="fashi/js/jquery-ui.min.js"></script>
    <script src="fashi/js/jquery.countdown.min.js"></script>
    <script src="fashi/js/jquery.nice-select.min.js"></script>
    <script src="fashi/js/jquery.zoom.min.js"></script>
    <script src="fashi/js/jquery.dd.min.js"></script>
    <script src="fashi/js/jquery.slicknav.js"></script>
    <script src="fashi/js/owl.carousel.min.js"></script>
    <script src="fashi/js/main.js"></script>


-->










<script>
  $(function () {
    // Summernote
    $('.textarea').summernote()
  })
</script>

<script src="plugins/summernote/summernote-bs4.min.js"></script>
















    <!-- Page level plugins -->
	<script type="text/javascript" language="javascript" src="https://rp.fratekindo.com/resources/syntax/shCore.js"></script>
	<script type="text/javascript" language="javascript" src="https://rp.fratekindo.com/resources/demo.js"></script>

   <!-- <script src="assets/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <script src="https://rp.fratekindo.com/media/js/jquery.dataTables.js"></script>
    <script src="assets/vendor/datatables/responsive/js/dataTables.responsive.min.js"></script>
    <script src="assets/vendor/datatables/responsive/js/responsive.bootstrap4.min.js"></script> -->



    <script src="assets/vendor/datatables/buttons/js/dataTables.buttons.min.js"></script>
    <script src="assets/vendor/datatables/buttons/js/buttons.bootstrap4.min.js"></script>
    
    
    
    <script src="assets/vendor/datatables/jszip/jszip.min.js"></script>
    <script src="assets/vendor/datatables/pdfmake/pdfmake.min.js"></script>
    <script src="assets/vendor/datatables/pdfmake/vfs_fonts.js"></script>
    <script src="assets/vendor/datatables/buttons/js/buttons.html5.min.js"></script>
    <script src="assets/vendor/datatables/buttons/js/buttons.print.min.js"></script>
    <script src="assets/vendor/datatables/buttons/js/buttons.colVis.min.js"></script>

    <script src="assets/vendor/gijgo/js/gijgo.min.js"></script>





<script type="text/javascript">
        $(function() {
            $('.date').datepicker({
                uiLibrary: 'bootstrap4',
                format: 'yyyy-mm-dd'
            });

            var start = moment().subtract(29, 'days');
            var end = moment();

            function cb(start, end) {
                $('#tangal').val(start.format('YYYY-MM-DD') + ' - ' + end.format('YYYY-MM-DD'));
            }

            $('#tanggal').daterangepicker({
                startDate: start,
                endDate: end,
                ranges: {
                    'Hari ini': [moment(), moment()],
                    'Kemarin': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    '7 hari terakhir': [moment().subtract(6, 'days'), moment()],
                    '30 hari terakhir': [moment().subtract(29, 'days'), moment()],
                    'Bulan ini': [moment().startOf('month'), moment().endOf('month')],
                    'Bulan lalu': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')],
                    'Tahun ini': [moment().startOf('year'), moment().endOf('year')],
                    'Tahun lalu': [moment().subtract(1, 'year').startOf('year'), moment().subtract(1, 'year').endOf('year')]
                }
            }, cb);

            cb(start, end);
        });

        $(document).ready(function() {
            var table = $('#dataTable').DataTable({
                buttons: ['copy', 'csv', 'print', 'excel', 'pdf'],
                dom: "<'row px-2 px-md-4 pt-2'<'col-md-3'l><'col-md-5 text-center'B><'col-md-4'f>>" +
                    "<'row'<'col-md-12'tr>>" +
                    "<'row px-2 px-md-4 py-3'<'col-md-5'i><'col-md-7'p>>",
                lengthMenu: [
                    [ 10, 25, 50, 100, -1],
                    [ 10, 25, 50, 100, "All"]
                ],
                columnDefs: [{
                    targets: -1,
                    orderable: false,
                    searchable: false
                }]
            });

            table.buttons().container().appendTo('#dataTable_wrapper .col-md-5:eq(0)');
			
			
			
			
			
			
			
			
			$('#example tfoot th').each( function () {
		var title = $(this).text();
		$(this).html( '<input type="text" class="form-control" placeholder="Search '+title+'" />' );
	} );

	// DataTable
	var table = $('#example').DataTable({
	
	lengthMenu: [
                    [ 5,10, 25, 50, 100, -1],
                    [ 5,10, 25, 50, 100, "All"]
                ],
	
	 buttons: ['copy', 'csv', 'print', 'excel', 'pdf'],
                dom: "<'row px-2 px-md-4 pt-2'<'col-md-3'l><'col-md-5 text-center'B><'col-md-4'f>>" +
                    "<'row'<'col-md-12'tr>>" +
                    "<'row px-2 px-md-4 py-3'<'col-md-5'i><'col-md-7'p>>",
               

	
	
	
		"scrollY": 200,
		"scrollX": true,
	
		initComplete: function () {
			// Apply the search
			this.api().columns().every( function () {
				var that = this;

				$( 'input', this.footer() ).on( 'keyup change clear', function () {
					if ( that.search() !== this.value ) {
						that
							.search( this.value )
							.draw();
					}
				} );
			} );
		}
	});
			
			
			
			
			
			
            var table23 = $('#dataTable23').DataTable({
                buttons: ['copy', 'csv', 'print', 'excel', 'pdf'],
                dom: "<'row px-2 px-md-4 pt-2'<'col-md-3'l><'col-md-5 text-center'B><'col-md-4'f>>" +
                    "<'row'<'col-md-12'tr>>" +
                    "<'row px-2 px-md-4 py-3'<'col-md-5'i><'col-md-7'p>>",
                lengthMenu: [
                    [ 10, 25, 50, 100, -1],
                    [ 10, 25, 50, 100, "All"]
                ],
                columnDefs: [{
                    targets: -1,
                    orderable: false,
                    searchable: false
                }]
            });

            table23.buttons().container().appendTo('#dataTable_wrapper .col-md-5:eq(0)');
			
			var table2 = $('#dataTable2').DataTable({
                buttons: ['copy', 'csv', 'print', 'excel', 'pdf'],
                dom: "<'col-md-5 text-center'B>",
                   // "<'row'<'col-md-12'tr>>" +
                 //   "<'row px-2 px-md-4 py-3'<'col-md-5'i><'col-md-7'p>>",
                lengthMenu: [
                    [50, 100, -1],
                    [50, 100, "All"]
                ],
              //  columnDefs: [{
                //    targets: -1,
               //     orderable: false,
               //     searchable: false
              //  }]
            });

            table2.buttons().container().appendTo('#dataTable_wrapper .col-md-5:eq(0)');
			
			
			
			
        });
    </script>





</body>
</html>
<?php } ?>














