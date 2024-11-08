<?php require "../includes/header.php"; ?> 
<?php require "../config/config.php"; ?>
<?php
  if(!isset($_SERVER['HTTP_REFERER'])){
    // redirect them to your desired location
    // header('location: http://localhost/hotel-booking/index.php');
    echo "<script>window.location.href='".APPURL."' </script>";
    exit;
  }


?>



<div class="hero-wrap js-fullheight" style="background-image: url('<?php echo APPURL; ?>/images/image_2.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-start" data-scrollax-parent="true">
          <div class="col-md-7 ftco-animate">
          	<!-- <h2 class="subheading">&emsp;&emsp;&emsp;&emsp;&emsp;Behold, the payment gateway discovered by our accidental Guest!!!</h2> -->
              <body>      
                  
                <h2 class="subheading" style="color:Yellow;font-size:30px;">&emsp;Well, look who's here! Our beloved guest has</h2>  
                <h2 class="subheading" style="color:Yellow;font-size:30px;">&emsp;stumbled upon the payment gateway!</h2>  
              </body>
              
              <div class="container">  
                    <!-- Replace "test" with your own sandbox Business account app client ID -->
                            <script src="https://www.paypal.com/sdk/js?client-id=AVsBj4B1NWnADBgXPl9HhPFwvk-mo2_R5PUkKTmuMaTNew801ng27HpfdvWVFTcMioq1l0umKvC6FgOP&currency=USD"></script>
                            <!-- Set up a container element for the button -->
                            <div id="paypal-button-container"></div>
                            <script>
                                paypal.Buttons({
                                // Sets up the transaction when a payment button is clicked
                                createOrder: (data, actions) => {
                                    return actions.order.create({
                                    purchase_units: [{
                                        amount: {
                                        value: '<?php echo $_SESSION['price']; ?>' // Can also reference a variable or function
                                        }
                                    }]
                                    });
                                },
                                // Finalize the transaction after payer approval
                                onApprove: (data, actions) => {
                                    return actions.order.capture().then(function(orderData) {
                                
                                    window.location.href='http://localhost/hotel-booking';
                                    });
                                }
                                }).render('#paypal-button-container');
                            </script>
                
            </div>
          </div>
        </div>
      </div>
    </div>
    
<?php require "../includes/footer.php"; ?> 



