


    <!-- header section start -->
     <header class="header">
   
        <a href="index.php" class="logo"><i class="fas fa-shopping-basket">Shopping Cart</i></a>

        <nav class="navbar">
            <a href="index.php">Home</a>
            <a href="index.php#features">Feature</a>
            <a href="index.php#products">products</a>
            <a href="index.php#categories">Categories</a>
            <a href="quick_view.php">review</a>
            <a href="contact.php">Contact us</a>
            <a href="orders.php">Order</a>
        </nav>

        <div class="icons">
           <div class="fas fa-bars" id="menu-btn"><a href=""></a></div>
           <div class="fas fa-search" id="search-btn"><a href=""></a></div>


           <?php
           $count_wishlist_items = $conn->prepare("SELECT * FROM `wishlist` WHERE user_id = ?");
           $count_wishlist_items->execute([$user_id]);
           $total_wishlist_counts = $count_wishlist_items->rowCount();
           


           $count_cart_items = $conn->prepare("SELECT * FROM `cart` WHERE user_id = ?");
           $count_cart_items->execute([$user_id]);
           $total_cart_counts = $count_cart_items->rowCount();
           ?>


         <a href="wishlist.php"><i class="fas fa-heart"></i><span>(<?= $total_wishlist_counts;?>)</span></a>
         <a href="cart.php" ><i class="fas fa-shopping-cart" id="cart-btn"></i><span>(<?= $total_cart_counts;?>)</span></a>
     
     
            <div class="fas fa-user" id="login-btn"></div>
</div>
            <div class="profile">
         <?php          
            $select_profile = $conn->prepare("SELECT * FROM `users` WHERE id = ?");
            $select_profile->execute([$user_id]);
            if($select_profile->rowCount() > 0){
            $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);
         ?>
         <p><?= $fetch_profile["name"]; ?></p>
         <a href="update_user.php" class="btnn">update profile</a>
         <div class="flex-btn">
            <a href="user_register.php" class="option-btn">register</a>
            <a href="user_login.php" class="option-btn">login</a>
         </div>
         <a href="components/user_logout.php" class="delete-btn" onclick="return confirm('logout from the website?');">logout</a> 
         <?php
            }else{
         ?>
         <p>please login or register first!</p>
         <div class="flex-btn">
            <a href="user_register.php" class="option-btn">register</a>
            <a href="user_login.php" class="option-btn">login</a>
         </div>
         <?php
            }
         ?>      
       </div>
     
     
       <form action="" class="search-form">
           <input type="search" id="search-box" placeholder="search here.....">
           <label for="search-box" class="fas fa-search"></label>
       </form>



    </header> 

    <!-- header section end -->







    