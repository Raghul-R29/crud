<?php
include 'db.php';

$mobile=$_GET['mobile'];
$query = "SELECT * FROM patient where mobile=$mobile";
$result = pg_query($conn, $query);
while ($row = pg_fetch_assoc($result)) {
  
    $salutation=  $row['salutation'];
    $name = $row['name'];
    $gender = $row['gender'];
    $dob = $row['dob'];
    $email = $row['email'];
    $mobile=$row['mobile'];
  
    $address = $row['address'];
    $state = $row['state'];
    $district = $row['district'];
    $mobile_hidden = $row['mobile'];
    
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Appointment Form</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            $("#selectstate").on('change', function() {
                var stateid = $(this).val();
                $.ajax({
                    method: "POST",
                    url: "response.php",
                    data: { id: stateid },
                    dataType: "html",
                    success: function(data) {
                        $("#district").html(data);
                    }
                });
            });
        });


    </script>
</head>
<body>
    <h1>Patient Appointment Form</h1>
    <form method="post" action="patientupdate.php" id="form">
        <div class="modal-body row">
            <div class="col-md-6"> 
                <label for="salutation">Salutation</label>
                <select class="form-control" id="salutation" name="salutation">
                    <option value="">Select Salutation</option>
                    <option value="Mr" <?php echo ($salutation == 'Mr') ? 'selected' : ''; ?>>Mr</option>
                    <option value="Mrs" <?php echo ($salutation == 'Mrs') ? 'selected' : ''; ?>>Mrs</option>
                    <option value="Dr" <?php echo ($salutation == 'Dr') ? 'selected' : ''; ?>>Dr</option>
                    <option value="Prof" <?php echo ($salutation == 'Prof') ? 'selected' : ''; ?>>Prof</option>
                </select>
            </div>
            <div class="col-md-6">
                <label for="name">Patient Name</label>
                <input type="text" class="form-control" id="name" name="name" value="<?php echo $name; ?>" placeholder="Enter your name"> 
            </div>
        </div>
        
        <div class="modal-body row">
            <label for="gender">Gender</label>
            <div class="col-md-12">
                <input type="radio" id="gender_male" name="gender" value="male" <?php echo ($gender == 'male') ? 'checked' : ''; ?>> Male
                <input type="radio" id="gender_female" name="gender" value="female" <?php echo ($gender == 'female') ? 'checked' : ''; ?>> Female
                <input type="radio" id="gender_transgender" name="gender" value="transgender" <?php echo ($gender == 'transgender') ? 'checked' : ''; ?>> Transgender
            </div>
        </div>

        <div class="form-group">
            <label for="dob">Date of Birth</label>
            <input type="date" id="dob" class="form-control" name="dob" value="<?php echo $dob; ?>">
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="<?php echo $email; ?>" placeholder="Enter your email">
        </div>

        <div class="form-group">
            <label for="mobile">Mobile</label>
            <input type="tel" class="form-control" id="mobile" maxlength="10" value="<?php echo $mobile_hidden; ?>" name="mobile" placeholder="Enter your mobile number">
        </div>

        <input type="hidden" class="form-control" id="exampleInputEmail1" name="mobile_hidden" value=<?php echo $mobile_hidden;?> placeholder="Number">


        <div class="form-group">
            <label for="address">Address</label>
            <input type="text" class="form-control" id="address" name="address" value="<?php echo $address; ?>" placeholder="Address">
        </div>

        <div class="form-group item-required" id="selectstateerror">
            <label for="selectstate">State</label>
            <select id="selectstate" name="state" class="form-control input-value">
                <option value="">Select State</option>
                <option value="1" <?php echo ($state == 1) ? 'selected' : ''; ?>>Tamil Nadu</option>
                <option value="2" <?php echo ($state == 2) ? 'selected' : ''; ?>>Kerala</option>
            </select>
        </div>

        <div class="form-group">
            <label for="district">District</label>
            <select class="form-control input-value" id="district" name="district">
                <option value="">Select District</option>
                <option value="1" <?php echo $district == '1' ? 'selected' : ''; ?>>chennai</option>
                <option value="2" <?php echo $district == '2' ? 'selected' : ''; ?>>kanchipuram</option>
                <option value="3" <?php echo $district == '3' ? 'selected' : ''; ?>>Thiruvanmalai</option> 
                <option value="4" <?php echo $district == '4' ? 'selected' : ''; ?>>alapula</option> 
                <option value="5" <?php echo $district == '5' ? 'selected' : ''; ?>>ernakulam</option> 
                <option value="6" <?php echo $district == '6' ? 'selected' : ''; ?>>kochi</option> 

            </select>
        </div>

        <button type="submit" id="submitbutton" class="btn btn-default">Submit</button>
    </form>
</body>
</html>
