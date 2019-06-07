
<?php

if(isset($_POST['submit'])){
    
    $project_ref=$_POST['project_ref'];
    $country=$_POST['country'];
    $implementing_office=$_POST['implementing_office'];
    $project_title=$_POST['project_title'];
    $grant_amount=$_POST['grant_amount'];
    $dates_from_gcf=$_POST['dates_from_gcf'];
    $start_date=$_POST['start_date'];
    $duration=$_POST['duration'];
    $end_date=$_POST['end_date'];
    $readiness_of_NAP=$_POST['readiness_of_NAP'];
    $type_of_readiness=$_POST['type_of_readiness'];
    $first_disbursment_amount=$_POST['first_disbursment_amount'];
    $status=$_POST['status'];

    $linkAdd=mysqli_connect("localhost","root","","undata");

$queryAdd ="INSERT INTO projects(project_ref,country,implementing_office,project_title,grant_amount,dates_from_gcf,start_date,duration,end_date,readiness_of_NAP,type_of_readiness,first_disbursment_amount,status) VALUES('$project_ref','$country','$implementing_office','$project_title','$grant_amount','$dates_from_gcf','$start_date','$duration','$end_date','$readiness_of_NAP','$type_of_readiness','$first_disbursment_amount','$status')";

$resultAdd=mysqli_query($linkAdd,$queryAdd);

if($resultAdd){
   header('Location: recordsDisplay.php');
}

else{
    echo mysqli_error($linkAdd);
}

}

if(isset($_POST['delete'])){
    
    $project_ref=$_POST['project_ref'];
    $country=$_POST['country'];
    $implementing_office=$_POST['implementing_office'];
    $project_title=$_POST['project_title'];
    $grant_amount=$_POST['grant_amount'];
    $dates_from_gcf=$_POST['dates_from_gcf'];
    $start_date=$_POST['start_date'];
    $duration=$_POST['duration'];
    $end_date=$_POST['end_date'];
    $readiness_of_NAP=$_POST['readiness_of_NAP'];
    $type_of_readiness=$_POST['type_of_readiness'];
    $first_disbursment_amount=$_POST['first_disbursment_amount'];
    $status=$_POST['status'];

    
    
    $linkDelete=mysqli_connect("localhost","root","","undata");
    
    $queryDelete="delete from projects WHERE project_ref='$project_ref'";
    
    $resultDelete=mysqli_query($linkDelete,$queryDelete);
    
    if($resultDelete){
      header('Location: recordsDisplay.php');
    }
    
    else{
        echo mysqli_error($linkDelete);
    }
}


if(isset($_POST['modify'])){

     $project_ref=$_POST['project_ref'];
    $country=$_POST['country'];
    $implementing_office=$_POST['implementing_office'];
    $project_title=$_POST['project_title'];
    $grant_amount=$_POST['grant_amount'];
    $dates_from_gcf=$_POST['dates_from_gcf'];
    $start_date=$_POST['start_date'];
    $duration=$_POST['duration'];
    $end_date=$_POST['end_date'];
    $readiness_of_NAP=$_POST['readiness_of_NAP'];
    $type_of_readiness=$_POST['type_of_readiness'];
    $first_disbursment_amount=$_POST['first_disbursment_amount'];
    $status=$_POST['status'];
    
    $linkUpdate=mysqli_connect("localhost","root","","undata");
    
    $queryUpdate="UPDATE projects SET project_ref='$project_ref',country='$country',implementing_office='$implementing_office',project_title='$project_title',grant_amount='$grant_amount',dates_from_gcf='$dates_from_gcf',start_date='$start_date',duration='$duration',end_date='$end_date',readiness_of_NAP='$readiness_of_NAP',type_of_readiness='$type_of_readiness',first_disbursment_amount='$first_disbursment_amount',status='$status' WHERE project_ref ='$project_ref' ";
     
     $resultUpdate=mysqli_query($linkUpdate,$queryUpdate);
     
if($resultUpdate){
   header('Location: recordsDisplay.php');
}
    
    else{
        echo mysqli_error($linkUpdate);
    }
}

?>

