<?php
    require_once("config.php");
    
    if(isset($_SESSION['ID'])) {
        
        $userName = $_SESSION['ID'];
        
        $sql = "SELECT * FROM user WHERE userName = '$userName' LIMIT 1";
        $result = mysqli_query($conn,$sql);
        
        $userName = $userContact = $userEmail = $userAddress = $userAge =  $userGender =  $userPassword ='';
        
         while($row = mysqli_fetch_assoc($result)){ 
             
            $userName = $row['userName'];
            $userContact = $row['userContact'];
            $userEmail = $row['userEmail'];
            $userPassword = $row['password'];
            $userAddress = $row['userAddress'];
            $userAge = $row['userAge'];
            $userGender = $row['userGender'];
        }
    }    
        
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Update Profile</title>
  
  </head>
    
  <body>
   
    <?php
        require_once("userHeader.php");     
    ?>
      
    <br><br>
                
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            
            <div class="card">
                <div class="card-header bg-primary text-white"><b>Update Profile</b></div>
                
                <?php
    
                        $status = isset($_REQUEST['updateStatus']) ? $_REQUEST['updateStatus']: '';

                        if($status == 1){
                            echo "<br><center><b>Information successfully update!</b></center><br>";
                        }
                    ?>

                <div class="card-body">
                    <form method="POST" action="process.php">
                        
                        <div class="form-group row">
                            <label for="username" class="col-md-4 col-form-label text-md-right">Username</label>
                            <div class="col-md-6">
                                <input id="username" type="text" class="form-control" name="username" value="<?php echo $userName; ?>" disabled>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" minlength="8" required value="<?php echo $userPassword; ?>" autocomplete="current-password">
                            </div>
                        </div>
                                
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">E-mail</label>
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="<?php echo $userEmail; ?>" required autocomplete="email" autofocus>
                            </div>
                        </div>
                                
                        <div class="form-group row">
                            <label for="address" class="col-md-4 col-form-label text-md-right">Address</label>
                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control" name="address" value="<?php echo $userAddress; ?>" required autocomplete="address" autofocus>
                            </div>
                        </div>
                                
                        <div class="form-group row">
                            <label for="contact" class="col-md-4 col-form-label text-md-right">Contact No</label>
                            <div class="col-md-6">
                                <input id="contact" type="text" maxlength="12" minlength="11" class="form-control" name="contact" value="<?php echo $userContact; ?>" required autocomplete="contact" autofocus  placeholder="017-5552288">
                            </div>
                        </div>
                                
                        <div class="form-group row">
                            <label for="age" class="col-md-4 col-form-label text-md-right">Age</label>
                            <div class="col-md-6">
                                <input id="age" type="number" class="form-control"  min="1" name="age" value="<?php echo $userAge; ?>" required autofocus>
                            </div>
                        </div>
                                
                        <div class="form-group row">
                            <label for="gender" class="col-md-4 col-form-label text-md-right">Gender</label>
                            <div class="col-md-6">
                               <input id="gender" type="text" class="form-control" name="gender" value="<?php echo $userGender; ?>" disabled autofocus>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" name="submit" value="updateProfile" class="btn btn-primary">Save</button> 
                                <a href="userCad.php"><button type="button" class="btn btn-warning text-white">Cancel</button></a>
                            </div>  
                        </div>
                                
                    </form>
                </div>
            </div><br>
        </div>
           
        <div class="col-md-2"></div>
      </div>
      
</body>
</html>
