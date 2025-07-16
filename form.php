<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Veritabanı bağlantısı
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "asiladen";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    echo "Bağlantı hatası: " . $conn->connect_error;
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ad = $conn->real_escape_string($_POST['ad']);
    $email = $conn->real_escape_string($_POST['email']);
    $telefon = $conn->real_escape_string($_POST['telefon']);
    $mesaj = $conn->real_escape_string($_POST['mesaj']);

    $sql = "INSERT INTO iletisimler (ad, email, telefon, mesaj)
            VALUES ('$ad', '$email', '$telefon', '$mesaj')";

    if ($conn->query($sql) === TRUE) {
        echo "Mesajınız başarıyla gönderildi!";
    } else {
        echo "Hata: " . $conn->error;
    }

    $conn->close();
}
?>

