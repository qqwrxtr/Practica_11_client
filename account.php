<?php
include 'conexiune.php';
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://rsms.me/inter/inter-ui.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <title>Account Information - Artur Boost</title>
    <link rel="stylesheet" href="css/default.css" id="theme-color">
</head>
<body style="overflow-x:clip;">

<section class="smart-scroll">
    <div class="container-fluid">
        <nav class="navbar navbar-expand-md navbar-dark">
            <a class="navbar-brand heading-black" href="home.php">
                Artur Boost
            </a>
            <button class="navbar-toggler navbar-toggler-right border-0" type="button" data-toggle="collapse"
                    data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false"
                    aria-label="Toggle navigation">
                <span data-feather="grid"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="#features">Ce oferim?</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="#pricing">Pachete de boost</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="#faq">FAQ</a>
                    </li>
                    <li class="nav-item mt-1">
                        <a href="account.php"><span class="material-symbols-outlined"> person </span></a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</section>

<section class="py-7" id="account">
    <div class="container">
        <div class="row">
            <div class="col-md-6 mx-auto text-center">
                <h2>Your Account Information</h2>
                <?php
                if (isset($_SESSION['name'])) {
                    echo "<p>Welcome, {$_SESSION['name']}!</p>";
                    echo "<p>Email: {$_SESSION['email']}</p>";
                    if($_SESSION['root'] == 1){
                        echo "<p>User Type: Admin</p>";
                    } else{
                        echo "<p>User Type: User</p>";
                    }
                    
                } else {
                    echo "<p>Error: User not found.</p>";
                }
                ?>
                <?php 
                    if($_SESSION['root'] == 1){
                        echo '<button class="btn btn-primary" onclick="admin()">Admin Pannel</button>';
                    }
                ?>
                <button class="btn btn-primary" onclick="goBack()">Go Back</button>
                <button class="btn btn-danger" onclick="logout()">Log Out</button>
            </div>
        </div>
    </div>
</section>

<script>
    function goBack() {
        window.history.back();
    }

    function logout() {
        window.location.href = "logout.php";
    }
    function admin() {
        window.location.href = "/artur/home/admin/examples/dashboard.php";
    }
</script>

<footer class="py-6 py-7 bg-dark section-angle top-left ">
    <div class="container">
        <div class="row">
            <div class="col-sm-5 mr-auto">
                <h5>Despre Artur boost</h5>
                <p class="text-muted">Suntem o companie internationala care se ocupa de boost-ul accountului in toate jocurile disponibile, suntem incantati sa va deservim</p>
            </div>
            <div class="col-sm-2">
                <h5>Fast Acces</h5>
                <ul class="list-unstyled">
                    <li><a href="#faq">FAQ</a></li>
                    <li><a href="#features">De ce noi?</a></li>
                </ul>
            </div>
            <div class="col-sm-2">
                <h5>Produse</h5>
                <ul class="list-unstyled">
                    <li><a href="#pricing">Produse</a></li>
                    <li><a href="logout.php">Log Out</a></li>
                </ul>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-12 text-muted text-center small-xl">
                &copy; 2023 Artur Boost - All Rights Reserved
            </div>
        </div>
    </div>
</footer>

<div class="scroll-top">
    <i class="fa fa-angle-up" aria-hidden="true"></i>
</div>

<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.7.3/feather.min.js"></script>
<script src="js/scripts.js"></script>
</body>
</html>
