<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="main.css"> 
    <link rel="stylesheet" href="form.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <title>Admin Dashboard Panel</title> 
</head>
<body>
<?php
require 'connectdb.php';
session_start();

$id = $_GET['id']; // Get the customer ID from the URL

$query = "SELECT * FROM customers WHERE id = '$id'";
$result = mysqli_query($conn, $query);
$customer = mysqli_fetch_assoc($result);

$name = $customer['name'];
$number = $customer['number'];
$address = $customer['address'];
$email = $customer['email'];
$password = $customer['password'];
?>

<nav>
    <div class="logo-name">
        <div class="logo-image">
            <img src="pictures/logo.jpeg" alt="">
        </div>
        <span class="logo_name">PETS</span>
    </div>
    <div class="menu-items">
        <ul class="nav-links">
            <li><a href="./admin.php">
                <i class="uil uil-user"></i>
                <span class="link-name">All Customers</span>
            </a></li>
        </ul>
        <ul class="logout-mode">
            <li><a href="./logout.php">
                <i class="uil uil-signout"></i>
                <span class="link-name">Logout</span>
            </a></li>
        </ul>
    </div>
</nav>
<section class="dashboard">
    <div class="top">
        <i class="uil uil-bars sidebar-toggle"></i>
    </div>
    <div class="form-container">
        <h2>Update Customer</h2>
        <form id="productForm" method="post">
            <div class="form-row">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" value="<?php echo $name; ?>" required>
                </div>
                <div class="form-group">
                    <label for="number">Number</label>
                    <input type="number" id="number" name="number" value="<?php echo $number; ?>" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label for="address">Address</label>
                    <textarea id="address" name="address" rows="4" required><?php echo $address; ?></textarea>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" id="email" name="email" value="<?php echo $email; ?>" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" value="<?php echo $password; ?>" required>
                </div>
            </div>
            <button type="submit" name="update_customer">Update Customer</button>
        </form>
    </div>
</section>

<?php 
if (isset($_POST['update_customer'])) {
    $name = $_POST['name'];
    $number = $_POST['number'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "UPDATE customers 
              SET name = '$name', 
                  number = '$number', 
                  address = '$address', 
                  email = '$email', 
                  password = '$password' 
              WHERE id = '$id'";

    mysqli_query($conn, $query);
    mysqli_close($conn);

    header("Location: admin.php");
    exit;
}
?>

<script src="script.js"></script>
</body>
</html>
