<?php
    require_once("config.php");     
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>History Result</title>
  </head>
    
  <body>
   
    <?php
        require_once("userHeader.php");     
    ?>
      
    <br><br>
    <div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-10">
              
    <div class="card">
        <div class="card-header bg-primary text-white"><b> Result History </b></div>
        <div class="card-body">  

        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead class="table-info">
                    <tr>
                        <th><i class='fas fa-list'></i></th>
                        <th>Date</th>
                        <th>Result</th>
                    </tr>
                </thead>
                <tbody>
               
                 <?php  
                        $userName = $_SESSION['ID'];
                        $sql = "SELECT userID FROM user WHERE username = '$userName'";
                        $result = mysqli_query($conn,$sql);
                        while($row = mysqli_fetch_assoc($result))   {
                            $userID = $row['userID'];
                        }
                    
                        $counter=1;

                        $sql2 = "SELECT * FROM result WHERE userID = '$userID' ORDER BY resultDate DESC ";
                        $result1 = mysqli_query($conn,$sql2);      

                        while ($row = mysqli_fetch_assoc($result1)){    
                ?>
                      <tr>
                        <td><?php echo $counter; ?></td>
                        <td><?php echo $row['resultDate']; ?></td>
                        <td>The percentage that you have CAD in 10-years is <?php echo $row['result']; ?></td>
                    </tr>
                
                 <?php
                        $counter++;
                        }
                ?>
                
                <?php 
                        if (isset($_POST['submit'])) {
                            $searchword = $_POST['search'];

                            $counter = 1;
                            $sql = "SELECT * FROM doctor WHERE docName LIKE '%$searchword%' OR docContact LIKE '%$searchword%' OR docEmail LIKE '%$searchword%' OR docSpecialist LIKE '%$searchword%' ORDER BY docName ASC";
                            
                            $result = mysqli_query($conn,$sql);
                              
                            if (empty($row = mysqli_fetch_assoc($result)))
                                echo "<tr><th style='text-align: center'; colspan='5'>No record found.</th></tr>"; 
                        }
                ?>
                    
                <?php
                        $userName = $_SESSION['ID'];
                        $sql = "SELECT userID FROM user WHERE username = '$userName'";
                        $result = mysqli_query($conn,$sql);
                        while($row = mysqli_fetch_assoc($result))   {
                            $userID = $row['userID'];
                        }
                    
                        $sql3 = "SELECT * FROM result WHERE userID = '$userID' ORDER BY resultDate DESC ";
                        $result2 = mysqli_query($conn,$sql3);       
                    
                        if (empty($row = mysqli_fetch_assoc($result2)))
                                echo "<tr><th style='text-align: center'; colspan='5'>No record.</th></tr>"; 
                    ?>
                    
                </tbody>
            </table>
        </div>
        <div class="text-center"><a href="userCad.php">Check your risk here</a></div>
        </div>
        </div>
        </div></div>
      <div class="col-md-1"></div>
</body>
</html>
