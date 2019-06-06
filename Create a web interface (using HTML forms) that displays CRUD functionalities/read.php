<?php
// Check existence of id parameter before processing further
if(isset($_GET["SerialNumber"]) && !empty(trim($_GET["SerialNumber"]))){
    // Include config file
    require_once "config.php";
    
    // Prepare a select statement
    $sql = "SELECT * FROM project WHERE SerialNumber = ?";
    
    if($stmt = mysqli_prepare($link, $sql)){
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "i", $param_SerialNumber);
        
        // Set parameters
        $param_SerialNumber = trim($_GET["SerialNumber"]);
        
        // Attempt to execute the prepared statement
        if(mysqli_stmt_execute($stmt)){
            $result = mysqli_stmt_get_result($stmt);
    
            if(mysqli_num_rows($result) == 1){
                /* Fetch result row as an associative array. Since the result set contains only one row, we don't need to use while loop */
                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                
                // Retrieve individual field value
                
            $Country = $row["Country"];
            $ImplementingOffice = $row["ImplementingOffice"];
            $ProjectTitle = $rowp["sProjectTitle"];
            $GrantamountUSD= $row["GrantamountUSD"];
            $DatesfromGCF = $row["DatesfromGCF"];
            $StartDate = $row["StartDate"];
            $Durationmonths = $row["Durationmonths"];
            $EndDate = $row["EndDate"];
            $ReadinessorNAP = $row["ReadinessorNAP"];
            $Typeofreadiness = $row["Typeofreadiness"];
            $Firstdisbursementamount = $row["Firstdisbursementamount"];
            $Status = $row["Status"];
            } else{
                // URL doesn't contain valid id parameter. Redirect to error page
                header("location: error.php");
                exit();
            }
            
        } else{
            echo "Oops! Something went wrong. Please try again later.";
        }
    }
     
    // Close statement
    mysqli_stmt_close($stmt);
    
    // Close connection
    mysqli_close($link);
} else{
    // URL doesn't contain id parameter. Redirect to error page
    header("location: error.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Record</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        .wrapper{
            width: 500px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h1>View Record</h1>
                    </div>
                    <div class="form-group">
                        <label>Project Ref</label>
                        <p class="form-control-static"><?php echo $row["ProjectRef"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Country</label>
                        <p class="form-control-static"><?php echo $row["Country"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Implementing Office</label>
                        <p class="form-control-static"><?php echo $row["ImplementingOffice"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Project Title</label>
                        <p class="form-control-static"><?php echo $row["ProjectTitle"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Grant amount USD</label>
                        <p class="form-control-static"><?php echo $row["GrantamountUSD"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Dates from GCF</label>
                        <p class="form-control-static"><?php echo $row["DatesfromGCF"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Start Date</label>
                        <p class="form-control-static"><?php echo $row["StartDate"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Duration months</label>
                        <p class="form-control-static"><?php echo $row["Durationmonths"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>End Date</label>
                        <p class="form-control-static"><?php echo $row["EndDate"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Readiness or NAP</label>
                        <p class="form-control-static"><?php echo $row["ReadinessorNAP"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Type of readiness</label>
                        <p class="form-control-static"><?php echo $row["Typeofreadiness"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>First disbursement amount</label>
                        <p class="form-control-static"><?php echo $row["Firstdisbursementamount"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <p class="form-control-static"><?php echo $row["Status"]; ?></p>
                    </div>
                    <p><a href="index.php" class="btn btn-primary">Back</a></p>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>

