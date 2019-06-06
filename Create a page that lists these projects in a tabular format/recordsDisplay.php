<html>
<head>
    <title>
        RECORD NAVIGATION
    </title>
    </head>
<body>
    
<?php
$link=mysqli_connect("localhost","root","","undata");

$page=$_GET["page"];

if($page=="" || $page=="1"){
    $page1="0";
    
}

else{
    $page1=($page*5)-5;
}

$query="SELECT * FROM projects limit $page1,5";

$result=mysqli_query($link,$query);

if($result){
     echo "<h3>MODIFY OR DELETE PROJECT</h3> ";
    echo "<table class='editProjects' border='1'>";
        echo "<tr><th>Project Ref</th><th>"
    . " Country</th><th>Implementing Office</th><th>Project-Title</th><th>Grant amount (USD)</th><th>Dates from GCF</th>"
            . "<th>Start Date</th><th>Duration (months)</th><th>End Date</th><th>Readiness or NAP</th>"
                . "<th>Type of readiness</th><th>First disbursement amount</th><th>Status</th><th></th><th></th><th></th></tr>";
  
    while($row=mysqli_fetch_array($result)){
    echo "<form action='modifyProjectRecordDisplay.php' method='POST'>";
    echo "<tr><td>".$row['project_ref']."</td>";
        echo "<input type='hidden' name='project_ref' value='".$row['project_ref']."'>";
        echo "<td><input type='text' name='country' value='".$row['country']."'></td>";
        echo "<td><input type='text' name='implementing_office' value='".$row['implementing_office']."'></td>";
        echo "<td><input type='text' name='project_title' value='".$row['project_title']."'></td>";
        echo "<td><input type='text' name='grant_amount' value='".$row['grant_amount']."'></td>";
        echo "<td><input type='text' name='dates_from_gcf' value='".$row['dates_from_gcf']."'></td>";
        echo "<td><input type='text' name='start_date' value='".$row['start_date']."'></td>";
        echo "<td><input type='text' name='duration' value='".$row['duration']."'></td>";
        echo "<td><input type='text' name='end_date' value='".$row['end_date']."'></td>";
        echo "<td><input type='text' name='readiness_of_NAP' value='".$row['readiness_of_NAP']."'></td>";
        echo "<td><input type='text' name='type_of_readiness' value='".$row['type_of_readiness']."'></td>";
        echo "<td><input type='text' name='first_disbursment_amount' value='".$row['first_disbursment_amount']."'></td>";
        echo "<td><input type='text' name='status' value='".$row['status']."'></td>";
       
        echo "<td></td><td><button type='submit' name='modify'>modify</button></td>";
        echo "<td></td><td><button type='submit' name='delete'>delete</button></td></tr>";
         echo "</form>";
         //counting on page
     
    
}
 $query="SELECT * FROM projects";
    $result=mysqli_query($link,$query);
    $cou=mysqli_num_rows($result);
    $a=$cou/5;
    $a= ceil($a);
    
    for($b=1;$b<=$a;$b++){
        ?><a href="recordsDisplay.php?page=<?php echo $b; ?>" style="text-decoration:none"><?php echo $b." "; ?></a><?php
    }

    }
   
    echo "</table>";
    

    
   ?>
</body>
</html>



