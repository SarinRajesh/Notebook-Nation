<?php
session_start();
  include 'config.php';

$a=$_SESSION['name1'];
$output = '';
if(isset($_POST["query"]))
{
	$search = mysqli_real_escape_string($conn, $_POST["query"]);
	$query = "SELECT order_tbl.order_id,order_tbl.lap_id,order_tbl.delivery_status,laptops.id,laptops.vendor,
    laptops.file,laptops.name,laptops.processor, laptops.ram,laptops.storage,laptops.display,laptops.price
    FROM order_tbl
    INNER JOIN laptops
    ON order_tbl.lap_id = laptops.id
	WHERE username LIKE '$a' and order_tbl.delivery_status='Delivered' and order_id LIKE '".$search."' 
	
	";

$result = mysqli_query($conn, $query);
if(mysqli_num_rows($result) > 0)
{

    
    while($row = mysqli_fetch_array($result)){

?>
 <img src="./uploads/<?php echo $row['file']; ?>"width="350" height="350"> 
 <h4 style="margin-left: 88px;"><?php echo $row['name'];?></h4>
                <?php
                    
                };
                ?>
				   <?php
	echo $output;
}
else
{
	echo 'Laptops Not Found';
}
}
else if (isset($_POST["chat"])) {
    ?>
  
  <div class="wrapper">
          <div class="title">Notebook Nation Chatbot</div>
          <div class="form">
              <div class="bot-inbox inbox">
                  <div class="icon">
                  <i class="fas fa-robot"></i>
                  </div>
                  <div class="msg-header">
                      <p>Hello there, how can I help you?</p>
                  </div>
              </div>
          </div>
          <div class="typing-field">
              <div class="input-data">
                  <input id="data" type="text" placeholder="Type something here.." required>
                  <button id="send-btn">Send</button>
              </div>
          </div>
      </div>
      
  <script>
          $(document).ready(function(){
              $("#send-btn").on("click", function(){
                  $value = $("#data").val();
                  $msg = '<div class="user-inbox inbox"><div class="msg-header"><p>'+ $value +'</p></div></div>';
                  $(".form").append($msg);
                  $("#data").val('');
                  
                  // start ajax code
                  $.ajax({
                      url: 'message.php',
                      type: 'POST',
                      data: 'text='+$value,
                      success: function(result){
                          $replay = '<div class="bot-inbox inbox"><div class="icon"><i class="fas fa-user"></i></div><div class="msg-header"><p>'+ result +'</p></div></div>';
                          $(".form").append($replay);
                          // when chat goes down the scroll bar automatically comes to the bottom
                          $(".form").scrollTop($(".form")[0].scrollHeight);
                      }
                  });
              });
          });
      </script>
      <?php
  
  }
  ?>