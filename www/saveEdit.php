<?php 
include 'condb.php';
if(isset($_POST['id'])){
    $id = $_POST['id'];  

    // Prepare and bind the update query
    $stmt = $conn->prepare("
        UPDATE MEMBERS SET 
        name=?,
        email=?,
        phone=? 
        WHERE id=?
    ");
    
    // Bind the parameters (name, email, phone, id)
    $stmt->bind_param("sssi", $name, $email, $phone, $id);  // "sssi" : id is an integer

    // Set the variables
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    // Execute the query
    $stmt->execute();

    // Check for errors and redirect or display message
    if($stmt->error){
        echo $stmt->error;
    } else {
        // Update successfully, redirect to the homepage
        header("Location: index.php");
        exit();
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
}
?>
