<?php
// Check for empty fields
if(empty($_POST['name1']) || empty($_POST['email1']) || empty($_POST['phone1']) || empty($_POST['message2']) || !filter_var($_POST['email1'], FILTER_VALIDATE_EMAIL)) {
  http_response_code(500);
  exit();
}

$name = $_POST["name1"];
$email = $_POST["email1"];
$phone = $_POST["phone1"];
$message = $_POST["message2"];

include("../mail/mail.php");
?>