
<?php

include('db.php');

if (isset($_POST['salutation'])&& isset($_POST['name']) && isset($_POST['gender']) && isset($_POST['dob']) && isset($_POST['email']) && isset($_POST['mobile']) && isset($_POST['address']) && isset($_POST['state']) && isset($_POST['district'])) {
    
    $salutation = $_POST['salutation'];
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $address = $_POST['address'];
    $state = $_POST['state'];
    $district = $_POST['district'];
   
    $query = "INSERT INTO patient (salutation,name, gender, dob, email, mobile, address, state, district ) VALUES ($1, $2, $3, $4, $5, $6, $7, $8, $9)";
    

    $result = pg_query_params($conn, $query, array($salutation,$name, $gender, $dob, $email, $mobile, $address, $state, $district));

    if ($result) {
        echo 'Success';
    } else {
        echo "Error: " . pg_last_error($conn);
    }
}
else {
    echo "Input values not received";
}
?>

