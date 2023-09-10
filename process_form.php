<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $vehicleno = $_POST["vehicleno"];
    $name = $_POST["name"];
    $contactNumber = $_POST["contact-number"];

    // Validate and sanitize the form data (perform necessary checks)

    

    // Connect to the database
    $servername = "localhost"; // Replace with your MySQL server name
    $username = "root"; // Replace with your MySQL username
    $password = ""; // Replace with your MySQL password
    $dbname = "gozoomdb"; // Replace with your MySQL database name

    // Create a new PDO instance
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        // Handle database connection error
        echo "Connection failed: " . $e->getMessage();
        exit;
    }

    // Prepare and execute the database query
    try {
        $stmt = $conn->prepare("INSERT INTO ashram (vehicle_no, name, contact_number) VALUES (:vehicleno, :name, :contactNumber)");
        $stmt->bindParam(':vehicleno', $vehicleno);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':contactNumber', $contactNumber);
        $stmt->execute();
    } catch (PDOException $e) {
        // Handle database query error
        echo "Error: " . $e->getMessage();
        exit;
    }

    // Close the database connection
    $conn = null;

    header("Location: success.html");
    exit;
 

}
?>
