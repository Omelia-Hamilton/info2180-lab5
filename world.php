<?php
$host = 'localhost';
$username = 'lab5_user';
$password = 'password123';
$dbname = 'world';

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
$stmt = $conn->query("SELECT * FROM countries");

$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

if (isset($_GET['country'])) {
  $country = htmlspecialchars($_GET['country']);
  // Basic check to allow only alphabetic country names
  if (preg_match("/^[a-zA-Z ]+$/", $country)) {
      echo "Hello from " . $country . "!";
  } else {
      echo "Invalid country name.";
  }
}

// Query to fetch country details (assuming you have a countries table with relevant fields)
$sql = "SELECT country_name, continent, independence_year, head_of_state FROM countries";
$result = $conn->query($sql);

// Check if there are any results
if ($result->num_rows > 0) {
    // Start the table and add headers
    echo "<table border='1' cellpadding='5' cellspacing='0'>";
    echo "<tr>";
    echo "<th>Country Name</th>";
    echo "<th>Continent</th>";
    echo "<th>Independence Year</th>";
    echo "<th>Head of State</th>";
    echo "</tr>";

    // Output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row['country_name']) . "</td>";
        echo "<td>" . htmlspecialchars($row['continent']) . "</td>";
        echo "<td>" . htmlspecialchars($row['independence_year']) . "</td>";
        echo "<td>" . htmlspecialchars($row['head_of_state']) . "</td>";
        echo "</tr>";
    }

    // End the table
    echo "</table>";
} else {
    echo "0 results found.";
}

// Close the database connection
$conn->close();


?>
<ul>
<?php foreach ($results as $row): ?>
  <li><?= $row['name'] . ' is ruled by ' . $row['head_of_state']; ?></li>
<?php endforeach; ?>
</ul>

