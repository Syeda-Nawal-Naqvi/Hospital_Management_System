<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cancer Treatment Hospital</title>
    <link rel="stylesheet" type="text/css" href="style.css"> 
    <script src="script.js"></script>
</head>
<body onload="greetUser()">
    <header>
        <img src="Hospital logo.jpg" alt="Hospital Logo" width="200" height="100">
        <h1>Welcome to Cancer Treatment Hospital</h1>
        <img src="cancer hospital.jpg" alt="Doctor Image" width="500" height="250">
        <p>Contact us: 123-456-789</p>
    </header>
    <nav>
        <ul>
            <li><a href="patient-records.php">Patient Records</a></li>
            <li><a href="appointment-scheduling.php">Appointment Scheduling</a></li>
            <li><a href="staff-management.php">Staff Management</a></li>
            <li><a href="billing.php">Billing</a></li>
            <li><a href="doctor.php">Doctors</a></li>
        </ul>
    </nav>
    <main>
        <section>
            <h2>About Us</h2>
            <p>We are a leading cancer treatment hospital dedicated to providing the best care for our patients. Our state-of-the-art facilities and experienced staff ensure that you receive the highest quality treatment available.</p>
        </section>
        <section>
            <h2>Our Services</h2>
            <ul>
                <li>Chemotherapy</li>
                <li>Radiation Therapy</li>
                <li>Surgery</li>
                <li>Immunotherapy</li>
                <li>Supportive Care</li>
            </ul>
        </section>
        <section>
            <h2>Patient Testimonials</h2>
            <p>"The care and support I received at this hospital were outstanding. The staff is compassionate and highly skilled." - Saim Ali</p>
            <p>"Thanks to the amazing team at Cancer Treatment Hospital, I am now cancer-free." - Ahad Mir</p>
        </section>
    </main>
    <footer>
        <p>&copy; <?php echo date("Y"); ?> Cancer Treatment Hospital. All rights reserved.</p>
        <p>Contact us: 123-456-789 | Email: info@cancertreatmenthospital.com</p>
    </footer>
</body>
</html>
