<?php require "../includes/header.php"; ?> 
<?php require "../config/config.php"; ?> 

<?php

  # line 6-9 checks if already loged in
  if(isset($_SESSION['username'])){
    echo "<script>window.location.href='".APPURL."' </script>";
  }  
  #if not loged in then taking email and password to login

  if(isset($_POST['submit'])){
    #but if users cliks login without giving email and password 
    if(empty($_POST['email']) OR empty($_POST['password'])) {
      echo "<script>alert('One Or More input are empty!')</script>";
    } else {
      
      $email = $_POST['email'];
      $password = $_POST['password'];
     
      // now validating thee email with query
      $login = $conn->query("SELECT * FROM users WHERE email='$email'");
      $login->execute();
      #row
      $fetch = $login->fetch(PDO::FETCH_ASSOC);
       
      //getting the row count

      if($login->rowCount() > 0){
        
        if(password_verify($password, $fetch['mypassword'])){
          // echo "<script>alert('LOGGED IN')</script>";

          #starting session for current users
          $_SESSION['username'] = $fetch['username'];
          $_SESSION['id'] = $fetch['id'];

          header("location: ".APPURL."");
         
       

     



        } else {
          echo "<script>alert('email or password is wrong!')</script>";
        } 

      }
      else{
        echo "<script>alert('email or password is wrong!')</script>";
      }
    }
}


?>

    <div class="hero-wrap js-fullheight" style="background-image: url('<?php echo APPURL; ?>/images/image_2.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-start" data-scrollax-parent="true">
          <div class="col-md-7 ftco-animate">
          	<!-- <h2 class="subheading">Welcome to Vacation Rental</h2>
          	<h1 class="mb-4">Rent an appartment for your vacation</h1>
            <p><a href="#" class="btn btn-primary">Learn more</a> <a href="#" class="btn btn-white">Contact us</a></p> -->
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section ftco-book ftco-no-pt ftco-no-pb">
    	<div class="container">
	    	<div class="row justify-content-middle" style="margin-left: 397px;">
	    		<div class="col-md-6 mt-5">
						<form action="login.php" method="POST" class="appointment-form" style="margin-top: -568px;">
							<h3 class="mb-3">Login</h3>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
			    					    <input type="text" name="email" class="form-control" placeholder="Email">
			    				    </div>
								</div>
                               
                <div class="col-md-12">
									<div class="form-group">
			    					    <input type="password" name="password" class="form-control" placeholder="Password">
			    				    </div>
								</div>
								
							
							
								<div class="col-md-12">
                    <div class="form-group">
                        <input type="submit" name="submit" value="Login" class="btn btn-primary py-3 px-4">
                    </div>
								</div>
							</div>
	    			</form>
	    		</div>
	    	</div>
	    </div>
    </section>


<?php require "../includes/footer.php"; ?> 
