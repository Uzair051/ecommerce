<?php

include 'components/connect.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
};

include 'components/wishlist_cart.php';

?>









<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Complete resposive shopping store </title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css"/>


    <!-- Font awsome cdn link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" />

    <!-- css file links -->
    <link rel="stylesheet" href="./css/style1.css">
</head>
<body>

    <!-- header section start -->
<?php
    require_once('./components/heade.php');
?>

    <!-- header section end -->


    <!-- home section start -->

        <section class="home" id="home">
            <div class="content">
                 <h3>best and special <i><span style="font-family:bold;">quality</span></i>  products for your</h3>
                 <p>No desicion should be made on an empty shopping bag. <br>
                The shopping cart is what determines wetther a person is a good or bad member of society.
                happiness is not in money but in shoping. <br> </p>
                 <a href="#products" class="btn">Shop now</a>
            </div>

        </section>
    <!-- home section end -->


    <!-- Feature section start -->
        <section class="features" id="features">
            <h1 class="heading">Our <span>Feature</span></h1>

            <div class="box-container">
                <div class="box">
                    <img src="./images/feature.png" alt="">
                    <h3>Best quality</h3>
                    <p>No desicion should be made on an empty shopping bag.
                The shopping cart is what determines wetther a person is a good or bad member of society.
                happiness is not in money but in shoping.</p>
                    <a href="#" class="btn">read more</a>
                </div>
                <div class="box">
                    <img src="./images/feature1.png" alt="">
                    <h3>Free delivery</h3>
                    <p>Free Shipping on Orders Above Rs.1000 Delivering All Over Karachi Shop ... Buy Ponds Super Light Gel 50g On Discounted Price at QnE With Free Delivery</p>
                    <a href="#" class="btn">read more</a>
                </div>
                <div class="box">
                    <img src="./images/feature2.png" alt="">
                    <h3>easy payments</h3>
                    <p>Now you can pay at Shopping.com with greater ease and convenience with EasyPay by using your debit/credit cards, EasyPaisa mobile accounts or via any EasyPaisa .</p>
                    <a href="#" class="btn">read more</a>
                </div>
            </div>

        </section>
    <!-- Feature section end -->





    <!-- product secttion start -->
    
    <section class="products" id="products">
        <h1 class="heading">Our <span>Products</span></h1>

<div class="swiper products-slider">

<div class="swiper-wrapper">

<?php
  $select_products = $conn->prepare("SELECT * FROM `products` LIMIT 10"); 
  $select_products->execute();
  if($select_products->rowCount() > 0){
   while($fetch_product = $select_products->fetch(PDO::FETCH_ASSOC)){
?>
<form action="" method="post" class="swiper-slide slide">
   <input type="hidden" name="pid" value="<?= $fetch_product['id']; ?>">
   <input type="hidden" name="name" value="<?= $fetch_product['name']; ?>">
   <input type="hidden" name="price" value="<?= $fetch_product['price']; ?>">
   <input type="hidden" name="image" value="<?= $fetch_product['image_01']; ?>">
   
   <div class="flex">
   <button class="fas fa-heart" type="submit" name="add_to_wishlist"></button>
   <a href="quick_view.php"pid=<?= $fetch_product['id']; ?>" class="fas fa-eye"></a>
   </div>

   <img src="uploaded_img/<?= $fetch_product['image_01']; ?>" alt="">
   <div class="name"><?= $fetch_product['name']; ?></div>       
   <div class="stars">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </div>


   <div class="flex">
      <div class="price"><span>$</span><?= $fetch_product['price']; ?><span>/-</span></div>
      <input type="number" name="qty" class="qty" min="1" max="99" onkeypress="if(this.value.length == 2) return false;" value="1">
   </div>
   <input type="submit" value="add to cart" class="btnn" name="add_to_cart">
</form>
<?php
   }
}else{
   echo '<p class="empty">no products added yet!</p>';
}
?>

</div>


