<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!----======== CSS ======== -->
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="main.css"> 
    <link rel="stylesheet" href="main.css"> 
    <link rel="stylesheet" href="form.css">
     
    <!----===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <title>Admin Dashboard Panel</title> 
</head>
<body>
    <nav>
        <div class="logo-name">
            <div class="logo-image">
                <img src="pictures/logo.jpeg" alt="">
            </div>
            <span class="logo_name">PETS</span>
        </div>

        <div class="menu-items">
            <ul class="nav-links">
                <li><a href="./products.php">
                    <i class="uil uil-box"></i>
                    <span class="link-name">Pets</span>
                </a></li>
                     <li><a href="./profile.php"> 
                         <i class="uil uil-user"></i> 
                        <span class="link-name">Profile</span> 
                     </a></li>
            </ul>
            
            <ul class="logout-mode">
                <li><a href="./logout.php">
                    <i class="uil uil-signout"></i>
                    <span class="link-name">Logout</span>
                </a></li>
                <div class="mode-toggle">
                  <!-- <span class="switch"></span> -->
                </div>
            </ul>
        </div>
    </nav>
    <section class="dashboard">
        <div class="top">
            <i class="uil uil-bars sidebar-toggle"></i>
        </div>
        
        <!-- Add this form below the existing top div -->
        <div class="form-container">
            <h2>Update Product</h2>

<?php
require 'connectdb.php';
$id = $_GET['id'];
$query = "SELECT * FROM alllpets WHERE id = '$id'";
$result = mysqli_query($conn, $query);
$product = mysqli_fetch_assoc($result);
mysqli_close($conn);
?>

<!-- Form to update product -->
<form id="productForm" method="post">
  <div class="form-row">
    <div class="form-group">
      <label for="productName">Product Name</label>
      <input type="text" id="productName" name="productName" value="<?= $product['name'] ?>" required>
    </div>
  </div>
  <div class="form-row">
    <div class="form-group">
      <label for="price">Price</label>
      <input type="number" id="price" name="price" value="<?= $product['price'] ?>" required>
    </div>
    <div class="form-group">
      <label for="quantity">Quantity</label>
      <input type="number" id="quantity" name="quantity" value="<?= $product['quantity'] ?>" required>
    </div>
  </div>
  <div class="form-row">
    <div class="form-group">
      <label for="description">Description</label>
      <textarea id="description" name="description" rows="4" required><?= $product['description'] ?></textarea>
    </div>
  </div>
  <button type="submit">Update Product</button>
</form>

        </div>
    </section>
    
    <?php
require 'connectdb.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
//   $id = $_GET["id"];
  $productName = $_POST["productName"];
  $category = $_POST["category"];
  $price = $_POST["price"];
  $quantity = $_POST["quantity"];
  $description = $_POST["description"];

  $query = "UPDATE alllpets SET name = '$productName',  price = '$price', quantity = '$quantity', description = '$description' WHERE id = '$id'";
  mysqli_query($conn, $query);

  mysqli_close($conn);

  header("Location: products.php");
  exit;
}
?>


    <script src="script.js"></script>
</body>
</html>
