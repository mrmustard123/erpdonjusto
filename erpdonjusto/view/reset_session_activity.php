<?php
// Start the session
session_start();

// Reset the last activity timestamp if user is logged in
if (isset($_SESSION['user_id'])) {
    $_SESSION['last_activity'] = time();
    $response = [
        'status' => 'success',
        'message' => 'Session activity timestamp updated'
    ];
} else {
    $response = [
        'status' => 'error',
        'message' => 'No active session'
    ];
}

// Return JSON response
header('Content-Type: application/json');
echo json_encode($response);
?>
