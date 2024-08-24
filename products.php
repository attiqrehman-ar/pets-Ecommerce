<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!----======== CSS ======== -->
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="main.css">
     
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
            <li><a href="logout.php"> 
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
        <div class="table-container">
            <div>
                <button  class="edit-btn">

                    <a href="./addProduct.php">
                        <i class="uil uil-plus"></i>
                        Add New
                    </a>
                </button>
            </div>
            <table class="product-table">
                <thead>
                    <tr>
                        <th>Sr no</th>
                        <th>Pet Name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>


                <?php 
   require 'connectdb.php' ;
    $query = "SELECT * FROM alllpets";
$result = mysqli_query($conn, $query);

// Fetch products as an array
$products = mysqli_fetch_all($result, MYSQLI_ASSOC);

// Close connection
mysqli_close($conn);

// Display products
foreach ($products as $product) { ?>
  <tr>
    <td><?= $product["id"] ?></td>
    <td><?= $product["name"] ?></td>
    <td>$<?= $product["price"] ?></td>
    <td><?= $product["quantity"] ?></td>
 
    <td>
  <form action="updateProduct.php" method="get">
      <input type="hidden" name="id" value="<?= $product["id"] ?>">
      <button class="edit-btn" type="submit">Edit</button>
    </form>
    <form action="#" method="get">
        <input type="hidden" name="id" value="<?= $product["id"] ?>">
        <button class="delete-btn" name="btn" type="submit" onclick="return confirm('Are you sure you want to delete this product?')">Delete</button>
    </form>
</td>



  </tr>
 
<?php } ?>

<?php

require 'connectdb.php';

// if (isset($_GET['id'])) {
if (isset($_GET['btn'])) {
  $id = $_GET['id'];
  $query = "DELETE FROM products WHERE id = '$id'";
  mysqli_query($conn, $query);
  mysqli_close($conn);
  header("Location: products.php");
  exit;
}
?>



                </tbody>
            </table>
        </div>
    </section>

    <script src="script.js"></script>
</body>
</html>
