<?php
include 'conexiune.php';
session_start();
?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Artur Boost</title>
    <link href="https://rsms.me/inter/inter-ui.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />

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
                    <?php
                    if (isset($_SESSION['name'])) {
                        echo '<li class="nav-item mt-1">
                                <a href="account.php"><span class="material-symbols-outlined"> person </span></a>
                            </li>';
                    } else {
                        echo '<li class="nav-item">
                                <a class="nav-link page-scroll" href="log.php">Log In</a>
                            </li>';
                    }
                    ?>
                </ul>
            </div>

        </nav>
    </div>
</section>

<section class="py-7 py-md-0 bg-hero" id="home">
    <div class="container">
        <div class="row vh-md-100">
            <div class="col-md-8 col-sm-10 col-12 mx-auto my-auto text-center">
                <h1 class="heading-black text-capitalize">Boostam rapid si calitativ pe orice platforma</h1>
                <p class="lead py-3">Suntem o platforma online in care puteti sa va boostati account-ul in multiple jocuri video,rapid si calitativ,mii de recenzii pozitive</p>
                <button class="btn btn-primary d-inline-flex flex-row align-items-center">
                    <a href="#pricing" class="page-scroll"style='color:black;scroll-behavior: smooth !important;'>Incepe acum</a>
                    <em class="ml-2" data-feather="arrow-right"></em>
                </button>
            </div>
        </div>
    </div>
</section>

<section class="pt-6 pb-7" id="features">
    <div class="container">
        <div class="row">
            <div class="col-md-6 mx-auto text-center">
                <h2 class="heading-black">Artur Boost iti ofera tot de ce e nevoie</h2>
                <p class="text-muted lead">Descoperă o lume a indulgenței în gaming cu gama noastră variată de pachete create pentru a-ți satisface toate dorințele. Fiecare pachet este conceput cu grijă.</p>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-md-10 mx-auto">
                <div class="row feature-boxes">
                    <div class="col-md-6 box">
                        <div class="icon-box box-primary">
                            <div class="icon-box-inner">
                                <span data-feather="edit-3" width="35" height="35"></span>
                            </div>
                        </div>
                        <h5>Completeaza formularul</h5>
                        <p class="text-muted">Odata ce completezi formularul de boost,te vom contacta si iti vom oferi detalii pentru viitor</p>
                    </div>
                    <div class="col-md-6 box">
                        <div class="icon-box box-success">
                            <div class="icon-box-inner">
                                <span data-feather="monitor" width="35" height="35"></span>
                            </div>
                        </div>
                        <h5>Lucram calitativ si rapid</h5>
                        <p class="text-muted">Timpul acordat pentru boost depinde de pachetul procurat,totul se face in timp</p>
                    </div>
                    <div class="col-md-6 box">
                        <div class="icon-box box-danger">
                            <div class="icon-box-inner">
                                <span data-feather="layout" width="35" height="35"></span>
                            </div>
                        </div>
                        <h5>Securitate inalta</h5>
                        <p class="text-muted">Puteti fi increzuti in securitatea accountului dumneavoastra,toate jocurile sunt translate pe twitch,datele dumneavoastra sunt securizate</p>
                    </div>
                    <div class="col-md-6 box">
                        <div class="icon-box box-info">
                            <div class="icon-box-inner">
                                <span data-feather="globe" width="35" height="35"></span>
                            </div>
                        </div>
                        <h5>Lucram international</h5>
                        <p class="text-muted">De oriunde ati fi aveti posibilitatea de a procura serviciile noastre</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-7 bg-dark section-angle top-right bottom-right" id="pricing">
    <div class="container">
        <div class="row">
            <div class="col-md-6 mx-auto text-center">
                <h2 class="text-white heading-black">Alegeti Produsul de care ai nevoie.</h2>
            </div>
        </div>
        <div class="row pt-5 pricing-table">
            <div class="col-12 mx-auto">
                <div class="card-deck pricing-table mt-4 ">
                    <?php
                    include 'conexiune.php';

                    $sql = "SELECT * FROM `products`";
                    $result = mysqli_query($conexiune, $sql);

                    $count = 0;

                    if (mysqli_num_rows($result) > 0) {
                        while ($product = mysqli_fetch_assoc($result)) {
                            if ($count % 3 == 0) {
                                echo '</div><div class="card-deck pricing-table mt-4 ">';
                            }
                            ?>
                            <div class="card" style="max-width: 350px;">
                                <div class="card-body text-center" style="width: 350px;">
                                    <h3 class="card-title pt-3"><?php echo $product['title']; ?></h3>
                                    <h2 class="card-title text-primary mb-0 pt-4">$<?php echo $product['price']; ?></h2>
                                    <ul class="list-unstyled pricing-list">
                                        <li>Rank : <?php echo $product['rank']; ?></li>
                                        <li>Timpul necesar : <?php echo $product['time']; ?></li>
                                    </ul>
                                    <a href="#" class="btn btn-primary">
                                        Cumpara Acum
                                    </a>
                                </div>
                            </div>
                            <?php
                            $count++;
                        }
                    } else {
                        echo "No products found.";
                    }

                    mysqli_close($conexiune);
                    ?>
                </div>
            </div>
        </div>
    </div>

    <?php
  
        if (!isset($_SESSION['name'])) {
            ?>
                <div class="row mt-5">
                    <div class="col-md-8 col-12 divider top-divider mx-auto pt-5 text-center">
                        <h3>Sunteti interesat in produsul nostru?</h3>
                        <p class="mb-4">Creati un account si bucurativa pe deplin de produsele noastre</p>
                        <button class="btn btn-primary">
                            <a href="log.php" style='color:black;'>Create your account</a>
                        </button>
                    </div>
                </div>
            <?php
        }
        ?>
    </div>
</section>

<section class="py-7" id="faq">
    <div class="container">
        <div class="row">
            <div class="col-md-6 mx-auto text-center">
                <h2>Frequently asked questions</h2>
                <p class="text-muted lead">Raspunsuri la cele mai comune intrebari</p>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-md-10 mx-auto">
                <div class="row">
                    <div class="col-md-6 mb-5">
                        <h6>Pot primi ban pentru boost?</h6>
                        <p class="text-muted">In cazul nostru nu,deoarece noi boostam cu propriile puteri,fara a folosi aplicatii 3-d person</p>
                    </div>
                    <div class="col-md-6 mb-5">
                        <h6>Nu o sa imi fie furat accountul in joaca?</h6>
                        <p class="text-muted">Nu,datele dumneavoastra sunt securizate si accesate doar de persoane de incredere</p>
                    </div>
                    <div class="col-md-6 mb-5">
                        <h6>Pot primi o reducere la produse?</h6>
                        <p class="text-muted">Da,primul produs procurat va avea 10% reducere</p>
                    </div>
                    <div class="col-md-6 mb-5">
                        <h6>De cat timp sunteti pe piata?</h6>
                        <p class="text-muted">Suntem pe piata de 3 ani,cu mii de clienti satisfacuti de produsele noastre</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<footer class="py-6 py-7 bg-dark section-angle top-left ">
    <div class="container">
        <div class="row">
            <div class="col-sm-5 mr-auto">
                <h5>Despre Artur boost</h5>
                <p class="text-muted">Suntem o companie internationala care se ocupa de boost-ul accountului in toate jocurile disponibile,suntem incantati sa va deservim</p>
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
                    <li><a href="log.php">Log in</a></li>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
<script src="js/scripts.js"></script>
</body>
</html>