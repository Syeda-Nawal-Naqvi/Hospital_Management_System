<?php
include 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $patient_id = htmlspecialchars($_POST['patient-id']);
    $patient_name = htmlspecialchars($_POST['patient-name']);
    $date_of_birth = htmlspecialchars($_POST['date_of_birth']);
    $contact_number = htmlspecialchars($_POST['contact_number']);
    $email = htmlspecialchars($_POST['email']);


   
    $conn = OpenCon();

  
    $stmt = $conn->prepare("INSERT INTO patients (patient_id, patient_name, date_of_birth, contact_number, email) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("issss", $patient_id, $patient_name, $date_of_birth, $contact_number, $email);

  
    if ($stmt->execute()) {
        echo "New patient record created successfully.";
    } else {
        echo "Error: " . $stmt->error;
    }

  
    $stmt->close();
    CloseCon($conn);
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Records</title>
    <link rel="stylesheet" type="text/css" href="patient-recordsstyle.css">
</head>
<body>
<header>
        <h1>Patient Records</h1>
    </header>
<main>
        <section>
            <h2>Enter Patient Information</h2>
            <?php if (isset($message)): ?>
                <p><?php echo $message; ?></p>
            <?php endif; ?>
    
    <form method="POST" action="">
        <label for="patient-id">Patient ID:</label>
        <input type="text" id="patient-id" name="patient-id" required><br>

        <label for="patient-name">Patient Name:</label>
        <input type="text" id="patient-name" name="patient-name" required><br>

        <label for="date_of_birth">Date of Birth:</label>
        <input type="date" id="date_of_birth" name="date_of_birth" required><br>

        <label for="contact_number">Contact Number:</label>
        <input type="text" id="contact_number" name="contact_number" required><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br>

        <input type="submit" value="Submit">
    </form>
    </section>
    </main>
</body>
</html>
