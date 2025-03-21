<?php
include "db.php";

// Check if ID is set and sanitize it
$id = isset($_POST['id']) ? (int)$_POST['id'] : 1;

// Prepare the query with a parameter to avoid SQL injection
$query = 'SELECT * FROM district WHERE state = $1';
$result = pg_query_params($conn, $query, array($id));

// Check if the query was successful
if ($result) {
    // Check if there are any rows returned
    if (pg_num_rows($result) > 0) {
        echo '<option value="">Select State</option>';
        // Fetch and display rows
        while ($row = pg_fetch_assoc($result)) {
            echo '<option value="' . htmlspecialchars($row['dcode']) . '">' . htmlspecialchars($row['distric_name']) . '</option>';
        }
    } else {
        echo '<option value="">No districts found</option>';
    }
} else {
    echo "Query failed: " . pg_last_error();
}

// Close the connection
pg_close($conn);
?>
