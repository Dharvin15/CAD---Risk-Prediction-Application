<?php
    require_once("config.php");     
?>

<?php  
    if(isset($_GET['userID'])){
                    
        $userID = $_GET['userID'];

        $SQL = "DELETE FROM user WHERE userID = '$userID'";

        if(mysqli_query($conn,$SQL)){
            header("location:adminViewUser.php"); 
        }

        else{
            echo "ERROR! : </center>" .mysqli_error($conn); 
        } 
    }   
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>List of User</title>
  </head>
    
  <body>
   
    <?php
        require_once("adminHeader.php");     
    ?>
      
    <br>
    <div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-10">
              
    <div class="card">
        <div class="card-header bg-primary text-white"><b> Registered User</b></div>
        <div class="card-body">

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
            <div class="input-group mb-3">
                <input type="text" id="search" class="form-control" placeholder="Enter any keyword" name='findtext'>
                <div class="input-group-append">
                    <button class="btn btn-primary text-white" name="submit" type="submit">Search <i class="fas fa-search"></i></button>
                </div>
            </div>
        </form>

        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead class="table-info">
                    <tr>
                        <th><i class='fas fa-list'></i></th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Contact No</th>
                        <th><i></i> Action</th>
                    </tr>
                </thead>
                <tbody>
                    
                    <?php
                        if (isset($_POST['submit'])) {
                            $searchword = $_POST['findtext'];
 
                            $counter = 1;
                            $sql = "SELECT * FROM user WHERE userName LIKE '%$searchword%' OR userContact LIKE '%$searchword%' OR userEmail LIKE '%$searchword%' ORDER BY userName ASC";
                            $result = mysqli_query($conn,$sql);

                            while ($row = mysqli_fetch_assoc($result)){    
                    ?>

                    <tr>
                        <td><?php echo $counter; ?></td>
                        <td><?php echo $row['userName']; ?></td>
                        <td><a href="mailto:<?php echo $row['userEmail']; ?>" style="text-decoration: none; color:black"> <?php echo $row['userEmail']; ?></a></td>
                        <td><a href="tel:<?php echo $row['userContact']; ?>" style="text-decoration: none; color:black"> <?php echo $row['userContact']; ?></a></td>
                        <input type="hidden" name="userID" value="<?php echo $row['userID']; ?>">
                        <td>
                            
                            <?php
                                echo "<button type='button' class='btn btn-light' name='view' value='view'>";
                                echo "<a href=\"adminUserDetails.php?userID={$row['userID']}\">View</a>";
                                echo "</button>";
                                echo "&nbsp";
                            ?>
                            
                            <?php
                                 echo '<a href="'.$_SERVER['PHP_SELF'].'?userID='.$row['userID'].'"><input type="button" class="btn btn-danger "name="submit" value="Delete" /></a>';
                             ?>
                        </td>
                    </tr>
                    
                     <?php

                        $counter++;
                        }}
                        else {
                    ?>
               
                     <?php           
                            $counter=1;

                            $sql2 = "SELECT * FROM user ORDER BY userName ASC ";
                            $result1 = mysqli_query($conn,$sql2);      

                            while ($row = mysqli_fetch_assoc($result1)){    
                    ?>
                    
                    <tr>
                        <td><?php echo $counter; ?></td>
                        <td><?php echo $row['userName']; ?></td>
                         <td><a href="mailto:<?php echo $row['userEmail']; ?>" style="text-decoration: none; color:black"> <?php echo $row['userEmail']; ?></a></td>
                        <td><a href="tel:<?php echo $row['userContact']; ?>" style="text-decoration: none; color:black"> <?php echo $row['userContact']; ?></a></td>  
                        <input type="hidden" name="userID" value="<?php echo $row['userID']; ?>">

                        <td>
                            
                            <?php
                                echo "<button type='button' class='btn btn-light' name='view' value='view'>";
                                echo "<a href=\"adminUserDetails.php?userID={$row['userID']}\">View</a>";
                                echo "</button>";
                                echo "&nbsp";
                            ?>
                            
                            <?php
                                 echo '<a href="'.$_SERVER['PHP_SELF'].'?userID='.$row['userID'].'"><input type="button" class="btn btn-danger "name="submit" value="Delete" /></a>';
                             ?>
                        </td>
                    </tr>
                    
                    <?php
                        $counter++;
                        }}
                    ?>
                    
                     <?php 
                        if (isset($_POST['submit'])) {
                            $searchword = $_POST['findtext'];

                            $counter = 1;
                            $sql = "SELECT * FROM user WHERE userName LIKE '%$searchword%' OR userContact LIKE '%$searchword%' OR userEmail LIKE '%$searchword%' ORDER BY userName ASC";
                            
                            $result = mysqli_query($conn,$sql);
                              
                            if (empty($row = mysqli_fetch_assoc($result)))
                                echo "<tr><th style='text-align: center'; colspan='7'>No record found.</th></tr>"; 
                        }
                    ?>
                    
                    <?php
                        $sql3 = "SELECT * FROM user ORDER BY userName ASC ";
                        $result2 = mysqli_query($conn,$sql3); 
                    
                        if (empty($row = mysqli_fetch_assoc($result2)))
                                echo "<tr><center><th style='text-align: center'; colspan='7'>No record.</th></center></tr>"; 
                    ?>
               
                </tbody>
            </table>
        </div>
        </div>
        </div>
        </div></div>
      <div class="col-md-1"></div>
</body>
</html>
