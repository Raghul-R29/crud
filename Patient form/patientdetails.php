<?php

include 'db.php';

$query = "SELECT salutation,name, gender, dob, email, mobile, address, state, district FROM patient";
  
$result = pg_query($conn, $query);

if (!$result) {
    echo "Error fetching data.\n";
    exit;
}

if (pg_num_rows($result) > 0) {
    echo "<h1>Patient Details</h1>";
    echo "<table border=1 cellpadding=10 >";
    echo "<tr> <th>Salutation</th><th>Name</th> <th>Gender</th> <th>Dob</th> <th>Email</th><th>Mobile</th><th>Address</th><th>State</th> <th> District</th> <th> Delete</th> <th> Edit </th> </tr>";


    while ($row = pg_fetch_assoc($result)) {
        echo "<tr>";
      
        echo "<td>" . $row['salutation']. "</td>";
        echo "<td>" . $row['name']. "</td>";
        echo "<td>" . $row['gender']. "</td>";
        echo "<td>" . $row['dob']. "</td>";

        echo "<td>" . $row['email']. "</td>";
        echo "<td>" . $row['mobile']. "</td>";
        echo "<td>" . $row['address']. "</td>";
        echo "<td>" . $row['state']. "</td>";
        echo "<td>" . $row['district']. "</td>";
        echo '<td><a href="delete.php?mobile='.$row['mobile']. '">&nbspDelete&nbsp</a></td>';
        echo '<td><a href="patientedit.php?mobile='.$row['mobile']. '">&nbspEdit&nbsp</a></td>';
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "No data found.";
}


pg_close($conn);
?> 
