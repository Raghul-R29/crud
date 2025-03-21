<?php
include 'menu.php';
include 'db.php';

if (isset($_POST['salutation']) && isset($_POST['name']) && isset($_POST['gender']) && isset($_POST['dob']) && isset($_POST['email']) && isset($_POST['mobile']) && isset($_POST['address']) && isset($_POST['state']) && isset($_POST['district']) && isset($_POST['mobile_hidden'])) {
    
    $salutation = $_POST['salutation'];
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $address = $_POST['address'];
    $state = $_POST['state'];
    $district = $_POST['district'];
    $mobile_hidden = $_POST['mobile_hidden'];

    $query = "UPDATE patient SET salutation = $1, name = $2, gender = $3, dob = $4, email = $5, mobile = $6, address = $7, state = $8, district = $9 WHERE mobile = $10";
    $result = pg_query_params($conn, $query, array($salutation, $name, $gender, $dob, $email, $mobile, $address, $state, $district, $mobile_hidden));

    if ($result) {
        echo "Success";
        header('location:patientdetails.php'); 
    } else {
        echo "Error: " . pg_last_error($conn);
    }
}
 else {
    echo "Input values not received";
}
?>
