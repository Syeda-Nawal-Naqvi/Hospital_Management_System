<?php

function OpenCon() {
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "";
    $dbname = "hospital_management_system";

    $conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    return $conn;
}


function CloseCon($conn) {
    $conn->close();
}


$conn = OpenCon();


$queries = [
    "CREATE TABLE IF NOT EXISTS doctors (
        doctor_id INT PRIMARY KEY,
        doctor_name VARCHAR(100),
        specialization VARCHAR(100),
        contact_number VARCHAR(15),
        email VARCHAR(100)
    )",
    "CREATE TABLE IF NOT EXISTS patients (
        patient_id INT PRIMARY KEY,
        patient_name VARCHAR(100),
        date_of_birth DATE,
        contact_number VARCHAR(15),
        email VARCHAR(100)
    )",
    "CREATE TABLE IF NOT EXISTS staff (
        staff_id INT PRIMARY KEY,
        doctor_id INT,
        staff_name VARCHAR(100),
        role VARCHAR(100),
        contact_number VARCHAR(15),
        email VARCHAR(100),
        FOREIGN KEY (doctor_id) REFERENCES doctors(doctor_id)
    )",
    "CREATE TABLE IF NOT EXISTS appointments (
        appointment_id INT PRIMARY KEY,
        patient_id INT,
        doctor_id INT,
        appointment_date DATE,
        FOREIGN KEY (patient_id) REFERENCES patients(patient_id),
        FOREIGN KEY (doctor_id) REFERENCES doctors(doctor_id)
    )",
    "CREATE TABLE IF NOT EXISTS billing (
        billing_id INT PRIMARY KEY,
        patient_id INT,
        amount DECIMAL(10, 2),
        billing_date DATE,
        FOREIGN KEY (patient_id) REFERENCES patients(patient_id)
    )"
];
 $dataQueries = [
        "INSERT IGNORE INTO doctors (doctor_id, doctor_name, specialization, contact_number, email) VALUES
        (1, 'Dr. John Abbass', 'Oncology', '123-456-7890', 'john.abbass@example.com'),
        (2, 'Dr. Haider Ali', 'Radiology', '098-765-4321', 'haider.ali@example.com'),
        (3, 'Dr. Mohsin Haider', 'Cardiology', '111-999-000', 'mohsin.haider@example.com')",
        "INSERT IGNORE INTO patients (patient_id, patient_name, date_of_birth, contact_number, email) VALUES
        (1, 'Saim Ali', '1980-05-15', '111-222-3333', 'saim.ali@example.com'),
        (2, 'Sara Rizvi', '1980-05-15', '222-333-4444', 'sara.rizvi@example.com'),
        (3, 'Ahad Mir', '1975-10-30', '333-444-5555', 'ahad.mir@example.com')",
        "INSERT IGNORE INTO staff (staff_id,doctor_id, staff_name, role, contact_number, email) VALUES
        (1,1, 'HUMA HAIDER', 'Nurse', '123-456-7890', 'huma.haider@example.com'),
        (2,2, 'SAMAN ALI', 'WARD INCHARGE', '123-456-7890', 'saman.ali@example.com'),
        (3,3, 'HAYA KAZMI', 'Receptionist', '098-765-4321', 'haya.kazmi@example.com')",
        "INSERT IGNORE INTO appointments (appointment_id, patient_id, doctor_id, appointment_date) VALUES
        (1, 1, 1, '2024-08-20'),
        (2, 2, 2, '2024-08-21'),
        (3, 3, 3, '2024-08-22')",
        "INSERT IGNORE INTO billing (billing_id, patient_id, amount, billing_date) VALUES
        (1, 1, 1000.00, '2024-08-15'),
        (2, 2, 2000.00, '2024-08-16'),
        (3, 3, 3000.00, '2024-08-17')"
    ];
// Close the connection
CloseCon($conn);
?>