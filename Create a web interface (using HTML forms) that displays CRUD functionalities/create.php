<?php
$message = ' ';
$error = ' ';
if(isset($_POST['submit']))
{
if(empty($_post["ProjectRef"]))
{
$error = "<label class= 'text-danger'> enter ProjectRef</label>";
}
else if(empty($_post["Country"]))
{
$error = "<label class= 'text-danger'> enter Country</label>";
}
else if(empty($_post["ImplementingOffice"]))
{
$error = "<label class= 'text-danger'> enter ImplementingOffice</label>";
}
else if(empty($_post["ProjectTitle"]))
{
$error = "<label class= 'text-danger'> enter ProjectTitle</label>";
}
else if(empty($_post["GrantamountUSD"]))
{
$error = "<label class= 'text-danger'> enter GrantamountUSD</label>";
}
else if(empty($_post["DatesfromGCF"]))
{
$error = "<label class= 'text-danger'> enter DatesfromGCF</label>";
}
else if(empty($_post["StartDate"]))
{
$error = "<label class= 'text-danger'> enter StartDate</label>";
}
else if(empty($_post["Durationmonths"]))
{
$error = "<label class= 'text-danger'> enter Durationmonths</label>";
}
else if(empty($_post["EndDate"]))
{
$error = "<label class= 'text-danger'> enter EndDate</label>";
}
else if(empty($_post["ReadinessorNAP"]))
{
$error = "<label class= 'text-danger'> enter ReadinessorNAP</label>";
}
else if(empty($_post["Typeofreadiness"]))
{
$error = "<label class= 'text-danger'> enter Typeofreadiness</label>";
}
else if(empty($_post["Firstdisbursementamount"]))
{
$error = "<label class= 'text-danger'> enter Firstdisbursementamount</label>";
}
else if(empty($_post["Status"]))
{
$error = "<label class= 'text-danger'> enter Status</label>";
}
else 
{
if(file_exists('projects.json'))
{
$current_data = file_get_contents('projects.json');
$array_data = json_decode(current_data, true);
$extra= array(
'projectref'=> $_POST['projectref'],
    'country'=> $_POST['country'],
    'implementingoffice'=> $_POST['implementingoffice'],
    'project_title'=> $_POST['projecttitle'],
    'grant_amount'=> $_POST['grantamount'],
    'datesfromgcf'=> $_POST['datesfrom_gcf'],
    'startdate'=> $_POST['startdate'],
    'duration'=> $_POST['duration'],
    'enddate'=> $_POST['enddate'],
    'readinessofNAP'=> $_POST['readinessofNAP'],
    'typeofreadiness'=> $_POST['typeofreadiness'],
    'firstdisbursmentamount'=> $_POST['firstdisbursmentamount'],
    'status'=> $_POST['status']
);
$array_data[] = $extra;
$final_data = json_decode($array_data);
if(file_put_contents('projects.json', $final_data))
{
$message = "<label class='text-success'>File appended Successflly</p>";
}
}
else
{
$error = 'json file not exist';
}
}
}
?>

<?php
// Include config file
"config.php";
 
