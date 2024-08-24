<?php
include 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $doctor_id = htmlspecialchars($_POST['doctor_id']);
    $doctor_name = htmlspecialchars($_POST['doctor_name']);
    $specialization = htmlspecialchars($_POST['specialization']);
    $contact_number = htmlspecialchars($_POST['contact_number']);
    $email = htmlspecialchars($_POST['email']);
    
    $conn =OpenCon();

    $sql = "INSERT INTO doctors (doctor_id, doctor_name, specialization, contact_number, email) 
            VALUES ('$doctor_id', '$doctor_name', '$specialization', '$contact_number', '$email')";
    if ($conn->query($sql) === TRUE) {
        $message = "Doctor processed successfully!";
    } else {
        $message = "Error: " . $sql . "<br>" . $conn->error;
    }
    Closecon($conn);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Management</title>
    <link rel="stylesheet" href="doctorstyle.css"> 
</head>
<body>
    <header>
        <h1>Doctor's Information</h1>
    </header>
    <main>
        <section class="doctor-section">
        <h2>Enter Doctor's Information</h2>
            <?php if (isset($message)): ?>
                <p><?php echo $message; ?></p>
            <?php endif; ?>
            <form action="" method="post">
                <label for="doctor_id">ID:</label>
                <input type="text" id="doctor_id" name="doctor_id" required><br>

                <label for="doctor_name">Name:</label>
                <input type="text" id="doctor_name" name="doctor_name" required><br>

                <label for="specialization">Specialization:</label>
                <input type="text" id="specialization" name="specialization" required><br>

                <label for="contact_number">Contact Number:</label>
                <input type="text" id="contact_number" name="contact_number" required><br>

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required><br>

                <input type="submit" value="SUBMIT">
            </form>
        </section>
    </main>
</body>
</html>
