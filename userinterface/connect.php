<?php

$Name = $_POST['Name'];
$Email = $_POST['Email'];
$Address = $_POST['Address'];
$Contact_Number = $_POST['Contact'];

// database connection
$conn = new mysqli('localhost', 'root', '', 'visitor_registration1');
if ($conn->connect_error) {
    die('Connection failed : ' . $conn->connect_error);
} else {
    $stmt = $conn->prepare("INSERT INTO registration(Name, Email, Address, Contact) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("sssi", $Name, $Email, $Address, $Contact_Number);
    $stmt->execute();
    echo 'REGISTRATION SUCCESSFUL';

    // close prepared statement and database connection
    $stmt->close();
    $conn->close();

    // Redirect to another page 
    header('Location: regcomplete.html');
    exit(); // Ensure that no more output is sent after redirection header
}
?>
