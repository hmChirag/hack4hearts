<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Include the database connection
    include("../connection.php");

    // Get the form data
    $patient_id = $_POST['patient_id'];
    $message = $_POST['message'];

    // Update the prescription for the selected patient
    $stmt = $database->prepare("UPDATE patient SET prescription = ? WHERE pid = ?");
    $stmt->bind_param("si", $message, $patient_id);

    if ($stmt->execute()) {
        echo "Message sent successfully.";
    } else {
        echo "Error sending message: " . $database->error;
    }

    $stmt->close();
    $database->close();
}
?>
