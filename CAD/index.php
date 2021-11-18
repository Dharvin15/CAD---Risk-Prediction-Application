<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
  </head>
    
  <body>
    <script src="js/bootstrap.min.js"></script>
    <script src="jquery-3.6.0.min.js"></script>
      
    <nav class="navbar shadow-sm navbar-expand-lg navbar-dark navbar-default bg-primary text-white">
        <a class="navbar-brand" href="#">Coronary Artery Disease Risk Prediction</a>
    </nav>
   
    <br><br>
        <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">  
            
            <?php
    
                $response = isset($_REQUEST['response']) ? $_REQUEST['response']: '';

                if($response == 1){
                    echo "<center><b>Thank You! Your info has been entered. You can log in now!</b></center><br>";
                }
            ?>

            <div class="card">
                <div class="card-header bg-primary text-white"><b>User Login</b></div>
                
                <div class="card-body">
                    
                    <?php
    
                        $status = isset($_REQUEST['status']) ? $_REQUEST['status']: '';

                        if($status == 1){
                            echo "<center><b>Invalid ID or PASSWORD.</b></center><br>";
                        }
                    ?>

                    <form method="POST" action="process.php">
                            
                        <div class="form-group row">
                            <label for="username" class="col-md-4 col-form-label text-md-right">Username</label>
                            <div class="col-md-6">
                                <input id="username" type="text" class="form-control" name="username" value="" required autocomplete="current-username" autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required autocomplete="current-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" name="submit" value="userLogin" class="btn btn-primary">Login</button>
                                <a href="userRegister.php">New user? Register</a>
                            </div> 
                        </div><br>
                        
                        <div class="form-group row mb-0">
                            <div class="col-md-7 offset-md-5"><a href="adminLogin.php">Admin Login</a></div>
                        </div>
                                
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-3"></div>
      </div>
      
</body>
</html>
