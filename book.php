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
?>

<!DOCTYPE html>
<html>
<head>
  <title>Booking Confirmed</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>

<nav>
  <h1>House of Barber</h1>
  <div>
    <a href="index.html">Home</a>
    <a href="services.html">Services</a>
    <a href="about.html">About</a>
    <a href="contact.html">Contact</a>
  </div>
</nav>

<section class="section">
  <h2>Appointment Confirmed ✅</h2>

  <div class="cards">
    <div class="card">
      <p><strong>Name:</strong> <?php echo $name; ?></p>
      <p><strong>Phone:</strong> <?php echo $phone; ?></p>
      <p><strong>Service:</strong> <?php echo $service; ?></p>
      <p><strong>Date:</strong> <?php echo $date; ?></p>
      <p><strong>Time:</strong> <?php echo $time; ?></p>
    </div>
  </div>

  <br>
  <a href="index.html" class="btn">Back to Home</a>
  <button onclick="window.print()" class="btn">Screenshot</button>

</section>

<footer>© 2026 House of Barber</footer>

</body>
</html>

<?php
} else {
    echo "Error: " . mysqli_error($conn);
}
}
?>
