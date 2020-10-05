<!DOCTYPE html>
<html lang="ar">


<!-- patients23:17-->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
    <title>Preclinic - Medical & Hospital - Bootstrap 4 Admin Template</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/select2.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="assets/sweetAlert/dist/sweetalert2.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/myweb.css">
    <!--[if lt IE 9]>
		<script src="assets/js/html5shiv.min.js"></script>
		<script src="assets/js/respond.min.js"></script>
    <![endif]-->
</head>
<body>
    <div class="main-wrapper">
        <div  class="header">
			<div class="header-left float-right" >
                <a id="toggle_btn" href="javascript:void(0);"><i class="fa fa-bars"></i></a>
                <a id="mobile_btn" class="mobile_btn float-left" href="#sidebar"><i class="fa fa-bars"></i></a>
                    <a href="index.php" class="logo">
                        <span>جماعة فم العنصر</span>
                    </a>
			</div>
			
            <ul class="nav user-menu float-left">
                <li class="nav-item dropdown has-arrow">
                    <a href="#" class="dropdown-toggle nav-link user-link" data-toggle="dropdown">
                        <span class="user-img"><img class="rounded-circle" src="assets/img/user.jpg" width="40" alt="Admin">
							<span class="status online"></span></span>
                        <span> مستخدم </span>
                    </a>
					<div class="dropdown-menu">
						<a class="dropdown-item" href="settings.html">حسابي</a>
						<a class="dropdown-item" href="login.php">تسجيل الخروج</a>
					</div>
                </li>
            </ul>
            <div class="dropdown mobile-user-menu float-right">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="profile.html">My Profile</a>
                    <a class="dropdown-item" href="edit-profile.html">Edit Profile</a>
                    <a class="dropdown-item" href="settings.html">Settings</a>
                    <a class="dropdown-item" href="login.html">Logout</a>
                </div>
            </div>
        </div>
        <div class="sidebar" id="sidebar">
            <div class="sidebar-inner slimscroll">
                <div id="sidebar-menu" class="sidebar-menu">
                    <ul>

                        <li id='title' >
                            <a href="index.php"><i class="fa fa-dashboard"></i> <span> &nbsp;لوحة التحكم&nbsp; </span></a>
                        </li>
						
                        <li id='demandes'>
                            <a href="demandes.php"><i class="fa fa-key"></i> <span>&nbsp;طلبات الاشتراك&nbsp;</span></a>
                        </li>
                        <li id='visit'>
                            <a href="visit.php"><i class="fa fa-eye"></i> <span>&nbsp;معاينة&nbsp;</span></a>
                        </li>
                        <li id='abonne' >
                            <a href="abonne.php"><i class="fa fa-user"></i> <span>&nbsp;المشتركين&nbsp;</span></a>
                        </li>
                        <li id='factures' >
                            <a href="factures.php"> <i class="fa fa-calendar-check-o"></i> <span> &nbsp;الفواتير&nbsp;  </span></a>
                        </li>
                        <li id='dette'>
                            <a href="dette.php"><i class="fa fa-money"></i> <span> &nbsp;الديون&nbsp; </span></a>
                        </li>
                        <li id='produit'>
                            <a href="produit.php"><i class="fa fa-laptop"></i> <span> &nbsp; المنتجات&nbsp;  </span></a>
                        </li>
						
						
                    </ul>
                </div>
            </div>
        </div>