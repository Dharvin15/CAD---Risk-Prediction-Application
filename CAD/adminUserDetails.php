<?php
    require_once("config.php");   
?>

<?php
    
    $userID = $_GET['userID'];

    $sql = "SELECT * FROM user WHERE userID = '$userID' LIMIT 1";
    $result = mysqli_query($conn, $sql);
    
    $userName = $userEmail = $userAddress = $userContact = $userAge = $userGender = "";

    while($row = mysqli_fetch_assoc($result))   {
        
        $userName = $row['userName'];
        $userEmail = $row['userEmail'];
        $userAddress = $row['userAddress'];
        $userContact = $row['userContact'];
        $userAge = $row['userAge'];
        $userGender = $row['userGender'];
    } 
    
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>User Details</title>
  </head>
    
  <body>
    
    <?php
        require_once("adminHeader.php");     
    ?>
      
    <br>
                
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            
            <div class="card">
                <div class="card-header bg-primary text-white"><b>User Information</b></div>

            <div class="card-body">
                
                <form method="POST" enctype="multipart/form-data" action="">
                            
                    <div class="form-group row">
                        <label for="username" class="col-md-4 col-form-label text-md-right">Name</label>
                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control" name="name" value="<?php echo $userName; ?>" disabled autofocus>
                        </div>
                    </div>
                    
                     <div class="form-group row">
                        <label for="gender" class="col-md-4 col-form-label text-md-right">Gender</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="gender" value="<?php echo $userGender; ?>" disabled>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label for="age" class="col-md-4 col-form-label text-md-right">Age</label>
                        <div class="col-md-6">
                            <input id="age" type="number" class="form-control" name="age" value="<?php echo $userAge; ?>" disabled>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label for="contact" class="col-md-4 col-form-label text-md-right">Contact No</label>
                        <div class="col-md-6">
                            <input id="contact" type="text" class="form-control" name="contact" value="<?php echo $userContact; ?>" disabled autofocus>
                        </div>
                    </div>
                                
                    <div class="form-group row">
                        <label for="email" class="col-md-4 col-form-label text-md-right">E-mail</label>
                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control" name="email" value="<?php echo $userEmail; ?>" disabled autofocus>
                        </div>
                    </div>
                                
                    <div class="form-group row">
                        <label for="address" class="col-md-4 col-form-label text-md-right">Address</label>
                        <div class="col-md-6">
                            <textarea id="address" class="form-control" name="address" disabled autofocus><?php echo $userAddress; ?></textarea>
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-8 offset-md-4">
                            <a href="adminViewUser.php"><button type="button" class="btn btn-primary">Back</button></a>
                        </div>  
                    </div>
                                
                </form>
            </div>
        </div>
    </div>
    
    <div class="col-md-2"></div>
</div>
      
</body>
</html>
