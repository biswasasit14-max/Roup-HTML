<?php
session_start();
header('Content-Type: application/json');

$response = array('logged_in' => false);

if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
    $response['logged_in'] = true;
    $response['username'] = $_SESSION['username'];
}

echo json_encode($response);
?>
