<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://rsms.me/inter/inter-ui.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <title>Delete Product - Artur Boost</title>
    <link rel="stylesheet" href="/artur/home/css/default.css" id="theme-color">
    <style>
        body {
            overflow-x: clip;
        }

        .py-7 {
            padding: 3rem 0;
        }

        .container {
            width: 80%;
            margin: auto;
        }

        .text-center {
            text-align: center;
        }

        .btn {
            margin-top: 10px;
        }

        .text-danger {
            color: #ff0000;
        }
    </style>
</head>
<body>

<?php
include 'conexiune.php';
session_start();

if (!isset($_SESSION['name']) || $_SESSION['root'] != 1) {
    header("Location: home.php");
    exit();
}

if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($conexiune, $_GET['id']);
    $query = "DELETE FROM products WHERE id='$id'";
    $result = mysqli_query($conexiune, $query);

    if ($result) {
        $success_message = "Product deleted successfully.";
    } else {
        $error_message = "Error deleting product. Please try again.";
    }
}
?>

<section class="py-7" id="delete-product">
    <div class="container">
        <div class="row">
            <div class="col-md-6 mx-auto text-center">
                <h2>Delete Product</h2>
                <?php
                if (isset($success_message)) {
                    echo '<p class="text-success">' . $success_message . '</p>';
                } elseif (isset($error_message)) {
                    echo '<p class="text-danger">' . $error_message . '</p>';
                } else {
                    echo '<p class="text-danger">Product ID not provided.</p>';
                }
                ?>
                <button class="btn btn-primary" onclick="goBack()">Go Back</button>
            </div>
        </div>
    </div>
</section>

<script>
    function goBack() {
        window.location.href = "/artur/home/admin/examples/dashboard.php";
    }
</script>

<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.7.3/feather.min.js"></script>
<script src="js/scripts.js"></script>

</body>
</html>

<?php

mysqli_close($conexiune);
?>
