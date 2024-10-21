<?php 
require "db.php";
require_once "addcart.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modern Online Store</title>
    <!--LINK TO STYLE-->
     <link rel="stylesheet" href="Styles.css">
     <!--MY FUNCTIONS-->
    <script src="myfunction.js"></script>
</head>
<body>
    <!--Title-->
    <header class="header">
    <img src="store.png" alt=""><h1>CloudInfoSystems Online Store</h1><a href="viewcart.php"><img class="basket" src="cart.png" alt="">
    <span class ="cart-quantity" id="count"><?php if(isset($_SESSION['shopping_cart'])){ echo count($_SESSION['shopping_cart']);}else{echo '0';} ?></span></a>
   </header>
    <!--PRODUCT CARDS-->
    <?php 
       $query = "SELECT * FROM sd_product ORDER BY productid ASC";
       $result = mysqli_query ($conn,$query);
       if(mysqli_num_rows($result)> 0){

         while ($row = mysqli_fetch_array($result)){
    ?>
    <div class="card">
    <form method ="post" id="fcart" action="addcart.php?action=add&productid=<?php echo $row["productid"]; ?>">
      <div class="left">
        <img src=<?php echo $row['image']; ?> alt="">
      </div>
      <div class="right">
      <div class="product-info">
      <div class="details">
          <h2><?php echo $row['name']; ?></h2>
          <p><?php echo $row['description']; ?></p>
          <h4>$<?php echo $row['price']; ?></h4>
          <h4 class="dis"><?php echo $row['discount']; ?></h4>
        </div>
        <div class="custom-select"><!--SELECT SIZE-->
            <select>
              <option value="0"><?php echo $row['radiodesc']; ?></option>
              <option value="1"><?php echo $row['radio1']; ?></option>
              <option value="2"><?php echo $row['radio2']; ?></option>
              <option value="3"><?php echo $row['radio3']; ?></option>
              <option value="4"><?php echo $row['radio4']; ?></option>
              <option value="5"><?php echo $row['radio5']; ?></option>
            </select>
          </div>
          <div class="custom-select"><!--SELECT COLOR-->
            <select>
              <option value="0"><?php echo $row['sradiodesc']; ?></option>
              <option value="1"><?php echo $row['sradio1']; ?></option>
              <option value="2"><?php echo $row['sradio2']; ?></option>
              <option value="3"><?php echo $row['sradio3']; ?></option>
              <option value="4"><?php echo $row['sradio4']; ?></option>
              <option value="5"><?php echo $row['sradio5']; ?></option>
            </select>
          </div>
          <div class="input">
          <input type="text" name="quantity" class="count" value="0"/>
           <input type="hidden" name="hidden_name" value="<?php echo $row['name']; ?>" />
           <input type="hidden" name="hidden_price" value="<?php echo $row['price']; ?>" />
           </div>
        <div class="btn-cart">
        <button name="add_to_cart">Add To Cart</button>
        </div>
      </div>
      </div>
         </form>
    </div><!--END OF PRODUCT CARD-->
    <?php
         }
        }
    ?>
    
</body>
</html>