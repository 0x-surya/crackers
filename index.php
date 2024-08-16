<?php
include "./includes/head.php";
include "./includes/db.php";
?>

<section class="py-3 hero">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">

        <div class="banner-blocks">

          <div class="banner-ad large block-1">

            <div class="swiper main-swiper">
              <div class="swiper-wrapper">

                <div class="swiper-slide">
                  <div class="row banner-content p-5">
                    <div class="content-wrapper col-md-7">
                      <div class="categories my-3 fw-bold">Crackers Online</div>
                      <h3 class="display-4">Ayutha Pooja and Saraswathi Pooja Wishes to all</h3>
                      <p>Our Heartly Wishes to your and your Family on this auspicious day.</p>
                      <a href="./shop.php"
                        class="btn btn-outline-dark btn-lg text-uppercase fs-6 rounded-1 px-4 py-3 mt-3">Shop Now</a>
                    </div>
                    <div class="img-wrapper col-md-5">
                      <img src="./images/homebg.png" class="img-fluid">
                    </div>
                  </div>
                </div>

                <div class="swiper-slide">
                  <div class="row banner-content p-5">
                    <div class="content-wrapper col-md-7">
                      <div class="categories my-3 fw-bold">Crackers Online</div>
                      <h3 class="display-4">May this Diwali be prosperous for you.</h3>
                      <p>Our Heartly Wishes to your and your Family on this auspicious day.</p>
                      <a href="./shop.php"
                        class="btn btn-outline-dark btn-lg text-uppercase fs-6 rounded-1 px-4 py-3 mt-3">Shop Now</a>
                    </div>
                    <div class="img-wrapper col-md-5">
                      <img src="./images/crackerbg.png" class="img-fluid">
                    </div>
                  </div>
                </div>
              </div>

              <div class="swiper-pagination"></div>

            </div>
          </div>


          <section class="py-5 about">
            <div class="container-fluid">
              <div class="row">

                <div class="col-md-12">
                  <div class="banner-ad bg-danger mb-3"
                    style="background-image: url('./images/crackerbg2.png');background-repeat: no-repeat;background-position: left center;background-size:360px;">
                    <div class="banner-content p-5 float-end">

                      <div class="categories text-primary fs-3 fw-bold">Crackers Online</div>
                      <h3 class="banner-title">We are the leading supplier of crackers & fancy crackers items</h3>
                      <p>
                        Since 2020, Crackers Online has been Sivakasi's top cracker trader, known for quality and customer
                        satisfaction. We offer a diverse range of crackers, from traditional favorites to the latest
                        innovations, and our curated gift boxes add an extra spark to any celebration.
                        <br>
                        With Crackers Online, you can trust in the safety and excellence of our products. Our crackers will
                        light up any event, making every moment extraordinary. Celebrate with Crackers Online and let the joy of
                        fireworks illuminate your life!
                      </p>
                      <a href="./about.php" class="btn btn-dark text-uppercase">Show More</a>

                    </div>

                  </div>
                </div>


              </div>
            </div>
          </section>

          <section class="py-5 overflow-hidden">
            <div class="container-fluid">
              <div class="row">
                <div class="col-md-12">
                  <div class="section-header d-flex flex-wrap justify-content-between my-5">
                    <h2 class="section-title">Our special products</h2>
                    <div class="d-flex align-items-center">
                      <a href="./shop.php" class="btn-link text-decoration-none">View All Products →</a>
                      <div class="swiper-buttons">
                        <button class="swiper-prev products-carousel-prev btn btn-primary">❮</button>
                        <button class="swiper-next products-carousel-next btn btn-primary">❯</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="products-carousel swiper">
                    <div class="swiper-wrapper">
                      <?php
                      $qur = "SELECT * FROM `crakers` WHERE `spl_product` = 'true' ORDER BY `crakers`.`id` DESC";
                      $res = mysqli_query($con, $qur);

                      while ($row = mysqli_fetch_assoc($res)) {
                      ?>
                        <div class="product-item swiper-slide">
                          <figure>
                            <a href="single-product.php" title="Product Title">
                              <img src="images/thumb-1000wala.png" class="tab-image">
                            </a>
                          </figure>
                          <h3><?php echo $row['name'] ?></h3>
                          <span class="price"><?php echo $row['amount'] ?></span>
                          <div class="d-flex align-items-center justify-content-between">
                            <div class="input-group product-qty">
                              <span class="input-group-btn">
                                <button type="button" class="quantity-left-minus btn btn-danger btn-number" data-id="<?php echo $row['id']; ?>" data-name="<?php echo $row['name']; ?>" data-price="<?php echo $row['amount']; ?>" data-type="minus">
                                  <svg width="16" height="16">
                                    <use xlink:href="#minus"></use>
                                  </svg>
                                </button>
                              </span>
                              <input type="text" id="quantity-<?php echo $row['id']; ?>" name="quantity" class="form-control input-number" value="0">
                              <span class="input-group-btn">
                                <button type="button" class="quantity-right-plus btn btn-success btn-number" data-id="<?php echo $row['id']; ?>" data-name="<?php echo $row['name']; ?>" data-price="<?php echo $row['amount']; ?>" data-type="plus">
                                  <svg width="16" height="16">
                                    <use xlink:href="#plus"></use>
                                  </svg>
                                </button>
                              </span>
                            </div>
                            <a href="#" class="nav-link">Add to Cart <iconify-icon icon="uil:shopping-cart"></a>
                          </div>
                        </div>
                      <?php
                      }
                      ?>
                    </div>
                  </div>
                  <!-- / products-carousel -->
                </div>
              </div>
            </div>
          </section>

          <section class="py-5 shop">
            <div class="container-fluid">

              <div class="bg-secondary py-1 my-2 rounded-5">
                <div class="container my-5">
                  <div class="row">
                    <div class="col-md-12 p-3">
                      <div class="section-header">
                        <h2 class="section-title display-4">We are one of the of crackers <span class="text-primary">Leading Sellers</span> of Crackers.</h2>
                      </div>
                      <p>Our service created a positive image among our customers.</p>
                      <a href="./about.php" class="btn btn-dark text-uppercase">Shop Now</a>
                    </div>


                  </div>

                </div>
              </div>

            </div>
          </section>

          <section class="py-5 info">
            <div class="container-fluid">
              <div class="row row-cols-1 row-cols-sm-3 row-cols-lg-5">
                <div class="col">
                  <div class="card mb-3 border-0">
                    <div class="row">
                      <div class="col-md-12 text-dark d-flex">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24">
                          <path fill="currentColor"
                            d="M21.5 15a3 3 0 0 0-1.9-2.78l1.87-7a1 1 0 0 0-.18-.87A1 1 0 0 0 20.5 4H6.8l-.33-1.26A1 1 0 0 0 5.5 2h-2v2h1.23l2.48 9.26a1 1 0 0 0 1 .74H18.5a1 1 0 0 1 0 2h-13a1 1 0 0 0 0 2h1.18a3 3 0 1 0 5.64 0h2.36a3 3 0 1 0 5.82 1a2.94 2.94 0 0 0-.4-1.47A3 3 0 0 0 21.5 15Zm-3.91-3H9L7.34 6H19.2ZM9.5 20a1 1 0 1 1 1-1a1 1 0 0 1-1 1Zm8 0a1 1 0 1 1 1-1a1 1 0 0 1-1 1Z" />
                        </svg>
                        <h5>Free Delivery</h5>
                      </div>
                      <div class="col-md-12">
                        <div class="card-body p-0">
                          <p class="card-text">Enjoy the convenience of free delivery on all your favorite crackers and fancy
                            cracker items.</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col">
                  <div class="card mb-3 border-0">
                    <div class="row">
                      <div class="col-md-12 text-dark d-flex">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24">
                          <path fill="currentColor"
                            d="M19.63 3.65a1 1 0 0 0-.84-.2a8 8 0 0 1-6.22-1.27a1 1 0 0 0-1.14 0a8 8 0 0 1-6.22 1.27a1 1 0 0 0-.84.2a1 1 0 0 0-.37.78v7.45a9 9 0 0 0 3.77 7.33l3.65 2.6a1 1 0 0 0 1.16 0l3.65-2.6A9 9 0 0 0 20 11.88V4.43a1 1 0 0 0-.37-.78ZM18 11.88a7 7 0 0 1-2.93 5.7L12 19.77l-3.07-2.19A7 7 0 0 1 6 11.88v-6.3a10 10 0 0 0 6-1.39a10 10 0 0 0 6 1.39Zm-4.46-2.29l-2.69 2.7l-.89-.9a1 1 0 0 0-1.42 1.42l1.6 1.6a1 1 0 0 0 1.42 0L15 11a1 1 0 0 0-1.42-1.42Z" />
                        </svg>
                        <h5>100% Secure Payment</h5>
                      </div>
                      <div class="col-md-12">
                        <div class="card-body p-0">
                          <p class="card-text">Shop with confidence, knowing that your payment for our 100-package bundle is
                            100% secure.</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col">
                  <div class="card mb-3 border-0">
                    <div class="row">
                      <div class="col-md-12 text-dark d-flex">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24">
                          <path fill="currentColor"
                            d="M22 5H2a1 1 0 0 0-1 1v4a3 3 0 0 0 2 2.82V22a1 1 0 0 0 1 1h16a1 1 0 0 0 1-1v-9.18A3 3 0 0 0 23 10V6a1 1 0 0 0-1-1Zm-7 2h2v3a1 1 0 0 1-2 0Zm-4 0h2v3a1 1 0 0 1-2 0ZM7 7h2v3a1 1 0 0 1-2 0Zm-3 4a1 1 0 0 1-1-1V7h2v3a1 1 0 0 1-1 1Zm10 10h-4v-2a2 2 0 0 1 4 0Zm5 0h-3v-2a4 4 0 0 0-8 0v2H5v-8.18a3.17 3.17 0 0 0 1-.6a3 3 0 0 0 4 0a3 3 0 0 0 4 0a3 3 0 0 0 4 0a3.17 3.17 0 0 0 1 .6Zm2-11a1 1 0 0 1-2 0V7h2ZM4.3 3H20a1 1 0 0 0 0-2H4.3a1 1 0 0 0 0 2Z" />
                        </svg>
                        <h5>100% Package Quality</h5>
                      </div>
                      <div class="col-md-10">
                        <div class="card-body p-0">
                          <p class="card-text">We ensure that every order is meticulously packaged to guarantee that your
                            crackers arrive in pristine condition.</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col">
                  <div class="card mb-3 border-0">
                    <div class="row">
                      <div class="col-md-12 text-dark d-flex">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24">
                          <path fill="currentColor"
                            d="M12 8.35a3.07 3.07 0 0 0-3.54.53a3 3 0 0 0 0 4.24L11.29 16a1 1 0 0 0 1.42 0l2.83-2.83a3 3 0 0 0 0-4.24A3.07 3.07 0 0 0 12 8.35Zm2.12 3.36L12 13.83l-2.12-2.12a1 1 0 0 1 0-1.42a1 1 0 0 1 1.41 0a1 1 0 0 0 1.42 0a1 1 0 0 1 1.41 0a1 1 0 0 1 0 1.42ZM12 2A10 10 0 0 0 2 12a9.89 9.89 0 0 0 2.26 6.33l-2 2a1 1 0 0 0-.21 1.09A1 1 0 0 0 3 22h9a10 10 0 0 0 0-20Zm0 18H5.41l.93-.93a1 1 0 0 0 0-1.41A8 8 0 1 1 12 20Z" />
                        </svg>
                        <h5>Guaranteed Savings</h5>
                      </div>
                      <div class="col-md-12">
                        <div class="card-body p-0">
                          <p class="card-text">Experience unbeatable savings on all our premium crackers.</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col">
                  <div class="card mb-3 border-0">
                    <div class="row">
                      <div class="col-md-12 text-dark d-flex">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24">
                          <path fill="currentColor"
                            d="M18 7h-.35A3.45 3.45 0 0 0 18 5.5a3.49 3.49 0 0 0-6-2.44A3.49 3.49 0 0 0 6 5.5A3.45 3.45 0 0 0 6.35 7H6a3 3 0 0 0-3 3v2a1 1 0 0 0 1 1h1v6a3 3 0 0 0 3 3h8a3 3 0 0 0 3-3v-6h1a1 1 0 0 0 1-1v-2a3 3 0 0 0-3-3Zm-7 13H8a1 1 0 0 1-1-1v-6h4Zm0-9H5v-1a1 1 0 0 1 1-1h5Zm0-4H9.5A1.5 1.5 0 1 1 11 5.5Zm2-1.5A1.5 1.5 0 1 1 14.5 7H13ZM17 19a1 1 0 0 1-1 1h-3v-7h4Zm2-8h-6V9h5a1 1 0 0 1 1 1Z" />
                        </svg>
                        <h5>Daily Offers</h5>
                      </div>
                      <div class="col-md-12">
                        <div class="card-body p-0">
                          <p class="card-text">Don't miss out on our exclusive daily offers and discounts.</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>



          <script>
            $(document).ready(function() {
              $('.btn-number').on('click', function() {
                let productId = $(this).data('id');
                let productName = $(this).data('name');
                let productPrice = $(this).data('price'); // Get the price from the button's data attribute
                let action = $(this).data('type');
                let quantityInput = $('#quantity-' + productId);
                let qty = parseInt(quantityInput.val());

                if (action === 'plus') {
                  qty++;
                } else if (action === 'minus' && qty > 0) {
                  qty--;
                }

                quantityInput.val(qty);
                $('#product-qty-' + productId).text(qty);

                $.ajax({
                  url: 'backend.php',
                  type: 'POST',
                  data: {
                    id: productId,
                    name: productName,
                    price: productPrice,
                    quantity: qty,

                  },
                  success: function(response) {
                    updateCart();
                    console.log(response);
                  },
                  error: function(xhr, status, error) {
                    console.error('AJAX Error: ', status, error);
                  }
                });
              });
            });
          </script>



          <?php
          include "./includes/footer.php";
          ?>