<?php
include "db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $service = mysqli_real_escape_string($conn, $_POST['service']);
    $date = $_POST['date'];
    $time = $_POST['time'];

    // Validation
    if (strlen($phone) != 10) {
        echo "<script>alert('Invalid phone number'); window.history.back();</script>";
        exit;
    }

    $sql = "INSERT INTO appointments 
            (customer_name, phone, service, appointment_date, appointment_time)
            VALUES 
            ('$name', '$phone', '$service', '$date', '$time')";

    if (mysqli_query($conn, $sql)) {
        echo "<script>
              alert('Appointment booked successfully!');
              window.location.href='home.html';
              </script>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>
