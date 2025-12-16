<?php
session_start();
header('Content-Type: application/json');

// Database connection details
// Note: In production, use environment variables or a config file
$host = 'localhost';
$dbname = 'your_database_name';
$username = 'your_db_username';
$password = 'your_db_password';

// Get JSON data from JavaScript
$input = json_decode(file_get_contents('php://input'), true);

// For demo purposes, we'll use hardcoded credentials
// In production, you should query a database
$valid_username = 'admin';
$valid_password = 'password123'; // In production, store hashed passwords

// Initialize response array
$response = array(
    'success' => false,
    'message' => '',
    'redirect' => ''
);

// Validate input
if (!isset($input['username']) || !isset($input['password'])) {
    $response['message'] = 'Username and password are required';
    echo json_encode($response);
    exit;
}

$user = trim($input['username']);
$pass = trim($input['password']);

// Validate credentials
if ($user === $valid_username && $pass === $valid_password) {
    // Create session
    $_SESSION['user_id'] = 1; // In production, use actual user ID from database
    $_SESSION['username'] = $user;
    $_SESSION['logged_in'] = true;
    $_SESSION['login_time'] = time();
    
    $response['success'] = true;
    $response['message'] = 'Login successful!';
    $response['redirect'] = 'dashboard.html'; // Change this to your desired redirect URL
} else {
    $response['message'] = 'Invalid username or password';
}

echo json_encode($response);
?>
