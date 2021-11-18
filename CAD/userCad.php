<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CAD Prediction</title>
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
                <div class="card-header bg-primary text-white"><b>Coronary Artery Disease Prediction</b></div>

                <div class="card-body">
                            
                    <div class="alert alert-primary text-center">
                        <i class='fas fa-info-circle'></i>
                        <b>Note:</b><br>
                        The prediction will help you to estimate the 10-year coronary artery disease based on selected criterias. You can discover more about your health here by ansering few questions below.  
                    </div> <br>
                            
                    <form method="POST" action="process.php">    
                        <div class="form-group row">
                            <label for="gender" class="col-md-4 col-form-label text-md-right">Smoking Status</label>
                            <div class="col-md-6">
                                <select name="smoking" class="form-control" autocomplete="smoking" required autofocus>
                                    <option selected disabled>Select smoking status</option>
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </select>
                            </div>
                        </div>
                            
                        <div class="form-group row">
                            <label for="totCholesterol" class="col-md-4 col-form-label text-md-right">Total Cholesterol (mg/dL)</label>
                            <div class="col-md-6">
                                <input id="totCholesterol" type="number" class="form-control" name="totCholesterol" min="1" required autocomplete="totCholesterol" autofocus>
                            </div>
                        </div>
                                
                        <div class="form-group row">
                            <label for="hdlCholesterol" class="col-md-4 col-form-label text-md-right">HDL Cholesterol (mg/dL)</label>
                            <div class="col-md-6">
                                <input id="hdlCholesterol" type="number" min="1" class="form-control" name="hdlCholesterol" required autocomplete="hdlCholesterol" autofocus>
                            </div>
                        </div>
                                
                        <div class="form-group row">
                            <label for="bloodPressure" class="col-md-4 col-form-label text-md-right">Systolic Blood Pressure (mmHg)</label>
                            <div class="col-md-6">
                                <input id="bloodPressure" type="number" min="1" class="form-control" name="bloodPressure" required autocomplete="bloodPressure" autofocus>
                            </div>
                        </div>
                                
                        <div class="form-group row">
                            <label for="bloodPressure" class="col-md-4 col-form-label text-md-right"></label>
                            <div class="col-md-6">
                                <select name="bpStatus" class="form-control" autocomplete="bpStatus" required autofocus>
                                    <option selected disabled>Select condition</option>
                                    <option value="Treated">Treated</option>
                                    <option value="Untreated">Untreated</option>
                                </select>
                            </div>
                        </div>
                                
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" name="submit" value="checkRisk" class="btn btn-primary">Check Risk</button>     
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
