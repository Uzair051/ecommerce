<div class="app align-content-stretch d-flex flex-wrap">
        <div class="app-sidebar">
            <div class="logo">
                <a href="index.php" class="logo-icon"><span class="logo-text">Shopping_cart</span></a>
                <div class="sidebar-user-switcher user-activity-online">
                    <a href="update_profile.php">

                    <img src="assets/images/avatars/avatar2.png">
                    <?php
            $select_profile = $conn->prepare("SELECT * FROM `admins` WHERE id = ?");
            $select_profile->execute([$admin_id]);
            $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);
         ?>
                        <span class="activity-indicator"></span>
                        <span class="user-info-text"><?= $fetch_profile['name']; ?><br><span class="user-state-info">Admin</span></span>
                    </a>
                </div>
            </div>


              <div class="app-menu">
                <ul class="accordion-menu">
                    <li class="sidebar-title">

                        Apps
                    </li>
                    <li class="active-page">
                        <a href="index.php" class="active"><i class="material-icons-two-tone">dashboard</i>Dashboard</a>
                    </li>
                    <li>         
                        <?php
            $total_pendings = 0;
            $select_pendings = $conn->prepare("SELECT * FROM `orders` WHERE payment_status = ?");
            $select_pendings->execute(['pending']);
            if($select_pendings->rowCount() > 0){
               while($fetch_pendings = $select_pendings->fetch(PDO::FETCH_ASSOC)){
                  $total_pendings += $fetch_pendings['id'];
               }
            }
         ?>
                        <a href="orders.php"><i class="material-icons-two-tone">inbox</i>Orders<span class="badge rounded-pill badge-danger float-end"><?= $total_pendings; ?></span></a>
                    </li>
                    <li>
                    <?php
            $select_users = $conn->prepare("SELECT * FROM `users`");
            $select_users->execute();
            $number_of_users = $select_users->rowCount()
         ?>

                        <a href="users.php"><i class="material-icons-two-tone">cloud_queue</i>Users<span class="badge rounded-pill badge-danger float-end"><?= $number_of_users; ?></span></a>
                    </li>
                    <li>

                    <?php
            $select_messages = $conn->prepare("SELECT * FROM `messages`");
            $select_messages->execute();
            $number_of_messages = $select_messages->rowCount()
         ?>

                        <a href="contact.php"><i class="material-icons-two-tone">edit</i>Contact<span class="badge rounded-pill badge-success float-end"><?= $number_of_messages; ?></span></a>
                    </li>
                    <li>
                    <?php
            $select_admin = $conn->prepare("SELECT * FROM `admins`");
            $select_admin->execute();
            $number_of_admins = $select_admin->rowCount()
         ?>
                        <a href="admin_accounts.php"><i class="material-icons-two-tone">done</i>Admin setup<span class="badge rounded-pill badge-success float-end"><?= $number_of_admins; ?></span></a>
                    </li>
                    <li>
                    <?php
            $select_product = $conn->prepare("SELECT * FROM `products`");
            $select_product->execute();
            $number_of_product = $select_product->rowCount()
         ?>
                        <a href="product.php"><i class="material-icons-two-tone">done</i>Products<span class="badge rounded-pill badge-success float-end"><?= $number_of_product; ?></span></a>
                    </li>
                    <li>
                        <a href="add_product.php"><i class="material-icons-two-tone">done</i>Add products</a>
                    </li>
                    <li>
                        <a href="admin_logout.php"><i class="material-icons-two-tone">done</i>Logout</a>
                    </li>
                    
                </ul>
            </div>
        </div> 
        <div class="app-container"> 
            <div class="search">
                <form>
                    <input class="form-control" type="text" placeholder="Type here..." aria-label="Search">
                </form>
                <a href="#" class="toggle-search"><i class="material-icons">close</i></a>
            </div>
            <div class="app-header">
                <nav class="navbar navbar-light navbar-expand-lg">
                    <div class="container-fluid">
                        <div class="navbar-nav" id="navbarNav">
                            <ul class="navbar-nav">
                               
                        </div>
                        <div class="d-flex">
                            <ul class="navbar-nav">
                             
                                <li class="nav-item">
                                    <a class="nav-link toggle-search" href="#"><i class="material-icons">search</i></a>
                                </li>
                        <li class="nav-item hidden-on-mobile">
                <a class="nav-link language-dropdown-toggle" href="#" id="languageDropDown" data-bs-toggle="dropdown">
                    <img style="height:35px;" src="assets/images/flags/pak.jpg"></a> 
                <ul class="dropdown-menu dropdown-menu-end language-dropdown" aria-labelledby="languageDropDown">
                                          
                 <li><a class="dropdown-item" href="#"><img src="assets/images/flags/pak.jpg" alt="">pakistan</a></li>
                                        </ul>
                                </li>
                               
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
           