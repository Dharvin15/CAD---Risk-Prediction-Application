<?php
    require_once("config.php");     
?>

<?php  
    if(isset($_GET['feedbackID'])){
                    
        $feedbackID = $_GET['feedbackID'];
                                   
        $SQL = "DELETE FROM feedback WHERE feedbackID = '$feedbackID'";
                                    
        if(mysqli_query($conn,$SQL)){
            header("location:adminViewFeedback.php"); 
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
    <title>List of Feedback</title>
    
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
        <div class="card-header bg-primary text-white"><b>List of Feedback</b></div>
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
                        <th>Feedback Details</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    
                    <?php
                        if (isset($_POST['submit'])) {
                            $searchword = $_POST['search'];

                            $counter = 1;
                            $sql = "SELECT F.feedbackID, F.feedback, F.date, U.userName FROM feedback F, user U WHERE F.userID=U.userID AND F.feedback LIKE '%$searchword%' OR F.date LIKE '%$searchword%' OR U.userName LIKE '%$searchword%' ORDER BY U.userName ASC";
                            $result = mysqli_query($conn,$sql);

                            while ($row = mysqli_fetch_assoc($result)){     
                    ?>
                    
                    <tr>
                        <td><?php echo $counter; ?></td>
                        <td><?php echo $row['userName']; ?></td>
                        <td><?php echo $row['feedback']; ?></td>
                        <td><?php echo $row['date']; ?></td> 
                        <input type="hidden" name="feedbackID" value="<?php echo $row['feedbackID']; ?>">
                        <td> 
                           
                            <?php
                                echo '<a href="'.$_SERVER['PHP_SELF'].'?feedbackID='.$row['feedbackID'].'"></i><input type="button" class="btn btn-danger" name="submit" value="Delete" /></a>';
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
                        $sql2 = "SELECT * FROM user u, feedback f where u.userID=f.userID ORDER BY u.userName ASC ";
                        $result1 = mysqli_query($conn,$sql2);       
                        while ($row = mysqli_fetch_assoc($result1)){        
                    ?>
                    
                    <tr>
                        <td><?php echo $counter; ?></td>
                        <td><?php echo $row['userName']; ?></td>
                        <td><?php echo $row['feedback']; ?></td>
                        <td><?php echo $row['date']; ?></td>   
                        <input type="hidden" name="feedbackID" value="<?php echo $row['feedbackID']; ?>">
                        <td> 
                            
                            <?php
                                echo '<a href="'.$_SERVER['PHP_SELF'].'?feedbackID='.$row['feedbackID'].'"><input type="button" class="btn btn-danger" name="submit" value="Delete" /></a>';
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
                            $sql = "SELECT F.feedbackID, F.feedback, F.date, U.userName FROM feedback F, user U WHERE F.userID=U.userID AND F.feedback LIKE '%$searchword%' OR F.date LIKE '%$searchword%' OR U.userName LIKE '%$searchword%'  ORDER BY U.userName ASC";
                            $result = mysqli_query($conn,$sql);
                              
                            if (empty($row = mysqli_fetch_assoc($result)))
                                echo "<tr><th style='text-align: center'; colspan='5'>No record found.</th></tr>"; 
                          }
                    ?>
                    
                     <?php
                        $sql3 = "SELECT * FROM user u, feedback f where u.userID=f.userID ORDER BY u.userName ASC ";
                        $result2 = mysqli_query($conn,$sql3);  
                    
                        if (empty($row = mysqli_fetch_assoc($result2)))
                                echo "<tr><th style='text-align: center'; colspan='5'>No record.</th></tr>"; 
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
