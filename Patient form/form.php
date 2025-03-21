<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="http://localhost/raghul/jquery.min.js"></script>
    <link rel="stylesheet" href="style.css">
    <script>
        $(document).ready(function() {
            $("#selectstate").on('change', function() {
                var countryid = $(this).val();
                $.ajax({
                    method: "POST",
                    url: "response.php",
                    data: { id: countryid },
                    datatype: "html",
                    success: function(data) {
                        $("#district").html(data);
                    }
                });
            });

            $("#submitbutton").click(function(event) {
                event.preventDefault();
                var salutation = $("#salutation").val();
                var name = $("#name").val();
                var gender = $("input[name='gender']:checked").val();
                var dob = $("#dob").val();
                var email = $("#email").val();
                var mobile = $("#mobile").val();
                var address = $("#address").val();
                var state = $("#selectstate").val();
                var district = $("#district").val();

                if (salutation && name && gender && dob && email && mobile && address && state && district) {
                    $.ajax({
                        url: 'processform.php',
                        type: 'post',
                        data: {
                            salutation: salutation,
                            name: name,
                            gender: gender,
                            dob: dob,
                            email: email,
                            mobile: mobile,
                            address: address,
                            state: state,
                            district: district
                        },
                        success: function(data) {
                            alert("Form submitted successfully!");
                        },
                        error: function(error) {
                            console.log(error);
                        }
                    });
                } 
                else {
                    alert("Please fill out all required fields.");
                }
            });
        });
    </script>
</head>

<body>
   <center> <h1>Patient Appointment Form</h1> </center>
    <form method="post" action="processform.php" id="form">
        <div class="modal-body row">
            <div class="col-md-6">
                <label for="salutation">Salutation</label>
                <select class="form-control" id="salutation" name="salutation" required>
                    <option value="">Select salutation</option>
                    <option value="Mr">Mr</option>
                    <option value="Mrs">Mrs</option>
                    <option value="Dr">Dr</option>
                    <option value="Prof">Prof</option>
                </select>
            </div>
            <div class="col-md-6">
                <label for="name">Patient name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name" required>
            </div>
        </div>

        <div class="modal-body row">
            <label for="GENDER">GENDER</label>
            <div class="col-md-12">
                <input type="radio" id="gender" name="gender" value="male" required> MALE
                <input type="radio" id="gender" name="gender" value="female" required> FEMALE
                <input type="radio" id="gender" name="gender" value="transgender" required> TRANSGENDER
            </div>
        </div>

        <div class="form-group">
            <label for="dob">Date of Birth</label>
            <input type="date" id="dob" class="form-control" name="dob" required>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
        </div>

        <div class="form-group">
            <label for="mobile">Mobile</label>
            <input type="tel" class="form-control" maxlength="10" id="mobile" name="mobile" placeholder="Enter your mobile number" required>
        </div>

        <div class="form-group">
            <label for="address">Address</label>
            <input type="text" class="form-control" id="address" name="address" placeholder="Address" required>
        </div>

        <div class="form-group item-required">
            <label for="selectstate">State</label>
            <select id="selectstate" name="selectstate" class="form-control" required>
                <option value="">Select State</option>
                <option value="1">Tamil Nadu</option>
                <option value="2">Kerala</option>
            </select>
        </div>

        <div class="form-group">
            <label for="district">District</label>
            <select class="form-control" id="district" name="district" required>
                <option value="">Select District</option>
            </select>
        </div>

        <button type="submit" id="submitbutton" class="btn btn-default">Submit</button>
    </form>
</body>
</html>
