<?php
include 'condb.php';

$searchQuery = '';
if (isset($_GET['search'])) {
    // get search value from form
    $searchQuery = $_GET['search'];
}

// prepare SQL command
$stmt = $conn->prepare("SELECT * FROM MEMBERS WHERE name LIKE ? OR email LIKE ? OR phone LIKE ?");
$searchTerm = "%" . $searchQuery . "%";
$stmt->bind_param("sss", $searchTerm, $searchTerm, $searchTerm);

// Execute the statement
$stmt->execute();

// get search result
$result = $stmt->get_result();

echo '<div class="container">';
echo '<div class="table-container">';
echo '<h3>Search Results for: "' . htmlspecialchars($searchQuery) . '"</h3>';
echo '<a href="index.php" class="btn btn-info mb-3">Back to Home</a>';

if ($result->num_rows > 0) {
    echo '
    <table class="table table-hover">
        <thead class="thead-dark">
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>';
    // display search result
    while ($row = $result->fetch_assoc()) {
        echo '<tr>';
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['name'] . "</td>";
        echo "<td>" . $row['email'] . "</td>";
        echo "<td>" . $row['phone'] . "</td>";
        echo "<td><a href='formEdit.php?id=" . $row['id'] . "' class='btn btn-warning btn-sm'>Edit</a></td>";
        echo "<td><a href='del.php?id=" . $row['id'] . "' class='btn btn-danger btn-sm' onclick=\"return confirm('Do you want to delete this record?')\">Delete</a></td>";
        echo '</tr>';
    }
    echo '</tbody></table>';
} else {
    echo '<p>No results found for "' . htmlspecialchars($searchQuery) . '"</p>';
}

$stmt->close();
$conn->close();
echo '</div></div>';
?>
