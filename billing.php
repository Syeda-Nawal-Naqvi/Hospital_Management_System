<?php
include 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $billing_id = htmlspecialchars($_POST['billing-id']);
    $patient_id = htmlspecialchars($_POST['patient-id']);
    $amount = htmlspecialchars($_POST['amount']);
    $billing_date = htmlspecialchars($_POST['billing-date']);

    $conn = OpenCon();

    $sql = "INSERT INTO Billing (billing_id, patient_id, amount, billing_date) 
            VALUES ('$billing_id','$patient_id', '$amount', '$billing_date')";
  if ($conn->query($sql) === TRUE) {
        $message = "Billing processed successfully!";
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
    <title>Billing - Cancer Treatment Hospital</title>
    <link rel="stylesheet" type="text/css" href="billingstyle.css"> 
</head>
<body>
    <header>
        <h1>Billing</h1>
    </header>
<main>
        <section>
            <h2>Enter Billing Details</h2>
            <?php if (isset($message)): ?>
                <p><?php echo $message; ?></p>
            <?php endif; ?>
            <form action="" method="post">
                <label for="billing-id">Billing ID:</label>
                <input type="text" id="billing-id" name="billing-id" required><br>

                <label for="patient-id">Patient ID:</label>
                <input type="text" id="patient-id" name="patient-id" required><br>

                <label for="amount">Amount:</label>
                <input type="text" id="amount" name="amount" required><br>

                <label for="billing-date">Billing Date:</label>
                <input type="date" id="billing-date" name="billing-date" required><br>

                <input type="submit" value="Submit">
            </form>
        </section>
    </main>
</body>
</html>
