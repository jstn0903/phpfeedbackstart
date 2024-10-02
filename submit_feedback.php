<?php
include 'db.php';

$name = $_POST['name'];
$feedback = $_POST['feedback'];

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO feedbacks (name, feedback) VALUES (?, ?)");
$stmt->bind_param("ss", $name, $feedback);

// Execute the statement
if ($stmt->execute() === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();

header("Location: index.php");
exit();
?>