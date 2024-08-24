<!DOCTYPE html>
<!-- Created By CodingNepal -->
<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
      <title>Login</title>
      <link rel="stylesheet" href="login.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
   </head>
   <body>
      <?php
      $error = "";
      require "./connectdb.php";
      if ($_SERVER["REQUEST_METHOD"] == "POST") {
         session_start();
         $email = $_POST["email"];
         $password = $_POST["password"];
         $role = $_POST["role"];

         if ($role == "seller") {
             $query = "SELECT * FROM sellers WHERE email = '$email' AND password = '$password'";
         } elseif ($role == "customer") {
             $query = "SELECT * FROM customers WHERE email = '$email' AND password = '$password'";
         } elseif ($role == "admin") {
             $query = "SELECT * FROM admin WHERE email = '$email' AND password = '$password'";
         }

         $result = mysqli_query($conn, $query);

         if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $_SESSION["logged_in"] = true;
            $_SESSION["user_id"] = $row['id'];
            $_SESSION["user_role"] = $role;
            
            if ($role == "customer") {
                $_SESSION["user_role"] = "customer";
                header("Location: customer.php");
                exit;
            } else if ($role == "seller") {
                $_SESSION["user_role"] = "seller";
                header("Location: products.php");
                exit;
            } else {
                $_SESSION["user_role"] = "admin";
                header("Location: admin.php");
                exit;
            }
         } else {
            $error = "* Invalid details...!";
         }
      }
      ?>      
      <div class="center">
         <div class="container">
            <div class="error"><?php echo $error ?></div>
            <div class="text">Please Login here</div>
            <form method="post">
               <div class="data">
                  <label>Email</label>
                  <input type="email" required name="email">
               </div>
               <div class="data">
                  <label>Password</label>
                  <input type="password" required name="password">
               </div>
               <div class="data">
                  <label>Role</label>
                  <select name="role" required>
                     <option value="admin">Admin</option>
                     <option value="seller">Seller</option>
                     <option value="customer">Customer</option>
                  </select>
               </div>
               <div class="btn buton">
                  <div class="inner"></div>
                  <button type="submit">login</button>
               </div>
            </form>
            <div class="btnn">
               <div class="inner"></div>
               <a href="./signup.php">
                  <button>Don't have account? SIGNUP</button>
               </a> 
            </div>
         </div>
      </div>
      <script src="script.js"></script>
   </body>
</html>
