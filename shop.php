<?php
include "./includes/head.php";
include "./includes/db.php";



if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $phno = $_POST['phno'];
    $alphno = $_POST['alphno'];
    $email = $_POST['email'];
    $addr = $_POST['addr'];
    $city = $_POST['city'];
    $pincode = $_POST['pincode'];
    $state = $_POST['state'];
    $img = $_FILES["img"]["name"];


    $target_dir = "payment/";
    $target_file = $target_dir . basename($_FILES["img"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    if (isset($_POST["submit"])) {
        $check = getimagesize($_FILES["img"]["tmp_name"]);
        if ($check !== false) {
            $uploadOk = 1;
        } else {
            $uploadOk = 0;
        }
    }

    date_default_timezone_set('Asia/Calcutta');

    $date = date("Y-m-d");
    $time = date("h-i-s");


    $newfilename = $target_dir . $date . "_" . $time . "_" . basename($_FILES["img"]["name"]);

    // Check if file already exists
    if (file_exists($newfilename)) {
        // echo "Sorry, file already exists.";
        $uploadOk = 0;
    }


    // Allow certain file formats
    if (
        $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif"
    ) {
        // echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        // echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["img"]["tmp_name"], $newfilename)) {
            // echo "The file " . htmlspecialchars(basename()) . " has been uploaded.";

            $qur = "INSERT INTO `users`(`name`, `phno`, `alphno`, `email`, `addr`, `city`, `pincode`, `state`, `img`, `delivery`) VALUES ('$name', '$phno', '$alphno', '$email', '$addr', '$city', '$pincode', '$state', '$newfilename', 'false')";
            $res = mysqli_query($con, $qur);

            if ($res) {

                $qur = "SELECT * FROM `users` WHERE `phno` = '$phno' AND `alphno` = '$alphno' AND `email` = '$email' ORDER BY `users`.`id` DESC";
                // echo $qur;
                $res = mysqli_query($con, $qur);

                $row = mysqli_fetch_assoc($res);


                $customer_id = $row['id'];
                $customer_name = $row['name'];


                $time = date("h:i:s");

                $cart = $_SESSION['cart'];
                // print_r($_SESSION['cart']);

                foreach ($cart as $product) {
                    $product_id = $product['id'];
                    $product_name = $product['name'];
                    $price = $product['price'];
                    $qty = $product['quantity'];

                    $qur = "INSERT INTO `orders` (`customer_id`, `customer_name`, `product_id`, `product_name`, `product_price`, `qty`, `date`, `time` ) VALUES ('$customer_id', '$customer_name', '$product_id', '$product_name', '$price', '$qty', '$date', '$time')";
                    $res = mysqli_query($con, $qur);
                }
                $_SESSION['cart'] = null;
                echo "<script>alert('Order Placed Successfully')</script>";
            } else {
                echo "<script>alert('Somthing went wrong please try again')</script>";
            }
        } else {
            // echo "Sorry, there was an error uploading your file.";
        }
    }
}

?>

<div class="container mt-5">
    <table class="table table-bordered table-responsive">
        <thead class="thead-dark">
            <tr>
                <th>Image</th>
                <th>Product Name</th>
                <th>Content</th>
                <th>Actual Price (Rs)</th>
                <th>Amount (Rs)</th>
                <th>Quantity</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (isset($_GET['search'])) {
                $search = $_GET['search'];
                $qur = "SELECT * FROM `crakers` WHERE `name` LIKE '%$search%' ORDER BY `crakers`.`id` ASC";
            } else {
                $qur = "SELECT * FROM `crakers` ORDER BY `crakers`.`id` ASC";
            }
            $res = mysqli_query($con, $qur);

            while ($row = mysqli_fetch_assoc($res)) {
            ?>
                <tr>
                    <td><img src="<?php echo "../Admin/" . $row['img'] ?>" alt="10 Cm Electric Sparkler" width="50"></td>
                    <td><?php echo $row['name'] ?></td>
                    <td><?php echo $row['content'] ?></td>
                    <td style="text-decoration: line-through;"><?php echo $row['actual_price'] ?></td>
                    <td><?php echo $row['amount'] ?></td>
                    <td>
                        <input type="number" class="product-quantity" min="0" data-id="<?php echo $row['id']; ?>" data-name="<?php echo $row['name']; ?>" data-price="<?php echo $row['amount']; ?>" value="0">
                    </td>
                    <td>
                        <input type="text" class="total-price" value="0" readonly>
                    </td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</div>

<section class="py-5 contact shoppage" id="checkout">

    <!-- <div class="bg-secondary py-2 my-5 rounded-5"> -->
    <div>
        <div class="container my-5">
            <form method="post" class="row" enctype="multipart/form-data">
                <div class="col-md-6 px-5">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control form-control-sm" name="name" id="name">
                    </div>
                    <div class="mb-3">
                        <label for="num" class="form-label">Mobile Number</label>
                        <input type="text" class="form-control form-control-sm" name="phno" id="num">
                    </div>
                    <div class="mb-3">
                        <label for="num" class="form-label">Alternate Number</label>
                        <input type="text" class="form-control form-control-sm" name="alphno" id="num">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Email</label>
                        <input type="email" class="form-control form-control-sm" name="email" id="email">
                    </div>
                    <div class="mb-3">
                        <label for="Address" class="form-label">Address</label>
                        <textarea class="form-control form-control-sm" name="addr" id="message"
                            rows="6"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Near by Delivery City</label>
                        <input type="text" class="form-control form-control-sm" name="city" id="name">
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Pincode</label>
                        <input type="text" class="form-control form-control-sm" name="pincode" id="name">
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">State</label>
                        <input type="text" class="form-control form-control-sm" name="state" id="name">
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Screenshot</label>
                        <input type="file" class="form-control" name="img" id="file">
                    </div>
                    <br>
                    <!-- <button type="submit" class="btn btn-primary mb-5">Submit Order</button> -->
                    <input type="submit" value="Submit Order" name="submit" class="btn btn-primary mb-5">
                </div>
                <div class="px-5 col-md-5">

                    <div class="section-header">
                        <h6>Google Pay: 9597593990</h6>
                        <p>Name: MUTHUKUMAR E </p>


                        <h6>Phone Pay: 9597593990</h6>
                        <p>Name: MUTHUKUMAR E</p>

                    </div>
                    <img src="images/scanner.jpeg" alt="scanner" height=500 width=350>
            </form>

        </div>
    </div>

    </div>
</section>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('.product-quantity').on('input', function() {
            var productId = $(this).data('id');
            var productName = $(this).data('name');
            var productPrice = $(this).data('price');
            var quantity = $(this).val();

            $.ajax({
                url: 'backend.php', // The PHP file that handles the cart update
                type: 'POST',
                data: {
                    id: productId,
                    name: productName,
                    price: productPrice,
                    quantity: quantity
                },
                success: function(response) {
                    var cart = JSON.parse(response);
                    updateCart();
                    updateCartDisplay(cart, productId);
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        });

        function updateCartDisplay(cart, productId) {
            // Find the corresponding row for the product and update the total price
            var productRow = $('.product-quantity[data-id="' + productId + '"]').closest('tr');
            var totalPriceInput = productRow.find('.total-price');

            // Find the product in the cart and update the total price
            cart.forEach(function(product) {
                if (product.id == productId) {
                    totalPriceInput.val(product.totalprice);
                }
            });
        }
    });
</script>


<?php
include "./includes/footer.php";
?>