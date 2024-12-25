<?php
include 'condb.php';

// get search from form
$searchQuery = '';
if (isset($_GET['search'])) {
    $searchQuery = $_GET['search'];
}

// prepare SQL command for searching
$sql = "SELECT * FROM MEMBERS WHERE name LIKE ? OR email LIKE ? OR phone LIKE ?";
$searchTerm = "%" . $searchQuery . "%";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $searchTerm, $searchTerm, $searchTerm);
$stmt->execute();
$result = $stmt->get_result();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Application</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            margin-top: 50px;
        }
        .table th, .table td {
            text-align: center;
        }
        .btn-primary, .btn-warning, .btn-danger, .btn-success {
            margin: 5px;
        }
        .table-container {
            box-shadow: 0px 4px 6px rgba(0,0,0,0.1);
            padding: 20px;
            background-color: #ffffff;
            border-radius: 8px;
        }
        h3 {
            font-family: 'Arial', sans-serif;
            margin-bottom: 20px;
        }
        .search-container {
            margin-bottom: 10px;
        }
		.d-flex {
    		display: -ms-flexbox !important;
    		display: flex !important;
    		align-items: baseline;
		}
    </style>
</head>
<body>
    <div class="container">
        <div class="table-container">
            <h3>Basic CRUD PHP Application</h3>
            <!-- search form -->
            <div class="search-container d-flex justify-content-between">
                <a href="formAdd.php" class="btn btn-success mb-3">Add Data</a>
                <form action="index.php" method="get" class="d-flex">
                    <input type="text" name="search" class="form-control" placeholder="Search" value="<?= htmlspecialchars($searchQuery) ?>" style="width: 250px;">
                    <button type="submit" class="btn btn-primary mb-3">Search</button>
                </form>
            </div>

            <?php
            // display search result
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
            ?>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zyFXA4kG5E5pATJGO3yISk13Z6gDkhUuY3QxDb9p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-pzjw8f+ua7Kw1TIq0d4E9B2v3g6FcXy6lYBG28a7DjsF5LhKX9Xl6Z4O3IRvB1k9" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-pzjw8f+ua7Kw1TIq0d4E9B2v3g6FcXy6lYBG28a7DjsF5LhKX9Xl6Z4O3IRvB1k9" crossorigin="anonymous"></script>
</body>
</html>
