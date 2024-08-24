<?php
include 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $appointment_id = htmlspecialchars($_POST['appointment-id']);
    $patient_id = htmlspecialchars($_POST['patient-id']);
    $doctor_id = htmlspecialchars($_POST['doctor-id']);
    $appointment_date = htmlspecialchars($_POST['appointment-date']);

    $conn = OpenCon();

    $sql = "INSERT INTO APPOINTMENTS (appointment_id, patient_id, doctor_id, appointment_date) 
            VALUES ('$appointment_id','$patient_id', '$doctor_id', '$appointment_date')";
 

if ($conn->query($sql) === TRUE) {
        $message = "Appointment scheduled successfully!";
    } else {
        $message = "Error: " . $sql . "<br>" . $conn->error;
    }

    CloseCon($conn);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointment Scheduling - Cancer Treatment Hospital</title>
    <link rel="stylesheet" type="text/css" href="appointment-schedulingstyle.css"> 
</head>
<body>
    <header>
        <h1>Appointment Scheduling</h1>
    </header>
    
    <main>
        <section>
            <h2>Schedule an Appointment</h2>
            <?php if (isset($message)): ?>
                <p><?php echo $message; ?></p>
            <?php endif; ?>
            <form method="POST" action="">
                <label for="appointment-id">Appointment ID:</label>
                <input type="text" id="appointment-id" name="appointment-id" required><br>

                <label for="patient-id">Patient ID:</label>
                <input type="text" id="patient-id" name="patient-id" required><br>

                <label for="doctor-id">Doctor ID:</label>
                <input type="text" id="doctor-id" name="doctor-id" required><br>

                <label for="appointment-date">Appointment Date:</label>
                <input type="date" id="appointment-date" name="appointment-date" required><br>

                <input type="submit" value="Schedule Appointment">
            </form>
        </section>
    </main>
</body>
</html>
