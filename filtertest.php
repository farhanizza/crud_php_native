<!DOCTYPE html>
<html>

<head>
    <title>User Filter</title>
</head>

<body>
    <h1>User Filter</h1>
    <form method="get">
        <label for="name">Name:</label>
        <input type="text" name="name" id="name">
        <br>
        <label for="age">Age:</label>
        <input type="number" name="age" id="age">
        <br>
        <label for="address">Address:</label>
        <input type="text" name="address" id="address">
        <br>
        <input type="submit" value="Filter">
    </form>

    <?php
    // Connect to MySQL database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "crud_gt";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Define the base query
    $sql = "SELECT * FROM emp";

    // Get the selected filters from the user
    $nameFilter = $_GET["name"] ?? "";
    $ageFilter = $_GET["age"] ?? "";
    $addressFilter = $_GET["address"] ?? "";

    // Define an array of filter criteria
    $filterCriteria = array();

    // Add the name filter criteria to the array
    if ($nameFilter !== "") {
        $filterCriteria[] = "name LIKE '%$nameFilter%'";
    }

    // Add the age filter criteria to the array
    if ($ageFilter !== "") {
        $filterCriteria[] = "age = $ageFilter";
    }

    // Add the address filter criteria to the array
    if ($addressFilter !== "") {
        $filterCriteria[] = "address LIKE '%$addressFilter%'";
    }

    // Add the filter criteria to the query, if any
    if (count($filterCriteria) > 0) {
        $sql .= " WHERE " . implode(" AND ", $filterCriteria);
    }

    // Execute the query
    $result = $conn->query($sql);

    // Display the filtered users on the website in table format
    if ($result->num_rows > 0) {
        echo "<h2>Filtered Users</h2>";
        echo "<table>";
        echo "<tr><th>Name</th><th>Age</th><th>Address</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["name"] . "</td><td>" . $row["age"] . "</td><td>" . $row["address"] . "</td></tr>";
        }
        echo "</table>";
    } else {
        echo "<p>No users found.</p>";
    }

    // Close the database connection
    $conn->close();
    ?>
</body>

</html>