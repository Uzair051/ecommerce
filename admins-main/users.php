
<?php

include '../components/connect.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
   header('location:admin_login.php');
}

if(isset($_GET['delete'])){
   $delete_id = $_GET['delete'];
   $delete_user = $conn->prepare("DELETE FROM `users` WHERE id = ?");
   $delete_user->execute([$delete_id]);
   $delete_orders = $conn->prepare("DELETE FROM `orders` WHERE user_id = ?");
   $delete_orders->execute([$delete_id]);
   $delete_messages = $conn->prepare("DELETE FROM `messages` WHERE user_id = ?");
   $delete_messages->execute([$delete_id]);
   $delete_cart = $conn->prepare("DELETE FROM `cart` WHERE user_id = ?");
   $delete_cart->execute([$delete_id]);
   $delete_wishlist = $conn->prepare("DELETE FROM `wishlist` WHERE user_id = ?");
   $delete_wishlist->execute([$delete_id]);
   header('location:users.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Responsive Admin Dashboard Template">
    <meta name="keywords" content="admin,dashboard">
    <meta name="author" content="stacks">
    
    
  
    <title>Shopping Cart | Orders</title>

    
    <link rel="preconnect" href="https://fonts.gstatic.com/">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;300;400;500;600;700;800&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp" rel="stylesheet">
    <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/plugins/perfectscroll/perfect-scrollbar.css" rel="stylesheet">
    <link href="assets/plugins/pace/pace.css" rel="stylesheet">

    
    
    <link href="assets/css/main.min.css" rel="stylesheet">
    <link href="assets/css/custom.css" rel="stylesheet">

    <link rel="icon" type="image/png" sizes="32x32" href="assets/images/neptune.png" />
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/neptune.png" />

        
</head>
<body>


<?php
    include ('admin_header.php');
?>
  
            <div class="app-content">
                <div class="content-wrapper">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col">
                                <div class="page-description">
                                    <h1>Orders</h1>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title">Basic</h5>
                                    </div>
                                    <div class="card-body">
                                        <table id="datatable1" class="display" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>User id</th>
                                                    <th>User name</th>
                                                    <th>E-mail</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>

                                            <?php
      $select_accounts = $conn->prepare("SELECT * FROM `users`");
      $select_accounts->execute();
      if($select_accounts->rowCount() > 0){
         while($fetch_accounts = $select_accounts->fetch(PDO::FETCH_ASSOC)){   
   ?>
                                            <tbody>
                                                <tr>
                                                    <td><span><?= $fetch_accounts['id']; ?></td>
                                                    <td><span><?= $fetch_accounts['name']; ?></td>
                                                    <td><span><?= $fetch_accounts['email']; ?></td>
                                                    <td>
                                                    <a href="users.php?delete=<?= $fetch_accounts['id']; ?>" onclick="return confirm('delete this account? the user related information will also be delete!')" class="btn btn-danger">delete</a>
                                                    </td>
                                                </tr>
                                            </tbody>

                                            <?php
         }
      }else{
         echo '<p class="empty">no accounts available!</p>';
      }
   ?>





                                            <tfoot>
                                               
                                               </tfoot>
                                           </table>
                                       </div>
                                   </div>
                                   
                                   
                               </div>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
       </div>
       
       <!-- Javascripts -->
       <script src="assets/plugins/jquery/jquery-3.5.1.min.js"></script>
       <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
       <script src="assets/plugins/perfectscroll/perfect-scrollbar.min.js"></script>
       <script src="assets/plugins/pace/pace.min.js"></script>
       <script src="assets/plugins/apexcharts/apexcharts.min.js"></script>
       <script src="assets/js/main.min.js"></script>
       <script src="assets/js/custom.js"></script>
       <script src="assets/js/pages/dashboard.js"></script>
   </body>
   
   </html>