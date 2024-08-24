<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!----======== CSS ======== -->
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="main.css"> 
    <link rel="stylesheet" href="form.css">
     
    <!----===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <title>Admin Dashboard Panel</title> 
</head>
<body>
<?php
require 'connectdb.php';

// Retrieve the ID of the customer from the previous page
$id = $_GET['id'];

// Retrieve the customer's data from the database
$query = "SELECT * FROM customers WHERE id = '$id'";
$result = mysqli_query($conn, $query);
$customer = mysqli_fetch_assoc($result);

// Populate the form fields with the customer's information
$name = $customer['name'];
$number = $customer['number'];
$address = $customer['address'];

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
            <h2>Update Customer</h2>
            <form id="productForm" method="post">
    <div class="form-row">
      <div class="form-group">
        <label for="name">Name</label>
        <input type="text" id="name" name="name" value="<?php echo $name; ?>" required>
      </div>
      <div class="form-group">
        <label for="number">Number</label>
        <input type="number" id="price" name="number" value="<?php echo $number; ?>" required>
      </div>
    </div>
    <div class="form-row">
      <div class="form-group">
        <label for="description">Address</label>
        <textarea id="description" name="address" rows="4" required><?php echo $address; ?></textarea>

    </div>
    </div>
        <div class="form-row">
      <div class="form-group">
        <label for="name">Email</label>
        <input type="text" id="name" name="email" value="<?php echo $email; ?>" required>
      </div>
      <div class="form-group">
        <label for="number">Password</label>
        <input type="password" id="price" name="password" value="<?php echo $password; ?>" required>
      </div>
    </div>
    </div>
                <div class="form-row">
      <div class="form-group">
        <label for="name">Email</label>
        <input type="text" id="name" name="email" value="<?php echo $email; ?>" required>
      </div>
      <div class="form-group">
        <label for="number">Password</label>
        <input type="password" id="price" name="password" value="<?php echo $password; ?>" required>
      </div>
    </div>

                </div>
                <button type="submit" name="update_customer">Update Customer</button>
            </form>
        </div>
    </section>
<?php 
 

if (!empty($_POST)) {
    // Retrieve the ID of the customer from the previous page
    // $id = $_POST['id'];
  
    // Retrieve the updated customer information from the form
    $name = $_POST['name'];
$number = $_POST['number'];
$address = $_POST['address'];
$email = $_POST['email'];
$password = $_POST['password'];

// Update the customer's record in the database, including the email and password
$query = "UPDATE customers 
          SET name = '$name', 
              number = '$number', 
              address = '$address', 
              email = '$email', 
              password = '$password' 
          WHERE id = '".$_SESSION["user_id"]."'";

mysqli_query($conn, $query);

// Close the database connection
mysqli_close($conn);

// Redirect to the customer profile page
header("Location: customer.php");
exit;
}



?>  
    

    <script src="script.js"></script>
</body>
</html>
