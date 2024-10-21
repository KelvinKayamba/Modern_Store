<?php 
require_once "addcart.php";
include_once 'removecart.php';
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
    <img src="store.png" alt=""><h1>CloudInfoSystems Online Store</h1><a href="#"><img class="basket" src="cart.png" alt=""></a>
   </header>
   <!--CART ACTION-->
   <div class="cart-action">
     <a href="modern.php"><button class="return-cart">Return</button></a>
    <a href="viewcart.php?empty=1"><button class="empty">Empty Cart</button></a>
   </div>
    <!--VIEW CART INFO-->
    <table id="content" class="table">
      <thead>
          <tr>
            <th width="15%">Name</th>
            <th width="10%" >Quantity</th>
            <th width="10%" >Unit Price</th>
            <th width="10%">Price</th>
            <th width="10%">Action</th>
        </thead>
        <tbody>
        <?php
					if(!empty($_SESSION["shopping_cart"]))
					{
						$total = 0;
						foreach($_SESSION["shopping_cart"] as $keys => $values)
						{
					?>
					<tr>
						<td data-label="Name"><?php echo $values["item_name"]; ?></td>
						<td data-label="Quantity"><?php echo $values["item_quantity"]; ?></td>
						<td data-label="Unit Price">$ <?php echo $values["item_price"]; ?></td>
						<td data-label="Price">$ <?php echo number_format($values["item_quantity"] * $values["item_price"], 2);?></td>
						<td data-label="Action"><a href="viewcart.php?action=delete&productid=<?php echo $values["item_id"]; ?>"><img class="bin" src="bin.png" alt="bin"></a></td>
					</tr>
					<?php
							$total = $total + ($values["item_quantity"] * $values["item_price"]);
						}
					?>
					<tr>
						<td colspan="3" align="right" data-label="Total"><b>Total</b></td>
						<td align="right" data-label="">$ <?php echo number_format($total, 2); ?></td>
						<td></td>
					</tr>
                    <tr>
                    <td  colspan="4" align="right"><span class="text-success" onclick="openForm()">Checkout</span></td>
                    <td></td>
                    </tr>
					<?php
					}
					?>
        </tbody>
      </table>
       <!--CHECKOUT FORM-->
    <div class="container" id="Myform">
 <span class="close" onclick="closeForm()">&times;</span>
          <div class="text">Personal Information</div>
          <form action="#" name="myForm" method="post" onsubmit="return validateForm()">
           <div class="data">
               <label>Name</label>
               <input type="text" name="fname">
            </div>
            <div class="data">
              <label>Email</label>
              <input type="text" name="email">
            </div>
            <div class="data">
              <label>Associated Student</label>
               <input type="text"name="student">
            </div>
              <button type="submit">Submit</button>
          </form>
    </div>
</body>
</html>