// Define variables and initialize with empty values
$ProjectRef = $Country = $ImplementingOffice = $ProjectTitle = $GrantamountUSD = $DatesfromGCF = $StartDate = $Durationmonths = $EndDate = $ReadinessorNAP = $Typeofreadiness = $Firstdisbursementamount= $Status="";
$ProjectRef_err = $Country_err = $ImplementingOffice_err = $ProjectTitle_err = $GrantamountUSD_err = $DatesfromGCF_err = $StartDate_err = $Durationmonths_err = $EndDate_err = $ReadinessorNAP_err = $Typeofreadiness_err = $Firstdisbursementamount_err = $Status_err= "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    
    // Validate project ref
    $input_ProjectRef = trim($_POST["ProjectRef"]);
    if(empty($input_ProjectRef)){
        $ProjectRef_err = "Please enter a Project Ref.";
    } elseif(!filter_var($input_ProjectRef, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $ProjectRef_err = "Please enter a valid Project Ref.";
    } else{
        $ProjectRef = $input_ProjectRef;
    }
    
    // Validate country
    $input_Country = trim($_POST["Country"]);
    if(empty($input_Country)){
        $address_err = "Please enter an Country.";     
    } else{
        $Country = $input_Country;
    }
    
    // Validate ImplementingOffice
    $input_ImplementingOffice = trim($_POST["ImplementingOffice"]);
    if(empty($input_ImplementingOffice)){
        $salary_err = "Please enter the Implementing Office.";     
    } elseif(!ctype_digit($input_ImplementingOffice)){
        $ImplementingOffice_err = "Please enter a Implementing Office.";
    } else{
        $ImplementingOffice = $input_ImplementingOffice;
    }
    // validate Project-Title
    $input_ProjectTitle = trim($_POST["ProjectTitle"]);
    if(empty($input_ProjectTitle)){
        $salary_err = "Please enter the Project-Title. ";     
    } elseif(!ctype_digit($input_ProjectTitle)){
        $ProjectTitle_err = "Please enter a ProjectTitle.";
    } else{
        $ProjectTitle = $input_ProjectTitle;
    }
     // validate Grantamount(USD)
    $input_GrantamountUSD = trim($_POST["GrantamountUSD"]);
    if(empty($input_GrantamountUSD)){
        $salary_err = "Please enter the GrantamountUSD.";     
    } elseif(!ctype_digit($input_GrantamountUSD)){
        $GrantamountUSD_err = "Please enter a Grantamount(USD).";
    } else{
        $GrantamountUSD = $input_GrantamountUSD;
    }
    // validate DatesfromGCF
    $input_DatesfromGCF = trim($_POST["DatesfromGCF"]);
    if(empty($input_DatesfromGCF)){
        $salary_err = "Please enter the DatesfromGCF.";     
    } elseif(!ctype_digit($input_DatesfromGCF)){
        $DatesfromGCF_err = "Please enter a DatesfromGCF.";
    } else{
        $DatesfromGCFUSD = $input_DatesfromGCF;
    }
    // validate StartDate
    $input_StartDate = trim($_POST["StartDate"]);
    if(empty($input_StartDate)){
        $StartDate_err = "Please enter the StartDate.";     
    } elseif(!ctype_digit($input_StartDate)){
        $StartDate_err = "Please enter a StartDate.";
    } else{
        $StartDate = $input_StartDate;
    }
    //validate Durationmonths 
    $input_Durationmonths = trim($_POST["Durationmonths"]);
    if(empty($input_Durationmonths)){
        $Durationmonths_err = "Please enter the Durationmonths.";     
    } elseif(!ctype_digit($input_Durationmonths)){
        $Durationmonths_err = "Please enter a Durationmonths.";
    } else{
        $Durationmonths = $input_Durationmonths;
    }
    //Validate EndDate
    $input_EndDate = trim($_POST["EndDate"]);
    if(empty($input_EndDate)){
        $EndDate_err = "Please enter the EndDate.";     
    } elseif(!ctype_digit($input_EndDate)){
        $EndDate_err = "Please enter a EndDate.";
    } else{
        $EndDate = $input_EndDate;
    }
    //validate ReadinessorNAP
    $input_ReadinessorNAP = trim($_POST["ReadinessorNAP"]);
    if(empty($input_EndDate)){
        $ReadinessorNAP_err = "Please enter the ReadinessorNAP.";     
    } elseif(!ctype_digit($input_ReadinessorNAP)){
        $ReadinessorNAP_err = "Please enter a ReadinessorNAP.";
    } else{
        $ReadinessorNAP = $input_ReadinessorNAP;
    }
    //validate Typeofreadiness
     $input_Typeofreadiness = trim($_POST["Typeofreadiness"]);
    if(empty($input_Typeofreadiness)){
        $Typeofreadiness_err = "Please enter the Typeofreadiness.";     
    } elseif(!ctype_digit($input_Typeofreadiness)){
        $Typeofreadiness_err = "Please enter a Typeofreadiness.";
    } else{
        $Typeofreadiness = $input_Typeofreadiness;
    }
    // validate Firstdisbursementamount
     $input_Firstdisbursementamount = trim($_POST["Firstdisbursementamount"]);
    if(empty($input_Firstdisbursementamount)){
        $Firstdisbursementamount_err = "Please enter the Firstdisbursementamount.";     
    } elseif(!ctype_digit($input_Firstdisbursementamount)){
        $Firstdisbursementamount_err = "Please enter a Firstdisbursementamount.";
    } else{
        $Firstdisbursementamount = $input_Firstdisbursementamount;
    }
    // validate Status
     $input_Status = trim($_POST["Status"]);
    if(empty($input_Status)){
        $Status_err = "Please enter the Status.";     
    } elseif(!ctype_digit($input_Status)){
        $Status_err = "Please enter a Status.";
    } else{
        $Status = $input_Status;
    }
    // Check input errors before inserting in database
    if(empty($ProjectRef_err) && empty($Country_err) && empty($ImplementingOffice_err) && empty($ProjectTitle_err) && empty($GrantamountUSD_err) && empty($DatesfromGCF_err)&& empty($StartDate_err)&& empty($Durationmonths_err)
            && empty($EndDate_err)&& empty($ReadinessorNAP_err)&& empty($Typeofreadiness_err)&& empty($Firstdisbursementamount_err)&& empty($Status)){
        // Prepare an insert statement
        $sql = "INSERT INTO projects (ProjectRef, Country, ImplementingOffice, ProjectTitle, GrantamountUSD, DatesfromGCF, StartDate, Durationmonths, EndDate, ReadinessorNAP, Typeofreadiness, Firstdisbursementamount, Status) VALUES (?, ?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sss", $param_ProjectRef, $param_Country, $param_ImplementingOffice, $param_ProjectTitle, $param_GrantamountUSD, $param_DatesfromGCF, $param_StartDate, $param_Durationmonths, 
                    $param_EndDate, $param_ReadinessorNAP, $param_Typeofreadiness, $param_Firstdisbursementamount, $param_Status);
            
            // Set parameters
            $param_ProjectRef = $ProjectRef;
            $param_Country = $Country;
            $param_ImplementingOffice = $ImplementingOffice;
            $param_ProjectTitle = $sProjectTitle;
            $param_GrantamountUSD= $GrantamountUSD;
            $param_DatesfromGCF = $DatesfromGCF;
            $param_StartDate = $StartDate;
            $param_Durationmonths = $Durationmonths;
            $param_EndDate = $EndDate;
            $param_ReadinessorNAP = $ReadinessorNAP;
            $param_Typeofreadiness = $Typeofreadiness;
            $param_Firstdisbursementamount = $Firstdisbursementamount;
            $param_Status = $Status;
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records created successfully. Redirect to landing page
                header("location: index.php");
                exit();
            } else{
                echo "Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
 
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Record</title>
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
                        <h2>Create Record</h2>
                    </div>
                    <?php
                    if(isset($error))
                    {
                        echo $error;
                    }
                    ?>
                    <p>Please fill this form and submit to add a project record to the database.</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group <?php echo (!empty($name_err)) ? 'has-error' : ''; ?>">
                            <label>Project Ref</label>
                            <input type="text" name="ProjectRef" class="form-control" value="<?php echo $ProjectRef; ?>">
                            <span class="help-block"><?php echo $ProjectRef_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($Country_err)) ? 'has-error' : ''; ?>">
                            <label>Country</label>
                            <textarea name="Country" class="form-control"><?php echo $Country; ?></textarea>
                            <span class="help-block"><?php echo $Country_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($ImplementingOffice_err)) ? 'has-error' : ''; ?>">
                            <label>Implementing Office</label>
                            <input type="text" name="ImplementingOffice" class="form-control" value="<?php echo $ImplementingOffice; ?>">
                            <span class="help-block"><?php echo $ImplementingOffice_err;?></span>
                        </div>
                         <div class="form-group <?php echo (!empty($ProjectTitle_err)) ? 'has-error' : ''; ?>">
                            <label>Project Title</label>
                            <input type="text" name="ProjectTitle" class="form-control" value="<?php echo $ProjectTitle; ?>">
                            <span class="help-block"><?php echo $ProjectTitle_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($GrantamountUSD_err)) ? 'has-error' : ''; ?>">
                            <label>Grant amount USD</label>
                            <input type="text" name="GrantamountUSD" class="form-control" value="<?php echo $GrantamountUSD; ?>">
                            <span class="help-block"><?php echo $GrantamountUSD_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($DatesfromGCF_err)) ? 'has-error' : ''; ?>">
                            <label>Dates from GCF</label>
                            <input type="text" name="DatesfromGCF" class="form-control" value="<?php echo $DatesfromGCF; ?>">
                            <span class="help-block"><?php echo $DatesfromGCF_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($StartDate_err)) ? 'has-error' : ''; ?>">
                            <label>Start Date</label>
                            <input type="text" name="StartDate" class="form-control" value="<?php echo $StartDate; ?>">
                            <span class="help-block"><?php echo $StartDate_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($Durationmonths_err)) ? 'has-error' : ''; ?>">
                            <label>Duration months</label>
                            <input type="text" name="Durationmonths" class="form-control" value="<?php echo $Durationmonths; ?>">
                            <span class="help-block"><?php echo $Durationmonths_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($EndDate_err)) ? 'has-error' : ''; ?>">
                            <label>End Date</label>
                            <input type="text" name="EndDate" class="form-control" value="<?php echo $EndDate; ?>">
                            <span class="help-block"><?php echo $EndDate_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($ReadinessorNAP_err)) ? 'has-error' : ''; ?>">
                            <label>Readiness or NAP</label>
                            <input type="text" name="ReadinessorNAP" class="form-control" value="<?php echo $ReadinessorNAP; ?>">
                            <span class="help-block"><?php echo $ReadinessorNAP_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($Typeofreadiness_err)) ? 'has-error' : ''; ?>">
                            <label>Type of readiness</label>
                            <input type="text" name="Typeofreadiness" class="form-control" value="<?php echo $Typeofreadiness; ?>">
                            <span class="help-block"><?php echo $Typeofreadiness_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($Firstdisbursementamount_err)) ? 'has-error' : ''; ?>">
                            <label>First disbursement amount</label>
                            <input type="text" name="Firstdisbursementamount" class="form-control" value="<?php echo $Firstdisbursementamount; ?>">
                            <span class="help-block"><?php echo $Firstdisbursementamount_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($Status_err)) ? 'has-error' : ''; ?>">
                            <label>Status</label>
                            <input type="text" name="Status" class="form-control" value="<?php echo $Status; ?>">
                            <span class="help-block"><?php echo $Status_err;?></span>
                        </div>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="index.php" class="btn btn-default">Cancel</a>
                   <?php
                    if(isset($message))
                    {
                        echo $message;
                    }
                    ?>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>
