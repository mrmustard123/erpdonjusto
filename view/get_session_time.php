<?php
// Start the session
session_start();

// Set the default session timeout (in seconds)
$session_timeout = 36000; // 10 hours, should match the value in index.php

// Calculate remaining time
$response = [];

if (isset($_SESSION['user_id']) && isset($_SESSION['last_activity'])) {
    $elapsed_time = time() - $_SESSION['last_activity'];
    $remaining_time = $session_timeout - $elapsed_time;
    
    if ($remaining_time > 0) {
        $response['status'] = 'active';
        $response['remaining_time'] = $remaining_time;
        $response['elapsed_time'] = $elapsed_time;
    } else {
        // Session has expired
        $response['status'] = 'expired';
        $response['remaining_time'] = 0;
        
        // Optionally clear session data if expired
        // session_unset();
        // session_destroy();
    }
} else {
    // No active session
    $response['status'] = 'inactive';
    $response['remaining_time'] = 0;
}

// Return JSON response
header('Content-Type: application/json');
echo json_encode($response);
?>
