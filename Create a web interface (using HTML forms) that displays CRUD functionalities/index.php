<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>
    <style type="text/css">
        .wrapper{
            width: 650px;
            margin: 0 auto;
        }
        .page-header h2{
            margin-top: 0;
        }
        table tr td:last-child a{
            margin-right: 15px;
        }
    </style>
    <script type="text/javascript">
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
        });
    </script>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header clearfix">
                        <h2 class="pull-left">UN Projects</h2>
                        <a href="create.php" class="btn btn-success pull-right">Add a Project</a>
                    </div>
                    <?php
                    // Include config file
                    require_once "MYSQLCONFIGFILE.php";
                    
                    // Attempt select query execution
                    $sql = "SELECT * FROM projects";
                    if($result = mysqli_query($link, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo "<table class='table table-bordered table-striped'>";
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>SerialNumber</th>";
                                        echo "<th>ProjectRef</th>";
                                        echo "<th>Country</th>";
                                        echo "<th>ImplementingOffice</th>";
					echo "<th>ProjectTitle</th>";
					echo "<th> GrantamountUSD </th>";
					echo "<th> DatesfromGCF </th>";
					echo "<th>StartDate</th>";
					echo "<th>Durationmonths</th>";
					echo "<th>EndDate</th>";
					echo "<th>ReadinessorNAP</th>";
					echo "<th>Typeofreadiness</th>";
					echo "<th>Firstdisbursementamount</th>";
					echo "<th>Status</th>";
                                        echo "<th>Action</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                    echo "<td>" . $row['SerialNumber'] . "</td>";
                                        echo "<td>" . $row['ProjectRef'] . "</td>";
                                        echo "<td>" . $row['Country'] . "</td>";
                                        echo "<td>" . $row['ImplementingOffice'] . "</td>";
                                        echo "<td>" . $row['ProjectTitle'] . "</td>";
					echo "<td>" . $row['GrantamountUSD'] . "</td>";
					echo "<td>" . $row['DatesfromGCF'] . "</td>";
					echo "<td>" . $row['StartDate'] . "</td>";
					echo "<td>" . $row['Durationmonths'] . "</td>";
					echo "<td>" . $row['EndDate'] . "</td>";
					echo "<td>" . $row['ReadinessorNAP'] . "</td>";
					echo "<td>" . $row['Typeofreadiness'] . "</td>";
					echo "<td>" . $row['Firstdisbursementamount'] . "</td>";
					echo "<td>" . $row['Status'] . "</td>";									
                                        echo "<td>";
                                            echo "<a href='read.php?id=". $row['id'] ."' title='View Record' data-toggle='tooltip'><span class='glyphicon glyphicon-eye-open'></span></a>";
                                            echo "<a href='update.php?id=". $row['id'] ."' title='Update Record' data-toggle='tooltip'><span class='glyphicon glyphicon-pencil'></span></a>";
                                            echo "<a href='delete.php?id=". $row['id'] ."' title='Delete Record' data-toggle='tooltip'><span class='glyphicon glyphicon-trash'></span></a>";
                                        echo "</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";                            
                            echo "</table>";
                            // Free result set
                            mysqli_free_result($result);
                        } else{
                            echo "<p class='lead'><em>No records were found.</em></p>";
                        }
                    } else{
                        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
                    }
 
                    // Close connection
                    mysqli_close($link);
                    ?>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>