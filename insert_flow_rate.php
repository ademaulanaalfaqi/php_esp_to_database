<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "iot_ta";

$valid_api_key = "WF260204";


// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Memeriksa koneksi
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Mendapatkan data dari ESP8266
$flowRate = $_GET['nilai_debit'];
$totalLiters = $_GET['total_liter'];
$id_sensor = $_GET['id_sensor'];
$api_key = $_GET['api_key'];

if ($api_key == $valid_api_key) {
  // Menyiapkan dan menjalankan pernyataan SQL
  $sql = "INSERT INTO debit (id_sensor, nilai_debit, total_liter) VALUES ('$id_sensor', '$flowRate', '$totalLiters')";
  if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
} else {
  echo "Invalid API key";
}

// Menutup koneksi
$conn->close();