</div>
</section>      
    <!-- product secttion end -->



    <!-- categories section start -->
        <section class="categories" id="categories">
            <h1 class="heading">Product <span>Categories</span></h1>
            <div class="box-container">

                <div class="box">
                    <img src="./images/categories1.jpg" alt="">
                    <h3>Men wallets</h3>
                    <p>upto 45% off</p>
                    <a href="#" class="btn">shop now</a>
                </div>

                <div class="box">
                    <img src="./images/categories 2.jpg" alt="">
                    <h3>Ladies bags</h3>
                    <p>upto 25% off</p>
                    <a href="#" class="btn">shop now</a>
                </div>

                <div class="box">
                    <img src="./images/categories3.jpeg" alt="">
                    <h3>Comic boooks</h3>
                    <p>For relaxing mind</p>
                    <a href="#" class="btn">shop now</a>
                </div>

                <div class="box">
                    <img src="./images/categories4.jpg" alt="">
                    <h3>Party cards</h3>
                    <p>upto 45% off</p>
                    <a href="#" class="btn">shop now</a>
                </div>

            </div>
        </section>

    <!-- categories section end -->

    



    <!-- review section start -->
        <section class="review" id="review">
            <h1 class="heading">Customer's <span>review</span></h1>
                <div class="swiper review-slider">
                    <div class="swiper-wrapper">

                        <div class="swiper-slide box">
                            <img src="./images/review1" alt="">
                            <p>Recently I bought a product. The product name is  bag which is a very genuine and good quality product. They sent me the product within 2 days after my order. And I'm very much happy with my product. The package was also very discreet.</p>
                            <div class="stars">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </div>
                        </div>

                        <div class="swiper-slide box">
                            <img src="./images/review2" alt="">
                            <p> I like the most about this cart is the design of it. You can make international payments. The eCommerce is really easy to use and so useful in some cases. The mobile app is also very handy and of course safe to use. I recommend at least to try it .</p>
                            <div class="stars">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </div>
                        </div>

                        <div class="swiper-slide box">
                            <img src="./images/review3" alt="">
                            <p>Shopping Cart Elite is the Most Sophisticated eCommerce Solution in the Market Today. The top software solution for online retailers and wholesalers yes ecommerce shopping card is the best.</p>
                            <div class="stars">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </div>
                        </div>

                        <div class="swiper-slide box">
                            <img src="./images/review4" alt="">
                            <p>Recently I bought a product. The product name is  bag which is a very genuine and good quality product. They sent me the product within 2 days after my order. And I'm very much happy with my product. The package was also very discreet.</p>
                            <div class="stars">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </div>
                        </div>

                    </div>
                </div>
        </section>
    <!-- review section end -->





    <!-- blog section start -->
    <section class="blogs" id="blogs">
        <h1 class="heading">Our <span>blogs</span></h1>
            <div class="box-container">

                <div class="box">
                    <img src="./images/blog1.jpg" alt="">
                    <div class="content">
                        <div class="icons">
                            <a href="#"><i class="fas fa-user"></i>by user </a>
                            <a href="#"><i class="fa fa-calender"></i>21 may,2023 </a>
                        </div>
                        <h3>our poducts bags ,cards, wallets</h3>
                        <p>The seasons don't matter to most of us anymore except as spectacles. In my county and in many places around this part of the nation, the fair that once marked the harvest now takes place in late August, while tourist dollars are still in heavy circulation. Why celebrate the harvest when you harvest every week with a shopping cart</p>
                        <a href="#" class="btn">Read more</a>
                    </div>
                </div>

                <div class="box">
                    <img src="./images/blog2.jpg" alt="">
                    <div class="content">
                        <div class="icons">
                            <a href="#"><i class="fas fa-user"></i>by user </a>
                            <a href="#"><i class="fa fa-calendar"></i>21 may,2023 </a>
                        </div>
                        <h3>our poducts Files  ,Gifts, Arts</h3>
                        <p>The seasons don't matter to most of us anymore except as spectacles. In my county and in many places around this part of the nation, the fair that once marked the harvest now takes place in late August, while tourist dollars are still in heavy circulation. Why celebrate the harvest when you harvest every week with a shopping cart</p>
                        <a href="#" class="btn">Read more</a>
                    </div>
                </div>
                
                <div class="box">
                    <img src="./images/blog3.jpg" alt="">
                    <div class="content">
                        <div class="icons">
                            <a href="#"><i class="fas fa-user"></i>by user </a>
                            <a href="#"><i class="fa fa-calender"></i>21 may,2023 </a>
                        </div>
                        <h3> Greeting carts , Beuti products</h3>
                        <p>The seasons don't matter to most of us anymore except as spectacles. In my county and in many places around this part of the nation, the fair that once marked the harvest now takes place in late August, while tourist dollars are still in heavy circulation. Why celebrate the harvest when you harvest every week with a shopping cart</p>
                        <a href="#" class="btn">Read more</a>
                    </div>
                </div>

            </div>
    </section>
    <!-- blog section end -->



    <!-- footer section start -->
    <section class="footer">
        <div class="box-container">

            <div class="box">
                <h3>Cart <i class="fas fa-shopping-cart"></i></h3>
                <p>
                The shopping cart is what determines wetther a person is a good or bad member of society.</p>
                    <div class="share">
                        <a href="#" class="fab fa-facebook-f"></a>
                        <a href="#" class="fab fa-twitter"></a>
                        <a href="#" class="fab fa-instagram"></a>
                        <a href="#" class="fab fa-linkedin"></a>
                    </div>                
            </div>

            <div class="box">
                <h3>Contact info</h3>
                <a href="#" class="links"><i class="fas fa-phone"></i>+92 310-2018600</a>              
                <a href="#" class="links"><i class="fas fa-phone"></i>+92 310-6726889</a>              
                <a href="#" class="links"><i class="fas fa-envelope"></i>muhammadhuzaifa@mail.com</a>              
                <a href="#" class="links"><i class="fas fa-marker-alt"></i>Karachi - Pakistan</a>              
            </div>


            <div class="box">
                <h3>Quick links</h3>
                <a href="#" class="links"><i class="fas fa-arrow-right"></i>Home</a>              
                <a href="#" class="links"><i class="fas fa-arrow-right"></i>Feature</a>              
                <a href="#" class="links"><i class="fas fa-arrow-right"></i>Products</a>              
                <a href="#" class="links"><i class="fas fa-arrow-right"></i>Categoies</a>              
                <a href="#" class="links"><i class="fas fa-arrow-right"></i>review</a>              
                <a href="#" class="links"><i class="fas fa-arrow-right"></i>blogs</a>              
            </div>

            <div class="box">
                <h3>newsletters</h3>
                <p>Subscribes for latest updates</p>      
                <input type="email" placeholder="your email..." class="email">
                <input type="submit" value="subscribes" class="btn">      
                <img src="./images/brand.webp" class="payment-img">
            </div>

        </div>

        <div class="credit">Created by <span>M.huzaifa</span>| all right reserved</div>
    </section>

    <!-- footer section end -->


    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>

    <script src="js/script.js"></script>
</body>
</html>
