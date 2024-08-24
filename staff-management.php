<?php
include 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $staff_id = htmlspecialchars($_POST['staff-id']);
    $staff_id = htmlspecialchars($_POST['doctor-id']);
    $staff_name = htmlspecialchars($_POST['staff-name']);
    $role = htmlspecialchars($_POST['role']);
    $contact_number = htmlspecialchars($_POST['contact_number']);
    $email = htmlspecialchars($_POST['email']);

    $conn = OpenCon();

    $sql = "INSERT INTO staff (staff_id,doctor_id, staff_name, role, contact_number, email) 
            VALUES ('$staff_id','$doctor_id', '$staff_name', '$role', '$contact_number', '$email')"; 

    if ($conn->query($sql) === TRUE) {
        echo "Staff member added successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    CloseCon($conn);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="staff-managementstyle.css">
    <title>Staff Management</title>
</head>
<body>
<header>
        <h1>Staff Management</h1>
    </header>
<main>
        <section>
            <h2>Enter Staff Details</h2>
            <?php if (isset($message)): ?>
                <p><?php echo $message; ?></p>
            <?php endif; ?>
    
    <form method="POST" action="">
        <label for="staff-id">Staff ID:</label>
        <input type="text" id="staff-id" name="staff-id" required><br>

        <label for="doctor-id">Doctor ID:</label>
        <input type="text" id="doctor-id" name="doctor-id"><br>

        <label for="staff-name">Staff Name:</label>
        <input type="text" id="staff-name" name="staff-name" required><br>

        <label for="role">Role:</label>
        <input type="text" id="role" name="role" required><br>

        <label for="contact_number">Contact Number:</label>
        <input type="text" id="contact_number" name="contact_number" required><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br>

        <input type="submit" value="Add Staff">
    </form>
    </section>
    </main>
</body>
</html>
