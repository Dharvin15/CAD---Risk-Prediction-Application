<?php
    require_once("config.php");   
?>

<?php
    
    $doctorID = $_GET['docID'];

    $sql = "SELECT * FROM doctor WHERE docID = '$doctorID' LIMIT 1";
    $result = mysqli_query($conn, $sql);
    
    $doctorID = $doctorName = $doctorEmail = $doctorAddress = $doctorContact = $doctorAge = $doctorGender = $doctorSpecialist = "";

    while($row = mysqli_fetch_assoc($result))   {
        
        $doctorID = $row['docID'];
        $doctorName = $row['docName'];
        $doctorEmail = $row['docEmail'];
        $doctorAddress = $row['docAddress'];
        $doctorContact = $row['docContact'];
        $doctorAge = $row['docAge'];
        $doctorGender = $row['docGender'];
        $doctorSpecialist = $row['docSpecialist'];  
    } 
    
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Update Doctor</title>
   
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
                <div class="card-header bg-primary text-white"><b>Update Doctor Information</b></div>

            <div class="card-body">
                
                <form method="POST" enctype="multipart/form-data" action="process.php">
                    
                    <input type="hidden" name="ID" value="<?php echo $doctorID; ?>">
                            
                    <div class="form-group row">
                        <label for="username" class="col-md-4 col-form-label text-md-right">Name</label>
                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control" name="name" value="<?php echo $doctorName; ?>" required autofocus>
                        </div>
                    </div>
                                
                    <div class="form-group row">
                        <label for="email" class="col-md-4 col-form-label text-md-right">E-mail</label>
                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control" name="email" value="<?php echo $doctorEmail; ?>" required autofocus>
                        </div>
                    </div>
                                
                    <div class="form-group row">
                        <label for="address" class="col-md-4 col-form-label text-md-right">Address</label>
                        <div class="col-md-6">
                            <input id="address" type="text" class="form-control" name="address" value="<?php echo $doctorAddress; ?>" autofocus>
                        </div>
                    </div>
                                
                    <div class="form-group row">
                        <label for="contact" class="col-md-4 col-form-label text-md-right">Contact No</label>
                        <div class="col-md-6">
                            <input id="contact" type="text" class="form-control" name="contact" value="<?php echo $doctorContact; ?>" required autofocus>
                        </div>
                    </div>
                                
                    <div class="form-group row">
                        <label for="age" class="col-md-4 col-form-label text-md-right">Age</label>
                        <div class="col-md-6">
                            <input id="age" type="number" class="form-control" name="age" value="<?php echo $doctorAge; ?>" disabled>
                        </div>
                    </div>
                                
                    <div class="form-group row">
                        <label for="gender" class="col-md-4 col-form-label text-md-right">Gender</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="gender" value="<?php echo $doctorGender; ?>" disabled>
                        </div>
                    </div>
                                
                    <div class="form-group row">
                        <label for="specialist" class="col-md-4 col-form-label text-md-right">Specialist</label>
                        <div class="col-md-6">
                            <input id="specialist" type="text" class="form-control" name="specialist" value="<?php echo $doctorSpecialist; ?>" autofocus required>
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-8 offset-md-4">
                            <button type="submit" name="submit" value="updateDoctor" class="btn btn-primary">Save</button> 
                            <a href="adminViewDoctor.php"><button type="button" class="btn btn-warning text-white">Cancel</button></a>
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
