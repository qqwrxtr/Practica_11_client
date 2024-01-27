<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://rsms.me/inter/inter-ui.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <title>Update Product - Artur Boost</title>
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

        .form-group {
            margin-bottom: 20px;
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

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = mysqli_real_escape_string($conexiune, $_POST['id']);
    $title = mysqli_real_escape_string($conexiune, $_POST['title']);
    $price = mysqli_real_escape_string($conexiune, $_POST['price']);
    $rank = mysqli_real_escape_string($conexiune, $_POST['rank']);
    $time = mysqli_real_escape_string($conexiune, $_POST['time']);

    $query = "UPDATE products SET title='$title', price='$price', rank='$rank', time='$time' WHERE id='$id'";
    $result = mysqli_query($conexiune, $query);

    if ($result) {
        header("Location: /artur/home/admin/examples/dashboard.php");
        exit();
    } else {
        $error_message = "Error updating product. Please try again.";
    }
}

if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($conexiune, $_GET['id']);
    $query = "SELECT * FROM products WHERE id='$id'";
    $result = mysqli_query($conexiune, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $product = mysqli_fetch_assoc($result);
    } else {
        $error_message = "Product not found.";
    }
}
?>

<section class="py-7" id="update-product">
    <div class="container">
        <div class="row">
            <div class="col-md-6 mx-auto text-center">
                <h2>Update Product</h2>
                <?php
                if (isset($error_message)) {
                    echo '<p class="text-danger">' . $error_message . '</p>';
                }
                ?>
                <form method="post" action="">
                    <input type="hidden" name="id" value="<?php echo $product['id']; ?>">
                    <div class="form-group">
                        <label for="title">Product Title:</label>
                        <input type="text" class="form-control" id="title" name="title" value="<?php echo $product['title']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="price">Price:</label>
                        <input type="number" class="form-control" id="price" name="price" value="<?php echo $product['price']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="rank">Rank:</label>
                        <input type="text" class="form-control" id="rank" name="rank" value="<?php echo $product['rank']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="time">Time:</label>
                        <input type="text" class="form-control" id="time" name="time" value="<?php echo $product['time']; ?>" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Update Product</button>
                    <button class="btn btn-primary" onclick="goBack()">Go Back</button>
                </form>
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
