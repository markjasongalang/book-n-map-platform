<?php
    session_start();

    header('Content-Type: application/json');
    $response = [];

    if (!isset($_SESSION['username'])) {
        $response['signed_in'] = false;
        echo json_encode($response);
        exit;
    }
    
    if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['logout'])) {
        // Unset all session variables
        $_SESSION = array();
        
        // Destroy the session
        session_destroy();
        
        $response['logout_success'] = true;
        $response['url'] = '/booknmap/sign-in';
        echo json_encode($response);
        exit;
    }
    
    $response['signed_in'] = true;
    echo json_encode($response);
    exit;
?>