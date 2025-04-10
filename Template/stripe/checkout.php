<?php
    session_start();
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Integartion (Stripe)</title>
    <link rel="stylesheet" href="./css_stripe/_style.css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>

<?php
$a=$_SESSION['name1'];
$b=$_SESSION['lap_name'];
$conn=mysqli_connect("localhost","root","","miniproject") or die("Connection failed!". $conn->error);

$select_cart = mysqli_query($conn, "SELECT * FROM `purchase` where person='$a' and name ='$b'");
         if(mysqli_num_rows($select_cart) > 0){
            $row = mysqli_fetch_assoc($select_cart)

                ?>
<button type="button" onclick="goback()" class="back">Go Back</button> 
<div class="row">
    <div class="col-md-6">
        <div class="form-container">
            <form  method="POST">
                <div>
                    <input type="text" name="c_name" required/>
                    <label>Customer Name</label>
                </div>
                <div>
                    <input type="text" name="address" required/>
                    <label>Address</label>
                </div>
                <div>
                    <input type="number" id="ph" name="phone" pattern="\d{10}" maxlength="10" required/>
                    <label>Contact number</label>
                </div>
                <div>
                    <input type="text"  name="product_name" value="<?php echo $row["name"]?>" disabled required/>
                    <label>Product name</label>
                </div>
                <div>
                    <input type="text"  name="price" value="<?php echo $row["price"]?>" disabled required/>
                    <label>Price</label>
                </div>
               
                    <input type="hidden" name="amount" value="<?php echo $row["price"]?>">
                    <input type="hidden" name="product_name" value="<?php echo $row["name"]?>">
                
                <script
                src="https://checkout.stripe.com/checkout.js" class="stripe-button"name="submit"
                data-key="pk_test_51MkSIbSBoA9w6HErC6k8FhbLBS2f7UJaLPq0x6fB9EunOFaxckUlDa950KgkTKirYIXhmjz69HlP2Z1mrGxLgfCH00qUkyLLU1"
                data-amount=<?php echo str_replace(",","",$row["price"]) * 100?>
                data-name="<?php echo $row["name"]?>"
                data-description="<?php echo $row["name"]?>"
                data-image="./uploads/<?php echo $row["image"]?>"
                data-currency="inr"
                data-locale="auto">
                </script>
            </form>
        </div>
    </div>
    <div class="col-md-6">
        <div class="checkout-container">
            <h4>Product Name&nbsp;:&nbsp;<?php echo $row["name"]?></h4>
            <img src="./uploads/<?php echo $row["image"]?>"/>
            <span>Price &nbsp;:&nbsp;<?php  echo $row["price"]?></span>
        </div>
    </div>
</div> 
<?php
            }
        
        ?>

<script>
    function goback(){
        window.history.go(-1);
    }

    $('#ph').on('keypress',function(){
         var text = $(this).val().length;
         if(text > 9){
              return false;
         }else{
            $('#ph').text($(this).val());
         }
         
    });
</script>
</body>
</html>
<?php 
if(isset($_POST['submit'])){

    ?>
    <script>
        alert("sucess");
    </script>
    <?php
}
?>