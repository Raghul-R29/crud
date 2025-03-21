<?php
include('db.php');

echo $mobile=$_GET['mobile'];
$query = "DELETE FROM patient where mobile= $mobile";
$result = pg_query($conn, $query);
if ($result){
    echo 'sucsess';
    header('location:patientdetails.php');
}
else{
    echo 'failure';
}
