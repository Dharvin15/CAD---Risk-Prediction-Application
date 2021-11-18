<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Add Doctor</title>
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
                <div class="card-header bg-primary text-white"><b>Add New Doctor</b></div>

            <div class="card-body">
                <form method="POST" action="process.php">
                    
                    <input type="hidden" name="ID" required>
                            
                    <div class="form-group row">
                        <label for="username" class="col-md-4 col-form-label text-md-right">Name</label>
                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control" name="name" value="" required autocomplete="name" autofocus>
                        </div>
                    </div>
                                
                    <div class="form-group row">
                        <label for="email" class="col-md-4 col-form-label text-md-right">E-mail</label>
                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control" name="email" value="" required autocomplete="email" autofocus>
                        </div>
                    </div>
                                
                    <div class="form-group row">
                        <label for="address" class="col-md-4 col-form-label text-md-right">Address</label>
                        <div class="col-md-6">
                            <input id="address" type="text" class="form-control" name="address" value="" required autocomplete="address" autofocus>
                        </div>
                    </div>
                                
                    <div class="form-group row">
                        <label for="contact" class="col-md-4 col-form-label text-md-right">Contact No</label>
                        <div class="col-md-6">
                            <input id="contact" type="text" maxlength="12" minlength="11" class="form-control" name="contact" value="" required autocomplete="contact" autofocus placeholder="017-5552288">
                        </div>
                    </div>
                                
                    <div class="form-group row">
                        <label for="age" class="col-md-4 col-form-label text-md-right">Age</label>
                        <div class="col-md-6">
                            <input id="age" type="number" min="1" class="form-control" name="age" value="" required autocomplete="age" autofocus>
                        </div>
                    </div>
                                
                    <div class="form-group row">
                        <label for="gender" class="col-md-4 col-form-label text-md-right">Gender</label>
                        <div class="col-md-6">
                            <select name="gender" class="form-control" value="" autocomplete="gender" required autofocus>
                                    <option selected disabled>Select gender</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                            </select>
                        </div>
                    </div>
                                
                    <div class="form-group row">
                        <label for="specialist" class="col-md-4 col-form-label text-md-right">Specialist</label>
                        <div class="col-md-6">
                            <input id="specialist" type="text" class="form-control" name="specialist" value="" required autocomplete="specialist" autofocus>
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-8 offset-md-4">
                            <button type="submit" name="submit" value="addDoctor" class="btn btn-primary">Add</button>    
                            <button type="reset" class="btn btn-warning text-white">Reset</button>
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
