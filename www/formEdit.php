<?php
include 'condb.php';
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sql = "SELECT * FROM MEMBERS WHERE id=$id";
    $result = $conn->query($sql);
    $row = mysqli_fetch_array($result);
    $num = $result->num_rows;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Edit Data</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            margin-top: 50px;
        }
        .form-container {
            background-color: #ffffff;
            padding: 30px;
            box-shadow: 0px 4px 8px rgba(0,0,0,0.1);
            border-radius: 8px;
        }
        h3 {
            font-family: 'Arial', sans-serif;
            margin-bottom: 20px;
        }
        .form-control {
            border-radius: 8px;
            box-shadow: none;
        }
        .btn-primary, .btn-secondary {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            margin-top: 10px;
        }
    </style>
</head>
<body>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-8 col-md-6 col-lg-5 form-container">
                <h3 class="text-center">Edit Member Data</h3>
                <form action="saveedit.php" method="post">
                    <div class="form-group">
                        <label for="id">ID:</label>
                        <input type="number" id="id" name="id" class="form-control" readonly value="<?php echo $row['id'];?>" required>
                    </div>
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" id="name" name="name" class="form-control" value="<?php echo $row['name'];?>" required placeholder="Enter name">
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email" class="form-control" value="<?php echo $row['email'];?>" required placeholder="Enter email">
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone:</label>
                        <input type="tel" id="phone" name="phone" class="form-control" value="<?php echo $row['phone'];?>" required placeholder="Enter phone number">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>

                <!-- Back button -->
                <a href="index.php" class="btn btn-secondary">Back</a>

            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zyFXA4kG5E5pATJGO3yISk13Z6gDkhUuY3QxDb9p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-pzjw8f+ua7Kw1TIq0d4E9B2v3g6FcXy6lYBG28a7DjsF5LhKX9Xl6Z4O3IRvB1k9" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-pzjw8f+ua7Kw1TIq0d4E9B2v3g6FcXy6lYBG28a7DjsF5LhKX9Xl6Z4O3IRvB1k9" crossorigin="anonymous"></script>

</body>
</html>
<?php } else { echo 'Error!'; } ?>
