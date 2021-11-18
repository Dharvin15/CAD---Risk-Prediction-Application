<?php
    require_once("config.php");     
?>

<?php  
    if(isset($_GET['docID'])){
                    
        $docID = $_GET['docID'];

        $SQL = "DELETE FROM doctor WHERE docID = '$docID'";

        if(mysqli_query($conn,$SQL)){
            header("location:adminViewDoctor.php"); 
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
    <title>List of Doctor</title>
   
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
        <div class="card-header bg-primary text-white"><b> List of Doctor </b></div>
        <div class="card-body">

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" enctype="multipart/form-data">
            <div class="input-group mb-3">
                <input type="text" id="search" class="form-control" placeholder="Enter any keyword" name='search'>
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
                        <th>Specialist</th>
                        <th><i></i> Action</th>
                    </tr>
                </thead>
                <tbody>
                    
                     <?php
                    
                        if (isset($_POST['submit'])) {
                            $searchword = $_POST['search'];

                            $counter = 1;
                            $sql = "SELECT * FROM doctor WHERE docName LIKE '%$searchword%' OR docContact LIKE '%$searchword%' OR docEmail LIKE '%$searchword%' OR docSpecialist LIKE '%$searchword%' ORDER BY docName ASC";
                            $result = mysqli_query($conn,$sql);

                            while ($row = mysqli_fetch_assoc($result)){    
                    ?>
                    
                    <tr>
                        <td><?php echo $counter; ?></td>
                        <td><?php echo $row['docName']; ?></td>
                        <td><a href="mailto:<?php echo $row['docEmail']; ?>" style="text-decoration: none; color:black"> <?php echo $row['docEmail']; ?></a></td>
                        <td><a href="tel:<?php echo $row['docContact']; ?>" style="text-decoration: none; color:black"> <?php echo $row['docContact']; ?></a></td>
                        <td><?php echo $row['docSpecialist']; ?></td>   
                        <input type="hidden" name="docID" value="<?php echo $row['docID']; ?>">
                        <td> 

                            <?php
                                echo "<button type='button' class='btn btn-light' name='edit' value='edit'>";
                                echo "<a href=\"adminEditDoctor.php?docID={$row['docID']}\">Edit</a>";
                                echo "</button>";
                                echo "&nbsp";
                            ?>
                            
                             <?php
                                 echo '<a href="'.$_SERVER['PHP_SELF'].'?docID='.$row['docID'].'"><input type="button" class="btn btn-danger "name="submit" value="Delete" /></a>';
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

                        $sql2 = "SELECT * FROM doctor ORDER BY docName ASC ";
                        $result1 = mysqli_query($conn,$sql2);      

                        while ($row = mysqli_fetch_assoc($result1)){    
                    ?>
                      <tr>
                        <td><?php echo $counter; ?></td>
                        <td><?php echo $row['docName']; ?></td>
                         <td><a href="mailto:<?php echo $row['docEmail']; ?>" style="text-decoration: none; color:black"> <?php echo $row['docEmail']; ?></a></td>
                        <td><a href="tel:<?php echo $row['docContact']; ?>" style="text-decoration: none; color:black"> <?php echo $row['docContact']; ?></a></td>
                        <td><?php echo $row['docSpecialist']; ?></td>
                        <input type="hidden" name="docID" value="<?php echo $row['docID']; ?>">
                        <td> 

                            <?php
                                echo "<button type='button' class='btn btn-light' name='edit' value='edit'>";
                                echo "<a href=\"adminEditDoctor.php?docID={$row['docID']}\">Edit</a>";
                                echo "</button>";
                                echo "&nbsp";
                            ?>
                            
                             <?php
                                 echo '<a href="'.$_SERVER['PHP_SELF'].'?docID='.$row['docID'].'"><input type="button" class="btn btn-danger "name="submit" value="Delete" /></a>';
                             ?>
                                                
                        </td>  
                          
                    </tr>
                
                    <?php
                        $counter++;
                        }}
                    ?>
                    
                    <?php 
                        if (isset($_POST['submit'])) {
                            $searchword = $_POST['search'];

                            $counter = 1;
                            $sql = "SELECT * FROM doctor WHERE docName LIKE '%$searchword%' OR docContact LIKE '%$searchword%' OR docEmail LIKE '%$searchword%' OR docSpecialist LIKE '%$searchword%' ORDER BY docName ASC";
                            
                            $result = mysqli_query($conn,$sql);
                              
                            if (empty($row = mysqli_fetch_assoc($result)))
                                echo "<tr><th style='text-align: center'; colspan='7'>No record found.</th></tr>"; 
                        }
                    ?>
                    
                    <?php
                        $sql3 = "SELECT * FROM doctor ORDER BY docName ASC ";
                        $result2 = mysqli_query($conn,$sql3);  
                    
                        if (empty($row = mysqli_fetch_assoc($result2)))
                                echo "<tr><th style='text-align: center'; colspan='7'>No record.</th></tr>"; 
                    ?>
               
                </tbody>
            </table>
        </div>
        <div class="text-center"><a href="adminAddDoctor.php">Add Doctor</a></div>    
        </div>
        </div>
        </div></div>
      <div class="col-md-1"></div>
</body>
</html>
