<?php
session_start();

// Redirect to login if not authenticated
function require_login() {
    if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
        header('Location: index.html');
        exit();
    }
}

// Check if user is logged in
function is_logged_in() {
    return isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true;
}

// Get current user info
function get_current_user() {
    if (is_logged_in()) {
        return array(
            'id' => $_SESSION['user_id'],
            'username' => $_SESSION['username']
        );
    }
    return null;
}

// Session timeout (30 minutes)
function check_session_timeout() {
    $timeout_duration = 1800; // 30 minutes in seconds
    
    if (isset($_SESSION['login_time'])) {
        $current_time = time();
        $elapsed_time = $current_time - $_SESSION['login_time'];
        
        if ($elapsed_time > $timeout_duration) {
            // Session expired
            session_unset();
            session_destroy();
            header('Location: login.html?timeout=1');
            exit();
        } else {
            // Update login time
            $_SESSION['login_time'] = $current_time;
        }
    }
}

/* Call this function on every protected page
function protect_page() {
    require_login();
    check_session_timeout();
} */
?>
