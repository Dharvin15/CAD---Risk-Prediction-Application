<?php 
    require_once("config.php");    //connect to db
               
    if(isset($_SESSION['ID'])){
        $username=$_SESSION['ID'];
             
        $sql="SELECT * FROM user WHERE username='$username' LIMIT 1";
        $result = mysqli_query($conn,$sql);

        $username = $userID ="";     //initialize

        while($row=mysqli_fetch_assoc($result)){
            $userID=$row['userID'];
            $userName=$row['userName'];
        }
    }         
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Feedback</title>
  </head>
    
  <body>
   
     <?php
        require_once("userHeader.php");     
    ?>
      
    <br>
                
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
           
            <div class="card">
                <div class="card-header bg-primary text-white"><b>Feedback</b></div>

                <div class="card-body">
                    
                    <?php
    
                        $response = isset($_REQUEST['feedback']) ? $_REQUEST['feedback']: '';

                        if($response == 1){
                            echo "<center><b>Thank you for your feedback!<b></center><br>";
                        }
                    ?>
                    
                    <form method="POST" action="process.php">
                        
                        <input type="hidden" name="userID" value="<?php echo $userID; ?>">
                        <input type="hidden" name="feedbackID" required>
                        
                        <div class="form-group row">
                            <label for="username" class="col-md-4 col-form-label text-md-right">Username</label>
                            <div class="col-md-6">
                                <input id="username" type="text" class="form-control" name="username" value="<?php echo $userName; ?>" required autocomplete="username" autofocus disabled>
                            </div>
                        </div>
                                
                        <div class="form-group row">
                            <label for="feedback" class="col-md-4 col-form-label text-md-right">Feedback</label>
                            <div class="col-md-6">
                                <textarea rows="6" maxlength="500" id="feedback" class="form-control" name="feedback" required autocomplete="feedback" placeholder="Leave your comment here" autofocus></textarea>
                            </div>
                        </div>
                       
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" name="submit" value="addFeedback" class="btn btn-primary">Submit</button>     
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
