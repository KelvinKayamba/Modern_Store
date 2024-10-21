<?php 
   if(isset($_GET["action"]))
   {
       if($_GET["action"] == "delete")
       {
           foreach($_SESSION["shopping_cart"] as $keys => $values)
           {
               if($values["item_id"] == $_GET["productid"])
               {
                   unset($_SESSION["shopping_cart"][$keys]);
                   echo '<script>alert("Item Removed")</>';
                   echo '<script>window.location="viewcart.php"</script>';
               }
           }
       }
   }

   if(isset($_GET['empty'])){
    unset($_SESSION['shopping_cart']);
   }
?>