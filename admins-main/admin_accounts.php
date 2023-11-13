<?php

include '../components/connect.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
   header('location:admin_login.php');
}

if(isset($_GET['delete'])){
   $delete_id = $_GET['delete'];
   $delete_admins = $conn->prepare("DELETE FROM `admins` WHERE id = ?");
   $delete_admins->execute([$delete_id]);
   header('location:admin_accounts.php');
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



    <title>Shopping_cart</title>


    <link rel="preconnect" href="https://fonts.gstatic.com/">
    <link rel="perconnect" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&amp;display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;300;400;500;600;700;800&amp;display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp"
        rel="stylesheet">
    <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/plugins/perfectscroll/perfect-scrollbar.css" rel="stylesheet">

    <link href="assets/plugins/pace/pace.css" rel="stylesheet">



    <link href="assets/css/main.min.css" rel="stylesheet">
    <link href="assets/css/custom.css" rel="stylesheet">

    <link rel="icon" type="image/png" sizes="32x32" href="assets/images/shopping.png" />
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/shopping.png" />


</head>

</style>

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
                            <h1>Admin</h1>
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
                                            <th>Admin id</th>
                                            <th>Admin name</th>
                                            <th>Action </th>
                                            <th>Update_Admin </th>
                                            <th>Registar new admin</th>

                                        </tr>
                                    </thead>

                                    <?php
      $select_accounts = $conn->prepare("SELECT * FROM `admins`");
      $select_accounts->execute();
      if($select_accounts->rowCount() > 0){
         while($fetch_accounts = $select_accounts->fetch(PDO::FETCH_ASSOC)){   
   ?>


                                    <tbody>
                                        <tr>
                                            <td>
                                                <?= $fetch_accounts['id']; ?>
                                            </td>
                                            <td>
                                                <?= $fetch_accounts['name']; ?>
                                            </td>
                                            <td>
                                                <a href="admin_accounts.php?delete=<?= $fetch_accounts['id']; ?>"
                                                    onclick="return confirm('delete this account?')"
                                                    class="btn btn-danger">delete</a>
                                            </td>
                                            <td>
                                                <?php
            if($fetch_accounts['id'] == $admin_id){
               echo '<a href="update_profile.php" class="btn btn-success">update</a>';
            }
         ?>
                                            </td>
                                            <td>
                                                <a href="register_admin.php" class="btn btn-primary">register admin</a>
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







    </div>

    </section>




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